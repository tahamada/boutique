<?php
require "vendor/autoload.php";
include "Autoload.php";
include "funct/listCategorie.php";
include "funct/mail.php";
include "funct/session.php";

if(isset($_POST["inscriptionSubmit"])){ 
    $mClient= new ManagerClient();
    $message=array(1,"Inscription reussit, veuillez valider votre email");

   	$entropy = uniqid(mt_rand(), true);
    $hash = sha1($entropy);  // sha1 gives us a 40-byte hash

    $_POST["token"]=$hash;
   	$_POST["valide"]=0;
   	$search=array("email"=>$_POST["email"]);
   	if($_POST["password"]==$_POST["password2"]){
   		$existantClient=$mClient->lister($search);
	   	if(count($existantClient) == 0){
		   	try{
		   		//creation de l'objet client
		   		$_POST['password']=hash ("sha256", $_POST['password']);
		   		$oClient=new Client($_POST);
		   		$bodymessage="";
		   		$bodymessage.="Bienvenue chez MyMarket\n";
		   		$bodymessage.="\nVeuillez confirmer votre inscription en cliquant sur ce lien :\n";
		   		$bodymessage.='http://'.$_SERVER['HTTP_HOST']."?token=".$oClient->Token()."\n";
		   		$bodymessage.="\nVous pouvez ignorer cet email s'il ne vous concerne pas\n";
		   		$bodymessage.="\nhttp://".$_SERVER['HTTP_HOST']."\n";
		   		//var_dump(sendMail("inscrption",$_POST['email'],"coucou"));
		   		var_dump(send());
		   		die();
		   		//$mClient->enregistrer($oClient);	   		
		   		//password_hash($_POST[''], PASSWORD_DEFAULT)
		   		$_SESSION['message']=$message;
		   		header("location:index.php");
		   	}catch(Exception $e){
		        $message=array(0,$e->getMessage());
		    }
	   	}
	   	else{
	   		if($existantClient[0]->Valide()!=0)
	   			$message=array(0,"Email déjà existant");
	   		else
	   			$message=array(0,"Veuillez confirmer votre email ou vous réinscrire");
	   	}
   	}
   	else
   		$message=array(0,"Les 2 mots de passe sont differents");
}

$loaderfile = new Twig_Loader_Filesystem('view/');
$twig = new Twig_Environment($loaderfile);
echo $twig->render('ajoutClient.html', array('categorie'=>$listeoCategorie,'message'=>$message));
?>
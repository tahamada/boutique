<?php
require "vendor/autoload.php";
include "Autoload.php";
include "funct/listCategorie.php";
include "funct/session.php";

if(isset($_POST["inscriptionSubmit"])){ 
	$mClient=Manager::getInstance();
	$mClient::setTable("Client");
    $message=array(1,"Inscription reussit, veuillez valider votre email");

   	$entropy = uniqid(mt_rand(), true);
    $hash = sha1($entropy);  // sha1 gives us a 40-byte hash

    $_POST["token"]=$hash;
   	$_POST["valide"]=0;
   	$search=array("email"=>$_POST["email"]);
   	if($_POST["password"]==$_POST["password2"]){
   		$existantClient=$mClient::lister($search);
	   	if(count($existantClient) == 0){
		   	try{
		   		//creation de l'objet client
		   		$_POST['password']=hash ("sha256", $_POST['password']);
		   		$oClient=new Client($_POST);
		   		$bodymessage=Fonction::bodyMail($oClient->Token());
		   		try{
		   			$mailerror=false;
		   			Fonction::sendMail("Inscription MyMarket",$_POST['email'],$bodymessage);
		   		}catch(Exception $e){
		   			$mailerror=array(true,$e->getMessage());
		   			//$message[2].=" Erreur envoie  email".$e->getMessage();
		   		}
		   		if($mailerror[0]){
			   		$_POST["valide"]=1;
			   		$message=array(1,"Inscription reussit, vous pouvez vous connecter");
		   		}
		   		$mClient::enregistrer($oClient);	   		
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
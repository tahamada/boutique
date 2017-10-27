<?php
require "vendor/autoload.php";
include "Autoload.php";
include "funct/listCategorie.php";
include "funct/session.php";

if(isset($_POST["inscriptionSubmit"])){ 
    $mClient= new ManagerClient();
    $message=array(true,"Inscription reussit, veuillez valider votre email");

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

		   		$mClient->enregistrer($oClient);	   		
		   		//password_hash($_POST[''], PASSWORD_DEFAULT)
		   		$_SESSION['message']=$message;
		   		header("location:index.php");
		   	}catch(Exception $e){
		        $message=array(false,$e->getMessage());
		    }
	   	}
	   	else{
	   		if($existantClient[0]->Valide()!=0)
	   			$message=array(false,"Email déjà existant");
	   		else
	   			$message=array(false,"Veuillez confirmer votre email ou vous réinscrire");
	   	}
   	}
   	else
   		$message=array(false,"Les 2 mots de passe sont differents");
}

$loaderfile = new Twig_Loader_Filesystem('view/');
$twig = new Twig_Environment($loaderfile);
echo $twig->render('ajoutClient.html', array('categorie'=>$listeoCategorie,'message'=>$message));
?>
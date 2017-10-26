<?php
require "vendor/autoload.php";
include "Autoload.php";
include "funct/listCategorie.php";

if(isset($_POST["inscriptionSubmit"])){ 
    $mClient= new ManagerClient();

    //Creation du token
   /*	$p = new OAuthProvider();
   	$t = $p->generateToken(50);
	$_POST["token"]=$t;*/
   	$_POST["valide"]=false;
   

   	$oClient=new Client($_POST);


   	var_dump($oClient);
}

$loaderfile = new Twig_Loader_Filesystem('view/');
$twig = new Twig_Environment($loaderfile);
echo $twig->render('ajoutClient.html', array('categorie'=>$listeoCategorie));
?>
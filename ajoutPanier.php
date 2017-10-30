<?php
require "vendor/autoload.php";
include "Autoload.php";
include "funct/session.php";

$message=array("success"=>"success");
if(isset($_POST['idArticle'])){
	if(isset($_COOKIE['panier'])){
		$panier = unserialize($_COOKIE['panier']);
		$panier[]=$_POST;
		setcookie('panier', serialize($panier), time()+3600);
	}
	else{
		setcookie('panier', serialize(array($_POST)), time()+3600);
		$panier = unserialize($_COOKIE['panier']);
	}
}


$loaderfile = new Twig_Loader_Filesystem('ajaxReponse/');
$twig = new Twig_Environment($loaderfile);

$reponse=array("message"=>"success");
echo $twig->render('json.html', array("reponse"=>$panier,"session"=>$session));
?>
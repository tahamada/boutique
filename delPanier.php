<?php
require "vendor/autoload.php";
include "Autoload.php";
include "funct/session.php";
if(isset($_COOKIE['panier']) && $_POST['index']){
	$panier = unserialize($_COOKIE['panier']);
	array_splice($panier, $_POST['index']-1, 1);
	setcookie('panier', serialize($panier), time()+3600);	

	$loaderfile = new Twig_Loader_Filesystem('view/');
	$twig = new Twig_Environment($loaderfile);

	echo $twig->render('ajaxReponse/json.html', array("reponse"=>array("nbPanier"=>count($panier),"session"=>$session)));
}

?>
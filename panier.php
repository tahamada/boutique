<?php
require "vendor/autoload.php";
include "Autoload.php";
include "funct/session.php";
if(isset($_COOKIE['panier'])){
	$panier = unserialize($_COOKIE['panier']);

	$loaderfile = new Twig_Loader_Filesystem('view/');
	$twig = new Twig_Environment($loaderfile);

	echo $twig->render('ajaxReponse/panier.html', array("panier"=>$panier,"session"=>$session));
}

?>
<?php
require "vendor/autoload.php";
include "Autoload.php";
include "funct/session.php";

$loaderfile = new Twig_Loader_Filesystem('view/');
$twig = new Twig_Environment($loaderfile);
if(isset($_COOKIE['panier'])){
	$panier = unserialize($_COOKIE['panier']);

	echo $twig->render('ajaxReponse/panier.html', array("panier"=>$panier,"session"=>$session));
}

?>
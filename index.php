<?php
require "vendor/autoload.php";
include "funct/listCategorie.php";

$loaderfile = new Twig_Loader_Filesystem('view/');
$twig = new Twig_Environment($loaderfile);
echo $twig->render('accueil.html',array('categorie'=>$listeoCategorie));
?>
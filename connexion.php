<?php
require "vendor/autoload.php";
include "Autoload.php";
include "funct/listCategorie.php";
$loaderfile = new Twig_Loader_Filesystem('ajaxReponse/');
$twig = new Twig_Environment($loaderfile);
$reponse=array("message"=>"success");
echo $twig->render('json.html', array("reponse"=>$reponse));
?>
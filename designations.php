<?php
require "vendor/autoload.php";
include "Autoload.php";
include "funct/listCategorie.php";
$loaderfile = new Twig_Loader_Filesystem('ajaxReponse/');
$twig = new Twig_Environment($loaderfile);

if(isset($_POST['designation'])){
	$mArticle=new ManagerArticle();
	$designations=$mArticle->lister(array("designation"=>"%".$_POST['designation']."%"));
}

$reponse=array("message"=>"success");
var_dump($designations);
echo $twig->render('json.html', $designations);
?>
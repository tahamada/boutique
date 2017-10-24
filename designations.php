<?php
require "vendor/autoload.php";
include "Autoload.php";
include "funct/listCategorie.php";
$loaderfile = new Twig_Loader_Filesystem('ajaxReponse/');
$twig = new Twig_Environment($loaderfile);

if(isset($_POST['designation'])){
	$mArticle=new ManagerArticle();
	$joinArray=array(array("ArticleVendeur as AV","AV.idArticle=t.idArticle","LEFT JOIN"));
	$search=array("designation"=>"%".$_POST['designation']."%","AV.idVendeur"=>"!1 or null");
	//liste des designations qui ne sont pas vendu par le vendeur
	$designations=$mArticle->lister($search,[],false,$joinArray);
}

$reponse=array("message"=>"success");
echo $twig->render('json.html', array("reponse"=>$designations));
?>
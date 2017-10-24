<?php
require "vendor/autoload.php";
include "Autoload.php";
include "funct/listCategorie.php";

$mArticle= new ManagerArticle();

$search=array("imageUrl"=>"not null");
$column=[];
$objet=false;
$joinParam=null;
$order="idArticle desc";
$limit=7;
$offset=null;

$listArticleNouveau=$mArticle->lister($search,$column,$objet,$joinParam,$order,$limit,$offset);

$listArticle=$mArticle->lister();

$loaderfile = new Twig_Loader_Filesystem('view/');
$twig = new Twig_Environment($loaderfile);
echo $twig->render('accueil.html',array('categorie'=>$listeoCategorie,'articles'=>$listArticleNouveau));
?>
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

$search=null;
$join1=array("ArticleVendeur as av","av.idArticle=t.idArticle","JOIN");
$join2=array("Vendeur as v","v.idVendeur=av.idVendeur","JOIN");
$joinParam=array($join1,$join2);
$listArticle=$mArticle->lister($search,$column,$objet,$joinParam);


$loaderfile = new Twig_Loader_Filesystem('view/');
$twig = new Twig_Environment($loaderfile);
echo $twig->render('accueil.html',array('categorie'=>$listeoCategorie,'articles'=>$listArticleNouveau));
?>
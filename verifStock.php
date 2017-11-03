<?php
require "vendor/autoload.php";
include "Autoload.php";
include "funct/session.php";

if(isset($_POST['idVendeur']) && isset($_POST['idArticle']) && isset($_POST['quantite'])){
	//recuperation de l'article
	$mArticle= new ManagerArticle();
	$search=array("t.idArticle"=>$_POST['idArticle'],"av.idVendeur"=>$_POST['idVendeur']);
	$objet=null;
	$column=["quantite","prix"];
	//param jointure
	$join1=array("ArticleVendeur as av","av.idArticle=t.idArticle","JOIN");
	$joinParam=array($join1);

	//recherche
	$article=$mArticle->lister($search,$column,$objet,$joinParam);
	if(count($article)>0)
		$article=$article[0];
	if($article['quantite']>0){
		if($article['quantite']-$_POST['quantite']>0){
			$message=array("reponse"=>"En Stock","etat"=>1,"prix"=>$article['prix']);
		}
		else{
			$message=array("reponse"=>"Limite dépassée","etat"=>-1,"prix"=>$article['prix']);
		}
	}
	else{
		$message=array("reponse"=>"Plus en stock","etat"=>0,"prix"=>$article['prix']);
	}
}

$loaderfile = new Twig_Loader_Filesystem('view/');
$twig = new Twig_Environment($loaderfile);

echo $twig->render('ajaxReponse/json.html', array("reponse"=>$message));
?>
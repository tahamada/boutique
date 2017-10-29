<?php
require "vendor/autoload.php";
include "Autoload.php";
include "funct/listCategorie.php";
include "funct/session.php";

if(isset($_GET['idArticle'])){
	//recuperation du detail de l'article
	$mArticle=new ManagerArticle();
	$objet=false;
	$column=[];
	$search=array("t.idArticle"=>$_GET['idArticle']);
	$join1=array("ArticleVendeur as av","av.idArticle=t.idArticle","JOIN");
	$join2=array("Vendeur as v","v.idVendeur=av.idVendeur","JOIN");
	$joinParam=array($join1,$join2);
	$Article=$mArticle->lister($search,$column,$objet,$joinParam);
	if(count($Article)>0){
		if(isset($_GET['idVendeur']))
			for($i=0;$i<count($Article);$i++) {
				if($Article[$i]["idVendeur"]==$_GET['idVendeur']){
					$idVendeur=$_GET['idVendeur'];
					$indexVendeur=$i;
				}
			}
		else{
			$indexVendeur=0;
			$idVendeur=$Article[$indexVendeur]["idVendeur"];

		}

	}
	else
		header("location:/");
}
else
	header("location:/");
$loaderfile = new Twig_Loader_Filesystem('view/');
$twig = new Twig_Environment($loaderfile);
echo $twig->render('articleDetail.html', array('categorie'=>$listeoCategorie,"article"=>$Article,"idVendeur"=>$idVendeur,"indexVendeur"=>$indexVendeur,'message'=>$message));
?>
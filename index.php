<?php
require "vendor/autoload.php";
include "Autoload.php";
include "funct/listCategorie.php";
include "funct/session.php";
$mArticle= new ManagerArticle();

//validation d'inscription par token
if(isset($_GET['token'])){
	$mClient=new ManagerClient();
	$search=array("token"=>$_GET['token']);
	$clientTrouve=$mClient->lister($search);
	if(count($clientTrouve)!=0){
		if($clientTrouve[0]->Valide()!=1){
			$clientTrouve[0]->setValide(1);
			$mClient->enregistrer($clientTrouve[0],true);
			$message=array(1,"Email validé vous pouvez connecté");
		}
		else
			$message=array(2,"Email déjà validé");
		
	}
}

//liste des articles pour le slider
$search=array("imageUrl"=>"not null");
$column=[];
$objet=false;
$joinParam=null;
$order="idArticle desc";
$limit=14;
$offset=null;

$listArticleNouveau=$mArticle->lister($search,$column,$objet,$joinParam,$order,$limit,$offset);


//liste des Articles
$search=null;
$join1=array("ArticleVendeur as av","av.idArticle=t.idArticle","JOIN");
$join2=array("Vendeur as v","v.idVendeur=av.idVendeur","JOIN");
$joinParam=array($join1,$join2);
$listArticle=$mArticle->lister($search,$column,$objet,$joinParam);


$loaderfile = new Twig_Loader_Filesystem('view/');
$twig = new Twig_Environment($loaderfile);
echo $twig->render('accueil.html',array('categorie'=>$listeoCategorie,'articlesSlide'=>$listArticleNouveau,'articles'=>$listArticle,'message'=>$message,'session'=>$session));
?>
<?php
require "vendor/autoload.php";
include "Autoload.php";
include "funct/session.php";

$message=array("message"=>"error");
if(isset($_POST['idArticle'])){
	//recuperation de l'article
	$mArticle= new ManagerArticle();
	$search=array("t.idArticle"=>$_POST['idArticle'],"v.idVendeur"=>$_POST['idVendeur']);
	$objet=null;

	//colonne affiché
	$column=["designation","prix","imageUrl","t.idArticle","v.idVendeur","nomVendeur"];

	//param jointure
	$join1=array("ArticleVendeur as av","av.idArticle=t.idArticle","JOIN");
	$join2=array("Vendeur as v","v.idVendeur=av.idVendeur","JOIN");
	$join3=array("Categorie as c","c.idCategorie=t.idCategorie","JOIN");
	$joinParam=array($join1,$join2,$join3);

	//recherche
	$article=$mArticle->lister($search,$column,$objet,$joinParam);
	$article=$article[0];	
	$article["quantite"]=1;
	//unset($_COOKIE['panier']);
	if(isset($_COOKIE['panier'])){
		$panier = unserialize($_COOKIE['panier']);
		$saute=false;
		foreach($panier as $index => $pan){
			if($pan['idVendeur']==$article['idVendeur'] && $pan['idArticle']==$article['idArticle']){
				if(isset($_POST['quantite']) && !empty($_POST['quantite'])){
					$pan['quantite']=$_POST['quantite'];
					$panier[$index]=$pan;
				}
				
				$saute=true;
			}
		}
		if(!$saute)
			$panier[]=$article;
		setcookie('panier', serialize($panier), time()+3600);
	}
	else{
		
		setcookie('panier', serialize(array($article)), time()+3600);
		$panier = unserialize($_COOKIE['panier']);
	}
	
	$message=array("message"=>"success");
}


$loaderfile = new Twig_Loader_Filesystem('view/');
$twig = new Twig_Environment($loaderfile);

echo $twig->render("ajaxReponse/json.html", array("nbPanier"=>count($panier),"session"=>$session));
?>
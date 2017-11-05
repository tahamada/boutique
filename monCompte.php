<?php
require "vendor/autoload.php";
include "Autoload.php";
include "funct/listCategorie.php";
include "funct/session.php";

if(isset($_GET['idClient']) && isset($_SESSION['user']) && $_SESSION['user']["idClient"]=$_GET['idClient']){
	//recuperation du detail du client
	$mClient=Manager::getInstance();
	$mClient::setTable("Client");
	$objet=false;
	$colonne=['idClient','nom','prenom','email','adresse','telephone','password','token'];
	$search=array("idClient"=>$_SESSION['user']["idClient"]);
	$client=$mClient::lister($search,$colonne,$objet);
	$client=$client[0];

	//mise a jour des donnée	
	if(isset($_POST['modifClientSubmit'])){
		$message=array(1,"Mise a jour réussit");
		$mClient=Manager::getInstance();
		$mClient::setTable("Client");
		try{
			if(empty(trim($_POST['password'])))
				$_POST['password']=$client['password'];
			$_POST['idClient']=$client['idClient'];
			$_POST['token']=$client['token'];
			$oClient=new Client($_POST);
			$mClient::enregistrer($oClient,true);
			$client=$mClient::lister($search,$colonne,$objet);
			$client=$client[0];
		}
		catch(Exception $e){
			$message=array(0,$e->getMessage());
		}
	}
	
	//recuperation des commandes du client
	$mCommande=Manager::getInstance();
	$mCommande::setTable("Commande");
	$objet=false;
	$colonne=[];
	$search=array("idClient"=>$_SESSION['user']["idClient"]);
	$join1=array("CommandeArticle as ca","ca.idCommande=t.idCommande","JOIN");
	$join2=array("ArticleVendeur as av","av.idArticle=ca.idArticle","JOIN");
	$join3=array("Article as a","a.idArticle=av.idArticle","JOIN");
	$join4=array("Vendeur as v","av.idVendeur=v.idVendeur","JOIN");
	$joinParam=array($join1,$join2,$join3,$join4);
	$commandes=$mCommande::lister($search,$colonne,$objet,$joinParam);

	//recuperation des reservations du client
	$mReservation=Manager::getInstance();
	$mReservation::setTable("Reservation");
	$objet=false;
	$colonne=[];
	$search=array("idClient"=>$_SESSION['user']["idClient"]);
	$join1=array("ArticleVendeur as av","av.idArticle=t.idArticle","JOIN");
	$join2=array("Article as a","a.idArticle=av.idArticle","JOIN");
	$join3=array("Vendeur as v","av.idVendeur=v.idVendeur","JOIN");
	$joinParam=array($join1,$join2,$join3);
	$reservations=$mReservation::lister($search,$colonne,$objet,$joinParam);
}
else
	header("location:/");

$loaderfile = new Twig_Loader_Filesystem('view/');
$twig = new Twig_Environment($loaderfile);
echo $twig->render('monCompte.html', array('categorie'=>$listeoCategorie,'client'=>$client,'reservations'=>$reservations,'commandes'=>$commandes,'message'=>$message,'session'=>$session,'detail'=>''));
?>
<?php
require "vendor/autoload.php";
include "Autoload.php";
include "funct/session.php";

if(isset($_SESSION['user']['role']) && $_SESSION['user']['role']=="vendeur"){  
	if(isset($_POST['enregistrer'])){
		$_POST['nom'];
		$mCategorie=Manager::getInstance();
		$mCategorie::setTable("Categorie");
		$oCategorie=new Categorie($_POST);
		try{
			$mCategorie::enregistrer($oCategorie);
		}
		catch(Exception $e){
			var_dump($e->getMessage());
		}
	}

	if(isset($_POST['supprimer'])){
		$mCategorie=Manager::getInstance();
		$mCategorie::setTable("Categorie");
		$idCategorie=key($_POST['supprimer']);
		$oCategorie= $mCategorie::lister(array('idCategorie'=>$idCategorie))[0];
		$mCategorie::supprimer($oCategorie);
	}

	include "funct/listCategorie.php";

	$loaderfile = new Twig_Loader_Filesystem('view/');
	$twig = new Twig_Environment($loaderfile);
	echo $twig->render('gestionCategorie.html', array('categorie'=>$listeoCategorie));
	
}
else
    header("location:/");
?>
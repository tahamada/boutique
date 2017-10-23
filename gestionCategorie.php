<?php
require "vendor/autoload.php";
include "Autoload.php";

if(isset($_POST['enregistrer'])){
	$_POST['nom'];
	$mCategorie=new ManagerCategorie();
	$oCategorie=new Categorie($_POST);
	try{
		$mCategorie->enregistrer($oCategorie);
	}
	catch(Exception $e){
		var_dump($e->getMessage());
	}
}

if(isset($_POST['supprimer'])){
	$mCategorie=new ManagerCategorie();
	$idCategorie=key($_POST['supprimer']);
	$oCategorie= $mCategorie->lister(array('idCategorie'=>$idCategorie))[0];
	$mCategorie->supprimer($oCategorie);
}

include "funct/listCategorie.php";

$loaderfile = new Twig_Loader_Filesystem('view/');
$twig = new Twig_Environment($loaderfile);
echo $twig->render('gestionCategorie.html', array('categorie'=>$listeoCategorie));
?>
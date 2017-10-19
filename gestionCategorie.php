<?php
require "vendor/autoload.php";
include "Autoload.php";
include "funct/listCategorie.php";

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

$loaderfile = new Twig_Loader_Filesystem('view/');
$twig = new Twig_Environment($loaderfile);
echo $twig->render('gestionCategorie.html', array('categorie'=>$listeoCategorie));
?>
<?php
require "vendor/autoload.php";
include "Autoload.php";

$message=array();
if(isset($_POST['idArticle'])){
	$mMessage=new ManagerMessage();
        $idVendeur=1;
	$objet=false;
	$column=["contenu","date","c.nom","c.prenom"];
	$search=array("reclamation"=>"null","t.idArticle"=>$_POST['idArticle']);
	$join1=array("Client as c","c.idClient=t.idPersonne","JOIN");
	$join2=array("Article as a","a.idArticle=t.idArticle","JOIN");
	$joinParam=array($join1,$join2);
	$message=$mMessage->lister($search,$column,$objet,$joinParam);
}


$loaderfile = new Twig_Loader_Filesystem('ajaxReponse/');
$twig = new Twig_Environment($loaderfile);

$reponse=array("message"=>"success");
echo $twig->render('commentaire.html', array("reponse"=>$message));
?>
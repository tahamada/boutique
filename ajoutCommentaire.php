<?php
require "vendor/autoload.php";
include "Autoload.php";
include "funct/session.php";

$message=array();
if(isset($_POST['idArticle'])){
	$_POST['date']=date("Y-m-d H:i:s");
	$mMessage=new ManagerMessage();
	$oMessage=new Message($_POST);
        $idVendeur=1;
	var_dump($oMessage);
	$message=$mMessage->enregistrer();
}


$loaderfile = new Twig_Loader_Filesystem('ajaxReponse/');
$twig = new Twig_Environment($loaderfile);

$reponse=array("message"=>"success");
echo $twig->render('commentaire.html', array("reponse"=>$message,"session"=>$session));
?>
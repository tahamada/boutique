<?php
require "vendor/autoload.php";
include "Autoload.php";
include "funct/session.php";

$message=array();
if(isset($_POST['idArticle'])){
	$_POST['date']=date("Y-m-d H:i:s");
	$_POST['visible']=1;
	$mMessage=Manager::getInstance();
	$mMessage::setTable("Message");
	$oMessage=new Message($_POST);
	try{
		$idMessage=$mMessage::enregistrer($oMessage);
	}catch(Exception $e){
		$message=array("error"=>$e->getMessage());
	}
}


$loaderfile = new Twig_Loader_Filesystem('view/');
$twig = new Twig_Environment($loaderfile);

$reponse=array("message"=>"success");
echo $twig->render('ajaxReponse/json.html', array("reponse"=>$message,"session"=>$session));
?>
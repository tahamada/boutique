<?php
require "vendor/autoload.php";
include "Autoload.php";
include "funct/listCategorie.php";
include "funct/session.php";

$reponse=array("message"=>"error");

if(isset($_POST['email'])){
	$mClient=Manager::getInstance();
	$mClient::setTable("Client");
	$colonne=[];
	$objet=false;
	$search=array("email"=>$_POST['email'],'password'=>hash ("sha256", $_POST['password']));
	$clientTrouve=$mClient::lister($search,$colonne,$objet);
	if(count($clientTrouve)>0){
		if($clientTrouve[0]['valide']!=0){
			$_SESSION['user']=$clientTrouve[0];
			$_SESSION['user']["token"]=null;
			$_SESSION['user']["password"]=null;
			$reponse=array("message"=>"success");
		}
		else
			$reponse=array("message"=>"valide");

	}
}


$loaderfile = new Twig_Loader_Filesystem('view/');
$twig = new Twig_Environment($loaderfile);


echo $twig->render('ajaxReponse/json.html', array("reponse"=>$reponse));
?>
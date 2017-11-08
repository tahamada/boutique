<?php
require "vendor/autoload.php";
include "Autoload.php";
include "funct/listCategorie.php";
include "funct/session.php";

$reponse=array("message"=>"error");

if(isset($_POST['email'])){
	$mClient=Manager::getInstance();
	$mClient::setTable("Vendeur");
	$colonne=[];
	$objet=false;
	$search=array("email"=>$_POST['email'],'password'=>hash ("sha256", $_POST['password']));
	$join1=array("Client as c","c.idClient=t.idClient","JOIN");
	$joinParam=array($join1);
	$clientTrouve=$mClient::lister($search,$colonne,$objet,$joinParam);
	if(count($clientTrouve)>0){
		if($clientTrouve[0]['valide']!=0){
			$_SESSION['user']=$clientTrouve[0];
			$_SESSION['user']["token"]=null;
			$_SESSION['user']["password"]=null;
			$_SESSION['user']['role']="vendeur";
			$reponse=array("message"=>"success");

        	$_SESSION['message']=array(1,"Connexion reussit");
        	header("location:/");
		}
		else
			$reponse=array("message"=>array(1,"Validé votre email"));

	}else
		$reponse=array("message"=>array(0,"Mauvais identifiants"));
		
}
$loaderfile = new Twig_Loader_Filesystem('view/');
$twig = new Twig_Environment($loaderfile);


echo $twig->render('connexionAdmin.html', array('categorie'=>$listeoCategorie,"reponse"=>$reponse,"adminMode"=>"","session"=>$session,"idClient"=>$idClient,'message'=>$message));
?>
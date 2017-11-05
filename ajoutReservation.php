<?php
require "vendor/autoload.php";
include "Autoload.php";
include "funct/session.php";

$reponse=array("message"=>"success");
if(isset($_POST['idArticle'])){
    $_POST['date']=date("Y-m-d H:i:s");
    $_POST['idClient']=$_SESSION['user']["idClient"];
    $mReservation=Manager::getInstance();
	$mReservation::setTable("Reservation");
    $oReservation=new Reservation($_POST);
    try{
        $idReservation=$mReservation::enregistrer($oReservation);
    }catch(Exception $e){
        $message=array("message"=>"error","error"=>$e->getMessage());
    }
}


$loaderfile = new Twig_Loader_Filesystem('view/');
$twig = new Twig_Environment($loaderfile);


echo $twig->render('ajaxReponse/json.html', array("reponse"=>$message,"session"=>$session));
?>
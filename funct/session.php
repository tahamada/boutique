<?php
session_start();
$session=null;
$idClient=null;
if(isset($_SESSION['message'])){
	$message=$_SESSION['message'];	
	unset($_SESSION['message']);
}
else
	$message=array();
if(isset($_SESSION['user'])){
	$idClient=$_SESSION['user']["idClient"];
	$session['val']=$_SESSION['user'];
}

if(isset($_GET["deconnexion"])){
	unset($_SESSION['user']);
	$session=null;
	header("location:/");
}
?>

<?php
session_start();
$session=null;
if(isset($_SESSION['message'])){
	$message=$_SESSION['message'];	
	unset($_SESSION['message']);
}
else
	$message=array();
if(isset($_SESSION['user'])){
	$session="ok";
}

if(isset($_GET["deconnexion"])){
	unset($_SESSION['user']);
	$session=null;
}
?>

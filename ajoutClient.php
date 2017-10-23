<?php
require "vendor/autoload.php";
include "Autoload.php";
include "funct/listCategorie.php";

if(isset($_POST["inscriptionSubmit"])){ 
    
}

$loaderfile = new Twig_Loader_Filesystem('view/');
$twig = new Twig_Environment($loaderfile);
echo $twig->render('ajoutClient.html', array('categorie'=>$listeoCategorie));
?>
<?php
require "vendor/autoload.php";
include "Autoload.php";
include "funct/listCategorie.php";

if(isset($_POST["inscriptionSubmit"])){ 
    $extentionValide=false;
    var_dump($_POST);
    var_dump($_FILES);
    $mArticle= new ManagerArticle();
    
    //Partie gestion de l'image
    $_FILES['Fichier_1']['name'];     //Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_icone.png).
    $_FILES['Fichier_1']['type'];     //Le type du fichier. Par exemple, cela peut être « image/png ».
    $_FILES['Fichier_1']['size'];     //La taille du fichier en octets.
    $_FILES['Fichier_1']['tmp_name']; //L'adresse vers le fichier uploadé dans le répertoire temporaire.
    $_FILES['Fichier_1']['error'];    //Le code d'erreur, qui permet de savoir si le fichier a bien été uploadé.
    if ($_FILES['Fichier_1']['error'] > 0) 
        $erreur = "Erreur lors du transfert";//a gerer plus tard si j'ai le temps
   
    var_dump($mArticle->enregistrerArticle($_POST,$_FILES));
}

$loaderfile = new Twig_Loader_Filesystem('view/');
$twig = new Twig_Environment($loaderfile);
echo $twig->render('ajoutArticle.html', array('categorie'=>$listeoCategorie));
?>
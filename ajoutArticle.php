<?php
require "vendor/autoload.php";
include "Autoload.php";
include "funct/session.php";

if(isset($_SESSION['user']['role']) && $_SESSION['user']['role']=="vendeur"){    
    include "funct/listCategorie.php";
    $message=null;
    if(isset($_POST["inscriptionSubmit"])){ 
        $extentionValide=false;
        $mArticle= new ManagerArticle();
        
        //Partie gestion de l'image
        $_FILES['Fichier_1']['name'];     //Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_icone.png).
        $_FILES['Fichier_1']['type'];     //Le type du fichier. Par exemple, cela peut être « image/png ».
        $_FILES['Fichier_1']['size'];     //La taille du fichier en octets.
        $_FILES['Fichier_1']['tmp_name']; //L'adresse vers le fichier uploadé dans le répertoire temporaire.
        $_FILES['Fichier_1']['error'];    //Le code d'erreur, qui permet de savoir si le fichier a bien été uploadé.
        if ($_FILES['Fichier_1']['error'] > 0) 
            $erreur = "Erreur lors du transfert";//a gerer plus tard si j'ai le temps
       
        try{
            if($mArticle->enregistrerArticle($_POST,$_FILES)[0]){
                $message=array(1,"Ajout reussit");        
            }
            else
                $message=array(0,$mArticle->enregistrerArticle($_POST,$_FILES)[1]);
        }catch(Exception $e){
            $message=array(0,$e->getMessage());
        }        
        
    }

    $loaderfile = new Twig_Loader_Filesystem('view/');
    $twig = new Twig_Environment($loaderfile);
    echo $twig->render('ajoutArticle.html', array('categorie'=>$listeoCategorie,'message'=>$message,"session"=>$session));
   
}
else
    header("location:/");
?>
<?php
class ManagerArticle extends Manager
{ 

    public function __construct()
    {
        parent::__construct();
    }
    
    public function enregistrerArticle($post,$file)
    {         
        $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
        $extension_upload = strtolower(  substr(  strrchr($file['Fichier_1']['name'], '.')  ,1)  );
        if ( in_array($extension_upload,$extensions_valides) ) 
           $extentionValide=true; 
        else
            var_dump("mauvais type de fichier");
        
        $randomNom=md5(uniqid(rand(), true));
        $nom = "images/article/".$randomNom.".".$extension_upload;              
        
        $post["idVendeur"]=1;
        $post["imageUrl"]=$nom;
        $oArticle=new Article($post);
        $oArticleVendeur=new ArticleVendeur($post);
        $mArticle=new ManagerArticle();        
        
        $mArticle->Bdd()->beginTransaction();
        $error=false;
        try{
            var_dump($mArticle->enregistrer($oArticle));
        }catch(Exception $e){
            $error=true;
        }
        //deplacement du fichier apres l'enregistrement
        $resultat = move_uploaded_file($file['Fichier_1']['tmp_name'],$nom);
        
        if ($resultat) 
            var_dump("Transfert réussi");   
        
        //Image redimentionné
        $width=200;
        $height=100;
        $nomRed = "images/article/".$randomNom."Mini.".$extension_upload;
        $rImage=new Imagine\Gd\Imagine();
        $rImage->open($nom)->resize(new Imagine\Image\Box($width,$height))->save($nomRed);
        
        var_dump($oArticle,$oArticleVendeur);
    }
}
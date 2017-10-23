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
        $idVendeur=1; //plus tard

        $post["idVendeur"]=$idVendeur;
        $post["imageUrl"]=$nom;
        $oArticle=new Article($post);        
        $mArticle=new ManagerArticle();        
        $mArticleVendeur=new ManagerArticleVendeur();        
        
        $mArticle->Bdd()->beginTransaction();
        $error=false;
        try{
            $idArticle=$mArticle->enregistrer($oArticle)[1];
            $mArticle->Bdd()->commit();
           // $idArticle=$mArticle->Bdd()->lastInsertId();
            $post["idArticle"]=$idArticle;
            $oArticleVendeur=new ArticleVendeur($post);
            $mArticleVendeur->enregistrer($oArticleVendeur);
        }catch(PDOExecption $e){
            $error=true;
            $mArticle->Bdd()->rollback();
            $mArticleVendeur->Bdd()->rollback(); 
            $message=$e->getMessage();
        }catch(Execption $e){
            $error=true;
        }

        if(!$error){            
            //deplacement du fichier apres l'enregistrement
            $resultat = move_uploaded_file($file['Fichier_1']['tmp_name'],$nom);
            
            if ($resultat){ 
                //var_dump("Transfert réussi"); 
            }  
            
            //Image redimentionné
            $width=200;
            $height=100;
            $nomRed = "images/article/".$randomNom."Mini.".$extension_upload;
            $rImage=new Imagine\Gd\Imagine();
            $rImage->open($nom)->resize(new Imagine\Image\Box($width,$height))->save($nomRed);
                return array(true,"Ajout d'article reussi");
        }
        else{
            return array(false,$message);
        }

            
        //var_dump($oArticle,$oArticleVendeur);
    }
}
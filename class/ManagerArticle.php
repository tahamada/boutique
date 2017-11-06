<?php
class ManagerArticle extends Manager
{ 

    public function __construct()
    {
        
    }
    
    /*
    * Methode gerant l'enregistrement en base d'un article (insert dans les table Article et ArticleVendeur)
    **/
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
        $mArticle= Manager::getInstance();
        $mArticle::setTable("Article");           
        
        $mArticle::Bdd()->beginTransaction();
        $error=false;
        try{
            //verifie si l'article est deja vendu par vendeur
            $search=array("designation"=>$oArticle->Designation(),"idVendeur"=>$idVendeur);
            $joinParam=array(array("ArticleVendeur as AV","AV.idArticle=t.idArticle","JOIN"));
            $articleVendeurTrouve=$mArticle->lister($search,[],false,$joinParam);
            if(count($articleVendeurTrouve)>0){
                return array(false,"Article déjà possédé");
            }
            else{
                //verifier si l'article existe deja
                $search=array("designation"=>$oArticle->Designation());
                
                $articleTrouve=$mArticle->lister($search);
                if(count($articleTrouve)==0){                    
                    $idArticle=$mArticle->enregistrer($oArticle)[1];
                    $mArticle::Bdd()->commit();
                }
                else{
                    $idArticle=$articleTrouve[0]->IdArticle();
                }

               // $idArticle=$mArticle->Bdd()->lastInsertId();
                $post["idArticle"]=$idArticle;
                $oArticleVendeur=new ArticleVendeur($post);
                $mArticle::setTable("ArticleVendeur");  
                $mArticle->enregistrer($oArticleVendeur);
            }
            
        }catch(PDOException $e){
            $error=true;
            $mArticle::Bdd()->rollback(); 
            $message=$e->getMessage();
        }catch(Exception $e){
            $error=true;
            $message=$e->getMessage();
        }

        if(!$error){            
            //deplacement du fichier apres l'enregistrement
            $resultat = move_uploaded_file($file['Fichier_1']['tmp_name'],$nom);
            
            if ($resultat){ 
                //var_dump("Transfert réussi"); 
            }  
            
            //Image redimentionné
            $width=400;
            $height=200;
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
<?php
abstract Class Manager implements Enregistrable{
	const BDD_PARAM=array("mysql:host=localhost;dbname=boutique;charset=utf8","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	private $_bdd;
	public function __construct()
	{
		try
		{
			$bdd= new PDO(self::BDD_PARAM[0],self::BDD_PARAM[1],self::BDD_PARAM[2],self::BDD_PARAM[3]); 	
			$this->setBdd($bdd);		
			
		}catch(Exception $e){
			die("Erreur: ".$e->getMessage());
		}

	}

    /**
     * @return mixed
     */
    public function Bdd()
    {
        return $this->_bdd;
    }

    /**
     * @param mixed $_bdd
     *
     * @return self
     */
    public function setBdd($_bdd)
    {
        $this->_bdd = $_bdd;

        return $this;
    }
    public function getTable(){
    	return str_replace("Manager","",get_Class($this));
    } 

    //retourne la liste des colonnes et les cle primairesde la table
    public function getAttr(){
    	$table= $this->getTable();  	
    	//colonne
    	$r = $this->Bdd()->prepare("DESCRIBE $table");
		$r->execute();
		$table_colonne = $r->fetchAll(PDO::FETCH_COLUMN);
		//primary key
		$rprimary = $this->Bdd()->prepare("SHOW KEYS FROM $table WHERE Key_name = 'PRIMARY'");
		$rprimary->execute();
		$table_primarykey = $rprimary->fetchAll();
		$pk=[];
		foreach($table_primarykey as $keytable){
			$pk[]=$keytable[4];
		}
		return array("columns"=>$table_colonne,"pk"=>$pk);
    }

    public function enregistrer($objet,$update=null){
    	$table= $this->getTable(); 
		$AtrrArray=$this->getAttr();
    	if($update==null){
    		//creation de la partie value pour une insertion
    		$value="";
			$i=0;
			foreach($AtrrArray['columns'] as $column){
				$value.=":".$column;
				if($i<count($AtrrArray['columns'])-1)
					$value.=",";
				$i++;
			}				

			$req=$this->Bdd()->prepare("INSERT INTO $table values($value)");
		}		
		else{
			//partie where cle primaire
			$pkvalue="";
			$i=0;
			foreach($AtrrArray['pk'] as $pk){
				$pkvalue.=$pk."=:".$pk;
				if($i<count($AtrrArray['pk'])-1)
					$pkvalue.=" and ";
				$i++;
			}

			if($i==0){
				$pkvalue.=$AtrrArray['columns'][0]."=:".$AtrrArray['columns'][0];
			}

			//partie modification SET
			$setvalue="";
			$i=0;
			foreach($AtrrArray['columns'] as $column){
				if(!in_array($column,$AtrrArray['pk'])){
					$setvalue.=$column."=:".$column;
					if($i<count($AtrrArray['columns'])-1)
						$setvalue.=",";
				}
				$i++;
			}

			$req=$this->Bdd()->prepare("UPDATE $table SET $setvalue WHERE $pkvalue");
		}

		//tableau preparer
		$prepArray=[];

		foreach($AtrrArray['columns'] as $column){
			$prepArray[$column] = $objet->$column();
		}
		//try{
		$execResult=$req->execute($prepArray);
		return array($execResult,$this->Bdd()->lastInsertId());
		/*}catch(PDOExecption $e){
			//throw new Exception($e->getMessage());
		}*/
    }

    public function supprimer($objet){
    	$table= $this->getTable(); 
    	$AtrrArray=$this->getAttr();
    	//where
    	$where="";
		$i=0;
		foreach($AtrrArray['pk'] as $pk){
			$where.=$pk."='".$objet->$pk()."'";
			if($i<count($AtrrArray['pk'])-1)
				$where.=" and ";
			$i++;
		}		
		
		$req=$this->Bdd()->prepare("DELETE from $table WHERE $where");
		$req->execute();
	}

	public function lister($value=null,$column=[],$objet=true,$joinParam=null,$order=null,$limit=null,$offset=null){
		$table= $this->getTable(); 

		$arrayexecute=[];
		$ClientArray=[];
		
		//traitement du tri
		if($order!=null){
			$order="ORDER BY ".$order;
		}
		else
			$order="";

		//traitement du limit et du offset
		if($limit!=null){
			$limit= "LIMIT ".$limit;
		}
		else
			$limit="";

		if($offset!=null){
			$offset= "OFFSET ".$offset;
		}
		else
			$offset="";


		//traitement des jointure
		if($joinParam!=null){
			$joinType=$joinParam[2];
			$joinTable=$joinType." ".$joinParam[0];
			$joinOn="ON ".$joinParam[1];
			
		}
		else{
			$joinTable="";
			$joinOn="";
		}

		//gestion des colonnes
		if(empty($column))
			$column="*";
		else
			$column=implode(",",$column);

		//Si aucune valeur rechercher affiche tout sinon recherche filtré
		if($value==null)
			$req=$this->Bdd()->prepare("select distinct $column from $table as t $joinTable $joinOn $order $limit $offset");
		else{
			$where="";
			$i=0;
			include_once "funct/whereCreate.php";
			foreach($value as $key=>$val){
				if(strpos($val," or ")!==false){
					$or=explode(" or ",$val);
					$where.="(".whereCreate($key,$or[0],$arrayexecute)." or ".whereCreate($key,$or[1],$arrayexecute).")";
				}
				else					
					$where.=whereCreate($key,$val,$arrayexecute);
				if($i<count($value)-1)
					$where.=" and ";
				$i++;
			}	
			$req=$this->Bdd()->prepare("select * from $table as t $joinTable $joinOn where $where $order $limit $offset");
			
		}
		$req->execute($arrayexecute);
		
		while($row=$req->fetch(PDO::FETCH_ASSOC)){
			if($objet)
				$ClientArray[]=new $table($row);
			else
				$ClientArray[]=$row;
			//$p->afficher();
		}
		return $ClientArray;
	}

    
}
?>
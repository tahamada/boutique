<?php
Class Manager implements Enregistrable{
	const BDD_PARAM=array("mysql:host=localhost;dbname=boutique;charset=utf8","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	private static $_bdd;
	private static $_table;
	private static $_instance;
	private function __construct()
	{
		try
		{
			$bdd= new PDO(self::BDD_PARAM[0],self::BDD_PARAM[1],self::BDD_PARAM[2],self::BDD_PARAM[3]); 	
			self::$_bdd=$bdd;		
			
		}catch(Exception $e){
			//die("Erreur: ".$e->getMessage());
			die("Erreur de connexion à la base de données ");
		}

	}

	private function __clone() { } // clonage private
	
	public static function getInstance()
	{
		if (!isset(self::$_instance)) // pas encore instanciee
		{

			self::$_instance = new self; // instanciation
		}
		return self::$_instance;
	}


    /**
     * @return mixed
     */
    public static function Bdd()
    {
        return self::$_bdd;
    }

    /**
     * @param mixed $_bdd
     *
     * @return self
     */
    public static function setBdd($_bdd)
    {
        self::$_bdd = $_bdd;

        return self::getInstance();
    }


    public static function Table(){
    	return self::$_table;
    } 



    /**
     * @param mixed $table
     *
     * @return self
     */
    public static function setTable($table)
    {
        self::$_table = $table;

        return self::getInstance();
    }



    //retourne la liste des colonnes et les cle primairesde la table
    public static function getAttr(){
    	$table= self::Table();  	
    	//colonne
    	$r = self::Bdd()->prepare("DESCRIBE $table");
		$r->execute();
		$table_colonne = $r->fetchAll(PDO::FETCH_COLUMN);
		//primary key
		$rprimary = self::Bdd()->prepare("SHOW KEYS FROM $table WHERE Key_name = 'PRIMARY'");
		$rprimary->execute();
		$table_primarykey = $rprimary->fetchAll();
		$pk=[];
		foreach($table_primarykey as $keytable){
			$pk[]=$keytable[4];
		}
		return array("columns"=>$table_colonne,"pk"=>$pk);
    }

    public static function enregistrer($objet,$update=null){
    	$table= self::Table(); 
		$AtrrArray=self::getAttr();
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

			$req=self::Bdd()->prepare("INSERT INTO $table values($value)");
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

			$req=self::Bdd()->prepare("UPDATE $table SET $setvalue WHERE $pkvalue");
		}

		//tableau preparer
		$prepArray=[];

		foreach($AtrrArray['columns'] as $column){
			$prepArray[$column] = $objet->$column();
		}
		//try{
		$execResult=$req->execute($prepArray);
		return array($execResult,self::Bdd()->lastInsertId());
		/*}catch(PDOExecption $e){
			//throw new Exception($e->getMessage());
		}*/
    }

    public static function supprimer($objet){
    	$table= self::Table(); 
    	$AtrrArray=self::getAttr();
    	//where
    	$where="";
		$i=0;
		foreach($AtrrArray['pk'] as $pk){
			$where.=$pk."='".$objet->$pk()."'";
			if($i<count($AtrrArray['pk'])-1)
				$where.=" and ";
			$i++;
		}		
		
		$req=self::Bdd()->prepare("DELETE from $table WHERE $where");
		$req->execute();
	}

	public static function lister($value=null,$column=[],$objet=true,$joinParams=null,$order=null,$limit=null,$offset=null){
		$table= self::Table(); 

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
		$join="";
		if($joinParams!=null){			
			foreach($joinParams as $joinParam){
				$joinType=$joinParam[2];
				$joinTable=$joinType." ".$joinParam[0];
				$joinOn="ON ".$joinParam[1];
				$join.=" ".$joinTable." ".$joinOn;
			}
			
		}
		else{
			$joinTable="";
			$joinOn="";
		}

		//gestion des colonnes
		if(empty($column))
			$column="*";
		elseif ($column[0]=="count") {
			$column="count(*) as nb";
		}
		else
			$column=implode(",",$column);

		//Si aucune valeur rechercher affiche tout sinon recherche filtré
		if($value==null)
			$req=self::Bdd()->prepare("select distinct $column from $table as t $join $order $limit $offset");
		else{
			$where="";
			$i=0;
			foreach($value as $key=>$val){
				if(strpos($val," or ")!==false){
					$or=explode(" or ",$val);
					$where.="(".Fonction::whereCreate($key,$or[0],$arrayexecute)." or ".Fonction::whereCreate($key,$or[1],$arrayexecute).")";
				}
				else					
					$where.=Fonction::whereCreate($key,$val,$arrayexecute);
				if($i<count($value)-1)
					$where.=" and ";
				$i++;
			}	
			$req=self::Bdd()->prepare("select $column from $table as t $join where $where $order $limit $offset");
			
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
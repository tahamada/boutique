<?php
Class Model{
	/**
	 * Class Constructor
	 * 
	 */
	public function __construct($tuple)
	{
		$this->hydrate($tuple);
	}

	public function hydrate($tuple)
    {
    	foreach($tuple as $key=>$value)
    	{
    		$method='set'.ucfirst($key);
    		if(method_exists($this, $method))
    		{
    			$this->$method($value);
    		}
    	}
    }

    //verifie si la chaine est vide. Lance une exception si c'est le cas.
    public function verifVide($nomChamp,$valeur){
        if(empty($valeur)){
            throw new Exception("Veuillez remplir le champ $nomChamp");
        }
        else
            return true;
    }

    //verifie si la taille de notre valeur est inferieur à $infval. Lance une exception si c'est le cas.
    public function verifTailleInf($nomChamp,$valeur,$infval){
        if(strlen($valeur)<$infval){
            throw new Exception("Le champ $nomChamp doit contenir plus de $infval caractère(s)");
        }
        else
            return true;
    }

    //verifie si la taille de notre valeur est supérieur à $supval. Lance une exception si c'est le cas.
    public function verifTailleSup($nomChamp,$valeur,$supval){
        if(strlen($valeur)>$supval){
            throw new Exception("Le champ $nomChamp doit contenir moins de $supval caractère(s)");
        }
        else
            return true;
    }

    //verifie si la valeur contient uniquement des lettres (pas de nombres)
    public function verifChaineSansNombre($nomChamp,$valeur){
        $pattern = '#^([a-z]+(( \')[a-z]+)*)+([-]([a-z]+(( \')[a-z]+)*)+)*$#iu';
        preg_match($pattern, $valeur, $matches);
        if(count($matches)<1){
                 throw new Exception("Le champ $nomChamp doit contenir que des lettres");
        }
        else
            return true;
    }

    //verifie si la valeur est un email
    public function verifEmail($nomChamp,$valeur){
        if(!filter_var($valeur, FILTER_VALIDATE_EMAIL))
             throw new Exception("Le champ $nomChamp doit contenir un email valide");
         else
            return true;
    }
}
?>
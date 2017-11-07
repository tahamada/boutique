
<?php

class Client extends Model
{ 
	private $_idClient; 
	private $_nom; 
	private $_prenom;
	private $_email; 
	private $_adresse;
    private $_telephone;
    private $_valide; 
	private $_password; 
    private $_token;
    private $_googleIdentifier;



	/**
	 * Class Constructor
	 * @param    $_idClient   
	 * @param    $_nom   
	 * @param    $_prenom   
	 * @param    $_email   
	 * @param    $_adresse   
	 * @param    $_valide   
	 */
	public function __construct($tuple)
    {
        $this->hydrate($tuple);
    }


    /**
     * @return mixed
     */
    public function IdClient()
    {
        return $this->_idClient;
    }

    /**
     * @param mixed $_idClient
     *
     * @return self
     */
    public function setIdClient($_idClient)
    {
        $this->_idClient = $_idClient;

        return $this;
    }

    /**
     * @return mixed
     */
    public function Nom()
    {
        return $this->_nom;
    }

    /**
     * @param mixed $_nom
     *
     * @return self
     */
    public function setNom($_nom)
    {
        $this->verifTailleInf("nom",$_nom,2);
        $this->verifChaineSansNombre("nom",$_nom);
       
        $this->_nom = $_nom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function Prenom()
    {
        return $this->_prenom;
    }

    /**
     * @param mixed $_prenom
     *
     * @return self
     */
    public function setPrenom($_prenom)
    {
        
        $this->verifTailleInf("prenom",$_prenom,2);
        $this->verifChaineSansNombre("prenom",$_prenom);
       
        $this->_prenom = $_prenom;
            
        return $this;
    }

    /**
     * @return mixed
     */
    public function Email()
    {
        return $this->_email;
    }

    /**
     * @param mixed $_email
     *
     * @return self
     */
    public function setEmail($_email)
    {
        
        $this->verifEmail("email",$_email);
        $this->_email = $_email;
        
        return $this;
    }

    /**
     * @return mixed
     */
    public function Adresse()
    {
        return $this->_adresse;
    }

    /**
     * @param mixed $_adresse
     *
     * @return self
     */
    public function setAdresse($_adresse)
    {
        $this->_adresse = $_adresse;

        return $this;
    }

    /**
     * @return mixed
     */
    public function Valide()
    {
        return $this->_valide;
    }

    /**
     * @param mixed $_valide
     *
     * @return self
     */
    public function setValide($_valide)
    {
        $this->_valide = $_valide;

        return $this;
    }

    /**
     * @return mixed
     */
    public function Password()
    {
        return $this->_password;
    }

    /**
     * @param mixed $_password
     *
     * @return self
     */
    public function setPassword($_password)
    {
        $this->verifTailleInf("mot de passe",$_password,5);
        $this->_password = $_password;        

        return $this;
    }

    /**
     * @return mixed
     */
    public function Token()
    {
        return $this->_token;
    }

    /**
     * @param mixed $_token
     *
     * @return self
     */
    public function setToken($_token)
    {
        $this->_token = $_token;

        return $this;
    }

    /**
     * @return mixed
     */
    public function Telephone()
    {
        return $this->_telephone;
    }

    /**
     * @param mixed $_telephone
     *
     * @return self
     */
    public function setTelephone($_telephone)
    {
        $this->_telephone = $_telephone;

        return $this;
    }

    /**
     * @return mixed
     */
    public function GoogleIdentifier()
    {
        return $this->_googleIdentifier;
    }

    /**
     * @param mixed $_googleIdentifier
     *
     * @return self
     */
    public function setGoogleIdentifier($_googleIdentifier)
    {
        $this->_googleIdentifier = $_googleIdentifier;

        return $this;
    }
} 

?>
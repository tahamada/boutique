
<?php

class Admistrateur extends Model
{ 

	private $_idAdministrateur;  
	private $_nom;   
	private $_prenom;   
	private $_email;   
	private $_adresse;   
	private $_valide;   


	/**
	 * Class Constructor
	 * @param    $_idAdministrateur   
	 * @param    $_nom   
	 * @param    $_prenom   
	 * @param    $_email   
	 * @param    $_adresse   
	 * @param    $_valide   
	 */
	public function __construct($_idAdministrateur, $_nom, $_prenom, $_email, $_adresse, $_valide)
	{
		$this->setIdAdministrateur($_idAdministrateur);
		$this->setNom($_nom);
		$this->setPrenom($_prenom);
		$this->setEmail($_email);
		$this->setAdresse($_adresse);
		$this->setValide($_valide);
	}




    /**
     * @return mixed
     */
    public function IdAdministrateur()
    {
        return $this->_idAdministrateur;
    }

    /**
     * @param mixed $_idAdministrateur
     *
     * @return self
     */
    public function setIdAdministrateur($_idAdministrateur)
    {
        $this->_idAdministrateur = $_idAdministrateur;

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
}
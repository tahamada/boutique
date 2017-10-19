<?php
class Vendeur extends Model
{ 
	private $_idVendeur;
	private $_nom;
	private $_prenom;
	private $_email;
	private $_adresse;
	private $_valide;
	private $_adresseVendeur;
	private $_nomVendeur;


	/**
	 * Class Constructor
	 * @param    $_idVendeur   
	 * @param    $_nom   
	 * @param    $_prenom   
	 * @param    $_email   
	 * @param    $_adresse   
	 * @param    $_valide   
	 * @param    $_adresseVendeur   
	 * @param    $_nomVendeur   
	 */
	public function __construct($tuple)
    {
        $this->hydrate($tuple);
    }


    /**
     * @return mixed
     */
    public function IdVendeur()
    {
        return $this->_idVendeur;
    }

    /**
     * @param mixed $_idVendeur
     *
     * @return self
     */
    public function setIdVendeur($_idVendeur)
    {
        $this->_idVendeur = $_idVendeur;

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

    /**
     * @return mixed
     */
    public function AdresseVendeur()
    {
        return $this->_adresseVendeur;
    }

    /**
     * @param mixed $_adresseVendeur
     *
     * @return self
     */
    public function setAdresseVendeur($_adresseVendeur)
    {
        $this->_adresseVendeur = $_adresseVendeur;

        return $this;
    }

    /**
     * @return mixed
     */
    public function NomVendeur()
    {
        return $this->_nomVendeur;
    }

    /**
     * @param mixed $_nomVendeur
     *
     * @return self
     */
    public function setNomVendeur($_nomVendeur)
    {
        $this->_nomVendeur = $_nomVendeur;

        return $this;
    }
}

?>

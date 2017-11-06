<?php
class Vendeur extends Client
{ 
	private $_idVendeur;
	private $_adresseVendeur;
	private $_nomVendeur;


	/**
	 * Class Constructor
	 * 
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

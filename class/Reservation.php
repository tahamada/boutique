<?php
class Reservation extends Model
{ 
	private $_idArticle; 
    private $_idClient;
	private $_idVendeur;
	private $_quantite; 
	private $_date;
    private $_datePrevue;
    private $_dateRecue;
    private $_etat;


	/**
	 * Class Constructor
	 * @param    $_idArticle   
	 * @param    $_idClient   
	 * @param    $_quantite   
	 * @param    $_date   
	 */
	public function __construct($tuple)
    {
        $this->hydrate($tuple);
    }

    /**
     * @return mixed
     */
    public function IdArticle()
    {
        return $this->_idArticle;
    }

    /**
     * @param mixed $_idArticle
     *
     * @return self
     */
    public function setIdArticle($_idArticle)
    {
        $this->_idArticle = $_idArticle;

        return $this;
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
    public function Quantite()
    {
        return $this->_quantite;
    }

    /**
     * @param mixed $_quantite
     *
     * @return self
     */
    public function setQuantite($_quantite)
    {
        $this->_quantite = $_quantite;

        return $this;
    }

    /**
     * @return mixed
     */
    public function Date()
    {
        return $this->_date;
    }

    /**
     * @param mixed $_date
     *
     * @return self
     */
    public function setDate($_date)
    {
        $this->_date = $_date;

        return $this;
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
    public function DatePrevue()
    {
        return $this->_datePrevue;
    }

    /**
     * @param mixed $_datePrevue
     *
     * @return self
     */
    public function setDatePrevue($_datePrevue)
    {
        $this->_datePrevue = $_datePrevue;

        return $this;
    }

    /**
     * @return mixed
     */
    public function DateRecue()
    {
        return $this->_dateRecue;
    }

    /**
     * @param mixed $_dateRecue
     *
     * @return self
     */
    public function setDateRecue($_dateRecue)
    {
        $this->_dateRecue = $_dateRecue;

        return $this;
    }

    /**
     * @return mixed
     */
    public function Etat()
    {
        return $this->_etat;
    }

    /**
     * @param mixed $_etat
     *
     * @return self
     */
    public function setEtat($_etat)
    {
        $this->_etat = $_etat;

        return $this;
    }
}

?>

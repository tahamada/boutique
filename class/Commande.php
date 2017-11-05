
<?php

class Commande extends Model
{
	private $_idCommande; 
	private $_date;  
	private $_etat;
    private $_idClient;  
    private $_datePrevue;  
	private $_dateRecue;  


	/**
	 * Class Constructor
	 * @param    $_idCommande   
	 * @param    $_date   
	 * @param    $_etat   
	 * @param    $_idClient   
	 */
	public function __construct($tuple)
    {
        $this->hydrate($tuple);
    }

    /**
     * @return mixed
     */
    public function IdCommande()
    {
        return $this->_idCommande;
    }

    /**
     * @param mixed $_idCommande
     *
     * @return self
     */
    public function setIdCommande($_idCommande)
    {
        $this->_idCommande = $_idCommande;

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
} 

?>
<?php

class Retour extends Model
{ 
	private $_idRetour;
	private $_date; 
	private $_etat; 
	private $_idArticle;
	private $_idClient;


	/**
	 * Class Constructor
	 * @param    $_idRetour   
	 * @param    $_date   
	 * @param    $_etat   
	 * @param    $_idArticle   
	 * @param    $_idClient   
	 */
	public function __construct($tuple)
    {
        $this->hydrate($tuple);
    }

    /**
     * @return mixed
     */
    public function IdRetour()
    {
        return $this->_idRetour;
    }

    /**
     * @param mixed $_idRetour
     *
     * @return self
     */
    public function setIdRetour($_idRetour)
    {
        $this->_idRetour = $_idRetour;

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
} 
?>
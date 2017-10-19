<?php
class Reduction extends Model
{ 
	private $_idReduction;  
	private $_idCategorie; 
	private $_idClient; 
	private $_pourcentage;


	/**
	 * Class Constructor
	 * @param    $_idReduction   
	 * @param    $_idCategorie   
	 * @param    $_idClient   
	 * @param    $_pourcentage   
	 */
	public function __construct($tuple)
    {
        $this->hydrate($tuple);
    }

    /**
     * @return mixed
     */
    public function IdReduction()
    {
        return $this->_idReduction;
    }

    /**
     * @param mixed $_idReduction
     *
     * @return self
     */
    public function setIdReduction($_idReduction)
    {
        $this->_idReduction = $_idReduction;

        return $this;
    }

    /**
     * @return mixed
     */
    public function IdCategorie()
    {
        return $this->_idCategorie;
    }

    /**
     * @param mixed $_idCategorie
     *
     * @return self
     */
    public function setIdCategorie($_idCategorie)
    {
        $this->_idCategorie = $_idCategorie;

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
    public function Pourcentage()
    {
        return $this->_pourcentage;
    }

    /**
     * @param mixed $_pourcentage
     *
     * @return self
     */
    public function setPourcentage($_pourcentage)
    {
        $this->_pourcentage = $_pourcentage;

        return $this;
    }
} 

?>

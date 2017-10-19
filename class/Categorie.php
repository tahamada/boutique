<?php
class Categorie extends Model
{
	private $_idCategorie;  
	private $_nom; 


	/**
	 * Class Constructor
	 * @param    $_idCategorie   
	 * @param    $_nom   
	 */
	public function __construct($tuple)
    {
        $this->hydrate($tuple);
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
}

?>
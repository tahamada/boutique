
<?php

class CommandeArticle extends Model
{ 
	private $_idCommande;
	private $_idArticle;
	private $_quantite; 


	/**
	 * Class Constructor
	 * @param    $_idCommande   
	 * @param    $_idArticle   
	 * @param    $_quantite   
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
} 

?>


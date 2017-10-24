<?php
class ArticleVendeur extends Model
{ 
	private $_idArticle; 
	private $_idVendeur; 
	private $_quantite; 
	private $_payableNFois; 
    private $_prix;


	/**
	 * Class Constructor
	 * @param    $_idArticle   
	 * @param    $_idVendeur   
	 * @param    $_quantite   
	 * @param    $_payableNFois   
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
        if(empty($_quantite))
            $_quantite=0;
        $this->_quantite = $_quantite;

        return $this;
    }

    /**
     * @return mixed
     */
    public function PayableNFois()
    {

        return $this->_payableNFois;
    }

    /**
     * @param mixed $_payableNFois
     *
     * @return self
     */
    public function setPayableNFois($_payableNFois)
    {
        if(empty($_payableNFois))
            $_payableNFois=0;
        $this->_payableNFois = $_payableNFois;

        return $this;
    }

    /**
     * @return mixed
     */
    public function Prix()
    {
        return $this->_prix;
    }

    /**
     * @param mixed $_prix
     *
     * @return self
     */
    public function setPrix($_prix)
    {
        $this->_prix = $_prix;

        return $this;
    }
}

?>

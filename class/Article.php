
<?php
class Article extends Model
{ 

	private $_idArticle;
	private $_designation; 
	private $_imageUrl; 
	private $_idCategorie; 
	private $_idVendeur;


	/**
	 * Class Constructor
	 * @param    $_idArticle   
	 * @param    $_designation   
	 * @param    $_imageUrl   
	 * @param    $_idCategorie   
	 * @param    $_idVendeur   
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
    public function Designation()
    {
        return $this->_designation;
    }

    /**
     * @param mixed $_designation
     *
     * @return self
     */
    public function setDesignation($_designation)
    {
        $this->_designation = $_designation;

        return $this;
    }

    /**
     * @return mixed
     */
    public function ImageUrl()
    {
        return $this->_imageUrl;
    }

    /**
     * @param mixed $_imageUrl
     *
     * @return self
     */
    public function setImageUrl($_imageUrl)
    {
        $this->_imageUrl = $_imageUrl;

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
}
?>
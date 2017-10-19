<?php

class Message extends Model
{ 
	private $_idMessage;  
	private $_date;   
	private $_contenu;   
	private $_vendeur;   
	private $_reclamation;   
	private $_idPersonne;   
	private $_idArticle; 


	/**
	 * Class Constructor
	 * @param    $idMessage   
	 * @param    $date   
	 * @param    $contenu   
	 * @param    $vendeur   
	 * @param    $reclamation   
	 * @param    $idPersonne   
	 * @param    $idArticle   
	 */
	public function __construct($tuple)
    {
        $this->hydrate($tuple);
    }

    /**
     * @return mixed
     */
    public function getIdMessage()
    {
        return $this->_idMessage;
    }

    /**
     * @param mixed $idMessage
     *
     * @return self
     */
    public function setIdMessage($idMessage)
    {
        $this->_idMessage = $idMessage;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->_date;
    }

    /**
     * @param mixed $date
     *
     * @return self
     */
    public function setDate($date)
    {
        $this->_date = $date;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getContenu()
    {
        return $this->_contenu;
    }

    /**
     * @param mixed $contenu
     *
     * @return self
     */
    public function setContenu($contenu)
    {
        $this->_contenu = $contenu;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getVendeur()
    {
        return $this->_vendeur;
    }
_
    /**
     * @param mixed $vendeur
     *
     * @return self
     */
    public function setVendeur($vendeur)
    {
        $this->_vendeur = $vendeur;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getReclamation()
    {
        return $this->_reclamation;
    }

    /**
     * @param mixed $reclamation
     *
     * @return self
     */
    public function setReclamation($reclamation)
    {
        $this->_reclamation = $reclamation;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdPersonne()
    {
        return $this->_idPersonne;
    }

    /**
     * @param mixed $idPersonne
     *
     * @return self
     */
    public function setIdPersonne($idPersonne)
    {
        $this->_idPersonne = $idPersonne;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdArticle()
    {
        return $this->_idArticle;
    }

    /**
     * @param mixed $idArticle
     *
     * @return self
     */
    public function setIdArticle($idArticle)
    {
        $this->_idArticle = $idArticle;

        return $this;
    }
}
?>

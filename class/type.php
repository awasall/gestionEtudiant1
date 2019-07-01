<?php
class type {
    private $libelle;
    private $montant;
    public function _construct($libelle,$montant)
    {
        $this->libelle=$libelle;
        $this->montant=$montant;
    }
    function setLibelle($libelle)
    {
        $this->libelle=$libelle; 
    }
    function getLibelle(){
        return $this->libelle;
    }
    function setMontant($montant)
    {
        $this->$montant=$montant; 
    }
    function getMontant(){
        return $this->montant;
    }
}
?>
<?php
class Chambre {
    private $nom_chambre;
    public function _construct($nom_chambre)
    {
        $this->nom_chambre=$nom_chambre;
    }
    function setNom_chambre($nom_chambre)
    {
        $this->nom_chambre=$nom_chambre; 
    }
    function getNom_chambre(){
        return $this->nom_chambre;
    }
}
?>
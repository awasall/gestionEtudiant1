<?php
  class NonBoursier extends Etudiant{
      private $adresse;
   public  function __construct($matricule="",$prenom="",$nom="",$telephone="",$email="",$date_naiss="", $adresse="" )
    {
        parent::__construct($matricule,$prenom,$nom,$telephone,$email,$date_naiss);
        $this->adresse=$adresse;
    }
    public function getAdresse()
    {
        return $this->adresse;
    }
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }
  }  
?>






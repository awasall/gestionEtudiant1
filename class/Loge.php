<?php
  class Loge extends Boursier{
      
      private $idchambre;
   public  function __construct($matricule, $prenom, $nom,$date_naiss,$telephone, $email,$id_type ,$idchambre)
    {
        parent::__construct($matricule, $prenom, $nom,$date_naiss, $telephone,$email,$id_type );
        $this->idchambre=$idchambre;
    }
    function setIdchambre($idchambre)
    {
        $this->idchambre=$idchambre; 
    }
    function getIdchambre(){
        return $this->idchambre;
    }
  }  
?>






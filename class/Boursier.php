<?php
class Boursier extends Etudiant{
    private $id_type;
public function __construct($matricule="",$prenom="",$nom="",$telephone="",$email="",$date_naiss="",$id_type){
    parent::__construct($matricule, $prenom, $nom, $telephone,$email,$date_naiss);
    $this->id_type=$id_type;
    
}
public function getIdtype()
{
    return $this->id_type;
}
public function setId_type($id_type)
{
    $this->type = $id_type;
}
}
?>

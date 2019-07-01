<?php
  class Etudiant {
    private $matricule;
    private $prenom;
     private $nom;
     private $datenaiss;
     private $email;
     private $telephone;
     public function __construct($matricule="",$prenom="",$nom="",$telephone="",$email="",$date_naiss="")
     {
         $this->matricule=$matricule;
          $this->prenom=$prenom;
          $this->nom=$nom;
          $this->telephone=$telephone;
          $this->email=$email;
          $this->datenaiss=$date_naiss;
     }
     public function getMatricule(){
          return $this->matricule;
          
      }
      public function setMatricule($matricule){
          $this->matricule= $matricule;
      }
      public function getPrenom(){
          return $this->prenom;
      }
      public function setPrenom($prenom){
          $this->prenom = $prenom;
      }
      public function getNom(){
          return $this->nom;
      }
      public function setNom($nom){
          $this->nom = $nom;
      }
      public function getDatenaiss(){
          return $this->datenaiss;
      }
      public function setDatenaiss($datenaiss){
          $this->datenaiss= $datenaiss;
      }
      public function getTelephone(){
          return $this->telephone;
      }
      public function setTelephone($telephone){
          $this->telephone = $telephone;
      }
      public function getEmail(){
          return $this->email;
      }
      public function setEmail($email){
          $this->email = $email;
      }
}
?>

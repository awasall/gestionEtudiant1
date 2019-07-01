<?php
require_once 'Autoloader.php';
Autoloader::register();
class ServiceEtudiant{
  private  $connexion;//on instancie la pdo
  function __construct($connexion){
   $this->setConnexion($connexion);
  }
  public static function recup($mat)
{
    $connexion=Database::connect();
    $req=$connexion->prepare('SELECT id_etudiant FROM Etudiant  WHERE matricule=?');
    $req->execute(array($mat));
    while( $db = $req->fetch() )
    {
     $mat=$db['id_etudiant'];
    }
    return $mat; 
}
    public function add(Etudiant $etudiant)
    {
      $connexion=Database::connect();
      $req=$connexion->prepare("INSERT INTO Etudiant(matricule,prenom,nom,telephone,email,date_naissance) VALUES (?,?,?,?,?,?)");
      $req->execute(array($etudiant->getMatricule(),
      $etudiant->getPrenom(),
      $etudiant->getNom(),
      $etudiant->getTelephone(),
      $etudiant->getEmail(),
      $etudiant->getDatenaiss()));
     $id=self::recup($etudiant->getMatricule());
    
      if(get_class($etudiant)=="NonBoursier"){
        $req=$connexion->prepare("INSERT INTO nonboursiers(id_etudiant,adresse) values (?,?)");
        $req->execute(array($id,$etudiant->getAdresse()));
      }
      else if(get_class($etudiant)=="Boursier" || get_class($etudiant)=="Loge")
      {
        $idt=$etudiant->getIdtype();
        $req=$connexion->prepare("INSERT INTO boursiers(id_etudiant,id_type) values (?,?)");
        $req->execute(array($id,$idt));
        if(get_class($etudiant)=="Loge")
        {
          $idc=$etudiant->getIdchambre();
          $req=$connexion->prepare("INSERT INTO loger(id_etudiant,id_chambre) values (?,?)");
          $req->execute(array($id,$idc));
        }
      }
      Database::disconnect();
    }
    public function setConnexion(PDO $connexion)
  {
    $this->connexion = $connexion;
  }
  //FindAll
  public function FindAll(){
    $connexion=Database::connect();
    if(isset($_GET['p']))
{
    $page=$_GET['p'];
}
else{
    $page=1;
}

$req=$connexion->query("SELECT COUNT(id_etudiant)as ne FROM Etudiant");
$donnees=$req->fetch();
$ne=$donnees['ne'];
$count=10;
$nbpage=ceil($ne/$count);
    $req=$connexion->query("SELECT * FROM Etudiant LIMIT ".(($page-1)*$count).",$count");
    for($i=1;$i<=$nbpage;$i++){
      echo "<a href=\"ListeEtudiant.php?p=$i\">$i</a>" ;
   }   
    return $req;
  }
  //sup modif
  public function supmodif(){
    $connexion=Database::connect();
    if(isset($_GET['p']))
{
    $page=$_GET['p'];
}
else{
    $page=1;
}

$req=$connexion->query("SELECT COUNT(id_etudiant)as ne FROM Etudiant");
$donnees=$req->fetch();
$ne=$donnees['ne'];
$count=10;
$nbpage=ceil($ne/$count);
    $req=$connexion->query("SELECT * FROM Etudiant LIMIT ".(($page-1)*$count).",$count");
    for($i=1;$i<=$nbpage;$i++){
      echo "<a href=\"modifsu.php?p=$i\">$i</a>" ;
   }   
    return $req;
  }
  //liste boursiere
  public function ListeBoursier($table){
    $connexion=Database::connect();
    if(isset($_GET['p']))
    {
        $page=$_GET['p'];
    }
    else{
        $page=1;
    }
    $req=$connexion->query("SELECT COUNT(id_etudiant)as ne FROM boursiers");
$donnees=$req->fetch();
$ne=$donnees['ne'];
$count=10;
$nbpage=ceil($ne/$count);
    $req = $connexion->query("SELECT * FROM `Etudiant`,  `boursiers`,`type` WHERE Etudiant.id_etudiant=boursiers.id_etudiant AND boursiers.id_type=type.id_type  LIMIT ".(($page-1)*$count).",$count"  );
      //$req->execute(array($para));
      for($i=1;$i<=$nbpage;$i++){
        echo "<a href=\"ListeBoursier.php?p=$i\">$i</a>" ;
     }   
      return $req;
  }

  //liste non boursiere
  public function ListeNBoursier($table){
    $connexion=Database::connect();
    if(isset($_GET['p']))
    {
        $page=$_GET['p'];
    }
    else{
        $page=1;
    }
    $req=$connexion->query("SELECT COUNT(id_etudiant)as ne FROM nonboursiers");
$donnees=$req->fetch();
$ne=$donnees['ne'];
$count=10;
$nbpage=ceil($ne/$count);
    $req = $connexion->query("SELECT * FROM `Etudiant`,  `nonboursiers` WHERE Etudiant.id_etudiant=nonboursiers.id_etudiant  LIMIT ".(($page-1)*$count).",$count " );
      //$req->execute(array($para));
      for($i=1;$i<=$nbpage;$i++){
        echo "<a href=\"ListeNonboursier.php?p=$i\">$i</a>" ;
     }   
      return $req;
  }
   //liste Loge
   public function ListeLoge($table){
    $connexion=Database::connect();
    if(isset($_GET['p']))
    {
        $page=$_GET['p'];
    }
    else{
        $page=1;
    }
    $req=$connexion->query("SELECT COUNT(id_etudiant)as ne FROM loger");
$donnees=$req->fetch();
$ne=$donnees['ne'];
$count=10;
$nbpage=ceil($ne/$count);
    $req = $connexion->query("SELECT * FROM `Etudiant`, `boursiers`,`loger`,`chambre`,`type`   
    WHERE Etudiant.id_etudiant=boursiers.id_etudiant 
    AND loger.id_etudiant=boursiers.id_etudiant AND loger.id_chambre=chambre.id_chambre  AND  boursiers.id_type=type.id_type  LIMIT ".(($page-1)*$count).",$count" );
      for($i=1;$i<=$nbpage;$i++){
        echo "<a href=\"ListeNonboursier.php?p=$i\">$i</a>" ;
     }   
      return $req;
  }
  //Function find all
   public function FindA($table)
   {
    $connexion=Database::connect();
     
     if($table=='boursiers')
     {
      $req = $connexion->query('SELECT * FROM `Etudiant`,  `boursiers` WHERE Etudiant.id_etudiant=boursiers.id_etudiant  ');

     }
     else if($table=='nonboursiers'){
      $req = $connexion->query('SELECT * FROM `Etudiant`,  `nonboursiers`
      WHERE Etudiant.id_etudiant=nonboursiers.id_etudiant ' );
     }
     else if($table='loger'){
      $req = $connexion->query('SELECT * FROM
       `Etudiant`,  `boursiers`,`loger`,`chambre` WHERE 
       Etudiant.id_etudiant=boursiers.id_etudiant AND loger.id_etudiant=boursiers.id_etudiant AND chambre.id_chambre=loger.id_chambre');

     }
     return $req;
    }
    //function Find
    public function Find( $table,$para)
   {
    $connexion=Database::connect();
     $req=$connexion->prepare("SELECT * FROM $table where matricule=?");
     $req->execute(array($para));
     return $req;
    }

    //function FindBoursier
    public function FindBoursier( $table,$para)
    {
     $connexion=Database::connect();
     $req = $connexion->prepare('SELECT * FROM `Etudiant`,  `boursiers`,`type` WHERE Etudiant.id_etudiant=boursiers.id_etudiant AND boursiers.id_type=type.id_type AND Etudiant.matricule=?'  );
      $req->execute(array($para));
      return $req;
     }
         //function FindNonBoursier
         public function FindNonBoursier( $table,$para)
         {
          $connexion=Database::connect();
          $req = $connexion->prepare('SELECT * FROM `Etudiant`,  `nonboursiers` WHERE Etudiant.id_etudiant=nonboursiers.id_etudiant AND Etudiant.matricule=?'  );
           $req->execute(array($para));
           return $req;
          }
          //function FindNonBoursier

    //chekstatut
    function checkstatut()
       {
        $connexion=Database::connect();
           $req = $connexion->prepare('SELECT * FROM `Etudiant`, `boursiers`,`loger` 
           WHERE Etudiant.id_etudiant=boursiers.id_etudiant 
           AND loger.id_etudiant=boursiers.id_etudiant 
           AND Etudiant.matricule=?' );
            $req->execute(array($_POST['matricule']));
            if( $req->fetch() )
            {
             echo'cet etudiant est boursier et logé';
            }
            $req = $connexion->prepare('SELECT * FROM `Etudiant`, `boursiers`,`loger` 
            WHERE Etudiant.id_etudiant=boursiers.id_etudiant
             AND boursiers.id_etudiant
              NOT IN
               (SELECT loger.id_etudiant FROM loger) AND Etudiant.matricule=?' );
            $req->execute(array($_POST['matricule']));
            if( $req->fetch() )
            {
              echo'cet etudiant est boursier et non logé';
            }
           
            $req = $connexion->prepare('SELECT * FROM `Etudiant`,  `nonboursiers` 
            WHERE Etudiant.id_etudiant=nonboursiers.id_etudiant 
            AND Etudiant.matricule=?'  );
            $req->execute(array($_POST['matricule']));
            if($req->fetch() )
            {
             echo'cet etudiant nest pas boursier' ;
            }
         
       }
}
?>
<?php
class Database {
 private static $dbhost="localhost";
 private static  $dbname="Gestionetudiant";
 private static  $dbuser="root";
 private static  $dbuserpwd="awasall";
 private static  $connexion=null;
 static function connect(){
    try {
        self::$connexion = new PDO("mysql:host=" .self::$dbhost. ";dbname=" . self::$dbname, self::$dbuser, self::$dbuserpwd);
        return self::$connexion;
      }
     catch(PDOException $e){
        die($e->getMessage());
     }
 }
 function disconnect(){
    self::$connexion=null;
 }
}
?>
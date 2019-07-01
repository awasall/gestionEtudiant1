<?php
 require_once 'Autoloader.php';
 Autoloader::register();
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
$count=5;
$nbpage=ceil($ne/$count);
//echo $nbpage;


echo'<table class="table table-striped table-bordered">
         <tr>
         <thead class="thead-dark">
         <th scope="col">matricule</th>
         <th scope="col">Prenom</th>
         <th scope="col">Nom</th>
         <th scope="col">Telephone</th>
         <th scope="col">Email</th>
         <th scope="col">Date de Naissance</th>
         </tr>
         </thead>
         ';

$req=$connexion->query("SELECT *  FROM Etudiant LIMIT ".(($page-1)*$count).",$count");
          
                        while( $donnees = $req->fetch() )
                            {  
                            echo'<tr>'; 
                            echo '<td>'.$donnees['matricule'].'</td>';
                            echo '<td>'.$donnees['prenom'].'</td>';
                            echo '<td>'.$donnees['nom'].'</td>';
                            echo '<td>'.$donnees['telephone'].'</td>'; 
                            echo '<td>'.$donnees ['email'].'</td>'; 
                            echo '<td>'.$donnees['date_naissance'].'</td>'; 
                           echo '</tr>';
                        }
                        Database::disconnect();     
                        for($i=1;$i<=$nbpage;$i++){
                           echo "<a href=\"pagination.php?p=$i\">$i</a>" ;
                        }   
        ?> 




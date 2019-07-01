<!DOCTYPE html>
<html>
        <head>
        <Title>Liste</Title> 
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../menu/styles.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../menu/style.css">
        </head>
        <body>
        <?php
  include_once '../menu/menu.php';
    ?>
        <div class="container contenu">
        <header>
         <h1 class="text-center">Liste des etudiants Logés</h1>
         <header>
        <div class="test">
         <table class="table table-striped table-bordered">
         <tr>
         <thead class="thead-dark">
         <th scope="col">matricule</th>
         <th scope="col">Prenom</th>
         <th scope="col">Nom</th>
         <th scope="col">Telephone</th>
         <th scope="col">Email</th>
         <th scope="col">Date de Naissance</th>
         <th scope="col">Bourse</th>
         <th scope="col">Montant</th>
         <th scope="col">Chambre</th>


         </tr>
         </thead>
         <?php
         require_once 'Autoloader.php';
         Autoloader::register();
         $connexion = Database::connect();
        //$etudiantservice = new ServiceEtudiant($connexion);
          //$donnees  = $etudiantservice->Find('Etudiant');
         //$etu= new Etudiant();
        // while( $employer = $statement->fetch() )
        $etudiantservice = new ServiceEtudiant($connexion);
        $req  = $etudiantservice->ListeLoge('loger');
                       // $req = $connexion->query('SELECT * FROM `Etudiant`,  `boursiers`,`loger` WHERE Etudiant.id_etudiant=boursiers.id_etudiant AND loger.id_etudiant=boursiers.id_etudiant');
                        while( $donnees = $req->fetch() )
                            {  
                            echo'<tr>'; 
                            echo '<td>'.$donnees['matricule'].'</td>';
                            echo '<td>'.$donnees['prenom'].'</td>';
                            echo '<td>'.$donnees['nom'].'</td>';
                            echo '<td>'.$donnees['telephone'].'</td>'; 
                            echo '<td>'.$donnees ['email'].'</td>';
                            echo '<td>'.$donnees ['date_naissance'].'</td>';
                            echo '<td>'.$donnees['libelle'].'</td>'; 
                            echo '<td>'.$donnees['montant'].'</td>'; 
                            echo '<td>'.$donnees['nom_chambre'].'</td>'; 

                           // echo '<td>'.$donnees['date_naissance'].'</td>'; 
                           echo '</tr>';
                        }
                        Database::disconnect();          
        ?> 
        </div>
        </div> 
    </body>
</html>
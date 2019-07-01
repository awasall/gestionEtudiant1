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
         <h1 class="text-center">Liste des etudiants</h1>
         <header>
         <table class="table table-striped table-bordered">
         <tr>
         <thead class="thead-dark">
         <th scope="col">matricule</th>
         <th scope="col">Prenom</th>
         <th scope="col">Nom</th>
         <th scope="col">Telephone</th>
         <th scope="col">Email</th>
         <th scope="col">Date de Naissance</th>
         <th scope="col">Action</th>
         <th scope="col">Action</th>
         </tr>
         </thead>
         <?php
         require_once 'Autoloader.php';
         Autoloader::register();
         $connexion = Database::connect();
        $etudiantservice = new ServiceEtudiant($connexion);
        $req  = $etudiantservice->supmodif('Etudiant');
          
                        while( $donnees = $req->fetch() )
                            {  
                            echo'<tr>'; 
                            echo '<td>'.$donnees['matricule'].'</td>';
                            echo '<td>'.$donnees['prenom'].'</td>';
                            echo '<td>'.$donnees['nom'].'</td>';
                            echo '<td>'.$donnees['telephone'].'</td>'; 
                            echo '<td>'.$donnees ['email'].'</td>'; 
                            echo '<td>'.$donnees['date_naissance'].'</td>'; 
                            echo '<td>';    
                              echo '<a class="btn btn-danger " href="modifier.php?id='. $donnees['id_etudiant'] .'" ><span class ="glyphicon glyphicon-eye-open"></span>Modifier</a>';
                              echo '</td>';
                              echo '<td>'; 
                              echo '<a class="btn btn-danger " href="sup.php?id='. $donnees['id_etudiant'] .'"><span class ="glyphicon glyphicon-eye-open"></span>Supprimer</a>';

                              echo '</td>';
                           echo '</tr>';
                        }
                        Database::disconnect();          
        ?> 
        
        </div> 
    </body>
</html>
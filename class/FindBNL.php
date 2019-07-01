<!DOCTYPE html>
<html>
    <head>
         <title>formulaire d'etudiant</title>
        <meta charset="utf-8" />
        <meta name="viewport"centent="width=width-device, initial-scale=1">
        
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
    <link rel="stylesheet" href="../menu/styles.css">
<link rel="stylesheet" type="text/css" media="screen" href="../menu/style.css">
    </head>
    <body>
    <?php
  include_once '../menu/menu.php';
    ?>
        <div class="container contenu">
            <div class="divider"></div>
            <div class="heading">
                <h2>FIND</h2>
            </div>
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <form id="contact-form" method ="post" action="" role="form" >
                        <div class="row">
                        <div class="col-md-6">
                                <label for ="statut">statut<span class="blue"> *</span></label>
                                <input type="text" id ="statut" name="statut" class="form-control" placeholder="donner un statut"  required>
                                <p class="comments"></p>
                        <div class="col-md-6">
                              <input class="button-center" type="submit" class ="button1" value = "rechercher" name = "rechercher">
                          </div>
                        </div>
                    </form>
                
            </div>
        </div>
        <?php
        require_once 'Autoloader.php';
        Autoloader::register();
       $connexion=Database::connect();
       
       if(isset($_POST['rechercher'])){
        $etudiantservice=new ServiceEtudiant($connexion);

           if($_POST['statut']=="boursier"){

            echo' <table class="table table-striped table-bordered">
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
            $req = $etudiantservice->FindA( 'boursiers');

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
           

           }
       

        //$req = $connexion->query('SELECT * FROM `Etudiant`,  `boursiers` WHERE Etudiant.id_etudiant=boursiers.id_etudiant');
        
        else if($_POST['statut']=="nonboursier"){
            echo' <table class="table table-striped table-bordered">
            <tr>
            <thead class="thead-dark">
            <th scope="col">matricule</th>
            <th scope="col">Prenom</th>
            <th scope="col">Nom</th>
            <th scope="col">Telephone</th>
            <th scope="col">Email</th>
            <th scope="col">Date de Naissance</th>
            <th scope="col">Adresse</th>

            </tr>
            </thead>
            ';
            $req = $etudiantservice->FindA( 'nonboursiers');

            while( $donnees = $req->fetch() )
            {  
            echo'<tr>'; 
            echo '<td>'.$donnees['matricule'].'</td>';
            echo '<td>'.$donnees['prenom'].'</td>';
            echo '<td>'.$donnees['nom'].'</td>';
            echo '<td>'.$donnees['telephone'].'</td>'; 
            echo '<td>'.$donnees ['email'].'</td>'; 
            echo '<td>'.$donnees['date_naissance'].'</td>';
            echo '<td>'.$donnees['adresse'].'</td>'; 
           echo '</tr>';
        }
           }


           //////*
           else if($_POST['statut']=="loger"){
            echo' <table class="table table-striped table-bordered">
            <tr>
            <thead class="thead-dark">
            <th scope="col">matricule</th>
            <th scope="col">Prenom</th>
            <th scope="col">Nom</th>
            <th scope="col">Telephone</th>
            <th scope="col">Email</th>
            <th scope="col">Date de Naissance</th>
            <th scope="col">NuméroChambre</th>
            </tr>
            </thead>
            ';
            $req = $etudiantservice->FindA( 'loger');

            while( $donnees = $req->fetch() )
            {  
            echo'<tr>'; 
            echo '<td>'.$donnees['matricule'].'</td>';
            echo '<td>'.$donnees['prenom'].'</td>';
            echo '<td>'.$donnees['nom'].'</td>';
            echo '<td>'.$donnees['telephone'].'</td>'; 
            echo '<td>'.$donnees ['email'].'</td>'; 
            echo '<td>'.$donnees['date_naissance'].'</td>';
            echo '<td>'.$donnees['nom_chambre'].'</td>';

           echo '</tr>';
        }
           }
           else{
            echo'cet statut nexiste pas';
          }
    }
    
                       Database::disconnect();          
       
    
        ?>
       </div> 
    </body>
    
    
    
</html>
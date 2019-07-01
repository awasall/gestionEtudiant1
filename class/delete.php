<!DOCTYPE html>
<html>
    <head>
         <title>formulaire d'etudiant</title>
        <meta charset="utf-8" />
        <meta name="viewport"centent="width=width-device, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
    </head>
    <body>
        <div class="container">
            <div class="divider"></div>
            <div class="heading">
                <h2>Recherche Etudiant</h2>
            </div>
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <form id="contact-form" method ="post" action="" role="form" >
                        <div class="row">
                        <div class="col-md-6">
                                <label for ="matricule">matricule<span class="blue"> *</span></label>
                                <input type="text" id ="matricule" name="matricule" class="form-control" placeholder="votre matricule"  required>
                                <p class="comments"></p>
                        </div>
                        <div class="col-md-12">
                              <input type="submit" class ="button1" value = "rechercher" name = "rechercher">
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
        $mat=$_POST['matricule'];
        $req=$connexion->prepare("DELETE  FROM `Etudiant` WHERE matricule=?");
       $req->execute(array($mat));
    }
   
        ?>
        </div>
    </body>
</html>
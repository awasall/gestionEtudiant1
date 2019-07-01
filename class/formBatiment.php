<!DOCTYPE html>
<html>
    <head>
         <title>formulaire d'etudiant</title>
        <meta charset="utf-8"/>
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
                <h2>Ajout Batiment</h2>
            </div>
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <form id="contact-form" method ="post" action="" role="form" >
                        <div class="row">
                        <div class="col-md-6">
                                <label for ="prenom">Nom batiment<span class="blue"> *</span></label>
                                <input type="text" id ="bat" name="bat" class="form-control" placeholder="numére chambre"  required>
                                <p class="comments"></p>
                        </div>
                      
                        
            <div class="col-md-12">
             <p class="blue"> *<strong>ces informations sont requises</strong></p>
                          </div>
                            <div class="col-md-12">
                              <input type="submit" class ="button1" value = "envoyer" name = "envoyer">
                          </div>
                        </div>
                    </form>
                    
                </div>
            
            </div>
        </div>
        <?php
        require_once 'Autoloader.php';
        Autoloader::register();
       $connexion=Database::connect();
        if (isset($_POST['envoyer'])){
            
            $bat=$_POST['bat'];
      $req=$connexion->prepare("INSERT INTO batiment(nom_batiment) VALUES (?)");
      $req->execute(array($bat));
        }
        ?>
    </body>
</html>
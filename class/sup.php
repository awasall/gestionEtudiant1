<?php
   //include_once '../menu/menu.php';
   require_once 'Autoloader.php';
   Autoloader::register();
   $connexion=Database::connect();
   if(isset($_GET['id'])){?>
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
                <h2>Supprimer Etudiant</h2>
            </div>
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <form id="contact-form" method ="post" action="" role="form" >
                        <div class="row">
                        <div class="col-md-12">
                                <p class="blue"> *<strong>Etes vous sur de vouloir supprimer?</strong></p>
                            </div>
                       
                        <div class="col-md-12">
                              <input type="submit" class ="button1" value = "oui" name = "oui">
                         
                              <input type="submit" class ="button1" value = "non" name = "non">
                          
                        </div>
                    </form>
                </div>
        </div>
<?php
if(isset($_POST['oui'])){
$req=$connexion->prepare("DELETE  FROM Etudiant WHERE id_etudiant=?");
$req->execute(array($_GET['id']));
echo 'cet etudiant a été supprimé!';
}
elseif(isset($_POST['non'])){
   header("Location:modifsup.php");

}
   }
   ?>
   </div>
    </body>
    
    
    
</html>
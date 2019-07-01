<?php
   //include_once '../menu/menu.php';
   require_once 'Autoloader.php';
   Autoloader::register();
   $connexion=Database::connect();
   if(isset($_GET['id'])){
   ?>
<!DOCTYPE html>
<html>
    <head>
        <title>formulaire d'etudiant</title>
        <meta charset="utf-8"/>
        <meta name="viewport"centent="width=width-device, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="../menu/style.css">
        <link rel="stylesheet" type="text/css" media="screen" href="css.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
<link rel="stylesheet" href="../menu/styles.css">
<link rel="stylesheet" type="text/css" media="screen" href="../menu/style.css">
    </head>
    <body>
    <?php
   include_once '../menu/menu.php';
   require_once 'Autoloader.php';
   Autoloader::register();
   $connexion=Database::connect();
   //$req= $connexion->prepare('SELECT * FROM `Etudiant`,  `boursiers`,`type` WHERE Etudiant.id_etudiant=boursiers.id_etudiant AND boursiers.id_type=type.id_type ' );
   //$donneesb=$bour->fetch();
   $req = $connexion->prepare('SELECT * FROM `Etudiant` where id_etudiant=?' );
   $req->execute(array($_GET['id']));
   $donnees=$req->fetch();
   $mat= $donnees['matricule'];
   $prenom= $donnees['prenom'];
   $nom= $donnees['nom'];
   $tel= $donnees['telephone'];
   $email= $donnees['email'];
   $dt= $donnees['date_naissance'];
    ?>
    <div class="container contenu" >
        <div class="divider"></div>
        <div class="heading">
            <h2>Etudiant</h2>
        </div>
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                    <form id="contact-form" method ="post" action="" role="form" >
                        <div class="row">
                            <div class="col-md-6">
                                    <label for ="prenom">matricule<span class="blue"> *</span></label>
                                    <input type="text" id ="matricule" name="matricule" class="form-control" value="<?php echo $mat;?>">
                                    <p class="comments"></p>
                            </div>
                                <div class="col-md-6">
                                    <label for ="prenom">prenom<span class="blue"> *</span></label>
                                    <input type="text" id ="prenom" name="prenom" class="form-control " value="<?php echo $prenom;?>">
                                    <p class="comments"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                    <label for ="nom">nom<span class="blue"> *</span></label>
                                    <input type="text" id ="nom" name="nom" class="form-control" value="<?php echo $nom;?>">
                                    <p class="comments"></p>
                            </div>
                                <div class="col-md-6">
                                <label for ="telephone">telephone<span class="blue"> *</span></label>
                                <input type="number" min=300000000 id="telehone" name="telephone" class="form-control pstyle" value="<?php echo $tel;?>"> 
                                    <p class="comments"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for ="email">email<span class="blue"> *</span></label>
                                <input type="text" id="email" name="email" class="form-control pstyle" value="<?php echo $email;?>"> 
                                    <p class="comments"></p>
                            </div>
                            <div class="col-md-6">
                                    <label for ="datenaiss">date de naissance*</span></label>
                                    <input type="date" id ="datenaiss" name="datenaiss" class="form-control" value="<?php echo $dt;?>">
                                    <p class="comments"></p>
                            </div>
                        </div>
                        <?php
                       
   $req = $connexion->prepare('SELECT * FROM `Etudiant`, `boursiers`,`loger` 
   WHERE Etudiant.id_etudiant=boursiers.id_etudiant 
   AND loger.id_etudiant=boursiers.id_etudiant 
   AND Etudiant.id_etudiant=?' );
    $req->execute(array($_GET['id']));
    if( $req->fetch() )//boursier loger
    { ?>

<div class="row">
                            <div class="custom-control custom-radio" id="bs">
                                <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio1">Boursier</label>
                            </div>
                            <div class="custom-control custom-radio" id="nbs">
                                <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio2">Non Boursier</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" id="lo">
                                <input type="checkbox" id="subscribe" name="subscribe" value="newsletter">
                                <label for="subscribeNews">Logé</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6" id="tp">
                                <label for ="typebourse">Type bourse*</span></label>
                                
                                <?php
                                require_once 'Autoloader.php';
                                Autoloader::register();
                                $connexion=Database::connect();
                                echo'<SELECT class="form-control"  name="typebourse">';
                                $req=$connexion->query('SELECT * FROM type');
                                while ($donnees = $req->fetch())
                                {
                                    echo '<option value=' .$donnees['id_type'].'>' .$donnees['libelle'].' : '.$donnees['montant'].'</option> <br>' ;
                                }
                                echo'</SELECT><br>';
                                ?>
                            </div>
                            <div class="col-md-6" id="ad">
                                <label for ="adresse">Adresse</label>
                                <input type="text" id ="adresse" name="adresse" class="form-control" placeholder="votre adresse" rows="4" >
                                <p class="comments"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6" id="ch">
                                <label for ="chambre">Chambre</label>
                                <?php
                                require_once 'Autoloader.php';
                                Autoloader::register();
                                $connexion=Database::connect();
                                echo'<SELECT class="form-control"  name="chambre">';
                                $req=$connexion->query('SELECT * FROM chambre');
                                while ($donnees = $req->fetch())
                                {
                                    echo '<option value=' .$donnees['id_chambre'].'>' .$donnees['nom_chambre'].'</option> <br>' ;
                                }
                                echo'</SELECT><br>';
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p class="blue"> *<strong>ces informations sont requises</strong></p>
                            </div>
                            <div class="col-md-12">
                                <input type="submit" class ="button1" value = "modifier" name = "modifier">
                            </div>
                        </div>
                        <?php
                        }//fin boursier loger
    ?>
   
    <?php
     // debut boursier non loger
    $req = $connexion->prepare('SELECT * FROM `Etudiant`, `boursiers`,`loger` 
            WHERE Etudiant.id_etudiant=boursiers.id_etudiant
             AND boursiers.id_etudiant
              NOT IN
               (SELECT loger.id_etudiant FROM loger) AND Etudiant.id_etudiant=?' );
            $req->execute(array($_GET['id']));
            
            if( $req->fetch() )
            {
                $data=$req->fetch();
                ?>
                <div class="row">
                <div class="custom-control custom-radio" id="bs">
                    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio1">Boursier</label>
                </div>
                <div class="custom-control custom-radio" id="nbs">
                    <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio2">Non Boursier</label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" id="lo">
                    <input type="checkbox" id="subscribe" name="subscribe" value="newsletter">
                    <label for="subscribeNews">Logé</label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6" id="tp">
                    <label for ="typebourse">Type bourse*</span></label>
                    <SELECT class="form-control"  name="typebourse" >
                        <option  value="<?php echo $data['id_type'];?>"><?php echo $data['id_type'];?></option>
                    <?php
                    require_once 'Autoloader.php';
                    Autoloader::register();
                    $connexion=Database::connect();
                    $req=$connexion->query('SELECT * FROM type');
                    while ($donnees = $req->fetch())
                    {
                        echo '<option value=' .$donnees['id_type'].'>' .$donnees['libelle'].' : '.$donnees['montant'].'</option> <br>' ;
                    }
                    ?>
                                        </SELECT>

                </div>
                <div class="col-md-6" id="ad">
                    <label for ="adresse">Adresse</label>
                    <input type="text" id ="adresse" name="adresse" class="form-control" placeholder="votre adresse" rows="4" >
                    <p class="comments"></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6" id="ch">
                    <label for ="chambre">Chambre</label>
                    <?php
                    require_once 'Autoloader.php';
                    Autoloader::register();
                    $connexion=Database::connect();
                    echo'<SELECT class="form-control"  name="chambre">';
                    $req=$connexion->query('SELECT * FROM chambre');
                    while ($donnees = $req->fetch())
                    {
                        echo '<option value=' .$donnees['id_chambre'].'>' .$donnees['nom_chambre'].'</option> <br>' ;
                    }
                    echo'</SELECT><br>';
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="blue"> *<strong>ces informations sont requises</strong></p>
                </div>
                <div class="col-md-12">
                    <input type="submit" class ="button1" value = "modifier" name = "modifier">
                </div>
            </div>
            <?php
            }
            //fin boursier non loger
            ?>
             <?php
            $req = $connexion->prepare('SELECT * FROM `Etudiant`,  `nonboursiers` 
            WHERE Etudiant.id_etudiant=nonboursiers.id_etudiant 
            AND Etudiant.id_etudiant=?'  );
            $req->execute(array($_GET['id']));
            if($req->fetch() )
            { 
                $data=$req->fetch();
                 ?>
            
            
                        <div class="row">
                            <div class="custom-control custom-radio" id="bs">
                                <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio1">Boursier</label>
                            </div>
                            <div class="custom-control custom-radio" id="nbs">
                                <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio2">Non Boursier</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" id="lo">
                                <input type="checkbox" id="subscribe" name="subscribe" value="newsletter">
                                <label for="subscribeNews">Logé</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6" id="tp">
                                <label for ="typebourse">Type bourse*</span></label>
                                
                                <?php
                                require_once 'Autoloader.php';
                                Autoloader::register();
                                $connexion=Database::connect();
                                echo'<SELECT class="form-control"  name="typebourse">';
                                $req=$connexion->query('SELECT * FROM type');
                                while ($donnees = $req->fetch())
                                {
                                    echo '<option value=' .$donnees['id_type'].'>' .$donnees['libelle'].' : '.$donnees['montant'].'</option> <br>' ;
                                }
                                echo'</SELECT><br>';
                                ?>
                            </div>
                            <div class="col-md-6" id="ad">
                                <label for ="adresse">Adresse</label>
                                <input type="text" id ="adresse" name="adresse" class="form-control" placeholder="votre adresse" rows="4"  value="<?php echo $data['adresse'];?>">
                                <p class="comments"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6" id="ch">
                                <label for ="chambre">Chambre</label>
                                <?php
                                require_once 'Autoloader.php';
                                Autoloader::register();
                                $connexion=Database::connect();
                                echo'<SELECT class="form-control"  name="chambre">';
                                $req=$connexion->query('SELECT * FROM chambre');
                                while ($donnees = $req->fetch())
                                {
                                    echo '<option value=' .$donnees['id_chambre'].'>' .$donnees['nom_chambre'].'</option> <br>' ;
                                }
                                echo'</SELECT><br>';
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p class="blue"> *<strong>ces informations sont requises</strong></p>
                            </div>
                            <div class="col-md-12">
                                <input type="submit" class ="button1" value = "modifier" name = "modifier">
                            </div>
                        </div>
                        <?php
                        }
                    ?>
                    </form>
                
            </div>
        </div>
    </div>
        <?php
        require_once 'Autoloader.php';
        Autoloader::register();
       $connexion=Database::connect();
        if (isset($_POST['modifier'])){
            $req=$connexion->prepare("UPDATE Etudiant set matricule=?, prenom=?, nom=?, telephone=?, email=?,date_naissance=?  WHERE ma");
            $req->execute(array($_GET['id']));
        }
   }

        ?>
                
        <script src="jquery-3.4.1.slim.js"></script>
        <script src="form.js"></script>
        
    </body>
</html>
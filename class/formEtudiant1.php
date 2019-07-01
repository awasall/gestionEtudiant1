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
                                    <input type="text" id ="matricule" name="matricule" class="form-control" placeholder="votre matricule"  required>
                                    <p class="comments"></p>
                            </div>
                                <div class="col-md-6">
                                    <label for ="prenom">prenom<span class="blue"> *</span></label>
                                    <input type="text" id ="prenom" name="prenom" class="form-control" placeholder="votre prenom" required>
                                    <p class="comments"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                    <label for ="nom">nom<span class="blue"> *</span></label>
                                    <input type="text" id ="nom" name="nom" class="form-control" placeholder="votre nom" rows="4" required>
                                    <p class="comments"></p>
                            </div>
                                <div class="col-md-6">
                                <label for ="telephone">telephone<span class="blue"> *</span></label>
                                <input type="number" min=300000000 id="telehone" name="telephone" class="form-control pstyle" placeholder="votre telephone"  rows="4" required> 
                                    <p class="comments"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for ="email">email<span class="blue"> *</span></label>
                                <input type="text" id="email" name="email" class="form-control pstyle" placeholder="votre email" rows="4" required> 
                                    <p class="comments"></p>
                            </div>
                            <div class="col-md-6">
                                    <label for ="datenaiss">date de naissance*</span></label>
                                    <input type="date" id ="datenaiss" name="datenaiss" class="form-control" placeholder="votre date de mnaissance" rows="4" required>
                                    <p class="comments"></p>
                            </div>
                        </div>
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
            $etudiantservice = new ServiceEtudiant($connexion);
         if (isset($_POST['subscribe'])){
              $loge=new Loge($_POST['matricule'],$_POST['prenom'],$_POST['nom'],$_POST['telephone'],$_POST['email'],$_POST['datenaiss'],$_POST['typebourse'],$_POST['chambre']);
              $etud=$etudiantservice->add($loge);
            }
           else if(isset($_POST['customRadio'])){
              $boursier=new Boursier($_POST['matricule'],$_POST['prenom'],$_POST['nom'],$_POST['telephone'],$_POST['email'],$_POST['datenaiss'],$_POST['typebourse']);
              $etud=$etudiantservice->add($boursier);

            }
            else if(isset($_POST['customRadio2'])){
              $nonboursier=new NonBoursier($_POST['matricule'],$_POST['prenom'],$_POST['nom'],$_POST['telephone'],$_POST['email'],$_POST['datenaiss'],$_POST['adresse']);
              $etud=$etudiantservice->add($nonboursier);

            }
            Database::disconnect();
            //$adresse=$_POST['adresse'];
        }
        ?>
                
        <script src="jquery-3.4.1.slim.js"></script>
        <script src="form.js"></script>
        
    </body>
</html>
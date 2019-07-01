<!DOCTYPE html>
<html>
        <head>
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="stylee.css">
<link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet' type='text/css'>
</head>
<body>
<div class='login'>
  <h2>Authenticate<h2>
  <form action='#' method='POST'>
  <input name='username' placeholder='Username' type='text'>
  <input id='pwd' name='pwd' placeholder='Password' type='password'>

  <input class='animated' type='submit' name='Register' value='Authenticate'>
 
  </form>
  <?php
                            //$db = Database::connect() ;
                            if(isset($_POST['Register']))
                            {
                                require_once 'Autoloader.php';
                                Autoloader::register();
                               $connexion=Database::connect();
                               
                               $log = $_POST['username'];
                               $pwd = $_POST['pwd'];
                                //require 'admin/Database.php';
                                $db = Database::connect();
                                $statement = $db->prepare("SELECT * FROM users where login='$log' and password='$pwd'");
                                $statement->execute(array($log,$pwd));
                               
                                   header("location:acceuil.php");
                                    
                                
                                    
                                
                            }


                            ?>
</div>
</body>
</html>
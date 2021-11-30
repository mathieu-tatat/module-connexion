<?php
session_start();

// connexion à la base de données
$bdd = mysqli_connect("localhost:3306","root-","root-","mathieu-tatat_module-connexion");mysqli_set_charset($bdd,"UTF8");
$login = $_POST['login'];  
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$password = $_POST['password'];
$confirmation = $_POST['confpassword']; 

// messages d'erreur
$error = "mots de passe differents";
$error2 = "login indisponible";

// Créer tableau utilisateurs
$sql = mysqli_query($bdd,"SELECT * FROM `utilisateurs`");
$users = mysqli_fetch_all($sql);


    if (isset($login) && isset($prenom) && isset($nom) && isset($password)&& isset($confirmation)){
        
            // comparaison login entré par user et BDD
        foreach ($users as $user){
            if ($_POST['login'] == $user[1]){
                $bool =1;
            }
            if($bool == 1){
                echo "Erreur Ce login est deja existant";
             }
             else if($password == $confirmation){
                 $req = mysqli_query($bdd,"INSERT INTO utilisateurs(login, prenom, nom, password) VALUES ('$login','$prenom','$nom','$password')");
                 header('Location: connexion.php');
             }
             else
               echo "Erreur : Les mots de passe sont différents";
             }
        }

?>

<!DOCTYPE html>
<html>
    <head>
       <meta charset="utf-8">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="index.css" media="screen" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   
        <title>inscription</title>
    </head>
    <body class = "background">
        <!-- NAVBAR -->
        <header>
            <a href="index.php"><img class="logo" src="content/logo.jpg" alt="logo"></a>
            <h1>Sport us</h1>
            <?php 
             ///////////////// condition affichage buton navbar \\\\\\\\\\\\\\\-->

                if (isset($_SESSION['login'])){
                    echo "<a href='profil.php'><img class='profil' src='content/profil.png' alt='logo profil'></a>";
                }
                else {
                    echo "<a href='connexion.php'><img class='profil' src='content/profil.png' alt='logo profil'></a>";
                }
            ?>
        </header>

        <div class="container">
       
         <!-- ///////////////// Formulaire inscription \\\\\\\\\\\\\\\-->  
            <form action="" method="POST"> 

                  <!-- /////////////////conditions affichage erreur \\\\\\\\\\\\\\\-->
                <h2>
                    <?php if ($password != $confirmation){ echo $error;} ?>
                </h2>

                 <h2><?php if ($login != $logconf){ echo $error2;} ?>
                </h2>

                <h2><?php if ($_SESSION['login'] == $login){ echo $error2;} ?>
                </h2>

                <h1 class="container">Inscription</h1>
                
                <label><b>Login:</b></label>
                <input type="text" placeholder="Entrer un nom d'utilisateur" name='login' required>
                    <br>
                    <br>
                <label><b>Penom:</b></label>
                <input type="text" placeholder="Entrer votre prenom" name='prenom' required>
                    <br>
                    <br>
                <label><b>Nom:</b></label>
                <input type="text" placeholder="Entrer votre nom" name='nom' required>
                    <br>
                    <br>
                <label><b>Mot de passe:</b></label>
                <input type="password" placeholder="Choisir un mot de passe" name='password' required>
                    <br>
                    <br>
                <label><b>Confirmer mot de passe:</b></label>
                <input type="password" placeholder="Confirmer mot de passe" name='confpassword' required>

                <input type="submit" id='submit' value='Soumettre' >
            </form>
        </div>

  <!-- /////////////////Footer \\\\\\\\\\\\\\\-->
        <footer>
            <div>
                <a href="https://www.facebook.com/" class="fa fa-facebook"></a>  
                <a href="https://twitter.com/?lang=fr" class="fa fa-twitter"></a>  
                <a href="https://www.instagram.com/" class="fa fa-instagram"></a>  
                <a href="https://www.youtube.com/" class="fa fa-youtube"></a>  
                <a href="https://www.snapchat.com/l/fr-fr/download" class="fa fa-snapchat-ghost"></a> 
            </div>
            <small>&copy; Copyright 2021, Example Corporation</small>
        </footer> 
    </body>
</html>
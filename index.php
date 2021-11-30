<?php
session_start();
// connexion base de donnée et requet
$user = $_SESSION['login'];
$bdd = mysqli_connect("localhost:3306","root-","root-","mathieu-tatat_module-connexion");mysqli_set_charset($bdd,"UTF8");
$requete = mysqli_query($bdd,"SELECT * FROM `utilisateurs` ");
// test 

$acc = "Bonjour : $user, pret a devenir un bonhomme"; 

// afficher message accueil utilisateur
$bdd = mysqli_fetch_all($requete, MYSQLI_ASSOC); 
if(isset($_SESSIOn['login'])){
echo $acc;
}
if(isset($_GET['deco']))
{ 
session_destroy();
header("location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz&display=swap" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   
<link rel="stylesheet" href="index.css" media="screen" type="text/css" />
<title>index</title>
</head>
    <body class = "background">

  <!-- ///////////////// Navbar \\\\\\\\\\\\\\\-->
        <header>
           <a href="index.php"><img class="logo" src="content/logo.jpg" alt="logo"></a>            
            <h1>Sport us</h1>

              <!-- ///////////////// Condition afficahage boutouns navbar \\\\\\\\\\\\\\\-->
            <?php 
                if (isset($_SESSION['login'])){
               echo"<a href='?deco=true'><img class= 'deco' src='content/imgdeco.png' alt='bouton deconnexion'></a>";
                }
                else{
                    echo "<a href='connexion.php'><img class= 'deco' src='content/imglogin.png' alt='bouton connexion'></a>"; 
                }   
                
                if (isset($_SESSION['login'])){
                    echo "<a href='profil.php'><img class='profil' src='content/profil.png' alt='logo profil'></a>";
                }
                else {
                    echo "<a href='connexion.php'><img class='profil' src='content/profil.png' alt='logo profil'></a>";
                }
            ?>
        </header>

  <!-- /////////////////affichage message accueil \\\\\\\\\\\\\\\-->
        <h2><?php if(isset($_SESSION['login'])){ echo $acc;} ?></h2>
        <h1 class = "title">Marre de ta routine et ton corps de lâche ?!</h1>
           
            <div class ="cell">
                <img src="content/img1.jpg" alt="photo"/>
                <p>Si toi aussi tu veux devenir un vrai bonhomme!</p>
            </div>

            <div class = "cellRight">
                <img  src="content/img3.jpg" alt="photo"/>
                <p>Si tu es constamment comparé à une gonzesse !</p>
            </div>
            
            <div class ="cell">
                <img src="content/img2.jpg" alt="photo"/>
                <p>Prend les choses en main et devient un homme !</p>
            </div>

            <button><h2><a href="inscription.php">join us now !</a></h2></button>

        <!-- ///////////////// Boutons \\\\\\\\\\\\\\\-->

        <footer>
            <div>
                <a href="https://www.facebook.com/" class="fa fa-facebook"></a>  
                <a href="https://twitter.com/?lang=fr" class="fa fa-twitter"></a>  
                <a class = "aqua" href="https://github.com/mathieu-tatat/module-connexion" class="fa fa-github"></a>  
                <a href="https://www.youtube.com/" class="fa fa-youtube"></a>  
                <a href="https://www.snapchat.com/l/fr-fr/download" class="fa fa-snapchat-ghost"></a> 
            </div>
            <small>&copy; Copyright 2021, Example Corporation</small>
        </footer> 
    </body>

</html>
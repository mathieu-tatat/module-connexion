<?php
    session_start();

    $user = $_SESSION['login'];
    $bdd = mysqli_connect("localhost:3306","root-","root-","mathieu-tatat_module-connexion");mysqli_set_charset($bdd,"UTF8");
    $requete = mysqli_query($bdd,"SELECT * FROM `utilisateurs` ");

    if($_SESSION['login'] !=NULL){
        $user = $_SESSION['login'];

        // afficher message acceuil utilisateur
        $acc = "Bonjour : $user, pret a devenir un bonhomme";  
    }

        //////////////// deconnexion \\\\\\\\\\\\\
    if(isset($_GET['deco']))
    { 
    session_destroy();
    header("location: index.php");
    }
    $accpro = "Alors $user ! toujours pas un bonhomme"
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
<title>profil</title>
</head>
    <body class = "background">

                <!-- //////////////// affichage nav bar \\\\\\\\\\\\\\-->
        <header>
            <a href="index.php"><img class="logo" src="content/logo.jpg" alt="logo"></a>            
            <h1>Sport us</h1>
            <?php if (isset($_SESSION['login'])){
               echo"<a href='?deco=true'><img class= 'deco' src='content/imgdeco.png' alt='bouton deconnexion'></a> 
               ";
                }
                else{
                    echo "<a href='connexion.php'><img class= 'deco' src='content/imglogin.png' alt='bouton connexion'></a>"; 
                }   ?>
            <a href="profil.php"><img class="profil" src="content/profil.png" alt="logo profil"></a>
        </header>

        <!-- //////////////// bouton lien formulaire modif profil\\\\\\\\\\\\\\-->
        <div class = "info">
            <button class = but><h4><a href="formId.php">Change tes id !</a></h4></button>
            </div>  

            <!-- //////////////// messages accueil profil \\\\\\\\\\\\\\-->
                <h2><?php echo $accpro ?></h2>   
                    <p>Où en es tu de ta transformation pour devenir enfin une personne respecté! </p>
                    <p>N'attend plus et choisie ton programme NOW !</p>
                
                    <div class ="cellProfil">
                        <div class = "prog">
                            <p>Débutant</p>
                            <img src="content/imgprofil1.jpg" class = "imgProg" alt="photo"/>
                            <p>Pour les gringalet qui ne savent pas ce qu'est un homme !</p>
                        </div>
                        <div class = "prog">
                            <p>Intermediare</p>
                            <img  src="content/imgprofil2.jpg" class = "imgProg" alt="photo"/>
                            <p>Pour les hommes qui veulent devenir des bonhommes !</p> 
                        </div>
                        <div class = "prog" >
                            <p>Expert</p>
                            <img src="content/imgprofil3.jpg" class = "imgProg" alt="photo"/>
                            <p>Pour les bonhommes qui ne veulent le rester !</p>
                    </div>
        </div>

              <!-- //////////////// FOOTER \\\\\\\\\\\\\\-->

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
<?php 
    session_start();

    /*  ///////// connexion base de donées et requètes  \\\\\\\\  */
    $bdd = mysqli_connect("localhost","root","root","moduleconnexion");mysqli_set_charset($bdd,"UTF8");
    $sql = mysqli_query($bdd,"SELECT * FROM `utilisateurs`");
    $users = mysqli_fetch_all($sql);

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
<title>admin</title>
</head>
    <body class = "background">
  
<!-- //////////////// Nav bar  \\\\\\\\\\\\\\-->
        <header>
            <a href="index.php"><img class="logo" src="content/logo.jpg" alt="logo"></a>            
            <h1>Sport us</h1>

        <!-- //////////////// conditions affichage nav bar \\\\\\\\\\\\\\-->
            <?php if (isset($_SESSION['login'])){
               echo"<a href='?deco=true'><img class= 'deco' src='content/imgdeco.png' alt='bouton deconnexion'></a> 
               ";
                }
                else{
                    echo "<a href='connexion.php'><img class= 'deco' src='content/imglogin.png' alt='bouton connexion'></a>"; 
                }   ?>
            <a href="profil.php"><img class="profil" src="content/profil.png" alt="logo profil"></a>
        </header>

                <!-- ////////////////message accuei admin \\\\\\\\\\\\\\-->
        <h2>C'est bien toi l'admin ?!</h2>
        <h2>Observe tout tes bonhommes !</h2>

                <!-- //////////////// tableau affichage de tout les utilisateurs \\\\\\\\\\\\\\-->

    <table>
        <tr>
            <th>LOGIN </th>
            <th> PRENOM </th>
            <th> NOM </th>
        </tr>
        <tr>
            <th>
                <?php foreach($users as $user){echo $user[1]."</br> </br>";}?>
            </th>
            <th>
                <?php foreach($users as $user){echo $user[2]."</br></br>";}?>
            </th>
            <th>
                <?php foreach($users as $user){echo $user[3]."</br></br>";}?>
            </th>
        </tr>
    </table>

            <!-- //////////////// FOOTER \\\\\\\\\\\\\\-->
        <footer>
            <div>
                <a href="https://www.facebook.com/" class="fa fa-facebook"></a>  
                <a href="https://twitter.com/?lang=fr" class="fa fa-twitter"></a>  
                <a href="#https://www.instagram.com/" class="fa fa-instagram"></a>  
                <a href="https://www.youtube.com/" class="fa fa-youtube"></a>  
                <a href="https://www.snapchat.com/l/fr-fr/download" class="fa fa-snapchat-ghost"></a> 
            </div>
            <small>&copy; Copyright 2021, Example Corporation</small>
        </footer> 
    </body>

</html>
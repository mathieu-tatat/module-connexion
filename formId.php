<?php 
session_start();

/*  ///////// connexion base de donées et requètes  \\\\\\\\  */
$bdd = mysqli_connect("localhost:3306","root-","root-","mathieu-tatat_module-connexion");mysqli_set_charset($bdd,"UTF8");
$requete = mysqli_query($bdd,"SELECT * FROM utilisateurs WHERE login = '$user'");
$result = mysqli_fetch_all($requete,MYSQLI_ASSOC);
$user = $_SESSION['login'];
    /*  ///////// mes varriables   \\\\\\\\  */

$login = $result[0]['login'];  
$prenom = $result[0]['prenom'];
$nom = $result[0]['nom'];
$password = $result[0]['password'];
$confirmation = $result[0]['confpassword'];
$accId = "C'est ici $user que tu peux changer qui tu es ! ";  

    /*  ///////// conditions des changements des infos utilisateurs  \\\\\\\\  */
if(isset($_POST['envoyer'])){
    $newlogin = $_POST['login'];
    $newprenom = $_POST['prenom'];
    $newnom = $_POST['nom'];
    $newpassword = $_POST['password'];
    $newconfirmation = $_POST['confpassword'];
    
    if ($newpassword === $newconfirmation){
    $req = mysqli_query($bdd,"UPDATE utilisateurs SET login = '$newlogin', prenom = '$newprenom', nom = '$newnom', password = '$newpassword' WHERE login = '$user'" );
    
   }
}
   if (isset($_POST['login']) && $_POST['login'] != $result['login']){
    $login = $_POST['login'];
    $newlogin = mysqli_query($bdd,"UPDATE utilisateurs SET login = '$login' WHERE login ='$user' ");
    $_SESSION['login'] = $login;
    header('location: profil.php');
    }



//message acccueil utilisateur//
    if(isset($_SESSION['login'])){ 
    echo $acc;
    }

    /*  ///////// Deconnexion  \\\\\\\\  */
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
<title>formID</title>
</head>
    <body class = "background">
        <!-- ///////////////// nav bar \\\\\\\\\\\\\\\\\-->
        <header>
            <a href="index.php"><img class="logo" src="content/logo.jpg" alt="logo"></a>            
            <h1>Sport us</h1>
            <?php if (isset($_SESSION['login'])){
               echo"<a href='?deco=true'><img class= 'deco' src='content/imgdeco.png' alt='bouton deconnexion'></a>"; 
                }
                else{
                    echo "<a href='connexion.php'><img class= 'deco' src='content/imglogin.png' alt='bouton connexion'></a>"; 
                }   ?>
                <?php if (isset($_SESSION['login'])){
                    echo "<a href='profil.php'><img class='profil' src='content/profil.png' alt='logo profil'></a>";
                }
                else {
                    echo "<a href='connexion.php'><img class='profil' src='content/profil.png' alt='logo profil'></a>";
                }
            ?>
        </header>

    <!-- Message acueil utilisateur -->
        <h2>
            <?php 
                if(isset($_SESSION['login'])){ echo $accId;} 
                ?>
            </h2>

        <div class="container">

        <!-- Formulaire modification informations utilisateur -->
            <form action="" method="POST"> 
                <label><b>Login:</b></label>
                <input type="text" placeholder="login" value= "<?php echo $login ;  ?>" name='login'></input>
                    <br>
                    <br>
                <label><b>Prenom:</b></label>
                <input type="text" placeholder= "prenom" value="<?php echo $prenom; ?>" name='prenom' required/>
                    <br>
                    <br>
                <label><b>Nom:</b></label>
                <input type="text" placeholder="name" value= "<?php echo $nom ;  ?>" name='nom' required/>
                    <br>
                    <br>
                <label><b>Mot de passe:</b></label>
                <input type="password" placeholder="password" value="<?php echo $password;  ?>" name='password' required/>
                    <br>
                    <br>
                <label><b>Confirmer votre mot de passe:</b></label>
                <input type="password" placeholder="Confirmer mot de passe" name='confpassword' required/>
                <input type="submit" name = "envoyer" id='submit' value='Soumettre' >
            </form>      
        </div>
        
              <!-- Footer -->
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

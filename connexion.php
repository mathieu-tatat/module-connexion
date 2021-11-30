<?php   
    session_start();

        /*  ///////// connexion base de donées et requètes  \\\\\\\\  */
    $bdd = mysqli_connect("localhost:3306","root-","root-","mathieu-tatat_module-connexion");mysqli_set_charset($bdd,"UTF8");
    $sql = mysqli_query($bdd,"SELECT * FROM `utilisateurs`");
    $users = mysqli_fetch_all($sql);

    /*  ///////// test login et password  \\\\\\\\  */
    if(isset($_POST['login']) && isset($_POST['password'])){
       $login = $_POST['login'];
       $password = $_POST['password'];
       
    if($login != NULL && $password != NULL){
        $exec_requete = mysqli_query($bdd,"SELECT * FROM utilisateurs WHERE login = '$login' && password = '$password' ");
        $reponse = mysqli_fetch_all($exec_requete);
        $count = count($reponse);
        if ($count == 0 ){
            echo "login incorrect";} 
        if($count > 0){
            if($login === 'admin' && $password ==='admin'){
                $_SESSION['login'] = $login ;
                header('Location: admin.php');
                }
             else{
             $_SESSION['login'] = $login ;
                header('Location: profil.php');}
            
            
            }
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
        <title>connexion</title>
    </head>

    <body class = "background">

     <!-- ///////// navbar //////// -->

        <header class="headCo">
            <a href="index.php"><img class="logo" src="content/logo.jpg" alt="logo"></a>
            <h1>Sport us</h1>
            <a href="profil.php"><img class="profil" src="content/profil.png" alt="logo profil"></a>
        </header>

        <div class="container">

         <!-- ///////// Formulaire de connexion \\\\\\\\   -->
            <form  action = "#" method="POST">
                <h1 class="container">Connect toi !</h1>
                <label><b>Login:</b></label>
                <input type="text" placeholder="Entrer votre nom d'utilisateur" name="login" required>
                    <br>
                    <br>
                <label><b>Mot de passe:</b></label>
                <input type="password" placeholder="Entrer votre mot de passe" name="password" required>
                    <br>
                    <br>
                <input type="submit" id='submit' value='LOGIN' >
            </form>
        </div>

            <!-- ///////// Footer \\\\\\\\   -->
        <footer class = footCo>
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

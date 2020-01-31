<?php

    include('connectDB.php');
    session_start();

    $user_check = $_SESSION['login_user'];

    $ses_sql = mysqli_query($link,"select login,nom,prenom from directeur where login = '$user_check' ");

    $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

    $login_session = $row['login'];
    $login_nom = $row['nom'];
    $login_prenom = $row['prenom'];;

    if(!isset($_SESSION['login_user'])){
        header("location:../accueil.php");
        die();
    }

?>
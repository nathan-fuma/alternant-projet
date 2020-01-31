<?php
require('connectDB.php');

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form

    $login = mysqli_real_escape_string($link,$_POST['login']);
    $pass = mysqli_real_escape_string($link,$_POST['pass']);

    $sql = "SELECT login, pass FROM directeur WHERE login = '$login' and pass = '$pass'";
    $result = mysqli_query($link,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];

    $count = mysqli_num_rows($result);
    // If result matched $myusername and $mypassword, table row must be 1 row

    if($count == 1) {
        $_SESSION['login_user'] = $login;

        header("location: ../pages/index.php");
    }else {
        $error = "Your Login Name or Password is invalid";
    }
}

?>
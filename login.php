<?php

session_start();
$login = $_POST['login'];
$pwd = $_POST['password'];

    if($login == "Matis" && $pwd == "Quentin"){
        $_SESSION['login'] = $login;
        echo "Bienvenue à toi";
    }else{
        echo "Utilisateur non reconnu.";
    }

?>
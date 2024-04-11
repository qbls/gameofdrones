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
<br>

<button onclick="window.location.href = 'index.php';">Voir les valeurs</button>
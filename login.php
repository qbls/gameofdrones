<?php
session_start();

// Connexion à la base de données
$servername = "localhost";
$username = "user";
$password = "user";
$dbname = "gameofdrones"; // Nom de la base de données

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupération des données du formulaire
$nom_utilisateur = $_POST['login'];
$mot_de_passe = $_POST['password'];

// Requête SQL pour récupérer l'utilisateur correspondant au nom d'utilisateur fourni
$stmt = $conn->prepare("SELECT * FROM utilisateurs WHERE nom_utilisateur = ?");
$stmt->bind_param("s", $nom_utilisateur);
$stmt->execute();
$result = $stmt->get_result();

// Vérification si l'utilisateur existe et si le mot de passe correspond
if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
    if ($mot_de_passe == $user['mot_de_passe']) {
        $_SESSION['login'] = $nom_utilisateur;
        echo "Bienvenue à toi";
    } else {
        echo "Mot de passe incorrect.";
    }
} else {
    echo "Utilisateur non reconnu.";
}

$stmt->close();
$conn->close();
?>
<button onclick="window.location.href = 'index.php';">Voir les valeurs</button>
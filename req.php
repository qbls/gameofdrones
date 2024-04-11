<?php
// Paramètres de connexion à la base de données
$servername = "10.5.40.34"; //
$username = "user";
$password = "user";
$dbname = "gameofdrones";

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Récupérer les données de la requête POST
$drone_id = $_POST['drone_id'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$altitude = $_POST['altitude'];
$datetime = $_POST['datetime'];

$drone_id = $_GET['drone_id'];
$latitude = $_GET['latitude'];
$longitude = $_GET['longitude'];
$altitude = $_GET['altitude'];
$datetime = $_GET['datetime'];

// Préparer et lier
$stmt = $conn->prepare("INSERT INTO drone_positions (drone_id, latitude, longitude, altitude, datetime) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sddds", $drone_id, $latitude, $longitude, $altitude, $datetime);

// Exécuter la requête
$stmt->execute();

echo "Position enregistrée avec succès";

$stmt->close();
$conn->close();
?>

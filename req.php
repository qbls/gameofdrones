<?php
// Paramètres de connexion à la base de données
$servername = "10.5.40.34"; //
$username = "user";
$password = "user";
$dbname = "gameofdrones";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Récupérer les données de la requête POST
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$altitude = $_POST['altitude'];
$date = date("Y-m-d H:i:s");

//Préparer et lier
$stmt = $conn->prepare("INSERT INTO drone_positions (latitude, longitude, altitude, datetime) VALUES (:latitude, :longitude, :altitude, :date)");
$stmt->execute(["latitude" => $latitude, "longitude" => $longitude, "altitude" => $altitude, "date" => $date]);

} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}

$conn->close();
?>

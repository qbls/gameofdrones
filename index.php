<?php
session_start();
ini_set("display_errors",1);
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game of Drones</title>
    <link href="style.css" rel="stylesheet" />
</head>
<body>

    <h1>Game of Drones</h1>

    <?php
    if(isset($_SESSION['login']) && $_SESSION['login']=='Matis'){
    ?>

    <table>
        <tr>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Altitude</th>
            <th>Date</th>
        </tr>
        <?php
            $servername = "10.5.40.34";
            $username = "user";
            $password = "user";
            $dbname = "gameofdrones";

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $conn->prepare("SELECT * FROM drone_positions");
                $stmt->execute();
                $result = $stmt->fetchAll();

                foreach ($result as $row) {
                    echo "<tr>";
                    echo "<td>" . $row['latitude'] . "</td>";
                    echo "<td>" . $row['longitude'] . "</td>";
                    echo "<td>" . $row['altitude'] . "</td>";
                    echo "<td>" . $row['datetime'] . "</td>";
                    echo "</tr>";
                }

            } catch(PDOException $e) {
                echo "Erreur de connexion : " . $e->getMessage();
            }

            $conn = null;
        ?>
    </table>
    <form action="login.html" method="post">
        <?php
        session_destroy();
        ?>
        <input type="submit" value="Déconnexion">
    </form>
    <?php
    }else{
        echo "Accès refusé.";
    }
    ?>

</body>
</html>
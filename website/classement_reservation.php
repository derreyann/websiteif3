<!doctype html>
<style>
    table, td, tr{
        text-align:center
    }
</style>
<html>
<head>
<meta charset="utf-8">
<title>Classement réservations</title>
</head>

<body>
<?php
    // Connexion à la base de données
    include "BDD.php";
    include "menu.php";

    // Show the number of reservations by user sorted by number of reservations
    $sql = "SELECT nom, prenom, COUNT(*) AS nb_reservations FROM reservation INNER JOIN  utilisateur ON reservation.id_user_1 = utilisateur.id GROUP BY utilisateur.id ORDER BY nb_reservations DESC";
    $result = $conn->query($sql);

    //Print the result in a table
    echo "<center><h1>Classements</h1></center>";
    echo "<center><table border='1'></center>";
    echo "<tr><th>Nom</th><th>Prénom</th><th>Nombre de réservations</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["nom"]."</td><td>".$row["prenom"]."</td><td>".$row["nb_reservations"]."</td></tr>";
    }
    echo "</table>";
?>
</body>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Document sans titre</title>
</head>

<body>
<?php
include("BDD.php");
$sql="SELECT * FROM reservation WHERE date=\"".$_POST["date"]."\" AND (h_debut BETWEEN \"".$_POST["heure"]."\"-\"".$_POST["durée"]."\" AND \"".$_POST["heure"]."\"+\"".$_POST["durée"]."\");";
$result = $conn->query($sql);

//Si l'utilisateur existe, le renvois sur la page d'inscription avec une erreur
if(!empty($result) && $result->num_rows > 0) {

header('Location: reservations.php?message=Créneau déjà pris');

}else{
// inserer les information dans la base de donnée
    $sql3="SELECT DISTINCT * from utilisateur WHERE mail=\"".$_POST["j1"]."\"";
    $result3 = $conn->query($sql3);
    $row3 = $result3->fetch_assoc();
    $sql2="SELECT DISTINCT * from utilisateur WHERE mail=\"".$_POST["j2"]."\"";
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_assoc();
    $sql="SET foreign_key_checks = 0";
    $result = $conn->query($sql);
    $sql="INSERT INTO reservation (id_user_1, id_user_2, id_terrain, date, h_debut, durée) VALUES (\"".$row3["id"]."\",\"".$row2['id']."\",\"".$_POST["terrain"]."\", \"".$_POST["date"]."\",\"".$_POST["heure"]."\",\"".$_POST["durée"]."\")";
    $conn->query($sql);
//Le revoie sur son profile
   header('Location: profile.php');
}?>

</body>
</html>
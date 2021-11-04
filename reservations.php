<!doctype html>
<html>
<head>
</head>
<body>
<?php include("menu.php");
include("BDD.php");
if(isset($_GET["message"])){
echo $_GET["message"];
//Permet d'afficher un message d'erreur
}?>
<title>Faire une réservation</title>
<h1>Réservations en cours</h1>
<?php
$sql="SELECT * FROM utilisateur WHERE mail=\"".$_SESSION["mail"]."\" ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
if(!iscotisant($row['id'], $conn)){
header("Location: profile.php?message=Vous n'êtes pas cotisant");
};?>
<?php
$sql="SELECT * FROM reservation ORDER BY date";
$result = $conn->query($sql);
if(!empty($result) && $result->num_rows > 0) { ?>

    <table>
        <tr>
            <th>Joueur 1 </th>
            <th>Joueur 2 </th>
            <th>Terrain </th>
            <th>Date </th>
            <th>Heure </th>
            <th>Durée</th>
        </tr>
        <?php    while ($row2 = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row2['id_user_1'] ?></td>
                <td><?php echo $row2['id_user_2'] ?></td>
                <td><?php echo $row2['id_terrain'] ?></td>
                <td><?php echo $row2['date'] ?></td>
                <td><?php echo$row2['h_debut'] ?></td>
                <td><?php echo $row2['durée'], ' heure(s)' ?></td>
            </tr>
        <?php } ?>
    </table>
    <?php
}else{
    echo "Vous n'avez pas de réservations";
}
?>

<br>
<h1>Faire une réservation</h1>
<form method="POST" action="add_reservations.php">

    <table>
        <tr><td>Joueur 1:  <input type="text" name="j1" id="j1" required><td/></tr>
        <tr><td>Joueur 2:  <input type="text" name="j2" id="j2" required><td/><tr/>
        <tr><td>Terrain : <select name="terrain" id="terrain" required>
                    <option value="0">Couvert</option>
                    <option value="1">Découvert 1</option>
                    <option value="2" selected>Découvert 2</option>
                </select><td/><tr/>
        <tr><td>Date:  <input type="date" name="date" id="date" required><td/><tr/>
        <tr><td>Heure: <input type="number" name="heure" id="heure" min="8" max="19" required> h<td/><tr/></table>
        <tr><td>Durée (h): <input type="number" name="durée" id="durée" min="1" max="4" required><td/><tr/></table>
    <br><br>
    <input type="submit"></form>
</body>
</html>

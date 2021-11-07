<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Document sans titre</title>
</head>

<body>
<h1>Modifier votre réservation (admin mode) : </h1>

<?php
include("BDD.php");
include("menu.php");
//check if the user is admin
if(!isset($_SESSION['mail'])){
    header("Location:index.php?message=Veuillez vous connecter");
}
$sql="SELECT * FROM utilisateur WHERE mail=\"".$_SESSION["mail"]."\" ;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
if(!$row['type_compte']==0){
    header("Location:profile.php?message=Vous n'êtes pas admin.");
}
$sql3="SELECT DISTINCT * from utilisateur WHERE id=\"".$_POST["id1"]."\"";
$result3 = $conn->query($sql3);
$row3 = $result3->fetch_assoc();
$sql2="SELECT DISTINCT * from utilisateur WHERE id=\"".$_POST["id2"]."\"";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();
echo '<form method="POST" action="apply_edit.php">

    <table>
    <tr><td><input type="hidden" name="oldj1" id="oldj1" value="'.$_POST['id1'].'"><td/></tr>
        <tr><td><input type="hidden" name="oldj2" id="oldj2" value="'.$_POST["id2"].'"><td/><tr/>
        <tr><td><input type="hidden" name="oldterrain" id="oldterrain" value="'.$_POST["idterrain"].'">
                    <td/><tr/>
        <tr><td><input type="hidden" name="olddate" id="olddate" value="'.$_POST["date"].'"><td/><tr/>
        <tr><td><input type="hidden" name="oldheure" id="oldheure" min="8" max="19" value="'.$_POST["h_debut"].'"><td/><tr/>
    <tr><td><input type="hidden" name="olddurée" id="olddurée" min="1" max="4" value="'.$_POST["durée"].'"><td/><tr/>
    <tr><td>Joueur 1:  <input type="email" name="j1" id="j1" required value="'.$row3['mail'].'"><td/></tr>
        <tr><td>Joueur 2: (si invité laisser libre) <input type="text" name="j2" id="j2" value="'.$row2['mail'].'"><td/><tr/>
        <tr><td>Terrain : <select name="terrain" id="terrain" required value="'.$_POST["idterrain"].'">
                    <option value="0">Couvert</option>
                    <option value="1">Découvert 1</option>
                    <option value="2" selected>Découvert 2</option
                </select><td/><tr/>
        <tr><td>Date:  <input type="date" name="date" id="date" required value="'.$_POST["date"].'"><td/><tr/>
        <tr><td>Heure: <input type="number" name="heure" id="heure" min="8" max="19" required value="'.$_POST["h_debut"].'"><td/><tr/>
    <tr><td>Durée (h): <input type="number" name="durée" id="durée" min="1" max="4" required value="'.$_POST["durée"].'"><td/><tr/>
    <tr><td>Réserver le créneau combien de semaines <input type="number" name="repeating" id="repeating" min="1" max="52"><td/><tr/>

    </table>
    
    <br><br>
    <input type="submit"></form>'?>
</body>
</html>
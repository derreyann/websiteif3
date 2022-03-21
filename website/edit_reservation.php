<!doctype html>
<style>
    form, tr, td, input, submit, button, table, p, h1{
        text-align: center;
        align-content : center;
        background-color : ;
    }
    h1{
        vertical-align: center;
        position: center;
        padding-top: 220px;
    }
    select, input {
        text-align: center;
        align-content: center;
        border-radius: 10px;
        position: relative;
        content-visibility: revert
        background-color: #1a1a1a;
        height : 35px;
        width:150px;
</style>
<html>
<head>
    <meta charset="utf-8">
    <title>Document sans titre</title>
</head>

<body>

<?php include("menu.php");
include("BDD.php");
$sql3="SELECT DISTINCT * from utilisateur WHERE id=\"".$_POST["id1"]."\"";
$result3 = $conn->query($sql3);
$row3 = $result3->fetch_assoc();
$sql2="SELECT DISTINCT * from utilisateur WHERE id=\"".$_POST["id2"]."\"";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();
echo '<form method="POST" action="apply_edit.php">
    <h1>Modifier votre réservation : </h1>
    <table>
    <tr><td><input type="hidden" name="oldj1" id="oldj1" value="'.$_POST['id1'].'"><td/></tr>
        <tr><td><input type="hidden" name="oldj2" id="oldj2" value="'.$_POST["id2"].'">
        <tr><td><input type="hidden" name="oldterrain" id="oldterrain" value="'.$_POST["idterrain"].'">
                    
        <tr><td><input type="hidden" name="olddate" id="olddate" value="'.$_POST["date"].'">
        <tr><td><input type="hidden" name="oldheure" id="oldheure" min="8" max="19" value="'.$_POST["h_debut"].'">
    <tr><td><input type="hidden" name="olddurée" id="olddurée" min="1" max="4" value="'.$_POST["durée"].'">
    <tr><td><input type="hidden" name="j1" id="j1" required value="'.$row3['mail'].'"><td/></tr>
    Joueur 1:<br> <input type="email" name="j1" id="j1" disabled required value="'.$row3['mail'].'"><br>
        Joueur 2:(si invité laisser libre) <br><input type="text" name="j2" id="j2" value="'.$row2['mail'].'"><br>
        Terrain : <br><select name="terrain" id="terrain" required value="'.$_POST["idterrain"].'">
                    <option value="0">Couvert</option>
                    <option value="1">Découvert 1</option>
                    <option value="2" selected>Découvert 2</option>
                </select><br>  
        Date:<br> <input type="date" name="date" id="date" required value="'.$_POST["date"].'"><br>
        Heure:<br> <input type="number" name="heure" id="heure" min="8" max="19" required value="'.$_POST["h_debut"].'"><br>
    Durée (h):<br> <input type="number" name="durée" id="durée" min="1" max="4" required value="'.$_POST["durée"].'"></table>
    <input type="submit"></form>'?>
</body>
</html>
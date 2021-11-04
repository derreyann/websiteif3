<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Document sans titre</title>
</head>

<body>
<h1>Modifier votre réservation : </h1>
<?php
echo '<form method="POST" action="apply_edit.php">

    <table>
    <tr><td><input type="hidden" name="oldj1" id="oldj1" value="'.$_POST['id1'].'"><td/></tr>
        <tr><td><input type="hidden" name="oldj2" id="oldj2" value="'.$_POST["id2"].'"><td/><tr/>
        <tr><td><input type="hidden" name="oldterrain" id="oldterrain" value="'.$_POST["idterrain"].'">
                    <td/><tr/>
        <tr><td><input type="hidden" name="olddate" id="olddate" value="'.$_POST["date"].'"><td/><tr/>
        <tr><td><input type="hidden" name="oldheure" id="oldheure" min="8" max="19" value="'.$_POST["h_debut"].'"><td/><tr/>
    <tr><td><input type="hidden" name="olddurée" id="olddurée" min="1" max="4" value="'.$_POST["durée"].'"><td/><tr/>
        <tr><td>Joueur 1:  <input type="text" name="j1" id="j1" required value="'.$_POST['id1'].'"><td/></tr>
        <tr><td>Joueur 2:  <input type="text" name="j2" id="j2" required value="'.$_POST["id2"].'"><td/><tr/>
        <tr><td>Terrain : <select name="terrain" id="terrain" required value="'.$_POST["idterrain"].'">
                    <option value="0">Couvert</option>
                    <option value="1">Découvert 1</option>
                    <option value="2" selected>Découvert 2</option
                </select><td/><tr/>
        <tr><td>Date:  <input type="date" name="date" id="date" required value="'.$_POST["date"].'"><td/><tr/>
        <tr><td>Heure: <input type="number" name="heure" id="heure" min="8" max="19" required value="'.$_POST["h_debut"].'"><td/><tr/>
    <tr><td>Durée (h): <input type="number" name="durée" id="durée" min="1" max="4" required value="'.$_POST["durée"].'"><td/><tr/></table>
    <br><br>
    <input type="submit"></form>'?>
</body>
</html>
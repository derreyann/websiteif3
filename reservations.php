<!doctype html>
<html>
<style>
    form, tr, td, input, submit, button, table, p, h1{
        text-align: center;
        align-content : center;
    }
    h1{
        vertical-align: center;
        position: center;
        padding-top: 100px;
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
    }
    .button{
        text-align: center;
        align-content : center;
        background-color: #4e4e4e;
        border-radius: 12px;
        border: 0;
        box-sizing: border-box;
        color: #eee;
        cursor: pointer;
        font-size: 15.5px;
        height: 45px;
    // outline: 0;
        width: 12%;
        margin-left:10px;
    }
</style>
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
};
//If the user is an admin show a buton to classement_reservation.php
if($row['type_compte']==0){
echo "<a class=\"button\" href=\"classement_reservation.php\">Classement des réservations</a><br>";
}

$sql="SELECT * FROM reservation WHERE date>=CURRENT_DATE ORDER BY date;";
$result = $conn->query($sql);

if(!empty($result) && $result->num_rows > 0) { ?>
    <table class="table">
        <tr>
            <th>Joueur 1 </th>
            <th>Joueur 2 </th>
            <th>Terrain </th>
            <th>Date </th>
            <th>Horaire </th>
            <th>Durée</th><th>
            <th> </th>
            <th> </th>
        </tr>
        <?php while ($row2 = $result->fetch_assoc()) {?>

            <tr>
                <td><?php $sql2="SELECT DISTINCT * FROM utilisateur WHERE id=\"".$row2["id_user_1"]."\"";
                    $result2 = $conn->query($sql2);
                    $row3 = $result2->fetch_assoc();
                    echo $row3['nom'] ?></td>
                <td><?php $sql2="SELECT DISTINCT * FROM utilisateur WHERE id=\"".$row2["id_user_2"]."\"";
                    $result2 = $conn->query($sql2);
                    $row3 = $result2->fetch_assoc();
                    echo $row3['nom'] ?></td>
                <td><?php echo $row2['id_terrain'] ?></td>
                <td><?php echo $row2['date'] ?></td>
                <td><?php echo $row2['h_debut'] ?></td>
                <td><?php echo $row2['durée'] ?><tb>
                <td><?php if($row['type_compte']==0){?>
                        <form action="edit_reservation_admin.php" method="POST">
                        <input type="hidden" name="id1" value="<?php echo $row2['id_user_1'];?>" />
                        <input type="hidden" name="id2" value="<?php echo $row2['id_user_2'];?>" />
                        <input type="hidden" name="idterrain" value="<?php echo $row2['id_terrain'];?>" />
                        <input type="hidden" name="date" value="<?php echo $row2['date'];?>" />
                        <input type="hidden" name="h_debut" value="<?php echo $row2['h_debut'];?>" />
                        <input type="hidden" name="durée" value="<?php echo $row2['durée'];?>" />
                        <input type="submit" value="Edit"/><tb>
                    </form><?php }?>
                <td><?php if($row['type_compte']==0){?> <form action="aurevoir_reservation.php" method="POST">
                        <input type="hidden" name="id1" value="<?php echo $row2['id_user_1'];?>" />
                        <input type="hidden" name="id2" value="<?php echo $row2['id_user_2'];?>" />
                        <input type="hidden" name="idterrain" value="<?php echo $row2['id_terrain'];?>" />
                        <input type="hidden" name="date" value="<?php echo $row2['date'];?>" />
                        <input type="hidden" name="h_debut" value="<?php echo $row2['h_debut'];?>" />
                        <input type="hidden" name="durée" value="<?php echo $row2['durée'];?>" />
                        <input type="submit" value="Delete"/><tb>
                    </form><?php }?>
                    </tb>
                </td>
            </tr>
        <?php } ?>
    </table>

    <?php
}else{
    echo "Personne n'a réservé";
}
?>

<br>
<h1>Faire une réservation</h1>
<form method="POST" action="add_reservations.php">

    <center><table>
        <tr><td><input type="hidden" name="j1" id="j1" required value="<?php echo $row['mail'] ?>"><td/></tr>
        <tr><td>Joueur 1: <br> <input type="text" name="j1" id="j1" required disabled value="<?php echo $row['mail'] ?>"><td/></tr>
        <tr><td>Joueur 2: (si invité, laisser libre)  <br><input type="text" name="j2" id="j2"><td/><tr/>
        <tr><td>Terrain : <br><select name="terrain" id="terrain" required>
                    <option value="0">Couvert</option>
                    <option value="1">Découvert 1</option>
                    <option value="2" selected>Découvert 2</option>
                </select><td/><tr/>
        <tr><td>Date:  <br><input type="date" name="date" id="date" required><td/><tr/>
        <tr><td>Horaire (h): <br><input type="number" name="heure" id="heure" min="8" max="19" required><td/><tr/>
        <tr><td>Durée (h): <br><input type="number" name="durée" id="durée" min="1" max="4" required><td/><tr/></table></center>
    <br>
    <input type="submit"></form><br>
</body>
</html>

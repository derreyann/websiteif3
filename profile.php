<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <style>
        h1{
            vertical-align: center;
            position: center;
            text-align: center;

        }
        .submit {
            background-color: #08d;
            border-radius: 12px;
            border: 0;
            box-sizing: border-box;
            color: #eee;
            cursor: pointer;
            font-size: 18px;
            height: 50px;
        / / outline: 0;
            text-align: center;
            width: 50%
        }
        .joe{
            text-align: center;
            align-content : center;
            background-color: #4e4e4e;
            border-radius: 12px;
            border: 0;
            box-sizing: border-box;
            color: #eee;
            cursor: pointer;
            font-size: 18px;
            height: 45px;
        // outline: 0;
            width: 12%;
            margin-left:10px;
        }
    </style>
<?php
include("menu.php");
include("BDD.php");

if(!isset($_SESSION["mail"])){
    header("Location: index.php?message=Veuillez vous connecter");
}
$sql="SELECT * FROM utilisateur WHERE mail=\"".$_SESSION["mail"]."\" AND MdP=PASSWORD(\"".$_SESSION["mdp"]."\");";
$result=$conn->query($sql);
$row = $result->fetch_assoc();
?>
<title>Profile</title>
</head>
<body>
<h1 class="h1">Bienvenue sur votre profil <?php echo $row["prenom"] ?></h1>

<button class="joe" onclick="window.location.href = 'modifier_profile.php';">Modifier votre profile</button><br>
<br>
<form id="form" name="form" method="post">

</form>
</form>
<table class="table">
<tr>
<td>Prénom :</td><td><?php echo $row["prenom"]; ?></td>
</tr>
<tr>
<td>Nom :</td><td><?php echo $row["nom"]; ?></td>
</tr>
<tr>
<td>Email :</td><td><?php echo $row["mail"]; ?></td>
</tr>
<tr>
<td>Date de Naissance:</td><td><?php echo $row["naissance"]; ?></td>
</tr>
<tr>
<?php
if($row["type_compte"] == 0){
         $type = "Administrateur";
    }
       elseif($row["type_compte"] == 1){
         $type = "Membre";
       }
        elseif($row["type_compte"] == 2){
         $type = "Invité";
        }
    ?>
<tr>
<td>Type de compte:</td><td><?php echo $type; ?></td>
</tr>
</table>

<h1>Mes réservations</h1>

<?php
$sql="SELECT DISTINCT id_user_1, id_user_2, id_terrain, date, h_debut, durée FROM reservation INNER JOIN utilisateur ON id_user_1=\"".$row["id"]."\" WHERE date > CURRENT_DATE ORDER BY date;";
$result = $conn->query($sql);
if(!empty($result) && $result->num_rows > 0) {?>
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
                    <td><?php
                        $sql2="SELECT DISTINCT * FROM utilisateur WHERE id=\"".$row2["id_user_1"]."\"";
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
                    <td><form action="edit_reservation.php" method="POST">
                            <input type="hidden" name="id1" value="<?php echo $row2['id_user_1'];?>" />
                            <input type="hidden" name="id2" value="<?php echo $row2['id_user_2'];?>" />
                            <input type="hidden" name="idterrain" value="<?php echo $row2['id_terrain'];?>" />
                            <input type="hidden" name="date" value="<?php echo $row2['date'];?>" />
                            <input type="hidden" name="h_debut" value="<?php echo $row2['h_debut'];?>" />
                            <input type="hidden" name="durée" value="<?php echo $row2['durée'];?>" />
                            <input class="submit" type="submit" value="Edit"/><tb>
                            </form>
                    <td><form action="aurevoir_reservation.php" method="POST">
                            <input type="hidden" name="id1" value="<?php echo $row2['id_user_1'];?>" />
                            <input type="hidden" name="id2" value="<?php echo $row2['id_user_2'];?>" />
                            <input type="hidden" name="idterrain" value="<?php echo $row2['id_terrain'];?>" />
                            <input type="hidden" name="date" value="<?php echo $row2['date'];?>" />
                            <input type="hidden" name="h_debut" value="<?php echo $row2['h_debut'];?>" />
                            <input type="hidden" name="durée" value="<?php echo $row2['durée'];?>" />
                            <input class= "submit" type="submit" value="Delete"/><tb>
                        </form>
                        </tb>
                    </td>
                </tr>
            <?php } ?>
        </table>
<?php
}else{
    echo "Vous n'avez pas de réservations";
}?>
<br>
<?php
if (isset($_GET["message"])) {
    echo $_GET["message"];
}//Permet d'afficher un message d'erreur
?>

<button class="joe" onclick="window.location.href = 'reservations.php';">Ajouter une réservation</button>

<h1>Mon historique</h1>
<?php
$sql="SELECT DISTINCT id_user_1, id_user_2, id_terrain, date, h_debut, durée FROM reservation INNER JOIN utilisateur ON id_user_1=\"".$row["id"]."\" WHERE date < CURRENT_DATE ORDER BY date";
$result = $conn->query($sql);
if(!empty($result) && $result->num_rows > 0) {?>
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
                <td><?php
                    $sql2="SELECT DISTINCT * FROM utilisateur WHERE id=\"".$row2["id_user_1"]."\"";
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
                <td></tb>
                </td>
            </tr>
        <?php } ?>
    </table>
    <?php
}else{
    echo "Pas d'historique";
}?>
</body>
</html>
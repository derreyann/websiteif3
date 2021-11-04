<!doctype html>
<html>
<head>
    <meta charset="utf-8">

    <?php
    include("menu.php");
    include("BDD.php");
    ?>
    <title>Profile</title>
</head>
<body>
<?php
$sql="SET foreign_key_checks = 0";
$result = $conn->query($sql);
$sql='DELETE FROM reservation WHERE id_user_1="'.$_POST['id1'].'" AND  id_user_2="'.$_POST['id2'].'" AND  id_terrain="'.$_POST['idterrain'].'" AND date="'.$_POST['date'].'" AND  h_debut="'.$_POST['h_debut'].'" AND  durée="'.$_POST['durée'].'"';
$conn->query($sql);
header("Location: profile.php");?>

</body>
</html>
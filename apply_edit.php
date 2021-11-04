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
$sql='UPDATE reservation SET id_user_1="'.$_POST['j1'].'",id_user_2="'.$_POST['j2'].'",id_terrain="'.$_POST['terrain'].'",date="'.$_POST['date'].'",h_debut="'.$_POST['heure'].'",durée="'.$_POST['durée'].'"
WHERE id_user_1="'.$_POST['oldj1'].'" AND  id_user_2="'.$_POST['oldj2'].'" AND  id_terrain="'.$_POST['oldterrain'].'" AND date="'.$_POST['olddate'].'" AND  h_debut="'.$_POST['oldheure'].'" AND  durée="'.$_POST['olddurée'].'"';
$conn->query($sql);
header("Location: profile.php");?>

</body>
</html>
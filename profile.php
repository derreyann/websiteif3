<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php
include("BDD.php");
session_start();

$sql="SELECT prenom FROM utilisateur WHERE mail=\"".$_SESSION["mail"]."\" AND MdP=PASSWORD(\"".$_SESSION["mdp"]."\");";
$result=$conn->query($sql);
$row = $result->fetch_assoc();
?>
<title>Untitled Document</title>
</head>
<h1>Bienvenue sur votre profil <?php echo $row["prenom"] ?></h1>

<?php
echo "Hello World!";
?>
	<button onclick="window.location.href = 'modifier_profile.php';">Modifier votre profile</button>

<body>
<form id="form" name="form" method="post">
  
</form>
</form>
</body>
</html>
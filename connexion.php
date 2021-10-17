<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Document sans titre</title>
</head>

<body>
	<?php
	$servername = "localhost";
	$username = "root";
	$password = "Yann&Esteban68";
	$db_name = "badminton";
	
// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);
// Create connection
$mdp=$_POST["pass1"];
$mail=$_POST["email1"];
$sql="SELECT * FROM utilisateur WHERE mail=\"".$mail."\" AND MdP=PASSWORD(\"".$mdp."\")";
$result = $conn->query($sql);


if($row = $result->fetch_assoc()) {
    echo "Bonjour " . $row["nom"]. " vous êtes connecté <br/>";
  } else {
	echo "Erreur mail ou mdp";
}

$conn->close();
	?>
</body>
</html>
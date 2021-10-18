<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Document sans titre</title>
</head>

<body>
	<?php
	include('BDD.php');
	

// Recuperation des information de la page précédente
$mdp=$_POST["pass1"];
$mail=$_POST["email1"];
$sql="SELECT * FROM utilisateur WHERE mail=\"".$mail."\" AND MdP=PASSWORD(\"".$mdp."\");";
	echo $sql;
$result = $conn->query($sql);
//redirection
if($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	session_start();
	$_SESSION["mail"]=$mail;
	$_SESSION["mdp"]=$mdp;
    echo "Bonjour " . $row["nom"]. " vous êtes connecté <br/>";
	header('Location: profile.php');
  } else {
	header("location: index.php?message=Id ou mot de passe incorrecte");
}

	
$conn->close();
	?>
</body>
</html>
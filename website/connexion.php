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
//Recherche l'utilisateur dans la base de donnée
$sql="SELECT * FROM utilisateur WHERE mail=\"".$mail."\" AND MdP=PASSWORD(\"".$mdp."\");";
$result = $conn->query($sql);
//Si l'utilisateur existe, crée une session avec ses identifiant
if($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	session_start();
	$_SESSION["mail"]=$mail;
	$_SESSION["mdp"]=$mdp;
    echo "Bonjour " . $row["nom"]. " vous êtes connecté <br/>";
	header('Location: profile.php');
  } else {
	//Si il n'existe pas, le renvoie sur la page de connexion
	header("location: index.php?message=Id ou mot de passe incorrecte");
}

	
$conn->close();
	?>
</body>
</html>
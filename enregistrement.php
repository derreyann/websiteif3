<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Document sans titre</title>
</head>

<body>
	<?php
	//connecter la base de donnée
	include("BDD.php");
	
	//Recherche si un utilisateur existe déjà avec l'e-mail
	$sql="SELECT * FROM utilisateur WHERE mail=\"".$_POST["email"]."\";";
	$result = $conn->query($sql);
	
	//Si l'utilisateur existe, le renvois sur la page d'inscription avec une erreur
	if($result->num_rows > 0) {
	
		header('Location: inscription.php?message=E-mail déjà dans la base de donnée');
		
	}else{
		// inserer les information dans la base de donnée
		$sql="INSERT INTO utilisateur (nom, prenom, mail, MdP,naissance,type_compte) VALUES (\"".$_POST["nom"]."\", \"".$_POST["prenom"]."\",\"".$_POST["email"]."\",PASSWORD(\"".$_POST["motdepasse"]."\"),\"".$_POST["date"]."\",1)";


		$conn->query($sql);
		
		//Initie la session pour que l'utilisateur reste connecté
		session_start();
		$_SESSION["mail"]=$_POST["email"];
		$_SESSION["mdp"]=$_POST["motdepasse"];
		//Le revoie sur son profile
		header('Location: profile.php');
	}
	;?>
	
</body>
</html>
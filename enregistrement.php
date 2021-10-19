<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Document sans titre</title>
</head>

<body>
	<?php
	include("BDD.php");
	
	$sql="SELECT * FROM utilisateur WHERE mail=\"".$_POST["email"]."\";";
	$result = $conn->query($sql);
	
	
	if($result->num_rows > 0) {
	
		header('Location: inscription.php?message=E-mail déjà dans la base de donnée');
		
	}else{
		// inserer les information dans la base de donnée
		$sql="INSERT INTO utilisateur (nom, prenom, mail, MdP,naissance,type_compte) VALUES (\"".$_POST["nom"]."\", \"".$_POST["prenom"]."\",\"".$_POST["email"]."\",PASSWORD(\"".$_POST["motdepasse"]."\"),\"".$_POST["date"]."\",1)";


		$conn->query($sql);

		session_start();
		$_SESSION["mail"]=$_POST["email"];
		$_SESSION["mdp"]=$_POST["motdepasse"];
	
		header('Location: profile.php');
	}
	;?>
	
</body>
</html>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Document sans titre</title>
</head>

<body>
	<?php
	include("BDD.php");
	
	// prepare and bind
	$sql="INSERT INTO utilisateur (nom, prenom, mail, MdP,naissance,type_compte) VALUES (\"".$_POST["nom"]."\", \"".$_POST["prenom"]."\",\"".$_POST["email"]."\",PASSWORD(\"".$_POST["motdepasse"]."\"),\"".$_POST["date"]."\",1)";

	
	$conn->query($sql);

	session_start();
	$_SESSION["mail"]=$_POST["email"];
	$_SESSION["mdp"]=$_POST["motdepasse"];
	
	header('Location: profile.php');
	;?>
	
</body>
</html>
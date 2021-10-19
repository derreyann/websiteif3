<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Document sans titre</title>
</head>

<body>
	<?php 
	//Cette page permet d'avoir tous les paramètre de connection de la base de donnée au même endroite, ainsi si un paramètre doit être changé, il le sera pour toutes les pages
	//mise à jour des paramètres de la base de donné
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db_name = "badminton";
	
// Créer connection
$conn = new mysqli($servername, $username, $password, $db_name);
	?>
</body>
</html>
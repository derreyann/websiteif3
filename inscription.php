<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Document sans nom</title>
</head>

<body>
	<?php if(isset($_GET["message"])){
	echo $_GET["message"];
	}?>
	<form method="POST" action="enregistrement.php">
	
	<table>
	<tr><td>Nom:<td/><td> <input type="text" name="nom" id="nom"><td/></tr>
	<tr><td>Prénom:<td/><td> <input type="text" name="prenom" id="prenom"><td/><tr/>
	<tr><td>E-mail:<td/><td> <input type="email" name="email" id="email"><td/><tr/>
	<tr><td>Mot de passe:<td/><td> <input type="password" name="motdepasse" id="motdepasse"><td/><tr/>
	<tr><td>Date de naissance:<td/><td> <input type="date" name="date" id="date"><td/><tr/></table>
	<input type="submit"></form>
</body>
</html>

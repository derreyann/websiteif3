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
	Nom: <input type="text" name="nom" id="nom"><br/>
	Prénom: <input type="text" name="prenom" id="prenom"><br/>
	E-mail: <input type="email" name="email" id="email"><br/>
	Mot de passe: <input type="password" name="motdepasse" id="motdepasse"><br/>
	Date de naissance: <input type="date" name="date" id="date"><br/><br/>
	<input type="submit"></form>
</body>
</html>

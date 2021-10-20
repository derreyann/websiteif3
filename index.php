<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Accueil</title>
</head>

<body><p>Bienvenue au Club de Badminton</p>
	<p>
	<?php if(isset($_GET["message"])){
	echo $_GET["message"];
	}//Permet d'affiché un message d'erreur
	?>
	<form method="POST" action="connexion.php">
		<table>
			<tr><td>E-mail:</td><td> <input type="email" name="email1" id="email1" required></td></tr>
			<tr><td>Mot de passe:</td><td><input type="password" name="pass1" id="pass1" required></td></tr></table>
		
		<input type="submit" value="Se connecter">
	</form>
	</p>
	<p>
		<button onclick="window.location.href = 'inscription.php';">Inscription</button>
	</p>
</body>
</html>

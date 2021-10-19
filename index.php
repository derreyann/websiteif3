<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>index</title>
</head>

<body><p>Bienvenue au Club de Badminton</p>
	<p>
	<?php if(isset($_GET["message"])){
	echo $_GET["message"];
}?>
	<form method="POST" action="connexion.php">
		E-mail: <input type="email" name="email1" id="email1" required><br/>
		Mot de passe: <input type="password" name="pass1" id="pass1" required><br/>
		<input type="submit" value="Se connecter">
	</form>
	</p>
	<p>
		<button onclick="window.location.href = 'inscription.php';">Inscription</button>
	</p>
</body>
</html>

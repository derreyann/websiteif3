<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <style>
        form, tr, td, input, submit, button, table, p{
            text-align: center;
            align-content : center;
            background-color : ;
        }

    </style>
<title>Accueil</title>
</head>

<body>
	<p>
	<?php include("menu.php");
	if(isset($_GET["message"])){
	echo $_GET["message"];
	}//Permet d'affiché un message d'erreur
	?>
	<form method="POST" action="connexion.php">
		<table>
			E-mail:<br><input type="email" name="email1" id="email1" required><br>
			Mot de passe:<br><input type="password" name="pass1" id="pass1" required></table>
        <br>
		
		<input type="submit" value="Se connecter">
	</form>
	</p>
	<p>
		<button onclick="window.location.href = 'inscription.php';">Inscription</button>
	</p>
</body>
</html>

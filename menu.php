<!doctype html>
<html>
<head>
	<link rel="stylesheet" href="menu.css" />
<meta charset="utf-8">
<title>Document sans nom</title>
	

</head>

<body>

<?php session_start();
	if (isset($_SESSION["mail"])) {
echo '<nav>
		<ul>
    		<li><a href="index.php">Accueil</a></li>
			<li><a href="profile.php">Utilisateur</a></li>
			<li><a href="recherche.php">Chercher un utilisateur</a></li>
			<li><a href="licence.php">Licence</a></li>
		 </ul>
		</nav>';
	} ?>
</body>
</html>

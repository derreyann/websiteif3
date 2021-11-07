<!doctype html>
<html>
<head>
	<link rel="stylesheet" href="menu.css" />
	<link rel="stylesheet"
href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
<meta charset="utf-8">
<title>Document sans nom</title>
	

</head>

<body>

<?php session_start();
	//Si un utilisateur est connecté affiche un menu
	if (isset($_SESSION["mail"])) {
echo '<nav>
		<ul>
    		<li><a href="index.php">Accueil</a></li>
			<li><a href="profile.php">Votre profile</a></li>
			<li><a href="recherche.php">Chercher un utilisateur</a></li>
			<li><a href="reservations.php">Reservation</a></li>
			<li><a href="deconnexion.php">Deconnexion</a></li>
			
		 </ul>
		</nav>';
	} ?>
</body>
</html>

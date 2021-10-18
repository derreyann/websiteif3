<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "badminton";
$conn = new mysqli($servername, $username, $password, $db_name);
session_start();
    $_SESSION["mail"]>$mail;
    $_SESSION["mdp"]>$mdp;
$prenom="SELECT prenom FROM utilisateur WHERE mail=\"".$mail."\" AND MdP=PASSWORD(\"".$mdp."\");";
?>
<title>Untitled Document</title>
</head>
<h1>Bienvenue sur votre profil <?php echo "$prenom" ?></h1>

<?php
echo "Hello World!";
?>

<body>
<form id="form" name="form" method="post">
  
</form>
</form>
</body>
</html>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php
include("menu.php");
include("BDD.php");
<<<<<<< Updated upstream
$sql="SELECT prenom FROM utilisateur WHERE mail=\"".$_SESSION["mail"]."\" AND MdP=PASSWORD(\"".$_SESSION["mdp"]."\");";
=======
session_start();

$sql="SELECT * FROM utilisateur WHERE mail=\"".$_SESSION["mail"]."\" AND MdP=PASSWORD(\"".$_SESSION["mdp"]."\");";
>>>>>>> Stashed changes
$result=$conn->query($sql);
$row = $result->fetch_assoc();
?>
<title>Profile</title>
</head>
<h1>Bienvenue sur votre profil <?php echo $row["prenom"] ?></h1>

// Bouton déconnection (clear session)
<a href="logout.php">Déconnection</a>
    
<?php
echo "Hello World!";
?>
<<<<<<< Updated upstream
	<button onclick="window.location.href = 'modifier_profile.php';">Modifier votre profile</button>

<body>
<form id="form" name="form" method="post">
  
</form>
</form>
=======
 // penser à mettre blob photo profil dans dbb pour pouvoir avoir truc joil
<table>
<tr>
<td>Prénom :</td><td><?php echo $row[prenom]; ?></td>
</tr>
<tr>
<td>Nom :</td><td><?php echo $row[nom]; ?></td>
</tr>
<tr>
<td>Email :</td><td><?php echo $row[email]; ?></td>
</tr>
<tr>
<td>Date de Naissance:</td><td><?php echo $row[date]; ?></td>
</tr>
<tr>
    //id 
<?php
if($row[type_compte] == 0){
         $type = "Non-Cotisant";
    }
       elseif($row[type_compte] == 1){
         $type = "Cotisant";
       }
        elseif($row[type_compte] == 2){
         $type = "Administrateur";
        }
    ?>
<tr>
<td>Type de compte:</td><td><?php echo $type; ?></td>
</tr>
<tr>
</table>
    
>>>>>>> Stashed changes
</body>
</html>
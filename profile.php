<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php
include("menu.php");
include("BDD.php");

$sql="SELECT * FROM utilisateur WHERE mail=\"".$_SESSION["mail"]."\" AND MdP=PASSWORD(\"".$_SESSION["mdp"]."\");";
$result=$conn->query($sql);
$row = $result->fetch_assoc();
?>
<title>Profile</title>
</head>
<h1>Bienvenue sur votre profil <?php echo $row["prenom"] ?></h1>

<button onclick="window.location.href = 'modifier_profile.php';">Modifier votre profile</button>

<body>
<form id="form" name="form" method="post">
  
</form>
</form>
=======
 // penser à mettre blob photo profil dans dbb pour pouvoir avoir truc joil
<table>
<tr>
<td>Prénom :</td><td><?php echo $row["prenom"]; ?></td>
</tr>
<tr>
<td>Nom :</td><td><?php echo $row["nom"]; ?></td>
</tr>
<tr>
<td>Email :</td><td><?php echo $row["mail"]; ?></td>
</tr>
<tr>
<td>Date de Naissance:</td><td><?php echo $row["naissance"]; ?></td>
</tr>
<tr>
<?php
if($row["type_compte"] == 0){
         $type = "Administrateur";
    }
       elseif($row["type_compte"] == 1){
         $type = "Membre";
       }
        elseif($row["type_compte"] == 2){
         $type = "Invité";
        }
    ?>
<tr>
<td>Type de compte:</td><td><?php echo $type; ?></td>
</tr>
<tr>
</table>

</body>
</html>
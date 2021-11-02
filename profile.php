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
</table>
<?php echo "Ton id est ", $row["id"]; ?>

<h1>Mes réservations</h1>

<?php
// A REMPLACER AVEC LES IDS USERS 1 (FAITS PAR USER SESSION)
// CODE A REUTILISER POUR LES MATCH JOUES, FACILE A ADAPTER MAIS CASSE COUILLE AU DEBUT
$sql="SELECT * FROM reservations";
$result = $conn->query($sql);
if(!empty($result) && $result->num_rows > 0) {
    while ($row2 = $result->fetch_assoc()) {
        //CONVERTIR LES PRENOMS ET LES NOMS DE L'ID JOUEUR2  + AVEC LES VARIABLES CONVERTIES DU TERRAIN
        print_r($row2['prenom']);
        echo "<p> </p>";

    }
}else{
    echo "Vous n'avez pas de réservations";
}
?>
</body>
</html>
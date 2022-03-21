<!doctype html>
<html>
<style>
    h1{
        vertical-align: center;
        position: center;
        text-align: center;

    }
    .submit {
        position: center;
        background-color: #08d;
        border-radius: 12px;
        border: 0;
        box-sizing: border-box;
        color: #eee;
        cursor: pointer;
        font-size: 18px;
        height: 50px;
    / / outline: 0;
        text-align: center;
        width: 15%
    }
    .joe{
        text-align: center;
        align-content : center;
        background-color: #4e4e4e;
        border-radius: 12px;
        border: 0;
        box-sizing: border-box;
        color: #eee;
        cursor: pointer;
        font-size: 18px;
        height: 45px;
    // outline: 0;
        width: 12%;
        margin-left:10px;
    }
</style>
<head>
<meta charset="utf-8">
<title>Profile</title>
</head>

<?php
	include("menu.php");
	//Check if the user is logged in
	if(isset($_SESSION["mail"])){
		
		include("BDD.php");
		$sql="SELECT * FROM utilisateur WHERE id=\"".$_GET["id"]."\" ;";
		$result = $conn->query($sql);
		
		
		if($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			
			?>
<title>Profile</title>
</head>
<h1>Bienvenue sur le profil <?php echo $row["prenom"] ?></h1>


<body>
<form id="form" name="form" method="post">

</form>
</form>
<table class="table">
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


<p> </p>

<h1>Les réservations</h1>

<?php

$sql="SELECT DISTINCT id_user_1, id_user_2, id_terrain, date, h_debut, durée FROM reservation INNER JOIN utilisateur ON id_user_1=\"".$row["id"]."\" ORDER BY date";
$result = $conn->query($sql);
if(!empty($result) && $result->num_rows > 0) {
    ?>
        <table class="table">
        <tr>
        <th>Joueur 1 </th>
        <th>Joueur 2 </th>
        <th>Terrain </th>
        <th>Date </th>
        <th>Horaire </th>
        <th>Durée</th><th>
        <th> </th>
        <th> </th>
        </tr>
            <?php while ($row2 = $result->fetch_assoc()) {?>

                <tr>
                    <td><?php
                        $sql2="SELECT DISTINCT * FROM utilisateur WHERE id=\"".$row2["id_user_1"]."\"";
                        $result2 = $conn->query($sql2);
                        $row3 = $result2->fetch_assoc();
                        echo $row3['nom'] ?></td>
                    <td><?php $sql2="SELECT DISTINCT * FROM utilisateur WHERE id=\"".$row2["id_user_2"]."\"";
                        $result2 = $conn->query($sql2);
                        $row3 = $result2->fetch_assoc();
                        echo $row3['nom'] ?></td>
                    <td><?php echo $row2['id_terrain'] ?></td>
                    <td><?php echo $row2['date'] ?></td>
                    <td><?php echo $row2['h_debut'] ?></td>
                    <td><?php echo $row2['durée'] ?><tb>
                   
                        </form>
                        </tb>
                    </td>
                </tr>
            <?php } ?>
        </table>
<?php
//Print number of reservation
echo "Nombre de réservations : ", $result->num_rows;

}else{
    echo "Il n'a pas de réservations";
}?>
<br>
<?php
if (isset($_GET["message"])) {
    echo $_GET["message"];
}//Permet d'afficher un message d'erreur

			
			//Ajout du bouton de modification pour les admin:
			$sql="SELECT * FROM utilisateur WHERE mail=\"".$_SESSION["mail"]."\" AND MdP=PASSWORD(\"".$_SESSION["mdp"]."\");";
			$result2 = $conn->query($sql);
			$row2= $result2->fetch_assoc();
			//Verification admin
			if($row2["type_compte"]==0){
				echo'<br><center><button class="submit" onclick="window.location.href = \'modifier_profile.php?id='.$_GET["id"].'\';">Modifier Profile</button></center>';
				echo'<br><center><button class="submit" onclick="window.location.href = \'licence.php?id='.$_GET["id"].'\';">Ajouter Licence</button></center>';
                echo'<br><center><button class="submit" onclick="window.location.href = \'upgrade_admin.php?id='.$_GET["id"].'\';">Mettre admin</button></center>';
			}
			
		}else{
			echo"Utilisateur introuvable";
		}
			
		
	}else{
		header("Location:index.php?Accès interdit sans connexion");
		 }
	?>
</body>
</html>
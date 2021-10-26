<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Profile</title>
</head>

<body>
	UNDER CONTRUCTION<?php
	include("menu.php");
	
	if(isset($_SESSION["mail"])){
		
		include("BDD.php");
		$sql="SELECT * FROM utilisateur WHERE id=\"".$_GET["id"]."\" ;";
		$result = $conn->query($sql);
		
		
		if($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			//Inserer ici les iformations de l'utilisateur copier depuis profile.
			
			//Ajout du bouton de modification pour les admin:
			$sql="SELECT * FROM utilisateur WHERE mail=\"".$_SESSION["mail"]."\" AND MdP=PASSWORD(\"".$_SESSION["mdp"]."\");";
			$result2 = $conn->query($sql);
			$row2= $result2->fetch_assoc();
			//Verification admin
			if($row2["type_compte"]==0){
				echo'<button onclick="window.location.href = \'modifier_profile.php?id='.$_GET["id"].'\';">Modifier Profile</button>';
				echo'<button onclick="window.location.href = \'licence.php?id='.$_GET["id"].'\';">Ajouter Licence</button>';
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
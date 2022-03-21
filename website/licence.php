<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Licence</title>
</head>

<body>
	<?php
	include("menu.php");
	if(isset($_SESSION["mail"])){
		
		include("BDD.php");

		//Ajout du bouton de modification pour les admin:
		$sql="SELECT * FROM utilisateur WHERE mail=\"".$_SESSION["mail"]."\" AND MdP=PASSWORD(\"".$_SESSION["mdp"]."\");";
		$result2 = $conn->query($sql);
		$row2= $result2->fetch_assoc();
		//Verification admin
		if($row2["type_compte"]==0){
			$sql="SELECT * FROM utilisateur WHERE id=\"".$_GET["id"]."\" ;";
			$result = $conn->query($sql);


			if($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				
				
				
				if(FALSE == iscotisant($_GET["id"],$conn)){
					echo 'Durée de cotisation (en jour) pour:'.$row["nom"].'<form method="POST" action="enregistrement_licence.php?id='.$_GET["id"].'"><input type="number" name="nb_jours" id="nb_jours" required="requ><input type="submit"></form>';
				}else {
					echo "L'utilisateur est déjà cotisant";
				}

			}else{
				header("Location:index.php?message=Utilisateur introuvable");
			}
		}else{
		header("Location:index.php?message=Page réservé aux admins");
		}
	}else{
		header("Location:index.php?message=Accès interdit sans connexion");
		 }
	?>
</body>
</html>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Modifier profile</title>
</head>

<body>
	<?php 
	include("menu.php");
	//Se connecte à la base de donnée
	include("BDD.php"); 
	
	if(isset($_SESSION["mail"])) {
		$mdp=$_SESSION["mdp"];
		$mail=$_SESSION["mail"];
		//Vérifie si l'utilisateur connecté existe réellment
		$sql="SELECT * FROM utilisateur WHERE mail=\"".$mail."\" AND MdP=PASSWORD(\"".$mdp."\");";
		$result = $conn->query($sql);
		if($result->num_rows > 0){


			//Verifie si il y a un id d'utilisateur dans l'URL
			if(isset($_GET["id"])) {
				$id=$_GET["id"];
			}else{
				//Si non, récupère l'id de l'utilisateur en cours
				$row = $result->fetch_assoc();
				$id = $row["id"];
			}
			//Recherche l'utilisateur dans la base de donnée
			$sql="SELECT * FROM utilisateur WHERE id=\"".$id."\";";
			$result = $conn->query($sql);
			//Verifie si l'utilisateur existe
			if($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				//Si l'utilisateur connecté est différent que l'utilisateur cherché, vérifie si l'utilisateur connecté est admin
				if($row["mail"]!=$_SESSION["mail"]){

					$sql="SELECT * FROM utilisateur WHERE mail=\"".$mail."\" AND MdP=PASSWORD(\"".$mdp."\");";
					$result2 = $conn->query($sql);
					$row2= $result2->fetch_assoc();
					//Refuse l'accès si il est pas admin
					if($row2["type_compte"]!=0){
						header("Location: index.php?message=Accès interdit");
					}


				}
				//Affiche un fomulaire aec les donnée de l'utilisateur pré remplis
				echo'<form method="POST" action="appliquer_modification.php?id='.$id.'">
				<table>
				<tr><td>Nom:<td/><td> <input type="text" name="nom" id="nom" value="'.$row["nom"].'"><td/></tr>
				<tr><td>Prénom:<td/><td> <input type="text" name="prenom" id="prenom" value="'.$row["prenom"].'"><td/><tr/>
				<tr><td>E-mail:<td/><td> <input type="email" name="email" id="email" value="'.$row["mail"].'"><td/><tr/>
				<tr><td>Date de naissance:<td/><td> <input type="date" name="date" id="date" value="'.$row["naissance"].'"><td/><tr/></table>
				<input type="submit"></form>';

			} else {
				echo "Utilisateur introuvable";
			}

		}else{
		//Si l'uitlisateur est pas connecté, le renvoie à la page d'acceuil avec un message d'erreur
		header("Location: index.php?message=Accès à la page interdit sans connexion");
		}
	}else{
		//Si l'uitlisateur est pas connecté, le renvoie à la page d'acceuil avec un message d'erreur
		header("Location: index.php?message=Accès à la page interdit sans connexion");
	}
	?>
	
</body>
</html>
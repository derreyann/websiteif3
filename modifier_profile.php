<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Document sans titre</title>
</head>

<body>
	<?php 
	session_start();
	$mdp=$_SESSION["mdp"];
	$mail=$_SESSION["mail"];
	
	if(isset($_SESSION["mail"])) {
		//Se connecte à la base de donnée
		include("BDD.php"); 
		//Verifie si il y a un id dans l'URL
		if(isset($_GET["id"])) {
			//Si oui, set l'id à celui de l'URL
			$id=$_GET["id"];
			
		}else{
			//Si non, récupère l'id de l'utilisateur en cours
			$sql="SELECT * FROM utilisateur WHERE mail=\"".$mail."\" AND MdP=PASSWORD(\"".$mdp."\");";
			$result = $conn->query($sql);
			//redirection
			if($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				$id = $row["id"];
			} else {
				header("Location: inder.php?message=Erreur serveur, veuillez vous reconnecter");
			}
		}
		
		$sql="SELECT * FROM utilisateur WHERE id=\"".$id."\";";
		$result = $conn->query($sql);
		
		if($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			if($row["mail"]!=$_SESSION["mail"]){
				
				$sql="SELECT * FROM utilisateur WHERE mail=\"".$mail."\" AND MdP=PASSWORD(\"".$mdp."\");";
				$result2 = $conn->query($sql);
				$row2= $result2->fetch_assoc();
				if($row2["type_compte"]!=0){
					header("Location: index.php?message=Accès interdit");
				}
				
				
			}
			
			echo'<form method="POST" action="appliquer_modification.php">
			<table>
			<tr><td>Nom:<td/><td> <input type="text" name="nom" id="nom" value="'.$row["nom"].'"><td/></tr>
			<tr><td>Prénom:<td/><td> <input type="text" name="prenom" id="prenom" value="'.$row["prenom"].'"><td/><tr/>
			<tr><td>E-mail:<td/><td> <input type="email" name="email" id="email" value="'.$row["mail"].'"><td/><tr/>
			<tr><td>Date de naissance:<td/><td> <input type="date" name="date" id="date"value="'.$row["naissance"].'"><td/><tr/></table>
			<input type="submit"></form>';
			
		} else {
			echo "Utilisateur introuvable";
		}
		
		
	}else{
		//Si l'uitlisateur est pas connecté, le renvoie à la page d'acceuil avec un message d'erreur
		header("Location: index.php?message=Accès à la page interdit sans connexion");
	}
	?>
	
</body>
</html>
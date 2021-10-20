<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Document sans titre</title>
</head>

<body>
	<?php include("menu.php");
		?>
	<form method="POST" action="recherche.php">
		Recherche: <input type="text" name="recherche" id="recherche"><br/>
		<input type="submit">		
	</form>
	
	<?php
	
	if(!isset($_SESSION["mail"])){
		header("Location: index.php?message=Veuillez vous connecter");	
	}else{
		if(isset($_POST["recherche"])){
			include("BDD.php");
			
			$sql="SELECT * FROM utilisateur WHERE nom=\"".$_POST["recherche"]."\" OR prenom=\"".$_POST["recherche"]."\";";
			$result = $conn->query($sql);
			
			if($result->num_rows > 0) {
				echo "<table><tr><td>Nom</td><td>Prénom</td></td>";
				while($row = $result->fetch_assoc()){
					
					echo "<tr><td><a href='autre_profile.php?id=".$row['id']."'>".$row['nom']."</a></td><td><a href='autre_profile.php?id=".$row['id']."'>".$row['prenom']."</a></td></tr>";
					
					}
				echo"</table>";
				
			}else{
				echo "Aucun utilisateurs";
			}
		}
	}
	?>
</body>
</html>
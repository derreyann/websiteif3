<!doctype html>
<style>
    form, tr, td, input, submit, button, table, p, h1{
        text-align: center;
        align-content : center;
    }
    h1{
        vertical-align: center;
        position: center;
        padding-top: 250px;
    }
    input {
        text-align: center;
        align-content: center;
        border-radius: 10px;
        position: relative;
        content-visibility: revert
        background-color: #1a1a1a;
        height : 35px;
</style>
<html>
<head>
<meta charset="utf-8">
<title>Document sans titre</title>
</head>

<body>
	<?php include("menu.php");
		?>
	<form method="POST" action="recherche.php">
		Recherche:<br><input type="text" name="recherche" id="recherche">
		<input type="submit">
	</form>
	
	<?php
	//Check if the user is logged in
	if(!isset($_SESSION["mail"])){
		header("Location: index.php?message=Veuillez vous connecter");	
	}else{
		//Check  if the form is sumbitted
		if(isset($_POST["recherche"])){
			include("BDD.php");
			
			$sql="SELECT * FROM utilisateur WHERE nom=\"".$_POST["recherche"]."\" OR prenom=\"".$_POST["recherche"]."\";";
			$result = $conn->query($sql);
			//Show the user that have been found
			if($result->num_rows > 0) {
				echo "<table><tr><td>Nom</td><td>Prénom</td></td>";
				while($row = $result->fetch_assoc()){
					
					echo "<tr><td><a href='autre_profile.php?id=".$row['id']."'>".$row['nom']."</a></td><td><a href='autre_profile.php?id=".$row['id']."'>".$row['prenom']."</a></td></tr>";
					
					}
				echo"</table>";
				
			}else{
				//If no user have been found
				echo "Aucun utilisateurs";
			}
		}
	}
	?>
</body>
</html>
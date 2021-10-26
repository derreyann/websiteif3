<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Document sans titre</title>
</head>

<body>
		<?php
	include("menu.php");
	if(isset($_SESSION["mail"])){
		echo $_GET["id"];
		include("BDD.php");
		$sql="SELECT * FROM utilisateur WHERE mail=\"".$_SESSION["mail"]."\" AND MdP=PASSWORD(\"".$_SESSION["mdp"]."\");";
		$result2 = $conn->query($sql);
		$row2= $result2->fetch_assoc();
		//Verification admin
		if($row2["type_compte"]==0){
			$sql="INSERT INTO licence (user_id,durée,date_souscription) VALUES ('".$_GET["id"]."','".$_POST["nb_jours"]."','".date('Y-m-d')."')";
			$conn->query($sql);
			header("Location:autre_profile.php?id=".$_GET["id"]."");
		}else{
		header("Location:index.php?message=Page réservé aux admins");
		}
	}else{
		header("Location:index.php?message=Accès interdit sans connexion");
		 }
	?>
</body>
</html>
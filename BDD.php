<!doctype html>
<head>
<meta charset="utf-8">
<title>Document sans titre</title>
</head>

<body>
	<?php 
	//Cette page permet d'avoir tous les paramètre de connection de la base de donnée au même endroite, ainsi si un paramètre doit être changé, il le sera pour toutes les pages
	//mise à jour des paramètres de la base de donné
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db_name = "badminton";
	
// Créer connection
$conn = new mysqli($servername, $username, $password, $db_name);

	// Check a user is cotisant
	function iscotisant($id,$conn)
	{	
		$sql='SELECT * FROM licence WHERE user_id="'.$id.'"';
		
		$result = $conn->query($sql);
			
		$cotisant=FALSE;

			//Select all the rows where the user is cotisan in the licences table
			if($result->num_rows > 0) {

				$i=1;

				while($i<= $result->num_rows  && $cotisant==FALSE){
					$row = $result->fetch_assoc();
					$i=$i+1;

					$date_actuel=strtotime(date('Y-m-d'));

					$date_fin_cotisation=strtotime("+".$row['durée']." days",strtotime($row['date_souscription']));
					//Check if it is a cotisant actually
					if($date_actuel <= $date_fin_cotisation){
						$cotisant=TRUE;
					}
					
					
					}
				
			}else{
			}
		return $cotisant;

    }
	?>
</body>
</html>
<!doctype html>
<html>
<style>
    form, tr, td, input, submit, button, table, p, h1{
        text-align: center;
        align-content : center;
        background-color : ;
    }
    h1{
        vertical-align: center;
        position: center;
        padding-top: 220px;
    }
    select, input {
        text-align: center;
        align-content: center;
        border-radius: 10px;
        position: relative;
        content-visibility: revert
        background-color: #1a1a1a;
        height : 35px;
        width:150px;
</style>
<head>
<meta charset="utf-8">
<title>Inscription</title>
</head>

<body>
	<?php include("menu.php");
	if(isset($_GET["message"])){
	echo $_GET["message"];
	//Permet d'afficher un message d'erreur
	}?>

    <h1>Inscription</h1>

    <form class="select" method="POST" action="enregistrement.php">
	
	<center><table>
	<tr><td>Nom:<br> <input type="text" name="nom" id="nom"><td/></tr>
	<tr><td>Prénom:<br> <input type="text" name="prenom" id="prenom"><td/><tr/>
	<tr><td>E-mail:<br> <input type="email" name="email" id="email"><td/><tr/>
	<tr><td>Mot de passe:<br> <input type="password" name="motdepasse" id="motdepasse"><td/><tr/>
	<tr><td>Date de naissance:<br> <input type="date" name="date" id="date"><td/><tr/></table></center><br>
	<input class="submit" type="submit"></form>
</body>
</html>

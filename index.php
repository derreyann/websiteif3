<!doctype html>

<html>
<head>
<meta charset="utf-8">
    <style>
        h1, form, tr, td, submit, button, table, p{
            text-align: center;
            align-content : center;
        }
        body{
            vertical-align: center;
            position: center;
            padding-top: 250px;
        }
         body{
            align-items: center;justify-content: center;

        }

        input {
            text-align: center;
            align-content: center;
            border-radius: 10px;
            position: relative;
            content-visibility: revert
            background-color: #1a1a1a;
            height : 35px;
            margin-top
            display: flex;
        }
        .submit{
            background-color: #08d;
            border-radius: 12px;
            border: 0;
            box-sizing: border-box;
            color: #eee;
            cursor: pointer;
            font-size: 18px;
            height: 50px;
            margin-top: 38px;
        // outline: 0;
            text-align: center;
            width: 15%;
        }
        .button, button{
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
            margin-top: 38px;
        // outline: 0;
            width: 12%;
        }

    </style>
<title>Accueil</title>
</head>
<h1>Salut !</h1><br>
<body>
	<p>
	<?php include("menu.php");
	if(isset($_GET["message"])){
	echo $_GET["message"];
	}//Permet d'affiché un message d'erreur
	?>
	<form method="POST" action="connexion.php">
		<table>
			E-mail:<br><input type="email" name="email1" id="email1" required><br>
			Mot de passe:<br><input type="password" name="pass1" id="pass1" required></table>
        <br>
		
		<input class="submit" type="submit" value="Se connecter">
	</form>
    <p>
        <button class="button" onclick="window.location.href = 'inscription.php';">Inscription</button>
    </p>


</body>
</html>

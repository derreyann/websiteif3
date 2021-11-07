<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Document sans titre</title>
</head>

<body>
<?php
    include "BDD.php";
    include "menu.php";
    //check if the user is admin
    if(!isset($_SESSION['mail'])){
        header("Location:index.php?message=Veuillez vous connecter");
    }
    $sql="SELECT * FROM utilisateur WHERE mail=\"".$_SESSION["mail"]."\" ;";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if(!$row['type_compte']==0){
        header("Location:index.php?message=Vous n'êtes pas admin.");
    }

    //Upgrade to admin the user with the id
    $id = $_GET['id'];
    $sql = "UPDATE utilisateur SET type_compte=0 WHERE id = $id";
    $result = $conn->query($sql);

    if ($result) {
        echo "L'utilisateur a bien été upgrader en admin";
    } else {
        echo "Erreur lors de l'upgrade";
    }
?>
</body>
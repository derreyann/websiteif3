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
    //Upgrade admin the user with the id
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
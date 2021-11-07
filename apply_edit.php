<!doctype html>
<html>
<head>
<meta charset="utf-8">

<?php
include("menu.php");
include("BDD.php");
?>
<title>Profile</title>
</head>
<body>
<?php
        $sql3 = "SELECT DISTINCT * from utilisateur WHERE mail=\"" . $_POST["j1"] . "\"";
        $result3 = $conn->query($sql3);
        $row3 = $result3->fetch_assoc();
        //echo $row3['id'];
        $sql2 = "SELECT DISTINCT * from utilisateur WHERE mail=\"" . $_POST["j2"] . "\"";
        $result2 = $conn->query($sql2);
        $row2 = $result2->fetch_assoc();
        //echo $row2['id'];
        $sql = "SET foreign_key_checks = 0";
        $result = $conn->query($sql);
        $sql = 'UPDATE reservation SET id_user_1="' . $row3["id"] . '",id_user_2="' . $row2['id'] . '",id_terrain="' . $_POST['terrain'] . '",date="' . $_POST['date'] . '",h_debut="' . $_POST['heure'] . '",durée="' . $_POST['durée'] . '" WHERE id_user_1="' . $_POST['oldj1'] . '" AND  id_user_2="' . $_POST['oldj2'] . '" AND  id_terrain="' . $_POST['oldterrain'] . '" AND date="' . $_POST['olddate'] . '" AND  h_debut="' . $_POST['oldheure'] . '" AND  durée="' . $_POST['olddurée'] . '"';
        $conn->query($sql);
        if(isset($_POST["repeating"])){
            $oldDate = $_POST['date'];

            for($i=1; $i <= $_POST["repeating"]; $i++){
                $date1 = date("Y-m-d", strtotime($oldDate.'+ 7 days'));
                $sql="INSERT INTO reservation (id_user_1, id_user_2, id_terrain, date, h_debut, durée) VALUES (\"".$row3["id"]."\",\"".$row2['id']."\",\"".$_POST["terrain"]."\", \"".$date1."\",\"".$_POST["heure"]."\",\"".$_POST["durée"]."\")";
                $conn->query($sql);
                echo $date1, " ";
                $oldDate = $date1;
            }
        }
        header("Location: profile.php"); ?>

</body>
</html>
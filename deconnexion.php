<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Décoloco</title>
</head>

<body>
    <?php
//Unconnect a user
session_start();
unset($_SESSION);
session_destroy();
session_write_close();
header('Location: /');
die;
?>
</body>
</html>
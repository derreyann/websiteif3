<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Document sans titre</title>
</head>

<body><?php
	session_start();
	session_destroy();
	header("Location:index.php");
	?>
</body>
</html>
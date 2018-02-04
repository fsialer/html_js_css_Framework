<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
</head>
<body>
	<?php
		if (isset($_COOKIE["nombre"])) {
			echo $_COOKIE["nombre"];
		}else{
			echo "No, se a definido la cookie.";
		}


	?>
	<a href="cookied.php">Salir del sistema</a>
</body>
</html>


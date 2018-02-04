<?php 
	if (isset($_COOKIE['visita'])) {
		echo "Que alegria verte de nuevo por aquí!!";
	}else{
		setcookie('visita','ok',time()+31536000);
		echo 'Bienvenido a mi pagina por primera vez';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ejercicio</title>
	<meta charset="utf-8"/>
</head>
<body>

</body>
</html>
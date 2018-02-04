<?php
	if (isset($_COOKIE['contador'])) {
		
		setcookie("contador",$_COOKIE['contador']+1,time()+31536000);
		echo "Haz visitado ".$_COOKIE['contador']." veces nuestra pagina, gracias por tu concurrencia.";
	}else{
		
		setcookie("contador",1,time()+31536000);
		echo "Bienvenido";
		


	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>cantidad de visitas</title>
	<meta charset="utf-8" />
</head>
<body>

</body>
</html>

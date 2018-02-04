<?php
$fecha=date("d/m/Y | H:i:s");
setcookie("fecha",$fecha,time()+31536000);
if (isset($_COOKIE['fecha'])) {
	echo "Hola de nuevo, tu ultima visita fue el ".$_COOKIE['fecha'];
}else{
	echo "Esta es tu primera viita a nuestra página.";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8" />
</head>
<body>

</body>
</html>
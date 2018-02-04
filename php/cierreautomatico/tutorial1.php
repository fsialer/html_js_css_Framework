<?php
session_start();

$fecha_antigua=$_SESSION["ultimoingreso"];
$hora=date("Y-n-j H:i:s");

$tiempo=((strtotime($hora)+1)-strtotime($fecha_antigua));
$operacion=60*1;
echo $tiempo;
if ($tiempo>=50) {
	echo 'paso';
	session_destroy();
	echo "<script language='javascript'>alert('termine');".
	"self.location='validando.php';</script>";
}else{
	echo 'fallo';
	$_SESSION['ultimoingreso']=$hora;
}
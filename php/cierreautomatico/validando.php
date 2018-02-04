<?php  
session_start();//Esta funcion nos permite obtener las variables globales
$_SESSION['ultimoingreso']=date("Y-n-j H:i:s");
header("location:tutorial.php");
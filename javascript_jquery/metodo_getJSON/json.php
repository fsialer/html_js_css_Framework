<?php
$or=array(
	'n'=>empty($_GET['nombre'])?'Nombre Default':$_GET['nombre'],
	'c'=>empty($_GET['mail'])?'default@correo':$_GET['mail'],
	'm'=>empty($_GET['mensaje'])?'mensaje default':$_GET['mensaje']

	);

echo json_encode($or);
?>
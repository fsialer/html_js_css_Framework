<?php
defined('BASEPATH') OR exit('No direct script access allowed');
echo doctype('html5');?>
<html lang="es">
<head>
	<?php
		echo meta('Content-type', 'text/html; charset=utf-8', 'equiv');
		echo link_tag(base_url().'css/bootstrap.min.css');
		echo link_tag(base_url().'css/main.css');
	?>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url().'js/bootstrap.min.js';?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'js/main.js';?>"></script>
	<title>Ferreteria</title>
</head>
<body>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title?> | Biblioteca</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/main.css'?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'plugins/bootstrap/css/bootstrap.css'?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'plugins/chosen/chosen.css'?>">
	<script type="text/javascript" src="<?php echo base_url().'plugins/jquery/jquery-2.2.4.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'plugins/bootstrap/js/bootstrap.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'plugins/chosen/chosen.jquery.js'?>"></script>
</head>
<body class="container">
	<head>
		<div class="col-md-2 title">
			<h4>Biblioteca</h4>
		</div>
		<div class="col-md-10 option">
			<?php echo $link_auth; ?>
		</div>			
	</head>
	
<?php
defined ('BASEPATH') OR exit('');

if ( ! function_exists('template_head'))
{?>
	<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>{library_title} | Panel de Administración</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'plugins/bootstrap/css/bootstrap.css'?>">
	<script type="text/javascript" src="<?php echo base_url().'plugins/jquery/jquery-2.2.4.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'plugins/bootstrap/js/bootstrap.js'?>"></script>

</head>
<body class="container">
	<head>
		<div class="col-md-10">
			<h4>Biblioteca</h4>
		</div>
		<div class="col-md-2">
			<h4><a href="">Ingresar al Sistema</a></h4>
		</div>		
	</head>
	<nav class="col-md-2">
		{library_nav}
	</nav>
	<section class="col-md-10">
		{library_content}
	</section>
	<footer>
		<div class="col-md-10">Todos los derechos reservados@<?php echo date('Y')?></div>
		<div class="col-md-2">Fernando Sialer</div>
	</footer>
	

</body>
</html>
<?php }?>
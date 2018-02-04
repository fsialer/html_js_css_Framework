<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/main_usuario.css'?>">
	<link href='https://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
	<title>LOGIN-VALIDADO-SESIONES-</title>
</head>
<body>

	
		<div id="content-header">
			<h1>SignUp</h1>
		</div>
		<div id="content-form">
			<?php echo form_open('loginusuario/login')?>
			<div>
			<?php echo form_label("USERNAME")?>
			<?php echo form_input(array("id"=>"input_username",
			'placeholder'=>'USERNAME','name'=>'input_username'));?>
			</div>
			<div>
				<?php echo form_label("PASSWORD")?>
			<?php echo form_input(array("type"=>"password","id"=>"input_pass",
			'placeholder'=>'PASSWORD','name'=>'input_pass'));?>
			</div>			
			<?php echo form_submit("btnIniciar","INICIAR");?>
			<?php echo form_close()?>
		</div>
		
	
	<a href="<?php echo base_url().'loginusuario/agregar';?>">No tengo cuenta.</a>

</body>
</html>
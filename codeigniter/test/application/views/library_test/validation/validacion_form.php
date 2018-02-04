<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php echo form_open(); ?>
	<div>
		<?php echo form_input(array('name'=>'input_nombre','placeholder'=>'nombre'))?>
		<?php echo form_error('input_nombre', '<div class="error">', '</div>'); ?>
	</div>
	<div>
		<?php echo form_input(array('name'=>'input_edad','placeholder'=>'edad','type'=>'number'))?>
		<?php echo form_error('input_edad', '<div class="error">', '</div>'); ?>
	</div>
	<div>
		<?php echo form_input(array('name'=>'input_fecha','placeholder'=>'fecha','type'=>'date'))?>
		<?php echo form_error('input_fecha', '<div class="error">', '</div>'); ?>
	</div>
	<div>
		<?php echo form_input(array('name'=>'input_dni','placeholder'=>'dni'))?>
		<?php echo form_error('input_dni', '<div class="error">', '</div>'); ?>
	</div>
	<div>
		<?php echo form_radio(array('name'=>'genero','value'=>'M','checked'=>set_value('genero')==='M'?true:false))?>Masculino
		<?php echo form_radio(array('name'=>'genero','value'=>'F','checked'=>set_value('genero')==='F'?true:false))?>Femenino
		<?php echo form_error('genero', '<div class="error">', '</div>'); ?>
	</div>
	<div>
		<?php echo form_submit("",'Enviar')?>
	</div>
	
	
	
	<?php echo form_close(); ?>
</body>
</html>
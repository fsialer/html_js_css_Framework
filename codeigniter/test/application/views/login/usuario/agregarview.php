<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/main_usuario.css'?>">
	<link href='https://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
	
	<title>AGREGAR USUARIO</title>
</head>
<body>
	
		<div id="content-header">
			<h1>Agregar usuario</h1>
		</div>
		<div id="content-form">
			
			<div id="form-body">
				<?php echo form_open(base_url().'loginusuario/agregar');?>
				<div>
					<?php echo form_label("USERNAME")?>
					<?php echo form_input(array("id"=>"input_username",
					'placeholder'=>'USERNAME','name'=>'input_username',
					'value'=>set_value('input_username')));?>
					<div id="error"><?php echo form_error('input_username');?></div>
				</div>
				<div>
					<?php echo form_label("PASSWORD")?>
					<?php echo form_input(array("type"=>"password","id"=>"input_pass",
					'placeholder'=>'PASSWORD','name'=>'input_pass'));?>
					<div id="error"><?php echo form_error('input_pass');?></div>
					</div>
				<div>
					<?php echo form_label("REPETIR PASSWORD")?>
					<?php echo form_input(array("type"=>"password","id"=>"input_rpass",
					'placeholder'=>'REPETIR PASSWORD','name'=>'input_rpass'));?>
					<div id="error"><?php echo form_error('input_rpass');?></div>
				</div>
				<div>
					<?php echo form_label("EMAIL")?>
					<?php echo form_input(array("id"=>"input_email",
					'placeholder'=>'EMAIL','name'=>'input_email',
					'value'=>set_value('input_email')));?>
					<div id="error"><?php echo form_error('input_email');?></div>
				</div>
				<div>
					<p><?php echo form_label("SEXO")?></p>
					<label>
					<?php
						$data = array(
							'name'        => 'sexo',
							'id'          => 'sexo',
							'value'       => 'M',
							'checked'     => (set_value('sexo') === 'M' ? TRUE : FALSE),
											);
					?>
						<?php echo form_radio($data)?>Masculino
					</label>
					<label>
					<?php
						$data = array(
							'name'        => 'sexo',
							'id'          => 'sexo2',
							'value'       => 'F',
							'checked'     => (set_value('sexo') === 'F' ? TRUE : FALSE),
											);
					?>
						<?php echo form_radio($data)?>Femenino
					</label>
					
				    <div id="error"><?php echo form_error('sexo');?></div>
				</div>		
				<div>
					<?php echo $recaptcha_html; ?>
					<div id="error">
						    <span class="loginerror"> <?php if ($this->session->flashdata('error') !== FALSE) { echo $this->session->flashdata('error'); } ?></span>
					</div>
				</div>
				<?php echo form_submit("btnGuardar","GUARDAR");?>
				<?php echo form_close();?>
			</div>
		</div>
		
		
	
	<a href="<?php echo base_url().'loginusuario/login';?>">Ya tengo una cuenta.</a>
</body>
</html>
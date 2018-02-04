<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/main_usuario.css'?>">
	<link href='https://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
	<title>EDITAR USUARIO</title>
</head>
<body>
	
		<div id="content-header">
			<h1>Editar usuarios</h1>
		</div>
		<div>
			<?php echo form_open(base_url().'loginusuario/editar/'.$data_usuario->id);?>
			<div>
				<?php echo form_label("USERNAME")?>
				<?php echo form_input(array("id"=>"input_username",
				'placeholder'=>'USERNAME','name'=>'input_username',
				'value'=>set_value('input_username',$data_usuario->username)));?>
				<div><?php echo form_error('input_username');?></div>
			</div>
			<div>
				<?php echo form_label("EMAIL")?>
				<?php echo form_input(array("id"=>"input_email",
				'placeholder'=>'EMAIL','name'=>'input_email',
				'value'=>set_value('input_email',$data_usuario->email)));?>
				<div><?php echo form_error('input_email');?></div>
			</div>
			<div>
				<?php echo form_label("SEXO")?>
				<p>
				<?php
					$data = array(
						'name'        => 'sexo',
						'id'          => 'sexo',
						'value'       => 'M',
						'checked'     => (set_value('sexo',$data_usuario->sexo) === 'M' ? TRUE : FALSE),
										);
				?>
					<?php echo form_radio($data)?>Masculino
				</p>
				<p>
				<?php
					$data = array(
						'name'        => 'sexo',
						'id'          => 'sexo2',
						'value'       => 'F',
						'checked'     => (set_value('sexo',$data_usuario->sexo) === 'F' ? TRUE : FALSE),
										);
				?>
					<?php echo form_radio($data)?>Femenino
				</p>
				
			    <div><?php echo form_error('sexo');?></div>
			</div>		
			<?php echo form_submit("btnEditar","EDITAR");?>
			<?php echo form_close();?>
		</div>
		
	
	<a href="<?php echo base_url().'usuario';?>">Ir ala lista.</a>
</body>
</html>
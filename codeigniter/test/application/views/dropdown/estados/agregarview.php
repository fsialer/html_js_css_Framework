<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
<head>
	<title>AGREGAR UN DISTRITO</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/main_dropdown.css'?>">
	<link href='https://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url().'js/main_estado.js';?>"></script>
</head>
<body>
	<header id="content-header">
		<h1>AGREGAR UN DISTRITO</h1>
	</header>
	<div id="content-body">
		<?php echo form_open(base_url().'dropdownestados/agregar');?>
		<div>
			<?php echo form_label("REGION")?>
			<?php echo form_dropdown('cboRegion',$data_regiones,set_value('cboRegion'),array('id'=>'cboRegion'));?>
			<div id="error"><?php echo form_error('cboRegion')?></div>
		</div>
		<div>
			<?php echo form_label('PROVINCIA:');?>
			<select name="cboProvincia" id="cboProvincia">    
				<option value="0" <?php echo set_value('cboProvincia');?>>---SELECCIONA UNA PROVINCIA---</option>				
    		</select>
			<div id="error"><?php echo form_error('cboProvincia');?></div>
		</div>
		
		<div>
			<?php echo form_label("DISTRITO")?>
			<?php echo form_input(array('id'=>'input_distrito','name'=>'input_distrito','placeholder'=>'DISTRITO',
			'value'=>set_value('input_distrito')));?>
			<div id="error"><?php echo form_error('input_distrito')?></div>
		</div>

		<div>
			<p><?php echo form_label("ESTADO")?></p>
			<?php echo form_radio(array('name'        => 'estado',
							'id'          => 'estado',
							'value'       => 'INACTIVO',
							'checked'     => (set_value('estado') === 'INACTIVO' ? TRUE : FALSE)))?>INACTIVO
			<?php echo form_radio(array('name'        => 'estado',
							'id'          => 'estado1',
							'value'       => 'ACTIVO',
							'checked'     => (set_value('estado') === 'ACTIVO' ? TRUE : FALSE)))?>ACTIVO
			<div id="error"><?php echo form_error('estado')?></div>
		</div>

		<?php echo form_submit('btnGuadar','GUARDAR')?>
		<?php echo form_close();?>
	
		
	</div>
</body>
</html>
<?php 
echo construir_nav($mi_menu);
?>
<div>
	<h1>AGREGAR PRODUCTO</h1>
</div>
<div>
	<?php echo form_open(base_url().'vpproducto/agregar')?>
	<div>
		<?php echo form_label("ARTICULO")?>
		<?php echo form_input(array('name'=>'input_articulo','id'=>'input_articulo','placeholder'=>'ARTICULO','value'=>set_value('input_articulo')))?>
		<div><?php echo form_error('input_articulo');?></div>
	</div>	
	<div>
		<?php echo form_radio(array(
				'name'=>'estado',
				'value'=>'activo',
				'checked'=>set_value('estado')==='activo'?TRUE:FALSE)
		)?>ACTIVO
		<?php echo form_radio(array(
				'name'=>'estado',
				'value'=>'inactivo',
				'checked'=>set_value('estado')==='inactivo'?TRUE:FALSE)
		)?>INACTIVO
		<div><?php echo form_error('estado');?></div>
	</div>
	<div>
		<?php echo form_label("PRECIO")?>
		<?php echo form_input(array('name'=>'input_precio','id'=>'input_precio','placeholder'=>'PRECIO','value'=>set_value('input_precio')))?>
		<div><?php echo form_error('input_precio');?></div>
	</div>
	<?php echo form_submit("btnGuardar",'GUARDAR')?>
	<a href="<?php echo base_url().'vpproducto'?>">Regresar</a>
	<?php echo form_close()?>
</div>
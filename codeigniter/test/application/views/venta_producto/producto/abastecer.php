<?php 
echo construir_nav($mi_menu);
?>
<div>
	<h1>ABASTECER PRODUCTO</h1>
</div>
<div>
	<?php echo form_open(base_url().'vpproducto/abastecer/'.$data_producto->id)?>
	<div>
		<?php echo form_label("ARTICULO")?>
		<?php echo form_input(array('name'=>'input_articulo','id'=>'input_articulo','placeholder'=>'ARTICULO','value'=>set_value('input_articulo',$data_producto->articulo),'disabled'=>'true'))?>
		<div><?php echo form_error('input_articulo');?></div>
	</div>	
	<div>
		<?php echo form_label("STOCK ACTUAL")?>
		<?php echo form_input(array('name'=>'input_stock_actual','id'=>'input_stock_actual','placeholder'=>'STOCK ACTUAL','value'=>set_value('input_stock_actual',$data_producto->stock),'disabled'=>'false'))?>
		<div><?php echo form_error('input_stock_actual');?></div>
	</div>	
	<div>
		<?php echo form_label("CANTIDAD")?>
		<?php echo form_input(array('name'=>'input_cantidad','id'=>'input_cantidad','placeholder'=>'CANTIDAD','value'=>set_value('input_cantidad'),'type'=>'number'))?>
		<div><?php echo form_error('input_cantidad');?></div>
	</div>		
	<?php echo form_submit("btnGuardar",'GUARDAR')?>
	<a href="<?php echo base_url().'vpproducto'?>">Regresar</a>
	<?php echo form_close()?>
</div>
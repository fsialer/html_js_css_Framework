	<div class="panel panel-success">
	<div class="panel-heading">
		<h4>Crear País</h4>
	</div>
	<div class="panel panel-body">
		<?php echo form_open(base_url().'admin/countries/create');?>
		<div class="form-group">
			<?php echo form_label('País')?>
			<?php echo form_input(array('name'=>'name','id'=>'name','class'=>'form-control',
			'placeholder'=>'Nombre del país ..','value'=>set_value('name')))?>	
			<?php echo form_error('name', '<div class="">', '</div>'); ?>		
		</div>		
		<div class="form-group">
			<?php echo form_submit('btnAgregar','Agregar',array('class'=>'btn btn-success'))?>
			<?php echo "<a href='".base_url()."admin/countries' class='btn btn-default'><span class='glyphicon glyphicon-menu-left'></span> Regresar</a>"?>
		</div>
		<?php echo form_close()?>
	</div>	
</div>	
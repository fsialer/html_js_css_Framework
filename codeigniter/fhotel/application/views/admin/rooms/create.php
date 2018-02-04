<div class="container">
	<div class="col-md-6 center-block panel panel-default quitar-float">
		<div class="text-center">
			<h3>Agregar Habitación</h3>
		</div>		
		<div class="panel-body">
			<?php echo form_open(base_url().'admin/rooms/create');?>
			<div class="form-group">
				<label>Habitación</label>
				<?php echo form_input(array('class'=>'form-control','name'=>'num_hab','value'=>set_value('num_hab'),'placeholder'=>'Número de la Habitación'));?>
				<?php echo form_error('num_hab', '<div class="">', '</div>'); ?>
			</div>			
			<div class="form-group texto-derecha">
				<?php echo form_submit('btnGuardar','Guardar',array('class'=>'btn btn-info'));?>
			</div>
			<?php echo form_close();?>
		</div>
	</div>
</div>
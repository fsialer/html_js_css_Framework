<div class="container">
	<div class="col-md-6 center-block panel panel-default quitar-float">
		<div class="text-center">
			<h3>Agregar Amenidades</h3>
		</div>		
		<div class="panel-body">
			<?php echo form_open(base_url().'admin/amenities/create');?>
			<div class="form-group">
				<label>Amenidad</label>
				<?php echo form_input(array('class'=>'form-control','name'=>'nom_am','value'=>set_value('nom_am'),'placeholder'=>'Nombre de la amenidad'));?>
				<?php echo form_error('nom_am', '<div class="">', '</div>'); ?>
			</div>			
			<div class="form-group texto-derecha">
				<?php echo form_submit('btnGuardar','Guardar',array('class'=>'btn btn-info'));?>
			</div>
			<?php echo form_close();?>
		</div>
	</div>
</div>

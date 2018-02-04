<div class="container">
	<div class="col-md-6 center-block panel panel-default quitar-float">
		<div class="text-center">
			<h3>Agregar Tipo de Habitación</h3>
		</div>		
		<div class="panel-body">
			<?php echo form_open(base_url().'admin/types_rooms/create');?>
			<div class="form-group">
				<label>Tipo de Habitación</label>
				<?php echo form_input(array('class'=>'form-control','name'=>'nom_tiph','value'=>set_value('nom_tiph'),'placeholder'=>'Nombre del tipo de habitación'));?>
				<?php echo form_error('nom_tiph', '<div class="">', '</div>'); ?>
			</div>
			<div class="form-group">
				<label>Descripción</label>
				<?php echo form_textarea('descrip_tiph',set_value('descrip_tiph'),array('class'=>'form-control','placeholder'=>'Descripción del tipo de habitación'));?>
				<?php echo form_error('descrip_tiph', '<div class="">', '</div>'); ?>
			</div>
			<div class="form-group">
				<label>Capacidad máxima</label>
				<?php echo form_input(array('class'=>'form-control','name'=>'capmax_tiph','value'=>set_value('capmax_tiph'),'placeholder'=>'Capacidad máxima del tipo de habitacion','type'=>'number'));?>
				<?php echo form_error('capmax_tiph', '<div class="">', '</div>'); ?>
			</div>
			<div class="form-group">
				<label>Amenidades</label>
				<?php echo form_multiselect('amenidades[]',$list_amenities,set_value('amenidades[]'),array('class'=>'form-control amenidades-select'));?>
				<?php echo form_error('amenidades[]', '<div class="">', '</div>'); ?>
			</div>
			<div class="form-group">
				<label>Habitaciones</label>
				<?php echo form_multiselect('habitaciones[]',$list_rooms,set_value('habitaciones[]'),array('class'=>'form-control habitaciones-select'));?>
				<?php echo form_error('habitaciones[]', '<div class="">', '</div>'); ?>
			</div>
			<div class="form-group texto-derecha">
				<?php echo form_submit('btnGuardar','Guardar',array('class'=>'btn btn-info'));?>
			</div>
			<?php echo form_close();?>
		</div>
	</div>
</div>


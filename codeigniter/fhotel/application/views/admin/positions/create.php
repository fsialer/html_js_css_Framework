<div class="container">
	<div class="col-md-6 center-block panel panel-default quitar-float">
		<div class="text-center">
			<h3>Agregar Cargo</h3>
		</div>		
		<div class="panel-body">
			<?php echo form_open(base_url().'admin/positions/create');?>
			<div class="form-group">
				<label>Cargo</label>
				<?php echo form_input(array('class'=>'form-control','name'=>'nom_carg','value'=>set_value('nom_carg'),'placeholder'=>'Nombre del cargo'));?>
				<?php echo form_error('nom_carg', '<div class="">', '</div>'); ?>
			</div>			
			<div class="form-group texto-derecha">
				<?php echo form_submit('btnGuardar','Guardar',array('class'=>'btn btn-info'));?>
			</div>
			<?php echo form_close();?>
		</div>
	</div>
</div>

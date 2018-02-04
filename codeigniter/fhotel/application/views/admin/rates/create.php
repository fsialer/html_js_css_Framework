<div class="container">
	<div class="col-md-6 center-block panel panel-default quitar-float">
		<div class="text-center">
			<h3>Agregar Tarifa</h3>
		</div>		
		<div class="panel-body">
			<?php echo form_open(base_url().'admin/rates/create');?>
			<div class="form-group">
				<label>Tipo de Habitación</label>
				<?php echo form_dropdown('tip_hab',$list_tr,set_value('tip_hab'),array('class'=>'form-control tip_hab-select'));?>
				<?php echo form_error('tip_hab', '<div class="">', '</div>'); ?>
			</div>
			<div class="form-group">
				<label>Tarifa</label>
				<?php echo form_input(array('class'=>'form-control','name'=>'nom_ta','value'=>set_value('nom_ta'),'placeholder'=>'Nombre de la tarifa'));?>
				<?php echo form_error('nom_ta', '<div class="">', '</div>'); ?>
			</div>		
			<div class="form-group">
				<label>Precio</label>
				<?php echo form_input(array('class'=>'form-control','name'=>'prec_ta','value'=>set_value('prec_ta'),'placeholder'=>'Nombre de la tarifa'));?>
				<?php echo form_error('prec_ta', '<div class="">', '</div>'); ?>
			</div>			
			<div class="form-group texto-derecha">
				<?php echo form_submit('btnGuardar','Guardar',array('class'=>'btn btn-info'));?>
			</div>
			<?php echo form_close();?>
		</div>
	</div>
</div>

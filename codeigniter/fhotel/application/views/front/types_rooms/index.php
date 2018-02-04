<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>Filtrar tipo de habitaciones disponibles</h4>
		</div>
		<div class="panel-body">
		<?php echo form_open(base_url().'reservations')?>
			<div class="row">
				<div class="form-group col-md-4">
				<label>Datos del cliente</label>
				<?php echo form_input(array('name'=>'dat_cli','class'=>'form-control','value'=>set_value('dat_cli')))?>
				</div>
				<div class="form-group col-md-4">
				<label>Telefono</label>
				<?php echo form_input(array('name'=>'telf_cli','class'=>'form-control telf_cli','value'=>set_value('telf_cli')))?>
				</div>
				<div class="form-group col-md-4">
				<label>Email</label>
				<?php echo form_input(array('name'=>'email_cli','class'=>'form-control','value'=>set_value('email_cli')))?>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-4">
				<label>Fecha de Llegada</label>
				<?php echo form_input(array('name'=>'f_llegada','class'=>'form-control f_llegada','type'=>'date','value'=>set_value('f_llegada', date('Y-m-d'))))?>
				<?php echo form_error('f_llegada', '<div class="">', '</div>'); ?>
				</div>
				<div class="form-group col-md-4">
				<label>N° Noches</label>
				<?php echo form_input(array('name'=>'num_noche','class'=>'form-control num_noche','value'=>set_value('num_noche'),'readOnly'=>'true'))?>
				</div>
				<div class="form-group col-md-4">
				<label>Fecha de Salida</label>
				<?php echo form_input(array('name'=>'f_salida','class'=>'form-control f_salida','type'=>'date','value'=>set_value('f_salida')))?>
				<?php echo form_error('f_salida', '<div class="">', '</div>'); ?>
				</div>
			</div>
			
			<div class="form-group texto-derecha">
				<?php echo form_button(array('content'=>'Buscar','class'=>'btn btn-info btnBuscar','name'=>'btnBuscar'));?>
			</div>			
		<?php echo form_close()?>		
		</div>
	</div>

	<div class="result-type-rooms">
		
	</div>


	
</div>
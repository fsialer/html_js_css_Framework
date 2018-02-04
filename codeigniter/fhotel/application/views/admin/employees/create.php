<div class="container">
	<div class="col-md-6 center-block panel panel-default quitar-float">
		<div class="text-center">
			<h3>Agregar Empleado</h3>
		</div>		
		<div class="panel-body">
			<?php echo form_open(base_url().'admin/employees/create');?>
			<div class="form-group">
				<label>Cargo</label>
				<?php echo form_dropdown('cargo',$list_position,set_value('cargo'),array('class'=>'form-control cargo-select'));?>
				<?php echo form_error('cargo', '<div class="">', '</div>'); ?>
			</div>
			<div class="form-group">
				<label>Nombres</label>
				<?php echo form_input(array('class'=>'form-control','name'=>'nom_emp','value'=>set_value('nom_emp'),'placeholder'=>'Nombres completo del empleado'));?>
				<?php echo form_error('nom_emp', '<div class="">', '</div>'); ?>
			</div>		
			<div class="form-group">
				<label>Apellidos</label>
				<?php echo form_input(array('class'=>'form-control','name'=>'ape_emp','value'=>set_value('ape_emp'),'placeholder'=>'Apellidos completo del empleado'));?>
				<?php echo form_error('ape_emp', '<div class="">', '</div>'); ?>
			</div>				
			<div class="form-group">
				<label>Dirección</label>
				<?php echo form_input(array('class'=>'form-control','name'=>'dir_emp','value'=>set_value('dir_emp'),'placeholder'=>'Dirección del empleado'));?>
				<?php echo form_error('dir_emp', '<div class="">', '</div>'); ?>
			</div>
			<div class="form-group">
				<label>Telefono</label>
				<?php echo form_input(array('class'=>'form-control','name'=>'telf_emp','value'=>set_value('telf_emp'),'placeholder'=>'Telefono del empleado'));?>
				<?php echo form_error('telf_emp', '<div class="">', '</div>'); ?>
			</div>	
			<div class="form-group">
				<label>Email</label>
				<?php echo form_input(array('class'=>'form-control','name'=>'email_emp','value'=>set_value('email_emp'),'placeholder'=>'Email del empleado'));?>
				<?php echo form_error('email_emp', '<div class="">', '</div>'); ?>
			</div>	
			<div class="form-group">
				<label>Documento de Identidad</label>
				<?php echo form_input(array('class'=>'form-control','name'=>'dni_emp','value'=>set_value('dni_emp'),'placeholder'=>'Documento de identidad del empleado'));?>
				<?php echo form_error('dni_emp', '<div class="">', '</div>'); ?>
			</div>		
			<div class="form-group texto-derecha">
				<?php echo form_submit('btnGuardar','Guardar',array('class'=>'btn btn-info'));?>
			</div>
			<?php echo form_close();?>
		</div>
	</div>
</div>

<div class="panel panel-warning">
	<div class="panel-heading">
		<h4><span class="glyphicon glyphicon-lock"></span>Cambiar Contraseña</h4>
	</div>
	<div class="panel-body">
	<?php echo form_open(base_url().'admin/users/change/'.$this->session->userdata('auth')['id'])?>
	<div class="form-group">
	<?php echo form_label('Contraseña')?>
	<?php echo form_input(array('name'=>'old_pass',
	'class'=>'form-control','placeholder'=>'***********','type'=>'password','value'=>set_value('old_pass')))?>	
	<?php echo form_error('old_pass', '<div class="">', '</div>'); ?>	
	</div>
	<div class="form-group">
	<?php echo form_label('Nueva Contraseña')?>
	<?php echo form_input(array('name'=>'new_pass',
	'class'=>'form-control','placeholder'=>'***********','type'=>'password'))?>	
	<?php echo form_error('new_pass', '<div class="">', '</div>'); ?>	
	</div>
	<div class="form-group">
	<?php echo form_label('Repetir Nueva Contraseña')?>
	<?php echo form_input(array('name'=>'rnew_pass',
	'class'=>'form-control','placeholder'=>'***********','type'=>'password'))?>	
	<?php echo form_error('rnew_pass', '<div class="">', '</div>'); ?>	
	</div>
	<div class="form-group">
		<?php echo form_submit('btnChange','Cambiar',array('class'=>'btn btn-warning'))?>
	</div>
	<?php echo form_close()?>
		
	</div>
</div>
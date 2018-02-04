<div class="col-md-4 col-md-offset-4">
	<div class="panel panel-primary">
	<div class="panel-heading">
		<h4><span class="glyphicon glyphicon-user"></span> Iniciar Sesión</h4>
	</div>
	<div class="panel-body">
		<div class="<?php echo $this->session->flashdata('alert')?>">
			<?php echo $this->session->flashdata('btn_close')?>
			<?php echo $this->session->flashdata('msg')?>
		</div>	
		<?php echo form_open(base_url().'admin/auth/login')?>
		<div class="form-group input-group">
			<?php echo form_label('<i class="glyphicon glyphicon-user"></i>','',array('class'=>'input-group-addon'));?>
			<?php echo form_input(array('name'=>'email','class'=>'form-control','placeholder'=>'example@mail.com'))?>	
				
		</div>
		<?php echo form_error('email', '<div class="">', '</div>'); ?>
		<div class="form-group input-group">
			<?php echo form_label('<i class="glyphicon glyphicon-lock"></i>','',array('class'=>'input-group-addon'));?>
			<?php echo form_input(array('name'=>'password','class'=>'form-control','placeholder'=>'*****************','type'=>'password'))?>			
		</div>
		<?php echo form_error('password', '<div class="">', '</div>'); ?>
		<br>
		<div class="form-group">
			<?php echo form_submit('btnAcceder','Acceder',array('class'=>'btn btn-success'))?>
			<?php echo "<a href='".base_url()."' class='btn btn-default'><span class='glyphicon glyphicon-menu-left'></span> Regresar</a>"?>
		</div>
		<?php echo form_close()?>
	</div>
</div>
</div>

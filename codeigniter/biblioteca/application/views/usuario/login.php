<section class="container">
	<div class="col-md-4 col-md-offset-4">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<span>LOGIN</span>
			</div>
			<div class="panel-body">
				<?php echo form_open(base_url().'usuario/login');?>
				<div class="form-group input-group">
					<?php echo form_label('<i class="glyphicon glyphicon-user"></i>','',array('class'=>'input-group-addon'));?>
					<?php echo form_input(array('name'=>'input_username','class'=>'form-control','placeholder'=>'USUARIO'))?>		
				</div>
				<div class="form-group input-group">
					<?php echo form_label('<i class="glyphicon glyphicon-lock"></i>','',array('class'=>'input-group-addon'));?>
					<?php echo form_input(array('name'=>'input_pwd','class'=>'form-control','placeholder'=>'CONTRASEÑA','type'=>'password'))?>
				</div>
				<?php echo form_submit('btnIniciar','INGRESAR',array('class'=>'form-control btn btn-success'))?>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
</section>
<div class="clear"></div>
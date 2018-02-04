<section id="content-login" class="col-md-4 col-md-offset-4">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<?php echo heading('INICIAR SESIÓN', 2, array('class' => 'panel-title'));?>
		</div>
		<div class="panel-body">
			<?php
			echo form_open(base_url());
			?>
   			<div class="form-group input-group">
   				<?php   				
   					$lbl_usuario = array(
       				 'class' => 'input-group-addon'        
					);
				echo form_label('<i class="glyphicon glyphicon-user"></i>', 'lbl_usuario', $lbl_usuario);

				$input_usuario = array(
				'type'			=>'text',
		        'name'          => 'input_usuario',
		        'class'			=>'form-control',
		        'value'         => '',
		        'maxlength'     => '100',
		        'size'          => '50',
		        'placeholder'	=> 'USUARIO'
				);
				echo form_input($input_usuario);
   				?>
   			</div>
   			<div class="form-group input-group">   			
   				<?php
   					$lbl_clave = array(
       				 'class' => 'input-group-addon'        
					);
				echo form_label('<i class="glyphicon glyphicon-lock"></i>', 'lbl_clave', $lbl_clave);

				$input_clave = array(
				'type'			=>'password',
		        'name'          => 'input_clave',
		        'class'			=>'form-control',
		        'value'         => '',
		        'maxlength'     => '100',
		        'size'          => '50',
		        'placeholder'	=> 'CONTRASEÑA'
				);
				echo form_input($input_clave);
   				?>   				
   			</div>
   			<div class="form-group">
   				<?php
   				$btn_logear = array(
			        'name'          => 'btn_logear',
			        'id'            => 'btn_logear',
			        'class'			=> 'form-control btn btn-success',
			        'value'         => 'INGRESAR'
				);
				echo form_submit($btn_logear);
				echo form_close();
   			?>
			
		</div>
	</div>
</section>
</body>
</html>
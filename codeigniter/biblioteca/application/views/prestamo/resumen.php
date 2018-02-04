<section>
<?php echo form_open(base_url().'prestamo/agregar');?>
	<div class="col-md-8">
		<div class="panel panel-info">
			<div  class="panel-heading">
			<span>RESUMEN DE LOS LIBROS SOLICITADOS</span>
			</div>
			
			<div class="panel-body table-responsive" id="result-book">
				<table  class="table table-striped">
					<tr>
						<th>#</th>
						<th>LIBROS</th>
						<th>SITIO</th>
						
					</tr>	
					<?php
					foreach ($data_libros as $detalle_libro) {?>
						<tr>
							<td><?php echo $detalle_libro->id;?></td>
							<td><?php echo $detalle_libro->nombre;?></td>
							<td><div class="form-group">
						
						<?php echo form_dropdown('cboSitio[]',array('---','biblioteca','casa'),set_value('cboTematica'),array('id'=>'cboAutor','class'=>'form-control'));?>
						<?php echo form_error('cboTematica', '<div class="">', '</div>'); ?>
					</div></td>
						</tr>
					<?php }
					?>				
					
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-primary">
			<div  class="panel-heading">
				<span>AUTENTICAR</span>
			</div>
			<div class="panel-body">				
				<div class="form-group input-group">
					<?php echo form_label('<i class="glyphicon glyphicon-user"></i>','',array('class'=>'input-group-addon'));?>
					<?php echo form_input(array('name'=>'input_username','class'=>'form-control','placeholder'=>'USUARIO','id'=>'input_username'))?>		
				</div>
				<div class="form-group input-group">
					<?php echo form_label('<i class="glyphicon glyphicon-lock"></i>','',array('class'=>'input-group-addon'));?>
					<?php echo form_input(array('name'=>'input_pwd','class'=>'form-control','placeholder'=>'CONTRASEÑA','type'=>'password','id'=>'input_pwd'))?>
				</div>
				<?php echo form_input(array('name'=>'btnVerificar','class'=>'form-control btn btn-info','value'=>'VERIFICAR','type'=>'button','id'=>'btnVerificar'))?>				
			</div>
			<div class="panel panel-info" id="datos_usuario">
				
			</div>
		</div>
	</div>
	<?php echo form_close();?>

</section>
<div class="clear"></div>
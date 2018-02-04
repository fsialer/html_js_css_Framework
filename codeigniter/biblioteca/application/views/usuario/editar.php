<nav class="col-md-2" id="navegador">
	<ul class="nav nav-pills nav-stacked">
		<li><a href="<?php echo base_url()?>">HOME</a></li>		
		<li><a href="<?php echo base_url().'autor'?>">AUTORES</a></li>
		<li><a href="<?php echo base_url().'tematica'?>">TEMATICA</a></li>
		<li><a href="<?php echo base_url().'nacionalidad'?>">NACIONALIDAD</a></li>
		<li><a href="<?php echo base_url().'lector'?>">LECTORES</a></li>
		<li><a href="<?php echo base_url().'prestamo'?>">PRESTAMO</a></li>
		<li><a href="<?php echo base_url().'suscripcion'?>">SUSCRIPCIÓN</a></li>
		<li><a href="<?php echo base_url().'editorial'?>">EDITORIAL</a></li>
		<li><a href="<?php echo base_url().'libro'?>">LIBROS</a></li>
		<li><a href="<?php echo base_url().'usuario'?>">USUARIOS</a></li>
	</ul>
</nav>
<section class="col-md-10">
	<div class="col-md-5 col-md-offset-3">
		<div class="panel panel-warning">
			<div class="panel-heading">
				<span>EDITAR USUARIO</span>
			</div>
			<div class="panel-body">
				<?php echo form_open(base_url().'usuario/editar/'.$data_usuario->id);?>
				<div class="form-group">
					<?php echo form_label('USERNAME');?>
					<?php echo form_input(array('name'=>'input_username','class'=>'form-control','placeholder'=>'USUARIO','value'=>set_value('input_username',$data_usuario->username)))?>	
					<?php echo form_error('input_username', '<div class="">', '</div>'); ?>
				</div>			
				<div class="form-group">
					<?php echo form_radio(array('name'=>'estado','id'=>'estado','value'=>'ACTIVO','checked'=>set_value('estado',$data_usuario->estado)==='ACTIVO'?TRUE:FALSE));?>ACTIVO	
					<?php echo form_radio(array('name'=>'estado','id'=>'estado2','value'=>'INACTIVO','checked'=>set_value('estado',$data_usuario->estado)==='INACTIVO'?TRUE:FALSE))?>INACTIVO		
					<?php echo form_error('estado', '<div class="">', '</div>'); ?>	
				</div>
				<?php echo form_submit('btnEditar','EDITAR',array('class'=>'form-control btn btn-warning'))?>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
	
</section> 
<div class="clear"></div>
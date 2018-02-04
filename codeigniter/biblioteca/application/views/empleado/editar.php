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
	<div class="col-md-9 col-md-offset-1">
		<div class="panel panel-warning">
			<div class="panel-heading">
				<span>EDITAR EMPLEADO</span>
			</div>
			<div class="panel-body">
				<?php echo form_open(base_url().'empleado/editar/'.$data_empleado->id);?>
				<div>
					<div class="form-group col-md-6">
						<?php echo form_label('NOMBRES');?>
						<?php echo form_input(array('name'=>'input_nom','class'=>'form-control','placeholder'=>'NOMBRES','value'=>set_value('input_nom',$data_empleado->nombres)))?>	
						<?php echo form_error('input_nom', '<div class="">', '</div>'); ?>
					</div>
					<div class="form-group col-md-6">
						<?php echo form_label('APELLIDO PATERNO');?>
						<?php echo form_input(array('name'=>'input_ap','class'=>'form-control','placeholder'=>'APELLIDO PATERNO','value'=>set_value('input_ap',$data_empleado->apellido_paterno)))?>
						<?php echo form_error('input_ap', '<div class="">', '</div>'); ?>
					</div>
				</div>

				<div>
					<div class="form-group col-md-6">
						<?php echo form_label('APELLIDO MATERNO');?>
						<?php echo form_input(array('name'=>'input_am','class'=>'form-control','placeholder'=>'APELLIDO MATERNO','value'=>set_value('input_am',$data_empleado->apellido_materno)))?>
						<?php echo form_error('input_am', '<div class="">', '</div>'); ?>
					</div>
					<div class="form-group col-md-6">
						<?php echo form_label('EMAIL');?>
						<?php echo form_input(array('name'=>'input_email','class'=>'form-control','placeholder'=>'EMAIL','value'=>set_value('input_email',$data_empleado->email)))?>
						<?php echo form_error('input_email', '<div class="">', '</div>'); ?>
					</div>
				</div>

				<div>
					<div class="form-group col-md-6">
						<?php echo form_label('TELF/CEL');?>
						<?php echo form_input(array('name'=>'input_tel_cel','class'=>'form-control','placeholder'=>'TELF/CEL','value'=>set_value('input_tel_cel',$data_empleado->tel_cel)))?>
						<?php echo form_error('input_tel_cel', '<div class="">', '</div>'); ?>
					</div>
					<div class="form-group col-md-6">
						<?php echo form_label('DIRECCIÓN');?>
						<?php echo form_input(array('name'=>'input_dir','class'=>'form-control','placeholder'=>'DIRECCIÓN','value'=>set_value('input_dir',$data_empleado->direccion)))?>
						<?php echo form_error('input_dir', '<div class="">', '</div>'); ?>
					</div>
				</div>
				
				<div>
					<div class="form-group col-md-6">
						<?php echo form_label('DNI');?>
						<?php echo form_input(array('name'=>'input_dni','class'=>'form-control','placeholder'=>'DNI','value'=>set_value('input_dni',$data_empleado->dni)))?>
						<?php echo form_error('input_dni', '<div class="">', '</div>'); ?>
					</div>
					<div class="form-group col-md-6">
						<?php echo form_label('FECHA NACIMIENTO');?>
						<?php echo form_input(array('name'=>'input_fn','class'=>'form-control','type'=>'date','value'=>set_value('input_fn',$data_empleado->fecha_nac)))?>
						<?php echo form_error('input_fn', '<div class="">', '</div>'); ?>
					</div>
				</div>
				
				
				
				<div class="form-group">
					<?php echo form_label('ESTADO');?><br>
					<?php echo form_radio(array('name'=>'estado','id'=>'estado','value'=>'ACTIVO','checked'=>set_value('estado',$data_empleado->estado)==='ACTIVO'?TRUE:FALSE));?>ACTIVO	
					<?php echo form_radio(array('name'=>'estado','id'=>'estado2','value'=>'INACTIVO','checked'=>set_value('estado',$data_empleado->estado)==='INACTIVO'?TRUE:FALSE))?>INACTIVO		
					<?php echo form_error('estado', '<div class="">', '</div>'); ?>	
				</div>
				<?php echo form_submit('btnEditar','EDITAR',array('class'=>'form-control btn btn-warning'))?>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
	
</section>
<div class="clear"></div>
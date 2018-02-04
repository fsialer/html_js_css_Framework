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
				<span>EDITAR PERSONA</span>
			</div>
			<div class="panel-body">
				<?php echo form_open(base_url().'lector/editar/'.$data_persona->id);?>
				<div class="container-fluid">
					<div class="form-group col-md-12">
						<?php echo form_label('USERNAME');?>
						<?php echo form_input(array('name'=>'input_username','class'=>'form-control','placeholder'=>'USUARIO','value'=>set_value('input_username',$data_persona->username)))?>	
						<?php echo form_error('input_username', '<div class="">', '</div>'); ?>
					</div>
				</div>
				<div class="container-fluid">
					<div class="form-group col-md-6">
						<?php echo form_label('NOMBRES');?>
						<?php echo form_input(array('name'=>'input_nom','class'=>'form-control','placeholder'=>'NOMBRES','value'=>set_value('input_nom',$data_persona->nombres)))?>	
						<?php echo form_error('input_nom', '<div class="">', '</div>'); ?>
					</div>
					<div class="form-group col-md-6">
						<?php echo form_label('APELLIDO PATERNO');?>
						<?php echo form_input(array('name'=>'input_ap','class'=>'form-control','placeholder'=>'APELLIDO PATERNO','value'=>set_value('input_ap',$data_persona->apellido_paterno)))?>
						<?php echo form_error('input_ap', '<div class="">', '</div>'); ?>
					</div>
				</div>

				<div class="container-fluid">
					<div class="form-group col-md-6">
						<?php echo form_label('APELLIDO MATERNO');?>
						<?php echo form_input(array('name'=>'input_am','class'=>'form-control','placeholder'=>'APELLIDO MATERNO','value'=>set_value('input_am',$data_persona->apellido_materno)))?>
						<?php echo form_error('input_am', '<div class="">', '</div>'); ?>
					</div>
					<div class="form-group col-md-6">
						<?php echo form_label('FECHA DE REGISTRO');?>
						<?php echo form_input(array('name'=>'input_fr','class'=>'form-control','type'=>'date','value'=>set_value('input_fr',$data_persona->fecha_reg)))?>
						<?php echo form_error('input_fr', '<div class="">', '</div>'); ?>
					</div>
				</div>
				
				<div class="container-fluid">
					<div class="form-group col-md-6">
						<?php echo form_label('EMAIL');?>
						<?php echo form_input(array('name'=>'input_email','class'=>'form-control','placeholder'=>'EMAIL','value'=>set_value('input_email',$data_persona->email)))?>
						<?php echo form_error('input_email', '<div class="">', '</div>'); ?>
					</div>			
					<div class="form-group col-md-6">
						<?php echo form_label('DIRECCIÓN');?>
						<?php echo form_input(array('name'=>'input_dir','class'=>'form-control','placeholder'=>'DIRECCIÓN','value'=>set_value('input_dir',$data_persona->direccion)))?>
						<?php echo form_error('input_dir', '<div class="">', '</div>'); ?>
					</div>
				</div>
				
				<div class="container-fluid">
					<div class="form-group col-md-6">
						<?php echo form_label('TELF/CEL');?>
						<?php echo form_input(array('name'=>'input_tel_cel','class'=>'form-control','placeholder'=>'TELF/CEL','value'=>set_value('input_tel_cel',$data_persona->tel_cel)))?>
						<?php echo form_error('input_tel_cel', '<div class="">', '</div>'); ?>
					</div>
					<div class="form-group col-md-6">
						<?php echo form_label('DNI');?>
						<?php echo form_input(array('name'=>'input_dni','class'=>'form-control','placeholder'=>'DNI','value'=>set_value('input_dni',$data_persona->dni)))?>
						<?php echo form_error('input_dni', '<div class="">', '</div>'); ?>
					</div>
				</div>
				
				<div class="form-group">
					<?php echo form_radio(array('name'=>'estado','id'=>'estado','value'=>'ACTIVO','checked'=>set_value('estado',$data_persona->estado)==='ACTIVO'?TRUE:FALSE));?>ACTIVO	
					<?php echo form_radio(array('name'=>'estado','id'=>'estado2','value'=>'INACTIVO','checked'=>set_value('estado',$data_persona->estado)==='INACTIVO'?TRUE:FALSE))?>INACTIVO		
					<?php echo form_error('estado', '<div class="">', '</div>'); ?>	
				</div>
				<?php echo form_submit('btnEditar','EDITAR',array('class'=>'form-control btn btn-warning'))?>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
	
</section>
<div class="clear"></div>
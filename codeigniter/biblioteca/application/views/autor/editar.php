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
				<span>EDITAR DE AUTORES</span>
			</div>
			<div class="panel-body">
				<?php echo form_open(base_url().'autor/editar/'.$data_autor->id);?>
				<div class="form-group">
					<?php echo form_label('NOMBRES');?>
					<?php echo form_input(array('name'=>'input_nom','class'=>'form-control','placeholder'=>'NOMBRES','value'=>set_value('input_nom',$data_autor->nombres)))?>	
					<?php echo form_error('input_nom', '<div class="">', '</div>'); ?>
				</div>
				<div class="form-group">
					<?php echo form_label('APELLIDO PATERNO');?>
					<?php echo form_input(array('name'=>'input_ap','class'=>'form-control','placeholder'=>'APELLIDO PATERNO','value'=>set_value('input_ap',$data_autor->apellido_paterno)))?>
					<?php echo form_error('input_ap', '<div class="">', '</div>'); ?>
				</div>
				<div class="form-group">
					<?php echo form_label('APELLIDO MATERNO');?>
					<?php echo form_input(array('name'=>'input_am','class'=>'form-control','placeholder'=>'APELLIDO MATERNO','value'=>set_value('input_am',$data_autor->apellido_materno)))?>
					<?php echo form_error('input_am', '<div class="">', '</div>'); ?>
				</div>							
				<div class="form-group">
					<?php echo form_label("NACIONALIDAD")?>
					<?php echo form_dropdown('cboNacionalidad',$data_nacionalidades,set_value('cboNacionalidad',$data_autor->id_nacion),array('id'=>'cboNacionalidad','class'=>'form-control'));?>
					<?php echo form_error('cboNacionalidad', '<div class="">', '</div>'); ?>
				</div>	
				<?php echo form_submit('btnAgregar','EDITAR',array('class'=>'form-control btn btn-warning'))?>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
	
</section>
<div class="clear"></div>
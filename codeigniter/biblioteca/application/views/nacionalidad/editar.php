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
				<span>EDITAR NACIONALIDAD</span>
			</div>
			<div class="panel-body">
				<?php echo form_open(base_url().'nacionalidad/editar/'.$data_nacionalidades->id);?>
				<div class="form-group">
					<?php echo form_label('PAIS');?>
					<?php echo form_input(array('name'=>'input_pais','class'=>'form-control','placeholder'=>'NOMBRE','value'=>set_value('input_pais',$data_nacionalidades->pais)))?>	
					<?php echo form_error('input_pais', '<div class="">', '</div>'); ?>
				</div>
				<div class="form-group">
					<?php echo form_label('NACIONALIDAD');?>
					<?php echo form_input(array('name'=>'input_nom','class'=>'form-control','placeholder'=>'NACIONALIDAD','value'=>set_value('input_nom',$data_nacionalidades->nombre)))?>
					<?php echo form_error('input_nom', '<div class="">', '</div>'); ?>
				</div>
				
				<?php echo form_submit('btnAgregar','EDITAR',array('class'=>'form-control btn btn-warning'))?>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
	
</section>
<div class="clear"></div>
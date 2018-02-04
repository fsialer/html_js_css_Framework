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
				<span>REGISTRO DE SUSCRIPCION</span>
			</div>
			<div class="panel-body">					
				<div>
					<?php echo form_open(base_url().'suscripcion/editar/'.$data_suscripciones->id_suscripciones);?>				
					<div class="form-group">
						<?php echo form_label('PERSONA');
						 echo form_input(array('name'=>'input_persona','id'=>'input_persona','disabled'=>'true','class'=>'form-control','value'=>set_value('input_persona',$data_suscripciones->datos)));
						 echo form_input(array('name'=>'input_id_per','id'=>'input_id_per','value'=>set_value('input_id_per',$data_suscripciones->id_persona),'type'=>'hidden'));
						 ?>
						 <?php echo form_error('input_id_per', '<div class="">', '</div>'); ?>
					</div>
					<div class="form-group">
						<?php echo form_label('FECHA INICIO');
						 echo form_input(array('name'=>'input_fi','id'=>'input_fi','disable'=>'true','type'=>'date','class'=>'form-control','value'=>set_value('input_fi',$data_suscripciones->fecha_ini)));?>
						 <?php echo form_error('input_fi', '<div class="">', '</div>'); ?>
					</div>
					<div class="form-group">
						<?php echo form_label('FECHA FIN');
						echo form_input(array('name'=>'input_ff','id'=>'input_ff','disable'=>'true','type'=>'date','class'=>'form-control','value'=>set_value('input_ff',$data_suscripciones->fecha_fin)));?>
						<?php echo form_error('input_ff', '<div class="">', '</div>'); ?>
					</div>
					<?php echo form_submit('btnGuardar','EDITAR',array('class'=>'form-control btn btn-warning'));?>
					<?php echo form_close()?>
				</div>
			</div>
		</div>
	</div>
	
</section>
<div class="clear"></div>
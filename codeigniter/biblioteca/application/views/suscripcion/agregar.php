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
	<div class="col-md-7 col-md-offset-2">
		<div class="panel panel-success">
			<div class="panel-heading">
				<span>REGISTRO DE SUSCRIPCION</span>
			</div>
			<div class="panel-body">
				<div class="col-md-6">
					<div class="panel panel-info">
						<div class="panel-heading">
							<span>FILTRAR <i class="glyphicon glyphicon-filter"></i></span>
						</div>						
						<div class="panel-body">
							<div class="form-group">
							<?php echo form_input(array('name'=>'persona','id'=>'persona','placeholder'=>'persona','type'=>'search','class'=>'form-control'));?>
							</div>
							<div>
								<span><?php echo $this->session->flashdata('msg2'); ?></span>
							</div>
							<div id="result-book">
								<table class="table table-striped" id="lista_per" >
								<?php foreach ($data_personas as $personas) {?>
									<tr>
										<td><?php echo $personas->datos;?></td>
										<td>
										<button onclick="enviarPersona(<?php echo $personas->id;?>,'<?php echo $personas->datos;?>')" id="btnAgregarPer<?php echo $personas->id;?>" class="btn btn-default">AGREGAR</button>
										</td>
									</tr>						
								<?php }?>
								</table>	
							</div>		
						</div>						
					</div>									
				</div>			
				<div class="col-md-6">
					<?php echo form_open(base_url().'suscripcion/agregar');?>				
					<div class="form-group">
						<?php echo form_label('PERSONA');
						 echo form_input(array('name'=>'input_persona','id'=>'input_persona','readOnly'=>'true','class'=>'form-control','value'=>set_value('input_persona')));
						 echo form_input(array('name'=>'input_id_per','id'=>'input_id_per','value'=>set_value('input_id_per'),'type'=>'hidden'));
						 ?>
						 <?php echo form_error('input_id_per', '<div class="">', '</div>'); ?>
					</div>
					<div class="form-group">
						<?php echo form_label('FECHA INICIO');
						 echo form_input(array('name'=>'input_fi','id'=>'input_fi','disable'=>'true','type'=>'date','class'=>'form-control','value'=>set_value('input_fi')));?>
						 <?php echo form_error('input_fi', '<div class="">', '</div>'); ?>
					</div>
					<div class="form-group">
						<?php echo form_label('FECHA FIN');
						echo form_input(array('name'=>'input_ff','id'=>'input_ff','disable'=>'true','type'=>'date','class'=>'form-control','value'=>set_value('input_ff')));?>
						<?php echo form_error('input_ff', '<div class="">', '</div>'); ?>
					</div>
					<?php echo form_submit('btnGuardar','GUARDAR',array('class'=>'form-control btn btn-success'));?>
					<?php echo form_close()?>
				</div>
			</div>
		</div>
	</div>
	
</section>
<div class="clear"></div>
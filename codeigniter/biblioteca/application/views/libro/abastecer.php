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
				<span>ABASTECER DE LIBRO</span>
			</div>
			<div class="panel-body">
				<?php echo form_open(base_url().'libro/abastecer/'.$data_libros->id)?>
				<div>
					<div class="form-group col-md-6">
						<?php echo form_label("TEMATICA")?>
						<?php echo form_dropdown('cboTematica',$data_tematicas,set_value('cboTematica',$data_libros->id_tematica),array('id'=>'cboAutor','class'=>'form-control','readOnly'=>'true'));?>
						<?php echo form_error('cboTematica', '<div class="">', '</div>'); ?>
					</div>
					<div class="form-group col-md-6">
						<?php echo form_label('NOMBRE');?>
						<?php echo form_input(array('name'=>'input_nom','class'=>'form-control','placeholder'=>'LIBRO','value'=>set_value('input_nom',$data_libros->nombre),'readOnly'=>'true'))?>	
						<?php echo form_error('input_nom', '<div class="">', '</div>'); ?>
					</div>	
				</div>

				<div>
					<div class="form-group col-md-6">
						<?php echo form_label("AUTOR")?>
						<?php echo form_dropdown('cboAutor',$data_autores,set_value('cboAutor',$data_libros->id_autor),array('id'=>'cboAutor','class'=>'form-control','readOnly'=>'true'));?>
						<?php echo form_error('cboAutor', '<div class="">', '</div>'); ?>
					</div>
					<div class="form-group col-md-6">
						<?php echo form_label("EDITORIAL")?>
						<?php echo form_dropdown('cboEditorial',$data_editoriales,set_value('cboEditorial',$data_libros->id_editorial),array('id'=>'cboEditorial','class'=>'form-control','readOnly'=>'true'));?>
						<?php echo form_error('cboEditorial', '<div class="">', '</div>'); ?>
					</div>	
				</div>

				<div>
					<div class="form-group col-md-6">
						<?php echo form_label('NUMERO DE PAGINAS');?>
						<?php echo form_input(array('name'=>'input_nump','class'=>'form-control','placeholder'=>'NUMERO DE PAGINAS','value'=>set_value('input_nump',$data_libros->num_pag),'type'=>'number','readOnly'=>'true'))?>
						<?php echo form_error('input_nump', '<div class="">', '</div>'); ?>
					</div>	
				
					<div class="form-group col-md-6">
						<?php echo form_label('STOCK ACTUAL');?>
						<?php echo form_input(array('name'=>'input_stock','class'=>'form-control','placeholder'=>'STOCK','value'=>set_value('input_stock',$data_libros->stock),'type'=>'number','readOnly'=>'true'))?>
						<?php echo form_error('input_stock', '<div class="">', '</div>'); ?>
					</div>		
				</div>	
				<div>
					<div  class="form-group col-md-6">
					<?php echo form_label('FECHA ABASTECIMIENTO');?>
					<?php echo form_input(array('name'=>'input_fabast','type'=>'date','id'=>'input_fabast','readOnly'=>'true','class'=>'form-control','value'=>date('Y-m-d')));?>
					</div>

					<div class="form-group col-md-6">
						<?php echo form_label('INGRESO');?>
						<?php echo form_input(array('name'=>'input_ingreso','class'=>'form-control','placeholder'=>'STOCK','value'=>set_value('input_ingreso'),'type'=>'number'))?>
						<?php echo form_error('input_ingreso', '<div class="">', '</div>'); ?>
					</div>	
				</div>
												
				<?php echo form_submit('btnEditar','ABASTECER',array('class'=>'form-control btn btn-warning'))?>
				<?php echo form_close();?>
			</div>
		</div>		
	</div>
	
</section>
<div class="clear"></div>
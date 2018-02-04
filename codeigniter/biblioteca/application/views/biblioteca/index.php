<section>
	<div class="col-md-3" id="control-search">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<span>FILTRAR <i class="glyphicon glyphicon-filter"></i></span>
			</div>
			<div class="panel-body">
				<?php echo form_open(base_url().'biblioteca')?>
				<div class="form-group">
					<?php echo form_label("TEMATICA")?>
					<?php echo form_dropdown('cboTematica',$data_tematicas,set_value('cboTematica'),array('id'=>'cboAutor','class'=>'form-control'));?>				
				</div>			
				<div class="form-group">
					<?php echo form_label("LIBRO")?>
					<?php echo form_input(array('name'=>'input_libro','class'=>'form-control','placeholder'=>'NOMBRE DEL LIBRO','value'=>set_value('input_libro')))?>				
				</div>
				<div class="form-group">
					<?php echo form_label("AUTOR(ES)")?>
					<?php echo form_input(array('name'=>'input_autor','class'=>'form-control','placeholder'=>'NOMBRE DEL AUTOR(ES)','value'=>set_value('input_autor')))?>				
				</div>
				<?php echo form_submit('btnBuscar','BUSCAR',array('class'=>'form-control btn btn-info'))?>
				<?php echo form_close();?>
			</div>
		</div>	
	</div>

	<div class="col-md-9" >
		<div class="panel panel-info">
			<?php echo form_open(base_url().'prestamo/resumen');?>
			<div class="panel-heading">
				<span>RESULTADOS</span>
				<?php echo form_submit('btnReservar','PRESTAMO',array('class'=>'form-control btn btn-success'))?>
			</div>
			<div class="panel-body" id="result-book">
				<table class="table table-striped" >
					<tr>
						<th>#</th>
						
						<th>NOMBRE DEL LIBRO</th>
						<th>TEMATICA</th>
						<th>AUTOR(ES)</th>
						<th>EJEMPLARES DISPONIBLES</th>
					</tr>
					
						<?php foreach ($data_libros as $libros) {?>
							<tr>
								<td><?php echo form_checkbox(array('name'=>'id_libros[]','value'=>$libros->id_libro));?></td>
								
								<td><a href="<?php echo base_url().'prestamo/ver/'.$libros->id_libro;?>"><?php echo $libros->nom_libro;?></a></td>
								<td><?php echo $libros->nom_temat;?></td>
								<td><?php echo $libros->datos_autor;?></td>
								<td><?php echo $libros->stock;?></td>

							</tr>
						<?php }?>
					
				</table>
				
			</div>
			<div><span><?php echo $this->session->flashdata('msg'); ?></span></div>
			<?php echo form_close();?>
		
		</div>

	</div>
	
	
</section>
<div class="clear"></div>
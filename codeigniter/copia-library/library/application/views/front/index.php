<div class="col-md-4">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h4><span class="glyphicon glyphicon-filter"></span>Flitrar</h4>
		</div>
		<div class="panel-body">
			<?php echo form_open(base_url())?>
			<div class="form-group">
				<?php echo form_label('Temática')?>
				<?php echo form_dropdown('thematic',$list_thematics,set_value('thematic'),array('class'=>'form-control thematic-select'))?>
			</div>
			<div class="form-group">
				<?php echo form_label('Libro')?>
				<?php echo form_input(array('name'=>'book','placeholder'=>'Nombre del libro...','value'=>set_value('book'),'class'=>'form-control'))?>
			</div>
			<div class="form-group">
				<?php echo form_submit('btnBuscar','Buscar',array('class'=>'btn btn-info form-control'));?>
			</div>
			
			<?php echo form_close()?>
		</div>
	</div>
</div>
<div class="col-md-8">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h4><span class="glyphicon glyphicon-filter"></span>Resultados</h4>
			<div class="<?php echo $this->session->flashdata('alert')?>">
			<?php echo $this->session->flashdata('btn_close')?>
			<?php echo $this->session->flashdata('msg')?>
			</div>
		</div>	
		</div>
		<div class="panel-body">
			<?php echo form_open(base_url());?>
			
			<div class="table-responsive">
				<table class="table table-striped">
					<tr>
						<th></th>
						<th>Libro</th>
						<th>Autor(es)</th>
						<th>Temática</th>
						<th>Ejemplares</th>
					</tr>
					<tr>	
					<?php
					$i=0;
					foreach ($Books as $book) {
						?>
						<tr>
							<td><?php echo form_checkbox(array('name'=>'book_id[]','value'=>set_value('book_id[]',$book->id)));?></td>
							<td><?php echo $book->name;?></td>
							<td>
							<?php 
							foreach ($Authors[$i] as $author) {							
							echo $author->name.'<br>';						
							}
							$i++;
							?>
							</td>
							<td><?php echo $book->thematic_name;?></td>
							<td><?php echo $book->stock;?></td>
						</tr>
					<?php
					}
					?>					
					</tr>
				</table>
			</div>
			<br>
			<div class="form-group">
				<?php echo form_submit('btnLending','Préstamo',array('class'=>'btn btn-success'))?>
			</div>
			
			<div>
				<span><?php echo $this->session->flashdata('msg'); ?>
			</div>
			<?php echo form_close();?>
		</div>		
	</div>
</div>
<script type="text/javascript">
	$(".thematic-select").chosen({
		placeholder_text_single:'Seleccione una Temática',
		no_results_text:'No hay resultados relacionados con',
		width: "100%"
	});

</script>
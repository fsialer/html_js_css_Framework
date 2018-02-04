<?php echo form_open(base_url().'summary');?>
<div class="col-md-12">
	<div class="panel panel-info">
		<div class="panel-heading">
			Resumen
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-striped">
					<tr>
						<th>Libro</th>
						<th>Temática</th>
						<th>Autores</th>
						<th>Lugar</th>
					</tr>
					<?php 
					$i=0;
					foreach ($Books as $book) {

					?>	
					<tr>
						<td><?php echo $book->name?></td>
						<td><?php echo $book->thematic_name?></td>
						<td>
							<?php
							foreach ($Authors[$i] as $author) {
								echo $author->name.'<br>';
							}
								$i++;
							
							?>
						</td>
						<td>
							<?php echo form_dropdown('place[]',array('--Seleccione  un nivel--','library'=>'Biblioteca','home'=>'Casa'),set_value('place[]'),array('class'=>'form-control type-select','placeholder'=>'Seleccione un Nivel'));?>
						</td>
					</tr>
					<?php
					}
					?>
		
				</table>
	
			</div>
			<div class="form-group">
				<?php echo form_submit('btnReservar','Reservar',array('class'=>'btn btn-success','onclick'=>"return confirm('¿Estas Seguro de realizar este proceso?')"))?>
				<a class='btn btn-default' href="<?php echo base_url();?>">Cancelar</a>
			</div>
		</div>
	</div>	
</div>
<?php echo form_close();?>
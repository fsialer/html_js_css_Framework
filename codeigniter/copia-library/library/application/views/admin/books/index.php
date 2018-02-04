<div class="panel panel-info">
	<div class="panel-heading">
		<h4>Listado de Libros</h4>
		</div>
		<div class="panel-body">	
		<div class="<?php echo $this->session->flashdata('alert')?>">
			<?php echo $this->session->flashdata('btn_close')?>
			<?php echo $this->session->flashdata('msg')?>
		</div>	
		<a  class="btn btn-primary" href="<?php echo base_url().'admin/books/create'?>">Registrar Libro</a>
		<hr>
		<div class="table-responsive">
			<table class="table table-striped">
				<tr>
					<th>Libro</th>
					<th>Autor(es)</th>
					<th>Temática</th>
					<th>Editorial</th>
					<th>Stock</th>	
					<th>Ubicación</th>	
					<th>Estado</th>			
					<th>Acciones</th>
				</tr>
				<?php
				$i=0;
				foreach ($Books as $book) {
					?>
					<tr>
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
						<td><?php echo $book->publisher_name;?></td>
						<td><?php echo $book->stock;?></td>
						<td><?php echo $book->location;?></td>
						<td><?php echo $book->state?></td>
						<td>							
							<a class="btn btn-warning" href="<?php echo base_url().'admin/books/edit/'.$book->id;?>">
								<span class="glyphicon glyphicon-wrench"></span>
							</a>
							<a class="btn btn-danger" onclick="return confirm('¿Estas Seguro de Eliminar este registro?')" href="<?php echo base_url().'admin/books/delete/'.$book->id?>" >
								<span class="glyphicon glyphicon-remove-sign"></span>
							</a>
							
						</td>
					</tr>
				<?php
				}
				?>
				
			</table>
		</div>
			
			<ul class="pagination">
				<?php
	    		 echo $this->pagination->create_Links();
	    		?>
			</ul>			
	</div>	
</div>
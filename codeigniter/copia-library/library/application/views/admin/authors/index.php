<div class="panel panel-info">
		<div class="panel-heading">
		<h4>Listado de Autores</h4>
		</div>
		<div class="panel-body">	
		<div class="<?php echo $this->session->flashdata('alert')?>">
			<?php echo $this->session->flashdata('btn_close')?>
			<?php echo $this->session->flashdata('msg')?>
		</div>	
			<a  class="btn btn-primary" href="<?php echo base_url().'admin/authors/create'?>">Registrar Autor</a>		
		
		<hr>
		<div class="table-responsive">
			<table class="table table-striped">
				<tr>
					<th>Autor</th>
					<th>País</th>					
					<th>Acciones</th>
				</tr>
				<?php
				foreach ($Authors as $author) {?>
					<tr>
						<td><?php echo $author->name;?></td>
						<td><?php echo $author->country_name;?></td>
						
						<td>
							<a class="btn btn-warning" href="<?php echo base_url().'admin/authors/edit/'.$author->id;?>">
								<span class="glyphicon glyphicon-wrench"></span>
							</a>
							<a class="btn btn-danger" onclick="return confirm('¿Estas Seguro de Eliminar este registro?')" href="<?php echo base_url().'admin/authors/delete/'.$author->id?>" >
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
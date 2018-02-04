<div class="panel panel-info">
	<div class="panel-heading">
		<h4>Listado de Editorales</h4>
		</div>
		<div class="panel-body">	
		<div class="<?php echo $this->session->flashdata('alert')?>">
			<?php echo $this->session->flashdata('btn_close')?>
			<?php echo $this->session->flashdata('msg')?>
		</div>			
			<a  class="btn btn-primary" href="<?php echo base_url().'admin/publishers/create'?>">Registrar Editorial</a>		
		<hr>
		<div class="table-responsive">
			<table class="table table-striped">
				<tr>
					<th>Editorial</th>
					<th>País</th>					
					<th>Acciones</th>
				</tr>
				<?php
				foreach ($Publishers as $publisher) {?>
					<tr>
						<td><?php echo $publisher->name;?></td>
						<td><?php echo $publisher->country_name;?></td>
						
						<td>
							<a class="btn btn-warning" href="<?php echo base_url().'admin/publishers/edit/'.$publisher->id;?>">
								<span class="glyphicon glyphicon-wrench"></span>
							</a>
							<a class="btn btn-danger" onclick="return confirm('¿Estas Seguro de Eliminar este registro?')" href="<?php echo base_url().'admin/publishers/delete/'.$publisher->id?>" >
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
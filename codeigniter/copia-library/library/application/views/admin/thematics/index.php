<div class="panel panel-info">
		<div class="panel-heading">
		<h4>Listado de Temáticas</h4>
		</div>
		<div class="panel-body">	
		<div class="<?php echo $this->session->flashdata('alert')?>">
			<?php echo $this->session->flashdata('btn_close')?>
			<?php echo $this->session->flashdata('msg')?>
		</div>	
		<a  class="btn btn-primary" href="<?php echo base_url().'admin/thematics/create'?>">Registrar Temática</a>
		<hr>
		<div class="table-responsive">
			<table class="table table-striped">
				<tr>
					<th>Temática</th>					
					<th>Acciones</th>
				</tr>
				<?php
				foreach ($Thematics as $thematic) {?>
					<tr>
						<td><?php echo $thematic->name;?></td>						
						<td>
							<a href="<?php echo base_url().'admin/thematics/edit/'.$thematic->id?>" class="btn btn-warning">
								<span class="glyphicon glyphicon-wrench"></span>
							</a>
							<a onclick="return confirm('¿Estas Seguro de Eliminar este registro?')" href="<?php echo base_url().'admin/thematics/delete/'.$thematic->id?>" class="btn btn-danger">
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
<div class="panel panel-info">
		<div class="panel-heading">
		<h4>Listado de Suscripciones</h4>
		</div>
		<div class="panel-body">	
		<div class="<?php echo $this->session->flashdata('alert')?>">
			<?php echo $this->session->flashdata('btn_close')?>
			<?php echo $this->session->flashdata('msg')?>
		</div>			
			<a  class="btn btn-primary" href="<?php echo base_url().'admin/subscriptions/create'?>">Registrar Suscripción</a>	
		<hr>
		<div class="table-responsive">
			<table class="table table-striped">
				<tr>
					<th>Usuario</th>
					<th>Plan</th>
					<th>Precio</th>
					<th>Acciones</th>
				</tr>
				<?php
				foreach ($Subscriptions as $subscription) {
				?>
				<tr>
					<td><?php echo $subscription->email;?></td>
					<td><?php echo $subscription->type;?></td>	
					<td><?php echo 'S/.'.$subscription->price;?></td>		

					<td>
						<a class="btn btn-warning" href="<?php echo base_url().'admin/subscriptions/edit/'.$subscription->id;?>">
								<span class="glyphicon glyphicon-wrench"></span>
						</a>
						<a class="btn btn-danger" onclick="return confirm('¿Estas Seguro de Eliminar este registro?')" href="<?php echo base_url().'admin/subscriptions/delete/'.$subscription->id?>" >
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
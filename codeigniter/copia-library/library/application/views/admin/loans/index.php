<div class="panel panel-info">
		<div class="panel-heading">
		<h4>Listado de Préstamos</h4>
		</div>
		<div class="panel-body">	
		<div class="<?php echo $this->session->flashdata('alert')?>">
			<?php echo $this->session->flashdata('btn_close')?>
			<?php echo $this->session->flashdata('msg')?>
		</div>	
		<hr>
		<div class="table-responsive">
			<table class="table table-striped">
				<tr>
					<th>Libro</th>					
					<th>Usuario</th>
					<th>Lugar</th>
					<th>Estado</th>
					<th>Fecha de Reservación</th>
					<th>Fecha de Devolución</th>
					<th>Acciones</th>
				</tr>
				<?php
				foreach ($Loans as $loan) {?>
					<tr>
						<td><?php echo $loan->name;?></td>	
						<td><?php echo $loan->user_name;?></td>	
						<td><?php echo $loan->place;?></td>	
						<td><?php echo $loan->state;?></td>	
						<td><?php echo $loan->create_at;?></td>	
						<td><?php echo $loan->due_date;?></td>	
						<td>
							<a href="<?php echo base_url().'admin/loans/give/'.$loan->id?>" class="btn btn-warning">
								<span class="glyphicon glyphicon-inbox
"></span>
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
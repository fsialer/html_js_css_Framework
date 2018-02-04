<div class="panel panel-info">
		<div class="panel-heading">
		<h4>Listado de Usuarios</h4>
		</div>
		<div class="panel-body">	
		<div class="<?php echo $this->session->flashdata('alert')?>">
			<?php echo $this->session->flashdata('btn_close')?>
			<?php echo $this->session->flashdata('msg')?>
		</div>	
		<div class="col-md-8">
			<a  class="btn btn-primary" href="<?php echo base_url().'admin/users/create'?>">Registrar Usuario</a>	
		</div>
		
		<div class="col-md-4">
			<?php echo form_open(base_url().'admin/users')?>
				<?php echo form_input(array('name'=>'search','type'=>'search','placeholder'=>'Buscar ....' ,'class'=>'form-control'));?>
			<?php echo form_close()?>
		</div>			
			
		<hr>
		<div class="table-responsive">
			<table class="table table-striped">
				<tr>
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>Dirección</th>
					<th>Email</th>
					<th>Tipo</th>
					<th>Acciones</th>
				</tr>
				<?php
				foreach ($Users as $user) {?>
					<tr>
						<td><?php echo $user->name;?></td>
						<td><?php echo $user->surname;?></td>
						<td><?php echo $user->address;?></td>
						<td><?php echo $user->email;?></td>
						<td><?php echo $user->type;?></td>
						<td>												
							<a href="<?php echo base_url().'admin/users/edit/'.$user->id?>" class="btn btn-warning">
								<span class="glyphicon glyphicon-wrench"></span>
							</a>
							<a onclick="return confirm('¿Estas Seguro de Eliminar este registro?')" href="<?php echo base_url().'admin/users/delete/'.$user->id?>" class="btn btn-danger">
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


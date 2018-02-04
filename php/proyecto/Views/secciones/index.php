<div class="box-principal">
<h3 class="titulo"> Listado de Secciones<hr></h3>
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title">Listado de Secciones</h3>
			
		</div>
		<div class="panel-body">
			<table class="table table-striped tablet-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Nombres</th>						
						<th>Accion</th>
					</tr>
				</thead>
				<tbody>
					
					<?php foreach ($datos as $Secciones) {?>
					<tr>
						<td><?php echo $Secciones->id;?></td>
						<td><?php echo $Secciones->nombre;?></td>						
						<td>
						<a class="btn btn-warning" href="<?php echo URL;?>secciones/editar/<?php echo $Secciones->id?>">Editar</a>
						<a class="btn btn-danger" href="<?php echo URL;?>secciones/eliminar/<?php echo $Secciones->id?>">Eliminar</a>
						</td>
					</tr>
					<?php }?>
						
					
				</tbody>
				
			</table>
			
		</div>
	</div>
		
	</div>

<div class="box-principal">
<h3 class="titulo"> Listado de Estudiantes<hr></h3>
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title">Listado de estudiantes</h3>
			
		</div>

		<div class="panel-body">
			<table class="table table-striped tablet-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Nombres</th>
						<th>Edad</th>
						<th>Promedio</th>
						<th>Imagen</th>
						<th>Seccion</th>
						<th>Fecha</th>
						<th>Accion</th>
					</tr>
				</thead>
				<tbody>
					
					<?php foreach ($datos as $Estudiantes) {?>
					<tr>
						<td><?php echo $Estudiantes->id;?></td>
						<td><a href="<?php echo URL;?>estudiantes/ver/<?php echo $Estudiantes->id;?>"><?php echo $Estudiantes->nombre;?></a></td>
						<td><?php echo $Estudiantes->edad;?></td>
						<td><?php echo $Estudiantes->promedio;?></td>
						<td> <img class="imagen-avatar"src="<?php echo URL;?>Views/template/imagenes/avatars/<?php echo $Estudiantes->imagen;?>"/></td>
						<td><?php echo $Estudiantes->seccion_nombre;?></td>
						<td><?php echo $Estudiantes->fecha;?></td>
						<td>
						<a class="btn btn-warning" href="<?php echo URL;?>estudiantes/editar/<?php echo $Estudiantes->id?>">Editar</a>
						<a class="btn btn-danger" href="<?php echo URL;?>estudiantes/eliminar/<?php echo $Estudiantes->id?>">Eliminar</a>
						</td>
					</tr>
					<?php }?>
						
					
				</tbody>
				
			</table>
			
		</div>
	</div>
		
	</div>

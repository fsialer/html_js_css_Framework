<div class="box-principal">
<h3 class="titulo"> Editar Estudiante<hr></h3>
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title">editar un Estudiante</h3>
			
		</div>
		
		<div class="panel-body">
			<div clas="row">
			<?php foreach ($datos as $Estudiante) {?>
				
				<div class="col-md-3">
				
					<div class="panel panel-default">
						<div class="panel-body">
							<img class="img-responsive" src="<?php echo URL;?>Views/template/imagenes/avatars/<?php echo $Estudiante->imagen;?>">
						</div>
					</div>
					
				</div>

				<div class="col-md-9">
					<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
					
						<div class="form-group">
							<label for="inputEmail" class="control-label">Nombre del estudiante</label>
							<input class="form-control" name="nombre" type="text" value="<?php echo $Estudiante->nombre;?>" required/>
						</div>
						<div class="form-group">
							<label for="inputEmail" class="control-label">Edad</label>
							<input class="form-control" name="edad" type="number" value="<?php echo $Estudiante->edad;?>" required/>
						</div>
						<div class="form-group">
							<label for="inputEmail" class="control-label">Promedio</label>
							<input class="form-control" name="promedio" type="number" value="<?php echo $Estudiante->promedio;?>"required/>
						</div>
						<div class="form-group">
							<label for="inputEmail" class="control-label">Seccion(<b>Seccion Actual:</b>)</label>
							<select name="id_seccion" class="form-control">
								

									<option value="<?php echo $Estudiante->seccion_id;?>"><?php echo $Estudiante->seccion_nombre;?></option>
								
							</select>
						</div>
						<?php }?>
						<div class="form-group">
							<button type="submit" class="btn btn-success">Editar</button>
							<button type="reset" class="btn btn-warning">Borrar</button>
						</div>
					</form>
				</div>
				
				
			</div>
			
			
		</div>
	</div>
		
	</div>
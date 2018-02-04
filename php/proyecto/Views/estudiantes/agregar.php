<div class="box-principal">
<h3 class="titulo"> Agregar Estudiante<hr></h3>
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title">Agregar un nuevo Estudiante</h3>
			
		</div>
		<div class="panel-body">
			<div clas="row">
				<div class="col-md-1"></div>

				<div class="col-md-10">
					<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label for="inputEmail" class="control-label">Nombre del estudiante</label>
							<input class="form-control" name="nombre" type="text" required/>
						</div>
						<div class="form-group">
							<label for="inputEmail" class="control-label">Edad</label>
							<input class="form-control" name="edad" type="number" required/>
						</div>
						<div class="form-group">
							<label for="inputEmail" class="control-label">Promedio</label>
							<input class="form-control" name="promedio" type="number" required/>
						</div>
						<div class="form-group">
							<label for="inputEmail" class="control-label">Seccion</label>
							<select name="id_seccion" class="form-control">
								<?php foreach ($datos as $Secciones) {?>
									<option value="<?php echo $Secciones->id;?>"><?php echo $Secciones->nombre;?></option>
								<?php }?>
							</select>
						</div>
						<div class="form-group">
							<label for="inputEmail" class="control-label">Imagen</label>
							<input class="form-control" name="imagen" type="file" required/>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success">Registrar</button>
							<button type="reset" class="btn btn-warning">Borrar</button>
						</div>
					</form>
				</div>
				<div class="col-md-1"></div>
				
			</div>
			
			
		</div>
	</div>
		
	</div>
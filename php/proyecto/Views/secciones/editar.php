<div class="box-principal">
<h3 class="titulo"> Editar Seccion<hr></h3>
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title">editar una Seccion</h3>
			
		</div>
		
		<div class="panel-body">
			<div clas="row">
			
				
				<div class="col-md-1">
				
			
					
				</div>

				<div class="col-md-10">
					<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
					<?php foreach ($datos as $Seccion) {?>
						<div class="form-group">
							<label for="inputEmail" class="control-label">Nombre del seccion</label>
							<input class="form-control" name="nombre" type="text" value="<?php echo $Seccion->nombre;?>" required/>
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
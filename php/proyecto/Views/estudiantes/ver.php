<div class="box-principal">
<?php foreach ($datos as $Estudiante) {?>
<h3 class="titulo">Estudiante <?php echo $Estudiante->nombre;?><hr></h3>
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title">Perfil de Estudiante <?php echo $Estudiante->nombre;?></h3>
			
		</div>
		<div class="panel-body">
			<div clas="row">
			
				
				<div class="col-md-3">
				
					<div class="panel panel-default">
						<div class="panel-body">
							<img class="img-responsive" src="<?php echo URL;?>Views/template/imagenes/avatars/<?php echo $Estudiante->imagen;?>">
						</div>
					</div>
					
				</div>

				<div class="col-md-9">
					<ul class="list-group">
						<li class="list-group-item">
							<label><b>Nombre:</b> <?php echo $Estudiante->nombre;?></label>
						</li>
						<li class="list-group-item">
							<label><b>Edad:</b> <?php echo $Estudiante->edad;?></label>
						</li>
						<li class="list-group-item">
							<label><b>Promedio:</b><?php echo $Estudiante->promedio;?></label>
						</li>
						<li class="list-group-item">
							<label><b>Sección:</b><?php echo $Estudiante->seccion_nombre;?></label>
						</li>
						<li class="list-group-item">
							<label><b>Fecha de registro:</b><?php echo $Estudiante->fecha;?></label>
						</li>
					</ul>					
				</div>
				
				
				
			</div>
			
			
		</div>
	</div>
		<?php }?>
	</div>
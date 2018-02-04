<?php 
use Config\session_expired as session_expired;
if (isset($_SESSION['nombre'])) {
	if (isset($_SESSION['ultimoingreso'])) {
		$session_expired=new session_expired();
		$session_expired->comprobar();
	}else{
		$_SESSION['ultimoingreso']=date("Y-n-j H:i:s");
	}
	
	?>
	 <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Administrar Producto</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="<?php echo URL?>">Inicio</a>
                    </li>
                   <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Producto</a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?php echo URL?>producto">Listado</a></li>
                                <li><a href="<?php echo URL?>producto/agregar">Agregar</a></li>
                            </ul>                            
                    </li>                   
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Fconsulting</a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#"><b>Usuario:</b><?php echo $_SESSION['nombre'];?></a></li>
                                <li><a href="<?php echo URL?>login/logout">Cerrar Sesionn</a></li>
                            </ul>                            
                    </li>                                        
                    </ul>
            </div>

        </div>

    </nav>
    <div class="container">
    	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title">Listado de estudiantes</h3>
			
		</div>

		<div class="panel-body">
			<table class="table table-striped tablet-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Categorias</th>
						<th>Nombres</th>
						<th>Stock</th>
						<th>Fecha de ingreso</th>
						
						<th>Accion</th>
					</tr>
				</thead>
				<tbody>
					
					<?php 
					
					foreach($result as $producto) {?>
					<tr>
						<td><?php echo $producto->id;?></td>
						<td><?php echo $producto->categoria;?></td>
						<td><?php echo $producto->nombre;?></td>						
						<td><?php echo $producto->stock;?></td>
						<td><?php echo $producto->fecha_ingreso;?></td>
						<td>
						<a class="btn btn-warning" href="<?php echo URL;?>producto/editar/<?php echo $producto->id?>">Editar</a>
						<a class="btn btn-danger" href="<?php echo URL;?>producto/eliminar/<?php echo $producto->id?>">Eliminar</a>
						</td>
					</tr>
					<?php }?>
						
					
				</tbody>
				
			</table>
			
		</div>
	</div>
    </div>
<?php }
else{
	header("location:".URL);
}
?> 	
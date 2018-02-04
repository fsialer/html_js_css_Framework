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
                        <a href="#">Inicio</a>
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
	<div class="box-principal">
<h3 class="titulo"> Editar Producto<hr></h3>
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title">Editar un Producto</h3>
			
		</div>
		<div class="panel-body">
			<div clas="row">
			<?php foreach ($result as $producto) {?>
				<div class="col-md-1"></div>

				<div class="col-md-10">
					<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
						
						<div class="form-group">
							<label for="inputEmail" class="control-label">Categoria</label>
							<select name="categoria" class="form-control">	
									<option value="">-- Seleccione una categoria</option>								
									<option value="bebidas">bebidas</option>	
									<option value="lacteos">lacteos</option>							
							</select>
						</div>
						<div class="form-group">
							<label for="inputEmail" class="control-label">Nombre del producto</label>
							<input class="form-control" value="<?php echo $producto->nombre;?>" name="nombre" type="text" required/>
						</div>
						<div class="form-group">
							<label for="inputEmail" class="control-label">Stock</label>
							<input class="form-control" name="stock" value="<?php echo $producto->stock;?>" type="number" required/>
						</div>
						<div class="form-group">
							<label for="inputEmail" class="control-label">Fecha de ingreso</label>
							<input class="form-control" name="fecha_ingreso" value="<?php echo $producto->fecha_ingreso;?>" type="date" required/>
						</div>
							<?php }?>
						<div class="form-group">
							<button type="submit" class="btn btn-success">Editar</button>
							<button type="reset" class="btn btn-warning">Borrar</button>
						</div>
					</form>
				</div>
				<div class="col-md-1"></div>
				
			</div>
			
			
		</div>
	</div>
		
	</div>
</div>
<?php }
else{
	header("location:".URL);
}
?> 

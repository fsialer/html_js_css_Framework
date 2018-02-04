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

   
<?php }else{?>

    <section id="content-login" class="container">
    <section class="col-md-4 col-md-offset-4 panel panel-primary" id="content-panel">
        <form action="" name="login" method="POST">
            <div id="title" class=" col-md-offset-5 form-group page-header">
                    <h2>Login</h2>
                </div>
                <div class="form-group input-group">
                    <label for="input-login" class="input-group-addon"><i class="glyphicon glyphicon-user"></i></label> 
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Usuario" required>
                </div>
                <div class="form-group input-group">
                    <label for="input-pass" class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></label>
                    <input type="password" class="form-control" name="clave" id="c" placeholder="Contraseña" required>
                </div>  
                <div class="form-group">
                    <input type="submit" class="form-control btn btn-primary" id="" value="Entrar">
                </div>              
                <div class="form-group">
                    <a ui-sref="recuperar">¿Olvidastes tu contraseña?</a>
                </div>  
        </form>

    </section>
</section>
  <?php  }?>



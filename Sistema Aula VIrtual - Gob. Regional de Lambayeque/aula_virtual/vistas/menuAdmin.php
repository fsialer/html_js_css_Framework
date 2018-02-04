<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
//error_reporting(0);
//ini_set('display_errors', 0);
if (!(isset($_SESSION['usuario']) && isset($_SESSION['clave']))) {
    header("location:../index.php");
    exit();
}
include 'clases/capacitacion.php';
include 'clases/grupo.php';
//include 'clases/datos_user.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

    </head>
    <body>
        <?php
        ?>
        <nav>
            <ul class="nav nav-tabs " id="myTab">
                <?php
                if ($_GET['alert'] == 0) {
                    ?>
                    <li class="active"><a href="#dat_pers" data-toggle="tab">Datos Generales</a></li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Administracion Académica <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#doc" data-toggle="tab">Docentes</a></li>
                            <li><a href="#capac" data-toggle="tab">Capacitaciones</a></li>
                            <li><a href="#grup" data-toggle="tab">Grupos</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Administracion de Sistema <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#admin" data-toggle="tab">Usuario</a></li>                       
                        </ul>
                    </li>
                    <li><a href="#hacer_bak" data-toggle="tab">Backup</a></li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Reportes <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#usu_cat" data-toggle="tab">Usuario por Categoria</a></li>
                            <li><a href="#cap_fecha" data-toggle="tab">Capacitacion Por Fecha</a></li>
                            <li><a href="#inscrip_fecha" data-toggle="tab">Cantidad de inscripcion por Fecha</a></li>
                            <li><a href="#asist_fecha" data-toggle="tab">Cantidad de Asistencia por Fecha</a></li>
                              <li><a href="#cant_apro" data-toggle="tab">Cantidad de Aprobados por Capacitacion y Fecha</a></li>
                        </ul>
                    </li>
                    <li><a href="procesar/logout.php">Cerrar Sesion</a></li>
                    <?php
                    $activo = "active";
                }
                ?>
                <?php
                if ($_GET['alert'] == 1) {
                    ?>
                    <li class=""><a href="#dat_pers" data-toggle="tab">Datos Generales</a></li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Administracion Académica <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#doc" data-toggle="tab">Docentes</a></li>
                            <li><a href="#capac" data-toggle="tab">Capacitaciones</a></li>
                            <li><a href="#grup" data-toggle="tab">Grupos</a></li>
                        </ul>
                    </li>
                    <li class="dropdown active">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Administracion de Sistema <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#admin" data-toggle="tab">Usuario</a></li>                       
                        </ul>
                    </li>
                    <li><a href="#hacer_bak" data-toggle="tab">Backup</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Reportes <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#usu_cat" data-toggle="tab">Usuario por Categoria</a></li>
                            <li><a href="#cap_fecha" data-toggle="tab">Cantidad de Capacitaciones</a></li>
                             <li><a href="#inscrip_fecha" data-toggle="tab">Cantidad de inscripcion por fecha</a></li>
                        <li><a href="#asist_fecha" data-toggle="tab">Cantidad de Asistencia por Fecha</a></li>
                          <li><a href="#cant_apro" data-toggle="tab">Cantidad de Aprobados por Capacitacion y Fecha</a></li>
                        </ul>
                    </li>
                    <li><a href="procesar/logout.php">Cerrar Sesion</a></li>
                    <?php
                    $activo = "";
                    $activo2 = "active";
                }
                ?>

                <?php
                if ($_GET['alert'] == 2) {
                    ?>
                    <li class=""><a href="#dat_pers" data-toggle="tab">Datos Generales</a></li>

                    <li class="dropdown active">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Administracion Académica <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu ">
                            <li><a href="#doc" data-toggle="tab">Docentes</a></li>
                            <li><a href="#capac" data-toggle="tab">Capacitaciones</a></li>
                            <li><a href="#grup" data-toggle="tab">Grupos</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Administracion de Sistema <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#admin" data-toggle="tab">Usuario</a></li>                       
                        </ul>
                    </li>
                    <li><a href="#hacer_bak" data-toggle="tab">Backup</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Reportes <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#usu_cat" data-toggle="tab">Usuario por Categoria</a></li>
                            <li><a href="#cap_fecha" data-toggle="tab">Cantidad de Capacitaciones</a></li>
                              <li><a href="#inscrip_fecha" data-toggle="tab">Cantidad de inscripcion por fecha</a></li>
                              <li><a href="#asist_fecha" data-toggle="tab">Cantidad de Asistencia por Fecha</a></li>
                                <li><a href="#cant_apro" data-toggle="tab">Cantidad de Aprobados por Capacitacion y Fecha</a></li>
                        </ul>
                    </li>
                    <li><a href="procesar/logout.php">Cerrar Sesion</a></li>
                    <?php
                    $activo = "";
                    $activo2 = "";
                    $activo3 = "active";
                }
                ?>

                <?php
                if ($_GET['alert'] == 3) {
                    ?>
                    <li class=""><a href="#dat_pers" data-toggle="tab">Datos Generales</a></li>

                    <li class="dropdown active">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Administracion Académica <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#doc" data-toggle="tab">Docentes</a></li>
                            <li><a href="#capac" data-toggle="tab">Capacitaciones</a></li>
                            <li><a href="#grup" data-toggle="tab">Grupos</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Administracion de Sistema <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#admin" data-toggle="tab">Usuario</a></li>                       
                        </ul>
                    </li>
                    <li><a href="#hacer_bak" data-toggle="tab">Backup</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Reportes <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#usu_cat" data-toggle="tab">Usuario por Categoria</a></li>
                            <li><a href="#cap_fecha" data-toggle="tab">Cantidad de Capacitaciones</a></li>
                        <li><a href="#inscrip_fecha" data-toggle="tab">Cantidad de inscripcion por fecha</a></li>
                        <li><a href="#asist_fecha" data-toggle="tab">Cantidad de Asistencia por Fecha</a></li>
                         <li><a href="#cant_apro" data-toggle="tab">Cantidad de Aprobados por Capacitacion y Fecha</a></li>
                        </ul>
                    </li>
                    <li><a href="procesar/logout.php">Cerrar Sesion</a></li>
                    <?php
                    $activo = "";
                    $activo2 = "";
                    $activo3 = "";
                    $activo4 = "active";
                }
                ?>
                <?php
                if ($_GET['alert'] == 4) {
                    ?>
                    <li class=""><a href="#dat_pers" data-toggle="tab">Datos Generales</a></li>

                    <li class="dropdown active">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Administracion Académica <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu active">
                            <li><a href="#doc" data-toggle="tab">Docentes</a></li>
                            <li><a href="#capac" data-toggle="tab">Capacitaciones</a></li>
                            <li><a href="#grup" data-toggle="tab" >Grupos</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Administracion de Sistema <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#admin" data-toggle="tab">Usuario</a></li>                       
                        </ul>
                    </li>
                    <li><a href="#hacer_bak" data-toggle="tab">Backup</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Reportes <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#usu_cat" data-toggle="tab">Usuario por Categoria</a></li>
                            <li><a href="#cap_fecha" data-toggle="tab">Cantidad de Capacitaciones</a></li>
  <li><a href="#inscrip_fecha" data-toggle="tab">Cantidad de inscripcion por fecha</a></li>
  <li><a href="#asist_fecha" data-toggle="tab">Cantidad de Asistencia por Fecha</a></li>
    <li><a href="#cant_apro" data-toggle="tab">Cantidad de Aprobados por Capacitacion y Fecha</a></li>
                        </ul>
                    </li>
                    <li><a href="procesar/logout.php">Cerrar Sesion</a></li>
                    <?php
                    $activo = "";
                    $activo2 = "";
                    $activo3 = "";
                    $activo4 = "";
                    $activo5 = "active";
                }
                ?>
                <?php
                if ($_GET['alert'] == 5) {
                    ?>
                    <li class=""><a href="#dat_pers" data-toggle="tab">Datos Generales</a></li>

                    <li class="dropdown ">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Administracion Académica <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu active">
                            <li><a href="#doc" data-toggle="tab">Docentes</a></li>
                            <li><a href="#capac" data-toggle="tab">Capacitaciones</a></li>
                            <li><a href="#grup" data-toggle="tab" >Grupos</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Administracion de Sistema <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#admin" data-toggle="tab">Usuario</a></li>                       
                        </ul>
                    </li>
                    <li class="active"><a href="#hacer_bak" data-toggle="tab">Backup</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Reportes <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#usu_cat" data-toggle="tab">Usuario por Categoria</a></li>
                            <li><a href="#cap_fecha" data-toggle="tab">Capacitacion por Fecha</a></li>
                            <li><a href="#inscrip_fecha" data-toggle="tab">Cantidad de inscripcion por fecha</a></li>
                            <li><a href="#asist_fecha" data-toggle="tab">Cantidad de Asistencia por Fecha</a></li>
                              <li><a href="#cant_apro" data-toggle="tab">Cantidad de Aprobados por Capacitacion y Fecha</a></li>
                        </ul>
                    </li>
                    <li><a href="procesar/logout.php">Cerrar Sesion</a></li>
                    <?php
                    $activo = "";
                    $activo2 = "";
                    $activo3 = "";
                    $activo4 = "";
                    $activo5 = "";
                    $activo6 = "active";
                }
                ?>


            </ul>
        </nav>      


        <!-- Tab panes -->
        <section class="container-fluid">
            <div class="tab-content">
                <div class="tab-pane <?php echo $activo; ?>" id="dat_pers">
                    <div class="row">
                        <div class="col-md-3 col-lg-3">                        
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3>Datos Personales</h3>
                                </div>
                                <div class="panel-body">
                                    <dl class="dl-horizontal">
                                        <?php
                                        $objDatos_user = new datos_user();
                                        $result = $objDatos_user->listarDatos($_SESSION['usuario']);
                                        foreach ($result as $datos_user) {
                                            ?>
                                            <dt>Nombres: </dt>
                                            <dd><?php echo "$datos_user->nom_user"; ?></dd>
                                            <dt>Apellido: </dt>
                                            <dd><?php echo "$datos_user->ape_user"; ?></dd>
                                            <dt>Direccion: </dt>
                                            <dd><?php echo "$datos_user->dir_user"; ?></dd>
                                            <dt>Email: </dt>
                                            <dd><?php echo "$datos_user->email_user"; ?></dd>
                                            <dt>Celular: </dt>
                                            <dd><?php echo "$datos_user->tc_user"; ?></dd>
                                        <?php }
                                        ?>
                                    </dl>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-3 col-lg-3">                        
                        </div>
                    </div>
                </div>
                <div class="tab-pane <?php echo $activo2; ?>" id="admin">
                    <div class="row">
                        <div class="col-md-2 col-lg-2">                        
                        </div>
                        <div class="col-md-8 col-lg-8">     

                            <a href="#reg_admin" data-toggle="tab" class="btn btn-default">Registrar</a>
                            <?php
                            if ($_GET['mensaje'] == 0) {
                                $msg = '';
                            } else
                            if ($_GET['mensaje'] == 1) {
                                $msg = 'El registro se realizo exitosamente.';
                                echo "  <div class='alert alert-info alert-dismissible' role='alert'>  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button> $msg </div>";
                            } else
                            if ($_GET['mensaje'] == 2) {
                                $msg = 'El registro no se guardo con exito.';
                                echo "  <div class='alert alert-danger alert-dismissible' role='alert'>  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button> $msg </div>";
                            } else
                            if ($_GET['mensaje'] == 3) {
                                $msg = 'El registro se elimino correctamente!!';
                                echo "  <div class='alert alert-info alert-dismissible' role='alert'>  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button> $msg </div>";
                            } else
                            if ($_GET['mensaje'] == 4) {
                                $msg = 'El registro se no se elimino correctamente!!';
                                echo "  <div class='alert alert-danger alert-dismissible' role='alert'>  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button> $msg </div>";
                            }
                            ?>
                        </div>
                        <div class="col-md-2 col-lg-2">

                        </div> 
                    </div>
                    <div class="row"> 



                        <div class="col-md-2 col-lg-2">                        
                        </div>
                        <div class="col-md-8 col-lg-8 table-responsive">   

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Direccion</th>
                                        <th>Telefono/Celular</th>
                                        <th>Email</th>
                                        <th>Sexo</th>
                                        <th>DNI</th>                                    
                                        <th>Acciones</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $result9 = $objDatos_user->listarAdmin();
                                    $item4 = 0;
                                    foreach ($result9 as $datos_user) {
                                        $item4++;
                                        ?>
                                        <tr>
                                            <td id="td_key2_<?php echo $item4; ?>" ><?php echo "$datos_user->id_user"; ?></td>
                                            <td id="td_nom2_<?php echo $item4; ?>"><?php echo "$datos_user->nom_user"; ?></td>
                                            <td id="td_ape2_<?php echo $item4; ?>"><?php echo "$datos_user->ape_user"; ?></td>
                                            <td id="td_dir2_<?php echo $item4; ?>"><?php echo "$datos_user->dir_user"; ?></td>
                                            <td id="td_tc2_<?php echo $item4; ?>"><?php echo "$datos_user->tc_user"; ?></td>
                                            <td id="td_email2_<?php echo $item4; ?>"><?php echo "$datos_user->email_user"; ?></td>
                                            <td id="td_sex2_<?php echo $item4; ?>"><?php echo "$datos_user->id_sexo"; ?></td>
                                            <td id="td_dni2_<?php echo $item4; ?>"><?php echo "$datos_user->dni_user"; ?></td>
                                            <td>
                                                <a id="btnActDoc" data-toggle="tab" href='#act_admin' onclick="enviarAdmin(<?php echo $item4; ?>);">Actualizar</a><span> / </span>
                                                <a  href='./procesar/pDatos_user_admin.php?op=2&key3=<?php echo "$datos_user->id_user"; ?>' onclick="return confirmarEliminar('Administrador');">Eliminar</a>
                                            </td>
                                        </tr> 
                                    <?php }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-2 col-lg-2">                        
                        </div>
                    </div>           

                </div>
                <div class="tab-pane" id="reg_admin">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 col-lg-3">
                            </div>
                            <div class="col-md-6 col-lg-6"> 
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h3>Registrar Administrador</h3>
                                    </div>
                                    <div class="panel-body">

                                        <form role="form" method='POST' action="./procesar/pDatos_user_admin.php?op=0&tip=1" name="for_registrar">

                                            <div class="form-group col-md-6 col-lg-6">
                                                <label for="txtNombre2">Nombres: </label>
                                                <input type="text" class="form-control" value="" name="txtNombre2"  placeholder="Ingrese Nombres" required autofocus autocomplete="off">
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6">
                                                <label for="txtApellido2">Apellidos: </label>
                                                <input   type="text" class="form-control" value="" name="txtApellido2" placeholder="Ingrese Apellidos" required autocomplete="off">
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6">
                                                <label for="txtDireccion2">Direccion: </label>
                                                <input  type="text" class="form-control" value="" name="txtDireccion2" placeholder="Ingrese Direccion" required autocomplete="off">
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6">
                                                <label for="txtTelefono2">Telefono/Celular: </label>
                                                <input  type="text" class="form-control" value="" name="txtTelefono2" placeholder="Ingrese Telefono" required autocomplete="off">
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6">
                                                <label for="txtEmail2">Email: </label>
                                                <input  type="email" class="form-control" value="" name="txtEmail2" placeholder="Ingrese Email" required autocomplete="off">
                                            </div>                                
                                            <div class="form-group col-md-6 col-lg-6" >
                                                <label for="cboSexo2">Sexo: </label>
                                                <select class='form-control' name='cboSexo2' required autocomplete="off">
                                                    <?php
                                                    include './clases/datos_user.php';
                                                    $result3 = $objDatos_user->listarSexo();
                                                    foreach ($result3 as $sexo) {
                                                        ?>
                                                        <option value="<?php echo "$sexo->id_sexo"; ?>"><?php echo "$sexo->abreviatura"; ?></option>
                                                    <?php }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6">
                                                <label for="txtDNI2">DNI: </label>
                                                <input  type="text" class="form-control" value="" name="txtDNI2" placeholder="Ingrese DNI" required autocomplete="off">
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6">
                                                <label for="txtClave2">Contraseña:</label>
                                                <input type="password" class="form-control" value="" name="txtClave2" placeholder="Ingrese Contraseña" required autocomplete="off">
                                            </div>
                                            <input  type="submit" value="Registrar" class="btn btn-default " name="btnRegistrar"/>
                                            <a href="#admin" data-toggle="tab" class="btn btn-default">Regresar</a>

                                        </form>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-3 col-lg-3">

                            </div>
                        </div>
                    </div>
                </div>     
                <div class="tab-pane" id="act_admin">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 col-lg-3">
                            </div>
                            <div class="col-md-6 col-lg-6"> 
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h3>Registrar Administrador</h3>
                                    </div>
                                    <div class="panel-body">

                                        <form role="form" method='POST' action="./procesar/pDatos_user_admin.php?op=0&tip=1" name="for_registrar2">
                                            <input type="hidden" name="key4" value="" id="key4"/>
                                            <div class="form-group col-md-6 col-lg-6">
                                                <label for="txtNombre2">Nombres: </label>
                                                <input type="text" class="form-control" value="" name="txtNombre2" id="txtNombre2" placeholder="Ingrese Nombres" autofocus required  autocomplete="off">
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6">
                                                <label for="txtApellido2">Apellidos: </label>
                                                <input  type="text" class="form-control" name="txtApellido2" value="" id="txtApellido2"  placeholder="Ingrese Apellidos" required  autocomplete="off">
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6">
                                                <label for="txtDireccion2">Direccion: </label>
                                                <input  type="text" class="form-control" value=""  name="txtDireccion2" id="txtDireccion2" placeholder="Ingrese Direccion" required  autocomplete="off">
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6">
                                                <label for="txtTelefono2">Telefono/Celular: </label>
                                                <input type="text" class="form-control" value=""  name="txtTelefono2" id="txtTelefono2" placeholder="Ingrese Telefono" required  autocomplete="off">
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6">
                                                <label for="txtEmail2">Email: </label>
                                                <input  type="email" class="form-control" value=""  name="txtEmail2" id="txtEmail2" placeholder="Ingrese Email" required  autocomplete="off">
                                            </div>                                
                                            <div class="form-group col-md-6 col-lg-6" >
                                                <label for="cboSexo2">Sexo: </label>
                                                <select class='form-control' name='cboSexo2' id="cboSexo2">
                                                    <?php
                                                    foreach ($result3 as $sexo) {
                                                        ?>
                                                        <option value="<?php echo "$sexo->id_sexo"; ?>"><?php echo "$sexo->abreviatura"; ?></option>
                                                    <?php }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6">
                                                <label for="txtDNI2">DNI: </label>
                                                <input  type="text" class="form-control" value="" name="txtDNI2" id="txtDNI2" placeholder="Ingrese DNI" required  autocomplete="off">
                                            </div>   
                                            <div class="form-group col-md-12 col-lg-12">
                                                <input  type="submit" value="Registrar" class="btn btn-default " name="btnRegistrar"/>
                                                <a href="#admin" data-toggle="tab" class="btn btn-default">Regresar</a>
                                            </div> 


                                        </form>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-3 col-lg-3">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane <?php echo $activo3; ?>" id="doc">
                    <div class="row">
                        <div class="col-md-2 col-lg-2">                        
                        </div>
                        <div class="col-md-8 col-lg-8">     

                            <a href="#reg_doc" data-toggle="tab" class="btn btn-default">Registrar</a>
                            <?php
                            if ($_GET['mensaje2'] == 0) {
                                $msg2 = '';
                            } else
                            if ($_GET['mensaje2'] == 1) {
                                $msg2 = 'El registro se realizo exitosamente.';
                                echo "  <div class='alert alert-info alert-dismissible' role='alert'>  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button> $msg2 </div>";
                            } else
                            if ($_GET['mensaje2'] == 2) {
                                $msg2 = 'El registro no se guardo con exito.';
                                echo "  <div class='alert alert-danger alert-dismissible' role='alert'>  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button> $msg2 </div>";
                            } else
                            if ($_GET['mensaje2'] == 3) {
                                $msg2 = 'El registro se elimino correctamente!!';
                                echo "  <div class='alert alert-info alert-dismissible' role='alert'>  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button> $msg2 </div>";
                            } else
                            if ($_GET['mensaje2'] == 4) {
                                $msg2 = 'El registro se no se elimino correctamente!!';
                                echo "  <div class='alert alert-danger alert-dismissible' role='alert'>  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button> $msg2 </div>";
                            }
                            ?>
                        </div>
                        <div class="col-md-2 col-lg-2">

                        </div> 
                    </div>
                    <div class="row">                   

                        <div class="col-md-2 col-lg-2">                        
                        </div>
                        <div class="col-md-8 col-lg-8 table-responsive">   

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Direccion</th>
                                        <th>Telefono/Celular</th>
                                        <th>Email</th>
                                        <th>Sexo</th>
                                        <th>DNI</th>                                    
                                        <th>Acciones</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $result2 = $objDatos_user->listar();
                                    $item = 0;
                                    foreach ($result2 as $datos_user) {
                                        $item++;
                                        ?>
                                        <tr>
                                            <td id="td_key_<?php echo $item; ?>" ><?php echo "$datos_user->id_user"; ?></td>
                                            <td id="td_nom_<?php echo $item; ?>"><?php echo "$datos_user->nom_user"; ?></td>
                                            <td id="td_ape_<?php echo $item; ?>"><?php echo "$datos_user->ape_user"; ?></td>
                                            <td id="td_dir_<?php echo $item; ?>"><?php echo "$datos_user->dir_user"; ?></td>
                                            <td id="td_tc_<?php echo $item; ?>"><?php echo "$datos_user->tc_user"; ?></td>
                                            <td id="td_email_<?php echo $item; ?>"><?php echo "$datos_user->email_user"; ?></td>
                                            <td id="td_sex_<?php echo $item; ?>"><?php echo "$datos_user->id_sexo"; ?></td>
                                            <td id="td_dni_<?php echo $item; ?>"><?php echo "$datos_user->dni_user"; ?></td>

                                            <td>
                                                <a id="btnActDoc" data-toggle="tab" href='vistas#act_doc' onclick="plasmar(<?php echo $item; ?>);">Actualizar</a><span> / </span>
                                                <a  href='./procesar/pDatos_user.php?op=2&key2=<?php echo "$datos_user->id_user"; ?>' onclick="return confirmarEliminar('Docente');">Eliminar</a>
                                            </td>
                                        </tr> 
                                    <?php }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-2 col-lg-2">                        
                        </div>
                    </div>           

                </div>
                <div class="tab-pane" id="reg_doc">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 col-lg-3">
                            </div>
                            <div class="col-md-6 col-lg-6"> 
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h3>Registrar Docente</h3>
                                    </div>
                                    <div class="panel-body">

                                        <form role="form" method='POST' action="./procesar/pDatos_user.php?op=0&tip=3" name="for_registrar">

                                            <div class="form-group col-md-6 col-lg-6">
                                                <label for="txtNombre">Nombres: </label>
                                                <input type="text" class="form-control" value="" name="txtNombre"  placeholder="Ingrese Nombres" required autocomplete="off" autofocus >
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6">
                                                <label for="txtApellido">Apellidos: </label>
                                                <input   type="text" class="form-control" value="" name="txtApellido" placeholder="Ingrese Apellidos" required autocomplete="off">
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6">
                                                <label for="txtDireccion">Direccion: </label>
                                                <input  type="text" class="form-control" value="" name="txtDireccion" placeholder="Ingrese Direccion" required autocomplete="off">
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6">
                                                <label for="txtTelefono">Telefono/Celular: </label>
                                                <input  type="text" class="form-control" value="" name="txtTelefono" placeholder="Ingrese Telefono" required autocomplete="off">
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6">
                                                <label for="txtEmail">Email: </label>
                                                <input  type="email" class="form-control" value="" name="txtEmail" placeholder="Ingrese Email" required autocomplete="off">
                                            </div>                                
                                            <div class="form-group col-md-6 col-lg-6" >
                                                <label for="cboSexo">Sexo: </label>
                                                <select class='form-control' name='cboSexo' >
                                                    <?php
                                                    foreach ($result3 as $sexo) {
                                                        ?>
                                                        <option value="<?php echo "$sexo->id_sexo"; ?>"><?php echo "$sexo->abreviatura"; ?></option>
                                                    <?php }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6">
                                                <label for="txtDNI">DNI: </label>
                                                <input  type="text" class="form-control" value="" name="txtDNI" placeholder="Ingrese DNI" required autocomplete="off">
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6">
                                                <label for="txtClave">Contraseña:</label>
                                                <input type="password" class="form-control" value="" name="txtClave" placeholder="Ingrese Contraseña" required autocomplete="off">
                                            </div>
                                            <input  type="submit" value="Registrar" class="btn btn-default " name="btnRegistrar"/>
                                            <a href="../vistas/menuAdmin.php#doc" data-toggle="tab" class="btn btn-default">Regresar</a>

                                        </form>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-3 col-lg-3">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="act_doc">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 col-lg-3">
                            </div>
                            <div class="col-md-6 col-lg-6"> 
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h3>Registrar Docente</h3>
                                    </div>
                                    <div class="panel-body">

                                        <form role="form" method='POST' action="./procesar/pDatos_user.php?op=0&tip=3" name="for_registrar">
                                            <input type="hidden" name="key" value="" id="key"/>
                                            <div class="form-group col-md-6 col-lg-6">
                                                <label for="txtNombre">Nombres: </label>
                                                <input type="text" class="form-control" value="" name="txtNombre" id="txtNombre" placeholder="Ingrese Nombres" required autocomplete="off" autofocus>
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6">
                                                <label for="txtApellido">Apellidos: </label>
                                                <input   type="text" class="form-control" value=""  name="txtApellido" id="txtApellido" placeholder="Ingrese Apellidos" required autocomplete="off">
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6">
                                                <label for="txtDireccion">Direccion: </label>
                                                <input  type="text" class="form-control" value=""  name="txtDireccion" id="txtDireccion"placeholder="Ingrese Direccion" required autocomplete="off">
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6">
                                                <label for="txtTelefono">Telefono/Celular: </label>
                                                <input  type="text" class="form-control" value="" name="txtTelefono" id="txtTelefono"  placeholder="Ingrese Telefono" required autocomplete="off">
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6">
                                                <label for="txtEmail">Email: </label>
                                                <input type="email" class="form-control" value=""  name="txtEmail" id="txtEmail" placeholder="Ingrese Email" required autocomplete="off">
                                            </div>                                
                                            <div class="form-group col-md-6 col-lg-6" >
                                                <label for="cboSexo">Sexo: </label>
                                                <select class='form-control' name='cboSexo' id="cboSexo">
                                                    <?php
                                                    foreach ($result3 as $sexo) {
                                                        ?>
                                                        <option value="<?php echo "$sexo->id_sexo"; ?>"><?php echo "$sexo->abreviatura"; ?></option>
                                                    <?php }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6">
                                                <label for="txtDNI">DNI: </label>
                                                <input  type="text" class="form-control" value="" name="txtDNI" id="txtDNI" placeholder="Ingrese DNI" required autocomplete="off">
                                            </div>   
                                            <div class="form-group col-md-12 col-lg-12">
                                                <input  type="submit" value="Registrar" class="btn btn-default " name="btnRegistrar"/>
                                                <a href="vistas/menuAdmin.php#doc" data-toggle="tab" class="btn btn-default">Regresar</a>
                                            </div> 


                                        </form>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-3 col-lg-3">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane <?php echo $activo4; ?>"  id="capac">
                    <div class="row">
                        <div class="col-md-2 col-lg-2">                        
                        </div>
                        <div class="col-md-8 col-lg-8">     
                            <a href="../vistas/menuAdmin.php#reg_cap" data-toggle="tab" class="btn btn-default">Registrar</a>
                            <?php
                            if ($_GET['mensaje3'] == 0) {
                                $msg3 = '';
                            } else
                            if ($_GET['mensaje3'] == 1) {
                                $msg3 = 'El registro se realizo exitosamente.';
                                echo "  <div class='alert alert-info alert-dismissible' role='alert'>  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button> $msg3 </div>";
                            } else
                            if ($_GET['mensaje3'] == 2) {
                                $msg3 = 'El registro no se guardo con exito.';
                                echo "  <div class='alert alert-danger alert-dismissible' role='alert'>  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button> $msg3 </div>";
                            } else
                            if ($_GET['mensaje3'] == 3) {
                                $msg3 = 'El registro se elimino correctamente!!';
                                echo "  <div class='alert alert-info alert-dismissible' role='alert'>  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button> $msg3 </div>";
                            } else
                            if ($_GET['mensaje3'] == 4) {
                                $msg3 = 'El registro se no se elimino correctamente!!';
                                echo "  <div class='alert alert-danger alert-dismissible' role='alert'>  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button> $msg3 </div>";
                            }
                            ?>
                        </div>
                        <div class="col-md-2 col-lg-2">

                        </div> 
                    </div>
                    <div class="row">                   

                        <div class="col-md-1 col-lg-1">                        
                        </div>
                        <div class="col-md-10 col-lg-10 table-responsive">   

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Capacitacion</th>
                                        <th>Lugar</th>
                                        <th>Fecha Inicio</th>
                                        <th>Fecha Inicio</th>
                                        <th>Descripcion</th>
                                        <th>Docente</th>

                                        <th>Acciones</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $objCap = new capacitacion();
                                    $result5 = $objCap->listarDatos();
                                    $item2 = 0;
                                    foreach ($result5 as $capacitacion) {
                                        $item2++;
                                        ?>

                                        <tr>
                                            <td id="td_idcap_<?php echo $item2; ?>"><?php echo "$capacitacion->id_cap"; ?></td>
                                            <td id="td_nomCap_<?php echo $item2; ?>"><?php echo "$capacitacion->nom_cap"; ?></td>
                                            <td id="td_lug_<?php echo $item2; ?>"><?php echo "$capacitacion->lugar_cap"; ?></td>
                                            <td id="td_fechai_<?php echo $item2; ?>"><?php echo "$capacitacion->fechaini_cap"; ?></td>
                                            <td id="td_fechaf_<?php echo $item2; ?>"><?php echo "$capacitacion->fechafin_cap"; ?></td>
                                            <td id="td_desc_<?php echo $item2; ?>"><?php echo "$capacitacion->descrip_cap"; ?></td>
                                <input type="hidden" name="td_id_user_<?php echo $item2;?>" id="td_id_user_<?php echo $item2;?>" value="<?php echo "$capacitacion->id_user"; ?>">
                                            <td id="td_nomUser_<?php echo $item2; ?>"><?php echo "$capacitacion->nom_user $capacitacion->ape_user"; ?></td>

                                            <td>
                                                <a  id="btnPublicar" href='procesar/pPublicarCap.php?id_cap=<?php echo $capacitacion->id_cap; ?>'>Publicar</a><span> / </span>
                                                <a  id="btnActCap" data-toggle="tab" href='vistas#reg_cap' onclick="plasmar2(<?php echo $item2; ?>);">Actualizar</a><span> / </span>
                                                <a href='./procesar/pCapacitacion.php?op=1&key2=<?php echo "$capacitacion->id_cap"; ?>' onclick="return confirmarEliminar('Capacitacion');">Eliminar</a>
                                            </td>
                                        </tr> 
                                    <?php }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-1 col-lg-1">                        
                        </div>
                    </div>   
                    <div class="row">                   

                        <div class="col-md-1 col-lg-1">                        
                        </div>
                        <div class="col-md-10 col-lg-10 table-responsive">   

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Capacitacion</th>
                                        <th>Lugar</th>
                                        <th>Fecha Inicio</th>
                                        <th>Fecha Inicio</th>
                                        <th>Descripcion</th>
                                        <th>Docente</th>

                                        <th>Acciones</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $objCap2 = new capacitacion();
                                    $result25 = $objCap2->listarDatos2();
                                    $item10 = 0;
                                    foreach ($result25 as $capacitacion) {
                                        $item10++;
                                        ?>

                                        <tr>
                                            <td id="td_idcap_<?php echo $item10; ?>"><?php echo "$capacitacion->id_cap"; ?></td>
                                            <td id="td_nomCap_<?php echo $item10; ?>"><?php echo "$capacitacion->nom_cap"; ?></td>
                                            <td id="td_lug_<?php echo $item10; ?>"><?php echo "$capacitacion->lugar_cap"; ?></td>
                                            <td id="td_fechai_<?php echo $item10; ?>"><?php echo "$capacitacion->fechaini_cap"; ?></td>
                                            <td id="td_fechaf_<?php echo $item10; ?>"><?php echo "$capacitacion->fechafin_cap"; ?></td>
                                            <td id="td_desc_<?php echo $item10; ?>"><?php echo "$capacitacion->descrip_cap"; ?></td>
                                            <td id="td_nomUser_<?php echo $item10; ?>"><?php echo "$capacitacion->id_user"; ?></td>

                                            <td>
                                                <a  id="btnPublicar"  href='procesar/pDesarrolloCap.php?id_cap=<?php echo $capacitacion->id_cap; ?>' >Desarrollo</a><span> / </span>
                                                <a  id="btnActCap" data-toggle="tab" href='vistas#reg_cap' onclick="plasmar2(<?php echo $item10; ?>);">Actualizar</a><span> / </span>
                                                <a href='./procesar/pCapacitacion.php?op=1&key2=<?php echo "$capacitacion->id_cap"; ?>' onclick="return confirmarEliminar('Capacitacion');">Eliminar</a>
                                            </td>
                                        </tr> 
                                    <?php }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-1 col-lg-1">                        
                        </div>
                    </div>  

                </div>
                <div class="tab-pane" id="reg_cap">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 col-lg-3">
                            </div>
                            <div class="col-md-6 col-lg-6"> 
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h3>Registrar Capacitacion</h3>
                                    </div>
                                    <div class="panel-body">
                                        <form role="form" method='POST' action="./procesar/pCapacitacion.php?op=0" name="for_registrar">
                                            <input type="hidden" name="key" value="" id="key2"/>      
                                            <input type="hidden" name="id_pub" value="2" id="id_pub"/>
                                            <div class="form-group ">
                                                <label for="txtCapacitacion">Capacitacion: </label>
                                                <input id="txtCapacitacion" type="text" class="form-control" value="" name="txtCapacitacion" placeholder="Ingrese Capacitacion" required autocomplete="off" autofocus>
                                            </div>
                                            <div class="form-group ">
                                                <label for="txtLugar">Lugar: </label>
                                                <input id="txtLugar" type="text" class="form-control" value="" name="txtLugar" placeholder="Ingrese Capacitacion" required autocomplete="off">
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6">
                                                <label for="txtFechaI">Fecha de Inicio: </label>
                                                <input id="txtFechaI" type="date" class="form-control" value="" name="txtFechaI" required autocomplete="off">
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6">
                                                <label for="txtFechaF">Fecha de Final: </label>
                                                <input id="txtFechaF" type="date" class="form-control" value="" name="txtFechaF" required autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="txtDescp">Descripcion: </label>
                                                <textarea id="txtDescp" class="form-control" rows="3" name="txtDescp" placeholder="Ingrese Descripcion" required autocomplete="off"></textarea>
                                            </div>

                                            <div class="form-group ">
                                                <label for="cboDoc">Docente: </label>
                                                <select id="cboDoc" class="form-control " name="cboDoc">
                                                    <?php
                                                    $result4 = $objDatos_user->listar();
                                                    foreach ($result4 as $datos_user) {
                                                        ?>
                                                        <option value="<?php echo "$datos_user->id_user"; ?>"><?php echo "$datos_user->nom_user $datos_user->ape_user"; ?></option>
                                                    <?php }
                                                    ?>                                              
                                                </select>
                                            </div>

                                            <div class="form-group col-md-12 col-lg-12">
                                                <input  type="submit" value="Registrar" class="btn btn-default " name="btnRegistrar"/>
                                                <a href="../vistas/menuAdmin.php#capac" data-toggle="tab" class="btn btn-default">Regresar</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-3 col-lg-3">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane <?php echo $activo5; ?>" id="grup">

                    <div class="row">
                        <div class="col-md-2 col-lg-2">                        
                        </div>
                        <div class="col-md-8 col-lg-8">     
                            <a href="../vistas/menuAdmin.php#reg_grup" data-toggle="tab" class="btn btn-default">Registrar</a>
                            <?php
                            if ($_GET['mensaje4'] == 0) {
                                $msg4 = '';
                            } else
                            if ($_GET['mensaje4'] == 1) {
                                $msg4 = 'El registro se realizo exitosamente.';
                                echo "  <div class='alert alert-info alert-dismissible' role='alert'>  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button> $msg4 </div>";
                            } else
                            if ($_GET['mensaje4'] == 2) {
                                $msg4 = 'El registro no se guardo con exito.';
                                echo "  <div class='alert alert-danger alert-dismissible' role='alert'>  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button> $msg4 </div>";
                            } else
                            if ($_GET['mensaje4'] == 3) {
                                $msg4 = 'El registro se elimino correctamente!!';
                                echo "  <div class='alert alert-info alert-dismissible' role='alert'>  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button> $msg4 </div>";
                            } else
                            if ($_GET['mensaje4'] == 4) {
                                $msg4 = 'El registro se no se elimino correctamente!!';
                                echo "  <div class='alert alert-danger alert-dismissible' role='alert'>  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button> $msg4 </div>";
                            }
                            ?>
                        </div>
                        <div class="col-md-2 col-lg-2">

                        </div> 
                    </div>
                    <div class="row">                   

                        <div class="col-md-2 col-lg-2">                        
                        </div>
                        <div class="col-md-8 col-lg-8 table-responsive">   

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Grupo</th>
                                        <th>Hora Inicio</th>
                                        <th>Hora Final</th>
                                        <th>Fecha Asignada</th>
                                        <th>disponibilidad</th>
                                        <th>Capacitacion</th>                                    
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $objGrup = new grupo();
                                    $result7 = $objGrup->listar();
                                    $item3 = 0;
                                    foreach ($result7 as $grupo) {
                                        $item3++;
                                        ?>

                                        <tr>
                                            <td id="td_id_grupo_<?php echo $item3; ?>"><?php echo "$grupo->id_grupo"; ?></td>
                                            <td id="td_descp_<?php echo $item3; ?>"><?php echo "$grupo->descp_grupo"; ?></td>
                                            <td id="td_hi_<?php echo $item3; ?>"><?php echo "$grupo->horaini_grupo"; ?></td>
                                            <td id="td_hf_<?php echo $item3; ?>"><?php echo "$grupo->horafin_grupo"; ?></td>
                                            <td id="td_fech_<?php echo $item3; ?>"><?php echo "$grupo->fecha_grupo"; ?></td>
                                            <td id="td_disp_<?php echo $item3; ?>"><?php echo "$grupo->disp_grupo"; ?></td>
                                <input type="hidden" id="td_id_cap<?php echo $item3;?>" name="td_id_cap<?php echo $item3;?>" value="<?php echo $grupo->id_cap; ?>">
                                            <td id="td_capac_<?php echo $item3; ?>"><?php echo "$grupo->nom_cap"; ?></td>

                                            <td><a  id="btnActGrup" data-toggle="tab" href='vistas#act_grup' onclick="plasmar3(<?php echo $item3; ?>);">Actualizar</a><span> / </span>
                                                <a href='procesar/pGrupo.php?op=1&key2=<?php echo "$grupo->id_grupo"; ?>' onclick="return confirmarEliminar('Grupo');">Eliminar</a>
                                            </td>
                                        </tr> 
                                    <?php }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-2 col-lg-2">                        
                        </div>
                    </div> 
                </div>
                <div class="tab-pane" id="reg_grup">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 col-lg-3">
                            </div>
                            <div class="col-md-6 col-lg-6"> 
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h3>Registrar Grupos</h3>
                                    </div>
                                    <div class="panel-body">
                                        <form role="form" method='POST' action="./procesar/pGrupo.php?op=0" name="for_registrar">
                                            <div class="form-group col-md-6 col-lg-6">
                                                <label for="txtGrupo">Grupo </label>
                                                <input type="text" class="form-control" value="" name="txtGrupo"  placeholder="Ingrese Nombre de grupo" required autocomplete="off" autofocus>
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6">
                                                <label for="txtHoraI">Hora Inicial: </label>
                                                <input type="time" class="form-control" value="" name="txtHoraI" required autocomplete="off">
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6">
                                                <label for="txtHoraF">Hora Final: </label>
                                                <input  type="time" class="form-control" value="" name="txtHoraF" required autocomplete="off">
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6">
                                                <label for="txtFecha">Fecha: </label>
                                                <input type="date" class="form-control" value="" name="txtFecha" required autocomplete="off">
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6">
                                                <label for="txtDisp">Disponibildad: </label>
                                                <input  type="text" class="form-control" value="" name="txtDisp" placeholder="Ingrese Capacidad Maxima" required autocomplete="off">
                                            </div>                                
                                            <div class="form-group col-md-6 col-lg-6" >
                                                <label for="cboCap">Capacitacion: </label>
                                                <select  class='form-control' name='cboCap' >
                                                    <?php
                                                    $result8 = $objCap->listar2();
                                                    foreach ($result8 as $capacitacion) {
                                                        ?>
                                                        <option value="<?php echo "$capacitacion->id_cap"; ?>"><?php echo "$capacitacion->nom_cap"; ?></option>
                                                    <?php }
                                                    ?>
                                                </select>
                                            </div>

                                            <input  type="submit" value="Registrar" class="btn btn-default " name="btnRegistrar"/>
                                            <a href="../vistas/menuAdmin.php#grup" data-toggle="tab" class="btn btn-default">Regresar</a>

                                        </form>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-3 col-lg-3">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="act_grup">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 col-lg-3">
                            </div>
                            <div class="col-md-6 col-lg-6"> 
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h3>Registrar Grupos</h3>
                                    </div>
                                    <div class="panel-body">
                                        <form role="form" method='POST' action="./procesar/pGrupo.php?op=2" name="for_registrar">
                                            <input id="id_grupo" type="hidden"value="" name="id_grupo" >
                                            <div class="form-group col-md-6 col-lg-6">
                                                <label for="txtGrupo">Grupo </label>
                                                <input id="txtGrupo" type="text" class="form-control" value="" name="txtGrupo"  placeholder="Ingrese Nombre de grupo" required autofocus autocomplete="off">
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6">
                                                <label for="txtHoraI">Hora Inicial: </label>
                                                <input id="txtHoraI"  type="time" class="form-control" value="" name="txtHoraI" required autocomplete="off">
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6">
                                                <label for="txtHoraF">Hora Final: </label>
                                                <input id="txtHoraF" type="time" class="form-control" value="" name="txtHoraF" required autocomplete="off">
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6">
                                                <label for="txtFecha">Fecha: </label>
                                                <input id="txtFecha" type="date" class="form-control" value="" name="txtFecha" required autocomplete="off">
                                            </div>
                                            <div class="form-group col-md-6 col-lg-6">
                                                <label for="txtDisp">Disponibildad: </label>
                                                <input id="txtDisp" type="text" class="form-control" value="" name="txtDisp" placeholder="Ingrese Capacidad Maxima" required autocomplete="off">
                                            </div>                                
                                            <div class="form-group col-md-6 col-lg-6" >
                                                <label for="cboCap">Capacitacion: </label>
                                                <select id="cboCap" class='form-control' name='cboCap' required autocomplete="off">
                                                    <?php
                                                    foreach ($result8 as $capacitacion) {
                                                        ?>
                                                        <option value="<?php echo "$capacitacion->id_cap"; ?>"><?php echo "$capacitacion->nom_cap"; ?></option>
                                                    <?php }
                                                    ?>
                                                </select>
                                            </div>

                                            <input  type="submit" value="Registrar" class="btn btn-default " name="btnRegistrar"/>
                                            <a href="../vistas/menuAdmin.php#grup" data-toggle="tab" class="btn btn-default">Regresar</a>

                                        </form>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-3 col-lg-3">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane <?php echo $activo6; ?>" id="hacer_bak">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 col-lg-3">
                            </div>
                            <div class="col-md-6 col-lg-6"> 
                                <div class="panel panel-info">
                                    <?php
                                    if ($_GET['mensaje5'] == 0) {
                                        $msg5 = '';
                                    } else
                                    if ($_GET['mensaje5'] == 1) {
                                        $msg5 = 'El backup de la base de datos se realizo con exito.';
                                        echo "  <div class='alert alert-info alert-dismissible' role='alert'>  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button> $msg5 </div>";
                                    }
                                    ?>
                                    <div class="panel-heading">
                                        <h3>Copia de Seguridad</h3>
                                    </div>
                                    <div class="panel-body">



                                        <form role="form" method='POST' action="./bat/sacar_backup.php" name="for_registrar">
                                            <input  type="submit" value="Realizar backup" class="btn btn-default " name="btnRegistrar"/>
                                        </form>


                                        <!--                                        </form>-->
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-3 col-lg-3">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane <?php echo $activo7; ?>" id="usu_cat">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2 col-lg-2">

                            </div>
                            <div class="col-md-8 col-lg-8">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h3>Usuarios Por Tipo</h3>

                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group col-md-4 col-lg-4" >
                                            <?php
                                            $objDatos_user3 = new datos_user();
                                            $return24 = $objDatos_user3->tipoUsuario();
                                            ?>

                                            <select class="form-control" name="cboTipoUsuario" id="cboTipoUsuario">
                                                <?php foreach ($return24 as $tipo_user) { ?>
                                                    <option value="<?php echo $tipo_user->id_tuser; ?>"><?php echo $tipo_user->nom_tuser ?></option>
                                                <?php }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4 col-lg-4" >
                                            <?php
                                            $return25 = $objDatos_user3->listarSexo();
                                            ?>

                                            <select class="form-control" name="cboTipoSexo" id="cboTipoSexo">
                                                <?php foreach ($return25 as $sexo) { ?>
                                                    <option value="<?php echo $sexo->id_sexo; ?>"><?php echo $sexo->nom_sexo ?></option>
                                                <?php }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4 col-lg-4" >
                                            <input  type="submit" value="Buscar" class="btn btn-default " name="btnBuscarporTipo" id="btnBuscarporTipo"/>
                                        </div>



                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>CODIGO</th>
                                                    <th>NOMBRE COMPLETO</th>
                                                    <th>TELEFONO</th>
                                                    <th>DIRECCION</th> 
                                                    <th>DNI</th>
                                                    <th>EMAIL</th>
                                                </tr>
                                            </thead>
                                            <tbody id="listUsuTipo">

                                            </tbody>


                                        </table>
                                        <div class="form-group col-md-4 col-lg-4" >
                                            <a class="btn btn-default " id="btnReporteUsuTipo" href="#">Generar pdf</a>

                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-lg-2">

                            </div>
                        </div>
                    </div>

                </div>
                <div class="tab-pane <?php echo $activo7; ?>" id="cap_fecha">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2 col-lg-2">

                            </div>
                            <div class="col-md-8 col-lg-8">
                                <div class="panel panel-info">
                                
                                <div class="panel-heading">
                                    <h3>Capacitacion Registradas por intervalos de Fecha</h3>

                                </div>
                                <div class="panel-body">
                                    <div class="form-group col-md-4 col-lg-4" >
                                        <label for="txtFecha">Fecha Inicio: </label>
                                        <input id="txtFechaInicio" type="date" class="form-control" value="" name="txtFechaInicio" required autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-4 col-lg-4" >
                                        <label for="txtFecha">Fecha Final: </label>
                                        <input id="txtFechaFinal" type="date" class="form-control" value="" name="txtFechaFinal" required autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-4 col-lg-4" >
                                        <input  type="submit" value="Buscar" class="btn btn-default " name="btnBuscarCapFecha" id="btnBuscarCapFecha"/>
                                    </div>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>CODIGO</th>
                                                <th>NOMBRE DE LA CAPACITACION</th>
                                                <th>GRUPO</th>                                                
                                                <th>DOCENTE</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody id="listCapFecha">

                                        </tbody>


                                    </table>
                                    <div class="form-group col-md-4 col-lg-4" >
                                        <a class="btn btn-default " id="btnReporteCapFecha" href="#">Generar pdf</a>

                                    </div>

                                </div>
                                    </div>
                            </div>
                            <div class="col-md-2 col-lg-2">

                            </div>
                        </div>
                    </div>
                </div>
                 <div class="tab-pane <?php echo $activo8; ?>" id="inscrip_fecha">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2 col-lg-2">

                            </div>
                            <div class="col-md-8 col-lg-8">
                                <div class="panel panel-info">
                                
                                <div class="panel-heading">
                                    <h3>Cantidad de Inscripcion por Fecha</h3>

                                </div>
                                <div class="panel-body">
                                    <div class="form-group col-md-4 col-lg-4" >
                                        <label for="txtFecha">Fecha Inicio: </label>
                                        <input id="txtFechaInicio2" type="date" class="form-control" value="" name="txtFechaInicio2" required autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-4 col-lg-4" >
                                        <label for="txtFecha">Fecha Final: </label>
                                        <input id="txtFechaFinal2" type="date" class="form-control" value="" name="txtFechaFinal2" required autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-4 col-lg-4" >
                                        <input  type="submit" value="Buscar" class="btn btn-default " name="btnBuscarCantInscr" id="btnBuscarCantInscr"/>
                                    </div>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>CODIGO</th>
                                                <th>NOMBRE DE LA CAPACITACION</th>
                                                <th>GRUPO</th>                                                
                                                <th>CANTIDAD</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody id="listCantInscr">

                                        </tbody>


                                    </table>
                                    <div class="form-group col-md-4 col-lg-4" >
                                        <a class="btn btn-default " id="btnReporteCantInscr" href="#">Generar pdf</a>

                                    </div>

                                </div>
                                    </div>
                            </div>
                            <div class="col-md-2 col-lg-2">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane <?php echo $activo9; ?>" id="asist_fecha">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2 col-lg-2">

                            </div>
                            <div class="col-md-8 col-lg-8">
                                <div class="panel panel-info">
                                
                                <div class="panel-heading">
                                    <h3>Cantidad de Asistencia por Fecha</h3>

                                </div>
                                <div class="panel-body">
                                    <div class="form-group col-md-4 col-lg-4" >
                                        <label for="txtFecha">Fecha Inicio: </label>
                                        <input id="txtFechaInicio3" type="date" class="form-control" value="" name="txtFechaInicio3" required autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-4 col-lg-4" >
                                        <label for="txtFecha">Fecha Final: </label>
                                        <input id="txtFechaFinal3" type="date" class="form-control" value="" name="txtFechaFinal3" required autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-4 col-lg-4" >
                                        <input  type="submit" value="Buscar" class="btn btn-default " name="btnBuscarCantAsist" id="btnBuscarCantAsist"/>
                                    </div>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>CODIGO</th>
                                                <th>NOMBRE DE LA CAPACITACION</th>
                                                <th>GRUPO</th>                                                
                                                <th>CANTIDAD</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody id="listCantAsist2">

                                        </tbody>


                                    </table>
                                    <div class="form-group col-md-4 col-lg-4" >
                                        <a class="btn btn-default " id="btnReporteCantAsist" href="#">Generar pdf</a>

                                    </div>

                                </div>
                                    </div>
                            </div>
                            <div class="col-md-2 col-lg-2">

                            </div>
                        </div>
                    </div>
                </div>
                
                  <div class="tab-pane <?php echo $activo9; ?>" id="cant_apro">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2 col-lg-2">

                            </div>
                            <div class="col-md-8 col-lg-8">
                                <div class="panel panel-info">
                                
                                <div class="panel-heading">
                                    <h3>Cantidad de Aprobados por Capacitacion y Fecha</h3>

                                </div>
                                <div class="panel-body">
                                    <div class="form-group col-md-4 col-lg-4" >
                                        <label for="txtFecha">Fecha Inicio: </label>
                                        <input id="txtFechaInicio4" type="date" class="form-control" value="" name="txtFechaInicio4" required autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-4 col-lg-4" >
                                        <label for="txtFecha">Fecha Final: </label>
                                        <input id="txtFechaFinal4" type="date" class="form-control" value="" name="txtFechaFinal4" required autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-4 col-lg-4" >
                                        <input  type="submit" value="Buscar" class="btn btn-default " name="btnBuscarCantApro" id="btnBuscarCantApro"/>
                                    </div>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>CODIGO</th>
                                                <th>NOMBRE DE LA CAPACITACION</th>
                                                <th>GRUPO</th>                                                
                                                <th>CANTIDAD</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody id="listCantApro">

                                        </tbody>


                                    </table>
                                    <div class="form-group col-md-4 col-lg-4" >
                                        <a class="btn btn-default " id="btnReporteCantApro" href="#">Generar pdf</a>

                                    </div>

                                </div>
                                    </div>
                            </div>
                            <div class="col-md-2 col-lg-2">

                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </section>
    </body>
</html>

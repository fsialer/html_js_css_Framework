<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
if (!(isset($_SESSION['usuario']) && isset($_SESSION['clave']))) {
    header("location:../index.php");
    exit();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript" src="../js/mensajesConfirmacion.js" ></script>
    </head>
    <body>

        <nav>
            <ul class="nav nav-tabs " id="myTab">
               
                    <li class="active"><a href="#dat_pers" data-toggle="tab">Datos Generales</a></li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Administracion Académica <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#curso" data-toggle="tab">Cursos</a></li>
                            <!--
                             <li><a href="#grup" data-toggle="tab">Material</a></li>-->
                        </ul>
                    </li>
                    <li><a href="procesar/logout.php">Cerrar Sesion</a></li>
                  
                   

                </ul>
            </nav>
            <section class="container-fluid">
                <div class="tab-content">
                    <div class="tab-pane active" id="dat_pers">
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
                    <div class="tab-pane" id="curso">
                        <div class="row">                   

                            <div class="col-md-2 col-lg-2">                        
                            </div>
                            <div class="col-md-8 col-lg-8 table-responsive">   
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h3>Capacitaciones Actuales Inscritas</h3>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>id</th>
                                                    <th>Capacitacion</th>
                                                    <th>Grupo</th>
                                                    <th>Accion</th>                                      
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include 'clases/inscripcion.php';
                                                $objInscripcion = new Inscripcion();
                                                $result2 = $objInscripcion->listarInscripcion($_SESSION['usuario']);
                                                $item = 0;
                                                foreach ($result2 as $inscripcion) {
                                                    $item++;
//                                                
                                                    ?>
                                                    <tr>
                                                <input type="hidden" value="<?php echo $item; ?>" name="txt_key" id="txt_key">
                                                <td id="td_id_inscp<?php echo $item; ?>"><?php echo "$inscripcion->id_inscripcion"; ?></td>
                                                <td  id="td_nom_cap_inscp<?php echo $item; ?>"><?php echo "$inscripcion->nom_cap"; ?></td>
                                                <td id="td_desc_grup_inscp<?php echo $item; ?>"><?php echo "$inscripcion->descp_grupo"; ?></td>                                        
                                                <td><a id="btnDetalleCurso" data-toggle="tab" href='vistas#detalle_curso' onclick="enviarInscripcion2(<?php echo $item; ?>);">Seleccionar</a>
                                                </td>
                                                </tr> 
                                            <?php }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-2 col-lg-2">                        
                            </div>
                        </div> 
                    </div>
                    <div class="tab-pane " id="detalle_curso">

                        <ul class="nav nav-tabs " id="myTab">
                        
                            <li class="active"><a href="#det_c" data-toggle="tab">Detalle</a></li>
                            <li><a href="#asist" data-toggle="tab">Asistencia en la capacitacion</a></li>
                            <li><a href="#material_did" data-toggle="tab">Material Didactico</a></li>
                            <li><a href="" data-toggle="tab"></a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    Examen <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#Examenes" data-toggle="tab">Virtual</a></li>

                                    <li><a href="#ExamenesEs" data-toggle="tab">Escrito</a></li>
                                </ul>
                            </li>
                            <li><a href="#env_trab" data-toggle="tab">Envio de Trabajos</a></li>
                            <li><a href="#notas" data-toggle="tab">Notas</a></li>
                            <li><a href="#curso" data-toggle="tab">Regresar</a></li>
                     
                            
                            
                            
                        </ul>
                        <div class="tab-content">
                            <div class="">

                            </div>
                            <div class="tab-pane active" id="det_c">
                                <div class="row">
                                    <div class="col-md-3 col-lg-3"></div>
                                    <div class="col-md-6 col-lg-6" >
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h3>Datos de la Inscripcion</h3>
                                            </div>
                                            <div class="panel-body">
                                                <input type="hidden" name="id_in" id="id_in" value="<?php echo $_GET['id_gr'] ?>">
                                                <input type="hidden" name="txtDet_gr_inscrip" id="txtDet_gr_inscrip" value="">
                                                <input type="hidden" name="txt_id_inscrip" id="txt_id_inscrip" value="">
                                                <input type="hidden" name="txt_nom_cap_ins" id="txt_nom_cap_ins" value="">
                                                <input type="hidden" name="txt_us" id="txt_us" value="<?php echo $_SESSION['usuario'] ?>">
                                                <dl class="dl-horizontal" id="detalle_inscrip">

                                                </dl>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-lg-3"></div>
                                </div>
                            </div>
                            <div class="tab-pane" id="asist">
                                <div class="col-md-2 col-lg-2">                        
                                </div>

                                <div class="col-md-8 col-lg-8 table-responsive">   

                                    <table class="table table-hover">

    <!--                                        <input type="hidden" name="key_asistencia" id="key_asistencia">-->
                                        <thead>

                                            <tr>
                                                <th>id</th>
                                                <th>Fecha</th>
                                                <th>Estado
                                                </th>                                            
                                            </tr>
                                        </thead>
                                        <tbody id="list_Asist">
                                        </tbody>
                                    </table>                                   
                                </div>
                                <div class="col-md-2 col-lg-2">                        
                                </div>
                            </div>  
                            <div class="tab-pane" id="material_did">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-3 col-lg-3">
                                        </div>
                                        <div class="col-md-6 col-lg-6 table-responsive"> 
                                            <div class="panel panel-info">
                                                <div class="panel-heading">
                                                    <h3>Descargar Material</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <table class="table table-hover">
    <!--                                        <input type="hidden" name="key_asistencia" id="key_asistencia">-->
                                                        <thead>
                                                            <tr>
                                                                <th>id</th>
                                                                <th>Nombre</th>
                                                                <th>Archivo</th>
                                                                <th>Fecha</th> 
                                                                <th>Accion</th>                                         
                                                            </tr>
                                                        </thead>
                                                        <tbody id="list_Mat_Descargar">
                                                        </tbody> 
                                                    </table>  
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-lg-3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="Examenes">
                                <div class="col-md-2 col-lg-2">                        
                                </div>

                                <div class="col-md-8 col-lg-8 table-responsive">   

                                    <table class="table table-hover">
    <!--                                        <input type="hidden" name="key_asistencia" id="key_asistencia">-->
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Examen</th>
                                                <th>Fecha</th> 
                                                <th>Tiempo Limite</th>
                                                <th>Accion</th>
                                            </tr>
                                        </thead>
                                        <tbody id="list_Examen_desar">
                                        </tbody>
                                    </table>                                   
                                </div>
                                <div class="col-md-2 col-lg-2">                        
                                </div>
                            </div>
                            <div class="tab-pane" id="ExamenesEs">
                                <div class="col-md-2 col-lg-2">                        
                                </div>

                                <div class="col-md-8 col-lg-8 table-responsive">   

                                    <table class="table table-hover">
    <!--                                        <input type="hidden" name="key_asistencia" id="key_asistencia">-->
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Examen</th>
                                                <th>Contenido</th>                                           
                                                <th>Accion</th>
                                            </tr>
                                        </thead>
                                        <tbody id="list_Examen_desar2">
                                        </tbody>
                                    </table>                                   
                                </div>
                                <div class="col-md-2 col-lg-2">                        
                                </div>
                            </div>
                            <div class="tab-pane" id="notas">
                                <div class="row">
                                    <div class="col-md-3 col-lg-3">

                                    </div>
                                    <div class="col-md-6 col-lg-6" >
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h3>Calificacion de Examen</h3>
                                            </div>
                                            <div class="panel-body">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>id</th>
                                                            <th>Examen</th>
                                                            <th>notas</th>                                                        
                                                        </tr>
                                                    </thead>
                                                    <tbody id="cargar_notas">

                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-lg-3"></div>
                                </div>
                            </div>
                            <div class="tab-pane <?php echo $activo2; ?>" id="env_trab">
                                <div class="row">
                                    <div class="col-md-2 col-lg-2">                        
                                    </div>
                                    <div class="col-md-8 col-lg-8">     

                                        <a href="#reg_trab" data-toggle="tab" class="btn btn-default">Subir Trabajo</a>
                                        <?php
                                        if ($_GET['mensaje'] == 0) {
                                            $msg2 = '';
                                        } else
                                        if ($_GET['mensaje'] == 1) {
                                            $msg2 = 'El registro se realizo exitosamente.';
                                            echo "  <div class='alert alert-info alert-dismissible' role='alert'>  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button> $msg2 </div>";
                                        } else
                                        if ($_GET['mensaje'] == 2) {
                                            $msg2 = 'El registro no se guardo con exito.';
                                            echo "  <div class='alert alert-danger alert-dismissible' role='alert'>  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button> $msg2 </div>";
                                        } else
                                        if ($_GET['mensaje'] == 3) {
                                            $msg2 = 'El registro se elimino correctamente!!';
                                            echo "  <div class='alert alert-info alert-dismissible' role='alert'>  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button> $msg2 </div>";
                                        } else
                                        if ($_GET['mensaje'] == 4) {
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
<!--                                        <input type="hidden" name="txtDet_gr3" id="txtDet_gr3">
                                        <input type="hidden" name="txt_id_gru3" id="txt_id_gru3">-->
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Nombre</th>
                                                <th>Trabajo</th>
                                                <th>Fecha</th>                                                                                               
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody id="list_trabajo">

                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-2 col-lg-2">                        
                                </div>
                            </div>    
                        </div>
                        <div class="tab-pane" id="reg_trab">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-3 col-lg-3">
                                    </div>
                                    <div class="col-md-6 col-lg-6"> 
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h3>Subir Trabajos</h3>
                                            </div>
                                            <div class="panel-body">
                                                <form role="form" method='POST' action="procesar/pTrabajo.php?op=0" name="validar_file" enctype="multipart/form-data">

                                                    <input type="hidden" name="txt_inscrp" id="txt_inscrp" value="">
                                                    <input type="hidden" name="key_trabajo" id="key_trabajo" value="">
                                                    <div class="form-group">
                                                        <label for="txtTrab">Nombres: </label>
                                                        <input type="text" class="form-control" value="" name="txtTrab" id="txtTrab"  placeholder="Ingrese Nombre del Trabajo" required autocomplete="off" autofocus="">
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="txtArch">Material: </label>
                                                        <input   type="file" class="form-control" value="" name="txtArch" id="txtArch">
                                                        <input   type="hidden"  value="" name="txtFile" id="txtFile" >
                                                    </div>
                                                    <div class="form-group c">
                                                        <label for="txtFechaTrab">Fecha: </label>
                                                        <input  type="date" class="form-control" value="" id="txtFechaTrab" name="txtFechaTrab" required autocomplete="off">

                                                    </div>

                                                    <input  type="submit" value="Registrar" class="btn btn-default " name="btnRegistrar" onclick="return comprueba_extension(this.form, this.form.txtArch.value)"/>
                                                    <a href="#env_trab" data-toggle="tab" class="btn btn-default">Regresar</a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-lg-3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </body>
</html>

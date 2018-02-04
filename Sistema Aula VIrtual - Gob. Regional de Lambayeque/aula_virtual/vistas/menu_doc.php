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
include 'clases/capacitacion.php';
include '../clases/material.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
        <nav>
            <ul class="nav nav-tabs " id="myTab">
                <?php if ($_GET['alerta'] == 0) { ?>
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

                    <?php
                    $activo21 = 'active';
                } else
                    
                    ?>

                <?php if ($_GET['alerta'] == 1) { ?>
                    <li class=""><a href="#dat_pers" data-toggle="tab">Datos Generales</a></li>

                    <li class="dropdown active">
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

                    <?php
                    $activo20 = 'active';
                    $activo21 = '';
                }
                ?>

            </ul>
        </nav>


        <section class="container-fluid">
            <div class="tab-content">
                <div class="tab-pane <?php echo $activo21; ?>" id="dat_pers">
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
                                    <h3>Capacitaciones Actuales Asignadas</h3>
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
                                            $objCap = new capacitacion;
                                            $result2 = $objCap->listarCapDoc($_SESSION['usuario']);
                                            $item = 0;
                                            foreach ($result2 as $grupo) {
                                                $item++;
                                                ?>
                                                <tr>
                                            <input type="hidden" value="<?php echo $item; ?>" name="txt_key" id="txt_key">
                                            <td id="td_id_gru_<?php echo $item; ?>"><?php echo "$grupo->id_grupo"; ?></td>
                                            <td  id="td_nom_cap_<?php echo $item; ?>"><?php echo "$grupo->nom_cap"; ?></td>
                                            <td id="td_desc_grup_<?php echo $item; ?>"><?php echo "$grupo->descp_grupo"; ?></td>                                        
                                            <td><a id="btnDetalleCurso" data-toggle="tab" href='vistas#detalle_curso' onclick="enviar(<?php echo $item; ?>);">Seleccionar</a>
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
                <div class="tab-pane <?php echo $activo20; ?>" id="detalle_curso">
                    <nav>
                        <ul class="nav nav-tabs " id="myTab">
                            <?php if ($_GET['alerta2'] == 0) { ?>
                                <li class="active"><a href="#det_c" data-toggle="tab">Detalle</a></li>
                                <li><a href="#asist" data-toggle="tab">Asistencia</a></li>
                                <li><a href="#mat_did" data-toggle="tab">Material Didactico</a></li>

                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        Examen <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#exam" data-toggle="tab" >Examen</a></li>
                                        <li><a href="#exam_subir" data-toggle="tab" >Subir</a></li>
                                        <li><a href="#preg" data-toggle="tab" >Pregunta</a></li>
                                    </ul>
                                </li>
                                 <li><a href="#v_trab" data-toggle="tab">Ver trabajos</a></li>
                                <li><a href="#notas" data-toggle="tab">Notas</a></li>
                                <li><a href="#curso" data-toggle="tab">Regresar</a></li>
                                <?php
                                $activo = 'active';
                            }
                            ?>
                            <?php if ($_GET['alerta2'] == 1) { ?>
                                <li class=""><a href="#det_c" data-toggle="tab">Detalle</a></li>
                                <li class="active"><a href="#asist" data-toggle="tab">Asistencia</a></li>
                                <li><a href="#mat_did" data-toggle="tab">Material Didactico</a></li>

                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        Examen <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#exam" data-toggle="tab" >Examen</a></li>
                                        <li><a href="#exam_subir" data-toggle="tab" >Subir</a></li>
                                        <li><a href="#preg" data-toggle="tab" >Pregunta</a></li>


                                    </ul>
                                </li>
                                 <li><a href="#v_trab" data-toggle="tab">Ver trabajos</a></li>
                                <li><a href="#notas" data-toggle="tab">Notas</a></li>
                                <li><a href="#curso" data-toggle="tab">Regresar</a></li>
                                <?php
                                $activo = '';
                                $activo2 = 'active';
                            }
                            ?>

                            <?php if ($_GET['alerta2'] == 2) {
                                ?>
                                <li class=""><a href="#det_c" data-toggle="tab">Detalle</a></li>
                                <li ><a href="#asist" data-toggle="tab">Asistencia</a></li>
                                <li class="active"><a href="#mat_did" data-toggle="tab">Material Didactico</a></li>

                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        Examen <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#exam" data-toggle="tab" >Examen</a></li>
                                        <li><a href="#exam_subir" data-toggle="tab" >Subir</a></li>
                                        <li><a href="#preg" data-toggle="tab" >Pregunta</a></li>


                                    </ul>
                                </li>
                                 <li><a href="#v_trab" data-toggle="tab">Ver trabajos</a></li>
                                <li><a href="#notas" data-toggle="tab">Notas</a></li>
                                <li><a href="#curso" data-toggle="tab">Regresar</a></li>
                                <?php
                                $activo = '';
                                $activo2 = '';
                                $activo3 = 'active';
                            }
                            ?>
                            <?php if ($_GET['alerta2'] == 3) { ?>
                                <li class=""><a href="#det_c" data-toggle="tab">Detalle</a></li>
                                <li ><a href="#asist" data-toggle="tab">Asistencia</a></li>
                                <li ><a href="#mat_did" data-toggle="tab">Material Didactico</a></li>

                                <li class="dropdown active">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        Examen <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#exam" data-toggle="tab" >Examen</a></li>
                                        <li><a href="#exam_subir" data-toggle="tab" >Subir</a></li>
                                        <li><a href="#preg" data-toggle="tab" >Pregunta</a></li>


                                    </ul>
                                </li>
                                 <li><a href="#v_trab" data-toggle="tab">Ver trabajos</a></li>
                                <li><a href="#notas" data-toggle="tab">Notas</a></li>
                                <li><a href="#curso" data-toggle="tab">Regresar</a></li>
                                <?php
                                $activo = '';
                                $activo2 = '';
                                $activo3 = '';
                                $activo4 = 'active';
                            }
                            ?>
                            <?php if ($_GET['alerta2'] == 4) { ?>
                                <li class=""><a href="#det_c" data-toggle="tab">Detalle</a></li>
                                <li ><a href="#asist" data-toggle="tab">Asistencia</a></li>
                                <li ><a href="#mat_did" data-toggle="tab">Material Didactico</a></li>

                                <li class="dropdown active">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        Examen <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#exam" data-toggle="tab" >Examen</a></li>
                                        <li><a href="#exam_subir" data-toggle="tab" >Subir</a></li>
                                        <li><a href="#preg" data-toggle="tab" >Pregunta</a></li>


                                    </ul>
                                </li>
                                 <li><a href="#v_trab" data-toggle="tab">Ver trabajos</a></li>
                                <li><a href="#notas" data-toggle="tab">Notas</a></li>
                                <li><a href="#curso" data-toggle="tab">Regresar</a></li>
                                <?php
                                $activo = '';
                                $activo2 = '';
                                $activo3 = '';
                                $activo4 = '';
                                $activo5 = 'active';
                            }
                            ?>
                            <?php if ($_GET['alerta2'] == 5) { ?>
                                <li class=""><a href="#det_c" data-toggle="tab">Detalle</a></li>
                                <li ><a href="#asist" data-toggle="tab">Asistencia</a></li>
                                <li ><a href="#mat_did" data-toggle="tab">Material Didactico</a></li>

                                <li class="dropdown active">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        Examen <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#exam" data-toggle="tab" >Examen</a></li>
                                        <li><a href="#exam_subir" data-toggle="tab" >Subir</a></li>
                                        <li><a href="#preg" data-toggle="tab" >Pregunta</a></li>


                                    </ul>
                                </li>
                                 <li><a href="#v_trab" data-toggle="tab">Ver trabajos</a></li>
                                <li><a href="#notas" data-toggle="tab">Notas</a></li>
                                <li><a href="#curso" data-toggle="tab">Regresar</a></li>
                                <?php
                                $activo = '';
                                $activo2 = '';
                                $activo3 = '';
                                $activo4 = '';
                                $activo5 = '';
                                $activo6 = 'active';
                            }
                            ?>   
                            <?php if ($_GET['alerta2'] == 6) { ?>
                                <li class=""><a href="#det_c" data-toggle="tab">Detalle</a></li>
                                <li ><a href="#asist" data-toggle="tab">Asistencia</a></li>
                                <li ><a href="#mat_did" data-toggle="tab">Material Didactico</a></li>

                                <li class="dropdown active">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        Examen <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#exam" data-toggle="tab" >Examen</a></li>
                                        <li><a href="#exam_subir" data-toggle="tab" >Subir</a></li>
                                        <li><a href="#preg" data-toggle="tab" >Pregunta</a></li>


                                    </ul>
                                </li>
                                 <li><a href="#v_trab" data-toggle="tab">Ver trabajos</a></li>
                                <li><a href="#notas" data-toggle="tab">Notas</a></li>
                                <li><a href="#curso" data-toggle="tab">Regresar</a></li>
                                <?php
                                $activo = '';
                                $activo2 = '';
                                $activo3 = '';
                                $activo4 = '';
                                $activo5 = '';
                                $activo6 = '';
                                $activo7 = 'active';
                            }
                            ?>



                        </ul>
                    </nav>


                    <div class="tab-content ">
                        <div class="">

                        </div>
                        <div class="tab-pane <?php echo $activo; ?>" id="det_c">
                            <div class="row">
                                <div class="col-md-3 col-lg-3"></div>
                                <div class="col-md-6 col-lg-6" >
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            <h3>Datos de la Capacitación</h3>
                                        </div>
                                        <div class="panel-body">

                                            <input type="hidden" name="txid_gru" id="txid_gru" value="<?php echo $_GET['id_gr'] ?>">
                                            <input type="hidden" name="txt_us2" id="txt_us2" value="<?php echo $_SESSION['usuario'] ?>">
                                            <input type="hidden" name="txt_id_gru" id="txt_id_gru" value="">
                                            <input type="hidden" name="txt_us" id="txt_us" value="<?php echo $_SESSION['usuario'] ?>">
                                            <dl class="dl-horizontal" id="detalle_cap">

                                            </dl>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-lg-3"></div>
                            </div>
                        </div>
                        <div class="tab-pane <?php echo $activo2; ?>" id="asist">
                            <div class="col-md-2 col-lg-2">                        
                            </div>
                            <form role="form" method='POST' action="procesar/pAsistencia.php?op=0" name="for_registrar">

                                <div class="col-md-8 col-lg-8 table-responsive"> 
                                    <?php
                                    if ($_GET['mensaje'] == 0) {
                                        $msg2 = '';
                                    } else
                                    if ($_GET['mensaje'] == 1) {
                                        $msg2 = 'El registro se realizo exitosamente.';
                                        echo "  <div class='alert alert-info alert-dismissible' role='alert'>  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button> $msg2 </div>";
                                    }
                                    ?>
                                    <div class="form-group">
                                        <label for="txtMat">Fecha de Asistencia: </label>
                                        <input type="date" class="form-control" value="" name="txtFechaAsist" id="txtFechaAsist" required autofocus autocomplete="off">
                                    </div>
                                    <table class="table table-hover">

                                        <input type="hidden" name="txt_id_gru5" id="txt_id_gru5">
                                        <input type="hidden" name="id_gr4" id="id_gr4">
<!--                                        <input type="hidden" name="key_asistencia" id="key_asistencia">-->
                                        <thead>

                                            <tr>
                                                <th>id</th>
                                                <th>Alumno</th>
                                                <th>Estado
                                                </th>                                            
                                            </tr>
                                        </thead>
                                        <tbody id="list_Asistencia">

                                        </tbody>

                                    </table>
                                    <input  type='submit' value='Grabar' class='btn btn-default ' name='btnRegistrarA' id="btnRegistrarA"/>
                                    <a href='#curso' data-toggle='tab' class='btn btn-default'>Regresar</a>
                                </div>

                            </form>

                            <div class="col-md-2 col-lg-2">                        
                            </div>
                        </div>    
                        <div class="tab-pane <?php echo $activo3; ?>" id="mat_did">
                            <div class="row">
                                <div class="col-md-2 col-lg-2">                        
                                </div>
                                <div class="col-md-8 col-lg-8">     

                                    <a href="#reg_mat_did" data-toggle="tab" class="btn btn-default">Registrar</a>
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

                                        <input type="hidden" name="txtDet_gr3" id="txtDet_gr3">
                                        <input type="hidden" name="txt_id_gru3" id="txt_id_gru3">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Nombre</th>
                                                <th>Material</th>
                                                <th>Fecha</th>
                                                <th>Comentario</th>                                               
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody id="list_mat">

                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-2 col-lg-2">                        
                                </div>
                            </div>    
                        </div>
                        <div class="tab-pane" id="reg_mat_did">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-3 col-lg-3">
                                    </div>
                                    <div class="col-md-6 col-lg-6"> 
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h3>Subir Material Didactico</h3>
                                            </div>
                                            <div class="panel-body">
                                                <form role="form" method='POST' action="procesar/pMaterial.php?op=0" name="validar_file" enctype="multipart/form-data">

                                                    <input type="hidden" name="txt_id_gru2" id="txt_id_gru2" value="">
                                                    <input type="hidden" name="key_material" id="key_material" value="">
                                                    <div class="form-group">
                                                        <label for="txtMat">Nombres: </label>
                                                        <input type="text" class="form-control" value="" name="txtMat" id="txtMat"  placeholder="Ingrese Nombre del material" required autocomplete="off" autofocus="">
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="txtArch">Material: </label>
                                                        <input   type="file" class="form-control" value="" name="txtArch" id="txtArch">
                                                        <input   type="hidden"  value="" name="txtFile" id="txtFile" >
                                                    </div>
                                                    <div class="form-group c">
                                                        <label for="txtFechaMat">Fecha: </label>
                                                        <input  type="date" class="form-control" value="" id="txtFechaMat" name="txtFechaMat" required autocomplete="off">

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="txtComent">Comentario: </label>
                                                        <textarea class="form-control" rows="3" name="txtComent" id="txtComent" placeholder="Ingrese Comentario" required autocomplete="off"></textarea>
                                                    </div>
                                                    <input  type="submit" value="Registrar" class="btn btn-default " name="btnRegistrar" onclick="return comprueba_extension(this.form, this.form.txtArch.value)"/>
                                                    <a href="#mat_did" data-toggle="tab" class="btn btn-default">Regresar</a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-lg-3">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane <?php echo $activo4; ?>" id="exam">
                            <div class="row">
                                <div class="col-md-2 col-lg-2">                        
                                </div>
                                <div class="col-md-8 col-lg-8">     

                                    <a href="#reg_exam" data-toggle="tab" class="btn btn-default">Registrar</a>
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

                                <div class="col-md-2 col-lg-2">                        
                                </div>
                                <div class="col-md-8 col-lg-8 table-responsive">   

                                    <table class="table table-hover">
                                        
                                        <input type="hidden" name="txt_id_gru3" id="txt_id_gru3">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Examen</th>                                                
                                                <th>Fecha</th>
                                                <th>Comentario</th>
                                                <th>Tiempo Limite</th>
                                                <th>Tipo de Examen</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody id="list_exam">

                                        </tbody>
                                    </table>
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
                                                <th>Examen</th>                                                
                                                <th>Fecha</th>
                                                <th>Comentario</th>
                                                <th>Tiempo Limite</th>
                                                <th>Tipo de Examen</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody id="list_examPublic">

                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-2 col-lg-2">                        
                                </div>
                            </div>   

                        </div>
                        <div class="tab-pane" id="reg_exam">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-3 col-lg-3">
                                    </div>
                                    <div class="col-md-6 col-lg-6"> 
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h3>Registrar Examen</h3>
                                            </div>
                                            <div class="panel-body">
                                                <form role="form" method='POST' action="procesar/pExamen.php?op=0" name="for_registrar">

                                                    <input type="hidden" name="txt_id_gru4" id="txt_id_gru4" value="">
                                                    <input type="hidden" name="key_exam" id="key_exam" value="">
                                                    <div class="form-group">
                                                        <label for="cbotipoExam">Tipo de Examen: </label>
                                                        <select class='form-control' name='cbotipoExam' id="cbotipoExam" required autocomplete="off">                                                   
                                                            <?php
                                                            include 'clases/examen.php';
                                                            $objExam = new examen();
                                                            $result9 = $objExam->listarTipoExamen();
                                                            foreach ($result9 as $tipo_examen) {
                                                                ?>
                                                                <option value="<?php echo "$tipo_examen->id_texam"; ?>"><?php echo "$tipo_examen->descripcion"; ?></option>
                                                            <?php }
                                                            ?>
                                                        </select>

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="txtExam">Nombres: </label>
                                                        <input type="text" class="form-control" value="" name="txtExam" id="txtExam"  placeholder="Ingrese Nombre del examens" required autocomplete="off">
                                                    </div>

                                                    <div class="form-group ">
                                                        <label for="txtFechaExam">Fecha: </label>
                                                        <input  type="date" class="form-control" value="" id="txtFechaExam" name="txtFechaExam" required autocomplete="off">

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="txtTLimite">Tiempo Limite: </label>
                                                        <input  type="text" class="form-control" value="" id="txtTLimite" name="txtTLimite" placeholder="Ingrese Tiempo Limite" required autocomplete="off">

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="txtCom">Comentario: </label>

                                                        <textarea class="form-control" rows="3" name="txtCom" id="txtCom" placeholder="Ingrese Comentario" required autocomplete="off"></textarea>
                                                    </div>
                                                    <input  type="submit" value="Registrar" class="btn btn-default " name="btnRegistrar"/>
                                                    <a href="#exam" data-toggle="tab" class="btn btn-default">Regresar</a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-lg-3">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane <?php echo $activo5; ?>" id="exam_subir">
                            <div class="row">
                                <div class="col-md-2 col-lg-2">                        
                                </div>
                                <div class="col-md-8 col-lg-8">     

                                    <a href="#subir_exam" data-toggle="tab" class="btn btn-default">Subir Examen</a>
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
        <!--                                        <input type="hidden" name="txtDet_gr5" id="txtDet_gr5">
                                        <input type="hidden" name="txt_id_cap5" id="txt_id_cap5">-->
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Examen</th>
                                                <th>Archivo</th>                                                
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody id="list_archivo_exam">

                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-2 col-lg-2">                        
                                </div>
                            </div>  
                        </div>

                        <div class="tab-pane" id="subir_exam">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-3 col-lg-3">
                                    </div>
                                    <div class="col-md-6 col-lg-6"> 
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h3>Subir Examen</h3>
                                            </div>
                                            <div class="panel-body">
                                                <form role="form" method='POST' action="procesar/pSubirExamen.php?op=0" name="validar_file2" enctype="multipart/form-data">

                                                    <input   type="hidden" class="form-control" value="" name="key_examen_arch" id="key_examen_arch" >             
                                                    <input   type="hidden" class="form-control" value="" name="id_gr2" id="id_gr2" value=''>                                   
                                                    <div class="form-group">
                                                        <label for="cboExam">Examen: </label>
                                                        <select class='form-control' name='cboExamS' id="cboExamS" required autocomplete="off">                                                   

                                                        </select>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="txtArch">Archivo: </label>
                                                        <input   type="file" class="form-control" value="" name="archivo" id="archivo" required autocomplete="off" >
                                                        <input   type="hidden"  value="" name="txtArchivo" id="txtArchivo" >
                                                    </div>                                                                                                  
                                                    <input  type="submit" value="Registrar" class="btn btn-default " name="btnRegistrar" onclick="comprueba_extension(this.form, this.form.archivo.value)"/>
                                                    <a href="#exam_subir" data-toggle="tab" class="btn btn-default">Regresar</a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-lg-3">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane <?php echo $activo6; ?>" id="preg">
                            <div class="row">
                                <div class="col-md-2 col-lg-2">                        
                                </div>
                                <div class="col-md-8 col-lg-8">     

                                    <a href="#reg_preg" data-toggle="tab" class="btn btn-default">Registrar Pregunta</a>

                                    <?php
                                    if ($_GET['mensaje5'] == 0) {
                                        $msg5 = '';
                                    } else
                                    if ($_GET['mensaje5'] == 1) {
                                        $msg5 = 'El registro se realizo exitosamente.';
                                        echo "  <div class='alert alert-info alert-dismissible' role='alert'>  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button> $msg5 </div>";
                                    } else
                                    if ($_GET['mensaje5'] == 2) {
                                        $msg5 = 'El registro no se guardo con exito.';
                                        echo "  <div class='alert alert-danger alert-dismissible' role='alert'>  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button> $msg5 </div>";
                                    } else
                                    if ($_GET['mensaje5'] == 3) {
                                        $msg5 = 'El registro se elimino correctamente!!';
                                        echo "  <div class='alert alert-info alert-dismissible' role='alert'>  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button> $msg5 </div>";
                                    } else
                                    if ($_GET['mensaje5'] == 4) {
                                        $msg5 = 'El registro se no se elimino correctamente!!';
                                        echo "  <div class='alert alert-danger alert-dismissible' role='alert'>  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button> $msg5 </div>";
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
        <!--                                        <input type="hidden" name="txtDet_gr5" id="txtDet_gr5">
                                        <input type="hidden" name="txt_id_cap5" id="txt_id_cap5">-->
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Examen</th>
                                                <th>Pregunta</th>
                                                <th>Puntaje</th>
                                                <th>Alternativa 1</th>
                                                <th>Alternativa 2</th>
                                                <th>Alternativa 3</th>
                                                <th>Alternativa 4</th>
                                                <th>Respuesta</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody id="list_preg">

                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-2 col-lg-2">                        
                                </div>
                            </div>  
                        </div>
                        <div class="tab-pane" id="reg_preg">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-3 col-lg-3">
                                    </div>
                                    <div class="col-md-6 col-lg-6"> 
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h3>Registrar Preguntas</h3>
                                            </div>
                                            <div class="panel-body">
                                                <form role="form" method='POST' action="procesar/pPregunta.php?op=0" name="for_registrar">
        <!--                                                    <input type="hidden" name="txtDet_gr6" id="txtDet_gr6" value="">
                                                    <input type="hidden" name="txt_id_cap6" id="txt_id_cap6" value="">-->
                                                    <input type="hidden" name="key_preg" id="key_preg" value="">
                                                    <input type="hidden" name="id_gr3" id="id_gr3" value="">
                                                    <div class="form-group">
                                                        <label for="cboExamen">Examen: </label>
                                                        <select class='form-control' name='cboExamen' id="cboExamen" required autocomplete="off">                                                   

                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="txtPreg">Pregunta: </label>

                                                        <textarea class="form-control" rows="3" name="txtPreg" id="txtPreg" placeholder="Ingrese Pregunta" required autocomplete="off"></textarea>
                                                    </div>

                                                    <div class="form-group ">
                                                        <label for="txtPuntaje">Puntaje: </label>
                                                        <input  type="text" class="form-control" value="" id="txtPuntaje" name="txtPuntaje" required autocomplete="off">

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="txtAlt1">Alternativa 1: </label>
                                                        <input  type="text" class="form-control" value="" id="txtAlt1" name="txtAlt1" placeholder="Ingrese Alternativa 1" required autocomplete="off">

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="txtAlt2">Alternativa 2: </label>
                                                        <input  type="text" class="form-control" value="" id="txtAlt2" name="txtAlt2" placeholder="Ingrese Alternativa 2" required autocomplete="off">

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="txtAlt3">Alternativa 3: </label>
                                                        <input  type="text" class="form-control" value="" id="txtAlt3" name="txtAlt3" placeholder="Ingrese Alternativa 3" required autocomplete="off">

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="txtAlt4">Alternativa 4: </label>
                                                        <input  type="text" class="form-control" value="" id="txtAlt4" name="txtAlt4" placeholder="Ingrese Alternativa 4" required autocomplete="off">
                                                    </div>                                                    
                                                    <input  type="submit" value="Registrar" class="btn btn-default " name="btnRegistrar"/>
                                                    <a href="#preg" data-toggle="tab" class="btn btn-default">Regresar</a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-lg-3">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="reg_alter">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-3 col-lg-3">
                                    </div>
                                    <div class="col-md-6 col-lg-6"> 
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h3>Registrar Alternativa</h3>
                                            </div>
                                            <div class="panel-body">
                                                <form role="form" method='POST' action="procesar/pPregunta.php?op=2" name="for_registrar">
        <!--                                                    <input type="hidden" name="txtDet_gr6" id="txtDet_gr6" value="">
                                                    <input type="hidden" name="txt_id_cap6" id="txt_id_cap6" value="">-->
                                                    <input type="hidden" name="id_gr6" id="id_gr6" value="">
                                                    <input type="text" name="key_preg2" id="key_preg2" value="">
                                                    <div class="form-group">
                                                        <label for="txtPreg">Pregunta: </label>
                                                        <textarea class="form-control" rows="3" name="txtPreg2" id="txtPreg2" placeholder="Ingrese Pregunta" disabled="false"></textarea>
                                                    </div>
                                                    <div class="form-group">

                                                        <label for="cboRpta">Respuesta: </label>
                                                        <select class='form-control' name='cboRpta' id="cboRpta" required autocomplete="off">                                                   

                                                        </select>
                                                    </div>                                                   

                                                    <input  type="submit" value="Registrar" class="btn btn-default " name="btnRegistrar"/>
                                                    <a href="#preg" data-toggle="tab" class="btn btn-default">Regresar</a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-lg-3">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane <?php echo $activo7?>" id="notas">
                            <div class="row">
                                <div class="col-md-2 col-lg-2">                        
                                </div>
                                <div class="col-md-8 col-lg-8">     

                                    <a href="#reg_nota" data-toggle="tab" class="btn btn-default">Registrar Notas</a>

                                    <?php
                                    if ($_GET['mensaje6'] == 0) {
                                        $msg5 = '';
                                    } else
                                    if ($_GET['mensaje6'] == 1) {
                                        $msg5 = 'El registro se realizo exitosamente.';
                                        echo "  <div class='alert alert-info alert-dismissible' role='alert'>  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button> $msg5 </div>";
                                    } else
                                    if ($_GET['mensaje6'] == 2) {
                                        $msg5 = 'El registro no se guardo con exito.';
                                        echo "  <div class='alert alert-danger alert-dismissible' role='alert'>  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button> $msg5 </div>";
                                    } else
                                    if ($_GET['mensaje6'] == 3) {
                                        $msg5 = 'El registro se elimino correctamente!!';
                                        echo "  <div class='alert alert-info alert-dismissible' role='alert'>  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button> $msg5 </div>";
                                    } else
                                    if ($_GET['mensaje6'] == 4) {
                                        $msg5 = 'El registro se no se elimino correctamente!!';
                                        echo "  <div class='alert alert-danger alert-dismissible' role='alert'>  <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button> $msg5 </div>";
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
        <!--                                        <input type="hidden" name="txtDet_gr5" id="txtDet_gr5">
                                        <input type="hidden" name="txt_id_cap5" id="txt_id_cap5">-->
                                         <input type="hidden" name="txt_id_gru5" id="txt_id_gru5">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Alumno</th>
                                                <th>Examen</th>
                                                <th>Nota</th>                                                
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody id="list_notas">

                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-2 col-lg-2">                        
                                </div>
                            </div>  
                        </div>
                        <div class="tab-pane" id="reg_nota">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-3 col-lg-3">
                                    </div>
                                    <div class="col-md-6 col-lg-6"> 
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h3>Registrar Notas</h3>
                                            </div>
                                            <div class="panel-body">
                                                <form role="form" method='POST' action="procesar/pValidarRpta.php?op=1" name="for_registrar">
        <!--                                                    <input type="hidden" name="txtDet_gr6" id="txtDet_gr6" value="">
                                                    <input type="hidden" name="txt_id_cap6" id="txt_id_cap6" value="">-->
                                                     <input type="hidden" name="id_gr5" id="id_gr5" value="">
                                                     <input type="hidden" name="key_nota" id="key_nota" value="">
                                                    <div class="form-group">
                                                        <label for="cboAlumno">Alumno: </label>
                                                        <select class='form-control' name='cboAlumno' id="cboAlumno" required autocomplete="off">                                                   
                                                           
                                                        </select>
                                                    </div>
                                                    <div class="form-group">

                                                        <label for="cboExamenEscrito">Examen: </label>
                                                        <select class='form-control' name='cboExamenEscrito' id="cboExamenEscrito" required autocomplete="off">                                                   
                                                            <?php
                                                            ?>
                                                        </select>
                                                    </div>  
                                                    <div class="form-group">

                                                        <label for="txtNota">Nota: </label>
                                                        <input type="text" name="txtNota"  class="form-control" id="txtNota" value="" placeholder="Ingrese Nota" required autocomplete="off">
                                                    </div> 

                                                    <input  type="submit" value="Registrar" class="btn btn-default " name="btnRegistrar"/>
                                                    <a href="#notas" data-toggle="tab" class="btn btn-default">Regresar</a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-lg-3">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="v_trab">
                            <div class="container">
                                    <div class="row">
                                        <div class="col-md-3 col-lg-3">
                                        </div>
                                        <div class="col-md-6 col-lg-6 table-responsive"> 
                                            <div class="panel panel-info">
                                                <div class="panel-heading">
                                                    <h3>Descargar Trabajos</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <table class="table table-hover">
    <!--                                        <input type="hidden" name="key_asistencia" id="key_asistencia">-->
                                                        <thead>
                                                            <tr>
                                                                <th>id</th>
                                                                <th>Alumno</th>
                                                                <th>Material</th>
                                                                <th>Archivo</th>
                                                                <th>Fecha</th> 
                                                                <th>Accion</th>                                         
                                                            </tr>
                                                        </thead>
                                                        <tbody id="list_trab_Desc">
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
                    </div> 
                </div>

            </div>



        </div>
    </div>
</section>

</body>
</html>

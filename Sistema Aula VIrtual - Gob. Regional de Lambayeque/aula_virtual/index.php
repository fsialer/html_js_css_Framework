<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
//
error_reporting(0);
ini_set('display_errors', 0);
//if (!(isset($_SESSION['usuario']) && isset($_SESSION['clave']))) {
//    header("location:../index.php");
//    exit();
//}
include './clases/datos_user.php';
include './clases/capacitacion.php';
include '../clases/inscripcion.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
        <script type="text/javascript" src="js/jquery-1.11.0.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/tab.js"></script>
        <script type="text/javascript" src="js/actualizarAdmin.js" ></script>
        <script type="text/javascript" src="js/actualizarDocente.js" ></script>
        <script type="text/javascript" src="js/env_det_cap_gru.js" ></script>
        <script type="text/javascript" src="js/enviar_det_cap_gru_alum.js" ></script>
        <script type="text/javascript" src="js/comprobarArchivo.js" ></script>
     
        <script type="text/javascript" src="js/actualizarCapacitacion.js" ></script>
        <script type="text/javascript" src="js/actualizarNotas.js" ></script>
        <script type="text/javascript" src="js/actualizarGrupo.js" ></script>
        <script type="text/javascript" src="js/actualizarGrupo.js" ></script>
        <script type="text/javascript" src="js/actualizarTrabajo.js" ></script>
        <script type="text/javascript" src="js/actualizarExamenSubir.js" ></script>
        <script type="text/javascript" src="js/mensajesConfirmacion.js" ></script>
        <script type="text/javascript" src="jquery/jquery-1.3.2.min.js" ></script>
        <script type="text/javascript" src="js/filtrar.js" ></script>
        <script type="text/javascript" src="js/enviarAsistencia.js" ></script>
        <script type="text/javascript" src="js/verificarUsuario.js" ></script>
        <script type="text/javascript" src="js/enviarInscripcion.js" ></script>     
        <script type="text/javascript" src="js/actualizarMaterial.js" ></script>    
        <script type="text/javascript" src="js/actualizarExamen.js" ></script>    
        <script type="text/javascript" src="js/actualizarPregunta.js" ></script>    
        <script type="text/javascript" src="js/actualizarAltern.js" ></script>    

        <link href="css/main.css" rel="stylesheet" type="text/css">


    </head>
    <body>
        <header>
            <div class="container-fluid">
                <div class="row" id="cabezera">
                    <div class="col-md-9 col-lg-9">

                        <h2> <img id="logo" class="img-rounded" src="img/logo.jpg"/> Aula Virtual</h2>
                    </div>
                    <?php if (isset($_SESSION['usuario']) && isset($_SESSION['clave'])) {
                        ?>
                        <div class="col-md-3 col-lg-3">
                            <h3 >Usuario: <?php echo $_SESSION['usuario']; ?>

                            </h3>
                        </div>
                    <?php } else { ?>
                        <div class="col-md-3 col-lg-3">
                            <h2><a href="" data-toggle="modal" data-target="#myModal">Iniciar Sesion</a></h2>
                            <!-- Modal -->
                            <div class="modal fade bs-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">INICIAR SESION</h4>
                                        </div>
                                        <form role="form" method='POST' action="procesar/pDatos_user.php?op=1" name="form_login" >
                                            <div class="modal-body">
                                                <div class="form-group ">
                                                    <label for="txtDNI" >Usuario: </label>
                                                    <input type="text" class="form-control" value="" name="txtDNI" placeholder="Ingrese DNI">
                                                </div>
                                                <div class="form-group">
                                                    <label for="txtClave" >Contraseña:</label>
                                                    <input type="password" class="form-control" value="" name="txtClave" placeholder="Ingrese Contraseña">
                                                </div>                                       
                                            </div>
                                            <div class="modal-footer">
                                                <input  type="submit" value="Acceder" class="btn btn-primary " name="btnRegistrar"/>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }
                    ?>
                </div>
            </div>
        </header>
        <?php
        if (isset($_SESSION['usuario']) && isset($_SESSION['clave'])) {
            $objDatos_user = new datos_user();
            $result = $objDatos_user->listarDatos($_SESSION['usuario']);
            foreach ($result as $datos_user) {
                if ($datos_user->id_tuser == 1) {

                    include './vistas/menuAdmin.php';
                } else
                if ($datos_user->id_tuser == 2) {
                    include './vistas/menuAlum.php';
                } else
                if ($datos_user->id_tuser == 3) {
                    include './vistas/menu_doc.php';
                }
            }
            ?>
        <?php } else { ?>
            <nav>
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#inicio" data-toggle="tab">Inicio</a></li>
                    <li><a href="#registrese" data-toggle="tab">Registrese</a></li>
                    <li><a href="#inscribete" data-toggle="tab">Inscribete</a></li>

                </ul>
            </nav>


            <!-- Tab panes -->
            <section>

                <div class="tab-content">
                    <div class="tab-pane active" id="inicio">
                        <section id="inicio" class="container">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                    <div class="row">
                                        <div class="hidden-xs col-sm-3 col-md-6 col-lg-6">
                                            <img src="img/mision.png" class="img-responsive" alt=""/>
                                        </div>
                                        <div class="col-xs-12 col-sm-9 col-md-6 col-lg-6 ">
                                            <h3>Mision</h3><hr/>
                                            <p>
                                                Está  encargado de cumplir la función que le corresponde al Estado de invertir 
                                                en el desarrollo social y laboral de los trabajadores pertenecientes al Gobierno 
                                                Regional de Lambayeque; ofreciendo y ejecutando la formación integral,
                                                para la incorporación y el desarrollo de las personas en actividades productivas
                                                que contribuyan al desarrollo social, económico y tecnológico del país.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4  ">
                                    <div class="row">
                                        <div class="hidden-xs col-sm-3 col-md-6 col-lg-6 ">
                                            <img src="img/vision.jpg" class="img-responsive" alt=""/>
                                        </div>
                                        <div class="col-xs-12 col-sm-9 col-md-6 col-lg-6 ">
                                            <h3>Vision</h3><hr/>
                                            <p>
                                                En formación profesional integral y en el uso y apropiación de tecnología e innovación
                                                al servicio de personas y empresas; habrá contribuido decisivamente a incrementar la 
                                                competitividad de los aprendices a través de:
                                                <br>
                                                - Los relevantes aportes a la productividad de las entidades no solo públicas.
                                                - La contribución a la efectiva generación de empleo y la superación de la pobreza.
                                                - El aporte de fuerza laboral innovadora a las empresas y regiones.
                                                - La integralidad de sus aprendices y su vocación de servicio.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 ">   
                                    <div class="row">
                                        <div class="hidden-xs col-sm-3 col-md-6 col-lg-6 ">
                                            <img src="img/nosotros.jpg" class="img-responsive" alt=""/>
                                        </div>
                                        <div class="col-xs-12 col-sm-9 col-md-6 col-lg-6 ">
                                            <h3>Objetivos</h3><hr/>
                                            <p>
                                                Tiene los siguientes objetivos:
                                                <br>
                                                1. Brindar una formación integral a los trabajadores de todas las actividades económicas,
                                                y a quienes sin serlo, requieran dicha formación, para aumentar por ese medio la productividad
                                                nacional y promover la expansión y el desarrollo económico y social armónico del país, bajo el
                                                concepto de equidad social redistributiva. 
                                                <br>
                                                2. Fortalecer los procesos de formación profesional integral que contribuyan al desarrollo comunitario
                                                a nivel urbano y rural, para su vinculación o promoción en actividades productivas de interés social
                                                y económico. 
                                                <br>
                                                3. Apropiar métodos, medios y estrategias dirigidos a la maximización de la cobertura y la calidad de la
                                                formación profesional integral. 
                                                <br>
                                                4. Participar en actividades de investigación y desarrollo tecnológico, ocupacional y social, que 
                                                contribuyan a la actualización y mejoramiento de la formación profesional integral.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                        </section>
                      
                    </div>
                    <div class="tab-pane" id="registrese">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3 col-lg-3">
                                </div>
                                <div class="col-md-6 col-lg-6"> 
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            <h3>Registrate</h3>
                                        </div>
                                        <div class="panel-body">
                                            <form role="form" method='POST' action="procesar/pDatos_user.php?op=0&tip=2" name="for_registrar">
                                                <div class="form-group col-md-6 col-lg-6">
                                                    <label for="txtNombre">Nombres: </label>
                                                    <input type="text" class="form-control" value="" name="txtNombre" placeholder="Ingrese Nombres" required autofocus autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-6 col-lg-6">
                                                    <label for="txtApellido">Apellidos: </label>
                                                    <input type="text" class="form-control" value="" name="txtApellido" placeholder="Ingrese Apellidos" required autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-6 col-lg-6">
                                                    <label for="txtDireccion">Direccion: </label>
                                                    <input type="text" class="form-control" value="" name="txtDireccion" placeholder="Ingrese Direccion"  required autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-6 col-lg-6">
                                                    <label for="txtTelefono">Telefono/Celular: </label>
                                                    <input type="text" class="form-control" value="" name="txtTelefono" placeholder="Ingrese Telefono"  required autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-6 col-lg-6">
                                                    <label for="txtEmail">Email: </label>
                                                    <input type="email" class="form-control" value="" name="txtEmail" placeholder="Ingrese Email"  required autocomplete="off">
                                                </div>                                
                                                <div class="form-group col-md-6 col-lg-6" >
                                                    <label for="txtEmail">Sexo: </label>
                                                    <select class='form-control' name='cboSexo'  required autocomplete="off">
                                                        <?php
                                                        $objDatos_user = new datos_user();
                                                        $result2 = $objDatos_user->listarSexo();
                                                        foreach ($result2 as $sexo) {
                                                            ?>
                                                            <option value="<?php echo "$sexo->id_sexo"; ?>"><?php echo "$sexo->abreviatura"; ?></option>
                                                        <?php }
                                                        ?>

                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6 col-lg-6">
                                                    <label for="txtDNI">DNI: </label>
                                                    <input type="text" class="form-control" value="" name="txtDNI" placeholder="Ingrese DNI"  required autocomplete="off">
                                                </div>
                                                <div class="form-group col-md-6 col-lg-6">
                                                    <label for="txtClave">Contraseña:</label>
                                                    <input type="password" class="form-control" value="" name="txtClave" placeholder="Ingrese Contraseña"  required autocomplete="off">
                                                </div>
                                                <input  type="submit" value="Registrar" class="btn btn-primary" name="btnRegistrar"/>

                                            </form>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-3 col-lg-3">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane container" id="inscribete">
                        <h2>Lista de Inscripciones</h2>
                        <?php
                        $objCap = new Capacitacion();
                        $result3 = $objCap->listar();
                        $cant = count($result3);
                        
                        if ($cant > 0) {
                            ?>
                            <?php foreach ($result3 as $capacitacion) {
                                ?>   
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h3 id="h3_nom_cap_<?php echo $capacitacion->id_cap; ?>"><?php echo "$capacitacion->nom_cap"; ?></h3>
                                    </div>
                                    <div class="panel-body">
                                        <dl class="dl-horizontal">
                                            <dt>Codigo: </dt>
                                            <dd id="id_cap<?php echo $capacitacion->id_cap; ?>"><?php echo $capacitacion->id_cap; ?></dd>
                                            <dt>Lugar: </dt>
                                            <dd><?php echo "$capacitacion->lugar_cap"; ?></dd>
                                            <dt>Fecha Inicio de la Capacitacion: </dt>
                                            <dd><?php echo "$capacitacion->fechaini_cap"; ?></dd>
                                            <dt>Fecha Final de Inscripcion: </dt>
                                            <dd><?php echo "$capacitacion->fechafin_cap"; ?></dd>
                                            <dt>Descripcion: </dt>
                                            <dd><?php echo "$capacitacion->descrip_cap"; ?></dd>
                                            <dt>Docente: </dt>
                                            <dd><?php echo "$capacitacion->nom_user $capacitacion->ape_user"; ?></dd>                                           

                                            <dt><h1><a href="#inscribir" data-toggle="modal" data-target="#myModal2" onclick="enviarCap(<?php echo $capacitacion->id_cap; ?>);">Inscribete..</a></h1></dt>

                                        </dl>
                                    </div>
                                </div>

                                <?php
                            }
                            ?>
                            <?php } else
                                {?>
                                <div class="alert alert-info" role="alert">No se han registrado capacitaciones</div>
                            <?php }
                            ?>

                        </div>
                        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h3 class="modal-title" id="myModalLabel">Completa lo siguientes datos para poder registrarte.</h3>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form" method='POST' action="procesar/pInscripcion.php?op=0" name="form_login" >
                                            <div class='form-group '>
                                                <input type='hidden' id='key_cap' class='form-control' value='' name='key_cap'>
                                                <label for='txtCap'>Capacitacion: </label>
                                                <input type='text' id='txtCap' disabled="true"  class='form-control' value='' name='txtCap' >
                                            </div>

                                            <div class="form-group ">                                           
                                                <label for="txtUsuario" >Usuario: </label>
                                                <input type="text" id="txtUsuario" class="form-control" value="" name="txtUsuario" placeholder="Ingrese Usuario">
                                            </div>                                        
                                            <div id="Info">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                            </div>   
                                            <div id="divCboGrupo">

                                            </div>
                                        </form>


                                    </div>
                                </div>
                            </div>
                        </div>                    
                      
                    </div> 
                </section>

            <?php }
            ?>
            <!-- Nav tabs -->

<!--            <footer class="modal-footer container-fluid">
                <div><br/>
                    <p>Derechos Reservados @2014 Aula Virtual</p><br/>
                </div>

            </footer>-->
            <?php
// put your code here
            ?>
    </body>
</html>

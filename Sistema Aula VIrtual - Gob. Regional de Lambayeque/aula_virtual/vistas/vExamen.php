<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css">
        <script type="text/javascript" src="../js/jquery-1.11.0.js"></script>
        <script type="text/javascript" src="../js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../js/tab.js"></script>
    </head>
    <body>
        <header>
            <div class="container-fluid">
                <h1 class="page-header">Examen Virtual</h1>
            </div>           
        </header>
        <?php
        error_reporting(0);
        ini_set('display_errors', 0);
        include '../clases/pregunta.php';
        include '../clases/datos_user.php';
        include '../clases/evaluacion.php';
        $idExam = $_GET['id_exam'];
        $nom_exam = $_GET['nom_ex'];
        $coment_exam = $_GET['com_ex'];
        $id_inscp = $_GET['id_inscp'];
        $us=$_GET['us'];      
        $objEvaluacion = new evaluacion();        
        $result = $objEvaluacion->ComprobarExamen($id_inscp, $idExam);
        $cant = count($result);
        if ($cant > 0) {
            header("location:mensajes.php?msg=9");
            ?>            
            <?php
        } else {
            $objPreg = new pregunta();
            ?>
            <section class="container-fluid">
                <div class="row">
                    <div class="container-fluid">
                        <h1>Nombre del Examen:<small><?php echo $nom_exam; ?></small></h1>
                    </div>
                     <div class="container-fluid">
                        <h1>Usuario:<small><?php echo $us; ?></small></h1>
                    </div>
                    <blockquote>
                        <p>Comentario; <?php echo $coment_exam; ?></p>
                    </blockquote>
                    <form role="form" method='POST' action="../procesar/pValidarRpta.php?op=0" name="for_registrar">
                        <?php
                        $item = 0;
                        $result2 = $objPreg->listarPreguntasDesarrollar($idExam);
                        foreach ($result2 as $pregunta) {
                            $item++;
                            ?>

                            <div class="form-group container-fluid">
                                <p class="form-control bg-info"><?php echo "$item.- " . $pregunta->descrip_pre ?></p>
                            </div>
                            <div class="form-group container-fluid checkbox">

                                <input type="hidden" name="key" id="key" value="<?php echo $item; ?>">
                                <input type="hidden" name="idpreg<?php echo $item; ?>" id="idpreg<?php echo $item; ?>" value="<?php echo $pregunta->id_preg; ?>">
                                <input type="hidden" name="id_inscp" id="id_inscp" value="<?php echo $id_inscp; ?>">
                                <input type="hidden" name="exam" id="exam" value="<?php echo $idExam; ?>">
                                <input type="radio" name="rpta<?php echo $item; ?>" id="rpta<?php echo $item; ?>" value="<?php echo $pregunta->alter1; ?>" /><label><?php echo $pregunta->alter1; ?></label>
                                <input type="radio" name="rpta<?php echo $item; ?>" id="rpta<?php echo $item; ?>" value="<?php echo $pregunta->alter2; ?>" /><label><?php echo $pregunta->alter2; ?></label>
                                <input type="radio" name="rpta<?php echo $item; ?>" id="rpta<?php echo $item; ?>" value="<?php echo $pregunta->alter3; ?>" /><label><?php echo $pregunta->alter3; ?></label>
                                <input type="radio" name="rpta<?php echo $item; ?>" id="rpta<?php echo $item; ?>" value="<?php echo $pregunta->alter4; ?>" /><label><?php echo $pregunta->alter4; ?></label>
                            </div>
                            <?php
                        }
                        ?>
                        <input class="btn btn-primary" type="submit" value="Terminar" name="btnTerminar" onclick="return confirmarTerminadoExamen();">
                    </form>
                </div>



            </section>
            <?php
        }
        ?>



    </body>
</html>

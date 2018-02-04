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
    </head>
    <body>
        <header>
            <div class="container-fluid">
                <div class="row" >
                    <div class="col-md-9 col-lg-9">

                        <h2> <img id="logo" class="img-rounded" src="../img/logo.jpg"/> Aula Virtual</h2>
                    </div>

                </div>
                <div class="row" >
                    <div class="col-md-9 col-lg-9" >
                        <?php if ($_GET['msg'] == 1) { ?>
                            <div class="alert alert-info" role="alert">
                                <p>El registro al sistema a sido exitoso, sus datos se mandaron a su correo. Podra ver la informacion en su correo.</p>
                                <a class="btn btn-default" href="../index.php" >Regresar</a>
                            </div>
                        <?php } else {
                            if ($_GET['msg'] == 2) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <p>El registro no se pudo completar, intentelo denuevo.</p>
                                    <a class="btn btn-default" href="../index.php" >Regresar</a>
                                </div>
                                <?php } else {
                                if ($_GET['msg'] == 3) {
                                    ?>
                                    <div class="alert alert-info" role="alert">
                                        <p>Usted ya esta registrado en esta capacitacion. El usuario solo puede registrar una vez en una unica capacitacion</p>
                                        <a class="btn btn-default" href="../index.php" >Regresar</a>
                                    </div>
        <?php } else {
            if ($_GET['msg'] == 4) {
                ?>
                                        <div class="alert alert-info" role="alert">
                                            <p>El registro de una Capacitacion a sido exitoso, sus datos se mandaron a su correo. Podra ver la informacion en su correo.</p>
                                            <a class="btn btn-default" href="../index.php" >Regresar</a>
                                        </div>
                                        <?php
                                        } else{ if($_GET['msg'] == 5){
                                            ?>
                                            <div class="alert alert-danger" role="alert">
                                    <p>El registro a la capacitacion no se pudo realizar. Intento mas tarde.</p>
                                    <a class="btn btn-default" href="../index.php" >Regresar</a>
                                </div>
                                        <?php 
                                        
                                        }else{
                                            if ($_GET['msg'] == 6) {?>
                                                <div class="alert alert-danger" role="alert">
                                    <p>El usuario y password no son invalidos. Si vuelve a ocurrir el mismo error asegurece que este registrado en el sistema.</p>
                                    <a class="btn btn-default" href="../index.php#registrese" >Regresar</a>
                                            <?php
                                            
                                            }else{
                                                if($_GET['msg'] == 7){?>
                                                     <div class="alert alert-danger" role="alert">
                                    <p>El examen a sido enviado con exito. La calificacion fue automatica ya puede visualizar su nota.</p>
                                    <a class="btn btn-default" href="../index.php" >Regresar</a>
                                            <?php    }else{
                                                if($_GET['msg'] == 8){
                                                    ?>
                                                    <div class="alert alert-danger" role="alert">
                                    <p>El examen no se envio con exito. Intentolo mas tarde.</p>
                                    <a class="btn btn-default" href="../index.php" >Regresar</a>
                                                <?php
                                                
                                                }else{
                                                     if($_GET['msg'] == 9){?>
                                                          <div class="alert alert-danger" role="alert">
                                    <p>El examen ya ah sido dado. Este examen ah sido calificado</p>
                                    <a class="btn btn-default" href="../index.php" >Regresar</a>
                                                    <?php 
                                                    
                                                     }
                                                }
                                            }
                                            }
                                        }

                                        }

                                        }
                                        }
                                        }
                                        ?>



                    </div>

                </div>
            </div>
        </header>

    </body>
</html>

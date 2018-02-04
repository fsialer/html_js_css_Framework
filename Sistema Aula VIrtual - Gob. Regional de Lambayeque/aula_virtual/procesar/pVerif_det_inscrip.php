<?php
error_reporting(0);
ini_set('display_errors', 0);
include '../clases/datos_user.php';
include '../clases/grupo.php';
include '../clases/capacitacion.php.php';
include '../clases/inscripcion.php';



$txt_id_insc = $_GET['txt_id_inscrip'];
//echo $txt_id_insc;

$objinsc= new inscripcion();
$result4 = $objinsc->listarDetInscp($txt_id_insc);
foreach ($result4 as $inscripcion) {    
    echo "<dt>Capacitacion: </dt>";
    echo "<dd id='dd_nomCap'>$inscripcion->nom_cap</dd>
    <dt >Descripcion: </dt>
     <dd id='dd_desCap'> $inscripcion->descrip_cap</dd>
     <dt>Fecha Inicio: </dt>
     <dd id='dd_fechCap'> $inscripcion->fechaini_cap</dd>
     <dt>Fecha Final: </dt>
     <dd id='dd_fechFCap'> $inscripcion->fechafin_cap</dd>
     <dt>Grupo:  </dt>
     <dd id='gruCap'> $inscripcion->descp_grupo</dd>";
    }

?>

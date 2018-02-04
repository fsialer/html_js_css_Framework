<?php
error_reporting(0);
ini_set('display_errors', 0);

include '../clases/datos_user.php';
include '../clases/grupo.php';
include '../clases/capacitacion.php';


$txt_id_gru = $_GET['txt_id_gru'];
$txt_us=$_GET['txt_us'];
$objGrup = new grupo;
$result4 = $objGrup->listarDetCap($txt_us,$txt_id_gru);
foreach ($result4 as $grupo) {    
                                       echo "<input type='hidden' name='txt_us2' id='txt_us2' value='$txt_us'>"; 
    echo "<dt>Capacitacion: </dt>";
    echo "<dd id='dd_nomCap'>$grupo->nom_cap</dd>
    <dt >Descripcion: </dt>
     <dd id='dd_desCap'> $grupo->descrip_cap</dd>
     <dt>Fecha Inicio: </dt>
     <dd id='dd_fechCap'> $grupo->fechaini_cap</dd>
     <dt>Fecha Final: </dt>
     <dd id='dd_fechFCap'>$grupo->fechafin_cap</dd>
     <dt>Grupo:  </dt>
     <dd id='gruCap'> $grupo->descp_grupo</dd>";
    }

?>

<?php

include '../clases/inscripcion.php';
include '../clases/asistencia.php';
error_reporting(0);
ini_set('display_errors', 0);


$txt_id_insc = $_GET['txt_id_inscrip'];

$objAsist = new asistencia();
$result2 = $objAsist->listarAsistInscr($txt_id_insc);
$item = 0;
foreach ($result2 as $asistencia) {
    $item++;
    echo "<tr>  
<td id='td_id_cap_$item; ?>'> $item</td>
    <td  id='td_nom_cap_$item; '?>$asistencia->fecha_asistencia</td>
    <td id='td_desc_grup_$item'>$asistencia->abreviatura</td>                                       
</td>
</tr> 
";
}


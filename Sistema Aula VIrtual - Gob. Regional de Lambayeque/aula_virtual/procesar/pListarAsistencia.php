<?php

include '../clases/inscripcion.php';
include '../clases/asistencia.php';
error_reporting(0);
ini_set('display_errors', 0);
$txt_id_gru = $_GET['txt_id_gru'];
$objAsist = new asistencia();
$result2 = $objAsist->listarAsistencia($txt_id_gru);
$item = 0;
foreach ($result2 as $inscripcion) {
    $item++;
    echo "<tr>

    <input type='hidden' name='key_inscripcion$item' id='key_inscripcion$item' value=$inscripcion->id_inscripcion>
    <input type='hidden' name='item' id='item' value=$item>
<td id='td_id_cap_$item; ?>'> $item</td>
    <td  id='td_nom_cap_$item; '?>$inscripcion->nom_user $inscripcion->ape_user</td>
    <td id='td_desc_grup_$item'>
        <select class='form-control' name='cboEstado_Asist$item' > required autocomplete='off'";
    $result3 = $objAsist->listarEstadoAsist();
    foreach ($result3 as $estado_asistencia) {
        echo "<option value='$estado_asistencia->id_est_asist'>$estado_asistencia->abreviatura</option>";
    }
    echo "</select>
</td>                                       
</td>
</tr> 
";
}






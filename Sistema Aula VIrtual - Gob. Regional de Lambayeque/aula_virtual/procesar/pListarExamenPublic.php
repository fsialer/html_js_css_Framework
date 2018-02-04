<?php
include '../clases/examen.php';
error_reporting(0);
ini_set('display_errors', 0);

$txt_id_gru = $_GET['txt_id_gru'];

$objExamen = new examen();
$result3 = $objExamen->listar3($txt_id_gru);
$item = 0;

foreach ($result3 as $examen) {
    $item++;
    echo "<tr>
        <td id='td_key_examn_$item'>$examen->id_exam</td>
    <td id='td_nom_exam_$item'>$examen->nom_exam</td>
<td id='td_fecha_exam_$item'>$examen->fecha_exam</td>
    <td id='td_coment_exam_$item'>$examen->coment_exam</td>    
   <td id='td_tlimite_exam_$item'>$examen->tlimite_exam</td>
       <td id='td_id_texam_$item'>$examen->id_texam</td>
    <td>
        <a id='btnPublicar' href='./procesar/pDesarrollo.php?id=$examen->id_exam&id_gr=$txt_id_gru'>Desarrollo</a><span> / </span>
        <a id='btnActMat' data-toggle='tab' href='vistas#reg_exam' onclick='enviarExamen($item)'>Actualizar</a><span> / </span>
        <a  href='./procesar/pExamen.php?op=1&key2=$examen->id_exam'>Eliminar</a>
    </td>
</tr>";
}



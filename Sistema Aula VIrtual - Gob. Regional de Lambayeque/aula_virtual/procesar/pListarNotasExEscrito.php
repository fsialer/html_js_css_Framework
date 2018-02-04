<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
error_reporting(0);
ini_set('display_errors', 0);

include '../clases/examen.php';
include '../clases/evaluacion.php';


$txt_id_gru = $_GET['txt_id_gru'];

$objEva = new evaluacion();
$result3 = $objEva->listarNotasEscrito($txt_id_gru);
$item = 0;
foreach ($result3 as $evaluacion) {
    $item++;
    echo "
        <tr>             
<td id='td_id_eval$item'>$evaluacion->id_eval</td>
     <td id='td_nom_exam_$item'>$evaluacion->nom_user $evaluacion->ape_user</td>
         <input type='hidden' value='$evaluacion->id_inscripcion' id='td_id_inscripcion$item' name='td_id_inscripcion$item'>
    <td id='td_nom_exam_$item'>$evaluacion->nom_exam</td>
         <input type='hidden' value='$evaluacion->id_exam' id='td_id_exam$item' name='td_id_exam$item'>
   <td id='td_punto_eval_$item'>$evaluacion->punto_eval</td>   
<td>
        <a id='btnActPreg' data-toggle='tab' href='vistas#reg_nota' onclick='enviarNotas($item)'>Actualizar</a><span> / </span>
      
        ";?>

<a  href='./procesar/pValidarRpta.php?op=2&key2=<?php echo $evaluacion->id_eval;?>&id_gr=<?php echo $txt_id_gru;?>' onclick='return confirmarEliminar("Notas");'>Eliminar</a>
   <?php echo "</td>
</tr>";
}?>


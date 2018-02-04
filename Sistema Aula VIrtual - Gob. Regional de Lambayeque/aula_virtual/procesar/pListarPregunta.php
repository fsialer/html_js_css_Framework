<?php
error_reporting(0);
ini_set('display_errors', 0);
include '../clases/pregunta.php';


$txt_id_gru = $_GET['txt_id_gru'];

$objPreg = new pregunta();
$result = $objPreg->listar($txt_id_gru);
$item = 0;

foreach ($result as $pregunta) {
    $item++;
    echo "<tr>
        <td id='td_key_preg$item'>$pregunta->id_preg</td>   
   <td id='td_id_exam_$item'>$pregunta->id_exam</td>
        <td id='td_descrip_pre_$item'>$pregunta->descrip_pre</td>
    <td id='td_puntaje_$item'>$pregunta->puntaje</td>
    <td id='td_alter1_$item'>$pregunta->alter1</td>
   <td id='td_alter2_$item'>$pregunta->alter2</td>
   <td id='td_alter3_$item'>$pregunta->alter3</td>
   <td id='td_alter4_$item'>$pregunta->alter4</td>
   <td id='td_respta_$item'>$pregunta->respta</td>
    <td>
        <a id='btnActPreg' data-toggle='tab' href='vistas#reg_preg' onclick='enviarPregunta($item)'>Actualizar Pregunta</a><span> / </span>
        <a id='btnActRpta' data-toggle='tab' href='vistas#reg_alter' onclick='enviarRpta($item)'>Asignar Respuesta</a><span> / </span>
        ";?>

<a  href='./procesar/pPregunta.php?op=1&key2=<?php echo $pregunta->id_preg;?>&id_gr=<?php echo $txt_id_gru;?>' onclick='return confirmarEliminar("Pregunta");'>Eliminar</a>
   <?php echo "</td>
</tr>";
}?>


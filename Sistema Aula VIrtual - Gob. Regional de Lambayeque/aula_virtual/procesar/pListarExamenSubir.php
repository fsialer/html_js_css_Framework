<?php
include '../clases/examen_subir.php';
error_reporting(0);
ini_set('display_errors', 0);
$txt_id_gru = $_GET['txt_id_gru'];
$objEx_sub = new examen_subir();
$result3 = $objEx_sub ->listar($txt_id_gru);
$item = 0;
foreach ($result3 as $examen_subir) {
    $item++;
    echo "<tr>
        <td id='td_id_ex_s_$item'>$examen_subir->id_ex_s</td>
            <td id='td_id_exam_$item'>$examen_subir->id_exam</td>   
    <td id='td_archivo_$item'>$examen_subir->archivo</td>
    <td>
        <a id='btnActMat' data-toggle='tab' href='vistas#subir_exam' onclick='enviarExamensubir($item)'>Actualizar</a><span> / </span>
            ";?><a  href='./procesar/pSubirExamen.php?op=1&key2=<?php echo $examen_subir->id_ex_s;?>&id_gr=<?php echo $txt_id_gru;?>' onclick='return confirmarEliminar("Examen subido");'>Eliminar</a>
  <?php echo" </td>
</tr>";
}?>

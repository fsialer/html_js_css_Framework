<?php
include '../clases/asistencia.php';
error_reporting(0);
ini_set('display_errors', 0);

$fecha_ini = $_GET['fecha_ini'];
$fecha_fin=$_GET['fecha_fin'];
$objAsist = new asistencia();
$result3 = $objAsist ->cantidadAsis($fecha_ini, $fecha_fin);
$cant=  count($result3);
if ($cant>0) {
    $item = 0;
foreach ($result3 as $asistencia) {
    $item++;
    echo "<tr>     
        <td id='td_id_user_$item'>$item</td>
    <td id='td_nom_ape_$item'>$asistencia->nom_cap</td>
   <td id='td_tc_user_$item'>$asistencia->descp_grupo</td>
    <td id='td_dir_user_$item'>$asistencia->cantidad</td>           
            ";
echo "</tr>";
}


}  else {
    echo "<div class='alert alert-danger col-md-12 col-lg-12' role='alert'>No existe ningun Inscripcion con esas descripciones.</div>";
}


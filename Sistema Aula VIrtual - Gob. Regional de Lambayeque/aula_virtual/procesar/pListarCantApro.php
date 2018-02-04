<?php
include '../clases/evaluacion.php';
error_reporting(0);
ini_set('display_errors', 0);

$fecha_ini = $_GET['fecha_ini'];
$fecha_fin=$_GET['fecha_fin'];
$objEva = new evaluacion();
$result3 = $objEva ->cantAprobados($fecha_ini, $fecha_fin);
$cant=  count($result3);
if ($cant>0) {
    $item = 0;
foreach ($result3 as $evaluacion) {
    $item++;
    echo "<tr>     
        <td id='td_id_user_$item'>$item</td>
    <td id='td_nom_ape_$item'>$evaluacion->nom_cap</td>
   <td id='td_tc_user_$item'>$evaluacion->descp_grupo</td>
    <td id='td_dir_user_$item'>$evaluacion->cantidad</td>           
            ";
echo "</tr>";
}


}  else {
    echo "<div class='alert alert-danger col-md-12 col-lg-12' role='alert'>No existe ningun Inscripcion con esas descripciones.</div>";
}


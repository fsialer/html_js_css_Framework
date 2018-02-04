<?php

include '../clases/trabajo.php';
error_reporting(0);
ini_set('display_errors', 0);

$id_inscp = $_GET['id_inscp'];

$objTrabajo = new trabajo();
$result3 = $objTrabajo->listar($id_inscp);

$item = 0;
foreach ($result3 as $trabajo) {
    $item++;
    echo "<tr>
     
        <td id='td_id_trabajo_$item'>$trabajo->id_trabajo</td>
    <td id='td_nom_trabajo_$item'>$trabajo->nom_trabajo</td>
   <td id='td_arch_trabajo_$item'>$trabajo->arch_trabajo</td>
    <td id='td_fecha_trabajo_$item'>$trabajo->fecha_trabajo</td>
   
    <td>
        <a id='btnActMat' data-toggle='tab' href='vistas#reg_trab' onclick='enviarTrabajo($item)'>Actualizar</a><span> / </span>
        
            ";?><a href='./procesar/pTrabajo.php?op=1&key2=<?php echo $trabajo->id_trabajo;?>&file=<?php echo $trabajo->arch_trabajo;?>&id_insc=<?php echo $id_inscp;?>' onclick='return confirmarEliminar("Trabajo");'>Eliminar</a>
    
<?php echo "</td></tr>";
}?>

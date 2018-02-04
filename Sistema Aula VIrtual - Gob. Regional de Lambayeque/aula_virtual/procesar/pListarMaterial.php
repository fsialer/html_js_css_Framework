<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../clases/material.php';
error_reporting(0);
ini_set('display_errors', 0);

$txt_id_gru = $_GET['txt_id_gru'];

$objMaterial = new material();
$result3 = $objMaterial->listar($txt_id_gru);

$item = 0;
foreach ($result3 as $material) {
    $item++;
    echo "<tr>
     
        <td id='td_key_$item'>$material->id_mat</td>
    <td id='td_nom_mat_$item'>$material->nom_mat</td>
   <td id='td_arch_mat_$item'>$material->arch_mat</td>
    <td id='td_fecha_mat_$item'>$material->fecha_mat</td>
    <td id='td_coment_mat_$item'>$material->coment_mat</td>     
    <td>
        <a id='btnActMat' data-toggle='tab' href='vistas#reg_mat_did' onclick='enviarMaterial($item)'>Actualizar</a><span> / </span>
        
            ";?><a href='./procesar/pMaterial.php?op=1&key2=<?php echo $material->id_mat;?>&file=<?php echo $material->arch_mat;?>&id_grupo=<?php echo $txt_id_gru;?>' onclick='return confirmarEliminar("Material");'>Eliminar</a>
    
<?php echo "</td></tr>";
}?>
<!--//-->



<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
error_reporting(0);
ini_set('display_errors', 0);

include '../clases/material.php';

$txt_nom_cap = $_GET['txt_nom_cap'];
$txtDet_gr = $_GET['txtDet_gr'];
$objMaterial = new material();
$result3 = $objMaterial->listarMaterialIns($txt_nom_cap, $txtDet_gr);
$item = 0;

foreach ($result3 as $material) {
    $item++;
    echo "
        <tr>              
          
<td id='td_key_$item'>$material->id_mat</td>
    <td id='td_nom_mat_$item'>$material->nom_mat</td>
   <td id='td_arch_mat_$item'>$material->arch_mat</td>
    <td id='td_fecha_mat_$item'>$material->fecha_mat</td>
    
    <td>
             <a href='archivos/material/$material->arch_mat'>Descargar</a>
    </td>
    
</tr>";
}
//               <form role='form' method='POST' action='procesar/descargar.php' enctype='multipart/form-data' name='for_registrar'>
//<input type='hidden' value='$item' name='key' id='key'>                 
//<input type='hidden' value='$material->arch_mat' name='archiv$item' id='archiv$item'>
//        <input type='submit' name='btnDescargar' value='Descargar'>
//            </form>
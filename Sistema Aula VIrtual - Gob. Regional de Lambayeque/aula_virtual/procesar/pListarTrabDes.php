<?php

include '../clases/trabajo.php';
error_reporting(0);
ini_set('display_errors', 0);
$txt_id_gru=$_GET['txt_id_gru'];

$objTrabj = new trabajo();
$result3 = $objTrabj->listarTrabDesc($txt_id_gru);
$item = 0;
 
foreach ($result3 as $trabajo) {
    $item++;
    echo "
        <tr>      
        
       
<td id='td_key_$item'>$trabajo->id_trabajo</td>
      <td id='td_fecha_mat_$item'>$trabajo->nom_user $trabajo->ape_user</td>
    <td id='td_nom_mat_$item'>$trabajo->nom_trabajo</td>
   <td id='td_arch_mat_$item'>$trabajo->arch_trabajo</td>
    <td id='td_fecha_mat_$item'>$trabajo->fecha_trabajo</td>
      
    
    <td>
             <a href='archivos/actividad/$trabajo->arch_trabajo'>Descargar</a>
    </td>
    
</tr>";
}


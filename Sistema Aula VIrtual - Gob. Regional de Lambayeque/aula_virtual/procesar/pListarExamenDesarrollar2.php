<?php

error_reporting(0);
ini_set('display_errors', 0);

include '../clases/examen.php';

$txt_nom_cap = $_GET['txt_nom_cap'];
$txtDet_gr = $_GET['txtDet_gr'];
$objExamen = new examen();
$result3 = $objExamen->listarExamenDesa2($txt_nom_cap, $txtDet_gr);
$item = 0;
$us=$_GET['us'];
//  <input type='hidden' value='$examen->archivo' name='archiv$item' id='archiv$item'>
foreach ($result3 as $examen) {
    $item++;
    echo "
        <tr>     
<td id='td_key_$item'>$examen->id_exam</td>
    <td id='td_nom_exam_$item'>$examen->nom_exam</td>
   <td id='td_fecha_exam_$item'>$examen->fecha_exam</td>
    <td id='td_tlimite_exam_$item'>$examen->tlimite_exam</td>    
    <td>";  
    
         echo" <a href='archivos/examen/$examen->archivo'>Descargar</a>";
    
            
  echo"  </td>
    
</tr>";};


<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
error_reporting(0);
ini_set('display_errors', 0);

include '../clases/examen.php';

$txt_nom_cap = $_GET['txt_nom_cap'];
$txtDet_gr = $_GET['txtDet_gr'];
$objExamen = new examen();
$result3 = $objExamen->listarExamenDesa($txt_nom_cap, $txtDet_gr);
$us=$_GET['us'];
$item = 0;
$id_ins=$_GET['id_ins'];
//  <input type='hidden' value='$examen->archivo' name='archiv$item' id='archiv$item'>
foreach ($result3 as $examen) {
    $item++;
    echo "
        <tr>     
<td id='td_key_$item'>$examen->id_exam</td>
    <td id='td_nom_exam_$item'>$examen->nom_exam</td>
   <td id='td_fecha_exam_$item'>$examen->fecha_exam</td>
    <td id='td_tlimite_exam_$item'>$examen->tlimite_exam</td>    
    <td>";?>
    
<a href='vistas/vExamen.php?id_exam=<?php echo $examen->id_exam?>&nom_ex=<?php echo $examen->nom_exam?>&com_ex=<?php echo $examen->coment_exam ?>&id_inscp=<?php echo $id_ins ?>&us=<?php echo $us;?>' target='_blank' onclick="return confirmarExamen();">Comenzar</a>            
 <?php echo" </td>
    
</tr>";
}?>


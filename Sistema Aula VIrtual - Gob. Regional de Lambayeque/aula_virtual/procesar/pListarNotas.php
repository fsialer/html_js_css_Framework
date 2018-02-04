<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
error_reporting(0);
ini_set('display_errors', 0);

include '../clases/examen.php';
include '../clases/evaluacion.php';


$id_inscp = $_GET['id_inscp'];
$objEva = new evaluacion();
$result3 = $objEva->listarNotas($id_inscp);
$item = 0;
foreach ($result3 as $evaluacion) {
    $item++;
    echo "
        <tr>             
<td id='td_key_$item'>$item</td>
    <td id='td_nom_exam_$item'>$evaluacion->nom_exam</td>
   <td id='td_fecha_exam_$item'>$evaluacion->punto_eval</td>    
    
</tr>";
}



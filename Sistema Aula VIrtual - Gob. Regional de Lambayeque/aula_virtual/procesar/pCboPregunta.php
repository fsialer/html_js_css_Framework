<?php

include '../clases/pregunta.php';
error_reporting(0);
ini_set('display_errors', 0);

//$txt_id_cap = $_GET['txt_id_cap'];
$id_preg=$_GET['id_preg'];

//$txtDet_gr = $_GET['txtDet_gr'];
$objPreg = new pregunta();
$result3 = $objPreg->listarAlter($id_preg);
foreach ($result3 as $pregunta) {   
    echo "<option value='$pregunta->alter1'>$pregunta->alter1</option>";
    echo "<option value='$pregunta->alter2'>$pregunta->alter2</option>";
    echo "<option value='$pregunta->alter3'>$pregunta->alter3</option>";
    echo "<option value='$pregunta->alter4'>$pregunta->alter4</option>";
}


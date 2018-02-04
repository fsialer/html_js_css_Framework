<?php

include '../clases/examen.php';
error_reporting(0);
ini_set('display_errors', 0);

$txt_id_gru = $_GET['txt_id_gru'];

$objExamen = new examen();
$result3 = $objExamen->listar2($txt_id_gru);
foreach ($result3 as $examen) {   
    echo "<option value='$examen->id_exam'>$examen->nom_exam</option>";
}


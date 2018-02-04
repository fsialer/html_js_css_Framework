<?php

include '../clases/inscripcion.php';
//error_reporting(0);
//ini_set('display_errors', 0);

$txt_id_gru = $_GET['txt_id_gru'];

$objInscrip = new inscripcion();
$result3 = $objInscrip->cboInscrito($txt_id_gru);
foreach ($result3 as $inscripcion) {   
    echo "<option value='$inscripcion->id_inscripcion'>$inscripcion->nom_user $inscripcion->ape_user</option>";
}
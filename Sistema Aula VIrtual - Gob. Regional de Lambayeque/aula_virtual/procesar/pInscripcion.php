<?php

session_start();
error_reporting(0);
ini_set('display_errors', 0);
//if (!(isset($_SESSION['usuario']) && isset($_SESSION['clave']))) {
//    header("location:../index.php");
//    exit();
//}
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../clases/inscripcion.php';
include '../clases/asistencia.php';
include '../clases/grupo.php';




$op = $_GET['op'];
$key = $_POST[''];

$id_user = $_POST['id_user'];
echo "dsd".$id_user;
$rbtnGrupo = $_POST['rbtnGrupo'];
$objG=new grupo();
$result4=$objG->listar2($rbtnGrupo);
$id_cap2='';
foreach ($result4 as $grupo) {
    $id_cap2=$grupo->id_cap;
}
echo "$id_cap2";
$objInscripcion = new inscripcion($id_user, $rbtnGrupo, $key);
if ($op == 0) {
    $result2 = $objInscripcion->comprobarInscripcion($id_user,$id_cap2);
    $cant = count($result2);
    if ($cant > 0) {
        header("location:../vistas/mensajes.php?msg=3");
    } else {
        $result = $objInscripcion->guardar();
        $objGrupo = new grupo($horaini_grupo, $horafin_grupo, $fecha_grupo, $disp_grupo, $id_cap, $descp_grupo, $rbtnGrupo);
        $result2 = $objGrupo->DispGrupo();
        $result3 = $objInscripcion->listar();

        if ($result >0) {
            $objInscripcion->correo();
            header("location:../vistas/mensajes.php?msg=4");
        } else {
            header("location:../vistas/mensajes.php?msg=5");
        }
    }
}



<?php

session_start();
error_reporting(0);
ini_set('display_errors', 0);

include '../clases/asistencia.php';

$op = $_GET['op'];
if ($op == 0) {
    $txtFechaAsist2 = $_POST['txtFechaAsist'];
    $objAsist2 = new asistencia();
    $id_gr4=$_POST['id_gr4'];
    $result3 = $objAsist2->comprobarFecha($txtFechaAsist2);
    $cant = count($result3);
    if ($cant > 0) {
        $item = $_POST['item'];
        for ($index = 1; $index <= $item; $index++) {
            $key_inscripcion = $_POST['key_inscripcion' . $index];
            $cboEstado_Asist = $_POST['cboEstado_Asist' . $index];
            $txtFechaAsist = $_POST['txtFechaAsist'];
            $objAsist = new asistencia($key_inscripcion, $txtFechaAsist, $cboEstado_Asist, $index);
            $result = $objAsist->actualizar();
            if ($index == $item) {
                header("location:../index.php?alerta=1&alerta2=1&mensaje=1&id_gr=$id_gr4");
            }
        }
    } else {
        $item = $_POST['item'];
        for ($index = 1; $index <= $item; $index++) {
            $key_inscripcion = $_POST['key_inscripcion' . $index];
            $cboEstado_Asist = $_POST['cboEstado_Asist' . $index];
            $txtFechaAsist = $_POST['txtFechaAsist'];
            $objAsist = new asistencia($key_inscripcion, $txtFechaAsist, $cboEstado_Asist, $index);
            $result = $objAsist->guardar();
            if ($index == $item) {
                header("location:../index.php?alerta=1&alerta2=1&mensaje=1&id_gr=$id_gr4");
            }
        }
    }
}



//$objAsist = new asistencia($key_inscripcion,$txtFechaAsist,$cboEstado_Asist,$key_asistencia);
//if ($op == 0) {
//    $result=$objAsist->guardar();
//    if ($result>0) {        
//            header("location:../index.php");                   
//    }else{
//        header("location:../index.php");
//    }
//}
//if($op==1){
//    $result=$objCap->eliminar($key);
//    
//}

    
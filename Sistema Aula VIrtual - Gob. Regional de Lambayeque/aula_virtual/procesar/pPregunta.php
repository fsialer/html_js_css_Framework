<?php

session_start();
error_reporting(0);
ini_set('display_errors', 0);

include '../clases/pregunta.php';
$op = $_GET['op'];
$key_preg = $_POST['key_preg'];
$cboExamen = $_POST['cboExamen'];
$key_preg2 = $_POST['key_preg2'];

$key2 = $_GET['key2'];
$txtPreg = $_POST['txtPreg'];
$txtPuntaje = $_POST['txtPuntaje'];
$cboRpta = $_POST['cboRpta'];
$txtAlt1 = $_POST['txtAlt1'];
$txtAlt2 = $_POST['txtAlt2'];
$txtAlt3 = $_POST['txtAlt3'];
$txtAlt4 = $_POST['txtAlt4'];
$id_gr3 = $_POST['id_gr3'];

$objPreg = new pregunta($txtPreg, $cboExamen, $txtPuntaje, $txtAlt1, $txtAlt2, $txtAlt3, $txtAlt4, null, $key_preg);

if ($op == 0) {
    $result = $objPreg->guardar();
    if ($result > 0) {
        header("location:../index.php?alerta=1&alerta2=5&mensaje5=1&id_gr=$id_gr3");
    } else {
        header("location:../index.php?alerta=1&alerta2=5&mensaje5=2&id_gr=$id_gr3");
    }
}
$id_gr = $_GET['id_gr'];
if ($op == 1) {
    $result = $objPreg->eliminar($key2);
    if ($result > 0) {
        header("location:../index.php?alerta=1&alerta2=5&mensaje5=3&id_gr=$id_gr");
    } else {
        header("location:../index.php?alerta=1&alerta2=5&mensaje5=4&id_gr=$id_gr");
    }
}
$id_gr6=$_POST['id_gr6'];
if ($op == 2) {
//    echo $cboRpta;
    $objPreg2 = new pregunta(null, null, null, null, null, null, null, $cboRpta, $key_preg2);
    $result2 = $objPreg2->actualizar();
    if ($result2 > 0) {
        header("location:../index.php?alerta=1&alerta2=5&mensaje5=1&id_gr=$id_gr6");
    } else {
        header("location:../index.php?alerta=1&alerta2=5&mensaje5=2&id_gr=$id_gr6");
    }
}


<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
error_reporting(0);
ini_set('display_errors', 0);

include '../clases/examen.php';
$op = $_GET['op'];
$key_exam = $_POST['key_exam'];

$key2 = $_GET['key2'];
$txt_id_gru4 = $_POST['txt_id_gru4'];
$txtTLimite = $_POST['txtTLimite'];
$txtExam = $_POST['txtExam'];
$txtFechaExam = $_POST['txtFechaExam'];
$txtCom = $_POST['txtCom'];
$cbotipoExam=$_POST['cbotipoExam'];


$objExamen = new examen($txtExam, $txtFechaExam, $txtCom, $txt_id_gru4, $txtTLimite, $cbotipoExam,2, $key_exam);
if ($op == 0) {
    $result = $objExamen->guardar();
    if ($result > 0) {
        header("location:../index.php?alerta=1&alerta2=3&mensaje3=1&id_gr=$txt_id_gru4");
    } else {
        header("location:../index.php?alerta=1&alerta2=3&mensaje3=2&id_gr=$txt_id_gru4");
    }
}
$id_gr=$_GET['id_gr'];
if ($op == 1) {
    $result = $objExamen->eliminar($key2);
    if ($result > 0) {
        header("location:../index.php?alerta=1&alerta2=3&mensaje3=3&id_gr=$id_gr");
    } else {
        header("location:../index.php?alerta=1&alerta2=3&mensaje3=4&id_gr=$id_gr");
    }
}
?>

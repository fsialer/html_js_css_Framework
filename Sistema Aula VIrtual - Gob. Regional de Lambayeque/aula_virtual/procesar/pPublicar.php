<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
//error_reporting(0);
//ini_set('display_errors', 0);

include '../clases/examen.php';
$op = $_GET['op'];
$key_exam = $_GET['id'];

$id_gr=$_GET['id_gr'];
$txt_id_gru4 = null;
$txtTLimite = null;
$txtExam = null;
$txtFechaExam = null;
$txtCom = null;
$cbotipoExam = null;

$objExamen = new examen($txtExam, $txtFechaExam, $txtCom, $txt_id_gru4, $txtTLimite, $cbotipoExam, 1, $key_exam);
if ($op == 0) {
    $result = $objExamen->actualizar();
    if ($result > 0) {
        header("location:../index.php?alerta=1&alerta2=3&id_gr=$id_gr");
    } else {
        header("location:../index.php?alerta=1&alerta2=3&id_gr=$id_gr");
    }
}


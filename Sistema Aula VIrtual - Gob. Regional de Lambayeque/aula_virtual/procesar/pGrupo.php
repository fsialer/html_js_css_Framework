<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
error_reporting(0);
ini_set('display_errors', 0);

include '../clases/grupo.php';

$op = $_GET['op'];
$id = $_POST['key'];
$key = $_GET['key2'];
$de=$_GET['des'];
$id_grupo=$_POST['id_grupo'];
$horaini_grupo = $_POST['txtHoraI'];
$horafin_grupo = $_POST['txtHoraF'];
$fecha_grupo = $_POST['txtFecha'];
$disp_grupo = $_POST['txtDisp'];
$id_cap = $_POST['cboCap'];
$descp_grupo = $_POST['txtGrupo'];
$objGrup = new grupo($horaini_grupo, $horafin_grupo, $fecha_grupo, $disp_grupo, $id_cap, $descp_grupo,$id_grupo);
if ($op == 0) {
    $result = $objGrup->guardar();
    if ($result > 0) {
        header("location:../index.php?alert=4&mensaje4=1");
    } else {
        header("location:../index.php?alert=4&mensaje4=2");
    }
}
if ($op == 1) {
    $result = $objGrup->eliminar($key);
    if ($result > 0) {
        header("location:../index.php?alert=4&mensaje4=3");
    } else {
        header("location:../index.php?alert=4&mensaje4=4");
    }
}
if ($op == 2) {
    $result = $objGrup->actualizar();
    if ($result > 0) {
        header("location:../index.php?alert=4&mensaje4=1");
    } else {
        header("location:../index.php?alert=4&mensaje4=2");
    }
}


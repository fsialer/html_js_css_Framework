<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../clases/examen_subir.php';
error_reporting(0);
ini_set('display_errors', 0);
$op = $_GET['op'];
$key_examen_arch = $_POST['key_examen_arch'];
$key2 = $_GET['key2'];
$cboExam = $_POST['cboExamS'];

$file = $_GET['file'];
$txtArchivo = $_POST['txtArchivo'];
$id_gr2=$_POST['id_gr2'];


if ($op == 0) {
    if ($key_examen_arch) {
        $target_path = "../archivos/examen/";
        $nombre_archivo = $_FILES['archivo']['name'];
        $target_path = $target_path . basename($nombre_archivo);
        if (move_uploaded_file($_FILES['archivo']['tmp_name'], $target_path)) {
            unlink("../archivos/examen/$txtArchivo");
            rename("../archivos/examen/" . $nombre_archivo, "../archivos/examen/" . $txtArchivo);
            $objExam_s = new examen_subir($txtArchivo, $cboExam, $key_examen_arch);
            $result = $objExam_s->guardar();
            if ($result > 0) {
                header("location:../index.php?alerta=1&alerta2=4&mensaje4=1&id_gr=$id_gr2");
            } else {
                header("location:../index.php?alerta=1&alerta2=4&mensaje4=2&id_gr=$id_gr2");
            }
        } else {
            echo "Ha ocurrido un error, trate de nuevo!";
        }
    } else {
        $target_path = "../archivos/examen/";
        $nombre_archivo = $_FILES['archivo']['name'];
        $anio = date("y");
        $mes = date("m");
        $dia = date("d");
        $hora = date("H");
        $min = date("i");
        $seg = date("s");
        $nombre_cambiado = $anio . $mes . $dia . $hora . $min . $seg . $nombre_archivo;
        $target_path = $target_path . basename($nombre_archivo);
        if (move_uploaded_file($_FILES['archivo']['tmp_name'], $target_path)) {//  
            rename("../archivos/examen/" . $nombre_archivo, "../archivos/examen/" . $nombre_cambiado);
            $objExam_s = new examen_subir($nombre_cambiado, $cboExam, $key_examen_arch);
            $result = $objExam_s->guardar();
            if ($result > 0) {
                header("location:../index.php?alerta=1&alerta2=4&mensaje4=1&id_gr=$id_gr2");
            } else {
                header("location:../index.php?alerta=1&alerta2=4&mensaje4=2&id_gr=$id_gr2");
            }
        } else {
            echo "Ha ocurrido un error, trate de nuevo!";
        }
    }
}
$id_gr=$_GET['id_gr'];
if ($op == 1) {
    $objExam_s = new examen_subir();
    $result = $objExam_s->eliminar($key2);
    unlink("../archivos/examen/$file");
    if ($result > 0) {
        header("location:../index.php?alerta=1&alerta2=4&mensaje4=3&id_gr=$id_gr");
    } else {
        header("location:../index.php?alerta=1&alerta2=4&mensaje4=4&id_gr=$id_gr");
    }
}


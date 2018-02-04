<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../clases/material.php';
error_reporting(0);
ini_set('display_errors', 0);
$op = $_GET['op'];
$key_material = $_POST['key_material'];
$txt_id_gru2 = $_POST['txt_id_gru2'];
$key2=$_GET['key2'];
$txtMate = $_POST['txtMat'];
$file=$_GET['file'];
$txtFile=$_POST['txtFile'];
$txtFechaMat = $_POST['txtFechaMat'];
$txtComent = $_POST['txtComent'];
$id_mat = $_POST['key_material'];
if ($op == 0) {
    if ($id_mat) {
        $target_path = "../archivos/material/";
        $nombre_archivo = $_FILES['txtArch']['name'];        
        $target_path = $target_path . basename($nombre_archivo);
        if (move_uploaded_file($_FILES['txtArch']['tmp_name'], $target_path)) {
            unlink("../archivos/material/$txtFile");
            rename("../archivos/material/" . $nombre_archivo, "../archivos/material/" . $txtFile);
            $objMaterial = new material($txtMate, $txtFile, $txtFechaMat, $txtComent,$txt_id_gru2, $id_mat);
            $result = $objMaterial->guardar();
            if ($result > 0) {
                header("location:../index.php?alerta=1&alerta2=2&mensaje2=1&id_gr=$txt_id_gru2");
            } else {
                header("location:../index.php=alerta=1&alerta2=2&mensaje2=2&id_gr=$txt_id_gru2");
            }
        } else {
            echo "Ha ocurrido un error, trate de nuevo!";
        }

    } else {
        $target_path = "../archivos/material/";
        $nombre_archivo = $_FILES['txtArch']['name'];
        $anio = date("y");
        $mes = date("m");
        $dia = date("d");
        $hora = date("H");
        $min = date("i");
        $seg = date("s");
        $nombre_cambiado = $anio . $mes . $dia . $hora . $min . $seg . $nombre_archivo;
        $target_path = $target_path . basename($nombre_archivo);
        if (move_uploaded_file($_FILES['txtArch']['tmp_name'], $target_path)) {
//  
            rename("../archivos/material/" . $nombre_archivo, "../archivos/material/" . $nombre_cambiado);
            $objMaterial = new material($txtMate, $nombre_cambiado, $txtFechaMat, $txtComent,$txt_id_gru2, $id_mat);
            $result = $objMaterial->guardar();
            if ($result > 0) {
                header("location:../index.php?alerta=1&alerta2=2&mensaje2=1&id_gr=$txt_id_gru2");
            } else {
                header("location:../index.phpalerta=1&alerta2=2&mensaje2=2&id_gr=$txt_id_gru2");
            }
        } else {
            echo "Ha ocurrido un error, trate de nuevo!";
        }
    }
}
$id_gr=$_GET['id_grupo'];
if ($op==1) {
     $objMaterial = new material();
        $result = $objMaterial->eliminar($key2);
        unlink("../archivos/material/$file");
    if ($result > 0) {
        header("location:../index.php?alerta=1&alerta2=2&mensaje2=3&id_gr=$id_gr");
    } else {
        header("location:../index.php?alerta=1&alerta2=2&mensaje2=4&id_gr=$id_gr");
    }
}

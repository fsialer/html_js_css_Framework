<?php

include '../clases/trabajo.php';
error_reporting(0);
ini_set('display_errors', 0);
$op = $_GET['op'];

$txt_inscrp = $_POST['txt_inscrp'];
$key2=$_GET['key2'];
$txtTrab = $_POST['txtTrab'];
$file=$_GET['file'];
$txtFile=$_POST['txtFile'];
$txtFechaTrab = $_POST['txtFechaTrab'];

$key_trabajo = $_POST['key_trabajo'];
if ($op == 0) {
    if ($key_trabajo) {
        $target_path = "../archivos/actividad/";
        $nombre_archivo = $_FILES['txtArch']['name'];        
        $target_path = $target_path . basename($nombre_archivo);
        if (move_uploaded_file($_FILES['txtArch']['tmp_name'], $target_path)) {
            unlink("../archivos/actividad/$txtFile");
            rename("../archivos/actividad/" . $nombre_archivo, "../archivos/actividad/" . $txtFile);
            $objTrabajo = new trabajo($txtTrab, $txtFile, $txtFechaTrab,$txt_inscrp,$key_trabajo);
            $result = $objTrabajo->guardar();
            if ($result > 0) {
                header("location:../index.php");
            } else {
                header("location:../index.php");
            }
        } else {
            echo "Ha ocurrido un error, trate de nuevo!";
        }

    } else {
        $target_path = "../archivos/actividad/";
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
            rename("../archivos/actividad/" . $nombre_archivo, "../archivos/actividad/" . $nombre_cambiado);
            $objTrabajo = new trabajo($txtTrab, $nombre_cambiado, $txtFechaTrab,$txt_inscrp,$key_trabajo);
            $result = $objTrabajo->guardar();
            if ($result > 0) {
                header("location:../index.php");
            } else {
                header("location:../index.php");
            }
        } else {
            echo "Ha ocurrido un error, trate de nuevo!";
        }
    }
}

if ($op==1) {
      $objTrabajo = new trabajo();
        $result = $objTrabajo->eliminar($key2);
        unlink("../archivos/actividad/$file");
    if ($result > 0) {
        header("location:../index.php");
    } else {
        header("location:../index.php");
    }
}


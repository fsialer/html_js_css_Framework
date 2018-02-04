<?php

session_start();
error_reporting(0);
ini_set('display_errors', 0);
include '../clases/capacitacion.php';
$op = $_GET['op'];
$id = $_POST['key'];
$key = $_GET['key2'];
$aviso=$_POST['aviso'];
$cap = $_POST['txtCapacitacion'];
$id_pub=$_POST['id_pub'];
$lugar = $_POST['txtLugar'];
$fechi = $_POST['txtFechaI'];
$fechf = $_POST['txtFechaF'];
$descp = $_POST['txtDescp'];
$doc = $_POST['cboDoc'];
$capMin = $_POST['txtCapMin'];
$capMax = $_POST['txtCapMax'];
$objCap = new capacitacion($cap, $lugar, $fechi, $fechf,$descp,$doc,$id_pub,$id);
if ($op == 0) {
    $result=$objCap->guardar();
    if ($result>0) {        
            header("location:../index.php?alert=3&mensaje3=1");                   
    }else{
        header("location:../index.php?alert=3&mensaje3=2");
    }
}
if($op==1){
    $result=$objCap->eliminar($key);
    if ($result > 0) {

       header("location:../index.php?alert=3&mensaje3=3");
    } else {

        header("location:../index.php?alert=3&mensaje3=4");
    }
}


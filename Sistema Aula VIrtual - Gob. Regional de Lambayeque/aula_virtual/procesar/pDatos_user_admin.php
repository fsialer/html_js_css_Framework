<?php

session_start();
error_reporting(0);
ini_set('display_errors', 0);
//if (!(isset($_SESSION['usuario']) && isset($_SESSION['clave']))) {
//    header("location:../index.php");
//    exit();
//}
include '../clases/datos_user.php';
$op = $_GET['op'];
$id_user = $_POST['key4'];
$key = $_GET['key3'];
$nom_user = $_POST['txtNombre2'];
$ape_user = $_POST['txtApellido2'];
$dir_user = $_POST['txtDireccion2'];
$tc_user = $_POST['txtTelefono2'];
$email_user = $_POST['txtEmail2'];
$id_sexo = $_POST['cboSexo2'];
$dni_user = $_POST['txtDNI2'];
$clave_user = $_POST['txtClave2'];
$id_tuser = $_GET['tip'];
$objDatos_user = new datos_user($nom_user, $ape_user, $dir_user, $tc_user, $email_user, $id_sexo, $dni_user, $clave_user, $id_tuser, $id_user);
if ($op == 0) {
    $result = $objDatos_user->guardar();
    if ($result > 0) {               
        header("location:../index.php?alert=1&mensaje=1");        
    } else {                
        header("location:../index.php?alert=1&mensaje=2");
    }
}
if ($op == 2) {
    $result = $objDatos_user->eliminar($key);
    if ($result > 0) {
       header("location:../index.php?alert=1&mensaje=3");
    } else {

        header("location:../index.php?alert=1&mensaje=4");
    }
}

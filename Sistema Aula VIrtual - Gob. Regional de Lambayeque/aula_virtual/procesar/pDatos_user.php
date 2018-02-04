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
$id_user = $_POST['key'];
$key = $_GET['key2'];
$nom_user = $_POST['txtNombre'];
$ape_user = $_POST['txtApellido'];
$dir_user = $_POST['txtDireccion'];
$tc_user = $_POST['txtTelefono'];
$email_user = $_POST['txtEmail'];
$id_sexo = $_POST['cboSexo'];
$dni_user = $_POST['txtDNI'];
$clave_user = $_POST['txtClave'];
$id_tuser = $_GET['tip'];
$objDatos_user = new datos_user($nom_user, $ape_user, $dir_user, $tc_user, $email_user, $id_sexo, $dni_user, $clave_user, $id_tuser, $id_user);
if ($op == 0) {
    $result = $objDatos_user->guardar();
    if ($id_tuser == 2) {
        if ($result > 0) {
            $objDatos_user->correo();
            header("location:../vistas/mensajes.php?msg=1");
        } else {
            header("location:../vistas/mensajes.php?msg=2");
        }
    }
    if ($id_tuser == 3) {
        if ($result > 0) {
            header("location:../index.php?alert=2&mensaje2=1");
        } else {
            header("location:../index.php?alert=2&mensaje2=2");
        }
    }
}
if ($op == 1) {
    $result = $objDatos_user->verificarUsuario();
    foreach ($result as $datos_user) {
        if ($dni_user === $datos_user->dni_user && $clave_user === $datos_user->clave_user) {
            $_SESSION['usuario'] = $datos_user->dni_user;
            $_SESSION['clave'] = $datos_user->clave_user;
            header("location:../index.php");
            exit();
        } else {
            header("location:../vistas/mensajes.php?msg=6");
        }
    }
}
if ($op == 2) {
    $result = $objDatos_user->eliminar($key);
    if ($result > 0) {
        header("location:../index.php?alert=2&mensaje2=3");
    } else {
        header("location:../index.php?alert=2&mensaje2=4");
    }
}



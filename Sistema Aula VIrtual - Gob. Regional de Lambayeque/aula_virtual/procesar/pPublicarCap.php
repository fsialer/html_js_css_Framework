<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//error_reporting(0);
//ini_set('display_errors', 0);

session_start();
error_reporting(0);
ini_set('display_errors', 0);
include '../clases/capacitacion.php';
$op = $_GET['op'];
$id = $_POST['key'];
$key = $_GET['key2'];
$aviso = $_POST['aviso'];
$cap = null;
$id_pub = 1;
$lugar = null;
$fechi = null;
$fechf = null;
$descp = null;
$doc = null;
$id_cap = $_GET['id_cap'];
$objCap = new capacitacion($cap, $lugar, $fechi, $fechf, $descp, $doc, $id_pub, $id_cap);
$result = $objCap->publicarCap();
if ($result > 0) {
    header("location:../index.php?alert=3");
} else {
    header("location:../index.php?alert=3");
}



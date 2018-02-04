<?php
$key=$_POST['key'];
$archiv=$_POST['archiv'.$key];
$file=file("../archivos/materia/$archiv");
$file2=  implode("",$file);
header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=$archiv");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


<?php
include '../clases/asistencia.php';
include '../fpdf/reporte_usuarios.php';
error_reporting(0);
ini_set('display_errors', 0);

$fecha_ini = $_GET['fecha_ini'];
$fecha_fin=$_GET['fecha_fin'];
$objAsist = new asistencia();
$result3 = $objAsist ->cantidadAsis($fecha_ini, $fecha_fin);
$tipo=4;
$descripcion=array($fecha_ini,$fecha_fin);
$cabeceraTabla=array("Codigo","Nombre de la Capacitacion","Grupo","Cantidad");
$pdf = new PDF();
$title = 'Mostramos un archivo txt';
$pdf->SetTitle($title);
$titulo="Reporte: Cantidad de Asistencia por grupo realizadas por Fecha";
$pdf->SetY(65);
$pdf->Imprimir($result3,$cabeceraTabla, $titulo,$tipo,$descripcion);
$pdf->Output();


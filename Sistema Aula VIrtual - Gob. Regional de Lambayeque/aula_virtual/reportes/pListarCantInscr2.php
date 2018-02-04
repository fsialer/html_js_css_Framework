<?php
include '../clases/inscripcion.php';
include '../fpdf/reporte_usuarios.php';
error_reporting(0);
ini_set('display_errors', 0);

$fecha_ini = $_GET['fecha_ini'];
$fecha_fin=$_GET['fecha_fin'];
$objinscrip = new inscripcion();
$result3 = $objinscrip ->cantidadInscrito($fecha_ini, $fecha_fin);
$tipo=3;
$descripcion=array($fecha_ini,$fecha_fin);
$cabeceraTabla=array("Codigo","Nombre de la Capacitacion","Grupo","Cantidad");
$pdf = new PDF();
$title = 'Mostramos un archivo txt';
$pdf->SetTitle($title);
$titulo="Reporte: Cantidad de inscripcion realizadas por Fecha";
$pdf->SetY(65);
$pdf->Imprimir($result3,$cabeceraTabla, $titulo,$tipo,$descripcion);
$pdf->Output();
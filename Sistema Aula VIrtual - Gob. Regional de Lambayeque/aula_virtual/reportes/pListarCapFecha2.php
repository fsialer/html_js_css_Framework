<?php
include '../clases/grupo.php';
include '../fpdf/reporte_usuarios.php';
error_reporting(0);
ini_set('display_errors', 0);

$fecha_ini = $_GET['fecha_ini'];
$fecha_fin=$_GET['fecha_fin'];
$objGrupo = new grupo();
$result3 = $objGrupo ->listarCapFecha($fecha_ini, $fecha_fin);
$tipo=2;
$descripcion=array($fecha_ini,$fecha_fin);
$cabeceraTabla=array("Codigo","Nombre de la Capacitacion","Grupo","Docente");
$pdf = new PDF();
$title = 'Mostramos un archivo txt';
$pdf->SetTitle($title);
$titulo="Reporte: Capacitacion Registradas por intervalos de Fecha";
$pdf->SetY(65);
$pdf->Imprimir($result3,$cabeceraTabla, $titulo,$tipo,$descripcion);
$pdf->Output();


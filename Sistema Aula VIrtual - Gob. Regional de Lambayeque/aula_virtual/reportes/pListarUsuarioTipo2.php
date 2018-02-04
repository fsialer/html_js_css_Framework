<?php

include '../clases/datos_user.php';
include '../fpdf/reporte_usuarios.php';
error_reporting(0);
ini_set('display_errors', 0);
$id_tipo = $_GET['id_tipo'];
$id_sexo = $_GET['id_sexo'];
$objDatosUser = new datos_user();
$result3 = $objDatosUser->listarUsuarioTipo($id_tipo, $id_sexo);
$tipo=1;
$cabeceraTabla=array("Codigo","Nombre Completo","Telefono","Direccion","DNI","Email");
$pdf = new PDF();
$title = 'Mostramos un archivo txt';
$pdf->SetTitle($title);
$titulo="Reporte: Usuarios Clasificados por Tipo de usuario y Sexo";
$pdf->SetY(65);
$pdf->Imprimir($result3,$cabeceraTabla, $titulo,$tipo,null);
$pdf->Output();



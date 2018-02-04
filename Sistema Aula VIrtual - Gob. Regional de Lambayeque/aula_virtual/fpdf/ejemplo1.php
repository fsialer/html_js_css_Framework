<?php

// para utilizar la librería
define('FPDF_FONTPATH','font/');
require_once('fpdf.php');

//Creación del objeto de la clase heredada
$pdf=new FPDF();
$pdf->AliasNbPages();
$pdf->AddPage();

//Comenzamos a escribir el PDF:
$pdf->SetFont('Arial','B',02); //<-- Tipo de letra arial, Bold, tamaño 20
$pdf->SetTitle(8,"pagina de prueba");
$pdf->write(8,"Hola mundo");  // <-- Cadena a escribir

//Terminamos el PDF y lo mandamos a la pantalla
$pdf->Output();


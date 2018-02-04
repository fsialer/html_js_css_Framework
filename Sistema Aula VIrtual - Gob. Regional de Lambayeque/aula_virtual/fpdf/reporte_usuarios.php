<?php

require('../fpdf/fpdf.php');

class PDF extends FPDF {

    function Header() {
        $this->Image('../img/logo.jpg', 10, 8, 15);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'GOBIERNO REGIONAL DE LAMBAYEQUE', 0, 0, 'C');
    }

    function Footer() {
        $this->SetY(-10);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, '1' . $this->PageNo() . '', 0, 0, 'C');
    }

    function TituloArchivo($label) {
        $this->SetY(55);
//Arial 12
        $this->SetFont('Arial', '', 12);
//Color de fondo
        $this->SetFillColor(200, 220, 255);
//Título
        $this->Cell(0, 6, "$label", 0, 1, 'L', true);
//Salto de línea
        $this->Ln(4);
    }

    function CuerpoArchivo($file) {
//Leemos el fichero
        $f = fopen($file, 'r');
        $txt = fread($f, filesize($file));
        fclose($f);
//Times 12
        $this->SetFont('Times', '', 12);
//Imprimimos el texto justificado
        $this->MultiCell(0, 5, $txt);
//Salto de línea
        $this->Ln();
    }

//    function ImprimirArchivo($num, $title, $file) {
//        $this->AddPage();
//        $this->TituloArchivo($num, $title);
//        $this->CuerpoArchivo($file);
//        
//    }
    function Imprimir($result, $colum, $titulo, $tipo, $descripcion) {
        $this->AddPage();
        $this->TituloArchivo($titulo);
        $this->columnas($colum, $tipo, $descripcion);
        $this->tabla($result, $tipo);
    }

    function columnas($colum, $tipo, $descripcion) {

        if ($tipo == 1) {
            $this->SetFont("Arial", "B", 10);
            $this->Cell(20, 5, $colum[0], 1, 0, 'C', true);
            $this->Cell(50, 5, $colum[1], 1, 0, 'C', true);
            $this->Cell(20, 5, $colum[2], 1, 0, 'C', true);
            $this->Cell(30, 5, $colum[3], 1, 0, 'C', true);
            $this->Cell(25, 5, $colum[4], 1, 0, 'C', true);
            $this->Cell(50, 5, $colum[5], 1, 0, 'C', true);
        }
        if ($tipo == 2) {
            $this->SetY(60);
//Arial 12
            $this->SetFont("Arial", "B", 10);
//Color de fondo
//Título
            $this->Cell(0, 6, "Descripcion: Se filtro los datos en las fechas de $descripcion[0] a $descripcion[1] .", 0, 1, 'L', true);
//Salto de línea
            $this->Ln(4);

            $this->Cell(20, 5, $colum[0], 1, 0, 'C', true);
            $this->Cell(50, 5, $colum[1], 1, 0, 'C', true);
            $this->Cell(40, 5, $colum[2], 1, 0, 'C', true);
            $this->Cell(60, 5, $colum[3], 1, 0, 'C', true);
        }
        if ($tipo == 3) {
            $this->SetY(60);
//Arial 12
            $this->SetFont("Arial", "B", 10);
//Color de fondo
//Título
            $this->Cell(0, 6, "Descripcion: Se filtro los datos en las fechas de $descripcion[0] a $descripcion[1] .", 0, 1, 'L', true);
//Salto de línea
            $this->Ln(4);

            $this->Cell(20, 5, $colum[0], 1, 0, 'C', true);
            $this->Cell(50, 5, $colum[1], 1, 0, 'C', true);
            $this->Cell(40, 5, $colum[2], 1, 0, 'C', true);
            $this->Cell(60, 5, $colum[3], 1, 0, 'C', true);
        }
        if ($tipo == 4) {
            $this->SetY(60);
//Arial 12
            $this->SetFont("Arial", "B", 10);
//Color de fondo
//Título
            $this->Cell(0, 6, "Descripcion: Se filtro los datos en las fechas de $descripcion[0] a $descripcion[1] .", 0, 1, 'L', true);
//Salto de línea
            $this->Ln(4);

            $this->Cell(20, 5, $colum[0], 1, 0, 'C', true);
            $this->Cell(50, 5, $colum[1], 1, 0, 'C', true);
            $this->Cell(40, 5, $colum[2], 1, 0, 'C', true);
            $this->Cell(60, 5, $colum[3], 1, 0, 'C', true);
        }
        if ($tipo == 5) {
            $this->SetY(60);
//Arial 12
            $this->SetFont("Arial", "B", 10);
//Color de fondo
//Título
            $this->Cell(0, 6, "Descripcion: Se filtro los datos en las fechas de $descripcion[0] a $descripcion[1] .", 0, 1, 'L', true);
//Salto de línea
            $this->Ln(4);

            $this->Cell(20, 5, $colum[0], 1, 0, 'C', true);
            $this->Cell(50, 5, $colum[1], 1, 0, 'C', true);
            $this->Cell(40, 5, $colum[2], 1, 0, 'C', true);
            $this->Cell(60, 5, $colum[3], 1, 0, 'C', true);
        }

        $this->Ln();
    }

    function tabla($result, $tipo) {
        if ($tipo == 1) {
            include '../clases/datos_user.php';
            foreach ($result as $datos_user) {
                $this->SetFont("Arial", "B", 10);
                $this->Cell(20, 5, $datos_user->id_user, 1, 0, 'C', true);
                $dato = $datos_user->nom_user . " " . $datos_user->ape_user;
                $this->Cell(50, 5, $dato, 1, 0, 'C', true);
                $this->Cell(20, 5, $datos_user->tc_user, 1, 0, 'C', true);
                $this->Cell(30, 5, $datos_user->dir_user, 1, 0, 'C', true);
                $this->Cell(25, 5, $datos_user->dni_user, 1, 0, 'C', true);
                $this->Cell(50, 5, $datos_user->email_user, 1, 0, 'C', true);
                $this->Ln();
            }
        }
        if ($tipo == 2) {
            include '../clases/grupo.php';
            foreach ($result as $grupo) {
                $this->SetFont("Arial", "B", 10);
                $this->Cell(20, 5, $grupo->id_grupo, 1, 0, 'C', true);
                $this->Cell(50, 5, $grupo->nom_cap, 1, 0, 'C', true);
                $this->Cell(40, 5, $grupo->descp_grupo, 1, 0, 'C', true);
                $doc = $grupo->nom_user . " " . $grupo->ape_user;
                $this->Cell(60, 5, $doc, 1, 0, 'C', true);
                $this->Ln();
            }
        }
        if ($tipo == 3) {
            include '../clases/inscripcion.php';
            $i = 0;
            foreach ($result as $inscripcion) {
                $i++;
                $this->SetFont("Arial", "B", 10);
                $this->Cell(20, 5, $i, 1, 0, 'C', true);
                $this->Cell(50, 5, $inscripcion->nom_cap, 1, 0, 'C', true);
                $this->Cell(40, 5, $inscripcion->descp_grupo, 1, 0, 'C', true);
                $this->Cell(60, 5, $inscripcion->cantidad, 1, 0, 'C', true);
                $this->Ln();
            }
        }
        if ($tipo == 4) {
            include '../clases/asistencia.php';
            $i = 0;
            foreach ($result as $asistencia) {
                $i++;
                $this->SetFont("Arial", "B", 10);
                $this->Cell(20, 5, $i, 1, 0, 'C', true);
                $this->Cell(50, 5, $asistencia->nom_cap, 1, 0, 'C', true);
                $this->Cell(40, 5, $asistencia->descp_grupo, 1, 0, 'C', true);
                $this->Cell(60, 5, $asistencia->cantidad, 1, 0, 'C', true);
                $this->Ln();
            }
        }
        if ($tipo == 5) {
            include '../clases/evaluacion.php';
            $i = 0;
            foreach ($result as $evaluacion) {
                $i++;
                $this->SetFont("Arial", "B", 10);
                $this->Cell(20, 5, $i, 1, 0, 'C', true);
                $this->Cell(50, 5, $evaluacion->nom_cap, 1, 0, 'C', true);
                $this->Cell(40, 5, $evaluacion->descp_grupo, 1, 0, 'C', true);
                $this->Cell(60, 5, $evaluacion->cantidad, 1, 0, 'C', true);
                $this->Ln();
            }
        }
    }

}

//$pdf = new PDF();
//$title = 'Mostramos un archivo txt';
//$pdf->SetTitle($title);
//$pdf->SetY(65);
//$pdf->ImprimirArchivo(1, 'Archivo de prueba ', 'license.txt');
//$pdf->ImprimirArchivo(2, 'Otro archivo', 'install.txt');
//$pdf->Output();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


<?php
require("FPDF/fpdf.php");
require("../Modelo/m_poliza.php");
$a = new Poliza();
$datos = $a->Reporte($_GET["Nombre"], $_GET["Desde"], $_GET["Hasta"]);

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->SetY(30);
$pdf->SetX(190); // Ajustar la posición X según tus necesidades
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, 'Reporte de: ' .$_GET["Nombre"], 0, 1, 'R');
$pdf->Cell(0, 10, 'Desde: ' . date("d-m-Y", strtotime($_GET["Desde"])), 0, 1, 'R');
$pdf->Cell(0, 10, 'Hasta: ' . date("d-m-Y", strtotime($_GET["Hasta"])), 0, 1, 'R');
$pdf->Ln(10); // Salto de línea



$pdf->Output();
?>

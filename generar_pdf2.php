<?php
require_once('vendor/setasign/fpdf/fpdf.php');

// Obtener los códigos internos desde el formulario
$codigosInternos = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['codigos'])) {
    $rawInput = $_POST['codigos'];
    $lines = explode("\n", $rawInput);
    foreach ($lines as $line) {
        $codigo = trim($line);
        if (!empty($codigo)) {
            $codigosInternos[] = $codigo;
        }
    }
} else {
    die("No se recibieron códigos.");
}

// Crear PDF
$pdf = new FPDF('P', 'mm', 'Letter');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 20); // Texto un poco más pequeño para que quepa

$labelsPerRow = 4;
$labelsPerCol = 20;
$labelsPerPage = $labelsPerRow * $labelsPerCol;

$pageWidth = 215.9; // Letter width in mm
$pageHeight = 279.4; // Letter height in mm

$marginX = 5;
$marginY = 5;

$usableWidth = $pageWidth - (2 * $marginX);
$usableHeight = $pageHeight - (2 * $marginY);

$labelWidth = $usableWidth / $labelsPerRow;
$labelHeight = $usableHeight / $labelsPerCol;

foreach ($codigosInternos as $index => $codigo) {
    if ($index > 0 && $index % $labelsPerPage == 0) {
        $pdf->AddPage();
    }

    $localIndex = $index % $labelsPerPage;
    $row = floor($localIndex / $labelsPerRow);
    $col = $localIndex % $labelsPerRow;

    $x = $marginX + ($col * $labelWidth);
    $y = $marginY + ($row * $labelHeight);

    $pdf->SetXY($x, $y + ($labelHeight / 2) - 3); // Centrar verticalmente
    $pdf->Cell($labelWidth, 6, $codigo, 0, 0, 'C');
}

$pdf->Output("I", "etiquetas_texto_4x20.pdf");

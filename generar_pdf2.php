<?php
require_once('vendor/setasign/fpdf/fpdf.php');

class PDF extends FPDF {
    function Header() {}
    function Footer() {}
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['codigos'])) {
    $rawInput = $_POST['codigos'];
    $lines = explode("\n", trim($rawInput));

    $pdf = new PDF('P', 'mm', 'Letter');
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 25);

    $xStart = 5;
    $yStart = 5;
    $cellWidth = 51.475; // (215.9 - 10) / 4
    $cellHeight = 13.72; // (279.4 - 10) / 20
    $perRow = 4;
    $perCol = 20;

    $row = 0;
    $col = 0;

    foreach ($lines as $index => $line) {
        $codigo = trim($line);
        if (empty($codigo)) continue;

        $x = $xStart + $col * $cellWidth;
        $y = $yStart + $row * $cellHeight;

        $pdf->SetXY($x, $y + ($cellHeight / 2) - 4);
        $pdf->Cell($cellWidth, 8, $codigo, 0, 0, 'C');

        $col++;
        if ($col >= $perRow) {
            $col = 0;
            $row++;
            if ($row >= $perCol-2) {
                $pdf->AddPage();
                $row = 0;
            }
        }
    }

    $pdf->Output('I', 'etiquetas_texto_4x20.pdf');
    exit;
} else {
    die("No se recibieron códigos.");
}

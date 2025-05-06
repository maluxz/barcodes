<?php
ob_start(); // iniciar buffer

require 'vendor/autoload.php';

use Picqer\Barcode\BarcodeGeneratorPNG;

class PDF extends \FPDF {
    function Header() {}
    function Footer() {}
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = $_POST['datos'];
    $lines = explode("\n", trim($input));

    $generator = new BarcodeGeneratorPNG();
    $pdf = new PDF('P', 'mm', 'Letter');
    $pdf->AddPage();
    $pdf->SetFont('Arial', '', 10);

    $xStart = 10;
    $yStart = 10;
    $cellWidth = 63;
    $cellHeight = 25;
    $perRow = 3;

    $row = 0;
    $col = 0;

    foreach ($lines as $index => $line) {
        list($inventario, $serie) = array_map('trim', explode(',', $line));

        $barcode = $generator->getBarcode($serie, $generator::TYPE_CODE_128);
        $file = tempnam(sys_get_temp_dir(), 'barcode') . '.png';
        file_put_contents($file, $barcode);

        $x = $xStart + $col * $cellWidth;
        $y = $yStart + $row * $cellHeight;

        $pdf->Image($file, $x + 5, $y + 5, 50, 10);
        $pdf->SetXY($x + 5, $y + 17);
        $pdf->Cell(50, 5, "Serie: $serie", 0, 0, 'C');
        $pdf->SetXY($x + 5, $y + 21);
        $pdf->Cell(50, 5, "Inventario: $inventario", 0, 0, 'C');

        unlink($file);

        $col++;
        if ($col >= $perRow) {
            $col = 0;
            $row++;
            if ($row >= 10) {
                $pdf->AddPage();
                $row = 0;
            }
        }
    }

    ob_clean(); // limpiar cualquier salida previa
    $pdf->Output('I', 'codigos_barras.pdf');
    exit;
}

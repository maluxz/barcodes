<?php
ob_start();
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
    $pdf->SetFont('Arial', '', 8);

    $xStart = 10;
    $yStart = 10;
    $cellWidth = 63;
    $cellHeight = 25;
    $perRow = 3;

    $row = 0;
    $col = 0;

    foreach ($lines as $index => $line) {
        list($inventario, $serie) = array_map('trim', preg_split('/[\t,]/', $line));


        // Generar los dos códigos de barras
        $barcodeSerie = $generator->getBarcode($serie, $generator::TYPE_CODE_128);
        $barcodeInv = $generator->getBarcode($inventario, $generator::TYPE_CODE_128);

        // Guardar temporalmente
        $fileSerie = tempnam(sys_get_temp_dir(), 'barcode') . '.png';
        $fileInv = tempnam(sys_get_temp_dir(), 'barcode') . '.png';

        file_put_contents($fileSerie, $barcodeSerie);
        file_put_contents($fileInv, $barcodeInv);

        $x = $xStart + $col * $cellWidth;
        $y = $yStart + $row * $cellHeight;

        // Código de barras Serie
        $pdf->Image($fileSerie, $x + 6, $y + 3, 50, 6);
        $pdf->SetXY($x + 6, $y + 10);
        $pdf->Cell(50, 4, "CI: $serie", 0, 0, 'C');

        // Código de barras Inventario
        $pdf->Image($fileInv, $x + 6, $y + 14, 50, 6);
        $pdf->SetXY($x + 6, $y + 21);
        $pdf->Cell(50, 4, "N/S: $inventario", 0, 0, 'C');

        // Limpieza
        unlink($fileSerie);
        unlink($fileInv);

        $col++;
        if ($col >= $perRow) {
            $col = 0;
            $row++;
            if ($row >= 9) {
                $pdf->AddPage();
                $row = 0;
            }
        }
    }

    ob_clean();
    $pdf->Output('I', 'codigos_barras_doble.pdf');
    exit;
}

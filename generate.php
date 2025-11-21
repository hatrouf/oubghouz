<?php
require 'vendor/autoload.php';
use setasign\Fpdi\Fpdi;

$pdfTemplate = __DIR__ . "/05.0.13.060.pdf";

$pdf = new FPDI();
$pdf->setSourceFile($pdfTemplate);

$page = $pdf->importPage(1);
$pdf->AddPage();
$pdf->useTemplate($page, 0, 0, 210);

$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);

$pdf->SetXY(30, 50);
$pdf->Write(5, $_POST['adresse']);

$pdf->SetXY(30, 60);
$pdf->Write(5, $_POST['code_imm']);

$pdf->SetXY(30, 70);
$pdf->Write(5, $_POST['gps']);

$pdf->SetXY(30, 80);
$pdf->Write(5, $_POST['nb_logements']);

$pdf->SetXY(30, 90);
$pdf->Write(5, $_POST['nb_etages']);

$folder = "uploads/";
if (!is_dir($folder)) mkdir($folder);

function saveImage($fieldName, $folder) {
    if (!empty($_FILES[$fieldName]['name'])) {
        $name = $folder . time() . "_" . basename($_FILES[$fieldName]['name']);
        move_uploaded_file($_FILES[$fieldName]['tmp_name'], $name);
        return $name;
    }
    return null;
}

$imgFacade = saveImage('photo_facade', $folder);
$imgPbi = saveImage('photo_pbi', $folder);
$imgPbo = saveImage('photo_pbo', $folder);

if ($imgFacade) $pdf->Image($imgFacade, 20, 120, 70);
if ($imgPbi) $pdf->Image($imgPbi, 110, 120, 70);
if ($imgPbo) $pdf->Image($imgPbo, 20, 200, 70);

$pdf->Output("I","dossier_rempli.pdf");
?>
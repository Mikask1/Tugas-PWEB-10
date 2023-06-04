<?php
include "koneksi.php";
require('./fpdf/fpdf.php');

date_default_timezone_set('Asia/Jakarta');

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial', 'B', 18);
        $this->Cell(0, 10, 'Data Siswa', 0, 1, 'C');

        $this->Ln(10);

        $currentTime = date('Y-m-d H:i:s');
        $this->SetFont('Courier', 'I', 10);
        $this->Cell(0, 10, 'Dibuat pada: ' . $currentTime, 0, 1, 'R');
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Halaman ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('L', 'A4');

$pdf->SetXY(10, 40);
$pdf->SetFont('Courier', 'B', 12);

$pdf->Cell(30, 10, 'NIS', 1, 0, 'C');
$pdf->Cell(70, 10, 'Nama', 1, 0, 'C');
$pdf->Cell(40, 10, 'Jenis Kelamin', 1, 0, 'C');
$pdf->Cell(40, 10, 'Telepon', 1, 0, 'C');
$pdf->Cell(100, 10, 'Alamat', 1, 1, 'C');

$sql = $pdo->prepare("SELECT * FROM siswa ORDER BY nis");
$sql->execute();

$pdf->SetFont('Courier', '', 12);
while ($data = $sql->fetch()) {
    $pdf->SetX(10);
    $pdf->Cell(30, 10, $data['nis'], 1, 0, 'C');
    $pdf->Cell(70, 10, $data['name'], 1, 0, 'C');
    $pdf->Cell(40, 10, $data['jenis_kelamin'], 1, 0, 'C');
    $pdf->Cell(40, 10, $data['telp'], 1, 0, 'C');
    $pdf->Cell(100, 10, $data['alamat'], 1, 1, 'L');
}

$filename = 'Data_Siswa.pdf';
$pdf->Output($filename, 'D');
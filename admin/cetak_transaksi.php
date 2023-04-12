<?php

// sambungkan ke fpdf library
require '../library/fpdf.php';
include '../koneksi.php';

// instansi objek dan memberikan pengaturan halaman PDF
$pdf = new FPDF('P','mm','A4');
$pdf -> AddPage();

// membuat judul
$pdf -> SetFont('Times','B',13);
$pdf -> Cell(200,10,'Data Barang',0,0,'C');

// mmebuat pengaturan table head
$pdf -> Cell(10,15,'',0,1);
$pdf -> SetFont('Times','B',9);
$pdf -> Cell(10,7,'NO',1,0,'C');
$pdf -> Cell(50,7,'Nama Barang',1,0,'C');
$pdf -> Cell(45,7,'Alamat',1,0,'C');
$pdf -> Cell(40,7,'Status',1,0,'C');
$pdf -> Cell(40,7,'Subtotal',1,0,'C');

// mmebuat peraturan tabel isi
$pdf -> Cell(10,7,'',0,1);
$pdf -> SetFont('Times','',9);
$no=1;
$data = mysqli_query($conn,"select * from transaksi");
while($meledak = mysqli_fetch_array($data)){
    $pdf -> Cell(10,7,$no++,1,0,'C');
    $pdf -> Cell(50,7,$meledak['nama_produk'],1,0,'C');
    $pdf -> Cell(45,7,$meledak['alamat'],1,0,'C');
    $pdf -> Cell(40,7,$meledak['status'],1,0,'C');
    $pdf -> Cell(40,7,$meledak['subtotal'],1,1,'C');
}

$pdf -> Output();

?>
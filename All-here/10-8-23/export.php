<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'vendor/autoload.php'; // Sesuaikan dengan path ke autoload.php dari Composer

$server = "localhost";
$username = "root";
$password = "";
$dbname = "dummyaja";
$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed" . $conn->connect_error);
}

$filename = "RiwayatPengecekanKA-" . date('Y-m-d') . ".xls";

$query = "SELECT * FROM table_pengecekan";
$result = mysqli_query($conn, $query);

$objPHPspreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
$objPHPspreadsheet->getActiveSheet()->setCellValue('A1', 'NIPP');
$objPHPspreadsheet->getActiveSheet()->setCellValue('B1', 'Nama');
$objPHPspreadsheet->getActiveSheet()->setCellValue('C1', 'Dinasan');
$objPHPspreadsheet->getActiveSheet()->setCellValue('D1', 'Namaka');
$objPHPspreadsheet->getActiveSheet()->setCellValue('E1', 'Stanformasi');
$objPHPspreadsheet->getActiveSheet()->setCellValue('F1', 'Nosarana');
$objPHPspreadsheet->getActiveSheet()->setCellValue('G1', 'Waktu');

$rowNumber = 2;
while ($row = mysqli_fetch_array($result)) {
    $NIPP = $row['NIPP'];
    $nama = $row['nama'];
    $dinasan = $row['dinasan'];
    $namaka = $row['namaka'];
    $stanformasi = $row['stanformasi'];
    $nosarana = $row['nosarana'];
    $waktu = $row['waktu'];

    $objPHPspreadsheet->getActiveSheet()->setCellValue('A' . $rowNumber, $NIPP);
    $objPHPspreadsheet->getActiveSheet()->setCellValue('B' . $rowNumber, $nama);
    $objPHPspreadsheet->getActiveSheet()->setCellValue('C' . $rowNumber, $dinasan);
    $objPHPspreadsheet->getActiveSheet()->setCellValue('D' . $rowNumber, $namaka);
    $objPHPspreadsheet->getActiveSheet()->setCellValue('E' . $rowNumber, $stanformasi);
    $objPHPspreadsheet->getActiveSheet()->setCellValue('F' . $rowNumber, $nosarana);
    $objPHPspreadsheet->getActiveSheet()->setCellValue('G' . $rowNumber, $waktu);

    $rowNumber++;
}

$objWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($objPHPspreadsheet, 'Xls');
$objWriter->save($filename);

header("Content-Description: File Transfer");
header("Content-Disposition: Attachment; filename=$filename");
header("Content-type: application/vnd.ms-excel");
readfile($filename);
unlink($filename);
exit();
?>

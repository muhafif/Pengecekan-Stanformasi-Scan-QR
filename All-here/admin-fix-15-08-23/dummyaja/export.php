<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('./config/koneksi.php');
require_once 'vendor/autoload.php';

$server = "localhost";
$username = "root";
$password = "";
$dbname = "dummyaja";
$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed" . $conn->connect_error);
}

$filename = "RiwayatScanPengecekanKA-" . date('Y-m-d') . ".xls";

if (isset($_POST['filter'])) {
    $dari_tgl = mysqli_real_escape_string($conn, $_POST['dari_tgl']);
    $sampai_tgl = mysqli_real_escape_string($conn, $_POST['sampai_tgl']);
    $filename = "RiwayatPengecekanKA-" . $dari_tgl . "_to_" . $sampai_tgl . ".xls";
    $query = "SELECT * FROM table_pengecekan WHERE tanggal_ka BETWEEN '$dari_tgl' AND '$sampai_tgl'";
} else {
    $query = "SELECT * FROM table_pengecekan";
}

$result = mysqli_query($conn, $query);

$objPHPspreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
$objPHPspreadsheet->getActiveSheet()->setCellValue('A1', 'NIPP');
$objPHPspreadsheet->getActiveSheet()->setCellValue('B1', 'Nama');
$objPHPspreadsheet->getActiveSheet()->setCellValue('C1', 'Dinasan');
$objPHPspreadsheet->getActiveSheet()->setCellValue('D1', 'Nama KA');
$objPHPspreadsheet->getActiveSheet()->setCellValue('E1', 'Tanggal KA');
$objPHPspreadsheet->getActiveSheet()->setCellValue('F1', 'Stanformasi');
$objPHPspreadsheet->getActiveSheet()->setCellValue('G1', 'Nosarana');
$objPHPspreadsheet->getActiveSheet()->setCellValue('H1', 'Waktu');

$rowNumber = 2;
while ($row = mysqli_fetch_array($result)) {
    $NIPP = $row['NIPP'];
    $nama = $row['nama'];
    $dinasan = $row['dinasan'];
    $namaka = $row['namaka'];
    $tanggal_ka = $row['tanggal_ka'];
    $stanformasi = $row['stanformasi'];
    $nosarana = $row['nosarana'];
    $waktu = $row['waktu'];

    $objPHPspreadsheet->getActiveSheet()->setCellValue('A' . $rowNumber, $NIPP);
    $objPHPspreadsheet->getActiveSheet()->setCellValue('B' . $rowNumber, $nama);
    $objPHPspreadsheet->getActiveSheet()->setCellValue('C' . $rowNumber, $dinasan);
    $objPHPspreadsheet->getActiveSheet()->setCellValue('D' . $rowNumber, $namaka);
    $objPHPspreadsheet->getActiveSheet()->setCellValue('E' . $rowNumber, $tanggal_ka);
    $objPHPspreadsheet->getActiveSheet()->setCellValue('F' . $rowNumber, $stanformasi);
    $objPHPspreadsheet->getActiveSheet()->setCellValue('G' . $rowNumber, $nosarana);
    $objPHPspreadsheet->getActiveSheet()->setCellValue('H' . $rowNumber, $waktu);

    $rowNumber++;
}

$objWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($objPHPspreadsheet, 'Xls');
$objWriter->save($filename);

header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=$filename");
header("Content-Type: application/vnd.ms-excel");
header("Content-Transfer-Encoding: binary");
header("Expires: 0");
header("Cache-Control: must-revalidate");
header("Pragma: public");
header("Content-Length: " . filesize($filename));
readfile($filename);
unlink($filename);
exit();
?>

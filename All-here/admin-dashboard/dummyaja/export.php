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

// Mendapatkan nilai dari parameter URL
$dari_tgl = isset($_GET['dari_tgl']) ? htmlspecialchars($_GET['dari_tgl']) : date('Y-m-d');
$sampai_tgl = isset($_GET['sampai_tgl']) ? htmlspecialchars($_GET['sampai_tgl']) : date('Y-m-d');
$dinasan = isset($_GET['dinasan']) ? htmlspecialchars($_GET['dinasan']) : 'Semua';

$query = "SELECT * FROM table_pengecekan WHERE 1"; // Query default


// Terapkan filter jika diberikan
if (!empty($dari_tgl) && !empty($sampai_tgl)) {
    $query .= " AND tanggal_ka BETWEEN ? AND ?";
}

if ($dinasan != "Semua") {
    $query .= " AND dinasan = ?";
}

// Persiapkan statement SQL
$stmt = $conn->prepare($query);

// Bind parameter jika filter diterapkan
if (!empty($dari_tgl) && !empty($sampai_tgl)) {
    if ($dinasan != "Semua") {
        $stmt->bind_param("sss", $dari_tgl, $sampai_tgl, $dinasan);
    } else {
        $stmt->bind_param("ss", $dari_tgl, $sampai_tgl);
    }
} elseif ($dinasan != "Semua") {
    $stmt->bind_param("s", $dinasan);
}

// Eksekusi statement SQL
$stmt->execute();
$result = $stmt->get_result();

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

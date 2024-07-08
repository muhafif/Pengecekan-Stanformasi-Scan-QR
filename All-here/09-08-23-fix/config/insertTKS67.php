<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$server = "localhost";
$username = "root";
$password = "";
$dbname = "dummyaja";
$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed" . $conn->connect_error);
}

// Pastikan sesi telah dimulai
session_start();

// Sisipkan file koneksi
include('../config/koneksi.php');

// Periksa apakah ada data sesi 'NIPP' yang tersedia
if (isset($_SESSION["NIPP"])) {
     // Ambil nilai 'NIPP' dari sesi
     $nipp = $_SESSION["NIPP"];
     if(count($_POST)>0) {
         $result = mysqli_query($conn, "SELECT *from user WHERE NIPP='" . $_SESSION["NIPP"] . "'");
         $row=mysqli_fetch_array($result);
     }

     if (isset($_POST['namaka'])) {
         $namaka = $_POST['namaka'];
         date_default_timezone_set('Asia/Jakarta');
         $currentHour = intval(date('H'));
        // Periksa apakah jam saat ini sebelum jam 6 pagi
        if ($currentHour < 6) {
            // Jika ya, gunakan tanggal kemarin
            $tanggal_ka = date('Y-m-d', strtotime('-1 day'));
        } else {
            // Jika tidak, gunakan tanggal hari ini
            $tanggal_ka = date('Y-m-d');
        }
         $sqli_namaka = "UPDATE user SET namaka = '$namaka', tanggal_ka = '$tanggal_ka' WHERE NIPP = '$nipp'";
         if ($conn->query($sqli_namaka) === TRUE) {
             echo "Data namaka inserted successfully!";
         } else {
             echo "Error: " . $sqli_namaka . "<br>" . $conn->error;
         }
     }

     // Proses untuk menyimpan data 'stanformasi' ke dalam database
     if (isset($_POST['stanformasi'])) {
         $stanformasi = $_POST['stanformasi'];
         $sqli_stanformasi = "UPDATE pilih_jadwal SET stanformasi = '$stanformasi', waktu = NOW() WHERE NIPP = '$nipp'";
        //  $sqli_stanformasi = "INSERT INTO pilih_jadwal (NIPP, stanformasi, waktu) VALUES ('$nipp', '$stanformasi', NOW())";
         if ($conn->query($sqli_stanformasi) === TRUE) {
             echo "Data stanformasi updated successfully!";
         } else {
             echo "Error: " . $sqli_stanformasi . "<br>" . $conn->error;
         }
     }

     // Proses untuk menyimpan data 'sarana' ke dalam database
     if (isset($_POST['nosarana'])) {
         $nosarana = $_POST['nosarana'];
         $sqli_nosarana = "INSERT INTO table_pengecekan (NIPP, nama, dinasan, namaka, tanggal_ka, stanformasi, nosarana, waktu) VALUES ('$nipp', '".$_SESSION['nama']."', '".$_SESSION['dinasan']."', '$namaka', '".$_SESSION['tanggal_ka']."', '$stanformasi', '$nosarana', NOW())";
         if ($conn->query($sqli_nosarana) === TRUE) {
             echo "Data sarana updated successfully!";
         } else {
             echo "Error: " . $sqli_nosarana . "<br>" . $conn->error;
         }
     }

    // Redirect kembali ke halaman yang sesuai setelah melakukan update data
     header('location: ../PS/PSTKS67.php');
     exit();
 }
 $conn->close();
 ?>
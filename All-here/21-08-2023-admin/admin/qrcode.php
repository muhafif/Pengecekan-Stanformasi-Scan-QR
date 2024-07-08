<?php
include "./config/koneksi.php";
include "phpqrcode/qrlib.php";

// $folderTemp = 'gambarqr/';
// $a = $_POST['id'];
// $b = $_POST['nosarana'];
// $c = $b;
// $d = $b.".png";
// $qual = 'H';
// $ukuran = 9;
// $padding = 2;
// $qrcode=QRcode :: png($c,$folderTemp.$d,$qual,$ukuran,$padding);
// $sql = $conn->query("INSERT INTO qrcode VALUES ('$a','$b','$d')");
// if($sql){
//     header('location:admindashboard.php');
// }else{
//     echo "Gagal";
//     die($conn->error);
// }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sarana = $_POST['nosarana'];

    // Menggabungkan terlebih dahulu sarana dengan hasil random_bytes()
    $combinedValue = $sarana . bin2hex(random_bytes(32));

    // Mengacak hasil gabungan
    $shuffledValue = str_shuffle($combinedValue);

    $alias = $shuffledValue;
    $folderTemp = 'gambarqr/';
    $a = $_POST['id'];
    $b = $alias;
    $c = $b;
    $d = $b.".png";
    $qual = 'H';
    $ukuran = 9;
    $padding = 2;
    $qrcode=QRcode :: png($c,$folderTemp.$d,$qual,$ukuran,$padding);
    $sql = $conn->query("INSERT INTO qrcode VALUES ('$a','$sarana', '$b','$d')");

    // $sql = "INSERT INTO qrcode (sarana, alias) VALUES ('$sarana', '$alias')";

    if($sql){
            header('location:admindashboard.php');
        }else{
            echo "Gagal";
            die($conn->error);
        }
    }
?>
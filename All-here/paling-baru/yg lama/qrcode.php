<?php
include "../config/koneksi.php";
include "phpqrcode/qrlib.php";

$folderTemp = 'gambarqr/';
$a = $_POST['id'];
$b = $_POST['nosarana'];
$c = $b;
$d = $b.".png";
$qual = 'H';
$ukuran = 9;
$padding = 2;
$qrcode=QRcode :: png($c,$folderTemp.$d,$qual,$ukuran,$padding);
$sql = $conn->query("INSERT INTO qrcode VALUES ('$a','$b','$d')");
if($sql){
    header('location:admindashboard.php');
}else{
    echo "Gagal";
    die($conn->error);
}
?>
<?php
// koneksi database
include('../config/koneksi.php');

// menangkap data yang di kirim dari form
$nipp = $_POST['NIPP'];
$nama = $_POST['nama'];
$dinasan = $_POST['dinasan'];
$unit = $_POST['unit'];
$kedudukan = $_POST['kedudukan'];
$password = $_POST['password']; 
// update data ke database
mysqli_query($conn,"UPDATE user set nama='$nama', dinasan='$dinasan', unit='$unit', kedudukan='$kedudukan', password='$password' where NIPP='$nipp'");

// mengalihkan halaman kembali ke index.php
header("location:usermanagement.php");




?>
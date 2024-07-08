<?php
// koneksi database
include('./config/koneksi.php');

// menangkap data yang di kirim dari form
$nipp = $_POST['NIPP'];
$nama = $_POST['nama_admin'];
$unit = $_POST['unit'];
$username = $_POST['username'];
$level = $_POST['level'];
$password = $_POST['password']; 
// update data ke database
mysqli_query($conn,"UPDATE admin set username='$username', password='$password', nama_admin='$nama', unit='$unit', level='$level' where NIPP='$nipp'");

// mengalihkan halaman kembali ke index.php
header("location:adminmanagement.php");




?>
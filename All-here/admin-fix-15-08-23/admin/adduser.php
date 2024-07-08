<?php
include('../config/koneksi.php');

$nipp = $_REQUEST['NIPP'];
$nama = $_REQUEST['nama'];
$dinasan = $_REQUEST['dinasan'];
$unit = $_REQUEST['unit'];
$kedudukan = $_REQUEST['kedudukan'];
$password = $_REQUEST['password'];
 
mysqli_query($conn,"INSERT INTO user VALUES('$nipp','$nama','$dinasan','$unit', '$kedudukan', '$password')");
 
header("location:usermanagement.php");
?>
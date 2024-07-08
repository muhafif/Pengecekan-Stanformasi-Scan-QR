<?php
include('../config/koneksi.php');

$nipp = $_REQUEST['NIPP'];
$nama = $_REQUEST['nama'];
$dinasan = $_REQUEST['dinasan'];
$unit = $_REQUEST['unit'];
$kedudukan = $_REQUEST['kedudukan'];
$password = $_REQUEST['password'];
 
// mysqli_query($conn,"INSERT INTO user VALUES('$nipp','$nama','$dinasan','$unit', '$kedudukan', '$password')");
$cek = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM user WHERE NIPP='$nipp'"));
    if ($cek > 0){
    echo'<div id="tampil_modal">
    <div id="modal">
    <div id="modal_atas">Gagal!!</div>
    <p>NIPP milik orang lain ya, buat yang baru</p>
    <a href="login.php"><button id="oke">Close</button></a>
    </div></div>';
    }else {
    mysqli_query($conn,"INSERT INTO user VALUES ('$nipp','$nama','$dinasan','$unit', '$kedudukan', '$password')");
 
    echo "<script>window.alert('DATA SUDAH DISIMPAN')
    window.location='usermanagement.php'</script>";
    }
 
// header("location:usermanagement.php");

// if(isset($_POST['simpan'])) {
//     $nipp=$_POST['NIPP'];
//     $nama=$_POST['nama'];
//     $dinasan=$_POST['dinasan'];
//     $unit=$_POST['unit'];
//     $kedudukan=$_POST['kedudukan'];
//     $password=$_POST['password'];
   
//script validasi data
 
    
    
?>
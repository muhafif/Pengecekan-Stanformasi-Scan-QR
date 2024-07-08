<?php
include('../config/koneksi.php');

$nipp = $_REQUEST['NIPP'];
$nama = $_REQUEST['nama_admin'];
$dinasan = $_REQUEST['dinasan'];
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$level = $_REQUEST['level'];
 
// mysqli_query($conn,"INSERT INTO user VALUES('$nipp','$nama','$dinasan','$unit', '$kedudukan', '$password')");
$cek = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM admin WHERE NIPP='$nipp'"));
    if ($cek > 0){
    echo'<div id="tampil_modal">
    <div id="modal">
    <div id="modal_atas">Gagal!!</div>
    <p>NIPP Milik Orang Lain</p>
    <a href="tambahadmin.php"><button id="oke">Close</button></a>
    </div></div>';
    }else {
    mysqli_query($conn,"INSERT INTO admin VALUES ('','$username','$password','$nama','$nipp', '$dinasan', '$level')");
 
    echo'<div id="tampil_modal">
    <div id="modal">
    <div id="modal_atas">Berhasil!</div>
    <p>Sudah ada pegawai baru yaa</p>
    <a href="adminmanagement.php"><button id="oke">Close</button></a>
    </div></div>';
    }
 
// header("location:usermanagement.php");
    
?>

<style>
    #tampil_modal {
            padding-top: 10em;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 10;
            display: block;
            z-index: 1;
            background: hsla(0, 0%, 80%, .7);
        }
        #modal{
            padding: 15px;
            font-size: 16px;
            background: #FFFFFF;
            color: #000000;
            width: 75%;
            border-radius: 15px;
            margin: 0 auto;
            margin-bottom: 20px;
            padding-bottom: 50px;
            z-index: 9;
        }
        #modal_atas{
            width: 100%;
            background:#FFFFFF;
            padding: 15px;
            margin-left: -15px;
            font-size: 18px;
            margin-top: -15px;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            font-weight: bold;
        }
        #oke {
            background:#00008B;
            border:none;
            float:right;
            width: 70px;
            height:auto;
            color: #FFFFFF;
            margin-right: 5px;
            cursor: pointer;
            padding: 6px;
            font-size: 15px;
        }
</style>
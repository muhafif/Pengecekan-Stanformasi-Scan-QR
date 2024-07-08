<?php
session_start();
include('./config/koneksi.php');

$conn = new mysqli($server, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$username = $_POST['username'];
$password = $_POST['password'];
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($conn,"SELECT * from admin where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai admin
	if($data['level']=="Admin"){
 
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "Admin";
		// alihkan ke halaman dashboard admin
		header("location:usermanagement_admin.php");
 
	// cek jika user login sebagai pegawai
	}else if($data['level']=="IT"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "IT";
		// alihkan ke halaman dashboard pegawai
		header("location:usermanagement.php");
	}else{
 
		// alihkan ke halaman login kembali
		header("location:loginadmin.php?pesan=gagal");
	}	
}else{
	header("location:loginadmin.php?pesan=gagal");
}
 
?>
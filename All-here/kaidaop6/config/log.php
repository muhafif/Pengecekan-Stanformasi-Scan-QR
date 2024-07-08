<?php
if (!isset($_SESSION)) {
    session_start();
}

require './config/koneksi.php';
$nipp = $_POST['NIPP'];
$password = $_POST['password'];

$dt_nipp = "SELECT * FROM user WHERE NIPP='$nipp' ";
$executeQuery = mysqli_query($db, $dt_nipp);

if (mysqli_num_rows($executeQuery) == 1 ) {
    $result = mysqli_fetch_assoc($executeQuery);

    if (password_verify($password, $result['password'])) {
        $_SESSION['NIPP'] = $result['NIPP'];
        header('location: loginkai.php');
        exit();
    } else {
        $_SESSION['message-error'] = 'Password/NIPP salah';
        header('location: loginkai.php');
        exit();
    }
}
$_SESSION['message-error'] = 'gagal login';
header('location: loginkai.php');
exit();
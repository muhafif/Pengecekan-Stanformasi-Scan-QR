<?php
session_start();

// Hapus session
session_destroy();

header("Location: loginkai.php"); // Redirect kembali ke halaman login setelah logout
exit;
?>
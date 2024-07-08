<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

    session_start();
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "qrcodedb";

    $conn = new mysqli($server, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed" . $conn->connect_error);
    }

    if (isset($_POST['no'])){

        $no =$_POST['no'];

        $sql = "INSERT INTO table_pengecekan (nosarana,waktu) VALUES('$no ', NOW())";
        if ($conn->query($sql) === TRUE) {
            $_SESSION['success'] = "Attendance added successfully";
        } else {
            $_SESSION['error'] = "Error: " . $sql . "<br>" . $conn->error;
        }
        
        header('location: index.php');
        exit();
    }

    // header('location: index.php');

    $conn->close();
?>
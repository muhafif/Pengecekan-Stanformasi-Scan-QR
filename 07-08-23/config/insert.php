<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$server = "localhost";
$username = "root";
$password = "";
$dbname = "dummyaja";
$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed" . $conn->connect_error);
}

if (isset($_POST['namaka'])){
    $namaka =$_POST['namaka'];
    $sqli = "INSERT INTO table_pengecekan (namaka) VALUES ('$namaka')";
    if ($conn->query($sqli) === TRUE) {
        echo "Data saved successfully!";
    } else {
        echo "Error: " . $sqli . "<br>" . $conn->error;
    }
    header('location: ../PILIHSTANFORMASI.php');
    exit();
}

if (isset($_POST['stanformasi'])){
    $stanformasi =$_POST['stanformasi'];
    $sqliu = "UPDATE table_pengecekan SET stanformasi = '$stanformasi'";
    if ($conn->query($sqliu) === TRUE) {
        echo "Data saved successfully!";
    } else {
        echo "Error: " . $sqliu . "<br>" . $conn->error;
    }
    $_SESSION['stanformasi'] = $stanformasi;
    header('location: ../SCANQR.php');
    exit();
}

if (isset($_POST['nosarana'])){
    $nosarana =$_POST['nosarana'];
    $sql = "UPDATE table_pengecekan SET nosarana = '$nosarana'";
    if ($conn->query($sql) === TRUE) {
        echo "Data saved successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    header('location: ../SCANQR.php');
    exit();
}
$conn->close();
?>
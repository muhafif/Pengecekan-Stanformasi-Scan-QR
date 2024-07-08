<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$server = "localhost:3308";
$username = "root";
$password = "";
$dbname = "dummyaja";

$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed" . $conn->connect_error);
}
?>
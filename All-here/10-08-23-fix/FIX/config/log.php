<?php
session_start();

$conn = new mysqli($server, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST["NIPP"]) && isset($_POST["password"])) {
    $NIPP = $_POST["NIPP"];
    $password = $_POST["password"];

    // Gunakan prepared statement untuk menghindari SQL injection
    $query = "SELECT * FROM user WHERE NIPP = ? AND password = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $NIPP, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {
        // Jika NIPP dan password benar, set status login ke true
        $row = mysqli_fetch_assoc($result);
        $_SESSION["login"] = true;
        $_SESSION["NIPP"] = $NIPP;
        $_SESSION["nama"] = $row['nama'];
        $_SESSION["dinasan"] = $row['dinasan'];
        $_SESSION["kedudukan"] = $row['kedudukan'];
        header("Location: ./homepage.php");
        exit;
    } else {
        echo '<div id="tampil_modal">
        <div id="modal">
        <div id="modal_atas">Warning</div>
        <p>Waduh NIPP/Password mu masih salah</p>
        <a href="./index.php"><button id="oke">Close</button></a>
        </div></div>';
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

?>
<?php
// session_start();
// if(isset($_POST['login'])) {
// $nipp = $_POST['NIPP'];
// $password = $_POST['password'];
// $conn = mysqli_connect('localhost:3308', 'root', '', 'dummyaja');
// $sql = "SELECT * FROM user WHERE NIPP='$nipp' AND password='$password'";
// $result = mysqli_query($conn, $sql);
// if(mysqli_num_rows($result) > 0)
// {
// $row = mysqli_fetch_assoc($result);
// $_SESSION['NIPP'] = $row['NIPP'];
// header("location: ./login.php");
// }
// else
// {
// echo "Invalid username or password";
// }
// }

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
        header("Location: homepage.php");
        exit;
    } else {
        // Jika NIPP dan password salah, kembali ke halaman login
        // $message = "Username and/or Password incorrect.\\nTry again.";
        // echo "<script type='text/javascript'>alert('$message');</script>";
        // echo "<script language=\"JavaScript\">\n";

        // echo "alert('Username or Password was incorrect!');\n";
        // echo "window.location='login.php'";

        // echo "</script>";
        // echo "<div class='alert alert-danger'>Incorrect username or password</div>";

        // echo "<script>alert('Password atau Username Salah!');</script>";
        echo '<div id="tampil_modal">
        <div id="modal">
        <div id="modal_atas">Warning</div>
        <p>Waduh NIPP/Password mu masih salah</p>
        <a href="login.php"><button id="oke">Close</button></a>
        </div></div>';
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

?>
<?php
// Sisipkan file koneksi
include('./config/koneksi.php');
// include('./config/logout.php');
session_start();

$nipp = $_SESSION["NIPP"];
//Query untuk mengambil data dari tabel users
$sql = "SELECT nama FROM user";
$result = mysqli_query($conn, $sql);

$conn = new mysqli($server, $username, $password, $dbname);//koneksi kedatabase
// mysql_select_db("dummyaja",$conn);//nama database
if(count($_POST)>0) {
$result = mysqli_query($conn, "SELECT *from user WHERE NIPP='" . $_SESSION["NIPP"] . "'");
$row=mysqli_fetch_array($result);
if($_POST["currentPassword"] == $row["password"]) {
mysqli_query($conn, "UPDATE user set password='" . $_POST["newPassword"] . "' WHERE NIPP='" . $_SESSION["NIPP"] . "'");
// $message = "Password Changed";
echo '<div id="tampil_modal">
<div id="modal">
<div id="modal_atas">Berhasil!</div>
<p>Udah diganti nih boleh login lagi</p>
<a href="login.php"><button id="oke">Close</button></a>
</div></div>';
} else $message = "Password Lama Tidak Cocok!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <style>
         @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        html, body {
            font-family: 'Poppins', sans-serif;
        }
        .b-example-divider-header {
        height: 75px;
        background-color: #00000000;;
        border: solid #00000000;
        border-width: 0px 0;
        box-shadow: inset 0 0.5em 1.5em #00000000,
        inset 0 0.125em 0.5em #00000000;
        }
        .b-example-divider-main {
        height: 25px;
        background-color: #00000000;;
        border: solid #00000000;
        border-width: 0px 0;
        box-shadow: inset 0 0.5em 1.5em #00000000,
        inset 0 0.125em 0.5em #00000000;
        }

        #tampil_modal {
            padding-top: 19em;
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
    <script>
        function validatePassword() {
        var currentPassword,newPassword,confirmPassword,output = true;

        currentPassword = document.frmChange.currentPassword;
        newPassword = document.frmChange.newPassword;
        confirmPassword = document.frmChange.confirmPassword;

        if(!currentPassword.value) {
        currentPassword.focus();
        document.getElementById("currentPassword").innerHTML = "required";
        output = false;
        }
        else if(!newPassword.value) {
        newPassword.focus();
        document.getElementById("newPassword").innerHTML = "required";
        output = false;
        }
        else if(!confirmPassword.value) {
        confirmPassword.focus();
        document.getElementById("confirmPassword").innerHTML = "required";
        output = false;
        }
        if(newPassword.value != confirmPassword.value) {
        newPassword.value="";
        confirmPassword.value="";
        newPassword.focus();
        document.getElementById("confirmPassword").innerHTML = "No Match";
        output = false;
        }     
        return output;
        }
    </script>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-md fixed-top" style="background-color: #252271;">
            <div class="container-fluid">
                <a class="navbar-brand" href="./homepage.php">
                    <img src="KAIPUTIH.png" alt="" width="50px">
                </a>
                <div class="btn-group dropstart">
                    <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false" style= "color:white;"><?php echo $_SESSION["nama"]; ?>
                        <i class="bi bi-person-circle" style="color: white; font-size: large;"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="profil.php">Profile</a></li>
                        <li><a class="dropdown-item" href="./config/logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="b-example-divider-header"></div>

        <div class="container">
            <div class="card shadow bg-body-tertiary rounded">
                <div class="card-body">
                    <div class="wrapper">
                        <form name="frmChange" method="post" action="" onSubmit="return validatePassword()">
                            <div style="width:100%;">
                                <div class="message"><?php if(isset($message)) { echo $message; } ?></div>
                                <table border="0" cellpadding="10" cellspacing="0" width="auto" align="center" class="tblSaveForm">
                                    <tr class="tableheader">
                                        <td colspan="2"><h2><center>Ubah Password</center></h2></td>
                                    </tr>
                                    <tr>
                                        <td width="40%"><label>Password Lama</label></td>
                                        <td width="60%"><input type="password" name="currentPassword" class="txtField form-control"/><span id="currentPassword"  class="required"></span></td>
                                    </tr>
                                    <tr>
                                        <td><label>Password Baru</label></td>
                                        <td><input type="password" name="newPassword" class="txtField form-control"/><span id="newPassword" class="required"></span></td>
                                    </tr>
                                    <tr>
                                        <td><label>Konfirmasi Password</label></td>
                                        <td><input type="password" name="confirmPassword" class="txtField form-control"/><span id="confirmPassword" class="required"></span></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input type="submit" name="submit" value="Submit" class="btn btn-primary d-grid mt-4"></td>
                                    </tr>
                                    <!-- <script type="text/javascript">
                                        function contoh() {
                                            swal({
                                                    title: "Berhasil!",
                                                    text: "Pop-up berhasil ditampilkan",
                                                    icon: "success",
                                                    button: true
                                                    setTimeout(function() {contoh.close()}, 1000);
                                                });
                                        }
                                    </script> -->
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>
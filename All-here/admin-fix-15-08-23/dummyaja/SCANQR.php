<?php session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Mendeteksi protokol saat ini (HTTP atau HTTPS)
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';

// Jika protokol saat ini adalah HTTP, arahkan ulang ke versi HTTPS
if ($protocol === 'http') {
    header("Location: https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    exit();
}

    // Sisipkan file koneksi
    include('./config/koneksi.php');
    // include('./config/logout.php');
    // session_start();

    $nipp = $_SESSION["NIPP"];
    $nama = $_SESSION["nama"];
    $dinasan = $_SESSION["dinasan"];
    // $tanggal_ka = $_SESSION["tanggal_ka"];
    //Query untuk mengambil data dari tabel users
    $sql = "SELECT nama, dinasan, tanggal_ka FROM user";
    $result = mysqli_query($conn, $sql);

    //Periksa apakah data ditemukan
    if (mysqli_num_rows($result) > 0) {
        // Ambil data pertama dari hasil query (misalnya data user terakhir yang ditambahkan)
        $row = mysqli_fetch_assoc($result);
        $nama = $row['nama'];
    } else {
        echo "Tidak ada data user.";
    }

    // Ambil data nama KA dari database
    if (isset($_SESSION["login"])) {
        $login_as = $_SESSION["NIPP"];
        $result_login = mysqli_query($conn, "SELECT nama, dinasan, namaka, tanggal_ka FROM user WHERE NIPP = '$login_as'");
        $data_login = mysqli_fetch_assoc($result_login);

        $_SESSION["nama"] = $data_login["nama"];
        $_SESSION["dinasan"] = $data_login["dinasan"];
        $_SESSION["namaka"] = $data_login["namaka"];
        $_SESSION["tanggal_ka"] = $data_login["tanggal_ka"];
    }

    if (isset($_SESSION["login"]) && isset($_SESSION["NIPP"])) {
        $login_as = $_SESSION["NIPP"];
    
        // Pastikan koneksi terbuka
        if ($conn) {
            $result_login = mysqli_query($conn, "SELECT stanformasi FROM pilih_jadwal WHERE NIPP = '$login_as'");
    
            // Periksa hasil kueri
            if ($result_login) {
                $data_login = mysqli_fetch_assoc($result_login);
    
                if ($data_login !== null && isset($data_login["stanformasi"])) {
                    $_SESSION["stanformasi"] = $data_login["stanformasi"];
                } else {
                    // Penanganan jika data kosong atau 'stanformasi' tidak ada
                }
            } else {
                // Penanganan jika terjadi kesalahan pada kueri
            }
        } else {
            // Penanganan jika koneksi gagal
    }
    }

    function onClick($result)
    {
    if (mysqli_num_rows($result) > 0) {
        header("Location: ./login.php");
    } else {
        header("Location: ./homepage.php");
    }
    mysqli_close($conn);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scan QR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/instascan@2.0.1/instascan.min.js"></script>
    <style>
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css");
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
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-md fixed-top" style="background-color: #252271;">
            <div class="container-fluid">
                <a class="navbar-brand" href="./homepage.php">
                    <img src="./KAIPUTIH.png" alt="" width="50px">
                </a>
                <div class="btn-group dropstart">
                    <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false" style= "color:white;"><?php echo $_SESSION["nama"]; ?>
                        <i class="bi bi-person-circle" style="color: white; font-size: large;"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="./profil.php">Profile</a></li>
                        <li><a class="dropdown-item" href="./config/logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="b-example-divider-header"></div>
    </header>
    <main>
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1" style="text-align: center;">Selamat Datang <?php echo $_SESSION['stanformasi']; ?>, Silahkan Absen</h2>
                        </div>
                    </div>
                </div>

        <div class="container">
            <div class="card shadow bg-body-tertiary rounded">
                <div class="card-body">
                    <video id="preview" style="display: block;" width="100%"></video>
                    <?php
                    if(isset($_SESSION['error'])){
                        echo"
                        <div class='alert alert-danger'>
                        <h4>Error!</h4>
                        ".$_SESSION['error']."
                        </div>
                        ";
                    }
                    if(isset($_SESSION['success'])){
                        echo"
                        <div class='alert alert-primary'>
                        <h4>Success!</h4>
                        ".$_SESSION['success']."
                        </div>
                        ";
                    }
                    ?>

                <form action="./config/insert.php" method="POST" id="form" class="form-horizontal">
                    <!-- <label for="nosarana" text-align:center>SCAN QRCODE</label> -->
                    <input type="hidden" id="nosarana" name="nosarana" readonly placeholder="Enter some text" class="form-control">
                    <input type="hidden" readonly="" class="form-control" name="NIPP" autocomplete="off" size="25px" maxlength="25px" value="<?php echo $_SESSION['NIPP'];?>">
                    <input type="hidden" class="form-control" name="nama" autocomplete="off" readonly="" value="<?php echo $_SESSION['nama']; ?>">
                    <input type="hidden" class="form-control" name="dinasan" autocomplete="off" readonly="" value="<?php echo $_SESSION['dinasan']; ?>">
                    <input type="hidden" class="form-control" name="namaka" autocomplete="off" readonly="" value="<?php echo $_SESSION['namaka']; ?>">
                    <input type="hidden" class="form-control" name="stanformasi" autocomplete="off" readonly="" value="<?php echo $_SESSION['stanformasi']; ?>">
                </form>

                <script>
                    function submitForm() {
                        document.getElementById('form').submit();
                    }

                    function openCamera() {
                        let scanner = new Instascan.Scanner({ 
                            video: document.getElementById('preview'),
                            mirror: false,
                        });
                        Instascan.Camera.getCameras().then(function (cameras) {
                            let selectedCamera = cameras.length > 0 ? cameras[cameras.length - 1] : null;
                            if (cameras.length > 0) {
                                for (let i = 0; i < cameras.length; i++) {
                                    if (cameras[i].facing === 'environment') {
                                        selectedCamera = cameras[i];
                                        break;
                                    }
                                }
                            }
                            if (selectedCamera) {
                                scanner.start(selectedCamera);
                            } else {
                                alert('No back camera found. Using the default camera.');
                                scanner.start(cameras[0]);
                            }
                        }).catch(function (e) {
                            console.error(e);
                            alert('Error accessing camera. Please try again.');
                        });
                        scanner.addListener('scan', function(content) {
                            document.getElementById('nosarana').value = content;
                            document.getElementById('form').submit();
                        });
                    }
                    openCamera();
                </script>

                <script>
                        // Fungsi untuk me-reload halaman sekali setelah halaman selesai dimuat
                        function autoReloadOnce() {
                            if (!localStorage.getItem('reload')) {
                                localStorage.setItem('reload', 'true');
                                location.reload();
                            } else {
                                localStorage.removeItem('reload');
                            }
                        }
                        
                        // Panggil fungsi autoReloadOnce saat halaman selesai dimuat
                        window.onload = autoReloadOnce;
                </script>
</body>
</html>
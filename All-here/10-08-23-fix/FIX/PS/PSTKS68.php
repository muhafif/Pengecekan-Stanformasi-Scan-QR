<?php
    // Sisipkan file koneksi
    include('../config/koneksi.php');
    // include('./config/logout.php');
    session_start();

    $nipp = $_SESSION["NIPP"];
    //Query untuk mengambil data dari tabel users
    $sql = "SELECT nama FROM user";
    $result = mysqli_query($conn, $sql);

    //Periksa apakah data ditemukan
    if (mysqli_num_rows($result) > 0) {
        // Ambil data pertama dari hasil query (misalnya data user terakhir yang ditambahkan)
        $row = mysqli_fetch_assoc($result);
        $nama = $row['nama'];
    } else {
        echo "Tidak ada data user.";
    }

    // Tutup koneksi database
    if (isset($_SESSION["login"])) {
        $login_as = $_SESSION["NIPP"];
        $result_login = mysqli_query($conn, "SELECT nama, dinasan, namaka FROM user WHERE NIPP = '$login_as'");
        $data_login = mysqli_fetch_assoc($result_login);

        $_SESSION["nama"] = $data_login["nama"];
        $_SESSION["dinasan"] = $data_login["dinasan"];
        $_SESSION["namaka"] = $data_login["namaka"];
    }

    if (isset($_SESSION["login"])) {
        $login_as = $_SESSION["NIPP"];
        $result_login = mysqli_query($conn, "SELECT stanformasi FROM pilih_jadwal WHERE NIPP = '$login_as'");
        $data_login = mysqli_fetch_assoc($result_login);
        $_SESSION["stanformasi"] = $data_login["stanformasi"];
    }

    // Set time zone sesuai dengan zona waktu Anda
    date_default_timezone_set('Asia/Jakarta');
    
    // Waktu saat ini
    $current_time = time();
    
    // Waktu jam 6 pagi hari ini
    $six_am_today = strtotime(date('d M Y 06:00:00'));
    
    // Jika waktu saat ini sebelum jam 6 pagi hari ini
    if ($current_time < $six_am_today) {
        // Kurangi satu hari dari waktu saat ini
        $new_date = date('d M Y', strtotime('-1 day', $current_time));
    } else {
        // Tetap gunakan tanggal hari ini pada atau setelah jam 6 pagi
        $new_date = date('d M Y', $current_time);
    }

    // Waktu jam 6 pagi hari ini
    $nolnolduaempat = strtotime(date('d M Y 06:00:00'));

    // Jika waktu saat ini sebelum jam 6 pagi hari ini
    if ($current_time > $nolnolduaempat) {
        // Kurangi satu hari dari waktu saat ini
        $old_date = date('d M Y', strtotime('+1 day', $current_time));
    } else {
        // Tetap gunakan tanggal hari ini pada atau setelah jam 6 pagi
        $old_date = date('d M Y', $current_time);
    }

    function onClick($result)
    {
    if (mysqli_num_rows($result) > 0) {
        header("Location:../index.php");
    } else {
        header("Location:../homepage.php");
    }
    mysqli_close($conn);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Stanformasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
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
        height: 20px;
        background-color: #00000000;;
        border: solid #00000000;
        border-width: 0px 0;
        box-shadow: inset 0 0.5em 1.5em #00000000,
        inset 0 0.125em 0.5em #00000000;
        }
        .container {
            padding: 10px;
        }
        .card-pertama {
            margin: 10px;
            width: auto;
            padding: 10px;
        }
        .jenenge-sepur {
            padding-left: 8px;
        }
        .card-kereta{
            padding-left: 10px;
            padding-bottom: 5px;
        }
        .card-group-jadwal {
            margin: auto;
            display: flex;
            float: inline-start;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-md fixed-top" style="background-color: #252271;">
            <div class="container-fluid">
                <a class="navbar-brand" href="../homepage.php">
                    <img src="../KAIPUTIH.png" alt="" width="50px">
                </a>
                <div class="btn-group dropstart">
                    <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false" style= "color:white;"><?php echo $_SESSION["nama"]; ?>
                        <i class="bi bi-person-circle" style="color: white; font-size: large;"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../profil.php">Profile</a></li>
                        <li><a class="dropdown-item" href="../config/logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="b-example-divider-header"></div>
    </header>
    <main>
        <div class="container">
            <div class="card shadow bg-body-tertiary rounded">
                <div class="card-pertama shadow bg-body-tertiary rounded" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 1)), url(https://swamediainc.storage.googleapis.com/swa.co.id/wp-content/uploads/2020/05/12191311/Kereta-APi.jpg); color: white;">
                    <div class="card-sepursatu" style="justify-content: center; align-items: center; display: flex;">
                    <button type="button" class="btn btn-lg" style="color: white;">
                    <strong>TAKSAKA (68)</strong></button>
                    </div>
                    <div class="card-group-jadwal" style="padding-left: 10px; padding-right: 10px;">
                        <div class="card-jadwal">
                            <div class="station-start">Gambir (GMR)</div>
                            <div class="jam-berangkat">09.20 WIB</div>
                            <div class="tanggal-berangkat"><?php echo $new_date; ?></div>
                        </div>
                        <div class="card-kelas" style="text-align: right;">
                            <div class="station-start">Yogyakarta (YK)</div>
                            <div class="jam-berangkat">15.40 WIB</div>
                            <div class="tanggal-berangkat"><?php echo $old_date; ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="b-example-divider-main"></div>
            <div class="card shadow bg-body-tertiary rounded">
                <div class="card-body">
                    <h4>Pilih Stanformasi</h4>
                    <div class="card shadow bg-body-tertiary rounded" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 1)) ,url(https://swamediainc.storage.googleapis.com/swa.co.id/wp-content/uploads/2020/05/12191311/Kereta-APi.jpg);">
                    <a div class="card-body" href="../QR/SCANQRTKS68.php" style="justify-content: center; align-items: center; display: flex;"
                        data-bs-toggle="modal" data-bs-target="#modalLuxuryTaksaka68">
                        <button type="button" class="btn btn-lg" style="color: white;">
                        <strong>LUXURY</strong></button>
                    </a>
                    </div>
                    <div class="b-example-divider-main"></div>
                    <div class="card shadow bg-body-tertiary rounded" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 1)) ,url(https://swamediainc.storage.googleapis.com/swa.co.id/wp-content/uploads/2020/05/12191311/Kereta-APi.jpg);">
                        <a div class="card-body" href="../QR/SCANQRTKS68.php" style="justify-content: center; align-items: center; display: flex;"
                        data-bs-toggle="modal" data-bs-target="#modalEks1Taksaka68">
                        <button type="button" class="btn btn-lg" style="color: white;">
                        <strong>EKSEKUTIF 1</strong></button>
                        </a>
                    </div>
                    <div class="b-example-divider-main"></div>
                    <div class="card shadow bg-body-tertiary rounded" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 1)) ,url(https://swamediainc.storage.googleapis.com/swa.co.id/wp-content/uploads/2020/05/12191311/Kereta-APi.jpg);">
                        <a div class="card-body" href="../QR/SCANQRTKS68.php" style="justify-content: center; align-items: center; display: flex;"
                        data-bs-toggle="modal" data-bs-target="#modalEks2Taksaka68">
                        <button type="button" class="btn btn-lg" style="color: white;">
                        <strong>EKSEKUTIF 2</strong></button>
                        </a>
                    </div>
                    <div class="b-example-divider-main"></div>
                    <div class="card shadow bg-body-tertiary rounded" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 1)) ,url(https://swamediainc.storage.googleapis.com/swa.co.id/wp-content/uploads/2020/05/12191311/Kereta-APi.jpg);">
                        <a div class="card-body" href="../QR/SCANQRTKS68.php" style="justify-content: center; align-items: center; display: flex;"
                        data-bs-toggle="modal" data-bs-target="#modalEks3Taksaka68">
                        <button type="button" class="btn btn-lg" style="color: white;">
                        <strong>EKSEKUTIF 3</strong></button>
                        </a>
                    </div>
                    <div class="b-example-divider-main"></div>
                    <div class="card shadow bg-body-tertiary rounded" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 1)) ,url(https://swamediainc.storage.googleapis.com/swa.co.id/wp-content/uploads/2020/05/12191311/Kereta-APi.jpg);">
                        <a div class="card-body" href="../QR/SCANQRTKS68.php" style="justify-content: center; align-items: center; display: flex;"
                        data-bs-toggle="modal" data-bs-target="#modalEks4Taksaka68">
                        <button type="button" class="btn btn-lg" style="color: white;">
                        <strong>EKSEKUTIF 4</strong></button>
                        </a>
                    </div>
                    <div class="b-example-divider-main"></div>
                    <div class="card shadow bg-body-tertiary rounded" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 1)) ,url(https://swamediainc.storage.googleapis.com/swa.co.id/wp-content/uploads/2020/05/12191311/Kereta-APi.jpg);">
                        <a div class="card-body" href="../QR/SCANQRTKS68.php" style="justify-content: center; align-items: center; display: flex;"
                        data-bs-toggle="modal" data-bs-target="#modalEks5Taksaka68">
                        <button type="button" class="btn btn-lg" style="color: white;">
                        <strong>EKSEKUTIF 5</strong></button>
                        </a>
                    </div>
                    <div class="b-example-divider-main"></div>
                    <div class="card shadow bg-body-tertiary rounded" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 1)) ,url(https://swamediainc.storage.googleapis.com/swa.co.id/wp-content/uploads/2020/05/12191311/Kereta-APi.jpg);">
                        <a div class="card-body" href="../QR/SCANQRTKS68.php" style="justify-content: center; align-items: center; display: flex;"
                        data-bs-toggle="modal" data-bs-target="#modalEks6Taksaka68">
                        <button type="button" class="btn btn-lg" style="color: white;">
                        <strong>EKSEKUTIF 6</strong></button>
                        </a>
                    </div>
                    <div class="b-example-divider-main"></div>
                    <div class="card shadow bg-body-tertiary rounded" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 1)) ,url(https://swamediainc.storage.googleapis.com/swa.co.id/wp-content/uploads/2020/05/12191311/Kereta-APi.jpg);">
                        <a div class="card-body" href="../QR/SCANQRTKS68.php" style="justify-content: center; align-items: center; display: flex;"
                        data-bs-toggle="modal" data-bs-target="#modalEks7Taksaka68">
                        <button type="button" class="btn btn-lg" style="color: white;">
                        <strong>EKSEKUTIF 7</strong></button>
                        </a>
                    </div>
                    <div class="b-example-divider-main"></div>
                    <div class="card shadow bg-body-tertiary rounded" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 1)) ,url(https://swamediainc.storage.googleapis.com/swa.co.id/wp-content/uploads/2020/05/12191311/Kereta-APi.jpg);">
                        <a div class="card-body" href="../QR/SCANQRTKS68.php" style="justify-content: center; align-items: center; display: flex;"
                        data-bs-toggle="modal" data-bs-target="#modalEks8Taksaka68">
                        <button type="button" class="btn btn-lg" style="color: white;">
                        <strong>EKSEKUTIF 8</strong></button>
                        </a>
                    </div>
                    <div class="b-example-divider-main"></div>
                    <div class="card shadow bg-body-tertiary rounded" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 1)) ,url(https://swamediainc.storage.googleapis.com/swa.co.id/wp-content/uploads/2020/05/12191311/Kereta-APi.jpg);">
                        <a div class="card-body" href="../QR/SCANQRTKS68.php" style="justify-content: center; align-items: center; display: flex;"
                        data-bs-toggle="modal" data-bs-target="#modalEks9Taksaka68">
                        <button type="button" class="btn btn-lg" style="color: white;">
                        <strong>EKSEKUTIF 9</strong></button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="modal fade" id="modalLuxuryTaksaka68" tabindex="-1" aria-labelledby="modalLuxuryTaksaka67Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-body p-4 text-center border-bottom-2">
                    <h5 class="mb-0">Ingin Memulai Scan di Luxury?</h5>
                    <div class="b-example-divider-main"></div>
                    <p class="mb-0">Stanformasi yang dipilih tidak dapat diubah!</p>
                </div>
                <div class="modal-footer justify-content-around">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <a href="../QR/SCANQRTKS68.php">
                        <button type="button" class="btn btn-primary" onclick="luxTKS68()">Mulai</button></a>
                        <script>
                        function luxTKS68() {
                            var xhr = new XMLHttpRequest();
                            xhr.open('POST', '../config/insertTKS68.php', true);
                            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                            xhr.onreadystatechange = function() {
                                if (xhr.readyState == 4 && xhr.status == 200) {
                                    alert(xhr.responseText);
                                }
                            };
                            var data = "stanformasi=Luxury";
                            xhr.send(data);
                        }
                        </script>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalEks1Taksaka68" tabindex="-1" aria-labelledby="modalEks1Taksaka68Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-body p-4 text-center border-bottom-2">
                    <h5 class="mb-0">Ingin Memulai Scan di Eksekutif 1?</h5>
                    <div class="b-example-divider-main"></div>
                    <p class="mb-0">Stanformasi yang dipilih tidak dapat diubah!</p>
                </div>
                <div class="modal-footer justify-content-around">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <a href="../QR/SCANQRTKS68.php">
                        <button type="button" class="btn btn-primary" onclick="EKS1TKS68()">Mulai</button></a>
                        <script>
                        function EKS1TKS68() {
                            var xhr = new XMLHttpRequest();
                            xhr.open('POST', '../config/insertTKS68.php', true);
                            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                            xhr.onreadystatechange = function() {
                                if (xhr.readyState == 4 && xhr.status == 200) {
                                    alert(xhr.responseText);
                                }
                            };
                            var data = "stanformasi=Eksekutif 1";
                            xhr.send(data);
                        }
                        </script>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalEks2Taksaka68" tabindex="-1" aria-labelledby="modalEks2Taksaka68Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-body p-4 text-center border-bottom-2">
                    <h5 class="mb-0">Ingin Memulai Scan di Eksekutif 2?</h5>
                    <div class="b-example-divider-main"></div>
                    <p class="mb-0">Stanformasi yang dipilih tidak dapat diubah!</p>
                </div>
                <div class="modal-footer justify-content-around">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <a href="../QR/SCANQRTKS68.php">
                        <button type="button" class="btn btn-primary" onclick="EKS2TKS68()">Mulai</button></a>
                        <script>
                        function EKS2TKS68() {
                            var xhr = new XMLHttpRequest();
                            xhr.open('POST', '../config/insertTKS68.php', true);
                            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                            xhr.onreadystatechange = function() {
                                if (xhr.readyState == 4 && xhr.status == 200) {
                                    alert(xhr.responseText);
                                }
                            };
                            var data = "stanformasi=Eksekutif 2";
                            xhr.send(data);
                        }
                        </script>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalEks3Taksaka68" tabindex="-1" aria-labelledby="modalEks3Taksaka68Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-body p-4 text-center border-bottom-2">
                    <h5 class="mb-0">Ingin Memulai Scan di Eksekutif 3?</h5>
                    <div class="b-example-divider-main"></div>
                    <p class="mb-0">Stanformasi yang dipilih tidak dapat diubah!</p>
                </div>
                <div class="modal-footer justify-content-around">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <a href="../QR/SCANQRTKS68.php">
                        <button type="button" class="btn btn-primary" onclick="EKS3TKS68()">Mulai</button></a>
                        <script>
                        function EKS3TKS68() {
                            var xhr = new XMLHttpRequest();
                            xhr.open('POST', '../config/insertTKS68.php', true);
                            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                            xhr.onreadystatechange = function() {
                                if (xhr.readyState == 4 && xhr.status == 200) {
                                    alert(xhr.responseText);
                                }
                            };
                            var data = "stanformasi=Eksekutif 3";
                            xhr.send(data);
                        }
                        </script>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalEks4Taksaka68" tabindex="-1" aria-labelledby="modalEks4Taksaka68Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-body p-4 text-center border-bottom-2">
                    <h5 class="mb-0">Ingin Memulai Scan di Eksekutif 4?</h5>
                    <div class="b-example-divider-main"></div>
                    <p class="mb-0">Stanformasi yang dipilih tidak dapat diubah!</p>
                </div>
                <div class="modal-footer justify-content-around">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <a href="../QR/SCANQRTKS68.php">
                        <button type="button" class="btn btn-primary" onclick="EKS4TKS68()">Mulai</button></a>
                        <script>
                        function EKS4TKS68() {
                            var xhr = new XMLHttpRequest();
                            xhr.open('POST', '../config/insertTKS68.php', true);
                            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                            xhr.onreadystatechange = function() {
                                if (xhr.readyState == 4 && xhr.status == 200) {
                                    alert(xhr.responseText);
                                }
                            };
                            var data = "stanformasi=Eksekutif 4";
                            xhr.send(data);
                        }
                        </script>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalEks5Taksaka68" tabindex="-1" aria-labelledby="modalEks5Taksaka68Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-body p-4 text-center border-bottom-2">
                    <h5 class="mb-0">Ingin Memulai Scan di Eksekutif 5?</h5>
                    <div class="b-example-divider-main"></div>
                    <p class="mb-0">Stanformasi yang dipilih tidak dapat diubah!</p>
                </div>
                <div class="modal-footer justify-content-around">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <a href="../QR/SCANQRTKS68.php">
                        <button type="button" class="btn btn-primary" onclick="EKS5TKS68()">Mulai</button></a>
                        <script>
                        function EKS5TKS68() {
                            var xhr = new XMLHttpRequest();
                            xhr.open('POST', '../config/insertTKS68.php', true);
                            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                            xhr.onreadystatechange = function() {
                                if (xhr.readyState == 4 && xhr.status == 200) {
                                    alert(xhr.responseText);
                                }
                            };
                            var data = "stanformasi=Eksekutif 5";
                            xhr.send(data);
                        }
                        </script>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalEks6Taksaka68" tabindex="-1" aria-labelledby="modalEks6Taksaka68Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-body p-4 text-center border-bottom-2">
                    <h5 class="mb-0">Ingin Memulai Scan di Eksekutif 6?</h5>
                    <div class="b-example-divider-main"></div>
                    <p class="mb-0">Stanformasi yang dipilih tidak dapat diubah!</p>
                </div>
                <div class="modal-footer justify-content-around">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <a href="../QR/SCANQRTKS68.php">
                        <button type="button" class="btn btn-primary" onclick="EKS6TKS68()">Mulai</button></a>
                        <script>
                        function EKS6TKS68() {
                            var xhr = new XMLHttpRequest();
                            xhr.open('POST', '../config/insertTKS68.php', true);
                            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                            xhr.onreadystatechange = function() {
                                if (xhr.readyState == 4 && xhr.status == 200) {
                                    alert(xhr.responseText);
                                }
                            };
                            var data = "stanformasi=Eksekutif 6";
                            xhr.send(data);
                        }
                        </script>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalEks7Taksaka68" tabindex="-1" aria-labelledby="modalEks7Taksaka68Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-body p-4 text-center border-bottom-2">
                    <h5 class="mb-0">Ingin Memulai Scan di Eksekutif 7?</h5>
                    <div class="b-example-divider-main"></div>
                    <p class="mb-0">Stanformasi yang dipilih tidak dapat diubah!</p>
                </div>
                <div class="modal-footer justify-content-around">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <a href="../QR/SCANQRTKS68.php">
                        <button type="button" class="btn btn-primary" onclick="EKS7TKS68()">Mulai</button></a>
                        <script>
                        function EKS7TKS68() {
                            var xhr = new XMLHttpRequest();
                            xhr.open('POST', '../config/insertTKS68.php', true);
                            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                            xhr.onreadystatechange = function() {
                                if (xhr.readyState == 4 && xhr.status == 200) {
                                    alert(xhr.responseText);
                                }
                            };
                            var data = "stanformasi=Eksekutif 7";
                            xhr.send(data);
                        }
                        </script>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalEks8Taksaka68" tabindex="-1" aria-labelledby="modalEks8Taksaka68Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-body p-4 text-center border-bottom-2">
                    <h5 class="mb-0">Ingin Memulai Scan di Eksekutif 8?</h5>
                    <div class="b-example-divider-main"></div>
                    <p class="mb-0">Stanformasi yang dipilih tidak dapat diubah!</p>
                </div>
                <div class="modal-footer justify-content-around">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <a href="../QR/SCANQRTKS68.php">
                        <button type="button" class="btn btn-primary" onclick="EKS8TKS68()">Mulai</button></a>
                        <script>
                        function EKS8TKS68() {
                            var xhr = new XMLHttpRequest();
                            xhr.open('POST', '../config/insertTKS68.php', true);
                            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                            xhr.onreadystatechange = function() {
                                if (xhr.readyState == 4 && xhr.status == 200) {
                                    alert(xhr.responseText);
                                }
                            };
                            var data = "stanformasi=Eksekutif 8";
                            xhr.send(data);
                        }
                        </script>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalEks9Taksaka68" tabindex="-1" aria-labelledby="modalEks9Taksaka68Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-body p-4 text-center border-bottom-2">
                    <h5 class="mb-0">Ingin Memulai Scan di Eksekutif 9?</h5>
                    <div class="b-example-divider-main"></div>
                    <p class="mb-0">Stanformasi yang dipilih tidak dapat diubah!</p>
                </div>
                <div class="modal-footer justify-content-around">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <a href="../QR/SCANQRTKS68.php">
                        <button type="button" class="btn btn-primary" onclick="EKS9TKS68()">Mulai</button></a>
                        <script>
                        function EKS9TKS68() {
                            var xhr = new XMLHttpRequest();
                            xhr.open('POST', '../config/insertTKS68.php', true);
                            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                            xhr.onreadystatechange = function() {
                                if (xhr.readyState == 4 && xhr.status == 200) {
                                    alert(xhr.responseText);
                                }
                            };
                            var data = "stanformasi=Eksekutif 9";
                            xhr.send(data);
                        }
                        </script>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

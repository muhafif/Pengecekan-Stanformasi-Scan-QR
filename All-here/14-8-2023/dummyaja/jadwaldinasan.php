<?php
    // Sisipkan file koneksi
    include('./config/koneksi.php');
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
    $result_login = mysqli_query($conn, "SELECT nama FROM user WHERE NIPP = '$login_as'");
    $data_login = mysqli_fetch_assoc($result_login);
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

    // $_SESSION['stanformasi'] = $_POST['stanformasi'];
    // header("Location: SCANQR.php");
    // exit;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Jadwal Dinasan</title>
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
        height: 20px;
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
        <div class="container">
            <div class="card shadow bg-body-tertiary rounded">
                <div class="card-body">
                    <H4>Pilih Jadwal Dinasan</H4>
                    <div class="card shadow bg-body-tertiary rounded" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 1)) ,url(https://swamediainc.storage.googleapis.com/swa.co.id/wp-content/uploads/2020/05/12191311/Kereta-APi.jpg);">
                        <div class="card-body" style="justify-content: center; align-items: center; display: flex;">
                            <button type="button" class="btn btn-lg" style="color: white;"
                            data-bs-toggle="modal"
                            data-bs-target="#modalTaksaka67"
                            ><strong>TAKSAKA (67)</strong></button>
                        </div>
                    </div>
                    <div class="b-example-divider-main"></div>
                    <div class="card shadow bg-body-tertiary rounded" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 1)) ,url(https://swamediainc.storage.googleapis.com/swa.co.id/wp-content/uploads/2020/05/12191311/Kereta-APi.jpg);">
                        <div class="card-body" style="justify-content: center; align-items: center; display: flex;">
                            <button type="button" class="btn btn-lg" style="color: white;"
                            data-bs-toggle="modal"
                            data-bs-target="#modalTaksaka68"
                            ><strong>TAKSAKA (68)</strong></button>
                        </div>
                    </div>
                    <div class="b-example-divider-main"></div>
                    <div class="card shadow bg-body-tertiary rounded" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 1)) ,url(https://swamediainc.storage.googleapis.com/swa.co.id/wp-content/uploads/2020/05/12191311/Kereta-APi.jpg);">
                        <div class="card-body" style="justify-content: center; align-items: center; display: flex;">
                            <button type="button" class="btn btn-lg" style="color: white;"
                            data-bs-toggle="modal"
                            data-bs-target="#modalTaksaka69"
                            ><strong>TAKSAKA (69)</strong></button>
                        </div>
                    </div>
                    <div class="b-example-divider-main"></div>
                    <div class="card shadow bg-body-tertiary rounded" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 1)) ,url(https://swamediainc.storage.googleapis.com/swa.co.id/wp-content/uploads/2020/05/12191311/Kereta-APi.jpg);">
                        <div class="card-body" style="justify-content: center; align-items: center; display: flex;">
                            <button type="button" class="btn btn-lg" style="color: white;"
                            data-bs-toggle="modal"
                            data-bs-target="#modalTaksaka70"
                            ><strong>TAKSAKA (70)</strong></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="modal fade" id="modalTaksaka67" tabindex="-1" aria-labelledby="modalTaksaka67Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-body p-4 text-center border-bottom-2">
                    <h5 class="mb-0">Ingin Memulai Dinasan Di Kereta Taksaka(67)?</h5>
                    <div class="b-example-divider-main"></div>
                    <p class="mb-0">Kereta yang dipilih tidak dapat diubah!</p>
                </div>
                <div class="modal-footer justify-content-around">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <a href="./PILIHSTANFORMASI.php">
                        <button type="button" class="btn btn-primary" onclick="TKS67()">Mulai</button></a>
                        <script>
                        function TKS67() {
                            var xhr = new XMLHttpRequest();
                            xhr.open('POST', './config/insert.php', true);
                            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                            xhr.onreadystatechange = function() {
                                if (xhr.readyState == 4 && xhr.status == 200) {
                                    alert(xhr.responseText);
                                }
                            };
                            var data = "namaka=Taksaka(67)";
                            xhr.send(data);
                        }
                        </script>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalTaksaka68" tabindex="-1" aria-labelledby="modalTaksaka68Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-body p-4 text-center border-bottom-2">
                    <h5 class="mb-0">Ingin Memulai Dinasan Di Kereta Taksaka(68)?</h5>
                    <div class="b-example-divider-main"></div>
                    <p class="mb-0">Kereta yang dipilih tidak dapat diubah!</p>
                </div>
                <div class="modal-footer justify-content-around">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <a href="./PILIHSTANFORMASI.php">
                        <button type="button" class="btn btn-primary" onclick="TKS68()">Mulai</button></a>
                        <script>
                        function TKS68() {
                            var xhr = new XMLHttpRequest();
                            xhr.open('POST', './config/insert.php', true);
                            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                            xhr.onreadystatechange = function() {
                                if (xhr.readyState == 4 && xhr.status == 200) {
                                    alert(xhr.responseText);
                                }
                            };
                            var data = "namaka=Taksaka(68)";
                            xhr.send(data);
                        }
                        </script>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalTaksaka69" tabindex="-1" aria-labelledby="modalTaksaka69Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-body p-4 text-center border-bottom-2">
                    <h5 class="mb-0">Ingin Memulai Dinasan Di Kereta Taksaka(69)?</h5>
                    <div class="b-example-divider-main"></div>
                    <p class="mb-0">Kereta yang dipilih tidak dapat diubah!</p>
                </div>
                <div class="modal-footer justify-content-around">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <a href="./PILIHSTANFORMASI.php">
                        <button type="button" class="btn btn-primary" onclick="TKS69()">Mulai</button></a>
                        <script>
                        function TKS69() {
                            var TKS69 = new XMLHttpRequest();
                            TKS69.open('POST', './config/insert.php', true);
                            TKS69.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                            TKS69.onreadystatechange = function() {
                                if (TKS69.readyState == 4 && TKS69.status == 200) {
                                    alert(TKS69.responseText);
                                }
                            };
                            var data = "namaka=Taksaka(69)";
                            TKS69.send(data);
                        }
                        </script>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalTaksaka70" tabindex="-1" aria-labelledby="modalTaksaka70Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-body p-4 text-center border-bottom-2">
                    <h5 class="mb-0">Ingin Memulai Dinasan Di Kereta Taksaka(70)?</h5>
                    <div class="b-example-divider-main"></div>
                    <p class="mb-0">Kereta yang dipilih tidak dapat diubah!</p>
                </div>
                <div class="modal-footer justify-content-around">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <a href="./PILIHSTANFORMASI.php">
                        <button type="button" class="btn btn-primary" onclick="saveData()">Mulai</button></a>
                        <script>
                        function saveData() {
                            var xhr = new XMLHttpRequest();
                            xhr.open('POST', './config/insert.php', true);
                            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                            xhr.onreadystatechange = function() {
                                if (xhr.readyState == 4 && xhr.status == 200) {
                                    alert(xhr.responseText);
                                }
                            };
                            var data = "namaka=Taksaka(70)";
                            xhr.send(data);
                        }
                        </script>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
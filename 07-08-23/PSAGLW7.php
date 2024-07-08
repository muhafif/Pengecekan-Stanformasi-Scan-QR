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
    </style>
</head>
<body>

    <!-- session_start();
    if (isset($_POST['namaka'])) {
        $_SESSION['namaka'] = $_POST['namaka'];
    } -->
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
                    <h4>Pilih Stanformasi</h4>
                    <div class="card shadow bg-body-tertiary rounded" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 1)) ,url(https://swamediainc.storage.googleapis.com/swa.co.id/wp-content/uploads/2020/05/12191311/Kereta-APi.jpg);">
                        <div class="card-body" style="justify-content: center; align-items: center; display: flex;">
                            <button type="button" class="btn btn-lg" style="color: white;"
                            data-bs-toggle="modal"
                            data-bs-target="#modalLuxuryArgoLawu7"><strong>LUXURY</strong></button>
                        </div>
                    </div>
                    <div class="b-example-divider-main"></div>
                    <div class="card shadow bg-body-tertiary rounded" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 1)) ,url(https://swamediainc.storage.googleapis.com/swa.co.id/wp-content/uploads/2020/05/12191311/Kereta-APi.jpg);">
                        <div class="card-body" style="justify-content: center; align-items: center; display: flex;">
                            <button type="button" class="btn btn-lg" style="color: white;"
                            data-bs-toggle="modal"
                            data-bs-target="#modalEks1ArgoLawu7"><strong>EKSEKUTIF 1</strong></button>
                        </div>
                    </div>
                    <div class="b-example-divider-main"></div>
                    <div class="card shadow bg-body-tertiary rounded" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 1)) ,url(https://swamediainc.storage.googleapis.com/swa.co.id/wp-content/uploads/2020/05/12191311/Kereta-APi.jpg);">
                        <div class="card-body" style="justify-content: center; align-items: center; display: flex;">
                            <button type="button" class="btn btn-lg" style="color: white;"
                            data-bs-toggle="modal"
                            data-bs-target="#modalEks2ArgoLawu7"><strong>EKSEKUTIF 2</strong></button>
                        </div>
                    </div>
                    <div class="b-example-divider-main"></div>
                    <div class="card shadow bg-body-tertiary rounded" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 1)) ,url(https://swamediainc.storage.googleapis.com/swa.co.id/wp-content/uploads/2020/05/12191311/Kereta-APi.jpg);">
                        <div class="card-body" style="justify-content: center; align-items: center; display: flex;">
                            <button type="button" class="btn btn-lg" style="color: white;"
                            data-bs-toggle="modal"
                            data-bs-target="#modalEks3ArgoLawu7"><strong>EKSEKUTIF 3</strong></button>
                        </div>
                    </div>
                    <div class="b-example-divider-main"></div>
                    <div class="card shadow bg-body-tertiary rounded" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 1)) ,url(https://swamediainc.storage.googleapis.com/swa.co.id/wp-content/uploads/2020/05/12191311/Kereta-APi.jpg);">
                        <div class="card-body" style="justify-content: center; align-items: center; display: flex;">
                            <button type="button" class="btn btn-lg" style="color: white;"
                            data-bs-toggle="modal"
                            data-bs-target="#modalEks4ArgoLawu7"><strong>EKSEKUTIF 4</strong></button>
                        </div>
                    </div>
                    <div class="b-example-divider-main"></div>
                    <div class="card shadow bg-body-tertiary rounded" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 1)) ,url(https://swamediainc.storage.googleapis.com/swa.co.id/wp-content/uploads/2020/05/12191311/Kereta-APi.jpg);">
                        <div class="card-body" style="justify-content: center; align-items: center; display: flex;">
                            <button type="button" class="btn btn-lg" style="color: white;"
                            data-bs-toggle="modal"
                            data-bs-target="#modalEks5ArgoLawu7"><strong>EKSEKUTIF 5</strong></button>
                        </div>
                    </div>
                    <div class="b-example-divider-main"></div>
                    <div class="card shadow bg-body-tertiary rounded" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 1)) ,url(https://swamediainc.storage.googleapis.com/swa.co.id/wp-content/uploads/2020/05/12191311/Kereta-APi.jpg);">
                        <div class="card-body" style="justify-content: center; align-items: center; display: flex;">
                            <button type="button" class="btn btn-lg" style="color: white;"
                            data-bs-toggle="modal"
                            data-bs-target="#modalEks6ArgoLawu7"><strong>EKSEKUTIF 6</strong></button>
                        </div>
                    </div>
                    <div class="b-example-divider-main"></div>
                    <div class="card shadow bg-body-tertiary rounded" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 1)) ,url(https://swamediainc.storage.googleapis.com/swa.co.id/wp-content/uploads/2020/05/12191311/Kereta-APi.jpg);">
                        <div class="card-body" style="justify-content: center; align-items: center; display: flex;">
                            <button type="button" class="btn btn-lg" style="color: white;"
                            data-bs-toggle="modal"
                            data-bs-target="#modalEks7ArgoLawu7"><strong>EKSEKUTIF 7</strong></button>
                        </div>
                    </div>
                    <div class="b-example-divider-main"></div>
                    <div class="card shadow bg-body-tertiary rounded" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 1)) ,url(https://swamediainc.storage.googleapis.com/swa.co.id/wp-content/uploads/2020/05/12191311/Kereta-APi.jpg);">
                        <div class="card-body" style="justify-content: center; align-items: center; display: flex;">
                            <button type="button" class="btn btn-lg" style="color: white;"
                            data-bs-toggle="modal"
                            data-bs-target="#modalEks8ArgoLawu7"><strong>EKSEKUTIF 8</strong></button>
                        </div>
                    </div>
                    <div class="b-example-divider-main"></div>
                    <div class="card shadow bg-body-tertiary rounded" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 1)) ,url(https://swamediainc.storage.googleapis.com/swa.co.id/wp-content/uploads/2020/05/12191311/Kereta-APi.jpg);">
                        <div class="card-body" style="justify-content: center; align-items: center; display: flex;">
                            <button type="button" class="btn btn-lg" style="color: white;"
                            data-bs-toggle="modal"
                            data-bs-target="#modalEks9ArgoLawu7"><strong>EKSEKUTIF 9</strong></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="modal fade" id="modalLuxuryArgoLawu7" tabindex="-1" aria-labelledby="modalLuxuryArgoLawu7Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-body p-4 text-center border-bottom-2">
                    <h5 class="mb-0">Ingin Memulai Scan Stanformasi Luxury Di Kereta Argo Lawu(7)?</h5>
                    <div class="b-example-divider-main"></div>
                    <p class="mb-0">Stanformasi yang dipilih tidak dapat diubah!</p>
                </div>
                <div class="modal-footer justify-content-around">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <a href="./SCANQR.php">
                        <button type="button" class="btn btn-primary" onclick="luxAGLW7()">Mulai</button></a>
                        <script>
                        function luxAGLW7() {
                            var xhr = new XMLHttpRequest();
                            xhr.open('POST', './config/insert.php', true);
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
    <div class="modal fade" id="modalEks1ArgoLawu7" tabindex="-1" aria-labelledby="modalEks1ArgoLawu7Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-body p-4 text-center border-bottom-2">
                    <h5 class="mb-0">Ingin Memulai Scan Stanformasi Eksekutif 1 Di Kereta Argo Lawu(7)?</h5>
                    <div class="b-example-divider-main"></div>
                    <p class="mb-0">Stanformasi yang dipilih tidak dapat diubah!</p>
                </div>
                <div class="modal-footer justify-content-around">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <a href="./SCANQR.php">
                        <button type="button" class="btn btn-primary" onclick="EKS1AGLW7()">Mulai</button></a>
                        <script>
                        function EKS1AGLW7() {
                            var xhr = new XMLHttpRequest();
                            xhr.open('POST', './config/insert.php', true);
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
    <div class="modal fade" id="modalEks2ArgoLawu7" tabindex="-1" aria-labelledby="modalEks2ArgoLawu7Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centereTaksaka67d">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-body p-4 text-center border-bottom-2">
                    <h5 class="mb-0">Ingin Memulai Scan Stanformasi Eksekutif 2 Di Kereta Argo Lawu(7)?</h5>
                    <div class="b-example-divider-main"></div>
                    <p class="mb-0">Stanformasi yang dipilih tidak dapat diubah!</p>
                </div>
                <div class="modal-footer justify-content-around">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <a href="./SCANQR.php">
                        <button type="button" class="btn btn-primary" onclick="EKS2AGLW7()">Mulai</button></a>
                        <script>
                        function EKS2AGLW7() {
                            var xhr = new XMLHttpRequest();
                            xhr.open('POST', './config/insert.php', true);
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
    <div class="modal fade" id="modalEks3ArgoLawu7" tabindex="-1" aria-labelledby="modalEks3ArgoLawu7Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-body p-4 text-center border-bottom-2">
                    <h5 class="mb-0">Ingin Memulai Scan Stanformasi Eksekutif 3 Di Kereta Argo Lawu(7)?</h5>
                    <div class="b-example-divider-main"></div>
                    <p class="mb-0">Stanformasi yang dipilih tidak dapat diubah!</p>
                </div>
                <div class="modal-footer justify-content-around">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <a href="./SCANQR.php">
                        <button type="button" class="btn btn-primary" onclick="EKS3AGLW7()">Mulai</button></a>
                        <script>
                        function EKS3AGLW7() {
                            var xhr = new XMLHttpRequest();
                            xhr.open('POST', './config/insert.php', true);
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
    <div class="modal fade" id="modalEks4ArgoLawu7" tabindex="-1" aria-labelledby="modalEks4ArgoLawu7Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-body p-4 text-center border-bottom-2">
                    <h5 class="mb-0">Ingin Memulai Scan Stanformasi Eksekutif 4 Di Kereta Argo Lawu(7)?</h5>
                    <div class="b-example-divider-main"></div>
                    <p class="mb-0">Stanformasi yang dipilih tidak dapat diubah!</p>
                </div>
                <div class="modal-footer justify-content-around">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <a href="./SCANQR.php">
                        <button type="button" class="btn btn-primary" onclick="EKS4AGLW7()">Mulai</button></a>
                        <script>
                        function EKS4AGLW7() {
                            var xhr = new XMLHttpRequest();
                            xhr.open('POST', './config/insert.php', true);
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
    <div class="modal fade" id="modalEks5ArgoLawu7" tabindex="-1" aria-labelledby="modalEks5ArgoLawu7Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-body p-4 text-center border-bottom-2">
                    <h5 class="mb-0">Ingin Memulai Scan Stanformasi Eksekutif 5 Di Kereta Argo Lawu(7)?</h5>
                    <div class="b-example-divider-main"></div>
                    <p class="mb-0">Stanformasi yang dipilih tidak dapat diubah!</p>
                </div>
                <div class="modal-footer justify-content-around">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <a href="./SCANQR.php">
                        <button type="button" class="btn btn-primary" onclick="EKS5AGLW7()">Mulai</button></a>
                        <script>
                        function EKS5AGLW7() {
                            var xhr = new XMLHttpRequest();
                            xhr.open('POST', './config/insert.php', true);
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
    <div class="modal fade" id="modalEks6ArgoLawu7" tabindex="-1" aria-labelledby="modalEks6ArgoLawu7Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-body p-4 text-center border-bottom-2">
                    <h5 class="mb-0">Ingin Memulai Scan Stanformasi Eksekutif 6 Di Kereta Argo Lawu(7)?</h5>
                    <div class="b-example-divider-main"></div>
                    <p class="mb-0">Stanformasi yang dipilih tidak dapat diubah!</p>
                </div>
                <div class="modal-footer justify-content-around">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <a href="./SCANQR.php">
                        <button type="button" class="btn btn-primary" onclick="EKS6AGLW7()">Mulai</button></a>
                        <script>
                        function EKS6AGLW7() {
                            var xhr = new XMLHttpRequest();
                            xhr.open('POST', './config/insert.php', true);
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
    <div class="modal fade" id="modalEks7ArgoLawu7" tabindex="-1" aria-labelledby="modalEks7ArgoLawu7Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-body p-4 text-center border-bottom-2">
                    <h5 class="mb-0">Ingin Memulai Scan Stanformasi Eksekutif 7 Di Kereta Argo Lawu(7)?</h5>
                    <div class="b-example-divider-main"></div>
                    <p class="mb-0">Stanformasi yang dipilih tidak dapat diubah!</p>
                </div>
                <div class="modal-footer justify-content-around">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <a href="./SCANQR.php">
                        <button type="button" class="btn btn-primary" onclick="EKS7AGLW7()">Mulai</button></a>
                        <script>
                        function EKS7AGLW7() {
                            var xhr = new XMLHttpRequest();
                            xhr.open('POST', './config/insert.php', true);
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
    <div class="modal fade" id="modalEks8ArgoLawu7" tabindex="-1" aria-labelledby="modalEks8ArgoLawu7Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-body p-4 text-center border-bottom-2">
                    <h5 class="mb-0">Ingin Memulai Scan Stanformasi Eksekutif 8 Di Kereta Argo Lawu(7)?</h5>
                    <div class="b-example-divider-main"></div>
                    <p class="mb-0">Stanformasi yang dipilih tidak dapat diubah!</p>
                </div>
                <div class="modal-footer justify-content-around">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <a href="./SCANQR.php">
                        <button type="button" class="btn btn-primary" onclick="EKS8AGLW7()">Mulai</button></a>
                        <script>
                        function EKS8AGLW7() {
                            var xhr = new XMLHttpRequest();
                            xhr.open('POST', './config/insert.php', true);
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
    <div class="modal fade" id="modalEks9ArgoLawu7" tabindex="-1" aria-labelledby="modalEks9ArgoLawu7Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-body p-4 text-center border-bottom-2">
                    <h5 class="mb-0">Ingin Memulai Scan Stanformasi Eksekutif 9 Di Kereta Argo Lawu(7)?</h5>
                    <div class="b-example-divider-main"></div>
                    <p class="mb-0">Stanformasi yang dipilih tidak dapat diubah!</p>
                </div>
                <div class="modal-footer justify-content-around">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <a href="./SCANQR.php">
                        <button type="button" class="btn btn-primary" onclick="EKS9AGLW7()">Mulai</button></a>
                        <script>
                        function EKS9AGLW7() {
                            var xhr = new XMLHttpRequest();
                            xhr.open('POST', './config/insert.php', true);
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

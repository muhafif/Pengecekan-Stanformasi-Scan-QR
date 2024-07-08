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
                            data-bs-target="#modalARGODWIPANGGA9"
                            ><strong>ARGO DWIPANGGA (9)</strong></button>
                        </div>
                    </div>
                    <div class="b-example-divider-main"></div>
                    <div class="card shadow bg-body-tertiary rounded" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 1)) ,url(https://swamediainc.storage.googleapis.com/swa.co.id/wp-content/uploads/2020/05/12191311/Kereta-APi.jpg);">
                        <div class="card-body" style="justify-content: center; align-items: center; display: flex;">
                            <button type="button" class="btn btn-lg" style="color: white;"
                            data-bs-toggle="modal"
                            data-bs-target="#modalARGODWIPANGGA10"
                            ><strong>ARGO DWIPANGGA (10)</strong></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="modal fade" id="modalARGODWIPANGGA10" tabindex="-1" aria-labelledby="modalARGODWIPANGGA10Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-body p-4 text-center border-bottom-2">
                    <h5 class="mb-0">Ingin Memulai Dinasan Di Kereta Argo Dwipangga (10)?</h5>
                    <div class="b-example-divider-main"></div>
                    <p class="mb-0">Kereta yang dipilih tidak dapat diubah!</p>
                </div>
                <div class="modal-footer justify-content-around">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <a href="./PSADWP10.php">
                        <button type="button" class="btn btn-primary" onclick="ADWP10()">Mulai</button></a>
                        <script>
                        function ADWP10() {
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
    <div class="modal fade" id="modalARGODWIPANGGA9" tabindex="-1" aria-labelledby="modalARGODWIPANGGA9Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-body p-4 text-center border-bottom-2">
                    <h5 class="mb-0">Ingin Memulai Dinasan Di Kereta Argo Dwipangga (9)?</h5>
                    <div class="b-example-divider-main"></div>
                    <p class="mb-0">Kereta yang dipilih tidak dapat diubah!</p>
                </div>
                <div class="modal-footer justify-content-around">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <a href="./PSADWP9.php">
                        <button type="button" class="btn btn-primary" onclick="ADWP9()">Mulai</button></a>
                        <script>
                        function ADWP9() {
                            var xhr = new XMLHttpRequest();
                            xhr.open('POST', './config/insert.php', true);
                            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                            xhr.onreadystatechange = function() {
                                if (xhr.readyState == 4 && xhr.status == 200) {
                                    alert(xhr.responseText);
                                }
                            };
                            var data = "namaka=Argo Dwipangga (9)";
                            xhr.send(data);
                        }
                        </script>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
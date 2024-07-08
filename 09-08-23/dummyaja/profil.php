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

    

    if (isset($_POST["update"])) {
        $passwordlama = $_POST["katasandilama"];
        $passwordbaru = $_POST["katasandibaru"];
        $katasandilama = mysqli_real_escape_string($conn, $_POST["katasandilama"]);
        $katasandibaru = mysqli_real_escape_string($conn, $_POST["katasandibaru"]);
        
        if ($password == $katasandibaru) {
            $query = "UPDATE user SET
                    katasandilama = '$passwordlama',
                    katasandibaru = '$passwordbaru',
                    password = '$password'
                    WHERE NIPP = '$nipp'";
            mysqli_query($conn, $query);
        }
    
        echo "<meta http-equiv='refresh' content='0'>";
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
                        <li><a class="dropdown-item" href="profil.php">Profile</a></li>
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
                    <form methode="POST" action="" enctype="multipart/form-data">
                        <h1 class="card-title text-center">Profil Anda</h1>
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $_SESSION["nama"]; ?>"readonly>
                        <label for="nipp" class="form-label">NIPP</label>
                        <input type="number" class="form-control" id="NIPP" value="<?php echo $_SESSION["NIPP"]; ?>"readonly>
                        <label for="dinasan" class="form-label">Dinasan</label>
                        <input type="dinasan" class="form-control" id="dinasan" value="<?php echo $_SESSION["dinasan"]; ?>"readonly>
                        <label for="unit" class="form-label">Unit</label>
                        <input type="unit" class="form-control" id="unit" placeholder="DAOP 6 YK">
                        <label for="kedudukan" class="form-label">Kedudukan</label>
                        <input type="kedudukan" class="form-control" id="kedudukan" value="<?php echo $_SESSION["kedudukan"]; ?>"readonly>
                        <div class="b-example-divider"></div>
                        <label for="katasandilama" class="col-sm-2 col-form-label text-muted">Kata Sandi Lama</label>
                        <div class="col-sm-10 w-100">
                            <input type="password" class="form-control text-muted" id="passwordlama" name="password" placeholder="Kata Sandi">
                        </div>
                        <label for="katasandibaru" class="col-sm-2 col-form-label text-muted">Kata Sandi Baru</label>
                        <div class="col-sm-10 w-100">
                            <input type="password" class="form-control text-muted" id="passwordbaru" name="password" placeholder="Kata Sandi">
                        </div>
                        <!-- <label for="katasandi" class="form-label">Ubah Kata Sandi</label>
                        <input type="password" class="form-control" id="katasandilama" placeholder="Masukan Kata Sandi Lama">
                        <br>
                        <input type="password" class="form-control" id="katasandibaru" placeholder="Masukan Kata Sandi Baru"> -->
                        <a href="" class="btn btn-primary d-grid mt-4" type = "submit">Simpan Perubahan</a>
                    </form>
                </div>
            </div>
            <div class="b-example-divider-main"></div>
        </div>
    </main>
</body>
</html>
<?php
    // Sisipkan file koneksi
    include('./config/koneksi.php');

    // Query untuk mengambil data dari tabel users
    $sql = "SELECT * FROM user";
    $result = mysqli_query($db, $sql);

    // Periksa apakah data ditemukan
    if (mysqli_num_rows($result) > 0) {
        // Ambil data pertama dari hasil query (misalnya data user terakhir yang ditambahkan)
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Tidak ada data user.";
    }

    // Tutup koneksi database
    mysqli_close($db);
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
                <a class="navbar-brand" href="PILIHKERETA.html">
                    <img src="KAIPUTIH.png" alt="" width="50px">
                </a>
                <div class="col-md-4 text-end nav-item dropdown">
                    <a class="nav-link" href="#" data-bs-toggle="dropdown" aria-expanded="false" style="color: rgb(255, 255, 255);"><?php echo isset($row['nama']) ? $row['nama'] : ''; ?>
                        <i class="bi bi-person-circle"></i></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="PROFILEPAGE.html">Profile</a></li>
                            <li><a class="dropdown-item" href="LOGIN.html">Log Out</a></li>
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
                            <a href="PILIHSTANFORMASI.html">
                                <button type="button" class="btn btn-lg" style="color: white;"><strong>TAKSAKA (67)</strong></button></a>
                        </div>
                    </div>
                    <div class="b-example-divider-main"></div>
                    <div class="card shadow bg-body-tertiary rounded" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 1)) ,url(https://swamediainc.storage.googleapis.com/swa.co.id/wp-content/uploads/2020/05/12191311/Kereta-APi.jpg);">
                        <div class="card-body" style="justify-content: center; align-items: center; display: flex;">
                            <button type="button" class="btn btn-lg" style="color: white;"><strong>TAKSAKA (68)</strong></button>
                        </div>
                    </div>
                    <div class="b-example-divider-main"></div>
                    <div class="card shadow bg-body-tertiary rounded" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 1)) ,url(https://swamediainc.storage.googleapis.com/swa.co.id/wp-content/uploads/2020/05/12191311/Kereta-APi.jpg);">
                        <div class="card-body" style="justify-content: center; align-items: center; display: flex;">
                            <button type="button" class="btn btn-lg" style="color: white;"><strong>TAKSAKA (69)</strong></button>
                        </div>
                    </div>
                    <div class="b-example-divider-main"></div>
                    <div class="card shadow bg-body-tertiary rounded" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 1)) ,url(https://swamediainc.storage.googleapis.com/swa.co.id/wp-content/uploads/2020/05/12191311/Kereta-APi.jpg);">
                        <div class="card-body" style="justify-content: center; align-items: center; display: flex;">
                            <button type="button" class="btn btn-lg" style="color: white;"><strong>TAKSAKA (70)</strong></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
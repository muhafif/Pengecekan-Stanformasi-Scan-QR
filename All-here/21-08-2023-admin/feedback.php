<?php
include('./config/koneksi.php');
include('./config/log.php');
// session_start();

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

    // Ambil data nama KA dari database
    if (isset($_SESSION["login"])) {
        $login_as = $_SESSION["NIPP"];
        $result_login = mysqli_query($conn, "SELECT NIPP, nama, namaka, tanggal_ka FROM user WHERE NIPP = '$login_as'");
        $row = mysqli_fetch_assoc($result_login);

        $_SESSION["nama"] = $row["nama"];
        $_SESSION["namaka"] = $row["namaka"];
        $_SESSION["tanggal_ka"] = $row["tanggal_ka"];
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
        <title>Ulasan</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
        <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/instascan@2.0.1/instascan.min.js"></script>
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        html, body {
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            background-color: #EFF1F3;
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
        <nav class="navbar navbar-expand-md fixed-top" style="background: var(--navbar, linear-gradient(134deg, #252271 6.77%, #421856 46.35%, #9F2B48 100%));;">
            <div class="container-fluid">
                <a class="navbar-brand" href="./homepage.php">
                    <img src="KAIPUTIH.png" alt="" width="50px">
                </a>
                <div class="btn-group dropstart">
                    <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false" style= "color:white;"><?php echo $row["nama"]; ?>
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
        <div class="card" style="background: white; padding: 10px; border-radius: 10px; margin: 10px; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);">
            <form action="../config/insert.php" method="post" id="form">
                <label for="exampleFormControlTextarea1" class="form-label">Isi Umpan Balik</label>
                <textarea class="form-control" id="feedback exampleFormControlTextarea1" name="feedback" rows="3" style="border: 2px solid black;" required></textarea>
                <input type="text" readonly="" class="form-control" name="NIPP" autocomplete="off" size="25px" maxlength="25px" value="<?php echo isset($_SESSION['NIPP']) ? $_SESSION['NIPP'] : ''; ?>">
                <input type="text" class="form-control" name="nama" autocomplete="off" readonly="" value="<?php echo $row['nama'];  ?>">
                <input type="text" class="form-control" name="namaka" autocomplete="off" readonly="" value="<?php echo $row['namaka']; ?>">
                <input type="text" class="form-control" name="tanggal_ka" autocomplete="off" readonly="" value="<?php echo $row['tanggal_ka']; ?>">
            </div>
            <div>
                <button type="submit" class="btn mt-2" style="background-color: #252271; color: white;">Kirim Umpan Balik</button>
            </div>
        </div>
    </main>
    
</body>
</html>
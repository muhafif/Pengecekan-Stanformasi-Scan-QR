<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('./config/koneksi.php');
$server = "localhost";
$username = "root";
$password = "";
$dbname = "dummyaja";
$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed" . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pengecekan Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>

</head>
<body>
    <header>
        <nav class="navbar navbar-expand-md fixed-top" style="background-color: #252271; justify-content: space-between;">
            <div class="container-fluid" style="color: white;">
              <a class="navbar-brand" href="./homepage.php"> <img src="./KAIPUTIH.png" alt="" width="70px"></a>
              <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" href="#">Dashboard</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Sarana</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">User Management</a>
                  </li>
                </ul>
              </div>
              <a class="nav-link" href="#">Logout</a>
            </div>
        </nav>
        <div class="b-example-divider-header"></div>
    </header>

    <main>
    <div class="card" style="margin: 20px; margin-top: 10px; width: auto; border-radius: 15px; padding: 10px;">
        <h4>Filter Riwayat Pengecekan Kereta Api</h4>
        <form action="" method="POST">
            <table style="justify-content: left; padding: 15px; float: left">
                <tr>
                    <td>
                    <select class="btn btn-secondary" name="dinasan" id="dinasan" required="required" style="margin:5px">
                    </style>>
                        <option value="" disabled selected>Pilih Dinasan</option>
                        <option value="Kondektur">Kondektur</option>
                        <option value="TKA">TKA</option>
                        <option value="Polsuska">Polsuska</option>
                        <option value="Semua">Semua</option>
                    </select>
                    </td>
                    <td><input class="form-control" type="date" name="dari_tgl" required="required" size="10" value="<?php echo isset($_POST['dari_tgl']) ? $_POST['dari_tgl'] : date('d-m-Y'); ?>"></td>
                    <td>-</td>
                    <td><input class="form-control" type="date" name="sampai_tgl" required="required" size="10" value="<?php echo isset($_POST['sampai_tgl']) ? $_POST['sampai_tgl'] : date('d-m-Y'); ?>"></td>
                    <td><input type="submit" class="btn" name="filter" value="Apply" style="background-color: #252271; color: white"></td>
                    <td>
                        <a href="adminriwayat.php?reset=1" class="btn btn-secondary reset-btn">
                            Reset Filter
                        </a>
                    </td>
                    <td>
                        <a href="export.php?download=1&dari_tgl=<?php echo isset($_POST['dari_tgl']) ? $_POST['dari_tgl'] : date('Y-m-d'); ?>&sampai_tgl=<?php echo isset($_POST['sampai_tgl']) ? $_POST['sampai_tgl'] : date('Y-m-d'); ?>&dinasan=<?php echo isset($_POST['dinasan']) ? $_POST['dinasan'] : 'Pilih Dinasan'; ?>" class="btn btn-success download-btn">
                            <i class="fa fa-file-excel-o fa-fw"></i> Export to Excel
                        </a>
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <div class="card" style="margin: 20px; margin-top: 10px; width: auto; border-radius: 15px; padding: 10px;">
        <h4>Riwayat Pengecekan Kereta Api</h4>
        <form action="export.php" method="post">
            <table class="table table-borderless table-striped table-earning"
            style="justify-content: right; padding: 15px; float: right">
            <br>
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>NIPP</th>
                        <th>Nama</th>
                        <th>Dinasan</th>
                        <th>Nama KA</th>
                        <th>Tanggal KA</th>
                        <th>Stanformasi</th>
                        <th>No Sarana</th>
                        <th>Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $batas = 25;
                    $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                    $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                    $previous = $halaman - 1;
                    $next = $halaman + 1;

                    $data = mysqli_query($conn,"SELECT * FROM table_pengecekan");
                    $jumlah_data = mysqli_num_rows($data);
                    $total_halaman = ceil($jumlah_data / $batas);

                    if (isset($_POST['filter'])) {
                        $query = "SELECT * FROM table_pengecekan WHERE 1"; // Mengambil semua data

                        $dari_tgl = mysqli_real_escape_string($conn, $_POST['dari_tgl']);
                        $sampai_tgl = mysqli_real_escape_string($conn, $_POST['sampai_tgl']);
                        $dinasan = mysqli_real_escape_string($conn, $_POST['dinasan']);
                    
                        if (!empty($dari_tgl) && !empty($sampai_tgl)) {
                            $query .= " AND tanggal_ka BETWEEN '$dari_tgl' AND '$sampai_tgl'";
                        }

                        $dinasan = mysqli_real_escape_string($conn, $_POST['dinasan']);
                        if ($dinasan != "" && $dinasan != "Semua") {
                            $query .= " AND dinasan = '$dinasan'";
                        }
                    } else {
                        $dari_tgl = date('Y-m-d'); // Atur nilai default jika formulir belum disubmit
                        $sampai_tgl = date('Y-m-d');
                        $dinasan = "Semua";

                        $query = "SELECT * FROM table_pengecekan"; // Ambil semua data jika tidak ada filter
                    }

                    if (isset($_GET['reset']) && $_GET['reset'] == 1) {
                        // Kembalikan filter ke nilai awal
                    }                   

                    $result = mysqli_query($conn, $query);
                    $nomor = $halaman_awal + 1;

                    while ($d = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td><?php echo $nomor++; ?></td>
                            <td><?php echo $d['NIPP']; ?></td>
                            <td><?php echo $d['nama']; ?></td>
                            <td><?php echo $d['dinasan']; ?></td>
                            <td><?php echo $d['namaka']; ?></td>
                            <td><?php echo date('d-m-Y', strtotime($d['tanggal_ka'])); ?></td>
                            <td><?php echo $d['stanformasi']; ?></td>
                            <td><?php echo $d['nosarana']; ?></td>
                            <td><?php echo $d['waktu']; ?></td>
                        </tr>
                    <?php } 
                    ?>
                </tbody>
            </table>
        </form>
        <nav>
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php if ($halaman > 1) { echo "href='?halaman=$previous'"; } ?>>Previous</a>
                </li>
                <?php 
                for ($x = 1; $x <= $total_halaman; $x++) {
                    ?> 
                    <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                    <?php
                }
                ?>				
                <li class="page-item">
                    <a class="page-link" <?php if ($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
                </li>
            </ul>
        </nav>
    </div>
</main>
</body>
</html>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
   html, body {
       font-family: 'Poppins', sans-serif;
       font-size: 1rem;
   }
   .b-example-divider-header {
   height: 60px;
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

   .container {
    padding: 10px;
   }

   .nav-link{
    color: white;
   }

   .download-btn {
            margin-left: 5px;
    }
</style>

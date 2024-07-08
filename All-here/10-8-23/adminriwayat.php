<?php
include('./config/koneksi.php');
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
              <a class="nav-link" href="#">Dashboard</a>
              <a class="nav-link" href="#">Sarana</a>
              <a class="nav-link" href="#">User Management</a>
              <a class="nav-link" href="#">Logout</a>
            </div>
        </nav>
        <div class="b-example-divider-header"></div>
    </header>

    <main>
        <div class="card" style="margin: 20px; margin-top: 10px; width: auto; border-radius: 15px; padding: 10px;"><div>Riwayat Pengecekan Kereta Api</div>
        <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Nomor</th>
                        <th>NIPP</th>
                        <th>Nama Pegawai</th>
                        <th>Dinasan</th>
                        <th>Kereta Api</th>
                        <th>Stanformasi</th>
                        <th>No Sarana</th>
                        <th>Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $batas = 10;
                    $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                    $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
    
                    $previous = $halaman - 1;
                    $next = $halaman + 1;
                    
                    $data = mysqli_query($conn,"SELECT * FROM table_pengecekan");
                    $jumlah_data = mysqli_num_rows($data);
                    $total_halaman = ceil($jumlah_data / $batas);
    
                    $data_pegawai = mysqli_query($conn,"SELECT * FROM table_pengecekan limit $halaman_awal, $batas");
                    $nomor = $halaman_awal+1;
                    while($d = mysqli_fetch_array($data_pegawai)){
                        ?>
                        <tr>
                            <center><td><?php echo $nomor++; ?></td></center>
                            <td><?php echo $d['NIPP']; ?></td>
                            <td><?php echo $d['nama']; ?></td>
                            <td><?php echo $d['dinasan']; ?></td>
                            <td><?php echo $d['namaka']; ?></td>
                            <td><?php echo $d['stanformasi']; ?></td>
                            <td><?php echo $d['nosarana']; ?></td>
                            <td><?php echo $d['waktu']; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </div>
        </table>
                <nav>
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
                        </li>
                        <?php 
                        for($x=1;$x<=$total_halaman;$x++){
                            ?> 
                            <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                            <?php
                        }
                        ?>				
                        <li class="page-item">
                            <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next>></a>
                        </li>
                    </ul>
                </nav>
                <br>
                    <button type="submit" class="btn btn-success pull-rigt" onclick="Export()">
                        <i class="fa fa-file-excel-o fa-fw"></i> Export to Excel
                    </button>
        </div>
        <script>
            function Export() 
            {
                var conf = confirm("Please confirm if you wish to proceed in exporting the attendance in to Excel File");
                if(conf == true)
                {
                    window.open("export.php",'_blank');
                }
            }
        </script>
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

</style>
<?php
include('./config/koneksi.php');
$searchErr = '';
$employee_details='';
if(isset($_POST['save_search'])) {
    if(!empty($_POST['search'])) {
        $search = $_POST['search'];
        $stmt = $conn->prepare("SELECT * FROM user WHERE NIPP LIKE '%$search%' OR nama LIKE '%$search%' OR dinasan LIKE '%$search%'");
        $stmt->execute();

        $employee_details = $stmt->get_result();
        $data = $employee_details->fetch_all(MYSQLI_ASSOC);
    } else {
        $searchErr = "Please enter the information";
    }
}

if(isset($_POST['save_filter'])) {
    if(!empty($_POST['filter_dinasan'])) {
        $filterDinasan = $_POST['filter_dinasan'];
        $stmt = $conn->prepare("SELECT * FROM user WHERE dinasan = ?");
        $stmt->bind_param("s", $filterDinasan);
        $stmt->execute();

        $employee_details = $stmt->get_result();
        $data = $employee_details->fetch_all(MYSQLI_ASSOC);
    }
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
    
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-md fixed-top" style="background-color: #252271; justify-content: space-between;">
            <div class="container-fluid" style="color: white;">
              <a class="navbar-brand" href="./homepage.php"> <img src="../KAIPUTIH.png" alt="" width="70px"></a>
              <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" href="#">Riwayat</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="admindashboard.php">Sarana</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="usermanagement.php">User Management</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="adminmanagement.php">Admin Management</a>
                  </li>
                </ul>
              </div>
              <a class="nav-link" href="logout.php">Logout</a>
            </div>
        </nav>
        <div class="b-example-divider-header"></div>
    </header>

    <main>
    <div class="container mt-3">
    <h4 class="mb-3">User Management</h4>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <form class="form-inline" action="hasilpencarian.php" method="post">
            <div class="input-group gap-2">
                <input type="text" class="form-control" id="search" name="search" placeholder="NIPP" aria-label="Cari" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn" name="save_search" type="submit" style="background-color:#252271; color:white;">Cari</button>
                </div>
            </div>
        </form>
        
        <form class="form-inline" action="hasilpencarian.php" method="post">
            <div class="input-group gap-2">
                <select class="form-select" name="filter_dinasan">
                    <option value="" disabled selected>Pilih Dinasan</option>
                    <option value="kondektur">Kondektur</option>
                    <option value="tka">TKA</option>
                    <option value="polsuska">Polsuska</option>
                </select>
                <div class="input-group-append">
                    <button class="btn" name="save_filter" type="submit" style="background-color:#FF7D34; color:white;">Filter</button>
                </div>
            </div>
        </form>
        
        <div>
            <a class="btn" style="background-color:#FF7D34; color:white;" href="tambahuser.php">Tambah User</a>
        </div>
    </div>
 
        <div class="card" style="margin: auto; margin-top: 10px; width: 100%; border-radius: 15px; padding: 40px; ">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Nomor</th>
                        <th>NIPP</th>
                        <th>Nama Pegawai</th>
                        <th>Dinasan</th>
                        <th>Unit</th>
                        <th>Kedudukan</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $batas = 10;
                    $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                    $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
    
                    $previous = $halaman - 1;
                    $next = $halaman + 1;
                    
                    $data = mysqli_query($conn,"SELECT * FROM user");
                    $jumlah_data = mysqli_num_rows($data);
                    $total_halaman = ceil($jumlah_data / $batas);
    
                    $data_pegawai = mysqli_query($conn,"SELECT * FROM user limit $halaman_awal, $batas");
                    $nomor = $halaman_awal+1;
                    while($d = mysqli_fetch_array($data_pegawai)){
                        ?>
                        <tr>
                            <td><?php echo $nomor++; ?></td>
                            <td><?php echo $d['NIPP']; ?></td>
                            <td><?php echo $d['nama']; ?></td>
                            <td><?php echo $d['dinasan']; ?></td>
                            <td><?php echo $d['unit']; ?></td>
                            <td><?php echo $d['kedudukan']; ?></td>
                            <td><a class="btn btn-default submitBtn" style="background-color: #FB9006; color: white;" href="edituser.php?NIPP=<?php echo $d['NIPP']; ?>">Edit</a></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
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

  .nav-link{
    color:white;
  }
</style>
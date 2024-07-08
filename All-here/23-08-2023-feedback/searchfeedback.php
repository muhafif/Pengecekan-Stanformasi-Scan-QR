<?php
include('./config/koneksi.php');
$searchErr = '';
$employee_details='';
if(isset($_POST['simpan'])) {
    if(!empty($_POST['cari'])) {
        $search = $_POST['cari'];
        $stmt = $conn->prepare("SELECT * FROM ulasan WHERE NIPP LIKE '%$search%' OR nama LIKE '%$search%' OR namaka LIKE '%$search%' OR tanggal_ka LIKE '%$search%' OR ulasan LIKE '%$search%'");
        $stmt->execute();

        $employee_details = $stmt->get_result();
        $data = $employee_details->fetch_all(MYSQLI_ASSOC);
    } else {
        $searchErr = "Please enter the information";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Catatan Dinas</title>
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
            margin: 5px;
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

        .nav-link{
            color: white;
        }
        </style>
    </head>

    <body>
    <header>
        <nav class="navbar navbar-expand-md fixed-top" style="background: var(--navbar, linear-gradient(134deg, #252271 6.77%, #421856 46.35%, #9F2B48 100%));">
            <div class="container-fluid" style="color: white;">
              <a class="navbar-brand" href="./homepage.php"> <img src="./KAIPUTIH.png" width="70px"></a>
              <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" href="#">Data</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Sarana</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">User Management</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Admin Management</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Feedback</a>
                  </li>
                </ul>
              </div>
              <a class="nav-link" href="#">Logout</a>
            </div>
        </nav>
        <div class="b-example-divider-header"></div>
    </header>

        <div class="container mb-3">
        <h4 class="mb-3">Catatan Dinas</h4>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <form class="form-inline" action="./searchfeedback.php" method="post">
                <div class="input-group gap-2">
                    <input type="text" class="form-control" id="cari" name="cari" placeholder="Cari" aria-label="Cari" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn" name="save_search" type="submit" style="background-color:#252271; color:white;">Cari</button>
                    </div>
                </div>
            </form>
        </div>

        <h4>Hasil Pencarian</h4>
        <div class="card" style="width: 100%; border-radius: 15px; padding: 20px;">          
        <table class="table">
            <thead>
            <tr>
                <th>Nomor</th>
                <th>NIPP</th>
                <th>Nama Pegawai</th>
                <th>Nama KA</th>
                <th>Tanggal KA</th>
                <th>Catatan Dinas</th>
                <th>Waktu</th>
            </tr>
            </thead>
            <tbody>
                    <?php
                    if(!$employee_details)
                    {
                        echo '<tr>No data found</tr>';
                    }
                    else{
                        foreach($employee_details as $key=>$value)
                        {
                            ?>
                        <tr>
                            <td><?php echo $key+1;?></td>
                            <td><?php echo $value['NIPP'];?></td>
                            <td><?php echo $value['nama'];?></td>
                            <td><?php echo $value['namaka'];?></td>
                            <td><?php echo $value['tanggal_ka'];?></td>
                            <td><?php echo $value['ulasan'];?></td>
                            <td><?php echo $value['waktu'];?></td>
                        </tr>
                            
                            <?php
                        }
                        
                    }
                    ?>
            </tbody>
        </table>
        </div>
    </body>
</html>
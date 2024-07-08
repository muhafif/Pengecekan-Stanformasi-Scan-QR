<?php
include('../config/koneksi.php');
$searchErr = '';
$employee_details='';
if(isset($_POST['save']))
{
    if(!empty($_POST['search']))
    {
        $search = $_POST['search'];
        $stmt = $conn-> prepare("SELECT * FROM qrcode WHERE nosarana like '%$search%'");
        $stmt->execute();

        $employee_details = $stmt->get_result();
        $data = $employee_details->fetch_all(MYSQLI_ASSOC);
        //$employee_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //print_r($employee_details);
    }
    else
    {
        $searchErr = "Please enter the information";
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
        <nav class="navbar navbar-expand-md fixed-top" style="background: var(--navbar, linear-gradient(134deg, #252271 6.77%, #421856 46.35%, #9F2B48 100%)); justify-content: space-between;">
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

    <main style="margin: 10px;">
        <div class="row row-cols-1 row-cols-md-2 g-4" style="justify-content: space-between;">
            <div class="col" style="width:70%">
              <div class="card" style="box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);">
                <div class="card-body">
                <div class="container mt-3 d-flex justify-content-end" style="width:50%"><label for="" class="col-sm-5 col-form-label">Sarana Kereta Api</label>
                    <form class="form-inline" action="pencariansarana.php" method="post">
                        <div class="input-group gap-2">
                            <input type="text" class="form-control" id="search" name="search" placeholder="Nomor Sarana" aria-label="Cari" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn" name="save" type="submit" style="background-color:#252271; color:white;">Cari</button>
                            </div>
                        </div>
                    </form>
                </div>

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">No Sarana</th>
                            <th scope="col">QR Code</th>
                            <th scope="col">Download</th>
                            <th scope="col">Hapus Sarana</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = $conn->query("SELECT*FROM qrcode");
                            while ($resl = $sql->fetch_array()) {
                            ?>
                                <tr>
                                    <td><?=$resl['nosarana']?></td>
                                    <td><img src="gambarqr/<?=$resl['gambarqr']?>" alt="" width="100"></td>
                                    <td><a class="btn btn-default submitBtn" style="background-color: #0FA91E; color: white;" href="download.php?file=<?php echo $resl['gambarqr']; ?>">Download</a>
                                    <td><a class="btn btn-default submitBtn" style="background-color: #F14545; color: white;" href="delete.php?nosarana=<?php echo $resl["nosarana"]; ?>">Delete</a></td>
                                </tr>
                            <?php
                            }
                            ?>       
                        </tbody>
                    </table>
                </div>
              </div>
            </div>

            <div class="col" style="width: 30%;">
                <div class="card flex-start" style="box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);">
                  <div class="card-body">
                    <form action = "qrcode.php" method = "POST">
                        <h5 class="card-title">QR Generator</h5>
                            <div class="mb-3 row">
                                <label for="nosarana" class="col-sm-3 col-form-label">No Sarana</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="nosarana" name="nosarana" placeholder="Masukkan Nomor Sarana">
                            </div>
                            <button type="submit" class="btn mt-2" style="background-color: #252271; color: white;">Generate QR Code</button>
                    </form>
                </div>

                  
                
            </div>
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
   #tampil_modal {
            padding-top: 19em;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 10;
            display: block;
            z-index: 1;
            background: hsla(0, 0%, 80%, .7);
        }
        #modal{
            padding: 15px;
            font-size: 16px;
            background: #FFFFFF;
            color: #000000;
            width: 75%;
            border-radius: 15px;
            margin: 0 auto;
            margin-bottom: 20px;
            padding-bottom: 50px;
            z-index: 9;
        }
        #modal_atas{
            width: 100%;
            background:#FFFFFF;
            padding: 15px;
            margin-left: -15px;
            font-size: 18px;
            margin-top: -15px;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            font-weight: bold;
        }
        #oke {
            background:#00008B;
            border:none;
            float:right;
            width: 70px;
            height:auto;
            color: #FFFFFF;
            margin-right: 5px;
            cursor: pointer;
            padding: 6px;
            font-size: 15px;
        }

    .nav-link {
        color: white;
    }

</style>
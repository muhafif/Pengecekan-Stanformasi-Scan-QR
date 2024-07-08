<?php
include('../config/koneksi.php');

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
              <a class="nav-link" href="#">Dashboard</a>
              <a class="nav-link" href="admindashboard.php">Sarana</a>
              <a class="nav-link" href="usermanagement.php">User Management</a>
              <a class="nav-link" href="../config/logout.php">Logout</a>
            </div>
        </nav>
        <div class="b-example-divider-header"></div>
    </header>

    <main>
        <div class="container">
            <div class="card shadow bg-body-tertiary rounded">
                <div class="card-body">
                    <?php
                    $nipp = $_GET['NIPP'];
                    $data = mysqli_query($conn,"SELECT * from user where NIPP='$nipp'");
                    while($d = mysqli_fetch_array($data)){
                    ?>
                    <form methode="post" action="simpanuser.php" enctype="multipart/form-data">
                        <h1 class="card-title text-center">Edit Profil</h1>
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $d['nama']; ?>">
                        <label for="nipp" class="form-label">NIPP</label>
                        <input type="number" class="form-control" id="NIPP" name="NIPP" value="<?php echo $d['NIPP']; ?>" readonly>
                        <label for="dinasan" class="form-label">Dinasan</label>
                        <input type="dinasan" class="form-control" id="dinasan" name="dinasan" value="<?php echo $d['dinasan']; ?>">
                        <label for="unit" class="form-label">Unit</label>
                        <input type="unit" class="form-control" id="unit" placeholder="DAOP 6 YK">
                        <label for="kedudukan" class="form-label">Kedudukan</label>
                        <input type="kedudukan" class="form-control" id="kedudukan" name="kedudukan" value="<?php echo $d['kedudukan']; ?>">
                        <div class="b-example-divider"></div>
                        <label for="katasandilama" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10 w-100">
                            <input type="text" class="form-control " id="passwordlama" name="password"value="<?php echo $d['password'];?>">
                        </div>
                        <div class="d-flex justify-content-end gap-2 mt-3 mb-3">
                            <a class="btn btn-default submitBtn" style="background-color: #F14545; color: white;" href="deleteuser.php?NIPP=<?php echo $d["NIPP"]; ?>">Hapus Pengguna</a></td>
                            <button class="btn" name="submit" type="submit" style="background-color:#252271; color:white;">Simpan Perubahan</button>
                        </div>
                    </form>
                    <?php 
	}
	?>
                </div>
            </div>
            <div class="b-example-divider-main"></div>
        </div>
    </main>

</body>
</html>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
   html, body {
       font-family: 'Poppins', sans-serif;
       font-size: 1rem;
       background-color: #EFF1F3;
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
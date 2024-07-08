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
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="#">Dashboard</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="admindashboard.php">Sarana</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="usermanagement.php">User Management</a>
                </li>
              </ul>
            </div>
            <a class="nav-link" href="../config/logout.php">Logout</a>
          </div>
      </nav>
      <div class="b-example-divider-header"></div>
   </header>
    <main>
        <div class="container">
            <div class="card shadow bg-body-tertiary rounded">
                <div class="card-body">
                    <form methode="POST" action="adduser.php" enctype="multipart/form-data">
                        <h1 class="card-title text-center">Tambah User</h1>
                        <label for="nipp" class="form-label">NIPP</label>
                        <input type="text" class="form-control" id="NIPP" name="NIPP" required>
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                        <label for="dinasan" class="form-label">Dinasan</label>
                        <input type="text" class="form-control" id="dinasan" name="dinasan" required>
                        <label for="unit" class="form-label">Unit</label>
                        <input type="text" class="form-control" id="unit" name="unit" required>
                        <label for="kedudukan" class="form-label">Kedudukan</label>
                        <input type="text" class="form-control" id="kedudukan" name="kedudukan" required>
                        <div class="b-example-divider"></div>
                        <label for="katasandibaru" class="col-sm-2 col-form-label">Kata Sandi Baru</label>
                        <div class="col-sm-10 w-100">
                            <input type="text" class="form-control" id="passwordbaru" name="password" placeholder="Kata Sandi">
                        </div>
                        <div class="d-flex justify-content-end gap-2 mt-3 mb-3">
                            <button class="btn" type="submit" style="background-color: #252271; color: white">Tambah Pengguna</button>
                        </div>
                    </form>
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

 .nav-link{
  color: white;
 }
</style>
<?php session_start();
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// Mendeteksi protokol saat ini (HTTP atau HTTPS)
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';

// Jika protokol saat ini adalah HTTP, arahkan ulang ke versi HTTPS
if ($protocol === 'http') {
    header("Location: https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    exit();
}
?>
<html>
    <head>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/instascan@2.0.1/instascan.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    </head>
        <body>
            <div class="container">
            <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                <a class="navbar-brand" href="#">WebsiteName</a>
                </div>
                <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li class="dropdown"><a class="dropdown-toogle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                    <li><a href="#">Page 1-1</a><li>
                    <li><a href="#">Page 1-2</a><li>
                    <li><a href="#">Page 1-3</a><li>
                    </ul>
                </li>
                
                <li><a href="#">Page 2</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span>Login</a></li>
                </ul>
            </div>
            </nav>


                <div class="row">
                    <div class="col-md-6">
                        <!-- <video id="preview" width="100%"></video> -->
                        <video id="preview" style="display: block;" width="100%"></video>
                        <?php

                            if(isset($_SESSION['error'])){
                                echo"
                                    <div class='alert alert-danger'>
                                    <h4>Error!</h4>
                                    ".$_SESSION['error']."
                                    </div>
                                ";
                            }

                            if(isset($_SESSION['success'])){
                                echo"
                                    <div class='alert alert-primary'>
                                    <h4>Success!</h4>
                                    ".$_SESSION['success']."
                                    </div>
                                ";
                            }
                        ?>
                    </div>
                    <div class="col-md-6">
                    <form action="insert1.php" method="post" class="form-horizontal">
                        <label for="no">SCAN QRCODE</label>
                        <input type="password" id="no" name="no" placeholder="Enter some text" readonly class="form-control">
                        <input type="submit" value="Sudah Mengecek">
                    </form>
                    <!-- <form action="insert1.php" method="post" class="form-horizontal">
                        <label>SCAN QRCODE</label>
                        <input type="text" name="no" id="no" placeholder="Scanned QR Code will appear here" readonly class="form-control">
                    </form> -->
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>id</td>
                                    <td>nosarana</td>
                                    <td>waktu</td>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $server = "localhost";
                                $username = "root";
                                $password="";
                                $dbname="qrcodedb";

                                $conn = new mysqli($server,$username,$password,$dbname);

                                if($conn->connect_error){
                                    die("Connection failed" .$conn->connect_error);
                                }
                                    $sql = "SELECT id,nosarana,waktu FROM table_pengecekan";
                                    $query = $conn->query($sql);
                                    while ($row = $query->fetch_assoc()){
                                ?>
                                    <tr> 
                                        <td><?php echo $row['id'];?></td>
                                        <td><?php echo $row['nosarana'];?></td>
                                        <td><?php echo $row['waktu'];?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- <script type="text/javascript">
                    let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });

                    // Fungsi untuk mengakses kamera di perangkat seluler
                    function startMobileCamera() {
                        const constraints = {
                            audio: false,
                            video: {
                                facingMode: { exact: 'environment' }
                            }
                        };
                        navigator.mediaDevices.getUserMedia(constraints)
                            .then(function(stream) {
                                document.getElementById('preview').srcObject = stream;
                                scanner.start(stream);
                            })
                            .catch(function(error) {
                                console.error(error);
                                alert('Could not access the camera.');
                            });
                    }

                    // Fungsi untuk mengakses kamera di desktop
                    function startDesktopCamera(cameras) {
                        if (cameras.length > 0) {
                            scanner.start(cameras[1]);
                        } else {
                            alert('No cameras found');
                        }
                    }

                    // Memeriksa tipe perangkat (desktop atau seluler)
                    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                        startMobileCamera();
                    } else {
                        Instascan.Camera.getCameras().then(startDesktopCamera).catch(function(e) {
                            console.error(e);
                            alert('Could not access the camera.');
                        });
                    }

                    scanner.addListener('scan', function(content) {
                        document.getElementById('no').value = content;
                        document.form[0].submit();
                    });
                </script> -->

            <script>
                let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
                Instascan.Camera.getCameras().then(function(cameras){
                    if (cameras.length > 0 ){
                        scanner.start(cameras[0]);
                    } else {
                        alert('No cameras found');
                    }

                }).catch(function(e) {
                    console.error(e);
                });

                scanner.addListener('scan', function(content) {
                    document.getElementById('no').value = content;
                    document.form[0].submit();
                });
            </script>
        </body>
</html>
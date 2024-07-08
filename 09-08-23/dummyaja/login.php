<?php
include('./config/koneksi.php');
include('./config/log.php');

if (isset($_COOKIE["NIPP"]) && isset($_COOKIE["password"])) {
    $nipp = $_COOKIE["NIPP"];
    $password = $_COOKIE["password"];
    $result = mysqli_query($conn, "SELECT * FROM user WHERE NIPP = '$nipp'");
    $data = mysqli_fetch_assoc($result);

    if ($nipp === $data["NIPP"] && $password === $data["password"]) {
        $_SESSION["login"] = true;
        $_SESSION["NIPP"] = $data["NIPP"];
    }
}

if (isset($_POST["login"])) {
    $nipp = $_POST['NIPP'];
    $password = $_POST['password'];
    $query = mysqli_query($conn, "SELECT * FROM user WHERE NIPP='$nipp'");
    //cek email  
    $rows=mysqli_num_rows($query);
    if ($rows) {
        //cek password
        $data = mysqli_fetch_assoc($query);
        if (password_verify($password, $data["password"])) {
            // set seesion
            $_SESSION["login"] = true;
            $_SESSION["NIPP"] = $data["NIPP"];
            $_SESSION["nama"] = $data["nama"];
            $_SESSION["dinasan"] = $data["dinasan"];
            $_SESSION["kedudukan"] = $data["kedudukan"];
            $_SESSION["namaka"] = $data["namaka"];
            header("Location: homepage.php");
            if (isset($_POST["check"])) {
                setcookie("NIPP", $data["NIPP"], time() + 86400, "/");
                setcookie("password", $data["password"], time() + 86400, "/");
            }
            header('Location: homepage.php');
        }
    }
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="loginkai.css">
	<title>Login KAI Check</title>
</head>
<body style = "font-size: 1rem;">
	<div class="container">
		<form action="" method="POST" class="login-email">
            <div class="logo-login">
            <p><img src="https://shorturl.at/rsyCT" style="display:block; margin:auto;" width="100" /></p>
            </div>
			<p class="login-text" style="font-size: 1rem; font-weight: 500;">Aplikasi Pengecekan Kereta</p>
			<div class="input-group">
				<input type="text" placeholder="NIPP" name="NIPP" value="" id="NIPP" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="" id="password" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
		</form>
	</div>
    <div class="under-footer">
        <p>Copyright © 2023 - MAGANG TEL-U KAI DAOP 6</p>
    </div>
</body>
</html>

<style>
	@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    width: 100%;
    min-height: 100vh;
    background-position: center;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #e7e7e7;
}

.container {
    width: 400px;
    min-height: 400px;
    background: #FFF;
    border-radius: 10px;
    box-shadow: 0 0 5px rgba(0,0,0,.3);
    padding: 40px 30px;
}

.container .login-text {
    color: #111;
    font-weight: 500;
    font-size: 1rem;
    text-align: center;
    margin-bottom: 20px;
    display: block;
    text-transform: capitalize;
}

.under-footer {
    margin-top: 500px;
    position: absolute;
    color: darkgray;
}

.logo-login {
    display:block; margin-bottom: 20px;
}

.container .login-email .input-group {
    width: 100%;
    height: 50px;
    margin-bottom: 25px;
}

.container .login-email .input-group input {
    width: 100%;
    height: 100%;
    border: 2px solid #e7e7e7;
    padding: 15px 20px;
    font-size: 1rem;
    border-radius: 30px;
    background: transparent;
    outline: none;
    transition: .3s;
}

.container .login-email .input-group input:focus, .container .login-email .input-group input:valid {
    border-color: #a29bfe;
}

.container .login-email .input-group .btn {
    display: block;
    width: 100%;
    padding: 15px 20px;
    text-align: center;
    border: none;
    background: #252271;
    outline: none;
    border-radius: 30px;
    color: #FFF;
    cursor: pointer;
    transition: .3s;
}

.container .login-email .input-group .btn:hover {
    transform: translateY(-5px);
    background: #FF7D34;
}

.login-register-text {
    color: #111;
    font-weight: 500;
}

.login-register-text a {
    text-decoration: none;
    color: #FF7D34;
}

@media (max-width: 430px) {
    .container {
        width: 300px;
    }
    .container .login-social {
        display: block;
    }
    .container .login-social a {
        display: block;
    }
}
</style>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


if ($_SERVER["REQUEST_METHOD"]=="POST") {
    //mengambil data dari form
    $ulasan = $_POST["ulasan"];
    $NIPP = $_POST["NIPP"];
    $nama = $_POST["nama"];
    $namaka = $_POST["namaka"];
    $tanggal_ka = $_POST["tanggal_ka"];

    include('koneksi.php');

    $query = "SELECT*FROM user WHERE NIPP = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $NIPP);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    $NIPP = $row['NIPP'];

    $stmt = $conn->prepare("INSERT INTO ulasan (NIPP, nama, namaka, tanggal_ka, ulasan, waktu) VALUES (?, ?, ?, ?, ?, NOW())");
    $stmt->bind_param("sssss", $NIPP, $nama, $namaka, $tanggal_ka, $ulasan);

    if ($stmt->execute()) {
    echo '<div id="tampil_modal">
    <div id="modal">
    <div id="modal_atas">Berhasil</div>
    <p>Catatan Dinas Sudah Tersimpan.</p>
    <a href="../PILIHSTANFORMASI.php"><button id="oke">Close</button></a>
    </div></div>';
    } else {
    echo '<div id="tampil_modal">
    <div id="modal">
    <div id="modal_atas">Gagal!!</div>
    <p>Wei Data Belum Masuk</p>
    <a href="../feedback.php"><button id="oke">Close</button></a>
    </div></div>' . $stmt->error;
    }

    $stmt->close();

} else {
    // Jika akses langsung ke halaman ini tanpa mengirimkan data melalui formulir, arahkan ke halaman feedback_form.php
    header("Location: feedback.php");
}
?>

<style>
    #tampil_modal {
            padding-top: 5em;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 10;
            display: block;
            z-index: 1;
            background: hsla(0, 0%, 80%, .7);
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
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
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
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
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
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
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
        }

</style>
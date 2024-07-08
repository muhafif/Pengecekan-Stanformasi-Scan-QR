<?php
// Mengatur koneksi ke database (ganti dengan informasi koneksi sesuai dengan Anda)
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "dummyaja";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Memproses form update jika dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nipp = $_POST['NIPP'];
    $nama = $_POST['nama'];
    $dinasan = $_POST['dinasan'];
    $unit = $_POST['unit'];
    $kedudukan = $_POST['kedudukan'];
    $password = $_POST['password'];
    // Melakukan query update data user
    $sql = "UPDATE user SET nama='$nama', dinasan='$dinasan', unit='$unit', kedudukan='$kedudukan', password='$password' WHERE NIPP=$nipp";

    if ($conn->query($sql) === TRUE) {
        echo "Data user berhasil diperbarui.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi

?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Data User</title>
</head>
<body>

<h2>Update Data User</h2>

<?php
// Mendapatkan data user dari database (misalnya berdasarkan ID)
$nipp = $_GET['NIPP'];

// Melakukan query untuk mendapatkan data user
$sql = "SELECT * FROM user WHERE NIPP = $nipp";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
?>

<form method="post" action="">
    <input type="hidden" name="user_id" value="<?php echo $row['NIPP']; ?>">
    <label for="new_name">Nama Baru:</label>
    <input type="text" name="new_name" value="<?php echo $row['nama']; ?>"><br>
    <label for="new_email">Email Baru:</label>
    <input type="text" name="new_email" value="<?php echo $row['dinasan']; ?>"><br>
    <label for="new_email">Email Baru:</label>
    <input type="text" name="new_email" value="<?php echo $row['unit']; ?>"><br>
    <label for="new_email">Email Baru:</label>
    <input type="text" name="new_email" value="<?php echo $row['kedudukan']; ?>"><br>
    <label for="new_email">Email Baru:</label>
    <input type="text" name="new_email" value="<?php echo $row['password']; ?>"><br>
    <input type="submit" value="Update Data">
</form>

<?php
} else {
    echo "Data user tidak ditemukan.";
}
?>

</body>
</html>

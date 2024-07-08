<?php
include('./config/koneksi.php');
$sql = "DELETE FROM user WHERE NIPP='" . $_GET["NIPP"] . "'";
if (mysqli_query($conn, $sql)) {
    echo '<div id="tampil_modal">
    <div id="modal">
    <div id="modal_atas">Berhasil</div>
    <p>User Berhasil Dihapus ya wak geng.</p>
    <a href="usermanagement.php"><button id="oke">Close</button></a>
    </div></div>';
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
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
            width: 50%;
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
<?php
// include "../config/koneksi.php";
// include "phpqrcode/qrlib.php";

// if (isset($_REQUEST["file"])) {
//     $file = urldecode($_REQUEST["file"]);

//     if (preg_replace('/[^a-zA-Z0-9_.-]/', '', $file)) {
//         $filepath = "gambarqr/" . $file;

//         if (file_exists($filepath)) {
//             header('Content-Description: File Transfer');
//             header('Content-Type: application/octet-stream');
//             header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
//             header('Expires: 0');
//             header('Cache-Control: must-revalidate');
//             header('Pragma: public');
//             header('Content-Length: ' . filesize($filepath));
//             flush();
//             readfile($filepath);
//             die();
//         } else {
//             http_response_code(404);
//             die();
//         }
//     } else {
//         die("Invalid File Name!");
//     }
// }
?>

<?php
include "../config/koneksi.php";
include "phpqrcode/qrlib.php";

if (isset($_REQUEST["file"])) {
    $file = urldecode($_REQUEST["file"]);

    if (preg_replace('/[^a-zA-Z0-9_.-]/', '', $file)) {
        $saranaQuery = $conn->query("SELECT nosarana FROM qrcode WHERE alias = '$file'");
        
        if ($saranaQuery->num_rows > 0) {
            $row = $saranaQuery->fetch_assoc();
            $nomor_sarana = $row['nosarana'];
            
            // Generate the filepath based on the retrieved nomor sarana
            $filepath = "gambarqr/" . $nomor_sarana ;

            if (file_exists($filepath)) {
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($filepath));
                flush();
                readfile($filepath);
                die();
            } else {
                http_response_code(404);
                die();
            }
        } else {
            http_response_code(404);
            die();
        }
    } else {
        die("Invalid File Name!");
    }
}
?>

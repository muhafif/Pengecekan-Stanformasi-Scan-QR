<?php
include "../config/koneksi.php";
include "phpqrcode/qrlib.php";

if (isset($_REQUEST["file"])) {
    $file = urldecode($_REQUEST["file"]);

    if (preg_replace('/[^a-zA-Z0-9_.-]/', '', $file)) {
        $filepath = "gambarqr/" . $file;

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
        die("Invalid File Name!");
    }
}
// if(!empty($_GET['gambarqr'])){
//     $resl = basename($_GET['gambarqr']);
//     $filePath = 'gambarqr/'.$resl;
//     if(!empty($fileName) && file_exists($filePath)){
//         // Define headers
//         header('Content-Length: ' . filesize($filePath));  
//         header('Content-Encoding: none');
//         header("Cache-Control: public");
//         header("Content-Description: File Transfer");
//         header("Content-Disposition: attachment; filename=$resl");
//         header("Content-Type: application/zip");
//         header("Content-Transfer-Encoding: binary");
        
//         // Read the file
//         readfile($filePath);
//         exit;
//     }else{
//         echo 'The File '.$resl.' does not exist.';
//     }
// }
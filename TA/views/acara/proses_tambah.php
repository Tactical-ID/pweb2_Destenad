<?php
include_once "../../database.php";
include_once "../../controllers/AcaraController.php";

$database = new database();
$db = $database->getKoneksi();

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $gambar = $_FILES['gambar'];

    // Check if a file was uploaded successfully
    if ($gambar['error'] == UPLOAD_ERR_OK) {
        // Define the directory where the uploaded files will be stored
        $uploadDir = '../../content/';

        // Generate a unique name for the uploaded file to prevent overwriting
        $gambarName = uniqid('gambar_') . '_' . $gambar['name'];

        // Construct the full path to the uploaded file
        $uploadPath = $uploadDir . $gambarName;

        // Move the uploaded file to the specified directory
        move_uploaded_file($gambar['tmp_name'], $uploadPath);

        // Collect other form data
        $nama_acara = $_POST['nama_acara'];
        $lokasi = $_POST['lokasi'];
        $tanggal_mulai = $_POST['tanggal_mulai'];
        $waktu_mulai = $_POST['waktu_mulai'];
        $waktu_selesai = $_POST['waktu_selesai'];
        $keterangan = $_POST['keterangan'];

        // Create AcaraController instance
        $acaraController = new AcaraController($db);

        // Call createAcara method with all form data
        $result = $acaraController->createAcara($nama_acara, $lokasi, $tanggal_mulai, $waktu_mulai, $waktu_selesai, $keterangan, $gambarName);

        if ($result) {
            header("Location:Acara");
            exit; // Stop script execution
        } else {
            header("Location:tambahAcara?error=create_failed");
            exit; // Stop script execution
        }
    } else {
        // Handle file upload error
        header("Location:tambahAcara?error=file_upload_failed");
        exit; // Stop script execution
    }
}
?>

<?php
include_once "../../database.php";
include_once "../../controllers/AcaraController.php";

$database = new database();
$db = $database->getKoneksi();

if(isset($_GET['id'])){
    $id_acara = $_GET['id'];

    // Create an instance of AcaraController
    $acaraController = new AcaraController($db);

    // Assuming you have a method to get the image filename associated with the event
    $currentImage = $acaraController->getAcaraImage($id_acara);

    // Define the directory where the uploaded files are stored
    $uploadDir = '../../content/';

    // Construct the full path to the image file
    $filePath = $uploadDir . $currentImage;

    // Check if the image file exists before attempting to delete
    if (file_exists($filePath)) {
        // Delete the image file
        unlink($filePath);
    }

    // Call the deleteAcara method
    $acaraData = $acaraController->deleteAcara($id_acara);

    if ($acaraData) {
        header("location:Acara");
    } else {
        echo "Gagal Menghapus Data";
    }
}
?>

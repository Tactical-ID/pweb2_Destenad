<?php
include_once '../../database.php';
include_once '../../controllers/MahasiswaController.php';

$database = new database();
$db =  $database->getKoneksi();

//if (isset($_POST['submit'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];

    $mahasiswaController=new MahasiswaController($db);
    $result=$mahasiswaController->createMahasiswa($nim, $nama, $alamat);

    if($result){
        header("location:mahasiswa");
    }else{
        header("location:tambahMahasiswa");
    }
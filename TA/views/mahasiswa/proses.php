<?php
include '../classes/database.php';
$db = new Database  ();
$aksi = $_GET['aksi'];
if ($aksi   == "tambah") {
    $db ->tambah_mhs($_POST['nim'],$_POST['nama'],$_POST['alamat']);
    header("location:tampil_mhs.php?status=tambah");

} elseif ($aksi == "update") {
    $db->update($_POST['id'],$_POST['nim'],$_POST['nama'],$_POST['alamat']);
    header("location:tampil_mhs.php?status=update");
    
} elseif ($aksi == "hapus") {
    $db->hapus($_GET['id']);
    header("location:tampil_mhs.php?status=hapus");
}
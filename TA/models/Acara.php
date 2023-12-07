<?php

class Acara{
    private $koneksi;

    public function __construct($db){
        $this->koneksi = $db;
    }
    //menampilkan data acara
    public function tampilAcara(){
        $query="SELECT * FROM acara";
        $result=mysqli_query($this->koneksi,$query);
        return $result;
    }
    //menambah acara
    public function createAcara($nama_acara,$lokasi,$tanggal_mulai,$waktu_mulai,$waktu_selesai,$keterangan,$gambar){
    $query = "INSERT INTO acara(nama_acara,lokasi,tanggal_mulai,waktu_mulai,waktu_selesai,keterangan,gambar)
    VALUES ('$nama_acara','$lokasi','$tanggal_mulai','$waktu_mulai','$waktu_selesai','$keterangan','$gambar')";
    $result = mysqli_query($this->koneksi,$query);
    if ($result) {
        return true;
    }else{
        return false;
    }
    }
    //get Acara By ID
    public function getAcaraById($id_acara)
    {
        $query = "SELECT * FROM acara WHERE id_acara='$id_acara'";
        $result = mysqli_query($this->koneksi, $query);
        return $result;
    }    
    //update acara
    public function updateAcara($id_acara, $nama_acara, $lokasi, $tanggal_mulai, $waktu_mulai, $waktu_selesai, $keterangan, $gambar)
    {
        $query = "UPDATE acara SET nama_acara='$nama_acara', lokasi='$lokasi', tanggal_mulai='$tanggal_mulai', waktu_mulai='$waktu_mulai',
        waktu_selesai='$waktu_selesai', keterangan='$keterangan', gambar='$gambar' WHERE id_acara=$id_acara";
    
        $result = mysqli_query($this->koneksi, $query);
    
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    

    public function deleteAcara($id_acara)
{
    $query = "DELETE FROM acara WHERE id_acara='$id_acara'";
    $result = mysqli_query($this->koneksi, $query);
    if ($result) {
        return true;
    } else {
        return false;
    }
}

function getAcaraImage($id_acara) {
    // Ensure proper escaping to prevent SQL injection
    $id_acara = mysqli_real_escape_string($this->koneksi, $id_acara);

    // Query the database to get the image filename
    $query = mysqli_query($this->koneksi, "SELECT gambar FROM acara WHERE id_acara = $id_acara");

    if ($row = mysqli_fetch_assoc($query)) {
        return $row['gambar'];
    } else {
        // Return a default value or handle the case where no image is found
        return "default_image.jpg";
    }
}
}
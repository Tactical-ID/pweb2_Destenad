<?php

class Mahasiswa{
    private $koneksi;

    public function __construct($db)
    {
        $this->koneksi = $db;
    }
    //menampilkan data mahasiswa
    public function getAllMahasiswa()
    {
        $query="SELECT * FROM mahasiswa";
        $result=mysqli_query($this->koneksi,$query);
        return $result;
    }
    public function createMahasiswa($nim, $nama, $alamat)
    {
        $query = "INSERT INTO mahasiswa (nim, nama, alamat)
                  VALUES ('$nim', '$nama', '$alamat')";
        $result = mysqli_query($this->koneksi, $query);
    
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    
    public function getMahasiswaByNim($nim)
    {
        $query = "SELECT * FROM mahasiswa where nim=$nim";
        $result = mysqli_query($this->koneksi, $query);
        return mysqli_fetch_assoc($result);
    }
    public function updateMahasiswa($nim, $nama, $alamat)
    {
        $query = "UPDATE mahasiswa SET nama='$nama', alamat='$alamat' WHERE nim = $nim";
    
        $result = mysqli_query($this->koneksi, $query);
    
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteMahasiswa($nim)
    {
        $query = "DELETE FROM mahasiswa WHERE nim = $nim";
        $result = mysqli_query($this->koneksi, $query);
        if ($result) {
            return true;
            } else {
                return false;
                }
    }
}    
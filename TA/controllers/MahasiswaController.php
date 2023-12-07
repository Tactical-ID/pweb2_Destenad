<?php

include_once '../../models/Mahasiswa.php';

class MahasiswaController{
    private $model;

    public function __construct($db)
    {
        $this->model = new Mahasiswa($db);
    }
    // Menampilkan data mahasiswa
    public function getAllMahasiswa(){
        return $this->model->getAllMahasiswa(); 
    }
    public function createMahasiswa($nim, $nama, $alamat)
    {
        return $this->model->createMahasiswa($nim, $nama, $alamat);
    }
    public function getMahasiswaByNim($nim)
    {
        return $this->model->getMahasiswaByNim($nim);
    }
    public function updateMahasiswa($nim, $nama, $alamat)
    {
        return $this->model->updateMahasiswa($nim, $nama, $alamat);
    }
    public function deleteMahasiswa($nim)
    {
        return $this->model->deleteMahasiswa($nim);
    }


}
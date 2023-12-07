<?php

include_once "../../models/Acara.php";

class AcaraController{
    private $model;

    public function __construct($db)
    {
        $this->model = new Acara($db);
    }
    // Menampilkan data acara
    public function tampilAcara(){

    return $this->model->tampilAcara(); 
    }
    public function createAcara($nama_acara,$lokasi,$tanggal_mulai,$waktu_mulai,$waktu_selesai,$keterangan,$gambar){
        return $this->model->createAcara($nama_acara,$lokasi,$tanggal_mulai,$waktu_mulai,$waktu_selesai,$keterangan,$gambar);
    }
    public function getAcaraById($id_acara){
        return $this->model->getAcaraById($id_acara);
    }
    public function updateAcara($id_acara,$nama_acara,$lokasi,$tanggal_mulai,$waktu_mulai,$waktu_selesai,$keterangan,$gambar){
        return $this->model->updateAcara($id_acara,$nama_acara,$lokasi,$tanggal_mulai,$waktu_mulai,$waktu_selesai,$keterangan,$gambar);
    }
    public function deleteAcara($id_acara){
        return $this->model->deleteAcara($id_acara);
    }
    public function getAcaraImage($id_acara){

    return $this->model->getAcaraImage($id_acara);
    }
}
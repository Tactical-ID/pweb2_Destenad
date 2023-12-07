<?php 

class database {
    var $host = "localhost"; // localhost or your host name
    var $user = "root"; // username of the database
    var $pass = ""; // password for the user
    var $db = "ta"; // name of the database
    var $koneksi;

    function getKoneksi() 
    {
        $this->koneksi = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        if (!$this->koneksi){
            die("Tidak dapat terhubung ke Database: ".mysqli_connect_error());
        }
        return $this->koneksi;
    }
}
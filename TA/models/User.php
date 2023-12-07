<?php

class user{
    private $koneksi;

    public function __construct($db){
        $this->koneksi = $db;
    }

    function login($username, $password) {
        $username = mysqli_real_escape_string($this->koneksi, $username);
        $password = mysqli_real_escape_string($this->koneksi, $password);

        $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $result = mysqli_query($this->koneksi, $query);

        if ($row = mysqli_fetch_assoc($result)) {
            // Check if the user has role equal to 1
            if ($row['role'] == 1) {
                // User has role 1, login successful
                return true;
            } else {
                // User does not have role 1, login unsuccessful
                return false;
            }
        } else {
            // No matching user found, login unsuccessful
            return false;
        }
    }
    function getNim($username) {
        $username = mysqli_real_escape_string($this->koneksi, $username);
    
        $query = "SELECT nim FROM user WHERE username='$username'";
        $result = mysqli_query($this->koneksi, $query);
    
        if ($row = mysqli_fetch_assoc($result)) {
            return $row['nim'];
        } else {
            // Return a default value or handle the case where no nim is found
            return "N/A";
        }
    }
    function getUserDetails($nim)
    {
        $nim = mysqli_real_escape_string($this->koneksi, $nim);

        $query = "SELECT * FROM user WHERE nim='$nim'";
        $result = mysqli_query($this->koneksi, $query);

        return mysqli_fetch_assoc($result);
    }

    function getMahasiswaDetails($nim)
    {
        $nim = mysqli_real_escape_string($this->koneksi, $nim);

        $query = "SELECT * FROM mahasiswa WHERE nim='$nim'";
        $result = mysqli_query($this->koneksi, $query);

        return mysqli_fetch_assoc($result);
    }

    function updateMahasiswaDetails($nim, $newDetails)
    {
        $nim = mysqli_real_escape_string($this->koneksi, $nim);

        $nama = mysqli_real_escape_string($this->koneksi, $newDetails['nama']);
        $alamat = mysqli_real_escape_string($this->koneksi, $newDetails['alamat']);
        // Add other mahasiswa fields as needed

        // Check if the 'profile_picture' key exists in $newDetails
        if (isset($newDetails['profile_picture'])) {
            $profilePicture = mysqli_real_escape_string($this->koneksi, $newDetails['profile_picture']);
            mysqli_query($this->koneksi, "UPDATE mahasiswa SET nama='$nama', alamat='$alamat', profile_picture='$profilePicture' WHERE nim='$nim'");
        } else {
            mysqli_query($this->koneksi, "UPDATE mahasiswa SET nama='$nama', alamat='$alamat' WHERE nim='$nim'");
        }
    }
    function get_profile_picture_url($nim)
    {
        $nim = mysqli_real_escape_string($this->koneksi, $nim);

        $query = "SELECT profile_picture FROM mahasiswa WHERE nim='$nim'";
        $result = mysqli_query($this->koneksi, $query);

        if ($row = mysqli_fetch_assoc($result)) {
            // Assuming $profilePicturesDirectory is the directory where pictures are stored
            $profilePicturesDirectory = "../../uploads/";
            return $profilePicturesDirectory . $row['profile_picture'];
        } else {
            // Return a default value or handle the case where no profile picture is found
            return "default_profile_picture.png";
        }
    }

}
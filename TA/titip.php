<?php
public function __construct()
    {
        $this->koneksi = new mysqli($this->host, $this->user, $this->pass, $this->db);

        // Check connection
        if ($this->koneksi->connect_error) {
            die("Connection failed: " . $this->koneksi->connect_error);
        }
    }

    function tampil_acara()
    {
        return $query=mysqli_query($this->koneksi,"SELECT * FROM acara");
        while($row=mysqli_fetch_array($data)){
            $hasil[]= $d;
        }
        return $hasil;
    }

    function tambah_acara($nama_acara,$lokasi,$tanggal_mulai,$waktu_mulai,$waktu_selesai,$keterangan,$gambar)
    {
      mysqli_query($this->koneksi,"INSERT INTO acara(nama_acara,lokasi,tanggal_mulai,waktu_mulai,waktu_selesai,keterangan,gambar) VALUES ('$nama_acara','$lokasi','$tanggal_mulai','$waktu_mulai','$waktu_selesai','$keterangan','$gambar')");
    }
    
    function edit_acara($id_acara, $nama_acara, $lokasi, $tanggal_mulai, $waktu_mulai , $waktu_selesai, $keterangan, $gambar)
    {
    mysqli_query($this->koneksi, "UPDATE acara SET nama_acara='$nama_acara', lokasi='$lokasi', tanggal_mulai='$tanggal_mulai', waktu_mulai='$waktu_mulai', waktu_selesai='$waktu_selesai', keterangan='$keterangan', gambar='$gambar' WHERE id_acara='$id_acara'");
    }

    function update_acara($id_acara)
    {
        return $query=mysqli_query($this->koneksi,"SELECT * FROM acara WHERE id_acara=$id_acara");
        while ($row=mysql_fetch_array($data)){
            $hasil[]= $d;
        }
        return $hasil;
    }

    function hapus_acara($id_acara) {
        // Ensure proper escaping to prevent SQL injection
        $id_acara = mysqli_real_escape_string($this->koneksi, $id_acara);
    
        $stmt = $this->koneksi->prepare("DELETE FROM acara WHERE id_acara = ?");
        $stmt->bind_param("s", $id_acara);
    
        // Execute the prepared statement
        if ($stmt->execute()) {
            $stmt->close();
            return true; // Deletion successful
        } else {
            // Handle the error if deletion fails
            return false;
        }
    }
    function get_acara_image($id_acara) {
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

    // Check if the user is logged in
    if (isset($_SESSION['nim'])) {
        $nim = $_SESSION['nim'];
    
        // Assuming you have a method like get_profile_picture_url in your database class
        $profilePicture = $db->get_profile_picture_url($nim);
    
        // Display the user info with profile picture
        echo '<li class="nav-item dropdown">';
        echo '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #ffffff; background-color: #FCA120;">';
        echo '<img src="' . $profilePicture . '" alt="Profile Picture" style="width: 30px; height: 30px; border-radius: 50%;">';
        echo " Welcome, $nim!";
        echo '</a>';
        echo '<div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #FCA120;">';
        echo '<a class="dropdown-item" href="setting.php" style="color: #ffffff;">Settings</a>';
        echo '<a class="dropdown-item" href="logout.php" style="color: #ffffff;">Logout</a>';
        echo '</div>';
        echo '</li>';
    } else {
        // Display login link if the user is not logged in
        echo '<li class="nav-item">';
        echo '<a class="nav-link" href="login.php">LOGIN</a>';
        echo '</li>';
    }


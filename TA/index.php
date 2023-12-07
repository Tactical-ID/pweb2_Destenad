<?php
include "database.php"; // Assuming your Database class is in the parent directory of tampil_acara.php
include "header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Acara</title>
</head>
<style>
    h2 {
        color: black;
        text-align: center;
        margin-top: 15px;
        margin-bottom: 30px;
    }

    .sidebar {
        width: 300px;
        background-color: #333;
        padding: 20px;
        margin-left: 10px;
    }

    .sidebar p {
        color: #ffcc00;
        margin-bottom: 10px;
        font-size: 16px; /* Adjust the font size as needed */
    }

    .sidebar a {
        color: #fff;
        text-decoration: none;
    }

    .sidebar a:hover {
        color: #ffcc00;
    }
</style>
<!---
<div class="sidebar">
    <p>MENU</p>
    <p>SAMBUTAN KEPALA DEPARTEMEN</p>
    <p>SISTEM INFORMASI</p>
    <p>SEJARAH</p>
    <p>DEPARTEMEN DALAM ANGKA</p>
    <p>VISI DAN MISI</p>
    <p>SERTIFIKAT DAN AKREDITASI</p>
    <p>PENGHARGAAN</p>
    <p>ACARA</p>
</div>

<body>

<h2>Daftar Acara</h2>

<div class="container">
    <div class="row">
    
foreach ($db->tampil_acara() as $row) {
    $keteranganLimited = substr($row['keterangan'], 0, 255); // Limit the keterangan to 255 characters

    echo "<div class='mt-4 col-md-4'>
        <div class='card'>
            <img class='card-img-top' src='content/{$row['gambar']}' alt='Card image cap' width='175px' height='175px'>
            <div class='card-body text-center d-flex flex-column'>
                <h5 class='card-title mb-auto'>{$row['nama_acara']}</h5>
                <p class='card-text'>{$keteranganLimited}</p>
                <p class='card-text'><strong>Hari/Tanggal:</strong> " . date('l, d-m-Y', strtotime($row['tanggal_mulai'])) . "</p>
                <p class='card-text'><strong>Waktu:</strong> " . date('H:i', strtotime($row['waktu_mulai'])) . " WIB - " . date('H:i', strtotime($row['waktu_selesai'])) . " WIB</p>
                <td>
                    <a class='btn btn-warning' href='lengkap.php?id={$row['id_acara']}'>Selengkapnya</a>
                </td>
            </div>
        </div>
    </div>";
}


    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
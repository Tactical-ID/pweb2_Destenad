<?php
require_once "../../database.php";
include "../../header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Form</title>
</head>
<style>
     #image-preview {
            max-width: 500px;
            max-height: 500px;
            margin-top: 5px;
            display: none;
        }
        </style>
<body>
<h2 style="margin-top: 15px; margin-bottom: 30px;">Tambah Acara</h2>
<form method="POST" action="proses_tambahAcara" autocomplete="off" enctype="multipart/form-data">
<div class= "px-5" style="display: flex;">
        <div style="flex: 1;">
    <table>
        <tr>
            <td><label for="nama_acara">Nama Acara:</label></td>
            <td><input type="text" id="nama_acara" name="nama_acara" required></td>
        </tr>
        <tr>
            <td><label for="lokasi">Lokasi:</label></td>
            <td><input type="text" id="lokasi" name="lokasi" required></td>
        </tr>
        <tr>
            <td><label for="tanggal_mulai">Tanggal:</label></td>
            <td><input type="date" id="tanggal_mulai" name="tanggal_mulai" required></td>
        </tr>
        <tr>
            <td><label for="waktu_mulai">Waktu Mulai:</label></td>
            <td><input type="time" id="waktu_mulai" name="waktu_mulai" required></td>
        </tr>
        <tr>
            <td><label for="waktu_selesai">Waktu Selesai:</label></td>
            <td><input type="time" id="waktu_selesai" name="waktu_selesai" required></td>
        </tr>
        <tr>
            <td><label for="keterangan">Keterangan:</label></td>
            <td><textarea name="keterangan" id="keterangan" required></textarea></td>
        </tr>
        <tr>
            <td><label for="gambar">Gambar:</label></td>
            <td><input type="file" id="gambar" name="gambar" accept=".jpg, .jpeg, .png" onchange="previewImage(this)" required></td>
        </tr>
    </table>
    <button class="btn btn-success" type="submit" value="Simpan">Submit</button>
    <a class= "btn btn-primary mb-3 mt-3" href="Acara">Kembali</a>
</div>
<div style="flex: 1; padding-left: 20px;">
    <img id="image-preview" src="#" alt="Preview Image" style="display: none;">
    
</form>

<script>
    function previewImage(input) {
        var preview = document.getElementById('image-preview');
        var file = input.files[0];
        var reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        };

        reader.readAsDataURL(file);
    }
</script>

</body>
</html>

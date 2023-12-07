<?php
include_once "../../database.php"; // Assuming your Database class is in the parent directory of tampil_acara.php
include_once "../../controllers/AcaraController.php";
require_once "../../header.php";

$database = new Database();
$db = $database -> getKoneksi();

$acaraController = new AcaraController($db);
$acara = $acaraController -> tampilAcara();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Acara</title>
</head>
<body>
<a class="btn btn-primary mb-3 mt-3" href="tambahAcara">Tambah Acara</a>

<h2>Daftar Acara</h2>

<div class="container">
    <div class="row">
        <?php
        foreach ($acara as $row) {
            $keteranganLimited = substr($row['keterangan'], 0, 255); // Limit the keterangan to 255 characters
            echo "<div class='mt-4 col-md-4'>
        <div class='card'>
        <img class='card-img-top' src='/TA/content/{$row['gambar']}' alt='Card image cap' width='200px' height='200px'>
            <div class='card-body text-center d-flex flex-column'>
                <h5 class='card-title mb-auto'>{$row['nama_acara']}</h5>
                <p class='card-text'>{$keteranganLimited}</p>
                <p class='card-text'><strong>Hari/Tanggal:</strong> " . date('l, d-m-Y', strtotime($row['tanggal_mulai'])) . "</p>
                <p class='card-text'><strong>Waktu:</strong> " . date('H:i', strtotime($row['waktu_mulai'])) . " WIB - " . date('H:i', strtotime($row['waktu_selesai'])) . " WIB</p>
                <td>
                <div>
                <a class='btn btn-warning' href='editAcara?id={$row['id_acara']}'>Edit</a> 
                <a class='btn btn-danger' href='hapusAcara?id={$row['id_acara']}' onclick='return confirmDelete();'>Hapus</a>
                </div>            
                </td>
            </div>
        </div>
    </div>";
        }
        ?>
    </div>
</div>
<script>
    function confirmDelete() {
        return confirm("Apakah Anda yakin ingin menghapus Acara ini?");
    }

</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>

<?php
include_once '../../database.php';
include_once '../../controllers/MahasiswaController.php';
require_once '../../header.php';

$database = new database();
$db = $database->getKoneksi();

if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];

    $mahasiswaController = new MahasiswaController($db);
    $mahasiswaData = $mahasiswaController->getMahasiswaByNim($nim);

    if ($mahasiswaData) {
        if (isset($_POST['submit'])) {
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];

            $result = $mahasiswaController->updateMahasiswa($nim, $nama, $alamat);

            if ($result) {
                header("Location: mahasiswa");
            } else {
                header("Location: editMahasiswa");
            }
        }
    } else {
        echo "Mahasiswa Tidak Di Temukan";
    }
}
?>

<div class="container mt-4">
    <h3>Edit Data Mahasiswa</h3>
    <?php if ($mahasiswaData) : ?>
        <form action="" method="post">
            <div class="form-group row">
                <label for="nim" class="col-sm-2 col-form-label">NIM:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $mahasiswaData['nim']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $mahasiswaData['nama']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $mahasiswaData['alamat']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                    <a href="index.php" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </form>
    <?php endif; ?>
</div>

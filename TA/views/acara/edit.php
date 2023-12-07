<?php
include_once "../../database.php";
include_once "../../controllers/AcaraController.php";
require_once "../../header.php";

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

$database = new database();
$db = $database->getKoneksi();

if (isset($_GET['id'])) {
    $id_acara = $_GET['id'];

    $acaraController = new AcaraController($db);
    $acaraData = $acaraController->getAcaraById($id_acara);

    if ($acaraData) {
        if (isset($_POST['submit'])) {
            $nama_acara = $_POST['nama_acara'];
            $lokasi = $_POST['lokasi'];
            $tanggal_mulai = $_POST['tanggal_mulai'];
            $waktu_mulai = $_POST['waktu_mulai'];
            $waktu_selesai = $_POST['waktu_selesai'];
            $keterangan = $_POST['keterangan'];

            // Check if a new file is uploaded
            if ($_FILES['gambar']['error'] == UPLOAD_ERR_OK) {
                // Define the directory where the uploaded files will be stored
                $uploadDir = '../../content/';

                // Get the name of the existing image
                $oldImageName = $_POST['gambar_lama'];

                // Construct the full path to the existing image
                $oldImagePath = $uploadDir . $oldImageName;

                // Delete the old image
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }

                // Generate a unique name for the new uploaded file to prevent overwriting
                $gambarName = uniqid('gambar_') . '_' . $_FILES['gambar']['name'];

                // Construct the full path to the new uploaded file
                $uploadPath = $uploadDir . $gambarName;

                // Move the new uploaded file to the specified directory
                move_uploaded_file($_FILES['gambar']['tmp_name'], $uploadPath);
            } else {
                // No new file uploaded, use the existing image name
                $gambarName = $_POST['gambar_lama'];
            }

            $result = $acaraController->updateAcara($id_acara, $nama_acara, $lokasi, $tanggal_mulai, $waktu_mulai, $waktu_selesai, $keterangan, $gambarName);

            if ($result) {
                header("Location:Acara");
                exit; // Stop script execution
            } else {
                header("Location:editAcara?error=update_failed");
                exit; // Stop script execution
            }
        }
    } else {
        echo "Acara Tidak Di Temukan";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add your head content here -->
</head>
<body>

<h2 style="margin-top: 15px; margin-bottom: 30px;">Edit Acara</h2>

<form method="post" action="" enctype="multipart/form-data">
    <?php foreach ($acaraData as $d): ?>
        <div class="px-5" style="display: flex;">
            <div style="flex: 1;">
                <table>
                    <tr>
                        <td><input type="hidden" name="id_acara" value="<?php echo $d['id_acara']; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="nama_acara">Nama Acara:</label></td>
                        <td><input type="text" name="nama_acara" value="<?php echo $d['nama_acara']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="lokasi">Lokasi:</label></td>
                        <td><input type="text" name="lokasi" value="<?php echo $d['lokasi']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="tanggal_mulai">Tanggal Mulai:</label></td>
                        <td><input type="date" name="tanggal_mulai" value="<?php echo $d['tanggal_mulai']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="waktu_mulai">Waktu Mulai:</label></td>
                        <td><input type="time" name="waktu_mulai" value="<?php echo $d['waktu_mulai']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="waktu_selesai">Waktu Selesai:</label></td>
                        <td><input type="time" name="waktu_selesai" value="<?php echo $d['waktu_selesai']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="keterangan">Keterangan:</label></td>
                        <td><textarea name="keterangan" required><?php echo $d['keterangan']; ?></textarea></td>
                    </tr>
                    <tr>
                        <td><label for="gambar">Upload Gambar Baru (Optional):</label></td>
                        <td><input type="file" name="gambar" onchange="previewImage(this)"></td>
                    </tr>
                    <tr>
                        <td><input type="hidden" name="gambar_lama" value="<?php echo $d['gambar']; ?>"></td>
                    </tr>
                </table>
                <button class="btn btn-success" type="submit" name="submit">Simpan</button>
                <a class="btn btn-primary mb-3 mt-3" href="Acara">Kembali</a>
            </div>
            <div style="flex: 1; padding-left: 20px;">
            <?php if (!empty($d['gambar'])): ?>
    <img id="image-preview" src="/TA/content/<?php echo $d['gambar']; ?>" alt="Current Image" style="max-width: 500px; max-height: 500px;">
<?php else: ?>
    <p>No image available</p>
<?php endif; ?>

            </div>
        </div>
    <?php endforeach; ?>
</form>

<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this event?");
    }

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

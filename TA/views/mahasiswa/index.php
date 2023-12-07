<?php
include_once '../../database.php';
include_once '../../controllers/MahasiswaController.php';
require_once '../../header.php';

//intansiasi class database
$database=new database;
$db=$database->getKoneksi();

$mahasiswaController = new MahasiswaController($db);
$mahasiswa = $mahasiswaController->getAllMahasiswa();
?>

<div class="px-5">
    <h3> Data Mahasiswa </h3>
    <a class="btn btn-primary mb-3 mt-3" href="tambahMahasiswa">Tambah Mahasiswa</a>
    
    <table class="table">
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <?php
        $no = 1;
        foreach ($mahasiswa as $x) {
            echo "<tr>";
            echo "<td>$no</td>";
            echo "<td>$x[nim]</td>";
            echo "<td>$x[nama]</td>";
            echo "<td>$x[alamat]</td>";
            echo "<td>
                      <a class='btn btn-warning' href='editMahasiswa?nim=$x[nim]'>Edit</a> | 
                      <a class='btn btn-danger' href='hapusMahasiswa?nim=$x[nim]' onclick='return confirmDelete();'>Hapus</a>
                  </td>";
            echo "</tr>";
            $no++;
        }
        ?>
    </table>
</div>
</div>

<script>
    function confirmDelete() {
        return confirm("Apakah Anda yakin ingin menghapus mahasiswa ini?");
    }

</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
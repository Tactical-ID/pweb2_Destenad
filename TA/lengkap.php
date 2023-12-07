<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include "app/class/database.php";
    include "header.php";
    $db = new Database();
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creative Design Class</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #cfd8dc;
            color: black;
            font-family: Gotham;
            padding: 15px;
            text-align: center;
            display: flex;
            align-items: center;
        }

        .back-button {
            margin-right: auto;
        }

        .main {
            display: flex;
            justify-content: space-around;
            padding: 20px;
        }

        .content {
            border: 1px solid #000;
            padding: 20px;
            width: 45%;
        }

        .sidebar {
            width: 30%;
        }

        .footer {
            background-color: #cfd8dc;
            color: #fff;
            padding: 15px;
            text-align: center;
        }
    </style>
</head>
<body>
<?php
foreach ($db->update_acara($_GET['id']) as $d) {
    ?>
<div class="header">
    <a href="index.php" style="margin-right: 10px; display: inline-block; background-color: #333; padding: 5px; border-radius: 5px;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi bi-arrow-bar-left" viewBox="0 0 16 16" style="margin-bottom: 2px;">
            <path fill-rule="evenodd" d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5M10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5"/>
        </svg>
    </a>
    <div style="flex-grow: 1;">
        <?php echo "<h1 style='margin: 0;'>{$d['nama_acara']}</h1>" ?>
    </div>
</div>



    </div>
    <div class="main">
        <div class="content">
            <?php
            echo "
            <h2>Detail Acara</h2>
            <p>Hari/Tanggal: " . date('l, d-m-Y', strtotime($d['tanggal_mulai'])) . "</p>
            <p>Waktu: " . date('H:i', strtotime($d['waktu_mulai'])) . " WIB - " . date('H:i', strtotime($d['waktu_selesai'])) . " WIB</p>
            <p>Lokasi: {$d['lokasi']}</p>
            <p>Keterangan: {$d['keterangan']}</p>";
            ?>
        </div>
        <div class="sidebar">
            <?php if (!empty($d['gambar'])): ?>
                <img src="content/<?php echo $d['gambar']; ?>" alt="Current Image" style="max-width: 500px; max-height: 500px;">
            <?php else: ?>
                <p>No image available</p>
            <?php endif; ?>
        </div>
    </div>
    <div class="footer">
        <p>&copy; 2023 Creative Design Class</p>
    </div>
</body>
</html>
<?php
}
?>

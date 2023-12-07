<?php
// Include your database class
require_once '../class/database.php';
include 'header.php';
// Create an instance of the database class
$database = new Database();

// Check if the user is logged in
if (!isset($_SESSION['nim'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: ../../login.php");
    exit();
}

// Get the nim from the session
$nim = $_SESSION['nim'];

// Fetch user details from the 'user' table
$userDetails = $database->getUserDetails($nim);

// Fetch mahasiswa details from the 'mahasiswa' table
$mahasiswaDetails = $database->getMahasiswaDetails($nim);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the submitted mahasiswa details
    $newMahasiswaDetails = [
        'nama' => $_POST['nama'],
        'alamat' => $_POST['alamat'],
        // Add other mahasiswa fields as needed
    ];

// Handle profile picture upload
if ($_FILES['profile_picture']['error'] == 0) {
    $uploadDir = '../../uploads/'; // Specify the path to your upload directory
    $originalFileName = basename($_FILES['profile_picture']['name']);

    // Generate a unique identifier for the file name
    $uniqueFileName = 'img_' . uniqid() . $originalFileName;

    $uploadFile = $uploadDir . $uniqueFileName;

    // Move the uploaded file to the specified directory
    if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $uploadFile)) {
        // Check if the user already has a profile picture
        if (!empty($mahasiswaDetails['profile_picture'])) {
            // Delete the existing profile picture file
            unlink($uploadDir . $mahasiswaDetails['profile_picture']);
        }

        // Update the profile picture in the user details
        $newMahasiswaDetails['profile_picture'] = $uniqueFileName;
    } else {
        echo "Failed to upload profile picture.";
    }
}

    // Update mahasiswa details in the 'mahasiswa' table
    $database->updateMahasiswaDetails($nim, $newMahasiswaDetails);

    // Redirect to a profile page or any other page as needed
    header("Location: tampil_acara.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        h1 {
            color: black;
            text-align: center;
        }

        .form-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .form-container form {
            flex: 1;
            margin-right: 20px;
        }

        .form-container img {
            max-width: 300px;
            max-height: 300px;
            border-radius: 50%;
        }

        .form-container table {
            width: 100%;
        }

        .form-container table td {
            padding: 5px;
        }

        .form-container textarea {
            width: 100%;
            resize: vertical;
        }

        .btn-success {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 7px 12px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<h1>Edit User</h1>

<div class="container">
    <div class="form-container">
        <form method="post" action="" autocomplete="off" enctype="multipart/form-data">
            <table>
                <tr>
                    <td><label for="username">Username:</label></td>
                    <td><input type="text" id="username" name="username" value="<?php echo $userDetails['username']; ?>" disabled></td>
                </tr>
                <tr>
                    <td><label for="nim">NIM:</label></td>
                    <td><input type="text" id="nim" name="nim" value="<?php echo $mahasiswaDetails['nim']; ?>" disabled></td>
                </tr>
                <tr>
                    <td><label for="nama">Nama:</label></td>
                    <td><input type="text" id="nama" name="nama" value="<?php echo $mahasiswaDetails['nama']; ?>"></td>
                </tr>
                <tr>
                    <td><label for="alamat">Alamat:</label></td>
                    <td><input type="text" id="alamat" name="alamat" value="<?php echo $mahasiswaDetails['alamat']; ?>"></td>
                </tr>
                <!-- Add other mahasiswa fields as needed -->
                <tr>
                    <td><label for="profile_picture">Profile Picture:</label></td>
                    <td><input type="file" id="profile_picture" name="profile_picture" onchange="previewProfilePicture(this)"></td>
                </tr>
            </table>
            <button class="btn btn-success mb-3 mt-3" type="submit" value="Simpan">Simpan</button>
            <a class="btn btn-primary mb-3 mt-3" href="tampil_acara.php">Kembali</a>
        </form>

        <div>
            <?php if (!empty($mahasiswaDetails['profile_picture'])): ?>
                <img id="profile-preview" src="../../uploads/<?php echo $mahasiswaDetails['profile_picture']; ?>" alt="Profile Preview">
            <?php else: ?>
                <p>No profile picture available</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
    function previewProfilePicture(input) {
        const preview = document.getElementById('profile-preview');
        const file = input.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
            };

            reader.readAsDataURL(file);
        } else {
            // If no file is selected, show the default preview image
            preview.src = 'default_preview_image.jpg';
        }
    }
</script>

</body>
</html>
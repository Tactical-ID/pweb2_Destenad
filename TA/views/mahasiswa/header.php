<?php
// Start the session
session_start();
// Include the database class
require_once '../../database.php';
require_once '../../controlleres/UserController.php';
// Create an instance of the database class
$database = new database();
$db = $database->getKoneksi();

$userController = new UserController($db);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>PNC Navbar</title>
    <style>
        .navbar {
            background-color: #FCA120;
            color: #ffffff;
            font-size: 14px;
        }

        .navbar-nav li a {
            color: #ffffff;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar-nav li a:hover {
            background-color: #FF8C00;
            color: #000000;
        }

        .card {
            background-color: #FFFFFF;
            color: #000000;
            border: none;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            color: #000000;
        }

        .card-body p {
            font-size: 14px;
            line-height: 1.5;
        }

        .navbar-brand {
            display: inline-block;
            width: 175px;
            height: 50px;
            background: url('../../content/logo.png') no-repeat center center;
            background-size: cover;
        }
        h2 {
            color: black;
            text-align: center;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-md">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="px-3 collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="px-3 nav-item">
    <!--<a class="nav-link" href="#">Home</a>-->
    </li>
<li class="px-3 nav-item">
    <!--<a class="nav-link" href="#">Features</a>-->
</li>
<li class="px-3 nav-item">
    <!--<a class="nav-link" href="#">Pricing</a>-->
</li>
<li class="px-3 nav-item">
    <!--<a class="nav-link" href="">Disabled</a>-->
</li>

            </ul>
            <ul class="navbar-nav ml-auto">
            <?php
// Check if the user is logged in
if (isset($_SESSION['nim'])) {
    $nim = $_SESSION['nim'];

    // Assuming you have a method like get_profile_picture_url in your database class
    $profilePicture = $db->getprofilepictureurl($nim);

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
    echo '<a class="nav-link" href="../../login.php">Login</a>';
    echo '</li>';
}
?>

            </ul>
        </div>
    </nav>

</body>

</html>

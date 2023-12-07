<?php
// Start the session
session_start();

// Include your database class
require_once '../../database.php';
require_once '../../controllers/UserController.php'; // Fixed syntax error

// Create an instance of the database class
$database = new Database();
$db = $database->getKoneksi();

// Create an instance of the UserController class
$userController = new UserController($db);

// Initialize variables for displaying error message, user name, and nim
$error = '';
$userName = '';
$nim = ''; // Add this line

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the submitted username and password
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Call the login function from UserController
    if ($userController->login($username, $password)) {
        // Fetch nim from the 'mahasiswa' table for the logged-in user
        $nim = $userController->getNim($username);

        // Store nim in session for later use if needed
        $_SESSION['nim'] = $nim;

        // Redirect to a dashboard or home page if needed
        header("Location: Acara");
        exit();
    } else {
        // Login unsuccessful, set an error message
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            background-image: url("https://images.unsplash.com/photo-1537975519902-c63679d949d7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by0xMDd8fHVtZW50Zy02N2Q2ZGM4NmQ5&auto=format&fit=crop&w=600&q=60");
            background-size: cover;
            background-position: center;
        }

        .login-form {
            width: 300px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        .login-form img {
            display: block;
            margin: 0 auto;
        }

        .login-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
        }

        .login-form button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .kembali-button {
            width: 100%;
            padding: 10px;
            text-align: center;
            background-color: red;
            color: #fff;
            border: none;
            cursor: pointer;
            text-decoration: none; /* Remove underlines from the anchor tag */
            display: inline-block; /* Ensure it behaves like a block element */
            margin-top: 10px; /* Add some margin for separation */
            border-radius: 5px; /* Optional: Add rounded corners */
        }

    </style>
</head>

<body>
    <?php
    // Include your PHP code
    require_once 'proses_login.php';
    ?>
    <div class="login-form">
        <img src="content/logo2.png" style="width: 100px; height: auto;">
        <h2>Login</h2>
        <!-- Display error message using PHP if it's set -->
        <?php if (!empty($error)): ?>
            <div style="color: red; text-align: center;"><?php echo $error; ?></div>
        <?php endif; ?>
        <form action="" method="post">
            <!-- empty action means the form will be submitted to the same page -->
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Username" required><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Password" required><br>
            <button type="submit">Login</button>
        </form>

        <a href="index.php" class="kembali-button">Kembali</a>
    </div>
</body>

</html>

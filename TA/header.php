<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>PNC Navbar</title>
    <style>
       .navbar {
    background-color: #FCA120; /* Orange color */
    color: #ffffff; /* White color for font */
    font-size: 14px;
}

.navbar-nav li a {
    color: #ffffff; /* White color */
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

.navbar-nav li a:hover {
    background-color: #FF8C00; /* Darker shade of orange for hover */
    color: #000000; /* Black color */
}


.card {
    background-color: #FFFFFF; /* White color */
    color: #000000; /* Black color */
    border: none;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
}

.card-title {
    color: #000000; /* Black color */
}

.card-body p {
    font-size: 14px;
    line-height: 1.5;
}
.navbar-brand {
    display: inline-block;
    width: 175px; /* Adjust the width as needed */
    height: 50px; /* Ad5just the height as needed */
    background: url('content/logo.png') no-repeat center center;
    background-size: cover;
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
    <a class="nav-link" href="home">Home</a>
</li>
<li class="px-3 nav-item">
    <a class="nav-link" href="Acara">Acara</a>
</li>
<li class="px-3 nav-item">
    <a class="nav-link" href="mahasiswa">Mahasiswa</a>
</li>
<li class="px-3 nav-item">
    <!--<a class="nav-link" href="">Disabled</a>-->
</li>

        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="px-3 nav-item">
            <a class="nav-link bold-link" href="login">LOGIN</a>
        </ul>
    </div>
</nav>
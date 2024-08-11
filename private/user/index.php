<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['role'] !== 'user') {
    header("Location: ../../index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h5>Ini adalah halaman user!</h5>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler d-md-none" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <a class="navbar-brand" href="#">Admin Dashboard</a>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"><i class="fas fa-code"></i> Source Code</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="e_book/index.php"><i class="fas fa-book"></i> E-Book</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="template/index.php"><i class="fas fa-images"></i> Template</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="video/index.php"><i class="fas fa-play-circle"></i> Video</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kategori/index.php"><i class="fas fa-list"></i> Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="message/index.php"><i class="fas fa-envelope-open"></i> Pesan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user/index.php"><i class="fas fa-users"></i> Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=""></a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
</body>
</html>
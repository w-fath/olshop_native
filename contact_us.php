<?php
// proses_contact_us.php
include('includes/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $wa = $_POST['wa'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "INSERT INTO messages (name, wa, email, message) VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $wa, $email, $message);

    if ($stmt->execute()) {
        $status = 'success';
    } else {
        $status = 'error';
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | TecnoCode</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="asset/css/index.css">
    <link rel="icon" href="asset/img/logo.jpeg">
</head>

<body>
    <!-- Navbar -->
    <div class="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <a class="navbar-brand" href="#"><i class="fas fa-laptop-code"></i> Tecno<span>Code</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownSourceCode" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Produk
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownSourceCode">
                            <a class="dropdown-item" href="#">Handphone Android</a>
                            <a class="dropdown-item" href="#">Laptop</a>
                            <a class="dropdown-item" href="#">Aksesoris</a>
                            <a class="dropdown-item" href="#">Semua Produk</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="promo.php">Promo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kalkulator.php">Kalkulator Kredit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact_us.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"></a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="private/index.php" style="color: #ffc400;"><b>Login</b></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- Header -->
    <header style="margin-top: 80px;">
    </header>

    <!-- Contact Form -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Contact Us</h5>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($status)) {
                            if ($status == 'success') {
                                echo '<div class="alert alert-success" role="alert">Message sent successfully!</div>';
                            } elseif ($status == 'error') {
                                echo '<div class="alert alert-danger" role="alert">Failed to send message. Please try again later.</div>';
                            }
                        }
                        ?>
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="wa">No WhatsApp</label>
                                <input type="number" class="form-control" id="wa" name="wa" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="asset/js/script.js"></script>
</body>

</html>
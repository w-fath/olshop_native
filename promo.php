<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promo | TecnoCode</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
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
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownProduk" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Produk
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownProduk">
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

    <!-- Content -->
    <div class="container mt-5">
        <div class="row">
            <?php
            include 'includes/koneksi.php';

            $sql = "SELECT * FROM promo";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row['id'];
                    $imageSrc = $row['image'];
                    $title = $row['title'];
                    $sumber_link = $row['sumber_link']
            ?>
                    <div class="col-lg-6 col-md-6 mb-6" style="margin-top: 40px;">
                        <div class="card">
                            <div class="card-img-container">
                                <a href="<?php echo htmlspecialchars($sumber_link); ?>" target="_blank">
                                    <img src="<?php echo $imageSrc; ?>" class="card-img-top" alt="<?php echo $title; ?>">
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a target="_blank" href="<?php echo htmlspecialchars($sumber_link); ?>" style="text-decoration: none;" class="card-title-link">
                                        <?php echo $title; ?>
                                    </a>
                                </h5>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<p>No promotions available</p>";
            }

            $conn->close();
            ?>
        </div>
    </div>
    <footer class="text-center py-3">
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="asset/js/script.js"></script>
</body>

</html>
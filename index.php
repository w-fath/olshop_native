<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kredit Elektro | TecnoCode</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="asset/css/index.css">
    <link rel="icon" href="asset/img/logo.jpeg">
    <style>
        header {
            background-size: cover;
            background-position: center;
            transition: background-image 1s ease-in-out;
            height: 250px;
            width: 100%;
            max-width: 83%;
            margin: 50px auto;
            border-radius: 10px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @media (max-width: 576px) {
            header {
                width: 150px;
                height: 100px;
                margin: 0 auto;
                border-radius: 0;
                margin-top: 40px;
            }
        }
    </style>
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
                        <a class="nav-link" href="#">Home</a>
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
    <br><br>
    <header id="header" class="col-lg-10 card"></header>

    <!-- Content -->
    <div class="container mt-5">
        <h4>Populer <i class="fab fa-free-code-camp"></i></h4>
        <div class="row">
            <?php
            include 'includes/koneksi.php';

            $sql = "SELECT * FROM source_code";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row['id'];
                    $imageSrc = $row['image'];
                    $title = $row['title'];
                    $language = $row['language'];
                    $status = $row['status'];
                    $statusIcon = $status == 'Locked' ? 'fas fa-lock' : 'fas fa-lock-open';
                    $download_link = $row['download_link']
            ?>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card">
                            <div class="card-img-container">
                                <a href="detail.php?id=<?php echo $id; ?>">
                                    <img src="<?php echo $imageSrc; ?>" class="card-img-top" alt="<?php echo $title; ?>">
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="detail.php?id=<?php echo $id; ?>" style="text-decoration: none;" class="card-title-link">
                                        <?php echo $title; ?>
                                    </a>
                                </h5>
                                <p class="card-text">Bahasa : <?php echo $language; ?></p>
                                <p class="card-text">Status : <?php echo $status; ?> <i class="<?php echo $statusIcon; ?>"></i></p>
                                <a href="<?php echo htmlspecialchars($download_link); ?>" class="btn btn-primary col-md-12">Download</a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<p>No data found</p>";
            }

            $conn->close();
            ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="asset/js/script.js"></script>
    <script>
        const images = [
            'asset/img/dashbord.png',
            'asset/img/logo.jpeg',
            'asset/img/ss.png'
        ];

        let currentImageIndex = 0;

        function changeBackgroundImage() {
            const header = document.getElementById('header');
            header.style.backgroundImage = `url(${images[currentImageIndex]})`;
            currentImageIndex = (currentImageIndex + 1) % images.length;
        }

        // Ganti gambar setiap 5 detik
        setInterval(changeBackgroundImage, 5000);

        // Inisialisasi dengan gambar pertama
        changeBackgroundImage();
    </script>
</body>

</html>
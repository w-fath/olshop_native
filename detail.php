<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Source Code</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="asset/css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:wght@800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:wght@400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="#">Tecno<span>Code</span></a>
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
                        Source Code
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownSourceCode">
                        <a class="dropdown-item" href="#">Source Code Web</a>
                        <a class="dropdown-item" href="#">Source Code Android</a>
                        <a class="dropdown-item" href="#">Source Code Arduino</a>
                        <a class="dropdown-item" href="#">Semua Source Code</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownTemplate" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Koleksi Template
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownTemplate">
                        <a class="dropdown-item" href="#">Template Back-end</a>
                        <a class="dropdown-item" href="#">Template Front-end</a>
                        <a class="dropdown-item" href="#">Semua Template</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Video</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">E-Book Tutorial</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Help</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Content -->
    <div class="container mt-4" style="margin-top: 80px; padding-top: 80px;">
        <div class="row">
            <?php
            include 'includes/koneksi.php';
            $id = $conn->real_escape_string($_GET['id']);

            $sql = "SELECT * FROM source_code WHERE id = '$id'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row['id'];
                    $imageSrc = $row['image'];
                    $title = $row['title'];
                    $description = $row['description'];
                    $download_link = $row['download_link'];
            ?>
                    <div class="col-12 mb-4">
                        <div class="card mb-4">
                            <div class="card-img">
                                <img src="<?php echo $imageSrc; ?>" class="card-img-top" alt="<?php echo $title; ?>">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <b class="card-text-title"><?php echo $title; ?></b>
                                </h5>
                                <h5 class="card-text-deskripsi">Deskripsi Lengkap</h5>
                                <p class="card-text"><?php echo $description; ?></p>
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

    <!-- Footer -->
    <footer class="bg-light text-center py-3">
        <?php echo "Copyright © " . date('Y') . " Tecno Code. All rights reserved."; ?>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
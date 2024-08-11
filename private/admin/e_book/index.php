<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../../index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    <div class="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler d-md-none" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <a class="navbar-brand" href="#">Admin Dashboard</a>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php"><i class="fas fa-code"></i> Source Code</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../e_book/index.php"><i class="fas fa-book"></i> E-Book</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../template/index.php"><i class="fas fa-images"></i> Template</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../video/index.php"><i class="fas fa-play-circle"></i> Video</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../kategori/index.php"><i class="fas fa-list"></i> Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"><i class="fas fa-envelope-open"></i> Pesan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../user/index.php"><i class="fas fa-users"></i> Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=""></a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../../logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">E-Book</h5>
                            <a href="#" class="btn btn-info btn-sm d-none d-md-inline-flex">
                                + Tambah E-Book
                            </a>
                            <a href="#" class="btn btn-info btn-sm d-md-none">
                                <i class="far fa-plus-square"></i>
                            </a>
                        </div>
                        <div class="card-body">
                            <?php
                            include '../../../includes/koneksi.php';

                            $sql = "SELECT * FROM source_code";
                            $result = $conn->query($sql);
                            ?>

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Language</th>
                                        <th>Status</th>
                                        <th>Image</th>
                                        <th>Download Link</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<tr>';
                                            echo '<td>' . htmlspecialchars($row['id']) . '</td>';
                                            echo '<td>' . htmlspecialchars($row['title']) . '</td>';
                                            echo '<td>' . htmlspecialchars($row['description']) . '</td>';
                                            echo '<td>' . htmlspecialchars($row['language']) . '</td>';
                                            echo '<td>' . htmlspecialchars($row['status']) . '</td>';
                                            echo '<td><img src="asset/img/' . htmlspecialchars($row['image']) . '" alt="' . htmlspecialchars($row['title']) . '" width="100"></td>';
                                            echo '<td><a href="' . htmlspecialchars($row['download_link']) . '" class="btn btn-primary btn-sm">Download</a></td>';
                                            echo '</tr>';
                                        }
                                    } else {
                                        echo '<tr><td colspan="7">No data available</td></tr>';
                                    }

                                    $conn->close();
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
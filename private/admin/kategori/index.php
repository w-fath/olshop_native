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
    <link rel="stylesheet" href="../admin.css">
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
                        <a class="nav-link" href=""><i class="fas fa-list"></i> Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"><i class="fas fa-envelope-open"></i> Pesan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=""><i class="fas fa-users"></i> Users</a>
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
            <?php if (isset($_GET['status'])) : ?>
                <?php if ($_GET['status'] == 'success') : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data berhasil ditambahkan!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php elseif ($_GET['status'] == 'error') : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Terjadi kesalahan saat menambahkan data.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php elseif ($_GET['status'] == 'upload_error') : ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Terjadi kesalahan saat mengunggah gambar.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <?php if (isset($_GET['kategori'])) : ?>
                <?php if ($_GET['kategori'] == 'edit') : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Kategori Berhasil diedit!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php elseif ($_GET['kategori'] == 'success') : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Kategori berhasil ditambahkan!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php elseif ($_GET['kategori'] == 'delete') : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Kategori berhasil dihapus!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Kategori</h5>
                            <a href="add.php" class="btn btn-info btn-sm d-none d-md-inline-flex">
                                + Tambah Kategori
                            </a>
                            <a href="tambah_code.php" class="btn btn-info btn-sm d-md-none">
                                <i class="far fa-plus-square"></i>
                            </a>
                        </div>
                        <div class="card-body">
                            <?php
                            include '../../../includes/koneksi.php';
                            $sql = "SELECT * FROM kategori";
                            $result = $conn->query($sql);
                            ?>

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Kategori</th>
                                        <th>Nama</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        $no = 1;
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<tr>';
                                            echo '<td>' . $no++ . '</td>';
                                            echo '<td>' . htmlspecialchars($row['kd_kategori']) . '</td>';
                                            echo '<td>' . htmlspecialchars($row['nama']) . '</td>';
                                            echo '<td>';
                                            echo '<a href="edit_kategori.php?id=' . htmlspecialchars($row['id']) . '" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> ';
                                            echo '<a href="delete_kategori.php?id=' . htmlspecialchars($row['id']) . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus Kategori ini ?\')"><i class="fas fa-trash"></i></a>';
                                            echo '</td>';
                                            echo '</tr>';
                                        }
                                    } else {
                                        echo '<tr><td colspan="6">No data available</td>';
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
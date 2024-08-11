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
    <title>Admin - Kelola Promo</title>
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
                        <a class="nav-link" href="promo.php"><i class="fas fa-tags"></i> Promo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="produk.php"><i class="fas fa-box"></i> Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kategori.php"><i class="fas fa-list"></i> Kategori</a>
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
            <?php if (isset($_GET['status'])): ?>
                <?php if ($_GET['status'] == 'success'): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data promo berhasil di Tambahkan!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php elseif ($_GET['status'] == 'update_success'): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data promo berhasil di Update!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php elseif ($_GET['status'] == 'delete_success'): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data promo berhasil di Hapus!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php elseif ($_GET['status'] == 'error'): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Terjadi kesalahan saat menambahkan data promo.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php elseif ($_GET['status'] == 'upload_error'): ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Terjadi kesalahan saat mengunggah gambar promo.
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
                            <h5 class="card-title mb-0">Daftar Promo</h5>
                            <a href="tambah_promo.php" class="btn btn-info btn-sm d-none d-md-inline-flex">
                                + Tambah Promo
                            </a>
                            <a href="tambah_promo.php" class="btn btn-info btn-sm d-md-none">
                                <i class="far fa-plus-square"></i>
                            </a>
                        </div>
                        <div class="card-body">
                            <?php
                            include '../../../includes/koneksi.php';

                            $sql = "SELECT * FROM promo";
                            $result = $conn->query($sql);
                            ?>

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Judul Promo</th>
                                        <th>Sumber Link</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<tr>';
                                            echo '<td>' . htmlspecialchars($row['id']) . '</td>';
                                            echo '<td>' . htmlspecialchars($row['title']) . '</td>';
                                            echo '<td>' . htmlspecialchars($row['sumber_link']) . '</td>';
                                            echo '<td>';
                                            echo '<a href="edit_promo.php?id=' . htmlspecialchars($row['id']) . '" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> ';
                                            echo '<a href="delete_promo.php?id=' . htmlspecialchars($row['id']) . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin ingin menghapus promo ini?\')"><i class="fas fa-trash"></i></a>';
                                            echo '</td>';
                                            echo '</tr>';
                                        }
                                    } else {
                                        echo '<tr><td colspan="5">Tidak ada data promo</td></tr>';
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
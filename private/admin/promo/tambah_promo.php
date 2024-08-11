<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../../index.php");
    exit;
}

include '../../../includes/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $conn->real_escape_string($_POST['title']);
    $sumber_link = $conn->real_escape_string($_POST['sumber_link']);
    $image = $conn->real_escape_string($_POST['image']);

    $sql = "INSERT INTO promo (title, sumber_link, image) VALUES ('$title', '$sumber_link', '$image')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?status=success");
    } else {
        header("Location: tambah_promo.php?status=error");
    }

    $conn->close();
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Promo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Tambah Promo Baru</h2>
        <?php if (isset($_GET['status']) && $_GET['status'] == 'error'): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Terjadi kesalahan saat menambahkan promo.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <form action="tambah_promo.php" method="POST">
            <div class="form-group">
                <label for="title">Judul Promo:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="sumber_link">Sumber Link:</label>
                <input type="text" class="form-control" id="sumber_link" name="sumber_link" required>
            </div>
            <div class="form-group">
                <label for="image">Link Gambar:</label>
                <input type="url" class="form-control" id="image" name="image" placeholder="https://example.com/image.jpg" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Promo</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

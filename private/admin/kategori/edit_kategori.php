<?php
include '../../../includes/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $conn->real_escape_string($_POST['id']);
    $nama = $conn->real_escape_string($_POST['nama']);

    $sql = "UPDATE kategori SET nama = '$nama' WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        header('Location: index.php?kategori=edit');
        exit();
    } else {
        header('Location: index.php?kategori=error');
        exit();
    }

    $conn->close();
} else {
    $id = $conn->real_escape_string($_GET['id']);
    $sql = "SELECT * FROM kategori WHERE id = '$id'";
    $result = $conn->query($sql);
    $category = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kategori</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Edit Kategori</h5>
                    </div>
                    <div class="card-body">
                        <form action="edit_kategori.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($category['id']); ?>">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo htmlspecialchars($category['nama']); ?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="index.php" class="btn btn-secondary">Cancel</a>
                        </form>
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

<?php
include '../../../includes/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $conn->real_escape_string($_GET['id']);

    $sql = "DELETE FROM kategori WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        header('Location: index.php?kategori=delete');
        exit();
    } else {
        header('Location: index.php?kategori=error');
        exit();
    }

    $conn->close();
}
?>

<?php
include '../../../includes/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $conn->real_escape_string($_POST['nama']);

    // Define the prefix
    $prefix = 'KT010246';

    // Get the highest kd_kategori from the table
    $result = $conn->query("SELECT kd_kategori FROM kategori ORDER BY kd_kategori DESC LIMIT 1");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $last_kd_kategori = $row['kd_kategori'];

        // Extract the number part and increment it
        $last_number = (int)substr($last_kd_kategori, strlen($prefix));
        $new_number = $last_number + 1;
    } else {
        // Start from 1 if there are no entries yet
        $new_number = 1;
    }

    // Generate the new kd_kategori
    $new_kd_kategori = $prefix . $new_number;

    // Prepare and execute the insert query
    $sql = "INSERT INTO kategori (kd_kategori, nama) VALUES ('$new_kd_kategori', '$nama')";

    if ($conn->query($sql) === TRUE) {
        header('Location: index.php?status=success');
        exit();
    } else {
        header('Location: index.php?status=error');
        exit();
    }

    $conn->close();
}
?>

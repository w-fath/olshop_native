<?php
include '../../../includes/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil dan sanitasi data dari form
    $title = $conn->real_escape_string($_POST['title']);
    $description = $conn->real_escape_string($_POST['description']);
    $language = $conn->real_escape_string($_POST['language']);
    $status = $conn->real_escape_string($_POST['status']);
    $download_link = $conn->real_escape_string($_POST['download_link']);
    $id_kategori = $conn->real_escape_string($_POST['id_kategori']);

    // Upload image
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $upload_folder = "../../../upload/img/";
    $image_path = $upload_folder . basename($image_name); // Path absolute di localhost

    // Pastikan folder upload/img ada dan bisa ditulisi
    if (!is_dir($upload_folder) || !is_writable($upload_folder)) {
        die('Folder upload/img tidak ada atau tidak bisa ditulisi.');
    }

    if (move_uploaded_file($image_tmp, $image_path)) {
        $db_image_path = "upload/img/" . basename($image_name); // Path yang akan disimpan di database

        // Query untuk menyimpan data ke database
        $sql = "INSERT INTO source_code (title, description, language, status, image, download_link, id_kategori) 
                VALUES ('$title', '$description', '$language', '$status', '$db_image_path', '$download_link', '$id_kategori')";

        if ($conn->query($sql) === TRUE) {
            header('Location: ../index.php?status=success');
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: Failed to upload image.";
    }

    $conn->close();
}
?>

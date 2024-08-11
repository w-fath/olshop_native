<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../../index.php");
    exit;
}

include '../../../includes/koneksi.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("DELETE FROM promo WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: index.php?status=delete_success");
    } else {
        header("Location: index.php?status=error");
    }

    $stmt->close();
} else {
    header("Location: index.php?status=error");
}

$conn->close();
?>

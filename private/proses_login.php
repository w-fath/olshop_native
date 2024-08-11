<?php
session_start();
include '../includes/koneksi.php'; // Sesuaikan path jika perlu

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM login WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (MD5($password) == $user['password']) {
            $_SESSION['loggedin'] = true;
            $_SESSION['role'] = $user['role'];
            
            // Redirect berdasarkan role
            if ($user['role'] == 'admin') {
                header("Location: admin/index.php");
            } else if ($user['role'] == 'user') {
                header("Location: user/index.php");
            }
            exit;
        } else {
            echo "<script>alert('Password salah!'); window.location.href='index.php';</script>";
        }
    } else {
        echo "<script>alert('Username tidak ditemukan!'); window.location.href='index.php';</script>";
    }
}
?>

<?php
session_start();
require 'function.php'; // Pastikan file ini berisi koneksi ke database

// Pastikan koneksi database berhasil
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$error = ''; // Variabel untuk menyimpan pesan kesalahan

if (isset($_POST['login'])) { // Periksa jika form login telah disubmit
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Menggunakan prepared statement untuk menghindari SQL Injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Debugging
    var_dump($user); // Cek apakah user ditemukan
    var_dump($password === $user['password']); // Cek hasil perbandingan password

    if ($user && $password === $user['password']) {
        // Jika username cocok dan password sesuai
        $_SESSION['log'] = 'True';
        header('Location: daftar_produk.php');
        exit();
    } else {
        // Jika username atau password salah
        $error = "Username atau password salah!";
    }
}

// Cek apakah session sudah aktif
if (isset($_SESSION['log']) && $_SESSION['log'] === 'True') {
    header('Location: daftar_produk.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <form method="POST" action="login.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit" name="login">Login</button>
        </form>
        <?php if (!empty($error)): ?>
            <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
       
    </div>
</body>
</html>

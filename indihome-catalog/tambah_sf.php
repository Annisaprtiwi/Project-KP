<?php
session_start();
include 'db.php'; // Pastikan file ini sudah ada dan benar

if (!isset($_SESSION['log']) || $_SESSION['log'] !== 'True') {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $whatsapp = $_POST['whatsapp'];
    $photo = $_FILES['photo']['name'];

    // Lokasi penyimpanan foto
    $target_dir = "uploads/";

    // Cek apakah folder 'uploads/' sudah ada, jika belum, buat foldernya
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true); // Membuat folder dengan izin penuh
    }

    $target_file = $target_dir . basename($photo);

    // Pindahkan file ke direktori yang diinginkan
    if (move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)) {
        // Query untuk memasukkan data ke dalam tabel
        $sql = "INSERT INTO sf_members (name, whatsapp, photo) VALUES ('$name', '$whatsapp', '$target_file')";

        if ($conn->query($sql) === TRUE) {
            // Redirect ke halaman daftar_sf.php setelah berhasil menambah data
            header('Location: daftar_sf.php');
            exit(); // Pastikan skrip berhenti setelah redirect
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Maaf, terjadi kesalahan saat mengunggah file.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Tambah SF</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo-container">
            <img src="images/Admin.png" alt="Admin Logo" class="admin-logo">
            <h2>Admin</h2>
        </div>
        <ul>
        <li><a href="daftar_produk.php"><i class="fas fa-list"></i> Daftar Produk</a></li>
            <li><a href="daftar_sf.php"><i class="fas fa-users"></i> Daftar SF</a></li>
            <li><a href="daftar_admin.php"><i class="fas fa-users"></i> Daftar Admin</a></li>
            <li><a href="tambah_produk.php"><i class="fas fa-plus-square"></i> Tambah Produk</a></li>
            <li><a href="tambah_sf.php" class="active"><i class="fas fa-plus-square"></i> Tambah SF</a></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>

    <div class="main-content">
        <header>
            <h1>Tambah SF</h1>
        </header>
        <section class="form-section">
        <form action="tambah_sf.php" method="post" enctype="multipart/form-data" class="add-form">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" required>
            <label for="whatsapp">WhatsApp:</label>
            <input type="text" id="whatsapp" name="whatsapp" required>
            <label for="photo">Foto:</label>
            <input type="file" id="photo" name="photo" accept=".jpg, .jpeg, .png, .webp" required>
            <button type="submit">Tambah</button>
        </form>
</section>

    </div>
</body>
</html>

<?php
session_start();
if (!isset($_SESSION['log']) || $_SESSION['log'] !== 'True') {
    header('Location: login.php');
    exit();
}
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Tambah Produk</title>
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
            <li><a href="tambah_produk.php" class="active"><i class="fas fa-plus-square"></i> Tambah Produk</a></li>
            <li><a href="tambah_sf.php"><i class="fas fa-plus-square"></i> Tambah SF</a></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
         </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <header>
            <h1>Tambah Produk</h1>
        </header>

        <!-- Form Tambah Produk -->
        <section class="form-section">
           
            <form action="process.php" method="post" class="add-form">
                <input type="hidden" name="action" value="add">
                <label for="name">Nama Produk:</label>
                <input type="text" id="name" name="name" required>
                <label for="description">Deskripsi:</label>
                <input type="text" id="description" name="description" required>
                <label for="price">Harga Produk:</label>
                <input type="text" id="price" name="price" required>
                <label for="PPN">PPN:</label>
                <input type="text" id="PPN" name="PPN" required>
                <label for="type">Type Produk:</label>
                <input type="text" id="type" name="type" required>
                <button type="submit">Tambah</button>
            </form>
        </section>
    </div>
</body>

</html>

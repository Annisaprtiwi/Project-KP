<?php
session_start();

// Cek apakah sesi login sudah ada
if (!isset($_SESSION['log']) || $_SESSION['log'] !== 'True') {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Daftar Admin</title>
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
            <li><a href="daftar_admin.php" class="active"><i class="fas fa-users"></i> Daftar Admin</a></li>
            <li><a href="tambah_produk.php"><i class="fas fa-plus-square"></i> Tambah Produk</a></li>
            <li><a href="tambah_sf.php"><i class="fas fa-plus-square"></i> Tambah SF</a></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>    
        
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <header>
            <h1>Daftar Admin</h1>
            <button class="add-admin-btn" onclick="openOverlay('add-overlay')">Tambah Admin</button>
        </header>

    <!-- Bagian Daftar Admin -->
<section class="table-section">
    <table>
        <tr>
            <th>Username</th>
            <th>Password</th>
            <th>Aksi</th>
        </tr>
        <?php
        include('db.php');
        $result = $conn->query("SELECT * FROM users");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['username']) . "</td>";
            echo "<td>" . htmlspecialchars($row['password']) . "</td>"; // Menampilkan password sebagai teks biasa
            echo "<td class='action-buttons'>
                    <form action='process_admin.php' method='post' style='display:inline;'>
                        <input type='hidden' name='action' value='delete'>
                        <input type='hidden' name='username' value='" . htmlspecialchars($row['username']) . "'>
                        <button type='submit' class='delete'>Hapus</button>
                    </form>
                    <button type='button' class='edit' onclick=\"openOverlay('edit-overlay', '" . htmlspecialchars($row['username']) . "', '" . htmlspecialchars($row['password']) . "')\">Edit</button>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>
</section>



    </div>

    <!-- Overlay for Adding Admin -->
    <div id="add-overlay" class="overlay">
        <div class="overlay-content">
            <span class="close-btn" onclick="closeOverlay('add-overlay')">&times;</span>
            <h3>Tambah Admin</h3>
            <form method="POST" action="register.php">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <button type="submit">Tambah</button>
            </form>
        </div>
    </div>

<!-- Overlay for Editing Admin -->
<div id="edit-overlay" class="overlay">
    <div class="overlay-content">
        <span class="close-btn" onclick="closeOverlay('edit-overlay')">&times;</span>
        <h3>Edit Admin</h3>
        <form id="edit-form" method="POST" action="update_admin.php">
            <input type="hidden" id="edit-username" name="username">
            <label for="edit-password">Password Baru:</label>
            <input type="text" id="edit-password" name="password"> <!-- Ubah menjadi input teks -->
            <button type="submit">Update</button>
        </form>
    </div>
</div>



    <script>
        function openOverlay(overlayId, username = '', password = '') {
            const overlay = document.getElementById(overlayId);
            if (overlayId === 'edit-overlay') {
                document.getElementById('edit-username').value = username;
                document.getElementById('edit-password').value = password;
            }
            overlay.style.display = 'flex';
        }

        function closeOverlay(overlayId) {
            document.getElementById(overlayId).style.display = 'none';
        }
    </script>
</body>

</html>

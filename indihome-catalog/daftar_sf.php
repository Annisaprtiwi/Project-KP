<?php
session_start();
include 'db.php'; // Pastikan file ini sudah ada dan benar

if (!isset($_SESSION['log']) || $_SESSION['log'] !== 'True') {
    header('Location: login.php');
    exit();
}

// Query untuk mengambil semua data SF dari database
$sql = "SELECT * FROM sf_members";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Daftar SF</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   
   
    <script>
        function showEditForm(id, name, whatsapp, photo) {
            document.getElementById('edit-id').value = id;
            document.getElementById('edit-name').value = name;
            document.getElementById('edit-whatsapp').value = whatsapp;
            document.getElementById('edit-photo').value = ""; // Kosongkan input file
            document.getElementById('edit-overlay').style.display = 'flex';
        }

        function hideEditForm() {
            document.getElementById('edit-overlay').style.display = 'none';
        }
    </script>
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
            <li><a href="daftar_sf.php" class="active"><i class="fas fa-users"></i> Daftar SF</a></li>
            <li><a href="daftar_admin.php"><i class="fas fa-users"></i> Daftar Admin</a></li>
            <li><a href="tambah_produk.php"><i class="fas fa-plus-square"></i> Tambah Produk</a></li>
            <li><a href="tambah_sf.php"><i class="fas fa-plus-square"></i> Tambah SF</a></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>

    <div class="main-content">
        <header>
            <h1>Daftar SF</h1>
        </header>

        <table class="sf-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>WhatsApp</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    $no = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                        echo "<td><a href='https://wa.me/" . htmlspecialchars($row['whatsapp']) . "' target='_blank'>" . htmlspecialchars($row['whatsapp']) . "</a></td>";
                        echo "<td><img src='" . htmlspecialchars($row['photo']) . "' alt='Foto SF' class='sf-photo'></td>";
                        echo "<td class='action-buttons'>
                            <form action='process_sf.php' method='post' style='display:inline;'>
                                <input type='hidden' name='action' value='delete'>
                                <input type='hidden' name='id' value='" . htmlspecialchars($row['id']) . "'>
                                <button type='submit' class='delete'>Hapus</button>
                            </form>
                            <button class='edit' onclick='showEditForm(\"" . htmlspecialchars($row['id']) . "\", \"" . htmlspecialchars($row['name']) . "\", \"" . htmlspecialchars($row['whatsapp']) . "\", \"" . htmlspecialchars($row['photo']) . "\")'>Edit</button>
                        </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Tidak ada data SF.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Edit Form Overlay -->
    <div id="edit-overlay">
        <div id="edit-form">
            <form action="process_sf.php" method="post" enctype="multipart/form-data">
                <input type="hidden" id="edit-id" name="id">
                <label for="edit-name">Nama:</label>
                <input type="text" id="edit-name" name="name" required>
                <label for="edit-whatsapp">WhatsApp:</label>
                <input type="text" id="edit-whatsapp" name="whatsapp" required>
                <label for="edit-photo">Foto (Kosongkan jika tidak ingin mengganti foto):</label>
                <input type="file" id="edit-photo" name="photo" accept=".jpg, .jpeg, .png, .webp">
                <button type="submit" name="action" value="edit" class="save">Simpan Perubahan</button>
                <button type="button" class="cancel" onclick="hideEditForm()">Batal</button>
            </form>
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>

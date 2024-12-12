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
    <title>Admin Dashboard - Daftar Produk</title>
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
            <li><a href="daftar_produk.php" class="active"><i class="fas fa-list"></i> Daftar Produk</a></li>
            <li><a href="daftar_sf.php"><i class="fas fa-users"></i> Daftar SF</a></li>
            <li><a href="daftar_admin.php"><i class="fas fa-users"></i> Daftar Admin</a></li>
            <li><a href="tambah_produk.php"><i class="fas fa-plus-square"></i> Tambah Produk</a></li>
            <li><a href="tambah_sf.php"><i class="fas fa-plus-square"></i> Tambah SF</a></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <header>
            <h1>Daftar Produk</h1>
        </header>

        <!-- Daftar Produk -->
        <section class="table-section">
            <table>
                <tr>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>PPN</th>
                    <th>Type</th>
                    <th>Aksi</th>
                </tr>
                <?php
                include('db.php');
                $result = $conn->query("SELECT * FROM products");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['price']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['PPN']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['type']) . "</td>";
                    echo "<td class='action-buttons'>
                            <form action='process.php' method='post' class='delete-form' style='display:inline;'>
                                <input type='hidden' name='action' value='delete'>
                                <input type='hidden' name='id' value='" . htmlspecialchars($row['id']) . "'>
                                <button type='submit' class='delete'>Hapus</button>
                            </form>
                            <button class='edit' onclick='showEditForm(\"" . htmlspecialchars($row['id']) . "\", \"" . htmlspecialchars($row['name']) . "\", \"" . htmlspecialchars($row['description']) . "\", \"" . htmlspecialchars($row['price']) . "\", \"" . htmlspecialchars($row['PPN']) . "\", \"" . htmlspecialchars($row['type']) . "\")'>Edit</button>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </section>

        <!-- Overlay Edit Produk -->
        <div class="overlay" id="editOverlay">
            <div class="overlay-content">
                <span class="close" onclick="closeEditForm()">&times;</span>
                <h3>Edit Produk</h3>
                <form id="editForm" action="update.php" method="post">
                    <input type="hidden" name="id" id="editId">
                    <label for="editName">Nama Produk:</label>
                    <input type="text" id="editName" name="name" required>
                    <label for="editDescription">Deskripsi:</label>
                    <input type="text" id="editDescription" name="description" required>
                    <label for="editPrice">Harga Produk:</label>
                    <input type="text" id="editPrice" name="price" required>
                    <label for="editPPN">PPN:</label>
                    <input type="text" id="editPPN" name="PPN" required>
                    <label for="editType">Type Produk:</label>
                    <input type="text" id="editType" name="type" required>
                    <button type="submit">Simpan</button>
                    <button type="button" class="cancel" onclick="closeEditForm()">Batal</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function showEditForm(id, name, description, price, PPN, type) {
            document.getElementById('editId').value = id;
            document.getElementById('editName').value = name;
            document.getElementById('editDescription').value = description;
            document.getElementById('editPrice').value = price;
            document.getElementById('editPPN').value = PPN;
            document.getElementById('editType').value = type;
            document.getElementById('editOverlay').style.display = 'flex';
        }

        function closeEditForm() {
            document.getElementById('editOverlay').style.display = 'none';
        }
    </script>
</body>

</html>

<?php
session_start();
include 'db.php'; // Pastikan file ini sudah ada dan benar

if (!isset($_SESSION['log']) || $_SESSION['log'] !== 'True') {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];

    if ($action == 'delete') {
        $id = intval($_POST['id']);

        // Query untuk mendapatkan data SF termasuk path foto
        $sql = "SELECT photo FROM sf_members WHERE id = $id";
        $result = $conn->query($sql);
        $sf = $result->fetch_assoc();
        $photo_path = $sf['photo'];

        // Hapus file foto jika ada
        if (file_exists($photo_path)) {
            unlink($photo_path);
        }

        // Query untuk menghapus data SF dari database
        $sql = "DELETE FROM sf_members WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            header('Location: daftar_sf.php');
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    } elseif ($action == 'edit') {
        $id = intval($_POST['id']);
        $name = $_POST['name'];
        $whatsapp = $_POST['whatsapp'];
        $photo = $_FILES['photo']['name'];
        $target_dir = "uploads/";

        // Cek apakah folder 'uploads/' sudah ada, jika belum, buat foldernya
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true); // Membuat folder dengan izin penuh
        }

        if ($photo) {
            $target_file = $target_dir . basename($photo);
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)) {
                $sql = "UPDATE sf_members SET name='$name', whatsapp='$whatsapp', photo='$target_file' WHERE id=$id";
            } else {
                echo "Maaf, terjadi kesalahan saat mengunggah file.";
                exit();
            }
        } else {
            $sql = "UPDATE sf_members SET name='$name', whatsapp='$whatsapp' WHERE id=$id";
        }

        if ($conn->query($sql) === TRUE) {
            header('Location: daftar_sf.php');
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    $conn->close();
}

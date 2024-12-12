<?php
session_start();
if (!isset($_SESSION['log']) || $_SESSION['log'] !== 'True') {
    header('Location: login.php');
    exit();
}

include 'db.php'; // Make sure the database connection is correct

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $whatsapp = $_POST['whatsapp'];
    
    // Validate input
    if (empty($name) || empty($whatsapp) || !isset($_FILES['photo'])) {
        die("Semua field harus diisi dan foto harus diunggah.");
    }

    // Process file upload
    $photo = $_FILES['photo'];
    $uploadDir = 'uploads/';
    $uploadFile = $uploadDir . basename($photo['name']);
    
    // Validate file type
    $allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];
    if (!in_array($photo['type'], $allowedTypes)) {
        die("Format file tidak didukung. Harap unggah file jpg, png, atau webp.");
    }

    if (move_uploaded_file($photo['tmp_name'], $uploadFile)) {
        // Save data to database
        $stmt = $conn->prepare("INSERT INTO sf_members (name, whatsapp, photo) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $whatsapp, $uploadFile);
        if ($stmt->execute()) {
            echo "Data SF berhasil ditambahkan.";
        } else {
            echo "Gagal menambahkan data SF.";
        }
        $stmt->close();
    } else {
        echo "Gagal mengunggah foto.";
    }

    $conn->close();
}
?>

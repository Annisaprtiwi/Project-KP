<?php
session_start();

// Cek apakah sesi login sudah ada
if (!isset($_SESSION['log']) || $_SESSION['log'] !== 'True') {
    header('Location: login.php');
    exit();
}

include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'delete') {
        $username = $_POST['username'];

        // Prepare and execute the delete query
        $stmt = $conn->prepare("DELETE FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);

        if ($stmt->execute()) {
            // Redirect or show success message
            header('Location: daftar_admin.php');
        } else {
            // Handle error
            echo "Error deleting record: " . $conn->error;
        }

        $stmt->close();
    }
}
$conn->close();
?>

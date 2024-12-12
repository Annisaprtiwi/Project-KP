<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']); // Simpan password tanpa hashing

    $sql = "UPDATE users SET password='$password' WHERE username='$username'";

    if ($conn->query($sql) === TRUE) {
        header("Location: daftar_admin.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>

<?php
session_start(); // Mulai sesi

// Hapus semua sesi
session_destroy();

// Redirect ke halaman login
header("Location: login.php");
exit();
?>
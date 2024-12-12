<?php
include('db.php');

$action = $_POST['action'];

if ($action == 'add') {
    $name = $_POST['name'];
    $description =  $_POST['description'];
    $price = $_POST['price'];
    $PPN = $_POST['PPN'];
    $type = $_POST['type'];
    
    

    $conn->query("INSERT INTO products (name, description, price, PPN, type) VALUES ('$name', '$description', '$price', '$PPN', '$type')");
} elseif ($action == 'delete') {
    $id = $_POST['id'];

    $conn->query("DELETE FROM products WHERE id = $id");
}

header('Location: daftar_produk.php');
?>

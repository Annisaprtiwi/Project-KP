<?php
include('db.php');

$id = $_POST['id'];
$name = $_POST['name'];
$description =  $_POST['description'];
$price = $_POST['price'];
$PPN = $_POST['PPN'];
$type= $_POST['type'];

$conn->query("UPDATE products SET name = '$name', description = '$description', price = '$price', PPN = '$PPN', type = '$type' WHERE id = $id");

header('Location: daftar_produk.php');
?>

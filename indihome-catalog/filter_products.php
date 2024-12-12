<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "indihome_catalog";

$conn = new mysqli($servername, $username, $password, $dbname);

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$product_type = $_GET['type'];

if ($product_type == 'all') {
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);
    if (!$result) {
        die("Query failed: " . $conn->error);
    }
} else {
    $sql = $conn->prepare("SELECT * FROM products WHERE type = ?");
    if (!$sql) {
        die("Prepare failed: " . $conn->error);
    }
    $sql->bind_param("s", $product_type);
    $sql->execute();
    $result = $sql->get_result();
}

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='product'>";
        echo "<h2>" . $row["name"] . "</h2>";
        echo "<p>" . $row["description"] . "</p>";
        echo "<p>Type: " . $row["type"] . "</p>";
        echo "</div>";
    }
} else {
    echo "No products found.";
}

$conn->close();
?>

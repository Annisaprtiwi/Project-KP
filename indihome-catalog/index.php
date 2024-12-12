<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk IndiHome</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <header>
        <img src="images/Logo.WEBP" alt="IndiHome Logo" class="logo-left">
        <img src="images/LOGO.png" alt="IndiHome Logo" class="logo-right">
        <h1>SELAMAT DATANG DI TELKOMSEL<br>
            <span class="subtext">Tanjungbalai Karimun</span>
        </h1>
    </header>

    <nav>
        <ul>
            <li><a href="#" onclick="filterProducts('all')" class="active">All</a></li>
            <li><a href="#" onclick="filterProducts('1P')">1P</a></li>
            <li><a href="#" onclick="filterProducts('2P')">2P</a></li>
            <li><a href="#" onclick="filterProducts('3P')">3P</a></li>
            <li><a href="#" onclick="filterProducts('EZnet')">EZnet</a></li>
            <li><a href="#" onclick="filterProducts('Orbit Home')">Orbit Home</a></li>
        </ul>
    </nav>

    <main>
        <div id="search-section">
            <form action="index.php" method="GET">
                <input type="text" name="search" placeholder="Cari Paket" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>

        <section id="product-catalog">
            <?php
            include 'includes/products.php';

            $search = isset($_GET['search']) ? strtolower(trim($_GET['search'])) : '';

            foreach ($products as $product) {
                if (empty($search) || strpos(strtolower($product['name']), $search) !== false || strpos(strtolower($product['description']), $search) !== false) {
                    echo '<div class="product-card" data-type="' . htmlspecialchars($product['type']) . '">';
                    echo '<h2>' . htmlspecialchars($product['name']) . '</h2>';
                    echo '<p class="price">' . htmlspecialchars($product['price']) . '</p>';
                    echo '<h3 class="PPN">' . htmlspecialchars($product['PPN']) . '</h3>';
                    echo '<button class="more-info-btn" onclick="showOverlay(\'' . htmlspecialchars(addslashes($product['description'])) . '\')">lainnya</button>';
                    echo '</div>';
                }
            }
            ?>
        </section>

        <!-- Overlay untuk menampilkan deskripsi produk -->
        <div id="overlay" class="overlay">
            <div class="overlay-content">
                <span class="close-btn" onclick="hideOverlay()">&times;</span>
                <p id="overlay-description"></p>
            </div>
        </div>

        <section id="media-gallery">
            <h2>Agresif Selling Produk IndiHome</h2>
            <div class="media-container-wrapper">
                <div class="media-container">
                    <video controls>
                        <source src="media/K1.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>

                <div class="media-container">
                    <video controls>
                        <source src="media/K2.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>

                <div class="media-container">
                    <video controls>
                        <source src="media/K3.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>

                <div class="media-container">
                    <video controls>
                        <source src="media/K4.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </section>

        <section id="our-sf">
            <h2>Our SF</h2>
            <div class="sf-container">
                <?php
                include 'db.php'; // Pastikan koneksi database sudah benar

                // Ambil data anggota SF dari database
                $result = $conn->query("SELECT * FROM sf_members");

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='sf-card'>";
                        echo "<img src='" . htmlspecialchars($row['photo']) . "' alt='" . htmlspecialchars($row['name']) . "' class='sf-photo'>";
                        echo "<p class='sf-name'>" . htmlspecialchars($row['name']) . "</p>";
                        echo "<a href='https://wa.me/" . htmlspecialchars($row['whatsapp']) . "' class='sf-whatsapp' target='_blank'>
                                <i class='fab fa-whatsapp'></i> WhatsApp</a>";
                        echo "</div>";
                    }
                } else {
                    echo "Belum ada anggota SF.";
                }
                $conn->close();
                ?>
            </div>
        </section>

    </main>

    <footer>
        <div class="footer-left">
            <p>Contact Us</p>
            <span>@indihomekarimun</span>
            <img src="images/ig.jpg" alt="Instagram Logo" class="instagram-logo">
        </div>

        <div class="footer-bottom">
            <p>copyright &copy; 2024</p>
        </div>

        <div class="footer-right">
            <img src="images/Footer.png" alt="IndiHome Logo" class="footer-logo">
        </div>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            filterProducts(); // Inisialisasi filter produk saat halaman dimuat
        });

        function filterProducts(type = 'all') {
            var products = document.querySelectorAll("#product-catalog .product-card");
            var links = document.querySelectorAll("nav ul li a");

            products.forEach(function (product) {
                if (type === "all" || product.getAttribute("data-type") === type) {
                    product.style.display = "block";
                } else {
                    product.style.display = "none";
                }
            });

            // Update active class
            links.forEach(function (link) {
                link.classList.remove("active");
            });

            // Jika type adalah string dengan spasi, ganti spasi dengan escape karakter
            var selectorType = type.replace(/'/g, "\\'");
            var activeLink = document.querySelector(`nav ul li a[onclick="filterProducts('${selectorType}')"]`);
            if (activeLink) {
                activeLink.classList.add("active");
            }
        }

        function showOverlay(description) {
            document.getElementById("overlay-description").textContent = description;
            document.getElementById("overlay").style.display = "flex";
        }

        function hideOverlay() {
            document.getElementById("overlay").style.display = "none";
        }
    </script>
</body>
</html>

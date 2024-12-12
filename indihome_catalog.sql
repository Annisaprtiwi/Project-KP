-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2024 at 09:34 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `indihome_catalog`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(25) NOT NULL,
  `PPN` varchar(25) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `PPN`, `type`) VALUES
(2, 'Paket Digital JITU 1 30 Mbps', 'Cocok digunakan untuk maks 3 perangkat Promo biaya pasang menjadi Rp50.000 (Normal Rp500.000), kecepatan internet hingga 30 Mbps, paket sudah termasuk Disney+Hotstar.', 'Rp 295.000/bulan', 'exclude', '1P'),
(4, 'Paket Digital JITU 1 50 Mbps', 'Paket Digital JITU 1 50 Mbps, cocok digunakan untuk maksimal 5 perangkat, bebas biaya pasang (Normal Rp 500.000), kecepatan internet hingga 50 Mbps, paket sudah termasuk IndiHome TV, Disney+Hotstar dan MAXStream.', 'Rp 325.000/bulan', 'exclude', '1P'),
(5, 'Paket Dynamic 1P 50 Mbps', 'Cocok digunakan untuk maksimal 5 perangkat, bebas biaya pasang (Normal Rp 500.000), kecepatan internet hingga 50 Mbps, kouta keluarga 15GB untuk 6 nomor, 30 menit voice & SMS seluruh operator, unlimited voice & SMS sesama member, paket sudah termasuk IndiHome TV, Disney+Hotstar dan MAXStream.', 'Rp 370.000/bulan', 'exclude', '1P'),
(6, 'Paket Digital JITU 1 100 Mbps', 'Cocok digunakan untuk maksimal 10 perangkat, bebas biaya pasang (Normal Rp 500.000), kecepatan internet hingga 100 Mbps, paket sudah termasuk IndiHome TV dan Disney+Hotstar.', 'Rp 395.000/bulan', 'exclude', '1P'),
(8, 'Paket Complete 1P 50 Mbps', 'Cocok digunakan untuk maksimal 5 perangkat, bebas biaya pasang (Normal Rp 500.000), kecepatan internet hingga 50 Mbps, kouta keluarga 15GB untuk 6 nomor, 30 menit voice & SMS seluruh operator, unlimited voice & SMS sesama member, kouta Orbit 20GB (belum termasuk modem Orbit Rp 425.000).', 'Rp 405.000/bulan', 'exclude', '1P'),
(9, 'IndiHome Movie 1P 100 Mbps', 'Cocok digunakan untuk maksimal 10 perangkat, bebas biaya pasang (Normal Rp 500.000), kecepatan internet hingga 100 Mbps, paket sudah termasuk IndiHome TV, Disney+Hotstar dan Netflix.', 'Rp 449.000/bulan', 'exclude', '1P'),
(10, 'Paket Dynamic 1P 100 Mbps', 'Cocok digunakan untuk maksimal 10 perangkat, bebas biaya pasang (Normal Rp 500.000), kecepatan internet hingga 100 Mbps, kouta keluarga 15GB untuk 6 nomor30 menit voice & SMS seluruh operator, unlimited voice & SMS sesama member, paket sudah termasuk IndiHome TV, Disney+Hotstar dan MAXStream.', 'Rp 480.000/bulan', 'exclude', '1P'),
(11, 'Paket Complete 1P 100 Mbps', 'Cocok digunakan untuk maksimal 10 perangkat, bebas biaya pasang (Normal Rp 500.000), kecepatan internet hingga 100 Mbps, kouta keluarga 15GB untuk 6 nomor30 menit voice & SMS seluruh operator, unlimited voice & SMS sesama member, kouta Orbir 20GB (belum termasuk modem Orbit Rp 425.000).', 'Rp 515.000/bulan', 'exclude', '1P'),
(12, 'Paket Dynamic 1P 300 Mbps', 'Cocok digunakan untuk maksimal 20 perangkat, bebas biaya pasang (Normal Rp 500.000), kecepatan internet hingga 300 Mbps, kouta keluarga 15GB untuk 6 nomor 30 menit voice & SMS seluruh operator, unlimited voice & SMS sesama member, paket sudah termasuk IndiHome TV, Disney+Hotstar dan MAXStream.', 'Rp 888.000/bulan', 'exclude', '1P'),
(13, 'Paket Digital JITU 1 30 Mbps', 'Cocok digunakan untuk maks 3 perangkat, bebas biaya pasang (Normal Rp500.000), kecepatan internet hingga 30 Mbps, paket TV 81 Channel.', 'Rp 320.000/bulan', 'exclude', '2P'),
(14, 'Paket Digital JITU 1 30 Mbps', 'Cocok digunakan untuk maks 3 perangkat, promo biaya pasang menjadi Rp50.000 (Normal Rp500.000), kecepatan internet hingga 30 Mbps, paket TV 81 Channel, paket sudah termasuk IndiHome TV dan Disney+Hotstar. ', 'Rp 340.000/bulan', 'exclude', '2P'),
(15, 'Paket IndiHome Netflix 2P-TV 30 Mbps', 'Cocok digunakan untuk maks 3 perangkat, promo biaya pasang menjadi Rp50.000 (Normal Rp500.000), kecepatan internet hingga 30 Mbps, paket TV 28 Channel, paket sudah termasuk IndiHome TV dan Netflix. ', 'Rp 365.000/bulan', 'exclude', '2P'),
(16, 'Paket Digital JITU 1 30 Mbps', 'Cocok digunakan untuk maks 3 perangkat, promo biaya pasang menjadi Rp50.000 (Normal Rp500.000), kecepatan internet hingga 30 Mbps, paket TV 81 Channel, Minipack Big Combo List Channel, paket sudah termasuk IndiHome TV.', 'Rp 370.000/bulan', 'exclude', '2P'),
(17, 'Paket IndiHome Netflix 2P-TV 30 Mbps', 'Cocok digunakan untuk maks 3 perangkat, promo biaya pasang menjadi Rp50.000 (Normal Rp500.000), kecepatan internet hingga 30 Mbps, paket sudah termasuk IndiHome TV, Disney+Hotstar dan Netflix, paket TV 28 Channel. ', 'Rp 385.000/bulan', 'exclude', '2P'),
(18, 'Paket IndiHome Gamer 2P-TV 30 Mbps', 'Cocok digunakan untuk maks 3 perangkat, promo biaya pasang menjadi Rp50.000 (Normal Rp500.000), kecepatan internet hingga 30 Mbps, paket TV 28 Channel, paket sudah termasuk IndiHome TV dan GameQoo.', 'Rp 399.000/bulan', 'exclude', '2P'),
(19, 'Paket Digital JITU 1 30 Mbps', 'Cocok digunakan untuk maks 3 perangkat, promo biaya pasang menjadi Rp50.000 (Normal Rp500.000), kecepatan internet hingga 30 Mbps, paket TV 81 Channel, Minipack Big Combo List Channel, paket sudah termasuk IndiHome TV, Catchplay+, Disney+Hotstar dan WeTV. ', 'Rp 455.000/bulan', 'exclude', '2P'),
(20, 'Paket IndiHome Netflix 2P-TV 50 Mbps', 'Cocok digunakan untuk maksimal 5 perangkat, bebas biaya pasang (Normal Rp 500.000), kecepatan internet hingga 50 Mbps, paket TV 20 Channel, paket sudah termasuk IndiHome TV, Disney+Hotstar dan Netflix.', 'Rp 460.000/bulan', 'exclude', '2P'),
(21, 'Paket Digital JITU 50 Mbps', 'Cocok digunakan untuk maksimal 5 perangkat, bebas biaya pasang (Normal Rp 500.000), kecepatan internet hingga 50 Mbps, paket sudah termasuk IndiHome TV, Catchplay+, Disney+Hotstar dan WeTV, paket TV 81 Channel.', 'Rp 475.000/bulan', 'exclude', '2P'),
(22, 'Paket Digital JITU 1 50 Mbps', 'Cocok digunakan untuk maksimal 5 perangkat, bebas biaya pasang (Normal Rp 500.000), kecepatam internet hingga 50 Mbps, paket TV 81 Channel, Minipack Big Combo, paket sudah termasuk IndiHome TV, Catchplay+, Vidio, Disney+Hotstar dan WeTV.', 'Rp 505.000/bulan', 'exclude', '2P'),
(23, 'Paket Digital JITU 1 100 Mbps ', 'Cocok digunakan untuk maksimal 10 perangkat, bebas biaya pasang (Normal Rp 500.000), kecepatan internet hingga 100 Mbps, paket TV 81 Channel, paket sudah termasuk IndiHome TV, Catchplay, Disney+Hotstar dan WeTV.', 'Rp 530.000/bulan', 'exclude', '2P'),
(24, 'Paket IndiHome Netflix 2P-TV 100 Mbps  ', 'Cocok digunakan untuk maksimal 10 perangkat, bebas biaya pasang (Normal Rp 500.000), kecepatan internet hingga 100 Mbps, paket TV 28 Channel, paket sudah termasuk IndiHome TV, Disney+Hotstar dan Netflix. ', 'Rp 555.000/bulan', 'exclude', '2P'),
(25, 'Paket Complete 2P 50 Mbps  ', 'Cocok digunakan untuk maks 5 perangkat, bebas biaya pasang (Normal Rp 500.000), kecepatan internet hingga 50 Mbps, paket TV 81 Channel, Minipack Big Combo List Channel, paket sudah termasuk IndiHomeTV, Catchplay+, Vidio, Disney+Hotstar dan WeTV. ', 'Rp 620.000/bulan', 'exclude', '2P'),
(26, 'Paket Complete 2P 100 Mbps', 'Cocok digunakan untuk maksimal 10 perangkat, bebas biaya Pasang (Normal Rp 500.000), kecepatan internet hingga 100 Mbps, kuota keluarga 15GB untuk 6 nomor, 30 menit voice & 30 SMS seluruh operator, unimited voice & SMS sesama member, kuota Orbit 20GB (belum termasuk modem Orbit Rp 425.000), paket TV 81 Channel, paket sudah termasuk IndiHomeTV, Catchplay+, Vidio, Mola, MAXStream, Disney+Hotstar dan WeTV.', 'Rp 730.000/bulan', 'exclude', '2P'),
(27, 'Paket Digital JITU 1 30 Mbps', 'Cocok digunakan untuk maksimal 3 perangkat, bebas biaya pasang (Normal Rp 500.000), kecepatan internet hingga 30 Mbps.', 'Rp 285.000/bulan', 'exclude', '2P'),
(28, 'Paket Digital JITU 1 30 Mbps', 'Cocok digunakan untuk maksimal 3 perangkat, promo biaya pasang menjadi Rp50.000 (Normal Rp 500.000), kecepatan internet hingga 30 Mbps, telepon rumah 100 menit, paket sudah termasuk Disney+Hotstar. ', 'Rp 300.000/bulan', 'exclude', '2P'),
(29, 'Paket IndiHome Gamer 2P-Phone 30 Mbps', 'Cocok digunakan untuk maksimal 30 perangkat, promo biaya pasang menjadi Rp50.000 (Normal Rp 500.000), kecepatan internet hingga 30 Mbps, telepon rumah 100 menit, paket sudah termasuk GameQoo.', 'Rp 375.000/bulan', 'exclude', '2P'),
(30, 'Paket Digital JITU 1 50 Mbps', 'Cocok digunakan untuk maksimal 5 perangkat, bebas biaya pasang (Normal Rp 500.000), kecepatan internet hingga 50 Mbps, telepon rumah 100 menit, paket sudah termasuk IndiHome TV dan Disney+Hotstar. ', 'Rp 350.000/bulan', 'exclude', '2P'),
(31, 'Paket Digital JITU 1 100 Mbps', 'Cocok digunakan untuk maksimal 10 perangkat, bebas biaya pasang (Normal Rp 500.000), kecepatan internet hingga 100 Mbps, telepon rumah 100 menit, paket sudah termasuk IndiHome TV dan Disney+Hotstar. ', 'Rp 410.000/bulan', 'exclude', '2P'),
(32, 'Paket IndiHome Gamer 2P-Phone 50 Mbps', 'Cocok digunakan untuk maksimal 5 perangkat, bebas biaya pasang (Normal Rp 500.000), kecepatan internet hingga 50 Mbps, telepon rumah 100 menit, paket sudah termasuk Disney+Hotstar, gameQoo, Pijar dan Langit  Musik. ', 'Rp 545.000/bulan', 'exclude', '2P'),
(33, 'Paket IndiHome Gamer 2P-Phone 100 Mbps', 'Cocok digunakan untuk maksimal 10 perangkat, bebas biaya pasang (Normal Rp 500.000), kecepatan internet hingga 100 Mbps, telepon rumah 100 menit, paket sudah termasuk Disney+Hotstar, gameQoo, Pijar dan Langit Musik. ', 'Rp 895.000/bulan', 'exclude', '2P'),
(34, 'Paket Digital JITU 1 30 Mbps', 'Cocok digunakan untuk maksimal 3 perangkat, bebas biaya pasang (Normal Rp 500.000), kecepatan internet hingga 100 Mbps, paket TV 81 Channel, telepon rumah 100 menit.', 'Rp 340.00/bulan', 'exclude', '3P'),
(35, 'Paket Digital JITU 1 30 Mbps', 'Cocok digunakan untuk maksimal 3perangkat, promo biaya pasang menjadi Rp50.000 (Normal Rp 500.000), kecepatan internet hingga 30 Mbps, paket TV 81 Channel, paket sudah termasuk IndiHome TV dan Disney+Hotstar.', 'Rp 360.00/bulan', 'exclude', '3P'),
(36, 'Paket Digital JITU 1 30 Mbps', 'Cocok digunakan untuk maksimal 3 perangkat, promo biaya pasang menjadi Rp50.000 (Normal Rp 500.000), kecepatan internet hingga 50 Mbps, paket TV 81 Channel, Minupack Big Combo List Channel, telepon rumah 100 menit, paket sudah termasuk IndiHome TV.', 'Rp 390.000/bulan', 'exclude', '3P'),
(37, ' Paket IndiHome Netflix 3P 30 Mbps', 'Cocok digunakan untuk maksimal 3 perangkat, promo biaya pasang menjadi Rp50.000 (Normal Rp 500.000), kecepatan internet hingga 30 Mbps, paket TV 81 Channel, telepon rumah 50 menit, paket sudah termasuk IndiHome TV dan Netflix. ', 'Rp 410.00/bulan', 'exclude', '3P'),
(38, 'Paket IndiHome Netflix 3P 30 Mbps', 'Cocok digunakan untuk maksimal 3 perangkat, bebas biaya pasang (Normal Rp 500.000), kecepatan internet hingga 30 Mbps, paket TV 81 Channel, telepon rumah 50 menit, paket sudah termasuk IndiHome TV, Disney+Hotstar dan Netflix. ', 'Rp 430.00/bulan', 'exclude', '3P'),
(39, 'Paket Digital JITU 1  30 Mbps', 'Cocok digunakan untuk maksimal 3 perangkat, promo biaya pasang menjadi Rp50.000 (Normal Rp 500.000), kecepatan internet hingga 30 Mbps, paket TV 81 Channel, Minupack Big Combo List Channel, telepon rumah 100 menit, paket sudah termasuk IndiHome TV, Disney+Hotstar, Catchplay+, Vidio, WeTV.', 'Rp 475.000/bulan', 'exclude', '3P'),
(40, 'Paket Digital JITU 1 50 Mbps', 'Cocok digunakan untuk maksimal 5 perangkat, bebas biaya pasang (Normal Rp 500.000), kecepatan internet hingga 50 Mbps, paket TV 81 Channel, telepon rumah 100 menitPaket sudah termasuk IndiHome TV, Catchplay+, Disney+Hotstar dan WeTV.', 'Rp 495.000/bulan', 'exclude', '3P'),
(41, 'Paket IndiHome Netfix 3P 50 Mbps', 'Cocok digunakan untuk maksimal 5 perangkat, bebas biaya pasang (Normal Rp 500.000), kecepatan internet hingga 50 Mbps, paket TV 81 Channel, telepon rumah 100 menit, paket sudah termasuk IndiHome TV, Disney+Hotstar dan Netflix.', 'Rp 505.000/bulan', 'exclude', '3P'),
(42, 'Paket Digital JITU 1 50 Mbps', 'Cocok digunakan untuk maksimal 5 perangkat, bebas biaya pasang (Normal Rp 500.000), kecepatan internet hingga 50 Mbps, paket TV 81 Channel, Minipack Big Combo List Channel, telepon rumah 100 menit, paket sudah termasuk IndiHome TV, Catchplay+, Disney+Hotstar, Vidio dan WeTV.', 'Rp 515.000/bulan', 'exclude', '3P'),
(43, 'Paket Digital JITU 1 100 Mbps', 'Cocok digunakan untuk maksimal 10 perangkat, bebas biaya pasang (Normal Rp 500.000), kecepatan internet hingga 100 Mbps, paket TV 81 Channel, telepon rumah 100 menit, paket sudah termasuk IndiHome TV, Catchplay+, Disney+Hotstar dan WeTV. ', 'Rp 550.00/bulan', 'exclude', '3P'),
(44, 'Paket IndiHome Netflix 3P 100 Mbps', 'Cocok digunakan untuk maksimal 10 perangkat, bebas biaya pasang (Normal Rp 500.000), kecepatan internet hingga 100 Mbps, paket TV 81 Channel, paket sudah termasuk IndiHome TV, Disney+Hotstar dan Netflix.', 'Rp 590.00/bulan', 'exclude', '3P'),
(45, 'Paket IndiHome Gamer 3P 50 Mbps', 'Cocok digunakan untuk maksimal 5 perangkat, bebas biaya pasang (Normal Rp 500.000), kecepatan internet hingga 50 Mbps, paket TV 81 Channel, telepon rumah 100 menit, paket sudah termasuk IndiHome TV, Disney+Hotstar, gameQoo, Pijar dan Langit Musik.', 'Rp 615.000/bulan', 'exclude', '3P'),
(46, 'Paket IndiHome Gamer 3P 100 Mbps', 'Cocok digunakan untuk maksimal 10 perangkat, bebas biaya pasang (Normal Rp 500.000), kecepatan internet hingga 100 Mbps, paket sudah termasuk IndiHome TV, Disney+Hotstar, gameQoo, Pijar dan Langit Musik, paket TV 81 Channel, telepon rumah 100 menit.', 'Rp 965.000/bulan', 'exclude', '3P'),
(84, 'Eznet', 'Internetan di rumah kini makin mudah dan murah! Mulai dari Rp170.000 saja, bisa internetan 10Mbps sekeluarga. Untuk berlangganan, hubungi agen sales Telkomsel atau kunjungi GraPARI terdekat.', 'Rp 170.000/bulan', 'exclude', 'EZnet'),
(94, 'Orbit Home 120GB', 'Kecepatan 10 Mbps', 'Rp. 175.000/bulan', 'exclude', 'Orbit Home'),
(95, 'Orbit Home 170GB', 'Kecepatan 20 Mbps', 'Rp. 235.000/bulan', 'exclude', 'Orbit Home'),
(96, 'Orbit Home 220GB', 'Kecepatan 20 Mbps', 'Rp 290.000/bulan', 'exclude', 'Orbit Home'),
(97, 'Orbit Home 270GB', 'Kecepatan 20 Mbps', 'Rp 355.000/bulan', 'exclude', 'Orbit Home'),
(98, 'Orbit Home 470GB', 'Kecepatan 30 Mbps', 'Rp 595.000/bulan', 'exclude', 'Orbit Home');

-- --------------------------------------------------------

--
-- Table structure for table `sf_members`
--

CREATE TABLE `sf_members` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `whatsapp` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sf_members`
--

INSERT INTO `sf_members` (`id`, `name`, `whatsapp`, `photo`) VALUES
(9, 'Harri Kurnia Muhammad', '+6282287077361', 'uploads/Harri.jpeg'),
(13, 'Muhammad Rafli', '082260413032', 'uploads/Rafli.jpeg'),
(14, 'Rifky Gusti Randa', '081267146530', 'uploads/Rifqi.jpeg'),
(15, 'Ivan Kurniawan', '082287534656', 'uploads/Ivan.jpeg'),
(16, 'Diva Raynaldi Philip', '081374920485', 'uploads/Diva.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(4, 'Annisa', '125'),
(22, 'Siska', '123'),
(24, 'Jeky', '124');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sf_members`
--
ALTER TABLE `sf_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `sf_members`
--
ALTER TABLE `sf_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

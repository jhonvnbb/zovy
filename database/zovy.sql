-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2024 at 05:23 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zovy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'jhonvnbb', 'jhonvnbb');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `model` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `model`, `harga`, `stok`, `deskripsi`, `gambar`) VALUES
(16, 'Tissot Heritage Visodate', 29000000, 13, 'Jam tangan retro yang terinspirasi dari desain tahun 1950-an, tetapi tetap dengan sentuhan modern. Merupakan pilihan yang sangat baik bagi mereka yang menginginkan jam tangan klasik dengan harga yang terjangkau.', '../upload-barang/jam6.png'),
(17, 'Rolex Submariner', 128299000, 3, 'Jam tangan ikonik dengan desain tahan air yang klasik, cocok untuk kegiatan menyelam maupun kegiatan sehari-hari. Menggabungkan keanggunan dan ketahanan dalam satu paket.', '../upload-barang/jam1.png'),
(19, 'Omega Speedmaster Professional Moonwatch', 80199000, 7, 'Sebuah legenda dalam dunia jam tangan, terkenal karena menjadi jam pertama yang dipakai di bulan. Desain klasik dan ketepatan waktu yang tinggi membuatnya menjadi favorit para kolektor.', '../upload-barang/jam2.png'),
(23, 'Tag Heuer Carrera', 48121000, 9, 'Jam tangan sporty dengan desain yang elegan dan teknologi inovatif. Didesain untuk kecepatan dan performa, cocok bagi pecinta otomotif dan aktivitas sehari-hari yang dinamis.', '../upload-barang/jam3.png'),
(24, 'Seiko Prospex Diver', 4800000, 27, 'Jam tangan selam yang tangguh dan handal dengan harga terjangkau. Dilengkapi dengan fitur-fitur khusus untuk kegiatan menyelam dan desain yang stylish untuk penggunaan sehari-hari.', '../upload-barang/jam4.png'),
(26, 'Breitling Navitimer', 72400000, 5, 'Jam tangan klasik yang dirancang khusus untuk penerbangan, dilengkapi dengan fitur-fitur seperti slide rule yang berguna untuk navigasi udara. Dikenal akan kehandalannya dan desain yang timeless.', '../upload-barang/jam5.png'),
(27, 'Richard Mille RM 011 Felipe Massa', 49199000, 7, 'Koleksi jam yang terkenal dengan tema kecepatan dan balapan, mengambil inspirasi dari balapan jalan raya Carrera Panamericana. Diluncurkan pada tahun 1965-an, koleksi Carrera telah menjadi sinonim dengan akurasi, gaya, dan desain inovatif.', '../upload-barang/jam7.png'),
(33, 'Audemars Piguet Royal Oak Offshore Chronograph', 52199000, 5, 'Jam tangan ini dikenal dengan desainnya yang maskulin dan sporty. Terbuat dari berbagai bahan termasuk emas, titanium, dan keramik. Memiliki fitur kronograf dan tahan air hingga kedalaman 100 meter.', '../upload-barang/jam8.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

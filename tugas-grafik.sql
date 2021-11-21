-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2021 at 04:39 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas-grafik`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pjl_produk`
--

CREATE TABLE `tbl_pjl_produk` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `terjual` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pjl_produk`
--

INSERT INTO `tbl_pjl_produk` (`id`, `nama_produk`, `terjual`, `created_at`, `updated_at`) VALUES
(1, 'Baju Gambar 1', 495, '2021-11-08 14:48:57', '2021-11-08 10:48:03'),
(2, 'Baju Gambar 2', 377, '2021-11-08 14:49:04', '2021-11-08 10:48:09'),
(3, 'Baju Gambar 3', 150, '2021-11-08 15:22:18', '2021-11-08 10:48:19'),
(4, 'Baju Gambar 4', 389, '2021-11-08 15:22:29', '2021-11-08 10:48:24'),
(5, 'Baju Gambar 5', 100, '2021-11-08 15:22:36', '2021-11-08 10:48:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_pjl_produk`
--
ALTER TABLE `tbl_pjl_produk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_pjl_produk`
--
ALTER TABLE `tbl_pjl_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

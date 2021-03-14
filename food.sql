-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2021 at 04:07 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uts_pemweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `nama` varchar(120) NOT NULL,
  `tipe` varchar(120) NOT NULL,
  `harga` varchar(120) NOT NULL,
  `foto` varchar(1200) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`nama`, `tipe`, `harga`, `foto`, `description`) VALUES
('Brownies with Nuts', 'Brownies', 'Rp. 100000 (Per Pax)', '/uts/asset/CE1192.png', 'Chocolate Brownies made with Belgian chocolate and some almond nuts.'),
('Chocolate Glaze Tart', 'Cakes', 'Rp. 350000', '/uts/asset/Portrait_CE_0742.png', 'Chocolate tart with a gingerbread base, coated with dark chocolate.'),
('Chocolate Heart', 'Chocolate', 'Rp. 65000', '/uts/asset/Crimson_and_White_Choco.png', 'A simple chocolate heart made with love for your special one.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

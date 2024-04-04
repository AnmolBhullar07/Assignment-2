-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2024 at 08:33 AM
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
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `footwears`
--

CREATE TABLE `footwears` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `footwears`
--

INSERT INTO `footwears` (`id`, `name`, `price`) VALUES
(1, 'Sneakers', '99.99'),
(2, 'Sandals', '49.99'),
(3, 'Boots', '129.99'),
(4, 'Flats', '79.99'),
(5, 'Heels', '89.99'),
(6, 'Athletic Shoes', '119.99'),
(7, 'Loafers', '69.99'),
(8, 'Slides', '59.99'),
(9, 'Oxfords', '109.99'),
(10, 'Espadrilles', '79.99'),
(11, 'Slippers', '39.99'),
(13, 'Shoe', '100.00'),
(14, 'Shoe', '100.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `footwears`
--
ALTER TABLE `footwears`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `footwears`
--
ALTER TABLE `footwears`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2023 at 10:13 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'Raj', '$2y$10$gACRNXFYjZoH5owhvJ84U.k2ONFo0dXY6UHeEEd5ypoLlBMAd7.mi', '2023-02-10 18:30:35'),
(2, 'admin', '$2y$10$RnRY5.Fw6vbgI4/qn0G.BuNUt4Rnt2lK2lFeaRRsMq52zXVRrwA/y', '2023-02-10 18:41:18'),
(3, 'john', '$2y$10$HZyh5skSWM6F2OSh2MvAbO0jn30YW4SAE6GRjoRr/CsO3Q1PDQRFq', '2023-02-10 18:43:57'),
(4, 'seta', '$2y$10$atN2S7ER/LNq.RdeOglsT.Axd9I77UAyrG7EJlDF1fgZajGt3/IUW', '2023-02-10 18:59:52'),
(5, 'raja', '$2y$10$1Dcp5JQXt1/noTPO2O13deHSV1Grv4TClnCagdGjwPdCE97F0Ipi.', '2023-02-16 15:16:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

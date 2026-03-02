-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 02, 2026 at 03:56 PM
-- Server version: 8.0.42-0ubuntu0.20.04.1
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wp_amk1013537`
--

-- --------------------------------------------------------

--
-- Table structure for table `yhteydenotto`
--

CREATE TABLE `yhteydenotto` (
  `id` int NOT NULL,
  `nimi` varchar(100) NOT NULL,
  `sposti` varchar(200) NOT NULL,
  `viesti` text NOT NULL,
  `lahetetty` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `yhteydenotto`
--

INSERT INTO `yhteydenotto` (`id`, `nimi`, `sposti`, `viesti`, `lahetetty`) VALUES
(1, 'Leevi Huhta', 'leevi.huhta@gmail.com', 'Tosi hyvää pizzaa!', '2026-02-19 18:59:09'),
(6, 'Pentti Ojaniemi', 'pentti.ojaniemi@gmail.com', 'Tosi hyvää pizzaa, mutta erittäin ruma sivusto. ', '2026-02-19 19:38:44'),
(7, 'Tuomas', 'tuomas.hartikainen@student.hamk.fi', 'Ihan hyvää oli, mutta tarjoilija kosketteli mun jalkaa oudosti.....', '2026-02-19 19:44:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `yhteydenotto`
--
ALTER TABLE `yhteydenotto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `yhteydenotto`
--
ALTER TABLE `yhteydenotto`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2020 at 07:44 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skillscertif`
--

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id_taches` int(11) NOT NULL,
  `id_u` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `skill01` varchar(255) NOT NULL,
  `skill02` varchar(255) NOT NULL,
  `skill03` varchar(255) NOT NULL,
  `skill04` varchar(255) NOT NULL,
  `skill05` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id_taches`, `id_u`, `nom`, `skill01`, `skill02`, `skill03`, `skill04`, `skill05`) VALUES
(1, 2, 'fahad123', 'Niveau-2', 'Niveau-1', 'Niveau-1', 'Niveau-1', 'Niveau-1'),
(2, 2, 'fahad123', 'Niveau-2', 'Niveau-1', 'Niveau-1', 'Niveau-1', 'Niveau-1'),
(3, 2, 'fahad123', 'Niveau-1', 'Niveau-2', 'Niveau-1', 'Niveau-1', 'Niveau-1'),
(4, 2, 'fahad123', 'Niveau-1', 'Niveau-2', 'Niveau-1', 'Niveau-1', 'Niveau-1'),
(5, 2, 'fahad123', 'Niveau-1', 'Niveau-2', 'Niveau-1', 'Niveau-1', 'Niveau-1'),
(6, 1, 'fahad', 'Niveau-2', 'Niveau-1', 'Niveau-1', 'Niveau-1', 'Niveau-1'),
(7, 1, 'fahad', 'Niveau-2', 'Niveau-1', 'Niveau-1', 'Niveau-1', 'Niveau-1'),
(8, 1, 'fahad', 'Niveau-2', 'Niveau-1', 'Niveau-1', 'Niveau-1', 'Niveau-1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `nom`, `pwd`) VALUES
(1, 'fahad', '$2y$10$KFMzhDq3R.JmwHOSizKduebdaliBcIGQoZT7soRTSdTtVGnsQ5/iO'),
(2, 'fahad123', '$2y$10$M4BBZBZuJRYQL92EPkTTruKbITYd.5tdIKEAOdRx6rrqjeuvLS94a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id_taches`),
  ADD KEY `id_u` (`id_u`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id_taches` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_ibfk_1` FOREIGN KEY (`id_u`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

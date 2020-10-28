-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 06 juin 2020 à 17:11
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `username` varchar(190) NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`) VALUES
(268, 'fahad_altaie@yahoo.com', 'fahad_altaie', '$2y$10$47UxomIi1lw2.CfZRQIke.ZWqNfcu72IYbM54d3ZejOvbw/rlpEDS'),
(269, 'claude@claude', 'claude', '$2y$10$an/81F5L.ZN8.zAX.c7DM.3AI3sOyTstObStriW3AtD89owb3iuwi'),
(271, 'lion_heart10002003@yahoo.com', 'fahad', '$2y$10$uIMAugEnUPjtMtw.aicXD.kf4pB16C3g4NGmjLovwi.sdaDN6HJFC'),
(272, 'ali@ali', 'ali', '$2y$10$gGt5.OYsaMcSctc1MTOPBe1DnWyS1aaeM4XnQ4Y6V6ms0GWE3M94S'),
(273, 'fahad@fahad', 'f', '$2y$10$X5QY3xRx/Wm4FsEbj/yqtepp1Hl/PGO41E9c2/1lX7YTp1CJKyGge'),
(275, 'snake@snake', 'snake', '$2y$10$ebDIbzTOar6Lom3L0NaWmODa7DGnrzro8hbXKglVUyqW/XEEGJuKO'),
(276, 'fahad_altaie@yahoo.co', 'fahad_altaie', '$2y$10$Gx/Gs8z6P2td9q.VUA2J6uMAKEkfNJdf47a9aRc1b4Cr7Z4kMRMDS'),
(277, 'fahad_altaie@yahoo.comsdfsdfsd', 'fahad_altaiesd', '$2y$10$1A9kH7DWQSswUhYGrEjK0etu7fUnrOXTnxj/VvxlRz8pfXelO/56y'),
(278, 'fahad@fahader', 'gt', '$2y$10$Cxs9eLx0pmVTSyhXOynkyebuAg.25FUvDleR//WAy93OxLe8nNJrK'),
(279, 'fahad@fahad234', 'fahad_altaie334', '$2y$10$76frmL5VW0nGoqpqTRUI3OB6r3s0n97dkHAyYxxUUx2CShWwEuT92'),
(280, 'f@f', 'f', '$2y$10$rjZfGPJyZIHABRJ5.Z8ilejewhqCs0IwXz3MdwEp073QDqMKkEmam'),
(281, 'g@g', 'gege', '$2y$10$wd4GTG5mUD0DRQeqcXCYp.NOBDgQXU0rPZn67ww41DY91sSWmVfSW'),
(282, '', 'gt', '$2y$10$jiSjyAw9u0KbW7d/XcCkKOTuHCxzMFro6OZGZUeNoOBaKSg5k7dd6'),
(283, 'g@gg', 'gg', '$2y$10$91tERGUkHwM3Z0OYmEMjX.AAIMgPMATpb6NaG6.PGQMCaRiUUIJei');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`email`),
  ADD KEY `password` (`password`),
  ADD KEY `snake` (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=284;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

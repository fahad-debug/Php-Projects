-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 04 juin 2020 à 13:48
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `skills-management_project`
--

-- --------------------------------------------------------

--
-- Structure de la table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `nom` varchar(160) NOT NULL,
  `prenom` varchar(160) NOT NULL,
  `skill01` varchar(255) NOT NULL,
  `skill02` varchar(255) NOT NULL,
  `skill03` varchar(255) NOT NULL,
  `skill04` varchar(255) NOT NULL,
  `skill05` varchar(255) NOT NULL,
  `skill06` varchar(255) NOT NULL,
  `skill07` varchar(255) NOT NULL,
  `skill08` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `skills`
--

INSERT INTO `skills` (`id`, `nom`, `prenom`, `skill01`, `skill02`, `skill03`, `skill04`, `skill05`, `skill06`, `skill07`, `skill08`) VALUES
(1, 'Altaie', 'Fahad', 'Niveau-2', 'Niveau-3', 'Niveau-2', 'Niveau-3', 'Niveau-2', 'Niveau-3', 'Niveau-2', 'Niveau-3'),
(2, 'Nicloux', 'Claude', 'Niveau-2', 'Niveau-3', 'Niveau-2', 'Niveau-3', 'Niveau-2', 'Niveau-3', 'Niveau-2', 'Niveau-3'),
(3, 'Paul', 'Robert', 'Niveau-2', 'Niveau-3', 'Niveau-1', 'Niveau-1', 'Niveau-1', 'Niveau-1', 'Niveau-1', 'Niveau-1'),
(4, 'Austin', 'Steve', 'Niveau-2', 'Niveau-3', 'Niveau-1', 'Niveau-1', 'Niveau-1', 'Niveau-1', 'Niveau-1', 'Niveau-1'),
(5, 'Smith', 'John', 'Niveau-1', 'Niveau-2', 'Niveau-3', 'Niveau-1', 'Niveau-2', 'Niveau-3', 'Niveau-1', 'Niveau-2'),
(6, 'Cash', 'Johnny', 'Niveau-1', 'Niveau-2', 'Niveau-1', 'Niveau-3', 'Niveau-1', 'Niveau-2', 'Niveau-1', 'Niveau-3'),
(16, 'Delavega ', 'Don Diego', 'Niveau-3', 'Niveau-1', 'Niveau-2', 'Niveau-1', 'Niveau-2', 'Niveau-1', 'Niveau-3', 'Niveau-1');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

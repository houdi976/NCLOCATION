-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 03 mai 2023 à 12:59
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `nclocation`
--

-- --------------------------------------------------------

--
-- Structure de la table `automobile`
--

CREATE TABLE `automobile` (
  `Immatriculation` varchar(20) NOT NULL,
  `Marque` varchar(50) NOT NULL,
  `Prix_Loc` double NOT NULL,
  `Photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `automobile`
--

INSERT INTO `automobile` (`Immatriculation`, `Marque`, `Prix_Loc`, `Photo`) VALUES
('12HJ572', 'AUDI', 200, 'images/AUDI-A3.jpg'),
('BT059RG', 'NISSAN', 150, 'images/nissanq.jpg'),
('TP045CG', 'TIGUAN', 100, 'images/volkswagen.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `Login` varchar(200) NOT NULL,
  `motPasse` varchar(200) NOT NULL,
  `my.photo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`Login`, `motPasse`, `my.photo`) VALUES
('houdi', '1234', 'images/user.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `automobile`
--
ALTER TABLE `automobile`
  ADD PRIMARY KEY (`Immatriculation`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`Login`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

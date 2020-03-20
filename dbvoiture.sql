-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 20 mars 2020 à 17:20
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dbvoiture`
--

-- --------------------------------------------------------

--
-- Structure de la table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `numGal` int(11) NOT NULL AUTO_INCREMENT,
  `nomGal` longtext DEFAULT NULL,
  `matVoi` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`numGal`),
  KEY `matVoi` (`matVoi`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `gallery`
--

INSERT INTO `gallery` (`numGal`, `nomGal`, `matVoi`) VALUES
(28, 'img/img-5e7394ebf29a08.29298155.jpg', 'lm123456'),
(29, 'img/img-5e7397d775ff01.45727838.jpg', 'fd123456'),
(26, 'img/img-5e7394ebf1db74.24238138.jpg', 'lm123456'),
(27, 'img/img-5e7394ebf24551.58609736.jpg', 'lm123456'),
(25, 'img/img-5e73943d58e612.26569013.jpg', '12345677'),
(24, 'img/img-5e73943d589be1.09347053.jpg', '12345677'),
(23, 'img/img-5e73943d585352.18921213.jpg', '12345677'),
(22, 'img/img-5e73943d580708.49499937.jpg', '12345677'),
(21, 'img/img-5e73943d57aa95.13933110.jpg', '12345677'),
(18, 'img/img-5e7392c94a3616.36925195.jpg', 'mat12345'),
(19, 'img/img-5e7392c94aa5c1.47517934.jpg', 'mat12345'),
(20, 'img/img-5e7392c94afc37.74450171.jpg', 'mat12345'),
(30, 'img/img-5e7397d7767469.46167836.jpg', 'fd123456'),
(31, 'img/img-5e7397d776cd02.21523158.jpg', 'fd123456'),
(32, 'img/img-5e73993194f819.79737817.jpg', 'mat00000'),
(33, 'img/img-5e739a16d2e497.60240008.jpg', 'pg111234'),
(34, 'img/img-5e739a16d35436.47975299.jpg', 'pg111234');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `numUser` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` tinytext NOT NULL,
  `emailUser` tinytext NOT NULL,
  `pwUser` longtext NOT NULL,
  PRIMARY KEY (`numUser`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`numUser`, `idUser`, `emailUser`, `pwUser`) VALUES
(4, 'aziz', 'aziz@aziz.com', '$2y$10$qWYTuCjPtXBFNSRFAXWdL.J/aAAjtMgL4Kpq7BYkl7SmDGZBBFq0K'),
(1, 'admin', 'benmahmoud.aziz121@gmail.com', '$2y$10$rbP8jOfe/Qi7.I8/47RaNeg6qVg2VPEoMCGpD3Xl4J3xq5/SQ1n0.'),
(5, 'amine', 'amine@amine.amine', '$2y$10$zkrjoEnXHoZy7ssFi33XLeLlguWuYKQSlbGdwWINCOHWrSEb07iW6'),
(6, 'ismail', 'ismail@ismail.ismail', '$2y$10$sFbPu/i2tQc4sJh9j6o0Pu5EDloKXbusNgOWal7S2Y7K1.1ouCafe'),
(7, 'moslem', 'moslem@moslem.moslem', '$2y$10$QbFb8TV2Gv.jsUTOZ1mpieH.tNyhxeVGr2rDHwY4K2yidDU3DxWbm'),
(8, 'bohmid', 'ahmed@ahmed.com', '$2y$10$s8uUtOOIpBxT3L9q8G0sl.303./ix01TylwA8azRBlsfujeZOr6A.'),
(9, 'hamma', 'hamma@gmail.com', '$2y$10$caGzr2yKC0x1n7NTl0mZcO0BGFTAlZi2Akyw/U7zBjU5dKx32nYqG');

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

DROP TABLE IF EXISTS `voiture`;
CREATE TABLE IF NOT EXISTS `voiture` (
  `matVoi` varchar(10) NOT NULL,
  `libVoi` tinytext DEFAULT NULL,
  `prixVoi` int(15) DEFAULT 0,
  `kmVoi` int(15) DEFAULT 0,
  `anneeVoi` int(4) DEFAULT NULL,
  `locVoi` tinytext DEFAULT NULL,
  `descVoi` longtext DEFAULT NULL,
  `numUser` int(11) DEFAULT NULL,
  PRIMARY KEY (`matVoi`),
  KEY `numUser` (`numUser`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `voiture`
--

INSERT INTO `voiture` (`matVoi`, `libVoi`, `prixVoi`, `kmVoi`, `anneeVoi`, `locVoi`, `descVoi`, `numUser`) VALUES
('mat00000', 'peugeot 2016 2008 noir', 40000, 2300, 2019, 'Tunisie Manouba', 'nouvelle voiture sans aucun problÃ¨me avec options gps integrÃ© ', 6),
('AZER0000', 'Renault Clio bon Ã©tat', 15000, 5000, 2018, 'Tunis Manouba', 'num:55000123', 4),
('12345677', 'Peugeot 308 grise', 50000, 1200, 2015, 'Tunis Manouba', 'bon Ã©tat num:25001234', 1),
('lm123456', '2010 lamborghini gallardo for sale blanche', 800000, 55120, 2010, 'Tunisie Ariana', 'Lamborghini sport a vendre pour plus d\'info contacter le 55123456', 1),
('mat12345', 'Renault symbole en bon Ã©tat', 15000, 50000, 2016, 'Tunis Sidi el Bachir', 'Symbole nouvelle en bon Ã©tat tout option\r\ntÃ©l:25000123', 1),
('fd123456', 'ford fiesta 1998', 16000, 555660, 1999, 'Tunisie Bizerte', 'ancienne mais en bon Ã©tat contacter le 99456123 si vous voulez en savoir plus', 6),
('pg111234', 'Peugeot 206', 14500, 90000, 2008, 'Tunisie Tunis centre ville', '2008 gris a vendre tel:23123456', 7);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

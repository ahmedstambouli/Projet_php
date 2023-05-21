-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 21 mai 2023 à 11:43
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `agence_voiyage`
--

-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

DROP TABLE IF EXISTS `agence`;
CREATE TABLE IF NOT EXISTS `agence` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(255) DEFAULT NULL,
  `LOCALISATION` varchar(255) DEFAULT NULL,
  `PHONE_NUMBER` varchar(15) NOT NULL,
  `CONTACT` varchar(255) DEFAULT NULL,
  `PHOTO` varchar(255) DEFAULT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `agence`
--

INSERT INTO `agence` (`ID`, `NAME`, `LOCALISATION`, `PHONE_NUMBER`, `CONTACT`, `PHOTO`, `EMAIL`, `PASSWORD`) VALUES
(40, 'ahmed ', 'GHAR EL MELH', '53804490', 'ahmed@mail.com', 'moi.jpg', 'ahmed.stambouli98@gmail.com', '123456'),
(42, 'aziz', 'bizert', '50804490', 'aziz@gmail.com', 'moi.jpg', 'aziz@gmail.com', '123456789');

-- --------------------------------------------------------

--
-- Structure de la table `conatctuser`
--

DROP TABLE IF EXISTS `conatctuser`;
CREATE TABLE IF NOT EXISTS `conatctuser` (
  `id` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `id_user` int(255) NOT NULL,
  `id_voiture` int(255) NOT NULL,
  `nbjoure` int(255) NOT NULL,
  `prixtotal` int(255) NOT NULL,
  `etat` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_voiture` (`id_voiture`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `id_user`, `id_voiture`, `nbjoure`, `prixtotal`, `etat`) VALUES
(12, 10, 3, 7, 100, 'true'),
(13, 10, 3, 7, 100, 'true'),
(14, 10, 4, 28, 1850, 'true'),
(15, 10, 4, 14, 25900, 'false'),
(16, 16, 1, 21, 315000, 'true');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `FULLNAME` varchar(50) NOT NULL,
  `SEXE` char(1) NOT NULL,
  `PHONE_NUMBER` varchar(15) NOT NULL,
  `COMPANY` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `PHOTO` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`ID`, `FULLNAME`, `SEXE`, `PHONE_NUMBER`, `COMPANY`, `EMAIL`, `PASSWORD`, `PHOTO`) VALUES
(10, 'ahmed', 'M', '20804490', 'ghar el meleh', 'ahmed.stambouli98@gmail.com', '123456', 'moi.jpg'),
(12, 'ahmed massoudi', 'M', '95804490', 'bb', 'mesmes@gmail.com', '123456', 'moi.jpg'),
(14, 'ali chlaifa', 'W', '95338900', 'ghar el meleh', 'alichlaifa66@gmail.com', '123456', ''),
(15, 'AZIZ STANBOULI', 'M', '53804490', 'bizert', 'aziz@mail.com', '123456789', 'logo.webp'),
(16, 'ahmed stambouli', 'M', '53804490', 'ghar el meleh', 'stambouli@gmail.com', '123456', 'moi.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

DROP TABLE IF EXISTS `voiture`;
CREATE TABLE IF NOT EXISTS `voiture` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `matricule` varchar(255) NOT NULL,
  `marque` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `prix` int(20) NOT NULL,
  `nbvoiture` int(20) NOT NULL,
  `id_agence` int(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_agence` (`id_agence`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `voiture`
--

INSERT INTO `voiture` (`id`, `matricule`, `marque`, `photo`, `prix`, `nbvoiture`, `id_agence`) VALUES
(1, '148TN1470', 'BMW X5', 'voiture1.jpg', 15000, 2, 40),
(3, '148TN1474', 'BMW X5', 'voiture2.jpg', 100, 1, 40),
(4, '148TN1471', 'BMW X6', 'voiturebmw3.jpg', 1850, 3, 40),
(5, '148TN1472', 'BMW X4', 'voiture4.jpg', 1200, 1, 40),
(7, '148TN1480', 'BMW X10', 'voiture 5.jpg', 1580, 1, 40),
(8, '150TN14800', 'BMW X1', 'voiture3.jpg', 1500, 1, 42);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `conatctuser`
--
ALTER TABLE `conatctuser`
  ADD CONSTRAINT `conatctuser_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`id_voiture`) REFERENCES `voiture` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `voiture`
--
ALTER TABLE `voiture`
  ADD CONSTRAINT `voiture_ibfk_1` FOREIGN KEY (`id_agence`) REFERENCES `agence` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

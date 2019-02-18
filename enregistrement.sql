-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 01 août 2018 à 06:46
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `enregistrement`
--

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

DROP TABLE IF EXISTS `personne`;
CREATE TABLE IF NOT EXISTS `personne` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `cin` varchar(12) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7696 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`id`, `nom`, `prenom`, `adresse`, `cin`, `pseudo`, `password`) VALUES
(9, 'Dupont', 'Jean', 'Rue du Paradis', '123456789012', 'JDup', 'mdp'),
(10, 'Jackson', 'Michael', 'Unit State', '555555555555', 'MJ', 'mdp'),
(11, 'Ramora', 'Favoris', 'Tana', '454511', 'Ramora Favoris', 'mdp'),
(14, 'ytre', 'tre', 'terze', 'egrzfe', 'fdeg', 'mdp'),
(7694, 'f', 'f', 'f', 'f', 'MR', 'mdp'),
(7695, 'Uzumaki', 'Naruto', 'Konoha', '0', 'Naruto', 'mdp'),
(7693, 'h', 'f', 'f', 'f', 'f', 'f');

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

DROP TABLE IF EXISTS `voiture`;
CREATE TABLE IF NOT EXISTS `voiture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marque` varchar(255) NOT NULL,
  `modele` varchar(255) NOT NULL,
  `immatriculation` varchar(255) NOT NULL,
  `id_personne` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `voiture`
--

INSERT INTO `voiture` (`id`, `marque`, `modele`, `immatriculation`, `id_personne`) VALUES
(1, 'Peugeot', '206', '7777MA', 9),
(2, 'Peogeot', '205', '6666MA', 9),
(3, 'Toyota', 'Blabla', '1234WW', 10),
(4, '4L', 'Petit', '1111TAV', 11),
(5, '4L ', 'Grand', '2222YES', 11),
(6, 'f', 'f', 'f', 8),
(36, 'd', 'd', 'd', 10),
(8, 'd', 'd', 'd', 9),
(45, 'f', 'f', 'f', 11),
(13, 's', 's', 's', 8),
(37, 'd', 'd', 'd', 9),
(21, 'g', 'g', 'g', 10),
(44, 'f', 'f', 'f', 10),
(39, 'd', 'd', 'd', 10),
(40, 'd', 'd', 'd', 11),
(41, 'h', 'h', 'h', 10),
(42, 'g', 'g', 'g', 10),
(43, 'f', 'f', 'f', 7693),
(46, 'f', 'f', 'f', 10),
(47, 'f', 'f', 'f', 10),
(48, 'f', 'f', 'f', 10),
(50, 'd', 'd', 'd', 10),
(52, 'f', 'f', 'f', 10);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

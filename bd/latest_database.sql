-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 18 avr. 2020 à 21:48
-- Version du serveur :  8.0.18
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
-- Base de données :  `db_web`
--
CREATE DATABASE IF NOT EXISTS `db_web` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `db_web`;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `message` varchar(100) DEFAULT NULL,
  `user` varchar(100) NOT NULL,
  `publication` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`message`, `user`, `publication`, `date`) VALUES
('ouh', 'Coby', 'img/tilleul-arbre.jpg', '2020-04-18 00:00:00'),
('oké', 'Coby', 'img/tilleul-arbre.jpg', '2020-04-18 15:01:39'),
('gg', 'Coby', 'uploads/5e99c6296cb42Forza3.jpg', '2020-04-18 18:50:01'),
('gg', 'Coby', 'uploads/5e99c6296cb42Forza3.jpg', '2020-04-18 18:51:13'),
('test\r\n', 'Coby', 'uploads/5e9b6c516ae8fTEEEST.jpg', '2020-04-18 23:26:05'),
('test', 'defaut', 'uploads/5e9b6c516ae8fTEEEST.jpg', '2020-04-18 23:24:03'),
('test', 'defaut', 'img/tilleul-arbre.jpg', '2020-04-18 20:47:08');

-- --------------------------------------------------------

--
-- Structure de la table `jaime`
--

DROP TABLE IF EXISTS `jaime`;
CREATE TABLE IF NOT EXISTS `jaime` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_article` int(11) NOT NULL,
  `id_personne` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `jaime`
--

INSERT INTO `jaime` (`id`, `id_article`, `id_personne`) VALUES
(9, 6, 0),
(10, 1, 0),
(16, 9, 0),
(21, 14, 0);

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

DROP TABLE IF EXISTS `personne`;
CREATE TABLE IF NOT EXISTS `personne` (
  `nomUtilisateur` varchar(100) DEFAULT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `dtN` date DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `mdp` varchar(100) DEFAULT NULL,
  `photoProfil` varchar(100) DEFAULT NULL,
  UNIQUE KEY `nomUtilisateur` (`nomUtilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`nomUtilisateur`, `nom`, `prenom`, `dtN`, `mail`, `mdp`, `photoProfil`) VALUES
('Coby', 'Coby', 'Bernard', '1968-08-10', 'sollicitudin@MaurismagnaDuis.com', 'Coby', 'img/pp.png'),
('Fulton', 'Fulton', 'Zachery', '2002-12-30', 'in@rutrum.com', 'Fulton', 'img/pp.png'),
('Timon', 'Timon', 'Adrian', '1989-11-11', 'sollicitudin@ultrices.org', 'Timon', 'img/pp.png'),
('Joel', 'Joel', 'Susan', '2001-05-12', 'vel@necmalesuadaut.com', 'Joel', 'img/pp.png'),
('Brooke', 'Brooke', 'Nathan', '1980-06-05', 'neque.Sed@vehicula.edu', 'Brooke', 'img/pp.png'),
('Idona', 'Idona', 'Erin', '1990-05-12', 'diam.eu.dolor@vestibulum.com', 'Idona', 'img/pp.png'),
('Kirk', 'Kirk', 'Amethyst', '2000-01-01', 'Morbi@sociisnatoquepenatibus.ca', 'Kirk', 'img/pp.png'),
('Kieran', 'Kieran', 'Warren', '1960-10-12', 'Quisque@ornareIn.edu', 'Kieran', 'img/pp.png'),
('Quinlan', 'Quinlan', 'Lamar', '1997-04-05', 'dui.Fusce.diam@utsem.ca', 'Quinlan', 'img/pp.png'),
('Hyacinth', 'Hyacinth', 'Stephen', '1968-08-23', 'Quisque.ac@Proinvelit.net', 'Hyacinth', 'img/pp.png');

-- --------------------------------------------------------

--
-- Structure de la table `publication`
--

DROP TABLE IF EXISTS `publication`;
CREATE TABLE IF NOT EXISTS `publication` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nblike` int(100) DEFAULT '0',
  `titre` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `user` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `datepubli` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `publication`
--

INSERT INTO `publication` (`id`, `nblike`, `titre`, `description`, `user`, `photo`, `datepubli`) VALUES
(1, 0, 'test1', 'l\'ecologie c\'est cool', 'Coby', 'img/tilleul-arbre.jpg', '2020-04-18 23:07:54'),
(6, 0, 'test3', 'test3', 'Coby', 'uploads/5e99c26c84375Forza456.jpg', '2020-04-18 23:07:54'),
(9, 0, 'test', 'blabla', 'Coby', 'uploads/5e99c6296cb42Forza3.jpg', '2020-04-18 23:07:54'),
(10, 0, 'dfssds', 'sdsdsd', 'Coby', 'uploads/5e99c65e15464Forza2.jpg', '2020-04-18 23:07:54'),
(11, 0, 'test2', 'sdfds', 'Coby', 'uploads/5e99c690b3de6bmw.jpg', '2020-04-18 23:07:54'),
(8, 0, 'bugatti', 'sd', 'Coby', 'uploads/5e99c56bdc058bugatti_chiron_super_sport_300__prototype_2019_4k_8k-HD.jpg', '2020-04-18 23:07:54'),
(13, 0, 'test log', 'test login', 'Coby', 'uploads/5e9b6aa41b209TEEEST.jpg', '2020-04-18 23:07:54'),
(14, 0, 'test log et date', 'sdsdsdsdsdsdsd', 'Coby', 'uploads/5e9b6c516ae8fTEEEST.jpg', '2020-04-18 23:08:33'),
(15, 0, 'test400', 'test1', 'Coby', 'uploads/5e9b70c4d6d7cTEEEST.jpg', '2020-04-18 23:27:32'),
(16, 0, 'test', 'sd', 'Coby', 'uploads/5e9b713a985f4TEEEST.jpg', '2020-04-18 23:29:30'),
(17, 0, 'test', 'sd', 'Coby', 'uploads/5e9b715d39296TEEEST.jpg', '2020-04-18 23:30:05'),
(18, 0, 'test', 'sd', 'Coby', 'uploads/5e9b71776491bTEEEST.jpg', '2020-04-18 23:30:31'),
(19, 0, 'test', 'sd', 'Coby', 'uploads/5e9b71787f8f9TEEEST.jpg', '2020-04-18 23:30:32'),
(20, 0, 'test', 'sd', 'Coby', 'uploads/5e9b7184c5fb2TEEEST.jpg', '2020-04-18 23:30:44'),
(21, 0, 'test', 'sd', 'Coby', 'uploads/5e9b71b7a85c9TEEEST.jpg', '2020-04-18 23:31:35');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

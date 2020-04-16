-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 16 avr. 2020 à 22:31
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
  UNIQUE KEY `nomUtilisateur` (`nomUtilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`nomUtilisateur`, `nom`, `prenom`, `dtN`, `mail`, `mdp`) VALUES
('Coby', 'Coby', 'Bernard', '1968-08-10', 'sollicitudin@MaurismagnaDuis.com', 'Coby'),
('Fulton', 'Fulton', 'Zachery', '2002-12-30', 'in@rutrum.com', 'Fulton'),
('Timon', 'Timon', 'Adrian', '1989-11-11', 'sollicitudin@ultrices.org', 'Timon'),
('Joel', 'Joel', 'Susan', '2001-05-12', 'vel@necmalesuadaut.com', 'Joel'),
('Brooke', 'Brooke', 'Nathan', '1980-06-05', 'neque.Sed@vehicula.edu', 'Brooke'),
('Idona', 'Idona', 'Erin', '1990-05-12', 'diam.eu.dolor@vestibulum.com', 'Idona'),
('Kirk', 'Kirk', 'Amethyst', '2000-01-01', 'Morbi@sociisnatoquepenatibus.ca', 'Kirk'),
('Kieran', 'Kieran', 'Warren', '1960-10-12', 'Quisque@ornareIn.edu', 'Kieran'),
('Quinlan', 'Quinlan', 'Lamar', '1997-04-05', 'dui.Fusce.diam@utsem.ca', 'Quinlan'),
('Hyacinth', 'Hyacinth', 'Stephen', '1968-08-23', 'Quisque.ac@Proinvelit.net', 'Hyacinth');

-- --------------------------------------------------------

--
-- Structure de la table `publication`
--

DROP TABLE IF EXISTS `publication`;
CREATE TABLE IF NOT EXISTS `publication` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  nblike int(100),
  `titre` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `publication`
--

INSERT INTO `publication` (`id`, `titre`, `description`, `user`, `photo`) VALUES
(1, 'test1', 'l\'ecologie c\'est cool', 'Coby', 'img/tilleul-arbre.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 19 avr. 2020 à 19:50
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
('cool', 'Coby', 'uploads/5e9b9ba04aa85ecologie-ce-quil-faut-savoir-sur-cette-discipline-scientifique.jpg', '2020-04-19 12:59:27'),
('gg', 'Coby', 'uploads/5e99c6296cb42Forza3.jpg', '2020-04-18 18:50:01'),
('gg', 'Coby', 'uploads/5e99c6296cb42Forza3.jpg', '2020-04-18 18:51:13'),
('cool', 'Coby', 'uploads/5e9b9ba04aa85ecologie-ce-quil-faut-savoir-sur-cette-discipline-scientifique.jpg', '2020-04-19 12:59:21'),
('cool', 'Coby', 'uploads/5e9b9ba04aa85ecologie-ce-quil-faut-savoir-sur-cette-discipline-scientifique.jpg', '2020-04-19 12:59:17'),
('cool', 'Coby', 'uploads/5e9b9ba04aa85ecologie-ce-quil-faut-savoir-sur-cette-discipline-scientifique.jpg', '2020-04-19 12:59:13'),
('cool', 'Coby', 'uploads/5e9b9ba04aa85ecologie-ce-quil-faut-savoir-sur-cette-discipline-scientifique.jpg', '2020-04-19 12:59:10'),
('cool', 'Coby', 'uploads/5e9b9ba04aa85ecologie-ce-quil-faut-savoir-sur-cette-discipline-scientifique.jpg', '2020-04-19 12:59:07'),
('c\'est bo', 'Coby', 'uploads/5e9b9ba04aa85ecologie-ce-quil-faut-savoir-sur-cette-discipline-scientifique.jpg', '2020-04-19 12:58:55'),
('test', 'Coby', 'uploads/5e9b9ba04aa85ecologie-ce-quil-faut-savoir-sur-cette-discipline-scientifique.jpg', '2020-04-19 12:58:34'),
('test', 'Joel', 'uploads/5e9b71776491bTEEEST.jpg', '2020-04-19 02:31:03'),
('test', 'Coby', 'uploads/5e9b71b7a85c9TEEEST.jpg', '2020-04-19 02:29:06'),
('test\r\n', 'Coby', 'uploads/5e9b6c516ae8fTEEEST.jpg', '2020-04-18 23:26:05'),
('test', 'defaut', 'uploads/5e9b6c516ae8fTEEEST.jpg', '2020-04-18 23:24:03'),
('test', 'defaut', 'img/tilleul-arbre.jpg', '2020-04-18 20:47:08'),
('dernier', 'Coby', 'uploads/5e9b9ba04aa85ecologie-ce-quil-faut-savoir-sur-cette-discipline-scientifique.jpg', '2020-04-19 12:59:33'),
('ouah', 'Coby', 'uploads/5e9c2fffa5e60photo-gratuite-libre-de-droit-unsplash-1024x683.jpg', '2020-04-19 21:46:37');

-- --------------------------------------------------------

--
-- Structure de la table `jaime`
--

DROP TABLE IF EXISTS `jaime`;
CREATE TABLE IF NOT EXISTS `jaime` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_article` int(11) NOT NULL,
  `nom_personne` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `jaime`
--

INSERT INTO `jaime` (`id`, `id_article`, `nom_personne`) VALUES
(9, 6, ''),
(25, 1, ''),
(16, 9, ''),
(21, 14, ''),
(28, 1, 'coby'),
(30, 26, 'Coby'),
(35, 26, 'Joel'),
(37, 26, 'Fulton'),
(38, 29, 'Fulton'),
(39, 27, 'Fulton'),
(40, 30, 'Fulton');

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
  `photoProfil` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  UNIQUE KEY `nomUtilisateur` (`nomUtilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`nomUtilisateur`, `nom`, `prenom`, `dtN`, `mail`, `mdp`, `photoProfil`) VALUES
('Coby', 'Cobys', 'Bernard', '1968-08-10', 'sollicitudin@MaurismagnaDuis.com', 'Coby', 'uploads/pp/5e9caa3d03914avatar.png'),
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
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `publication`
--

INSERT INTO `publication` (`id`, `nblike`, `titre`, `description`, `user`, `photo`, `datepubli`) VALUES
(30, 0, 'test1', 'test3', 'Fulton', 'uploads/5e9c33e42a1209-4.jpg', '2020-04-19 13:20:04'),
(32, 0, 'test', 'sd', 'Cobys', 'uploads/5e9caabfd1bfcphoto-gratuite-libre-de-droit-unsplash-1024x683.jpg', '2020-04-19 21:47:11'),
(29, 0, 'test2', 'test3', 'Fulton', 'uploads/5e9c33da3fed8images.jpg', '2020-04-19 13:19:54'),
(28, 0, 'test1', 'sd', 'Joel', 'uploads/5e9c3393cd229téléchargement.jpg', '2020-04-19 13:18:43'),
(27, 0, 'bugatti', 'sd', 'Joel', 'uploads/5e9c32900de3cimages (2).jpg', '2020-04-19 13:14:24'),
(26, 0, 'hip', 'hop', 'Joel', 'uploads/5e9c303b0e72bimages-3.jpg', '2020-04-19 13:04:27'),
(25, 0, 'wouah', 'ouf', 'Joel', 'uploads/5e9c3029f3c02images (1).jpg', '2020-04-19 13:04:10'),
(24, 0, 'test', 'blabla', 'Cobys', 'uploads/5e9c2fffa5e60photo-gratuite-libre-de-droit-unsplash-1024x683.jpg', '2020-04-19 13:03:27'),
(31, 0, 'dssdsd', 'sdsddd', 'Fulton', 'uploads/5e9c3898b89e4banque-d-images-gratuites-et-libres-de-droits18-1560x1037.jpg', '2020-04-19 13:40:08');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

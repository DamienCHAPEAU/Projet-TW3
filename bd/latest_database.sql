-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 01 mai 2020 à 22:51
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
-- Structure de la table `abonnement`
--

DROP TABLE IF EXISTS `abonnement`;
CREATE TABLE IF NOT EXISTS `abonnement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userAbonn` varchar(100) NOT NULL,
  `nom_suivi` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `abonnement`
--

INSERT INTO `abonnement` (`id`, `userAbonn`, `nom_suivi`) VALUES
(55, 'Coby', 'Joel'),
(56, 'Coby', 'Fulton'),
(57, 'Joel', 'Coby');

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
('ouahh', 'Coby', 'uploads/5e9df3a783cd7TEEEST.jpg', '2020-04-21 01:45:33'),
('test', 'Coby', 'uploads/5e9caabfd1bfcphoto-gratuite-libre-de-droit-unsplash-1024x683.jpg', '2020-04-20 17:20:36'),
('test', 'Coby', 'uploads/5ea839bdf0cacTEEEST.jpg', '2020-04-28 20:40:39'),
('pas mal', 'Joel', 'uploads/5e9e34fd2610cimages-3.jpg', '2020-04-28 22:34:42'),
('okok', 'Joel', 'uploads/5e9e34fd2610cimages-3.jpg', '2020-04-28 22:34:48');

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
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `jaime`
--

INSERT INTO `jaime` (`id`, `id_article`, `nom_personne`) VALUES
(30, 26, 'Coby'),
(35, 26, 'Joel'),
(37, 26, 'Fulton'),
(38, 29, 'Fulton'),
(39, 27, 'Fulton'),
(40, 30, 'Fulton'),
(65, 43, 'Coby'),
(45, 46, 'Coby'),
(48, 45, 'Coby'),
(49, 48, 'Coby'),
(66, 47, 'Coby'),
(69, 42, 'Coby');

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
  `tagFav` varchar(100) DEFAULT NULL,
  UNIQUE KEY `nomUtilisateur` (`nomUtilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`nomUtilisateur`, `nom`, `prenom`, `dtN`, `mail`, `mdp`, `photoProfil`, `tagFav`) VALUES
('Coby', 'Coby', 'Bernard', '1968-08-10', 'sollicitudin@MaurismagnaDuis.com', 'Coby', 'uploads/pp/5e9caa3d03914avatar.png', NULL),
('Fulton', 'Fulton', 'Zachery', '2002-12-30', 'in@rutrum.com', 'Fulton', 'img/pp.png', NULL),
('Timon', 'Timon', 'Adrian', '1989-11-11', 'sollicitudin@ultrices.org', 'Timon', 'img/pp.png', NULL),
('Joel', 'Joel', 'Susan', '2001-05-12', 'vel@necmalesuadaut.com', 'Joel', 'img/pp.png', NULL),
('Brooke', 'Brooke', 'Nathan', '1980-06-05', 'neque.Sed@vehicula.edu', 'Brooke', 'img/pp.png', NULL),
('Idona', 'Idona', 'Erin', '1990-05-12', 'diam.eu.dolor@vestibulum.com', 'Idona', 'img/pp.png', NULL),
('Kirk', 'Kirk', 'Amethyst', '2000-01-01', 'Morbi@sociisnatoquepenatibus.ca', 'Kirk', 'img/pp.png', NULL),
('Kieran', 'Kieran', 'Warren', '1960-10-12', 'Quisque@ornareIn.edu', 'Kieran', 'img/pp.png', NULL),
('Quinlan', 'Quinlan', 'Lamar', '1997-04-05', 'dui.Fusce.diam@utsem.ca', 'Quinlan', 'img/pp.png', NULL),
('Hyacinth', 'Hyacinth', 'Stephen', '1968-08-23', 'Quisque.ac@Proinvelit.net', 'Hyacinth', 'img/pp.png', NULL);

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
  `lat` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `longitude` varchar(100) DEFAULT NULL,
  `adrrFormated` varchar(100) NOT NULL,
  `nbVue` int(11) NOT NULL DEFAULT '0',
  `Tag` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `publication`
--

INSERT INTO `publication` (`id`, `nblike`, `titre`, `description`, `user`, `photo`, `datepubli`, `lat`, `longitude`, `adrrFormated`, `nbVue`, `Tag`) VALUES
(46, 0, 'test', 'test1', 'Joel', 'uploads/5e9e355d5867dbanque-d-images-gratuites-et-libres-de-droits18-1560x1037.jpg', '2020-04-21 01:50:53', '43.6499685', '1.3740854', 'IUT Toulouse Blagnac, Place Georges Brassens, 31700 Blagnac, France', 4, 'permaculture'),
(45, 0, 'test3', 'sdfds', 'Joel', 'uploads/5e9e34fd2610cimages-3.jpg', '2020-04-21 01:49:17', '43.5557774', '1.4763835', 'Ramonville, Liaison Multimodale Sud-Est, 31520 Ramonville-Saint-Agne, France', 14, 'blablapermaculture'),
(44, 0, 'test', 'test1', 'Joel', 'uploads/5e9e34c965013téléchargement.jpg', '2020-04-21 01:48:25', '43.9186131', '2.1371751', 'Institut national universitaire Jean-François Champollion, Place de Verdun, 81000 Albi, France', 0, NULL),
(42, 0, 'test localisé', 'oké', 'Coby', 'uploads/5e9dd41091a7a9-4.jpg', '2020-04-20 18:55:44', '43.416724', '1.1736801', 'Poucharramet, Muret, France', 42, NULL),
(43, 0, 'test localisé', 'test1', 'Coby', 'uploads/5e9df3a783cd7TEEEST.jpg', '2020-04-20 21:10:31', '43.6044622', '1.4442469', 'Toulouse, France', 32, NULL),
(47, 0, 'sssss', 'ssss', 'Coby', 'uploads/5ea09d1887869TEEEST.jpg', '2020-04-22 21:38:00', '29.5645716', '-95.092753', 'Lyndon B. Johnson Space Center, 2101 NASA Parkway, Clear Lake City, TX 77058, États-Unis', 8, NULL),
(48, 0, 'test', 'test1', 'Coby', 'uploads/5ea839bdf0cacTEEEST.jpg', '2020-04-28 16:12:13', '38.8949855', '-77.0365708', 'Washington, WA, États-Unis', 77, NULL),
(50, 0, 'test tag', 'test1', 'Coby', 'uploads/5eaca7bdcc51aimages (1).jpg', '2020-05-02 00:50:37', '48.7992901', '1.9696843', 'Airbus Group, 78990 Élancourt, France', 0, 'airbus avion');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

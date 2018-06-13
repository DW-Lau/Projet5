-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 13 juin 2018 à 14:57
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet5`
--

-- --------------------------------------------------------

--
-- Structure de la table `avatar`
--

DROP TABLE IF EXISTS `avatar`;
CREATE TABLE IF NOT EXISTS `avatar` (
  `id_avatar` int(11) NOT NULL AUTO_INCREMENT,
  `lien_avatar` text NOT NULL,
  PRIMARY KEY (`id_avatar`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id_comm` int(11) NOT NULL AUTO_INCREMENT,
  `id_poste` int(11) NOT NULL,
  `id_auteurComm` int(11) NOT NULL,
  `contenu_comm` text NOT NULL,
  `status_post` int(2) NOT NULL DEFAULT '0',
  `date_comm` date NOT NULL,
  PRIMARY KEY (`id_comm`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `films`
--

DROP TABLE IF EXISTS `films`;
CREATE TABLE IF NOT EXISTS `films` (
  `id_film` int(11) NOT NULL AUTO_INCREMENT,
  `titre_film` varchar(150) NOT NULL,
  `resume` text NOT NULL,
  `date_sortie` date NOT NULL,
  `movie_link` text NOT NULL,
  `img_link` text NOT NULL,
  PRIMARY KEY (`id_film`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `films`
--

INSERT INTO `films` (`id_film`, `titre_film`, `resume`, `date_sortie`, `movie_link`, `img_link`) VALUES
(1, 'Elephants dream', '1er film de la fondation Blender en tant que \"Open Movie\".', '2006-03-31', 'https://www.youtube.com/watch?v=TLkA0RELQ1g&index=9&list=PL6B3937A5D230E335', 'blender-poster-elephantsdream.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

DROP TABLE IF EXISTS `forum`;
CREATE TABLE IF NOT EXISTS `forum` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `id_auteur` int(11) NOT NULL,
  `titre_post` text NOT NULL,
  `message_post` text NOT NULL,
  `status_post` int(2) NOT NULL DEFAULT '0',
  `date_post` date NOT NULL,
  PRIMARY KEY (`id_post`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

DROP TABLE IF EXISTS `membre`;
CREATE TABLE IF NOT EXISTS `membre` (
  `id_membre` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(100) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `status_membre` int(3) NOT NULL DEFAULT '1',
  `date_membre` date NOT NULL,
  `avatar` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_membre`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id_membre`, `pseudo`, `pwd`, `status_membre`, `date_membre`, `avatar`) VALUES
(1, 'Lau', '$2y$10$b6ZDEbiEbGkFM5hwdzT81uQUn3Euy7HF4bTOMXbdyNlw4S7Tn8Vcu', 2, '2018-06-08', NULL),
(2, 'Weebie', '$2y$10$.H3atDEFmzq10HbYJxY/YukNRlZYy0eOaRAQR58jTLKKwtfR.NVe.', 3, '2018-06-12', NULL),
(3, 'Low', '$2y$10$cTJx.bUmW3J5sylts9g7seVz7rPG.Rxamjw6DaojxmNiPTUfOCK1K', 1, '2018-06-13', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

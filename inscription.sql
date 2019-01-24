-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 24 jan. 2019 à 12:51
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `inscription`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse_ip`
--

DROP TABLE IF EXISTS `adresse_ip`;
CREATE TABLE IF NOT EXISTS `adresse_ip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adresse_ip` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `adresse_ip` (`adresse_ip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `candidat`
--

DROP TABLE IF EXISTS `candidat`;
CREATE TABLE IF NOT EXISTS `candidat` (
  `id_candidat` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(15) NOT NULL,
  `prenom` varchar(15) NOT NULL,
  `mail` varchar(70) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `tel_portable` varchar(10) NOT NULL,
  `adresse` varchar(163) NOT NULL,
  `ville` varchar(45) NOT NULL,
  `code_postal` varchar(5) NOT NULL,
  `date_naissance` date NOT NULL,
  `niveau_etude` varchar(10) NOT NULL,
  `adresse_ip` varchar(50) NOT NULL,
  `resultat` json NOT NULL,
  PRIMARY KEY (`id_candidat`),
  UNIQUE KEY `adresse_ip` (`adresse_ip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `formateur`
--

DROP TABLE IF EXISTS `formateur`;
CREATE TABLE IF NOT EXISTS `formateur` (
  `id_formateur` int(11) NOT NULL AUTO_INCREMENT,
  `identifiant` varchar(50) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  `mail` varchar(50) NOT NULL,
  PRIMARY KEY (`id_formateur`),
  UNIQUE KEY `identifiant` (`identifiant`),
  UNIQUE KEY `mail` (`mail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id_question` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(500) NOT NULL,
  PRIMARY KEY (`id_question`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`id_question`, `question`) VALUES
(1, 'Combien y a t-il de pokemon dans la 1ère génération ?');

-- --------------------------------------------------------

--
-- Structure de la table `reponses`
--

DROP TABLE IF EXISTS `reponses`;
CREATE TABLE IF NOT EXISTS `reponses` (
  `id_reponse` int(11) NOT NULL AUTO_INCREMENT,
  `id_question` int(11) NOT NULL,
  `juste` tinyint(1) NOT NULL,
  `texte` varchar(200) NOT NULL,
  `type` text NOT NULL,
  PRIMARY KEY (`id_reponse`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adresse_ip`
--
ALTER TABLE `adresse_ip`
  ADD CONSTRAINT `adresse_ip_ibfk_1` FOREIGN KEY (`adresse_ip`) REFERENCES `candidat` (`adresse_ip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `candidat`
--
ALTER TABLE `candidat`
  ADD CONSTRAINT `candidat_ibfk_1` FOREIGN KEY (`adresse_ip`) REFERENCES `adresse_ip` (`adresse_ip`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

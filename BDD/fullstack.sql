-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 26 mars 2020 à 22:12
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
-- Base de données :  `fullstack`
--

-- --------------------------------------------------------

--
-- Structure de la table `arme`
--

DROP TABLE IF EXISTS `arme`;
CREATE TABLE IF NOT EXISTS `arme` (
  `id_arme` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(15) NOT NULL,
  `prix` float NOT NULL,
  `durabilite` int(11) NOT NULL,
  `bonus_degat` int(11) NOT NULL,
  PRIMARY KEY (`id_arme`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `armure`
--

DROP TABLE IF EXISTS `armure`;
CREATE TABLE IF NOT EXISTS `armure` (
  `id_armure` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prix` float NOT NULL,
  `durabilite` int(11) NOT NULL,
  `bonus_defense` int(11) NOT NULL,
  PRIMARY KEY (`id_armure`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `assochero`
--

DROP TABLE IF EXISTS `assochero`;
CREATE TABLE IF NOT EXISTS `assochero` (
  `id_assochero` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_hero` int(11) NOT NULL,
  PRIMARY KEY (`id_assochero`),
  KEY `id_user` (`id_user`,`id_hero`),
  KEY `id_hero` (`id_hero`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `entite`
--

DROP TABLE IF EXISTS `entite`;
CREATE TABLE IF NOT EXISTS `entite` (
  `id_entite` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `pdv` float NOT NULL,
  `attaque` float NOT NULL,
  `defense` float NOT NULL,
  `id_armure` int(11) NOT NULL,
  `niveau` int(11) NOT NULL,
  `eta` tinyint(1) NOT NULL,
  `id_arme` int(11) NOT NULL,
  PRIMARY KEY (`id_entite`),
  KEY `id_armure` (`id_armure`),
  KEY `id_arme` (`id_arme`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `hero`
--

DROP TABLE IF EXISTS `hero`;
CREATE TABLE IF NOT EXISTS `hero` (
  `id_hero` int(11) NOT NULL,
  `id_typehero` int(11) NOT NULL,
  `id_entite` int(11) NOT NULL,
  `potion` int(11) NOT NULL,
  PRIMARY KEY (`id_hero`),
  KEY `id_entite` (`id_entite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `mob`
--

DROP TABLE IF EXISTS `mob`;
CREATE TABLE IF NOT EXISTS `mob` (
  `id_mod` int(11) NOT NULL AUTO_INCREMENT,
  `id_entite` int(11) NOT NULL,
  PRIMARY KEY (`id_mod`),
  KEY `id_entite` (`id_entite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `typehero`
--

DROP TABLE IF EXISTS `typehero`;
CREATE TABLE IF NOT EXISTS `typehero` (
  `id_typehero` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` varchar(11) NOT NULL,
  PRIMARY KEY (`id_typehero`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(15) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `dollars` int(11) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `assochero`
--
ALTER TABLE `assochero`
  ADD CONSTRAINT `assochero_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `assochero_ibfk_2` FOREIGN KEY (`id_hero`) REFERENCES `hero` (`id_hero`);

--
-- Contraintes pour la table `entite`
--
ALTER TABLE `entite`
  ADD CONSTRAINT `entite_ibfk_1` FOREIGN KEY (`id_armure`) REFERENCES `armure` (`id_armure`),
  ADD CONSTRAINT `entite_ibfk_2` FOREIGN KEY (`id_arme`) REFERENCES `arme` (`id_arme`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `hero`
--
ALTER TABLE `hero`
  ADD CONSTRAINT `hero_ibfk_1` FOREIGN KEY (`id_typehero`) REFERENCES `typehero` (`id_typehero`),
  ADD CONSTRAINT `hero_ibfk_2` FOREIGN KEY (`id_entite`) REFERENCES `entite` (`id_entite`);

--
-- Contraintes pour la table `mob`
--
ALTER TABLE `mob`
  ADD CONSTRAINT `mob_ibfk_1` FOREIGN KEY (`id_entite`) REFERENCES `entite` (`id_entite`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 27 mars 2020 à 01:28
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `arme`
--

INSERT INTO `arme` (`id_arme`, `nom`, `prix`, `durabilite`, `bonus_degat`) VALUES
(1, 'poings', 0, 9999999, 0);

-- --------------------------------------------------------

--
-- Structure de la table `armure`
--

DROP TABLE IF EXISTS `armure`;
CREATE TABLE IF NOT EXISTS `armure` (
  `id_armure` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `prix` float NOT NULL,
  `durabilite` int(11) NOT NULL,
  `bonus_defense` int(11) NOT NULL,
  PRIMARY KEY (`id_armure`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `armure`
--

INSERT INTO `armure` (`id_armure`, `nom`, `prix`, `durabilite`, `bonus_defense`) VALUES
(1, 'plastron', 0, 9999999, 5);

-- --------------------------------------------------------

--
-- Structure de la table `assochero`
--

DROP TABLE IF EXISTS `assochero`;
CREATE TABLE IF NOT EXISTS `assochero` (
  `id_assochero` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_perso` int(11) NOT NULL,
  PRIMARY KEY (`id_assochero`),
  KEY `id_user` (`id_user`),
  KEY `id_perso` (`id_perso`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `assochero`
--

INSERT INTO `assochero` (`id_assochero`, `id_user`, `id_perso`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `entite`
--

DROP TABLE IF EXISTS `entite`;
CREATE TABLE IF NOT EXISTS `entite` (
  `id_entite` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(15) NOT NULL,
  `pdv` float NOT NULL,
  `attaque` float NOT NULL,
  `defense` float NOT NULL,
  `id_armure` int(11) NOT NULL,
  `niveau` int(11) NOT NULL,
  `eta` tinyint(1) NOT NULL,
  `id_arme` int(11) NOT NULL,
  PRIMARY KEY (`id_entite`),
  KEY `id_arme` (`id_arme`),
  KEY `id_armure` (`id_armure`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `entite`
--

INSERT INTO `entite` (`id_entite`, `nom`, `pdv`, `attaque`, `defense`, `id_armure`, `niveau`, `eta`, `id_arme`) VALUES
(2, 'Ashe', 650, 50, 20, 1, 0, 1, 1),
(3, 'Jinx', 290, 60, 20, 1, 0, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `mob`
--

DROP TABLE IF EXISTS `mob`;
CREATE TABLE IF NOT EXISTS `mob` (
  `id_mob` int(11) NOT NULL AUTO_INCREMENT,
  `id_entite` int(11) NOT NULL,
  PRIMARY KEY (`id_mob`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `mob`
--

INSERT INTO `mob` (`id_mob`, `id_entite`) VALUES
(1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `perso`
--

DROP TABLE IF EXISTS `perso`;
CREATE TABLE IF NOT EXISTS `perso` (
  `id_perso` int(11) NOT NULL AUTO_INCREMENT,
  `id_entite` int(11) NOT NULL,
  `id_typehero` int(11) NOT NULL,
  `id_arme` int(11) NOT NULL,
  `id_armure` int(11) NOT NULL,
  `pdv` int(11) NOT NULL,
  `attaque` int(11) NOT NULL,
  `defense` int(11) NOT NULL,
  `potion` int(11) NOT NULL,
  PRIMARY KEY (`id_perso`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `perso`
--

INSERT INTO `perso` (`id_perso`, `id_entite`, `id_typehero`, `id_arme`, `id_armure`, `pdv`, `attaque`, `defense`, `potion`) VALUES
(1, 2, 1, 1, 1, 650, 50, 20, 0),
(2, 3, 1, 1, 1, 650, 60, 20, 0);

-- --------------------------------------------------------

--
-- Structure de la table `typehero`
--

DROP TABLE IF EXISTS `typehero`;
CREATE TABLE IF NOT EXISTS `typehero` (
  `id_typehero` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` varchar(15) NOT NULL,
  PRIMARY KEY (`id_typehero`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `typehero`
--

INSERT INTO `typehero` (`id_typehero`, `categorie`) VALUES
(1, 'archer');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(15) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `dollars` int(11) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `pseudo`, `mail`, `mdp`, `dollars`) VALUES
(1, 'Rainolf', 'floflobg1999@hotmail.fr', 'mdpsecure123', 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `assochero`
--
ALTER TABLE `assochero`
  ADD CONSTRAINT `assochero_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `entite`
--
ALTER TABLE `entite`
  ADD CONSTRAINT `entite_ibfk_2` FOREIGN KEY (`id_arme`) REFERENCES `arme` (`id_arme`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

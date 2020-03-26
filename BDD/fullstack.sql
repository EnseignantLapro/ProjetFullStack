-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 26, 2020 at 10:12 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fullstack`
--

-- --------------------------------------------------------

--
-- Table structure for table `arme`
--

DROP TABLE IF EXISTS `arme`;
CREATE TABLE IF NOT EXISTS `arme` (
  `id_arme` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(15) NOT NULL,
  `prix` float NOT NULL,
  `bonus_degat` int(11) NOT NULL,
  PRIMARY KEY (`id_arme`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `arme`
--

INSERT INTO `arme` (`id_arme`, `nom`, `prix`, `bonus_degat`) VALUES
(1, 'Katana', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `armure`
--

DROP TABLE IF EXISTS `armure`;
CREATE TABLE IF NOT EXISTS `armure` (
  `id_armure` int(11) NOT NULL AUTO_INCREMENT,
  `bonus_armure` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  PRIMARY KEY (`id_armure`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `armure`
--

INSERT INTO `armure` (`id_armure`, `bonus_armure`, `prix`) VALUES
(1, 45, 70);

-- --------------------------------------------------------

--
-- Table structure for table `assoshero`
--

DROP TABLE IF EXISTS `assoshero`;
CREATE TABLE IF NOT EXISTS `assoshero` (
  `id_assoshero` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_hero` int(11) NOT NULL,
  `id_arme` int(11) NOT NULL,
  `potion` int(11) NOT NULL,
  `pdv` float NOT NULL,
  `attaque` float NOT NULL,
  `id_armure` float NOT NULL,
  `niveau` int(11) NOT NULL,
  PRIMARY KEY (`id_assoshero`),
  UNIQUE KEY `id_user_2` (`id_user`,`id_hero`,`id_arme`),
  KEY `id_user` (`id_user`),
  KEY `id_hero` (`id_hero`),
  KEY `id_arme` (`id_arme`),
  KEY `id_user_3` (`id_user`,`id_hero`,`id_arme`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assoshero`
--

INSERT INTO `assoshero` (`id_assoshero`, `id_user`, `id_hero`, `id_arme`, `potion`, `pdv`, `attaque`, `id_armure`, `niveau`) VALUES
(1, 1, 2, 1, 0, 650, 20, 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mob`
--

DROP TABLE IF EXISTS `mob`;
CREATE TABLE IF NOT EXISTS `mob` (
  `id_mob` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(15) NOT NULL,
  `pdv` float NOT NULL,
  `attaque` float NOT NULL,
  `defence` float NOT NULL,
  `etat` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_mob`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mob`
--

INSERT INTO `mob` (`id_mob`, `nom`, `pdv`, `attaque`, `defence`, `etat`) VALUES
(1, 'Dragon', 100, 80, 180, 0);

-- --------------------------------------------------------

--
-- Table structure for table `typehero`
--

DROP TABLE IF EXISTS `typehero`;
CREATE TABLE IF NOT EXISTS `typehero` (
  `id_hero` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(15) NOT NULL,
  `id_arme` int(11) NOT NULL,
  `pdv` float NOT NULL,
  `attaque` float NOT NULL,
  `id_armure` int(11) NOT NULL,
  `categorie` int(11) NOT NULL,
  PRIMARY KEY (`id_hero`),
  KEY `id_arme` (`id_arme`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `typehero`
--

INSERT INTO `typehero` (`id_hero`, `nom`, `id_arme`, `pdv`, `attaque`, `id_armure`, `categorie`) VALUES
(2, 'Ashe', 1, 650, 20, 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(15) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `pseudo`, `mail`, `mdp`) VALUES
(1, 'Rainolf', 'floflobg1999@hotmail.fr', 'mdpsecure123');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assoshero`
--
ALTER TABLE `assoshero`
  ADD CONSTRAINT `assoshero_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `assoshero_ibfk_2` FOREIGN KEY (`id_hero`) REFERENCES `typehero` (`id_hero`),
  ADD CONSTRAINT `assoshero_ibfk_3` FOREIGN KEY (`id_arme`) REFERENCES `arme` (`id_arme`);

--
-- Constraints for table `typehero`
--
ALTER TABLE `typehero`
  ADD CONSTRAINT `typehero_ibfk_1` FOREIGN KEY (`id_arme`) REFERENCES `arme` (`id_arme`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

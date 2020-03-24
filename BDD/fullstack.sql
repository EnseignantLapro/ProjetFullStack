-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 24 mars 2020 à 23:18
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

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

CREATE TABLE `arme` (
  `id_arme` int(11) NOT NULL,
  `nom` varchar(15) NOT NULL,
  `prix` float NOT NULL,
  `bonus_degat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `arme`
--

INSERT INTO `arme` (`id_arme`, `nom`, `prix`, `bonus_degat`) VALUES
(1, 'Poings', 0, 0),
(2, 'Epee', 25, 30);

-- --------------------------------------------------------

--
-- Structure de la table `assoshero`
--

CREATE TABLE `assoshero` (
  `id_assoshero` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_hero` int(11) NOT NULL,
  `id_arme` int(11) NOT NULL,
  `potion` int(11) NOT NULL,
  `pdv` float NOT NULL,
  `attaque` float NOT NULL,
  `defense` float NOT NULL,
  `niveau` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `assoshero`
--

INSERT INTO `assoshero` (`id_assoshero`, `id_user`, `id_hero`, `id_arme`, `potion`, `pdv`, `attaque`, `defense`, `niveau`) VALUES
(1, 1, 2, 2, 0, 650, 50, 30, 1);

-- --------------------------------------------------------

--
-- Structure de la table `mob`
--

CREATE TABLE `mob` (
  `id_mob` int(11) NOT NULL,
  `nom` varchar(15) NOT NULL,
  `pdv` float NOT NULL,
  `attaque` float NOT NULL,
  `defence` float NOT NULL,
  `etat` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `mob`
--

INSERT INTO `mob` (`id_mob`, `nom`, `pdv`, `attaque`, `defence`, `etat`) VALUES
(1, 'Dragon', 3695, 80, 180, 1);

-- --------------------------------------------------------

--
-- Structure de la table `tableassociation`
--

CREATE TABLE `tableassociation` (
  `id_assoc` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_hero` int(11) NOT NULL,
  `id_arme` int(11) NOT NULL,
  `potion` int(11) NOT NULL,
  `pdv` float NOT NULL,
  `attaque` float NOT NULL,
  `defense` float NOT NULL,
  `niveau` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `typehero`
--

CREATE TABLE `typehero` (
  `id_hero` int(11) NOT NULL,
  `nom` varchar(15) NOT NULL,
  `id_arme` int(11) NOT NULL,
  `pdv` float NOT NULL,
  `attaque` float NOT NULL,
  `defence` float NOT NULL,
  `categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `typehero`
--

INSERT INTO `typehero` (`id_hero`, `nom`, `id_arme`, `pdv`, `attaque`, `defence`, `categorie`) VALUES
(2, 'Ashe', 1, 650, 20, 30, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `pseudo` varchar(15) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `mdp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `pseudo`, `mail`, `mdp`) VALUES
(1, 'Rainolf', 'floflobg1999@hotmail.fr', 'mdpsecure123');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `arme`
--
ALTER TABLE `arme`
  ADD PRIMARY KEY (`id_arme`);

--
-- Index pour la table `assoshero`
--
ALTER TABLE `assoshero`
  ADD PRIMARY KEY (`id_assoshero`),
  ADD UNIQUE KEY `id_user_2` (`id_user`,`id_hero`,`id_arme`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_hero` (`id_hero`),
  ADD KEY `id_arme` (`id_arme`),
  ADD KEY `id_user_3` (`id_user`,`id_hero`,`id_arme`);

--
-- Index pour la table `mob`
--
ALTER TABLE `mob`
  ADD PRIMARY KEY (`id_mob`);

--
-- Index pour la table `tableassociation`
--
ALTER TABLE `tableassociation`
  ADD PRIMARY KEY (`id_assoc`),
  ADD UNIQUE KEY `id_user_2` (`id_user`,`id_hero`,`id_arme`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_hero` (`id_hero`),
  ADD KEY `id_arme` (`id_arme`),
  ADD KEY `id_user_3` (`id_user`,`id_hero`,`id_arme`);

--
-- Index pour la table `typehero`
--
ALTER TABLE `typehero`
  ADD PRIMARY KEY (`id_hero`),
  ADD KEY `id_arme` (`id_arme`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `arme`
--
ALTER TABLE `arme`
  MODIFY `id_arme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `assoshero`
--
ALTER TABLE `assoshero`
  MODIFY `id_assoshero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `mob`
--
ALTER TABLE `mob`
  MODIFY `id_mob` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `tableassociation`
--
ALTER TABLE `tableassociation`
  MODIFY `id_assoc` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `typehero`
--
ALTER TABLE `typehero`
  MODIFY `id_hero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `assoshero`
--
ALTER TABLE `assoshero`
  ADD CONSTRAINT `assoshero_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `assoshero_ibfk_2` FOREIGN KEY (`id_hero`) REFERENCES `typehero` (`id_hero`),
  ADD CONSTRAINT `assoshero_ibfk_3` FOREIGN KEY (`id_arme`) REFERENCES `arme` (`id_arme`);

--
-- Contraintes pour la table `tableassociation`
--
ALTER TABLE `tableassociation`
  ADD CONSTRAINT `tableassociation_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `tableassociation_ibfk_2` FOREIGN KEY (`id_hero`) REFERENCES `typehero` (`id_hero`),
  ADD CONSTRAINT `tableassociation_ibfk_3` FOREIGN KEY (`id_arme`) REFERENCES `arme` (`id_arme`);

--
-- Contraintes pour la table `typehero`
--
ALTER TABLE `typehero`
  ADD CONSTRAINT `typehero_ibfk_1` FOREIGN KEY (`id_arme`) REFERENCES `arme` (`id_arme`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

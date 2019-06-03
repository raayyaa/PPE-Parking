-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 31 mai 2019 à 15:24
-- Version du serveur :  10.1.29-MariaDB
-- Version de PHP :  7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `parkin`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `contenu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `place`
--

CREATE TABLE `place` (
  `idPlace` int(11) NOT NULL,
  `nomPlace` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `place`
--

INSERT INTO `place` (`idPlace`, `nomPlace`) VALUES
(4, 'A01');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `idUser` int(11) NOT NULL,
  `idPlace` int(11) NOT NULL,
  `dateDebut` datetime NOT NULL,
  `dateFin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`idUser`, `idPlace`, `dateDebut`, `dateFin`) VALUES
(1, 4, '2018-10-22 10:55:19', '2018-11-01 10:55:19'),
(1, 4, '2019-04-23 15:01:16', '2019-05-03 15:01:16'),
(2, 4, '2018-10-08 00:23:30', '2018-01-18 00:23:30'),
(2, 4, '2019-03-28 14:35:17', '2019-04-07 14:35:17'),
(6, 4, '2018-12-20 13:57:31', '2018-12-30 13:57:31');

-- --------------------------------------------------------

--
-- Structure de la table `settings`
--

CREATE TABLE `settings` (
  `idSetting` int(11) NOT NULL,
  `cleSetting` varchar(100) NOT NULL,
  `valeurSetting` varchar(100) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `settings`
--

INSERT INTO `settings` (`idSetting`, `cleSetting`, `valeurSetting`, `idUser`) VALUES
(1, 'duree', '10', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `nomUser` varchar(100) NOT NULL,
  `prenomUser` varchar(100) NOT NULL,
  `mailUser` varchar(150) NOT NULL,
  `telUser` int(10) NOT NULL,
  `passwordUser` varchar(50) NOT NULL,
  `levelUser` int(1) NOT NULL DEFAULT '1',
  `rangUser` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUser`, `nomUser`, `prenomUser`, `mailUser`, `telUser`, `passwordUser`, `levelUser`, `rangUser`) VALUES
(1, 'User', 'A', 'a@gmail.com', 767510038, 'a43b6f0eb955f93b8bb8836b8d0e8dc9de21a1e0', 2, 3),
(2, 'User ', 'B', 'b@gmail.com', 767510038, 'a43b6f0eb955f93b8bb8836b8d0e8dc9de21a1e0', 2, NULL),
(3, 'User ', 'C', 'c@gmail.com', 767510038, 'a43b6f0eb955f93b8bb8836b8d0e8dc9de21a1e0', 2, 2),
(4, 'User ', 'D', 'd@gmail.com', 767510038, 'a43b6f0eb955f93b8bb8836b8d0e8dc9de21a1e0', 3, NULL),
(5, 'User', 'E', 'e@gmail.com', 767510038, 'a43b6f0eb955f93b8bb8836b8d0e8dc9de21a1e0', 2, 4),
(6, 'User', 'F', 'f@gmail.com', 767510038, 'a43b6f0eb955f93b8bb8836b8d0e8dc9de21a1e0', 2, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_article` (`id_article`);

--
-- Index pour la table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`idPlace`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`idUser`,`idPlace`,`dateDebut`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idPlace` (`idPlace`),
  ADD KEY `dateDebut` (`dateDebut`);

--
-- Index pour la table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`idSetting`),
  ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `place`
--
ALTER TABLE `place`
  MODIFY `idPlace` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `settings`
--
ALTER TABLE `settings`
  MODIFY `idSetting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`idPlace`) REFERENCES `place` (`idPlace`);

--
-- Contraintes pour la table `settings`
--
ALTER TABLE `settings`
  ADD CONSTRAINT `settings_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

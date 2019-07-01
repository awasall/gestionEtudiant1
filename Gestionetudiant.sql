-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Lun 01 Juillet 2019 à 08:46
-- Version du serveur :  5.7.26-0ubuntu0.18.04.1
-- Version de PHP :  7.3.5-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `Gestionetudiant`
--

-- --------------------------------------------------------

--
-- Structure de la table `batiment`
--

CREATE TABLE `batiment` (
  `id_batiment` int(11) NOT NULL,
  `nom_batiment` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `batiment`
--

INSERT INTO `batiment` (`id_batiment`, `nom_batiment`) VALUES
(1, 'batimentA'),
(2, 'batimentB');

-- --------------------------------------------------------

--
-- Structure de la table `boursiers`
--

CREATE TABLE `boursiers` (
  `id_etudiant` int(11) NOT NULL,
  `id_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `boursiers`
--

INSERT INTO `boursiers` (`id_etudiant`, `id_type`) VALUES
(56, 1),
(58, 1),
(61, 1),
(72, 1),
(74, 1),
(79, 1),
(80, 1),
(64, 2),
(73, 2),
(76, 2);

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

CREATE TABLE `chambre` (
  `id_chambre` int(11) NOT NULL,
  `nom_chambre` varchar(30) NOT NULL,
  `id_batiment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `chambre`
--

INSERT INTO `chambre` (`id_chambre`, `nom_chambre`, `id_batiment`) VALUES
(1, 'chambre1', 1),
(2, 'chambre1', 2),
(3, 'chambre2', 1),
(4, 'chambre3', 1),
(5, 'chambre4', 2);

-- --------------------------------------------------------

--
-- Structure de la table `Etudiant`
--

CREATE TABLE `Etudiant` (
  `id_etudiant` int(11) NOT NULL,
  `matricule` varchar(30) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `telephone` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `date_naissance` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Etudiant`
--

INSERT INTO `Etudiant` (`id_etudiant`, `matricule`, `prenom`, `nom`, `telephone`, `email`, `date_naissance`) VALUES
(56, 'f1', 'Assane', 'sall', '774040821', 'sallassane622@gmail.com', '2019-06-13'),
(57, 't1', 'Amy', 'MbackÃ©', '45562244441', 'amymbacke622@gmail.com', '2019-06-12'),
(58, '01bb', 'Ibrahima', 'Ndao', '7789564266', 'ibou@gmail.com', '2019-06-19'),
(61, '02bb', 'mor', 'ndiaye', '7789564266', 'abdoulaye45@gmail.com', '2019-06-06'),
(64, '000e', 'awa', 'ndao', '778889988', 'sallawa622@gmail.com', '2019-06-12'),
(65, 's1', 'Diama', 'Sall', '771456662', 'salldiama622@gmail.com', '2019-06-15'),
(72, 's3', 'aida', 'mboup', '44555655255', 'aida@gmail.com', '2019-06-16'),
(73, 's4', 'fatou', 'diouf', '525565525554', 'fatoudiouf@gmail.com', '2019-06-12'),
(74, 's5', 'Bity', 'Ndiaye', '525565525554', 'ndiaye@gmail.com', '2019-06-12'),
(76, 's9', 'Ibrahima', 'Ndao', '7789564266', 'ibou@gmail.com', '1999-06-16'),
(79, 's10', 'fallou', 'faye', '75565222322', 'fallou@gmail.com', '2019-06-12'),
(80, 's11', 'MbackÃ©', 'Mbaye', '768945612', 'mbacke@gmail.com', '2019-06-12');

-- --------------------------------------------------------

--
-- Structure de la table `loger`
--

CREATE TABLE `loger` (
  `id_etudiant` int(11) NOT NULL,
  `id_chambre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `loger`
--

INSERT INTO `loger` (`id_etudiant`, `id_chambre`) VALUES
(56, 1),
(72, 1),
(64, 2),
(58, 4),
(61, 4),
(73, 4),
(76, 4);

-- --------------------------------------------------------

--
-- Structure de la table `nonboursiers`
--

CREATE TABLE `nonboursiers` (
  `id_etudiant` int(11) NOT NULL,
  `adresse` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `nonboursiers`
--

INSERT INTO `nonboursiers` (`id_etudiant`, `adresse`) VALUES
(57, 'guediawaye'),
(65, 'thiaroye');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `id_type` int(11) NOT NULL,
  `libelle` varchar(30) NOT NULL,
  `montant` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `type`
--

INSERT INTO `type` (`id_type`, `libelle`, `montant`) VALUES
(1, 'DemiPension', 20000),
(2, 'PensionComplete', 40000);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `motpasse` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_user`, `login`, `motpasse`) VALUES
(1, 'awa', 'awasall');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `batiment`
--
ALTER TABLE `batiment`
  ADD PRIMARY KEY (`id_batiment`);

--
-- Index pour la table `boursiers`
--
ALTER TABLE `boursiers`
  ADD PRIMARY KEY (`id_etudiant`),
  ADD KEY `id_type` (`id_type`),
  ADD KEY `id_etudiant` (`id_etudiant`);

--
-- Index pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD PRIMARY KEY (`id_chambre`),
  ADD KEY `id_batiment` (`id_batiment`);

--
-- Index pour la table `Etudiant`
--
ALTER TABLE `Etudiant`
  ADD PRIMARY KEY (`id_etudiant`),
  ADD UNIQUE KEY `matricule` (`matricule`);

--
-- Index pour la table `loger`
--
ALTER TABLE `loger`
  ADD PRIMARY KEY (`id_etudiant`),
  ADD KEY `id_chambre` (`id_chambre`);

--
-- Index pour la table `nonboursiers`
--
ALTER TABLE `nonboursiers`
  ADD PRIMARY KEY (`id_etudiant`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id_type`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `batiment`
--
ALTER TABLE `batiment`
  MODIFY `id_batiment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `chambre`
--
ALTER TABLE `chambre`
  MODIFY `id_chambre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `Etudiant`
--
ALTER TABLE `Etudiant`
  MODIFY `id_etudiant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `boursiers`
--
ALTER TABLE `boursiers`
  ADD CONSTRAINT `boursiers_ibfk_1` FOREIGN KEY (`id_etudiant`) REFERENCES `Etudiant` (`id_etudiant`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `boursiers_ibfk_2` FOREIGN KEY (`id_type`) REFERENCES `type` (`id_type`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD CONSTRAINT `chambre_ibfk_1` FOREIGN KEY (`id_batiment`) REFERENCES `batiment` (`id_batiment`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `loger`
--
ALTER TABLE `loger`
  ADD CONSTRAINT `loger_ibfk_1` FOREIGN KEY (`id_etudiant`) REFERENCES `boursiers` (`id_etudiant`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `loger_ibfk_2` FOREIGN KEY (`id_chambre`) REFERENCES `chambre` (`id_chambre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `nonboursiers`
--
ALTER TABLE `nonboursiers`
  ADD CONSTRAINT `nonboursiers_ibfk_1` FOREIGN KEY (`id_etudiant`) REFERENCES `Etudiant` (`id_etudiant`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 03 nov. 2021 à 07:20
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `etudiants`
--

-- --------------------------------------------------------

--
-- Structure de la table `epreuve`
--

CREATE TABLE `epreuve` (
  `numepreuve` int(10) UNSIGNED NOT NULL,
  `datepreuve` date DEFAULT NULL,
  `lieu` varchar(50) DEFAULT NULL,
  `codemat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `epreuve`
--

INSERT INTO `epreuve` (`numepreuve`, `datepreuve`, `lieu`, `codemat`) VALUES
(11031, '2003-12-15', 'Salle 191L', 'STA'),
(11032, '2004-04-01', 'Amphi G', 'STA'),
(21031, '2003-10-30', 'Salle 191L', 'INF'),
(21032, '2004-06-01', 'Salle 192L', 'INF'),
(31030, '2004-06-02', 'Salle 05R', 'ECO');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `numetu` int(10) UNSIGNED NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `datenaiss` varchar(50) DEFAULT NULL,
  `rue` varchar(50) DEFAULT NULL,
  `cp` varchar(50) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE `matiere` (
  `codemat` varchar(50) NOT NULL,
  `libelle` varchar(50) DEFAULT NULL,
  `coef` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`codemat`, `libelle`, `coef`) VALUES
('ECO', 'Economie', 0.2),
('INF', 'Informatique', 0.4),
('SS', 'SQL SERVEUR', 0.8),
('STAT', 'Statistique', 0.4);

-- --------------------------------------------------------

--
-- Structure de la table `notation`
--

CREATE TABLE `notation` (
  `numetu` int(10) UNSIGNED DEFAULT NULL,
  `numepreuve` int(10) UNSIGNED DEFAULT NULL,
  `note` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `epreuve`
--
ALTER TABLE `epreuve`
  ADD PRIMARY KEY (`numepreuve`),
  ADD KEY `fk_codemat` (`codemat`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`numetu`);

--
-- Index pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`codemat`);

--
-- Index pour la table `notation`
--
ALTER TABLE `notation`
  ADD KEY `fk_numetu` (`numetu`),
  ADD KEY `fk_numepreuve` (`numepreuve`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `numetu` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `epreuve`
--
ALTER TABLE `epreuve`
  ADD CONSTRAINT `fk_codemat` FOREIGN KEY (`codemat`) REFERENCES `matiere` (`codemat`);

--
-- Contraintes pour la table `notation`
--
ALTER TABLE `notation`
  ADD CONSTRAINT `fk_numepreuve` FOREIGN KEY (`numepreuve`) REFERENCES `epreuve` (`numepreuve`),
  ADD CONSTRAINT `fk_numetu` FOREIGN KEY (`numetu`) REFERENCES `etudiant` (`numetu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

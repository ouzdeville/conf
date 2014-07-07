-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Mer 02 Juillet 2014 à 01:33
-- Version du serveur: 5.5.27-log
-- Version de PHP: 5.4.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `conf_tdsi`
--

-- --------------------------------------------------------

--
-- Structure de la table `conference`
--

CREATE TABLE IF NOT EXISTS `conference` (
  `IDCONF` int(11) NOT NULL,
  `ANNEE` int(11) NOT NULL,
  `DESCRIPTION` text,
  PRIMARY KEY (`IDCONF`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `conference`
--

INSERT INTO `conference` (`IDCONF`, `ANNEE`, `DESCRIPTION`) VALUES
(1, 2014, 'basée sur les ....');

-- --------------------------------------------------------

--
-- Structure de la table `participer`
--

CREATE TABLE IF NOT EXISTS `participer` (
  `IDUSERS` int(11) NOT NULL,
  `IDCONF` int(11) NOT NULL,
  PRIMARY KEY (`IDUSERS`,`IDCONF`),
  KEY `FK_PARTICIPER` (`IDCONF`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `presentation`
--

CREATE TABLE IF NOT EXISTS `presentation` (
  `IDPRESENT` int(11) NOT NULL,
  `IDCONF` int(11) DEFAULT NULL,
  `IDUSERS` int(11) DEFAULT NULL,
  `TITRE` char(50) NOT NULL,
  `ABSTRACT` text,
  `NOMBRE_MINUTE` int(11) NOT NULL,
  PRIMARY KEY (`IDPRESENT`),
  KEY `FK_ETRE_PRESENTER` (`IDCONF`),
  KEY `FK_FAIRE` (`IDUSERS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE IF NOT EXISTS `profil` (
  `IDPROFIL` int(11) NOT NULL,
  `NOM_PROFIL` char(50) NOT NULL,
  `DESCRIPTION` text,
  PRIMARY KEY (`IDPROFIL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `profil`
--

INSERT INTO `profil` (`IDPROFIL`, `NOM_PROFIL`, `DESCRIPTION`) VALUES
(1, 'admin', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `societe`
--

CREATE TABLE IF NOT EXISTS `societe` (
  `IDSOCIETE` int(11) NOT NULL,
  `NOM` char(50) NOT NULL,
  `EMAIL` char(50) DEFAULT NULL,
  `ADRESSE` char(50) DEFAULT NULL,
  PRIMARY KEY (`IDSOCIETE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `societe`
--

INSERT INTO `societe` (`IDSOCIETE`, `NOM`, `EMAIL`, `ADRESSE`) VALUES
(1, 'dmc', 'ouzdeville@yahoo.fr', 'fst ucad dakar senegal');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `IDUSERS` int(11) NOT NULL,
  `IDPROFIL` int(11) DEFAULT NULL,
  `IDSOCIETE` int(11) DEFAULT NULL,
  `NOM` char(50) NOT NULL,
  `PRENOM` char(50) NOT NULL,
  `LOGIN` char(50) DEFAULT NULL,
  `PASSWORD` char(255) DEFAULT NULL,
  `EMAIL` char(50) DEFAULT NULL,
  `TEL` char(50) DEFAULT NULL,
  PRIMARY KEY (`IDUSERS`),
  KEY `FK_ETRE` (`IDPROFIL`),
  KEY `FK_VENIR_DE_` (`IDSOCIETE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`IDUSERS`, `IDPROFIL`, `IDSOCIETE`, `NOM`, `PRENOM`, `LOGIN`, `PASSWORD`, `EMAIL`, `TEL`) VALUES
(0, 1, 1, 'ouz', 'ndiaye', 'ouzdeville@gmail.com', 'ouz', 'ouzdeville@yahoo.fr', '74859674');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `participer`
--
ALTER TABLE `participer`
  ADD CONSTRAINT `FK_PARTICIPER` FOREIGN KEY (`IDCONF`) REFERENCES `conference` (`IDCONF`),
  ADD CONSTRAINT `FK_PARTICIPER2` FOREIGN KEY (`IDUSERS`) REFERENCES `users` (`IDUSERS`);

--
-- Contraintes pour la table `presentation`
--
ALTER TABLE `presentation`
  ADD CONSTRAINT `FK_ETRE_PRESENTER` FOREIGN KEY (`IDCONF`) REFERENCES `conference` (`IDCONF`),
  ADD CONSTRAINT `FK_FAIRE` FOREIGN KEY (`IDUSERS`) REFERENCES `users` (`IDUSERS`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_ETRE` FOREIGN KEY (`IDPROFIL`) REFERENCES `profil` (`IDPROFIL`),
  ADD CONSTRAINT `FK_VENIR_DE_` FOREIGN KEY (`IDSOCIETE`) REFERENCES `societe` (`IDSOCIETE`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Dim 25 Novembre 2012 à 10:58
-- Version du serveur: 5.5.20
-- Version de PHP: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `projet0`
--

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

CREATE TABLE IF NOT EXISTS `absence` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `id_horaire` int(11) NOT NULL,
  `id_eleve` int(20) NOT NULL,
  `statut` varchar(3) DEFAULT NULL,
  `justificatif` varchar(200) NOT NULL,
  `message` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Contenu de la table `absence`
--

INSERT INTO `absence` (`id`, `id_horaire`, `id_eleve`, `statut`, `justificatif`, `message`) VALUES
(41, 1, 21, '0', '', ''),
(42, 1, 22, '0', '', ''),
(43, 1, 19, '0', '', ''),
(44, 2, 19, '0', '', ''),
(45, 2, 20, '0', '', ''),
(46, 1, 21, '0', '', ''),
(47, 2, 20, '0', '', ''),
(48, 2, 21, '0', '', ''),
(49, 1, 20, '0', '', ''),
(50, 2, 21, '0', '', ''),
(51, 2, 16, '0', '', ''),
(52, 1, 19, '0', '', ''),
(53, 0, 19, '0', '', ''),
(54, 0, 20, '0', '', ''),
(55, 0, 21, '0', '', ''),
(56, 0, 22, '0', '', ''),
(57, 0, 23, '0', '', ''),
(58, 0, 24, '0', '', ''),
(59, 0, 26, '0', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `eleve`
--

CREATE TABLE IF NOT EXISTS `eleve` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(15) DEFAULT NULL,
  `prenom` varchar(15) DEFAULT NULL,
  `photo` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `id_entreprise` int(11) DEFAULT NULL,
  `id_groupe` int(11) DEFAULT NULL,
  `telephone` varchar(10) NOT NULL,
  `delegue` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_entreprise` (`id_entreprise`),
  KEY `id_groupe` (`id_groupe`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Contenu de la table `eleve`
--

INSERT INTO `eleve` (`id`, `nom`, `prenom`, `photo`, `email`, `id_entreprise`, `id_groupe`, `telephone`, `delegue`) VALUES
(42, 'achraf', 'hig', 'achraf_hig.jpg', 'chopper_rythmik@hotmail.com', 27, NULL, '0612345688', 0);

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE IF NOT EXISTS `entreprise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_entreprise` varchar(100) DEFAULT NULL,
  `adresse_entreprise` varchar(100) DEFAULT NULL,
  `telephone_entreprise` varchar(10) DEFAULT NULL,
  `email_entreprise` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Contenu de la table `entreprise`
--

INSERT INTO `entreprise` (`id`, `nom_entreprise`, `adresse_entreprise`, `telephone_entreprise`, `email_entreprise`) VALUES
(27, 'SDIS', 'rue de beccaria', '3330000009', 'Sdis@sdis.fr');

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE IF NOT EXISTS `groupe` (
  `nom` varchar(200) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `horaire`
--

CREATE TABLE IF NOT EXISTS `horaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `quand` varchar(100) NOT NULL,
  `matiere` varchar(100) NOT NULL,
  `abrev_intervenant` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `horaire`
--

INSERT INTO `horaire` (`id`, `date`, `quand`, `matiere`, `abrev_intervenant`) VALUES
(1, '2012-10-19', 'matin', 'php5', 'LR'),
(2, '2012-10-19', 'apres-midi', 'poo', 'JR'),
(3, '2012-01-07', 'matin', 'et aussi ca', ''),
(4, '2012-01-07', 'matin', 'et aussi ca', ''),
(5, '2012-01-07', 'matin', 'et aussi ca', ''),
(6, '2012-01-07', 'matin', 'et aussi ca', '');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `role`
--

INSERT INTO `role` (`id`, `nom`) VALUES
(1, 'responsable'),
(2, 'secretaire'),
(3, 'intervenant');

-- --------------------------------------------------------

--
-- Structure de la table `role_utilisateur`
--

CREATE TABLE IF NOT EXISTS `role_utilisateur` (
  `id_role` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  KEY `id_role` (`id_role`,`id_utilisateur`),
  KEY `id_role_2` (`id_role`),
  KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `role_utilisateur`
--

INSERT INTO `role_utilisateur` (`id_role`, `id_utilisateur`) VALUES
(2, 5),
(3, 9),
(3, 10);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(200) DEFAULT NULL,
  `mdp` varchar(200) DEFAULT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `picture` varchar(150) NOT NULL,
  `Alias` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `login`, `mdp`, `nom`, `prenom`, `email`, `telephone`, `picture`, `Alias`) VALUES
(2, 'hicham', 'd033e22ae348aeb5660fc2140aec35850c4da997', '', '', '', '', '', ''),
(3, 'lansari', 'ea053d11a8aad1ccf8c18f9241baeb9ec47e5d64', '', '', 'peace@hotmail.com', '', '', ''),
(5, 'lansari2', 'd8cf7d01525118aa7f3db3eed80f8ba1d121e6d0', '', '', 'peace-und-loove@hotmail.com', '', '', ''),
(6, 'aa', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'ayt', 'achraf', 'achraflansari@gmail.com', '0658741479', 'nothing.jpg', '3b'),
(7, 'hicham9004', 'ea053d11a8aad1ccf8c18f9241baeb9ec47e5d64', 'hicham', 'hicham', 'gourgan.hicham@gmail.com', '0612345689', 'hicham_hicham.jpg', 'GH'),
(8, 'laurent', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'laurent', 'ricard', 'chopper_rythmik@hotmail.com', '0612345600', 'laurent_ricard.jpg', 'LR'),
(9, 'laurent', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'laurent', 'ricard', 'chopper_rythmik@hotmail.com', '0612345600', 'laurent_ricard.jpg', 'LR'),
(10, 'laurent', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'laurent', 'ricard', 'chopper_rythmik@hotmail.com', '0612345600', 'laurent_ricard.jpg', 'LR');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `role_utilisateur`
--
ALTER TABLE `role_utilisateur`
  ADD CONSTRAINT `role_utilisateur_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_utilisateur_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

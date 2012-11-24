-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Sam 24 Novembre 2012 à 15:28
-- Version du serveur: 5.5.27
-- Version de PHP: 5.4.7

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
  `id_entreprise` int(11) NOT NULL,
  `id_groupe` int(11) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `delegue` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_entreprise` (`id_entreprise`),
  KEY `id_groupe` (`id_groupe`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Contenu de la table `eleve`
--

INSERT INTO `eleve` (`id`, `nom`, `prenom`, `photo`, `email`, `id_entreprise`, `id_groupe`, `telephone`, `delegue`) VALUES
(15, 'Romain', 'lansari', 'Romain_lansari.gif', 'gourgan.hic@', 4, 0, '111', 0),
(16, 'achraf', 'hicham', 'achraf_hicham.gif', 'peace-und-loove@hotmail.com', 5, 0, '6123456', 0),
(19, 'nomeleve3', 'prenomeleve3', 'nomeleve3_prenomeleve3.jpg', 'email_eleve3@gmail.com', 1, 0, '2147483647', 0),
(20, 'nomeleve4', 'prenomeleve4', 'nomeleve4_prenomeleve4.jpg', 'email_eleve4@gmail.com', 1, 0, '2147483647', 0),
(21, 'nomeleve5', 'prenomeleve5', 'nomeleve5_prenomeleve5.jpg', 'email_eleve5@gmail.com', 1, 0, '2147483647', 0),
(22, 'nomeleve6', 'prenomeleve6', 'nomeleve6_prenomeleve6.jpg', 'email_eleve6@gmail.com', 1, 0, '2147483647', 0),
(23, 'nomeleve7', 'prenomeleve7', 'nomeleve7_prenomeleve7.jpg', 'email_eleve7@gmail.com', 17, 0, '2147483647', 0),
(24, 'nomeleve8', 'prenomeleve8', 'nomeleve8_prenomeleve8.jpg', 'email_eleve8@gmail.com', 1, 0, '2147483647', 0),
(25, 'nomeleve9', 'prenomeleve9', 'nomeleve9_prenomeleve9.jpg', 'email_eleve9@gmail.com', 1, 0, '2147483647', 0),
(26, 'nomeleve10', 'prenomeleve10', 'nomeleve10_prenomeleve10.jpg', 'email_eleve10@gmail.com', 1, 0, '2147483647', 0),
(27, 'nomeleve11', 'prenomeleve11', 'nomeleve11_prenomeleve11.jpg', 'email_eleve11@gmail.com', 1, 0, '2147483647', 0),
(28, 'nomeleve12', 'prenomeleve12', 'nomeleve12_prenomeleve12.jpg', 'email_eleve12@gmail.com', 1, 0, '2147483647', 0),
(29, '', '', 'nothing.jpg', '', 1, 0, '0', 0);

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE IF NOT EXISTS `entreprise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `telephone` varchar(10) DEFAULT NULL,
  `email` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `entreprise`
--

INSERT INTO `entreprise` (`id`, `nom`, `adresse`, `telephone`, `email`) VALUES
(1, 'a', 'b', '1', 'aa'),
(2, '22', 'hhhhhhhhhhh', '333', '344'),
(3, '22', 'yyyyyy', '333', '344'),
(4, '22', 'hjhjghghgvghv', '333', '344'),
(5, 'azertplm12E', '', '658741478', 'a@gm.com'),
(6, 'beloa', '', '0614587921', 'a@gm.com'),
(7, 'az', 'aa', '0612457815', ''),
(8, 'azertplm12E', 'a', '0612457815', 'a@gm.com'),
(9, 'atur', 'a', '0614587914', 'a@g'),
(10, '', '', '', ''),
(11, '', '', '', ''),
(12, '', '', '', ''),
(13, '', '', '', ''),
(14, '', '', '', ''),
(15, '', '', '', ''),
(16, '', '', '', ''),
(17, 'az', 'aa', '0612457815', 'a@gm.com');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `horaire`
--

INSERT INTO `horaire` (`id`, `date`, `quand`, `matiere`, `abrev_intervenant`) VALUES
(1, '2012-10-19', 'matin', 'php5', 'LR'),
(2, '2012-10-19', 'apres-midi', 'poo', 'JR'),
(3, '2012-01-07', 'matin', 'et aussi ca', ''),
(4, '2012-01-07', 'matin', 'et aussi ca', '');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `role`
--

INSERT INTO `role` (`id`, `nom`) VALUES
(1, 'delegué'),
(2, 'responsable');

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
(2, 5);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `login`, `mdp`, `nom`, `prenom`, `email`, `telephone`, `picture`, `Alias`) VALUES
(2, 'hicham', 'd033e22ae348aeb5660fc2140aec35850c4da997', '', '', '', '', '', ''),
(3, 'lansari', 'd033e22ae348aeb5660fc2140aec35850c4da997', '', '', 'peace-und-loove@hotmail.com', '', '', ''),
(5, 'lansari2', 'd033e22ae348aeb5660fc2140aec35850c4da997', '', '', '11', '', '', ''),
(6, 'aa', 'amzpol', 'ayt', 'achraf', 'achraflansari@gmail.com', '0658741479', 'nothing.jpg', '3b');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `eleve`
--
ALTER TABLE `eleve`
  ADD CONSTRAINT `eleve_ibfk_2` FOREIGN KEY (`id_entreprise`) REFERENCES `entreprise` (`id`);

--
-- Contraintes pour la table `role_utilisateur`
--
ALTER TABLE `role_utilisateur`
  ADD CONSTRAINT `role_utilisateur_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_utilisateur_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

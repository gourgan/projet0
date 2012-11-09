-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 19 Octobre 2012 à 16:40
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Contenu de la table `absence`
--

INSERT INTO `absence` (`id`, `id_horaire`, `id_eleve`, `statut`, `justificatif`) VALUES
(41, 1, 21, '0', ''),
(42, 1, 22, '0', ''),
(43, 1, 19, '0', ''),
(44, 2, 19, '0', ''),
(45, 2, 20, '0', ''),
(46, 1, 21, '0', ''),
(47, 2, 20, '0', ''),
(48, 2, 21, '0', ''),
(49, 1, 20, '0', ''),
(50, 2, 21, '0', ''),
(51, 2, 16, '0', ''),
(52, 1, 19, '0', ''),
(53, 0, 19, '0', ''),
(54, 0, 20, '0', ''),
(55, 0, 21, '0', ''),
(56, 0, 22, '0', ''),
(57, 0, 23, '0', ''),
(58, 0, 24, '0', '');

-- --------------------------------------------------------

--
-- Structure de la table `acteur`
--

CREATE TABLE IF NOT EXISTS `acteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(200) DEFAULT NULL,
  `mdp` varchar(200) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `acteur`
--

INSERT INTO `acteur` (`id`, `login`, `mdp`, `email`, `role`) VALUES
(2, 'hicham', 'd033e22ae348aeb5660fc2140aec35850c4da997', '', 'intervenant'),
(3, 'lansari', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'peace-und-loove@hotmail.com', 'Responsable'),
(5, 'lansari2', 'd033e22ae348aeb5660fc2140aec35850c4da997', '11', 'Responsable');

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
  `telephone` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_entreprise` (`id_entreprise`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Contenu de la table `eleve`
--

INSERT INTO `eleve` (`id`, `nom`, `prenom`, `photo`, `email`, `id_entreprise`, `telephone`) VALUES
(15, 'Romain', 'lansari', 'Romain_lansari.gif', 'gourgan.hic@', 4, 111),
(16, 'achraf', 'hicham', 'achraf_hicham.gif', 'peace-und-loove@hotmail.com', 1, 6123456),
(19, 'nomeleve3', 'prenomeleve3', 'nomeleve3_prenomeleve3.jpg', 'email_eleve3@gmail.com', 1, 2147483647),
(20, 'nomeleve4', 'prenomeleve4', 'nomeleve4_prenomeleve4.jpg', 'email_eleve4@gmail.com', 1, 2147483647),
(21, 'nomeleve5', 'prenomeleve5', 'nomeleve5_prenomeleve5.jpg', 'email_eleve5@gmail.com', 1, 2147483647),
(22, 'nomeleve6', 'prenomeleve6', 'nomeleve6_prenomeleve6.jpg', 'email_eleve6@gmail.com', 1, 2147483647),
(23, 'nomeleve7', 'prenomeleve7', 'nomeleve7_prenomeleve7.jpg', 'email_eleve7@gmail.com', 1, 2147483647),
(24, 'nomeleve8', 'prenomeleve8', 'nomeleve8_prenomeleve8.jpg', 'email_eleve8@gmail.com', 1, 2147483647),
(25, 'nomeleve9', 'prenomeleve9', 'nomeleve9_prenomeleve9.jpg', 'email_eleve9@gmail.com', 1, 2147483647),
(26, 'nomeleve10', 'prenomeleve10', 'nomeleve10_prenomeleve10.jpg', 'email_eleve10@gmail.com', 1, 2147483647),
(27, 'nomeleve11', 'prenomeleve11', 'nomeleve11_prenomeleve11.jpg', 'email_eleve11@gmail.com', 1, 2147483647),
(28, 'nomeleve12', 'prenomeleve12', 'nomeleve12_prenomeleve12.jpg', 'email_eleve12@gmail.com', 1, 2147483647);

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE IF NOT EXISTS `entreprise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `telephone` int(10) DEFAULT NULL,
  `email` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `entreprise`
--

INSERT INTO `entreprise` (`id`, `nom`, `adresse`, `telephone`, `email`) VALUES
(1, 'a', 'b', 1, 'aa'),
(2, '22', 'hhhhhhhhhhh', 333, '344'),
(3, '22', 'yyyyyy', 333, '344'),
(4, '22', 'hjhjghghgvghv', 333, '344');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `horaire`
--

INSERT INTO `horaire` (`id`, `date`, `quand`, `matiere`, `abrev_intervenant`) VALUES
(1, '2012-10-19', 'matin', 'php5', 'LR'),
(2, '2012-10-19', 'apres-midi', 'poo', 'JR');

-- --------------------------------------------------------

--
-- Structure de la table `intervenant`
--

CREATE TABLE IF NOT EXISTS `intervenant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(15) NOT NULL,
  `prenom` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `alias` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `intervenant`
--

INSERT INTO `intervenant` (`id`, `nom`, `prenom`, `email`, `tel`, `picture`, `alias`) VALUES
(4, 'a', 'a', 'a', '065', 'a_a.gif', 'a');

-- --------------------------------------------------------

--
-- Structure de la table `option`
--

CREATE TABLE IF NOT EXISTS `option` (
  `nom` varchar(200) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `eleve`
--
ALTER TABLE `eleve`
  ADD CONSTRAINT `eleve_ibfk_1` FOREIGN KEY (`id_entreprise`) REFERENCES `entreprise` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

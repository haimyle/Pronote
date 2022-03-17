-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 17, 2022 at 01:09 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hme_pronote`
--

-- --------------------------------------------------------

--
-- Table structure for table `bloc_heure`
--

DROP TABLE IF EXISTS `bloc_heure`;
CREATE TABLE IF NOT EXISTS `bloc_heure` (
  `id_bloc` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `heure_debut` time DEFAULT NULL,
  `heure_fin` time DEFAULT NULL,
  `ref_classe` int(11) NOT NULL,
  `ref_professeur` int(11) NOT NULL,
  `ref_matiere` int(11) NOT NULL,
  PRIMARY KEY (`id_bloc`),
  KEY `fk_bloc_heure_classe` (`ref_classe`),
  KEY `fk_bloc_heure_professeur` (`ref_professeur`),
  KEY `fk_bloc_heure_matiere` (`ref_matiere`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `classe`;
CREATE TABLE IF NOT EXISTS `classe` (
  `id_class` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id_classe`)
  KEY `fk_classe_devoir` (`ref_devoir`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Dumping data for table `class`
--

INSERT INTO `classe` (`id_classe`, `nom`) VALUES
(1, 'SIO SLAM 1');

--
-- Table structure for table `devoir`
--

DROP TABLE IF EXISTS `devoir`;
CREATE TABLE IF NOT EXISTS `devoir` (
  `id_devoir` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `recaptitulatif` varchar(1000) COLLATE latin1_bin DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `ref_professeur` int(11) NOT NULL,
  PRIMARY KEY (`id_devoir`),
  KEY `fk_devoir_professeur` (`ref_professeur`)
  KEY `fk_devoir_classe` (`ref_classe`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `id_etudiant` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `prenom` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `email` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `password` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `ref_class` int(11) NOT NULL,
  PRIMARY KEY (`id_etudiant`),
  KEY `fk_etudiant_classe` (`ref_classe`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`id_etudiant`, `nom`, `prenom`, `email`, `password`, `ref_class`) VALUES
(1, 'Le', 'Hai My', 'hme@lprs.fr', '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `matiere`
--

DROP TABLE IF EXISTS `matiere`;
CREATE TABLE IF NOT EXISTS `matiere` (
  `id_matiere` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  PRIMARY KEY (`id_matiere`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

DROP TABLE IF EXISTS `professeur`;
CREATE TABLE IF NOT EXISTS `matiere` (
  `id_professeur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `prenom` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `email` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `password` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `role` varchar(50) COLLATE latin1_bin DEFAULT 'professeur',
  PRIMARY KEY (`id_professeur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bloc_heure`
--
ALTER TABLE `bloc_heure`
  ADD CONSTRAINT `fk_bloc_heure_classe` FOREIGN KEY (`ref_classe`) REFERENCES `class` (`id_classe`),
  ADD CONSTRAINT `fk_bloc_heure_matiere` FOREIGN KEY (`ref_matiere`) REFERENCES `matiere` (`id_matiere`),
  ADD CONSTRAINT `fk_bloc_heure_professeur` FOREIGN KEY (`ref_professeur`) REFERENCES `professeur` (`id_professeur`);


--
-- Constraints for table `devoir`
--
ALTER TABLE `devoir`
  ADD CONSTRAINT `fk_devoir_classe` FOREIGN KEY (`ref_classe`) REFERENCES `classe` (`id_classe`),
  ADD CONSTRAINT `fk_devoir_professeur` FOREIGN KEY (`ref_professeur`) REFERENCES `professeur` (`id_professeur`);

ALTER TABLE `classe`
  ADD CONSTRAINT `fk_classe_devoir` FOREIGN KEY (`ref_devoir`) REFERENCES `devoir` (`id_devoir`);
-- ADD CONSTRAINT `fk_devoir_class_devoir` FOREIGN KEY (`ref_devoir`) REFERENCES `devoir` (`id_devoir`);
ALTER TABLE `etudiant`
  ADD CONSTRAINT `fk_etudiant_classe` FOREIGN KEY (`ref_classe`) REFERENCES `classe` (`id_classe`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

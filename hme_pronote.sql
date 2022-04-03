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
  `id_bh` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(50) NOT NULL,
  `heure_debut` time NOT NULL,
  `heure_fin` time NOT NULL,
  `ref_classe` int(11) NOT NULL,
  `ref_professeur` int(11) NOT NULL,
  `ref_matiere` int(11) NOT NULL,
  PRIMARY KEY (`id_bh`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `classe`;
CREATE TABLE IF NOT EXISTS `classe` (
  `id_classe` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id_classe`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classe`
--

INSERT INTO `classe` (`id_classe`, `nom`) VALUES
(1, 'SIO SLAM 1');

--
-- Table structure for table `devoir`
--

DROP TABLE IF EXISTS `devoir`;
CREATE TABLE IF NOT EXISTS `devoir` (
  `id_devoir` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50)NOT NULL,
  `recap` varchar(1000) NOT NULL,
  `deadline` date NOT NULL,
  `ref_professeur` int(11) NOT NULL,
  PRIMARY KEY (`id_devoir`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `id_etudiant` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE latin1_bin NOT NULL,
  `prenom` varchar(50) COLLATE latin1_bin NOT NULL,
  `email` varchar(50) COLLATE latin1_bin NOT NULL,
  `password` varchar(50) COLLATE latin1_bin NOT NULL,
  `ref_classe` int(11) NOT NULL,
  PRIMARY KEY (`id_etudiant`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`id_etudiant`, `nom`, `prenom`, `email`, `password`, `ref_classe`) VALUES
(1, 'Le', 'Hai My', 'my@lprs.fr', '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `matiere`
--

DROP TABLE IF EXISTS `matiere`;
CREATE TABLE IF NOT EXISTS `matiere` (
  `id_matiere` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id_matiere`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `professeur`;
CREATE TABLE IF NOT EXISTS `professeur` (
  `id_professeur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) DEFAULT 'professeur',
  PRIMARY KEY (`id_professeur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

DROP TABLE IF EXISTS `ClasseDevoir`;
CREATE TABLE IF NOT EXISTS `ClasseDevoir` (
  `ref_classe` int(11) NOT NULL,
  `ref_devoir` int(11) NOT NULL,
  PRIMARY KEY (`ref_classe`,`ref_devoir`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `ClasseProfesseur`;
CREATE TABLE IF NOT EXISTS `ClasseProfesseur` (
  `ref_classe` int(11) NOT NULL,
  `ref_professeur` int(11) NOT NULL,
  PRIMARY KEY (`ref_classe`,`ref_professeur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables

ALTER TABLE `bloc_heure`
  ADD CONSTRAINT `fk_bloc_heure_classe` FOREIGN KEY (`ref_classe`) REFERENCES `classe` (`id_classe`),
  ADD CONSTRAINT `fk_bloc_heure_matiere` FOREIGN KEY (`ref_matiere`) REFERENCES `matiere` (`id_matiere`),
  ADD CONSTRAINT `fk_bloc_heure_professeur` FOREIGN KEY (`ref_professeur`) REFERENCES `professeur` (`id_professeur`);

ALTER TABLE `devoir`
  ADD CONSTRAINT `fk_devoir_professeur` FOREIGN KEY (`ref_professeur`) REFERENCES `professeur` (`id_professeur`);

ALTER TABLE `etudiant`
  ADD CONSTRAINT `fk_etudiant_classe` FOREIGN KEY (`ref_classe`) REFERENCES `classe` (`id_classe`);

ALTER TABLE `ClasseProfesseur`
  ADD CONSTRAINT `fk_ClasseProfesseur_professeur` FOREIGN KEY (`ref_professeur`) REFERENCES `professeur` (`id_professeur`),
  ADD CONSTRAINT `fk_ClasseProfesseur_classe` FOREIGN KEY (`ref_classe`) REFERENCES `classe` (`id_classe`);

ALTER TABLE `ClasseDevoir`
  ADD CONSTRAINT `fk_ClasseDevoir_professeur` FOREIGN KEY (`ref_devoir`) REFERENCES `devoir` (`id_devoir`),
  ADD CONSTRAINT `fk_ClasseDevoir_classe` FOREIGN KEY (`ref_classe`) REFERENCES `classe` (`id_classe`);
COMMIT;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

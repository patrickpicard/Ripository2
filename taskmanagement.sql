-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 26 juin 2019 à 15:58
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `taskmanagement`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `idcategory` int(11) NOT NULL AUTO_INCREMENT,
  `Categorydescription` varchar(45) NOT NULL,
  PRIMARY KEY (`idcategory`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`idcategory`, `Categorydescription`) VALUES
(1, 'professionnel'),
(2, 'personnel'),
(3, 'medical');

-- --------------------------------------------------------

--
-- Structure de la table `group`
--

DROP TABLE IF EXISTS `group`;
CREATE TABLE IF NOT EXISTS `group` (
  `idgroup` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(45) NOT NULL,
  PRIMARY KEY (`idgroup`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `group`
--

INSERT INTO `group` (`idgroup`, `description`) VALUES
(1, 'reunion');

-- --------------------------------------------------------

--
-- Structure de la table `task`
--

DROP TABLE IF EXISTS `task`;
CREATE TABLE IF NOT EXISTS `task` (
  `idtask` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(45) NOT NULL,
  `idcategory` int(11) NOT NULL,
  `date` date NOT NULL,
  `comment` varchar(250) DEFAULT NULL,
  `iduser` int(11) NOT NULL,
  `idgroup` int(11) NOT NULL,
  PRIMARY KEY (`idtask`),
  KEY `fk_task_category1` (`idcategory`),
  KEY `fk_task_group1` (`idgroup`),
  KEY `fk_task_user1` (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `task`
--

INSERT INTO `task` (`idtask`, `description`, `idcategory`, `date`, `comment`, `iduser`, `idgroup`) VALUES
(14, 'rdv', 3, '2019-06-24', 'lkjkjh\r\ntest', 22, 1),
(15, 'dentiste', 3, '2019-06-24', 'prendre ordonnance', 22, 1),
(17, 'ZEF', 1, '2019-06-24', 'wvx wvf', 22, 1),
(18, 'rdv', 2, '2019-06-24', 'aaa', 22, 1),
(21, 'fsghsf', 1, '0019-06-25', 'sfhsf', 22, 1),
(23, 'dentiste', 2, '2019-06-25', 'EFSD', 22, 1),
(30, 'TEST PATRICK', 2, '2019-06-28', 'DBBCBC', 24, 1),
(39, '12', 3, '2019-06-26', '122121', 24, 1),
(40, 'fsgggdgd', 2, '2019-06-26', 'wdfhwfh', 23, 1),
(41, 'wcvwd', 1, '2019-06-29', 'dwh', 23, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `pseudo` varchar(45) NOT NULL,
  `firstName` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `confirm` varchar(45) NOT NULL,
  `level` int(11) NOT NULL,
  `idGroup` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idUser`),
  KEY `fk_user_group` (`idGroup`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idUser`, `name`, `pseudo`, `firstName`, `password`, `confirm`, `level`, `idGroup`) VALUES
(22, 'chalençon', 'bibi', 'Pierre-jean', '187ef4436122d1cc2f40dc2b92f0eba0', '187ef4436122d1cc2f40dc2b92f0eba0', 1, 1),
(23, 'GUERBOUKHA', 'Billel', 'Billel', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 1, 1),
(24, 'Picard', 'Papi', 'Patrick', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 1, 1),
(25, 'Laura', 'Laura', 'Laura', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', 1, 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `fk_task_category1` FOREIGN KEY (`idcategory`) REFERENCES `category` (`idcategory`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_task_group1` FOREIGN KEY (`idgroup`) REFERENCES `group` (`idgroup`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_task_user1` FOREIGN KEY (`iduser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_group` FOREIGN KEY (`idGroup`) REFERENCES `group` (`idgroup`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

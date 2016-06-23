-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 10 Novembre 2013 à 19:51
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `tms`
--
CREATE DATABASE IF NOT EXISTS `tms` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tms`;

-- --------------------------------------------------------

--
-- Structure de la table `activity`
--

CREATE TABLE IF NOT EXISTS `activity` (
  `ActivID` int(11) NOT NULL AUTO_INCREMENT,
  `ActivName` varchar(45) NOT NULL,
  `ActivDescription` text,
  PRIMARY KEY (`ActivID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `activity`
--

INSERT INTO `activity` (`ActivID`, `ActivName`, `ActivDescription`) VALUES
(1, 'Entretien', ''),
(2, 'Dépannage', '');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `ClientID` int(11) NOT NULL AUTO_INCREMENT,
  `CltName` varchar(45) NOT NULL,
  `CltAdress` varchar(200) DEFAULT NULL,
  `CltPhone` varchar(45) DEFAULT NULL,
  `CltEmail` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ClientID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`ClientID`, `CltName`, `CltAdress`, `CltPhone`, `CltEmail`) VALUES
(1, 'Moez Banmassoud', 'Sfax', '22114455', 'moez@gmail.com'),
(2, 'Ahmed Trabelsi', 'Tunis', '55114488', 'ahmed@gmail.com'),
(3, 'zefzr', 'klnjk', '', 'sqcac@caea.ca'),
(4, 'xxxxxx', NULL, NULL, NULL),
(5, 'feafaf', NULL, NULL, NULL),
(6, 'wswsws', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `dossier`
--

CREATE TABLE IF NOT EXISTS `dossier` (
  `DossierID` int(11) NOT NULL AUTO_INCREMENT,
  `DossierTitle` varchar(45) NOT NULL,
  `DossierNote` text,
  `RefStateID` int(11) NOT NULL,
  `RefClientID` int(11) NOT NULL,
  PRIMARY KEY (`DossierID`),
  KEY `FR_Dossier_1_idx` (`RefStateID`),
  KEY `FR_Dossier_2_idx` (`RefClientID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `dossier`
--

INSERT INTO `dossier` (`DossierID`, `DossierTitle`, `DossierNote`, `RefStateID`, `RefClientID`) VALUES
(1, 'Dossier 1', 'KJKJNJN', 1, 1),
(2, 'Dossier 2', 'dsgzgsgz zgzgzg zegzgzg', 3, 2),
(3, 'Dossier 3', 'dzgzr', 1, 1),
(4, 'Dossier 4', 'eafef', 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `GroupID` int(11) NOT NULL AUTO_INCREMENT,
  `GroupName` varchar(45) NOT NULL,
  `GroupDescription` text,
  PRIMARY KEY (`GroupID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `group`
--

INSERT INTO `group` (`GroupID`, `GroupName`, `GroupDescription`) VALUES
(1, 'Admin', ''),
(2, 'Manager', NULL),
(3, 'Standard', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `history`
--

CREATE TABLE IF NOT EXISTS `history` (
  `HistoryID` int(11) NOT NULL AUTO_INCREMENT,
  `Action` text NOT NULL,
  `DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `RefTaskID` int(11) NOT NULL,
  `RefUserID` int(11) NOT NULL,
  PRIMARY KEY (`HistoryID`),
  KEY `FK_history_1_idx` (`RefTaskID`),
  KEY `FK_history_2_idx` (`RefUserID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=302 ;

--
-- Contenu de la table `history`
--

INSERT INTO `history` (`HistoryID`, `Action`, `DateTime`, `RefTaskID`, `RefUserID`) VALUES
(31, 'Task Created', '2013-10-21 02:14:50', 31, 1),
(42, 'Update DateTime', '2013-10-21 16:02:28', 31, 1),
(43, 'Change AssignedTo', '2013-10-21 16:23:21', 31, 1),
(46, 'Task Created', '2013-10-21 16:56:03', 33, 1),
(47, 'Update DateTime', '2013-10-21 16:56:28', 33, 1),
(58, 'Task Created', '2013-10-23 06:54:11', 44, 1),
(59, 'update maintainers', '2013-10-23 06:54:30', 44, 1),
(60, 'Task Created', '2013-10-23 08:52:44', 45, 1),
(62, 'Update DateTime', '2013-10-23 08:54:22', 33, 1),
(63, 'Update DateTime', '2013-10-23 08:54:24', 33, 1),
(65, 'eeeeeedddd', '2013-10-23 11:22:35', 45, 1),
(66, 'gdfgg', '2013-10-23 11:23:08', 45, 1),
(67, 'bbbb', '2013-10-23 11:23:40', 45, 1),
(68, 'ffffffff', '2013-10-23 11:31:56', 45, 1),
(73, 'Task Created', '2013-10-23 11:34:00', 47, 1),
(74, 'Task Created', '2013-10-23 12:15:12', 48, 1),
(75, 'Update DateTime', '2013-10-23 12:24:34', 45, 1),
(76, 'Update DateTime', '2013-10-23 12:24:36', 48, 1),
(77, 'Update DateTime', '2013-10-23 12:24:38', 48, 1),
(79, 'Update DateTime', '2013-10-23 12:24:43', 45, 1),
(80, 'Update DateTime', '2013-10-23 12:24:48', 45, 1),
(81, 'Update DateTime', '2013-10-23 12:25:36', 45, 1),
(82, 'Update DateTime', '2013-10-23 12:25:39', 45, 1),
(83, 'Update DateTime', '2013-10-23 12:25:49', 33, 1),
(84, 'Update DateTime', '2013-10-23 12:25:58', 33, 1),
(85, 'Update DateTime', '2013-10-23 12:27:52', 44, 1),
(86, 'Update DateTime', '2013-10-23 12:28:12', 45, 1),
(87, 'Update DateTime', '2013-10-23 12:28:36', 45, 1),
(88, 'Update DateTime', '2013-10-23 12:30:09', 45, 1),
(89, 'Update DateTime', '2013-10-23 12:30:13', 33, 1),
(90, 'Update DateTime', '2013-10-23 12:30:18', 33, 1),
(91, 'Update DateTime', '2013-10-23 12:32:12', 45, 1),
(94, 'Update DateTime', '2013-10-23 12:35:35', 45, 1),
(95, 'Update DateTime', '2013-10-23 12:35:41', 45, 1),
(96, 'Update DateTime', '2013-10-23 12:35:48', 45, 1),
(97, 'Update DateTime', '2013-10-23 12:35:49', 45, 1),
(98, 'Update DateTime', '2013-10-23 12:35:51', 45, 1),
(99, 'Update DateTime', '2013-10-23 12:35:52', 44, 1),
(100, 'Update DateTime', '2013-10-23 12:35:56', 44, 1),
(101, 'Update DateTime', '2013-10-23 12:39:55', 48, 1),
(102, 'Update DateTime', '2013-10-23 12:39:58', 45, 1),
(103, 'Update DateTime', '2013-10-23 12:40:01', 33, 1),
(109, 'Update DateTime', '2013-10-23 12:40:34', 47, 1),
(110, 'kjhlkjb:', '2013-10-23 12:40:45', 33, 1),
(111, 'Update DateTime', '2013-10-23 12:41:42', 33, 1),
(113, 'Update DateTime', '2013-10-23 12:41:49', 31, 1),
(114, 'Update DateTime', '2013-10-23 12:41:52', 31, 1),
(115, 'Update DateTime', '2013-10-23 12:41:55', 47, 1),
(117, 'Update DateTime', '2013-10-23 12:42:06', 45, 1),
(118, 'Update DateTime', '2013-10-23 12:42:07', 48, 1),
(119, 'Update DateTime', '2013-10-23 12:42:08', 45, 1),
(120, 'Update DateTime', '2013-10-23 12:42:09', 44, 1),
(121, 'Update DateTime', '2013-10-23 12:42:11', 44, 1),
(122, 'Update DateTime', '2013-10-23 12:42:12', 48, 1),
(123, 'Update DateTime', '2013-10-23 12:42:13', 48, 1),
(124, 'Update DateTime', '2013-10-23 12:42:14', 48, 1),
(127, 'Update DateTime', '2013-10-23 12:42:24', 47, 1),
(128, 'Update DateTime', '2013-10-23 12:42:27', 47, 1),
(129, 'Update DateTime', '2013-10-23 12:48:34', 45, 1),
(130, 'Update DateTime', '2013-10-23 12:48:36', 48, 1),
(131, 'Update DateTime', '2013-10-23 12:48:39', 44, 1),
(133, 'Update DateTime', '2013-10-23 13:12:29', 47, 1),
(134, 'Update DateTime', '2013-10-23 13:12:31', 47, 1),
(135, 'Update DateTime', '2013-10-23 13:12:33', 45, 1),
(136, 'Update DateTime', '2013-10-23 13:12:34', 45, 1),
(137, 'Update DateTime', '2013-10-23 13:12:35', 48, 1),
(138, 'Update DateTime', '2013-10-23 13:12:37', 48, 1),
(139, 'Update DateTime', '2013-10-23 13:12:38', 44, 1),
(140, 'Update DateTime', '2013-10-23 13:12:39', 44, 1),
(149, 'modif maintainers', '2013-10-24 03:17:25', 31, 1),
(150, 'update maintainers', '2013-10-24 03:17:47', 31, 1),
(151, 'zvzvzv', '2013-10-24 04:04:52', 31, 1),
(152, 'zvzvzv', '2013-10-24 04:05:45', 31, 1),
(153, 'zefze', '2013-10-24 05:19:05', 31, 1),
(154, 'gjsj', '2013-10-24 05:19:18', 31, 1),
(158, 'Update DateTime', '2013-10-24 08:05:48', 48, 1),
(161, 'Update DateTime', '2013-10-24 08:07:03', 48, 1),
(164, 'Update DateTime', '2013-10-24 08:07:15', 48, 1),
(165, 'Update DateTime', '2013-10-24 08:07:23', 33, 1),
(166, 'Update DateTime', '2013-10-24 08:10:04', 48, 1),
(167, 'Update DateTime', '2013-10-24 08:10:07', 48, 1),
(169, 'Update DateTime', '2013-10-24 08:10:12', 48, 1),
(170, 'Update DateTime', '2013-10-24 08:10:13', 48, 1),
(171, 'Update DateTime', '2013-10-24 08:10:15', 48, 1),
(173, 'Task Created', '2013-10-24 13:09:02', 52, 1),
(174, 'Update DateTime', '2013-10-24 13:13:35', 47, 1),
(175, 'Update DateTime', '2013-10-24 13:13:36', 45, 1),
(176, 'Update DateTime', '2013-10-24 13:13:37', 45, 1),
(177, 'Update DateTime', '2013-10-24 13:13:38', 44, 1),
(178, 'Update DateTime', '2013-10-24 13:13:39', 44, 1),
(179, 'Update DateTime', '2013-10-24 13:13:41', 47, 1),
(180, 'Update DateTime', '2013-10-24 13:13:42', 47, 1),
(181, 'Update DateTime', '2013-10-24 13:21:22', 48, 1),
(184, 'Update DateTime', '2013-10-24 13:27:20', 48, 1),
(185, 'Update DateTime', '2013-10-24 13:27:22', 48, 1),
(189, 'Update DateTime', '2013-10-24 13:54:20', 48, 1),
(190, 'Update DateTime', '2013-10-24 13:54:25', 47, 1),
(191, 'Update DateTime', '2013-10-24 13:54:27', 45, 1),
(192, 'Update DateTime', '2013-10-24 13:54:38', 33, 1),
(194, 'Update DateTime', '2013-10-24 13:54:40', 31, 1),
(195, 'Update DateTime', '2013-10-24 13:54:43', 44, 1),
(197, 'Task Created', '2013-10-24 13:56:11', 54, 1),
(201, 'Task Created', '2013-10-24 17:23:15', 55, 3),
(202, 'update title', '2013-10-24 17:23:37', 55, 3),
(205, 'Update DateTime', '2013-10-24 18:25:34', 44, 2),
(206, 'Update DateTime', '2013-10-25 01:17:14', 44, 2),
(207, 'Update DateTime', '2013-10-25 01:17:16', 48, 2),
(208, 'Update DateTime', '2013-10-25 01:17:18', 48, 2),
(209, 'Update DateTime', '2013-10-25 01:17:19', 48, 2),
(210, 'Update DateTime', '2013-10-25 01:17:22', 48, 2),
(211, 'Update DateTime', '2013-10-25 01:17:24', 48, 2),
(215, 'Update DateTime', '2013-10-25 01:19:39', 44, 2),
(216, 'Update DateTime', '2013-10-25 01:19:40', 44, 2),
(217, 'Update DateTime', '2013-10-25 01:19:42', 44, 2),
(218, 'gl,l:g', '2013-10-25 01:19:59', 44, 2),
(226, 'Update DateTime', '2013-10-25 01:33:16', 31, 1),
(227, 'Update DateTime', '2013-10-25 01:33:17', 31, 1),
(229, 'dgjdg', '2013-10-27 04:35:36', 47, 1),
(232, 'Update DateTime', '2013-10-27 04:36:29', 48, 1),
(233, 'uttl', '2013-10-27 04:37:01', 33, 1),
(234, 'Task Created', '2013-10-27 07:20:16', 57, 1),
(235, 'lgftygv', '2013-10-27 07:20:38', 33, 1),
(236, 'Task Created', '2013-10-28 01:26:34', 58, 4),
(237, 'avancement du project', '2013-10-28 01:41:57', 54, 1),
(238, 'finishide', '2013-10-28 01:42:35', 54, 1),
(240, 'Task Created', '2013-11-04 17:31:52', 60, 3),
(241, 'Task Created', '2013-11-04 17:51:59', 61, 3),
(246, 'Task Created', '2013-11-06 15:44:01', 63, 1),
(247, 'xxxxxxxxxx', '2013-11-06 17:13:36', 31, 1),
(249, 'Update DateTime', '2013-11-06 23:24:44', 63, 1),
(250, 'lknkln', '2013-11-06 23:25:11', 63, 1),
(251, 'Update DateTime', '2013-11-06 23:25:20', 63, 1),
(254, 'Tâche créée', '2013-11-07 17:36:42', 64, 1),
(255, 'dvzvzvz', '2013-11-07 18:02:44', 31, 1),
(256, 'eféef', '2013-11-07 18:10:23', 31, 1),
(257, 'eféef', '2013-11-07 18:12:00', 31, 1),
(258, 'fh,', '2013-11-07 18:12:11', 31, 1),
(259, 'eafe', '2013-11-07 18:19:56', 31, 1),
(260, 'efée', '2013-11-07 18:20:53', 31, 1),
(261, 'eafef', '2013-11-07 18:29:58', 31, 1),
(262, 'qfdsdg', '2013-11-07 18:33:24', 31, 1),
(263, 'Modification de la date', '2013-11-08 23:54:43', 63, 1),
(264, 'Modification de la date', '2013-11-08 23:54:46', 63, 1),
(265, 'Modification de la date', '2013-11-08 23:54:47', 63, 1),
(266, 'Modification de la date', '2013-11-08 23:54:54', 63, 1),
(267, 'Modification de la date', '2013-11-08 23:54:59', 63, 1),
(268, 'Modification de la date', '2013-11-08 23:55:09', 63, 1),
(269, 'Modification de la date', '2013-11-08 23:55:14', 63, 1),
(270, 'Modification de la date', '2013-11-08 23:55:15', 63, 1),
(271, 'Modification de la date', '2013-11-08 23:55:19', 63, 1),
(272, 'Modification de la date', '2013-11-08 23:55:21', 63, 1),
(273, 'Modification de la date', '2013-11-08 23:55:23', 63, 1),
(274, 'Modification de la date', '2013-11-08 23:55:24', 63, 1),
(275, 'Modification de la date', '2013-11-08 23:56:00', 63, 1),
(276, 'Modification de la date', '2013-11-08 23:56:02', 63, 1),
(277, 'Modification de la date', '2013-11-08 23:56:05', 63, 1),
(278, 'Modification de la date', '2013-11-08 23:56:07', 63, 1),
(279, 'Modification de la date', '2013-11-08 23:56:16', 63, 1),
(280, 'Modification de la date', '2013-11-09 00:03:41', 63, 1),
(281, 'Modification de la date', '2013-11-09 00:03:42', 63, 1),
(282, 'Modification de la date', '2013-11-09 00:03:43', 63, 1),
(283, 'Modification de la date', '2013-11-09 00:03:45', 63, 1),
(284, 'fyktul', '2013-11-09 00:05:14', 33, 1),
(285, 'Modification de la date', '2013-11-09 00:05:38', 33, 1),
(286, 'Modification de la date', '2013-11-09 00:05:41', 33, 1),
(287, 'Modification de la date', '2013-11-09 00:05:45', 33, 1),
(288, 'Modification de la date', '2013-11-09 00:05:47', 33, 1),
(289, 'Modification de la date', '2013-11-09 00:05:48', 33, 1),
(290, 'change dossier', '2013-11-09 00:53:39', 63, 1),
(291, 'ezf', '2013-11-09 00:54:23', 63, 1),
(292, 'Tâche créée', '2013-11-09 00:55:00', 65, 1),
(293, 'ddddddd', '2013-11-09 00:56:39', 47, 1),
(294, 'eafef', '2013-11-09 00:57:41', 47, 1),
(295, 'afeaf', '2013-11-09 00:59:08', 54, 1),
(296, 'aefaefae', '2013-11-09 01:00:38', 54, 1),
(297, 'Tâche créée', '2013-11-09 01:18:32', 66, 1),
(298, 'aefeafae', '2013-11-09 01:18:44', 66, 1),
(299, 'aefa', '2013-11-09 01:20:18', 66, 1),
(300, 'bjlhkl', '2013-11-09 01:20:32', 66, 1),
(301, 'dfzeg', '2013-11-09 01:31:27', 44, 1);

-- --------------------------------------------------------

--
-- Structure de la table `jqcalendar`
--

CREATE TABLE IF NOT EXISTS `jqcalendar` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Subject` varchar(1000) DEFAULT NULL,
  `Location` varchar(200) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `StartTime` datetime DEFAULT NULL,
  `EndTime` datetime DEFAULT NULL,
  `IsAllDayEvent` smallint(6) NOT NULL,
  `Color` varchar(200) DEFAULT NULL,
  `RecurringRule` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `jqcalendar`
--

INSERT INTO `jqcalendar` (`Id`, `Subject`, `Location`, `Description`, `StartTime`, `EndTime`, `IsAllDayEvent`, `Color`, `RecurringRule`) VALUES
(1, 'ssss', NULL, NULL, '2013-10-18 00:00:00', '2013-10-18 00:00:00', 1, NULL, NULL),
(2, 'mmmm', NULL, NULL, '2013-10-02 00:00:00', '2013-10-02 00:00:00', 1, NULL, NULL),
(3, 'bbbb', NULL, NULL, '2013-10-09 00:00:00', '2013-10-09 00:00:00', 1, NULL, NULL),
(4, 'pppp', NULL, NULL, '2013-10-10 00:00:00', '2013-10-10 00:00:00', 1, NULL, NULL),
(5, 'ccc', NULL, NULL, '2013-10-16 00:00:00', '2013-10-16 00:00:00', 1, NULL, NULL),
(6, 'xxx', NULL, NULL, '2013-10-11 00:00:00', '2013-10-11 00:00:00', 1, NULL, NULL),
(7, 'wwww', NULL, NULL, '2013-10-17 00:00:00', '2013-10-17 00:00:00', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `maintainer`
--

CREATE TABLE IF NOT EXISTS `maintainer` (
  `MaintainerID` int(11) NOT NULL AUTO_INCREMENT,
  `MaintName` varchar(45) NOT NULL,
  `MaintAdress` varchar(200) DEFAULT NULL,
  `MaintPhone` varchar(45) DEFAULT NULL,
  `MaintEmail` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`MaintainerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `maintainer`
--

INSERT INTO `maintainer` (`MaintainerID`, `MaintName`, `MaintAdress`, `MaintPhone`, `MaintEmail`) VALUES
(1, 'Mohamed', 'Sfax', '20141414', 'med@gmail.com'),
(2, 'Bilel', 'Sfax', '98121212', 'bilel@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `ServID` int(11) NOT NULL AUTO_INCREMENT,
  `ServName` varchar(45) NOT NULL,
  `ServDescription` text,
  PRIMARY KEY (`ServID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `service`
--

INSERT INTO `service` (`ServID`, `ServName`, `ServDescription`) VALUES
(1, 'Ascenseur', '');

-- --------------------------------------------------------

--
-- Structure de la table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `StateID` int(11) NOT NULL AUTO_INCREMENT,
  `StateName` varchar(45) NOT NULL,
  `StateColor` varchar(45) NOT NULL,
  PRIMARY KEY (`StateID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `state`
--

INSERT INTO `state` (`StateID`, `StateName`, `StateColor`) VALUES
(1, 'En Cours', '10'),
(2, 'Fermé', '1'),
(3, 'Terminé', '7');

-- --------------------------------------------------------

--
-- Structure de la table `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `TaskID` int(11) NOT NULL AUTO_INCREMENT,
  `TaskTitle` varchar(45) NOT NULL,
  `TaskDescription` text,
  `TaskStart` datetime NOT NULL,
  `TaskEnd` datetime NOT NULL,
  `PercentComplete` tinyint(3) unsigned DEFAULT NULL,
  `TravailFait` text NOT NULL,
  `TravailRestant` text NOT NULL,
  `File` varchar(100) DEFAULT NULL,
  `RefClientID` int(11) NOT NULL,
  `RefStateID` int(11) NOT NULL,
  `RefServiceID` int(11) NOT NULL,
  `RefActivityID` int(11) NOT NULL,
  `UserOwner` int(11) NOT NULL,
  `AssignedTo` int(11) NOT NULL,
  `RefDossierID` int(11) DEFAULT NULL,
  PRIMARY KEY (`TaskID`),
  KEY `FR_task_1_idx` (`RefClientID`),
  KEY `FR_task_2_idx` (`RefStateID`),
  KEY `FR_task_3_idx` (`RefServiceID`),
  KEY `FR_task_4_idx` (`RefActivityID`),
  KEY `FR_task_5_idx` (`UserOwner`),
  KEY `FR_task_6_idx` (`AssignedTo`),
  KEY `RefDossierID` (`RefDossierID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=67 ;

--
-- Contenu de la table `task`
--

INSERT INTO `task` (`TaskID`, `TaskTitle`, `TaskDescription`, `TaskStart`, `TaskEnd`, `PercentComplete`, `TravailFait`, `TravailRestant`, `File`, `RefClientID`, `RefStateID`, `RefServiceID`, `RefActivityID`, `UserOwner`, `AssignedTo`, `RefDossierID`) VALUES
(31, 'ffffffffff', 'jrjrjryjryj', '2013-10-24 05:30:00', '2013-10-24 08:00:00', 10, '', '', '527bdc268a3aa.png', 3, 1, 1, 1, 1, 1, 1),
(33, 'QQQ1111', 'jhkjlkb hbjbj', '2013-10-25 07:30:00', '2013-10-25 10:00:00', 10, 'wdgsh', 'hkt', NULL, 1, 1, 1, 1, 1, 2, 1),
(44, 'gfgf', '', '2013-10-23 01:30:00', '2013-10-23 06:00:00', 10, '', '', NULL, 6, 2, 1, 1, 1, 3, NULL),
(45, 'dczczev', '', '2013-10-25 11:30:00', '2013-10-25 15:00:00', 10, '', '', NULL, 1, 2, 1, 1, 1, 1, NULL),
(47, 'dddddd1111', '', '2013-10-24 09:00:00', '2013-10-24 12:30:00', 10, 'fzef', 'gnryj', NULL, 1, 1, 1, 1, 1, 1, 1),
(48, 'To Mahdi', '', '2013-10-26 01:00:00', '2013-10-26 04:00:00', 10, '', '', NULL, 1, 1, 1, 1, 1, 2, NULL),
(52, 'ev2', '', '2013-10-30 19:00:00', '2013-10-30 21:00:00', 10, '', '', NULL, 1, 1, 1, 1, 1, 2, NULL),
(54, 'bbbbbbb', '', '2013-10-31 02:30:00', '2013-10-31 06:30:00', 100, '', '', NULL, 3, 3, 1, 1, 1, 1, 4),
(55, 'ccccccc', '', '2013-10-24 03:00:00', '2013-10-24 07:30:00', 10, '', '', NULL, 1, 1, 1, 1, 3, 3, NULL),
(57, 'mlmlm', '', '2013-10-24 02:30:00', '2013-10-24 04:30:00', 10, 'kjhbiljbi', 'ghvkgvj', NULL, 1, 1, 1, 1, 1, 1, NULL),
(58, 'hello', 'world', '2013-10-25 00:00:00', '2013-10-25 00:00:00', 10, 'blablah', 'ieheie', NULL, 1, 1, 1, 2, 4, 4, NULL),
(60, 'lklklk', '', '2013-11-14 00:00:00', '2013-11-14 00:00:00', 10, '', '', NULL, 1, 1, 1, 1, 3, 3, NULL),
(61, 'grzgz', '', '2013-11-06 04:30:00', '2013-11-06 08:30:00', 10, '', '', NULL, 1, 2, 1, 1, 3, 3, 2),
(63, 'rreerer', '', '2013-11-09 03:15:00', '2013-11-09 06:15:00', 10, '', '', NULL, 1, 1, 1, 1, 1, 1, 3),
(64, 'ddvqv', '', '2013-11-06 14:00:00', '2013-11-06 19:00:00', 10, '', '', NULL, 1, 1, 1, 1, 1, 1, NULL),
(65, 'afeafa', '', '2013-11-07 04:15:00', '2013-11-07 07:15:00', 10, 'eaf', 'eafaffezfzefze', NULL, 1, 1, 1, 1, 1, 1, 3),
(66, 'eafaef', 'aefae', '2013-11-06 02:45:00', '2013-11-06 04:30:00', 10, 'aef', 'aef', NULL, 5, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `taskmaintainer`
--

CREATE TABLE IF NOT EXISTS `taskmaintainer` (
  `TaskMaintainerID` int(11) NOT NULL AUTO_INCREMENT,
  `RefTaskID` int(11) NOT NULL,
  `RefMaintainerID` int(11) NOT NULL,
  PRIMARY KEY (`TaskMaintainerID`),
  KEY `FK_taskMaintainer_1_idx` (`RefTaskID`),
  KEY `FK_taskMaintainer_2_idx` (`RefMaintainerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=192 ;

--
-- Contenu de la table `taskmaintainer`
--

INSERT INTO `taskmaintainer` (`TaskMaintainerID`, `RefTaskID`, `RefMaintainerID`) VALUES
(69, 45, 1),
(75, 48, 1),
(76, 48, 2),
(145, 52, 1),
(153, 55, 1),
(163, 57, 1),
(164, 57, 2),
(167, 58, 1),
(173, 60, 1),
(174, 61, 1),
(175, 33, 1),
(176, 33, 2),
(177, 65, 1),
(180, 47, 1),
(181, 47, 2),
(184, 54, 1),
(185, 54, 2),
(189, 66, 1),
(190, 44, 1),
(191, 44, 2);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(45) NOT NULL,
  `Login` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Active` tinyint(1) NOT NULL DEFAULT '1',
  `RefGroupID` int(11) NOT NULL,
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `Login_UNIQUE` (`Login`),
  KEY `FK_user_1_idx` (`RefGroupID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`UserID`, `UserName`, `Login`, `Password`, `Email`, `Active`, `RefGroupID`) VALUES
(1, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 1, 1),
(2, 'Mahdi Mastouri', 'mahdi', 'f9c24b8f961d48841a9838cca5274d8d', 'mahdi.mastouri@gmail.com', 1, 2),
(3, 'Mugabo', 'mugabo', '890c3dcb4a248b023a6aad28c0fb2219', 'mugabo@gmail.com', 1, 3),
(4, 'mugar', 'mugar', 'c33367701511b4f6020ec61ded352059', 'mugarmug@gmail.com', 1, 3),
(5, 'test', 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@test.fr', 1, 3);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `dossier`
--
ALTER TABLE `dossier`
  ADD CONSTRAINT `FR_Dossier_1` FOREIGN KEY (`RefStateID`) REFERENCES `state` (`StateID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FR_Dossier_2` FOREIGN KEY (`RefClientID`) REFERENCES `client` (`ClientID`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `FK_history_2` FOREIGN KEY (`RefUserID`) REFERENCES `user` (`UserID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`RefTaskID`) REFERENCES `task` (`TaskID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `FR_task_1` FOREIGN KEY (`RefClientID`) REFERENCES `client` (`ClientID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FR_task_2` FOREIGN KEY (`RefStateID`) REFERENCES `state` (`StateID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FR_task_3` FOREIGN KEY (`RefServiceID`) REFERENCES `service` (`ServID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FR_task_4` FOREIGN KEY (`RefActivityID`) REFERENCES `activity` (`ActivID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FR_task_5` FOREIGN KEY (`UserOwner`) REFERENCES `user` (`UserID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FR_task_6` FOREIGN KEY (`AssignedTo`) REFERENCES `user` (`UserID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FR_task_7` FOREIGN KEY (`RefDossierID`) REFERENCES `dossier` (`DossierID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `taskmaintainer`
--
ALTER TABLE `taskmaintainer`
  ADD CONSTRAINT `FK_taskMaintainer_1` FOREIGN KEY (`RefTaskID`) REFERENCES `task` (`TaskID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_taskMaintainer_2` FOREIGN KEY (`RefMaintainerID`) REFERENCES `maintainer` (`MaintainerID`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_user_1` FOREIGN KEY (`RefGroupID`) REFERENCES `group` (`GroupID`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

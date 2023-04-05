-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1:3308
-- 生成日期： 2023-04-05 21:49:41
-- 服务器版本： 8.0.31
-- PHP 版本： 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `boostcamp`
--

-- --------------------------------------------------------

--
-- 表的结构 `cours`
--

DROP TABLE IF EXISTS `cours`;
CREATE TABLE IF NOT EXISTS `cours` (
  `id_cours` int NOT NULL AUTO_INCREMENT,
  `fichi_name` varchar(1000) NOT NULL,
  `id_prof` int DEFAULT NULL,
  `image` varchar(10000) DEFAULT NULL,
  `introduction` varchar(1000) DEFAULT NULL,
  `cours_name` varchar(1000) DEFAULT NULL,
  `prof_name` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id_cours`),
  UNIQUE KEY `id_cours` (`id_cours`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 转存表中的数据 `cours`
--

INSERT INTO `cours` (`id_cours`, `fichi_name`, `id_prof`, `image`, `introduction`, `cours_name`, `prof_name`) VALUES
(1, 'projet hackathon 2022 23 v2.pptx', 1, 'https://th.bing.com/th/id/OIP.HgtQfYbBS6L05y3H_AZrCgHaEr?pid=ImgDet&rs=1', 'hackathon', 'Projet hackathon', 'RENDLER Elisabeth'),
(2, 'Numérique Responsable', 2, 'image/logo.png', 'Numérique Responsable', 'Numérique Responsable', 'FLÉCHEUX BERTRAND');

-- --------------------------------------------------------

--
-- 表的结构 `edu`
--

DROP TABLE IF EXISTS `edu`;
CREATE TABLE IF NOT EXISTS `edu` (
  `id_edu` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `code` int NOT NULL,
  PRIMARY KEY (`id_edu`),
  UNIQUE KEY `id_edu` (`id_edu`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 转存表中的数据 `edu`
--

INSERT INTO `edu` (`id_edu`, `name`, `email`, `code`) VALUES
(1, 'paul', '1@qq.com', 1),
(2, 'zhan', '2@qq.com', 1),
(3, 'yannick', '3@qq.com', 1),
(4, 'christian', '4@qq.com', 1);

-- --------------------------------------------------------

--
-- 表的结构 `fiche`
--

DROP TABLE IF EXISTS `fiche`;
CREATE TABLE IF NOT EXISTS `fiche` (
  `id_fiche` int NOT NULL AUTO_INCREMENT,
  `fiche_name` varchar(1000) DEFAULT NULL,
  `id_prof` int DEFAULT NULL,
  `id_cours` int DEFAULT NULL,
  PRIMARY KEY (`id_fiche`),
  UNIQUE KEY `id_fiche` (`id_fiche`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 转存表中的数据 `fiche`
--

INSERT INTO `fiche` (`id_fiche`, `fiche_name`, `id_prof`, `id_cours`) VALUES
(1, 'projet hackathon 2022 23 v2.pptx', 1, 1),
(2, 'Numérique Responsable', 2, 2);

-- --------------------------------------------------------

--
-- 表的结构 `prof`
--

DROP TABLE IF EXISTS `prof`;
CREATE TABLE IF NOT EXISTS `prof` (
  `id_prof` int NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) DEFAULT NULL,
  `email` varchar(10000) DEFAULT NULL,
  `code` int DEFAULT NULL,
  PRIMARY KEY (`id_prof`),
  UNIQUE KEY `id_prof` (`id_prof`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 转存表中的数据 `prof`
--

INSERT INTO `prof` (`id_prof`, `name`, `email`, `code`) VALUES
(1, 'RENDLER Elisabeth', 'rendler@qq.com', 1),
(2, 'FLÉCHEUX BERTRAND', 'flecheux@qq.com', 1);

-- --------------------------------------------------------

--
-- 表的结构 `relation`
--

DROP TABLE IF EXISTS `relation`;
CREATE TABLE IF NOT EXISTS `relation` (
  `id_cours` int DEFAULT NULL,
  `id_edu` int DEFAULT NULL,
  `id_prof` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 转存表中的数据 `relation`
--

INSERT INTO `relation` (`id_cours`, `id_edu`, `id_prof`) VALUES
(1, 1, 1),
(1, 2, 1),
(2, 1, 2),
(2, 2, 2),
(2, 3, 2),
(2, 4, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

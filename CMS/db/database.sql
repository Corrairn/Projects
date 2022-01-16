-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 18 юни 2018 в 09:14
-- Версия на сървъра: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mycms`
--

-- --------------------------------------------------------

--
-- Структура на таблица `albums`
--

DROP TABLE IF EXISTS `albums`;
CREATE TABLE IF NOT EXISTS `albums` (
  `ID` int(255) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `Record_title` varchar(100) NOT NULL COMMENT 'Record_title',
  `Performer` varchar(100) NOT NULL COMMENT 'Performer',
  `name1` varchar(255) NOT NULL COMMENT 'name1',
  `name2` varchar(255) NOT NULL COMMENT 'name2',
  `name3` varchar(255) NOT NULL COMMENT 'name3',
  `name4` varchar(255) NOT NULL COMMENT 'name4',
  `name5` varchar(255) NOT NULL COMMENT 'name5',
  `name6` varchar(255) NOT NULL COMMENT 'name6',
  `name7` varchar(255) NOT NULL COMMENT 'name7',
  `name8` varchar(255) NOT NULL COMMENT 'name8',
  `name9` varchar(255) NOT NULL COMMENT 'name9',
  `name10` varchar(255) NOT NULL COMMENT 'name10',
  `name11` varchar(255) NOT NULL COMMENT 'name11',
  `name12` varchar(255) NOT NULL COMMENT 'name12',
  `name13` varchar(255) NOT NULL COMMENT 'name13',
  `name14` varchar(255) NOT NULL COMMENT 'name14',
  `name15` varchar(255) NOT NULL COMMENT 'name15',
  `name16` varchar(255) NOT NULL COMMENT 'name16',
  `name17` varchar(255) NOT NULL COMMENT 'name17',
  `name18` varchar(255) NOT NULL COMMENT 'name18',
  `name19` varchar(255) NOT NULL COMMENT 'name19',
  `name20` varchar(255) NOT NULL COMMENT 'name20',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура на таблица `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `page_views` int(11) NOT NULL DEFAULT '0',
  `date_created` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура на таблица `page_categories`
--

DROP TABLE IF EXISTS `page_categories`;
CREATE TABLE IF NOT EXISTS `page_categories` (
  `page_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  KEY `page_id` (`page_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `page_categories`
--

INSERT INTO `page_categories` (`page_id`, `name`) VALUES
(1, 'Other'),
(1, 'Stuff'),
(1, 'Music'),
(1, 'Fiction');

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `birth_date` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

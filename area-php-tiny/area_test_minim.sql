-- phpMyAdmin SQL Dump
-- version 2.11.8.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Temps de generació: 04-05-2009 a les 22:59:56
-- Versió del servidor: 5.0.67
-- PHP versió: 5.2.6-2ubuntu4.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de dades: `area_test_minim`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `minim`
--

CREATE TABLE IF NOT EXISTS `minim` (
  `id` int(11) NOT NULL auto_increment,
  `parameter1` varchar(200) NOT NULL default '0',
  `parameter2` varchar(200) NOT NULL default '0',
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Bolcant dades de la taula `minim`
--

INSERT INTO `minim` (`id`, `parameter1`, `parameter2`) VALUES
(1, '0', '0'),
(2, '0', '1'),
(3, '0', '1'),
(4, '0', '1'),
(5, '1', '0'),
(6, '0', '1'),
(7, '1', '0'),
(8, '0', '1'),
(9, '0', '1'),
(10, '1', '0'),
(11, '0', '1'),
(12, '1', '0'),
(13, '1', '1'),
(14, '2', '0'),
(15, '2', '0'),
(16, '2', '0'),
(17, '2', '0'),
(18, '2', '0'),
(19, '2', '0'),
(20, '2', '0'),
(21, '2', '0'),
(22, '2', '0'),
(23, '2', '0'),
(24, '3', '0'),
(25, '3', '0');

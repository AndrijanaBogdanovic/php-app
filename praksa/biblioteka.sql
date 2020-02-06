-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 30, 2019 at 12:27 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biblioteka`
--

-- --------------------------------------------------------

--
-- Table structure for table `izdavac`
--

DROP TABLE IF EXISTS `izdavac`;
CREATE TABLE IF NOT EXISTS `izdavac` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `izdavac`
--

INSERT INTO `izdavac` (`id`, `naziv`) VALUES
(1, 'vulkan'),
(2, 'laguna'),
(3, 'skolska knjiga');

-- --------------------------------------------------------

--
-- Table structure for table `klijent`
--

DROP TABLE IF EXISTS `klijent`;
CREATE TABLE IF NOT EXISTS `klijent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(100) NOT NULL,
  `prezime` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sifra` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klijent`
--

INSERT INTO `klijent` (`id`, `ime`, `prezime`, `email`, `sifra`) VALUES
(4, 'Biljana', 'Acimovic', 'biljana@gmail.com', '123'),
(5, 'Marko', 'Markovic', 'marko@gmail.com', '321'),
(6, 'Pera', 'Peric', 'pera@gmail.com', '456'),
(7, 'Pera', 'Markovic', 'blabla@gmail.com', 'aaa');

-- --------------------------------------------------------

--
-- Table structure for table `knjiga`
--

DROP TABLE IF EXISTS `knjiga`;
CREATE TABLE IF NOT EXISTS `knjiga` (
  `naziv` varchar(100) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_oblasti` int(11) NOT NULL,
  `id_zanra` int(11) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `id_izdavaca` int(11) NOT NULL,
  `slika` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `knjiga`
--

INSERT INTO `knjiga` (`naziv`, `id`, `id_oblasti`, `id_zanra`, `autor`, `id_izdavaca`, `slika`) VALUES
('stranca', 13, 1, 2, 'albert kami', 1, '5cefc3e07570a6.13026815.jpg'),
('Zlocin i kazna', 12, 1, 4, 'Fjodor Dostojevski', 2, '5cef7a45676ee8.54389398.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `oblast`
--

DROP TABLE IF EXISTS `oblast`;
CREATE TABLE IF NOT EXISTS `oblast` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oblast`
--

INSERT INTO `oblast` (`id`, `naziv`) VALUES
(1, 'beletristika'),
(2, 'strucna literatura'),
(3, 'decija knjizevnost');

-- --------------------------------------------------------

--
-- Table structure for table `porudzbina`
--

DROP TABLE IF EXISTS `porudzbina`;
CREATE TABLE IF NOT EXISTS `porudzbina` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_klijenta` int(11) NOT NULL,
  `id_knjige` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `porudzbina`
--

INSERT INTO `porudzbina` (`id`, `id_klijenta`, `id_knjige`) VALUES
(8, 4, 9),
(6, 4, 10),
(16, 4, 11),
(17, 4, 12),
(18, 4, 8),
(19, 4, 12);

-- --------------------------------------------------------

--
-- Table structure for table `zanr`
--

DROP TABLE IF EXISTS `zanr`;
CREATE TABLE IF NOT EXISTS `zanr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zanr`
--

INSERT INTO `zanr` (`id`, `naziv`) VALUES
(1, 'SF'),
(2, 'triler'),
(3, 'drama'),
(4, 'krimi'),
(5, 'bajke');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

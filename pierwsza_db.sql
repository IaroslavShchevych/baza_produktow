-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 10, 2017 at 11:21 AM
-- Server version: 5.6.13
-- PHP Version: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pierwsza_db`
--
CREATE DATABASE IF NOT EXISTS `pierwsza_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pierwsza_db`;

-- --------------------------------------------------------

--
-- Table structure for table `dostawca`
--

CREATE TABLE IF NOT EXISTS `dostawca` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(50) NOT NULL,
  `kraj` varchar(50) NOT NULL,
  `kontakt` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `dostawca`
--

INSERT INTO `dostawca` (`id`, `nazwa`, `kraj`, `kontakt`) VALUES
(1, 'MilkyWay', 'Belgia', '555-666-656, mw@milkyway.com'),
(2, 'Pollos Hermanos', 'Meksika', '00 758 865 445, lospollos@hermanos.com'),
(3, 'Pan Kurczak', 'Polska', 'dostawa@pk.pl'),
(4, 'Torczyn', 'Ukraina', '+38 044 524 23 32'),
(5, 'Verde Verde', 'Portugalia', 'verde@verde.com'),
(6, 'Polskie Pomidory', 'Polska', '56-452, Zgorzelec, Pomidorowa, 1'),
(7, 'Senior Pomidor', 'Wlochy', '80934, Via Alpia, Sycylia, t. 00343 454 76 33');

-- --------------------------------------------------------

--
-- Table structure for table `list`
--

CREATE TABLE IF NOT EXISTS `list` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `szczegoly` text NOT NULL,
  `data_wpisu` varchar(30) NOT NULL,
  `czas_wpisu` time NOT NULL,
  `data_edytowania` varchar(30) NOT NULL,
  `czas_edytowania` time NOT NULL,
  `publiczny` varchar(5) NOT NULL,
  `dostawca_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `list`
--

INSERT INTO `list` (`product_id`, `szczegoly`, `data_wpisu`, `czas_wpisu`, `data_edytowania`, `czas_edytowania`, `publiczny`, `dostawca_id`) VALUES
(1, 'Ryba', 'June 09, 2017', '04:51:25', '', '00:00:00', 'yes', 4),
(3, 'Salad', 'June 09, 2017', '16:24:07', '', '00:00:00', 'yes', 3),
(5, 'Kurczak', 'June 09, 2017', '16:24:33', '', '00:00:00', 'yes', 2),
(6, 'Zemniaki', 'June 09, 2017', '16:24:48', '', '00:00:00', 'no', 5),
(8, 'PstrÄ…g', 'June 10, 2017', '05:52:30', '', '00:00:00', 'yes', 0),
(9, 'Kasza jaglana', 'June 10, 2017', '05:52:50', '', '00:00:00', 'yes', 0),
(10, 'Mleko', 'June 10, 2017', '07:50:01', '', '00:00:00', 'yes', 0),
(22, 'Pstrag', 'June 10, 2017', '08:49:03', '', '00:00:00', 'no', 0),
(23, 'Pstrag', 'June 10, 2017', '08:52:19', '', '00:00:00', 'yes', 5),
(24, 'Mleko', 'June 10, 2017', '08:53:10', '', '00:00:00', 'no', 1),
(25, 'Rawioli', 'June 10, 2017', '08:53:31', '', '00:00:00', 'no', 5),
(27, 'Kielbasa', 'June 10, 2017', '09:11:30', '', '00:00:00', 'yes', 0),
(28, 'Mleko', 'June 10, 2017', '09:12:38', '', '00:00:00', 'no', 0),
(29, 'Mleko', 'June 10, 2017', '09:13:51', '', '00:00:00', 'no', 4),
(30, 'Salad', 'June 10, 2017', '10:02:18', '', '00:00:00', 'no', 2);

-- --------------------------------------------------------

--
-- Table structure for table `uzytkowniki`
--

CREATE TABLE IF NOT EXISTS `uzytkowniki` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imie` varchar(50) NOT NULL,
  `haslo` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `uzytkowniki`
--

INSERT INTO `uzytkowniki` (`id`, `imie`, `haslo`) VALUES
(1, 'Jarek', '12345');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

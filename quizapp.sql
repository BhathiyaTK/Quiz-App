-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 18, 2019 at 01:38 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `question` varchar(225) NOT NULL,
  `one` varchar(225) NOT NULL,
  `two` varchar(225) NOT NULL,
  `three` varchar(225) NOT NULL,
  `four` varchar(225) NOT NULL,
  `correct_answer` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `one`, `two`, `three`, `four`, `correct_answer`) VALUES
(1, 'In which one of following year UNO was formed?', '1945', '1952', '1965', '1932', '1945'),
(2, 'In 2010 which one of following won Women\'s Singles title in French Open?', 'Cristiano Renaldo', 'Lionel Messy', 'Roger Federer', 'Francesca Schiavone', 'Francesca Schiavone'),
(3, 'In terms of land area, which one of following country ranks second in world?', 'America', 'Brazil', 'Italy', 'Canada', 'Canada'),
(4, 'Which is the first search engine in internet?', 'Google', 'Archie', 'Altavista', 'WAIS', 'Archie'),
(5, 'Number of bit used by the IPv6 address?', '32 bit', '64 bit', '128 bit', '256 bit', '128 bit'),
(6, 'Which one is the first web browser invented in 1990?', 'Internet Explorer', 'Mosaic', 'Mozilla', 'Nexus', 'Nexus'),
(7, 'Which of the programming language is used to create programs like applets?', 'COBOL', 'C Language', 'Java', 'BASIC', 'Java'),
(8, 'First computer virus is known as,', 'Rabbit', 'Creeper Virus', 'Elk Cloner', 'SCA Virus', 'Creeper Virus'),
(9, 'Which of the following is not a database management software?', 'MySQL', 'Oracle', 'Sybase', 'COBOL', 'COBOL'),
(10, 'Where is the headquarter of Microsoft office located ', 'Texas', 'New York', 'California', 'Washington', 'Washington');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(225) NOT NULL,
  `last_name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `confirm_password` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `confirm_password`) VALUES
(1, 'Bhathiya', 'Kariyawasam', 'bk@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

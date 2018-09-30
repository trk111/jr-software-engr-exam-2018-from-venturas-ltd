-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 30, 2018 at 06:44 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ventures`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `id` int(11) NOT NULL,
  `developer` int(11) NOT NULL,
  `language` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `developer`, `language`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 2, 3),
(5, 3, 2),
(6, 4, 1),
(7, 4, 2),
(8, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `data_pl`
--

CREATE TABLE IF NOT EXISTS `data_pl` (
  `id` int(11) NOT NULL,
  `developer` int(11) NOT NULL,
  `programming_language` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pl`
--

INSERT INTO `data_pl` (`id`, `developer`, `programming_language`) VALUES
(1, 1, 4),
(2, 1, 1),
(3, 2, 3),
(4, 2, 6),
(5, 3, 2),
(6, 3, 5),
(7, 4, 2),
(8, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `developers`
--

CREATE TABLE IF NOT EXISTS `developers` (
  `id` int(11) NOT NULL,
  `name` varchar(55) CHARACTER SET utf8 NOT NULL,
  `email` varchar(55) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `developers`
--

INSERT INTO `developers` (`id`, `name`, `email`) VALUES
(1, 'Md Tarek Hasan', 'tarek@gmail.com'),
(2, 'Victor', 'victor@gmail.com'),
(3, 'Mehedi', 'mehedi@gmail.com'),
(4, 'Sakib', 'sakib@gmail.com'),
(5, 'raisul', 'ivan.smit@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `code` varchar(5) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `code`) VALUES
(1, 'Bangla', 'bn'),
(2, 'English', 'en'),
(3, 'Swedish', 'sw');

-- --------------------------------------------------------

--
-- Table structure for table `programming_languages`
--

CREATE TABLE IF NOT EXISTS `programming_languages` (
  `id` int(11) NOT NULL,
  `name` varchar(15) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programming_languages`
--

INSERT INTO `programming_languages` (`id`, `name`) VALUES
(1, 'PHP'),
(2, 'Java'),
(3, 'Python'),
(4, 'JS'),
(5, 'Perl'),
(6, 'Ruby & Rails');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_pl`
--
ALTER TABLE `data_pl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `developers`
--
ALTER TABLE `developers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `programming_languages`
--
ALTER TABLE `programming_languages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `data_pl`
--
ALTER TABLE `data_pl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `developers`
--
ALTER TABLE `developers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `programming_languages`
--
ALTER TABLE `programming_languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

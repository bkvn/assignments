-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 06, 2012 at 12:40 AM
-- Server version: 5.5.9
-- PHP Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `movies`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `genre` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `director` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `release_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` VALUES(1, 'One Flew Over the Cuckoo''s Nest', 'Drama', 'Milos Forman', '1975-11-21');
INSERT INTO `movies` VALUES(2, 'The Dark Knight ', 'Action', 'Christopher Nolan', '2008-07-18');
INSERT INTO `movies` VALUES(3, 'Little Miss Sunshine', 'Comedy-Drama', 'Jonathan Dayton', '2006-08-18');
INSERT INTO `movies` VALUES(4, 'Once Upon a Time in Anatolia', 'Crime-Drama', 'Nuri Bilge Ceylan', '2011-09-23');
INSERT INTO `movies` VALUES(5, 'Robocop', 'Action', 'Paul Verhoeven', '1987-07-17');

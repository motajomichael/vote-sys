-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2015 at 03:30 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `voting_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE IF NOT EXISTS `candidates` (
`candidateID` int(11) NOT NULL,
  `fullName` text NOT NULL,
  `positionID` int(11) NOT NULL,
  `photoPath` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`candidateID`, `fullName`, `positionID`, `photoPath`) VALUES
(1, 'Kwasi Yonkopa', 1, 'kwasi_yonkopa.jpg'),
(4, 'Tony Stark', 2, 'tony_stark.jpg'),
(5, 'Gomashie Wisdom', 3, 'gomashie_wisdom.jpg'),
(8, 'mavis', 4, 'mavis.jpg'),
(9, 'valajega', 5, 'valajega.jpg'),
(10, 'who', 6, 'who.jpg'),
(11, 'abena', 5, 'abena.jpg'),
(12, 'someone', 7, 'someone.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE IF NOT EXISTS `positions` (
`positionID` int(11) NOT NULL,
  `positionCaption` tinytext NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`positionID`, `positionCaption`) VALUES
(1, 'President'),
(2, 'Vice President '),
(3, 'Treasurer'),
(4, 'Local NUGS'),
(5, 'Womens Commissioner'),
(6, 'FMRT Rep'),
(7, 'FOE Rep');

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE IF NOT EXISTS `voters` (
`ID` int(11) NOT NULL,
  `voterID` int(11) NOT NULL,
  `email_address` tinytext NOT NULL,
  `registered` int(1) NOT NULL DEFAULT '0',
  `password` varchar(8) NOT NULL,
  `voted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`ID`, `voterID`, `email_address`, `registered`, `password`, `voted`) VALUES
(1, 42108841, 'tgkregis@gmail.com', 1, 'mypass1', 1),
(2, 43214547, 'airoman9@yahoo.com', 1, '376zernx', 0);

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE IF NOT EXISTS `votes` (
`ID` int(11) NOT NULL,
  `positionID` int(11) NOT NULL,
  `voterID` int(11) NOT NULL,
  `candidateID` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=76 ;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`ID`, `positionID`, `voterID`, `candidateID`) VALUES
(8, 1, 42108841, 1),
(9, 2, 42108841, 4),
(10, 3, 42108841, 3),
(11, 1, 42108841, 1),
(12, 2, 42108841, 4),
(13, 3, 42108841, 3),
(14, 1, 42108841, 2),
(15, 2, 42108841, 4),
(16, 3, 42108841, 3),
(17, 4, 42108841, 8),
(18, 5, 42108841, 9),
(19, 6, 42108841, 10),
(20, 1, 42108841, 2),
(21, 2, 42108841, 4),
(22, 3, 42108841, 3),
(23, 4, 42108841, 8),
(24, 5, 42108841, 9),
(25, 6, 42108841, 10),
(26, 7, 42108841, 0),
(27, 1, 42108841, 2),
(28, 2, 42108841, 4),
(29, 3, 42108841, 3),
(30, 4, 42108841, 8),
(31, 5, 42108841, 9),
(32, 6, 42108841, 10),
(33, 7, 42108841, 12),
(34, 1, 42108841, 2),
(35, 2, 42108841, 4),
(36, 3, 42108841, 3),
(37, 4, 42108841, 8),
(38, 5, 42108841, 9),
(39, 6, 42108841, 10),
(40, 7, 42108841, 12),
(41, 1, 42108841, 2),
(42, 2, 42108841, 4),
(43, 3, 42108841, 3),
(44, 4, 42108841, 8),
(45, 5, 42108841, 9),
(46, 6, 42108841, 10),
(47, 7, 42108841, 12),
(48, 1, 42108841, 1),
(49, 2, 42108841, 4),
(50, 3, 42108841, 3),
(51, 4, 42108841, 8),
(52, 5, 42108841, 9),
(53, 6, 42108841, 10),
(54, 7, 42108841, 12),
(55, 1, 42108841, 7),
(56, 2, 42108841, 4),
(57, 3, 42108841, 3),
(58, 4, 42108841, 8),
(59, 5, 42108841, 9),
(60, 6, 42108841, 10),
(61, 7, 42108841, 12),
(62, 1, 42108841, 7),
(63, 2, 42108841, 4),
(64, 3, 42108841, 3),
(65, 4, 42108841, 8),
(66, 5, 42108841, 9),
(67, 6, 42108841, 10),
(68, 7, 42108841, 12),
(69, 1, 42108841, 1),
(70, 2, 42108841, 4),
(71, 3, 42108841, 5),
(72, 4, 42108841, 8),
(73, 5, 42108841, 9),
(74, 6, 42108841, 10),
(75, 7, 42108841, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
 ADD PRIMARY KEY (`candidateID`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
 ADD PRIMARY KEY (`positionID`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
MODIFY `candidateID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
MODIFY `positionID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=76;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

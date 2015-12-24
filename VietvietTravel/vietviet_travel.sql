-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2015 at 05:11 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vietviet_travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
`id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` int(11) DEFAULT '1',
  `briefinfo` text NOT NULL,
  `smallimg` varchar(255) NOT NULL,
  `detailinfo` varchar(255) NOT NULL,
  `regdate` datetime DEFAULT NULL,
  `editdate` datetime DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `hot` int(11) NOT NULL DEFAULT '0',
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `booktour`
--

CREATE TABLE IF NOT EXISTS `booktour` (
`id` int(11) NOT NULL,
  `id_tour` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `nation` varchar(255) DEFAULT NULL,
  `nadults` int(11) DEFAULT NULL,
  `listname` varchar(2048) DEFAULT NULL,
  `child` int(11) DEFAULT '0',
  `childinfo` text,
  `depdate` date DEFAULT NULL,
  `idea` text,
  `visa` int(11) DEFAULT NULL,
  `usebefore` int(11) DEFAULT '0',
  `reciveinfo` int(11) DEFAULT '0',
  `paymethod` varchar(255) DEFAULT NULL,
  `knwthrough` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
`id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `nation` varchar(255) NOT NULL,
  `message` text,
  `usebefore` int(11) DEFAULT '0',
  `receiveinfo` int(11) DEFAULT '0',
  `knwthrough` varchar(255) DEFAULT NULL,
  `regdate` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE IF NOT EXISTS `hotel` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `star` int(11) DEFAULT '0',
  `id_location` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `briefinfo` text NOT NULL,
  `detailinfo` text,
  `smallimg` varchar(100) DEFAULT NULL,
  `largeimg` varchar(1024) DEFAULT NULL,
  `regdate` datetime DEFAULT NULL,
  `editdate` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `infocompany`
--

CREATE TABLE IF NOT EXISTS `infocompany` (
`id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `license` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `skype` varchar(255) DEFAULT NULL,
  `zalo` varchar(255) DEFAULT NULL,
  `yahoo` varchar(255) DEFAULT NULL,
  `viber` varchar(255) DEFAULT NULL,
  `map` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE IF NOT EXISTS `slide` (
`id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tour`
--

CREATE TABLE IF NOT EXISTS `tour` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `id_tourtype` int(11) DEFAULT NULL,
  `code` varchar(50) NOT NULL,
  `length` int(11) NOT NULL,
  `startfrom` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `briefinfo` text,
  `detailinfo` text,
  `smallimg` varchar(255) NOT NULL,
  `largeimg` varchar(255) NOT NULL,
  `regdate` datetime DEFAULT NULL,
  `editdate` datetime DEFAULT NULL,
  `hot` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tourtype`
--

CREATE TABLE IF NOT EXISTS `tourtype` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent` varchar(255) NOT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `icon` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `permit` enum('A','C') NOT NULL DEFAULT 'C',
  `pwd` varchar(40) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `tel` varchar(30) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `regdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `visa`
--

CREATE TABLE IF NOT EXISTS `visa` (
`id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `nation` varchar(100) NOT NULL,
  `numapply` int(11) NOT NULL,
  `visatype` varchar(255) NOT NULL,
  `processtime` varchar(255) NOT NULL,
  `message` text,
  `usebefore` int(11) DEFAULT NULL,
  `receiveinfo` int(11) DEFAULT NULL,
  `knwthrough` varchar(255) DEFAULT NULL,
  `paymethod` varchar(255) DEFAULT NULL,
  `regdate` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `visadetail`
--

CREATE TABLE IF NOT EXISTS `visadetail` (
`id` int(11) NOT NULL,
  `id_visa` int(11) NOT NULL,
  `fullame` varchar(255) NOT NULL,
  `nation` varchar(255) NOT NULL,
  `idpassport` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `expire` date NOT NULL,
  `flightdetail` varchar(255) DEFAULT NULL,
  `arrivaldate` date DEFAULT NULL,
  `exitdate` date DEFAULT NULL,
  `portarrival` varchar(255) DEFAULT NULL,
  `purposevisit` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booktour`
--
ALTER TABLE `booktour`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `infocompany`
--
ALTER TABLE `infocompany`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour`
--
ALTER TABLE `tour`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tourtype`
--
ALTER TABLE `tourtype`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visa`
--
ALTER TABLE `visa`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visadetail`
--
ALTER TABLE `visadetail`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `booktour`
--
ALTER TABLE `booktour`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `infocompany`
--
ALTER TABLE `infocompany`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tour`
--
ALTER TABLE `tour`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tourtype`
--
ALTER TABLE `tourtype`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `visa`
--
ALTER TABLE `visa`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `visadetail`
--
ALTER TABLE `visadetail`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

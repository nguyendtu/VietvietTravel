-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2016 at 04:22 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vietviet_travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` int(11) DEFAULT '1',
  `briefinfo` text NOT NULL,
  `smallimg` varchar(255) NOT NULL,
  `detailinfo` text NOT NULL,
  `regdate` datetime DEFAULT NULL,
  `editdate` datetime DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `hot` int(11) NOT NULL DEFAULT '0',
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `title`, `type`, `briefinfo`, `smallimg`, `detailinfo`, `regdate`, `editdate`, `id_user`, `hot`, `status`) VALUES
(1, 'The International Travel Exhibition (ITE)', 1, 'abc', 'image1.jpg', 'abc', '2015-12-31 00:00:00', '2015-12-31 00:00:00', 1, 1, 1),
(2, 'Asian Tour You Will Nevver Forget', 1, 'abc', 'image1.jpg', 'abc', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 1),
(3, 'Lifetime Travel Experience in Yangon and Bagan', 1, 'abc', 'image1.jpg', 'abc', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 1),
(4, 'Learning the Inthar Life from River Cruise', 1, 'abc', 'image1.jpg', 'abc', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 1),
(5, 'The Best Cambodia Island Cruises You Need', 1, 'abc', 'image1.jpg', 'abc', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 1),
(6, 'The Heart of Asisa', 1, 'abc', 'image1.jpg', 'abc', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 1),
(7, 'VISIT MISTIC CAMBODIA', 1, 'abc', 'image1.jpg', 'abc', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 1),
(8, 'The Joy of Siem Reap Bird Watching Tour with TNK Travel', 1, 'abc', 'image1.jpg', 'abc', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 1),
(9, 'Trekking the Himalayas: the Essential Tips', 1, 'abc', 'image1.jpg', 'abc', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 1),
(10, 'An interesting Holiday in Laos', 1, 'abc', 'image1.jpg', 'abc', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `booktour`
--

CREATE TABLE `booktour` (
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
  `knwthrough` varchar(255) DEFAULT NULL,
  `roomreferences` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
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

CREATE TABLE `hotel` (
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
  `status` int(11) NOT NULL DEFAULT '1',
  `hot` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id`, `name`, `star`, `id_location`, `address`, `price`, `briefinfo`, `detailinfo`, `smallimg`, `largeimg`, `regdate`, `editdate`, `status`, `hot`) VALUES
(8, 'Hotels in Saigon', 5, 1, 'hcm', '1563', 'hjk', '<p>hjksad456</p>', 'Hochiminh-Water-Puppet.jpg', 'slide3.jpg slide2.jpg slide4.jpg SongXanh_Mekong_Cruise.jpg ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(9, 'Hotel 2 in Saigon', 3, 1, 'Binh Thanh - Saigon', '5896', 'abcd', '<p>abcd</p>', 'Hochiminh-Water-Puppet.jpg', 'slide2.jpg slide3.jpg slide4.jpg SongXanh_Mekong_Cruise.jpg ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(10, 'Hotel 3 in Saigon', 4, 1, 'Binh Loi - Saigon', '123456', 'Hotel in Binh Loi - Sai gon', '<p>6452</p>', 'Hochiminh-Water-Puppet.jpg', 'slide2.jpg slide3.jpg slide4.jpg SongXanh_Mekong_Cruise.jpg ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `infocompany`
--

CREATE TABLE `infocompany` (
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

--
-- Dumping data for table `infocompany`
--

INSERT INTO `infocompany` (`id`, `name`, `logo`, `address`, `mobile`, `tel`, `email`, `license`, `fax`, `website`, `facebook`, `skype`, `zalo`, `yahoo`, `viber`, `map`, `video`) VALUES
(1, 'Viet viet travel', 'logo.png', 'In Hanoi: 13 Nguyen Huu Huan st., Hoan Kiem dist., Ha Noi capital, Vietnam', ' (84-8) 3920 4767 - (84-8) 3920 4767 - (84-8) 3920 5847', '(84-8) 3920 5847', 'info@vietviettravel.com', 'abc', ' (84-8) 3920 5377', 'https://www.vietviettravel.com', 'https://www.facebook.com/profile.php?id=100007576810389', 'vietviettravel', 'vietviettravel', 'vietviettravel', 'vietviettravel', '39.720991014764536 2.911801719665541', 'video.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `name`, `description`) VALUES
(1, 'hcm', 'Hotels in HCM'),
(2, 'da lat', 'Hotel in Da Lat'),
(3, 'nha trang', 'Hotel in Nha Trang'),
(4, 'hoi an', 'Hotel in Hoi An'),
(5, 'hue', 'Hotel in Hue'),
(6, 'da nang', 'Hotel in Da Nang'),
(7, 'ha noi', 'Hotel in Ha Noi'),
(8, 'sa pa', 'Hotel in Sa Pa');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `image`, `link`, `position`) VALUES
(1, 'slide1.jpg', 'images/slide1.jpg', 1),
(2, 'slide2.jpg', 'images/slide2.jpg', 1),
(3, 'slide3.jpg', 'images/slide3.jpg', 1),
(4, 'slide4.jpg', 'images/slide4.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tour`
--

CREATE TABLE `tour` (
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

--
-- Dumping data for table `tour`
--

INSERT INTO `tour` (`id`, `name`, `id_tourtype`, `code`, `length`, `startfrom`, `price`, `briefinfo`, `detailinfo`, `smallimg`, `largeimg`, `regdate`, `editdate`, `hot`, `status`) VALUES
(1, 'Tour 1', 5, '5984', 10, '20/10 2010 - 20/10/2012', '9000', 'briefinfo for tour 1', 'detailinfo for tour 1', 'CuChi_Tunnels.jpg', 'CuChi_Tunnels.jpg CuChi_Tunnels.jpg CuChi_Tunnels.jpg CuChi_Tunnels.jpg', NULL, NULL, 1, 1),
(2, 'Tour 2', 5, '6547', 20, '20/10 2010 - 20/10/2012', '456987', 'ghj', '<p>fghhjkk</p>', 'image1.jpg', 'image1.jpg ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(3, 'Tour 3', 5, '123456', 5, '20/10 2010 - 20/10/2012', '12345', '123456789', '', 'image1.jpg', 'image1.jpg ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tourtype`
--

CREATE TABLE `tourtype` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent` varchar(255) NOT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `icon` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tourtype`
--

INSERT INTO `tourtype` (`id`, `name`, `parent`, `description`, `icon`) VALUES
(1, 'Bicycle tour 1 day', 'bicycle', 'tour ', 'tour'),
(2, 'Bicycle tour 2 day', 'bicycle', 'tour ', 'tour'),
(3, 'Bicycle tour 3 day', 'bicycle', 'tour ', 'tour'),
(4, 'Bicycle tour 4 day', 'bicycle', 'tour ', 'tour'),
(5, 'Day tour', 'travel', 'travel', 'travel'),
(6, 'Mekong Delta Tour', 'travel', 'travel', 'travel'),
(7, 'Tour Packages', 'travel', 'travel', 'travel'),
(8, 'Open Packages Tour', 'travel', 'travel', 'travel'),
(9, 'Nothern Cruise', 'travel', 'travel', 'travel'),
(10, 'Adventure Tour', 'travel', 'travel', 'travel'),
(11, 'National Park Tour', 'travel', 'travel', 'travel');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `permit` enum('A','C') NOT NULL DEFAULT 'C',
  `pwd` varchar(40) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `tel` varchar(30) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `regdate` datetime NOT NULL,
  `authKey` varchar(40) NOT NULL,
  `accessToken` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `permit`, `pwd`, `fullname`, `tel`, `address`, `status`, `regdate`, `authKey`, `accessToken`) VALUES
(2, 'admin@outlook.com', 'A', 'nguyenduytu', 'admin', 'admin', 'admin', 1, '2015-12-25 00:00:00', 'authKey2Amin', 'accessToken2Admin'),
(3, 'nguyenduytu@outlook.com', 'C', 'nguyenduytu', 'duy tu', NULL, NULL, 0, '0000-00-00 00:00:00', '', ''),
(4, 'user@gmail.com', 'C', 'user', 'user', '0123456789', '123 binh loi', 1, '2015-12-17 00:00:00', 'authKey3User', 'accessToken3User');

-- --------------------------------------------------------

--
-- Table structure for table `visa`
--

CREATE TABLE `visa` (
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

CREATE TABLE `visadetail` (
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `infocompany`
--
ALTER TABLE `infocompany`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tour`
--
ALTER TABLE `tour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tourtype`
--
ALTER TABLE `tourtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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

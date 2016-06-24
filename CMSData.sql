-- phpMyAdmin SQL Dump
-- version 4.4.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2016 at 10:32 AM
-- Server version: 5.7.11-log
-- PHP Version: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cmsdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogs`
--

CREATE TABLE IF NOT EXISTS `adminlogs` (
  `logID` int(11) NOT NULL,
  `ActionBy` int(11) NOT NULL,
  `ActionTime` datetime NOT NULL,
  `ActionInfo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bans`
--

CREATE TABLE IF NOT EXISTS `bans` (
  `BanID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `BanTime` datetime NOT NULL,
  `BanDuration` datetime NOT NULL,
  `IPBan` tinyint(1) NOT NULL DEFAULT '0',
  `BannedIPAddress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `CompanyID` int(11) NOT NULL,
  `CompanyName` varchar(45) DEFAULT NULL,
  `CompanyAddress` varchar(45) DEFAULT NULL,
  `CompanyEmail` varchar(45) DEFAULT NULL,
  `CompanyPhone` int(10) DEFAULT NULL,
  `CompanyIP` int(11) DEFAULT NULL,
  `DateSignedUp` datetime DEFAULT NULL,
  `CompanyWebsite` text NOT NULL,
  `LogApprovedByCompany` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `FileID` int(11) NOT NULL,
  `FileExtension` varchar(4) DEFAULT NULL,
  `FileName` varchar(45) DEFAULT NULL,
  `FileSize` bit(8) DEFAULT NULL,
  `UploadDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `footer`
--

CREATE TABLE IF NOT EXISTS `footer` (
  `FooterID` int(11) NOT NULL,
  `FooterContent` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `header`
--

CREATE TABLE IF NOT EXISTS `header` (
  `HeaderID` int(11) NOT NULL,
  `HeaderContent` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `ImageID` int(11) NOT NULL,
  `ImageExtension` varchar(4) DEFAULT NULL,
  `ImageName` varchar(45) DEFAULT NULL,
  `ImageSize` bit(8) DEFAULT NULL,
  `UploadDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `MenuItemID` int(11) NOT NULL,
  `MenuTitel` varchar(45) DEFAULT NULL,
  `Active` tinyint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `PageID` int(11) NOT NULL,
  `Content` text,
  `PageNumber` int(11) DEFAULT NULL,
  `MenuItemID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE IF NOT EXISTS `portfolio` (
  `portfolioID` int(11) NOT NULL,
  `Title` text NOT NULL,
  `Description` varchar(200) NOT NULL,
  `ThumbnailImage` varchar(200) NOT NULL,
  `Images` varchar(255) NOT NULL,
  `CreatedBy` text NOT NULL,
  `CompledOn` date NOT NULL,
  `Skills` text NOT NULL,
  `Client` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `UserID` int(11) NOT NULL,
  `FirstName` varchar(430) DEFAULT NULL,
  `Insertion` varchar(7) DEFAULT NULL,
  `Lastname` varchar(30) DEFAULT NULL,
  `Username` varchar(30) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Phone` int(10) DEFAULT NULL,
  `Address` varchar(30) DEFAULT NULL,
  `Country` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Rights` tinyint(2) DEFAULT NULL,
  `Active` tinyint(2) DEFAULT NULL,
  `IPBanned` tinyint(1) NOT NULL DEFAULT '0',
  `RegularBan` tinyint(1) NOT NULL DEFAULT '0',
  `IP` varchar(255) DEFAULT NULL,
  `RegistrationIP` varchar(255) NOT NULL,
  `DateSignedUp` datetime DEFAULT NULL,
  `LastLogin` datetime DEFAULT NULL,
  `LastLocation` geometry DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `FirstName`, `Insertion`, `Lastname`, `Username`, `Password`, `Phone`, `Address`, `Country`, `Email`, `Rights`, `Active`, `IPBanned`, `RegularBan`, `IP`, `RegistrationIP`, `DateSignedUp`, `LastLogin`, `LastLocation`) VALUES
(1, 'Tijs', NULL, 'Gietman', 'tijs', 'test123', 64234343, 'Hoogmeer 1810', 'Nederlands', 'tijsgietman@gmail.com', 2, 0, 0, 0, NULL, '\0\0', NULL, NULL, NULL),
(2, 'Tijs Gietman', '2', '2', '2', '2', 2, '2', '2', '2', 2, 2, 0, 0, NULL, '\00', NULL, NULL, NULL),
(3, 'jennifer2', '', 'josemanders', '', '74be16979710d4c4e7c6647856088456', 624449337, 'veenbeshof 52', 'Nederland', 'j.ennifer_95@live.nl', 0, 0, 0, 0, '::1', '::1', '2016-06-22 09:50:33', '2016-06-22 09:50:33', NULL),
(4, 'jennifer', '', 'josemanders', '', 'd41d8cd98f00b204e9800998ecf8427e', 624449337, 'veenbeshof 52', 'Nederland', 'j.ennifer_95@live.nl', 0, 0, 0, 0, '::1', '::1', '2016-06-20 11:48:12', NULL, NULL),
(5, 'jennifer', '', 'josemanders', '', 'd41d8cd98f00b204e9800998ecf8427e', 624449337, 'veenbeshof 52', 'Nederland', 'j.ennifer_95@live.nl', 0, 0, 0, 0, '::1', '::1', '2016-06-20 11:48:23', NULL, NULL),
(6, 'jennifer', '', 'josemanders', 'ballz', 'd41d8cd98f00b204e9800998ecf8427e', 624449337, 'veenbeshof 52', 'Nederland', 'j.ennifer_95@live.nl', 1, 1, 0, 0, '::1', '::1', '2016-06-22 10:31:47', '2016-06-22 10:31:47', NULL),
(7, 'jennifer', '', 'josemanders', '', 'd41d8cd98f00b204e9800998ecf8427e', 624449337, 'veenbeshof 52', 'Nederland', 'j.ennifer_95@live.nl', 0, 1, 0, 0, '::1', '::1', '2016-06-20 11:49:00', NULL, NULL),
(8, 'jennifer', '', 'josemanders', '', 'd41d8cd98f00b204e9800998ecf8427e', 624449337, 'veenbeshof 52', 'Nederland', 'j.ennifer_95@live.nl', 0, 1, 0, 0, '::1', '::1', '2016-06-20 11:53:06', NULL, NULL),
(9, 'jennifer', '', 'josemanders', '', 'd41d8cd98f00b204e9800998ecf8427e', 624449337, 'veenbeshof 52', 'Nederland', 'j.ennifer_95@live.nl', 0, 1, 0, 0, '::1', '::1', '2016-06-20 11:54:02', NULL, NULL),
(10, 'jennifer', '', 'josemanders', '', 'd41d8cd98f00b204e9800998ecf8427e', 624449337, 'veenbeshof 52', 'Nederland', 'j.ennifer_95@live.nl', 0, 1, 0, 0, '::1', '::1', '2016-06-20 11:54:33', NULL, NULL),
(11, 'Tijs Gietman', '', 'Hijs', 'k0isk0', '24e7d3b425ea2de2e4e2a1909104d8c5', 246334234, 'Karpergracht 21', 'Nederland', 'tijsgietman@gmail.com', 0, 1, 0, 0, '::1', '::1', '2016-06-20 12:11:15', NULL, NULL),
(12, 'Tijs', '', 'Gietman', 'k0isk0', 'c6968a8280cb18a373d9b7080dc42e71', 653592211, 'Karpergracht 27', 'Nederland', '', 0, 1, 0, 0, '::1', '::1', '2016-06-20 12:24:04', NULL, NULL),
(13, 'Tijs', '', 'Gietman', 'k0isk0121', '7b00458515ca8edd50f9473cdcc6818c', 653592211, 'Karpergracht 27', 'Nederland', '', 0, 1, 0, 0, '::1', '::1', '2016-06-20 12:25:31', NULL, NULL),
(14, 'Tijs', '', 'Gietman', 'k1isk1', 'f5378351e6a89be46cc9a8a84db337f6', 653592211, 'Karpergracht 27', 'Nederland', '', 0, 1, 0, 0, '::1', '::1', '2016-06-20 12:29:53', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogs`
--
ALTER TABLE `adminlogs`
  ADD PRIMARY KEY (`logID`);

--
-- Indexes for table `bans`
--
ALTER TABLE `bans`
  ADD PRIMARY KEY (`BanID`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`CompanyID`),
  ADD UNIQUE KEY `CompanyID_UNIQUE` (`CompanyID`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`FileID`),
  ADD UNIQUE KEY `FileID_UNIQUE` (`FileID`);

--
-- Indexes for table `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`FooterID`),
  ADD UNIQUE KEY `FooterID_UNIQUE` (`FooterID`);

--
-- Indexes for table `header`
--
ALTER TABLE `header`
  ADD PRIMARY KEY (`HeaderID`),
  ADD UNIQUE KEY `HeaderID_UNIQUE` (`HeaderID`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`ImageID`),
  ADD UNIQUE KEY `ImageID_UNIQUE` (`ImageID`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`MenuItemID`),
  ADD UNIQUE KEY `MenuID_UNIQUE` (`MenuItemID`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`PageID`),
  ADD UNIQUE KEY `PageID_UNIQUE` (`PageID`),
  ADD UNIQUE KEY `PageNumber_UNIQUE` (`PageNumber`),
  ADD KEY `MenuItemID_idx` (`MenuItemID`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`portfolioID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `UserID_UNIQUE` (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogs`
--
ALTER TABLE `adminlogs`
  MODIFY `logID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bans`
--
ALTER TABLE `bans`
  MODIFY `BanID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `CompanyID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `FileID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `footer`
--
ALTER TABLE `footer`
  MODIFY `FooterID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `header`
--
ALTER TABLE `header`
  MODIFY `HeaderID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `ImageID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `MenuItemID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `PageID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `portfolioID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `MenuItemID` FOREIGN KEY (`MenuItemID`) REFERENCES `menu` (`MenuItemID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

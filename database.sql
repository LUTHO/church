-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 16, 2019 at 10:52 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `church`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

DROP TABLE IF EXISTS `activities`;
CREATE TABLE IF NOT EXISTS `activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rid` int(11) NOT NULL,
  `iid` int(11) NOT NULL,
  `vid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `descip` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `name`, `url`, `descip`, `role`) VALUES
(38, 'code.PNG', '../images/5c28c20419eb69.36570365.png', 'code', '2'),
(39, 'yoly.jpg', '../images/5c28c27216f613.82541203.jpg', 'big sis', '1'),
(40, 'IMG-20181024-WA0001.jpg', '../images/5c28d3e857a4a8.52458698.jpg', 'baby shower invite', '6'),
(37, 'Screenshot (30).png', 'images/5c28bb087e1c79.48134416.png', 'Catoon', '1'),
(36, 'Screenshot (7).png', 'images/5c28baf2d2ebd7.71440145.png', 'Trading', '2'),
(35, 'earr.jpeg', 'images/5c28bad5954937.45100100.jpeg', 'ear', '1'),
(34, 'Screenshot (13).png', 'images/5c28babaad3f45.79772407.png', 'Joshua', '2'),
(33, 'DSC_0241 (2).JPG', 'images/5c28baa3642175.91581609.jpg', 'church logo', '2'),
(32, 'll.jpg', 'images/5c28ba7b383c99.96249997.jpg', 'Shout out', '1'),
(31, 'cat.jpg', 'images/5c28ba60ddefb9.23792744.jpg', 'a cat', '1'),
(41, 'lecture.PNG', '../upload/images/5c28dc0d5e7730.70760121.png', 'lecture', '6'),
(44, 'sms.PNG', '../upload/images/5c28e1de7611b4.61915341.png', 'sms', '1'),
(47, 'contribution.PNG', '../upload/images/5c2d269bd70332.54567116.png', 'contribute', '6'),
(48, 'IMG-20160910-WA0003.jpg', 'upload/images/5c2d2a96c81b84.69811970.jpg', 'xhosa', '6'),
(49, 'IMG-20160910-WA0003.jpg', '../upload/images/5c2d2acf3c76f1.98525777.jpg', 'xhosa', '6'),
(50, 'images (1).jpeg', '../upload/images/5c2d39341e3888.93095625.jpeg', 'Heart', '2'),
(51, 'images (2).jpeg', '../upload/images/5c2d3b25089841.50065978.jpeg', 'tree', '1'),
(52, 'forest.jpg', 'upload/images/5c2d3b8ccb2153.88792471.jpg', 'nature', '6'),
(53, 'forest.jpg', '../upload/images/5c2d3baead1794.74813734.jpg', 'nature', '6');

-- --------------------------------------------------------

--
-- Table structure for table `inspire`
--

DROP TABLE IF EXISTS `inspire`;
CREATE TABLE IF NOT EXISTS `inspire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `imgid` int(11) NOT NULL,
  `vid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inspire`
--

INSERT INTO `inspire` (`id`, `type`, `imgid`, `vid`) VALUES
(54, 'Verses', 37, 16),
(53, 'Verses', 37, 16),
(52, 'Motivation', 31, 15),
(51, 'Poem', 34, 15),
(50, 'Poem', 35, 15),
(49, 'Poem', 36, 14),
(48, 'Motivation', 37, 14);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Sunday School'),
(2, 'Teenagers'),
(6, 'Youth');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'sun',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

DROP TABLE IF EXISTS `video`;
CREATE TABLE IF NOT EXISTS `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `descip` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `name`, `url`, `descip`, `role`) VALUES
(18, 'jwayeli kabi.mp4', '../videos/5c28c93a779cc9.14334354.mp4', 'yess man', '1'),
(19, 'vlc-record-2019-01-17-00h41m50s-Acts Ch. 13-20.mp4-.mp4', '../videos/5c3fb35b648c92.37201213.mp4', 'Acts', '6'),
(20, 'vlc-record-2019-01-17-00h43m44s-vlc-record-2018-12-20-22h59m12s-Loyiso Gola - The New Racial Line is a Bungee Cord.mp4-.mp4-.mp4', '../videos/5c3fb3cc67f168.45783702.mp4', 'a snake', '2'),
(16, 'rise.mp4', 'videos/5c28c84ba1e631.23394996.mp4', 'jo man', '2'),
(14, 'jwayeli kabi.mp4', 'videos/5c28bb98701f73.70130641.mp4', 'jwayeli kabi satane', '2'),
(15, 'rise.mp4', 'videos/5c28bf070ce102.27061260.mp4', 'John', '1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

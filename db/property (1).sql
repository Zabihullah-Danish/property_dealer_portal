-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 04, 2021 at 06:09 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `property`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `imgid` bigint(100) NOT NULL AUTO_INCREMENT,
  `img_name` varchar(1000) NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `pid` int(100) NOT NULL,
  PRIMARY KEY (`imgid`)
) ENGINE=MyISAM AUTO_INCREMENT=378 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imgid`, `img_name`, `uploaded_on`, `pid`) VALUES
(377, '20210209100228001 (64).jpg', '2021-02-09 15:06:28', 285),
(376, '20210209100228001 (63).jpg', '2021-02-09 15:06:28', 285),
(375, '20210209100228001 (62).jpg', '2021-02-09 15:06:28', 285),
(374, '20210209100228001 (61).jpg', '2021-02-09 15:06:28', 285),
(373, '20210209100220001 (4).jpg', '2021-02-09 14:56:20', 284),
(372, '20210209100220001 (3).jpg', '2021-02-09 14:56:20', 284),
(371, '20210206100201office.jpg', '2021-02-06 15:17:01', 283),
(370, '20210206100201land.jpg', '2021-02-06 15:17:01', 283),
(369, '20210206100201house.jpg', '2021-02-06 15:17:01', 283),
(368, '20210206100201apartment.jpg', '2021-02-06 15:17:01', 283),
(367, '20210125060154Wallpaper (13).jpg', '2021-01-25 11:09:54', 282),
(366, '20210125060154Wallpaper (12).jpg', '2021-01-25 11:09:54', 282),
(365, '20210125060154Wallpaper (11).jpg', '2021-01-25 11:09:54', 282),
(364, '20210125060154Wallpaper (9).jpg', '2021-01-25 11:09:54', 282),
(363, '20210125060154Wallpaper (8).jpg', '2021-01-25 11:09:54', 282),
(362, '20210125060154Wallpaper (6).jpg', '2021-01-25 11:09:54', 282),
(361, '20210125060103Wallpaper (19).jpg', '2021-01-25 10:58:03', 0),
(360, '20210125060103Wallpaper (18).jpg', '2021-01-25 10:58:03', 0),
(359, '20210125060103Wallpaper (13).jpg', '2021-01-25 10:58:03', 0),
(358, '20210125060103Wallpaper (12).jpg', '2021-01-25 10:58:03', 0),
(357, '20210125060107Wallpaper (19).jpg', '2021-01-25 10:34:07', 0),
(356, '20210125060107Wallpaper (18).jpg', '2021-01-25 10:34:07', 0),
(355, '20210125060107Wallpaper (17).jpg', '2021-01-25 10:34:07', 0),
(354, '20210125060107Wallpaper (13).jpg', '2021-01-25 10:34:07', 0),
(353, '20210125060107Wallpaper (12).jpg', '2021-01-25 10:34:07', 0),
(352, '20210125060107Wallpaper (11).jpg', '2021-01-25 10:34:07', 0),
(351, '20210125050138Wallpaper (23).jpg', '2021-01-25 10:16:38', 0),
(350, '20210125050138Wallpaper (22).jpg', '2021-01-25 10:16:38', 0),
(349, '20210125050138Wallpaper (19).jpg', '2021-01-25 10:16:38', 0),
(348, '20210125050138Wallpaper (18).jpg', '2021-01-25 10:16:38', 0),
(347, '20210125050138Wallpaper (13).jpg', '2021-01-25 10:16:38', 0),
(346, '20210125050138Wallpaper (12).jpg', '2021-01-25 10:16:38', 0),
(345, '20210125040125Wallpaper (19).jpg', '2021-01-25 08:46:25', 0),
(344, '20210125040125Wallpaper (18).jpg', '2021-01-25 08:46:25', 0),
(343, '20210125040125Wallpaper (13).jpg', '2021-01-25 08:46:25', 0),
(342, '20210125040125Wallpaper (12).jpg', '2021-01-25 08:46:25', 0),
(341, '20210125040157Wallpaper (23).jpg', '2021-01-25 08:45:57', 0),
(340, '20210125040157Wallpaper (22).jpg', '2021-01-25 08:45:57', 0),
(339, '20210125040157Wallpaper (19).jpg', '2021-01-25 08:45:57', 0),
(338, '20210125040157Wallpaper (18).jpg', '2021-01-25 08:45:57', 0),
(337, '20210125040157Wallpaper (13).jpg', '2021-01-25 08:45:57', 0),
(336, '20210125040157Wallpaper (12).jpg', '2021-01-25 08:45:57', 0),
(335, '20210125040120Wallpaper (32).jpg', '2021-01-25 08:43:20', 0),
(334, '20210125040120Wallpaper (31).jpg', '2021-01-25 08:43:20', 0),
(333, '20210125040120Wallpaper (30).jpg', '2021-01-25 08:43:20', 0),
(332, '20210125040120Wallpaper (28).jpg', '2021-01-25 08:43:20', 0),
(331, '20210125040120Wallpaper (27).jpg', '2021-01-25 08:43:20', 0),
(330, '20210125040120Wallpaper (26).jpg', '2021-01-25 08:43:20', 0),
(329, '20210117090115Wallpaper (19).jpg', '2021-01-17 14:16:15', 281),
(328, '20210117090115Wallpaper (18).jpg', '2021-01-17 14:16:15', 281),
(327, '20210117090115Wallpaper (17).jpg', '2021-01-17 14:16:15', 281),
(326, '20210117090115Wallpaper (13).jpg', '2021-01-17 14:16:15', 281),
(325, '20210117090115Wallpaper (12).jpg', '2021-01-17 14:16:15', 281),
(324, '20210117090115Wallpaper (11).jpg', '2021-01-17 14:16:15', 281),
(323, '20210117090115Wallpaper (10).jpg', '2021-01-17 14:16:15', 281),
(322, '20210117090146Wallpaper (19).jpg', '2021-01-17 14:07:46', 280),
(321, '20210117090146Wallpaper (18).jpg', '2021-01-17 14:07:46', 280),
(320, '20210117090146Wallpaper (17).jpg', '2021-01-17 14:07:46', 280),
(319, '20210117090146Wallpaper (16).jpg', '2021-01-17 14:07:46', 280),
(318, '20210116050135021218-34.jpg', '2021-01-16 09:32:35', 279),
(317, '20210116050135021218-04.jpg', '2021-01-16 09:32:35', 279),
(316, '20210116050135010-07.jpg', '2021-01-16 09:32:35', 279),
(315, '20210116040159Wallpaper (36).jpg', '2021-01-16 09:29:59', 278),
(314, '20210116040159Wallpaper (35).Jpg', '2021-01-16 09:29:59', 278),
(313, '20210116040159Wallpaper (34).jpg', '2021-01-16 09:29:59', 278),
(312, '20210116040159Wallpaper (32).jpg', '2021-01-16 09:29:59', 278),
(311, '20210116040159Wallpaper (31).jpg', '2021-01-16 09:29:59', 278),
(310, '20210116040159Wallpaper (30).jpg', '2021-01-16 09:29:59', 278),
(309, '20210112060152Wallpaper (50).jpg', '2021-01-12 10:42:52', 277),
(308, '20210112060152Wallpaper (49).jpg', '2021-01-12 10:42:52', 277),
(307, '20210112060152Wallpaper (48).jpg', '2021-01-12 10:42:52', 277),
(306, '20210112060152Wallpaper (47).jpg', '2021-01-12 10:42:52', 277),
(305, '20210112060152Wallpaper (46).jpg', '2021-01-12 10:42:52', 277),
(304, '20210112060152Wallpaper (45).jpg', '2021-01-12 10:42:52', 277),
(303, '20210112060103Wallpaper (44).jpg', '2021-01-12 10:41:03', 276),
(302, '20210112060103Wallpaper (43).jpg', '2021-01-12 10:41:03', 276),
(301, '20210112060103Wallpaper (42).jpg', '2021-01-12 10:41:03', 276),
(300, '20210112060103Wallpaper (40).jpg', '2021-01-12 10:41:03', 276),
(299, '20210112060103Wallpaper (39).jpg', '2021-01-12 10:41:03', 276),
(298, '20210112060103Wallpaper (38).jpg', '2021-01-12 10:41:03', 276),
(297, '20210111060135Wallpaper (13).jpg', '2021-01-11 11:09:36', 275),
(296, '20210111060135Wallpaper (12).jpg', '2021-01-11 11:09:36', 275),
(295, '20210111060135Wallpaper (11).jpg', '2021-01-11 11:09:36', 275),
(294, '20210111060135Wallpaper (9).jpg', '2021-01-11 11:09:36', 275),
(293, '20210111060135Wallpaper (8).jpg', '2021-01-11 11:09:36', 275),
(292, '20210111060135Wallpaper (6).jpg', '2021-01-11 11:09:36', 275),
(291, '20210104060106Wallpaper (19).jpg', '2021-01-04 11:22:06', 274),
(290, '20210104060106Wallpaper (18).jpg', '2021-01-04 11:22:06', 274),
(289, '20210104060106Wallpaper (13).jpg', '2021-01-04 11:22:06', 274),
(288, '20210104060106Wallpaper (12).jpg', '2021-01-04 11:22:06', 274),
(287, '20210104060106Wallpaper (9).jpg', '2021-01-04 11:22:06', 274),
(286, '20210104060106Wallpaper (8).jpg', '2021-01-04 11:22:06', 274),
(285, '20210104060130Wallpaper (13).jpg', '2021-01-04 11:10:30', 273),
(284, '20210104060130Wallpaper (12).jpg', '2021-01-04 11:10:30', 273),
(283, '20210104060130Wallpaper (11).jpg', '2021-01-04 11:10:30', 273),
(282, '20210104060130Wallpaper (9).jpg', '2021-01-04 11:10:30', 273),
(281, '20210104060130Wallpaper (8).jpg', '2021-01-04 11:10:30', 273),
(280, '20210104060130Wallpaper (6).jpg', '2021-01-04 11:10:30', 273),
(279, '20210102060129Wallpaper (19).jpg', '2021-01-02 10:59:29', 272),
(278, '20210102060129Wallpaper (18).jpg', '2021-01-02 10:59:29', 272),
(277, '20210102060129Wallpaper (17).jpg', '2021-01-02 10:59:29', 272),
(276, '20210102060129Wallpaper (16).jpg', '2021-01-02 10:59:29', 272),
(275, '20210102060129Wallpaper (13).jpg', '2021-01-02 10:59:29', 272),
(274, '20210102060129Wallpaper (12).jpg', '2021-01-02 10:59:29', 272),
(273, '20210102060129Wallpaper (9).jpg', '2021-01-02 10:59:29', 272),
(272, '20210102060129Wallpaper (8).jpg', '2021-01-02 10:59:29', 272),
(271, '20210102060124Wallpaper (13).jpg', '2021-01-02 10:30:24', 271),
(270, '20210102060124Wallpaper (12).jpg', '2021-01-02 10:30:24', 271),
(269, '20210102060124Wallpaper (11).jpg', '2021-01-02 10:30:24', 271),
(268, '20210102060124Wallpaper (10).jpg', '2021-01-02 10:30:24', 271),
(267, '20210102060124Wallpaper (9).jpg', '2021-01-02 10:30:24', 271),
(266, '20210102060124Wallpaper (8).jpg', '2021-01-02 10:30:24', 271),
(265, '20210102060124Wallpaper (6).jpg', '2021-01-02 10:30:24', 271),
(264, '20210102060124Wallpaper (4).jpg', '2021-01-02 10:30:24', 271),
(263, '20210102050150Wallpaper (13).jpg', '2021-01-02 10:25:50', 270),
(262, '20210102050150Wallpaper (12).jpg', '2021-01-02 10:25:50', 270),
(261, '20210102050150Wallpaper (11).jpg', '2021-01-02 10:25:50', 270),
(260, '20210102050150Wallpaper (9).jpg', '2021-01-02 10:25:50', 270),
(259, '20210102050150Wallpaper (8).jpg', '2021-01-02 10:25:50', 270),
(258, '20210102050150Wallpaper (6).jpg', '2021-01-02 10:25:50', 270),
(257, '20210101020107Wallpaper (32).jpg', '2021-01-01 18:37:07', 269),
(256, '20210101020107Wallpaper (31).jpg', '2021-01-01 18:37:07', 269),
(255, '20210101020107Wallpaper (30).jpg', '2021-01-01 18:37:07', 269),
(254, '20210101020107Wallpaper (29).jpg', '2021-01-01 18:37:07', 269),
(253, '20210101020107Wallpaper (28).jpg', '2021-01-01 18:37:07', 269),
(252, '20210101020107Wallpaper (27).jpg', '2021-01-01 18:37:07', 269),
(251, '20210101020107Wallpaper (26).jpg', '2021-01-01 18:37:07', 269),
(250, '20210101020107Wallpaper (25).jpg', '2021-01-01 18:37:07', 269),
(249, '20210101020111Wallpaper (50).jpg', '2021-01-01 18:36:11', 268),
(248, '20210101020111Wallpaper (49).jpg', '2021-01-01 18:36:11', 268),
(247, '20210101020111Wallpaper (48).jpg', '2021-01-01 18:36:11', 268),
(246, '20210101020111Wallpaper (47).jpg', '2021-01-01 18:36:11', 268),
(245, '20210101020111Wallpaper (46).jpg', '2021-01-01 18:36:11', 268),
(244, '20210101020111Wallpaper (45).jpg', '2021-01-01 18:36:11', 268),
(243, '20210101020111Wallpaper (44).jpg', '2021-01-01 18:36:11', 268),
(242, '20210101020111Wallpaper (43).jpg', '2021-01-01 18:36:11', 268),
(241, '20210101020111Wallpaper (42).jpg', '2021-01-01 18:36:11', 268),
(240, '20210101020111Wallpaper (41).jpg', '2021-01-01 18:36:11', 268),
(239, '20210101010125pic (8).jpg', '2021-01-01 18:18:25', 267),
(238, '20210101010125pic (7).jpg', '2021-01-01 18:18:25', 267),
(237, '20210101010125pic (5).jpg', '2021-01-01 18:18:25', 267),
(236, '20210101010125pic (4).jpg', '2021-01-01 18:18:25', 267),
(235, '20210101010125pic (3).jpg', '2021-01-01 18:18:25', 267),
(234, '20210101010125pic (2).jpg', '2021-01-01 18:18:25', 267),
(233, '20210101030105pic (6).jpg', '2021-01-01 07:49:05', 266),
(232, '20210101030105pic (5).jpg', '2021-01-01 07:49:05', 266),
(231, '20210101030105pic (4).jpg', '2021-01-01 07:49:05', 266),
(230, '20210101030105pic (3).jpg', '2021-01-01 07:49:05', 266),
(229, '20210101030105pic (2).jpg', '2021-01-01 07:49:05', 266),
(228, '20210101030105pic (1).jpg', '2021-01-01 07:49:05', 266),
(227, '20201231081255Wallpaper (23).jpg', '2021-01-01 01:21:56', 265),
(226, '20201231081255Wallpaper (19).jpg', '2021-01-01 01:21:56', 265),
(225, '20201231081255Wallpaper (18).jpg', '2021-01-01 01:21:56', 265),
(224, '20201231081255Wallpaper (17).jpg', '2021-01-01 01:21:56', 265),
(223, '20201231081255Wallpaper (16).jpg', '2021-01-01 01:21:56', 265),
(222, '20201231081255Wallpaper (13).jpg', '2021-01-01 01:21:56', 265),
(221, '20201231031252Wallpaper (19).jpg', '2020-12-31 19:54:52', 264),
(220, '20201231031252Wallpaper (18).jpg', '2020-12-31 19:54:52', 264),
(219, '20201231031252Wallpaper (13).jpg', '2020-12-31 19:54:52', 264),
(218, '20201231031252Wallpaper (12).jpg', '2020-12-31 19:54:52', 264),
(217, '20201231031252Wallpaper (9).jpg', '2020-12-31 19:54:52', 264),
(216, '20201231031252Wallpaper (8).jpg', '2020-12-31 19:54:52', 264);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `pid` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) DEFAULT NULL,
  `content` varchar(1000) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `deal_type` varchar(100) DEFAULT NULL,
  `floor` varchar(50) DEFAULT NULL,
  `rooms` varchar(50) DEFAULT NULL,
  `kitchen` varchar(100) NOT NULL,
  `bathrooms` varchar(255) DEFAULT NULL,
  `sun_side` varchar(100) DEFAULT NULL,
  `garage` varchar(100) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `location` varchar(300) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `area` varchar(500) DEFAULT NULL,
  `contract_duration` varchar(150) DEFAULT NULL,
  `currency` varchar(10) DEFAULT NULL,
  `price` int(100) DEFAULT NULL,
  `monthly_rent` int(100) DEFAULT NULL,
  `negotiable` varchar(100) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(10) DEFAULT 1,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=286 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`pid`, `title`, `content`, `category`, `deal_type`, `floor`, `rooms`, `kitchen`, `bathrooms`, `sun_side`, `garage`, `province`, `location`, `address`, `phone`, `area`, `contract_duration`, `currency`, `price`, `monthly_rent`, `negotiable`, `create_date`, `end_date`, `user_id`, `status`) VALUES
(272, 'Apartment in Kabul city for rent in kabul afghanistan.', 'test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.', 'Apartment', 'Rental', '4', '5 Rooms', '2', '4', 'Yes', '1 car capacity', 'herat', 'Shashaheed First Street', '', '', 'test content.test content.test content.test content.test content.test content.', '6 month', 'af', 323232, 323223, 'yes', '2021-01-02', '2021-01-27', 157, 0),
(271, 'House for Sell in Shashaheed', 'test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.', 'House', 'Sale', '3', '7', 'Select Kitchen', '3', 'Yes', '1 car capacity', 'kabul', 'kabul afghanistan', '', '', 'test content.test content.test content.test content.test content.test content.test content.test content.', '6 month', 'af', 34324, 3432, 'yes', '2021-01-02', '2021-01-30', 156, 1),
(270, 'House for rent in Bagrami distract in kabul', 'test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.', 'House', 'Rental', '4', '1', '', 'Select Bathrooms', 'Yes', '1 car capacity', 'kabul', 'Kabul Bagrami distract', 'Shashaheed 2nd street near to Zazai Masjid', '078923456', 'test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.', '6 month', 'af', 78798, 879879, 'yes', '2021-01-02', '2021-01-22', 156, 1),
(269, 'House for Sell in Shashaheed', 'test content.test content.test content.test content.test content.test content.test content.test content.test content.', 'Apartment', 'Mortgage', 'fourth floor', '4', '2', '2', 'Half day evening', '1 car capacity', 'Kabul', 'Shashaheed First Street', '', '', 'test content.test content.test content.test content.test content.test content.', '1 year', 'af', 79879, 87987, 'yes', '2021-01-01', '2021-01-19', 156, 1),
(268, 'House for Sell in Shashaheed', 'test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.', 'Land', 'Mortgage', 'second floor', '5', '2', '2', 'No', '1 car capacity', 'Kabul', 'Kabul Taimani 2nd street oposite to Kabul Resturant.', '', '', 'test content.test content.test content.test content.test content.test content.test content.', '6 month', 'af', 12000, 12000, 'yes', '2021-01-01', '2021-01-22', 156, 1),
(267, 'House for sell in Kabul taimani', 'test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.', 'house', 'sale', '4', '7', '', NULL, 'half day evening', NULL, 'kabul', 'Kabul Taimani 2nd street oposite to Kabul Resturant.', NULL, NULL, 'test content.test content.test content.test content.test content.test content.', '6 month', '$', 30000, 30000, 'yes', '2021-01-01', '2021-01-22', 156, 1),
(264, 'House for rent in Bagrami district at Shiwaki area', 'full content about this post property.', 'Apartment', 'Mortgage', '0', '1', '', '', 'Yes', '', 'Herat', 'Shashaheed 3rd street', '', '', 'test content.', '6 month', 'af', 120000, 120000, 'yes', '2020-12-31', '2021-01-02', 156, 1),
(265, 'House for sell in Kabul taimani near to main road and public school with best price.', 'this house is beautiful in shape and place.', 'house', 'sale', '1', '4', '', NULL, 'yes', NULL, 'kabul', 'Kabul Taimani 2nd street oposite to Kabul Resturant.', NULL, NULL, 'test content.', '6 month', 'af', 540000, 540000, 'yes', '2020-12-31', '2021-01-08', 156, 1),
(266, 'Apartment in the heart of Kabul City with best sightseeing and location', 'this apartment is location in best location of the Kabul city with best security.', 'apartment', 'rental', '3', '7', '', NULL, 'half day morning', NULL, 'herat', 'ShareNow Haji Yaqub Square near to Itisalat company.', NULL, NULL, 'this apartment is surrounded from three side with house and from front to the main road.', '2 year', 'af', 20000, 20000, 'yes', '2021-01-01', '2021-01-15', 156, 1),
(273, 'House for rent in Bagrami distract', 'test content.', 'apartment', 'rental', 'Select Floor No', 'Select Rooms', '', NULL, 'Select sun side', NULL, 'kabul', 'Kabul Bagrami distract', NULL, NULL, 'test.', '6 month', 'af', 232323, 34233, 'yes', '2021-01-04', '2021-01-22', 158, 1),
(274, 'House for rent in Shiwaki Mosahi distract', 'this is located in shiwaki area near to main road.', 'House', 'Rental', 'First floor', '6 Rooms Rooms Rooms', '1', '2', 'Yes', '2 car capacity', 'Kabul', 'Mosahi', '', '', 'test content.test content.test content.test content.', '1 year', '$', 2300, 2300, 'yes', '2021-01-04', '2021-01-29', 157, 0),
(275, 'apartment for rent in KarteNow 2nd street', 'test content.test content.test content.test content.test content.', 'Apartment', 'Rental', 'Second floor', '5', '2', '', 'Half day evening', '2 car capacity', 'Mazar', 'Bagrami', '', '', 'testtest content.test content.test content.test content.test content.', '2 year', '$', 1200, 1200, 'yes', '2021-01-11', '2021-01-19', 157, 1),
(276, 'House for Rent with big Yard and near to main Road', 'Test content.Test content.Test content.Test content.Test content.Test content.Test content.Test content.Test content.Test content.Test content.Test content.Test content.Test content.Test content.Test content.Test content.Test content.Test content.', 'house', 'rental', 'first floor', '4', '', NULL, 'half day morning', NULL, NULL, 'karte Now First Street', NULL, NULL, 'Test content.Test content.Test content.Test content.', '1 year', '$', 300, 300, 'no', '2021-01-12', '2021-01-28', 157, 0),
(277, 'House for Sale in Karte Now with beautiful sightseeing and best Locatoin', 'Test content.Test content.Test content.Test content.Test content.Test content.Test content.Test content.Test content.Test content.Test content.Test content.Test content.Test content.Test content.Test content.Test content.Test content.Test content.Test content.Test content.Test content.Test content.Test content.Test content.Test content.Test content.Test content.', 'House', 'Sale', 'second floor', '6 Rooms', '', '', 'Half day evening', '', 'Khust', 'karte Now First Street', '', '', 'Test content.Test content.Test content.Test content.Test content.Test content.', '1 year', '$', 300000, 300000, 'yes', '2021-01-12', '2021-01-30', 157, 1),
(278, 'Apartment for rent in karetNow.', 'test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.', 'Apartment', 'Rental', 'Second floor', '6', '', NULL, 'Half day morning', NULL, NULL, 'karte Now Third Street', NULL, NULL, 'test content.test content.test content.test content.test content.', '1 year', '$', 40000, 40000, 'no', '2021-01-16', '2021-01-30', 156, 1),
(279, 'House for rent karteNow first street.', 'this apartment is located in best location of kabul with beautiful view.', 'house', 'rental', 'first floor', '5', '', NULL, 'half day morning', NULL, NULL, 'karte Now First Street', NULL, NULL, 'test content.test content.test content.test content.test content.test content.test content.test content.test content.', '2 year', '$', 300, 300, 'yes', '2021-01-16', '2021-01-30', 156, 1),
(280, 'Apartment in Shashaheed 2nd street with beautiful view', 'this apartment is located in best place of kabul.', 'Apartment', 'Rental', 'Second floor', '5', '', '2Select BathroomsSelect BathroomsSelect BathroomsSelect Bathrooms', 'Half day morning', '1 car capacity', 'Kabul', 'Shahshaheed Second Street', '937238432431', '', 'test content.', '2 year', 'af', 90000, 90000, 'yes', '2021-01-17', '2021-01-30', 156, 1),
(281, 'Apartment in Kabul city for rent in kabul afghanistan.', 'test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.', 'House', 'Sale', 'Second floor', '7', '', '2', 'Half day evening', '2 car capacity', 'kabul', 'Shashaheed First Street', '0789343120', '', 'test content.test content.test content.test content.test content.test content.', '5 year', '$', 3000, 3000, 'yes', '2021-01-17', '2021-01-28', 156, 1),
(282, 'House for rent in Bagrami distract', 'test content.test content.test content.test content.test content.test content.test content.test content.', 'land', 'Mortgage', 'Third floor', '5', '', '2', 'Half day morning', '1 car capacity', 'Kabul', 'karte Now Third Street', '', '', 'test content.test content.test content.test content.test content.test content.test content.', '2 year', 'af', 3342343, 34234, 'yes', '2021-01-25', '2021-01-30', 157, 1),
(283, 'House of Mortgage in Karte Now', 'test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.test content.', 'House', 'rental', 'None', 'none', '', 'none', 'Yes', 'None', 'Kabul', 'Bagrami', '', '', 'test content.test content.test content.test content.test content.test content.test content.test content.', '2 year', 'af', 20000000, 20000000, 'yes', '2021-02-06', '2021-02-28', 157, 0),
(284, 'house for sale in best location of kabul city', 'this house is located in hear of kabul city with beaufifull sightseeing.', 'house', 'sale', 'first floor', '4', '', '2', 'half day morning', '1 car capacity', 'kabul', 'Shahshaheed Third Street', 'shahshahedd third street near Zazai mosque', '0772200987', 'test content.test content.test content.test content.test content.test content.', '1 year', '$', 31000, 31000, 'yes', '2021-02-09', '2021-02-27', 160, 1),
(285, 'apartment for rent in KarteNow 2nd street', 'test content.test content.test content.test content.test content.test content.test content.', 'Apartment', 'Mortgage', 'Basement', '4', '1', '2', 'Half day morning', '2 car capacity', 'Kabul', 'karte Now Third Street', '', '', '07893432410789343241078934324107893432410789343241', '1 year', '$', 12000, 12000, 'yes', '2021-02-09', '2021-03-05', 160, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `uid` bigint(100) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `agency_name` varchar(255) NOT NULL,
  `agency_location` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `reg_date` date NOT NULL,
  `status` int(10) NOT NULL DEFAULT 1,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=161 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `first_name`, `last_name`, `email`, `phone`, `agency_name`, `agency_location`, `password`, `reg_date`, `status`) VALUES
(158, 'Ezatullah', 'Safi', 'safi@gmail.com', '0782021922', '', '', '815775af77fe36aea6236f9eedeaee32', '2021-01-04', 1),
(157, 'Ahmad', 'wali', 'ahmad@gmail.com', '0789234353', '', '', '815775af77fe36aea6236f9eedeaee32', '2021-01-02', 1),
(156, 'Zabihullah', 'Danish', 'danish@gmail.com', '0728224181', '', '', '5b119a961fcb523c81c25e8f79de2380', '2020-12-31', 1),
(159, 'saddam', 'hussien', 'saddam@gmail.com', '0778833221', 'Kabul agency', 'Karte Now 2nd street near to muslim center', '815775af77fe36aea6236f9eedeaee32', '2021-01-20', 1),
(160, 'esmatullah', 'atayee', 'esmat@gmail.com', '0789119032', 'bamyan dealer', 'bamyan', '815775af77fe36aea6236f9eedeaee32', '2021-02-09', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

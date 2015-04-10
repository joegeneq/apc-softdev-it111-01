-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2015 at 05:01 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dst_sts`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_type` enum('Parent','Instructor') COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `user_type`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(2, 'bltzkrg03', 'Instructor', 'GdX4APcvFjVLxvENrH7-LuCw6qFwN4ed', '$2y$13$cdckKJtn3hFnNb2dZvsN0OcKQDYz7zLKP/7TlF7L8GAfXRZc9iBiq', NULL, 'bltzkrg03@gmail.com', 10, 1427778421, 1427778421),
(3, 'bltzkrg04', 'Parent', 'AVzuBl2Wei_95m4BraJcyES7JMhuXHUy', '$2y$13$jQXY.ALkeWv8LobF/v/oCeh19xpWxQpPxSbN9zdF4uzsXCiAUTK/i', NULL, 'bltzkrg04@gmail.com', 10, 1427814124, 1427814124),
(4, 'bltzkrg05', 'Instructor', 'A-I1fpYnL9s3l4T4Oh7l7-YkykBno3oR', '$2y$13$9V/cRbu2FO7Yqlc1gHTmsuzgLOMFIuqp4AhQUebUnGezOeqBYGP4O', NULL, 'bltzkrg05@gmail.com', 10, 1427817761, 1427817761),
(5, 'bltzkrg06', 'Parent', 'Tue2KVCtZv2NHPz4BPfgVIofdjvQsx8G', '$2y$13$bstWnkqf2cMb.IolDBuqjOMplCAGTPSm.6QzkAhOcs4zPX8EE9HNG', NULL, 'bltzkrg06@gmail.com', 10, 1427818076, 1427818076),
(6, 'bltzkrg07', 'Instructor', 'XMDLTMTt1tRcmNyAPxOXq2xrIc-Qnh7z', '$2y$13$.JuAHvuLe.mZ4JufUYIDe..l35CIDV5RFBICz1IXNfmuxzWK9IMha', NULL, 'bltzkrg07@gmail.com', 10, 1427818256, 1427818256),
(7, 'bltzkrg08', 'Parent', '0yz5AsMMGjCNsm3oh1jhCGqiSUAoPzI7', '$2y$13$YsqSlkorsI0.xWL2C53fWeQViQE5yyKKXRM2xgw3YJumMDTyNzTwK', NULL, 'bltzkrg08@gmail.com', 10, 1427818445, 1427818445),
(8, 'bltzkrg09', 'Instructor', '9BgZEMUfpKbjFcWfa80GQaB2gAmrbZ6B', '$2y$13$6AAKaCw0vfPJljVv1vcWluo6KGpHcuyp6EgOS6d4mgeaUAT/9Sqkq', NULL, 'bltzkrg09@gmail.com', 10, 1427818480, 1427818480),
(9, 'bltzkrg10', 'Parent', 'vz94UN1zan0G8he3Ra9VEDh6DuiRZEM8', '$2y$13$NMicjMtB0b4d6HbSrDLQ2.HYo24DpGI2MHlE3Kq1AGDCHcnaTx6Pi', NULL, 'bltzkrg10@gmail.com', 10, 1427820490, 1427820490),
(10, 'bltzkrg11', 'Instructor', 'NIxxST_bvaB3YjhRCas9J4LN8OJdTIFT', '$2y$13$ByA8ZP9hA5amd/8nDAQXZOfcHiKpRiJDBxWDSfjK6l2gUp/dLbjsG', NULL, 'bltzkrg11@gmail.com', 10, 1427899501, 1427899501);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

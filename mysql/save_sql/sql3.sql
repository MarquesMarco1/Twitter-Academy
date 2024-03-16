-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Mar 15, 2024 at 11:26 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `twitter`
--

-- --------------------------------------------------------

--
-- Table structure for table `blocked`
--

CREATE TABLE `blocked` (
  `id_user` int(11) NOT NULL,
  `id_blocked` int(11) NOT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `convo`
--

CREATE TABLE `convo` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `convo`
--

INSERT INTO `convo` (`id`, `name`, `picture`) VALUES
(1, 'la convo des BG', NULL),
(2, 'LA MORT', 'Capture d\'écran 2024-02-11 142600.png'),
(3, 'Conversation de ONLY GUTS', 'assets/img/user.png'),
(4, 't', 'assets/img/user.png'),
(5, 'Conversation de ONE TAP EZ', 'assets/img/user.png'),
(6, 'BERSERKER', 'HD-wallpaper-casca-and-guts-berserk.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `convo_users`
--

CREATE TABLE `convo_users` (
  `id_convo` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `convo_users`
--

INSERT INTO `convo_users` (`id_convo`, `id_user`, `time`) VALUES
(1, 1, '2024-02-21 09:45:54'),
(1, 2, '2024-02-21 09:45:56'),
(2, 22, '2024-03-14 10:05:49'),
(2, 21, '2024-03-14 10:05:49'),
(3, 30, '2024-03-14 11:13:04'),
(3, 21, '2024-03-14 11:13:04'),
(4, 21, '2024-03-14 13:03:18'),
(4, 35, '2024-03-14 13:03:18'),
(5, 21, '2024-03-14 13:03:58'),
(5, 35, '2024-03-14 13:03:58'),
(6, 21, '2024-03-14 13:16:30'),
(6, 35, '2024-03-14 13:16:30');

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `id_user` int(11) NOT NULL,
  `id_follow` int(11) NOT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`id_user`, `id_follow`, `time`) VALUES
(1, 2, '2024-02-21 09:41:13'),
(21, 22, '2024-03-07 14:36:25'),
(21, 21, '2024-03-07 14:47:10'),
(21, 25, '2024-03-07 14:47:30'),
(21, 35, '2024-03-07 14:48:42'),
(21, 32, '2024-03-07 14:48:51'),
(21, 27, '2024-03-07 15:14:24'),
(21, 27, '2024-03-07 15:18:53'),
(21, 27, '2024-03-07 15:18:56'),
(21, 37, '2024-03-07 15:20:55'),
(21, 42, '2024-03-07 15:26:13'),
(21, 26, '2024-03-07 15:28:37'),
(21, 23, '2024-03-07 15:32:34'),
(35, 21, '2024-03-08 09:39:34'),
(21, 44, '2024-03-11 09:46:10'),
(44, 21, '2024-03-11 10:14:59'),
(44, 35, '2024-03-11 10:16:53'),
(45, 21, '2024-03-11 10:19:09'),
(45, 35, '2024-03-11 10:19:22'),
(46, 21, '2024-03-11 15:55:24'),
(46, 35, '2024-03-11 15:55:30');

-- --------------------------------------------------------

--
-- Table structure for table `hashtag_list`
--

CREATE TABLE `hashtag_list` (
  `hashtag` varchar(255) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hashtag_list`
--

INSERT INTO `hashtag_list` (`hashtag`, `id`) VALUES
('lamort', 6),
('guts', 7),
('onlyguts', 8),
('berserk', 9),
('starfield', 10),
('starcitizen', 11),
('tarfield', 12);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id_user` int(11) NOT NULL,
  `id_tweet` int(11) NOT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id_user`, `id_tweet`, `time`) VALUES
(2, 1, '2024-02-21 09:44:56'),
(2, 3, '2024-02-21 09:45:01');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `id_convo` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `content` varchar(10000) DEFAULT NULL,
  `time` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_response` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `id_convo`, `id_user`, `content`, `time`, `id_response`) VALUES
(1, 6, 2, 'Arrete de tweet maintenant', '2024-02-21 10:47:29', NULL),
(2, 6, 21, 'SALUT', '2024-03-14 11:05:55', NULL),
(3, 6, 21, 'Y', '2024-03-14 11:06:22', NULL),
(4, 6, 21, 'Y', '2024-03-14 11:06:25', NULL),
(5, 6, 21, 'tesdt', '2024-03-14 11:57:09', NULL),
(6, 6, 21, 'tesdt', '2024-03-14 11:57:10', NULL),
(7, 6, 21, 'tesdt', '2024-03-14 11:57:11', NULL),
(8, 6, 21, 'tesdt', '2024-03-14 11:57:11', NULL),
(9, 6, 21, 'tesdt', '2024-03-14 11:57:11', NULL),
(10, 6, 21, 'go', '2024-03-14 12:00:35', NULL),
(11, 6, 21, 'go', '2024-03-14 12:00:37', NULL),
(12, 6, 21, 'go', '2024-03-14 12:00:37', NULL),
(13, 6, 21, 'go', '2024-03-14 12:00:37', NULL),
(14, 6, 21, 'go', '2024-03-14 12:00:37', NULL),
(15, 6, 21, 'go', '2024-03-14 12:00:38', NULL),
(16, 6, 21, 'go', '2024-03-14 12:00:38', NULL),
(17, 6, 21, 'go', '2024-03-14 12:00:38', NULL),
(18, 6, 21, 'go', '2024-03-14 12:00:38', NULL),
(19, 6, 21, 'go', '2024-03-14 12:00:38', NULL),
(20, 6, 21, 'go', '2024-03-14 12:00:38', NULL),
(21, 6, 21, 'go', '2024-03-14 12:00:39', NULL),
(22, 6, 21, 'go', '2024-03-14 12:00:39', NULL),
(23, 6, 21, 'go', '2024-03-14 12:00:41', NULL),
(24, 6, 21, 'go', '2024-03-14 12:00:42', NULL),
(25, 6, 21, 'go', '2024-03-14 12:00:44', NULL),
(26, 6, 21, 'go', '2024-03-14 12:00:46', NULL),
(27, 6, 21, 'go', '2024-03-14 12:00:46', NULL),
(28, 6, 21, 'go', '2024-03-14 12:00:47', NULL),
(29, 6, 21, 'go', '2024-03-14 12:00:47', NULL),
(30, 6, 21, 'd', '2024-03-14 12:03:36', NULL),
(31, 6, 21, 'd', '2024-03-14 12:04:55', NULL),
(32, 6, 21, 'd', '2024-03-14 12:05:53', NULL),
(33, 6, 21, '', '2024-03-14 12:06:48', NULL),
(34, 6, 21, 'jonreiejre', '2024-03-14 12:06:51', NULL),
(35, 6, 21, 'fs', '2024-03-14 12:07:55', NULL),
(36, 6, 21, 'fs', '2024-03-14 12:08:04', NULL),
(37, 6, 21, NULL, '2024-03-14 12:08:53', NULL),
(38, 6, 21, 'fd', '2024-03-14 12:09:12', NULL),
(39, 6, 21, 'fd', '2024-03-14 12:09:14', NULL),
(40, 6, 21, '', '2024-03-14 12:10:11', NULL),
(41, 6, 21, '', '2024-03-14 12:10:16', NULL),
(42, 6, 21, '', '2024-03-14 12:10:42', NULL),
(43, 6, 21, 'salut', '2024-03-14 12:10:58', NULL),
(44, 6, 21, 'salut', '2024-03-14 12:11:04', NULL),
(45, 6, 21, 'te', '2024-03-14 12:12:31', NULL),
(46, 6, 21, 'fd', '2024-03-14 12:13:07', NULL),
(47, 6, 21, 'salut', '2024-03-14 12:13:13', NULL),
(48, 6, 21, '', '2024-03-14 12:14:02', NULL),
(49, 6, 21, 'te', '2024-03-14 12:14:07', NULL),
(50, 6, 21, 'fes', '2024-03-14 12:15:48', NULL),
(51, 6, 21, 'fd', '2024-03-14 12:16:39', NULL),
(52, 6, 21, 'fd', '2024-03-14 12:18:10', NULL),
(53, 6, 21, 'tezklfeziofbijfzeiuh', '2024-03-14 12:21:20', NULL),
(54, 6, 21, 'sd', '2024-03-14 12:21:32', NULL),
(55, 6, 21, 'sd', '2024-03-14 12:21:36', NULL),
(56, 6, 21, 'sd', '2024-03-14 12:21:37', NULL),
(57, 6, 21, 'sd', '2024-03-14 12:21:37', NULL),
(58, 6, 21, 'sd', '2024-03-14 12:21:37', NULL),
(59, 6, 21, 'sd', '2024-03-14 12:21:37', NULL),
(60, 6, 21, 'sd', '2024-03-14 12:21:37', NULL),
(61, 6, 21, 'sd', '2024-03-14 12:21:38', NULL),
(62, 6, 21, 'sd', '2024-03-14 12:21:38', NULL),
(63, 6, 21, 'sd', '2024-03-14 12:21:38', NULL),
(64, 6, 21, 'sd', '2024-03-14 12:21:38', NULL),
(65, 6, 21, 'sd', '2024-03-14 12:21:38', NULL),
(66, 6, 21, 'sd', '2024-03-14 12:21:39', NULL),
(67, 6, 21, 'sd', '2024-03-14 12:21:39', NULL),
(68, 6, 21, 'sd', '2024-03-14 12:21:39', NULL),
(69, 6, 21, ' la mort', '2024-03-14 12:22:03', NULL),
(70, 6, 21, ' la mort', '2024-03-14 12:22:05', NULL),
(71, 6, 21, 's', '2024-03-14 12:22:21', NULL),
(72, 6, 21, '', '2024-03-14 12:22:52', NULL),
(73, 6, 21, '', '2024-03-14 12:22:55', NULL),
(74, 6, 21, '', '2024-03-14 12:22:58', NULL),
(75, 6, 21, 'la mort . com', '2024-03-14 12:24:00', NULL),
(76, 6, 21, 'test', '2024-03-14 12:24:12', NULL),
(77, 6, 21, 'te', '2024-03-14 12:24:22', NULL),
(78, 6, 21, 'je suis la mort ', '2024-03-14 12:24:28', NULL),
(79, 6, 21, 'sa lut jgnr eufb zefyg ue', '2024-03-14 12:24:45', NULL),
(80, 6, 21, 'hrtghuirehuiorerhiorijoriojrriortijor', '2024-03-14 12:24:56', NULL),
(81, 6, 21, 'grerg', '2024-03-14 12:24:59', NULL),
(82, 6, 21, 'gergre', '2024-03-14 12:25:00', NULL),
(83, 6, 21, 'grgr', '2024-03-14 12:25:01', NULL),
(84, 6, 21, 'grerge', '2024-03-14 12:25:02', NULL),
(85, 6, 21, 'fsijçàfzeijçfzij', '2024-03-14 12:26:04', NULL),
(86, 6, 35, 'fdsfdsds', '2024-03-14 14:22:58', NULL),
(87, 6, 35, 'la mort', '2024-03-14 14:23:23', NULL),
(88, 6, 35, 'uyggyu', '2024-03-14 14:27:20', NULL),
(89, 6, 21, 'fd', '2024-03-14 14:42:12', NULL),
(90, 6, 21, 'bien ? ', '2024-03-14 14:45:29', NULL),
(91, 6, 21, 'sfhbiefbhifhbi', '2024-03-14 14:55:31', NULL),
(92, 6, 21, 'PETIT REQUETE ', '2024-03-14 14:55:46', NULL),
(93, 6, 35, 'salut ', '2024-03-14 14:56:39', NULL),
(94, 6, 21, 'bien gros ? ', '2024-03-14 14:56:47', NULL),
(95, 3, 21, 'greogre', '2024-03-14 15:23:06', NULL),
(96, 6, 21, 'je tesst', '2024-03-14 15:25:00', NULL),
(97, 5, 35, 'salut', '2024-03-14 15:28:45', NULL),
(98, 6, 35, 'je test aussi ', '2024-03-14 15:29:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reactions`
--

CREATE TABLE `reactions` (
  `id_message` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `reaction` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `retweet`
--

CREATE TABLE `retweet` (
  `id_user` int(11) NOT NULL,
  `id_tweet` int(11) NOT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `retweet`
--

INSERT INTO `retweet` (`id_user`, `id_tweet`, `time`) VALUES
(35, 1, '2024-02-29 12:12:21'),
(35, 3, '2024-02-29 12:31:03'),
(35, 5, '2024-02-29 13:13:54'),
(35, 6, '2024-02-29 13:14:36'),
(35, 7, '2024-02-29 13:15:17'),
(21, 30, '2024-03-01 12:27:38'),
(21, 33, '2024-03-06 19:33:28'),
(21, 27, '2024-03-06 19:33:41'),
(21, 3, '2024-03-06 19:33:50'),
(21, 1, '2024-03-08 11:00:27'),
(21, 9, '2024-03-08 11:02:16'),
(21, 22, '2024-03-11 13:14:31'),
(21, 23, '2024-03-11 13:14:38'),
(21, 24, '2024-03-11 13:14:43'),
(21, 25, '2024-03-11 13:14:45'),
(21, 26, '2024-03-11 13:14:46'),
(21, 21, '2024-03-11 13:26:36'),
(21, 29, '2024-03-11 15:23:21'),
(21, 16, '2024-03-11 15:26:38'),
(21, 31, '2024-03-11 15:42:00'),
(21, 2, '2024-03-11 15:42:06');

-- --------------------------------------------------------

--
-- Table structure for table `signaled`
--

CREATE TABLE `signaled` (
  `id_user` int(11) NOT NULL,
  `id_signaled` int(11) NOT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `starting_time` datetime NOT NULL,
  `stopping_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `token` varchar(30) DEFAULT NULL,
  `now` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tweet`
--

CREATE TABLE `tweet` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_response` int(11) DEFAULT NULL,
  `time` datetime DEFAULT CURRENT_TIMESTAMP,
  `content` varchar(255) NOT NULL,
  `id_quoted_tweet` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tweet`
--

INSERT INTO `tweet` (`id`, `id_user`, `id_response`, `time`, `content`, `id_quoted_tweet`) VALUES
(1, 21, NULL, '2024-03-08 12:00:07', 'Only Guts', NULL),
(2, 21, 1, '2024-03-08 12:00:14', 'commantaire 1', NULL),
(3, 21, 1, '2024-03-08 12:00:22', 'commentaire 2', NULL),
(4, 21, NULL, '2024-03-08 12:00:27', '', 1),
(5, 21, NULL, '2024-03-08 12:00:47', '#onlyguts pour toujours', NULL),
(6, 21, NULL, '2024-03-08 12:00:53', '#lamort aussi pour toujours', NULL),
(7, 21, NULL, '2024-03-08 12:01:09', '#berserk ❤️', NULL),
(8, 21, NULL, '2024-03-08 12:01:26', '#onlyguts', NULL),
(9, 21, NULL, '2024-03-08 12:01:37', '@onlyguts #onlyguts', NULL),
(10, 21, NULL, '2024-03-08 12:02:16', '', 9),
(11, 21, NULL, '2024-03-08 12:06:07', 'best manga #berserk', NULL),
(12, 21, NULL, '2024-03-08 13:40:18', '#starfield', NULL),
(13, 21, NULL, '2024-03-11 09:34:44', '#starcitizen i love ', NULL),
(14, 21, NULL, '2024-03-11 09:34:54', '#starcitizen test', NULL),
(15, 35, NULL, '2024-03-11 10:42:03', 'la mort', NULL),
(16, 44, NULL, '2024-03-11 11:17:32', 'lamort', NULL),
(17, 44, NULL, '2024-03-11 11:17:57', 'ez', NULL),
(18, 44, NULL, '2024-03-11 11:17:59', 'ez', NULL),
(19, 44, NULL, '2024-03-11 11:18:00', 'ez', NULL),
(20, 45, NULL, '2024-03-11 11:21:16', 't', NULL),
(21, 21, NULL, '2024-03-11 12:47:59', 'only #starfield', NULL),
(22, 21, NULL, '2024-03-11 12:48:01', '#starfield', NULL),
(28, 21, NULL, '2024-03-11 14:26:36', '', 21),
(29, 21, NULL, '2024-03-11 14:58:46', '#starfield', NULL),
(30, 21, NULL, '2024-03-11 15:06:56', 's', NULL),
(31, 21, 15, '2024-03-11 15:40:47', 'salut', NULL),
(32, 21, 29, '2024-03-11 15:42:06', '#starcitizen best game', NULL),
(33, 21, 29, '2024-03-11 15:42:16', '#starcitizen best game 2', NULL),
(34, 21, 3, '2024-03-11 15:47:43', 'test', NULL),
(35, 21, NULL, '2024-03-11 16:23:21', '', 29),
(36, 21, NULL, '2024-03-11 16:26:38', '', 16),
(37, 21, 34, '2024-03-11 16:32:57', 'tefds 2', NULL),
(38, 21, NULL, '2024-03-11 16:42:00', '', 31),
(39, 21, NULL, '2024-03-11 16:42:06', '', 2),
(40, 46, NULL, '2024-03-11 16:55:35', 'je test', NULL),
(41, 35, NULL, '2024-03-15 10:52:03', '#starfield', NULL),
(42, 35, NULL, '2024-03-15 12:09:18', '#tarfield best game ever', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `at_user_name` varchar(30) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `banner` varchar(255) NOT NULL,
  `mail` varchar(65) NOT NULL,
  `password` varchar(50) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `private` tinyint(1) DEFAULT NULL,
  `creation_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `city` varchar(50) DEFAULT NULL,
  `campus` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `at_user_name`, `profile_picture`, `bio`, `banner`, `mail`, `password`, `birthdate`, `private`, `creation_time`, `city`, `campus`) VALUES
(21, 'ONLY GUTS', '@guts', 'assets/save_image_user/8HD-wallpaper-casca-and-guts-berserk.jpg', 'ONLY GUUUUUUUUUUTS', 'assets/save_image_user/7HD-wallpaper-casca-and-guts-berserk.jpg', 'test', 'd09010b4266cd67b482837d667c6be9e3830b890', '1999-10-10', 0, '2024-02-23 09:55:40', 'Paris', 'W@C'),
(22, 'lamort', '@lamort', 'assets/img/user.png', NULL, 'assets/img/banner.png', 'lamort@gmail.com', '5191572b60382bbbb603e96dc03424e8ff46282b', '1999-10-10', 0, '2024-02-23 10:28:56', NULL, NULL),
(23, 'lamorthd', '@lamorthd', 'assets/img/user.png', NULL, 'assets/img/banner.png', 'hd@gmail.com', '5191572b60382bbbb603e96dc03424e8ff46282b', '1999-10-10', 0, '2024-02-23 10:37:00', NULL, NULL),
(24, 'twitter', '@twitter', 'assets/img/user.png', NULL, 'assets/img/banner.png', 'twitter@gmail.com', 'd45795dfaf3f4c472432e003de0e1c99ce029381', '1999-10-10', 0, '2024-02-23 10:41:43', NULL, NULL),
(25, 'adming', '@adming', 'assets/img/user.png', NULL, 'assets/img/banner.png', 'gh@hm.com', '4b8b6b749efaa1bf6af640d35362947e951faabd', '1999-10-10', 0, '2024-02-23 10:50:14', NULL, NULL),
(26, 'berserkk', '@berserkk', 'assets/img/user.png', NULL, 'assets/img/banner.png', 'berserkk@gmail.co', 'f94683b56947625d55df549300cb76350796fe35', '1999-10-10', 0, '2024-02-23 11:06:05', NULL, NULL),
(27, 'AJAX', '@ajax', 'assets/img/user.png', NULL, 'assets/img/banner.png', 'ajax@gmail.co', 'f94683b56947625d55df549300cb76350796fe35', '1999-10-10', 0, '2024-02-23 11:06:05', NULL, NULL),
(30, 'AJAX2', '@ajax2', 'assets/img/user.png', NULL, 'assets/img/banner.png', 'aja2x@gmail.co', 'f94683b56947625d55df549300cb76350796fe35', '1999-10-10', 0, '2024-02-23 11:06:05', NULL, NULL),
(31, 'AJAX23', '@ajax23', 'assets/img/user.png', NULL, 'assets/img/banner.png', 'aja2x33@gmail.co', 'f94683b56947625d55df549300cb76350796fe35', '1999-10-10', 0, '2024-02-23 11:06:05', NULL, NULL),
(32, 'AJAX235', '@ajax253', 'assets/img/user.png', NULL, 'assets/img/banner.png', 'aja2x533@gmail.co', 'f94683b56947625d55df549300cb76350796fe35', '1999-10-10', 0, '2024-02-23 11:06:05', NULL, NULL),
(33, 'csgo', '@csgo', 'assets/img/user.png', NULL, 'assets/img/banner.png', 'csgo@gmail.com', 'f94683b56947625d55df549300cb76350796fe35', '1999-10-10', 0, '2024-02-27 08:51:57', NULL, NULL),
(34, 'testart', '@testart', 'assets/img/user.png', NULL, 'assets/img/banner.png', 'testart@gmzil.com', 'f94683b56947625d55df549300cb76350796fe35', '1999-10-10', 0, '2024-02-27 11:38:10', NULL, NULL),
(35, 'ONE TAP EZ', '@lamort75', 'assets/img/user.png', 'EZ', 'assets/save_image_user/6HD-wallpaper-casca-and-guts-berserk.jpg', 'lamort75@gmail.com', '4b8b6b749efaa1bf6af640d35362947e951faabd', '1999-10-10', 0, '2024-02-27 12:49:43', 'EZ', 'EZ'),
(36, 'test', '@test', 'assets/img/user.png', NULL, 'assets/img/banner.png', 'terzdqsdqs@gmail.com', '4b8b6b749efaa1bf6af640d35362947e951faabd', '1999-10-10', 0, '2024-03-07 09:21:40', NULL, NULL),
(37, 'lamorttttt', '@lamorttttt', 'assets/img/user.png', NULL, 'assets/img/banner.png', 'lamortuer@gmail.com', '4b8b6b749efaa1bf6af640d35362947e951faabd', '1999-10-10', 0, '2024-03-07 09:22:40', NULL, NULL),
(38, 'lamortu', '@lamortu', 'assets/img/user.png', NULL, 'assets/img/banner.png', 'lamortu@gmail.com', '4b8b6b749efaa1bf6af640d35362947e951faabd', '1999-10-10', 0, '2024-03-07 09:27:02', NULL, NULL),
(39, 'lamort78', '@lamort78', 'assets/img/user.png', NULL, 'assets/img/banner.png', 'lamort78@gmail.Com', '4b8b6b749efaa1bf6af640d35362947e951faabd', '1999-10-10', 0, '2024-03-07 09:27:48', NULL, NULL),
(40, 'tg56', '@tg56', 'assets/img/user.png', NULL, 'assets/img/banner.png', 'tg56@gmail.Com', '4b8b6b749efaa1bf6af640d35362947e951faabd', '1999-10-10', 0, '2024-03-07 09:29:46', NULL, NULL),
(41, 'tony75', '@tony75', 'assets/img/user.png', NULL, 'assets/img/banner.png', 'tony75@gmail.com', '4b8b6b749efaa1bf6af640d35362947e951faabd', '1999-10-10', 0, '2024-03-07 09:30:56', NULL, NULL),
(42, 'tor', '@tor', 'assets/img/user.png', NULL, 'assets/img/banner.png', 'tor@gmail.com', '4b8b6b749efaa1bf6af640d35362947e951faabd', '1999-10-10', 0, '2024-03-07 09:36:22', NULL, NULL),
(43, 'test45', '@test45', 'assets/img/user.png', NULL, 'assets/img/banner.png', 'test45@gmail.Com', '4b8b6b749efaa1bf6af640d35362947e951faabd', '1999-10-10', 0, '2024-03-07 09:38:45', NULL, NULL),
(44, 'pippin', '@pippin', 'assets/save_image_user/6HD-wallpaper-casca-and-guts-berserk.jpg', NULL, 'assets/img/banner.png', 'pippin@gmail.com', '4b8b6b749efaa1bf6af640d35362947e951faabd', '1999-10-10', 0, '2024-03-11 09:43:49', NULL, NULL),
(45, 'navigo', '@navigo', 'assets/save_image_user/6HD-wallpaper-casca-and-guts-berserk.jpg', NULL, 'assets/img/banner.png', 'navigo@gmail.com', '4b8b6b749efaa1bf6af640d35362947e951faabd', '1999-10-10', 0, '2024-03-11 10:18:49', NULL, NULL),
(46, 'jetest', '@jetest', 'assets/save_image_user/6Capture d\'écran 2024-01-25 125255.png', NULL, 'assets/save_image_user/7Capture d\'écran 2024-01-31 143355.png', 'lamort75@gmai.Com', '4b8b6b749efaa1bf6af640d35362947e951faabd', '1999-10-10', 0, '2024-03-11 15:55:11', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `convo`
--
ALTER TABLE `convo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hashtag_list`
--
ALTER TABLE `hashtag_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tweet`
--
ALTER TABLE `tweet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `at_user_name` (`at_user_name`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `convo`
--
ALTER TABLE `convo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hashtag_list`
--
ALTER TABLE `hashtag_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tweet`
--
ALTER TABLE `tweet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

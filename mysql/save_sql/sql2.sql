-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Mar 01, 2024 at 12:15 PM
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
(1, 'la convo des BG', NULL);

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
(1, 2, '2024-02-21 09:45:56');

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
(1, 2, '2024-02-21 09:41:13');

-- --------------------------------------------------------

--
-- Table structure for table `hashtag_list`
--

CREATE TABLE `hashtag_list` (
  `hashtag` varchar(255) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 1, 2, 'Arrete de tweet maintenant', '2024-02-21 10:47:29', NULL);

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
(35, 7, '2024-02-29 13:15:17');

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
(1, 21, NULL, '2024-02-29 13:12:19', 'test', NULL),
(2, 35, NULL, '2024-02-29 13:12:21', '', 1),
(3, 35, NULL, '2024-02-29 13:31:00', '@lamort75', NULL),
(4, 35, NULL, '2024-02-29 13:31:03', '', 3),
(5, 35, NULL, '2024-02-29 14:13:50', 'coucou c\'est la mort ', NULL),
(6, 35, NULL, '2024-02-29 14:13:54', '', 5),
(9, 21, 5, '2024-02-29 16:15:00', 'df', NULL),
(10, 21, 3, '2024-02-29 16:16:44', 'fd', NULL),
(11, 21, 3, '2024-02-29 16:19:07', 'cx', NULL),
(12, 21, 1, '2024-02-29 16:21:42', 'salut', NULL),
(13, 21, 1, '2024-02-29 16:21:44', 'salutds', NULL),
(14, 21, 1, '2024-02-29 16:23:02', 'bien ? ', NULL),
(15, 21, 1, '2024-02-29 16:23:32', 'hehe ', NULL),
(16, 21, 5, '2024-02-29 16:23:41', 'la mort', NULL),
(17, 21, NULL, '2024-02-29 16:23:57', 'tr', NULL),
(18, 21, 17, '2024-02-29 16:25:05', 'test comment', NULL),
(19, 21, 17, '2024-02-29 16:26:40', 'test 2', NULL),
(20, 21, 17, '2024-02-29 16:26:48', 'test 2', NULL),
(21, 21, 17, '2024-02-29 16:27:42', 'test 2', NULL),
(22, 21, 17, '2024-02-29 16:27:48', 'fdqds', NULL),
(23, 21, 17, '2024-02-29 16:28:05', 'fdqds', NULL),
(24, 21, 17, '2024-02-29 16:28:18', 'fdqds', NULL),
(25, 21, 17, '2024-02-29 16:28:21', 'la mort', NULL),
(26, 21, 17, '2024-02-29 16:34:39', 'vhngffghfhgh,', NULL),
(27, 21, NULL, '2024-03-01 12:45:14', 'test', NULL);

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
(21, 'guts', '@guts', 'assets/save_image_user/0HD-wallpaper-casca-and-guts-berserk.jpg', 'ONLY GUUUUUUUUUUTS', 'assets/img/banner.png', 'guts@gmail.com', 'd09010b4266cd67b482837d667c6be9e3830b890', '1999-10-10', NULL, '2024-02-23 09:55:40', 'Paris', 'W@C'),
(22, 'lamort', '@lamort', 'assets/save_image_user/1warning-icon.png', NULL, 'assets/img/banner.png', 'lamort@gmail.com', '5191572b60382bbbb603e96dc03424e8ff46282b', '1999-10-10', 0, '2024-02-23 10:28:56', NULL, NULL),
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
(35, 'ONE TAP', '@lamort75', 'assets/img/user.png', NULL, 'assets/img/banner.png', 'lamort75@gmail.com', '4b8b6b749efaa1bf6af640d35362947e951faabd', '1999-10-10', 0, '2024-02-27 12:49:43', NULL, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hashtag_list`
--
ALTER TABLE `hashtag_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

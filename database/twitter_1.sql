-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Feb 22, 2024 at 04:13 PM
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
(1, 2, '2024-02-21 09:44:00');

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
(1, 1, NULL, '2024-02-21 10:42:31', 'SALUT VOICI UN TWEET DE SYPHAX', NULL),
(2, 2, 1, '2024-02-21 10:42:53', 'bon tweet ça', NULL),
(3, 1, 2, '2024-02-21 10:43:17', 'merci', NULL);

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
(1, 'Syphax', '@Syphax', 'img/lm5p.jpg', 'Salut ici cest le twitter de Syphax le plus beau', 'img/1265.jpg', 'SyphaxLPB@gmail.com', 'eie2151sfe48465', '2024-02-22', 0, '2024-02-21 09:38:51', 'Paris', NULL),
(2, 'Romain', '@ronron', 'img/3fgm.jpg', 'ici ça code', 'img/ab65.jpg', 'ronron@free.fr', 'ffqoh861e2151465', '2024-02-22', 1, '2024-02-21 09:40:23', 'Paris', NULL),
(3, 'test', 'test', 'rezs', 'tesd', 'erdf', 'fnjd', 'trj', NULL, NULL, NULL, NULL, NULL),
(4, 'admin', '@admin', 'assets/img/user.png', NULL, 'assets/img/banner.jpg', 'test@gmail.Com', 'test', NULL, NULL, NULL, NULL, NULL),
(5, 'tony', '@tony', 'assets/img/user.png', NULL, 'assets/img/banner.jpg', 'tony@gmzi.com', 'tg', NULL, NULL, '2024-02-22 13:12:20', NULL, NULL),
(6, 'lamort', '@lamort', 'assets/img/user.png', NULL, 'assets/img/banner.jpg', 'lamort@gmail.com', 'tg', NULL, NULL, '2024-02-22 13:53:31', NULL, NULL),
(8, 'gutss', '@gutss', 'assets/img/user.jpg', NULL, 'assets/img/banner.png', 'gutss@berserk.com', 'd09010b4266cd67b482837d667c6be9e3830b890', NULL, NULL, '2024-02-22 14:57:03', NULL, NULL),
(9, 'morty', '@morty', 'assets/img/user.jpg', NULL, 'assets/img/banner.png', 'morty@gmail.Com', 'd09010b4266cd67b482837d667c6be9e3830b890', '2001-02-07', NULL, '2024-02-22 15:37:09', NULL, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

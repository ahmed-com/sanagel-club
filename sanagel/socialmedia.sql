-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 05, 2019 at 03:11 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `socialmedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(7) NOT NULL AUTO_INCREMENT,
  `post_id` int(7) NOT NULL,
  `user_id` int(7) NOT NULL,
  `comment_content` varchar(511) DEFAULT NULL,
  `comment_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`),
  KEY `user_id` (`user_id`),
  KEY `post_id` (`post_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `notification_id` int(7) UNSIGNED NOT NULL AUTO_INCREMENT,
  `source_id` int(7) DEFAULT NULL,
  `action_char` char(1) DEFAULT NULL,
  `user_id` int(7) UNSIGNED NOT NULL,
  PRIMARY KEY (`notification_id`),
  KEY `user_id` (`user_id`),
  KEY `user_id_2` (`user_id`),
  KEY `user_id_3` (`user_id`),
  KEY `source_id` (`source_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(7) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(7) UNSIGNED NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` varchar(1023) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `likes_num` int(11) NOT NULL,
  `comments_num` int(11) NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `post_time`, `content`, `likes_num`, `comments_num`) VALUES
(2, 1, '2019-09-28 01:38:51', 'I hope it works this time', 0, 0),
(3, 1, '2019-09-28 01:53:26', 'it workded', 0, 0),
(4, 1, '2019-09-28 01:53:56', 'it worked', 0, 0),
(5, 1, '2019-09-28 02:01:05', 'nothing', 0, 0),
(6, 2, '2019-09-28 02:03:26', 'example', 0, 0),
(7, 1, '2019-09-28 07:26:54', 'php', 0, 0),
(8, 2, '2019-09-28 07:30:01', 'another example', 0, 0),
(9, 1, '2019-09-28 10:07:49', 'this is ahmed', 0, 0),
(10, 2, '2019-09-28 10:10:34', 'this is example', 0, 0),
(11, 1, '2019-09-30 18:07:15', 'possibilities', 0, 0),
(12, 2, '2019-09-30 18:21:02', 'goodness', 0, 0),
(13, 1, '2019-09-30 18:42:42', '&lt;script&gt;', 0, 0),
(14, 1, '2019-09-30 18:44:11', '&lt; script &gt;', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(7) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(10) DEFAULT NULL,
  `last_name` varchar(15) DEFAULT NULL,
  `pw` varchar(255) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `bio` varchar(1023) DEFAULT NULL,
  `mail` varchar(254) DEFAULT NULL,
  `join_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  KEY `mail` (`mail`(64)),
  KEY `password` (`pw`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `pw`, `gender`, `birthdate`, `bio`, `mail`, `join_time`) VALUES
(1, 'ahmed', 'mamdouh', '$2y$10$ct.QUkhs0tGUd.fuJAC7jOjhmVtD90f7R09nCAH6nTzJvSnkj2jsi', 'm', '1997-10-21', NULL, 'ahmed0grwan@gmail.com', NULL),
(2, 'example', 'example', '$2y$10$wBFv0HtBh6Kq0RUWb.5Vhu1zhhM0cuf5ub46s3Ur3Jr1UiAQPSL1e', 'm', '1998-01-01', NULL, 'example@example.example', '2019-09-28 02:03:15'),
(3, 'Ahmed', 'Mahfouz', '$2y$10$v1mHZhlcUhQJj9Zs1B6CBus7uQ1G1rcDRPrFvvDUF4vlNJR9MIShG', 'm', '1998-03-16', NULL, 'Ahmed@mahfouz.com', '2019-09-28 11:02:12'),
(4, 'kamal', 'ted', '$2y$10$6e3KGxGvOeTPQ8kswXZ5.OTNW90mrEibLjOtLXptrnvAfndxZrUsC', 'm', '1998-01-01', NULL, '01008586239', '2019-09-30 18:58:26'),
(5, 'mo', 'ah', '$2y$10$/4Fuo6uuWEUdv0b6.oA7runGHhKqAU/LQBoNL/9q1pT5rZbzCrX0W', 'm', '1998-10-14', NULL, '01001314267', '2019-10-01 00:24:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts` ADD FULLTEXT KEY `FULLTEXT` (`content`);

--
-- Indexes for table `users`
--
ALTER TABLE `users` ADD FULLTEXT KEY `bio` (`bio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

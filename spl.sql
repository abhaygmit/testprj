-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 05, 2015 at 05:23 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `spl`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id` bigint(11) NOT NULL auto_increment,
  `username` varchar(255) default NULL,
  `password` varchar(255) default NULL,
  `email` varchar(255) default NULL,
  `name` varchar(255) NOT NULL,
  `addressLine1` varchar(255) NOT NULL,
  `addressLine2` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `prefix` int(5) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `username`, `password`, `email`, `name`, `addressLine1`, `addressLine2`, `country`, `state`, `zipcode`, `prefix`, `phone`, `status`) VALUES
(1, 'abhay', 'admin@123', 'admin@megsheads.com', 'Scheduudler''s Admin', 'Mount fort', '', 'US', 'MA', '02138', 77, '91900666666', 1),
(2, 'aziz', 'password', NULL, '', '', '', '', '', '', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bet_result`
--

CREATE TABLE `bet_result` (
  `id` int(11) NOT NULL auto_increment,
  `tournament_id` int(11) NOT NULL,
  `match_id` int(11) NOT NULL,
  `proposition_id` int(11) NOT NULL,
  `bet_id` int(11) NOT NULL,
  `bet_as` int(1) NOT NULL,
  `bet_result` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `bet_result`
--

INSERT INTO `bet_result` (`id`, `tournament_id`, `match_id`, `proposition_id`, `bet_id`, `bet_as`, `bet_result`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 31, 4, 1, 1, 1, '2015-07-05 16:00:18', '2015-07-05 16:00:18'),
(2, 1, 1, 26, 6, 1, 1, 1, '2015-07-05 16:00:18', '2015-07-05 16:00:18'),
(3, 1, 1, 15, 7, 2, 1, 1, '2015-07-05 16:00:18', '2015-07-05 16:00:18'),
(4, 1, 1, 21, 8, 2, 1, 1, '2015-07-05 16:00:18', '2015-07-05 16:00:18'),
(5, 1, 1, 15, 9, 2, 1, 1, '2015-07-05 16:00:18', '2015-07-05 16:00:18'),
(6, 1, 1, 18, 10, 2, 1, 1, '2015-07-05 16:00:18', '2015-07-05 16:00:18');

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` int(11) NOT NULL auto_increment,
  `tournament_id` int(11) NOT NULL,
  `tournament_name` varchar(255) NOT NULL,
  `match_name` varchar(255) NOT NULL,
  `match_date` datetime NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `tournament_id`, `tournament_name`, `match_name`, `match_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'STPL Triangular Series', 'Strikers vs All Stars', '2015-07-04 05:15:00', 1, '2015-06-26 00:00:00', '2015-06-26 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int(11) NOT NULL auto_increment,
  `player_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `players`
--


-- --------------------------------------------------------

--
-- Table structure for table `player_runs`
--

CREATE TABLE `player_runs` (
  `id` int(11) NOT NULL auto_increment,
  `player_id` int(11) NOT NULL,
  `player_name` varchar(255) NOT NULL,
  `runs` int(11) NOT NULL,
  `match_played` int(11) NOT NULL,
  `sixes` int(11) NOT NULL,
  `fours` int(11) NOT NULL,
  `ball_faced` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `player_runs`
--


-- --------------------------------------------------------

--
-- Table structure for table `player_wickets`
--

CREATE TABLE `player_wickets` (
  `id` int(11) NOT NULL auto_increment,
  `player_id` int(11) NOT NULL,
  `player_name` varchar(255) NOT NULL,
  `overs` int(11) NOT NULL,
  `wickets` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `player_wickets`
--


-- --------------------------------------------------------

--
-- Table structure for table `points_table`
--

CREATE TABLE `points_table` (
  `id` int(11) NOT NULL auto_increment,
  `team_id` int(11) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `win` int(11) NOT NULL,
  `lose` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `rating` decimal(6,2) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `points_table`
--


-- --------------------------------------------------------

--
-- Table structure for table `propositions`
--

CREATE TABLE `propositions` (
  `id` int(11) NOT NULL auto_increment,
  `tournament_id` int(11) NOT NULL,
  `match_id` int(11) NOT NULL,
  `tournament_name` varchar(255) NOT NULL,
  `match_name` varchar(255) NOT NULL,
  `proposition_title` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `propositions`
--

INSERT INTO `propositions` (`id`, `tournament_id`, `match_id`, `tournament_name`, `match_name`, `proposition_title`, `status`, `created_at`, `updated_at`) VALUES
(15, 1, 1, 'STPL Triangular Series', 'Strikers vs All Stars', 'Strikers will win the match', 1, '2015-07-01 11:15:07', '2015-07-01 11:15:07'),
(16, 1, 1, 'STPL Triangular Series', 'Strikers vs All Stars', 'Aziz will score most runs in the match', 1, '2015-07-01 11:17:06', '2015-07-01 11:17:06'),
(17, 1, 1, 'STPL Triangular Series', 'Strikers vs All Stars', 'Servesh Mishra will score most runs in the match', 1, '2015-07-01 11:17:26', '2015-07-01 11:17:26'),
(18, 1, 1, 'STPL Triangular Series', 'Strikers vs All Stars', 'Gaurav will be the most Economical bowler in the match', 1, '2015-07-01 11:18:31', '2015-07-01 11:18:31'),
(19, 1, 1, 'STPL Triangular Series', 'Strikers vs All Stars', 'Surya will be the most Economical bowler in the match', 1, '2015-07-01 11:18:49', '2015-07-01 11:18:49'),
(20, 1, 1, 'STPL Triangular Series', 'Strikers vs All Stars', 'Aziz will be the most Economical bowler in the match', 1, '2015-07-01 11:19:11', '2015-07-01 11:19:11'),
(21, 1, 1, 'STPL Triangular Series', 'Strikers vs All Stars', 'Servesh Mishra will be the most Economical bowler in the match', 1, '2015-07-01 11:19:58', '2015-07-01 11:19:58'),
(22, 1, 1, 'STPL Triangular Series', 'Strikers vs All Stars', 'Strikers will make 45 runs in first 6 overs', 1, '2015-07-01 11:20:35', '2015-07-01 11:20:35'),
(23, 1, 1, 'STPL Triangular Series', 'Strikers vs All Stars', 'AllStars will make 45 runs in first 6 overs.', 1, '2015-07-01 11:21:23', '2015-07-01 11:21:23'),
(24, 1, 0, 'STPL Triangular Series', 'Select Match', 'Servesh Mishra will hit the most no.of sixes in the match.', 1, '2015-07-01 11:23:06', '2015-07-01 11:23:06'),
(25, 1, 1, 'STPL Triangular Series', 'Strikers vs All Stars', 'Mukesh  will score more than 20 runs in the match', 1, '2015-07-01 11:25:12', '2015-07-01 11:25:12'),
(26, 1, 1, 'STPL Triangular Series', 'Strikers vs All Stars', 'Avinash will take most wickets in the match.', 1, '2015-07-01 11:26:20', '2015-07-01 11:26:20'),
(27, 1, 1, 'STPL Triangular Series', 'Strikers vs All Stars', 'Strickers will score more than 100 runs in his innings', 1, '2015-07-01 11:27:38', '2015-07-01 11:27:38'),
(28, 1, 1, 'STPL Triangular Series', 'Strikers vs All Stars', 'AllStars will score more than 100 runs in his innings', 1, '2015-07-01 11:28:18', '2015-07-01 11:28:18'),
(29, 1, 1, 'STPL Triangular Series', 'Strikers vs All Stars', 'Abhishek PM will be the most economical bowler of the match.', 1, '2015-07-01 11:29:47', '2015-07-01 11:29:47'),
(30, 1, 1, 'STPL Triangular Series', 'Strikers vs All Stars', 'Servesh Admin will bowl more than 3 wide balls.', 1, '2015-07-01 11:31:27', '2015-07-01 11:31:27'),
(31, 1, 1, 'STPL Triangular Series', 'Strikers vs All Stars', 'Shivam will be the most expensive bowler of the match.', 1, '2015-07-01 12:24:54', '2015-07-01 12:24:54'),
(32, 1, 1, 'STPL Triangular Series', 'Strikers vs All Stars', 'wrwerew', 1, '2015-07-05 00:14:54', '2015-07-05 00:14:54');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL auto_increment,
  `tournament_id` int(11) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `description` varchar(255) default NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `teams`
--


-- --------------------------------------------------------

--
-- Table structure for table `team_squad`
--

CREATE TABLE `team_squad` (
  `id` int(11) NOT NULL auto_increment,
  `tournament_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `player_name` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `team_squad`
--


-- --------------------------------------------------------

--
-- Table structure for table `tournament`
--

CREATE TABLE `tournament` (
  `id` int(11) NOT NULL auto_increment,
  `tournament_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tournament`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(255) collate utf8_unicode_ci NOT NULL,
  `email` varchar(255) collate utf8_unicode_ci NOT NULL,
  `password` varchar(60) collate utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) collate utf8_unicode_ci default NULL,
  `created_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'abhay', 'abhay.mishra@srmtechsol.com', 'Abhay123', 'R78XBMBE3RCwMvzdu9DatkbBXXv9RHw6Xs3GV5MU2UszCYf86x3y7fq0B6Jj', '2015-06-25 10:04:59', '2015-07-01 05:44:10'),
(2, 'Aziz Imam', 'aziz.imam@srmtechsol.com', 'Aziz123', '1fYSPUhKcx2UThjovlbQkaXlNgOwEArOc79lY2queiBEPVqqEwt5EEGAf5aV', '2015-06-26 05:56:06', '2015-07-02 05:18:12'),
(3, 'Abhishek srivastava', 'abhishek.srivastava2@srmtechsol.com', 'Abhi123', 'Xqs4iAcKbqUCdbfljhZpo2E0d0BltFIWLcWgxzASs571ElYRzOd4o4Ypz2op', '2015-06-26 05:58:33', '2015-07-01 12:36:32');

-- --------------------------------------------------------

--
-- Table structure for table `user_bets`
--

CREATE TABLE `user_bets` (
  `id` int(11) NOT NULL auto_increment,
  `bet_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `bet_as` int(1) NOT NULL,
  `bet_amount` decimal(6,2) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `betting_code` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_as` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `user_bets`
--

INSERT INTO `user_bets` (`id`, `bet_id`, `user_name`, `bet_as`, `bet_amount`, `user_email`, `betting_code`, `status`, `created_at`, `updated_as`) VALUES
(1, 15, 'Surya', 1, '100.00', 'surya.singh@srmtechsol.com', '1435758740.924', 0, '2015-07-01 13:52:20', '2015-07-01 13:52:20'),
(2, 15, 'less greater', 1, '100.00', 'sfsdf@sdasd.com', '1435759428.1323', 0, '2015-07-01 14:03:48', '2015-07-01 14:03:48'),
(3, 23, 'Praveen', 1, '100.00', 'contact.praveensharma@yahoo.com', '1435760610.9355', 0, '2015-07-01 14:23:30', '2015-07-01 14:23:30'),
(4, 31, 'ashu', 1, '100.00', 'ashutosh.dubey@srmtechsol.com', '1435810392.6269', 0, '2015-07-02 04:13:13', '2015-07-02 04:13:13'),
(5, 31, 'Surya', 1, '100.00', 'surya.singh@srmtechsol.com', '1435810626.8435', 0, '2015-07-02 04:17:06', '2015-07-02 04:17:06'),
(6, 26, 'sanjay singh', 1, '100.00', 'sanjay.singh@srmtechsol.com', '1435810912.0139', 0, '2015-07-02 04:21:52', '2015-07-02 04:21:52'),
(7, 15, 'Amitesh Singh', 2, '50.00', 'amiteshkumar.singh@srmtechsol.com', '1435811052.1088', 0, '2015-07-02 04:24:12', '2015-07-02 04:24:12'),
(8, 21, 'Ashish Kashyap', 2, '200.00', 'Ashish.Kashyap@srmtechsol.com', '1435811603.8447', 0, '2015-07-02 04:33:23', '2015-07-02 04:33:23'),
(9, 15, 'Amardeep Verma', 2, '60.00', 'amardeep.verma@srmtechsol.com', '1435812074.5762', 0, '2015-07-02 04:41:14', '2015-07-02 04:41:14'),
(10, 18, 'amardeep Verma', 2, '70.00', 'Amardeep.Verma@srmtechsol.com', '1435812224.1315', 0, '2015-07-02 04:43:44', '2015-07-02 04:43:44'),
(11, 15, 'qwqwqwqw', 2, '55.00', 'asd@awdea.com', '1435812231.5175', 0, '2015-07-02 04:43:51', '2015-07-02 04:43:51');

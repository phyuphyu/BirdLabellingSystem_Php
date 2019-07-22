-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 07, 2017 at 06:26 PM
-- Server version: 5.6.32-78.1-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `myanmat7_bird_labelling`
--

-- --------------------------------------------------------

--
-- Table structure for table `lables`
--

CREATE TABLE IF NOT EXISTS `lables` (
  `l_id` int(20) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `l_status` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sounds`
--

CREATE TABLE IF NOT EXISTS `sounds` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(255) NOT NULL,
  `s_time` varchar(50) NOT NULL,
  `s_location` varchar(255) NOT NULL,
  `s_environment` varchar(255) NOT NULL,
  `s_path` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sounds`
--

INSERT INTO `sounds` (`s_id`, `s_name`, `s_time`, `s_location`, `s_environment`, `s_path`) VALUES
(1, 'two_moreporks02.mp3', 'agr', 'rg', 'srg', 'sounds/two_moreporks02.mp3'),
(2, 'two_moreporks03.mp3', 'rdg', 'xb', 'xtx', 'sounds/two_moreporks03.mp3'),
(3, '', '', '', '', 'sounds/'),
(4, 'two_moreporks04.mp3', 'avD', 'DC', 'DC', 'sounds/two_moreporks04.mp3'),
(5, 'two_moreporks05.mp3', 'arf', 'aef', 'aef', 'sounds/two_moreporks05.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `u_id` int(11) NOT NULL,
  `u_first_name` varchar(100) NOT NULL,
  `u_last_name` varchar(100) NOT NULL,
  `u_password` varchar(50) NOT NULL,
  `u_confirm_password` varchar(50) NOT NULL,
  `u_email` varchar(50) NOT NULL,
  `u_gender` varchar(50) NOT NULL,
  `u_type` varchar(10) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_first_name`, `u_last_name`, `u_password`, `u_confirm_password`, `u_email`, `u_gender`, `u_type`) VALUES
(1, 'Phyu', 'Kyaw', '123', '', 'phyulwin@gmail.com', '', 'AD'),
(16, 'Jn', 'hens', 'Ouse38', 'Ouse38', 'k@kico.nz', 'F', 'N'),
(15, 'By', 'Pwasi', '123456@789', '123456@789', 'moo8@gmail.com', 'M', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE IF NOT EXISTS `votes` (
  `v_id` int(11) NOT NULL,
  `v_sound_id` int(11) NOT NULL,
  `v_user_id` int(11) NOT NULL,
  `v_lable_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lables`
--
ALTER TABLE `lables`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `sounds`
--
ALTER TABLE `sounds`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lables`
--
ALTER TABLE `lables`
  MODIFY `l_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sounds`
--
ALTER TABLE `sounds`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

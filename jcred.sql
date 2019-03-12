-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2019 at 01:15 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jcred`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_preferences`
--

CREATE TABLE `bank_preferences` (
  `id` int(11) NOT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `account_type` varchar(255) DEFAULT NULL,
  `account_holder` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_preferences`
--

INSERT INTO `bank_preferences` (`id`, `user_email`, `bank`, `account_number`, `account_type`, `account_holder`) VALUES
(1, 'holang@gmail.com', 'Standard Bank', '1234567', 'Savings', 'Holang Makhumisane'),
(2, 'dawn@gmail.com', '', '', '', ''),
(3, 'doe@doe.com', 'African Bank', '19182828384', 'current', 'Doe Mortu');

-- --------------------------------------------------------

--
-- Table structure for table `employment_details`
--

CREATE TABLE `employment_details` (
  `id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `employer` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `gross` varchar(255) DEFAULT NULL,
  `nett` varchar(255) DEFAULT NULL,
  `industry` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `frequency` varchar(255) DEFAULT NULL,
  `day` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employment_details`
--

INSERT INTO `employment_details` (`id`, `user_email`, `status`, `employer`, `phone`, `gross`, `nett`, `industry`, `position`, `time`, `contact`, `frequency`, `day`) VALUES
(1, 'holang@gmail.com', 'Employed Full Time', 'KT Opportunities', '0799832548', '10000', '1000', 'IT', 'Developer', '1 year', '011 011 0111', 'Monthly', '31'),
(2, 'dawn@gmail.com', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(4, 'doe@doe.com', 'full time', 'Raymond Mortu', '0833832282', '50000', '45000', 'civil engineer', 'manager', '2years', '0110029837', 'monthly', '31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `fullname`, `phone`, `email`, `address`, `city`, `code`, `password`, `type`) VALUES
(5, 'Holang Makhumisane', '0799832549', 'vhuyositsula@gmail.com', '561 Netherlands Street, Nellmapius', 'Pretoria', '0162', '12345', 'admin'),
(6, 'Raymond Mortu', '0799832549', 'ray@gmail.com', 'SBTI building 220 2nd st, Halfway House', 'Midrand', '1685', '12345', 'investor'),
(7, 'Raymond Doe Mortu', '0736532113', 'doe@gmail.com', '383 Willow Crest, Sagewood st, Noordwyk, Midrand', 'Cape Town', '1685', '123456', 'admin'),
(8, 'doe Mortu', '0736532113', 'doe@doe.com', '383 willo rod', 'midrand', '1938', '123456', 'lendee'),
(9, 'k Joe', '0728372288', 'joe@gmai.com', '', '', '', '123456', 'investor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_preferences`
--
ALTER TABLE `bank_preferences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employment_details`
--
ALTER TABLE `employment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_preferences`
--
ALTER TABLE `bank_preferences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employment_details`
--
ALTER TABLE `employment_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

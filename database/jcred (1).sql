-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2019 at 11:30 AM
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
(3, 'doe@doe.com', 'African Bank', '19182828384', 'current', 'Doe Mortu'),
(4, 'koni@gmail.com', 'Stand V', '000111251455', NULL, 'Koni Sitsula'),
(5, 'vhua@gmail.com', 'standard banek', '522246225', NULL, 'vhua sitsula'),
(6, 'nompfa@gmail.com', 'absa', '022655845', NULL, 'nompfa sitsula'),
(7, 'koni@gmail.com', 'Stand V', '000111251455', NULL, 'Koni Sitsula'),
(8, 'konoi@gmail.com', 'absa', '000111251455', NULL, 'Koni Sitsula'),
(9, 'rak@gmail.com', 'FNB', '9292448', NULL, 'rak tram');

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
(4, 'doe@doe.com', 'full time', 'Raymond Mortu', '0833832282', '50000', '45000', 'civil engineer', 'manager', '2years', '0110029837', 'monthly', '31'),
(5, 'koni@gmail.com', 'Employed', NULL, '0729756814', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'vhua@gmail.com', 'Employed', NULL, '0729756814', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'nompfa@gmail.com', 'Employed', NULL, '0729756845', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'koni@gmail.com', 'Employed', NULL, '0729756845', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'konoi@gmail.com', 'Employed', NULL, '0729756814', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'rak@gmail.com', 'Dev', NULL, '0736532113', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `date_added` datetime(6) DEFAULT CURRENT_TIMESTAMP(6),
  `fullname` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT 'admin12',
  `type` varchar(255) NOT NULL,
  `org` varchar(225) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `cover` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `date_added`, `fullname`, `phone`, `email`, `address`, `city`, `code`, `password`, `type`, `org`, `avatar`, `cover`) VALUES
(5, '2019-03-14 11:35:39.987965', 'Holang Makhumisane', '0799832549', 'vhuyositsula@gmail.com', '561 Netherlands Street, Nellmapius', 'Pretoria', '0162', '12345', 'Admin', '', '', ''),
(6, '2019-03-14 11:35:39.987965', 'Raymond Mortu', '0799832549', 'ray@gmail.com', 'SBTI building 220 2nd st, Halfway House', 'Midrand', '1685', '12345', 'Super-Admin', '', 'L_assets/images/avatar/face.png', 'L_assets/images/cover/1298909.jpg'),
(7, '2019-03-14 11:35:39.987965', 'Raymond Doe Mortu', '0736532113', 'doe@gmail.com', '383 Willow Crest, Sagewood st, Noordwyk', 'Cape Town', '1686', '123456', 'Admin', '', 'L_assets/images/avatar/gif1.gif', 'L_assets/images/cover/cool-wallpaper-4.jpg'),
(8, '2019-03-14 11:35:39.987965', 'doe Mortu', '0736532113', 'doe@doe.com', '383 willo rod', 'midrand', '1938', '123456', 'lendee', '', '', ''),
(23, '2019-03-14 11:35:39.987965', 'Joe Dre', '0736532113', 'joe@gmail.com', '383 Willow Crest, Sagewood st, Noordwyk', 'Cape Town', '1092', '1844156d4166d94387f1a4ad031ca5fa', 'Super-Admin', '', '', ''),
(24, '2019-03-14 11:35:39.987965', 'dre bordons', '0736532113', 'dre@gmail.com', '383 Willow Crest, Sagewood st, Noordwyk', 'Cape Town', '2023', 'admin12', 'Super-Super-Admin', '', 'L_assets/images/avatar/angry.png', ''),
(25, '2019-03-15 11:19:55.265891', 'rak tram', '0736532113', 'rak@gmail.com', '383 Willow Crest, Sagewood st, Noordwyk', 'Cape Town', '1882', 'admin12', 'Investor', '', '', ''),
(26, '2019-03-15 12:03:10.208067', 'sleyo med', '19383837', 'sleyo@gmail.com', '383 Willow Crest, Sagewood st, Noordwyk', 'Cape Town', '3334', 'admin12', 'Admin', 'kto', '', ''),
(29, '2019-03-15 13:18:01.323221', 'Kwao Doe', '3949484', 'doe.mortu@gmail.com', '383 Willow Crest, Sagewood st, Noordwyk', 'Cape Town', '3344', 'admin12', 'Super-Admin', 'kto', '', ''),
(30, '2019-03-15 16:33:41.274899', 'rai Mond Doe', '0736532113', 'doe.utrom@gmail.com', '383 Willow Crest, Sagewood st, Noordwyk', 'Cape Town', '8383', 'admin12', 'Admin', 'kto', '', ''),
(31, '2019-03-15 16:37:11.154387', 'yaw bred', '938382222', 'yaw@gmail.com', '383 Willow Crest, Sagewood st, Noordwyk', 'Cape Town', '8383', 'admin12', 'Admin', 'kto', '', ''),
(32, '2019-03-15 18:23:43.530314', 'Thoriso Rangata', '0722717331', 'Thoriso@ktopportunities.co.za', '383 Willow Crest, Sagewood st, Noordwyk', 'Midrand', '8383', 'admin12', 'Super-Admin', 'kto', '', '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employment_details`
--
ALTER TABLE `employment_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
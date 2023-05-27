-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2023 at 01:34 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `driver_hiring`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `b_id` int(3) NOT NULL,
  `city` varchar(40) NOT NULL,
  `date` varchar(30) NOT NULL,
  `duration` int(3) NOT NULL,
  `name` varchar(20) NOT NULL,
  `mobile` varchar(32) NOT NULL,
  `email` varchar(30) NOT NULL,
  `vehical` varchar(30) NOT NULL,
  `driverid` int(3) NOT NULL,
  `status` varchar(34) NOT NULL,
  `chat_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `country_state_city`
--

CREATE TABLE `country_state_city` (
  `id` int(11) NOT NULL,
  `country` varchar(250) NOT NULL,
  `state` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country_state_city`
--

INSERT INTO `country_state_city` (`id`, `country`, `state`, `city`) VALUES
(1, 'Turkiye', 'Istanbul', 'Manisa'),
(2, 'Turkiye', 'Izmir', 'Akasya'),
(3, 'Turkiye', 'Adana', 'Ordu'),
(4, 'Azerbaycan', 'Baki', 'Nesimi');

-- --------------------------------------------------------

--
-- Table structure for table `cred_users`
--

CREATE TABLE `cred_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  `role` varchar(255) DEFAULT NULL,
  `access` varchar(1000) DEFAULT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cred_users`
--

INSERT INTO `cred_users` (`id`, `username`, `password`, `date_created`, `role`, `access`, `active`) VALUES
(46, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '2022-08-23 21:15:05', 'admin', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `driver_register`
--

CREATE TABLE `driver_register` (
  `id` int(4) NOT NULL,
  `name` varchar(30) NOT NULL,
  `age` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lisence` varchar(10) NOT NULL,
  `charge` varchar(40) NOT NULL,
  `country` varchar(32) NOT NULL,
  `state` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `image` varchar(60) NOT NULL,
  `discription` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loginlogs`
--

CREATE TABLE `loginlogs` (
  `id` int(11) NOT NULL,
  `ip_addr` varchar(255) NOT NULL,
  `blocked_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` varchar(255) DEFAULT NULL,
  `receiver_id` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `who_added` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `country_state_city`
--
ALTER TABLE `country_state_city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cred_users`
--
ALTER TABLE `cred_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_register`
--
ALTER TABLE `driver_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loginlogs`
--
ALTER TABLE `loginlogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `b_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `country_state_city`
--
ALTER TABLE `country_state_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cred_users`
--
ALTER TABLE `cred_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `driver_register`
--
ALTER TABLE `driver_register`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `loginlogs`
--
ALTER TABLE `loginlogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4822;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=294;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

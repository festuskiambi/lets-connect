-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2016 at 10:36 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `letsconnect`
--

-- --------------------------------------------------------

--
-- Table structure for table `connections`
--

CREATE TABLE `connections` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `nickname` varchar(128) NOT NULL,
  `address` varchar(128) NOT NULL,
  `contact` varchar(128) NOT NULL,
  `comment` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `connections`
--

INSERT INTO `connections` (`id`, `name`, `nickname`, `address`, `contact`, `comment`, `created`, `modified`) VALUES
(1, 'Joy Jobbs', 'jobbs', '65 Ring Road Nairobi', '+ 44 5566 4444', 'I am a developer', '2016-05-23 15:10:49', '2016-05-23 13:10:49');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  `donor_name` varchar(128) NOT NULL,
  `donor_address` varchar(128) NOT NULL,
  `donor_contact` varchar(128) NOT NULL,
  `wished` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `donor_name`, `donor_address`, `donor_contact`, `wished`, `created`, `modified`) VALUES
(1, 'Television', 'this is a 32 inch television', 200, 'ken', '44 Ring Road Nairobi', '+254 755 222 111', 0, '2016-05-23 10:23:46', '2016-05-23 07:23:46'),
(3, 'refligarator', 'this is a functioning lg refligarator', 300, 'john merkel', '44 georgepadmore nairobi', '+321 456 555', 0, '2016-05-23 12:03:58', '2016-05-23 10:03:58');

-- --------------------------------------------------------

--
-- Table structure for table `products_wish_list`
--

CREATE TABLE `products_wish_list` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_wish_list`
--

INSERT INTO `products_wish_list` (`id`, `name`, `description`, `created`, `modified`) VALUES
(1, 'gift', 'any gift', '2016-05-24 10:42:22', '2016-05-24 07:42:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(5) NOT NULL,
  `name` varchar(25) NOT NULL,
  `nickname` varchar(35) NOT NULL,
  `address` varchar(35) NOT NULL,
  `contact` varchar(35) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `nickname`, `address`, `contact`, `password`) VALUES
(0, 'fes', '321', '21', 'kj6', '12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `connections`
--
ALTER TABLE `connections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_wish_list`
--
ALTER TABLE `products_wish_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `nickname` (`nickname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `connections`
--
ALTER TABLE `connections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `products_wish_list`
--
ALTER TABLE `products_wish_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

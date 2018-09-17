-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2018 at 05:51 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mapRoutes`
--

-- --------------------------------------------------------

--
-- Table structure for table `MapRouteKey`
--

CREATE TABLE `MapRouteKey` (
  `sys_id` int(11) NOT NULL,
  `MapRouteKey` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `MapRouteKey`
--

INSERT INTO `MapRouteKey` (`sys_id`, `MapRouteKey`) VALUES
(1, 'AIzaSyAgMHMC4TPKzYN5Bt9X1lCGpO5Um7nDDIY');



CREATE TABLE `MapRouteRecords` (
  `sys_id` int(11) NOT NULL,
  `order_id` varchar(500) NOT NULL,
  `origin` varchar(500) NOT NULL,
  `destination` varchar(500) NOT NULL,
  `distance` varchar(500) NOT NULL,
  `duration` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



--
-- Indexes for dumped tables
--

--
-- Indexes for table `MapRouteKey`
--
ALTER TABLE `MapRouteKey`
  ADD PRIMARY KEY (`sys_id`);
ALTER TABLE `MapRouteRecords`
  ADD PRIMARY KEY (`sys_id`);




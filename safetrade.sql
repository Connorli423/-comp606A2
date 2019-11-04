-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2019 at 12:53 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `safetrade`
--

-- --------------------------------------------------------

--
-- Table structure for table `estimate`
--

CREATE TABLE `estimate` (
  `id` int(11) NOT NULL,
  `postUser` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `cost` varchar(255) NOT NULL,
  `laborcost` varchar(255) NOT NULL,
  `materialscost` varchar(255) NOT NULL,
  `due` varchar(255) NOT NULL,
  `jobId` varchar(255) NOT NULL,
  `status` varchar(6) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `estimate`
--

INSERT INTO `estimate` (`id`, `postUser`, `user`, `cost`, `laborcost`, `materialscost`, `due`, `jobId`, `status`) VALUES
(9, '123', '123123', '123123', '123123', '123123', '2019-11-08', '5', '0'),
(10, '123', '321', '1000', '10000', '1000', '2019-11-09', '5', '0'),
(11, '123', '11122', '123123', '123123', '122222', '2019-11-14', '5', '0'),
(14, '123', '4444', '15000', '123123', '2222', '2019-11-13', '5', '1'),
(16, '336', '2225', '2000', '23', '123', '2019-11-14', '13', '1'),
(17, 'Connor1', 'ConnorT', '15000', '23', '2222', '2019-11-06', '14', '1');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `des` varchar(255) NOT NULL,
  `cost` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL,
  `finish` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `postDateTime` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `location`, `des`, `cost`, `active`, `finish`, `user`, `postDateTime`, `title`) VALUES
(5, 'Hamilton', 'IT manager', '1000', '2019-11-16', '2019-11-03', '123', '2019-11-01 11:59:59', 'IT'),
(6, 'Manager', 'sales marketing', '3322', '2019-11-13', '2019-11-22', '2223', '2019-11-02 11:22:06', 'Business'),
(14, 'Hamilton', 'Editor', '12344', '2019-11-05', '2019-11-13', 'Connor1', '2019-11-04 00:49:14', 'book publisher'),
(13, 'Hamilton', 'seller', '2222', '2019-11-06', '2019-11-07', '336', '2019-11-04 00:25:08', 'market'),
(11, 'Hamilton', 'market seller', '2000', '2019-11-08', '2019-11-29', '555', '2019-11-02 11:34:06', 'seller');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(6) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`, `email`, `phone`) VALUES
(3, '123', '123123', 1, '714135061@qq.com', '123'),
(4, '123123', '123123', 2, '714135061@qq.com', '123123'),
(5, '321', '321321', 2, '714135061@qq.com', '321'),
(6, '2525', '2525', 1, '123@q.com', '123'),
(7, '222', '2222', 1, '123@q.com', '123'),
(8, '1112', '1112', 1, '123@q.com', '22222'),
(9, '11122', '11122', 2, '123@q.com', '11122'),
(10, '2223', '123123', 1, '123@123.com', '123123'),
(11, '555', '55555', 1, '111@111.com', '22211'),
(12, '4444', '4444', 2, '714135061@qq.com', '123'),
(13, '2222', '2222', 1, '714135061@qq.com', '123'),
(14, '123321', '123123', 1, '222@2.com', '12321'),
(15, '333', '333', 1, '123@q.com', '222222'),
(16, '445', '445', 2, '3333@q.com', '445'),
(17, '336', '336', 1, '123@q.com', '333'),
(18, '2225', '2225', 2, '222@2.com', '123'),
(19, 'Connor1', 'Connor1', 1, '123980@gmail.com', '88281283'),
(20, 'ConnorT', 'ConnorT', 2, '123@qq.com', '122545');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `estimate`
--
ALTER TABLE `estimate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `estimate`
--
ALTER TABLE `estimate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

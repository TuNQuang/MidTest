-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2021 at 09:11 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `midtest`
--
CREATE DATABASE IF NOT EXISTS `midtest` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `midtest`;

-- --------------------------------------------------------

--
-- Table structure for table `subunit`
--

CREATE TABLE `subunit` (
  `subid` int(10) NOT NULL,
  `subname` varchar(50) NOT NULL,
  `unit` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subunit`
--

INSERT INTO `subunit` (`subid`, `subname`, `unit`) VALUES
(1001, 'Bộ môn toán học', 105),
(1002, 'Văn phòng khoa', 105);

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `unitid` int(10) NOT NULL,
  `unitname` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unitid`, `unitname`) VALUES
(101, 'Ban giám hiệu'),
(102, 'Hội đồng trường'),
(103, 'Văn phòng đảng ủy'),
(104, 'Phòng đào tạo'),
(105, 'Khoa công nghệ thông tin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `userpass` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `workphone` bigint(20) DEFAULT NULL,
  `personalphone` bigint(20) DEFAULT NULL,
  `subunitid` int(10) NOT NULL,
  `adminstatus` tinyint(1) NOT NULL,
  `position` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `userpass`, `email`, `workphone`, `personalphone`, `subunitid`, `adminstatus`, `position`) VALUES
(1, 'Nguyễn Thanh Tùng', 'tungnt01', 'tungnt01@tlu.edu.vn', 38521442, 0, 1002, 1, 'Trưởng khoa'),
(3, 'Đặng Thị Thu Hiền', 'hiendtt01', 'hiendtt01@tlu.edu.vn', 35632211, 0, 1002, 1, 'P.Trưởng khoa'),
(4, 'Nguyễn Hữu Thọ', 'thonh01', 'thonh01@tlu.edu.vn', 0, 0, 1001, 1, 'Trưởng bộ môn'),
(5, 'Đỗ Lân', 'land01', 'land01@tlu.edu.vn', 0, 0, 1001, 1, 'Phó bộ môn');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `subunit`
--
ALTER TABLE `subunit`
  ADD PRIMARY KEY (`subid`),
  ADD KEY `unit` (`unit`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unitid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `subunitid` (`subunitid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `subunit`
--
ALTER TABLE `subunit`
  MODIFY `subid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unitid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `subunit`
--
ALTER TABLE `subunit`
  ADD CONSTRAINT `subunit_ibfk_1` FOREIGN KEY (`unit`) REFERENCES `unit` (`unitid`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`subunitid`) REFERENCES `subunit` (`subid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

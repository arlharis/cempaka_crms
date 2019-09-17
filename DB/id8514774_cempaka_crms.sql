-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2019 at 10:45 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id8514774_cempaka_crms`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `id` int(11) NOT NULL,
  `complaint_id` int(20) NOT NULL,
  `username` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `complaint_type` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `complaint_report` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `dated` date NOT NULL,
  `block` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `feedback_report` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `finish_dated` date NOT NULL,
  `action` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`id`, `complaint_id`, `username`, `name`, `complaint_type`, `complaint_report`, `dated`, `block`, `feedback_report`, `finish_dated`, `action`, `status`) VALUES
(1, 1000, 51092, 'Aimi Nadzirah Binti Mohd Noor', 'Facilities', 'Kipas bilik rosak', '2019-04-24', '                K8A/1/3C      \r\n              ', 'Sudah diperbaiki', '2019-04-24', 'Done', 1),
(2, 1001, 51092, 'Aimi Nadzirah Binti Mohd Noor', 'Facilities', 'Kipas bilik rosak', '2019-04-24', '                K8A/1/3C      \r\n              ', '', '0000-00-00', 'In Process', 1),
(3, 1002, 51092, 'Aimi Nadzirah Binti Mohd Noor', 'Social', 'Roommate saya tak balik bilik dah 4 hari', '2019-04-24', '                K8A/1/3C      \r\n              ', '', '0000-00-00', 'In Process', 1),
(4, 1003, 51092, 'Aimi Nadzirah Binti Mohd Noor', 'Social', 'Roommate saya tak balik bilik dah 4 hari', '2019-04-24', '                K8A/1/3C      \r\n              ', '', '0000-00-00', 'In Process', 1),
(5, 1011, 51175, 'Amir Rul Lukman Haziq Bin Amir Rul Imran', 'Facilities', 'Rosak', '2019-04-24', '                K9B/3/3C      \r\n              ', 'Dah diperbaiki', '2019-04-29', 'Done', 1),
(6, 1012, 51175, 'Amir Rul Lukman Haziq Bin Amir Rul Imran', 'Facilities', 'Tandas tersumbat', '2019-04-29', '                K9B/3/3C      \r\n              ', 'Kami akan ambil tindakan dengan segera. Harap bersabar', '2019-04-29', 'In Process', 1);

-- --------------------------------------------------------

--
-- Table structure for table `complaint_code`
--

CREATE TABLE `complaint_code` (
  `id` int(10) NOT NULL,
  `complaint_type` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `scode` int(10) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint_code`
--

INSERT INTO `complaint_code` (`id`, `complaint_type`, `scode`, `status`) VALUES
(1, 'Facilities', 1, 1),
(2, 'Social', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `emergency`
--

CREATE TABLE `emergency` (
  `id` int(15) NOT NULL,
  `emergency_id` int(20) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `contact_no` varchar(12) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emergency`
--

INSERT INTO `emergency` (`id`, `emergency_id`, `name`, `contact_no`, `status`) VALUES
(1, 100, 'Bahagian Keselamatan UNIMAS', '082581999', 1),
(2, 101, 'Pos Pengawal Utama UNIMAS', '082583904', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fellow`
--

CREATE TABLE `fellow` (
  `id` int(11) NOT NULL,
  `fellow_id` int(20) NOT NULL,
  `fellow_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `contact_no` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `fellow_block` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `availability` int(11) NOT NULL,
  `on_duty` int(12) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fellow`
--

INSERT INTO `fellow` (`id`, `fellow_id`, `fellow_name`, `contact_no`, `fellow_block`, `availability`, `on_duty`, `status`) VALUES
(1, 2500, 'Encik Bakri Bin Abdul Karim', '0175440578', 'K8A', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(11) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `no_tel` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `block` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `password`, `email`, `no_tel`, `block`, `created_at`, `role`, `status`) VALUES
(1, 'admin', 'Cempaka Admin', 'admin', 'fyp51175@gmail.com', '0135485234', 'Office', '2019-04-23 16:42:04', 'ADMIN', 1),
(2, '51092', 'Aimi Nadzirah Binti Mohd Noor', '123456', '51092@siswa.unimas.my', '+60194422930', 'K8A/1/3C', '2019-04-23 18:00:40', 'USER', 1),
(3, '51175', 'Amir Rul Lukman Haziq Bin Amir Rul Imran', '123456', '51175@siswa.unimas.my', '+60135485234', 'K9B/3/3C', '2019-04-28 19:26:47', 'USER', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint_code`
--
ALTER TABLE `complaint_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emergency`
--
ALTER TABLE `emergency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fellow`
--
ALTER TABLE `fellow`
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
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `complaint_code`
--
ALTER TABLE `complaint_code`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `emergency`
--
ALTER TABLE `emergency`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fellow`
--
ALTER TABLE `fellow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

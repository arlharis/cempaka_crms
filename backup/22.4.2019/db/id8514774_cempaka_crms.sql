-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 21, 2019 at 06:40 PM
-- Server version: 10.3.14-MariaDB
-- PHP Version: 7.3.2

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
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id` int(11) NOT NULL,
  `username` varchar(11) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `username`, `name`, `password`, `email`, `created_at`, `status`) VALUES
(1, 'admin', 'Cempaka Office', 'admin', '51175@siswa.unimas.my', '2019-02-13 00:14:05', 1);

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
(1, 1000, 51175, 'Amir Rul Lukman Haziq Bin Amir Rul Imran', 'Facilities', 'Wifi connection problem since yesterday.', '2019-03-22', 'K8B/G/2A', 'Sudah Dibaiki', '2019-04-12', 'Done', 1),
(2, 1001, 51069, 'Ahmad Aniq Azizan', 'Social', 'Tandas tersumbat, tak boleh buang air besar', '2019-03-02', 'K9B/2/2C', 'Dah dibetulkan. Terima kasih atas report anda', '0000-00-00', 'Done', 1),
(3, 1002, 53390, 'Aimi Nadzirah Binti Mohd Noor', 'Facilities', 'Kipas rosak', '2019-03-30', 'K8B/G/2A', 'Sudah Dibaiki', '2019-04-20', 'Done', 1),
(4, 1003, 51231, 'Nora Farah Binti Khalid', 'Social', 'Roommate hari hari mabuk', '2019-03-31', 'K9B/2/2C', 'Dah dibetulkan. Terima kasih atas report anda', '2019-04-13', 'Done', 1),
(5, 1004, 51175, 'Amir Rul Lukman Haziq Bin Amir Rul Imran', 'Facilities', 'Wifi connection problem since yesterday.', '2019-03-22', 'K8B/G/2A', 'aaa', '0000-00-00', 'In Process', 1),
(6, 1005, 51069, 'Ahmad Aniq Azizan', 'Social', 'Tandas tersumbat, tak boleh buang air besar', '2019-03-02', 'K9B/2/2C', 'Dah dibetulkan. Terima kasih atas report anda', '0000-00-00', 'Done', 1),
(7, 1006, 53390, 'Aimi Nadzirah Binti Mohd Noor', 'Facilities', 'Kipas rosak', '2019-03-30', 'K8B/G/2A', 'Akan Dibaiki', '0000-00-00', 'In Process', 1),
(8, 1007, 51231, 'Nora Farah Binti Khalid', 'Social', 'Roommate hari hari mabuk', '2019-03-31', 'K9B/2/2C', 'Dah dibetulkan. Terima kasih atas report anda', '0000-00-00', 'Done', 1),
(12, 1008, 51175, 'Amir Rul Lukman Haziq Bin Amir Rul Imran', 'Facilities', 'Lampu Bilik Rosak', '2019-04-11', 'K9B', '', '0000-00-00', '', 1),
(13, 1009, 0, '', '', '', '0000-00-00', '', '', '0000-00-00', '', 1);

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
(2, 101, 'Pos Pengawal Utama UNIMAS', '082583904', 1),
(3, 102, 'Bilik Kawalan CCTV UNIMAS', '082581004', 1),
(4, 103, 'Pusat Kawalan Balai Polis Kota Samarahan', '082662300', 1),
(5, 104, 'Bilik Kawalan Bomba Kota Samarahan', '082673881', 1),
(6, 105, 'Khairul Anwar', '0135537642', 1);

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
(1, 2500, 'Muhammad Haziq Bin Hanidza', '0192211234', 'K8A', 1, 0, 1),
(2, 2501, 'Amira Syafira Binti Amir Rul Imran', '0128155142', 'K8A', 1, 1, 1),
(3, 2502, 'Nadzrin Bin Abdullah', '0196543201', 'K8A', 1, 0, 1),
(4, 2503, 'Ahmad Nazmi Bin Samsul', '0176548321', 'K8A', 1, 1, 1),
(5, 2504, 'Dairul Bin Dabang', '0178233743', 'K8A', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `resident`
--

CREATE TABLE `resident` (
  `id` int(11) NOT NULL,
  `username` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `no_tel` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `resident`
--

INSERT INTO `resident` (`id`, `username`, `name`, `password`, `email`, `no_tel`, `status`) VALUES
(1, 51175, 'Amir Rul Lukman Haziq Bin Amir Rul Imran', '126089', '51175@siswa.unimas.my', '0135485234', 1),
(2, 51069, 'Ahmad Aniq Azizan', '123456', '51069@siswa.unimas.my', '0135485232', 1),
(3, 52231, 'Nur Siti Maisarah Binti Khalid', '123456', '52231@siswa.unimas.my', '0135485231', 1),
(4, 52211, 'Wan Aisyah Binti Wan Akmal', '123456', '52211@siswa.unimas.my', '0135485238', 1),
(5, 52614, 'Mohd Yosuf Bin Mohd Rosli', '126089', '52614@siswa.unimas.my', '0135485239', 1),
(6, 50230, 'Ahmad Aiman Bin Muis', '123456', '50230@siswa.unimas.my', '0135485233', 1),
(7, 50012, 'Nur Maisarah Binti Ibrahim', '123456', '50012@siswa.unimas.my', '0135485235', 1),
(8, 51340, 'Aimi Nadrah Binti Lukman', '123456', '51340@siswa.unimas.my', '0135485237', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `resident`
--
ALTER TABLE `resident`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `complaint_code`
--
ALTER TABLE `complaint_code`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `emergency`
--
ALTER TABLE `emergency`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fellow`
--
ALTER TABLE `fellow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `resident`
--
ALTER TABLE `resident`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

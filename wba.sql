-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2025 at 01:14 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wba`
--

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `rate_id` int(11) NOT NULL,
  `rate_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`rate_id`, `rate_name`) VALUES
(1, 'Residential/Government'),
(2, 'Government I'),
(3, 'Commercial A'),
(4, 'Commercial B'),
(5, 'Commercial Industrial');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(255) NOT NULL,
  `u_fname` varchar(255) NOT NULL,
  `u_lname` varchar(255) NOT NULL,
  `u_address` varchar(255) NOT NULL,
  `u_phone` varchar(255) NOT NULL,
  `u_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `u_password` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `u_role` varchar(255) NOT NULL DEFAULT 'User',
  `rate_id` int(11) NOT NULL DEFAULT 0,
  `u_account_number` varchar(255) DEFAULT NULL,
  `u_senior` int(1) NOT NULL DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_fname`, `u_lname`, `u_address`, `u_phone`, `u_email`, `u_password`, `u_role`, `rate_id`, `u_account_number`, `u_senior`, `updated_at`) VALUES
(1, 'Administrator', 'Account', 'Philippines', '', 'admin@gmail.com', 'admin', 'Administrator', 1, NULL, 0, '2025-05-21 23:13:58'),
(2, 'John', 'Doe', 'Philippines', '', 'staff@gmail.com', 'staff', 'Staff', 1, NULL, 0, '2025-05-21 23:14:00');

-- --------------------------------------------------------

--
-- Table structure for table `water_meter`
--

CREATE TABLE `water_meter` (
  `wm_id` int(255) NOT NULL,
  `u_id` int(255) NOT NULL,
  `u_account_number` int(255) NOT NULL,
  `wm_meter_number` varchar(255) NOT NULL,
  `rate_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `water_reading`
--

CREATE TABLE `water_reading` (
  `wr_id` int(255) NOT NULL,
  `u_id` int(255) NOT NULL,
  `wm_meter_number` int(255) NOT NULL,
  `wr_date` date NOT NULL,
  `wr_due_date` date NOT NULL,
  `wr_rlm` float NOT NULL,
  `wr_reading` float NOT NULL,
  `wr_twc` float NOT NULL,
  `wr_bill` float NOT NULL,
  `wr_ftax_bill` float NOT NULL,
  `wr_senior_discount` float NOT NULL DEFAULT 0,
  `wr_due_bill` float NOT NULL,
  `wr_type` varchar(255) NOT NULL,
  `wr_proof` varchar(255) NOT NULL,
  `wr_status` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `water_meter`
--
ALTER TABLE `water_meter`
  ADD PRIMARY KEY (`wm_id`),
  ADD KEY `AA` (`u_id`);

--
-- Indexes for table `water_reading`
--
ALTER TABLE `water_reading`
  ADD PRIMARY KEY (`wr_id`),
  ADD KEY `d` (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `water_meter`
--
ALTER TABLE `water_meter`
  MODIFY `wm_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `water_reading`
--
ALTER TABLE `water_reading`
  MODIFY `wr_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `water_meter`
--
ALTER TABLE `water_meter`
  ADD CONSTRAINT `AA` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`);

--
-- Constraints for table `water_reading`
--
ALTER TABLE `water_reading`
  ADD CONSTRAINT `d` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


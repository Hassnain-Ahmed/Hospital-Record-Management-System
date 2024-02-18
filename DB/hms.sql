-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2022 at 08:29 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

create Database hms;

use hms;


CREATE TABLE `appointment` (
  `a_id` int(11) NOT NULL,
  `p_name` varchar(30) DEFAULT NULL,
  `d_name` varchar(30) DEFAULT NULL,
  `a_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `d_id` int(11) NOT NULL,
  `d_name` varchar(30) DEFAULT NULL,
  `d_dob` date DEFAULT NULL,
  `d_email` varchar(50) DEFAULT NULL,
  `d_cell` int(15) DEFAULT NULL,
  `d_addr` varchar(100) DEFAULT NULL,
  `d_ecell` int(15) DEFAULT NULL,
  `d_special` varchar(50) DEFAULT NULL,
  `d_workingsince` date DEFAULT NULL,
  `d_lastworkplace` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE `nurse` (
  `n_id` int(11) NOT NULL,
  `n_name` varchar(25) DEFAULT NULL,
  `n_dob` date DEFAULT NULL,
  `n_email` varchar(50) DEFAULT NULL,
  `n_cell` int(15) DEFAULT NULL,
  `n_addr` varchar(100) DEFAULT NULL,
  `n_ecell` int(20) DEFAULT NULL,
  `n_lastworkplace` varchar(50) DEFAULT NULL,
  `n_workingsince` date DEFAULT NULL,
  `n_referencename` varchar(50) DEFAULT NULL,
  `n_referencenum` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(30) DEFAULT NULL,
  `p_dob` date DEFAULT NULL,
  `p_email` varchar(50) DEFAULT NULL,
  `p_cell` int(15) DEFAULT NULL,
  `p_addr` varchar(100) DEFAULT NULL,
  `p_ecell` int(15) DEFAULT NULL,
  `p_diagnosis` varchar(50) DEFAULT NULL,
  `p_symptom` varchar(50) DEFAULT NULL,
  `p_medicine` varchar(50) DEFAULT NULL,
  `p_alergies` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `si_id` int(11) NOT NULL,
  `si_name` varchar(30) DEFAULT NULL,
  `si_email` varchar(30) DEFAULT NULL,
  `si_username` varchar(30) DEFAULT NULL,
  `si_password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(25) DEFAULT NULL,
  `s_dob` date DEFAULT NULL,
  `s_email` varchar(50) DEFAULT NULL,
  `s_cell` int(15) DEFAULT NULL,
  `s_addr` varchar(100) DEFAULT NULL,
  `s_ecell` int(20) DEFAULT NULL,
  `s_lastworkplace` varchar(50) DEFAULT NULL,
  `s_workingsince` date DEFAULT NULL,
  `s_referencename` varchar(50) DEFAULT NULL,
  `s_referencenum` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`si_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nurse`
--
ALTER TABLE `nurse`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `si_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

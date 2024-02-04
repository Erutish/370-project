-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2023 at 01:02 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rent_home`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` char(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Name`, `email`, `password`, `id`) VALUES
('ERA', 'hdch@gmail.com', '$2y$10$EoUyjC7Zrvug47BWo9tS5ua9VS1sNH7NiYQiS./ZXSRyGylFUS8kC', 1);

-- --------------------------------------------------------

--
-- Table structure for table `booking_requests`
--

CREATE TABLE `booking_requests` (
  `property_id` int(11) DEFAULT NULL,
  `tenant_nid` int(11) DEFAULT NULL,
  `owner_nid` int(11) DEFAULT NULL,
  `request_status` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `homeowner`
--

CREATE TABLE `homeowner` (
  `nid` int(10) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `address` varchar(80) NOT NULL,
  `password` char(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `review_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `homeowner`
--

INSERT INTO `homeowner` (`nid`, `first_name`, `last_name`, `address`, `password`, `email`, `phone_number`, `review_id`) VALUES
(11, 'Era', 'Chowdhury', 'hogwarts', '$2y$10$ZdLT1cTAJfr.cT37jNYovOWaediEg/UKNAoMvUKOO6U/F9M6caW86', 'jensen@gmail.com', 123, NULL),
(1717, 'test17', 'test17', 'test17', '$2y$10$RposJcCp0iED38YySBNKxeZhpH8LxKrBhZpRGPP.pbk1zLAvLbojy', '17@gmail.com', 1717171, NULL),
(2020201, 'test20', 'test20', 'test20', '$2y$10$4OmMDXi1ztQbrMDuqxOIB.sWiBkIDWN2jx7W/8vrj8bG1sYIle1JK', '20@gmail.com', 20202011, NULL),
(783747385, 'mug', 'dho', 'bguhj', '$2y$10$U3fbkCmzrZSVmYZ8V2DHgeimrGss.opPpKmUNvBfRZ8v8477BtCMu', 'hdch@gmail.com', 2147483647, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `homeowner_reviews`
--

CREATE TABLE `homeowner_reviews` (
  `Rating` int(5) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `review_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `owner_signup`
--

CREATE TABLE `owner_signup` (
  `nid` int(10) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `address` varchar(80) NOT NULL,
  `password` char(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `reg_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `owner_signup`
--

INSERT INTO `owner_signup` (`nid`, `first_name`, `last_name`, `address`, `password`, `email`, `phone_number`, `reg_status`) VALUES
(11, 'Era', 'Chowdhury', 'hogwarts', '$2y$10$ZdLT1cTAJfr.cT37jNYovOWaediEg/UKNAoMvUKOO6U/F9M6caW86', 'jensen@gmail.com', 123, 'approved'),
(1717, 'test17', 'test17', 'test17', '$2y$10$RposJcCp0iED38YySBNKxeZhpH8LxKrBhZpRGPP.pbk1zLAvLbojy', '17@gmail.com', 1717171, 'approved'),
(18181, 'test18', 'test18', 'test18', '$2y$10$7gofmZIAUSQ4./6hpWCUReUctNiwHskVoQjHXuyF0cPuhPHz7HhJG', '18@gmail.com', 18818181, 'cancelled'),
(191911, 'test19', 'test19', 'test19', '$2y$10$087Z1KelBTAUaFdij910pe5Y6ShbsKdJwErLU8/5L0kLT/7qJUJ5S', '19@gmail.com', 1919, 'approved'),
(2020201, 'test20', 'test20', 'test20', '$2y$10$4OmMDXi1ztQbrMDuqxOIB.sWiBkIDWN2jx7W/8vrj8bG1sYIle1JK', '20@gmail.com', 20202011, 'approved'),
(783747385, 'mug', 'dho', 'bguhj', '$2y$10$U3fbkCmzrZSVmYZ8V2DHgeimrGss.opPpKmUNvBfRZ8v8477BtCMu', 'hdch@gmail.com', 2147483647, 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `invoice_id` int(11) NOT NULL,
  `rent_paid` int(11) DEFAULT NULL,
  `rent_due` int(11) DEFAULT NULL,
  `property_id` int(11) NOT NULL,
  `tenant_nid` int(11) NOT NULL,
  `homeowner_nid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `property_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `photo` blob NOT NULL,
  `availability_status` varchar(8) NOT NULL,
  `size_sqft` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `monthly_rent` int(11) NOT NULL,
  `tenant_type` varchar(15) NOT NULL,
  `flat_no` varchar(30) DEFAULT NULL,
  `building` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `postal_code` varchar(30) NOT NULL,
  `nid` int(11) NOT NULL,
  `tenant_nid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`property_id`, `description`, `photo`, `availability_status`, `size_sqft`, `capacity`, `monthly_rent`, `tenant_type`, `flat_no`, `building`, `street`, `postal_code`, `nid`, `tenant_nid`) VALUES
(2, '17', '', 'vacant', 17, 17, 17, 'male', '17', '17', '17', '1717', 1717, NULL),
(4, 'vacant', '', '19', 19, 15, 19, 'male', '19', '19', '19', '19191', 191911, NULL),
(5, 'change', '', 'Availabl', 12, 12, 12, 'female', '1', '12', '12', '12312', 783747385, NULL),
(6, 'change3', '', 'Availabl', 231, 123, 1313, 'female', '13', '23', '142', '123', 783747385, NULL),
(8, 'Availabl', '', 'checkfin', 1, 1, 1, 'female', '1', '1', '1', '1', 783747385, NULL),
(9, 'change3', '', 'Availabl', 123, 3, 123, 'female', 'A4', 'G2', 'mirpur', '1115', 11, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `room_reg`
--

CREATE TABLE `room_reg` (
  `property_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `photo` blob NOT NULL,
  `availability_status` varchar(8) NOT NULL,
  `size_sqft` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `monthly_rent` int(11) NOT NULL,
  `tenant_type` varchar(15) NOT NULL,
  `flat_no` varchar(30) DEFAULT NULL,
  `building` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `postal_code` varchar(30) NOT NULL,
  `nid` int(10) NOT NULL,
  `reg_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_reg`
--

INSERT INTO `room_reg` (`property_id`, `description`, `photo`, `availability_status`, `size_sqft`, `capacity`, `monthly_rent`, `tenant_type`, `flat_no`, `building`, `street`, `postal_code`, `nid`, `reg_status`) VALUES
(1, 'hlw', '', 'vacant', 2, 2, 2, 'male', '53485', '7876', 'nh', '7857843', 11, 'approved'),
(2, '17', '', 'vacant', 17, 17, 17, 'male', '17', '17', '17', '1717', 1717, 'cancelled'),
(3, 'test18', '', 'vacant', 18, 18, 18, 'female', '18', '18', '18', '18181', 18181, 'cancelled'),
(4, '19', '', 'vacant', 19, 15, 19, 'male', '19', '19', '19', '19191', 191911, 'approved'),
(5, 'test20', '', 'vacant', 20, 17, 20, 'female', '20', '20', '20', '2020', 2020201, 'cancelled'),
(11, 'check', '', 'Availabl', 321, 123, 12, 'female', '12', '12', '12', '1235', 783747385, 'approved'),
(12, 'checkfinal', '', 'Availabl', 1, 1, 1, 'female', '1', '1', '1', '1', 783747385, 'approved'),
(13, 'checkfinaldelete', '', 'Availabl', 23, 231, 1, 'female', '2', '3', '5', '12', 783747385, 'cancelled'),
(14, 'change', '', 'Availabl', 123, 3, 123, 'female', 'A4', 'G2', 'mirpur', '1115', 11, 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `room_review`
--

CREATE TABLE `room_review` (
  `review_id` int(11) NOT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `rating` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tenant`
--

CREATE TABLE `tenant` (
  `nid` int(10) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `university` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` int(11) NOT NULL,
  `present_address` varchar(150) DEFAULT NULL,
  `permanent_address` varchar(150) NOT NULL,
  `job` varchar(30) NOT NULL,
  `salary` int(6) NOT NULL,
  `sponsor` varchar(6) DEFAULT NULL,
  `marital_status` varchar(8) DEFAULT NULL,
  `nid_doc` int(30) DEFAULT NULL,
  `password` char(255) NOT NULL,
  `review_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tenant`
--

INSERT INTO `tenant` (`nid`, `first_name`, `last_name`, `gender`, `university`, `email`, `phone`, `present_address`, `permanent_address`, `job`, `salary`, `sponsor`, `marital_status`, `nid_doc`, `password`, `review_id`) VALUES
(12355, 'NASIF', 'AHMED', 'male', '12355', '12355@gmail.com', 12355, '12455', '12455', 'nai', 1, 'Family', 'Single', NULL, '$2y$10$75vZwZq3goNhtm4XEd/caePNZXaYjpYxcJ9E1XlNHyb/sMWRyzoam', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tenant_history`
--

CREATE TABLE `tenant_history` (
  `review_id` int(11) NOT NULL,
  `previous_lease` int(11) DEFAULT NULL,
  `review` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tenant_signup`
--

CREATE TABLE `tenant_signup` (
  `nid` int(10) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `university` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` int(11) NOT NULL,
  `present_address` varchar(150) NOT NULL,
  `permanent_address` varchar(150) NOT NULL,
  `job` varchar(30) NOT NULL,
  `salary` int(6) NOT NULL,
  `sponsor` varchar(6) NOT NULL,
  `marital_status` varchar(8) NOT NULL,
  `password` char(255) NOT NULL,
  `reg_status` varchar(11) DEFAULT NULL,
  `nid_doc` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tenant_signup`
--

INSERT INTO `tenant_signup` (`nid`, `first_name`, `last_name`, `gender`, `university`, `email`, `phone`, `present_address`, `permanent_address`, `job`, `salary`, `sponsor`, `marital_status`, `password`, `reg_status`, `nid_doc`) VALUES
(1111141119, 'f', 'l', 'male', 'u', 'tei4s@gmail.com', 2, 'pre', 'per', 'j', 1, 't', 'single', '1', NULL, ''),
(1111151111, 'd', 'd', 'male', 'u', 'tdes@gmail.com', 23, 'd', 'd', 'fd', 3, 'family', 'single', 'f', NULL, ''),
(1234567891, 'Era', 'Chowdhury', 'male', 'cd', 'nA@gamil.com', 1323, 'nh', 'nh', 'bgvggh', 10098, 'self', 'single', '123', '0', ''),
(1515, 'test15', 'test15', 'male', 'UwU', 'test15@gmail.com', 1515, 'test15', 'test15', 'student', 10000, 'Family', 'Single', '$2y$10$VG1raV5hXsjnvdKDVzV0XOjMkEzmj7UtfjSWBZ.nrmDP6MnRqJalK', 'approved', ''),
(12355, 'NASIF', 'AHMED', 'male', '12355', '12355@gmail.com', 12355, '12455', '12455', 'nai', 1, 'Family', 'Single', '$2y$10$75vZwZq3goNhtm4XEd/caePNZXaYjpYxcJ9E1XlNHyb/sMWRyzoam', 'approved', '');

--
-- Indexes for dumped tables


--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD UNIQUE KEY `admin_pk` (`id`);

--
-- Indexes for table `homeowner`
--
ALTER TABLE `homeowner`
  ADD PRIMARY KEY (`nid`),
  ADD KEY `nid` (`nid`);

--
-- Indexes for table `owner_signup`
--
ALTER TABLE `owner_signup`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`property_id`),
  ADD UNIQUE KEY `property_id` (`property_id`);

--
-- Indexes for table `room_reg`
--
ALTER TABLE `room_reg`
  ADD PRIMARY KEY (`property_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `property_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `room_reg`
--
ALTER TABLE `room_reg`
  MODIFY `property_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

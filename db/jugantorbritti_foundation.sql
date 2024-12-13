-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2024 at 09:28 AM
-- Server version: 8.0.33
-- PHP Version: 8.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jugantorbritti_foundation`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `fullname`, `username`, `password`, `photo`, `email`, `created_at`) VALUES
(2, 'Ziaul Kabir', 'zkranatest', '$2y$10$lqzqikqqlEgZQMour5MjsOPAPzD0sVENAwg3ST5e0TI.KSf1IYunm', 'photo_675bfd5a82b5a.gif', 'example@gmail.com', '2024-12-13 09:24:42');

-- --------------------------------------------------------

--
-- Table structure for table `student_signup`
--

CREATE TABLE `student_signup` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `class_name` int NOT NULL,
  `roll_no` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student_signup`
--

INSERT INTO `student_signup` (`id`, `name`, `email`, `phone`, `father_name`, `mother_name`, `school_name`, `class_name`, `roll_no`, `password`, `photo`, `created_at`) VALUES
(1, 'Einstein&#039;s Home', 'zkranao@gmail.com', '01824228717', 'Test', 'Test', 'test school', 6, '123', '$2y$10$8yNsH75QcFOZRunStFozbuJceA2Cg7zTrP1ZS64J6I3JcmIXXnJ36', 'photo_67518c6a30ec7.png', '2024-12-05 11:20:10');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `joining_date` date NOT NULL,
  `experience` enum('junior','senior','assistant_headmaster','headmaster') NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `fullname`, `username`, `password`, `photo`, `email`, `designation`, `school_name`, `joining_date`, `experience`, `created_at`) VALUES
(1, 'Ziaul Kabir', 'ziaulkabir', '$2y$10$uyP5Bdn5Gkw1RqkpoECLyeCFO2bRXXEAWWRSZSyYKguoLKide5CgK', 'photo_675bfdb3da624.png', 'test@gmail.com', 'Math Teacher', 'Test Hoigh school', '2024-12-13', 'senior', '2024-12-13 09:26:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `student_signup`
--
ALTER TABLE `student_signup`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_signup`
--
ALTER TABLE `student_signup`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

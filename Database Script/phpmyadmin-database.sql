-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 26, 2023 at 06:14 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php-final-assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int NOT NULL,
  `student_id` int NOT NULL,
  `date` date NOT NULL,
  `amount` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `student_id`, `date`, `amount`) VALUES
(20, 23, '2023-08-20', 80),
(21, 23, '2023-08-21', 20);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_no` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `confirm_password` varchar(50) NOT NULL,
  `img` varchar(50) DEFAULT NULL,
  `isAdmin` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `username`, `name`, `email`, `contact_no`, `address`, `password`, `confirm_password`, `img`, `isAdmin`) VALUES
(22, 'admin', 'admin', 'admin@admin.com', '123334', 'Admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'd033e22ae348aeb5660fc2140aec35850c4da997', '', 1),
(23, 'farhanT', 'Farhan Tanvir', 'ft.tanvir551@gmail.com', '00000000000', 'Faridpur Engineering College', '8cb2237d0679ca88db6464eac60da96345513964', '8cb2237d0679ca88db6464eac60da96345513964', 'profile.jpg', 0),
(24, 'AlienOfMercury', 'Farhan Tanvir', 'ft.tanvir551@dummy.com', '849083409', 'Faridpur Engineering College', '8cb2237d0679ca88db6464eac60da96345513964', '8cb2237d0679ca88db6464eac60da96345513964', '', 0),
(25, 'fuxuhy', 'Haviva Hampton', 'hyfo@mailinator.com', '24', 'Eligendi cupidatat a', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_payments_students` (`student_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `FK_payments_students` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

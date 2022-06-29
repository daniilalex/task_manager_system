-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2022 at 11:44 PM
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
-- Database: `exam_2022`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `multiply_tasks` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `first_name`, `last_name`, `multiply_tasks`) VALUES
(19, 'Nina', 'Kravitz', 'on'),
(21, 'Bob', 'Dylan', ''),
(22, 'Gregor', 'Juzef', 'on'),
(23, 'Nick', 'Warren', ''),
(24, 'Anna', 'Branson', 'on'),
(25, 'Steve', 'Johnson', 'on'),
(26, 'Margarite', 'Tacher', ''),
(27, 'Maria', 'Gonzales', ''),
(28, 'Amanda', 'Taylor', 'on'),
(29, 'Tom', 'Green Jr.', ''),
(30, 'Ozzy', 'Bold', 'on'),
(31, 'Cristopher', 'Lambert', ''),
(32, 'Nicolas', 'Turrel', '');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) DEFAULT NULL,
  `last_name` varchar(25) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'Tom', 'Green', 'manager@user.com', 'cao123');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = in process,\r\n1 = completed,\r\n2 = deleted',
  `completed_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `status`, `completed_at`) VALUES
(24, 'Data entry', 1, '2022-06-29 23:41:26'),
(25, 'Virtual meeting', 0, '2022-06-27 15:08:35'),
(26, 'Filing', 0, '2022-06-27 15:08:36'),
(27, 'Communications', 0, '2022-06-27 15:08:36'),
(28, 'Get a drink', 0, '2022-06-27 15:08:37'),
(29, 'Make a code debugging', 0, '2022-06-27 15:08:37'),
(30, 'Create new form for visitors', 0, '2022-06-27 15:08:38'),
(31, 'Create a new modal for tasks', 0, '2022-06-27 15:08:38'),
(32, 'Check profit sum', 0, '2022-06-27 20:04:46'),
(33, 'Collect money for the b-day', 0, '2022-06-27 20:04:44'),
(34, 'Make a presentation', 0, '2022-06-27 20:05:51'),
(35, 'Make excel table', 1, '2022-06-29 23:10:53'),
(36, 'Compare multi columns', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tasks2employees`
--

CREATE TABLE `tasks2employees` (
  `tasks_id` int(11) UNSIGNED NOT NULL,
  `employee_id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks2employees`
--

INSERT INTO `tasks2employees` (`tasks_id`, `employee_id`, `created_at`) VALUES
(24, 19, '2022-06-29 20:39:07'),
(24, 22, '2022-06-29 20:39:07'),
(25, 21, '2022-06-29 20:39:11'),
(26, 30, '2022-06-29 20:39:32'),
(27, 23, '2022-06-29 20:39:39'),
(29, 22, '2022-06-29 20:43:19'),
(29, 26, '2022-06-29 20:39:52'),
(29, 27, '2022-06-29 20:39:52'),
(33, 28, '2022-06-29 20:43:45'),
(35, 31, '2022-06-29 20:44:00'),
(36, 30, '2022-06-29 20:43:54'),
(36, 32, '2022-06-29 20:43:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks2employees`
--
ALTER TABLE `tasks2employees`
  ADD PRIMARY KEY (`tasks_id`,`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

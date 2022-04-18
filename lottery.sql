-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2022 at 06:41 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lottery`
--

-- --------------------------------------------------------

--
-- Table structure for table `dealer`
--

CREATE TABLE `dealer` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `incentive` int(11) NOT NULL DEFAULT 0,
  `mor` float NOT NULL DEFAULT 0,
  `day` float NOT NULL DEFAULT 0,
  `eve` float NOT NULL DEFAULT 0,
  `tms` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dealer`
--

INSERT INTO `dealer` (`id`, `name`, `c_name`, `phone`, `address`, `incentive`, `mor`, `day`, `eve`, `tms`) VALUES
(1, 'Pratush Raj', 'Pratush', 2147483647, 'kolkata', 11, 2334, 233, 23, '2022-04-14 10:10:08'),
(2, 'Pratush Raj', 'Pratush', 2147483647, 'kolkata', 11, 23, 23, 23, '2022-04-14 10:12:17'),
(3, 'Pratush Raj', 'Pratush', 2147483647, 'dcdc', 11, 343222, 33243, 43543, '2022-04-15 11:32:08'),
(4, 'Chicks', 'Pratush', 2147483647, 'kolkata', 11, 43, 34, 23, '2022-04-15 11:32:48'),
(5, 'Mithilesh Kumar', 'Pratush', 2147483647, 'kolkata', 11, 3, 3, 4, '2022-04-15 11:33:37'),
(6, 'Mithilesh Kumar', 'Pratush', 2147483647, 'kolkata', 11, 3, 3, 4, '2022-04-15 11:33:56'),
(7, 'Mithilesh Kumar', 'Pratush', 2147483647, 'kolkata', 11, 45, 543, 54, '2022-04-15 11:34:36'),
(8, 'Mithilesh Kumar', 'Pratush', 2147483647, 'kolkata', 11, 3, 3, 4, '2022-04-15 11:34:55'),
(9, 'Mithilesh Kumar', 'Pratush', 2147483647, 'kolkata', 11, 3, 3, 4, '2022-04-15 11:35:34'),
(10, 'Mithilesh Kumar', 'Pratush', 2147483647, 'kolkata', 11, 3, 3, 4, '2022-04-15 11:35:59'),
(11, 'Mithilesh Kumar', 'Pratush', 6204747179, 'kolkata', 11, 3, 3, 4, '2022-04-15 11:37:06'),
(12, 'Pratush Raj', 'Pratush', 7903537260, 'kolkata', 11, 34, 54, 5, '2022-04-15 11:37:23');

-- --------------------------------------------------------

--
-- Table structure for table `series`
--

CREATE TABLE `series` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alphabets` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `series`
--

INSERT INTO `series` (`id`, `name`, `alphabets`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'A-E', 'A,C,E,B,D,H,J', 1, '2020-12-26 07:19:40', '2021-04-22 16:18:50'),
(2, 'B', 'B,I,J', 0, '2020-12-26 07:20:11', '2021-04-18 17:14:11'),
(3, 'C', 'C,J,P,U', 0, '2020-12-26 07:20:15', '2021-04-18 17:14:16'),
(4, 'D', 'D,F,K,L', 0, '2020-12-26 07:20:19', '2021-04-18 17:14:21'),
(5, 'E', 'E,L,R,X', 0, '2020-12-26 07:20:22', '2021-04-18 17:14:25'),
(6, 'F', 'F,M,T,U,V', 0, '2020-12-26 07:20:27', '2021-04-18 17:14:30'),
(7, 'G', 'G,I,J,R', 0, '2020-12-26 07:20:31', '2021-04-18 17:14:34'),
(8, 'H', 'H,L,Y,Z', 0, '2020-12-26 07:20:37', '2021-04-18 17:14:38'),
(9, 'I', 'I,P,Q,R', 0, '2020-12-26 07:20:41', '2021-04-18 17:14:44'),
(10, 'J', 'J,K,Q,V,W', 0, '2020-12-26 07:20:48', '2021-04-18 17:14:48'),
(11, 'K', 'K,L,M,N,O', 0, '2020-12-26 07:20:52', '2020-12-26 11:13:31'),
(12, 'L', 'L,M,S,Y,Z', 0, '2020-12-26 07:20:55', '2020-12-26 11:14:17'),
(13, 'M', 'I,J,K', 0, '2020-12-26 10:10:47', '2020-12-26 11:14:24'),
(14, 'N', 'G,J,L,O,P,Q', 0, '2020-12-26 10:12:08', '2020-12-26 11:14:30'),
(15, 'Z', 'K,M,O,Y,Z', 0, '2020-12-29 17:00:15', '2021-04-18 17:14:53'),
(16, 'B-L', 'A,B,C,D,E,G,H,J,K,L', 1, '2021-01-14 17:49:52', '2021-04-22 16:19:01'),
(17, 'G-L', 'G,H,J,K,L', 1, '2021-04-18 17:17:58', '2021-04-22 16:19:19'),
(18, 'Pratush Raj', 'A, C, E, B, D, F', 1, NULL, NULL),
(19, 'MOR', 'A, C, E, G, I, K, M, J, L, N', 1, NULL, NULL),
(20, 'Pratush Kumar', 'G,B,D,F,H', 1, NULL, NULL),
(21, 'Pratush Kumar', 'G,B,D,F,H', 1, NULL, NULL),
(22, 'Pratush Kumar', 'G,B,D,F,H', 1, NULL, NULL),
(23, 'Pratush Kumar', 'G,B,D,F,H', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `name`, `color`, `price`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'MOR', '#e5a824', '234343.00', 1, '2018-05-12 09:58:30', '2021-04-18 13:36:02'),
(2, 'DAY', '#FF0000', '200.00', 1, '2018-05-12 09:58:43', '2020-12-29 16:57:15'),
(3, 'EVE', '#FFFF00', '300.00', 1, '2018-05-27 23:32:54', '2021-02-26 14:31:51'),
(6, 'AFTERNOON', '#00008B', '400.00', 0, '2020-12-29 16:56:07', '2020-12-29 16:57:28'),
(7, 'Pratush Raj', '#red', '37.00', 1, '2022-04-14 05:39:25', '2022-04-14 05:39:25'),
(8, 'Pratush Raj', '#884444', '12.00', 1, NULL, NULL),
(9, 'Pratush Raj', '#884444', '12.00', 1, NULL, NULL),
(10, 'Pratush Raj', '#884444', '12.00', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `phone_no` int(11) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `incentive` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `user_role` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 0,
  `last_active` datetime DEFAULT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `company_name`, `phone_no`, `adress`, `incentive`, `email`, `pass`, `user_role`, `active`, `last_active`, `created_on`) VALUES
(1, 'admin', 'lotteryjagat', 1234567890, 'kolkata', 122, 'lottery@gmail.com', 'admin', 1, 1, '2022-04-05 21:26:15', '2022-04-06 00:57:01'),
(14, 'Pratush Kumar', 'Pratush raaaj', 2147483647, 'kolkata', 11, 'dolibarr13', 'dolibarr13@123', 2, 0, NULL, '2022-04-13 10:11:35'),
(15, 'Pratush Raj', 'Pratush', 2147483647, 'kolkata', 323, 'p.raj', '123456', 2, 0, NULL, '2022-04-13 10:31:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dealer`
--
ALTER TABLE `dealer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dealer`
--
ALTER TABLE `dealer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `series`
--
ALTER TABLE `series`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

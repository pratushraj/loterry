-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2022 at 09:52 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

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
  `user_id` int(11) NOT NULL,
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

INSERT INTO `dealer` (`id`, `user_id`, `name`, `c_name`, `phone`, `address`, `incentive`, `mor`, `day`, `eve`, `tms`) VALUES
(1, 0, 'Pratush Raj', 'Pratush', 2147483647, 'kolkata', 11, 2334, 233, 23, '2022-04-14 10:10:08'),
(2, 0, 'Pratush Raj', 'Pratush', 2147483647, 'kolkata', 11, 23, 23, 23, '2022-04-14 10:12:17'),
(3, 0, 'Pratush Raj', 'Pratush', 2147483647, 'dcdc', 11, 343222, 33243, 43543, '2022-04-15 11:32:08'),
(4, 0, 'Chicks', 'Pratush', 2147483647, 'kolkata', 11, 43, 34, 23, '2022-04-15 11:32:48'),
(5, 0, 'Mithilesh Kumar', 'Pratush', 2147483647, 'kolkata', 11, 3, 3, 4, '2022-04-15 11:33:37'),
(6, 0, 'Mithilesh Kumar', 'Pratush', 2147483647, 'kolkata', 11, 3, 3, 4, '2022-04-15 11:33:56'),
(7, 0, 'Mithilesh Kumar', 'Pratush', 2147483647, 'kolkata', 11, 45, 543, 54, '2022-04-15 11:34:36'),
(8, 0, 'Mithilesh Kumar', 'Pratush', 2147483647, 'kolkata', 11, 3, 3, 4, '2022-04-15 11:34:55'),
(9, 0, 'Mithilesh Kumar', 'Pratush', 2147483647, 'kolkata', 11, 3, 3, 4, '2022-04-15 11:35:34'),
(10, 0, 'Mithilesh Kumar', 'Pratush', 2147483647, 'kolkata', 11, 3, 3, 4, '2022-04-15 11:35:59'),
(11, 0, 'Mithilesh Kumar', 'Pratush', 6204747179, 'kolkata', 11, 3, 3, 4, '2022-04-15 11:37:06'),
(12, 0, 'Pratush Raj', 'Pratush', 7903537260, 'kolkata', 11, 34, 54, 5, '2022-04-15 11:37:23'),
(13, 0, 'supliers', 'dd', 3332, 'cdd', 3, 3, 2, 2, '2022-04-19 00:09:58'),
(14, 15, 'supliers', 'ds', 23333, 'sssssssx', 2, 2, 3, 1, '2022-04-19 00:14:28');

-- --------------------------------------------------------

--
-- Table structure for table `distributer`
--

CREATE TABLE `distributer` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
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
-- Dumping data for table `distributer`
--

INSERT INTO `distributer` (`id`, `user_id`, `name`, `c_name`, `phone`, `address`, `incentive`, `mor`, `day`, `eve`, `tms`) VALUES
(1, 0, 'Pratush Raj', 'Pratush', 2147483647, 'kolkata', 11, 2334, 233, 23, '2022-04-14 10:10:08'),
(2, 0, 'Pratush Raj', 'Pratush', 2147483647, 'kolkata', 11, 23, 23, 23, '2022-04-14 10:12:17'),
(3, 0, 'Pratush Raj', 'Pratush', 2147483647, 'dcdc', 11, 343222, 33243, 43543, '2022-04-15 11:32:08'),
(4, 0, 'Chicks', 'Pratush', 2147483647, 'kolkata', 11, 43, 34, 23, '2022-04-15 11:32:48'),
(5, 0, 'Mithilesh Kumar', 'Pratush', 2147483647, 'kolkata', 11, 3, 3, 4, '2022-04-15 11:33:37'),
(6, 0, 'Mithilesh Kumar', 'Pratush', 2147483647, 'kolkata', 11, 3, 3, 4, '2022-04-15 11:33:56'),
(7, 0, 'Mithilesh Kumar', 'Pratush', 2147483647, 'kolkata', 11, 45, 543, 54, '2022-04-15 11:34:36'),
(8, 0, 'Mithilesh Kumar', 'Pratush', 2147483647, 'kolkata', 11, 3, 3, 4, '2022-04-15 11:34:55'),
(9, 0, 'Mithilesh Kumar', 'Pratush', 2147483647, 'kolkata', 11, 3, 3, 4, '2022-04-15 11:35:34'),
(10, 0, 'Mithilesh Kumar', 'Pratush', 2147483647, 'kolkata', 11, 3, 3, 4, '2022-04-15 11:35:59'),
(11, 0, 'Mithilesh Kumar', 'Pratush', 6204747179, 'kolkata', 11, 3, 3, 4, '2022-04-15 11:37:06'),
(12, 0, 'Pratush Raj', 'Pratush', 7903537260, 'kolkata', 11, 34, 54, 5, '2022-04-15 11:37:23'),
(13, 0, 'supliers', 'dd', 3332, 'cdd', 3, 3, 2, 2, '2022-04-19 00:09:58'),
(14, 15, 'supliers', 'ds', 23333, 'sssssssx', 2, 2, 3, 1, '2022-04-19 00:14:28');

-- --------------------------------------------------------

--
-- Table structure for table `series`
--

CREATE TABLE `series` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alphabets` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `series`
--

INSERT INTO `series` (`id`, `user_id`, `name`, `alphabets`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'A-E', 'A,C,E,B,D,H,J', 1, '2020-12-26 07:19:40', '2021-04-22 16:18:50'),
(2, 1, 'B', 'B,I,J', 0, '2020-12-26 07:20:11', '2021-04-18 17:14:11'),
(3, 1, 'C', 'C,J,P,U', 0, '2020-12-26 07:20:15', '2021-04-18 17:14:16'),
(4, 1, 'D', 'D,F,K,L', 0, '2020-12-26 07:20:19', '2021-04-18 17:14:21'),
(5, 1, 'E', 'E,L,R,X', 0, '2020-12-26 07:20:22', '2021-04-18 17:14:25'),
(6, 1, 'F', 'F,M,T,U,V', 0, '2020-12-26 07:20:27', '2021-04-18 17:14:30'),
(7, 1, 'G', 'G,I,J,R', 0, '2020-12-26 07:20:31', '2021-04-18 17:14:34'),
(8, 1, 'H', 'H,L,Y,Z', 0, '2020-12-26 07:20:37', '2021-04-18 17:14:38'),
(9, 1, 'I', 'I,P,Q,R', 0, '2020-12-26 07:20:41', '2021-04-18 17:14:44'),
(10, 1, 'J', 'J,K,Q,V,W', 0, '2020-12-26 07:20:48', '2021-04-18 17:14:48'),
(11, 0, 'K', 'K,L,M,N,O', 0, '2020-12-26 07:20:52', '2020-12-26 11:13:31'),
(12, 0, 'L', 'L,M,S,Y,Z', 0, '2020-12-26 07:20:55', '2020-12-26 11:14:17'),
(13, 0, 'M', 'I,J,K', 0, '2020-12-26 10:10:47', '2020-12-26 11:14:24'),
(14, 0, 'N', 'G,J,L,O,P,Q', 0, '2020-12-26 10:12:08', '2020-12-26 11:14:30'),
(15, 0, 'Z', 'K,M,O,Y,Z', 0, '2020-12-29 17:00:15', '2021-04-18 17:14:53'),
(16, 0, 'B-L', 'A,B,C,D,E,G,H,J,K,L', 1, '2021-01-14 17:49:52', '2021-04-22 16:19:01'),
(17, 0, 'G-L', 'G,H,J,K,L', 1, '2021-04-18 17:17:58', '2021-04-22 16:19:19'),
(18, 0, 'Pratush Raj', 'A, C, E, B, D, F', 1, NULL, NULL),
(19, 0, 'MOR', 'A, C, E, G, I, K, M, J, L, N', 1, NULL, NULL),
(20, 0, 'Pratush Kumar', 'G,B,D,F,H', 1, NULL, NULL),
(21, 0, 'Pratush Kumar', 'G,B,D,F,H', 1, NULL, NULL),
(22, 0, 'Pratush Kumar', 'G,B,D,F,H', 1, NULL, NULL),
(23, 0, 'Pratush Kumar', 'G,B,D,F,H', 1, NULL, NULL),
(24, 15, 'A-B', 'A,B', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
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

INSERT INTO `sessions` (`id`, `user_id`, `name`, `color`, `price`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'MOR', '#e5a824', '234343.00', 1, '2018-05-12 09:58:30', '2021-04-18 13:36:02'),
(2, 1, 'DAY', '#FF0000', '200.00', 1, '2018-05-12 09:58:43', '2020-12-29 16:57:15'),
(3, 1, 'EVE', '#FFFF00', '300.00', 1, '2018-05-27 23:32:54', '2021-02-26 14:31:51'),
(6, 1, 'AFTERNOON', '#00008B', '400.00', 0, '2020-12-29 16:56:07', '2020-12-29 16:57:28'),
(7, 1, 'Pratush Raj', '#red', '37.00', 1, '2022-04-14 05:39:25', '2022-04-14 05:39:25'),
(8, 1, 'Pratush Raj', '#884444', '12.00', 1, NULL, NULL),
(9, 1, 'Pratush Raj', '#884444', '12.00', 1, NULL, NULL),
(13, 15, 'dealer', '#000000', '34.00', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `user_id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 0, 'Testing', 0, '2021-04-22 12:51:14', '2021-04-24 12:37:34'),
(2, 0, 'ANDAMAN LOTTERY', 1, '2021-04-24 12:20:08', '2021-04-24 12:20:08'),
(3, 0, 'ff', 1, NULL, NULL),
(4, 0, 'hii', 1, NULL, NULL),
(5, 0, 'hii', 1, NULL, NULL),
(6, 0, 'grtg', 1, NULL, NULL),
(7, 0, 'grtg', 1, NULL, NULL),
(8, 15, 'lol', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_prizes`
--

CREATE TABLE `ticket_prizes` (
  `id` int(10) UNSIGNED NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `session_id` int(11) DEFAULT NULL,
  `prize_id` int(11) DEFAULT NULL,
  `amount` double DEFAULT 0,
  `special_amount` double DEFAULT 0,
  `super_amount` double DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_prizes`
--

INSERT INTO `ticket_prizes` (`id`, `ticket_id`, `session_id`, `prize_id`, `amount`, `special_amount`, `super_amount`, `created_at`, `updated_at`) VALUES
(27, 3, 1, 0, 250000, 25000, 12500, '2021-04-18 12:58:31', '2021-04-18 12:58:31'),
(28, 3, 1, 1, 1000, 504, 252, '2021-04-18 12:58:31', '2021-04-18 12:58:31'),
(29, 3, 1, 2, 9000, 500, 250, '2021-04-18 12:58:31', '2021-04-18 12:58:31'),
(30, 3, 1, 3, 500, 50, 25, '2021-04-18 12:58:31', '2021-04-18 12:58:31'),
(31, 3, 1, 4, 250, 20, 10, '2021-04-18 12:58:31', '2021-04-18 12:58:31'),
(32, 3, 1, 5, 120, 10, 5, '2021-04-18 12:58:31', '2021-04-18 12:58:31'),
(33, 3, 2, 0, 250000, 25000, 12500, '2021-04-18 12:58:31', '2021-04-18 12:58:31'),
(34, 3, 2, 1, 1000, 504, 252, '2021-04-18 12:58:31', '2021-04-18 12:58:31'),
(35, 3, 2, 2, 9000, 500, 250, '2021-04-18 12:58:31', '2021-04-18 12:58:31'),
(36, 3, 2, 3, 500, 50, 25, '2021-04-18 12:58:31', '2021-04-18 12:58:31'),
(37, 3, 2, 4, 250, 20, 10, '2021-04-18 12:58:31', '2021-04-18 12:58:31'),
(38, 3, 2, 5, 120, 10, 5, '2021-04-18 12:58:31', '2021-04-18 12:58:31'),
(39, 3, 3, 0, 250000, 25000, 12500, '2021-04-18 12:58:31', '2021-04-18 12:58:31'),
(40, 3, 3, 1, 1000, 504, 252, '2021-04-18 12:58:31', '2021-04-18 12:58:31'),
(41, 3, 3, 2, 9000, 500, 250, '2021-04-18 12:58:31', '2021-04-18 12:58:31'),
(42, 3, 3, 3, 500, 50, 25, '2021-04-18 12:58:31', '2021-04-18 12:58:31'),
(43, 3, 3, 4, 250, 20, 10, '2021-04-18 12:58:31', '2021-04-18 12:58:31'),
(44, 3, 3, 5, 120, 10, 5, '2021-04-18 12:58:31', '2021-04-18 12:58:31'),
(135, 4, 1, 1, 250000, 25000, 12500, '2021-04-21 20:27:29', '2021-04-21 20:27:29'),
(136, 4, 1, 2, 1000, 504, 252, '2021-04-21 20:27:29', '2021-04-21 20:27:29'),
(137, 4, 1, 3, 9000, 500, 250, '2021-04-21 20:27:29', '2021-04-21 20:27:29'),
(138, 4, 1, 4, 500, 50, 25, '2021-04-21 20:27:29', '2021-04-21 20:27:29'),
(139, 4, 1, 5, 250, 20, 10, '2021-04-21 20:27:29', '2021-04-21 20:27:29'),
(140, 4, 1, 6, 120, 10, 5, '2021-04-21 20:27:29', '2021-04-21 20:27:29'),
(141, 4, 1, 7, NULL, NULL, NULL, '2021-04-21 20:27:29', '2021-04-21 20:27:29'),
(142, 4, 1, 8, NULL, NULL, NULL, '2021-04-21 20:27:29', '2021-04-21 20:27:29'),
(143, 4, 2, 1, 250000, 25000, 12500, '2021-04-21 20:27:29', '2021-04-21 20:27:29'),
(144, 4, 2, 2, 1000, 504, 252, '2021-04-21 20:27:29', '2021-04-21 20:27:29'),
(145, 4, 2, 3, 9000, 500, 250, '2021-04-21 20:27:29', '2021-04-21 20:27:29'),
(146, 4, 2, 4, 500, 50, 25, '2021-04-21 20:27:29', '2021-04-21 20:27:29'),
(147, 4, 2, 5, 250, 20, 10, '2021-04-21 20:27:29', '2021-04-21 20:27:29'),
(148, 4, 2, 6, 120, 10, 5, '2021-04-21 20:27:29', '2021-04-21 20:27:29'),
(149, 4, 2, 7, NULL, NULL, NULL, '2021-04-21 20:27:29', '2021-04-21 20:27:29'),
(150, 4, 2, 8, NULL, NULL, NULL, '2021-04-21 20:27:29', '2021-04-21 20:27:29'),
(151, 4, 3, 1, 250000, 25000, 12500, '2021-04-21 20:27:29', '2021-04-21 20:27:29'),
(152, 4, 3, 2, 1000, 504, 252, '2021-04-21 20:27:29', '2021-04-21 20:27:29'),
(153, 4, 3, 3, 9000, 500, 250, '2021-04-21 20:27:29', '2021-04-21 20:27:29'),
(154, 4, 3, 4, 500, 50, 25, '2021-04-21 20:27:29', '2021-04-21 20:27:29'),
(155, 4, 3, 5, 250, 20, 10, '2021-04-21 20:27:29', '2021-04-21 20:27:29'),
(156, 4, 3, 6, 120, 10, 5, '2021-04-21 20:27:29', '2021-04-21 20:27:29'),
(157, 4, 3, 7, NULL, NULL, NULL, '2021-04-21 20:27:29', '2021-04-21 20:27:29'),
(158, 4, 3, 8, NULL, NULL, NULL, '2021-04-21 20:27:29', '2021-04-21 20:27:29'),
(159, 5, 1, 0, 10000, 100, 50, '2021-04-22 12:34:28', '2021-04-22 12:34:28'),
(160, 5, 1, 1, 1000, 50, 25, '2021-04-22 12:34:28', '2021-04-22 12:34:28'),
(161, 5, 1, 2, 500, 25, 10, '2021-04-22 12:34:28', '2021-04-22 12:34:28'),
(172, 1, 1, 1, 1000, 1100, 1200, '2021-04-22 16:19:46', '2021-04-22 16:19:46'),
(173, 1, 1, 2, 900, 910, 920, '2021-04-22 16:19:46', '2021-04-22 16:19:46'),
(174, 1, 1, 3, 800, 810, 820, '2021-04-22 16:19:46', '2021-04-22 16:19:46'),
(175, 1, 1, 4, 700, 710, 720, '2021-04-22 16:19:46', '2021-04-22 16:19:46'),
(176, 1, 1, 5, 600, 610, 620, '2021-04-22 16:19:46', '2021-04-22 16:19:46'),
(177, 1, 1, 6, 500, 510, 520, '2021-04-22 16:19:46', '2021-04-22 16:19:46'),
(178, 1, 1, 7, 400, 410, 420, '2021-04-22 16:19:46', '2021-04-22 16:19:46'),
(179, 1, 1, 8, 300, 310, 320, '2021-04-22 16:19:46', '2021-04-22 16:19:46'),
(180, 1, 2, 1, 1000, 1100, 1200, '2021-04-22 16:19:46', '2021-04-22 16:19:46'),
(181, 1, 2, 2, 900, 910, 920, '2021-04-22 16:19:46', '2021-04-22 16:19:46'),
(182, 1, 2, 3, 800, 810, 820, '2021-04-22 16:19:46', '2021-04-22 16:19:46'),
(183, 1, 2, 4, 700, 710, 720, '2021-04-22 16:19:46', '2021-04-22 16:19:46'),
(184, 1, 2, 5, 600, 610, 620, '2021-04-22 16:19:46', '2021-04-22 16:19:46'),
(185, 1, 2, 6, 500, 510, 520, '2021-04-22 16:19:46', '2021-04-22 16:19:46'),
(186, 1, 2, 7, 400, 410, 420, '2021-04-22 16:19:46', '2021-04-22 16:19:46'),
(187, 1, 2, 8, 300, 310, 320, '2021-04-22 16:19:46', '2021-04-22 16:19:46'),
(188, 1, 3, 1, 1000, 1100, 1200, '2021-04-22 16:19:46', '2021-04-22 16:19:46'),
(189, 1, 3, 2, 900, 910, 920, '2021-04-22 16:19:46', '2021-04-22 16:19:46'),
(190, 1, 3, 3, 800, 810, 820, '2021-04-22 16:19:46', '2021-04-22 16:19:46'),
(191, 1, 3, 4, 700, 710, 720, '2021-04-22 16:19:46', '2021-04-22 16:19:46'),
(192, 1, 3, 5, 600, 610, 620, '2021-04-22 16:19:46', '2021-04-22 16:19:46'),
(193, 1, 3, 6, 500, 510, 520, '2021-04-22 16:19:46', '2021-04-22 16:19:46'),
(194, 1, 3, 7, 400, 410, 420, '2021-04-22 16:19:46', '2021-04-22 16:19:46'),
(195, 1, 3, 8, 300, 310, 320, '2021-04-22 16:19:46', '2021-04-22 16:19:46'),
(358, 2, 1, 1, 250000, 25000, 12500, '2021-05-15 11:16:59', '2021-05-15 11:16:59'),
(359, 2, 1, 2, 1000, 504, 252, '2021-05-15 11:16:59', '2021-05-15 11:16:59'),
(360, 2, 1, 3, 9000, 500, 250, '2021-05-15 11:16:59', '2021-05-15 11:16:59'),
(361, 2, 1, 4, 500, 50, 25, '2021-05-15 11:16:59', '2021-05-15 11:16:59'),
(362, 2, 1, 5, 250, 20, 10, '2021-05-15 11:16:59', '2021-05-15 11:16:59'),
(363, 2, 1, 6, 120, 10, 5, '2021-05-15 11:16:59', '2021-05-15 11:16:59'),
(364, 2, 1, 7, NULL, 20, 10, '2021-05-15 11:16:59', '2021-05-15 11:16:59'),
(365, 2, 1, 8, NULL, 10, 5, '2021-05-15 11:16:59', '2021-05-15 11:16:59'),
(366, 2, 2, 1, 250000, 25000, 12500, '2021-05-15 11:16:59', '2021-05-15 11:16:59'),
(367, 2, 2, 2, 1000, 504, 252, '2021-05-15 11:16:59', '2021-05-15 11:16:59'),
(368, 2, 2, 3, 9000, 500, 250, '2021-05-15 11:16:59', '2021-05-15 11:16:59'),
(369, 2, 2, 4, 500, 50, 25, '2021-05-15 11:16:59', '2021-05-15 11:16:59'),
(370, 2, 2, 5, 250, 20, 10, '2021-05-15 11:16:59', '2021-05-15 11:16:59'),
(371, 2, 2, 6, 120, 10, 5, '2021-05-15 11:16:59', '2021-05-15 11:16:59'),
(372, 2, 2, 7, NULL, NULL, NULL, '2021-05-15 11:16:59', '2021-05-15 11:16:59'),
(373, 2, 2, 8, NULL, NULL, NULL, '2021-05-15 11:16:59', '2021-05-15 11:16:59'),
(374, 2, 3, 1, 250000, 25000, 12500, '2021-05-15 11:16:59', '2021-05-15 11:16:59'),
(375, 2, 3, 2, 1000, 504, 252, '2021-05-15 11:16:59', '2021-05-15 11:16:59'),
(376, 2, 3, 3, 9000, 500, 250, '2021-05-15 11:16:59', '2021-05-15 11:16:59'),
(377, 2, 3, 4, 500, 50, 25, '2021-05-15 11:16:59', '2021-05-15 11:16:59'),
(378, 2, 3, 5, 250, 20, 10, '2021-05-15 11:16:59', '2021-05-15 11:16:59'),
(379, 2, 3, 6, 120, 10, 5, '2021-05-15 11:16:59', '2021-05-15 11:16:59'),
(380, 2, 3, 7, NULL, NULL, NULL, '2021-05-15 11:16:59', '2021-05-15 11:16:59'),
(381, 2, 3, 8, NULL, NULL, NULL, '2021-05-15 11:16:59', '2021-05-15 11:16:59');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_session_names`
--

CREATE TABLE `ticket_session_names` (
  `id` int(10) UNSIGNED NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `session_id` int(11) DEFAULT NULL,
  `day` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_session_names`
--

INSERT INTO `ticket_session_names` (`id`, `ticket_id`, `session_id`, `day`, `name`, `created_at`, `updated_at`) VALUES
(22, 1, 1, 'Sun', 'Morning - Sunday', '2021-04-22 16:19:46', '2021-04-22 16:19:46'),
(23, 1, 1, 'Mon', 'Morning - Momday', '2021-04-22 16:19:46', '2021-04-22 16:19:46'),
(24, 1, 1, 'Tue', 'Morning - Tuesday', '2021-04-22 16:19:46', '2021-04-22 16:19:46'),
(25, 1, 1, 'Wed', 'Morning - Wednesday', '2021-04-22 16:19:46', '2021-04-22 16:19:46'),
(26, 1, 1, 'Thu', 'Morning - Thursday', '2021-04-22 16:19:46', '2021-04-22 16:19:46'),
(27, 1, 1, 'Fri', 'Morning - Friday', '2021-04-22 16:19:46', '2021-04-22 16:19:46'),
(28, 1, 1, 'Sat', 'Morning - Saturday', '2021-04-22 16:19:46', '2021-04-22 16:19:46'),
(29, 1, 2, 'Sun', 'Day - Sunday', '2021-04-22 16:19:46', '2021-04-22 16:19:46'),
(30, 1, 2, 'Mon', 'Day- Monday', '2021-04-22 16:19:46', '2021-04-22 16:19:46'),
(31, 1, 2, 'Tue', 'Day- Tuesday', '2021-04-22 16:19:46', '2021-04-22 16:19:46'),
(32, 1, 2, 'Wed', 'Day- Wednesday', '2021-04-22 16:19:46', '2021-04-22 16:19:46'),
(33, 1, 2, 'Thu', 'Day- Thursday', '2021-04-22 16:19:46', '2021-04-22 16:19:46'),
(34, 1, 2, 'Fri', 'Day- Friday', '2021-04-22 16:19:46', '2021-04-22 16:19:46'),
(35, 1, 2, 'Sat', 'Day- Saturday', '2021-04-22 16:19:46', '2021-04-22 16:19:46'),
(36, 1, 3, 'Sun', 'Evening - Sunday', '2021-04-22 16:19:46', '2021-04-22 16:19:46'),
(37, 1, 3, 'Mon', 'Evening - Monday', '2021-04-22 16:19:46', '2021-04-22 16:19:46'),
(38, 1, 3, 'Tue', 'Evening - Tuesday', '2021-04-22 16:19:46', '2021-04-22 16:19:46'),
(39, 1, 3, 'Wed', 'Evening - Wednesday', '2021-04-22 16:19:46', '2021-04-22 16:19:46'),
(40, 1, 3, 'Thu', 'Evening - Thursday', '2021-04-22 16:19:46', '2021-04-22 16:19:46'),
(41, 1, 3, 'Fri', 'Evening - Friday', '2021-04-22 16:19:46', '2021-04-22 16:19:46'),
(42, 1, 3, 'Sat', 'Evening - Saturday', '2021-04-22 16:19:46', '2021-04-22 16:19:46'),
(190, 2, 1, 'Sun', 'FUTURE PINK', '2021-05-15 11:16:59', '2021-05-15 11:16:59'),
(191, 2, 1, 'Mon', 'FUTURE ORANGE', '2021-05-15 11:16:59', '2021-05-15 11:16:59'),
(192, 2, 1, 'Tue', 'FUTURE PURPLE', '2021-05-15 11:16:59', '2021-05-15 11:16:59'),
(193, 2, 1, 'Wed', 'FUTURE RED', '2021-05-15 11:16:59', '2021-05-15 11:16:59'),
(194, 2, 1, 'Thu', 'FUTURE YELLOW', '2021-05-15 11:16:59', '2021-05-15 11:16:59'),
(195, 2, 1, 'Fri', 'FUTURE BLUE', '2021-05-15 11:16:59', '2021-05-15 11:16:59'),
(196, 2, 1, 'Sat', 'FUTURE GREEN', '2021-05-15 11:16:59', '2021-05-15 11:16:59'),
(197, 2, 2, 'Sun', 'FUTURE PLATINUM', '2021-05-15 11:16:59', '2021-05-15 11:16:59'),
(198, 2, 2, 'Mon', 'FUTURE CUPPER', '2021-05-15 11:16:59', '2021-05-15 11:16:59'),
(199, 2, 2, 'Tue', 'FUTURE TITANIUM', '2021-05-15 11:16:59', '2021-05-15 11:16:59'),
(200, 2, 2, 'Wed', 'FUTURE DIAMOND', '2021-05-15 11:16:59', '2021-05-15 11:16:59'),
(201, 2, 2, 'Thu', 'FUTURE GOLD', '2021-05-15 11:16:59', '2021-05-15 11:16:59'),
(202, 2, 2, 'Fri', 'FUTURE SILVER', '2021-05-15 11:16:59', '2021-05-15 11:16:59'),
(203, 2, 2, 'Sat', 'FUTURE BRONZE', '2021-05-15 11:16:59', '2021-05-15 11:16:59'),
(204, 2, 3, 'Sun', 'FUTURE SATURN', '2021-05-15 11:16:59', '2021-05-15 11:16:59'),
(205, 2, 3, 'Mon', 'FUTURE URANUS', '2021-05-15 11:16:59', '2021-05-15 11:16:59'),
(206, 2, 3, 'Tue', 'FUTURE NEPTUNE', '2021-05-15 11:16:59', '2021-05-15 11:16:59'),
(207, 2, 3, 'Wed', 'FUTURE MERCURY', '2021-05-15 11:16:59', '2021-05-15 11:16:59'),
(208, 2, 3, 'Thu', 'FUTURE VENUS', '2021-05-15 11:16:59', '2021-05-15 11:16:59'),
(209, 2, 3, 'Fri', 'FUTURE MARS', '2021-05-15 11:16:59', '2021-05-15 11:16:59'),
(210, 2, 3, 'Sat', 'FUTURE JUPITER', '2021-05-15 11:16:59', '2021-05-15 11:16:59'),
(211, 8, 2, 'Sun', 'de', NULL, NULL);

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
(15, 'Pratush Raj', 'Pratush', 2147483647, 'kolkata', 323, 'p.raj', '123456', 2, 0, NULL, '2022-04-13 10:31:50'),
(16, 'Pratush Raj', 'dd', 44343, 'ks', 2, 'fhhcdhj@gmail.com', 'lolol', 2, 0, NULL, '2022-04-18 23:18:18'),
(17, 'customer', 'dhccb', 65, 'xgsvg', 6, 'cust@gmail.com', '12345', 3, 0, NULL, '2022-04-18 23:19:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dealer`
--
ALTER TABLE `dealer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distributer`
--
ALTER TABLE `distributer`
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
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_prizes`
--
ALTER TABLE `ticket_prizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_session_names`
--
ALTER TABLE `ticket_session_names`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `distributer`
--
ALTER TABLE `distributer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `series`
--
ALTER TABLE `series`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ticket_prizes`
--
ALTER TABLE `ticket_prizes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=382;

--
-- AUTO_INCREMENT for table `ticket_session_names`
--
ALTER TABLE `ticket_session_names`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

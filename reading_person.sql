-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 20, 2018 at 04:17 AM
-- Server version: 10.3.11-MariaDB-1:10.3.11+maria~bionic-log
-- PHP Version: 7.2.12-1+ubuntu18.04.1+deb.sury.org+1

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homestead`
--

-- --------------------------------------------------------

--
-- Table structure for table `reading_person`
--

CREATE TABLE `reading_person` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `book_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `book_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `book_author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `book_trans` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `book_publish` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reading_person`
--

INSERT INTO `reading_person` (`id`, `firstname`, `lastname`, `email`, `phone`, `book_image`, `book_title`, `book_author`, `book_trans`, `book_publish`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 'test1', 'test1', 'parmote.wijitsarn@gmail.com', 814455150, NULL, 'test1', 'test1', NULL, 'test1', 1, '2018-12-11 11:04:06', '2018-12-11 11:04:06'),
(2, 'test2', 'test2', 'parmote.wijitsarn@gmail.com', 814455150, NULL, 'test2', 'test2', NULL, 'test2', 1, '2018-12-11 11:18:49', '2018-12-11 11:18:49'),
(3, 'test3', 'test3', 'parmote.wijitsarn@gmail.com', 814455150, NULL, 'test3', 'test3', NULL, 'test3', 1, '2018-12-11 11:32:01', '2018-12-11 11:32:01'),
(4, 'test4', 'test4', 'parmote.wijitsarn@gmail.com', 814455150, NULL, 'test4', 'test4', NULL, 'test4', 1, '2018-12-11 11:43:27', '2018-12-11 11:43:27'),
(5, 'test5', 'test5', 'parmote.wijitsarn@gmail.com', 814455150, NULL, 'test5', 'test5', NULL, 'test5', 1, '2018-12-11 13:21:08', '2018-12-11 13:21:08'),
(6, 'test6', 'test6', 'parmote_tab@hotmail.com', 814455150, NULL, 'test6', 'test6', NULL, 'test6', 1, '2018-12-11 13:40:37', '2018-12-11 13:40:37'),
(7, 'test7', 'test7', 'parmote_tab@hotmail.com', 814455150, NULL, 'test7', 'test7', NULL, 'test7', 1, '2018-12-11 14:22:08', '2018-12-11 14:22:08'),
(8, 'test8', 'test8', 'parmote_tab@hotmail.com', 814455150, NULL, 'test8', 'test8', NULL, 'test8', 1, '2018-12-11 14:26:21', '2018-12-11 14:26:21'),
(9, 'test9', 'test9', 'parmote_tab@hotmail.com', 814455150, NULL, 'test9', 'test9', NULL, 'test9', 1, '2018-12-11 14:38:05', '2018-12-11 14:38:05'),
(10, 'test10', 'test10', 'parmote_tab@hotmail.com', 814455150, NULL, 'test10', 'test10', NULL, 'test10', 1, '2018-12-11 14:53:06', '2018-12-11 14:53:06'),
(11, 'test11', 'test11', 'parmote_tab@hotmail.com', 814455150, NULL, 'test11', 'test11', NULL, 'test11', 1, '2018-12-11 16:52:12', '2018-12-11 16:52:12'),
(12, 'test12', 'test12', 'parmote_tab@hotmail.com', 814455150, NULL, 'test12', 'test12', NULL, 'test12', 1, '2018-12-12 10:50:10', '2018-12-12 10:50:10'),
(13, 'test13', 'test13', 'parmote_tab@hotmail.com', 814455150, NULL, 'test13', 'test13', NULL, 'test13', 1, '2018-12-12 10:59:18', '2018-12-12 10:59:18'),
(14, 'test14', 'test14', 'parmote_tab@hotmail.com', 814455150, NULL, 'test14', 'test14', NULL, 'test14', 1, '2018-12-12 11:17:27', '2018-12-12 11:17:27'),
(15, 'test15', 'test15', 'parmote_tab@hotmail.com', 814455150, NULL, 'test15', 'test15', NULL, 'test15', 1, '2018-12-12 11:19:59', '2018-12-12 11:19:59'),
(16, 'test16', 'test16', 'parmote_tab@hotmail.com', 814455150, NULL, 'test16', 'test16', NULL, 'test16', 1, '2018-12-12 11:22:21', '2018-12-12 11:22:21'),
(17, 'test17', 'test17', 'parmote_tab@hotmail.com', 814455150, NULL, 'test17', 'test17', NULL, 'test17', 1, '2018-12-12 12:01:41', '2018-12-12 12:01:41'),
(18, 'test18', 'test18', 'parmote_tab@hotmail.com', 814455150, NULL, 'test18', 'test18', NULL, 'test18', 1, '2018-12-12 13:28:06', '2018-12-12 13:28:06'),
(19, 'test19', 'test19', 'parmote_tab@hotmail.com', 814455150, NULL, 'test19', 'test19', NULL, 'test19', 1, '2018-12-12 13:44:50', '2018-12-12 13:44:50'),
(20, 'test20', 'test20', 'parmote_tab@hotmail.com', 814455150, NULL, 'test20', 'test20', NULL, 'test20', 1, '2018-12-12 15:04:33', '2018-12-12 15:04:33'),
(21, 'test21', 'test21', 'parmote_tab@hotmail.com', 814455150, NULL, 'test21', 'test21', 'test21', 'test21', 1, '2018-12-14 09:51:34', '2018-12-14 09:51:34'),
(22, 'ทดสอบ1', 'ทดสอบ', 'parmote_tab@hotmail.com', 814455150, NULL, 'test22', 'ผู้แต่ง', NULL, '@akeinspire, สนพ.', 1, '2018-12-14 14:50:07', '2018-12-14 14:50:07'),
(23, 'ทดสอบ1', 'ทดสอบ', 'parmote_tab@hotmail.com', 814455150, NULL, 'test23', 'ผู้แต่ง', NULL, 'แพรวสำนักพิมพ์', 1, '2018-12-14 16:17:43', '2018-12-14 16:17:43'),
(24, 'ทดสอบ1', 'ทดสอบ', 'parmote_tab@hotmail.com', 814455150, NULL, 'test24', 'ผู้แต่ง', NULL, 'สำนักพิมพ์', 1, '2018-12-15 11:04:38', '2018-12-15 11:04:38'),
(25, 'ทดสอบ1', 'ทดสอบ', 'parmote.wijitsarn@gmail.com', 814455150, NULL, 'test25', 'ผู้แต่ง', NULL, 'สำนักพิมพ์', 1, '2018-12-15 11:11:55', '2018-12-15 11:11:55'),
(26, 'ทดสอบ1', 'ทดสอบ', 'parmote.wijitsarn@gmail.com', 814455150, NULL, 'test26', 'ผู้แต่ง', NULL, 'สำนักพิมพ์', 1, '2018-12-15 11:19:13', '2018-12-15 11:19:13'),
(27, 'ทดสอบ1', 'ทดสอบ', 'parmote_tab@hotmail.com', 814455150, NULL, 'test28', 'ผู้แต่ง', NULL, 'สกายบุ๊กส์', 1, '2018-12-15 14:19:37', '2018-12-15 14:19:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reading_person`
--
ALTER TABLE `reading_person`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status_id` (`status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reading_person`
--
ALTER TABLE `reading_person`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reading_person`
--
ALTER TABLE `reading_person`
  ADD CONSTRAINT `reading_person_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `reading_status` (`id`) ON DELETE CASCADE;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

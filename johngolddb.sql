-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2018 at 10:45 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `johngolddb`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `chat_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `stat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_msgs`
--

CREATE TABLE `chat_msgs` (
  `id` int(10) UNSIGNED NOT NULL,
  `chat_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `msg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_users`
--

CREATE TABLE `chat_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contentmains`
--

CREATE TABLE `contentmains` (
  `content_id` int(10) UNSIGNED NOT NULL,
  `content_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `defaultvalue` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contentmains`
--

INSERT INTO `contentmains` (`content_id`, `content_name`, `slug`, `type`, `defaultvalue`, `created_at`, `updated_at`) VALUES
(1, 'Title', NULL, 'text', '', '2017-11-02 01:15:59', '2017-11-02 01:15:59'),
(2, 'Description', NULL, 'paragraph', '', '2017-11-02 01:16:12', '2017-11-02 01:16:12'),
(3, 'Logo', NULL, 'image', '', '2017-11-07 02:55:24', '2017-11-07 02:55:24'),
(4, 'Header Background', NULL, 'image', '', '2017-11-07 02:55:43', '2017-11-07 02:55:43'),
(9, 'Navigation', NULL, 'block', 'Navigation', '2017-11-12 10:58:32', '2017-11-12 10:58:32'),
(10, 'Profile-title', NULL, 'text', '', '2017-11-12 22:35:04', '2017-11-12 22:35:04'),
(11, 'Profile-desc', NULL, 'text', '', '2017-11-12 22:35:23', '2017-11-12 22:35:23'),
(12, 'Profile-body', NULL, 'paragraph', '', '2017-11-12 22:35:39', '2017-11-12 22:35:39'),
(13, 'Affiliation', NULL, 'block', 'Pagelist', '2017-11-15 08:31:38', '2017-11-15 08:31:38'),
(14, 'Teamviewer', NULL, 'block', 'Pagelist', '2017-11-16 09:31:43', '2017-11-16 09:31:43'),
(15, 'Company', NULL, 'text', '', '2017-11-16 09:36:49', '2017-11-16 09:36:49'),
(16, 'Position', NULL, 'text', '', '2017-11-16 09:36:57', '2017-11-16 09:36:57'),
(17, 'Section-four-title', NULL, 'text', '', '2017-11-16 10:08:36', '2017-11-16 10:08:36'),
(19, 'Section-four-description', NULL, 'text', '', '2017-11-16 10:09:08', '2017-11-16 10:09:08'),
(21, 'Contact-section-title', NULL, 'text', '', '2017-11-16 12:21:39', '2017-11-16 12:21:39'),
(22, 'Contact-section-paragraph', NULL, 'paragraph', '', '2017-11-16 12:22:22', '2017-11-16 12:22:22'),
(23, 'Services', NULL, 'block', 'Pagelist', '2017-11-22 11:19:24', '2017-11-22 11:19:24'),
(25, 'Services-title', NULL, 'text', '', '2017-11-22 11:35:06', '2017-11-22 11:35:06'),
(27, 'Services-description', NULL, 'text', '', '2017-11-22 11:35:40', '2017-11-22 11:35:40'),
(28, 'Contact-logo', NULL, 'image', '', '2017-11-24 03:17:44', '2017-11-24 03:17:44'),
(29, 'Profile-img', NULL, 'image', '', '2017-11-24 10:52:29', '2017-11-24 10:52:29'),
(30, 'Affiliation-title', NULL, 'text', '', '2017-11-27 02:26:37', '2017-11-27 02:26:37'),
(31, 'Affiliation-desc', NULL, 'text', '', '2017-11-27 02:30:37', '2017-11-27 02:30:37'),
(32, 'Email', NULL, 'text', '', '2017-11-27 06:03:23', '2017-11-27 06:03:23'),
(33, 'link', NULL, 'text', '', '2017-11-28 11:35:40', '2017-11-28 11:35:40'),
(34, 'Newsletter', NULL, 'block', 'Pagelist', '2017-12-05 07:31:24', '2017-12-05 07:31:24'),
(35, 'Posted_by', NULL, 'text', '', '2017-12-05 10:13:24', '2017-12-05 10:13:24');

-- --------------------------------------------------------

--
-- Table structure for table `contentsubs`
--

CREATE TABLE `contentsubs` (
  `id` int(10) UNSIGNED NOT NULL,
  `page_id` int(11) DEFAULT NULL,
  `content_id` int(11) DEFAULT NULL,
  `content_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `the_content` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_show` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_show_pages` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_of_items` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pagination` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contentsubs`
--

INSERT INTO `contentsubs` (`id`, `page_id`, `content_id`, `content_name`, `the_content`, `content_show`, `content_show_pages`, `num_of_items`, `pagination`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Title', NULL, '', NULL, NULL, NULL, '2017-11-13 01:00:58', '2018-01-21 13:43:34'),
(2, 1, 2, 'Description', NULL, '', NULL, NULL, NULL, '2017-11-13 01:00:58', '2017-11-13 01:00:58'),
(3, 1, 3, 'Logo', 'logo.png', '', NULL, NULL, NULL, '2017-11-13 01:00:58', '2017-11-13 01:06:50'),
(4, 1, 4, 'Header Background', 'DSTIBldg1.jpg', '', NULL, NULL, NULL, '2017-11-13 01:00:59', '2017-12-25 23:14:13'),
(5, 1, 9, 'Navigation', 'jg_nav', '0', NULL, NULL, NULL, '2017-11-13 01:00:59', '2017-11-14 07:58:58'),
(6, 1, 10, 'Profile-title', 'COMPANY PROFILE', '', NULL, NULL, NULL, '2017-11-13 01:00:59', '2018-01-21 13:43:34'),
(7, 1, 11, 'Profile-desc', 'Learn more about us', '', NULL, NULL, NULL, '2017-11-13 01:00:59', '2018-01-21 13:43:35'),
(8, 1, 12, 'Profile-body', NULL, '', NULL, NULL, NULL, '2017-11-13 01:00:59', '2017-11-13 01:00:59'),
(13, 5, 2, 'Description', NULL, NULL, NULL, NULL, NULL, '2017-11-15 00:14:49', '2017-11-15 00:14:49'),
(14, 5, 3, 'Logo', 'JGTT (1).png', NULL, NULL, NULL, NULL, '2017-11-15 00:14:50', '2017-11-15 06:21:08'),
(16, 6, 2, 'Description', NULL, NULL, NULL, NULL, NULL, '2017-11-15 06:22:15', '2017-11-15 06:22:15'),
(17, 6, 3, 'Logo', 'JGCF (1).png', NULL, NULL, NULL, NULL, '2017-11-15 06:22:15', '2017-11-15 06:22:28'),
(19, 7, 2, 'Description', NULL, NULL, NULL, NULL, NULL, '2017-11-15 06:22:36', '2017-11-15 06:22:36'),
(20, 7, 3, 'Logo', 'CK Logo.png', NULL, NULL, NULL, NULL, '2017-11-15 06:22:36', '2017-11-15 06:25:14'),
(22, 8, 2, 'Description', NULL, NULL, NULL, NULL, NULL, '2017-11-15 06:25:26', '2017-11-15 06:25:26'),
(23, 8, 3, 'Logo', 'final logo biyahe.png', NULL, NULL, NULL, NULL, '2017-11-15 06:25:26', '2017-11-15 06:25:38'),
(25, 9, 2, 'Description', NULL, NULL, NULL, NULL, NULL, '2017-11-15 06:25:45', '2017-11-15 06:25:45'),
(26, 9, 3, 'Logo', 'Flash Cargo.png', NULL, NULL, NULL, NULL, '2017-11-15 06:25:46', '2018-01-18 18:28:28'),
(28, 10, 2, 'Description', NULL, NULL, NULL, NULL, NULL, '2017-11-15 06:29:18', '2017-11-15 06:29:18'),
(29, 10, 3, 'Logo', 'Sure Secure.png', NULL, NULL, NULL, NULL, '2017-11-15 06:29:18', '2017-11-15 06:29:34'),
(31, 11, 2, 'Description', NULL, NULL, NULL, NULL, NULL, '2017-11-15 06:30:11', '2017-11-15 06:30:11'),
(32, 11, 3, 'Logo', 'GG LOGO.jpg', NULL, NULL, NULL, NULL, '2017-11-15 06:30:11', '2017-11-15 06:30:24'),
(34, 12, 2, 'Description', NULL, NULL, NULL, NULL, NULL, '2017-11-15 06:30:34', '2017-11-15 06:30:34'),
(35, 12, 3, 'Logo', 'RC.png', NULL, NULL, NULL, NULL, '2017-11-15 06:30:34', '2017-11-15 06:30:44'),
(37, 13, 2, 'Description', NULL, NULL, NULL, NULL, NULL, '2017-11-15 06:31:12', '2017-11-15 06:31:12'),
(38, 13, 3, 'Logo', 'Screenshot_120.png', NULL, NULL, NULL, NULL, '2017-11-15 06:31:12', '2017-11-15 06:31:23'),
(39, 1, 13, 'Affiliation', 'jg_pagelist', '3', NULL, '10', 'yes', '2017-11-15 08:31:58', '2018-01-06 01:45:04'),
(40, 1, 14, 'Teamviewer', 'jg_team_gallery', '4', NULL, '6', 'yes', '2017-11-16 09:31:57', '2017-11-22 08:59:56'),
(41, 14, 3, 'Logo', 'LIZA.jpg', NULL, NULL, NULL, NULL, '2017-11-16 09:44:23', '2017-11-27 04:56:43'),
(42, 14, 15, 'Company', 'BIYAHE.COM.PH TRAVEL PORTAL CORP.', NULL, NULL, NULL, NULL, '2017-11-16 09:44:23', '2017-11-27 06:04:37'),
(43, 14, 16, 'Position', 'SALES AND MARKETING MANAGER', NULL, NULL, NULL, NULL, '2017-11-16 09:44:23', '2017-11-27 06:04:37'),
(44, 15, 3, 'Logo', 'MARILEN.jpg', NULL, NULL, NULL, NULL, '2017-11-16 09:50:36', '2017-11-27 05:07:27'),
(45, 15, 15, 'Company', 'JOHN GROUP OF COMPANIES', NULL, NULL, NULL, NULL, '2017-11-16 09:50:37', '2017-11-27 06:13:34'),
(46, 15, 16, 'Position', 'HUMAN RESOURCES MANAGER', NULL, NULL, NULL, NULL, '2017-11-16 09:50:37', '2017-11-27 06:13:34'),
(47, 17, 3, 'Logo', 'JOAN.jpg', NULL, NULL, NULL, NULL, '2017-11-16 09:53:13', '2017-11-27 05:00:59'),
(48, 17, 15, 'Company', 'JOHN GROUP OF COMPANIES', NULL, NULL, NULL, NULL, '2017-11-16 09:53:13', '2017-11-27 06:14:05'),
(49, 17, 16, 'Position', 'EXECUTIVE ASSISTANT TO THE PRESIDENT', NULL, NULL, NULL, NULL, '2017-11-16 09:53:13', '2017-11-27 06:14:05'),
(50, 18, 3, 'Logo', 'JANET.jpg', NULL, NULL, NULL, NULL, '2017-11-16 09:54:14', '2018-01-18 18:21:59'),
(51, 18, 15, 'Company', 'CARGO KING COURIER SERVICES CORP.', NULL, NULL, NULL, NULL, '2017-11-16 09:54:14', '2018-01-18 18:21:59'),
(52, 18, 16, 'Position', 'SALES MANAGER', NULL, NULL, NULL, NULL, '2017-11-16 09:54:14', '2018-01-18 18:21:59'),
(53, 19, 3, 'Logo', 'TESSA.jpg', NULL, NULL, NULL, NULL, '2017-11-16 09:55:03', '2017-11-27 05:04:58'),
(54, 19, 15, 'Company', 'JOHN GOLD CARGO FORWARDER CORP.', NULL, NULL, NULL, NULL, '2017-11-16 09:55:03', '2017-11-27 06:14:53'),
(55, 19, 16, 'Position', 'INTERNAL AUDITOR FOR CARGO', NULL, NULL, NULL, NULL, '2017-11-16 09:55:03', '2017-11-27 06:14:53'),
(56, 20, 3, 'Logo', 'BAMBI.jpg', NULL, NULL, NULL, NULL, '2017-11-16 09:55:46', '2017-11-27 05:05:58'),
(57, 20, 15, 'Company', 'JOHN GOLD TRAVEL AND TOUR SERVICES CORP.', NULL, NULL, NULL, NULL, '2017-11-16 09:55:46', '2017-11-27 06:15:14'),
(58, 20, 16, 'Position', 'ACCOUNTING MANAGER', NULL, NULL, NULL, NULL, '2017-11-16 09:55:46', '2017-11-27 06:15:14'),
(59, 21, 3, 'Logo', 'ERLIZA.jpg', NULL, NULL, NULL, NULL, '2017-11-16 09:56:26', '2017-11-16 09:56:56'),
(60, 21, 15, 'Company', 'CARGO KING COURIER SERVICES CORP.', NULL, NULL, NULL, NULL, '2017-11-16 09:56:26', '2017-11-27 06:15:48'),
(61, 21, 16, 'Position', 'FINANCE MANAGER', NULL, NULL, NULL, NULL, '2017-11-16 09:56:26', '2017-11-27 06:15:48'),
(62, 22, 3, 'Logo', 'MARY JOY.jpg', NULL, NULL, NULL, NULL, '2017-11-16 09:57:16', '2017-11-16 09:58:14'),
(63, 22, 15, 'Company', 'BIYAHE.COM.PH TRAVEL PORTAL CORP.', NULL, NULL, NULL, NULL, '2017-11-16 09:57:16', '2017-11-27 06:16:12'),
(64, 22, 16, 'Position', 'FINANCE MANAGER', NULL, NULL, NULL, NULL, '2017-11-16 09:57:16', '2017-11-27 06:16:12'),
(65, 23, 3, 'Logo', 'LEOSEL.jpg', NULL, NULL, NULL, NULL, '2017-11-16 09:58:29', '2017-11-16 09:58:55'),
(66, 23, 15, 'Company', 'JOHN GOLD TRAVEL AND TOUR SERVICES CORP.', NULL, NULL, NULL, NULL, '2017-11-16 09:58:30', '2017-11-27 06:16:42'),
(67, 23, 16, 'Position', 'OPERATIONS OFFICER', NULL, NULL, NULL, NULL, '2017-11-16 09:58:30', '2017-11-27 06:16:42'),
(68, 24, 3, 'Logo', 'FANNY.jpg', NULL, NULL, NULL, NULL, '2017-11-16 09:59:08', '2017-11-27 05:09:19'),
(69, 24, 15, 'Company', 'JOHN GOLD CARGO FORWARDER CORP.', NULL, NULL, NULL, NULL, '2017-11-16 09:59:08', '2017-11-27 06:17:08'),
(70, 24, 16, 'Position', 'ACCOUNTING AND FINANCE MANAGER', NULL, NULL, NULL, NULL, '2017-11-16 09:59:08', '2017-11-27 06:17:08'),
(71, 25, 3, 'Logo', 'MARIBEL.jpg', NULL, NULL, NULL, NULL, '2017-11-16 09:59:47', '2017-11-27 05:10:05'),
(72, 25, 15, 'Company', 'JOHN GOLD TRAVEL AND TOUR SERVICES CORP.', NULL, NULL, NULL, NULL, '2017-11-16 09:59:47', '2017-11-27 06:17:42'),
(73, 25, 16, 'Position', 'INTERNAL AUDITOR FOR TRAVEL AND TOURS', NULL, NULL, NULL, NULL, '2017-11-16 09:59:48', '2017-11-27 06:17:42'),
(74, 26, 3, 'Logo', 'JGCF (1).png', NULL, NULL, NULL, NULL, '2017-11-16 10:00:34', '2017-11-16 10:04:07'),
(75, 26, 15, 'Company', 'JOHN GOLD CARGO FORWARDER CORP.', NULL, NULL, NULL, NULL, '2017-11-16 10:00:34', '2017-11-27 06:18:18'),
(76, 26, 16, 'Position', 'DIRECTOR- SALES AND OPERATIONS', NULL, NULL, NULL, NULL, '2017-11-16 10:00:34', '2017-11-27 06:18:18'),
(77, 1, 17, 'Section-four-title', 'Team', NULL, NULL, NULL, NULL, '2017-11-16 10:10:13', '2018-01-21 13:43:35'),
(78, 1, 19, 'Section-four-description', 'Meet our amazing team.', NULL, NULL, NULL, NULL, '2017-11-16 10:10:13', '2018-01-21 13:43:35'),
(81, 1, 21, 'Contact-section-title', 'Contact Us', NULL, NULL, NULL, NULL, '2017-11-16 12:22:39', '2018-01-21 13:43:35'),
(82, 1, 22, 'Contact-section-paragraph', NULL, NULL, NULL, NULL, NULL, '2017-11-16 12:22:39', '2017-11-16 12:22:39'),
(84, 27, 2, 'Description', NULL, NULL, NULL, NULL, NULL, '2017-11-21 09:49:10', '2017-11-21 09:49:10'),
(85, 27, 3, 'Logo', 'airplane-flight-ticket_318-64636.png', NULL, NULL, NULL, NULL, '2017-11-21 09:49:10', '2017-11-21 10:18:59'),
(86, 28, 2, 'Description', NULL, NULL, NULL, NULL, NULL, '2017-11-21 09:52:01', '2017-11-21 09:52:01'),
(87, 28, 3, 'Logo', '165055-200.png', NULL, NULL, NULL, NULL, '2017-11-21 09:52:01', '2017-11-21 10:21:07'),
(88, 1, 23, 'Services', 'jg_services', '5', NULL, '2', 'yes', '2017-11-22 11:20:33', '2017-11-22 11:29:26'),
(89, 1, 25, 'Services-title', 'SERVICES', NULL, NULL, NULL, NULL, '2017-11-22 11:36:22', '2018-01-21 13:43:35'),
(90, 1, 27, 'Services-description', 'We are here to serve.', NULL, NULL, NULL, NULL, '2017-11-22 11:36:22', '2018-01-21 13:43:36'),
(91, 5, 9, 'Navigation', 'jg_affiliation_nav', '0', NULL, '', '', '2017-11-24 00:20:24', '2017-11-27 02:51:58'),
(94, 5, 13, 'Affiliation', 'jg_pagelist', '3', NULL, '3', 'yes', '2017-11-24 01:10:34', '2017-11-27 02:33:42'),
(95, 5, 21, 'Contact-section-title', 'Contact Us', NULL, NULL, NULL, NULL, '2017-11-24 02:36:20', '2017-11-24 02:37:50'),
(96, 5, 22, 'Contact-section-paragraph', NULL, NULL, NULL, NULL, NULL, '2017-11-24 02:36:20', '2017-11-24 02:36:20'),
(98, 6, 21, 'Contact-section-title', 'Contact Us', NULL, NULL, NULL, NULL, '2017-11-24 02:38:31', '2017-11-24 02:41:38'),
(99, 6, 22, 'Contact-section-paragraph', NULL, NULL, NULL, NULL, NULL, '2017-11-24 02:38:31', '2017-11-24 02:38:31'),
(100, 6, 13, 'Affiliation', 'jg_pagelist', '3', NULL, '3', 'yes', '2017-11-24 02:38:40', '2017-11-27 02:35:26'),
(101, 6, 9, 'Navigation', 'jg_affiliation_nav', '0', NULL, '', '', '2017-11-24 02:39:20', '2017-11-27 03:04:44'),
(102, 1, 28, 'Contact-logo', 'logo.png', NULL, NULL, NULL, NULL, '2017-11-24 03:18:07', '2017-11-24 03:18:21'),
(103, 5, 28, 'Contact-logo', 'logo.png', NULL, NULL, NULL, NULL, '2017-11-24 03:19:21', '2017-11-24 03:19:31'),
(104, 6, 28, 'Contact-logo', 'logo.png', NULL, NULL, NULL, NULL, '2017-11-24 03:19:46', '2017-11-24 03:20:00'),
(106, 7, 9, 'Navigation', 'jg_affiliation_nav', '0', NULL, '', '', '2017-11-24 03:20:40', '2017-11-27 03:05:05'),
(107, 7, 13, 'Affiliation', 'jg_pagelist', '3', NULL, '3', 'yes', '2017-11-24 03:20:40', '2017-11-27 02:35:44'),
(108, 7, 21, 'Contact-section-title', 'Contact Us', NULL, NULL, NULL, NULL, '2017-11-24 03:20:40', '2017-11-24 03:24:47'),
(109, 7, 22, 'Contact-section-paragraph', NULL, NULL, NULL, NULL, NULL, '2017-11-24 03:20:41', '2017-11-24 03:20:41'),
(110, 7, 28, 'Contact-logo', 'logo.png', NULL, NULL, NULL, NULL, '2017-11-24 03:20:41', '2017-11-24 03:21:01'),
(112, 8, 9, 'Navigation', 'jg_affiliation_nav', '0', NULL, '', '', '2017-11-24 03:25:11', '2017-11-27 03:05:26'),
(113, 8, 13, 'Affiliation', 'jg_pagelist', '3', NULL, '3', 'yes', '2017-11-24 03:25:11', '2017-11-27 02:36:24'),
(114, 8, 21, 'Contact-section-title', 'Contact Us', NULL, NULL, NULL, NULL, '2017-11-24 03:25:11', '2017-11-24 03:25:28'),
(115, 8, 22, 'Contact-section-paragraph', NULL, NULL, NULL, NULL, NULL, '2017-11-24 03:25:11', '2017-11-24 03:25:11'),
(116, 8, 28, 'Contact-logo', 'logo.png', NULL, NULL, NULL, NULL, '2017-11-24 03:25:12', '2017-11-24 03:25:38'),
(118, 9, 9, 'Navigation', 'jg_affiliation_nav', '', NULL, '', '', '2017-11-24 03:33:04', '2017-11-27 03:05:51'),
(119, 9, 13, 'Affiliation', 'jg_pagelist', '3', NULL, '3', 'yes', '2017-11-24 03:33:04', '2017-11-27 02:36:46'),
(120, 9, 21, 'Contact-section-title', 'Contact Us', NULL, NULL, NULL, NULL, '2017-11-24 03:33:04', '2018-01-18 18:29:49'),
(121, 9, 22, 'Contact-section-paragraph', NULL, NULL, NULL, NULL, NULL, '2017-11-24 03:33:04', '2017-11-24 03:33:04'),
(122, 9, 28, 'Contact-logo', 'logo.png', NULL, NULL, NULL, NULL, '2017-11-24 03:33:04', '2017-11-24 03:34:31'),
(124, 10, 9, 'Navigation', 'jg_affiliation_nav', '0', NULL, '', '', '2017-11-24 03:36:33', '2017-11-27 03:06:33'),
(125, 10, 13, 'Affiliation', 'jg_pagelist', '3', NULL, '3', 'yes', '2017-11-24 03:36:33', '2017-11-27 02:37:03'),
(126, 10, 21, 'Contact-section-title', 'Contact Us', NULL, NULL, NULL, NULL, '2017-11-24 03:36:33', '2017-11-24 03:36:40'),
(127, 10, 22, 'Contact-section-paragraph', NULL, NULL, NULL, NULL, NULL, '2017-11-24 03:36:33', '2017-11-24 03:36:33'),
(128, 10, 28, 'Contact-logo', 'logo.png', NULL, NULL, NULL, NULL, '2017-11-24 03:36:33', '2017-11-24 03:38:34'),
(130, 11, 9, 'Navigation', 'jg_affiliation_nav', '0', NULL, '', '', '2017-11-24 03:40:10', '2017-11-27 03:06:47'),
(131, 11, 13, 'Affiliation', 'jg_pagelist', '3', NULL, '3', 'yes', '2017-11-24 03:40:10', '2017-11-27 02:37:30'),
(132, 11, 21, 'Contact-section-title', 'Contact Us', NULL, NULL, NULL, NULL, '2017-11-24 03:40:10', '2017-11-24 03:40:56'),
(133, 11, 22, 'Contact-section-paragraph', NULL, NULL, NULL, NULL, NULL, '2017-11-24 03:40:10', '2017-11-24 03:40:10'),
(134, 11, 28, 'Contact-logo', 'logo.png', NULL, NULL, NULL, NULL, '2017-11-24 03:40:10', '2017-11-24 03:40:38'),
(136, 12, 9, 'Navigation', 'jg_affiliation_nav', '0', NULL, '', '', '2017-11-24 03:42:43', '2017-11-27 03:09:11'),
(137, 12, 13, 'Affiliation', 'jg_pagelist', '3', NULL, '3', 'yes', '2017-11-24 03:42:43', '2017-11-27 02:37:53'),
(138, 12, 21, 'Contact-section-title', 'Contact Us', NULL, NULL, NULL, NULL, '2017-11-24 03:42:43', '2017-11-24 03:43:42'),
(139, 12, 22, 'Contact-section-paragraph', NULL, NULL, NULL, NULL, NULL, '2017-11-24 03:42:43', '2017-11-24 03:42:43'),
(140, 12, 28, 'Contact-logo', 'logo.png', NULL, NULL, NULL, NULL, '2017-11-24 03:42:43', '2017-11-24 03:43:49'),
(142, 13, 9, 'Navigation', 'jg_affiliation_nav', '0', NULL, '', '', '2017-11-24 03:46:36', '2017-11-27 03:04:23'),
(143, 13, 13, 'Affiliation', 'jg_pagelist', '3', NULL, '3', 'yes', '2017-11-24 03:46:36', '2017-11-27 02:38:09'),
(144, 13, 21, 'Contact-section-title', 'Contact Us', NULL, NULL, NULL, NULL, '2017-11-24 03:46:36', '2017-11-24 03:47:37'),
(145, 13, 22, 'Contact-section-paragraph', NULL, NULL, NULL, NULL, NULL, '2017-11-24 03:46:36', '2017-11-24 03:46:36'),
(146, 13, 28, 'Contact-logo', 'logo.png', NULL, NULL, NULL, NULL, '2017-11-24 03:46:36', '2017-11-24 03:47:26'),
(150, 4, 1, 'Title', 'About Us', NULL, NULL, NULL, NULL, '2017-11-24 09:46:07', '2017-11-24 10:28:26'),
(151, 4, 2, 'Description', NULL, NULL, NULL, NULL, NULL, '2017-11-24 09:46:07', '2017-11-24 09:46:07'),
(152, 4, 3, 'Logo', NULL, NULL, NULL, NULL, NULL, '2017-11-24 09:46:07', '2017-11-24 09:46:07'),
(153, 4, 4, 'Header Background', 'DSTIBldg1.jpg', NULL, NULL, NULL, NULL, '2017-11-24 09:46:07', '2017-12-25 23:14:32'),
(154, 4, 9, 'Navigation', 'jg_nav', '0', NULL, '', '', '2017-11-24 09:46:07', '2017-11-24 09:46:17'),
(155, 4, 14, 'Teamviewer', 'jg_team_gallery', '4', NULL, '6', 'yes', '2017-11-24 10:31:00', '2017-11-24 10:33:07'),
(156, 4, 23, 'Services', 'jg_services', '5', NULL, '2', 'off', '2017-11-24 10:31:00', '2017-11-24 10:35:00'),
(157, 4, 25, 'Services-title', 'SERVICES', NULL, NULL, NULL, NULL, '2017-11-24 10:31:01', '2017-11-24 10:34:23'),
(158, 4, 27, 'Services-description', 'We are here to serve.', NULL, NULL, NULL, NULL, '2017-11-24 10:31:01', '2017-11-28 18:13:55'),
(159, 4, 17, 'Section-four-title', 'Team', NULL, NULL, NULL, NULL, '2017-11-24 10:31:44', '2017-11-24 10:33:30'),
(160, 4, 19, 'Section-four-description', 'Meet our amazing team.', NULL, NULL, NULL, NULL, '2017-11-24 10:31:44', '2017-11-24 10:33:41'),
(161, 4, 29, 'Profile-img', 'JGGC (2).png', NULL, NULL, NULL, NULL, '2017-11-24 10:53:06', '2018-01-06 02:04:18'),
(162, 4, 10, 'Profile-title', 'Who We Are', NULL, NULL, NULL, NULL, '2017-11-24 10:53:55', '2017-11-24 10:54:12'),
(164, 4, 12, 'Profile-body', NULL, NULL, NULL, NULL, NULL, '2017-11-24 10:53:55', '2017-11-24 10:53:55'),
(165, 29, 9, 'Navigation', 'jg_nav', '0', NULL, '', '', '2017-11-26 09:09:39', '2017-11-26 09:11:10'),
(166, 30, 9, 'Navigation', 'jg_nav', '0', NULL, '', '', '2017-11-26 09:11:39', '2017-11-26 09:16:40'),
(167, 29, 1, 'Title', 'Services', NULL, NULL, NULL, NULL, '2017-11-26 09:59:32', '2017-11-26 10:00:34'),
(168, 29, 4, 'Header Background', 'DSTIBldg1.jpg', NULL, NULL, NULL, NULL, '2017-11-26 09:59:32', '2017-12-25 23:14:41'),
(169, 29, 21, 'Contact-section-title', 'Contact Us', NULL, NULL, NULL, NULL, '2017-11-26 10:01:43', '2017-11-26 10:09:02'),
(170, 29, 22, 'Contact-section-paragraph', NULL, NULL, NULL, NULL, NULL, '2017-11-26 10:01:43', '2017-11-26 10:01:43'),
(171, 29, 28, 'Contact-logo', 'logo.png', NULL, NULL, NULL, NULL, '2017-11-26 10:01:43', '2017-11-26 10:09:13'),
(172, 4, 21, 'Contact-section-title', 'Contact US', NULL, NULL, NULL, NULL, '2017-11-26 10:03:54', '2017-11-26 10:07:54'),
(173, 4, 22, 'Contact-section-paragraph', NULL, NULL, NULL, NULL, NULL, '2017-11-26 10:03:54', '2017-11-26 10:03:54'),
(174, 4, 28, 'Contact-logo', 'logo.png', NULL, NULL, NULL, NULL, '2017-11-26 10:03:54', '2017-11-26 10:08:06'),
(175, 30, 1, 'Title', 'CONNECT TO US', NULL, NULL, NULL, NULL, '2017-11-26 10:12:05', '2017-11-26 10:13:57'),
(176, 30, 4, 'Header Background', 'DSTIBldg1.jpg', NULL, NULL, NULL, NULL, '2017-11-26 10:12:05', '2017-12-25 23:14:50'),
(180, 30, 22, 'Contact-section-paragraph', NULL, NULL, NULL, NULL, NULL, '2017-11-26 10:57:18', '2017-11-26 10:57:18'),
(181, 1, 30, 'Affiliation-title', 'Affiliate', NULL, NULL, NULL, NULL, '2017-11-27 02:28:28', '2018-01-21 13:43:36'),
(182, 1, 31, 'Affiliation-desc', 'Meet our family', NULL, NULL, NULL, NULL, '2017-11-27 02:30:49', '2018-01-21 13:43:36'),
(183, 5, 30, 'Affiliation-title', 'Other family member', NULL, NULL, NULL, NULL, '2017-11-27 02:48:12', '2017-11-27 02:49:47'),
(185, 6, 30, 'Affiliation-title', 'Other family member', NULL, NULL, NULL, NULL, '2017-11-27 02:57:27', '2017-11-27 02:57:41'),
(186, 7, 30, 'Affiliation-title', 'Other family member', NULL, NULL, NULL, NULL, '2017-11-27 02:58:08', '2017-11-27 02:58:21'),
(187, 8, 30, 'Affiliation-title', 'Other family member', NULL, NULL, NULL, NULL, '2017-11-27 02:58:44', '2017-11-27 02:58:57'),
(188, 9, 30, 'Affiliation-title', 'Other family member', NULL, NULL, NULL, NULL, '2017-11-27 02:59:18', '2018-01-18 18:29:49'),
(189, 10, 30, 'Affiliation-title', 'Other family member', NULL, NULL, NULL, NULL, '2017-11-27 02:59:49', '2017-11-27 03:00:01'),
(190, 11, 30, 'Affiliation-title', 'Other family member', NULL, NULL, NULL, NULL, '2017-11-27 03:00:24', '2017-11-27 03:00:34'),
(191, 12, 30, 'Affiliation-title', 'Other family member', NULL, NULL, NULL, NULL, '2017-11-27 03:00:53', '2017-11-27 03:01:34'),
(192, 13, 30, 'Affiliation-title', 'Other family member', NULL, NULL, NULL, NULL, '2017-11-27 03:01:52', '2017-11-27 03:02:06'),
(193, 14, 32, 'Email', 'liza.cajipe@johngoldgroup.com', NULL, NULL, NULL, NULL, '2017-11-27 06:04:22', '2017-11-27 06:04:38'),
(194, 15, 32, 'Email', 'len.briones@johngoldgroup.com', NULL, NULL, NULL, NULL, '2017-11-27 06:13:30', '2017-11-27 06:13:34'),
(195, 17, 32, 'Email', 'joan.catalan@johngoldgroup.com', NULL, NULL, NULL, NULL, '2017-11-27 06:13:47', '2017-11-27 06:14:05'),
(196, 18, 32, 'Email', 'janet.radovan@cargoking.com.ph', NULL, NULL, NULL, NULL, '2017-11-27 06:14:24', '2018-01-18 18:21:59'),
(197, 19, 32, 'Email', 'tessa.tancontian@johngoldgroup.com', NULL, NULL, NULL, NULL, '2017-11-27 06:14:49', '2017-11-27 06:14:53'),
(198, 20, 32, 'Email', 'bambi.ronquillo@johngoldgroup.com', NULL, NULL, NULL, NULL, '2017-11-27 06:15:10', '2017-11-27 06:15:14'),
(199, 21, 32, 'Email', 'erliza.baldonado@johngoldgroup.com', NULL, NULL, NULL, NULL, '2017-11-27 06:15:26', '2017-11-27 06:15:48'),
(200, 22, 32, 'Email', 'joy.guerra@johngoldgroup.com', NULL, NULL, NULL, NULL, '2017-11-27 06:16:07', '2017-11-27 06:16:12'),
(201, 23, 32, 'Email', 'leo.balatero@johngoldgroup.com', NULL, NULL, NULL, NULL, '2017-11-27 06:16:26', '2017-11-27 06:16:42'),
(202, 24, 32, 'Email', 'fanny.jalandoni@johngoldgroup.com', NULL, NULL, NULL, NULL, '2017-11-27 06:17:04', '2017-11-27 06:17:08'),
(203, 25, 32, 'Email', 'bel.bernardo@johngoldgroup.com', NULL, NULL, NULL, NULL, '2017-11-27 06:17:38', '2017-11-27 06:17:42'),
(204, 26, 32, 'Email', 'ritchel.jungco@johngoldgroup.com', NULL, NULL, NULL, NULL, '2017-11-27 06:18:09', '2017-11-27 06:18:18'),
(205, 31, 1, 'Title', 'Serviceable Locations', NULL, NULL, NULL, NULL, '2017-11-27 08:04:18', '2017-11-27 08:17:18'),
(206, 31, 2, 'Description', NULL, NULL, NULL, NULL, NULL, '2017-11-27 08:04:18', '2017-11-27 08:04:18'),
(207, 31, 9, 'Navigation', 'jg_affiliation_nav', '0', NULL, '', '', '2017-11-27 08:04:18', '2017-11-27 08:05:39'),
(208, 31, 21, 'Contact-section-title', 'Contact Us', NULL, NULL, NULL, NULL, '2017-11-27 09:05:05', '2017-11-27 09:13:10'),
(209, 31, 22, 'Contact-section-paragraph', NULL, NULL, NULL, NULL, NULL, '2017-11-27 09:05:05', '2017-11-27 09:05:05'),
(210, 31, 28, 'Contact-logo', 'logo.png', NULL, NULL, NULL, NULL, '2017-11-27 09:05:05', '2017-11-27 09:17:22'),
(211, 31, 3, 'Logo', 'CK Logo.png', NULL, NULL, NULL, NULL, '2017-11-27 10:18:38', '2017-11-27 10:19:51'),
(212, 32, 1, 'Title', 'List of branches', NULL, NULL, NULL, NULL, '2017-11-27 10:24:39', '2018-01-18 18:38:44'),
(213, 32, 2, 'Description', NULL, NULL, NULL, NULL, NULL, '2017-11-27 10:24:39', '2017-11-27 10:24:39'),
(214, 32, 3, 'Logo', 'CK Logo.png', NULL, NULL, NULL, NULL, '2017-11-27 10:24:39', '2017-11-27 10:25:11'),
(215, 32, 9, 'Navigation', 'jg_affiliation_nav', '0', NULL, '', '', '2017-11-27 10:24:39', '2017-11-27 10:25:22'),
(216, 32, 21, 'Contact-section-title', 'Contact Us', NULL, NULL, NULL, NULL, '2017-11-27 10:24:39', '2018-01-18 18:38:44'),
(217, 32, 22, 'Contact-section-paragraph', NULL, NULL, NULL, NULL, NULL, '2017-11-27 10:24:39', '2017-11-27 10:24:39'),
(218, 32, 28, 'Contact-logo', 'logo.png', NULL, NULL, NULL, NULL, '2017-11-27 10:24:39', '2017-11-27 10:26:10'),
(220, 37, 1, 'Title', 'List of branches', NULL, NULL, NULL, NULL, '2017-11-27 10:39:48', '2017-11-27 10:40:02'),
(221, 37, 2, 'Description', NULL, NULL, NULL, NULL, NULL, '2017-11-27 10:39:48', '2017-11-27 10:39:48'),
(222, 37, 3, 'Logo', 'Screenshot_120.png', NULL, NULL, NULL, NULL, '2017-11-27 10:39:48', '2017-11-27 10:40:51'),
(223, 37, 9, 'Navigation', 'jg_affiliation_nav', '0', NULL, '', '', '2017-11-27 10:39:48', '2017-11-27 10:40:37'),
(224, 37, 21, 'Contact-section-title', 'Contact Us', NULL, NULL, NULL, NULL, '2017-11-27 10:39:48', '2017-11-27 10:41:17'),
(225, 37, 22, 'Contact-section-paragraph', NULL, NULL, NULL, NULL, NULL, '2017-11-27 10:39:48', '2017-11-27 10:39:48'),
(226, 37, 28, 'Contact-logo', 'logo.png', NULL, NULL, NULL, NULL, '2017-11-27 10:39:49', '2017-11-27 10:41:52'),
(227, 35, 1, 'Title', 'List of branches', NULL, NULL, NULL, NULL, '2017-11-27 10:44:35', '2017-11-27 10:44:48'),
(228, 35, 2, 'Description', NULL, NULL, NULL, NULL, NULL, '2017-11-27 10:44:35', '2017-11-27 10:44:35'),
(229, 35, 3, 'Logo', 'JGCF (1).png', NULL, NULL, NULL, NULL, '2017-11-27 10:44:35', '2017-11-27 10:45:00'),
(230, 35, 9, 'Navigation', 'jg_affiliation_nav', '0', NULL, '', '', '2017-11-27 10:44:35', '2017-11-27 10:45:09'),
(231, 35, 21, 'Contact-section-title', 'Contact Us', NULL, NULL, NULL, NULL, '2017-11-27 10:44:35', '2017-11-27 10:45:21'),
(232, 35, 22, 'Contact-section-paragraph', NULL, NULL, NULL, NULL, NULL, '2017-11-27 10:44:35', '2017-11-27 10:44:35'),
(233, 35, 28, 'Contact-logo', 'logo.png', NULL, NULL, NULL, NULL, '2017-11-27 10:44:35', '2017-11-27 10:45:41'),
(234, 36, 1, 'Title', 'List of branches', NULL, NULL, NULL, NULL, '2017-11-27 10:55:51', '2017-11-27 10:56:00'),
(235, 36, 2, 'Description', NULL, NULL, NULL, NULL, NULL, '2017-11-27 10:55:51', '2017-11-27 10:55:51'),
(236, 36, 3, 'Logo', 'JGTT (1).png', NULL, NULL, NULL, NULL, '2017-11-27 10:55:51', '2017-11-27 10:56:13'),
(237, 36, 9, 'Navigation', 'jg_affiliation_nav', '0', NULL, '', '', '2017-11-27 10:55:51', '2017-11-27 10:57:38'),
(238, 36, 21, 'Contact-section-title', 'Contact Us', NULL, NULL, NULL, NULL, '2017-11-27 10:55:51', '2017-11-27 10:56:20'),
(239, 36, 22, 'Contact-section-paragraph', NULL, NULL, NULL, NULL, NULL, '2017-11-27 10:55:51', '2017-11-27 10:55:51'),
(240, 36, 28, 'Contact-logo', 'logo.png', NULL, NULL, NULL, NULL, '2017-11-27 10:55:51', '2017-11-27 10:56:46'),
(241, 27, 33, 'link', 'http://www.biyahelocity.com/online/', NULL, NULL, NULL, NULL, '2017-11-28 11:36:14', '2017-11-28 11:36:45'),
(242, 28, 33, 'link', 'http://www.cargoking.com.ph/', NULL, NULL, NULL, NULL, '2017-11-28 11:36:54', '2017-11-28 11:37:06'),
(243, 29, 23, 'Services', 'jg_services', '5', NULL, '3', 'yes', '2017-11-28 17:25:41', '2017-11-28 17:26:00'),
(244, 29, 25, 'Services-title', NULL, NULL, NULL, NULL, NULL, '2017-11-28 17:25:41', '2017-11-28 17:25:41'),
(245, 29, 27, 'Services-description', NULL, NULL, NULL, NULL, NULL, '2017-11-28 17:25:41', '2017-11-28 17:25:41'),
(246, 39, 1, 'Title', 'FAQs', NULL, NULL, NULL, NULL, '2017-12-05 07:04:31', '2017-12-05 07:06:02'),
(247, 39, 4, 'Header Background', 'DSTIBldg1.jpg', NULL, NULL, NULL, NULL, '2017-12-05 07:04:32', '2017-12-25 23:15:15'),
(248, 39, 9, 'Navigation', 'jg_nav', '0', NULL, '', '', '2017-12-05 07:04:32', '2017-12-05 07:07:07'),
(249, 39, 21, 'Contact-section-title', 'Contact Us', NULL, NULL, NULL, NULL, '2017-12-05 07:04:32', '2017-12-05 07:10:00'),
(250, 39, 22, 'Contact-section-paragraph', NULL, NULL, NULL, NULL, NULL, '2017-12-05 07:04:32', '2017-12-05 07:04:32'),
(251, 39, 28, 'Contact-logo', 'logo.png', NULL, NULL, NULL, NULL, '2017-12-05 07:04:32', '2017-12-05 07:10:43'),
(252, 39, 2, 'Description', NULL, NULL, NULL, NULL, NULL, '2017-12-05 07:12:44', '2017-12-05 07:12:44'),
(253, 38, 1, 'Title', 'Newsletter', NULL, NULL, NULL, NULL, '2017-12-05 07:20:23', '2017-12-05 07:20:58'),
(254, 38, 4, 'Header Background', 'DSTIBldg1.jpg', NULL, NULL, NULL, NULL, '2017-12-05 07:20:23', '2017-12-25 23:15:04'),
(255, 38, 21, 'Contact-section-title', 'Contact Us', NULL, NULL, NULL, NULL, '2017-12-05 07:20:23', '2017-12-05 07:21:41'),
(256, 38, 22, 'Contact-section-paragraph', NULL, NULL, NULL, NULL, NULL, '2017-12-05 07:20:23', '2017-12-05 07:20:23'),
(257, 38, 28, 'Contact-logo', 'logo.png', NULL, NULL, NULL, NULL, '2017-12-05 07:20:23', '2017-12-05 07:22:47'),
(258, 38, 9, 'Navigation', 'jg_nav', '0', NULL, '', '', '2017-12-05 07:21:19', '2017-12-05 07:21:28'),
(259, 38, 34, 'Newsletter', 'jg_newsletter_list', '7', NULL, '9', 'yes', '2017-12-05 07:32:32', '2017-12-05 07:38:30'),
(269, 30, 32, 'Email', 'support@dcideasandsolutions.com', NULL, NULL, NULL, NULL, '2017-12-05 11:35:37', '2017-12-05 11:40:01'),
(270, 40, 2, 'Description', NULL, NULL, NULL, NULL, NULL, '2018-01-06 01:16:05', '2018-01-06 01:16:05'),
(271, 40, 3, 'Logo', 'Golden Stargate Approve Logo.jpg', NULL, NULL, NULL, NULL, '2018-01-06 01:16:06', '2018-01-18 18:28:37'),
(272, 40, 21, 'Contact-section-title', 'Contact Us', NULL, NULL, NULL, NULL, '2018-01-06 01:16:08', '2018-01-18 18:28:37'),
(273, 40, 22, 'Contact-section-paragraph', NULL, NULL, NULL, NULL, NULL, '2018-01-06 01:16:10', '2018-01-06 01:16:10'),
(274, 40, 28, 'Contact-logo', 'JGGC (2).png', NULL, NULL, NULL, NULL, '2018-01-06 01:16:12', '2018-01-06 01:43:02'),
(275, 40, 30, 'Affiliation-title', 'Other family member', NULL, NULL, NULL, NULL, '2018-01-06 01:16:13', '2018-01-18 18:28:37'),
(276, 40, 9, 'Navigation', 'jg_affiliation_nav', '0', NULL, '', '', '2018-01-06 01:46:52', '2018-01-06 01:47:19'),
(277, 40, 13, 'Affiliation', 'jg_pagelist', '3', NULL, '3', 'yes', '2018-01-06 01:54:34', '2018-01-06 01:55:06'),
(278, 41, 1, 'Title', 'List of branches', NULL, NULL, NULL, NULL, '2018-01-06 13:13:23', '2018-01-06 13:31:21'),
(279, 41, 2, 'Description', NULL, NULL, NULL, NULL, NULL, '2018-01-06 13:13:23', '2018-01-06 13:13:23'),
(280, 41, 3, 'Logo', 'Flash Cargo.png', NULL, NULL, NULL, NULL, '2018-01-06 13:13:24', '2018-01-06 13:31:21'),
(281, 41, 9, 'Navigation', 'jg_affiliation_nav', '0', NULL, '', '', '2018-01-06 13:13:24', '2018-01-06 13:32:29'),
(282, 41, 21, 'Contact-section-title', 'Contact Us', NULL, NULL, NULL, NULL, '2018-01-06 13:13:24', '2018-01-06 13:31:21'),
(283, 41, 22, 'Contact-section-paragraph', NULL, NULL, NULL, NULL, NULL, '2018-01-06 13:13:24', '2018-01-06 13:13:24'),
(284, 41, 28, 'Contact-logo', 'JGGC (2).png', NULL, NULL, NULL, NULL, '2018-01-06 13:13:24', '2018-01-06 13:31:21');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `log` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_10_05_185544_create_articles_table', 1),
(4, '2017_10_20_114101_create_comments_table', 1),
(5, '2017_10_21_094907_create_chats_table', 1),
(6, '2017_10_24_104909_create_contentmains_table', 1),
(7, '2017_10_24_115947_create_contentsubs_table', 1),
(8, '2017_10_24_120115_create_pagemains_table', 1),
(9, '2017_10_24_120501_create_pagesubs_table', 1),
(10, '2017_10_25_063925_create_pagetypes_table', 1),
(11, '2017_11_28_174900_create_chat_users_table', 2),
(12, '2017_11_28_184853_create_staff_table', 3),
(13, '2017_11_29_003554_create_logs_table', 4),
(14, '2017_12_02_190641_create_chat_msgs_table', 5),
(15, '2017_12_03_094316_create_chatusers_table', 6),
(16, '2018_02_27_090707_create_site_contents_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `pagemains`
--

CREATE TABLE `pagemains` (
  `page_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `template` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pagetype_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pagemains`
--

INSERT INTO `pagemains` (`page_id`, `name`, `template`, `pagetype_id`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'home', 0, '2017-11-13 01:00:40', '2018-01-21 13:43:33'),
(4, 'About', 'about', 0, '2017-11-13 03:00:41', '2017-11-14 02:11:47'),
(5, 'John Gold Travel and Tours', 'affiliation', 3, '2017-11-13 10:50:51', '2017-11-15 02:05:24'),
(6, 'John Gold Cargo Forwarder', 'affiliation', 3, '2017-11-14 22:53:15', '2017-11-14 22:53:53'),
(7, 'Cargo King Courier Services Corporation', 'affiliation', 3, '2017-11-14 22:53:45', '2017-11-14 22:53:45'),
(8, 'Biyahe.com.ph Travel Portal Corporation', 'affiliation', 3, '2017-11-14 22:54:32', '2017-11-14 22:54:32'),
(9, 'FLASH CARGO LOGISTICS NETWORK, INC.', 'affiliation', 3, '2017-11-14 22:54:48', '2018-01-18 18:29:49'),
(10, 'Sure Secure', 'affiliation', 3, '2017-11-15 06:27:19', '2017-11-15 06:27:19'),
(11, 'Golden Galleon', 'affiliation', 3, '2017-11-15 06:27:34', '2017-11-15 06:27:34'),
(12, 'Rush Cargo', 'affiliation', 3, '2017-11-15 06:27:53', '2017-11-15 06:27:53'),
(13, 'DSTI Group', 'affiliation', 3, '2017-11-15 06:29:52', '2017-11-15 06:29:52'),
(14, 'LIZA L. CAJIPE', 'team', 4, '2017-11-16 09:38:48', '2017-11-27 06:04:37'),
(15, 'MARILEN T. BRIONES', 'team', 4, '2017-11-16 09:39:35', '2017-11-27 06:13:34'),
(17, 'JOAN A. CATALAN', 'team', 4, '2017-11-16 09:39:58', '2017-11-27 06:14:05'),
(18, 'JANET D. RADOVAN', 'team', 4, '2017-11-16 09:40:29', '2018-01-18 18:21:59'),
(19, 'TESSA P. TANCONTIAN', 'team', 4, '2017-11-16 09:40:51', '2017-11-27 06:14:53'),
(20, 'BAMBI G. RONQUILLO', 'team', 4, '2017-11-16 09:41:15', '2017-11-27 06:15:14'),
(21, 'Erliza R. Baldonado', 'team', 4, '2017-11-16 09:41:45', '2017-11-27 06:15:48'),
(22, 'Joy E. Guerra', 'team', 4, '2017-11-16 09:42:09', '2017-11-27 06:16:11'),
(23, 'Leosel D. Balatero', 'team', 4, '2017-11-16 09:42:29', '2017-11-27 06:16:42'),
(24, 'FANNY G. JALANDONI', 'team', 4, '2017-11-16 09:42:53', '2017-11-27 06:17:08'),
(25, 'MARIBEL M. BERNARDO', 'team', 4, '2017-11-16 09:43:16', '2017-11-27 06:17:42'),
(26, 'Ritchel T. Jungco', 'team', 4, '2017-11-16 09:43:39', '2017-11-27 06:18:18'),
(27, 'Travel and tours', 'services', 5, '2017-11-21 09:48:07', '2017-11-28 11:36:44'),
(28, 'Cargo', 'services', 5, '2017-11-21 09:48:26', '2017-11-28 11:37:06'),
(29, 'Services', 'services', 0, '2017-11-24 09:40:29', '2017-11-24 09:40:29'),
(30, 'Contact', 'contact', 0, '2017-11-24 09:41:17', '2017-11-24 09:41:17'),
(31, 'Serviceable areas', 'location', 6, '2017-11-27 08:02:21', '2017-11-27 08:17:18'),
(32, 'CK branches', 'location', 6, '2017-11-27 10:14:25', '2018-01-18 18:38:44'),
(35, 'JGCF branches', 'location', 6, '2017-11-27 10:16:01', '2017-11-27 10:16:01'),
(36, 'JGTTSC branches', 'location', 6, '2017-11-27 10:16:54', '2017-11-27 10:16:54'),
(37, 'DSTI branches', 'location', 6, '2017-11-27 10:39:19', '2017-11-27 10:39:19'),
(38, 'NEWS', 'newsletter', 0, '2017-12-05 00:11:31', '2017-12-05 03:04:01'),
(39, 'FAQs', 'faq', 0, '2017-12-05 00:31:51', '2017-12-05 03:04:13'),
(40, 'Golden Stargate Solutions Inc.', 'affiliation', 3, '2018-01-06 01:13:07', '2018-01-18 18:28:37'),
(41, 'Flash Cargo Branches', 'location', 6, '2018-01-06 13:10:13', '2018-01-06 13:31:21');

-- --------------------------------------------------------

--
-- Table structure for table `pagesubs`
--

CREATE TABLE `pagesubs` (
  `id` int(10) UNSIGNED NOT NULL,
  `page_id` int(11) DEFAULT NULL,
  `page_parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pagesubs`
--

INSERT INTO `pagesubs` (`id`, `page_id`, `page_parent_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, '2017-11-13 01:00:40', '2018-01-21 13:43:34'),
(4, 4, NULL, '2017-11-13 03:00:41', '2017-11-14 02:11:47'),
(5, 5, 1, '2017-11-13 10:50:51', '2017-11-15 02:05:24'),
(6, 6, 1, '2017-11-14 22:53:15', '2017-11-14 22:53:54'),
(7, 7, NULL, '2017-11-14 22:53:45', '2017-11-14 22:53:45'),
(8, 8, NULL, '2017-11-14 22:54:32', '2017-11-14 22:54:32'),
(9, 9, NULL, '2017-11-14 22:54:48', '2018-01-18 18:29:49'),
(10, 10, NULL, '2017-11-15 06:27:19', '2017-11-15 06:27:19'),
(11, 11, NULL, '2017-11-15 06:27:34', '2017-11-15 06:27:34'),
(12, 12, NULL, '2017-11-15 06:27:53', '2017-11-15 06:27:53'),
(13, 13, NULL, '2017-11-15 06:29:52', '2017-11-15 06:29:52'),
(14, 14, NULL, '2017-11-16 09:38:49', '2017-11-27 06:04:37'),
(17, 17, NULL, '2017-11-16 09:39:58', '2017-11-27 06:14:05'),
(18, 18, NULL, '2017-11-16 09:40:29', '2018-01-18 18:21:59'),
(19, 19, NULL, '2017-11-16 09:40:51', '2017-11-27 06:14:53'),
(20, 20, NULL, '2017-11-16 09:41:15', '2017-11-27 06:15:14'),
(21, 21, NULL, '2017-11-16 09:41:45', '2017-11-27 06:15:48'),
(22, 22, NULL, '2017-11-16 09:42:09', '2017-11-27 06:16:11'),
(23, 23, NULL, '2017-11-16 09:42:30', '2017-11-27 06:16:42'),
(24, 24, NULL, '2017-11-16 09:42:53', '2017-11-27 06:17:08'),
(25, 25, NULL, '2017-11-16 09:43:16', '2017-11-27 06:17:42'),
(26, 26, NULL, '2017-11-16 09:43:39', '2017-11-27 06:18:18'),
(27, 27, NULL, '2017-11-21 09:48:07', '2017-11-28 11:36:44'),
(28, 28, NULL, '2017-11-21 09:48:26', '2017-11-28 11:37:06'),
(29, 29, NULL, '2017-11-24 09:40:29', '2017-11-24 09:40:29'),
(30, 30, NULL, '2017-11-24 09:41:18', '2017-11-24 09:41:18'),
(31, 31, NULL, '2017-11-27 08:02:21', '2017-11-27 08:17:18'),
(32, 32, NULL, '2017-11-27 10:14:25', '2018-01-18 18:38:44'),
(35, 35, NULL, '2017-11-27 10:16:01', '2017-11-27 10:16:01'),
(36, 36, NULL, '2017-11-27 10:16:54', '2017-11-27 10:16:54'),
(37, 37, NULL, '2017-11-27 10:39:19', '2017-11-27 10:39:19'),
(38, 38, NULL, '2017-12-05 00:11:31', '2017-12-05 03:04:01'),
(39, 39, NULL, '2017-12-05 00:31:51', '2017-12-05 03:04:13'),
(40, 40, NULL, '2018-01-06 01:13:09', '2018-01-18 18:28:37'),
(41, 41, NULL, '2018-01-06 13:10:13', '2018-01-06 13:31:21');

-- --------------------------------------------------------

--
-- Table structure for table `pagetypes`
--

CREATE TABLE `pagetypes` (
  `id` int(10) UNSIGNED NOT NULL,
  `page_category` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pagetypes`
--

INSERT INTO `pagetypes` (`id`, `page_category`, `created_at`, `updated_at`) VALUES
(1, 'Pages', '2017-11-13 10:04:41', '2017-11-13 10:04:41'),
(3, 'Affiliation', '2017-11-13 10:20:34', '2017-11-13 10:20:34'),
(4, 'Team', '2017-11-16 09:37:22', '2017-11-16 09:37:22'),
(5, 'Services', '2017-11-21 09:18:38', '2017-11-21 09:18:38'),
(6, 'Locations', '2017-11-27 08:01:54', '2017-11-27 08:01:54'),
(7, 'Newsletter', '2017-12-05 07:31:05', '2017-12-05 07:31:05');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `site_contents`
--

CREATE TABLE `site_contents` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_contents`
--

INSERT INTO `site_contents` (`id`, `name`, `content`, `created_at`, `updated_at`) VALUES
(1, 'favicon', 'favicon.png', '2018-02-27 01:58:37', '2018-02-27 01:58:37');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(10) UNSIGNED NOT NULL,
  `staff_lname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_fname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_mname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_level` int(11) DEFAULT NULL,
  `change_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_stat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_ol_stat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_user` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_pass` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_lname`, `staff_fname`, `staff_mname`, `staff_email`, `staff_img`, `staff_level`, `change_code`, `staff_stat`, `staff_ol_stat`, `staff_user`, `staff_pass`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin', 'johnirvinudang@gmail.com', NULL, 3, '', 'active', '', 'admin', 'admin', '2017-11-28 16:00:00', '2017-11-29 12:43:41'),
(2, 'Paul', 'Pierce', 'Paul', 'johnirvinudang@gmail.com', NULL, 1, NULL, 'active', NULL, 'tricks12143', 'qwerty', '2017-11-29 11:20:37', '2017-11-29 11:42:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `change_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ol_stat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `lname`, `fname`, `mname`, `img`, `level`, `change_code`, `stat`, `ol_stat`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin', 'logo.png', 3, 'Pab4G', 'active', 'Offline', 'admin', 'johnirvinudang@gmail.com', '$2y$10$dkzvHKygYDDhGehOWEjYDuBnIO3M75EKq.cVAh0OhDfr1IiAomE8i', 'sUIRD1i9CRA3rXBU9J7kcEQMuKHmfbgVYVCsTSWhgdpunqOGoCtl1vLalh0w', '2017-11-30 08:31:28', '2018-02-27 17:47:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `chat_msgs`
--
ALTER TABLE `chat_msgs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_users`
--
ALTER TABLE `chat_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contentmains`
--
ALTER TABLE `contentmains`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `contentsubs`
--
ALTER TABLE `contentsubs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagemains`
--
ALTER TABLE `pagemains`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `pagesubs`
--
ALTER TABLE `pagesubs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagetypes`
--
ALTER TABLE `pagetypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `site_contents`
--
ALTER TABLE `site_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `chat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `chat_msgs`
--
ALTER TABLE `chat_msgs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `chat_users`
--
ALTER TABLE `chat_users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contentmains`
--
ALTER TABLE `contentmains`
  MODIFY `content_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `contentsubs`
--
ALTER TABLE `contentsubs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=285;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `pagemains`
--
ALTER TABLE `pagemains`
  MODIFY `page_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `pagesubs`
--
ALTER TABLE `pagesubs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `pagetypes`
--
ALTER TABLE `pagetypes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `site_contents`
--
ALTER TABLE `site_contents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

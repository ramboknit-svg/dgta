-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 19, 2026 at 06:01 AM
-- Server version: 8.4.11
-- PHP Version: 8.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dgta_army`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `name`, `image`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'eOFFICE', '/public/images/application/1786704807eoffice.png', 'https://email.mil', 1, '2025-10-10 00:21:22', '2026-08-14 05:23:27'),
(2, 'ARMY MAIL', '/public/images/application/178659611117857558681785497943images.jpg', 'https://awwa.mil', 1, '2025-10-10 00:26:13', '2026-08-12 23:11:51'),
(4, 'ARPAN', '/public/images/application/1786704798arpan.png', 'https://vc.mil', 1, '2025-10-10 02:05:42', '2026-08-14 05:23:18'),
(5, 'eLIBRARY', '/public/images/application/1786704789library.png', 'https://library.mil', 1, '2025-10-10 02:06:27', '2026-08-14 05:23:09'),
(6, 'DOWNLOAD', '/public/images/application/1786704780download.png', 'https://cert.mil', 1, '2025-10-10 02:07:13', '2026-08-14 05:23:00'),
(8, 'INNOVATION', '/public/images/application/1786704774innovation.png', 'https://innovation.mil', 1, '2026-08-03 11:14:34', '2026-08-14 05:22:54');

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

CREATE TABLE `awards` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `appointment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `awards`
--

INSERT INTO `awards` (`id`, `name`, `appointment`, `created_at`, `updated_at`) VALUES
(1, 'Unit Citiation', '01', '2026-08-04 09:51:08', '2026-08-04 09:51:08'),
(2, 'Unit Hon’Ble Governor Citation', '03', '2026-08-04 09:51:26', '2026-08-04 09:51:26'),
(3, 'Ashok Chakra', '04', '2026-08-04 09:51:38', '2026-08-04 09:51:38'),
(4, 'Param Vishist Seva', '03', '2026-08-04 09:51:52', '2026-08-04 09:51:52'),
(5, 'Kirti Chakra Medal', '02', '2026-08-04 09:54:14', '2026-08-04 09:54:14'),
(6, 'Shurya Chakra', '05', '2026-08-04 09:54:28', '2026-08-04 09:54:28'),
(7, 'Yudh Seva Medal', '09', '2026-08-04 09:54:41', '2026-08-04 09:54:41'),
(8, 'Sena Medal', '09', '2026-08-04 09:54:51', '2026-08-04 09:54:51'),
(9, 'Vishist Seva Medal', '08', '2026-08-04 09:55:05', '2026-08-04 09:55:05'),
(10, 'Mentioned - in – Desptches', '07', '2026-08-04 09:55:20', '2026-08-04 09:55:20'),
(11, 'CDS', '11', '2026-08-04 09:55:31', '2026-08-04 09:55:31'),
(12, 'Chief od Army Staff CC', '14', '2026-08-04 09:55:43', '2026-08-04 09:56:04'),
(13, 'Vice Chief of Army Staff CC', '12', '2026-08-04 09:55:58', '2026-08-04 09:55:58'),
(14, 'GOC - in - C', '15', '2026-08-04 09:56:24', '2026-08-04 09:56:24'),
(15, 'DG’s Medal', '15', '2026-08-04 09:56:34', '2026-08-04 09:56:34');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Transforming military information systems through strategic planning and famous picture', '/public/images/banner/1760082953banner-1.webp', 1, '2025-10-09 05:36:41', '2026-01-08 05:49:19'),
(13, 'Transforming military information systems through strategic planning and famous picturek', '/public/images/banner/17712388361760015698classic.jpg', 1, '2026-02-16 05:17:16', '2026-05-04 01:26:33'),
(18, 'fghg   ddddd', '/public/images/banner/17920473841111.jpg', 1, '2026-10-15 01:26:24', '2026-10-15 01:26:24'),
(19, 'VNGDFFHGKGXJKGJCGH', '/public/images/banner/1792048793ABI.png', 1, '2026-10-15 01:49:53', '2026-10-15 01:49:53');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `duty` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `policy` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `head_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `description`, `slug`, `role`, `duty`, `policy`, `head_name`, `designation`, `image`, `created_at`, `updated_at`) VALUES
(3, 'TA I', 'Transforming military information systems through strategic planning and famous picture', 'goc', 'Transforming military information systems through strategic planning and famous picture', 'Transforming military information systems through strategic planning and famous pictures', 'Transforming military information systems through strategic planning and famous picture', 'Dhirendra', 'Lt. Gen', '/public/images/branch/1765449746g.jpg', '2025-11-18 04:50:58', '2026-08-04 11:10:00'),
(4, 'TA II', 'Transforming military information systems through strategic planning and famous picture', 'cos', 'Transforming military information systems through strategic planning and famous picture', 'Transforming military information systems through strategic planning and famous pictures', 'Transforming military information systems through strategic planning and famous picture', 'Satyam', 'Lt. Gen', '/public/images/branch/1765449775h.jpeg', '2025-11-18 04:50:58', '2026-08-04 10:12:06'),
(14, 'TA III', 'Transforming military information systems through strategic planning and famous picture', 'ms_br', 'Transforming military information systems through strategic planning and famous picture', 'Transforming military information systems through strategic planning and famous pictures', 'Transforming military information systems through strategic planning and famous picture', 'Virendra', 'Lt. Gen', '/public/images/branch/1765449501h.jpeg', '2025-11-18 04:50:58', '2026-08-04 10:12:38'),
(15, 'LEGAL CELL', 'Transforming military information systems through strategic planning and famous picture', 'legal', 'Transforming military information systems through strategic planning and famous picture', 'Transforming military information systems through strategic planning and famous pictures', 'Transforming military information systems through strategic planning and famous picture', 'Vinod', 'Lt. Gen', '/public/images/branch/1765449719f.jpg', '2025-11-18 04:50:58', '2026-08-04 10:13:03'),
(16, 'VETERAN CELL', 'Transforming military information systems through strategic planning and famous picture', 'veteran', 'Transforming military information systems through strategic planning and famous picture', 'Transforming military information systems through strategic planning and famous pictures', 'Transforming military information systems through strategic planning and famous picture', 'Sachin', 'Lt. Gen', '/public/images/branch/1765449680e.jpg', '2025-11-24 01:23:41', '2026-08-04 10:14:01'),
(17, 'TIAC', 'Transforming military information systems through strategic planning and famous picture', 'taic', 'Transforming military information systems through strategic planning and famous picture', 'Transforming military information systems through strategic planning and famous pictures', 'Transforming military information systems through strategic planning and famous picture', 'Mohit', 'Lt. Gen', '/public/images/branch/1765449647d.jpeg', '2025-11-24 01:23:41', '2026-08-04 10:14:23'),
(18, 'TA GP HQ EC', 'Transforming military information systems through strategic planning and famous picture', 'doc', 'Transforming military information systems through strategic planning and famous picture', 'Transforming military information systems through strategic planning and famous pictures', 'Transforming military information systems through strategic planning and famous picture', 'Jitendra', 'Lt. Gen', '/public/images/branch/1765449620c.png', '2025-11-18 04:50:58', '2026-08-04 10:14:46'),
(19, 'TA GP HQ WC', 'Transforming military information systems through strategic planning and famous picture', 'trg_b', 'Transforming military information systems through strategic planning and famous picture', 'Transforming military information systems through strategic planning and famous pictures', 'Transforming military information systems through strategic planning and famous picture', 'Himanshu', 'Lt. Gen', '/public/images/branch/1765449593b.jpg', '2025-11-18 04:50:58', '2026-08-04 10:25:51'),
(20, 'TA GP HQ SC', 'Transforming military information systems through strategic planning and famous picture', 'apvl', 'Transforming military information systems through strategic planning and famous picture', 'Transforming military information systems through strategic planning and famous pictures', 'Transforming military information systems through strategic planning and famous picture', 'Ram', 'Lt. Gen', '/public/images/branch/17864363061785911135images(1)(1).jpeg', '2025-11-24 01:23:41', '2026-08-11 02:48:26'),
(21, 'TA GP HQ NC', 'Transforming military information systems through strategic planning and famous picture', 'nc', 'Transforming military information systems through strategic planning and famous picture', 'Transforming military information systems through strategic planning and famous pictures', 'Transforming military information systems through strategic planning and famous picture', 'Ram', 'Lt. Gen', '/public/images/branch/17864362891785911135images(1)(1).jpeg', '2025-11-24 01:23:41', '2026-08-11 02:48:09'),
(22, 'TA GP HQ CC', 'Transforming military information systems through strategic planning and famous picture', 'cc', 'Transforming military information systems through strategic planning and famous picture', 'Transforming military information systems through strategic planning and famous pictures', 'Transforming military information systems through strategic planning and famous picture', 'Ram', 'Lt. Gen', '/public/images/branch/17864357951785911135images(1)(1).jpeg', '2025-11-24 01:23:41', '2026-08-11 02:39:55'),
(23, 'TA IV', 'Transforming military information systems through strategic planning and famous picture', 'gs_br', 'Transforming military information systems through strategic planning and famous picture', 'Transforming military information systems through strategic planning and famous pictures', 'Transforming military information systems through strategic planning and famous picture', 'Virendra', 'Lt. Gen', '/public/images/branch/1765449501h.jpeg', '2025-11-18 04:50:58', '2026-08-04 10:54:10'),
(24, 'TA SCHOOL', 'Transforming military information systems through strategic planning and famous picture', 'taschool', 'Transforming military information systems through strategic planning and famous picture', 'Transforming military information systems through strategic planning and famous pictures', 'Transforming military information systems through strategic planning and famous picture', 'Virendra', 'Lt Gen', '/public/images/branch/1765449501h.jpeg', '2025-11-18 04:50:58', '2026-08-14 03:06:41');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gates`
--

CREATE TABLE `gates` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gates`
--

INSERT INTO `gates` (`id`, `category_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, NULL, 'JOIN AS AN OFFICER', NULL, '2026-04-23 09:02:23', '2026-08-04 09:04:35'),
(2, NULL, 'PBOR', NULL, '2026-04-23 09:36:14', '2026-08-04 09:04:44');

-- --------------------------------------------------------

--
-- Table structure for table `gate_pdfs`
--

CREATE TABLE `gate_pdfs` (
  `id` bigint UNSIGNED NOT NULL,
  `gate_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gate_pdfs`
--

INSERT INTO `gate_pdfs` (`id`, `gate_id`, `name`, `link`, `created_at`, `updated_at`) VALUES
(1, 2, 'Imp pdf', '/public/images/gate_pdf/17866842051760294852rambaboo_resume.pdf', '2026-04-23 10:45:28', '2026-08-13 23:40:05'),
(2, 2, 'Pdf imp', '/public/images/gate_pdf/17866841961760294852rambaboo_resume.pdf', '2026-04-23 10:45:51', '2026-08-13 23:39:56'),
(3, 1, 'mtech pdf', '/public/images/gate_pdf/17866841871760294852rambaboo_resume.pdf', '2026-04-23 10:46:11', '2026-08-13 23:39:47'),
(4, 1, 'Pdf mtech', '/public/images/gate_pdf/17866842131760294852rambaboo_resume.pdf', '2026-04-23 10:46:27', '2026-08-13 23:40:13');

-- --------------------------------------------------------

--
-- Table structure for table `hit_counts`
--

CREATE TABLE `hit_counts` (
  `id` bigint UNSIGNED NOT NULL,
  `ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `host_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hit_counts`
--

INSERT INTO `hit_counts` (`id`, `ip`, `date`, `host_name`, `created_at`, `updated_at`) VALUES
(4, '192.168.11.151', '2026-01-05', 'devserver', '2026-01-05 06:00:04', '2026-01-05 06:00:04'),
(5, '192.168.11.149', '2026-01-05', NULL, '2026-01-05 06:13:09', '2026-01-05 06:13:09'),
(6, '192.168.11.149', '2026-01-06', NULL, '2026-01-06 01:46:10', '2026-01-06 01:46:10'),
(7, '192.168.11.151', '2026-01-06', NULL, '2026-01-06 01:48:46', '2026-01-06 01:48:46'),
(8, '192.168.11.153', '2026-01-06', NULL, '2026-01-06 05:45:14', '2026-01-06 05:45:14'),
(9, '172.3.47.84', '2026-01-06', NULL, '2026-01-06 06:56:44', '2026-01-06 06:56:44'),
(10, '172.3.47.103', '2026-01-06', NULL, '2026-01-06 07:02:34', '2026-01-06 07:02:34'),
(11, '172.3.47.103', '2026-01-07', NULL, '2026-01-06 21:55:26', '2026-01-06 21:55:26'),
(12, '172.3.47.84', '2026-01-07', NULL, '2026-01-06 21:55:44', '2026-01-06 21:55:44'),
(13, '10.0.0.191', '2026-01-07', NULL, '2026-01-07 05:41:52', '2026-01-07 05:41:52'),
(14, '10.0.0.191', '2026-01-08', NULL, '2026-01-08 00:19:45', '2026-01-08 00:19:45'),
(15, '10.0.0.200', '2026-01-08', NULL, '2026-01-08 00:27:15', '2026-01-08 00:27:15'),
(16, '10.0.0.191', '2026-01-09', NULL, '2026-01-08 22:45:05', '2026-01-08 22:45:05'),
(17, '10.0.0.200', '2026-01-09', NULL, '2026-01-08 23:38:56', '2026-01-08 23:38:56'),
(18, '10.0.0.200', '2026-01-22', NULL, '2026-01-21 22:09:54', '2026-01-21 22:09:54'),
(19, '10.0.0.191', '2026-01-22', NULL, '2026-01-21 22:20:45', '2026-01-21 22:20:45'),
(20, '10.0.0.191', '2026-02-05', NULL, '2026-02-04 23:39:45', '2026-02-04 23:39:45'),
(21, '10.0.0.191', '2026-02-06', NULL, '2026-02-05 23:53:41', '2026-02-05 23:53:41'),
(22, '10.0.0.191', '2026-02-10', NULL, '2026-02-10 01:44:56', '2026-02-10 01:44:56'),
(23, '10.0.0.191', '2026-02-16', NULL, '2026-02-16 00:00:46', '2026-02-16 00:00:46'),
(24, '10.0.0.191', '2026-02-17', NULL, '2026-02-16 23:34:03', '2026-02-16 23:34:03'),
(25, '10.0.0.191', '2026-02-18', NULL, '2026-02-17 23:32:31', '2026-02-17 23:32:31'),
(26, '192.168.11.150', '2026-02-19', NULL, '2026-02-18 23:51:18', '2026-02-18 23:51:18'),
(27, '192.168.11.13', '2026-02-19', NULL, '2026-02-19 00:03:55', '2026-02-19 00:03:55'),
(28, '192.168.10.250', '2026-02-19', NULL, '2026-02-19 04:06:06', '2026-02-19 04:06:06'),
(29, '192.168.11.151', '2026-02-19', NULL, '2026-02-19 05:25:47', '2026-02-19 05:25:47'),
(30, '192.168.11.155', '2026-02-19', NULL, '2026-02-19 05:26:46', '2026-02-19 05:26:46'),
(31, '192.168.11.149', '2026-02-19', NULL, '2026-02-19 05:56:39', '2026-02-19 05:56:39'),
(32, '192.168.11.150', '2026-02-20', NULL, '2026-02-19 23:30:35', '2026-02-19 23:30:35'),
(33, '192.168.11.151', '2026-02-20', NULL, '2026-02-19 23:31:26', '2026-02-19 23:31:26'),
(34, '192.168.11.153', '2026-02-20', NULL, '2026-02-20 00:27:07', '2026-02-20 00:27:07'),
(35, '192.168.11.150', '2026-03-02', NULL, '2026-03-02 01:26:02', '2026-03-02 01:26:02'),
(36, '192.168.11.150', '2026-03-13', NULL, '2026-03-13 05:53:44', '2026-03-13 05:53:44'),
(37, '192.168.11.153', '2026-03-13', NULL, '2026-03-13 05:59:34', '2026-03-13 05:59:34'),
(38, '192.168.10.149', '2026-03-13', NULL, '2026-03-13 06:18:28', '2026-03-13 06:18:28'),
(39, '192.168.11.150', '2026-03-18', NULL, '2026-03-18 06:22:52', '2026-03-18 06:22:52'),
(40, '192.168.11.150', '2026-03-19', NULL, '2026-03-18 23:45:58', '2026-03-18 23:45:58'),
(41, '192.168.11.150', '2026-03-23', NULL, '2026-03-23 00:43:36', '2026-03-23 00:43:36'),
(42, '192.168.11.151', '2026-03-23', NULL, '2026-03-23 06:23:02', '2026-03-23 06:23:02'),
(43, '192.168.11.150', '2026-03-24', NULL, '2026-03-23 22:35:45', '2026-03-23 22:35:45'),
(44, '192.168.11.150', '2026-03-25', NULL, '2026-03-24 22:24:27', '2026-03-24 22:24:27'),
(45, '192.168.11.151', '2026-03-25', NULL, '2026-03-25 00:48:04', '2026-03-25 00:48:04'),
(46, '192.168.11.150', '2026-03-27', NULL, '2026-03-27 00:20:57', '2026-03-27 00:20:57'),
(47, '192.168.11.151', '2026-03-27', NULL, '2026-03-27 00:21:45', '2026-03-27 00:21:45'),
(48, '192.168.10.152', '2026-03-27', NULL, '2026-03-27 04:25:11', '2026-03-27 04:25:11'),
(49, '192.168.11.147', '2026-04-08', NULL, '2026-04-07 23:51:52', '2026-04-07 23:51:52'),
(50, '192.168.11.17', '2026-04-08', NULL, '2026-04-08 01:32:16', '2026-04-08 01:32:16'),
(51, '192.168.11.150', '2026-04-08', NULL, '2026-04-08 04:18:49', '2026-04-08 04:18:49'),
(52, '192.168.11.147', '2026-04-09', NULL, '2026-04-08 22:45:33', '2026-04-08 22:45:33'),
(53, '192.168.11.15', '2026-04-09', NULL, '2026-04-08 23:00:33', '2026-04-08 23:00:33'),
(54, '192.168.11.150', '2026-04-09', NULL, '2026-04-09 04:52:01', '2026-04-09 04:52:01'),
(55, '192.168.10.150', '2026-04-10', NULL, '2026-04-10 06:18:09', '2026-04-10 06:18:09'),
(56, '192.168.10.150', '2026-04-13', NULL, '2026-04-13 08:46:17', '2026-04-13 08:46:17'),
(57, '192.168.11.13', '2026-04-13', NULL, '2026-04-13 04:01:33', '2026-04-13 04:01:33'),
(58, '192.168.11.151', '2026-04-13', NULL, '2026-04-13 04:40:21', '2026-04-13 04:40:21'),
(59, '192.168.10.149', '2026-04-13', NULL, '2026-04-13 04:50:27', '2026-04-13 04:50:27'),
(60, '192.168.11.153', '2026-04-13', NULL, '2026-04-13 07:18:56', '2026-04-13 07:18:56'),
(61, '192.168.10.150', '2026-04-15', NULL, '2026-04-14 22:10:11', '2026-04-14 22:10:11'),
(62, '192.168.11.153', '2026-04-15', NULL, '2026-04-14 23:15:46', '2026-04-14 23:15:46'),
(63, '192.168.11.13', '2026-04-15', NULL, '2026-04-14 23:31:00', '2026-04-14 23:31:00'),
(64, '192.168.10.40', '2026-04-15', NULL, '2026-04-14 23:51:44', '2026-04-14 23:51:44'),
(65, '192.168.10.42', '2026-04-15', NULL, '2026-04-14 23:58:45', '2026-04-14 23:58:45'),
(66, '192.168.11.151', '2026-04-15', NULL, '2026-04-15 03:39:36', '2026-04-15 03:39:36'),
(67, '192.168.10.149', '2026-04-15', NULL, '2026-04-15 04:40:00', '2026-04-15 04:40:00'),
(68, '192.168.11.151', '2026-04-16', NULL, '2026-04-15 22:17:41', '2026-04-15 22:17:41'),
(69, '192.168.11.153', '2026-04-16', NULL, '2026-04-15 22:24:08', '2026-04-15 22:24:08'),
(70, '192.168.10.150', '2026-04-16', NULL, '2026-04-15 23:22:47', '2026-04-15 23:22:47'),
(71, '192.168.11.13', '2026-04-16', NULL, '2026-04-15 23:25:11', '2026-04-15 23:25:11'),
(72, '192.168.10.150', '2026-04-17', NULL, '2026-04-16 23:16:24', '2026-04-16 23:16:24'),
(73, '192.168.11.151', '2026-04-17', NULL, '2026-04-16 23:41:07', '2026-04-16 23:41:07'),
(74, '192.168.11.151', '2026-04-18', NULL, '2026-04-18 07:06:06', '2026-04-18 07:06:06'),
(75, '192.168.10.150', '2026-04-18', NULL, '2026-04-18 07:14:02', '2026-04-18 07:14:02'),
(76, '192.168.10.150', '2026-04-21', NULL, '2026-04-21 00:09:28', '2026-04-21 00:09:28'),
(77, '192.168.11.151', '2026-04-21', NULL, '2026-04-21 00:11:52', '2026-04-21 00:11:52'),
(78, '192.168.11.151', '2026-04-22', NULL, '2026-04-22 07:35:00', '2026-04-22 07:35:00'),
(79, '192.168.10.150', '2026-04-24', NULL, '2026-04-24 06:14:52', '2026-04-24 06:14:52'),
(80, '192.168.11.151', '2026-04-24', NULL, '2026-04-24 06:31:30', '2026-04-24 06:31:30'),
(81, '192.168.10.150', '2026-04-30', NULL, '2026-04-30 02:55:23', '2026-04-30 02:55:23'),
(82, '192.168.10.150', '2026-04-30', NULL, '2026-04-30 02:55:23', '2026-04-30 02:55:23'),
(83, '192.168.11.153', '2026-04-30', NULL, '2026-04-30 04:27:55', '2026-04-30 04:27:55'),
(84, '192.168.11.13', '2026-04-30', NULL, '2026-04-30 07:46:33', '2026-04-30 07:46:33'),
(85, '192.168.10.150', '2026-05-01', NULL, '2026-05-01 00:16:32', '2026-05-01 00:16:32'),
(86, '192.168.11.151', '2026-04-30', NULL, '2026-04-29 23:05:55', '2026-04-29 23:05:55'),
(87, '192.168.10.150', '2026-05-04', NULL, '2026-05-03 22:40:20', '2026-05-03 22:40:20'),
(88, '127.0.0.1', '2026-05-04', NULL, '2026-05-03 22:52:01', '2026-05-03 22:52:01'),
(89, '192.168.11.15', '2026-05-04', NULL, '2026-05-03 23:50:11', '2026-05-03 23:50:11'),
(92, '192.168.10.150', '2026-05-05', NULL, '2026-05-04 22:35:48', '2026-05-04 22:35:48'),
(93, '192.168.11.153', '2026-05-05', NULL, '2026-05-04 23:22:11', '2026-05-04 23:22:11'),
(94, '192.168.10.150', '2026-05-18', NULL, '2026-05-18 04:03:22', '2026-05-18 04:03:22'),
(95, '192.168.10.150', '2026-05-19', NULL, '2026-05-18 22:42:20', '2026-05-18 22:42:20'),
(96, '192.168.10.150', '2026-05-20', NULL, '2026-05-19 22:45:22', '2026-05-19 22:45:22'),
(97, '192.168.10.135', '2026-05-20', NULL, '2026-05-19 23:10:48', '2026-05-19 23:10:48'),
(98, '192.168.10.40', '2026-05-20', NULL, '2026-05-20 04:39:08', '2026-05-20 04:39:08'),
(99, '192.168.11.151', '2026-08-10', NULL, '2026-08-10 01:43:40', '2026-08-10 01:43:40'),
(100, '192.168.10.150', '2026-08-10', NULL, '2026-08-10 01:48:47', '2026-08-10 01:48:47'),
(101, '192.168.11.153', '2026-08-10', NULL, '2026-08-10 06:20:40', '2026-08-10 06:20:40'),
(102, '192.168.10.150', '2026-08-11', NULL, '2026-08-10 22:42:53', '2026-08-10 22:42:53'),
(103, '192.168.11.153', '2026-08-11', NULL, '2026-08-10 22:44:22', '2026-08-10 22:44:22'),
(104, '192.168.11.151', '2026-08-11', NULL, '2026-08-10 22:59:11', '2026-08-10 22:59:11'),
(105, '192.168.11.151', '2026-08-12', NULL, '2026-08-12 03:58:00', '2026-08-12 03:58:00'),
(106, '192.168.10.150', '2026-08-13', NULL, '2026-08-12 22:29:26', '2026-08-12 22:29:26'),
(107, '192.168.11.151', '2026-08-13', NULL, '2026-08-12 23:10:54', '2026-08-12 23:10:54'),
(108, '192.168.11.153', '2026-08-13', NULL, '2026-08-12 23:33:07', '2026-08-12 23:33:07'),
(109, '192.168.11.151', '2026-08-14', NULL, '2026-08-13 22:44:49', '2026-08-13 22:44:49'),
(110, '192.168.10.150', '2026-08-14', NULL, '2026-08-13 23:44:15', '2026-08-13 23:44:15'),
(111, '192.168.10.150', '2026-08-17', NULL, '2026-08-16 22:04:58', '2026-08-16 22:04:58'),
(112, '192.168.11.151', '2026-08-17', NULL, '2026-08-16 22:05:28', '2026-08-16 22:05:28'),
(113, '192.168.11.151', '2026-08-18', NULL, '2026-08-18 05:09:22', '2026-08-18 05:09:22'),
(114, '192.168.11.151', '2026-08-21', NULL, '2026-08-21 04:57:35', '2026-08-21 04:57:35'),
(115, '192.168.11.153', '2026-08-24', NULL, '2026-08-23 23:51:26', '2026-08-23 23:51:26'),
(116, '192.168.10.150', '2026-08-24', NULL, '2026-08-24 03:10:41', '2026-08-24 03:10:41'),
(117, '192.168.10.150', '2026-08-25', NULL, '2026-08-25 06:10:53', '2026-08-25 06:10:53'),
(118, '192.168.10.150', '2026-08-27', NULL, '2026-08-26 22:13:51', '2026-08-26 22:13:51'),
(119, '192.168.11.151', '2026-08-27', NULL, '2026-08-26 22:48:30', '2026-08-26 22:48:30'),
(120, '192.168.10.149', '2026-09-17', NULL, '2026-09-16 23:39:57', '2026-09-16 23:39:57'),
(121, '192.168.10.135', '2026-09-17', NULL, '2026-09-16 23:40:31', '2026-09-16 23:40:31'),
(122, '192.168.10.149', '2026-10-06', NULL, '2026-10-06 08:52:15', '2026-10-06 08:52:15'),
(123, '192.168.11.151', '2026-10-06', NULL, '2026-10-06 09:03:58', '2026-10-06 09:03:58'),
(124, '192.168.11.151', '2026-10-07', NULL, '2026-10-07 09:25:35', '2026-10-07 09:25:35'),
(125, '192.168.11.151', '2026-10-07', NULL, '2026-10-07 09:25:35', '2026-10-07 09:25:35'),
(126, '192.168.11.151', '2026-10-07', NULL, '2026-10-07 09:25:35', '2026-10-07 09:25:35'),
(127, '192.168.11.151', '2026-10-07', NULL, '2026-10-07 09:25:35', '2026-10-07 09:25:35'),
(128, '192.168.11.151', '2026-10-07', NULL, '2026-10-07 09:25:35', '2026-10-07 09:25:35'),
(129, '192.168.11.151', '2026-10-07', NULL, '2026-10-07 09:25:35', '2026-10-07 09:25:35'),
(130, '192.168.11.151', '2026-10-07', NULL, '2026-10-07 09:25:35', '2026-10-07 09:25:35'),
(131, '192.168.11.151', '2026-10-07', NULL, '2026-10-07 09:25:35', '2026-10-07 09:25:35'),
(132, '192.168.11.151', '2026-10-07', NULL, '2026-10-07 09:25:35', '2026-10-07 09:25:35'),
(133, '192.168.11.151', '2026-10-07', NULL, '2026-10-07 09:25:35', '2026-10-07 09:25:35'),
(134, '192.168.11.151', '2026-10-07', NULL, '2026-10-07 09:25:35', '2026-10-07 09:25:35'),
(135, '192.168.10.149', '2026-10-10', NULL, '2026-10-10 10:48:46', '2026-10-10 10:48:46'),
(136, '192.168.10.149', '2026-10-12', NULL, '2026-10-12 11:18:20', '2026-10-12 11:18:20'),
(137, '192.168.11.151', '2026-10-12', NULL, '2026-10-12 12:20:34', '2026-10-12 12:20:34'),
(138, '192.168.11.151', '2026-10-13', NULL, '2026-10-13 06:13:17', '2026-10-13 06:13:17'),
(139, '192.168.11.151', '2026-10-14', NULL, '2026-10-14 00:13:26', '2026-10-14 00:13:26'),
(140, '192.168.10.149', '2026-10-14', NULL, '2026-10-14 03:09:01', '2026-10-14 03:09:01'),
(141, '192.168.10.135', '2026-10-14', NULL, '2026-10-13 23:22:53', '2026-10-13 23:22:53'),
(142, '192.168.11.153', '2026-10-15', NULL, '2026-10-14 22:57:18', '2026-10-14 22:57:18'),
(143, '192.168.10.135', '2026-10-15', NULL, '2026-10-14 23:24:48', '2026-10-14 23:24:48'),
(144, '192.168.11.151', '2026-10-15', NULL, '2026-10-15 01:46:23', '2026-10-15 01:46:23'),
(145, '192.168.10.149', '2026-10-15', NULL, '2026-10-15 03:36:11', '2026-10-15 03:36:11'),
(146, '192.168.10.149', '2026-10-16', NULL, '2026-10-15 23:54:28', '2026-10-15 23:54:28'),
(147, '192.168.10.135', '2026-10-19', NULL, '2026-10-19 00:27:10', '2026-10-19 00:27:10'),
(148, '192.168.10.149', '2026-10-19', NULL, '2026-10-19 00:28:33', '2026-10-19 00:28:33');

-- --------------------------------------------------------

--
-- Table structure for table `hods`
--

CREATE TABLE `hods` (
  `id` int NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `long_description` longtext,
  `image` varchar(255) DEFAULT NULL,
  `left_image` varchar(255) DEFAULT NULL,
  `right_image` varchar(255) DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hods`
--

INSERT INTO `hods` (`id`, `user_id`, `name`, `designation`, `description`, `long_description`, `image`, `left_image`, `right_image`, `status`, `created_at`, `updated_at`) VALUES
(4, '1', 'LT GEN Prakash', 'AVSM,', '<b> VISION</b></h4><p><span>\"To establish a world-class information management ecosystem that empowers strategic decision-making and operational excellence.\"</span></p><p><span><b>Strategic Objectives:</b></span></p><ul><li><span>Digital transformation of information systems</span></li><li>Enhanced inter-departmental coordination</li><li>Secure and efficient data management</li><li>Advanced analytics and reporting capabilities</li></ul><p>Core Values: Excellence, Innovation, Security, Collaboration</p>', 'Transforming military information systems through strategic planning and technological advancement is at the core of our mission Fostering collaboration and innovation to achieve operation Transforming military information systems through strategic planning and technological advancement is at the core of our mission Fostering collaboration and innovation to achieve operation Transforming military information systems through strategic planning and technological advancement is at the core of our mission Fostering collaboration and innovation to achieve operation Transforming military information systems through strategic planning and technological advancement is at the core of our mission Fostering collaboration and innovation to achieve operation\r\n\r\nTransforming military information systems through strategic planning and technological advancement is at the core of our mission Fostering collaboration and innovation to achieve operation Transforming military information systems through strategic planning and technological advancement is at the core of our mission Fostering collaboration and innovation to achieve operation\r\n\r\nTransforming military information systems through strategic planning and technological advancement is at the core of our mission Fostering collaboration and innovation to achieve operation Transforming military information systems through strategic planning and technological advancement is at the core of our mission Fostering collaboration and innovation to achieve operation', '/public/images/hod/17864251641785911135images(1)(1).jpeg', '/public/images/hod/1786427832ta.png', '/public/images/hod/1786427832ta.png', 1, '2025-10-10 01:18:46', '2026-10-15 03:50:07');

-- --------------------------------------------------------

--
-- Table structure for table `knowledges`
--

CREATE TABLE `knowledges` (
  `id` int NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `knowledges`
--

INSERT INTO `knowledges` (`id`, `image`, `link`, `status`, `created_at`, `updated_at`) VALUES
(8, '/public/images/knowledge/1760289807army-hospital.jpg', 'knoledge', 1, '2025-10-12 09:10:26', '2026-01-06 04:21:35');

-- --------------------------------------------------------

--
-- Table structure for table `knowledge_categories`
--

CREATE TABLE `knowledge_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `knowledge_categories`
--

INSERT INTO `knowledge_categories` (`id`, `category_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(94, NULL, 'INF UNIT', 'INF UNIT', '2026-08-04 06:05:58', '2026-08-04 06:05:58'),
(95, NULL, 'ENGR TA UNITS', 'ENGR TA UNITS', '2026-08-04 06:06:33', '2026-08-04 06:06:33'),
(96, NULL, 'ECO TASK FORCE', 'ECO TASK FORCE', '2026-08-04 06:06:52', '2026-08-04 06:06:52'),
(97, NULL, 'OIL SECTOR UNITS', 'OIL SECTOR', '2026-08-04 06:07:16', '2026-08-04 06:07:16'),
(98, 94, '101 Inf Bn (TA) MARATHA LI', '101 Inf Bn (TA) MARATHA LI', '2026-08-04 06:07:56', '2026-08-04 06:07:56'),
(99, 94, '102 Inf Bn (TA) PUNJAB', '102 Inf Bn (TA) PUNJAB', '2026-08-04 06:08:12', '2026-08-04 06:08:12'),
(100, 94, '103 Inf Bn (TA) SIKH LI', '103 Inf Bn (TA) SIKH LI', '2026-08-04 06:08:27', '2026-08-04 06:08:27'),
(101, 95, '173 Engr Regt (TA)', '173 Engr Regt (TA)', '2026-08-04 06:09:44', '2026-08-04 06:09:44'),
(102, 95, '174 Engr Regt (TA)', '173 Engr Regt (TA)', '2026-08-04 06:09:58', '2026-08-04 06:09:58'),
(103, 95, '175 Engr Regt (TA)', 'The Role encompasses providing visionary leadership, strategic guidance, and operational direction to ensure the organization’s objectives are met with efficiency and integrity. It involves developing and implementing policies, doctrines, and systems that align with national priorities and institutional mandates. As a central link between strategy and execution, the role demands fostering inter-departmental coordination, mentoring future leaders, and ensuring resource optimization. It also emphasizes modernization through research, innovation, and global collaboration. Ultimately, the role serves as the cornerstone of organizational strength — ensuring preparedness, discipline, and excellence across all levels of command and operation.\r\n\r\n    Strategic Leadership & Oversight: Formulate and execute strategic plans, doctrinal consistency, and joint operations.\r\n    Operational Policy Formulation: Develop multi-domain warfare doctrines integrating modern technologies.\r\n    Education and Doctrine Development: Design and validate military academic curricula, encourage advanced research.\r\n    Inter-Service Coordination: Ensure seamless collaboration between Army, Navy, and Air Force branches.\r\n    Human Capital Development: Lead officer education, leadership grooming, and performance evaluation systems.\r\n    International Collaboration: Promote defense diplomacy and joint military education programs globally.\r\n    Crisis and Conflict Response: Strategically advise during national emergencies and live conflict scenarios.\r\n    Uphold Integrity and Discipline: Maintain the highest standards of honesty, discipline, and professional ethics in all duties.\r\n    Ensure Operational Efficiency: Perform all assigned tasks with diligence, accuracy, and timeliness to ensure smooth organizational functioning.', '2026-08-04 06:10:33', '2026-08-04 06:10:33'),
(104, 96, '127 Inf Bn (TA) Eco GARH RIF', '127 Inf Bn (TA) Eco GARH RIF', '2026-08-04 06:11:48', '2026-08-04 06:11:48'),
(105, 96, '128 Inf Bn (TA) Eco RAJRIF', '128 Inf Bn (TA) Eco RAJRIF', '2026-08-04 06:12:12', '2026-08-04 06:12:12'),
(106, 96, '129 Inf Bn (TA) Eco JAKLI', '129 Inf Bn (TA) Eco JAKLI', '2026-08-04 06:12:30', '2026-08-04 06:12:30'),
(107, 97, '801 Engr Regt R & P (TA)', '801 Engr Regt R & P (TA)', '2026-08-04 06:13:10', '2026-08-04 06:13:10'),
(108, 97, '811 ONGC TA', '811 ONGC TA', '2026-08-04 06:13:25', '2026-08-04 06:13:25'),
(109, 97, '414 ASC Bn MRKT (TA)', '414 ASC Bn MRKT (TA)', '2026-08-04 06:13:37', '2026-08-04 06:13:37'),
(112, 94, '105 Inf Bn (TA) RAJ RIF', '105 Inf Bn (TA) RAJ RIF', '2026-08-04 11:14:46', '2026-08-04 11:14:46'),
(113, 94, '106 Inf Bn (TA) PARA', '106 Inf Bn (TA) PARA', '2026-08-04 11:15:18', '2026-08-04 11:15:18'),
(114, 94, '107 Inf Bn (TA) 11 GR', '107 Inf Bn (TA) 11 GR', '2026-08-04 11:15:32', '2026-08-04 11:15:32'),
(115, 94, '108 Inf Bn (TA) MAHAR', '108 Inf Bn (TA) MAHAR', '2026-08-04 11:15:51', '2026-08-04 11:15:51'),
(116, 94, '109 Inf Bn (TA) MARATHA LI', '109 Inf Bn (TA) MARATHA LI', '2026-08-04 11:16:06', '2026-08-04 11:16:06'),
(117, 94, '110 Inf Bn (TA) MADRAS', '110 Inf Bn (TA) MADRAS', '2026-08-04 11:16:22', '2026-08-04 11:16:22'),
(118, 94, '111 Inf Bn (TA) KUMAON', '111 Inf Bn (TA) KUMAON', '2026-08-04 11:16:39', '2026-08-04 11:16:39'),
(119, 94, '112 Inf Bn (TA) DOGRA', '112 Inf Bn (TA) DOGRA', '2026-08-04 11:16:54', '2026-08-04 11:16:54'),
(120, 94, '113 Inf Bn (TA) RAJPUT', '113 Inf Bn (TA) RAJPUT', '2026-08-04 11:17:09', '2026-08-04 11:17:09'),
(121, 94, '114 Inf Bn (TA) JAT', '114 Inf Bn (TA) JAT', '2026-08-04 11:17:22', '2026-08-04 11:17:22'),
(122, 94, '115 Inf Bn (TA) MAHAR', '115 Inf Bn (TA) MAHAR', '2026-08-04 11:17:35', '2026-08-04 11:17:35'),
(123, 94, '116 Inf Bn (TA) PARA', '116 Inf Bn (TA) PARA', '2026-08-04 11:17:49', '2026-08-04 11:17:49'),
(124, 94, '117 Inf Bn (TA) THE GUARDS', '117 Inf Bn (TA) THE GUARDS', '2026-08-04 11:18:06', '2026-08-04 11:18:06'),
(125, 94, '118 Inf Bn (TA) GRENADIERS', '118 Inf Bn (TA) GRENADIERS', '2026-08-04 11:18:26', '2026-08-04 11:18:26'),
(126, 94, '119 Inf Bn (TA) ASSAM', '119 Inf Bn (TA) ASSAM', '2026-08-04 11:18:45', '2026-08-04 11:18:45'),
(127, 94, 'Inf Bn TA', '120 Inf Bn TA BIHAR', '2026-08-04 11:19:06', '2026-08-14 03:34:12');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2024_07_23_101550_create_banners_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `moviews`
--

CREATE TABLE `moviews` (
  `id` bigint UNSIGNED NOT NULL,
  `day` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `moviews`
--

INSERT INTO `moviews` (`id`, `day`, `time`, `name`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sunday', '19:00', 'sarfarosh', '<tbody>\n                                    <tr>\n                                        <td><strong>Monday</strong></td>\n                                        <td>7:00 PM</td>\n                                        <td class=\"movie-title\">Borders</td>\n\n                                    </tr>\n                                    <tr>\n                                        <td><strong>Tuesday</strong></td>\n                                        <td>7:00 PM</td>\n                                        <td class=\"movie-title\">Uri: The Surgical Strike</td>\n                                    </tr>\n                                    <tr>\n                                        <td><strong>Wednesday</strong></td>\n                                        <td>7:00 PM</td>\n                                        <td class=\"movie-title\">Shershaah</td>\n                                    </tr>\n                                    <tr>\n                                        <td><strong>Thursday</strong></td>\n                                        <td>7:00 PM</td>\n                                        <td class=\"movie-title\">Lakshya</td>\n                                    </tr>\n                                    <tr>\n                                        <td><strong>Friday</strong></td>\n                                        <td>7:00 PM</td>\n                                        <td class=\"movie-title\">Paltan</td>\n                                    </tr>\n                                    <tr>\n                                        <td><strong>Saturday</strong></td>\n                                        <td>3:00 PM</td>\n                                        <td class=\"movie-title\">The Ghazi Attack</td>\n                                    </tr>\n                                    <tr>\n                                        <td><strong>Sunday</strong></td>\n                                        <td>6:00 PM</td>\n                                        <td class=\"movie-title\">Raazis</td>\n                                    </tr>\n                                </tbody>', '/public/images/movie/177124089217677846791760317859movie-poster.jpg', 1, '2025-10-12 19:42:47', '2026-02-17 04:12:21'),
(2, 'Saturday', '19:00', 'sarfarosh', '<tbody>\r\n                                    <tr>\r\n                                        <td><strong>Monday</strong></td>\r\n                                        <td>7:00 PM</td>\r\n                                        <td class=\"movie-title\">Borders</td>\r\n\r\n                                    </tr>\r\n                                    <tr>\r\n                                        <td><strong>Tuesday</strong></td>\r\n                                        <td>7:00 PM</td>\r\n                                        <td class=\"movie-title\">Uri: The Surgical Strike</td>\r\n                                    </tr>\r\n                                    <tr>\r\n                                        <td><strong>Wednesday</strong></td>\r\n                                        <td>7:00 PM</td>\r\n                                        <td class=\"movie-title\">Shershaah</td>\r\n                                    </tr>\r\n                                    <tr>\r\n                                        <td><strong>Thursday</strong></td>\r\n                                        <td>7:00 PM</td>\r\n                                        <td class=\"movie-title\">Lakshya</td>\r\n                                    </tr>\r\n                                    <tr>\r\n                                        <td><strong>Friday</strong></td>\r\n                                        <td>7:00 PM</td>\r\n                                        <td class=\"movie-title\">Paltan</td>\r\n                                    </tr>\r\n                                    <tr>\r\n                                        <td><strong>Saturday</strong></td>\r\n                                        <td>3:00 PM</td>\r\n                                        <td class=\"movie-title\">The Ghazi Attack</td>\r\n                                    </tr>\r\n                                    <tr>\r\n                                        <td><strong>Sunday</strong></td>\r\n                                        <td>6:00 PM</td>\r\n                                        <td class=\"movie-title\">Raazis</td>\r\n                                    </tr>\r\n                                </tbody>', '/public/images/movie/177124089217677846791760317859movie-poster.jpg', 1, '2025-10-12 19:42:47', '2026-02-17 04:12:51'),
(3, 'Friday', '19:00', 'Borderrrrrrrrrrrrrrr', '<tbody>\r\n                                    <tr>\r\n                                        <td><strong>Monday</strong></td>\r\n                                        <td>7:00 PM</td>\r\n                                        <td class=\"movie-title\">Borders</td>\r\n\r\n                                    </tr>\r\n                                    <tr>\r\n                                        <td><strong>Tuesday</strong></td>\r\n                                        <td>7:00 PM</td>\r\n                                        <td class=\"movie-title\">Uri: The Surgical Strike</td>\r\n                                    </tr>\r\n                                    <tr>\r\n                                        <td><strong>Wednesday</strong></td>\r\n                                        <td>7:00 PM</td>\r\n                                        <td class=\"movie-title\">Shershaah</td>\r\n                                    </tr>\r\n                                    <tr>\r\n                                        <td><strong>Thursday</strong></td>\r\n                                        <td>7:00 PM</td>\r\n                                        <td class=\"movie-title\">Lakshya</td>\r\n                                    </tr>\r\n                                    <tr>\r\n                                        <td><strong>Friday</strong></td>\r\n                                        <td>7:00 PM</td>\r\n                                        <td class=\"movie-title\">Paltan</td>\r\n                                    </tr>\r\n                                    <tr>\r\n                                        <td><strong>Saturday</strong></td>\r\n                                        <td>3:00 PM</td>\r\n                                        <td class=\"movie-title\">The Ghazi Attack</td>\r\n                                    </tr>\r\n                                    <tr>\r\n                                        <td><strong>Sunday</strong></td>\r\n                                        <td>6:00 PM</td>\r\n                                        <td class=\"movie-title\">Raazis</td>\r\n                                    </tr>\r\n                                </tbody>', '/public/images/movie/177124089217677846791760317859movie-poster.jpg', 1, '2025-10-12 19:42:47', '2026-02-17 23:34:23'),
(4, 'Thursday', '19:00', 'Border', '<tbody>\r\n                                    <tr>\r\n                                        <td><strong>Monday</strong></td>\r\n                                        <td>7:00 PM</td>\r\n                                        <td class=\"movie-title\">Borders</td>\r\n\r\n                                    </tr>\r\n                                    <tr>\r\n                                        <td><strong>Tuesday</strong></td>\r\n                                        <td>7:00 PM</td>\r\n                                        <td class=\"movie-title\">Uri: The Surgical Strike</td>\r\n                                    </tr>\r\n                                    <tr>\r\n                                        <td><strong>Wednesday</strong></td>\r\n                                        <td>7:00 PM</td>\r\n                                        <td class=\"movie-title\">Shershaah</td>\r\n                                    </tr>\r\n                                    <tr>\r\n                                        <td><strong>Thursday</strong></td>\r\n                                        <td>7:00 PM</td>\r\n                                        <td class=\"movie-title\">Lakshya</td>\r\n                                    </tr>\r\n                                    <tr>\r\n                                        <td><strong>Friday</strong></td>\r\n                                        <td>7:00 PM</td>\r\n                                        <td class=\"movie-title\">Paltan</td>\r\n                                    </tr>\r\n                                    <tr>\r\n                                        <td><strong>Saturday</strong></td>\r\n                                        <td>3:00 PM</td>\r\n                                        <td class=\"movie-title\">The Ghazi Attack</td>\r\n                                    </tr>\r\n                                    <tr>\r\n                                        <td><strong>Sunday</strong></td>\r\n                                        <td>6:00 PM</td>\r\n                                        <td class=\"movie-title\">Raazis</td>\r\n                                    </tr>\r\n                                </tbody>', '/public/images/movie/177124089217677846791760317859movie-poster.jpg', 1, '2025-10-12 19:42:47', '2026-02-16 23:42:04'),
(5, 'Wednesday', '19:00', 'Borderrrrrrrrrrrrrrr', '<tbody>\r\n                                    <tr>\r\n                                        <td><strong>Monday</strong></td>\r\n                                        <td>7:00 PM</td>\r\n                                        <td class=\"movie-title\">Borders</td>\r\n\r\n                                    </tr>\r\n                                    <tr>\r\n                                        <td><strong>Tuesday</strong></td>\r\n                                        <td>7:00 PM</td>\r\n                                        <td class=\"movie-title\">Uri: The Surgical Strike</td>\r\n                                    </tr>\r\n                                    <tr>\r\n                                        <td><strong>Wednesday</strong></td>\r\n                                        <td>7:00 PM</td>\r\n                                        <td class=\"movie-title\">Shershaah</td>\r\n                                    </tr>\r\n                                    <tr>\r\n                                        <td><strong>Thursday</strong></td>\r\n                                        <td>7:00 PM</td>\r\n                                        <td class=\"movie-title\">Lakshya</td>\r\n                                    </tr>\r\n                                    <tr>\r\n                                        <td><strong>Friday</strong></td>\r\n                                        <td>7:00 PM</td>\r\n                                        <td class=\"movie-title\">Paltan</td>\r\n                                    </tr>\r\n                                    <tr>\r\n                                        <td><strong>Saturday</strong></td>\r\n                                        <td>3:00 PM</td>\r\n                                        <td class=\"movie-title\">The Ghazi Attack</td>\r\n                                    </tr>\r\n                                    <tr>\r\n                                        <td><strong>Sunday</strong></td>\r\n                                        <td>6:00 PM</td>\r\n                                        <td class=\"movie-title\">Raazis</td>\r\n                                    </tr>\r\n                                </tbody>', '/public/images/movie/177124089217677846791760317859movie-poster.jpg', 1, '2025-10-12 19:42:47', '2026-02-17 23:35:04'),
(6, 'Tuesday', '19:00', 'testing', '<tbody>\r\n                                    <tr>\r\n                                        <td><strong>Monday</strong></td>\r\n                                        <td>7:00 PM</td>\r\n                                        <td class=\"movie-title\">Borders</td>\r\n\r\n                                    </tr>\r\n                                    <tr>\r\n                                        <td><strong>Tuesday</strong></td>\r\n                                        <td>7:00 PM</td>\r\n                                        <td class=\"movie-title\">Uri: The Surgical Strike</td>\r\n                                    </tr>\r\n                                    <tr>\r\n                                        <td><strong>Wednesday</strong></td>\r\n                                        <td>7:00 PM</td>\r\n                                        <td class=\"movie-title\">Shershaah</td>\r\n                                    </tr>\r\n                                    <tr>\r\n                                        <td><strong>Thursday</strong></td>\r\n                                        <td>7:00 PM</td>\r\n                                        <td class=\"movie-title\">Lakshya</td>\r\n                                    </tr>\r\n                                    <tr>\r\n                                        <td><strong>Friday</strong></td>\r\n                                        <td>7:00 PM</td>\r\n                                        <td class=\"movie-title\">Paltan</td>\r\n                                    </tr>\r\n                                    <tr>\r\n                                        <td><strong>Saturday</strong></td>\r\n                                        <td>3:00 PM</td>\r\n                                        <td class=\"movie-title\">The Ghazi Attack</td>\r\n                                    </tr>\r\n                                    <tr>\r\n                                        <td><strong>Sunday</strong></td>\r\n                                        <td>6:00 PM</td>\r\n                                        <td class=\"movie-title\">Raazis</td>\r\n                                    </tr>\r\n                                </tbody>', '/public/images/movie/177124089217677846791760317859movie-poster.jpg', 1, '2025-10-12 19:42:47', '2026-05-04 00:24:12'),
(7, 'Monday', '19:00', 'Borderrrrrrrrrrrrrrr', '<tbody>\r\n                                    <tr>\r\n                                        <td><strong>Monday</strong></td>\r\n                                        <td>7:00 PM</td>\r\n                                        <td class=\"movie-title\">Borders</td>\r\n\r\n                                    </tr>\r\n                                    <tr>\r\n                                        <td><strong>Tuesday</strong></td>\r\n                                        <td>7:00 PM</td>\r\n                                        <td class=\"movie-title\">Uri: The Surgical Strike</td>\r\n                                    </tr>\r\n                                    <tr>\r\n                                        <td><strong>Wednesday</strong></td>\r\n                                        <td>7:00 PM</td>\r\n                                        <td class=\"movie-title\">Shershaah</td>\r\n                                    </tr>\r\n                                    <tr>\r\n                                        <td><strong>Thursday</strong></td>\r\n                                        <td>7:00 PM</td>\r\n                                        <td class=\"movie-title\">Lakshya</td>\r\n                                    </tr>\r\n                                    <tr>\r\n                                        <td><strong>Friday</strong></td>\r\n                                        <td>7:00 PM</td>\r\n                                        <td class=\"movie-title\">Paltan</td>\r\n                                    </tr>\r\n                                    <tr>\r\n                                        <td><strong>Saturday</strong></td>\r\n                                        <td>3:00 PM</td>\r\n                                        <td class=\"movie-title\">The Ghazi Attack</td>\r\n                                    </tr>\r\n                                    <tr>\r\n                                        <td><strong>Sunday</strong></td>\r\n                                        <td>6:00 PM</td>\r\n                                        <td class=\"movie-title\">Raazis</td>\r\n                                    </tr>\r\n                                </tbody>', '/public/images/movie/177139110417677846791760317859movie-poster.jpg', 1, '2025-10-12 19:42:47', '2026-05-04 01:27:19');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int NOT NULL,
  `name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `image` varchar(255) DEFAULT NULL,
  `pdf` varchar(255) DEFAULT NULL,
  `pdf_content` longtext,
  `link` varchar(255) DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `name`, `image`, `pdf`, `pdf_content`, `link`, `status`, `created_at`, `updated_at`) VALUES
(5, 'The operation has reportedly exposed a wider supply network allegedly involved in manufacturing and distributing counterfeit The operation has reportedly exposed a wider supply network allegedly involved in manufacturing and distributing counterfeit', '/public/images/news/17865962191785911135images(1).jpeg', '/public/images/news/1767692243file-sample_150kB.pdf', NULL, NULL, 1, '2025-10-10 00:59:15', '2026-08-12 23:23:09'),
(7, 'The operation has reportedly exposed a wider supply network allegedly involved in manufacturing and distributing counterfeit The operation has reportedly exposed a wider supply network allegedly involved in manufacturing and distributing counterfeit', '/public/images/news/17865962041785926573Untitled.jpg', '/public/images/news/1784545123rambaboo_cv.pdf', 'RAM BABOO \nBackend Developer | Node.js & Laravel | 5+ Years of Experience \nEmail: rambaboo3464@gmail.com  \nPhone: +91-9795133464 \nLinkedIn: https://www.linkedin.com/in/ram-baboo-0869b1199 \nSummary \nResults-driven Backend Developer with over 5 years of experience in developing, and \ndeploying robust backend systems and REST APIs. Specializing in Node.js (3+ years ) \nand Laravel, with a proven track record of building scalable microservices architecture \nfor E-commerce, SaaS, and Healthcare applications. Expertise includes secure \npayment gateway integration, subscription lifecycle management, and database \noptimization. \nProfessional Experience \nWebmobril Technologies Pvt Ltd, Noida \nNode.js & Laravel Developer | Jan 2020 – Present \n●​Engineered and maintained high-performance REST APIs using Node.js \n(Express.js) and Laravel, serving over 10,000 concurrent users in a production \nenvironment. \n●​Designed and implemented a scalable microservices architecture for a \ncomprehensive HRMS platform and a multi-vendor e-commerce application, \nimproving system modularity and fault tolerance. \n●​Successfully integrated multiple international payment gateways, including \nStripe, PayPal, Sofort, and iPay88, processing thousands of transactions \nsecurely. \n●​Implemented robust authentication and authorization mechanisms using JWT \nand OAuth2, securing sensitive user data across all applications. \n●​Managed and optimized complex database schemas in MongoDB and MySQL, \nachieving a 30% improvement in query response times. \nQtriangle Infotech Pvt Ltd, Noida \nPHP (Laravel) Developer | Oct 2018 – Dec 2019 \n●​Developed and delivered backend modules for large-scale e-commerce \nplatforms using Laravel and CodeIgniter, contributing to the successful launch of \nover 20 live projects.\n\n●​Built critical features such as multi-step order management, inventory tracking, \nand custom reporting dashboards, which provided key business insights. \n●​Collaborated closely with frontend developers to ensure seamless API integration \nand a smooth, responsive user experience. \nTechnical Skills \n●​Backend: Node.js, Express.js, PHP, Laravel, REST API Design, Microservices \n●​Databases: MongoDB, MySQL, Database Design & Optimization \n●​Authentication: JWT, OAuth2, Passport.js \n●​Payments: Stripe, PayPal, Sofort, iPay88 \n●​DevOps & Cloud: AWS (EC2, S3), DigitalOcean, CI/CD, Git, Bitbucket, Docker \n(Basic) \n●​Frontend: React.js (Basic), jQuery, AJAX, HTML5, CSS3 \nKey Projects \nEmploy Mint HRMS  \nhttps://employmint.io \nBackend Developer (Node.js, MongoDB, Express.js) \n●​Architected and built the core backend for a multi-tenant SaaS HRMS platform, \nsupporting modules for payroll processing, employee records management, \nattendance tracking, and performance reporting. \n●​Implemented a secure REST API to handle all data operations, ensuring data \nprivacy and role-based access control for different user types (Admin, HR, \nEmployee). \n●​Designed the MongoDB schema to efficiently store and retrieve complex, nested \nemployee data, leading to fast and reliable reporting. \nCarroh App  \nhttps://carroh.com/panel \n Backend Developer (Node.js, MongoDB, Socket.IO) \n●​Developed the complete backend for a real-time, on-demand service \nmarketplace, focusing on order management, payment processing, and \nlocation-based services. \n●​Integrated Stripe and PayPal to handle complex payment flows, including \nmulti-party transactions and refunds. \n●​Implemented real-time notifications for order status updates and user \ncommunication using WebSockets (Socket.IO), enhancing user engagement.\n\nWeather Democracy \nhttps://weatherdemocracy.com \n Backend Developer (Laravel, MySQL) \n●​Designed and developed a robust set of REST APIs to serve weather data from \nmultiple sources to a public-facing web application. \n●​Built a comprehensive admin panel for data management, user administration, \nand API key generation, giving administrators full control over the platform. \n●​Optimized API endpoints to handle high-volume traffic, ensuring 99.9% uptime. \nEducation \nBachelor of Technology (B.Tech), Information Technology \nKamla Nehru Institute of Technology (K.N.I.T), Sultanpur — 7.0 CGPA (70%) \nLanguages \n●​English: Professional Working Proficiency \n●​Hindi: Native/Bilingual Proficiency', NULL, 1, '2025-10-10 00:57:54', '2026-08-12 23:22:52'),
(17, 'The operation has reportedly exposed a wider supply network allegedly involved in manufacturing and distributing counterfeit The operation has reportedly exposed a wider supply network allegedly involved in manufacturing and distributing counterfeit', '/public/images/news/17865961871785919793logo1.png', NULL, NULL, NULL, 1, '2026-08-05 08:48:30', '2026-08-13 23:10:53'),
(18, 'The operation has reportedly exposed a wider supply network allegedly involved in manufacturing and distributing counterfeit The operation has reportedly exposed a wider supply network allegedly involved in manufacturing and distributing counterfeit', '/public/images/news/178659617017859197311761641940hod.jpg', NULL, NULL, NULL, 1, '2026-08-05 08:48:51', '2026-08-14 01:14:59'),
(20, 'The operation has reportedly exposed a wider supply network allegedly involved in manufacturing and distributing counterfeit The operation has reportedly exposed a wider supply network allegedly involved in manufacturing and distributing counterfeit', '/public/images/news/1786596157178610250417857593631769687636c.png', NULL, NULL, NULL, 1, '2026-08-05 10:12:55', '2026-08-14 01:14:46');

-- --------------------------------------------------------

--
-- Table structure for table `newsss`
--

CREATE TABLE `newsss` (
  `id` int NOT NULL,
  `name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `image` varchar(255) DEFAULT NULL,
  `pdf` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `newsss`
--

INSERT INTO `newsss` (`id`, `name`, `image`, `pdf`, `link`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ornare tempus aliquet. Pellentesque finibus, est et iaculis suscipit, dolor nulla commodo dui, nec ultricies arcu nisl tristique eros. Morbi eros est, pulvinar eget ornare ac, ultrices eget risus. Ut lobortis pellentesque pretium. Praesent sollicitudin', '/public/images/news/1760077674paper-3.jpg', '/public/images/news/1767601681file-sample_150kB.pdf', NULL, 0, '2025-10-10 00:57:54', '2026-08-10 23:30:04'),
(3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ornare tempus aliquet. Pellentesque finibus, est et iaculis suscipit, dolor nulla commodo dui, nec ultricies arcu nisl tristique eros. Morbi eros est, pulvinar eget ornare ac, ultrices eget risus. Ut lobortis pellentesque pretium. Praesent sollicitudin', '/public/images/news/1760077694paper-4.jpg', '/public/images/news/1767601672file-sample_150kB.pdf', NULL, 1, '2025-10-10 00:58:14', '2026-08-10 23:29:57'),
(4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ornare tempus aliquet. Pellentesque finibus, est et iaculis suscipit, dolor nulla commodo dui, nec ultricies arcu nisl tristique eros. Morbi eros est, pulvinar eget ornare ac, ultrices eget risus. Ut lobortis pellentesque pretium. Praesent sollicitudin', '/public/images/news/1760077727paper-5.jpg', '/public/images/news/1767601664file-sample_150kB.pdf', NULL, 1, '2025-10-10 00:58:47', '2026-08-10 23:29:50'),
(5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ornare tempus aliquet. Pellentesque finibus, est et iaculis suscipit, dolor nulla commodo dui, nec ultricies arcu nisl tristique eros. Morbi eros est, pulvinar eget ornare ac, ultrices eget risus. Ut lobortis pellentesque pretium. Praesent sollicitudin', '/public/images/news/1760077755paper-6.jpg', '/public/images/news/1767692243file-sample_150kB.pdf', NULL, 1, '2025-10-10 00:59:15', '2026-08-10 23:29:43'),
(7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ornare tempus aliquet. Pellentesque finibus, est et iaculis suscipit, dolor nulla commodo dui, nec ultricies arcu nisl tristique eros. Morbi eros est, pulvinar eget ornare ac, ultrices eget risus. Ut lobortis pellentesque pretium. Praesent sollicitudin', '/public/images/news/1760077674paper-3.jpg', '/public/images/news/1767601636file-sample_150kB.pdf', NULL, 1, '2025-10-10 00:57:54', '2026-08-10 23:29:35'),
(9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ornare tempus aliquet. Pellentesque finibus, est et iaculis suscipit, dolor nulla commodo dui, nec ultricies arcu nisl tristique eros. Morbi eros est, pulvinar eget ornare ac, ultrices eget risus. Ut lobortis pellentesque pretium. Praesent sollicitudin', '/public/images/news/17679386561760355935banner.png', '/public/images/news/1767938656watermarked.pdf', NULL, 1, '2026-01-09 00:34:16', '2026-08-10 23:29:27'),
(11, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ornare tempus aliquet. Pellentesque finibus, est et iaculis suscipit, dolor nulla commodo dui, nec ultricies arcu nisl tristique eros. Morbi eros est, pulvinar eget ornare ac, ultrices eget risus. Ut lobortis pellentesque pretium. Praesent sollicitudin', '/public/images/news/1770719550vch.png', '/public/images/news/1770719550watermarked.pdf', NULL, 1, '2026-02-10 05:01:59', '2026-08-10 23:29:19');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id` int NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `link`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'army_defence', 'Army Defense College', '/public/images/place/1760084245aermt-defence-college.jpg', 1, '2025-10-09 13:25:36', '2025-10-30 01:16:46'),
(3, 'army_hospital', 'Army Hospital Medical', '/public/images/place/1760084287army-hospital.jpg', 1, '2025-10-10 02:48:07', '2025-10-30 01:16:39'),
(4, 'army_training', 'Training Headquarters', '/public/images/place/1760084345army-training.jpg', 1, '2025-10-10 02:49:05', '2025-10-30 01:16:31'),
(5, 'army_guide', 'Guide to Shimlas', '/public/images/place/1760084387guide-to-shimla.jpg', 1, '2025-10-10 02:49:47', '2026-05-04 01:34:36');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `category_id`, `name`, `created_at`, `updated_at`) VALUES
(1, NULL, 'TA REGULATION', '2026-04-24 04:29:54', '2026-08-04 07:09:26'),
(2, NULL, 'TA ACT & RULES', '2026-04-24 04:30:11', '2026-08-04 07:09:56'),
(3, NULL, 'TA POLICY', '2026-08-04 07:14:13', '2026-08-04 09:02:13'),
(4, 1, 'DFSDG', '2026-08-13 23:49:33', '2026-08-14 03:36:50');

-- --------------------------------------------------------

--
-- Table structure for table `resource_pdfs`
--

CREATE TABLE `resource_pdfs` (
  `id` bigint UNSIGNED NOT NULL,
  `resource_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resource_pdfs`
--

INSERT INTO `resource_pdfs` (`id`, `resource_id`, `name`, `link`, `created_at`, `updated_at`) VALUES
(1, 1, 'plan pdf', '/public/images/resource_pdf/17866842471760294852rambaboo_resume.pdf', '2026-04-24 04:30:47', '2026-08-13 23:40:47'),
(2, 2, 'Brief Pdf', '/public/images/resource_pdf/17866842391760294852rambaboo_resume.pdf', '2026-04-24 04:31:19', '2026-08-13 23:40:39'),
(3, 3, 'Ta Policy', '/public/images/resource_pdf/17866842321760294852rambaboo_resume.pdf', '2026-08-06 06:26:06', '2026-08-13 23:40:32'),
(4, 3, 'agbgdbbf', '/public/images/resource_pdf/17866852591760294852rambaboo_resume.pdf', '2026-08-13 23:54:16', '2026-08-13 23:57:39');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('6nicHA1KpBd8YdusRttr8pXmHdmtKrzZM9r3EDPL', 1, '192.168.10.135', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMXNleGE3dW9pa1RhZktzQnhIcjBxMVV4Z0Z0SjdyU1NQQWFlZU5yRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vMTkyLjE2OC4xMC4xNDkvYWRtaW4vdXNlcnMtbGlzdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1792389620),
('SQm7JoykUMjxEvBomtyLTI8Wdi6TJ4GiSGC4YkJL', NULL, '192.168.10.149', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMWpvNk1sZUMxMUo5RlA2S2JFOWF5NHpxSUV2M09udElaV1lxdVBjeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHBzOi8vMTkyLjE2OC4xMC4xNDkvb3JnIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1792389638);

-- --------------------------------------------------------

--
-- Table structure for table `sessionsss`
--

CREATE TABLE `sessionsss` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sessionsss`
--

INSERT INTO `sessionsss` (`id`, `name`, `image`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'EOFFICE', '/public/images/application/1760075738e-office.png', 'https://eoffice.army.mil', 1, '2025-10-10 00:21:22', '2026-01-08 04:49:32'),
(2, 'AWWA', '/public/images/application/1760075773AWWA.png', 'https://artracawwa.army.mil', 1, '2025-10-10 00:26:13', '2026-01-08 04:50:55'),
(4, 'VS CSH', '/public/images/application/1767871079vch1.jpg', 'https://artracvch.army.mil', 1, '2025-10-10 02:05:42', '2026-01-08 05:47:59'),
(5, 'File Tracking software', '/public/images/application/17702687511760075482benq.png', 'https://artracfth.army.mil', 1, '2025-10-10 02:06:27', '2026-02-04 23:49:11'),
(6, 'Anumaan', '/public/images/application/17702683551760089530aermt-defence-college.jpg', 'https://artracweather.army.mil', 1, '2025-10-10 02:07:13', '2026-02-04 23:42:35');

-- --------------------------------------------------------

--
-- Table structure for table `tel_dirs`
--

CREATE TABLE `tel_dirs` (
  `id` bigint UNSIGNED NOT NULL,
  `rank` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `appointment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `br` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dos` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tos` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nfs` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intercom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tel_dirs`
--

INSERT INTO `tel_dirs` (`id`, `rank`, `name`, `appointment`, `br`, `dos`, `tos`, `nfs`, `intercom`, `created_at`, `updated_at`) VALUES
(1, 'Lt Gen', 'Devendra Sharma, AVSM,SM', 'GOC-in-C', 'GOC-in-C Sectt', '', '', '', '', '2026-04-22 11:32:05', '2026-04-22 11:32:05'),
(2, 'Lt Col', 'A Vashistha', 'RSO', 'GOC-in-C Sectt', '18-Dec-01', '01-Jul-24', '2173', '7004', '2026-04-22 11:32:05', '2026-04-22 11:32:05'),
(3, 'Col', 'S Butalia', 'Addl Offr', 'GOC-in-C Sectt', '10-Dec-05', '01-Jul-24', '', '', '2026-04-22 11:32:05', '2026-04-22 11:32:05'),
(4, 'Col', 'Inderjot Singh Maan, SM', 'MA', 'GOC-in-C Sectt', '08-Jun-02', '04-Aug-25', '2102', '7002', '2026-04-22 11:32:05', '2026-04-22 11:32:05'),
(5, 'Capt', 'Manjeet Choudhary', 'ADC', 'GOC-in-C Sectt', '07-Sep-19', '23-Dec-24', '2178', '7006', '2026-04-22 11:32:05', '2026-04-22 11:32:05'),
(6, 'Lt Gen', 'Sukriti Singh Dhaiya, SM, VSM', 'COS', 'COS Sectt', '17-Dec-88', '10-Oct-25', '2001', '7020', '2026-04-22 11:32:05', '2026-04-22 11:32:05'),
(7, 'Lt Col', 'Mansih Nair', 'SO to COS', 'COS Sectt', '13-Dec-08', '30-Sep-25', '2174', '7022', '2026-04-22 11:32:05', '2026-04-22 11:32:05'),
(8, 'Lt Col', 'Mayank Bagchi', 'GSO-I Coord COS Sectt', 'COS Sectt', '10-Dec-05', '06-Mar-24', '2171', '7024', '2026-04-22 11:32:05', '2026-04-22 11:32:05'),
(9, 'Brig', 'Vishal Goindi', 'Dy MS', 'MS Br', '07-Dec-96', '30-Aug-25', '2610', '7906', '2026-04-22 11:32:05', '2026-04-22 11:32:05'),
(10, 'Lt Col', 'Harsa GR', 'AMS', 'MS Br', '13-Dec-08', '07-Jul-24', '2607', '7012', '2026-04-22 11:32:05', '2026-04-22 11:32:05'),
(11, 'Lt Col', 'Manish Chakraborty', 'GSO-I (FP)', 'FP Cell', '09-Jun-12', '07-Jan-25', '2190', '7032', '2026-04-22 11:32:05', '2026-04-22 11:32:05'),
(12, 'Col', 'Not Posted', 'Col (Budget)', 'FP Cell', '', '', '', '', '2026-04-22 11:32:05', '2026-04-22 11:32:05'),
(13, 'Col', 'Harvinder Singh', 'Col GS (FP)', 'FP Cell', '13-Dec-03', '29-Apr-24', '2103', '7030', '2026-04-22 11:32:05', '2026-04-22 11:32:05'),
(14, 'Col', 'S K Malhotra', 'Col GS (Exam)', 'Exam Cell', '10-Dec-04', '29-Apr-24', '2134', '7040', '2026-04-22 11:32:05', '2026-04-22 11:32:05'),
(15, 'Col', 'Alfred Anthony', 'GSO-I (Sys Stats)', 'Exam Cell', '11-Dec-93', '11-Jul-25', '2193', '7048', '2026-04-22 11:32:05', '2026-04-22 11:32:05'),
(16, 'Col', 'Abhinav Bharti', 'GSO-I (Online)', 'Exam Cell', '19-Dec-92', '03-Oct-24', '2191', '7046', '2026-04-22 11:32:05', '2026-04-22 11:32:05'),
(17, 'Lt Col', 'Vibhora Mishra', 'GSO-I (Exam-A)', 'Exam Cell', '10-Dec-10', '09-May-23', '2169', '7042', '2026-04-22 11:32:05', '2026-04-22 11:32:05'),
(18, 'Lt Col', 'Dilbag Singh', 'GSO-I (Exam-B)', 'Exam Cell', '12-Jun-10', '06-Jun-24', '2172', '7044', '2026-04-22 11:32:05', '2026-04-22 11:32:05'),
(19, 'Brig', 'Neeraj Sharma', 'BGS', 'GS Br', '13-Jun-92', '23-Dec-24', '2006', '7060', '2026-04-22 11:32:05', '2026-04-22 11:32:05'),
(20, 'Col', 'Navin Kumar', 'Col GS', 'GS Br', '08-Jun-02', '29-Apr-24', '2100', '7062', '2026-04-22 11:32:05', '2026-04-22 11:32:05'),
(21, 'Col', 'Parveen Joshi', 'Col GS (FP)', 'GS Br', '09-Dec-06', '30-Oct-24', '2104', '7530', '2026-04-22 11:32:05', '2026-04-22 11:32:05'),
(22, 'Col', 'Gurmeet Singh', 'Col GS (IT)', 'GS Br', '12-Jun-97', '01-Jul-23', '2101', '7080', '2026-04-22 11:32:05', '2026-04-22 11:32:05'),
(23, 'Col', 'Harpreet Singh', 'Col GS (LO ARTRAC)', 'GS Br', '13-Dec-03', '19-Sep-25', '33558', '', '2026-04-22 11:32:05', '2026-04-22 11:32:05'),
(24, 'Lt Col', 'Surinder Singh Negi', 'GSO-I', 'GS Br', '12-Jun-04', '26-Dec-24', '2171', '7066', '2026-04-22 11:32:05', '2026-04-22 11:32:05'),
(25, 'Lt Col', 'Anuj Chandra Shrivastva', 'GSO-I (Int)', 'GS Br', '10-Dec-05', '30-Jul-24', '2170', '7064', '2026-04-22 11:32:05', '2026-04-22 11:32:05'),
(26, 'Lt Col', 'Saurabh Yadav', 'GSO-I (P&D)', 'GS Br', '11-Jun-05', '30-Jul-24', '2177', '7590', '2026-04-22 11:32:05', '2026-04-22 11:32:05'),
(27, 'Lt Col', 'Ravneesh Bhatt', 'GSO-I (IT Proj)', 'GS Br', '06-May-04', '01-Jul-23', '2175', '7082', '2026-04-22 11:32:05', '2026-04-22 11:32:05'),
(28, 'Lt Col', 'Mahender Kumar', 'GSO-I (IT)', 'GS Br', '07-Jun-08', '21-Oct-25', '2176', '7084', '2026-04-22 11:32:05', '2026-04-22 11:32:05'),
(29, 'Lt Col', 'Vikas Kadsholi', 'OC Sig Coy', 'GS Br', '11-Dec-11', '09-Aug-24', '2029', '7090', '2026-04-22 11:32:05', '2026-04-22 11:32:05'),
(30, 'Lt Col', 'Not Posted', 'GSO-I (ARTRAC)', 'GS Br', '', '', '', '', '2026-04-22 11:32:05', '2026-04-22 11:32:05'),
(31, 'Brig', 'Indervir Rana', 'Brig A', 'Adm Br', '13-Jun-92', '05-May-25', '2008', '7330', '2026-04-22 11:32:05', '2026-04-22 11:32:05'),
(32, 'Col', 'Mayank Gautam', 'Col A', 'Adm Br', '17-Oct-02', '20-Apr-25', '2105', '7332', '2026-04-22 11:32:05', '2026-04-22 11:32:05'),
(33, 'Col', 'Sandeep Sharma', 'Est Offr', 'Adm Br', '26-Aug-95', '20-Jan-24', '2136', '7912', '2026-04-22 11:32:05', '2026-04-22 11:32:05'),
(34, 'Col', 'Arun Pushkarna', 'SO Welfare', 'Adm Br', '25-Aug-90', '22-Jul-24', '', '7841', '2026-04-22 11:32:05', '2026-04-22 11:32:05'),
(35, 'Col', 'Chetan Dhiman', 'Acct Offr', 'Adm Br', '08-Jun-91', '28-Mar-24', '', '7616', '2026-04-22 11:32:06', '2026-04-22 11:32:06'),
(36, 'Col', 'Abhinav Dhasmana', 'Col Q', 'Adm Br', '08-Jun-02', '28-Dec-24', '2106', '7340', '2026-04-22 11:32:06', '2026-04-22 11:32:06'),
(37, 'Lt Col', 'Ajay Singh', 'AAG', 'Adm Br', '02-Jun-05', '21-Mar-25', '2627', '7334', '2026-04-22 11:32:06', '2026-04-22 11:32:06'),
(38, 'Lt Col', 'Sabastian M', 'Camp OC', 'Adm Br', '13-Dec-08', '28-Mar-25', '2626', '7354', '2026-04-22 11:32:06', '2026-04-22 11:32:06'),
(39, 'Lt Col', 'Dharmendra Bhatt', 'AQMG', 'Adm Br', '19-Oct-05', '28-Jun-24', '2624', '7342', '2026-04-22 11:32:06', '2026-04-22 11:32:06'),
(40, 'Lt Col', 'Vineet Devdas', 'AQMG(Wks)', 'Adm Br', '10-Jun-06', '29-Dec-24', '2675', '7344', '2026-04-22 11:32:06', '2026-04-22 11:32:06'),
(41, 'Lt Col', 'Not Posted', 'SO (Wks)', 'Adm Br', '', '', '2135', '7346', '2026-04-22 11:32:06', '2026-04-22 11:32:06'),
(42, 'Maj', 'Faizal S', 'RMO', 'Adm Br', '10-Jun-10', '19-May-23', '2137', '7425', '2026-04-22 11:32:06', '2026-04-22 11:32:06'),
(43, 'Maj', 'Ajay Kumar', 'QM', 'Adm Br', '12-Dec-15', '31-Mar-23', '2628', '7356', '2026-04-22 11:32:06', '2026-04-22 11:32:06'),
(44, 'Maj', 'Harjot Singh Sodhi', 'SO legal', 'Adm Br', '09-Oct-19', '14-Dec-24', '2442', '7896', '2026-04-22 11:32:06', '2026-04-22 11:32:06'),
(45, 'Maj Gen', 'Karanbir Singh Grewal, SM, VSM', 'MGGS REDFOR', 'REDFOR Br', '19-Dec-92', '12-Oct-25', '2004', '7200', '2026-04-22 11:32:06', '2026-04-22 11:32:06'),
(46, 'Air Cmde', 'AS Abhankar, VM', 'Air Cmde (REDFOR)', 'REDFOR Br', '21-Jun-97', '01-Sep-25', '2015', '7250', '2026-04-22 11:32:06', '2026-04-22 11:32:06'),
(47, 'Brig', 'P S Kanwar', 'BGS (Pak)', 'REDFOR Br', '10-May-95', '22-Jul-25', '2021', '7210', '2026-04-22 11:32:06', '2026-04-22 11:32:06'),
(48, 'Brig', 'Revety Bhandari', 'BGS (China)', 'REDFOR Br', '07-Jun-97', '16-Jan-25', '2022', '7230', '2026-04-22 11:32:06', '2026-04-22 11:32:06'),
(49, 'Cmde', 'Manish Rao', 'Cmde (REDFOR) I', 'REDFOR Br', '01-Jan-94', '29-May-24', '2014', '7254', '2026-04-22 11:32:06', '2026-04-22 11:32:06'),
(50, 'Cmde', 'Inderjeet Talukdar', 'Cmde (REDFOR) II', 'REDFOR Br', '01-Jul-99', '13-Jul-25', '2139', '7256', '2026-04-22 11:32:06', '2026-04-22 11:32:06'),
(51, 'Col', 'S D S Dadhawal', 'Col GS (Pak-I)', 'REDFOR Br', '04-Dec-04', '03-May-25', '2127', '7212', '2026-04-22 11:32:06', '2026-04-22 11:32:06'),
(52, 'Col', 'Harsh Srivastva', 'Col GS (Pak-2)', 'REDFOR Br', '10-Dec-04', '13-May-24', '2128', '7214', '2026-04-22 11:32:06', '2026-04-22 11:32:06'),
(53, 'Col', 'Munish Thakur, SM', 'Col GS (Sub Conv)', 'REDFOR Br', '19-Apr-03', '05-Jul-23', '2133', '7266', '2026-04-22 11:32:06', '2026-04-22 11:32:06'),
(54, 'Col', 'Kushagra Singh', 'Col GS-1 (China)', 'REDFOR Br', '10-Dec-05', '19-May-25', '2129', '7232', '2026-04-22 11:32:06', '2026-04-22 11:32:06'),
(55, 'Col', 'Abhishek Agnihotri', 'Col GS-2 (China)', 'REDFOR Br', '09-Jun-07', '22-Sep-25', '2130', '7234', '2026-04-22 11:32:06', '2026-04-22 11:32:06'),
(56, 'Col', 'Satinder Khola', 'Col GS (STRAT)', 'REDFOR Br', '11-Dec-04', '21-Apr-25', '2131', '7262', '2026-04-22 11:32:06', '2026-04-22 11:32:06'),
(57, 'Col', 'Arun Kuimar Sharma', 'OIC AHM', 'REDFOR Br', '13-Jun-92', '02-Oct-24', '', '7880', '2026-04-22 11:32:06', '2026-04-22 11:32:06'),
(58, 'Gp Capt', 'Abrar Moulavi', 'Gp Capt (REDFOR)', 'REDFOR Br', '18-Dec-04', '09-Jan-25', '2138', '7252', '2026-04-22 11:32:06', '2026-04-22 11:32:06'),
(59, 'Lt Col', 'Abhay Acharya', 'GSO-I (Coord)', 'REDFOR Br', '09-Dec-00', '03-Jan-23', '2162', '7202', '2026-04-22 11:32:06', '2026-04-22 11:32:06'),
(60, 'Lt Col', 'Sanjeev R, SM', 'GSO-I (Pak-2)', 'REDFOR Br', '09-Jun-12', '26-Jun-25', '2164', '7218', '2026-04-22 11:32:06', '2026-04-22 11:32:06'),
(61, 'Lt Col', 'Siddharth V', 'GSO-I (Pak-1)', 'REDFOR Br', '19-Apr-10', '10-Apr-24', '2163', '7216', '2026-04-22 11:32:06', '2026-04-22 11:32:06'),
(62, 'Lt Col', 'Pradeep Jangra', 'GSO-I (China-A)', 'REDFOR Br', '11-Jun-11', '06-Jun-25', '2166', '7238', '2026-04-22 11:32:06', '2026-04-22 11:32:06'),
(63, 'Lt Col', 'Manoj Dhundiyal', 'GSO-I (China-B)', 'REDFOR Br', '09-Jun-12', '18-Aug-25', '2167', '7240', '2026-04-22 11:32:06', '2026-04-22 11:32:06'),
(64, 'Maj', 'Manish Yadav', 'GSO-I (Pak)', 'REDFOR Br', '14-Dec-13', '21-May-25', '2696', '7220', '2026-04-22 11:32:06', '2026-04-22 11:32:06'),
(65, 'Maj', 'Ankush Pandey', 'GSO-1 (China)', 'REDFOR Br', '08-Dec-12', '13-May-25', '2165', '7236', '2026-04-22 11:32:06', '2026-04-22 11:32:06'),
(66, 'Maj Gen', 'M K Mathur', 'MGGS Doc', 'DOC Br', '14-Dec-91', '26-Jul-24', '2005', '7270', '2026-04-22 11:32:06', '2026-04-22 11:32:06'),
(67, 'Air Cmde', 'RK Mansharamni', 'BGS (OL, CALL& HRD)', 'DOC Br', '19-Dec-92', '01-Aug-25', '2013', '7320', '2026-04-22 11:32:06', '2026-04-22 11:32:06'),
(68, 'Brig', 'Narinder Singh, SM', 'BGS (CP)', 'DOC Br', '10-Dec-94', '20-May-24', '2010', '7280', '2026-04-22 11:32:06', '2026-04-22 11:32:06'),
(69, 'Brig', 'S S Deshpande, SM', 'BGC (CS)', 'DOC Br', '08-Jun-91', '12-Jan-24', '2011', '7290', '2026-04-22 11:32:06', '2026-04-22 11:32:06'),
(70, 'Brig', 'Sanjay Kanoth, VSM', 'BGS (Tech & Futuristics)', 'DOC Br', '06-Dec-97', '02-Jun-25', '2012', '7300', '2026-04-22 11:32:06', '2026-04-22 11:32:06'),
(71, 'Brig', 'Lokinder Chandel, VSM', 'OIC Red Teaming', 'DOC Br', '16-Dec-89', '12-Jul-24', '', '7369', '2026-04-22 11:32:06', '2026-04-22 11:32:06'),
(72, 'Brig', 'Jitender Singh Bisht, SM', 'Addl Offr (Dy PMC)', 'DOC Br', '16-Dec-89', '13-Jun-25', '', '7369', '2026-04-22 11:32:06', '2026-04-22 11:32:06'),
(73, 'Col', 'Suman Kumar Badu', 'Col GS Mech', 'DOC Br', '07-Jun-97', '876980', '2108', '7284', '2026-04-22 11:32:06', '2026-08-13 23:35:33'),
(74, 'Col', 'Deepak Kumar', 'Col GS (Inf)', 'DOC Br', '11-Jun-05', '15-May-25', '2107', '7282', '2026-04-22 11:32:06', '2026-04-22 11:32:06'),
(75, 'Col', 'Gaurav Singh', 'Col GS (Sigs)', 'DOC Br', '08-Jun-22', '13-May-25', '2111', '7296', '2026-04-22 11:32:06', '2026-04-22 11:32:06'),
(76, 'Col', 'Ankush Gupta', 'Col GS (Arty)', 'DOC Br', '12-Jun-04', '24-Apr-25', '2109', '7292', '2026-04-22 11:32:06', '2026-04-22 11:32:06'),
(77, 'Col', 'Abhimanyu Cheba', 'Col GS (Engrs), Golf Secy', 'DOC Br', '12-Jun-04', '03-May-24', '2112', '7298', '2026-04-22 11:32:07', '2026-04-22 11:32:07'),
(78, 'Col', 'Dhiraj Kumar', 'Col GS (AAD)', 'DOC Br', '08-Jun-02', '29-Apr-24', '2110', '7294', '2026-04-22 11:32:07', '2026-04-22 11:32:07'),
(79, 'Col', 'Ganesh M Zape', 'Col GS (T&F)', 'DOC Br', '14-Jun-98', '19-Jul-25', '2115', '7310', '2026-04-22 11:32:07', '2026-04-22 11:32:07'),
(80, 'Col', 'Anurag Sharma', 'Col GS (WG & SML)', 'DOC Br', '07-Dec-96', '13-Aug-25', '2114', '7306', '2026-04-22 11:32:07', '2026-04-22 11:32:07'),
(81, 'Col', 'JS Midha, VSM', 'Col GS (Call)', 'DOC Br', '12-Jun-04', '26-Jun-23', '2116', '7322', '2026-04-22 11:32:07', '2026-04-22 11:32:07'),
(82, 'Col', 'Amrit Shankar', 'COL GS (OL)', 'DOC Br', '10-Dec-05', '09-Jul-24', '', '7326', '2026-04-22 11:32:07', '2026-04-22 11:32:07'),
(83, 'Col', 'Amit Aukta, SM', 'Col GS (HRD)', 'DOC Br', '19-Mar-05', '02-May-25', '2113', '7302', '2026-04-22 11:32:07', '2026-04-22 11:32:07'),
(84, 'Col', 'Muktesh Kapil', '2IC Red Teaming', 'DOC Br', '11-Jun-94', '01-Mar-25', '', '7367', '2026-04-22 11:32:07', '2026-04-22 11:32:07'),
(85, 'Lt Col', 'Vikram Singh', 'GSO-I (Coord)', 'DOC Br', '11-Jun-05', '21-Aug-24', '2140', '7272', '2026-04-22 11:32:07', '2026-04-22 11:32:07'),
(86, 'Lt Col', 'Rohit Malhotra', 'GSO-I (Armr)', 'DOC Br', '11-Jun-11', '23-Jan-25', '2142', '7288', '2026-04-22 11:32:07', '2026-04-22 11:32:07'),
(87, 'Lt Col', 'Vishwajeet Kumar', 'GSO-I (Mech)', 'DOC Br', '11-Dec-10', '13-May-24', '2141', '7286', '2026-04-22 11:32:07', '2026-04-22 11:32:07'),
(88, 'Lt Col', 'Deepankan Sharma', 'GSO-I (T&F)', 'DOC Br', '12-Jun-10', '29-Oct-24', '1245', '7312', '2026-04-22 11:32:07', '2026-04-22 11:32:07'),
(89, 'Lt Col', 'Amar Vijay', 'GSO_I (WG Proj)', 'DOC Br', '11-Jun-11', '28-Jun-25', '2144', '7308', '2026-04-22 11:32:07', '2026-04-22 11:32:07'),
(90, 'Lt Col', 'S M Tripathi', 'GSO-I (CALL)', 'DOC Br', '12-Dec-09', '23-Sep-24', '2146', '7324', '2026-04-22 11:32:07', '2026-04-22 11:32:07'),
(91, 'Lt Col', 'Bharat Chandani', 'GSO-I (HRD)', 'DOC Br', '11-Dec-11', '03-May-25', '2143', '7304', '2026-04-22 11:32:07', '2026-04-22 11:32:07'),
(92, 'Maj Gen', 'Vivek Venkataraman, VSM', 'MGGS Trg A', 'TRG A', '11-Jun-88', '04-Dec-24', '2002', '7100', '2026-04-22 11:32:07', '2026-04-22 11:32:07'),
(93, 'Brig', 'Brijpal Singh Jasrotia', 'BGS (JT & P)', 'TRG A', '09-Dec-95', '27-Dec-24', '2018', '7140', '2026-04-22 11:32:07', '2026-04-22 11:32:07'),
(94, 'Brig', 'Ranvijay Singh', 'BGS (AT)', 'TRG A', '11-Dec-93', '01-Sep-23', '2017', '7130', '2026-04-22 11:32:07', '2026-04-22 11:32:07'),
(95, 'Brig', 'Vinayak Mishra', 'BGS (AAT)', 'TRG A', '11-Jun-94', '13-May-25', '2016', '7120', '2026-04-22 11:32:07', '2026-04-22 11:32:07'),
(96, 'Col', 'Amit Atul', 'Col GS (JT & FT)', 'TRG A', '13-Dec-03', '03-May-25', '2120', '7142', '2026-04-22 11:32:07', '2026-04-22 11:32:07'),
(97, 'Col', 'Anadi Singh, SM', 'Col GS (policy)', 'TRG A', '10-Dec-24', '13-May-24', '2121', '7146', '2026-04-22 11:32:07', '2026-04-22 11:32:07'),
(98, 'Col', 'Dheeraj Dutta', 'Col GS (AT-A)', 'TRG A', '10-Dec-04', '17-Sep-24', '2118', '7132', '2026-04-22 11:32:07', '2026-04-22 11:32:07'),
(99, 'Col', 'Devender Vashist', 'Col GS (AT-B)', 'TRG A', '10-Dec-05', '10-May-24', '2119', '7134', '2026-04-22 11:32:07', '2026-04-22 11:32:07'),
(100, 'Col', 'Simaran Pal Singh', 'Col GS (AAT)', 'TRG A', '12-Jun-04', '02-Jun-25', '2117', '7122', '2026-04-22 11:32:07', '2026-04-22 11:32:07'),
(101, 'Lt Col', 'Jiwanpreet Singh', 'GSO-I (Coord)', 'TRG A', '12-Jun-04', '15-Jul-23', '2147', '7102', '2026-04-22 11:32:07', '2026-04-22 11:32:07'),
(102, 'Lt Col', 'Swikar Bhardwaj', 'GSO-I (JT & FT)', 'TRG A', '20-Apr-11', '15-May-25', '2153', '7144', '2026-04-22 11:32:07', '2026-04-22 11:32:07'),
(103, 'Lt Col', 'DS Raghuvanshi', 'GSO-I (Policy)', 'TRG A', '10-Dec-11', '12-Apr-25', '2154', '7148', '2026-04-22 11:32:07', '2026-04-22 11:32:07'),
(104, 'Lt Col', 'Guramar Singh', 'GSO-I (AT-A)', 'TRG A', '18-Mar-05', '30-Mar-25', '2151', '7136', '2026-04-22 11:32:07', '2026-04-22 11:32:07'),
(105, 'Lt Col', 'Avneet Singh', 'GSO-I (AT-B)', 'TRG A', '01-May-03', '17-Aug-23', '2152', '7138', '2026-04-22 11:32:07', '2026-04-22 11:32:07'),
(106, 'Lt Col', 'Ashutosh Vyas', 'GSO-I (AT-B (D)', 'TRG A', '08-Jun-22', '14-Jan-24', '2152', '7138', '2026-04-22 11:32:07', '2026-04-22 11:32:07'),
(107, 'Lt Col', 'Vivek Kr Dubey', 'GSO-I (AAT-A)', 'TRG A', '11-Dec-10', '22-Apr-24', '2148', '7124', '2026-04-22 11:32:08', '2026-04-22 11:32:08'),
(108, 'Lt Col', 'Lt Col Deepak Hooda', 'GSO-I (AAT-B)', 'TRG A', '11-Dec-10', '05-Jun-24', '2149', '7126', '2026-04-22 11:32:08', '2026-04-22 11:32:08'),
(109, 'Lt Col', 'Prasoon Garbyal', 'GSO-I(AAT-C)', 'TRG A', '10-Dec-24', '27-Feb-24', '2150', '7128', '2026-04-22 11:32:08', '2026-04-22 11:32:08'),
(110, 'Maj Gen', 'Ajay Feroze Shah', 'MGGS Trg -B', 'TRG B', '08-Jun-91', '20-Feb-24', '2003', '7150', '2026-04-22 11:32:08', '2026-04-22 11:32:08'),
(111, 'Brig', 'Jogendra Singh', 'BGS (TT & PCT)', 'TRG B', '11-Jun-94', '07-Jul-25', '2009', '7160', '2026-04-22 11:32:08', '2026-04-22 11:32:08'),
(112, 'Brig', 'DKS SHARAWAT VrC, VSM', 'BGS (PME, ST & Cat B)', 'TRG B', '06-Dec-97', '03-Sep-25', '2019', '7152', '2026-04-22 11:32:08', '2026-04-22 11:32:08'),
(113, 'Col', 'Vivek Sirohi', 'Col GS (PCT)', 'TRG B', '12-Jun-04', '27-May-25', '2123', '7180', '2026-04-22 11:32:08', '2026-04-22 11:32:08'),
(114, 'Col', 'SB Rana', 'Addl Offr (PCT', 'TRG B', '06-Jul-08', '01-May-25', '', '7184', '2026-04-22 11:32:08', '2026-04-22 11:32:08'),
(115, 'Col', 'Samar Sirohi', 'Col GS (TT-1)', 'TRG B', '14-Jun-03', '03-May-25', '2124', '7162', '2026-04-22 11:32:08', '2026-04-22 11:32:08'),
(116, 'Col', 'Pradeep Vij', 'COL GS (TT-2)', 'TRG B', '11-Jun-00', '08-Jun-24', '2125', '7164', '2026-04-22 11:32:08', '2026-04-22 11:32:08'),
(117, 'Col', 'NSN Singh', 'Col GS (PME)', 'TRG B', '10-Dec-25', '05-May-24', '2122', '7190', '2026-04-22 11:32:08', '2026-04-22 11:32:08'),
(118, 'Col', 'Nishith Sharma', 'Col GS (ST)', 'TRG B', '08-Jun-02', '03-May-25', '2126', '7170', '2026-04-22 11:32:08', '2026-04-22 11:32:08'),
(119, 'Col', 'Pushpandra K Dhaka', 'Addl Offr(Cat-B)', 'TRG B', '24-Apr-90', '13-Jan-25', '', '7158', '2026-04-22 11:32:08', '2026-04-22 11:32:08'),
(120, 'Col', 'Deepak Prashar', 'ADC Secy', 'TRG B', '11-Jun-94', '02-Aug-24', '', '7185', '2026-04-22 11:32:08', '2026-04-22 11:32:08'),
(121, 'Lt Col', 'Madhur Verma', 'GSO-I Trg-B (Coord)', 'TRG B', '11-Jun-05', '12-Jun-24', '2155', '7154', '2026-04-22 11:32:08', '2026-04-22 11:32:08'),
(122, 'Lt Col', 'Kulkarni Pralhad', 'GSO-I (PCT)', 'TRG B', '10-Dec-11', '06-May-25', '2158', '7182', '2026-04-22 11:32:08', '2026-04-22 11:32:08'),
(123, 'Lt Col', 'Siddarth Nair', 'GSO-I (TT-1)', 'TRG B', '13-Dec-06', '15-Nov-23', '2159', '7166', '2026-04-22 11:32:08', '2026-04-22 11:32:08'),
(124, 'Lt Col', 'S K Singh', 'GSO-I (TT-2)', 'TRG B', '14-Jun-03', '19-Dec-24', '2160', '7168', '2026-04-22 11:32:08', '2026-04-22 11:32:08'),
(125, 'Lt Col', 'Praveen Kumar', 'GSO-I (PME)', 'TRG B', '09-Jun-07', '19-Nov-24', '2156', '7192', '2026-04-22 11:32:08', '2026-04-22 11:32:08'),
(126, 'Lt Col', 'Vikas Gupta', 'GSO-I (ST)', 'TRG B', '16-Mar-12', '12-Jan-24', '2161', '7172', '2026-04-22 11:32:08', '2026-04-22 11:32:08'),
(127, 'Lt Col', 'Lalit Singh Soun', 'GSO-I (Cat-B)', 'TRG B', '11-Jun-11', '28-Feb-24', '2157', '7156', '2026-04-22 11:32:08', '2026-04-22 11:32:08'),
(128, 'Maj Gen', 'Gaurav Kaushal, SM., VSM', 'MGGS Apvl& Plans', 'APVL & PLANS', '14-Dec-91', '18-Jul-25', '', '33535', '2026-04-22 11:32:08', '2026-04-22 11:32:08'),
(129, 'Col', 'A P Singh', 'COL GS (Plg)', 'APVL & PLANS', '10-Jun-00', '09-Aug-22', '', '33500', '2026-04-22 11:32:08', '2026-04-22 11:32:08'),
(130, 'Col', 'Sharad Bohra', 'COL GS (Apvl-1)', 'APVL & PLANS', '10-Dec-02', '06-Jul-25', '', '33507', '2026-04-22 11:32:08', '2026-04-22 11:32:08'),
(131, 'Col', 'AS Jasrotia, SM', 'COL GS (Apvl-2)', 'APVL & PLANS', '02-Mar-02', '08-Nov-24', '', '33521', '2026-04-22 11:32:08', '2026-04-22 11:32:08'),
(132, 'Col', 'Kamal Bachani', 'COL GS', 'APVL  PLANS', '09-Dec-02', '53455', NULL, '33510', '2026-04-22 11:32:08', '2026-08-14 03:14:50'),
(133, 'Lt Col', 'Yogendra K Verma', 'GSO I', 'APVL  PLANS', '19-Mar-11', '34534', '34534', '33501', '2026-04-22 11:32:08', '2026-08-11 03:40:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `reporting` int DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int NOT NULL DEFAULT '2',
  `verified` tinyint NOT NULL DEFAULT '1',
  `is_admin` int NOT NULL DEFAULT '0',
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `status` int NOT NULL DEFAULT '1',
  `profile_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `reporting`, `name`, `first_name`, `last_name`, `designation`, `email`, `type`, `verified`, `is_admin`, `role`, `status`, `profile_image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Admin', NULL, NULL, NULL, 'admin', 1, 1, 1, 'admin', 1, '/public/profile_pictures/admin-1/Driver image.jpg', NULL, '$2a$12$AXGM3GLFTusJfkZTwGgh5uA4zXfmiEiV7JOHaYmrCUkfCpnZzgJ8.', 'Kg31U1WU0U7ycrIQEohrzwyBoGCiaTukR2kGKAl8G2CJUynvgJLxW0N78gMk', NULL, '2024-07-29 12:22:38'),
(7, NULL, 'DG TA', NULL, NULL, 'Comdt', NULL, 2, 1, 0, 'user', 1, '/public/profile_pictures/7/1769601553c(1).png', NULL, '$2y$10$xr0SAu7aUEpD1.AEl6dzdu7M3eEI7dKh5UV4mtu7hkz2EupsgI..y', NULL, '2026-01-16 04:16:04', '2026-10-15 04:33:32'),
(10, 52, 'Maj Sandeep', NULL, NULL, 'GSO 1', NULL, 2, 1, 0, 'user', 1, '/public/profile_pictures/10/1769601573e.jpg', NULL, '$2y$10$CGGyRE5kEEIiyhkXQ7naW.T8opTzJiP4cA32NoNYaRiQhCisd9Fiq', NULL, '2026-01-16 04:47:59', '2026-01-28 06:29:33'),
(12, 52, 'Capt AP Singh', NULL, NULL, 'GSO2', NULL, 2, 1, 0, 'user', 1, '/public/profile_pictures/12/176960162217682879751761641940hod.jpg', NULL, '$2y$10$I9CFZUkiCofaytQcdM3MR.sctY1m0i7/U66PR0ovK9edhdI2N.qYi', NULL, '2026-01-19 03:03:34', '2026-09-14 05:39:55'),
(14, 19, 'Test1', NULL, NULL, 'asdasd', NULL, 2, 1, 0, 'user', 1, '/public/profile_pictures/14/176960163917682879751761641940hod.jpg', NULL, '$2y$10$gRwOj4l1sshMXyGttDq02OR2XwYEzhzyo0eGU3tgRvBSUTTlZINIu', NULL, '2026-01-23 04:28:14', '2026-10-19 00:29:46'),
(15, 54, 'wdsfsd', NULL, NULL, 'sdfsd', NULL, 2, 1, 0, 'user', 1, '/public/profile_pictures/15/176960164817682879751761641940hod.jpg', NULL, '$2y$10$iIQURjwPCZhe5i3Di7MziO1P./RPhB23C4HJ7r7I0CRgH8PeDcUOK', NULL, '2026-01-23 04:28:28', '2026-10-19 00:29:52'),
(17, 10, 'Lt. Gen Pankaj', NULL, NULL, 'SO', NULL, 2, 1, 0, 'user', 1, '/public/profile_pictures/1/17696017101760442593hod-profile.png', NULL, '$2y$10$UVQCMJk4WIZtd/zcnCHOT..MZy8jSaQn8mxn.jQStivtan4E/O6hC', NULL, '2026-01-28 06:31:50', '2026-04-28 07:25:15'),
(18, 11, 'Ravish', NULL, NULL, 'GSO 1', NULL, 2, 1, 0, 'user', 1, '/public/profile_pictures/7/17696017321760078665hod.jpg', NULL, '$2y$10$9TfrIXIOu7W4E2rYcF/dbe4HTfbTqShC1hXPEKoGnee4fZsk1kVji', NULL, '2026-01-28 06:32:12', '2026-01-28 06:32:12'),
(19, 52, 'Lt Col Kashish', NULL, NULL, 'GSO2', NULL, 2, 1, 0, 'user', 1, '/public/profile_pictures/6/17696017561760078665hod.jpg', NULL, '$2y$10$TbaUoHGbzGK04XWT.13aZutH1E5jso8ykidN3LHtOsPYusG2sK3Me', NULL, '2026-01-28 06:32:36', '2026-10-19 00:30:13'),
(49, NULL, NULL, 'Ram', 'Baboo', NULL, 'ram@yopmail.com', 5, 1, 0, 'user', 1, NULL, NULL, '$2y$10$mHbhrYM9qvl7mMot5/pD2uEgV/xH.EiO9tYIErFDa.DwWmweRHZfm', NULL, '2026-08-17 09:48:56', '2026-08-17 09:48:56'),
(52, 7, 'ADG TA', NULL, NULL, 'Lt. Gen', NULL, 2, 1, 0, 'user', 1, '/public/profile_pictures/8/1769601562c.png', NULL, '$2y$10$HNlyNs3mn4OTmZg3aAD1N.ptDGQrqTZjtUUAoXkuaCvd.VkxMbc5a', NULL, '2026-09-15 04:02:36', '2026-10-15 04:34:06'),
(54, 52, 'test2', NULL, NULL, 'GSO1', NULL, 2, 1, 0, 'user', 1, '/public/profile_pictures/13/17696016301761641940hod.jpg', NULL, '$2y$10$G0VQpse.fQDqKM5jPZXEcetLTMwvUyJlA9fTFh71T9lYa9YWG5tx6', NULL, '2026-01-19 03:04:18', '2026-10-19 00:30:20'),
(55, 55, 'Test3', NULL, NULL, 'asdasd', NULL, 2, 1, 0, 'user', 1, '/public/profile_pictures/14/176960163917682879751761641940hod.jpg', NULL, '$2y$10$gRwOj4l1sshMXyGttDq02OR2XwYEzhzyo0eGU3tgRvBSUTTlZINIu', NULL, '2026-01-23 04:28:14', '2026-10-19 00:29:38'),
(63, 55, 'ff', NULL, NULL, 'fffff', NULL, 2, 1, 0, 'user', 1, '/public/profile_pictures/63/1791832204logo1.png', NULL, '$2y$10$03O11gg4FjzGzm2l05oU6Ox6lavLTnzcwY2BE4L3bxV0955ABNQm6', NULL, '2026-10-12 13:39:16', '2026-10-13 06:20:27');

-- --------------------------------------------------------

--
-- Table structure for table `usersss`
--

CREATE TABLE `usersss` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int NOT NULL DEFAULT '2',
  `verified` tinyint NOT NULL DEFAULT '1',
  `is_admin` int NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '1',
  `profile_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `security_question` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `security_answer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usersss`
--

INSERT INTO `usersss` (`id`, `name`, `email`, `type`, `verified`, `is_admin`, `status`, `profile_image`, `email_verified_at`, `password`, `security_question`, `security_answer`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 1, 1, 1, 1, '/public/profile_pictures/admin-1/Driver image.jpg', NULL, '$2y$10$4DwZD1M86t3JyRfU9ADOoe/Y64mPOWY1K3ClTyjp3pfXcSA3Wup7m', 'What is your birth city?', 'delhi', 'QqXrU49KkY77wXcVjI96edVX4mmMUndh8LSvbcmcMdJnwNYiIrT0mXVw3csf', NULL, '2026-08-14 04:44:02');

-- --------------------------------------------------------

--
-- Table structure for table `whats_news`
--

CREATE TABLE `whats_news` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `whats_news`
--

INSERT INTO `whats_news` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(4, 'System Enhancement News', '/public/images/new/1760294852rambaboo_resume.pdf', 1, '2025-10-12 13:04:26', '2025-10-12 19:48:07'),
(5, 'Training Programs Available', '/public/images/new/1760294852rambaboo_resume.pdf', 1, '2025-10-12 13:04:26', '2025-10-12 19:47:46'),
(6, 'Latest Updates & Announcements', '/public/images/new/1760294852rambaboo_resume.pdf', 1, '2025-10-12 13:04:26', '2025-10-12 19:47:27'),
(7, 'What\'s New content', '/public/images/new/1760294852rambaboo_resume.pdf', 1, '2025-10-12 13:04:26', '2025-10-12 19:47:08'),
(8, 'Shaurya Sankalan', '/public/images/new/1760294852rambaboo_resume.pdf', 1, '2025-10-12 13:04:26', '2025-10-12 19:46:48'),
(9, 'Wedded to Olive Greens', '/public/images/new/1760294852rambaboo_resume.pdf', 1, '2025-10-12 13:04:26', '2026-02-05 04:00:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `awards`
--
ALTER TABLE `awards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `branches_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gates`
--
ALTER TABLE `gates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gates_category_id_foreign` (`category_id`);

--
-- Indexes for table `gate_pdfs`
--
ALTER TABLE `gate_pdfs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gate_pdfs_gate_id_foreign` (`gate_id`);

--
-- Indexes for table `hit_counts`
--
ALTER TABLE `hit_counts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hods`
--
ALTER TABLE `hods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `knowledges`
--
ALTER TABLE `knowledges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `knowledge_categories`
--
ALTER TABLE `knowledge_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `knowledge_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moviews`
--
ALTER TABLE `moviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsss`
--
ALTER TABLE `newsss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resources_category_id_foreign` (`category_id`);

--
-- Indexes for table `resource_pdfs`
--
ALTER TABLE `resource_pdfs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resource_pdfs_resource_id_foreign` (`resource_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sessionsss`
--
ALTER TABLE `sessionsss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tel_dirs`
--
ALTER TABLE `tel_dirs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usersss`
--
ALTER TABLE `usersss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `whats_news`
--
ALTER TABLE `whats_news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `awards`
--
ALTER TABLE `awards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `gates`
--
ALTER TABLE `gates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `gate_pdfs`
--
ALTER TABLE `gate_pdfs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hit_counts`
--
ALTER TABLE `hit_counts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `hods`
--
ALTER TABLE `hods`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `knowledges`
--
ALTER TABLE `knowledges`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `knowledge_categories`
--
ALTER TABLE `knowledge_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `moviews`
--
ALTER TABLE `moviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `newsss`
--
ALTER TABLE `newsss`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `resource_pdfs`
--
ALTER TABLE `resource_pdfs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sessionsss`
--
ALTER TABLE `sessionsss`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tel_dirs`
--
ALTER TABLE `tel_dirs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `usersss`
--
ALTER TABLE `usersss`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `whats_news`
--
ALTER TABLE `whats_news`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gates`
--
ALTER TABLE `gates`
  ADD CONSTRAINT `gates_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `gates` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `gate_pdfs`
--
ALTER TABLE `gate_pdfs`
  ADD CONSTRAINT `gate_pdfs_gate_id_foreign` FOREIGN KEY (`gate_id`) REFERENCES `gates` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `knowledge_categories`
--
ALTER TABLE `knowledge_categories`
  ADD CONSTRAINT `knowledge_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `knowledge_categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `resources`
--
ALTER TABLE `resources`
  ADD CONSTRAINT `resources_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `resources` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `resource_pdfs`
--
ALTER TABLE `resource_pdfs`
  ADD CONSTRAINT `resource_pdfs_resource_id_foreign` FOREIGN KEY (`resource_id`) REFERENCES `resources` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

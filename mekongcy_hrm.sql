-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 13, 2026 at 05:11 PM
-- Server version: 11.4.10-MariaDB
-- PHP Version: 8.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mekongcy_hrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `action` varchar(255) NOT NULL,
  `module` varchar(255) NOT NULL,
  `meta` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`meta`)),
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_id`, `action`, `module`, `meta`, `ip_address`, `user_agent`, `created_at`, `updated_at`) VALUES
(1, 1, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:35:48', '2026-03-02 08:35:48'),
(2, 1, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:35:48', '2026-03-02 08:35:48'),
(3, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:35:49', '2026-03-02 08:35:49'),
(4, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:35:54', '2026-03-02 08:35:54'),
(5, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:35:57', '2026-03-02 08:35:57'),
(6, 1, 'GET', 'admin.settings.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/settings\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:36:01', '2026-03-02 08:36:01'),
(7, 1, 'GET', 'admin.payrolls.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/payrolls\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:36:03', '2026-03-02 08:36:03'),
(8, 1, 'GET', 'admin.overtime-requests.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/overtime-requests\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:36:06', '2026-03-02 08:36:06'),
(9, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:36:08', '2026-03-02 08:36:08'),
(10, 1, 'GET', 'admin.employees.create', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/create\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:36:10', '2026-03-02 08:36:10'),
(11, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:36:17', '2026-03-02 08:36:17'),
(12, 3, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:37:05', '2026-03-02 08:37:05'),
(13, 3, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":403}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:37:05', '2026-03-02 08:37:05'),
(14, 3, 'GET', 'login', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:37:32', '2026-03-02 08:37:32'),
(15, 3, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:37:32', '2026-03-02 08:37:32'),
(16, 3, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:37:32', '2026-03-02 08:37:32'),
(17, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', '2026-03-02 08:38:00', '2026-03-02 08:38:00'),
(18, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', '2026-03-02 08:38:08', '2026-03-02 08:38:08'),
(19, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:38:17', '2026-03-02 08:38:17'),
(20, 3, 'GET', 'employee.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:38:19', '2026-03-02 08:38:19'),
(21, 3, 'GET', 'employee.leave.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/leave\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:38:22', '2026-03-02 08:38:22'),
(22, 3, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:38:25', '2026-03-02 08:38:25'),
(23, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:39:12', '2026-03-02 08:39:12'),
(24, 1, 'GET', 'admin.attendance-qr.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:39:18', '2026-03-02 08:39:18'),
(25, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:39:25', '2026-03-02 08:39:25'),
(26, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:39:39', '2026-03-02 08:39:39'),
(27, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:39:54', '2026-03-02 08:39:54'),
(28, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:39:56', '2026-03-02 08:39:56'),
(29, 1, 'GET', 'admin.branches.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:40:01', '2026-03-02 08:40:01'),
(30, 1, 'GET', 'admin.branches.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\\/1\\/edit\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:40:04', '2026-03-02 08:40:04'),
(31, 1, 'GET', 'admin.branches.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:40:07', '2026-03-02 08:40:07'),
(32, 1, 'GET', 'admin.branches.create', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\\/create\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:40:08', '2026-03-02 08:40:08'),
(33, 1, 'POST', 'admin.branches.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:40:43', '2026-03-02 08:40:43'),
(34, 1, 'GET', 'admin.branches.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:40:43', '2026-03-02 08:40:43'),
(35, 1, 'GET', 'admin.attendance-qr.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:40:48', '2026-03-02 08:40:48'),
(36, 1, 'POST', 'admin.attendance-qr.generate', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:40:51', '2026-03-02 08:40:51'),
(37, 1, 'GET', 'admin.attendance-qr.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:40:51', '2026-03-02 08:40:51'),
(38, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/1\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:40:51', '2026-03-02 08:40:51'),
(39, 1, 'POST', 'admin.attendance-qr.generate', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:40:58', '2026-03-02 08:40:58'),
(40, 1, 'GET', 'admin.attendance-qr.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:40:58', '2026-03-02 08:40:58'),
(41, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/2\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:40:58', '2026-03-02 08:40:58'),
(42, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/1\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:40:58', '2026-03-02 08:40:58'),
(43, 3, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 08:41:47', '2026-03-02 08:41:47'),
(44, 3, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 08:41:48', '2026-03-02 08:41:48'),
(45, 3, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 08:41:48', '2026-03-02 08:41:48'),
(46, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 08:41:50', '2026-03-02 08:41:50'),
(47, 3, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 08:41:56', '2026-03-02 08:41:56'),
(48, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 08:41:56', '2026-03-02 08:41:56'),
(49, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:42:05', '2026-03-02 08:42:05'),
(50, 1, 'GET', 'admin.employees.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/1\\/edit\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:42:08', '2026-03-02 08:42:08'),
(51, 1, 'PUT', 'admin.employees.update', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/1\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:42:16', '2026-03-02 08:42:16'),
(52, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:42:16', '2026-03-02 08:42:16'),
(53, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 08:42:19', '2026-03-02 08:42:19'),
(54, 1, 'GET', 'admin.attendance-qr.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:42:20', '2026-03-02 08:42:20'),
(55, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/2\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:42:20', '2026-03-02 08:42:20'),
(56, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/1\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:42:20', '2026-03-02 08:42:20'),
(57, 3, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 08:42:27', '2026-03-02 08:42:27'),
(58, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 08:42:28', '2026-03-02 08:42:28'),
(59, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:42:33', '2026-03-02 08:42:33'),
(60, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=late\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:42:56', '2026-03-02 08:42:56'),
(61, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=all\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:42:57', '2026-03-02 08:42:57'),
(62, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:43:13', '2026-03-02 08:43:13'),
(63, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:43:15', '2026-03-02 08:43:15'),
(64, 1, 'GET', 'admin.settings.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/settings\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:43:18', '2026-03-02 08:43:18'),
(65, 1, 'GET', 'admin.branches.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:43:20', '2026-03-02 08:43:20'),
(66, 1, 'GET', 'admin.branches.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\\/1\\/edit\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:43:38', '2026-03-02 08:43:38'),
(67, 1, 'GET', 'admin.branches.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:43:42', '2026-03-02 08:43:42'),
(68, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:43:43', '2026-03-02 08:43:43'),
(69, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 08:43:45', '2026-03-02 08:43:45'),
(70, 3, 'GET', 'employee.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 08:45:51', '2026-03-02 08:45:51'),
(71, 3, 'GET', 'employee.leave.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/leave\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 08:45:55', '2026-03-02 08:45:55'),
(72, 3, 'GET', 'employee.salary.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/salary\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 08:46:12', '2026-03-02 08:46:12'),
(73, 3, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 08:46:13', '2026-03-02 08:46:13'),
(74, 1, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 10:19:36', '2026-03-02 10:19:36'),
(75, 1, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 10:19:36', '2026-03-02 10:19:36'),
(76, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 10:19:36', '2026-03-02 10:19:36'),
(77, 1, 'GET', 'admin.settings.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/settings\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 10:19:41', '2026-03-02 10:19:41'),
(78, 1, 'GET', 'admin.settings.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/settings\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 10:56:07', '2026-03-02 10:56:07'),
(79, 1, 'GET', 'admin.settings.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/settings\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 10:57:30', '2026-03-02 10:57:30'),
(80, 1, 'GET', 'admin.settings.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/settings\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 10:57:38', '2026-03-02 10:57:38'),
(81, 1, 'GET', 'admin.settings.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/settings\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 10:59:16', '2026-03-02 10:59:16'),
(82, 1, 'GET', 'admin.settings.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/settings\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 11:00:39', '2026-03-02 11:00:39'),
(83, 1, 'PUT', 'admin.settings.update', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/settings\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 11:02:39', '2026-03-02 11:02:39'),
(84, 1, 'GET', 'admin.settings.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/settings\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 11:02:39', '2026-03-02 11:02:39'),
(85, 1, 'GET', 'admin.attendance-qr.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 11:02:47', '2026-03-02 11:02:47'),
(86, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/2\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 11:02:47', '2026-03-02 11:02:47'),
(87, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/1\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 11:02:47', '2026-03-02 11:02:47'),
(88, 3, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 11:03:10', '2026-03-02 11:03:10'),
(89, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 11:03:10', '2026-03-02 11:03:10'),
(90, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 11:03:12', '2026-03-02 11:03:12'),
(91, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 11:03:13', '2026-03-02 11:03:13'),
(92, 3, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 11:03:20', '2026-03-02 11:03:20'),
(93, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 11:03:20', '2026-03-02 11:03:20'),
(94, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 11:04:08', '2026-03-02 11:04:08'),
(95, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=late\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 11:04:14', '2026-03-02 11:04:14'),
(96, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=rejected\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 11:04:15', '2026-03-02 11:04:15'),
(97, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=all\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 11:04:15', '2026-03-02 11:04:15'),
(98, 1, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 11:26:49', '2026-03-02 11:26:49'),
(99, 1, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 11:26:49', '2026-03-02 11:26:49'),
(100, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 11:26:49', '2026-03-02 11:26:49'),
(101, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 11:26:53', '2026-03-02 11:26:53'),
(102, 1, 'GET', 'admin.payrolls.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/payrolls\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 11:26:59', '2026-03-02 11:26:59'),
(103, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 11:27:01', '2026-03-02 11:27:01'),
(104, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 11:27:02', '2026-03-02 11:27:02'),
(105, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 11:27:21', '2026-03-02 11:27:21'),
(106, 1, 'GET', 'admin.settings.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/settings\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 11:28:22', '2026-03-02 11:28:22'),
(107, 1, 'GET', 'admin.settings.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/settings\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 11:32:22', '2026-03-02 11:32:22'),
(108, 1, 'GET', 'admin.settings.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/settings\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 11:33:56', '2026-03-02 11:33:56'),
(109, 1, 'GET', 'admin.schedules.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/schedules\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 11:34:02', '2026-03-02 11:34:02'),
(110, 1, 'GET', 'admin.schedules.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/schedules?branch_id=2\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 11:34:08', '2026-03-02 11:34:08'),
(111, 1, 'GET', 'admin.schedules.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/schedules?branch_id=1\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 11:34:14', '2026-03-02 11:34:14'),
(112, 1, 'GET', 'admin.schedules.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/schedules?branch_id=2\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 11:34:18', '2026-03-02 11:34:18'),
(113, 1, 'GET', 'admin.schedules.create', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/schedules\\/create?branch_id=2&day_of_week=0\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 11:34:20', '2026-03-02 11:34:20'),
(114, 1, 'GET', 'admin.schedules.create', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/schedules\\/create?branch_id=2&day_of_week=0\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 11:41:23', '2026-03-02 11:41:23'),
(115, 1, 'POST', 'admin.schedules.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/schedules\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 11:41:39', '2026-03-02 11:41:39'),
(116, 1, 'GET', 'admin.schedules.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/schedules?branch_id=2\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 11:41:39', '2026-03-02 11:41:39'),
(117, 1, 'GET', 'admin.schedules.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/schedules?branch_id=2\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 11:43:48', '2026-03-02 11:43:48'),
(118, 1, 'GET', 'admin.schedules.create', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/schedules\\/create?branch_id=2&day_of_week=1\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 11:43:52', '2026-03-02 11:43:52'),
(119, 1, 'POST', 'admin.schedules.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/schedules\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 11:44:14', '2026-03-02 11:44:14'),
(120, 1, 'GET', 'admin.schedules.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/schedules?branch_id=2\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 11:44:15', '2026-03-02 11:44:15'),
(121, 3, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 11:44:46', '2026-03-02 11:44:46'),
(122, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 11:44:46', '2026-03-02 11:44:46'),
(123, 1, 'GET', 'admin.attendance-qr.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 11:44:52', '2026-03-02 11:44:52'),
(124, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/1\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 11:44:52', '2026-03-02 11:44:52'),
(125, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/2\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 11:44:52', '2026-03-02 11:44:52'),
(126, 3, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 11:44:57', '2026-03-02 11:44:57'),
(127, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 11:44:57', '2026-03-02 11:44:57'),
(128, 1, 'GET', 'admin.settings.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/settings\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 11:49:42', '2026-03-02 11:49:42'),
(129, 1, 'GET', 'admin.settings.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/settings\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 11:50:48', '2026-03-02 11:50:48'),
(130, 1, 'GET', 'admin.schedules.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/schedules\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 11:50:54', '2026-03-02 11:50:54'),
(131, 1, 'GET', 'admin.attendance-qr.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 11:50:57', '2026-03-02 11:50:57'),
(132, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/1\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 11:50:57', '2026-03-02 11:50:57'),
(133, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/2\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 11:50:57', '2026-03-02 11:50:57'),
(134, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 11:51:03', '2026-03-02 11:51:03'),
(135, 3, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":500}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 11:51:11', '2026-03-02 11:51:11'),
(136, 1, 'GET', 'admin.attendance-qr.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 11:55:17', '2026-03-02 11:55:17'),
(137, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/1\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 11:55:17', '2026-03-02 11:55:17'),
(138, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/2\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 11:55:17', '2026-03-02 11:55:17'),
(139, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 11:55:21', '2026-03-02 11:55:21'),
(140, 3, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":500}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 11:55:29', '2026-03-02 11:55:29'),
(141, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 11:57:47', '2026-03-02 11:57:47'),
(142, 3, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 11:57:59', '2026-03-02 11:57:59'),
(143, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 11:57:59', '2026-03-02 11:57:59'),
(144, 1, 'GET', 'admin.attendance-qr.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 11:58:09', '2026-03-02 11:58:09'),
(145, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/1\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 11:58:10', '2026-03-02 11:58:10'),
(146, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/2\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 11:58:10', '2026-03-02 11:58:10'),
(147, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 11:58:10', '2026-03-02 11:58:10'),
(148, 3, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 11:58:15', '2026-03-02 11:58:15'),
(149, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 11:58:15', '2026-03-02 11:58:15'),
(150, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 12:00:33', '2026-03-02 12:00:33'),
(151, 3, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 12:00:39', '2026-03-02 12:00:39'),
(152, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 12:00:39', '2026-03-02 12:00:39'),
(153, 1, 'GET', 'admin.attendance-qr.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 12:02:30', '2026-03-02 12:02:30'),
(154, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/1\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 12:02:30', '2026-03-02 12:02:30'),
(155, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/2\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 12:02:30', '2026-03-02 12:02:30'),
(156, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 12:02:34', '2026-03-02 12:02:34'),
(157, 3, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 12:02:40', '2026-03-02 12:02:40'),
(158, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 12:02:40', '2026-03-02 12:02:40'),
(159, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 12:03:01', '2026-03-02 12:03:01'),
(160, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=late\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 12:03:08', '2026-03-02 12:03:08'),
(161, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=late\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 12:03:10', '2026-03-02 12:03:10');
INSERT INTO `activity_logs` (`id`, `user_id`, `action`, `module`, `meta`, `ip_address`, `user_agent`, `created_at`, `updated_at`) VALUES
(162, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=late\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 12:31:03', '2026-03-02 12:31:03'),
(163, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=all\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 12:31:20', '2026-03-02 12:31:20'),
(164, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=all\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 12:31:21', '2026-03-02 12:31:21'),
(165, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=late\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 12:31:22', '2026-03-02 12:31:22'),
(166, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=rejected\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 12:31:23', '2026-03-02 12:31:23'),
(167, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=all\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 12:31:23', '2026-03-02 12:31:23'),
(168, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=all\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 12:34:01', '2026-03-02 12:34:01'),
(169, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=all\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 12:35:37', '2026-03-02 12:35:37'),
(170, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=all\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 12:36:06', '2026-03-02 12:36:06'),
(171, 1, 'GET', 'admin.attendance-qr.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 12:36:28', '2026-03-02 12:36:28'),
(172, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/1\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 12:36:28', '2026-03-02 12:36:28'),
(173, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/2\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 12:36:28', '2026-03-02 12:36:28'),
(174, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 12:36:38', '2026-03-02 12:36:38'),
(175, 3, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 12:36:49', '2026-03-02 12:36:49'),
(176, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 12:36:49', '2026-03-02 12:36:49'),
(177, 3, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 12:40:44', '2026-03-02 12:40:44'),
(178, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 12:40:44', '2026-03-02 12:40:44'),
(179, 3, 'GET', 'employee.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 12:40:50', '2026-03-02 12:40:50'),
(180, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 12:40:53', '2026-03-02 12:40:53'),
(181, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 12:41:19', '2026-03-02 12:41:19'),
(182, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 12:41:22', '2026-03-02 12:41:22'),
(183, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=late\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 12:41:32', '2026-03-02 12:41:32'),
(184, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=all\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 12:41:34', '2026-03-02 12:41:34'),
(185, 1, 'GET', 'admin.schedules.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/schedules\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 12:41:44', '2026-03-02 12:41:44'),
(186, 1, 'GET', 'admin.schedules.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/schedules?branch_id=2\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 12:41:48', '2026-03-02 12:41:48'),
(187, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 12:46:12', '2026-03-02 12:46:12'),
(188, 1, 'GET', 'admin.schedules.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/schedules\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 12:46:15', '2026-03-02 12:46:15'),
(189, 1, 'GET', 'admin.attendance-qr.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 12:46:17', '2026-03-02 12:46:17'),
(190, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/1\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 12:46:17', '2026-03-02 12:46:17'),
(191, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/2\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 12:46:17', '2026-03-02 12:46:17'),
(192, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 12:46:21', '2026-03-02 12:46:21'),
(193, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 12:46:23', '2026-03-02 12:46:23'),
(194, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 12:46:25', '2026-03-02 12:46:25'),
(195, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 12:46:26', '2026-03-02 12:46:26'),
(196, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 12:46:46', '2026-03-02 12:46:46'),
(197, 3, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 12:47:08', '2026-03-02 12:47:08'),
(198, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 12:47:08', '2026-03-02 12:47:08'),
(199, 3, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 12:47:25', '2026-03-02 12:47:25'),
(200, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 12:47:25', '2026-03-02 12:47:25'),
(201, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 12:49:14', '2026-03-02 12:49:14'),
(202, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 12:49:33', '2026-03-02 12:49:33'),
(203, 3, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 12:49:40', '2026-03-02 12:49:40'),
(204, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 12:49:40', '2026-03-02 12:49:40'),
(205, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 12:49:45', '2026-03-02 12:49:45'),
(206, 3, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 12:49:51', '2026-03-02 12:49:51'),
(207, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 12:49:51', '2026-03-02 12:49:51'),
(208, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 12:50:41', '2026-03-02 12:50:41'),
(209, 1, 'GET', 'admin.attendance-qr.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 12:51:58', '2026-03-02 12:51:58'),
(210, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/2\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 12:51:58', '2026-03-02 12:51:58'),
(211, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/1\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 12:51:58', '2026-03-02 12:51:58'),
(212, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 12:52:01', '2026-03-02 12:52:01'),
(213, 3, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 12:52:07', '2026-03-02 12:52:07'),
(214, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 12:52:07', '2026-03-02 12:52:07'),
(215, 3, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 12:52:27', '2026-03-02 12:52:27'),
(216, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 12:52:27', '2026-03-02 12:52:27'),
(217, 1, 'GET', 'admin.attendance-qr.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 12:56:56', '2026-03-02 12:56:56'),
(218, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/1\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 12:56:56', '2026-03-02 12:56:56'),
(219, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/2\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 12:56:56', '2026-03-02 12:56:56'),
(220, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 12:56:59', '2026-03-02 12:56:59'),
(221, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 12:57:11', '2026-03-02 12:57:11'),
(222, 3, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 12:57:16', '2026-03-02 12:57:16'),
(223, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 12:57:16', '2026-03-02 12:57:16'),
(224, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 12:57:23', '2026-03-02 12:57:23'),
(225, 3, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 12:57:29', '2026-03-02 12:57:29'),
(226, 3, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 12:57:29', '2026-03-02 12:57:29'),
(227, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 12:57:36', '2026-03-02 12:57:36'),
(228, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:03:17', '2026-03-02 13:03:17'),
(229, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=late\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:03:37', '2026-03-02 13:03:37'),
(230, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=rejected\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:03:38', '2026-03-02 13:03:38'),
(231, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=all\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:03:40', '2026-03-02 13:03:40'),
(232, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=all\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:06:23', '2026-03-02 13:06:23'),
(233, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=all\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:09:09', '2026-03-02 13:09:09'),
(234, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=all\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:09:11', '2026-03-02 13:09:11'),
(235, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=all\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:09:12', '2026-03-02 13:09:12'),
(236, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=all\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:09:12', '2026-03-02 13:09:12'),
(237, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=all\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:11:36', '2026-03-02 13:11:36'),
(238, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=all\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:11:38', '2026-03-02 13:11:38'),
(239, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=all\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:13:46', '2026-03-02 13:13:46'),
(240, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=all\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:15:47', '2026-03-02 13:15:47'),
(241, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=late\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:15:50', '2026-03-02 13:15:50'),
(242, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=all\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:15:51', '2026-03-02 13:15:51'),
(243, 1, 'GET', 'admin.schedules.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/schedules\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:15:52', '2026-03-02 13:15:52'),
(244, 1, 'GET', 'admin.schedules.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/schedules?branch_id=2\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:15:56', '2026-03-02 13:15:56'),
(245, 1, 'GET', 'admin.schedules.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/schedules?branch_id=1\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:15:57', '2026-03-02 13:15:57'),
(246, 1, 'GET', 'admin.schedules.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/schedules?branch_id=\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:15:58', '2026-03-02 13:15:58'),
(247, 1, 'GET', 'admin.schedules.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/schedules?branch_id=2\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:16:00', '2026-03-02 13:16:00'),
(248, 1, 'GET', 'admin.attendance-qr.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:16:18', '2026-03-02 13:16:18'),
(249, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/1\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:16:18', '2026-03-02 13:16:18'),
(250, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/2\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:16:18', '2026-03-02 13:16:18'),
(251, 1, 'GET', 'admin.branches.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:16:25', '2026-03-02 13:16:25'),
(252, 1, 'GET', 'admin.settings.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/settings\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:16:28', '2026-03-02 13:16:28'),
(253, 1, 'PUT', 'admin.settings.update', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/settings\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:16:49', '2026-03-02 13:16:49'),
(254, 1, 'GET', 'admin.settings.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/settings\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:16:49', '2026-03-02 13:16:49'),
(255, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:16:52', '2026-03-02 13:16:52'),
(256, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:21:52', '2026-03-02 13:21:52'),
(257, 3, 'GET', 'employee.leave.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/leave\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 13:22:16', '2026-03-02 13:22:16'),
(258, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:22:24', '2026-03-02 13:22:24'),
(259, 1, 'GET', 'admin.employees.create', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/create\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:22:26', '2026-03-02 13:22:26'),
(260, 3, 'GET', 'employee.leave.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/leave\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 13:27:39', '2026-03-02 13:27:39'),
(261, 3, 'POST', 'employee.leave.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/leave\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 13:27:56', '2026-03-02 13:27:56'),
(262, 3, 'GET', 'employee.leave.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/leave\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 13:27:56', '2026-03-02 13:27:56'),
(263, 3, 'GET', 'employee.leave.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/leave\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 13:27:59', '2026-03-02 13:27:59'),
(264, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:28:05', '2026-03-02 13:28:05'),
(265, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:28:06', '2026-03-02 13:28:06'),
(266, 1, 'GET', 'admin.leave-requests.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/leave-requests\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:28:09', '2026-03-02 13:28:09'),
(267, 1, 'PATCH', 'admin.leave-requests.status', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/leave-requests\\/1\\/status\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:28:13', '2026-03-02 13:28:13'),
(268, 1, 'GET', 'admin.leave-requests.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/leave-requests\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:28:13', '2026-03-02 13:28:13'),
(269, 1, 'GET', 'admin.overtime-requests.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/overtime-requests\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:28:17', '2026-03-02 13:28:17'),
(270, 1, 'GET', 'admin.change-dayoff-requests.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/change-dayoff-requests\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:28:18', '2026-03-02 13:28:18'),
(271, 1, 'GET', 'admin.leave-requests.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/leave-requests\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:28:19', '2026-03-02 13:28:19'),
(272, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:28:21', '2026-03-02 13:28:21'),
(273, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:30:49', '2026-03-02 13:30:49'),
(274, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:30:53', '2026-03-02 13:30:53'),
(275, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:30:55', '2026-03-02 13:30:55'),
(276, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=late\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:30:56', '2026-03-02 13:30:56'),
(277, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=all\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:30:57', '2026-03-02 13:30:57'),
(278, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:30:57', '2026-03-02 13:30:57'),
(279, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:34:20', '2026-03-02 13:34:20'),
(280, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:34:36', '2026-03-02 13:34:36'),
(281, 1, 'GET', 'admin.employees.create', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/create\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:34:39', '2026-03-02 13:34:39'),
(282, 1, 'GET', 'admin.branches.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:37:03', '2026-03-02 13:37:03'),
(283, 1, 'GET', 'admin.branches.create', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\\/create\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:37:07', '2026-03-02 13:37:07'),
(284, 1, 'POST', 'admin.branches.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:40:58', '2026-03-02 13:40:58'),
(285, 1, 'GET', 'admin.branches.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:40:58', '2026-03-02 13:40:58'),
(286, 1, 'GET', 'admin.employees.create', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/create\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:41:01', '2026-03-02 13:41:01'),
(287, 1, 'POST', 'admin.employees.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:41:44', '2026-03-02 13:41:44'),
(288, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:41:44', '2026-03-02 13:41:44'),
(289, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:41:47', '2026-03-02 13:41:47'),
(290, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:46:32', '2026-03-02 13:46:32'),
(291, 1, 'GET', 'users.photo', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/users\\/4\\/photo\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:46:32', '2026-03-02 13:46:32'),
(292, 1, 'GET', 'admin.settings.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/settings\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:46:43', '2026-03-02 13:46:43'),
(293, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:46:49', '2026-03-02 13:46:49'),
(294, 1, 'GET', 'admin.branches.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:48:47', '2026-03-02 13:48:47'),
(295, 4, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:49:05', '2026-03-02 13:49:05'),
(296, 4, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:49:05', '2026-03-02 13:49:05'),
(297, 4, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:49:05', '2026-03-02 13:49:05'),
(298, 4, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:49:12', '2026-03-02 13:49:12'),
(299, 4, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:49:16', '2026-03-02 13:49:16'),
(300, 4, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:49:35', '2026-03-02 13:49:35'),
(301, 4, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:49:37', '2026-03-02 13:49:37'),
(302, 4, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:50:07', '2026-03-02 13:50:07'),
(303, 4, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:52:43', '2026-03-02 13:52:43'),
(304, 4, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:52:48', '2026-03-02 13:52:48'),
(305, 4, 'GET', 'admin.payrolls.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/payrolls\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:52:51', '2026-03-02 13:52:51'),
(306, 4, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:52:53', '2026-03-02 13:52:53'),
(307, 4, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:56:32', '2026-03-02 13:56:32'),
(308, 4, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 13:56:35', '2026-03-02 13:56:35'),
(309, 4, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 14:03:17', '2026-03-02 14:03:17'),
(310, 4, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 14:03:22', '2026-03-02 14:03:22'),
(311, 4, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 14:03:23', '2026-03-02 14:03:23'),
(312, 4, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 14:03:26', '2026-03-02 14:03:26'),
(313, 4, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 14:07:41', '2026-03-02 14:07:41'),
(314, 4, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 14:07:48', '2026-03-02 14:07:48'),
(315, 4, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 14:07:49', '2026-03-02 14:07:49'),
(316, 4, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 14:10:02', '2026-03-02 14:10:02'),
(317, 4, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 14:13:36', '2026-03-02 14:13:36'),
(318, 4, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 14:13:41', '2026-03-02 14:13:41'),
(319, 1, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 14:14:03', '2026-03-02 14:14:03'),
(320, 1, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 14:14:03', '2026-03-02 14:14:03'),
(321, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 14:14:03', '2026-03-02 14:14:03');
INSERT INTO `activity_logs` (`id`, `user_id`, `action`, `module`, `meta`, `ip_address`, `user_agent`, `created_at`, `updated_at`) VALUES
(322, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 14:14:07', '2026-03-02 14:14:07'),
(323, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 14:14:13', '2026-03-02 14:14:13'),
(324, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 14:14:16', '2026-03-02 14:14:16'),
(325, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 14:14:16', '2026-03-02 14:14:16'),
(326, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 14:14:23', '2026-03-02 14:14:23'),
(327, 1, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 14:14:37', '2026-03-02 14:14:37'),
(328, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 14:14:37', '2026-03-02 14:14:37'),
(329, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 14:14:45', '2026-03-02 14:14:45'),
(330, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 14:14:46', '2026-03-02 14:14:46'),
(331, 1, 'GET', 'users.photo', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/users\\/4\\/photo\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 14:14:47', '2026-03-02 14:14:47'),
(332, 4, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 14:14:56', '2026-03-02 14:14:56'),
(333, 4, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 14:15:23', '2026-03-02 14:15:23'),
(334, 4, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 14:15:33', '2026-03-02 14:15:33'),
(335, 4, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 14:15:33', '2026-03-02 14:15:33'),
(336, 4, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 14:15:34', '2026-03-02 14:15:34'),
(337, 4, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 14:15:34', '2026-03-02 14:15:34'),
(338, 4, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 14:15:34', '2026-03-02 14:15:34'),
(339, 4, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 14:15:34', '2026-03-02 14:15:34'),
(340, 1, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 14:16:45', '2026-03-02 14:16:45'),
(341, 1, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 14:16:45', '2026-03-02 14:16:45'),
(342, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 14:16:45', '2026-03-02 14:16:45'),
(343, 1, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 14:16:58', '2026-03-02 14:16:58'),
(344, 1, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 14:16:58', '2026-03-02 14:16:58'),
(345, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 14:16:59', '2026-03-02 14:16:59'),
(346, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 14:17:02', '2026-03-02 14:17:02'),
(347, 4, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 14:26:24', '2026-03-02 14:26:24'),
(348, 4, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 14:26:24', '2026-03-02 14:26:24'),
(349, 4, 'GET', 'admin.settings.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/settings\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 14:26:28', '2026-03-02 14:26:28'),
(350, 4, 'GET', 'admin.branches.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 14:26:31', '2026-03-02 14:26:31'),
(351, 4, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 14:26:33', '2026-03-02 14:26:33'),
(352, 4, 'GET', 'users.photo', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/users\\/4\\/photo\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 14:26:33', '2026-03-02 14:26:33'),
(353, 4, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 14:26:33', '2026-03-02 14:26:33'),
(354, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 14:26:41', '2026-03-02 14:26:41'),
(355, 1, 'GET', 'profile.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/profile\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 15:04:46', '2026-03-02 15:04:46'),
(356, 1, 'PUT', 'password.update', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/password\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 15:05:30', '2026-03-02 15:05:30'),
(357, 1, 'GET', 'profile.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/profile\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 15:05:30', '2026-03-02 15:05:30'),
(358, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 15:15:50', '2026-03-02 15:15:50'),
(359, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 15:16:02', '2026-03-02 15:16:02'),
(360, 1, 'GET', 'users.photo', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/users\\/4\\/photo\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 15:16:02', '2026-03-02 15:16:02'),
(361, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 15:16:10', '2026-03-02 15:16:10'),
(362, 1, 'GET', 'admin.schedules.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/schedules\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 15:16:21', '2026-03-02 15:16:21'),
(363, 1, 'GET', 'admin.attendance-qr.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 15:16:29', '2026-03-02 15:16:29'),
(364, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 15:16:31', '2026-03-02 15:16:31'),
(365, 1, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 17:07:01', '2026-03-02 17:07:01'),
(366, 1, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 17:07:02', '2026-03-02 17:07:02'),
(367, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 17:07:02', '2026-03-02 17:07:02'),
(368, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 17:07:04', '2026-03-02 17:07:04'),
(369, 1, 'GET', 'admin.employees.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/2\\/edit\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 17:07:11', '2026-03-02 17:07:11'),
(370, 1, 'PUT', 'admin.employees.update', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/2\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 17:07:19', '2026-03-02 17:07:19'),
(371, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 17:07:19', '2026-03-02 17:07:19'),
(372, 1, 'GET', 'admin.employees.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/2\\/edit\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 17:07:22', '2026-03-02 17:07:22'),
(373, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 17:07:25', '2026-03-02 17:07:25'),
(374, 4, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 17:07:30', '2026-03-02 17:07:30'),
(375, 4, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 17:07:31', '2026-03-02 17:07:31'),
(376, 4, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 17:07:31', '2026-03-02 17:07:31'),
(377, 4, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', '2026-03-02 17:07:38', '2026-03-02 17:07:38'),
(378, 4, 'GET', 'employee.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', '2026-03-02 17:07:39', '2026-03-02 17:07:39'),
(379, 4, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', '2026-03-02 17:07:40', '2026-03-02 17:07:40'),
(380, 4, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', '2026-03-02 17:07:45', '2026-03-02 17:07:45'),
(381, 4, 'GET', 'employee.leave.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/leave\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', '2026-03-02 17:07:46', '2026-03-02 17:07:46'),
(382, 4, 'GET', 'employee.salary.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/salary\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', '2026-03-02 17:07:47', '2026-03-02 17:07:47'),
(383, 4, 'GET', 'employee.salary.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/salary\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', '2026-03-02 17:11:01', '2026-03-02 17:11:01'),
(384, 4, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', '2026-03-02 17:11:03', '2026-03-02 17:11:03'),
(385, 4, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', '2026-03-02 17:11:04', '2026-03-02 17:11:04'),
(386, 4, 'GET', 'employee.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', '2026-03-02 17:11:06', '2026-03-02 17:11:06'),
(387, 4, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', '2026-03-02 17:11:10', '2026-03-02 17:11:10'),
(388, 1, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 17:53:28', '2026-03-02 17:53:28'),
(389, 1, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 17:53:28', '2026-03-02 17:53:28'),
(390, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 17:53:28', '2026-03-02 17:53:28'),
(391, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 17:54:47', '2026-03-02 17:54:47'),
(392, 1, 'GET', 'users.photo', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/users\\/4\\/photo\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 17:54:47', '2026-03-02 17:54:47'),
(393, 1, 'GET', 'admin.employees.create', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/create\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 17:54:50', '2026-03-02 17:54:50'),
(394, 1, 'POST', 'admin.employees.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 17:56:05', '2026-03-02 17:56:05'),
(395, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 17:56:05', '2026-03-02 17:56:05'),
(396, 1, 'GET', 'admin.settings.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/settings\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 17:56:16', '2026-03-02 17:56:16'),
(397, 1, 'GET', 'admin.branches.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 17:56:19', '2026-03-02 17:56:19'),
(398, 1, 'GET', 'admin.branches.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\\/3\\/edit\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 17:56:22', '2026-03-02 17:56:22'),
(399, 1, 'GET', 'admin.branches.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 17:56:42', '2026-03-02 17:56:42'),
(400, 1, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 17:57:23', '2026-03-02 17:57:23'),
(401, 1, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 17:57:23', '2026-03-02 17:57:23'),
(402, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 17:57:23', '2026-03-02 17:57:23'),
(403, 1, 'GET', 'admin.branches.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 17:57:26', '2026-03-02 17:57:26'),
(404, 1, 'GET', 'admin.branches.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\\/3\\/edit\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 17:57:27', '2026-03-02 17:57:27'),
(405, 1, 'PUT', 'admin.branches.update', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\\/3\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 17:57:34', '2026-03-02 17:57:34'),
(406, 1, 'GET', 'admin.branches.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 17:57:34', '2026-03-02 17:57:34'),
(407, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 17:57:40', '2026-03-02 17:57:40'),
(408, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 17:57:46', '2026-03-02 17:57:46'),
(409, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 17:57:47', '2026-03-02 17:57:47'),
(410, 1, 'GET', 'admin.employees.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/3\\/edit\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 17:57:49', '2026-03-02 17:57:49'),
(411, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 17:57:52', '2026-03-02 17:57:52'),
(412, 1, 'GET', 'admin.attendance-qr.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 17:57:55', '2026-03-02 17:57:55'),
(413, 1, 'POST', 'admin.attendance-qr.generate', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 17:57:56', '2026-03-02 17:57:56'),
(414, 1, 'GET', 'admin.attendance-qr.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 17:57:56', '2026-03-02 17:57:56'),
(415, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/3\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 17:57:56', '2026-03-02 17:57:56'),
(416, 1, 'GET', 'admin.payrolls.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/payrolls\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 17:58:35', '2026-03-02 17:58:35'),
(417, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 17:58:40', '2026-03-02 17:58:40'),
(418, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 17:58:43', '2026-03-02 17:58:43'),
(419, 1, 'GET', 'admin.attendance-qr.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 17:58:46', '2026-03-02 17:58:46'),
(420, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/3\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 17:58:46', '2026-03-02 17:58:46'),
(421, 1, 'GET', 'admin.schedules.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/schedules\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 17:59:04', '2026-03-02 17:59:04'),
(422, 1, 'GET', 'admin.schedules.create', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/schedules\\/create?branch_id=3&day_of_week=0\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 17:59:08', '2026-03-02 17:59:08'),
(423, 1, 'POST', 'admin.schedules.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/schedules\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 17:59:23', '2026-03-02 17:59:23'),
(424, 1, 'GET', 'admin.schedules.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/schedules?branch_id=3\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 17:59:23', '2026-03-02 17:59:23'),
(425, 5, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '117.20.113.86', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-02 17:59:52', '2026-03-02 17:59:52'),
(426, 5, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '117.20.113.86', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-02 17:59:52', '2026-03-02 17:59:52'),
(427, 5, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '117.20.113.86', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-02 17:59:53', '2026-03-02 17:59:53'),
(428, 5, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '117.20.113.86', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-02 18:00:17', '2026-03-02 18:00:17'),
(429, 5, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '117.20.113.86', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-02 18:00:17', '2026-03-02 18:00:17'),
(430, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.113.86', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-02 18:00:25', '2026-03-02 18:00:25'),
(431, 1, 'GET', 'admin.attendance-qr.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:00:32', '2026-03-02 18:00:32'),
(432, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/3\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:00:33', '2026-03-02 18:00:33'),
(433, 5, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '117.20.113.86', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-02 18:00:39', '2026-03-02 18:00:39'),
(434, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.113.86', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-02 18:00:39', '2026-03-02 18:00:39'),
(435, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/3\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:01:02', '2026-03-02 18:01:02'),
(436, 5, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '117.20.113.86', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-02 18:01:38', '2026-03-02 18:01:38'),
(437, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.113.86', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-02 18:01:39', '2026-03-02 18:01:39'),
(438, 1, 'POST', 'admin.attendance-qr.generate', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:02:08', '2026-03-02 18:02:08'),
(439, 1, 'GET', 'admin.attendance-qr.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:02:08', '2026-03-02 18:02:08'),
(440, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/4\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:02:08', '2026-03-02 18:02:08'),
(441, 5, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '117.20.113.86', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-02 18:02:16', '2026-03-02 18:02:16'),
(442, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.113.86', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-02 18:02:16', '2026-03-02 18:02:16'),
(443, 5, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '117.20.113.86', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-02 18:02:26', '2026-03-02 18:02:26'),
(444, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.113.86', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-02 18:02:26', '2026-03-02 18:02:26'),
(445, 5, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '117.20.113.86', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-02 18:02:35', '2026-03-02 18:02:35'),
(446, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.113.86', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-02 18:02:35', '2026-03-02 18:02:35'),
(447, 5, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '117.20.113.86', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-02 18:02:44', '2026-03-02 18:02:44'),
(448, 1, 'GET', 'admin.settings.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/settings\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:02:49', '2026-03-02 18:02:49'),
(449, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:03:01', '2026-03-02 18:03:01'),
(450, 1, 'GET', 'admin.branches.create', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\\/create\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 18:03:28', '2026-03-02 18:03:28'),
(451, 1, 'POST', 'admin.branches.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 18:03:57', '2026-03-02 18:03:57'),
(452, 1, 'GET', 'admin.branches.create', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\\/create\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 18:03:58', '2026-03-02 18:03:58'),
(453, 1, 'POST', 'admin.branches.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 18:04:15', '2026-03-02 18:04:15'),
(454, 1, 'GET', 'admin.branches.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 18:04:15', '2026-03-02 18:04:15'),
(455, 1, 'GET', 'admin.branches.create', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\\/create\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 18:04:17', '2026-03-02 18:04:17'),
(456, 1, 'POST', 'admin.branches.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 18:04:29', '2026-03-02 18:04:29'),
(457, 1, 'GET', 'admin.branches.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 18:04:29', '2026-03-02 18:04:29'),
(458, 1, 'GET', 'admin.branches.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\\/5\\/edit\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 18:04:33', '2026-03-02 18:04:33'),
(459, 1, 'PUT', 'admin.branches.update', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\\/5\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 18:04:36', '2026-03-02 18:04:36'),
(460, 1, 'GET', 'admin.branches.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 18:04:37', '2026-03-02 18:04:37'),
(461, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:04:41', '2026-03-02 18:04:41'),
(462, 1, 'GET', 'admin.employees.create', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/create\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:04:43', '2026-03-02 18:04:43'),
(463, 1, 'POST', 'admin.employees.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:06:36', '2026-03-02 18:06:36'),
(464, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:06:37', '2026-03-02 18:06:37'),
(465, 6, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-02 18:08:21', '2026-03-02 18:08:21'),
(466, 6, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-02 18:08:21', '2026-03-02 18:08:21'),
(467, 6, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-02 18:08:21', '2026-03-02 18:08:21'),
(468, 6, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-02 18:08:41', '2026-03-02 18:08:41'),
(469, 6, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-02 18:08:41', '2026-03-02 18:08:41'),
(470, 6, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-02 18:08:46', '2026-03-02 18:08:46'),
(471, 1, 'GET', 'admin.attendance-qr.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:09:04', '2026-03-02 18:09:04'),
(472, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/4\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:09:05', '2026-03-02 18:09:05'),
(473, 1, 'POST', 'admin.attendance-qr.generate', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:09:10', '2026-03-02 18:09:10'),
(474, 1, 'GET', 'admin.attendance-qr.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:09:10', '2026-03-02 18:09:10'),
(475, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/4\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:09:10', '2026-03-02 18:09:10'),
(476, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/5\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:09:10', '2026-03-02 18:09:10'),
(477, 1, 'GET', 'admin.branches.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:09:13', '2026-03-02 18:09:13'),
(478, 1, 'GET', 'admin.schedules.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/schedules\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:09:17', '2026-03-02 18:09:17'),
(479, 1, 'GET', 'admin.schedules.create', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/schedules\\/create?branch_id=5&day_of_week=0\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:09:18', '2026-03-02 18:09:18'),
(480, 1, 'POST', 'admin.schedules.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/schedules\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:09:44', '2026-03-02 18:09:44'),
(481, 1, 'GET', 'admin.schedules.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/schedules?branch_id=5\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:09:44', '2026-03-02 18:09:44'),
(482, 1, 'GET', 'admin.schedules.create', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/schedules\\/create?branch_id=5\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:09:46', '2026-03-02 18:09:46'),
(483, 1, 'POST', 'admin.schedules.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/schedules\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:10:07', '2026-03-02 18:10:07');
INSERT INTO `activity_logs` (`id`, `user_id`, `action`, `module`, `meta`, `ip_address`, `user_agent`, `created_at`, `updated_at`) VALUES
(484, 1, 'GET', 'admin.schedules.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/schedules?branch_id=4\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:10:08', '2026-03-02 18:10:08'),
(485, 1, 'GET', 'admin.attendance-qr.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:10:12', '2026-03-02 18:10:12'),
(486, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/4\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:10:12', '2026-03-02 18:10:12'),
(487, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/5\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:10:12', '2026-03-02 18:10:12'),
(488, 6, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-02 18:10:18', '2026-03-02 18:10:18'),
(489, 6, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-02 18:10:18', '2026-03-02 18:10:18'),
(490, 6, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-02 18:10:26', '2026-03-02 18:10:26'),
(491, 6, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-02 18:10:26', '2026-03-02 18:10:26'),
(492, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:10:40', '2026-03-02 18:10:40'),
(493, 1, 'GET', 'admin.employees.create', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/create\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:10:42', '2026-03-02 18:10:42'),
(494, 1, 'POST', 'admin.employees.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:11:56', '2026-03-02 18:11:56'),
(495, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:11:56', '2026-03-02 18:11:56'),
(496, 1, 'GET', 'admin.employees.create', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/create\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:11:59', '2026-03-02 18:11:59'),
(497, 7, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-02 18:12:50', '2026-03-02 18:12:50'),
(498, 7, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-02 18:12:50', '2026-03-02 18:12:50'),
(499, 7, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-02 18:12:50', '2026-03-02 18:12:50'),
(500, 7, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-02 18:13:12', '2026-03-02 18:13:12'),
(501, 7, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-02 18:13:13', '2026-03-02 18:13:13'),
(502, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-02 18:13:25', '2026-03-02 18:13:25'),
(503, 7, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-02 18:13:29', '2026-03-02 18:13:29'),
(504, 7, 'GET', 'employee.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-02 18:13:30', '2026-03-02 18:13:30'),
(505, 1, 'POST', 'admin.employees.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:13:35', '2026-03-02 18:13:35'),
(506, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:13:35', '2026-03-02 18:13:35'),
(507, 7, 'GET', 'employee.leave.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/leave\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-02 18:13:38', '2026-03-02 18:13:38'),
(508, 1, 'GET', 'admin.schedules.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/schedules\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:13:40', '2026-03-02 18:13:40'),
(509, 7, 'GET', 'employee.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-02 18:13:40', '2026-03-02 18:13:40'),
(510, 1, 'GET', 'admin.schedules.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/schedules\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:13:46', '2026-03-02 18:13:46'),
(511, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-02 18:13:56', '2026-03-02 18:13:56'),
(512, 1, 'GET', 'admin.attendance-qr.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:14:02', '2026-03-02 18:14:02'),
(513, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/4\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:14:02', '2026-03-02 18:14:02'),
(514, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/5\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:14:02', '2026-03-02 18:14:02'),
(515, 7, 'GET', 'employee.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-02 18:14:04', '2026-03-02 18:14:04'),
(516, 1, 'POST', 'admin.attendance-qr.generate', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:14:08', '2026-03-02 18:14:08'),
(517, 1, 'GET', 'admin.attendance-qr.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:14:08', '2026-03-02 18:14:08'),
(518, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/6\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:14:09', '2026-03-02 18:14:09'),
(519, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/4\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:14:09', '2026-03-02 18:14:09'),
(520, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/5\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:14:09', '2026-03-02 18:14:09'),
(521, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-02 18:14:14', '2026-03-02 18:14:14'),
(522, 7, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-02 18:14:18', '2026-03-02 18:14:18'),
(523, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-02 18:14:19', '2026-03-02 18:14:19'),
(524, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:14:25', '2026-03-02 18:14:25'),
(525, 1, 'GET', 'admin.employees.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/5\\/edit\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:14:29', '2026-03-02 18:14:29'),
(526, 1, 'PUT', 'admin.employees.update', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/5\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:14:46', '2026-03-02 18:14:46'),
(527, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:14:46', '2026-03-02 18:14:46'),
(528, 1, 'GET', 'admin.attendance-qr.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:14:49', '2026-03-02 18:14:49'),
(529, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/5\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:14:49', '2026-03-02 18:14:49'),
(530, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/4\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:14:49', '2026-03-02 18:14:49'),
(531, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/6\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:14:49', '2026-03-02 18:14:49'),
(532, 7, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-02 18:14:59', '2026-03-02 18:14:59'),
(533, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-02 18:14:59', '2026-03-02 18:14:59'),
(534, 7, 'GET', 'employee.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-02 18:15:02', '2026-03-02 18:15:02'),
(535, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-02 18:15:19', '2026-03-02 18:15:19'),
(536, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:15:22', '2026-03-02 18:15:22'),
(537, 8, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', '2026-03-02 18:16:54', '2026-03-02 18:16:54'),
(538, 8, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', '2026-03-02 18:16:54', '2026-03-02 18:16:54'),
(539, 8, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', '2026-03-02 18:16:54', '2026-03-02 18:16:54'),
(540, 8, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', '2026-03-02 18:17:08', '2026-03-02 18:17:08'),
(541, 8, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', '2026-03-02 18:17:08', '2026-03-02 18:17:08'),
(542, 8, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', '2026-03-02 18:17:12', '2026-03-02 18:17:12'),
(543, 1, 'GET', 'admin.attendance-qr.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:17:16', '2026-03-02 18:17:16'),
(544, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/6\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:17:17', '2026-03-02 18:17:17'),
(545, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/5\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:17:17', '2026-03-02 18:17:17'),
(546, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/4\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:17:17', '2026-03-02 18:17:17'),
(547, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:17:38', '2026-03-02 18:17:38'),
(548, 1, 'GET', 'admin.attendance-qr.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:17:51', '2026-03-02 18:17:51'),
(549, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/6\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:17:51', '2026-03-02 18:17:51'),
(550, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/5\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:17:51', '2026-03-02 18:17:51'),
(551, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/4\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:17:51', '2026-03-02 18:17:51'),
(552, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:18:09', '2026-03-02 18:18:09'),
(553, 8, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '117.20.113.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', '2026-03-02 18:18:20', '2026-03-02 18:18:20'),
(554, 8, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '117.20.113.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', '2026-03-02 18:18:21', '2026-03-02 18:18:21'),
(555, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:18:23', '2026-03-02 18:18:23'),
(556, 1, 'GET', 'admin.attendance-qr.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:18:25', '2026-03-02 18:18:25'),
(557, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/6\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:18:25', '2026-03-02 18:18:25'),
(558, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/5\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:18:25', '2026-03-02 18:18:25'),
(559, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/4\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 18:18:25', '2026-03-02 18:18:25'),
(560, 8, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.113.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', '2026-03-02 18:18:27', '2026-03-02 18:18:27'),
(561, 8, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '117.20.113.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', '2026-03-02 18:19:10', '2026-03-02 18:19:10'),
(562, 8, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '117.20.113.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', '2026-03-02 18:19:11', '2026-03-02 18:19:11'),
(563, 8, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.113.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', '2026-03-02 18:19:15', '2026-03-02 18:19:15'),
(564, 8, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '117.20.113.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', '2026-03-02 18:19:51', '2026-03-02 18:19:51'),
(565, 8, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '117.20.113.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', '2026-03-02 18:19:51', '2026-03-02 18:19:51'),
(566, 8, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.113.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', '2026-03-02 18:19:53', '2026-03-02 18:19:53'),
(567, 8, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.113.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', '2026-03-02 18:20:17', '2026-03-02 18:20:17'),
(568, 8, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.113.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', '2026-03-02 18:20:17', '2026-03-02 18:20:17'),
(569, 8, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.113.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', '2026-03-02 18:20:17', '2026-03-02 18:20:17'),
(570, 8, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '117.20.113.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', '2026-03-02 18:20:17', '2026-03-02 18:20:17'),
(571, 8, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.113.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', '2026-03-02 18:20:18', '2026-03-02 18:20:18'),
(572, 8, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.113.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', '2026-03-02 18:20:18', '2026-03-02 18:20:18'),
(573, 8, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '117.20.113.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', '2026-03-02 18:20:45', '2026-03-02 18:20:45'),
(574, 8, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '117.20.113.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', '2026-03-02 18:20:45', '2026-03-02 18:20:45'),
(575, 8, 'GET', 'employee.salary.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/salary\",\"status\":200}', '117.20.113.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', '2026-03-02 18:20:58', '2026-03-02 18:20:58'),
(576, 8, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '117.20.113.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', '2026-03-02 18:21:04', '2026-03-02 18:21:04'),
(577, 8, 'GET', 'employee.salary.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/salary\",\"status\":200}', '117.20.113.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', '2026-03-02 18:21:22', '2026-03-02 18:21:22'),
(578, 8, 'GET', 'employee.leave.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/leave\",\"status\":200}', '117.20.113.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', '2026-03-02 18:21:23', '2026-03-02 18:21:23'),
(579, 8, 'GET', 'employee.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\",\"status\":200}', '117.20.113.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', '2026-03-02 18:21:26', '2026-03-02 18:21:26'),
(580, 8, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.113.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', '2026-03-02 18:21:28', '2026-03-02 18:21:28'),
(581, 8, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '117.20.113.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', '2026-03-02 18:21:29', '2026-03-02 18:21:29'),
(582, 8, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.113.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', '2026-03-02 18:23:00', '2026-03-02 18:23:00'),
(583, 8, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '117.20.113.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', '2026-03-02 18:23:02', '2026-03-02 18:23:02'),
(584, 8, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.113.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', '2026-03-02 18:23:03', '2026-03-02 18:23:03'),
(585, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '27.109.113.209', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 19:17:28', '2026-03-02 19:17:28'),
(586, 1, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0', '2026-03-02 19:53:20', '2026-03-02 19:53:20'),
(587, 1, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0', '2026-03-02 19:53:21', '2026-03-02 19:53:21'),
(588, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0', '2026-03-02 19:53:21', '2026-03-02 19:53:21'),
(589, 1, 'GET', 'admin.payrolls.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/payrolls\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0', '2026-03-02 19:54:08', '2026-03-02 19:54:08'),
(590, 1, 'GET', 'admin.attendance-qr.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0', '2026-03-02 19:54:35', '2026-03-02 19:54:35'),
(591, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/4\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0', '2026-03-02 19:54:35', '2026-03-02 19:54:35'),
(592, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/5\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0', '2026-03-02 19:54:35', '2026-03-02 19:54:35'),
(593, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/6\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0', '2026-03-02 19:54:35', '2026-03-02 19:54:35'),
(594, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0', '2026-03-02 19:55:04', '2026-03-02 19:55:04'),
(595, 1, 'GET', 'users.photo', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/users\\/4\\/photo\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0', '2026-03-02 19:55:04', '2026-03-02 19:55:04'),
(596, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0', '2026-03-02 19:56:11', '2026-03-02 19:56:11'),
(597, 1, 'GET', 'admin.settings.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/settings\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0', '2026-03-02 19:56:24', '2026-03-02 19:56:24'),
(598, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0', '2026-03-02 19:57:07', '2026-03-02 19:57:07'),
(599, 1, 'GET', 'admin.payrolls.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/payrolls\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0', '2026-03-02 20:07:40', '2026-03-02 20:07:40'),
(600, 1, 'GET', 'admin.payrolls.create', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/payrolls\\/generate\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 Edg/145.0.0.0', '2026-03-02 20:07:54', '2026-03-02 20:07:54'),
(601, 1, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '27.109.113.209', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 20:43:39', '2026-03-02 20:43:39'),
(602, 1, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '27.109.113.209', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 20:43:40', '2026-03-02 20:43:40'),
(603, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '27.109.113.209', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 20:43:41', '2026-03-02 20:43:41'),
(604, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '27.109.113.209', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 20:43:45', '2026-03-02 20:43:45'),
(605, 1, 'GET', 'admin.employees.schedule.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/6\\/schedule\",\"status\":200}', '27.109.113.209', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 20:44:09', '2026-03-02 20:44:09'),
(606, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '27.109.113.209', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 20:44:18', '2026-03-02 20:44:18'),
(607, 1, 'GET', 'admin.employees.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/6\\/edit\",\"status\":200}', '27.109.113.209', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 20:44:20', '2026-03-02 20:44:20'),
(608, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '27.109.113.209', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-02 20:44:30', '2026-03-02 20:44:30'),
(609, 1, 'GET', 'admin.attendance-qr.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":200}', '27.109.113.209', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 20:47:02', '2026-03-02 20:47:02'),
(610, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/6\\/image\",\"status\":200}', '27.109.113.209', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 20:47:02', '2026-03-02 20:47:02'),
(611, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/5\\/image\",\"status\":200}', '27.109.113.209', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 20:47:02', '2026-03-02 20:47:02'),
(612, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/4\\/image\",\"status\":200}', '27.109.113.209', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 20:47:02', '2026-03-02 20:47:02'),
(613, 1, 'GET', 'admin.attendance-qr.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":200}', '27.109.113.209', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 20:47:13', '2026-03-02 20:47:13'),
(614, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/4\\/image\",\"status\":200}', '27.109.113.209', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 20:47:13', '2026-03-02 20:47:13'),
(615, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/5\\/image\",\"status\":200}', '27.109.113.209', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 20:47:13', '2026-03-02 20:47:13'),
(616, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/6\\/image\",\"status\":200}', '27.109.113.209', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-02 20:47:13', '2026-03-02 20:47:13'),
(617, 5, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '27.109.113.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-03 07:29:47', '2026-03-03 07:29:47'),
(618, 5, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '27.109.113.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-03 07:29:47', '2026-03-03 07:29:47'),
(619, 5, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '27.109.113.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-03 07:30:02', '2026-03-03 07:30:02'),
(620, 5, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '27.109.113.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-03 07:30:03', '2026-03-03 07:30:03'),
(621, 5, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '27.109.113.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-03 07:30:13', '2026-03-03 07:30:13'),
(622, 5, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '27.109.113.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-03 07:30:14', '2026-03-03 07:30:14'),
(623, 5, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '27.109.113.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-03 07:30:50', '2026-03-03 07:30:50'),
(624, 5, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-03 07:56:00', '2026-03-03 07:56:00'),
(625, 5, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-03 07:56:00', '2026-03-03 07:56:00'),
(626, 5, 'GET', 'employee.salary.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/salary\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-03 07:56:11', '2026-03-03 07:56:11'),
(627, 5, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-03 07:56:20', '2026-03-03 07:56:20'),
(628, 5, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-03 08:00:42', '2026-03-03 08:00:42'),
(629, 5, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-03 08:00:42', '2026-03-03 08:00:42'),
(630, 5, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-03 08:00:42', '2026-03-03 08:00:42'),
(631, 5, 'GET', 'employee.leave.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/leave\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-03 08:00:48', '2026-03-03 08:00:48'),
(632, 5, 'GET', 'employee.salary.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/salary\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-03 08:00:51', '2026-03-03 08:00:51'),
(633, 5, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-03 08:00:52', '2026-03-03 08:00:52'),
(634, 5, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-03 08:06:01', '2026-03-03 08:06:01'),
(635, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-03 08:06:04', '2026-03-03 08:06:04'),
(636, 5, 'GET', 'employee.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-03 08:06:05', '2026-03-03 08:06:05'),
(637, 5, 'GET', 'employee.leave.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/leave\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-03 08:06:06', '2026-03-03 08:06:06'),
(638, 5, 'GET', 'employee.salary.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/salary\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-03 08:06:07', '2026-03-03 08:06:07'),
(639, 5, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-03 08:06:08', '2026-03-03 08:06:08');
INSERT INTO `activity_logs` (`id`, `user_id`, `action`, `module`, `meta`, `ip_address`, `user_agent`, `created_at`, `updated_at`) VALUES
(640, 1, 'POST', 'generated::cS83D3IVrDg8yL31', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:06:36', '2026-03-03 08:06:36'),
(641, 1, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:06:36', '2026-03-03 08:06:36'),
(642, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:06:36', '2026-03-03 08:06:36'),
(643, 1, 'GET', 'admin.attendance-qr.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:06:41', '2026-03-03 08:06:41'),
(644, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/6\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:06:41', '2026-03-03 08:06:41'),
(645, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/4\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:06:41', '2026-03-03 08:06:41'),
(646, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/5\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:06:41', '2026-03-03 08:06:41'),
(647, 1, 'GET', 'admin.attendance-qr.print', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/4\\/print\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:06:45', '2026-03-03 08:06:45'),
(648, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/4\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:06:45', '2026-03-03 08:06:45'),
(649, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/4\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:07:24', '2026-03-03 08:07:24'),
(650, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:07:51', '2026-03-03 08:07:51'),
(651, 1, 'GET', 'admin.settings.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/settings\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:08:23', '2026-03-03 08:08:23'),
(652, 1, 'PUT', 'admin.settings.update', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/settings\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:08:45', '2026-03-03 08:08:45'),
(653, 1, 'GET', 'admin.settings.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/settings\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:08:45', '2026-03-03 08:08:45'),
(654, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:08:48', '2026-03-03 08:08:48'),
(655, 1, 'GET', 'profile.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/profile\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:09:00', '2026-03-03 08:09:00'),
(656, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:09:03', '2026-03-03 08:09:03'),
(657, 1, 'POST', 'generated::cS83D3IVrDg8yL31', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:09:34', '2026-03-03 08:09:34'),
(658, 1, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:09:34', '2026-03-03 08:09:34'),
(659, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:09:34', '2026-03-03 08:09:34'),
(660, 1, 'GET', 'admin.attendance-qr.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:09:41', '2026-03-03 08:09:41'),
(661, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/6\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:09:42', '2026-03-03 08:09:42'),
(662, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/5\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:09:42', '2026-03-03 08:09:42'),
(663, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/4\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:09:42', '2026-03-03 08:09:42'),
(664, 1, 'GET', 'admin.attendance-qr.print', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/4\\/print\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:09:55', '2026-03-03 08:09:55'),
(665, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/4\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:09:55', '2026-03-03 08:09:55'),
(666, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:12:23', '2026-03-03 08:12:23'),
(667, 1, 'GET', 'users.photo', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/users\\/4\\/photo\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:12:23', '2026-03-03 08:12:23'),
(668, 1, 'GET', 'admin.employees.schedule.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/3\\/schedule\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:12:26', '2026-03-03 08:12:26'),
(669, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:12:31', '2026-03-03 08:12:31'),
(670, 1, 'GET', 'admin.employees.schedule.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/4\\/schedule\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:12:33', '2026-03-03 08:12:33'),
(671, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:12:39', '2026-03-03 08:12:39'),
(672, 1, 'GET', 'admin.employees.schedule.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/5\\/schedule\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:12:41', '2026-03-03 08:12:41'),
(673, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:12:59', '2026-03-03 08:12:59'),
(674, 1, 'GET', 'admin.employees.schedule.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/6\\/schedule\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:13:01', '2026-03-03 08:13:01'),
(675, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:13:11', '2026-03-03 08:13:11'),
(676, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:13:18', '2026-03-03 08:13:18'),
(677, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:13:19', '2026-03-03 08:13:19'),
(678, 1, 'GET', 'admin.employees.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/6\\/edit\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:13:20', '2026-03-03 08:13:20'),
(679, 1, 'PUT', 'admin.employees.update', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/6\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:13:24', '2026-03-03 08:13:24'),
(680, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:13:24', '2026-03-03 08:13:24'),
(681, 1, 'GET', 'admin.employees.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/5\\/edit\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:13:27', '2026-03-03 08:13:27'),
(682, 1, 'PUT', 'admin.employees.update', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/5\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:13:31', '2026-03-03 08:13:31'),
(683, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:13:31', '2026-03-03 08:13:31'),
(684, 1, 'GET', 'admin.employees.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/4\\/edit\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:13:33', '2026-03-03 08:13:33'),
(685, 1, 'PUT', 'admin.employees.update', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/4\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:13:36', '2026-03-03 08:13:36'),
(686, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:13:36', '2026-03-03 08:13:36'),
(687, 1, 'GET', 'admin.branches.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:14:01', '2026-03-03 08:14:01'),
(688, 1, 'DELETE', 'admin.branches.destroy', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\\/4\",\"status\":500}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:14:05', '2026-03-03 08:14:05'),
(689, 1, 'DELETE', 'admin.branches.destroy', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\\/4\",\"status\":500}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:14:08', '2026-03-03 08:14:08'),
(690, 1, 'GET', 'admin.branches.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:14:10', '2026-03-03 08:14:10'),
(691, 1, 'GET', 'admin.branches.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:14:11', '2026-03-03 08:14:11'),
(692, 1, 'GET', 'admin.branches.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:14:11', '2026-03-03 08:14:11'),
(693, 1, 'GET', 'admin.branches.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:14:11', '2026-03-03 08:14:11'),
(694, 1, 'GET', 'admin.payrolls.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/payrolls\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:14:17', '2026-03-03 08:14:17'),
(695, 1, 'GET', 'admin.leave-requests.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/leave-requests\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:14:19', '2026-03-03 08:14:19'),
(696, 1, 'GET', 'admin.overtime-requests.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/overtime-requests\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:14:19', '2026-03-03 08:14:19'),
(697, 1, 'GET', 'admin.change-dayoff-requests.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/change-dayoff-requests\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:14:20', '2026-03-03 08:14:20'),
(698, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:14:22', '2026-03-03 08:14:22'),
(699, 1, 'GET', 'admin.attendance-qr.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:14:24', '2026-03-03 08:14:24'),
(700, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/5\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:14:24', '2026-03-03 08:14:24'),
(701, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/6\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:14:24', '2026-03-03 08:14:24'),
(702, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/4\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:14:24', '2026-03-03 08:14:24'),
(703, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 08:14:28', '2026-03-03 08:14:28'),
(704, 5, 'GET', 'generated::r1Jpyr9u0WriBbRL', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '27.109.113.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-03 08:15:53', '2026-03-03 08:15:53'),
(705, 5, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '27.109.113.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-03 08:15:54', '2026-03-03 08:15:54'),
(706, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '27.109.113.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-03 08:15:56', '2026-03-03 08:15:56'),
(707, 1, 'POST', 'generated::cS83D3IVrDg8yL31', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:04:36', '2026-03-03 10:04:36'),
(708, 1, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:04:36', '2026-03-03 10:04:36'),
(709, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:04:36', '2026-03-03 10:04:36'),
(710, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:04:53', '2026-03-03 10:04:53'),
(711, 1, 'GET', 'admin.employees.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/6\\/edit\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:04:59', '2026-03-03 10:04:59'),
(712, 1, 'PUT', 'admin.employees.update', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/6\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:09:12', '2026-03-03 10:09:12'),
(713, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:09:13', '2026-03-03 10:09:13'),
(714, 1, 'GET', 'admin.employees.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/5\\/edit\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:09:22', '2026-03-03 10:09:22'),
(715, 1, 'PUT', 'admin.employees.update', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/5\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:14:47', '2026-03-03 10:14:47'),
(716, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:14:47', '2026-03-03 10:14:47'),
(717, 1, 'GET', 'admin.employees.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/4\\/edit\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:15:00', '2026-03-03 10:15:00'),
(718, 1, 'PUT', 'admin.employees.update', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/4\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:16:23', '2026-03-03 10:16:23'),
(719, 1, 'GET', 'admin.employees.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/4\\/edit\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:16:23', '2026-03-03 10:16:23'),
(720, 1, 'PUT', 'admin.employees.update', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/4\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:17:06', '2026-03-03 10:17:06'),
(721, 1, 'GET', 'admin.employees.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/4\\/edit\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:17:06', '2026-03-03 10:17:06'),
(722, 1, 'PUT', 'admin.employees.update', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/4\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:18:00', '2026-03-03 10:18:00'),
(723, 1, 'GET', 'admin.employees.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/4\\/edit\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:18:00', '2026-03-03 10:18:00'),
(724, 1, 'PUT', 'admin.employees.update', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/4\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:18:17', '2026-03-03 10:18:17'),
(725, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:18:17', '2026-03-03 10:18:17'),
(726, 1, 'GET', 'admin.employees.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/3\\/edit\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:18:25', '2026-03-03 10:18:25'),
(727, 1, 'PUT', 'admin.employees.update', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/3\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:18:51', '2026-03-03 10:18:51'),
(728, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:18:51', '2026-03-03 10:18:51'),
(729, 1, 'GET', 'admin.attendance-qr.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:19:09', '2026-03-03 10:19:09'),
(730, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/6\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:19:09', '2026-03-03 10:19:09'),
(731, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/4\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:19:09', '2026-03-03 10:19:09'),
(732, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/5\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:19:09', '2026-03-03 10:19:09'),
(733, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/4\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:19:14', '2026-03-03 10:19:14'),
(734, 1, 'GET', 'admin.attendance-qr.print', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/4\\/print\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:19:34', '2026-03-03 10:19:34'),
(735, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/4\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:19:34', '2026-03-03 10:19:34'),
(736, 5, 'GET', 'generated::r1Jpyr9u0WriBbRL', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '27.109.113.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-03 10:21:15', '2026-03-03 10:21:15'),
(737, 5, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '27.109.113.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-03 10:21:16', '2026-03-03 10:21:16'),
(738, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '27.109.113.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-03 10:21:18', '2026-03-03 10:21:18'),
(739, 5, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '27.109.113.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-03 10:21:22', '2026-03-03 10:21:22'),
(740, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '27.109.113.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-03 10:21:22', '2026-03-03 10:21:22'),
(741, 5, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '27.109.113.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-03 10:21:49', '2026-03-03 10:21:49'),
(742, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '27.109.113.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-03 10:21:49', '2026-03-03 10:21:49'),
(743, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/4\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:22:43', '2026-03-03 10:22:43'),
(744, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:23:34', '2026-03-03 10:23:34'),
(745, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:25:41', '2026-03-03 10:25:41'),
(746, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:25:54', '2026-03-03 10:25:54'),
(747, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:26:20', '2026-03-03 10:26:20'),
(748, 1, 'GET', 'admin.change-dayoff-requests.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/change-dayoff-requests\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:26:31', '2026-03-03 10:26:31'),
(749, 1, 'GET', 'admin.overtime-requests.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/overtime-requests\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:26:40', '2026-03-03 10:26:40'),
(750, 1, 'GET', 'admin.leave-requests.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/leave-requests\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:26:44', '2026-03-03 10:26:44'),
(751, 1, 'GET', 'admin.settings.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/settings\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:26:48', '2026-03-03 10:26:48'),
(752, 1, 'POST', 'generated::cS83D3IVrDg8yL31', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:27:03', '2026-03-03 10:27:03'),
(753, 1, 'GET', 'admin.attendance-qr.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:27:03', '2026-03-03 10:27:03'),
(754, 1, 'GET', 'admin.attendance-qr.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:27:03', '2026-03-03 10:27:03'),
(755, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/6\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:27:03', '2026-03-03 10:27:03'),
(756, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/5\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:27:03', '2026-03-03 10:27:03'),
(757, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/4\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:27:03', '2026-03-03 10:27:03'),
(758, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/4\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:27:03', '2026-03-03 10:27:03'),
(759, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/5\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:27:03', '2026-03-03 10:27:03'),
(760, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/6\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:27:03', '2026-03-03 10:27:03'),
(761, 1, 'GET', 'admin.attendance-qr.print', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/5\\/print\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:27:07', '2026-03-03 10:27:07'),
(762, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/5\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:27:07', '2026-03-03 10:27:07'),
(763, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:27:23', '2026-03-03 10:27:23'),
(764, 1, 'GET', 'admin.employees.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/3\\/edit\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:27:26', '2026-03-03 10:27:26'),
(765, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:27:28', '2026-03-03 10:27:28'),
(766, 1, 'POST', 'admin.attendance-qr.generate', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:27:52', '2026-03-03 10:27:52'),
(767, 1, 'GET', 'admin.attendance-qr.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:27:52', '2026-03-03 10:27:52'),
(768, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/6\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:27:52', '2026-03-03 10:27:52'),
(769, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/5\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:27:52', '2026-03-03 10:27:52'),
(770, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/7\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:27:52', '2026-03-03 10:27:52'),
(771, 1, 'GET', 'admin.settings.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/settings\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:28:26', '2026-03-03 10:28:26'),
(772, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:28:47', '2026-03-03 10:28:47'),
(773, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:28:51', '2026-03-03 10:28:51'),
(774, 1, 'GET', 'admin.attendance-qr.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:28:54', '2026-03-03 10:28:54'),
(775, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/7\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:28:54', '2026-03-03 10:28:54'),
(776, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/6\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:28:54', '2026-03-03 10:28:54'),
(777, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/5\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:28:54', '2026-03-03 10:28:54'),
(778, 1, 'GET', 'admin.branches.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:29:06', '2026-03-03 10:29:06'),
(779, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:29:11', '2026-03-03 10:29:11'),
(780, 5, 'GET', 'generated::r1Jpyr9u0WriBbRL', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '27.109.113.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-03 10:29:26', '2026-03-03 10:29:26'),
(781, 5, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '27.109.113.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-03 10:29:27', '2026-03-03 10:29:27'),
(782, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '27.109.113.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-03 10:29:29', '2026-03-03 10:29:29'),
(783, 1, 'GET', 'admin.attendance-qr.print', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/7\\/print\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:29:51', '2026-03-03 10:29:51'),
(784, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/7\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:29:51', '2026-03-03 10:29:51'),
(785, 5, 'GET', 'generated::r1Jpyr9u0WriBbRL', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '27.109.113.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-03 10:29:55', '2026-03-03 10:29:55'),
(786, 5, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '27.109.113.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-03 10:29:55', '2026-03-03 10:29:55'),
(787, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '27.109.113.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-03 10:30:30', '2026-03-03 10:30:30'),
(788, 5, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '27.109.113.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-03 10:30:36', '2026-03-03 10:30:36'),
(789, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '27.109.113.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-03 10:30:36', '2026-03-03 10:30:36'),
(790, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:31:44', '2026-03-03 10:31:44'),
(791, 1, 'GET', 'admin.branches.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:31:56', '2026-03-03 10:31:56'),
(792, 1, 'GET', 'admin.branches.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\\/3\\/edit\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:31:57', '2026-03-03 10:31:57'),
(793, 1, 'GET', 'admin.branches.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:32:02', '2026-03-03 10:32:02'),
(794, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:32:04', '2026-03-03 10:32:04'),
(795, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:32:10', '2026-03-03 10:32:10'),
(796, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=late\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:32:19', '2026-03-03 10:32:19'),
(797, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=all\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:32:19', '2026-03-03 10:32:19'),
(798, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:32:29', '2026-03-03 10:32:29');
INSERT INTO `activity_logs` (`id`, `user_id`, `action`, `module`, `meta`, `ip_address`, `user_agent`, `created_at`, `updated_at`) VALUES
(799, 1, 'GET', 'admin.settings.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/settings\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:34:53', '2026-03-03 10:34:53'),
(800, 1, 'PUT', 'admin.settings.update', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/settings\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:35:01', '2026-03-03 10:35:01'),
(801, 1, 'GET', 'admin.settings.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/settings\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:35:01', '2026-03-03 10:35:01'),
(802, 1, 'PUT', 'admin.settings.update', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/settings\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:35:45', '2026-03-03 10:35:45'),
(803, 1, 'GET', 'admin.settings.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/settings\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:35:45', '2026-03-03 10:35:45'),
(804, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:36:00', '2026-03-03 10:36:00'),
(805, 1, 'GET', 'admin.attendance-qr.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:36:08', '2026-03-03 10:36:08'),
(806, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/7\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:36:09', '2026-03-03 10:36:09'),
(807, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/5\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:36:09', '2026-03-03 10:36:09'),
(808, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/6\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 10:36:09', '2026-03-03 10:36:09'),
(809, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 11:15:59', '2026-03-03 11:15:59'),
(810, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 11:16:32', '2026-03-03 11:16:32'),
(811, 1, 'GET', 'admin.employees.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/3\\/edit\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 11:16:42', '2026-03-03 11:16:42'),
(812, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 11:32:07', '2026-03-03 11:32:07'),
(813, 7, 'GET', 'generated::r1Jpyr9u0WriBbRL', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '117.20.113.16', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-03 12:25:52', '2026-03-03 12:25:52'),
(814, 7, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '117.20.113.16', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-03 12:25:52', '2026-03-03 12:25:52'),
(815, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-03 12:25:56', '2026-03-03 12:25:56'),
(816, 7, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-03 12:26:02', '2026-03-03 12:26:02'),
(817, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-03 12:26:02', '2026-03-03 12:26:02'),
(818, 1, 'POST', 'generated::cS83D3IVrDg8yL31', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 12:39:42', '2026-03-03 12:39:42'),
(819, 1, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 12:39:43', '2026-03-03 12:39:43'),
(820, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 12:39:43', '2026-03-03 12:39:43'),
(821, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 12:39:57', '2026-03-03 12:39:57'),
(822, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 12:39:58', '2026-03-03 12:39:58'),
(823, 1, 'GET', 'admin.employees.schedule.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/5\\/schedule\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 12:40:03', '2026-03-03 12:40:03'),
(824, 1, 'POST', 'admin.employees.schedule.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/5\\/schedule\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 12:40:25', '2026-03-03 12:40:25'),
(825, 1, 'GET', 'admin.employees.schedule.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/5\\/schedule\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 12:40:25', '2026-03-03 12:40:25'),
(826, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 12:40:32', '2026-03-03 12:40:32'),
(827, 1, 'GET', 'admin.employees.schedule.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/4\\/schedule\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 12:40:36', '2026-03-03 12:40:36'),
(828, 1, 'POST', 'admin.employees.schedule.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/4\\/schedule\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 12:40:55', '2026-03-03 12:40:55'),
(829, 1, 'GET', 'admin.employees.schedule.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/4\\/schedule\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 12:40:55', '2026-03-03 12:40:55'),
(830, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 12:40:57', '2026-03-03 12:40:57'),
(831, 1, 'GET', 'admin.employees.schedule.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/5\\/schedule\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 12:41:00', '2026-03-03 12:41:00'),
(832, 1, 'POST', 'admin.employees.schedule.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/5\\/schedule\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 12:41:05', '2026-03-03 12:41:05'),
(833, 1, 'GET', 'admin.employees.schedule.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/5\\/schedule\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 12:41:05', '2026-03-03 12:41:05'),
(834, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 12:41:07', '2026-03-03 12:41:07'),
(835, 1, 'GET', 'admin.employees.schedule.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/4\\/schedule\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 12:41:10', '2026-03-03 12:41:10'),
(836, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 12:41:15', '2026-03-03 12:41:15'),
(837, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 12:41:17', '2026-03-03 12:41:17'),
(838, 1, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 13:27:32', '2026-03-03 13:27:32'),
(839, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 13:27:32', '2026-03-03 13:27:32'),
(840, 1, 'GET', 'admin.attendance-qr.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 13:27:48', '2026-03-03 13:27:48'),
(841, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/5\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 13:27:48', '2026-03-03 13:27:48'),
(842, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/6\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 13:27:48', '2026-03-03 13:27:48'),
(843, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/7\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 13:27:48', '2026-03-03 13:27:48'),
(844, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 13:27:49', '2026-03-03 13:27:49'),
(845, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=late\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 13:27:53', '2026-03-03 13:27:53'),
(846, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=all\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 13:27:55', '2026-03-03 13:27:55'),
(847, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=all\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 13:27:57', '2026-03-03 13:27:57'),
(848, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 13:27:59', '2026-03-03 13:27:59'),
(849, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 13:28:03', '2026-03-03 13:28:03'),
(850, 1, 'GET', 'admin.departments.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/departments\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 13:28:05', '2026-03-03 13:28:05'),
(851, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 13:28:07', '2026-03-03 13:28:07'),
(852, 5, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 13:30:44', '2026-03-03 13:30:44'),
(853, 5, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 13:30:44', '2026-03-03 13:30:44'),
(854, 5, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 13:30:44', '2026-03-03 13:30:44'),
(855, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 13:30:46', '2026-03-03 13:30:46'),
(856, 5, 'GET', 'employee.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 13:30:48', '2026-03-03 13:30:48'),
(857, 5, 'GET', 'employee.leave.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/leave\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 13:30:48', '2026-03-03 13:30:48'),
(858, 5, 'GET', 'employee.salary.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/salary\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 13:30:49', '2026-03-03 13:30:49'),
(859, 5, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 13:30:50', '2026-03-03 13:30:50'),
(860, 5, 'GET', 'employee.leave.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/leave\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', '2026-03-03 13:30:53', '2026-03-03 13:30:53'),
(861, 5, 'GET', 'employee.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', '2026-03-03 13:30:55', '2026-03-03 13:30:55'),
(862, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', '2026-03-03 13:30:56', '2026-03-03 13:30:56'),
(863, 5, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', '2026-03-03 13:30:57', '2026-03-03 13:30:57'),
(864, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', '2026-03-03 13:31:02', '2026-03-03 13:31:02'),
(865, 5, 'GET', 'employee.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', '2026-03-03 13:31:06', '2026-03-03 13:31:06'),
(866, 5, 'GET', 'employee.leave.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/leave\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', '2026-03-03 13:31:11', '2026-03-03 13:31:11'),
(867, 5, 'GET', 'employee.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', '2026-03-03 13:31:12', '2026-03-03 13:31:12'),
(868, 5, 'GET', 'employee.salary.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/salary\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', '2026-03-03 13:31:14', '2026-03-03 13:31:14'),
(869, 5, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', '2026-03-03 13:31:16', '2026-03-03 13:31:16'),
(870, 1, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 13:32:48', '2026-03-03 13:32:48'),
(871, 1, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 13:32:48', '2026-03-03 13:32:48'),
(872, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 13:32:48', '2026-03-03 13:32:48'),
(873, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 13:33:28', '2026-03-03 13:33:28'),
(874, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 13:45:19', '2026-03-03 13:45:19'),
(875, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 13:46:47', '2026-03-03 13:46:47'),
(876, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=late\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 13:46:49', '2026-03-03 13:46:49'),
(877, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=all\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 13:46:50', '2026-03-03 13:46:50'),
(878, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=late\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 13:46:51', '2026-03-03 13:46:51'),
(879, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=all\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 13:46:52', '2026-03-03 13:46:52'),
(880, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 13:47:32', '2026-03-03 13:47:32'),
(881, 1, 'GET', 'admin.employees.schedule.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/3\\/schedule\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 13:47:39', '2026-03-03 13:47:39'),
(882, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 13:47:44', '2026-03-03 13:47:44'),
(883, 6, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-03 16:45:23', '2026-03-03 16:45:23'),
(884, 6, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-03 16:45:23', '2026-03-03 16:45:23'),
(885, 6, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-03 16:45:29', '2026-03-03 16:45:29'),
(886, 6, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-03 16:45:36', '2026-03-03 16:45:36'),
(887, 6, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-03 16:45:36', '2026-03-03 16:45:36'),
(888, 1, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 16:58:23', '2026-03-03 16:58:23'),
(889, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 16:58:23', '2026-03-03 16:58:23'),
(890, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 16:58:38', '2026-03-03 16:58:38'),
(891, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 16:58:40', '2026-03-03 16:58:40'),
(892, 1, 'GET', 'admin.employees.schedule.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/4\\/schedule\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 16:58:44', '2026-03-03 16:58:44'),
(893, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 16:58:52', '2026-03-03 16:58:52'),
(894, 5, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '27.109.113.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-03 17:18:04', '2026-03-03 17:18:04'),
(895, 5, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '27.109.113.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-03 17:18:04', '2026-03-03 17:18:04'),
(896, 5, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '27.109.113.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-03 17:18:04', '2026-03-03 17:18:04'),
(897, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '27.109.113.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-03 17:18:06', '2026-03-03 17:18:06'),
(898, 5, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '27.109.113.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-03 17:18:12', '2026-03-03 17:18:12'),
(899, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '27.109.113.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-03 17:18:13', '2026-03-03 17:18:13'),
(900, 1, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '117.20.112.75', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 18:22:16', '2026-03-03 18:22:16'),
(901, 1, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '117.20.112.75', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 18:22:16', '2026-03-03 18:22:16'),
(902, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '117.20.112.75', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 18:22:17', '2026-03-03 18:22:17'),
(903, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance\",\"status\":200}', '117.20.112.75', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 18:22:21', '2026-03-03 18:22:21'),
(904, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '117.20.112.75', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 18:22:27', '2026-03-03 18:22:27'),
(905, 1, 'GET', 'users.photo', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/users\\/4\\/photo\",\"status\":200}', '117.20.112.75', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 18:22:28', '2026-03-03 18:22:28'),
(906, 1, 'GET', 'admin.employees.schedule.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/4\\/schedule\",\"status\":200}', '117.20.112.75', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-03 18:22:34', '2026-03-03 18:22:34'),
(907, 5, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '117.20.112.75', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-03 19:54:42', '2026-03-03 19:54:42'),
(908, 5, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '117.20.112.75', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-03 19:54:42', '2026-03-03 19:54:42'),
(909, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.112.75', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-03 19:54:44', '2026-03-03 19:54:44'),
(910, 5, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '117.20.112.75', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-03 19:54:45', '2026-03-03 19:54:45'),
(911, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.112.75', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-03 19:54:51', '2026-03-03 19:54:51'),
(912, 5, 'GET', 'employee.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\",\"status\":200}', '117.20.112.75', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-03 19:54:55', '2026-03-03 19:54:55'),
(913, 5, 'GET', 'employee.leave.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/leave\",\"status\":200}', '117.20.112.75', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-03 19:54:59', '2026-03-03 19:54:59'),
(914, 5, 'GET', 'employee.salary.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/salary\",\"status\":200}', '117.20.112.75', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-03 19:55:01', '2026-03-03 19:55:01'),
(915, 5, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '117.20.112.75', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-03 19:55:11', '2026-03-03 19:55:11'),
(916, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.112.75', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-03 19:55:16', '2026-03-03 19:55:16'),
(917, 5, 'GET', 'employee.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\",\"status\":200}', '117.20.112.75', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-03 19:55:20', '2026-03-03 19:55:20'),
(918, 6, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-03 21:38:35', '2026-03-03 21:38:35'),
(919, 6, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-03 21:38:35', '2026-03-03 21:38:35'),
(920, 6, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-03 21:38:45', '2026-03-03 21:38:45'),
(921, 6, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-03 21:38:55', '2026-03-03 21:38:55'),
(922, 6, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-03 21:38:55', '2026-03-03 21:38:55'),
(923, 7, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '117.20.116.178', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-03 21:41:12', '2026-03-03 21:41:12'),
(924, 7, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '117.20.116.178', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-03 21:41:12', '2026-03-03 21:41:12'),
(925, 7, 'GET', 'employee.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\",\"status\":200}', '117.20.116.178', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-03 21:41:16', '2026-03-03 21:41:16'),
(926, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.116.178', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-03 21:41:19', '2026-03-03 21:41:19'),
(927, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.116.178', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-03 21:41:20', '2026-03-03 21:41:20'),
(928, 7, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '117.20.116.178', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-03 21:41:27', '2026-03-03 21:41:27'),
(929, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.116.178', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-03 21:41:27', '2026-03-03 21:41:27'),
(930, 7, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '117.20.116.178', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-03 21:41:31', '2026-03-03 21:41:31'),
(931, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.116.178', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-03 21:41:32', '2026-03-03 21:41:32'),
(932, 7, 'GET', 'employee.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\",\"status\":200}', '117.20.116.178', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-03 21:42:03', '2026-03-03 21:42:03'),
(933, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.116.178', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-03 21:42:04', '2026-03-03 21:42:04'),
(934, 7, 'GET', 'employee.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\",\"status\":200}', '117.20.116.178', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-03 21:42:05', '2026-03-03 21:42:05'),
(935, 5, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-04 07:36:49', '2026-03-04 07:36:49'),
(936, 5, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-04 07:36:50', '2026-03-04 07:36:50'),
(937, 5, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-04 07:36:50', '2026-03-04 07:36:50'),
(938, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-04 07:36:52', '2026-03-04 07:36:52'),
(939, 5, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-04 07:36:56', '2026-03-04 07:36:56'),
(940, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-04 07:36:56', '2026-03-04 07:36:56'),
(941, 7, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-04 12:29:22', '2026-03-04 12:29:22'),
(942, 7, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-04 12:29:22', '2026-03-04 12:29:22'),
(943, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-04 12:29:25', '2026-03-04 12:29:25'),
(944, 7, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-04 12:29:31', '2026-03-04 12:29:31'),
(945, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-04 12:29:31', '2026-03-04 12:29:31'),
(946, 7, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-04 12:29:33', '2026-03-04 12:29:33'),
(947, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-04 12:29:34', '2026-03-04 12:29:34'),
(948, 6, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-04 17:07:21', '2026-03-04 17:07:21'),
(949, 6, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-04 17:07:22', '2026-03-04 17:07:22'),
(950, 6, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-04 17:07:26', '2026-03-04 17:07:26'),
(951, 6, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-04 17:07:32', '2026-03-04 17:07:32'),
(952, 6, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-04 17:07:33', '2026-03-04 17:07:33'),
(953, 8, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', '2026-03-04 17:51:30', '2026-03-04 17:51:30'),
(954, 8, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', '2026-03-04 17:51:31', '2026-03-04 17:51:31'),
(955, 5, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '27.109.113.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-04 17:53:45', '2026-03-04 17:53:45');
INSERT INTO `activity_logs` (`id`, `user_id`, `action`, `module`, `meta`, `ip_address`, `user_agent`, `created_at`, `updated_at`) VALUES
(956, 5, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '27.109.113.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-04 17:53:45', '2026-03-04 17:53:45'),
(957, 5, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '27.109.113.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-04 17:53:46', '2026-03-04 17:53:46'),
(958, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '27.109.113.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-04 17:53:52', '2026-03-04 17:53:52'),
(959, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '27.109.113.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-04 17:53:53', '2026-03-04 17:53:53'),
(960, 5, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '27.109.113.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-04 17:53:59', '2026-03-04 17:53:59'),
(961, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '27.109.113.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-04 17:54:00', '2026-03-04 17:54:00'),
(962, 1, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-04 18:04:00', '2026-03-04 18:04:00'),
(963, 1, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-04 18:04:00', '2026-03-04 18:04:00'),
(964, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-04 18:04:00', '2026-03-04 18:04:00'),
(965, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-04 18:04:05', '2026-03-04 18:04:05'),
(966, 1, 'GET', 'admin.employees.schedule.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/5\\/schedule\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-04 18:04:08', '2026-03-04 18:04:08'),
(967, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-04 18:04:20', '2026-03-04 18:04:20'),
(968, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=late\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-04 18:04:26', '2026-03-04 18:04:26'),
(969, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=all\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-04 18:04:28', '2026-03-04 18:04:28'),
(970, 1, 'GET', 'admin.attendance-qr.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-04 18:04:30', '2026-03-04 18:04:30'),
(971, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/7\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-04 18:04:30', '2026-03-04 18:04:30'),
(972, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/6\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-04 18:04:30', '2026-03-04 18:04:30'),
(973, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/5\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-04 18:04:30', '2026-03-04 18:04:30'),
(974, 1, 'GET', 'admin.attendance-qr.print', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/7\\/print\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-04 18:04:40', '2026-03-04 18:04:40'),
(975, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/7\\/image\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-04 18:04:40', '2026-03-04 18:04:40'),
(976, 1, 'GET', 'admin.leave-requests.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/leave-requests\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-04 18:04:46', '2026-03-04 18:04:46'),
(977, 1, 'GET', 'admin.leave-requests.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/leave-requests\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-04 18:04:48', '2026-03-04 18:04:48'),
(978, 1, 'GET', 'admin.overtime-requests.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/overtime-requests\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-04 18:04:48', '2026-03-04 18:04:48'),
(979, 1, 'GET', 'admin.change-dayoff-requests.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/change-dayoff-requests\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-04 18:04:49', '2026-03-04 18:04:49'),
(980, 1, 'GET', 'admin.payrolls.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/payrolls\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-04 18:04:51', '2026-03-04 18:04:51'),
(981, 1, 'GET', 'admin.branches.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-04 18:04:53', '2026-03-04 18:04:53'),
(982, 1, 'GET', 'admin.settings.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/settings\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-04 18:04:57', '2026-03-04 18:04:57'),
(983, 1, 'GET', 'admin.branches.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-04 18:04:59', '2026-03-04 18:04:59'),
(984, 1, 'GET', 'admin.branches.create', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\\/create\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-04 18:05:01', '2026-03-04 18:05:01'),
(985, 1, 'GET', 'admin.branches.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/branches\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-04 18:05:22', '2026-03-04 18:05:22'),
(986, 1, 'GET', 'admin.settings.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/settings\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-04 18:05:24', '2026-03-04 18:05:24'),
(987, 5, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-04 18:05:48', '2026-03-04 18:05:48'),
(988, 5, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-04 18:05:48', '2026-03-04 18:05:48'),
(989, 5, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-04 18:05:48', '2026-03-04 18:05:48'),
(990, 5, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-04 18:05:52', '2026-03-04 18:05:52'),
(991, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 13; SM-G981B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-04 18:05:55', '2026-03-04 18:05:55'),
(992, 5, 'GET', 'employee.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 13; SM-G981B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-04 18:06:02', '2026-03-04 18:06:02'),
(993, 5, 'GET', 'employee.leave.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/leave\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 13; SM-G981B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-04 18:06:18', '2026-03-04 18:06:18'),
(994, 5, 'GET', 'employee.salary.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/salary\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 13; SM-G981B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-04 18:06:40', '2026-03-04 18:06:40'),
(995, 5, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Linux; Android 13; SM-G981B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-04 18:06:43', '2026-03-04 18:06:43'),
(996, 7, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '117.20.117.57', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-04 21:34:47', '2026-03-04 21:34:47'),
(997, 6, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-04 21:34:47', '2026-03-04 21:34:47'),
(998, 7, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '117.20.117.57', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-04 21:34:47', '2026-03-04 21:34:47'),
(999, 6, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-04 21:34:47', '2026-03-04 21:34:47'),
(1000, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.117.57', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-04 21:34:54', '2026-03-04 21:34:54'),
(1001, 6, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-04 21:34:56', '2026-03-04 21:34:56'),
(1002, 6, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-04 21:34:56', '2026-03-04 21:34:56'),
(1003, 6, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-04 21:35:03', '2026-03-04 21:35:03'),
(1004, 6, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-04 21:35:03', '2026-03-04 21:35:03'),
(1005, 7, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '117.20.117.57', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-04 21:35:07', '2026-03-04 21:35:07'),
(1006, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.117.57', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-04 21:35:07', '2026-03-04 21:35:07'),
(1007, 7, 'GET', 'employee.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\",\"status\":200}', '117.20.117.57', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-04 21:35:10', '2026-03-04 21:35:10'),
(1008, 7, 'GET', 'employee.leave.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/leave\",\"status\":200}', '117.20.117.57', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-04 21:35:12', '2026-03-04 21:35:12'),
(1009, 7, 'GET', 'employee.salary.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/salary\",\"status\":200}', '117.20.117.57', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-04 21:35:14', '2026-03-04 21:35:14'),
(1010, 7, 'GET', 'employee.leave.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/leave\",\"status\":200}', '117.20.117.57', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-04 21:35:26', '2026-03-04 21:35:26'),
(1011, 7, 'GET', 'employee.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\",\"status\":200}', '117.20.117.57', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-04 21:35:27', '2026-03-04 21:35:27'),
(1012, 7, 'GET', 'employee.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\",\"status\":200}', '117.20.117.57', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-04 21:35:28', '2026-03-04 21:35:28'),
(1013, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.117.57', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-04 21:35:29', '2026-03-04 21:35:29'),
(1014, 7, 'GET', 'employee.salary.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/salary\",\"status\":200}', '117.20.117.57', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-04 21:35:31', '2026-03-04 21:35:31'),
(1015, 5, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '27.109.113.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-05 07:31:42', '2026-03-05 07:31:42'),
(1016, 5, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '27.109.113.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-05 07:31:42', '2026-03-05 07:31:42'),
(1017, 5, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '27.109.113.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-05 07:31:43', '2026-03-05 07:31:43'),
(1018, 1, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '117.20.113.0', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-05 07:32:05', '2026-03-05 07:32:05'),
(1019, 1, 'GET', 'employee.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\",\"status\":403}', '117.20.113.0', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-05 07:32:06', '2026-03-05 07:32:06'),
(1020, 1, 'GET', 'employee.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\",\"status\":403}', '117.20.113.0', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-05 07:32:08', '2026-03-05 07:32:08'),
(1021, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '27.109.113.70', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-05 07:32:10', '2026-03-05 07:32:10'),
(1022, 5, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-05 07:33:54', '2026-03-05 07:33:54'),
(1023, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-05 07:33:56', '2026-03-05 07:33:56'),
(1024, 7, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '27.109.113.171', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-05 12:25:46', '2026-03-05 12:25:46'),
(1025, 7, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '27.109.113.171', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-05 12:25:46', '2026-03-05 12:25:46'),
(1026, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-05 12:25:48', '2026-03-05 12:25:48'),
(1027, 7, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-05 12:25:56', '2026-03-05 12:25:56'),
(1028, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-05 12:25:56', '2026-03-05 12:25:56'),
(1029, 7, 'GET', 'employee.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-05 12:26:04', '2026-03-05 12:26:04'),
(1030, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-05 12:26:07', '2026-03-05 12:26:07'),
(1031, 6, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-05 17:09:03', '2026-03-05 17:09:03'),
(1032, 6, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-05 17:09:03', '2026-03-05 17:09:03'),
(1033, 6, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-05 17:09:06', '2026-03-05 17:09:06'),
(1034, 6, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-05 17:09:12', '2026-03-05 17:09:12'),
(1035, 6, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-05 17:09:12', '2026-03-05 17:09:12'),
(1036, 6, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '58.97.228.240', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-06 00:22:56', '2026-03-06 00:22:56'),
(1037, 6, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '58.97.228.240', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-06 00:22:57', '2026-03-06 00:22:57'),
(1038, 5, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-06 07:29:35', '2026-03-06 07:29:35'),
(1039, 5, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-06 07:29:35', '2026-03-06 07:29:35'),
(1040, 5, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-06 07:29:35', '2026-03-06 07:29:35'),
(1041, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-06 07:29:37', '2026-03-06 07:29:37'),
(1042, 5, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-06 07:29:43', '2026-03-06 07:29:43'),
(1043, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-06 07:29:43', '2026-03-06 07:29:43'),
(1044, 7, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '117.20.116.102', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-06 12:30:21', '2026-03-06 12:30:21'),
(1045, 7, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '117.20.116.102', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-06 12:30:22', '2026-03-06 12:30:22'),
(1046, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.116.102', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-06 12:30:24', '2026-03-06 12:30:24'),
(1047, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-06 12:30:25', '2026-03-06 12:30:25'),
(1048, 7, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-06 12:30:31', '2026-03-06 12:30:31'),
(1049, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-06 12:30:32', '2026-03-06 12:30:32'),
(1050, 7, 'GET', 'employee.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-06 12:30:35', '2026-03-06 12:30:35'),
(1051, 7, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-06 12:30:45', '2026-03-06 12:30:45'),
(1052, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-06 12:30:48', '2026-03-06 12:30:48'),
(1053, 7, 'GET', 'employee.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-06 12:30:49', '2026-03-06 12:30:49'),
(1054, 7, 'GET', 'employee.salary.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/salary\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-06 12:30:55', '2026-03-06 12:30:55'),
(1055, 7, 'GET', 'employee.salary.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/salary\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-06 12:30:55', '2026-03-06 12:30:55'),
(1056, 7, 'GET', 'employee.leave.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/leave\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-06 12:30:56', '2026-03-06 12:30:56'),
(1057, 7, 'GET', 'employee.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-06 12:31:06', '2026-03-06 12:31:06'),
(1058, 7, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-06 12:31:18', '2026-03-06 12:31:18'),
(1059, 7, 'GET', 'employee.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-06 12:31:30', '2026-03-06 12:31:30'),
(1060, 7, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-06 12:32:07', '2026-03-06 12:32:07'),
(1061, 7, 'GET', 'employee.leave.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/leave\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-06 12:32:09', '2026-03-06 12:32:09'),
(1062, 6, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-06 17:00:21', '2026-03-06 17:00:21'),
(1063, 6, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-06 17:00:22', '2026-03-06 17:00:22'),
(1064, 6, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-06 17:00:24', '2026-03-06 17:00:24'),
(1065, 6, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-06 17:00:30', '2026-03-06 17:00:30'),
(1066, 6, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-06 17:00:31', '2026-03-06 17:00:31'),
(1067, 5, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '117.20.116.153', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-06 18:23:40', '2026-03-06 18:23:40'),
(1068, 5, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '117.20.116.153', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-06 18:23:40', '2026-03-06 18:23:40'),
(1069, 5, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '117.20.116.153', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-06 18:23:41', '2026-03-06 18:23:41'),
(1070, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.116.153', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-06 18:23:42', '2026-03-06 18:23:42'),
(1071, 5, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '117.20.116.153', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-06 18:23:48', '2026-03-06 18:23:48'),
(1072, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.116.153', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-06 18:23:48', '2026-03-06 18:23:48'),
(1073, 7, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '117.20.116.50', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-06 21:35:04', '2026-03-06 21:35:04'),
(1074, 7, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '117.20.116.50', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-06 21:35:04', '2026-03-06 21:35:04'),
(1075, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.116.50', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-06 21:35:08', '2026-03-06 21:35:08'),
(1076, 7, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '117.20.116.50', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-06 21:35:15', '2026-03-06 21:35:15'),
(1077, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.116.50', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-06 21:35:15', '2026-03-06 21:35:15'),
(1078, 7, 'GET', 'employee.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\",\"status\":200}', '117.20.116.50', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-06 21:35:19', '2026-03-06 21:35:19'),
(1079, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.116.50', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-06 21:35:19', '2026-03-06 21:35:19'),
(1080, 6, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-06 21:35:32', '2026-03-06 21:35:32'),
(1081, 6, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-06 21:35:32', '2026-03-06 21:35:32'),
(1082, 6, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-06 21:35:36', '2026-03-06 21:35:36'),
(1083, 6, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-06 21:35:42', '2026-03-06 21:35:42'),
(1084, 6, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-06 21:35:42', '2026-03-06 21:35:42'),
(1085, 7, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '117.20.116.50', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-06 22:42:48', '2026-03-06 22:42:48'),
(1086, 7, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '117.20.116.50', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-06 22:42:49', '2026-03-06 22:42:49'),
(1087, 5, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-07 07:31:03', '2026-03-07 07:31:03'),
(1088, 5, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-07 07:31:03', '2026-03-07 07:31:03'),
(1089, 5, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-07 07:31:03', '2026-03-07 07:31:03'),
(1090, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-07 07:31:05', '2026-03-07 07:31:05'),
(1091, 5, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-07 07:31:10', '2026-03-07 07:31:10'),
(1092, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '2026-03-07 07:31:11', '2026-03-07 07:31:11'),
(1093, 8, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '117.20.116.5', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', '2026-03-07 13:48:33', '2026-03-07 13:48:33'),
(1094, 8, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '117.20.116.5', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', '2026-03-07 13:48:33', '2026-03-07 13:48:33'),
(1095, 6, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-07 17:01:24', '2026-03-07 17:01:24'),
(1096, 6, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-07 17:01:24', '2026-03-07 17:01:24'),
(1097, 6, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-07 17:01:26', '2026-03-07 17:01:26'),
(1098, 6, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-07 17:01:32', '2026-03-07 17:01:32'),
(1099, 6, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-07 17:01:32', '2026-03-07 17:01:32'),
(1100, 5, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '117.20.113.20', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-07 22:49:04', '2026-03-07 22:49:04'),
(1101, 5, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '117.20.113.20', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-07 22:49:04', '2026-03-07 22:49:04'),
(1102, 5, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '117.20.113.20', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-07 22:49:05', '2026-03-07 22:49:05'),
(1103, 5, 'GET', 'employee.salary.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/salary\",\"status\":200}', '117.20.113.20', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-07 22:49:08', '2026-03-07 22:49:08'),
(1104, 7, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-08 12:21:21', '2026-03-08 12:21:21'),
(1105, 7, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-08 12:21:21', '2026-03-08 12:21:21'),
(1106, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-08 12:21:23', '2026-03-08 12:21:23'),
(1107, 7, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-08 12:21:26', '2026-03-08 12:21:26'),
(1108, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-08 12:21:27', '2026-03-08 12:21:27');
INSERT INTO `activity_logs` (`id`, `user_id`, `action`, `module`, `meta`, `ip_address`, `user_agent`, `created_at`, `updated_at`) VALUES
(1109, 1, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 12:34:16', '2026-03-08 12:34:16'),
(1110, 1, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 12:34:16', '2026-03-08 12:34:16'),
(1111, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 12:34:16', '2026-03-08 12:34:16'),
(1112, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 12:34:31', '2026-03-08 12:34:31'),
(1113, 1, 'GET', 'users.photo', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/users\\/4\\/photo\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 12:34:31', '2026-03-08 12:34:31'),
(1114, 1, 'GET', 'admin.payrolls.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/payrolls\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 12:34:42', '2026-03-08 12:34:42'),
(1115, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 12:35:00', '2026-03-08 12:35:00'),
(1116, 1, 'GET', 'admin.employees.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/6\\/edit\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 12:35:10', '2026-03-08 12:35:10'),
(1117, 1, 'GET', 'admin.payrolls.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/payrolls\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 12:35:38', '2026-03-08 12:35:38'),
(1118, 1, 'GET', 'admin.payrolls.create', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/payrolls\\/generate\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 12:36:13', '2026-03-08 12:36:13'),
(1119, 1, 'GET', 'admin.payrolls.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/payrolls\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 12:36:46', '2026-03-08 12:36:46'),
(1120, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 12:36:54', '2026-03-08 12:36:54'),
(1121, 1, 'GET', 'admin.employees.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/6\\/edit\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 12:37:07', '2026-03-08 12:37:07'),
(1122, 1, 'GET', 'admin.departments.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/departments\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 12:37:40', '2026-03-08 12:37:40'),
(1123, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 12:37:49', '2026-03-08 12:37:49'),
(1124, 1, 'GET', 'admin.attendance-qr.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 12:38:21', '2026-03-08 12:38:21'),
(1125, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/7\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 12:38:21', '2026-03-08 12:38:21'),
(1126, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/6\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 12:38:21', '2026-03-08 12:38:21'),
(1127, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/5\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 12:38:21', '2026-03-08 12:38:21'),
(1128, 1, 'GET', 'admin.payrolls.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/payrolls\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 12:38:35', '2026-03-08 12:38:35'),
(1129, 1, 'GET', 'admin.payrolls.create', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/payrolls\\/generate\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 12:48:58', '2026-03-08 12:48:58'),
(1130, 1, 'GET', 'admin.payrolls.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/payrolls\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 12:49:06', '2026-03-08 12:49:06'),
(1131, 1, 'GET', 'admin.payrolls.create', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/payrolls\\/generate\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 12:49:10', '2026-03-08 12:49:10'),
(1132, 1, 'POST', 'admin.payrolls.generate', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/payrolls\\/generate\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 12:50:28', '2026-03-08 12:50:28'),
(1133, 1, 'GET', 'admin.payrolls.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/payrolls\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 12:50:28', '2026-03-08 12:50:28'),
(1134, 1, 'GET', 'admin.payrolls.show', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/payrolls\\/1\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 12:50:52', '2026-03-08 12:50:52'),
(1135, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 12:54:16', '2026-03-08 12:54:16'),
(1136, 1, 'GET', 'admin.employees.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/3\\/edit\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 12:54:22', '2026-03-08 12:54:22'),
(1137, 6, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-08 17:10:51', '2026-03-08 17:10:51'),
(1138, 6, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-08 17:10:51', '2026-03-08 17:10:51'),
(1139, 6, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-08 17:10:54', '2026-03-08 17:10:54'),
(1140, 6, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-08 17:11:01', '2026-03-08 17:11:01'),
(1141, 6, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-08 17:11:01', '2026-03-08 17:11:01'),
(1142, 1, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 20:12:43', '2026-03-08 20:12:43'),
(1143, 1, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 20:12:43', '2026-03-08 20:12:43'),
(1144, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 20:12:43', '2026-03-08 20:12:43'),
(1145, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 20:12:51', '2026-03-08 20:12:51'),
(1146, 1, 'GET', 'users.photo', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/users\\/4\\/photo\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 20:12:51', '2026-03-08 20:12:51'),
(1147, 1, 'GET', 'admin.employees.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\\/3\\/edit\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 20:12:57', '2026-03-08 20:12:57'),
(1148, 1, 'GET', 'admin.employees.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/employees\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 20:13:38', '2026-03-08 20:13:38'),
(1149, 1, 'GET', 'admin.payrolls.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/payrolls\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 20:13:43', '2026-03-08 20:13:43'),
(1150, 1, 'GET', 'admin.payrolls.show', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/payrolls\\/1\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 20:13:47', '2026-03-08 20:13:47'),
(1151, 1, 'GET', 'admin.payrolls.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/payrolls\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 20:14:14', '2026-03-08 20:14:14'),
(1152, 1, 'GET', 'admin.payrolls.show', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/payrolls\\/1\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 20:14:16', '2026-03-08 20:14:16'),
(1153, 1, 'GET', 'admin.settings.edit', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/settings\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 20:14:31', '2026-03-08 20:14:31'),
(1154, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 20:15:12', '2026-03-08 20:15:12'),
(1155, 1, 'GET', 'admin.departments.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/departments\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 20:15:16', '2026-03-08 20:15:16'),
(1156, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 20:15:19', '2026-03-08 20:15:19'),
(1157, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=late\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 20:15:31', '2026-03-08 20:15:31'),
(1158, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=rejected\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 20:15:33', '2026-03-08 20:15:33'),
(1159, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=all\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 20:15:34', '2026-03-08 20:15:34'),
(1160, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=late\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 20:15:34', '2026-03-08 20:15:34'),
(1161, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?page=1&tab=all\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 20:15:35', '2026-03-08 20:15:35'),
(1162, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?branch_id=&date=2026-03-07&employee_id=&tab=all\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 20:15:42', '2026-03-08 20:15:42'),
(1163, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?date=2026-03-07&page=1&tab=late\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 20:15:44', '2026-03-08 20:15:44'),
(1164, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?date=2026-03-07&page=1&tab=late\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 20:15:44', '2026-03-08 20:15:44'),
(1165, 1, 'GET', 'admin.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance?date=2026-03-07&page=1&tab=all\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 20:15:46', '2026-03-08 20:15:46'),
(1166, 1, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 20:16:08', '2026-03-08 20:16:08'),
(1167, 1, 'GET', 'admin.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 20:16:08', '2026-03-08 20:16:08'),
(1168, 1, 'GET', 'admin.attendance-qr.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 20:16:18', '2026-03-08 20:16:18'),
(1169, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/6\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 20:16:18', '2026-03-08 20:16:18'),
(1170, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/5\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 20:16:18', '2026-03-08 20:16:18'),
(1171, 1, 'GET', 'admin.attendance-qr.image', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/attendance-qr\\/7\\/image\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 20:16:18', '2026-03-08 20:16:18'),
(1172, 1, 'GET', 'admin.leave-requests.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/leave-requests\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 20:16:29', '2026-03-08 20:16:29'),
(1173, 5, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 20:17:15', '2026-03-08 20:17:15'),
(1174, 5, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 20:17:16', '2026-03-08 20:17:16'),
(1175, 5, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 20:17:16', '2026-03-08 20:17:16'),
(1176, 5, 'GET', 'employee.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-08 20:17:25', '2026-03-08 20:17:25'),
(1177, 5, 'GET', 'employee.salary.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/salary\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-08 20:17:27', '2026-03-08 20:17:27'),
(1178, 5, 'GET', 'employee.salary.download', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/salary\\/1\\/download\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-08 20:17:34', '2026-03-08 20:17:34'),
(1179, 5, 'GET', 'employee.leave.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/leave\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-08 20:17:40', '2026-03-08 20:17:40'),
(1180, 5, 'GET', 'employee.salary.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/salary\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', '2026-03-08 20:17:45', '2026-03-08 20:17:45'),
(1181, 1, 'GET', 'admin.overtime-requests.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/overtime-requests\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 20:17:52', '2026-03-08 20:17:52'),
(1182, 1, 'GET', 'admin.change-dayoff-requests.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/change-dayoff-requests\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 20:17:54', '2026-03-08 20:17:54'),
(1183, 1, 'GET', 'admin.payrolls.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/payrolls\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 20:17:59', '2026-03-08 20:17:59'),
(1184, 1, 'GET', 'admin.payrolls.create', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/payrolls\\/generate\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 20:18:00', '2026-03-08 20:18:00'),
(1185, 1, 'POST', 'admin.payrolls.generate', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/payrolls\\/generate\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 20:18:16', '2026-03-08 20:18:16'),
(1186, 1, 'GET', 'admin.payrolls.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/payrolls\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 20:18:16', '2026-03-08 20:18:16'),
(1187, 1, 'GET', 'admin.payrolls.show', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/payrolls\\/2\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 20:18:36', '2026-03-08 20:18:36'),
(1188, 1, 'GET', 'admin.payrolls.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/payrolls\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 20:18:39', '2026-03-08 20:18:39'),
(1189, 1, 'GET', 'admin.payrolls.show', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/payrolls\\/2\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 20:18:47', '2026-03-08 20:18:47'),
(1190, 1, 'GET', 'admin.payrolls.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/admin\\/payrolls\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-08 20:18:49', '2026-03-08 20:18:49'),
(1191, 7, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-08 21:38:50', '2026-03-08 21:38:50'),
(1192, 7, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-08 21:38:50', '2026-03-08 21:38:50'),
(1193, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-08 21:38:54', '2026-03-08 21:38:54'),
(1194, 7, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-08 21:39:04', '2026-03-08 21:39:04'),
(1195, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-08 21:39:04', '2026-03-08 21:39:04'),
(1196, 7, 'GET', 'employee.salary.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/salary\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-08 21:39:07', '2026-03-08 21:39:07'),
(1197, 6, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-08 21:39:10', '2026-03-08 21:39:10'),
(1198, 6, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-08 21:39:11', '2026-03-08 21:39:11'),
(1199, 6, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-08 21:39:15', '2026-03-08 21:39:15'),
(1200, 6, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-08 21:39:20', '2026-03-08 21:39:20'),
(1201, 6, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-08 21:39:21', '2026-03-08 21:39:21'),
(1202, 8, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '119.13.153.240', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', '2026-03-08 22:30:08', '2026-03-08 22:30:08'),
(1203, 8, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '119.13.153.240', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', '2026-03-08 22:30:09', '2026-03-08 22:30:09'),
(1204, 5, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '27.109.113.95', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-09 07:29:45', '2026-03-09 07:29:45'),
(1205, 5, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '27.109.113.95', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-09 07:29:45', '2026-03-09 07:29:45'),
(1206, 5, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '27.109.113.95', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-09 07:29:46', '2026-03-09 07:29:46'),
(1207, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '27.109.113.95', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-09 07:29:48', '2026-03-09 07:29:48'),
(1208, 5, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '27.109.113.95', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-09 07:29:52', '2026-03-09 07:29:52'),
(1209, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '27.109.113.95', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-09 07:29:53', '2026-03-09 07:29:53'),
(1210, 7, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '117.20.116.32', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-09 12:24:04', '2026-03-09 12:24:04'),
(1211, 7, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '117.20.116.32', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-09 12:24:04', '2026-03-09 12:24:04'),
(1212, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.116.32', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-09 12:24:06', '2026-03-09 12:24:06'),
(1213, 7, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-09 12:24:11', '2026-03-09 12:24:11'),
(1214, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-09 12:24:11', '2026-03-09 12:24:11'),
(1215, 7, 'GET', 'employee.salary.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/salary\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-09 12:24:13', '2026-03-09 12:24:13'),
(1216, 7, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-09 12:24:17', '2026-03-09 12:24:17'),
(1217, 5, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-09 16:49:37', '2026-03-09 16:49:37'),
(1218, 5, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-09 16:49:37', '2026-03-09 16:49:37'),
(1219, 5, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '124.248.164.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', '2026-03-09 16:49:37', '2026-03-09 16:49:37'),
(1220, 6, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-09 17:06:24', '2026-03-09 17:06:24'),
(1221, 6, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-09 17:06:24', '2026-03-09 17:06:24'),
(1222, 6, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-09 17:06:25', '2026-03-09 17:06:25'),
(1223, 6, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-09 17:06:32', '2026-03-09 17:06:32'),
(1224, 6, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-09 17:06:32', '2026-03-09 17:06:32'),
(1225, 5, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '27.109.113.95', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-09 17:56:00', '2026-03-09 17:56:00'),
(1226, 5, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '27.109.113.95', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-09 17:56:00', '2026-03-09 17:56:00'),
(1227, 5, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '27.109.113.95', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-09 17:56:01', '2026-03-09 17:56:01'),
(1228, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '27.109.113.95', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-09 17:56:03', '2026-03-09 17:56:03'),
(1229, 5, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '27.109.113.95', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-09 17:56:07', '2026-03-09 17:56:07'),
(1230, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '27.109.113.95', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-09 17:56:07', '2026-03-09 17:56:07'),
(1231, 6, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-09 21:36:34', '2026-03-09 21:36:34'),
(1232, 6, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-09 21:36:34', '2026-03-09 21:36:34'),
(1233, 6, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-09 21:36:45', '2026-03-09 21:36:45'),
(1234, 7, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '27.109.113.232', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-09 21:36:57', '2026-03-09 21:36:57'),
(1235, 7, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '27.109.113.232', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-09 21:36:57', '2026-03-09 21:36:57'),
(1236, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '27.109.113.232', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-09 21:37:01', '2026-03-09 21:37:01'),
(1237, 7, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '27.109.113.232', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-09 21:37:08', '2026-03-09 21:37:08'),
(1238, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '27.109.113.232', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-09 21:37:08', '2026-03-09 21:37:08'),
(1239, 6, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-09 21:37:14', '2026-03-09 21:37:14'),
(1240, 6, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-09 21:37:14', '2026-03-09 21:37:14'),
(1241, 5, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-10 07:33:31', '2026-03-10 07:33:31'),
(1242, 5, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-10 07:33:31', '2026-03-10 07:33:31'),
(1243, 5, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-10 07:33:31', '2026-03-10 07:33:31'),
(1244, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-10 07:33:33', '2026-03-10 07:33:33'),
(1245, 5, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-10 07:33:37', '2026-03-10 07:33:37'),
(1246, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-10 07:33:37', '2026-03-10 07:33:37'),
(1247, 7, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-10 12:28:23', '2026-03-10 12:28:23'),
(1248, 7, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-10 12:28:23', '2026-03-10 12:28:23'),
(1249, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-10 12:28:28', '2026-03-10 12:28:28'),
(1250, 7, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-10 12:28:36', '2026-03-10 12:28:36'),
(1251, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-10 12:28:37', '2026-03-10 12:28:37'),
(1252, 7, 'GET', 'employee.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-10 12:28:40', '2026-03-10 12:28:40'),
(1253, 7, 'GET', 'employee.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-10 12:28:42', '2026-03-10 12:28:42'),
(1254, 7, 'GET', 'employee.leave.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/leave\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-10 12:28:53', '2026-03-10 12:28:53'),
(1255, 7, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-10 12:29:34', '2026-03-10 12:29:34'),
(1256, 7, 'GET', 'employee.salary.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/salary\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-10 12:29:35', '2026-03-10 12:29:35'),
(1257, 6, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-10 17:01:47', '2026-03-10 17:01:47'),
(1258, 6, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-10 17:01:47', '2026-03-10 17:01:47'),
(1259, 6, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-10 17:01:52', '2026-03-10 17:01:52'),
(1260, 6, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-10 17:01:59', '2026-03-10 17:01:59'),
(1261, 6, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-10 17:02:00', '2026-03-10 17:02:00'),
(1262, 5, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '117.20.115.81', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-10 17:14:40', '2026-03-10 17:14:40'),
(1263, 5, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '117.20.115.81', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-10 17:14:42', '2026-03-10 17:14:42'),
(1264, 5, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '117.20.115.81', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-10 17:14:42', '2026-03-10 17:14:42');
INSERT INTO `activity_logs` (`id`, `user_id`, `action`, `module`, `meta`, `ip_address`, `user_agent`, `created_at`, `updated_at`) VALUES
(1265, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.115.81', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-10 17:14:43', '2026-03-10 17:14:43'),
(1266, 5, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '117.20.115.81', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-10 17:14:47', '2026-03-10 17:14:47'),
(1267, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.115.81', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-10 17:14:47', '2026-03-10 17:14:47'),
(1268, 7, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '117.20.116.212', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-10 21:35:37', '2026-03-10 21:35:37'),
(1269, 7, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '117.20.116.212', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-10 21:35:38', '2026-03-10 21:35:38'),
(1270, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.116.212', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-10 21:35:40', '2026-03-10 21:35:40'),
(1271, 7, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '117.20.116.212', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-10 21:35:51', '2026-03-10 21:35:51'),
(1272, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.116.212', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-10 21:35:51', '2026-03-10 21:35:51'),
(1273, 7, 'GET', 'employee.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\",\"status\":200}', '117.20.116.212', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-10 21:35:53', '2026-03-10 21:35:53'),
(1274, 7, 'GET', 'employee.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\",\"status\":200}', '117.20.116.212', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-10 21:35:53', '2026-03-10 21:35:53'),
(1275, 7, 'GET', 'employee.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\",\"status\":200}', '117.20.116.212', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-10 21:35:54', '2026-03-10 21:35:54'),
(1276, 6, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-10 21:36:26', '2026-03-10 21:36:26'),
(1277, 6, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-10 21:36:26', '2026-03-10 21:36:26'),
(1278, 6, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-10 21:36:30', '2026-03-10 21:36:30'),
(1279, 6, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-10 21:36:35', '2026-03-10 21:36:35'),
(1280, 6, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-10 21:36:35', '2026-03-10 21:36:35'),
(1281, 5, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-11 07:34:10', '2026-03-11 07:34:10'),
(1282, 5, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-11 07:34:11', '2026-03-11 07:34:11'),
(1283, 5, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-11 07:34:11', '2026-03-11 07:34:11'),
(1284, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-11 07:34:12', '2026-03-11 07:34:12'),
(1285, 5, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-11 07:34:19', '2026-03-11 07:34:19'),
(1286, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-11 07:34:19', '2026-03-11 07:34:19'),
(1287, 7, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-11 12:20:42', '2026-03-11 12:20:42'),
(1288, 7, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-11 12:20:43', '2026-03-11 12:20:43'),
(1289, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-11 12:20:50', '2026-03-11 12:20:50'),
(1290, 7, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-11 12:21:03', '2026-03-11 12:21:03'),
(1291, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-11 12:21:03', '2026-03-11 12:21:03'),
(1292, 6, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '36.37.206.79', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-11 17:21:54', '2026-03-11 17:21:54'),
(1293, 6, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '36.37.206.79', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-11 17:21:54', '2026-03-11 17:21:54'),
(1294, 6, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '36.37.206.79', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-11 17:21:57', '2026-03-11 17:21:57'),
(1295, 6, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '36.37.206.79', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-11 17:22:05', '2026-03-11 17:22:05'),
(1296, 6, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '36.37.206.79', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-11 17:22:05', '2026-03-11 17:22:05'),
(1297, 5, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-11 17:32:47', '2026-03-11 17:32:47'),
(1298, 5, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-11 17:32:47', '2026-03-11 17:32:47'),
(1299, 5, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-11 17:32:47', '2026-03-11 17:32:47'),
(1300, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-11 17:32:48', '2026-03-11 17:32:48'),
(1301, 5, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-11 17:32:53', '2026-03-11 17:32:53'),
(1302, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-11 17:32:53', '2026-03-11 17:32:53'),
(1303, 6, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-11 21:32:57', '2026-03-11 21:32:57'),
(1304, 6, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-11 21:32:57', '2026-03-11 21:32:57'),
(1305, 6, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-11 21:32:59', '2026-03-11 21:32:59'),
(1306, 7, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '117.20.113.29', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-11 21:33:03', '2026-03-11 21:33:03'),
(1307, 7, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '117.20.113.29', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-11 21:33:04', '2026-03-11 21:33:04'),
(1308, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.113.29', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-11 21:33:06', '2026-03-11 21:33:06'),
(1309, 6, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-11 21:33:08', '2026-03-11 21:33:08'),
(1310, 6, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-11 21:33:09', '2026-03-11 21:33:09'),
(1311, 7, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '117.20.113.29', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-11 21:33:13', '2026-03-11 21:33:13'),
(1312, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.113.29', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-11 21:33:14', '2026-03-11 21:33:14'),
(1313, 5, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-12 07:37:55', '2026-03-12 07:37:55'),
(1314, 5, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-12 07:37:55', '2026-03-12 07:37:55'),
(1315, 5, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-12 07:37:55', '2026-03-12 07:37:55'),
(1316, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-12 07:37:56', '2026-03-12 07:37:56'),
(1317, 5, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-12 07:38:01', '2026-03-12 07:38:01'),
(1318, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-12 07:38:02', '2026-03-12 07:38:02'),
(1319, 7, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '117.20.113.29', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-12 12:28:20', '2026-03-12 12:28:20'),
(1320, 7, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '117.20.113.29', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-12 12:28:21', '2026-03-12 12:28:21'),
(1321, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.113.29', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-12 12:28:26', '2026-03-12 12:28:26'),
(1322, 7, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-12 12:28:32', '2026-03-12 12:28:32'),
(1323, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-12 12:28:32', '2026-03-12 12:28:32'),
(1324, 5, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '117.20.117.53', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-12 17:13:49', '2026-03-12 17:13:49'),
(1325, 5, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '117.20.117.53', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-12 17:13:49', '2026-03-12 17:13:49'),
(1326, 5, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '117.20.117.53', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-12 17:13:49', '2026-03-12 17:13:49'),
(1327, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.117.53', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-12 17:13:51', '2026-03-12 17:13:51'),
(1328, 5, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '117.20.117.53', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-12 17:13:54', '2026-03-12 17:13:54'),
(1329, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.117.53', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-12 17:13:55', '2026-03-12 17:13:55'),
(1330, 7, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '117.20.113.143', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-12 21:36:47', '2026-03-12 21:36:47'),
(1331, 7, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '117.20.113.143', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-12 21:36:48', '2026-03-12 21:36:48'),
(1332, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.113.143', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-12 21:36:50', '2026-03-12 21:36:50'),
(1333, 7, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '117.20.113.143', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-12 21:37:01', '2026-03-12 21:37:01'),
(1334, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.113.143', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-12 21:37:01', '2026-03-12 21:37:01'),
(1335, 7, 'GET', 'employee.attendance.index', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\",\"status\":200}', '117.20.113.143', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-12 21:37:04', '2026-03-12 21:37:04'),
(1336, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.113.143', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-12 21:37:06', '2026-03-12 21:37:06'),
(1337, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.113.143', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-12 21:37:07', '2026-03-12 21:37:07'),
(1338, 5, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-13 07:36:05', '2026-03-13 07:36:05'),
(1339, 5, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-13 07:36:05', '2026-03-13 07:36:05'),
(1340, 5, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-13 07:36:05', '2026-03-13 07:36:05'),
(1341, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-13 07:36:07', '2026-03-13 07:36:07'),
(1342, 5, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-13 07:36:12', '2026-03-13 07:36:12'),
(1343, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-13 07:36:12', '2026-03-13 07:36:12'),
(1344, 7, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '117.20.113.143', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-13 12:29:03', '2026-03-13 12:29:03'),
(1345, 7, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '117.20.113.143', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-13 12:29:03', '2026-03-13 12:29:03'),
(1346, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.113.143', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-13 12:29:06', '2026-03-13 12:29:06'),
(1347, 7, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '117.20.113.143', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-13 12:29:20', '2026-03-13 12:29:20'),
(1348, 7, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.113.143', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-13 12:29:20', '2026-03-13 12:29:20'),
(1349, 7, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '2026-03-13 12:29:26', '2026-03-13 12:29:26'),
(1350, 6, 'GET', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-13 16:27:12', '2026-03-13 16:27:12'),
(1351, 6, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-13 16:27:12', '2026-03-13 16:27:12'),
(1352, 6, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-13 16:27:13', '2026-03-13 16:27:13'),
(1353, 6, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-13 16:27:19', '2026-03-13 16:27:19'),
(1354, 6, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '2026-03-13 16:27:19', '2026-03-13 16:27:19'),
(1355, 5, 'POST', 'unknown', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/login\",\"status\":302}', '117.20.117.53', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-13 17:05:13', '2026-03-13 17:05:13'),
(1356, 5, 'GET', 'dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/dashboard\",\"status\":302}', '117.20.117.53', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-13 17:05:13', '2026-03-13 17:05:13'),
(1357, 5, 'GET', 'employee.dashboard', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/dashboard\",\"status\":200}', '117.20.117.53', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-13 17:05:14', '2026-03-13 17:05:14'),
(1358, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.117.53', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-13 17:05:15', '2026-03-13 17:05:15'),
(1359, 5, 'POST', 'employee.attendance.store', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":302}', '117.20.117.53', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-13 17:05:21', '2026-03-13 17:05:21'),
(1360, 5, 'GET', 'employee.attendance.scan', '{\"url\":\"https:\\/\\/mekongcyberunit.app\\/employee\\/attendance\\/scan\",\"status\":200}', '117.20.117.53', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '2026-03-13 17:05:21', '2026-03-13 17:05:21');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_logs`
--

CREATE TABLE `attendance_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attendance_session_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `scan_type` enum('morning_in','lunch_out','lunch_in','evening_out') NOT NULL,
  `scanned_at` timestamp NOT NULL,
  `latitude` decimal(10,7) DEFAULT NULL,
  `longitude` decimal(10,7) DEFAULT NULL,
  `distance_from_branch` decimal(10,2) DEFAULT NULL,
  `device_info` varchar(255) DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `qr_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendance_logs`
--

INSERT INTO `attendance_logs` (`id`, `attendance_session_id`, `employee_id`, `branch_id`, `scan_type`, `scanned_at`, `latitude`, `longitude`, `distance_from_branch`, `device_info`, `ip_address`, `qr_token`, `created_at`, `updated_at`) VALUES
(19, 6, 3, 3, 'morning_in', '2026-03-02 18:02:24', 11.5756860, 104.8526890, 9.42, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '117.20.113.86', 'da359a38-2113-4a71-865d-5d9eea81d88f', '2026-03-02 18:02:24', '2026-03-02 18:02:24'),
(20, 6, 3, 3, 'evening_out', '2026-03-02 18:02:34', 11.5756680, 104.8527120, 11.84, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '117.20.113.86', 'da359a38-2113-4a71-865d-5d9eea81d88f', '2026-03-02 18:02:34', '2026-03-02 18:02:34'),
(21, 7, 4, 5, 'morning_in', '2026-03-02 18:10:16', 11.5756220, 104.8526440, 17.04, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '103.206.69.236', '36c267e5-2c7b-4232-b96f-db528b5341ae', '2026-03-02 18:10:16', '2026-03-02 18:10:16'),
(22, 7, 4, 5, 'evening_out', '2026-03-02 18:10:25', 11.5756210, 104.8526430, 17.17, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '103.206.69.236', '36c267e5-2c7b-4232-b96f-db528b5341ae', '2026-03-02 18:10:25', '2026-03-02 18:10:25'),
(23, 9, 5, 4, 'morning_in', '2026-03-02 18:14:58', 11.5756700, 104.8526630, 11.38, 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '103.206.69.236', 'c3d5a0df-0769-4464-bdc0-d7c4317e6ee6', '2026-03-02 18:14:58', '2026-03-02 18:14:58'),
(24, 12, 3, 3, 'morning_in', '2026-03-03 10:30:35', 11.5756130, 104.8527620, 19.53, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '27.109.113.70', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-03 10:30:35', '2026-03-03 10:30:35'),
(25, 13, 5, 3, 'morning_in', '2026-03-03 12:26:01', 11.5759110, 104.8526310, 16.60, 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '103.206.69.236', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-03 12:26:01', '2026-03-03 12:26:01'),
(26, 14, 4, 3, 'morning_in', '2026-03-03 16:45:35', 11.5756270, 104.8526480, 16.40, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '103.206.69.236', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-03 16:45:35', '2026-03-03 16:45:35'),
(27, 12, 3, 3, 'evening_out', '2026-03-03 17:18:11', 11.5757170, 104.8526520, 6.82, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '27.109.113.70', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-03 17:18:12', '2026-03-03 17:18:12'),
(28, 14, 4, 3, 'evening_out', '2026-03-03 21:38:54', 11.5756230, 104.8526670, 16.49, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '103.206.69.236', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-03 21:38:54', '2026-03-03 21:38:54'),
(29, 13, 5, 3, 'evening_out', '2026-03-03 21:41:25', 11.5756910, 104.8526710, 8.93, 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '117.20.116.178', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-03 21:41:25', '2026-03-03 21:41:25'),
(30, 15, 3, 3, 'morning_in', '2026-03-04 07:36:55', 11.5756510, 104.8527160, 13.78, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '103.206.69.236', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-04 07:36:55', '2026-03-04 07:36:55'),
(31, 16, 5, 3, 'morning_in', '2026-03-04 12:29:30', 11.5757490, 104.8526760, 2.50, 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '103.206.69.236', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-04 12:29:30', '2026-03-04 12:29:30'),
(32, 17, 4, 3, 'morning_in', '2026-03-04 17:07:32', 11.5757210, 104.8526970, 5.72, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '103.206.69.236', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-04 17:07:32', '2026-03-04 17:07:32'),
(33, 15, 3, 3, 'evening_out', '2026-03-04 17:53:58', 11.5756720, 104.8526160, 13.14, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '27.109.113.70', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-04 17:53:58', '2026-03-04 17:53:58'),
(34, 17, 4, 3, 'evening_out', '2026-03-04 21:35:02', 11.5757220, 104.8526850, 5.40, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '103.206.69.236', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-04 21:35:02', '2026-03-04 21:35:02'),
(35, 16, 5, 3, 'evening_out', '2026-03-04 21:35:06', 11.5757010, 104.8526690, 7.87, 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '117.20.117.57', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-04 21:35:06', '2026-03-04 21:35:06'),
(36, 18, 3, 3, 'morning_in', '2026-03-05 07:33:54', 11.5756830, 104.8526920, 9.78, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '103.206.69.236', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-05 07:33:54', '2026-03-05 07:33:54'),
(37, 19, 5, 3, 'morning_in', '2026-03-05 12:25:55', 11.5756090, 104.8527530, 19.53, 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '103.206.69.236', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-05 12:25:55', '2026-03-05 12:25:55'),
(38, 20, 4, 3, 'morning_in', '2026-03-05 17:09:11', 11.5757220, 104.8526860, 5.41, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '103.206.69.236', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-05 17:09:11', '2026-03-05 17:09:11'),
(39, 21, 3, 3, 'morning_in', '2026-03-06 07:29:42', 11.5756710, 104.8527110, 11.49, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '103.206.69.236', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-06 07:29:42', '2026-03-06 07:29:42'),
(40, 22, 5, 3, 'morning_in', '2026-03-06 12:30:30', 11.5759110, 104.8526310, 16.60, 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '103.206.69.236', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-06 12:30:30', '2026-03-06 12:30:30'),
(41, 23, 4, 3, 'morning_in', '2026-03-06 17:00:30', 11.5757240, 104.8526860, 5.18, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '103.206.69.236', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-06 17:00:30', '2026-03-06 17:00:30'),
(42, 21, 3, 3, 'evening_out', '2026-03-06 18:23:47', 11.5757020, 104.8526520, 8.31, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '117.20.116.153', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-06 18:23:47', '2026-03-06 18:23:47'),
(43, 22, 5, 3, 'evening_out', '2026-03-06 21:35:14', 11.5757470, 104.8527020, 3.36, 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '117.20.116.50', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-06 21:35:14', '2026-03-06 21:35:14'),
(44, 23, 4, 3, 'evening_out', '2026-03-06 21:35:40', 11.5757280, 104.8526830, 4.73, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '103.206.69.236', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-06 21:35:40', '2026-03-06 21:35:40'),
(45, 24, 3, 3, 'morning_in', '2026-03-07 07:31:09', 11.5756700, 104.8527100, 11.57, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.2 Mobile/15E148 Safari/604.1', '103.206.69.236', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-07 07:31:09', '2026-03-07 07:31:09'),
(46, 25, 4, 3, 'morning_in', '2026-03-07 17:01:31', 11.5757240, 104.8526890, 5.22, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '103.206.69.236', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-07 17:01:31', '2026-03-07 17:01:31'),
(47, 26, 5, 3, 'morning_in', '2026-03-08 12:21:26', 11.5757340, 104.8528300, 16.56, 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '103.206.69.236', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-08 12:21:26', '2026-03-08 12:21:26'),
(48, 27, 4, 3, 'morning_in', '2026-03-08 17:11:00', 11.5757250, 104.8526820, 5.06, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '103.206.69.236', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-08 17:11:00', '2026-03-08 17:11:00'),
(49, 26, 5, 3, 'evening_out', '2026-03-08 21:39:03', 11.5757420, 104.8526930, 3.37, 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '103.206.69.236', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-08 21:39:03', '2026-03-08 21:39:03'),
(50, 27, 4, 3, 'evening_out', '2026-03-08 21:39:20', 11.5757250, 104.8526770, 5.10, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '103.206.69.236', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-08 21:39:20', '2026-03-08 21:39:20'),
(51, 28, 3, 3, 'morning_in', '2026-03-09 07:29:52', 11.5757200, 104.8527430, 8.65, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '27.109.113.95', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-09 07:29:52', '2026-03-09 07:29:52'),
(52, 29, 5, 3, 'morning_in', '2026-03-09 12:24:10', 11.5758090, 104.8526690, 4.53, 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '103.206.69.236', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-09 12:24:10', '2026-03-09 12:24:10'),
(53, 30, 4, 3, 'morning_in', '2026-03-09 17:06:31', 11.5757240, 104.8526820, 5.17, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '103.206.69.236', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-09 17:06:31', '2026-03-09 17:06:31'),
(54, 28, 3, 3, 'evening_out', '2026-03-09 17:56:06', 11.5757570, 104.8527070, 3.05, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '27.109.113.95', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-09 17:56:06', '2026-03-09 17:56:06'),
(55, 29, 5, 3, 'evening_out', '2026-03-09 21:37:07', 11.5756490, 104.8526530, 13.89, 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '27.109.113.232', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-09 21:37:07', '2026-03-09 21:37:07'),
(56, 30, 4, 3, 'evening_out', '2026-03-09 21:37:13', 11.5757240, 104.8526720, 5.30, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '103.206.69.236', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-09 21:37:13', '2026-03-09 21:37:13'),
(57, 31, 3, 3, 'morning_in', '2026-03-10 07:33:37', 11.5756940, 104.8527000, 8.72, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '103.206.69.236', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-10 07:33:37', '2026-03-10 07:33:37'),
(58, 32, 5, 3, 'morning_in', '2026-03-10 12:28:35', 11.5756080, 104.8527540, 19.67, 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '103.206.69.236', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-10 12:28:35', '2026-03-10 12:28:35'),
(59, 33, 4, 3, 'morning_in', '2026-03-10 17:01:59', 11.5756640, 104.8526900, 11.87, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '103.206.69.236', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-10 17:01:59', '2026-03-10 17:01:59'),
(60, 31, 3, 3, 'evening_out', '2026-03-10 17:14:46', 11.5757390, 104.8526990, 3.93, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '117.20.115.81', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-10 17:14:46', '2026-03-10 17:14:46'),
(61, 32, 5, 3, 'evening_out', '2026-03-10 21:35:49', 11.5756910, 104.8527000, 9.04, 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '117.20.116.212', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-10 21:35:49', '2026-03-10 21:35:49'),
(62, 33, 4, 3, 'evening_out', '2026-03-10 21:36:34', 11.5756530, 104.8526750, 13.09, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '103.206.69.236', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-10 21:36:34', '2026-03-10 21:36:34'),
(63, 34, 3, 3, 'morning_in', '2026-03-11 07:34:18', 11.5756370, 104.8526860, 14.85, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '103.206.69.236', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-11 07:34:18', '2026-03-11 07:34:18'),
(64, 35, 5, 3, 'morning_in', '2026-03-11 12:21:03', 11.5756090, 104.8527530, 19.53, 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '103.206.69.236', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-11 12:21:03', '2026-03-11 12:21:03'),
(65, 36, 4, 3, 'morning_in', '2026-03-11 17:22:04', 11.5756510, 104.8526770, 13.30, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '36.37.206.79', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-11 17:22:04', '2026-03-11 17:22:04'),
(66, 34, 3, 3, 'evening_out', '2026-03-11 17:32:52', 11.5756940, 104.8527000, 8.72, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '103.206.69.236', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-11 17:32:52', '2026-03-11 17:32:52'),
(67, 36, 4, 3, 'evening_out', '2026-03-11 21:33:08', 11.5756550, 104.8526750, 12.87, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '103.206.69.236', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-11 21:33:08', '2026-03-11 21:33:08'),
(68, 35, 5, 3, 'evening_out', '2026-03-11 21:33:12', 11.5757340, 104.8526650, 4.49, 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '117.20.113.29', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-11 21:33:12', '2026-03-11 21:33:12'),
(69, 37, 3, 3, 'morning_in', '2026-03-12 07:38:01', 11.5757020, 104.8527170, 8.49, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '103.206.69.236', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-12 07:38:01', '2026-03-12 07:38:01'),
(70, 38, 5, 3, 'morning_in', '2026-03-12 12:28:31', 11.5756920, 104.8526590, 9.10, 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '103.206.69.236', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-12 12:28:31', '2026-03-12 12:28:31'),
(71, 37, 3, 3, 'evening_out', '2026-03-12 17:13:53', 11.5756340, 104.8527080, 15.43, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '117.20.117.53', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-12 17:13:53', '2026-03-12 17:13:53'),
(72, 38, 5, 3, 'evening_out', '2026-03-12 21:36:59', 11.5755820, 104.8527380, 21.81, 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '117.20.113.143', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-12 21:36:59', '2026-03-12 21:36:59'),
(73, 39, 3, 3, 'morning_in', '2026-03-13 07:36:11', 11.5756940, 104.8527000, 8.72, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '103.206.69.236', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-13 07:36:11', '2026-03-13 07:36:11'),
(74, 40, 5, 3, 'morning_in', '2026-03-13 12:29:19', 11.5756420, 104.8526890, 14.31, 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', '117.20.113.143', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-13 12:29:19', '2026-03-13 12:29:19'),
(75, 41, 4, 3, 'morning_in', '2026-03-13 16:27:18', 11.5756530, 104.8526750, 13.09, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', '103.206.69.236', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-13 16:27:18', '2026-03-13 16:27:18'),
(76, 39, 3, 3, 'evening_out', '2026-03-13 17:05:20', 11.5757030, 104.8526990, 7.72, 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', '117.20.117.53', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', '2026-03-13 17:05:20', '2026-03-13 17:05:20');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_qr_tokens`
--

CREATE TABLE `attendance_qr_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `token_date` date NOT NULL,
  `token` varchar(255) NOT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendance_qr_tokens`
--

INSERT INTO `attendance_qr_tokens` (`id`, `branch_id`, `token_date`, `token`, `expires_at`, `is_active`, `created_at`, `updated_at`) VALUES
(3, 3, '2026-03-02', '9a16c25d-8f2e-44a8-979f-ee4a1a9ea953', '2026-03-02 23:59:59', 0, '2026-03-02 17:57:56', '2026-03-02 18:02:08'),
(4, 3, '2026-03-02', 'da359a38-2113-4a71-865d-5d9eea81d88f', '2026-03-02 23:59:59', 0, '2026-03-02 18:02:08', '2026-03-03 10:27:52'),
(5, 5, '2026-03-02', '36c267e5-2c7b-4232-b96f-db528b5341ae', '2026-03-02 23:59:59', 1, '2026-03-02 18:09:10', '2026-03-02 18:09:10'),
(6, 4, '2026-03-02', 'c3d5a0df-0769-4464-bdc0-d7c4317e6ee6', '2026-03-02 23:59:59', 1, '2026-03-02 18:14:08', '2026-03-02 18:14:08'),
(7, 3, '2026-03-03', '1320ed3f-79fa-43bb-8f23-fb8e1424168d', NULL, 1, '2026-03-03 10:27:52', '2026-03-03 10:27:52');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_rejection_logs`
--

CREATE TABLE `attendance_rejection_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `scan_type` enum('morning_in','lunch_out','lunch_in','evening_out') DEFAULT NULL,
  `latitude` decimal(10,7) DEFAULT NULL,
  `longitude` decimal(10,7) DEFAULT NULL,
  `distance_from_branch` decimal(10,2) DEFAULT NULL,
  `rejection_reason` varchar(500) NOT NULL,
  `device_info` varchar(255) DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `qr_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendance_sessions`
--

CREATE TABLE `attendance_sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `attendance_date` date NOT NULL,
  `late_minutes` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `early_leave_minutes` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `work_minutes` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `overtime_minutes` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `has_fake_gps_flag` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendance_sessions`
--

INSERT INTO `attendance_sessions` (`id`, `employee_id`, `branch_id`, `attendance_date`, `late_minutes`, `early_leave_minutes`, `work_minutes`, `overtime_minutes`, `has_fake_gps_flag`, `created_at`, `updated_at`) VALUES
(6, 3, 3, '2026-03-02', 0, 62, 0, 0, 0, '2026-03-02 18:02:24', '2026-03-02 18:02:34'),
(7, 4, 5, '2026-03-02', 55, 0, 0, 0, 0, '2026-03-02 18:10:16', '2026-03-02 18:10:16'),
(9, 5, 4, '2026-03-02', 344, 0, 0, 0, 0, '2026-03-02 18:14:58', '2026-03-02 18:14:58'),
(12, 3, 3, '2026-03-03', 180, 18, 407, 0, 0, '2026-03-03 10:30:35', '2026-03-03 17:18:12'),
(13, 5, 3, '2026-03-03', 0, 11, 555, 15, 0, '2026-03-03 12:26:01', '2026-03-03 21:41:25'),
(14, 4, 3, '2026-03-03', 0, 23, 293, 53, 0, '2026-03-03 16:45:35', '2026-03-03 21:38:54'),
(15, 3, 3, '2026-03-04', 6, 53, 617, 47, 0, '2026-03-04 07:36:55', '2026-03-04 17:53:58'),
(16, 5, 3, '2026-03-04', 0, 5, 545, 5, 0, '2026-03-04 12:29:30', '2026-03-04 21:35:06'),
(17, 4, 3, '2026-03-04', 0, 20, 267, 27, 0, '2026-03-04 17:07:32', '2026-03-04 21:35:02'),
(18, 3, 3, '2026-03-05', 3, 0, 0, 0, 0, '2026-03-05 07:33:54', '2026-03-05 07:33:54'),
(19, 5, 3, '2026-03-05', 0, 0, 0, 0, 0, '2026-03-05 12:25:55', '2026-03-05 12:25:55'),
(20, 4, 3, '2026-03-05', 0, 0, 0, 0, 0, '2026-03-05 17:09:11', '2026-03-05 17:09:11'),
(21, 3, 3, '2026-03-06', 0, 83, 654, 84, 0, '2026-03-06 07:29:42', '2026-03-06 18:23:47'),
(22, 5, 3, '2026-03-06', 0, 5, 544, 4, 0, '2026-03-06 12:30:30', '2026-03-06 21:35:14'),
(23, 4, 3, '2026-03-06', 0, 20, 275, 35, 0, '2026-03-06 17:00:30', '2026-03-06 21:35:41'),
(24, 3, 3, '2026-03-07', 1, 0, 0, 0, 0, '2026-03-07 07:31:09', '2026-03-07 07:31:09'),
(25, 4, 3, '2026-03-07', 0, 0, 0, 0, 0, '2026-03-07 17:01:31', '2026-03-07 17:01:31'),
(26, 5, 3, '2026-03-08', 0, 9, 557, 17, 0, '2026-03-08 12:21:26', '2026-03-08 21:39:03'),
(27, 4, 3, '2026-03-08', 0, 24, 268, 28, 0, '2026-03-08 17:11:00', '2026-03-08 21:39:20'),
(28, 3, 3, '2026-03-09', 0, 56, 626, 56, 0, '2026-03-09 07:29:52', '2026-03-09 17:56:06'),
(29, 5, 3, '2026-03-09', 0, 7, 552, 12, 0, '2026-03-09 12:24:10', '2026-03-09 21:37:07'),
(30, 4, 3, '2026-03-09', 0, 22, 270, 30, 0, '2026-03-09 17:06:31', '2026-03-09 21:37:13'),
(31, 3, 3, '2026-03-10', 3, 14, 581, 11, 0, '2026-03-10 07:33:37', '2026-03-10 17:14:46'),
(32, 5, 3, '2026-03-10', 0, 5, 547, 7, 0, '2026-03-10 12:28:35', '2026-03-10 21:35:49'),
(33, 4, 3, '2026-03-10', 0, 21, 274, 34, 0, '2026-03-10 17:01:59', '2026-03-10 21:36:34'),
(34, 3, 3, '2026-03-11', 4, 32, 598, 28, 0, '2026-03-11 07:34:18', '2026-03-11 17:32:52'),
(35, 5, 3, '2026-03-11', 0, 3, 552, 12, 0, '2026-03-11 12:21:03', '2026-03-11 21:33:12'),
(36, 4, 3, '2026-03-11', 7, 18, 251, 11, 0, '2026-03-11 17:22:04', '2026-03-11 21:33:08'),
(37, 3, 3, '2026-03-12', 8, 13, 575, 5, 0, '2026-03-12 07:38:01', '2026-03-12 17:13:53'),
(38, 5, 3, '2026-03-12', 0, 6, 548, 8, 0, '2026-03-12 12:28:31', '2026-03-12 21:36:59'),
(39, 3, 3, '2026-03-13', 6, 5, 569, 0, 0, '2026-03-13 07:36:11', '2026-03-13 17:05:20'),
(40, 5, 3, '2026-03-13', 0, 0, 0, 0, 0, '2026-03-13 12:29:19', '2026-03-13 12:29:19'),
(41, 4, 3, '2026-03-13', 0, 0, 0, 0, 0, '2026-03-13 16:27:18', '2026-03-13 16:27:18');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `latitude` decimal(10,7) NOT NULL,
  `longitude` decimal(10,7) NOT NULL,
  `allowed_radius_meters` int(10) UNSIGNED NOT NULL DEFAULT 300,
  `scan_mode` enum('gps','qr','gps_qr') NOT NULL DEFAULT 'gps',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `address`, `latitude`, `longitude`, `allowed_radius_meters`, `scan_mode`, `is_active`, `created_at`, `updated_at`) VALUES
(3, 'CHM', 'Phum Penh', 11.5757705, 104.8526826, 100, 'gps_qr', 1, '2026-03-02 13:40:58', '2026-03-02 17:57:34'),
(4, 'វេន12', 'CHM', 11.5757705, 104.8526826, 100, 'gps_qr', 1, '2026-03-02 18:04:15', '2026-03-02 18:04:15'),
(5, '5', 'CHM', 11.5757705, 104.8526826, 100, 'gps_qr', 1, '2026-03-02 18:04:29', '2026-03-02 18:04:36');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `change_dayoff_requests`
--

CREATE TABLE `change_dayoff_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `original_date` date NOT NULL,
  `requested_date` date NOT NULL,
  `reason` text DEFAULT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `admin_comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `subscription_plan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('active','inactive','expired') NOT NULL DEFAULT 'active',
  `expiry_date` date DEFAULT NULL,
  `monthly_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_settings`
--

CREATE TABLE `company_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) NOT NULL DEFAULT 'HRM Company',
  `primary_color` varchar(20) NOT NULL DEFAULT '#1f4f82',
  `timezone` varchar(255) NOT NULL DEFAULT 'UTC',
  `currency` varchar(255) NOT NULL DEFAULT 'USD',
  `current_plan_name` varchar(255) NOT NULL DEFAULT 'Standard',
  `payroll_enabled` tinyint(1) NOT NULL DEFAULT 1,
  `telegram_scan_enabled` tinyint(1) NOT NULL DEFAULT 0,
  `telegram_bot_token` varchar(255) DEFAULT NULL,
  `telegram_chat_id` varchar(255) DEFAULT NULL,
  `overtime_rate_per_hour` decimal(8,2) NOT NULL DEFAULT 0.00,
  `late_deduction_per_minute` decimal(8,4) NOT NULL DEFAULT 0.0000,
  `allowed_late_count` int(11) NOT NULL DEFAULT 0,
  `late_deduction_amount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_settings`
--

INSERT INTO `company_settings` (`id`, `company_name`, `primary_color`, `timezone`, `currency`, `current_plan_name`, `payroll_enabled`, `telegram_scan_enabled`, `telegram_bot_token`, `telegram_chat_id`, `overtime_rate_per_hour`, `late_deduction_per_minute`, `allowed_late_count`, `late_deduction_amount`, `created_at`, `updated_at`) VALUES
(1, 'SR HRM', '#ff1af7', 'UTC', 'USD', 'Business', 1, 1, '8544896901:AAFM6SoCr_g5SoIOJIR7l6ukHQsXbTelqA8', '-1003516849055', 3.00, 0.1000, 0, 0.00, '2026-03-01 21:28:08', '2026-03-03 10:35:45');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` varchar(255) NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `position` varchar(255) NOT NULL,
  `salary_type` enum('monthly','daily') NOT NULL,
  `base_salary` decimal(12,2) NOT NULL,
  `ot_rate_per_hour` decimal(8,2) DEFAULT NULL COMMENT 'Custom OT rate per hour',
  `leave_deduction_per_day` decimal(8,2) DEFAULT NULL COMMENT 'Custom leave deduction amount per day absent',
  `employment_status` enum('active','suspended','resigned') NOT NULL DEFAULT 'active',
  `join_date` date NOT NULL,
  `leave_balance_days` decimal(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `user_id`, `employee_id`, `branch_id`, `department_id`, `position`, `salary_type`, `base_salary`, `ot_rate_per_hour`, `leave_deduction_per_day`, `employment_status`, `join_date`, `leave_balance_days`, `created_at`, `updated_at`) VALUES
(2, 4, 'EMP-3-2603-0001', 3, NULL, 'Admin', 'monthly', 500.00, NULL, NULL, 'active', '2026-03-02', 0.00, '2026-03-02 13:41:44', '2026-03-02 13:41:44'),
(3, 5, 'EMP-3-2603-0002', 3, NULL, 'Store Manager', 'monthly', 290.00, 11.34, NULL, 'active', '2026-03-02', 0.00, '2026-03-02 17:56:05', '2026-03-03 10:18:51'),
(4, 6, 'EMP-5-2603-0001', 3, NULL, 'Sale', 'monthly', 130.00, 11.08, NULL, 'active', '2026-03-02', 0.00, '2026-03-02 18:06:36', '2026-03-03 10:18:17'),
(5, 7, 'EMP-5-2603-0002', 3, NULL, 'Stock', 'monthly', 250.00, 1.20, NULL, 'active', '2026-03-02', 0.00, '2026-03-02 18:11:56', '2026-03-03 10:14:47'),
(6, 8, 'EMP-5-2603-0003', 3, NULL, 'Cashir', 'monthly', 100.00, 0.83, 0.00, 'active', '2026-03-02', 0.00, '2026-03-02 18:13:35', '2026-03-03 10:09:12');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_requests`
--

CREATE TABLE `leave_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `leave_type_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `days` decimal(8,2) NOT NULL,
  `reason` text DEFAULT NULL,
  `attachment_path` varchar(255) DEFAULT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `approved_by` bigint(20) UNSIGNED DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `admin_comment` text DEFAULT NULL,
  `approval_level` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `current_level` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

CREATE TABLE `leave_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `default_days` decimal(8,2) NOT NULL DEFAULT 0.00,
  `is_paid` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_types`
--

INSERT INTO `leave_types` (`id`, `name`, `default_days`, `is_paid`, `created_at`, `updated_at`) VALUES
(1, 'Annual', 18.00, 1, '2026-03-01 21:28:08', '2026-03-01 21:28:08'),
(2, 'Sick', 10.00, 1, '2026-03-01 21:28:08', '2026-03-01 21:28:08'),
(3, 'Unpaid', 0.00, 0, '2026-03-01 21:28:08', '2026-03-01 21:28:08');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_02_27_163522_create_permission_tables', 1),
(5, '2026_02_27_163528_create_branches_table', 1),
(6, '2026_02_27_163528_create_departments_table', 1),
(7, '2026_02_27_163528_create_employees_table', 1),
(8, '2026_02_27_163529_create_attendance_sessions_table', 1),
(9, '2026_02_27_163529_create_schedules_table', 1),
(10, '2026_02_27_163529_z_create_attendance_logs_table', 1),
(11, '2026_02_27_163530_create_leave_types_table', 1),
(12, '2026_02_27_163530_z_create_leave_requests_table', 1),
(13, '2026_02_27_163531_create_activity_logs_table', 1),
(14, '2026_02_27_163531_create_payrolls_table', 1),
(15, '2026_02_27_163531_z_create_payroll_items_table', 1),
(16, '2026_02_27_163532_create_company_settings_table', 1),
(17, '2026_02_27_163609_add_hrm_fields_to_users_table', 1),
(18, '2026_02_27_164810_create_attendance_qr_tokens_table', 1),
(19, '2026_02_27_170333_add_ui_fields_to_company_settings_table', 1),
(20, '2026_02_27_170334_add_admin_fields_to_leave_requests_table', 1),
(21, '2026_02_27_170334_add_status_fields_to_payrolls_table', 1),
(22, '2026_02_27_170334_create_subscription_plans_table', 1),
(23, '2026_02_27_170335_create_companies_table', 1),
(24, '2026_03_01_000001_make_expires_at_nullable_in_attendance_qr_tokens', 1),
(25, '2026_03_01_100001_add_scan_mode_to_branches_table', 1),
(26, '2026_03_01_100002_add_fields_to_attendance_logs_table', 1),
(27, '2026_03_01_100003_create_attendance_rejection_logs_table', 1),
(28, '2026_03_01_114831_create_overtime_requests_table', 1),
(29, '2026_03_01_114832_create_change_dayoff_requests_table', 1),
(30, '2026_03_01_123450_add_payroll_rates_to_employees_table', 1),
(31, '2026_03_01_124508_add_late_occurrence_settings_to_company_settings_table', 1),
(32, '2026_03_01_200001_make_lat_lng_nullable_in_attendance_logs', 1),
(33, '2026_03_02_000001_add_telegram_scan_fields_to_company_settings_table', 2),
(34, '2026_03_02_200553_add_user_id_to_schedules_table', 3),
(35, '2026_03_02_232438_fix_schedules_unique_constraint', 4);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 5),
(3, 'App\\Models\\User', 6),
(3, 'App\\Models\\User', 7),
(3, 'App\\Models\\User', 8);

-- --------------------------------------------------------

--
-- Table structure for table `overtime_requests`
--

CREATE TABLE `overtime_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `ot_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `total_hours` decimal(5,2) NOT NULL DEFAULT 0.00,
  `reason` text DEFAULT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `admin_comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payrolls`
--

CREATE TABLE `payrolls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `period_start` date NOT NULL,
  `period_end` date NOT NULL,
  `base_salary` decimal(12,2) NOT NULL,
  `overtime_amount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `late_deduction` decimal(12,2) NOT NULL DEFAULT 0.00,
  `leave_deduction` decimal(12,2) NOT NULL DEFAULT 0.00,
  `bonus` decimal(12,2) NOT NULL DEFAULT 0.00,
  `other_deduction` decimal(12,2) NOT NULL DEFAULT 0.00,
  `net_salary` decimal(12,2) NOT NULL,
  `status` enum('pending','paid') NOT NULL DEFAULT 'pending',
  `paid_at` timestamp NULL DEFAULT NULL,
  `generated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `generated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payroll_items`
--

CREATE TABLE `payroll_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payroll_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('earning','deduction') NOT NULL,
  `label` varchar(255) NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payroll_items`
--

INSERT INTO `payroll_items` (`id`, `payroll_id`, `type`, `label`, `amount`, `created_at`, `updated_at`) VALUES
(5, 2, 'earning', 'Base Salary', 500.00, '2026-03-08 20:18:16', '2026-03-08 20:18:16'),
(6, 2, 'earning', 'Overtime', 0.00, '2026-03-08 20:18:16', '2026-03-08 20:18:16'),
(7, 2, 'deduction', 'Late Deduction', 0.00, '2026-03-08 20:18:16', '2026-03-08 20:18:16'),
(8, 2, 'deduction', 'Leave Deduction', 0.00, '2026-03-08 20:18:16', '2026-03-08 20:18:16'),
(9, 1, 'earning', 'Base Salary', 1290.00, '2026-03-08 20:18:16', '2026-03-08 20:18:16'),
(10, 1, 'earning', 'Overtime', 24.76, '2026-03-08 20:18:16', '2026-03-08 20:18:16'),
(11, 1, 'deduction', 'Late Deduction', 0.00, '2026-03-08 20:18:16', '2026-03-08 20:18:16'),
(12, 1, 'deduction', 'Leave Deduction', 0.00, '2026-03-08 20:18:16', '2026-03-08 20:18:16'),
(13, 3, 'earning', 'Base Salary', 1130.00, '2026-03-08 20:18:16', '2026-03-08 20:18:16'),
(14, 3, 'earning', 'Overtime', 21.24, '2026-03-08 20:18:16', '2026-03-08 20:18:16'),
(15, 3, 'deduction', 'Late Deduction', 0.00, '2026-03-08 20:18:16', '2026-03-08 20:18:16'),
(16, 3, 'deduction', 'Leave Deduction', 0.00, '2026-03-08 20:18:16', '2026-03-08 20:18:16'),
(17, 4, 'earning', 'Base Salary', 2250.00, '2026-03-08 20:18:16', '2026-03-08 20:18:16'),
(18, 4, 'earning', 'Overtime', 0.48, '2026-03-08 20:18:16', '2026-03-08 20:18:16'),
(19, 4, 'deduction', 'Late Deduction', 0.00, '2026-03-08 20:18:16', '2026-03-08 20:18:16'),
(20, 4, 'deduction', 'Leave Deduction', 0.00, '2026-03-08 20:18:16', '2026-03-08 20:18:16'),
(21, 5, 'earning', 'Base Salary', 1100.00, '2026-03-08 20:18:16', '2026-03-08 20:18:16'),
(22, 5, 'earning', 'Overtime', 0.00, '2026-03-08 20:18:16', '2026-03-08 20:18:16'),
(23, 5, 'deduction', 'Late Deduction', 0.00, '2026-03-08 20:18:16', '2026-03-08 20:18:16'),
(24, 5, 'deduction', 'Leave Deduction', 0.00, '2026-03-08 20:18:16', '2026-03-08 20:18:16');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', '2026-03-01 21:28:08', '2026-03-01 21:28:08'),
(2, 'Admin / HR', 'web', '2026-03-01 21:28:08', '2026-03-01 21:28:08'),
(3, 'Employee', 'web', '2026-03-01 21:28:08', '2026-03-01 21:28:08');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `day_of_week` tinyint(3) UNSIGNED NOT NULL,
  `morning_in` time DEFAULT NULL,
  `lunch_out` time DEFAULT NULL,
  `lunch_in` time DEFAULT NULL,
  `evening_out` time DEFAULT NULL,
  `late_grace_minutes` smallint(5) UNSIGNED NOT NULL DEFAULT 10,
  `early_leave_grace_minutes` smallint(5) UNSIGNED NOT NULL DEFAULT 10,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `branch_id`, `employee_id`, `day_of_week`, `morning_in`, `lunch_out`, `lunch_in`, `evening_out`, `late_grace_minutes`, `early_leave_grace_minutes`, `created_at`, `updated_at`) VALUES
(6, 2, NULL, 0, '07:30:00', NULL, NULL, '17:00:00', 0, 0, '2026-03-02 11:41:39', '2026-03-02 11:44:14'),
(7, 2, NULL, 1, '07:30:00', NULL, NULL, '17:00:00', 0, 0, '2026-03-02 11:44:14', '2026-03-02 11:44:14'),
(8, 2, NULL, 2, '07:30:00', NULL, NULL, '17:00:00', 0, 0, '2026-03-02 11:44:14', '2026-03-02 11:44:14'),
(9, 2, NULL, 3, '07:30:00', NULL, NULL, '17:00:00', 0, 0, '2026-03-02 11:44:14', '2026-03-02 11:44:14'),
(10, 2, NULL, 4, '07:30:00', NULL, NULL, '17:00:00', 0, 0, '2026-03-02 11:44:14', '2026-03-02 11:44:14'),
(11, 2, NULL, 5, '07:30:00', NULL, NULL, '17:00:00', 0, 0, '2026-03-02 11:44:14', '2026-03-02 11:44:14'),
(12, 2, NULL, 6, '07:30:00', NULL, NULL, '17:00:00', 0, 0, '2026-03-02 11:44:14', '2026-03-02 11:44:14'),
(13, 3, NULL, 0, '07:30:00', NULL, NULL, '17:00:00', 0, 0, '2026-03-02 17:59:23', '2026-03-02 17:59:23'),
(14, 3, NULL, 1, '07:30:00', NULL, NULL, '17:00:00', 0, 0, '2026-03-02 17:59:23', '2026-03-02 17:59:23'),
(15, 3, NULL, 2, '07:30:00', NULL, NULL, '17:00:00', 0, 0, '2026-03-02 17:59:23', '2026-03-02 17:59:23'),
(16, 3, NULL, 3, '07:30:00', NULL, NULL, '17:00:00', 0, 0, '2026-03-02 17:59:23', '2026-03-02 17:59:23'),
(17, 3, NULL, 4, '07:30:00', NULL, NULL, '17:00:00', 0, 0, '2026-03-02 17:59:23', '2026-03-02 17:59:23'),
(18, 3, NULL, 5, '07:30:00', NULL, NULL, '17:00:00', 0, 0, '2026-03-02 17:59:23', '2026-03-02 17:59:23'),
(19, 3, NULL, 6, '07:30:00', NULL, NULL, '17:00:00', 0, 0, '2026-03-02 17:59:23', '2026-03-02 17:59:23'),
(20, 5, NULL, 0, '17:15:00', NULL, NULL, '21:15:00', 0, 0, '2026-03-02 18:09:44', '2026-03-02 18:09:44'),
(21, 5, NULL, 1, '17:15:00', NULL, NULL, '21:15:00', 0, 0, '2026-03-02 18:09:44', '2026-03-02 18:09:44'),
(22, 5, NULL, 2, '17:15:00', NULL, NULL, '21:15:00', 0, 0, '2026-03-02 18:09:44', '2026-03-02 18:09:44'),
(23, 5, NULL, 3, '17:15:00', NULL, NULL, '21:15:00', 0, 0, '2026-03-02 18:09:44', '2026-03-02 18:09:44'),
(24, 5, NULL, 4, '17:15:00', NULL, NULL, '21:15:00', 0, 0, '2026-03-02 18:09:44', '2026-03-02 18:09:44'),
(25, 5, NULL, 5, '17:15:00', NULL, NULL, '21:15:00', 0, 0, '2026-03-02 18:09:44', '2026-03-02 18:09:44'),
(26, 5, NULL, 6, '17:15:00', NULL, NULL, '21:15:00', 0, 0, '2026-03-02 18:09:44', '2026-03-02 18:09:44'),
(27, 4, NULL, 0, '12:30:00', NULL, NULL, '21:30:00', 0, 0, '2026-03-02 18:10:07', '2026-03-02 18:10:07'),
(28, 4, NULL, 1, '12:30:00', NULL, NULL, '21:30:00', 0, 0, '2026-03-02 18:10:07', '2026-03-02 18:10:07'),
(29, 4, NULL, 2, '12:30:00', NULL, NULL, '21:30:00', 0, 0, '2026-03-02 18:10:07', '2026-03-02 18:10:07'),
(30, 4, NULL, 3, '12:30:00', NULL, NULL, '21:30:00', 0, 0, '2026-03-02 18:10:07', '2026-03-02 18:10:07'),
(31, 4, NULL, 4, '12:30:00', NULL, NULL, '21:30:00', 0, 0, '2026-03-02 18:10:07', '2026-03-02 18:10:07'),
(32, 4, NULL, 5, '12:30:00', NULL, NULL, '21:30:00', 0, 0, '2026-03-02 18:10:07', '2026-03-02 18:10:07'),
(33, 4, NULL, 6, '12:30:00', NULL, NULL, '21:30:00', 0, 0, '2026-03-02 18:10:07', '2026-03-02 18:10:07'),
(34, 3, 5, 0, '12:30:00', NULL, NULL, '21:30:00', 0, 0, '2026-03-03 12:40:25', '2026-03-03 12:41:05'),
(35, 3, 5, 1, '12:30:00', NULL, NULL, '21:30:00', 0, 0, '2026-03-03 12:40:25', '2026-03-03 12:41:05'),
(36, 3, 5, 2, '12:30:00', NULL, NULL, '21:30:00', 0, 0, '2026-03-03 12:40:25', '2026-03-03 12:41:05'),
(37, 3, 5, 3, '12:30:00', NULL, NULL, '21:30:00', 0, 0, '2026-03-03 12:40:25', '2026-03-03 12:41:05'),
(38, 3, 5, 4, '12:30:00', NULL, NULL, '21:30:00', 0, 0, '2026-03-03 12:40:25', '2026-03-03 12:41:05'),
(39, 3, 5, 5, '12:30:00', NULL, NULL, '21:30:00', 0, 0, '2026-03-03 12:40:25', '2026-03-03 12:41:05'),
(40, 3, 5, 6, '12:30:00', NULL, NULL, '21:30:00', 0, 0, '2026-03-03 12:40:25', '2026-03-03 12:41:05'),
(41, 3, 4, 0, '17:15:00', NULL, NULL, '21:15:00', 0, 0, '2026-03-03 12:40:55', '2026-03-03 12:40:55'),
(42, 3, 4, 1, '17:15:00', NULL, NULL, '21:15:00', 0, 0, '2026-03-03 12:40:55', '2026-03-03 12:40:55'),
(43, 3, 4, 2, '17:15:00', NULL, NULL, '21:15:00', 0, 0, '2026-03-03 12:40:55', '2026-03-03 12:40:55'),
(44, 3, 4, 3, '17:15:00', NULL, NULL, '21:15:00', 0, 0, '2026-03-03 12:40:55', '2026-03-03 12:40:55'),
(45, 3, 4, 4, '17:15:00', NULL, NULL, '21:15:00', 0, 0, '2026-03-03 12:40:55', '2026-03-03 12:40:55'),
(46, 3, 4, 5, '17:15:00', NULL, NULL, '21:15:00', 0, 0, '2026-03-03 12:40:55', '2026-03-03 12:40:55'),
(47, 3, 4, 6, '17:15:00', NULL, NULL, '21:15:00', 0, 0, '2026-03-03 12:40:55', '2026-03-03 12:40:55');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('6QQAMroKh0wpTkXW0XiZoRkyv7LDJnGwQsQc0cpT', NULL, '34.31.75.223', 'Mozilla/5.0 (compatible; CMS-Checker/1.0; +https://example.com)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMkdHSUJaQmpYaVNkNkhjUmlrc1RrWDQ4c2FIOU5pZEkyWTh5NUU2cCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly9tZWtvbmdjeWJlcnVuaXQuYXBwL2xvZ2luIjtzOjU6InJvdXRlIjtzOjU6ImxvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1773416828),
('7Yu6qwxCE8jr3oGffb513QtdO035ANZ8sG09zgqX', NULL, '57.141.16.34', 'meta-externalagent/1.1 (+https://developers.facebook.com/docs/sharing/webmasters/crawler)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMmVZc2REbEdMR0xsNlVMZlJNbHB2MEFzSkhETWpoYVd0ajhPZkNtYyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vbWVrb25nY3liZXJ1bml0LmFwcC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1773391881),
('8gp5apdemUF2ZSQk7vOzSon2l4aHLSW7OWf93lOg', NULL, '5.133.192.128', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidjg1MjhUbDIycFd0SnJQT2N2WmVCMklPRG1BNm1tWlhUZkwxSU5LZiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vbWVrb25nY3liZXJ1bml0LmFwcC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1773347166),
('8k3fTEGphHrN35WsN6qgRPooaNo7jJh9PZKy2lzt', NULL, '161.0.28.4', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNFZFOENMdDFYelB2Mm11QzU5cnB2Y3QzN05kT3VJOTRKTmhwOEV2MiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vbWVrb25nY3liZXJ1bml0LmFwcC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1773343204),
('b7kRpPOcSfOZF0zQAcMXO3ysQz1pNJmOp4YVuOi7', NULL, '192.121.134.92', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/122.0.6261.89 Mobile/15E148 Safari/604', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSXE0Uk1scjVva3BoQ25nSHdkSmVNM2JpWm1iRlM3Rjd4Ym44Mm9YWSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly9tZWtvbmdjeWJlcnVuaXQuYXBwL2xvZ2luIjtzOjU6InJvdXRlIjtzOjU6ImxvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1773389248),
('esge4FqS0w5kHMvYdbzZOj8cBy092kcXotrOCowa', NULL, '167.94.138.112', 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYzBTNlY2Q0pOa1dwWE5SRW52S2lCOEtxeU5jbGxKSE9qUlhBTk5UUiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vbWVrb25nY3liZXJ1bml0LmFwcCI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1773387636),
('F9dxPe2faa7d4eq2xsfBqC54My6UKSwmXtSX4B79', NULL, '3.249.204.0', 'Mozilla/5.0 (compatible; NetcraftSurveyAgent/1.0; +info@netcraft.com)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMFNBaGx2Q1NZN0VhOWRGSW8yMzhudlhyU1BHMEJmWjRlN3JSdEJIYyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vd3d3Lm1la29uZ2N5YmVydW5pdC5hcHAiO3M6NToicm91dGUiO047fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1773360516),
('j46rbFdXcihTa6OOOGfkB9Dl8PSx5bq3w1ZLSZTU', NULL, '57.141.16.41', 'meta-externalagent/1.1 (+https://developers.facebook.com/docs/sharing/webmasters/crawler)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiREdJWDlPTGNnbWx1dDVORExiVnpQQWZJelpMakdaM3ZtTXRnNEhTcCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vbWVrb25nY3liZXJ1bml0LmFwcCI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1773391853),
('KB8NxRTdq7oo9xq3PO852Rtd8oAbQY02LsPJWoxN', 5, '117.20.117.53', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOXhaMm1vSFM4TWJXZDZJV2l5VlBldE5hd0tma0FTbWJFdlFsUzNmUCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTI6Imh0dHBzOi8vbWVrb25nY3liZXJ1bml0LmFwcC9lbXBsb3llZS9hdHRlbmRhbmNlL3NjYW4iO3M6NToicm91dGUiO3M6MjQ6ImVtcGxveWVlLmF0dGVuZGFuY2Uuc2NhbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjU7fQ==', 1773396321),
('N0cq3UTGR7GI4p5YQdC6tOG0pSlUuxsOAJn7yCHw', NULL, '57.141.16.34', 'meta-externalagent/1.1 (+https://developers.facebook.com/docs/sharing/webmasters/crawler)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ3NxSHBBTWd5Q3ZiQkRtWG1lbWVZRmZ5M2tpQXF2OU1vdlFqcWZCcCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDM6Imh0dHBzOi8vbWVrb25nY3liZXJ1bml0LmFwcC9mb3Jnb3QtcGFzc3dvcmQiO3M6NToicm91dGUiO3M6MTY6InBhc3N3b3JkLnJlcXVlc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1773391902),
('nHZ6BDRsOGzOBiUetzINIuM8JhK4VxWPpgdYgXMP', NULL, '5.133.192.128', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTEVBZHg4dThNcUJ3UUYwQnp2UjNyNE94UGZtNzNWYzdHbnkxcU9ZaiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8vbWVrb25nY3liZXJ1bml0LmFwcCI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1773347165),
('nqF3NYJpguqwFyVmdWgF0vDuEptOouKOTZEELVuE', NULL, '118.26.37.6', 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) FxiOS/139.0 Mobile/15E148 Safari/605.1.15', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOTJON1BQdVRKYlpqSTRZTVkyNFJtQ3d3ZnhRRk0yQk0xMGxRNW8weiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vbWVrb25nY3liZXJ1bml0LmFwcC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1773381636),
('qCit1XIEv3XEjjW4ugejh6SXLmYS5oXTiKU0xU4a', NULL, '151.248.1.103', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/122.0.6261.89 Mobile/15E148 Safari/604', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYWFCNlc0TE1xMGc2Q0xveG5iOFVISEZjRVA3NkJzNDhMbzg5MXQzRiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly9tZWtvbmdjeWJlcnVuaXQuYXBwIjtzOjU6InJvdXRlIjtOO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1773389248),
('qk33C9jeJ0SC4mulm4pdlC0JXFYI6rXwVJAt6q1w', NULL, '66.249.64.160', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.7632.116 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYTZzZWdrQUJsQ2VNRjBDbWpKaXBVVndCa3dCb3owS0hLVDRYUno2SSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vbWVrb25nY3liZXJ1bml0LmFwcC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1773379982),
('qN4DLm42mXoAnTk3TTyKF7FNawnBKTPTauTLfF7q', NULL, '167.94.138.112', 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidW9hRWE2ZVBsUmdJTGdHVWVHd1FmWmJvMjJaMjhSUkhGa3k1SXdCUyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vbWVrb25nY3liZXJ1bml0LmFwcC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1773387642),
('qWb1pUSA1KD5TgrmoqHpd0x4kAQatqo8gGIkosMO', 5, '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVHRPY05XcTh5bVl5Z0liUVBGTEdZbHBnOHVjbnRRTTVXUVg4MFpSSiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTI6Imh0dHBzOi8vbWVrb25nY3liZXJ1bml0LmFwcC9lbXBsb3llZS9hdHRlbmRhbmNlL3NjYW4iO3M6NToicm91dGUiO3M6MjQ6ImVtcGxveWVlLmF0dGVuZGFuY2Uuc2NhbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjU7fQ==', 1773362172),
('RUvmj3cmsXVx8Tb40ic0AFUaAmKOdYAmP67DEkLQ', NULL, '34.31.75.223', 'Mozilla/5.0 (compatible; CMS-Checker/1.0; +https://example.com)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQmF0MGE1MUE4cXh2eVkwenh5Z0R0clF6ZHFTd3JVU3JaZzkyZnl1TiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly9tZWtvbmdjeWJlcnVuaXQuYXBwIjtzOjU6InJvdXRlIjtOO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1773416828),
('ufW14cBCq0OvZiVboc7Qt0pKHYyHNnvET57ffNlY', 6, '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.7.3 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUVh1VGwxVnp2dURETnhDa1V5cU00WEpaOTNlQ2RHNGlsNlpTTGxseiI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NjtzOjk6Il9wcmV2aW91cyI7YToyOntzOjM6InVybCI7czo1MjoiaHR0cHM6Ly9tZWtvbmdjeWJlcnVuaXQuYXBwL2VtcGxveWVlL2F0dGVuZGFuY2Uvc2NhbiI7czo1OiJyb3V0ZSI7czoyNDoiZW1wbG95ZWUuYXR0ZW5kYW5jZS5zY2FuIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1773394039),
('Uga7vnbeSFZTUugt47F5SwIbexKU2ewwM0bgy8Jq', NULL, '123.58.215.103', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) FxiOS/124.0 Mobile/15E148 Safari/605.1.15', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiemh2d2ZUMEFUTmZxeEZCRzR4ZmZFbGFWbzBKUDh6WWNQaHdRa0VJMSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vbWVrb25nY3liZXJ1bml0LmFwcC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1773341717),
('wSFrCh7fjOi8wkG4Xk3z91xPOOms1dQUIJ67CwdJ', 7, '103.206.69.236', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_6_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.6 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoib0thakxlVlVrM2JNanNQeDZhc3BRMndERTd0SXlHajlqV0pPcFVDVSI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NztzOjk6Il9wcmV2aW91cyI7YToyOntzOjM6InVybCI7czo0NjoiaHR0cHM6Ly9tZWtvbmdjeWJlcnVuaXQuYXBwL2VtcGxveWVlL2Rhc2hib2FyZCI7czo1OiJyb3V0ZSI7czoxODoiZW1wbG95ZWUuZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1773379766),
('ypG9qqEyIHhaXDIAltmmD4anu5ZQWngTm7Xr1MEF', NULL, '193.34.73.195', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ0F0MjdwRlkzMlh5R1AyVjlxcjAxZmVyWWR1aXl5Q3YwUXR0bU9ZRyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vbWVrb25nY3liZXJ1bml0LmFwcC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1773348028);

-- --------------------------------------------------------

--
-- Table structure for table `subscription_plans`
--

CREATE TABLE `subscription_plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `employee_limit` int(10) UNSIGNED NOT NULL,
  `branch_limit` int(10) UNSIGNED NOT NULL,
  `feature_list` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`feature_list`)),
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscription_plans`
--

INSERT INTO `subscription_plans` (`id`, `name`, `price`, `employee_limit`, `branch_limit`, `feature_list`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Starter', 49.00, 50, 2, '[\"Attendance\",\"Leave\",\"Basic Payroll\"]', 1, '2026-03-01 21:28:09', '2026-03-01 21:28:09'),
(2, 'Business', 129.00, 300, 8, '[\"Attendance\",\"Leave\",\"Payroll\",\"Reports\",\"QR Scan\"]', 1, '2026-03-01 21:28:09', '2026-03-01 21:28:09'),
(3, 'Enterprise', 299.00, 1000, 30, '[\"All modules\",\"Priority Support\",\"API Access\"]', 1, '2026-03-01 21:28:09', '2026-03-01 21:28:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `photo_path` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `branch_id`, `phone`, `photo_path`, `is_active`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin@hrm.local', NULL, NULL, NULL, 1, '2026-03-01 21:28:08', '$2y$12$Z16cIMjI5gyV3UA4.2UIxu95wCypv/hRMSKLvbr.HhzXcS1/FWV9S', 'hdsX8v8SkAapyqo5hfPUiIbUVSa7ajJ8fDvqoMeA1YVxWXhlDFra1Dr3F0MH', '2026-03-01 21:28:08', '2026-03-02 15:05:30'),
(4, 'Super Admin', 'admin@gmail.com', 3, NULL, 'profile-photos/6SBhvITFyLgvOszF02fCv8YWS37bDFbcCfCBdyoZ.png', 1, NULL, '$2y$12$eUe5H/xvh0eskTaM/fRqXuoNIzhUCuA20GsW.J2n6x6HIb/XUd.3O', NULL, '2026-03-02 13:41:44', '2026-03-02 17:07:19'),
(5, 'Phou Dav', 'phoudav@gmail.com', 3, '011841659', NULL, 1, NULL, '$2y$12$Ao3cVXwRCB5yi86STFtrIenbheP8cSfAeQ8SnNwouZnwqPeH1buk2', 'lQ7z9LRSpm5udM2UqH13lwJJhl1Qx4dzelZ50RkVyRfU7vW3rCvUXzRUpKRa', '2026-03-02 17:56:05', '2026-03-02 17:56:05'),
(6, 'Moeurng Limhornn', 'limhornn@gmail.com', 3, 'superadmin@hrm.local', NULL, 1, NULL, '$2y$12$Bj8owQyZLbbSN0/fmmvrJ.772jS26zSAOFqU78.7dBVhDBXFbXWk.', 'hxLeeDNdtx7f2lJNwCZgPQ9b4M2OHjHxj2KHoR8ZpfYNyJrcdlQHsTWHAVx2', '2026-03-02 18:06:36', '2026-03-03 10:18:17'),
(7, 'Proeun Dina', 'dina@gmail.com', 3, 'superadmin@hrm.local', NULL, 1, NULL, '$2y$12$kKRPBmxPMDyDyjg43NUIUeenSkXh1WzwQtd.6CtRvsSRhfvbCA9dm', 'kIpGk1oylHZM2QdDXoihF0qXNlK3wRnwmTjaaayz9ITkJovWT16bx9d7q2LM', '2026-03-02 18:11:56', '2026-03-03 10:14:47'),
(8, 'Chhin Chhayhong', 'chhayhong@gmail.com', 3, 'superadmin@hrm.local', NULL, 1, NULL, '$2y$12$UzvqDlV/ex5KRtBXKzT2q.sUtVoFRfz.WuETlw1QJVn93scnbHYN2', 'b2aCZVz3OhmDrZIAoodBtJOBPIjiYCmv3dSJfVOM3VTHMNrQVjK8uR2xcwLT', '2026-03-02 18:13:35', '2026-03-03 10:09:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_logs_module_created_at_index` (`module`,`created_at`),
  ADD KEY `activity_logs_user_id_created_at_index` (`user_id`,`created_at`);

--
-- Indexes for table `attendance_logs`
--
ALTER TABLE `attendance_logs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attendance_logs_attendance_session_id_scan_type_unique` (`attendance_session_id`,`scan_type`),
  ADD KEY `attendance_logs_employee_id_scanned_at_index` (`employee_id`,`scanned_at`),
  ADD KEY `attendance_logs_branch_id_index` (`branch_id`),
  ADD KEY `attendance_logs_scan_type_index` (`scan_type`);

--
-- Indexes for table `attendance_qr_tokens`
--
ALTER TABLE `attendance_qr_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attendance_qr_tokens_token_unique` (`token`),
  ADD KEY `attendance_qr_tokens_branch_id_token_date_is_active_index` (`branch_id`,`token_date`,`is_active`);

--
-- Indexes for table `attendance_rejection_logs`
--
ALTER TABLE `attendance_rejection_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendance_rejection_logs_employee_id_created_at_index` (`employee_id`,`created_at`),
  ADD KEY `attendance_rejection_logs_branch_id_created_at_index` (`branch_id`,`created_at`);

--
-- Indexes for table `attendance_sessions`
--
ALTER TABLE `attendance_sessions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attendance_sessions_employee_id_attendance_date_unique` (`employee_id`,`attendance_date`),
  ADD KEY `attendance_sessions_branch_id_attendance_date_index` (`branch_id`,`attendance_date`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branches_is_active_name_index` (`is_active`,`name`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `change_dayoff_requests`
--
ALTER TABLE `change_dayoff_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `change_dayoff_requests_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companies_subscription_plan_id_foreign` (`subscription_plan_id`),
  ADD KEY `companies_status_expiry_date_index` (`status`,`expiry_date`);

--
-- Indexes for table `company_settings`
--
ALTER TABLE `company_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departments_branch_id_name_unique` (`branch_id`,`name`),
  ADD KEY `departments_is_active_index` (`is_active`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_user_id_unique` (`user_id`),
  ADD UNIQUE KEY `employees_employee_id_unique` (`employee_id`),
  ADD KEY `employees_branch_id_employment_status_index` (`branch_id`,`employment_status`),
  ADD KEY `employees_department_id_index` (`department_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_requests`
--
ALTER TABLE `leave_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leave_requests_leave_type_id_foreign` (`leave_type_id`),
  ADD KEY `leave_requests_approved_by_foreign` (`approved_by`),
  ADD KEY `leave_requests_status_start_date_end_date_index` (`status`,`start_date`,`end_date`),
  ADD KEY `leave_requests_employee_id_status_index` (`employee_id`,`status`);

--
-- Indexes for table `leave_types`
--
ALTER TABLE `leave_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `leave_types_name_unique` (`name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `overtime_requests`
--
ALTER TABLE `overtime_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `overtime_requests_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payrolls`
--
ALTER TABLE `payrolls`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payrolls_employee_id_period_start_period_end_unique` (`employee_id`,`period_start`,`period_end`),
  ADD KEY `payrolls_generated_by_foreign` (`generated_by`),
  ADD KEY `payrolls_branch_id_period_start_period_end_index` (`branch_id`,`period_start`,`period_end`),
  ADD KEY `payrolls_status_period_start_index` (`status`,`period_start`);

--
-- Indexes for table `payroll_items`
--
ALTER TABLE `payroll_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payroll_items_payroll_id_type_index` (`payroll_id`,`type`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_schedule_entry` (`branch_id`,`day_of_week`,`employee_id`),
  ADD KEY `schedules_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `subscription_plans`
--
ALTER TABLE `subscription_plans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscription_plans_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_branch_id_is_active_index` (`branch_id`,`is_active`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1361;

--
-- AUTO_INCREMENT for table `attendance_logs`
--
ALTER TABLE `attendance_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `attendance_qr_tokens`
--
ALTER TABLE `attendance_qr_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `attendance_rejection_logs`
--
ALTER TABLE `attendance_rejection_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attendance_sessions`
--
ALTER TABLE `attendance_sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `change_dayoff_requests`
--
ALTER TABLE `change_dayoff_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `company_settings`
--
ALTER TABLE `company_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_requests`
--
ALTER TABLE `leave_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `leave_types`
--
ALTER TABLE `leave_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `overtime_requests`
--
ALTER TABLE `overtime_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payrolls`
--
ALTER TABLE `payrolls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payroll_items`
--
ALTER TABLE `payroll_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `subscription_plans`
--
ALTER TABLE `subscription_plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `activity_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `attendance_logs`
--
ALTER TABLE `attendance_logs`
  ADD CONSTRAINT `attendance_logs_attendance_session_id_foreign` FOREIGN KEY (`attendance_session_id`) REFERENCES `attendance_sessions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attendance_logs_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `attendance_logs_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `attendance_qr_tokens`
--
ALTER TABLE `attendance_qr_tokens`
  ADD CONSTRAINT `attendance_qr_tokens_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `attendance_rejection_logs`
--
ALTER TABLE `attendance_rejection_logs`
  ADD CONSTRAINT `attendance_rejection_logs_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `attendance_rejection_logs_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `attendance_sessions`
--
ALTER TABLE `attendance_sessions`
  ADD CONSTRAINT `attendance_sessions_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  ADD CONSTRAINT `attendance_sessions_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `change_dayoff_requests`
--
ALTER TABLE `change_dayoff_requests`
  ADD CONSTRAINT `change_dayoff_requests_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_subscription_plan_id_foreign` FOREIGN KEY (`subscription_plan_id`) REFERENCES `subscription_plans` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  ADD CONSTRAINT `employees_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `employees_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `leave_requests`
--
ALTER TABLE `leave_requests`
  ADD CONSTRAINT `leave_requests_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `leave_requests_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `leave_requests_leave_type_id_foreign` FOREIGN KEY (`leave_type_id`) REFERENCES `leave_types` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `overtime_requests`
--
ALTER TABLE `overtime_requests`
  ADD CONSTRAINT `overtime_requests_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payrolls`
--
ALTER TABLE `payrolls`
  ADD CONSTRAINT `payrolls_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  ADD CONSTRAINT `payrolls_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payrolls_generated_by_foreign` FOREIGN KEY (`generated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `payroll_items`
--
ALTER TABLE `payroll_items`
  ADD CONSTRAINT `payroll_items_payroll_id_foreign` FOREIGN KEY (`payroll_id`) REFERENCES `payrolls` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `schedules_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

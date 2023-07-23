-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 20, 2023 at 06:21 PM
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
-- Database: `hrms`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `date` date DEFAULT NULL,
  `checkin` time DEFAULT NULL,
  `checkout` time DEFAULT NULL,
  `attendance_type` varchar(211) NOT NULL DEFAULT 'late=1, halfDay=2',
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `user_id`, `date`, `checkin`, `checkout`, `attendance_type`, `status`) VALUES
(7, 41, '2021-12-23', '23:44:00', '19:06:26', 'Manual Mark', 0),
(10, 39, '2021-05-15', '09:00:00', '08:00:00', 'Machine', 0),
(11, 40, '2021-05-15', '12:00:00', '22:00:00', 'Machine', 0),
(12, 41, '2021-05-15', '10:30:00', '11:30:00', 'Machine', 0),
(46, NULL, NULL, NULL, NULL, 'Manual Mark', 1),
(47, NULL, NULL, NULL, NULL, 'Manual Mark', 1),
(48, 38, '2022-01-13', '17:08:00', '17:10:00', 'Manual Mark', 1),
(53, 49, '2022-10-12', '13:01:00', '23:04:00', 'Manual Mark', 1),
(64, 1, '2022-11-12', '19:06:16', '19:07:31', 'on Submit', 0),
(65, 52, '2022-11-12', '19:08:02', '19:08:07', 'on Submit', 0);

-- --------------------------------------------------------

--
-- Table structure for table `custom_roles`
--

CREATE TABLE `custom_roles` (
  `id` bigint UNSIGNED NOT NULL,
  `role_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint UNSIGNED NOT NULL,
  `dep_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `dep_name`, `created_at`, `updated_at`) VALUES
(4, 'HR', '2021-08-08 19:09:24', '2021-12-19 11:55:36'),
(5, 'Software Development', '2021-08-08 19:09:30', '2021-08-08 19:09:30'),
(6, 'Finance', '2021-09-20 00:38:35', '2021-09-20 00:38:35'),
(10, 'cubes tech', '2022-10-09 13:02:09', '2022-10-09 13:02:09'),
(11, 'Designs', '2023-01-10 07:28:29', '2023-01-10 07:28:29'),
(12, 'Accounts', '2023-01-10 07:29:28', '2023-01-10 07:29:28'),
(13, 'Sales', '2023-01-10 07:31:34', '2023-01-10 07:31:34'),
(14, 'Dinah my.', '2023-01-10 11:54:38', '2023-01-10 11:54:38'),
(15, 'Alice as.', '2023-01-10 11:54:39', '2023-01-10 11:54:39'),
(16, 'I\'m sure.', '2023-01-10 11:54:39', '2023-01-10 11:54:39'),
(17, 'Cat, and.', '2023-01-10 11:54:39', '2023-01-10 11:54:39'),
(18, 'Pray how.', '2023-01-10 11:54:39', '2023-01-10 11:54:39'),
(19, '456', '2023-01-29 17:31:11', '2023-01-29 17:31:11'),
(20, 'Accounting2', '2023-01-29 17:31:41', '2023-01-29 17:31:41'),
(21, 'f55f5', '2023-01-29 17:32:14', '2023-01-29 17:32:14'),
(22, 'dasd4d', '2023-01-29 17:32:59', '2023-01-29 17:32:59'),
(23, 'Accountingww', '2023-01-30 07:36:48', '2023-01-30 07:36:48'),
(24, 'Accounting', '2023-01-31 18:51:09', '2023-01-31 18:51:09');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint UNSIGNED NOT NULL,
  `des_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `des_title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Sr: Sales Executive', '2021-07-28 23:39:37', '2021-07-28 23:39:37', NULL),
(3, 'Dev Team Lead', '2021-07-28 23:41:31', '2021-07-28 23:41:31', NULL),
(5, 'Jr: Php Developers', '2021-07-28 23:45:05', '2022-10-09 13:02:33', NULL),
(12, 'Sr: Designer', '2021-09-27 01:40:20', '2021-09-27 01:40:20', NULL),
(13, 'Frontend Developer', '2021-09-27 01:40:39', '2021-09-27 01:40:39', NULL),
(14, 'SR: Hr Executive', '2021-09-27 01:41:05', '2021-09-27 01:41:05', NULL),
(15, 'content writer', '2021-12-19 11:08:14', '2021-12-19 11:08:14', NULL),
(17, 'PPC Specialists', '2023-01-10 07:33:05', '2023-01-10 07:33:05', NULL),
(18, 'Java Developer', '2023-01-10 07:34:42', '2023-01-10 07:34:42', NULL),
(19, 'Front Sales', '2023-01-10 07:40:43', '2023-01-10 07:40:43', NULL),
(20, 'New Cashout', '2023-01-10 12:04:49', '2023-01-10 12:04:49', NULL),
(21, 'Zola Treutel V', '2023-01-10 12:09:51', '2023-01-10 12:09:51', NULL),
(22, 'Myrtice D\'Amore', '2023-01-10 12:11:59', '2023-01-10 12:11:59', NULL),
(23, 'Prof. Vilma Smith', '2023-01-10 12:11:59', '2023-01-10 12:11:59', NULL),
(24, 'Tomas Cole', '2023-01-10 12:11:59', '2023-01-10 13:55:16', '2023-01-10 13:55:16'),
(25, 'Mrs. Ericka Nicolas MD', '2023-01-10 12:11:59', '2023-01-10 12:11:59', NULL),
(26, 'Sam Ernser V', '2023-01-10 12:11:59', '2023-01-10 12:11:59', NULL),
(27, 'Justina Bergnaum I', '2023-01-10 12:11:59', '2023-01-10 12:11:59', NULL),
(28, 'Theodora Cormier', '2023-01-10 12:11:59', '2023-01-10 12:11:59', NULL),
(29, 'Julius Zulauf', '2023-01-10 12:11:59', '2023-01-10 12:11:59', NULL),
(30, 'Dr. Korey Bechtelar', '2023-01-10 12:11:59', '2023-01-10 12:11:59', NULL),
(31, 'testing mutator', '2023-01-11 11:59:33', '2023-01-11 11:59:33', NULL),
(32, 'TESTING MUTATOR 2', '2023-01-11 12:04:07', '2023-01-11 12:04:07', NULL),
(33, 'DASDASDASDASD', '2023-01-11 12:35:06', '2023-01-11 12:35:06', NULL),
(34, 'dsavvvvvvvvvv', '2023-01-11 12:36:01', '2023-01-11 12:36:01', NULL),
(35, 'ttttttttttttttssssssssssssskksisisisis', '2023-01-11 12:36:30', '2023-01-11 12:36:30', NULL),
(36, 'dotcom', '2023-01-11 12:45:44', '2023-01-11 12:45:44', NULL),
(37, 'sr: sales executive', '2023-01-27 14:02:18', '2023-01-27 14:02:18', NULL),
(38, 'smm executive', '2023-01-27 14:03:22', '2023-01-27 14:03:22', NULL),
(39, 'testing 2', '2023-01-27 14:04:44', '2023-01-27 14:04:44', NULL),
(40, 'sr: sales executived222', '2023-01-27 14:11:26', '2023-01-27 14:11:26', NULL),
(41, 'x123', '2023-01-29 16:55:29', '2023-01-29 16:55:29', NULL),
(42, '12345678', '2023-01-29 17:08:11', '2023-01-29 17:08:11', NULL),
(43, 'dasdsadasd', '2023-01-29 17:13:16', '2023-01-29 17:13:16', NULL),
(44, 'ertyu', '2023-01-29 17:13:46', '2023-01-29 17:13:46', NULL),
(45, 'edvbn', '2023-01-29 17:22:16', '2023-01-29 17:22:16', NULL),
(46, 'svbn', '2023-01-29 17:23:20', '2023-01-29 17:23:20', NULL),
(47, 'xxcxc', '2023-01-29 17:24:17', '2023-01-29 17:24:17', NULL),
(48, 'c4f', '2023-01-29 17:33:42', '2023-01-29 17:33:42', NULL),
(49, 'c4f', '2023-01-29 17:33:48', '2023-01-29 17:33:48', NULL),
(50, '45das', '2023-01-29 17:34:40', '2023-01-29 17:34:40', NULL),
(51, 'dasdas', '2023-01-29 17:35:23', '2023-01-29 17:36:11', '2023-01-29 17:36:11'),
(52, 'loopdas', '2023-01-29 17:36:00', '2023-01-29 17:36:00', NULL),
(53, 'tsteed', '2023-01-30 07:38:32', '2023-01-30 07:38:32', NULL),
(54, 'java developer', '2023-01-31 18:34:40', '2023-01-31 18:34:40', NULL),
(55, 'sr: sales executive', '2023-01-31 19:02:22', '2023-01-31 19:02:22', NULL),
(56, 'sr: sales executived222', '2023-01-31 19:02:34', '2023-01-31 19:02:34', NULL),
(57, 'sr: sales executive', '2023-01-31 19:03:46', '2023-01-31 19:03:46', NULL),
(58, 'dasdasdas', '2023-01-31 19:04:13', '2023-01-31 19:04:13', NULL),
(59, 'sr: sales executive', '2023-02-03 12:10:42', '2023-02-03 12:10:42', NULL),
(60, 'testing 3', '2023-02-05 17:42:33', '2023-02-05 17:42:33', NULL),
(61, '12345678', '2023-02-19 17:36:35', '2023-02-19 17:36:35', NULL),
(62, '123456tgvrrfc', '2023-02-19 17:37:34', '2023-02-19 17:37:34', NULL),
(63, 'xcv', '2023-02-19 17:38:42', '2023-02-19 17:38:42', NULL),
(64, 'new123', '2023-02-19 17:40:04', '2023-02-19 17:40:04', NULL),
(65, 'sr: sales executivewq', '2023-02-19 17:40:44', '2023-02-19 17:40:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `files` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int DEFAULT NULL,
  `fname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `son_of` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `persnol_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `persnol_number` bigint NOT NULL,
  `marital_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int DEFAULT '1',
  `salary` float NOT NULL,
  `etype_id` bigint UNSIGNED DEFAULT NULL,
  `desg_id` bigint UNSIGNED DEFAULT NULL,
  `dep_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `user_id`, `fname`, `lname`, `son_of`, `persnol_email`, `age`, `dob`, `gender`, `city`, `address`, `persnol_number`, `marital_status`, `image`, `status`, `salary`, `etype_id`, `desg_id`, `dep_id`, `created_at`, `updated_at`) VALUES
(27, 52, 'junaid', 'khan', 'Faraz Shaikh', 'khan@gm.com', 28, '2022-11-23', 'Male', 'karachi', 'north khi', 4086887553, 'single', '1671388017.jpg', 1, 550000, 1, 1, 6, '2022-11-13 02:32:05', '2022-12-19 10:38:49'),
(28, 53, 'Murray', 'Wonder', 'Omnis odit', 'zorokejaji@mailinator.com', 88, '1988-02-01', 'Female', 'Aut ratione eum et N', 'Ex consequat Praese', 656546456456, 'Quis sunt incididunt', '1671388995.jpg', 0, 550000, 2, 3, 5, '2022-12-18 13:29:36', '2022-12-19 08:10:39'),
(29, 1, 'Sumaim', 'Ahmed Khan', 'Shamim Ahmed', 'sumaim@gm.com', 30, '2022-11-23', 'Male', 'karachi', 'north khi', 4086887553, 'single', '1671388017.jpg', 1, 550000, 1, 1, 6, '2022-11-09 02:32:05', '2022-12-06 10:38:49'),
(30, 57, 'Ali', 'Ahmed', 'Omnis odit', 'ali@gm.com', 23, '2023-02-01', 'Male', 'karachi', 'north khi', 14086887553, 'single', '1676072653.jfif', 1, 55000, 2, 5, 6, '2023-02-10 18:44:13', '2023-02-10 18:44:13');

-- --------------------------------------------------------

--
-- Table structure for table `employee_types`
--

CREATE TABLE `employee_types` (
  `id` bigint UNSIGNED NOT NULL,
  `emp_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_types`
--

INSERT INTO `employee_types` (`id`, `emp_type`, `created_at`, `updated_at`) VALUES
(1, 'Permenant', NULL, NULL),
(2, 'Contract', NULL, NULL),
(3, 'Intern', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employer_sumeries`
--

CREATE TABLE `employer_sumeries` (
  `id` bigint UNSIGNED NOT NULL,
  `emp_id` int NOT NULL,
  `assigned_something` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leaveqoutas`
--

CREATE TABLE `leaveqoutas` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `allowed` double(8,2) NOT NULL,
  `pending` double(8,2) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` bigint UNSIGNED NOT NULL,
  `emp_id` int NOT NULL,
  `leave_type` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `days` int DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `reason` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `action_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remaining_leaves` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '22',
  `total_leaves` int NOT NULL DEFAULT '22'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `emp_id`, `leave_type`, `days`, `start_date`, `end_date`, `reason`, `status`, `action_by`, `remaining_leaves`, `total_leaves`) VALUES
(1, 1, 'Medical Leave', NULL, '2022-02-10', '2022-02-17', 'dsadasda', 'Approved', NULL, '0', 22),
(2, 1, 'Casual Leave 12 Days', 6, '2022-02-08', '2022-02-14', 'dasdasdasdasdad', 'Rejected', NULL, '19', 22),
(3, 1, 'Casual Leave 12 Days', 10, '2022-02-16', '2022-02-26', 'nothing', 'approved', NULL, '22', 22),
(4, 2, 'Casual Leave 12 Days', 7, '2022-02-16', '2022-02-23', 'world tour', 'Approved', NULL, '19', 22),
(5, 1, 'Casual Leave 12 Days', 3, '2022-02-25', '2022-02-28', '5555555555bhjgfchgv', 'Approved', NULL, '-1', 22),
(6, 1, 'Casual Leave 12 Days', 12, '2022-02-16', '2022-02-28', 'dfvdsfdxcvx31231231', 'Approved', NULL, '0', 22),
(7, 1, 'Casual Leave 12 Days', 4, '2022-12-09', '2022-12-13', 'Tour with friends', 'pending', NULL, '22', 22),
(8, 1, 'Casual Leave 12 Days', 5, '2022-12-11', '2022-12-15', 'need rest', 'pending', NULL, '22', 22),
(9, 1, 'Medical Leave', 5, '2022-12-11', '2022-12-15', 'go for hospital', 'pending', NULL, '5', 22),
(10, 1, 'Casual Leave 12 Days', 5, '2022-12-11', '2022-12-15', 'abroad', 'pending', NULL, '-5', 22);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_04_14_175743_create_employees_table', 1),
(5, '2021_04_14_182940_create_designations_table', 1),
(6, '2021_04_14_183156_create_departments_table', 1),
(7, '2021_04_14_183940_create_employee_types_table', 1),
(8, '2021_04_14_184338_create_documents_table', 1),
(9, '2021_04_14_184745_create_attendances_table', 1),
(10, '2021_04_14_185851_create_leaveqoutas_table', 1),
(11, '2021_04_14_190034_create_leaves_table', 1),
(12, '2021_04_14_190742_create_employer_sumeries_table', 1),
(13, '2021_04_20_175848_create_roles_table', 1),
(14, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(15, '2023_01_10_173529_add_soft_delete_to_designations_table', 2),
(16, '2023_02_09_224400_create_permission_tables', 3),
(17, '2023_02_17_234810_create_posts_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 57);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 57),
(3, 'App\\Models\\User', 57);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'edit user', 'web', '2023-02-10 12:45:15', '2023-02-10 12:45:15'),
(2, 'create user', 'web', '2023-02-10 12:45:15', '2023-02-10 12:45:15'),
(3, 'delete user', 'web', '2023-02-10 07:53:03', '2023-02-10 07:53:03'),
(4, 'add new employee', 'web', '2023-02-15 07:17:23', '2023-02-15 07:17:23'),
(5, 'edit employee', 'web', '2023-02-17 17:33:58', '2023-02-17 17:33:58'),
(6, 'edit employee profile', 'web', '2023-02-17 17:34:12', '2023-02-17 17:34:12'),
(7, 'leave approve', 'web', '2023-02-17 17:36:15', '2023-02-17 17:36:15');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'How to Create a CRUD Application Using Ajax in Laravel 9', 'I would like to share with you simple solution of \"target class does not exist laravel 8\" and \"laravel 8 Target class [Controller] does not exist\".\r\n\r\nJust few days ago launch laravel 8 and i was trying to create my first application with laravel 8 and when i create controller call PostController and when i used with route then i found following issue:', NULL, NULL),
(2, 'Omnis eos quae suntdasda', 'yyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy', NULL, '2023-02-19 07:17:17'),
(14, 'Omnis aute magnam en', 'Voluptas temporibus', '2023-02-19 07:18:34', '2023-02-19 07:19:41');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'HR', 'web', '2023-02-10 12:44:30', NULL),
(2, 'Admin', 'web', '2023-02-10 12:44:30', '2023-02-10 12:44:56'),
(3, 'executive', 'web', '2023-02-10 07:53:03', '2023-02-10 07:53:03'),
(4, 'Super Admin', 'web', '2023-02-14 18:08:48', '2023-02-14 18:08:48');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(2, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `todos`
--

CREATE TABLE `todos` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `todos`
--

INSERT INTO `todos` (`id`, `name`) VALUES
(1, 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rol_id` int DEFAULT '2',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `rol_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sumaim Ahmed', 'sumaim@gm.com', 1, NULL, '$2y$10$AC3e256Vnq1CTzxk5QpeiOfmgtUygBnveZ.qItRPMrQHEuMld9oHS', NULL, '2021-07-01 06:17:09', '2021-07-01 06:17:09'),
(52, 'Khan Sahb', 'khan@mail.com', 2, NULL, '$2y$10$MgjzuVsZrQ6mZ4wqfudL3e3/hurDaQCL3c7JBdRn4XTyk7GCnVq9W', NULL, '2022-11-13 02:30:04', '2022-11-13 02:30:04'),
(57, 'Ali Ahmed', 'ali@gm.com', 2, NULL, '$2y$10$Q5qn3ijlOshFoYgmic8fD.H/Sr.wst37t6p3RH.H/3vtJwpSZHuym', NULL, '2023-02-10 18:42:59', '2023-02-10 18:42:59');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vattendance`
-- (See below for the actual view)
--
CREATE TABLE `vattendance` (
`attendance_type` varchar(211)
,`checkin` time
,`checkout` time
,`date` date
,`id` int
,`name` varchar(255)
,`user_id` int
);

-- --------------------------------------------------------

--
-- Structure for view `vattendance`
--
DROP TABLE IF EXISTS `vattendance`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vattendance`  AS SELECT `a`.`id` AS `id`, `a`.`user_id` AS `user_id`, `a`.`date` AS `date`, `a`.`checkin` AS `checkin`, `a`.`checkout` AS `checkout`, `a`.`attendance_type` AS `attendance_type`, `b`.`name` AS `name` FROM (`attendances` `a` join `users` `b` on((`a`.`user_id` = `b`.`id`)))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_roles`
--
ALTER TABLE `custom_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_types`
--
ALTER TABLE `employee_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employer_sumeries`
--
ALTER TABLE `employer_sumeries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `leaveqoutas`
--
ALTER TABLE `leaveqoutas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `todos`
--
ALTER TABLE `todos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `custom_roles`
--
ALTER TABLE `custom_roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `employee_types`
--
ALTER TABLE `employee_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employer_sumeries`
--
ALTER TABLE `employer_sumeries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leaveqoutas`
--
ALTER TABLE `leaveqoutas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `todos`
--
ALTER TABLE `todos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

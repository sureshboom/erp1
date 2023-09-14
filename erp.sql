-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 14, 2023 at 05:01 PM
-- Server version: 5.7.23-23
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sunday4t_erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'uploads/images/icon.jpg',
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alternate_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` double(8,2) NOT NULL,
  `aadharno` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pancard` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pfno` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vpassword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `joined_date` date DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'backend/image/default.png',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$3sHdPZXurAzJUdpthKVja.tto00iP08QHLB/tN3iQ33oBtR/Rw/Qu', 'image/sks.png', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `advances`
--

CREATE TABLE `advances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double(10,2) NOT NULL DEFAULT '0.00',
  `detection` double(10,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `advance_histories`
--

CREATE TABLE `advance_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `advance_id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `advance_date` date NOT NULL,
  `amount` double(10,2) NOT NULL DEFAULT '0.00',
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chiefengineers`
--

CREATE TABLE `chiefengineers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alternate_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` double(8,2) NOT NULL,
  `aadharno` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pancard` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pfno` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vpassword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `joined_date` date DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contract_customers`
--

CREATE TABLE `contract_customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aadharno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pancard` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double(10,2) NOT NULL,
  `paid` double(10,2) NOT NULL DEFAULT '0.00',
  `pending` double(10,2) NOT NULL DEFAULT '0.00',
  `advance` double(10,2) NOT NULL,
  `leadfrom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middleman` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` enum('1','2','3','4') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `status` enum('booking','mod','payment','closed') COLLATE utf8mb4_unicode_ci NOT NULL,
  `promote` tinyint(1) NOT NULL DEFAULT '0',
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contract_projects`
--

CREATE TABLE `contract_projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chiefengineer_id` bigint(20) UNSIGNED NOT NULL,
  `siteengineer_id` bigint(20) UNSIGNED NOT NULL,
  `mesthiri_id` int(11) DEFAULT NULL,
  `supplier_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_date` date DEFAULT NULL,
  `dtcp_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_land_area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_buildup_area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('ready_to_start','processing','completed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ready_to_start',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interested_project` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interested_area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feedback` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `response` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by_id` bigint(20) UNSIGNED NOT NULL,
  `created_by_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `labour_suppliers`
--

CREATE TABLE `labour_suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pancard` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aadharno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gstno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` double(10,2) NOT NULL DEFAULT '0.00',
  `paid` double(10,2) NOT NULL DEFAULT '0.00',
  `pending` double(10,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `land_customers`
--

CREATE TABLE `land_customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aadharno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pancard` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `plotno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plot_area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(10,2) NOT NULL,
  `paid` double(10,2) NOT NULL DEFAULT '0.00',
  `pending` double(10,2) NOT NULL DEFAULT '0.00',
  `advance` double(10,2) NOT NULL,
  `leadfrom` enum('salesteam','middleman') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'salesteam',
  `middleman` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` enum('1','2','3','4') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `status` enum('booking','mod','payment','closed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'booking',
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promote` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `land_projects`
--

CREATE TABLE `land_projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chiefengineer_id` bigint(20) UNSIGNED NOT NULL,
  `siteengineer_id` bigint(20) UNSIGNED NOT NULL,
  `site_date` date DEFAULT NULL,
  `dtcp_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_plots` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('ready_to_start','processing','completed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ready_to_start',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materialins`
--

CREATE TABLE `materialins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_type` enum('contract','villa') COLLATE utf8mb4_unicode_ci NOT NULL,
  `contract_project_id` bigint(20) UNSIGNED DEFAULT NULL,
  `villa_project_id` bigint(20) UNSIGNED DEFAULT NULL,
  `supplier_id` bigint(20) UNSIGNED DEFAULT NULL,
  `siteengineer_id` bigint(20) UNSIGNED NOT NULL,
  `chiefengineer_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double(10,2) DEFAULT '0.00',
  `status` enum('request','approved','order','verified','received') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materialpurchasehistories`
--

CREATE TABLE `materialpurchasehistories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_type` enum('contract','villa') COLLATE utf8mb4_unicode_ci NOT NULL,
  `contract_project_id` bigint(20) UNSIGNED DEFAULT NULL,
  `villa_project_id` bigint(20) UNSIGNED DEFAULT NULL,
  `materialin_id` bigint(20) UNSIGNED NOT NULL,
  `meterial_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materialpurchases`
--

CREATE TABLE `materialpurchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_type` enum('contract','villa') COLLATE utf8mb4_unicode_ci NOT NULL,
  `contract_project_id` bigint(20) UNSIGNED DEFAULT NULL,
  `villa_project_id` bigint(20) UNSIGNED DEFAULT NULL,
  `materialin_id` bigint(20) UNSIGNED NOT NULL,
  `meterial_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `material_payment_histories`
--

CREATE TABLE `material_payment_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `materialins_id` bigint(20) UNSIGNED NOT NULL,
  `paytype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(10,2) NOT NULL,
  `payway` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mesthiris`
--

CREATE TABLE `mesthiris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alternate_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gpay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mesthiri_assigns`
--

CREATE TABLE `mesthiri_assigns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_type` enum('contract','villa') COLLATE utf8mb4_unicode_ci NOT NULL,
  `contract_project_id` bigint(20) UNSIGNED DEFAULT NULL,
  `villa_project_id` bigint(20) UNSIGNED DEFAULT NULL,
  `mesthiri_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meterials`
--

CREATE TABLE `meterials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meterial_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_07_18_054242_create_admins_table', 1),
(7, '2023_07_18_054243_create_accounts_table', 1),
(8, '2023_07_18_054243_create_telecallers_table', 1),
(10, '2023_07_22_090026_create_customers_table', 2),
(11, '2023_07_22_090447_create_teleworks_table', 2),
(16, '2023_07_26_060745_create_siteengineers_table', 3),
(17, '2023_07_26_060807_create_chiefengineers_table', 3),
(18, '2023_07_26_060841_create_salespeople_table', 3),
(19, '2023_07_26_060856_create_salesmanagers_table', 3),
(20, '2023_07_26_062323_create_sites_table', 3),
(21, '2023_07_27_055452_create_sitevisitarranges_table', 4),
(22, '2023_07_27_073138_add_created_by_to_customers', 5),
(24, '2023_07_29_075935_create_meterials_table', 6),
(25, '2023_07_29_102229_create_suppliers_table', 7),
(31, '2023_08_07_052254_create_material_payment_histories_table', 11),
(35, '2023_08_08_085515_create_mesthiris_table', 15),
(37, '2023_08_08_121600_create_workers_table', 16),
(40, '2023_08_14_084831_create_land_projects_table', 19),
(41, '2023_08_14_084902_create_contract_projects_table', 19),
(42, '2023_08_14_084924_create_villa_projects_table', 19),
(43, '2023_08_14_085746_create_contract_customers_table', 19),
(44, '2023_08_14_085807_create_project_customers_table', 19),
(45, '2023_08_14_131953_create_land_customers_table', 20),
(47, '2023_08_18_131033_create_materialins_table', 21),
(48, '2023_08_20_142228_create_materialpurchases_table', 22),
(49, '2023_08_20_142947_create_materialpurchasehistories_table', 23),
(50, '2023_08_21_100821_create_mesthiri_assigns_table', 24),
(51, '2023_08_22_062618_create_work_entries_table', 25),
(52, '2023_08_22_062833_create_worker_entries_table', 25),
(53, '2023_08_24_061059_create_payments_table', 26),
(55, '2023_08_30_083757_create_advances_table', 27),
(56, '2023_08_30_090724_create_advance_histories_table', 28),
(57, '2023_08_30_121211_create_salaries_table', 29),
(58, '2023_09_02_081148_create_villas_table', 30),
(60, '2023_09_04_053414_create_labour_suppliers_table', 31),
(62, '2023_09_04_083250_create_supplier_assigns_table', 32),
(63, '2023_09_06_061612_create_supplier_payments_table', 33),
(64, '2023_09_06_065042_create_supplier_payment_histories_table', 34);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_type` enum('project','material','expense') COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_subtype` enum('villa','contract','land','project','office') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expense_project_type` enum('villa','contract','land') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_id` bigint(20) DEFAULT NULL,
  `customer_id` bigint(20) DEFAULT NULL,
  `supplier_id` bigint(20) DEFAULT NULL,
  `payment_mode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` double(10,2) NOT NULL DEFAULT '0.00',
  `advance` double(10,2) NOT NULL DEFAULT '0.00',
  `paid` double(10,2) NOT NULL DEFAULT '0.00',
  `pending` double(10,2) NOT NULL DEFAULT '0.00',
  `amount` double(10,2) NOT NULL,
  `payment_date` date NOT NULL,
  `expense_for` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `received_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_customers`
--

CREATE TABLE `project_customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aadharno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pancard` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `vilano` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `villa_area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(10,2) NOT NULL,
  `paid` double(10,2) NOT NULL DEFAULT '0.00',
  `pending` double(10,2) NOT NULL DEFAULT '0.00',
  `advance` double(10,2) NOT NULL,
  `leadfrom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middleman` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` enum('1','2','3','4') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `status` enum('booking','mod','payment','closed') COLLATE utf8mb4_unicode_ci NOT NULL,
  `promote` tinyint(1) NOT NULL DEFAULT '0',
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `salary_amount` double(10,2) NOT NULL DEFAULT '0.00',
  `advance` double(10,2) NOT NULL DEFAULT '0.00',
  `detection` double(10,2) NOT NULL DEFAULT '0.00',
  `salary` double(10,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salesmanagers`
--

CREATE TABLE `salesmanagers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alternate_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` double(8,2) NOT NULL,
  `aadharno` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pancard` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pfno` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vpassword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `joined_date` date DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salespeople`
--

CREATE TABLE `salespeople` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alternate_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` double(8,2) NOT NULL,
  `aadharno` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pancard` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pfno` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vpassword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `joined_date` date DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siteengineers`
--

CREATE TABLE `siteengineers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alternate_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` double(8,2) NOT NULL,
  `aadharno` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pancard` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pfno` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vpassword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `joined_date` date DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sitevisitarranges`
--

CREATE TABLE `sitevisitarranges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `received_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('open','visited','closed') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_gstno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_gpay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_account` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` double(10,2) NOT NULL DEFAULT '0.00',
  `paid` double(10,2) NOT NULL DEFAULT '0.00',
  `pending` double(10,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_assigns`
--

CREATE TABLE `supplier_assigns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_type` enum('contract','villa') COLLATE utf8mb4_unicode_ci NOT NULL,
  `contractproject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `villaproject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `villa_id` bigint(20) UNSIGNED DEFAULT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `from_date` date NOT NULL,
  `end_date` date NOT NULL,
  `amount` double(10,2) NOT NULL,
  `status` enum('pending','cancel','approved') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_payments`
--

CREATE TABLE `supplier_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_type` enum('contract','villa') COLLATE utf8mb4_unicode_ci NOT NULL,
  `contractproject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `villaproject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `villa_id` bigint(20) UNSIGNED DEFAULT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `total` double(10,2) NOT NULL,
  `paid` double(10,2) NOT NULL DEFAULT '0.00',
  `pending` double(10,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_payment_histories`
--

CREATE TABLE `supplier_payment_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_payment_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double(10,2) NOT NULL,
  `payment_mode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `telecallers`
--

CREATE TABLE `telecallers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'uploads/images/icon.jpg',
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alternate_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` double(8,2) NOT NULL,
  `aadharno` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pancard` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pfno` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vpassword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `joined_date` date DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teleworks`
--

CREATE TABLE `teleworks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `telecaller_id` bigint(20) UNSIGNED NOT NULL,
  `called` int(11) NOT NULL,
  `follow_up` int(11) NOT NULL,
  `site_visit` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('account','telecaller','siteengineer','chiefengineer','salesmanager','salesperson') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'telecaller',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `villas`
--

CREATE TABLE `villas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `villaproject_id` bigint(20) UNSIGNED NOT NULL,
  `villa_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `villa_area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `villa_projects`
--

CREATE TABLE `villa_projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chiefengineer_id` bigint(20) UNSIGNED NOT NULL,
  `siteengineer_id` bigint(20) UNSIGNED NOT NULL,
  `mesthiri_id` int(11) DEFAULT NULL,
  `site_date` date DEFAULT NULL,
  `dtcp_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_land_area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_buildup_area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('ready_to_start','processing','completed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ready_to_start',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE `workers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `worker_entries`
--

CREATE TABLE `worker_entries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_type` enum('contract','villa') COLLATE utf8mb4_unicode_ci NOT NULL,
  `contract_project_id` bigint(20) UNSIGNED DEFAULT NULL,
  `villa_project_id` bigint(20) UNSIGNED DEFAULT NULL,
  `mesthiri_id` bigint(20) UNSIGNED NOT NULL,
  `workeddate` date NOT NULL,
  `salary` double(10,2) NOT NULL DEFAULT '0.00',
  `workers` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `count` int(11) NOT NULL,
  `status` enum('pending','verified','paid') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `work_entries`
--

CREATE TABLE `work_entries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_type` enum('contract','villa') COLLATE utf8mb4_unicode_ci NOT NULL,
  `contract_project_id` bigint(20) UNSIGNED DEFAULT NULL,
  `villa_project_id` bigint(20) UNSIGNED DEFAULT NULL,
  `working_date` date NOT NULL,
  `works` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','verified') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accounts_user_id_foreign` (`user_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `advances`
--
ALTER TABLE `advances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `advances_staff_id_foreign` (`staff_id`);

--
-- Indexes for table `advance_histories`
--
ALTER TABLE `advance_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `advance_histories_advance_id_foreign` (`advance_id`),
  ADD KEY `advance_histories_staff_id_foreign` (`staff_id`);

--
-- Indexes for table `chiefengineers`
--
ALTER TABLE `chiefengineers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chiefengineers_user_id_foreign` (`user_id`);

--
-- Indexes for table `contract_customers`
--
ALTER TABLE `contract_customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contract_customers_project_id_foreign` (`project_id`);

--
-- Indexes for table `contract_projects`
--
ALTER TABLE `contract_projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contract_projects_chiefengineer_id_foreign` (`chiefengineer_id`),
  ADD KEY `contract_projects_siteengineer_id_foreign` (`siteengineer_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `labour_suppliers`
--
ALTER TABLE `labour_suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `land_customers`
--
ALTER TABLE `land_customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `land_customers_project_id_foreign` (`project_id`);

--
-- Indexes for table `land_projects`
--
ALTER TABLE `land_projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `land_projects_chiefengineer_id_foreign` (`chiefengineer_id`),
  ADD KEY `land_projects_siteengineer_id_foreign` (`siteengineer_id`);

--
-- Indexes for table `materialins`
--
ALTER TABLE `materialins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materialins_contract_project_id_foreign` (`contract_project_id`),
  ADD KEY `materialins_villa_project_id_foreign` (`villa_project_id`),
  ADD KEY `materialins_supplier_id_foreign` (`supplier_id`),
  ADD KEY `materialins_siteengineer_id_foreign` (`siteengineer_id`),
  ADD KEY `materialins_chiefengineer_id_foreign` (`chiefengineer_id`);

--
-- Indexes for table `materialpurchasehistories`
--
ALTER TABLE `materialpurchasehistories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materialpurchasehistories_contract_project_id_foreign` (`contract_project_id`),
  ADD KEY `materialpurchasehistories_villa_project_id_foreign` (`villa_project_id`),
  ADD KEY `materialpurchasehistories_meterial_id_foreign` (`meterial_id`),
  ADD KEY `materialpurchasehistories_materialin_id_foreign` (`materialin_id`);

--
-- Indexes for table `materialpurchases`
--
ALTER TABLE `materialpurchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materialpurchases_contract_project_id_foreign` (`contract_project_id`),
  ADD KEY `materialpurchases_villa_project_id_foreign` (`villa_project_id`),
  ADD KEY `materialpurchases_materialin_id_foreign` (`materialin_id`),
  ADD KEY `materialpurchases_meterial_id_foreign` (`meterial_id`);

--
-- Indexes for table `material_payment_histories`
--
ALTER TABLE `material_payment_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `material_payment_histories_materialins_id_foreign` (`materialins_id`);

--
-- Indexes for table `mesthiris`
--
ALTER TABLE `mesthiris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mesthiri_assigns`
--
ALTER TABLE `mesthiri_assigns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mesthiri_assigns_contract_project_id_foreign` (`contract_project_id`),
  ADD KEY `mesthiri_assigns_villa_project_id_foreign` (`villa_project_id`);

--
-- Indexes for table `meterials`
--
ALTER TABLE `meterials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `project_customers`
--
ALTER TABLE `project_customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_customers_project_id_foreign` (`project_id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salaries_staff_id_foreign` (`staff_id`);

--
-- Indexes for table `salesmanagers`
--
ALTER TABLE `salesmanagers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salesmanagers_user_id_foreign` (`user_id`);

--
-- Indexes for table `salespeople`
--
ALTER TABLE `salespeople`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salespeople_user_id_foreign` (`user_id`);

--
-- Indexes for table `siteengineers`
--
ALTER TABLE `siteengineers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siteengineers_user_id_foreign` (`user_id`);

--
-- Indexes for table `sitevisitarranges`
--
ALTER TABLE `sitevisitarranges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sitevisitarranges_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_assigns`
--
ALTER TABLE `supplier_assigns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_assigns_contractproject_id_foreign` (`contractproject_id`),
  ADD KEY `supplier_assigns_villaproject_id_foreign` (`villaproject_id`),
  ADD KEY `supplier_assigns_villa_id_foreign` (`villa_id`),
  ADD KEY `supplier_assigns_supplier_id_foreign` (`supplier_id`);

--
-- Indexes for table `supplier_payments`
--
ALTER TABLE `supplier_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_payments_contractproject_id_foreign` (`contractproject_id`),
  ADD KEY `supplier_payments_villaproject_id_foreign` (`villaproject_id`),
  ADD KEY `supplier_payments_villa_id_foreign` (`villa_id`),
  ADD KEY `supplier_payments_supplier_id_foreign` (`supplier_id`);

--
-- Indexes for table `supplier_payment_histories`
--
ALTER TABLE `supplier_payment_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_payment_histories_supplier_payment_id_foreign` (`supplier_payment_id`);

--
-- Indexes for table `telecallers`
--
ALTER TABLE `telecallers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `telecallers_user_id_foreign` (`user_id`);

--
-- Indexes for table `teleworks`
--
ALTER TABLE `teleworks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teleworks_telecaller_id_foreign` (`telecaller_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `villas`
--
ALTER TABLE `villas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `villas_villaproject_id_foreign` (`villaproject_id`);

--
-- Indexes for table `villa_projects`
--
ALTER TABLE `villa_projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `villa_projects_chiefengineer_id_foreign` (`chiefengineer_id`),
  ADD KEY `villa_projects_siteengineer_id_foreign` (`siteengineer_id`);

--
-- Indexes for table `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `worker_entries`
--
ALTER TABLE `worker_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `worker_entries_contract_project_id_foreign` (`contract_project_id`),
  ADD KEY `worker_entries_villa_project_id_foreign` (`villa_project_id`),
  ADD KEY `worker_entries_mesthiri_id_foreign` (`mesthiri_id`);

--
-- Indexes for table `work_entries`
--
ALTER TABLE `work_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_entries_contract_project_id_foreign` (`contract_project_id`),
  ADD KEY `work_entries_villa_project_id_foreign` (`villa_project_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `advances`
--
ALTER TABLE `advances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `advance_histories`
--
ALTER TABLE `advance_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chiefengineers`
--
ALTER TABLE `chiefengineers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contract_customers`
--
ALTER TABLE `contract_customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contract_projects`
--
ALTER TABLE `contract_projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `labour_suppliers`
--
ALTER TABLE `labour_suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `land_customers`
--
ALTER TABLE `land_customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `land_projects`
--
ALTER TABLE `land_projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materialins`
--
ALTER TABLE `materialins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materialpurchasehistories`
--
ALTER TABLE `materialpurchasehistories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materialpurchases`
--
ALTER TABLE `materialpurchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `material_payment_histories`
--
ALTER TABLE `material_payment_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mesthiris`
--
ALTER TABLE `mesthiris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mesthiri_assigns`
--
ALTER TABLE `mesthiri_assigns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meterials`
--
ALTER TABLE `meterials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_customers`
--
ALTER TABLE `project_customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salesmanagers`
--
ALTER TABLE `salesmanagers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salespeople`
--
ALTER TABLE `salespeople`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siteengineers`
--
ALTER TABLE `siteengineers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sitevisitarranges`
--
ALTER TABLE `sitevisitarranges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier_assigns`
--
ALTER TABLE `supplier_assigns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier_payments`
--
ALTER TABLE `supplier_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier_payment_histories`
--
ALTER TABLE `supplier_payment_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `telecallers`
--
ALTER TABLE `telecallers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teleworks`
--
ALTER TABLE `teleworks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `villas`
--
ALTER TABLE `villas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `villa_projects`
--
ALTER TABLE `villa_projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `workers`
--
ALTER TABLE `workers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `worker_entries`
--
ALTER TABLE `worker_entries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `work_entries`
--
ALTER TABLE `work_entries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `advances`
--
ALTER TABLE `advances`
  ADD CONSTRAINT `advances_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `advance_histories`
--
ALTER TABLE `advance_histories`
  ADD CONSTRAINT `advance_histories_advance_id_foreign` FOREIGN KEY (`advance_id`) REFERENCES `advances` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `advance_histories_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chiefengineers`
--
ALTER TABLE `chiefengineers`
  ADD CONSTRAINT `chiefengineers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contract_customers`
--
ALTER TABLE `contract_customers`
  ADD CONSTRAINT `contract_customers_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `contract_projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contract_projects`
--
ALTER TABLE `contract_projects`
  ADD CONSTRAINT `contract_projects_chiefengineer_id_foreign` FOREIGN KEY (`chiefengineer_id`) REFERENCES `chiefengineers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contract_projects_siteengineer_id_foreign` FOREIGN KEY (`siteengineer_id`) REFERENCES `siteengineers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `land_customers`
--
ALTER TABLE `land_customers`
  ADD CONSTRAINT `land_customers_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `land_projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `land_projects`
--
ALTER TABLE `land_projects`
  ADD CONSTRAINT `land_projects_chiefengineer_id_foreign` FOREIGN KEY (`chiefengineer_id`) REFERENCES `chiefengineers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `land_projects_siteengineer_id_foreign` FOREIGN KEY (`siteengineer_id`) REFERENCES `siteengineers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `materialins`
--
ALTER TABLE `materialins`
  ADD CONSTRAINT `materialins_chiefengineer_id_foreign` FOREIGN KEY (`chiefengineer_id`) REFERENCES `chiefengineers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `materialins_contract_project_id_foreign` FOREIGN KEY (`contract_project_id`) REFERENCES `contract_projects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `materialins_siteengineer_id_foreign` FOREIGN KEY (`siteengineer_id`) REFERENCES `siteengineers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `materialins_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `materialins_villa_project_id_foreign` FOREIGN KEY (`villa_project_id`) REFERENCES `villa_projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `materialpurchasehistories`
--
ALTER TABLE `materialpurchasehistories`
  ADD CONSTRAINT `materialpurchasehistories_contract_project_id_foreign` FOREIGN KEY (`contract_project_id`) REFERENCES `contract_projects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `materialpurchasehistories_materialin_id_foreign` FOREIGN KEY (`materialin_id`) REFERENCES `materialins` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `materialpurchasehistories_meterial_id_foreign` FOREIGN KEY (`meterial_id`) REFERENCES `meterials` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `materialpurchasehistories_villa_project_id_foreign` FOREIGN KEY (`villa_project_id`) REFERENCES `villa_projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `materialpurchases`
--
ALTER TABLE `materialpurchases`
  ADD CONSTRAINT `materialpurchases_contract_project_id_foreign` FOREIGN KEY (`contract_project_id`) REFERENCES `contract_projects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `materialpurchases_materialin_id_foreign` FOREIGN KEY (`materialin_id`) REFERENCES `materialins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `materialpurchases_meterial_id_foreign` FOREIGN KEY (`meterial_id`) REFERENCES `meterials` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `materialpurchases_villa_project_id_foreign` FOREIGN KEY (`villa_project_id`) REFERENCES `villa_projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `material_payment_histories`
--
ALTER TABLE `material_payment_histories`
  ADD CONSTRAINT `material_payment_histories_materialins_id_foreign` FOREIGN KEY (`materialins_id`) REFERENCES `materialins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mesthiri_assigns`
--
ALTER TABLE `mesthiri_assigns`
  ADD CONSTRAINT `mesthiri_assigns_contract_project_id_foreign` FOREIGN KEY (`contract_project_id`) REFERENCES `contract_projects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mesthiri_assigns_villa_project_id_foreign` FOREIGN KEY (`villa_project_id`) REFERENCES `villa_projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_customers`
--
ALTER TABLE `project_customers`
  ADD CONSTRAINT `project_customers_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `villa_projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `salaries`
--
ALTER TABLE `salaries`
  ADD CONSTRAINT `salaries_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `salesmanagers`
--
ALTER TABLE `salesmanagers`
  ADD CONSTRAINT `salesmanagers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `salespeople`
--
ALTER TABLE `salespeople`
  ADD CONSTRAINT `salespeople_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `siteengineers`
--
ALTER TABLE `siteengineers`
  ADD CONSTRAINT `siteengineers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sitevisitarranges`
--
ALTER TABLE `sitevisitarranges`
  ADD CONSTRAINT `sitevisitarranges_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `supplier_assigns`
--
ALTER TABLE `supplier_assigns`
  ADD CONSTRAINT `supplier_assigns_contractproject_id_foreign` FOREIGN KEY (`contractproject_id`) REFERENCES `contract_projects` (`id`),
  ADD CONSTRAINT `supplier_assigns_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `labour_suppliers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `supplier_assigns_villa_id_foreign` FOREIGN KEY (`villa_id`) REFERENCES `villas` (`id`),
  ADD CONSTRAINT `supplier_assigns_villaproject_id_foreign` FOREIGN KEY (`villaproject_id`) REFERENCES `villa_projects` (`id`);

--
-- Constraints for table `supplier_payments`
--
ALTER TABLE `supplier_payments`
  ADD CONSTRAINT `supplier_payments_contractproject_id_foreign` FOREIGN KEY (`contractproject_id`) REFERENCES `contract_projects` (`id`),
  ADD CONSTRAINT `supplier_payments_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `labour_suppliers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `supplier_payments_villa_id_foreign` FOREIGN KEY (`villa_id`) REFERENCES `villas` (`id`),
  ADD CONSTRAINT `supplier_payments_villaproject_id_foreign` FOREIGN KEY (`villaproject_id`) REFERENCES `villa_projects` (`id`);

--
-- Constraints for table `supplier_payment_histories`
--
ALTER TABLE `supplier_payment_histories`
  ADD CONSTRAINT `supplier_payment_histories_supplier_payment_id_foreign` FOREIGN KEY (`supplier_payment_id`) REFERENCES `supplier_payments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `villas`
--
ALTER TABLE `villas`
  ADD CONSTRAINT `villas_villaproject_id_foreign` FOREIGN KEY (`villaproject_id`) REFERENCES `villa_projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `worker_entries`
--
ALTER TABLE `worker_entries`
  ADD CONSTRAINT `worker_entries_contract_project_id_foreign` FOREIGN KEY (`contract_project_id`) REFERENCES `contract_projects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `worker_entries_mesthiri_id_foreign` FOREIGN KEY (`mesthiri_id`) REFERENCES `mesthiris` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `worker_entries_villa_project_id_foreign` FOREIGN KEY (`villa_project_id`) REFERENCES `villa_projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `work_entries`
--
ALTER TABLE `work_entries`
  ADD CONSTRAINT `work_entries_contract_project_id_foreign` FOREIGN KEY (`contract_project_id`) REFERENCES `contract_projects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `work_entries_villa_project_id_foreign` FOREIGN KEY (`villa_project_id`) REFERENCES `villa_projects` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

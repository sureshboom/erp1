-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2023 at 02:51 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_code` varchar(255) DEFAULT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'uploads/images/icon.jpg',
  `img` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `alternate_no` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `salary` double(8,2) NOT NULL,
  `aadharno` varchar(20) NOT NULL,
  `pancard` varchar(20) NOT NULL,
  `pfno` varchar(20) NOT NULL,
  `experience` varchar(50) NOT NULL,
  `attachment1` varchar(255) DEFAULT NULL,
  `attachment2` varchar(255) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `vpassword` varchar(255) NOT NULL,
  `joined_date` date DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `user_id`, `user_code`, `photo`, `img`, `phone`, `alternate_no`, `location`, `salary`, `aadharno`, `pancard`, `pfno`, `experience`, `attachment1`, `attachment2`, `attachment`, `vpassword`, `joined_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'SKS0002', 'uploads/images/account/Account_1690000757_64bb5d7564e90.png', '', '9876543210', '1234567890', 'mettu street\r\nworaiyur', 18000.00, '', '', '', '', NULL, NULL, NULL, 'demo@demo', '2023-07-01', 'Active', '2023-07-21 23:09:17', '2023-07-25 07:20:26');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'backend/image/default.png',
  `remember_token` varchar(100) DEFAULT NULL,
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
-- Table structure for table `chiefengineers`
--

CREATE TABLE `chiefengineers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_code` varchar(255) DEFAULT NULL,
  `photo` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `alternate_no` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `salary` double(8,2) NOT NULL,
  `aadharno` varchar(20) NOT NULL,
  `pancard` varchar(20) NOT NULL,
  `pfno` varchar(20) NOT NULL,
  `experience` varchar(20) NOT NULL,
  `attachment1` varchar(255) DEFAULT NULL,
  `attachment2` varchar(255) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `vpassword` varchar(255) NOT NULL,
  `joined_date` date DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chiefengineers`
--

INSERT INTO `chiefengineers` (`id`, `user_id`, `user_code`, `photo`, `img`, `phone`, `alternate_no`, `location`, `salary`, `aadharno`, `pancard`, `pfno`, `experience`, `attachment1`, `attachment2`, `attachment`, `vpassword`, `joined_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 8, 'SKS0007', 'uploads/images/chiefengineer/Chief Engineer_1690361517_64c0dead750f7.png', NULL, '9092250561', '1234567890', 'mettu street\r\nworaiyur', 12000.00, '', '', '', '', NULL, NULL, NULL, 'demo@demo', '2023-07-01', 'Active', '2023-07-26 03:21:57', '2023-07-26 03:21:57');

-- --------------------------------------------------------

--
-- Table structure for table `contract_customers`
--

CREATE TABLE `contract_customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `aadharno` varchar(255) NOT NULL,
  `pancard` varchar(255) NOT NULL,
  `attachment1` varchar(255) NOT NULL,
  `attachment2` varchar(255) NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double(10,2) NOT NULL,
  `advance` double(10,2) NOT NULL,
  `leadfrom` varchar(255) NOT NULL,
  `middleman` varchar(255) DEFAULT NULL,
  `level` enum('1','2','3','4') NOT NULL DEFAULT '1',
  `status` enum('booking','mod','payment','closed') NOT NULL,
  `promote` tinyint(1) NOT NULL DEFAULT 0,
  `remarks` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contract_customers`
--

INSERT INTO `contract_customers` (`id`, `customer_name`, `phone`, `location`, `aadharno`, `pancard`, `attachment1`, `attachment2`, `project_id`, `amount`, `advance`, `leadfrom`, `middleman`, `level`, `status`, `promote`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 'siva raj', '9092250561', 'mettu street\r\nworaiyur', '21321434214152', '2346hws54', 'uploads/images/contractcustomer/aadhar/1692166181_64dc68257cafe.png', 'uploads/images/contractcustomer/pan/1692166181_64dc68257ce03.jpg', 1, 5000000.00, 100000.00, 'salesteam', NULL, '2', 'mod', 0, 'Remark Demo', '2023-08-16 00:39:41', '2023-08-16 07:11:37');

-- --------------------------------------------------------

--
-- Table structure for table `contract_projects`
--

CREATE TABLE `contract_projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `chiefengineer_id` bigint(20) UNSIGNED NOT NULL,
  `siteengineer_id` bigint(20) UNSIGNED NOT NULL,
  `site_date` date DEFAULT NULL,
  `dtcp_no` varchar(255) NOT NULL,
  `reg_no` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `total_land_area` varchar(255) NOT NULL,
  `total_buildup_area` varchar(255) NOT NULL,
  `status` enum('ready_to_start','processing','completed') NOT NULL DEFAULT 'ready_to_start',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contract_projects`
--

INSERT INTO `contract_projects` (`id`, `project_name`, `chiefengineer_id`, `siteengineer_id`, `site_date`, `dtcp_no`, `reg_no`, `location`, `total_land_area`, `total_buildup_area`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Golden Garden', 1, 1, '2023-08-02', '12312412433', '134123413233', 'Ganapathy ,Coimbatore.', '3 Acres', '2.5 Acres', 'processing', '2023-08-15 03:30:39', '2023-08-15 03:33:34');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `interested_project` varchar(255) DEFAULT NULL,
  `interested_area` varchar(255) DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `feedback` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by_id` bigint(20) UNSIGNED NOT NULL,
  `created_by_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_name`, `phone`, `location`, `interested_project`, `interested_area`, `source`, `feedback`, `created_at`, `updated_at`, `created_by_id`, `created_by_type`) VALUES
(1, 'siva raj1', '9092255561', 'mettu street\r\nworaiyurs.', 'lands', 'coimbatore', 'Telecaller', 'demos', '2023-07-22 06:04:07', '2023-07-26 07:21:05', 1, 'salesperson'),
(4, 'siva raj', '09092250561', 'mettu street\r\nworaiyur', 'lands', 'coimbatore', 'Telecaller', 'demo', '2023-07-27 02:04:30', '2023-07-27 02:04:30', 1, 'telecaller'),
(6, 'Raj', '09092250561', 'mettu street\r\nworaiyur', 'lands', 'coimbatore', 'Walk In', 'Demos', '2023-07-28 01:42:09', '2023-07-28 01:42:09', 1, 'salesperson'),
(8, 'Ramu', '09092250561', 'mettu street\r\nworaiyur', 'Land & Constructions', 'coimbatore', 'Website', 'demo', '2023-07-28 06:26:41', '2023-07-28 06:26:41', 1, 'telecaller');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('office','site') NOT NULL,
  `name` varchar(255) NOT NULL,
  `edate` date NOT NULL,
  `amount` double(10,2) NOT NULL,
  `approved_by` varchar(255) NOT NULL,
  `received_by` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `type`, `name`, `edate`, `amount`, `approved_by`, `received_by`, `created_at`, `updated_at`) VALUES
(1, 'site', 'Office Tea Expenses', '2023-08-07', 500.00, 'Ram', 'Raju', '2023-08-08 00:03:26', '2023-08-08 00:28:27');

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
-- Table structure for table `land_customers`
--

CREATE TABLE `land_customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `aadharno` varchar(255) NOT NULL,
  `pancard` varchar(255) NOT NULL,
  `attachment1` varchar(255) NOT NULL,
  `attachment2` varchar(255) NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `plotno` varchar(255) NOT NULL,
  `plot_area` varchar(255) NOT NULL,
  `amount` double(10,2) NOT NULL,
  `advance` double(10,2) NOT NULL,
  `leadfrom` enum('salesteam','middleman') NOT NULL DEFAULT 'salesteam',
  `middleman` varchar(255) DEFAULT NULL,
  `level` enum('1','2','3','4') NOT NULL DEFAULT '1',
  `status` enum('booking','mod','payment','closed') NOT NULL DEFAULT 'booking',
  `remarks` varchar(255) DEFAULT NULL,
  `promote` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `land_customers`
--

INSERT INTO `land_customers` (`id`, `customer_name`, `phone`, `location`, `aadharno`, `pancard`, `attachment1`, `attachment2`, `project_id`, `plotno`, `plot_area`, `amount`, `advance`, `leadfrom`, `middleman`, `level`, `status`, `remarks`, `promote`, `created_at`, `updated_at`) VALUES
(1, 'Ram', '9876554321', 'Saravanampatti, Coimbatore.', '3366424288997755', '5343feal4c', 'uploads/images/landcustomer/aadhar/1692106272_64db7e204db91.png', 'uploads/images/landcustomer/pan/1692106272_64db7e20522d1.png', 1, '122', '4 Cent', 2000000.00, 200000.00, 'middleman', 'Raja', '1', 'booking', 'demo', 0, '2023-08-15 08:01:12', '2023-08-16 07:00:43');

-- --------------------------------------------------------

--
-- Table structure for table `land_payment_histories`
--

CREATE TABLE `land_payment_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `landcustomers_id` bigint(20) UNSIGNED NOT NULL,
  `paytype` varchar(255) NOT NULL,
  `amount` double(10,2) NOT NULL,
  `payway` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `land_projects`
--

CREATE TABLE `land_projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `chiefengineer_id` bigint(20) UNSIGNED NOT NULL,
  `siteengineer_id` bigint(20) UNSIGNED NOT NULL,
  `site_date` date DEFAULT NULL,
  `dtcp_no` varchar(255) NOT NULL,
  `reg_no` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `total_area` varchar(255) NOT NULL,
  `no_plots` varchar(255) NOT NULL,
  `status` enum('ready_to_start','processing','completed') NOT NULL DEFAULT 'ready_to_start',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `land_projects`
--

INSERT INTO `land_projects` (`id`, `project_name`, `chiefengineer_id`, `siteengineer_id`, `site_date`, `dtcp_no`, `reg_no`, `location`, `total_area`, `no_plots`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Green Land', 1, 1, '2023-08-02', '11111333', '13331212212', 'Saravanampatti, Coimbatore.', '10 Acres', '30', 'processing', '2023-08-15 01:38:38', '2023-08-15 01:58:07');

-- --------------------------------------------------------

--
-- Table structure for table `materialins`
--

CREATE TABLE `materialins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `siteengineer_id` bigint(20) UNSIGNED NOT NULL,
  `chiefengineer_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double(10,2) NOT NULL DEFAULT 0.00,
  `paid` double(10,2) NOT NULL DEFAULT 0.00,
  `pending` double(10,2) NOT NULL DEFAULT 0.00,
  `status` enum('order','approved','paid','verified','received','cancel') NOT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materialins`
--

INSERT INTO `materialins` (`id`, `site_id`, `supplier_id`, `siteengineer_id`, `chiefengineer_id`, `amount`, `paid`, `pending`, `status`, `notes`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 20000.00, 15000.00, 5000.00, 'verified', NULL, '2023-08-01 05:16:52', '2023-08-10 03:51:53'),
(2, 1, 1, 1, 1, 15000.00, 0.00, 15000.00, 'approved', NULL, '2023-08-06 23:49:27', '2023-08-08 01:33:31'),
(4, 1, 1, 1, 1, 25000.00, 0.00, 0.00, 'approved', NULL, '2023-08-10 00:20:58', '2023-08-10 03:10:17');

-- --------------------------------------------------------

--
-- Table structure for table `materialpurchasehistories`
--

CREATE TABLE `materialpurchasehistories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_id` bigint(20) UNSIGNED NOT NULL,
  `materialin_id` bigint(20) UNSIGNED NOT NULL,
  `meterial_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materialpurchasehistories`
--

INSERT INTO `materialpurchasehistories` (`id`, `site_id`, `materialin_id`, `meterial_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 30, '2023-08-01 05:16:52', '2023-08-01 05:16:52'),
(2, 1, 1, 4, 20, '2023-08-01 05:16:52', '2023-08-01 05:16:52'),
(3, 1, 1, 3, 10, '2023-08-01 05:16:52', '2023-08-01 05:16:52'),
(4, 1, 2, 1, 10, '2023-08-06 23:49:27', '2023-08-06 23:49:27'),
(5, 1, 2, 3, 5, '2023-08-06 23:49:27', '2023-08-06 23:49:27'),
(13, 1, 4, 1, 10, '2023-08-10 01:55:10', '2023-08-10 01:55:10'),
(14, 1, 4, 3, 3, '2023-08-10 01:55:10', '2023-08-10 01:55:10'),
(15, 1, 4, 4, 5, '2023-08-10 01:55:10', '2023-08-10 01:55:10');

-- --------------------------------------------------------

--
-- Table structure for table `materialpurchases`
--

CREATE TABLE `materialpurchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_id` bigint(20) UNSIGNED NOT NULL,
  `meterial_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materialpurchases`
--

INSERT INTO `materialpurchases` (`id`, `site_id`, `meterial_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 50, '2023-08-01 05:16:52', '2023-08-10 01:55:10'),
(2, 1, 4, 25, '2023-08-01 05:16:52', '2023-08-10 01:55:10'),
(3, 1, 3, 18, '2023-08-01 05:16:52', '2023-08-10 01:55:10');

-- --------------------------------------------------------

--
-- Table structure for table `material_payment_histories`
--

CREATE TABLE `material_payment_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `materialins_id` bigint(20) UNSIGNED NOT NULL,
  `paytype` varchar(255) NOT NULL,
  `amount` double(10,2) NOT NULL,
  `payway` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `material_payment_histories`
--

INSERT INTO `material_payment_histories` (`id`, `materialins_id`, `paytype`, `amount`, `payway`, `created_at`, `updated_at`) VALUES
(1, 1, 'Voucher', 15000.00, 'Voucher', '2023-08-07 00:43:44', '2023-08-07 01:16:42');

-- --------------------------------------------------------

--
-- Table structure for table `mesthiris`
--

CREATE TABLE `mesthiris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `alternate_no` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `gpay` varchar(255) NOT NULL,
  `account` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mesthiris`
--

INSERT INTO `mesthiris` (`id`, `name`, `phone`, `alternate_no`, `location`, `gpay`, `account`, `created_at`, `updated_at`) VALUES
(1, 'Ragul', '9092255111', '9876543111', 'Saravanam patti,Coimbatore.', '9876543111', '313264325555', '2023-08-08 04:18:02', '2023-08-08 04:23:29'),
(3, 'Ram', '8610805698', '9876543210', 'Saravanampatti, Coimbatore.', '9876543210', '313264324024', '2023-08-08 05:31:25', '2023-08-08 05:31:25');

-- --------------------------------------------------------

--
-- Table structure for table `mesthiri_assigns`
--

CREATE TABLE `mesthiri_assigns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_id` bigint(20) UNSIGNED NOT NULL,
  `mesthiri_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mesthiri_assigns`
--

INSERT INTO `mesthiri_assigns` (`id`, `site_id`, `mesthiri_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-08-08 05:28:34', '2023-08-08 05:28:34'),
(2, 1, 3, '2023-08-08 05:31:52', '2023-08-08 05:31:52');

-- --------------------------------------------------------

--
-- Table structure for table `meterials`
--

CREATE TABLE `meterials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meterial_name` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meterials`
--

INSERT INTO `meterials` (`id`, `meterial_name`, `unit`, `created_at`, `updated_at`) VALUES
(1, 'Ultra Cements 5kg', 'Muttai', '2023-07-29 03:12:50', '2023-07-31 04:12:22'),
(3, 'P Sand', 'Ton', '2023-07-31 01:41:03', '2023-07-31 01:41:03'),
(4, 'Ultra Cements 10kg', 'Muttai', '2023-08-01 04:16:58', '2023-08-01 04:16:58');

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
(26, '2023_07_31_083027_create_materialins_table', 8),
(27, '2023_07_31_085152_create_materialpurchases_table', 8),
(28, '2023_07_31_120827_create_materialpurchasehistories_table', 9),
(30, '2023_08_05_071532_create_site_payment_histories_table', 10),
(31, '2023_08_07_052254_create_material_payment_histories_table', 11),
(33, '2023_08_07_090023_create_land_payment_histories_table', 13),
(34, '2023_08_07_121700_create_expenses_table', 14),
(35, '2023_08_08_085515_create_mesthiris_table', 15),
(36, '2023_08_08_085548_create_mesthiri_assigns_table', 15),
(37, '2023_08_08_121600_create_workers_table', 16),
(38, '2023_08_09_051623_create_work_entries_table', 17),
(39, '2023_08_09_083834_create_worker_entries_table', 18),
(40, '2023_08_14_084831_create_land_projects_table', 19),
(41, '2023_08_14_084902_create_contract_projects_table', 19),
(42, '2023_08_14_084924_create_villa_projects_table', 19),
(43, '2023_08_14_085746_create_contract_customers_table', 19),
(44, '2023_08_14_085807_create_project_customers_table', 19),
(45, '2023_08_14_131953_create_land_customers_table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
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
  `customer_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `aadharno` varchar(255) NOT NULL,
  `pancard` varchar(255) NOT NULL,
  `attachment1` varchar(255) NOT NULL,
  `attachment2` varchar(255) NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `vilano` varchar(255) NOT NULL,
  `villa_area` varchar(255) NOT NULL,
  `amount` double(10,2) NOT NULL,
  `advance` double(10,2) NOT NULL,
  `leadfrom` varchar(255) NOT NULL,
  `middleman` varchar(255) DEFAULT NULL,
  `level` enum('1','2','3','4') NOT NULL DEFAULT '1',
  `status` enum('booking','mod','payment','closed') NOT NULL,
  `promote` tinyint(1) NOT NULL DEFAULT 0,
  `remarks` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_customers`
--

INSERT INTO `project_customers` (`id`, `customer_name`, `phone`, `location`, `aadharno`, `pancard`, `attachment1`, `attachment2`, `project_id`, `vilano`, `villa_area`, `amount`, `advance`, `leadfrom`, `middleman`, `level`, `status`, `promote`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 'siva raj', '09092250561', 'mettu street\r\nworaiyur', '21321434214152', '2346hwstw', 'uploads/images/villacustomer/aadhar/1692177834_64dc95aa691d9.png', 'uploads/images/villacustomer/pan/1692177834_64dc95aa6958f.png', 1, '22', '2550', 5000000.00, 100000.00, 'middleman', 'demo', '2', 'mod', 0, 'Demo', '2023-08-16 03:53:54', '2023-08-16 07:20:40');

-- --------------------------------------------------------

--
-- Table structure for table `salesmanagers`
--

CREATE TABLE `salesmanagers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_code` varchar(255) DEFAULT NULL,
  `photo` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `alternate_no` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `salary` double(8,2) NOT NULL,
  `aadharno` varchar(20) NOT NULL,
  `pancard` varchar(20) NOT NULL,
  `pfno` varchar(20) NOT NULL,
  `experience` varchar(20) NOT NULL,
  `attachment1` varchar(255) DEFAULT NULL,
  `attachment2` varchar(255) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `vpassword` varchar(255) NOT NULL,
  `joined_date` date DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salesmanagers`
--

INSERT INTO `salesmanagers` (`id`, `user_id`, `user_code`, `photo`, `img`, `phone`, `alternate_no`, `location`, `salary`, `aadharno`, `pancard`, `pfno`, `experience`, `attachment1`, `attachment2`, `attachment`, `vpassword`, `joined_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 9, 'SKS0008', 'uploads/images/salesmanager/Sales Manager_1690361610_64c0df0a87d3c.png', NULL, '9092250561', '9876543210', 'mettu street\r\nworaiyur', 18000.00, '663446734555557354', '35734574', '27544444444447444', '3', '', '', NULL, 'demo@demo', '2023-07-01', 'Active', '2023-07-26 03:23:30', '2023-08-12 08:51:20');

-- --------------------------------------------------------

--
-- Table structure for table `salespeople`
--

CREATE TABLE `salespeople` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_code` varchar(255) DEFAULT NULL,
  `photo` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `alternate_no` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `salary` double(8,2) NOT NULL,
  `aadharno` varchar(20) NOT NULL,
  `pancard` varchar(20) NOT NULL,
  `pfno` varchar(20) NOT NULL,
  `experience` varchar(20) NOT NULL,
  `attachment1` varchar(255) DEFAULT NULL,
  `attachment2` varchar(255) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `vpassword` varchar(255) NOT NULL,
  `joined_date` date DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salespeople`
--

INSERT INTO `salespeople` (`id`, `user_id`, `user_code`, `photo`, `img`, `phone`, `alternate_no`, `location`, `salary`, `aadharno`, `pancard`, `pfno`, `experience`, `attachment1`, `attachment2`, `attachment`, `vpassword`, `joined_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 10, 'SKS0009', 'uploads/images/salesperson/Sales Person_1690361756_64c0df9c3f22b.png', NULL, '1234567890', '9876543210', 'mettu street\r\nworaiyur', 12000.00, '12521352135', '1111142', '25231111111115', '4', NULL, NULL, NULL, 'demo@demo', '2023-07-01', 'Active', '2023-07-26 03:25:56', '2023-08-12 07:48:06');

-- --------------------------------------------------------

--
-- Table structure for table `siteengineers`
--

CREATE TABLE `siteengineers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_code` varchar(255) DEFAULT NULL,
  `photo` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `alternate_no` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `salary` double(8,2) NOT NULL,
  `aadharno` varchar(20) NOT NULL,
  `pancard` varchar(20) NOT NULL,
  `pfno` varchar(20) NOT NULL,
  `experience` varchar(20) NOT NULL,
  `attachment1` varchar(255) DEFAULT NULL,
  `attachment2` varchar(255) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `vpassword` varchar(255) NOT NULL,
  `joined_date` date DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siteengineers`
--

INSERT INTO `siteengineers` (`id`, `user_id`, `user_code`, `photo`, `img`, `phone`, `alternate_no`, `location`, `salary`, `aadharno`, `pancard`, `pfno`, `experience`, `attachment1`, `attachment2`, `attachment`, `vpassword`, `joined_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 7, 'SKS0006', 'uploads/images/siteengineer/Site Engineer_1690361285_64c0ddc56cc9b.png', NULL, '9092250561', '9876543210', 'mettu street\r\nworaiyur', 15000.00, '432266622623463', '23462646334', '326424623336', '4', 'uploads/images/siteengineer/pan/1691849602_64d793826bd70.png', NULL, 'uploads/images/siteengineer/aadhar/1691849602_64d7938260814.png', 'demo@demo', '2023-07-01', 'Active', '2023-07-26 03:18:05', '2023-08-12 08:43:22'),
(2, 13, 'sksvn1', 'uploads/images/siteengineer/demo_1691843451_64d77b7b138db.png', NULL, '2342345324', '346324634', 'demo', 15000.00, '42136346234632', '1234fwcx', '23623463534', '4', 'uploads/uploads/images/siteengineer/pan/1691843451_64d77b7b2bde6.png', 'uploads/uploads/images/siteengineer/others/1691843451_64d77b7b2c460.png', 'uploads/uploads/images/siteengineer/aadhar/1691843451_64d77b7b286c6.png', 'demo@demo', '2023-08-04', 'Active', '2023-08-12 07:00:51', '2023-08-12 07:00:51');

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE `sites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sitename` varchar(255) NOT NULL,
  `siteid` varchar(255) NOT NULL,
  `sitetype` varchar(255) NOT NULL,
  `owner_id` bigint(20) UNSIGNED NOT NULL,
  `chiefengineer_id` bigint(20) UNSIGNED NOT NULL,
  `siteengineer_id` bigint(20) UNSIGNED NOT NULL,
  `mesthiri_id` bigint(20) DEFAULT NULL,
  `amount` double(10,2) NOT NULL DEFAULT 0.00,
  `paid` double(10,2) NOT NULL DEFAULT 0.00,
  `pending` double(10,2) NOT NULL DEFAULT 0.00,
  `location` varchar(255) NOT NULL,
  `site_date` date DEFAULT NULL,
  `status` enum('ready_to_start','processing','completed') NOT NULL DEFAULT 'ready_to_start',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`id`, `sitename`, `siteid`, `sitetype`, `owner_id`, `chiefengineer_id`, `siteengineer_id`, `mesthiri_id`, `amount`, `paid`, `pending`, `location`, `site_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Site A', 'SKSPR01', 'Land & Construction', 1, 1, 1, 3, 2000000.00, 300000.00, 1700000.00, 'Saravanampatti,Coimbatore.', '2023-07-01', 'ready_to_start', '2023-07-26 06:30:12', '2023-08-08 05:31:52');

-- --------------------------------------------------------

--
-- Table structure for table `sitevisitarranges`
--

CREATE TABLE `sitevisitarranges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `received_id` varchar(255) DEFAULT NULL,
  `status` enum('open','visited','closed') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sitevisitarranges`
--

INSERT INTO `sitevisitarranges` (`id`, `customer_id`, `site_name`, `date`, `received_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 4, 'Site A', '2023-07-31', '1', 'closed', '2023-07-27 06:45:30', '2023-07-28 04:28:13'),
(3, 6, 'Site B', '2023-07-28', '1', 'visited', '2023-07-28 01:42:09', '2023-07-28 01:42:09'),
(5, 8, 'Site C', '2023-08-01', NULL, 'open', '2023-07-28 06:29:49', '2023-07-28 06:29:49');

-- --------------------------------------------------------

--
-- Table structure for table `site_payment_histories`
--

CREATE TABLE `site_payment_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_id` bigint(20) UNSIGNED NOT NULL,
  `paytype` varchar(255) NOT NULL,
  `amount` double(10,2) NOT NULL,
  `payway` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_payment_histories`
--

INSERT INTO `site_payment_histories` (`id`, `site_id`, `paytype`, `amount`, `payway`, `created_at`, `updated_at`) VALUES
(1, 1, 'Voucher', 200000.00, 'Voucher', '2023-08-05 06:59:15', '2023-08-05 06:59:15'),
(6, 1, 'Gpay/Phonepay', 100000.00, '9876543210', '2023-08-06 08:52:47', '2023-08-06 09:30:16');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `supplier_phone` varchar(15) NOT NULL,
  `supplier_gstno` varchar(255) NOT NULL,
  `supplier_location` varchar(255) NOT NULL,
  `supplier_gpay` varchar(255) NOT NULL,
  `supplier_account` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_name`, `supplier_phone`, `supplier_gstno`, `supplier_location`, `supplier_gpay`, `supplier_account`, `created_at`, `updated_at`) VALUES
(1, 'Ramu', '9876543554', '9922884466113', 'Saravanampatti, Coimbatore.', '1234567788', 'Account No: 238461298367,\r\nBank :state bank of india,\r\nIFSC Code:SBIN0007039', '2023-07-29 06:03:38', '2023-07-31 04:05:34');

-- --------------------------------------------------------

--
-- Table structure for table `telecallers`
--

CREATE TABLE `telecallers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_code` varchar(255) DEFAULT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'uploads/images/icon.jpg',
  `img` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `alternate_no` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `salary` double(8,2) NOT NULL,
  `aadharno` varchar(15) NOT NULL,
  `pancard` varchar(15) NOT NULL,
  `pfno` varchar(20) NOT NULL,
  `experience` varchar(50) NOT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `attachment1` varchar(255) DEFAULT NULL,
  `attachment2` varchar(255) DEFAULT NULL,
  `vpassword` varchar(255) NOT NULL,
  `joined_date` date DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `telecallers`
--

INSERT INTO `telecallers` (`id`, `user_id`, `user_code`, `photo`, `img`, `phone`, `alternate_no`, `location`, `salary`, `aadharno`, `pancard`, `pfno`, `experience`, `attachment`, `attachment1`, `attachment2`, `vpassword`, `joined_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'SKS0001', 'uploads/images/telecaller/Telecaller_1690000628_64bb5cf425ffe.png', NULL, '9876543212', '1234567690', 'mettu street\r\nworaiyurs.', 10000.00, '', '', '', '', NULL, NULL, NULL, 'demo@demo', '2023-07-01', 'Active', '2023-07-21 23:07:08', '2023-07-25 07:20:34'),
(3, 6, 'SKS0005', 'uploads/images/telecaller/Telecaller_1690183785_64be2869f0b3f.png', NULL, '1234567890', '9876543210', 'mettu street\r\nworaiyur', 10000.00, '', '', '', '', NULL, NULL, NULL, 'demo@demo', '2023-07-01', 'Active', '2023-07-24 01:59:46', '2023-07-25 07:19:55');

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

--
-- Dumping data for table `teleworks`
--

INSERT INTO `teleworks` (`id`, `telecaller_id`, `called`, `follow_up`, `site_visit`, `created_at`, `updated_at`) VALUES
(2, 1, 15, 8, 5, '2023-07-22 06:55:16', '2023-07-22 06:59:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('account','telecaller','siteengineer','chiefengineer','salesmanager','salesperson') NOT NULL DEFAULT 'telecaller',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Telecaller1', 'telecaller1@gmail.com', '$2y$10$QqnSeIegAXenGM0eLMPmbu6RABKxa8.PMhYZjRx8B6TORkVRxv4Jq', 'telecaller', NULL, NULL, '2023-07-21 23:07:08', '2023-07-25 07:20:34'),
(2, 'Account', 'account1@gmail.com', '$2y$10$ukMA8mc7tanSSXV6Bkk.oOl6W.DNcw8UtgktldeFAapfIb5YAX7.m', 'account', NULL, NULL, '2023-07-21 23:09:17', '2023-07-25 07:20:26'),
(6, 'Telecaller', 'telecaller2@gmail.com', '$2y$10$miTEhC2KzFKufgl4rN7HiuORPFId6OpSJNtACnMa0nR6M/.UyOOSS', 'telecaller', NULL, NULL, '2023-07-24 01:59:45', '2023-07-25 07:19:55'),
(7, 'Site Engineer', 'siteengineer1@gmail.com', '$2y$10$/mKPwXEIlqsUARrL6rvDKu04OkPGSi5FpHTxBnz8.Vp2x/iF5G8kW', 'siteengineer', NULL, NULL, '2023-07-26 03:18:05', '2023-08-12 08:43:22'),
(8, 'Chief Engineer', 'chiefengineer1@gmail.com', '$2y$10$c/uHZ/xlW9fHt6MIdEMiUeEMzl9pBYpAguUwQVkPt3hF1nAUPgulS', 'chiefengineer', NULL, NULL, '2023-07-26 03:21:57', '2023-07-26 03:21:57'),
(9, 'Sales Manager', 'salesmanager1@gmail.com', '$2y$10$Xn10UGreyRbP/qgNmTFopePoqeY8o1m8BhDC/KmFtSeXxmEIBMe96', 'salesmanager', NULL, NULL, '2023-07-26 03:23:30', '2023-08-12 08:51:20'),
(10, 'Sales Person', 'salesperson1@gmail.com', '$2y$10$.GvPKjzE78OPKsvs3khy/O7jhq12BXPtnks4EM6wVkLFBuc8bNj6y', 'salesperson', NULL, NULL, '2023-07-26 03:25:56', '2023-08-12 07:48:06'),
(13, 'demo', 'demo@gmail.com', '$2y$10$akhUIO5A030Ylm4.2X4aE.c.LuMV.5DWuraBIvsJ6LQBUkQ8gyik2', 'siteengineer', NULL, NULL, '2023-08-12 07:00:51', '2023-08-12 07:00:51');

-- --------------------------------------------------------

--
-- Table structure for table `villa_projects`
--

CREATE TABLE `villa_projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `chiefengineer_id` bigint(20) UNSIGNED NOT NULL,
  `siteengineer_id` bigint(20) UNSIGNED NOT NULL,
  `site_date` date DEFAULT NULL,
  `dtcp_no` varchar(255) NOT NULL,
  `reg_no` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `total_land_area` varchar(255) NOT NULL,
  `total_buildup_area` varchar(255) NOT NULL,
  `no_of_unit` varchar(255) NOT NULL,
  `status` enum('ready_to_start','processing','completed') NOT NULL DEFAULT 'ready_to_start',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `villa_projects`
--

INSERT INTO `villa_projects` (`id`, `project_name`, `chiefengineer_id`, `siteengineer_id`, `site_date`, `dtcp_no`, `reg_no`, `location`, `total_land_area`, `total_buildup_area`, `no_of_unit`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Green Gardens', 1, 1, '2023-08-02', '123411234', '1411564453', 'Saravanam patti, Coimbatore.', '10 Acres', '9 Acres', '25', 'processing', '2023-08-15 02:51:56', '2023-08-15 03:00:24');

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE `workers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Mason', '2023-08-08 07:19:20', '2023-08-08 23:09:09'),
(3, 'Plumber', '2023-08-08 23:09:50', '2023-08-08 23:09:50'),
(4, 'Electrician', '2023-08-08 23:10:52', '2023-08-08 23:10:52'),
(5, 'Welder', '2023-08-08 23:11:16', '2023-08-08 23:11:16'),
(6, 'Concrete Finisher', '2023-08-08 23:11:45', '2023-08-08 23:11:54'),
(7, 'Tile Setter', '2023-08-08 23:12:09', '2023-08-08 23:12:09'),
(8, 'Roofer', '2023-08-08 23:12:36', '2023-08-08 23:12:36'),
(9, 'Flooring Installer', '2023-08-08 23:14:03', '2023-08-08 23:14:03');

-- --------------------------------------------------------

--
-- Table structure for table `worker_entries`
--

CREATE TABLE `worker_entries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_id` bigint(20) UNSIGNED NOT NULL,
  `mesthiri_id` bigint(20) UNSIGNED NOT NULL,
  `workeddate` date NOT NULL,
  `salary` double(10,2) NOT NULL DEFAULT 0.00,
  `workers` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`workers`)),
  `count` int(11) NOT NULL,
  `status` enum('pending','verified','paid') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `worker_entries`
--

INSERT INTO `worker_entries` (`id`, `site_id`, `mesthiri_id`, `workeddate`, `salary`, `workers`, `count`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 3, '2023-08-08', 20000.00, '[{\"Mason\":\"15\"},{\"Flooring Installer\":\"20\"}]', 35, 'verified', '2023-08-09 05:59:35', '2023-08-09 07:08:51'),
(3, 1, 3, '2023-08-09', 0.00, '[{\"Mason\":\"15\"},{\"Plumber\":\"5\"},{\"Electrician\":\"8\"}]', 28, 'pending', '2023-08-09 06:09:55', '2023-08-09 06:42:10'),
(4, 1, 3, '2023-08-10', 0.00, '[{\"Mason\":\"20\"},{\"Plumber\":\"5\"},{\"Electrician\":\"2\"}]', 27, 'pending', '2023-08-10 03:29:33', '2023-08-10 03:29:33');

-- --------------------------------------------------------

--
-- Table structure for table `work_entries`
--

CREATE TABLE `work_entries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `working_date` date NOT NULL,
  `site_id` bigint(20) UNSIGNED NOT NULL,
  `works` varchar(255) NOT NULL,
  `status` enum('pending','verified') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_entries`
--

INSERT INTO `work_entries` (`id`, `working_date`, `site_id`, `works`, `status`, `created_at`, `updated_at`) VALUES
(2, '2023-08-09', 1, 'Demo of Works Entry', 'verified', '2023-08-09 01:20:25', '2023-08-09 01:53:07');

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
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `land_customers`
--
ALTER TABLE `land_customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `land_customers_project_id_foreign` (`project_id`);

--
-- Indexes for table `land_payment_histories`
--
ALTER TABLE `land_payment_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `land_payment_histories_landcustomers_id_foreign` (`landcustomers_id`);

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
  ADD KEY `materialins_site_id_foreign` (`site_id`),
  ADD KEY `materialins_supplier_id_foreign` (`supplier_id`),
  ADD KEY `materialins_siteengineer_id_foreign` (`siteengineer_id`),
  ADD KEY `materialins_chiefengineer_id_foreign` (`chiefengineer_id`);

--
-- Indexes for table `materialpurchasehistories`
--
ALTER TABLE `materialpurchasehistories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materialpurchasehistories_site_id_foreign` (`site_id`),
  ADD KEY `materialpurchasehistories_meterial_id_foreign` (`meterial_id`),
  ADD KEY `materialpurchasehistories_materialin_id_foreign` (`materialin_id`);

--
-- Indexes for table `materialpurchases`
--
ALTER TABLE `materialpurchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materialpurchases_site_id_foreign` (`site_id`),
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
  ADD KEY `mesthiri_assigns_site_id_foreign` (`site_id`);

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
-- Indexes for table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sites_owner_id_foreign` (`owner_id`),
  ADD KEY `sites_chiefengineer_id_foreign` (`chiefengineer_id`),
  ADD KEY `sites_siteengineer_id_foreign` (`siteengineer_id`);

--
-- Indexes for table `sitevisitarranges`
--
ALTER TABLE `sitevisitarranges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sitevisitarranges_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `site_payment_histories`
--
ALTER TABLE `site_payment_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `site_payment_histories_site_id_foreign` (`site_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `worker_entries_site_id_foreign` (`site_id`),
  ADD KEY `worker_entries_mesthiri_id_foreign` (`mesthiri_id`);

--
-- Indexes for table `work_entries`
--
ALTER TABLE `work_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_entries_site_id_foreign` (`site_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chiefengineers`
--
ALTER TABLE `chiefengineers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contract_customers`
--
ALTER TABLE `contract_customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contract_projects`
--
ALTER TABLE `contract_projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `land_customers`
--
ALTER TABLE `land_customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `land_payment_histories`
--
ALTER TABLE `land_payment_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `land_projects`
--
ALTER TABLE `land_projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `materialins`
--
ALTER TABLE `materialins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `materialpurchasehistories`
--
ALTER TABLE `materialpurchasehistories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `materialpurchases`
--
ALTER TABLE `materialpurchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `material_payment_histories`
--
ALTER TABLE `material_payment_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mesthiris`
--
ALTER TABLE `mesthiris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mesthiri_assigns`
--
ALTER TABLE `mesthiri_assigns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `meterials`
--
ALTER TABLE `meterials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_customers`
--
ALTER TABLE `project_customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `salesmanagers`
--
ALTER TABLE `salesmanagers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `salespeople`
--
ALTER TABLE `salespeople`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `siteengineers`
--
ALTER TABLE `siteengineers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sites`
--
ALTER TABLE `sites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sitevisitarranges`
--
ALTER TABLE `sitevisitarranges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `site_payment_histories`
--
ALTER TABLE `site_payment_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `telecallers`
--
ALTER TABLE `telecallers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teleworks`
--
ALTER TABLE `teleworks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `villa_projects`
--
ALTER TABLE `villa_projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `workers`
--
ALTER TABLE `workers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `worker_entries`
--
ALTER TABLE `worker_entries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `work_entries`
--
ALTER TABLE `work_entries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `land_payment_histories`
--
ALTER TABLE `land_payment_histories`
  ADD CONSTRAINT `land_payment_histories_landcustomers_id_foreign` FOREIGN KEY (`landcustomers_id`) REFERENCES `land_customers` (`id`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `materialins_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `materialins_siteengineer_id_foreign` FOREIGN KEY (`siteengineer_id`) REFERENCES `siteengineers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `materialins_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `materialpurchasehistories`
--
ALTER TABLE `materialpurchasehistories`
  ADD CONSTRAINT `materialpurchasehistories_meterial_id_foreign` FOREIGN KEY (`meterial_id`) REFERENCES `meterials` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `materialpurchasehistories_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `materialpurchases`
--
ALTER TABLE `materialpurchases`
  ADD CONSTRAINT `materialpurchases_meterial_id_foreign` FOREIGN KEY (`meterial_id`) REFERENCES `meterials` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `materialpurchases_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `material_payment_histories`
--
ALTER TABLE `material_payment_histories`
  ADD CONSTRAINT `material_payment_histories_materialins_id_foreign` FOREIGN KEY (`materialins_id`) REFERENCES `materialins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mesthiri_assigns`
--
ALTER TABLE `mesthiri_assigns`
  ADD CONSTRAINT `mesthiri_assigns_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_customers`
--
ALTER TABLE `project_customers`
  ADD CONSTRAINT `project_customers_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `villa_projects` (`id`) ON DELETE CASCADE;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

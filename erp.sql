-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2023 at 05:04 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
  `phone` varchar(255) DEFAULT NULL,
  `alternate_no` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `salary` double(8,2) NOT NULL,
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

INSERT INTO `accounts` (`id`, `user_id`, `user_code`, `photo`, `phone`, `alternate_no`, `location`, `salary`, `attachment`, `vpassword`, `joined_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'SKS0002', 'uploads/images/account/Account_1690000757_64bb5d7564e90.png', '9876543210', '1234567890', 'mettu street\r\nworaiyur', 18000.00, NULL, 'demo@demo', '2023-07-01', 'Active', '2023-07-21 23:09:17', '2023-07-25 07:20:26');

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
  `phone` varchar(255) DEFAULT NULL,
  `alternate_no` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `salary` double(8,2) NOT NULL,
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

INSERT INTO `chiefengineers` (`id`, `user_id`, `user_code`, `photo`, `phone`, `alternate_no`, `location`, `salary`, `attachment`, `vpassword`, `joined_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 8, 'SKS0007', 'uploads/images/chiefengineer/Chief Engineer_1690361517_64c0dead750f7.png', '9092250561', '1234567890', 'mettu street\r\nworaiyur', 12000.00, NULL, 'demo@demo', '2023-07-01', 'Active', '2023-07-26 03:21:57', '2023-07-26 03:21:57');

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
-- Table structure for table `materialins`
--

CREATE TABLE `materialins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `siteengineer_id` bigint(20) UNSIGNED NOT NULL,
  `chiefengineer_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double(8,2) NOT NULL,
  `paid` double(8,2) NOT NULL DEFAULT 0.00,
  `pending` double(8,2) NOT NULL DEFAULT 0.00,
  `status` enum('order','approved','paid','verified','received','cancel') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materialins`
--

INSERT INTO `materialins` (`id`, `site_id`, `supplier_id`, `siteengineer_id`, `chiefengineer_id`, `amount`, `paid`, `pending`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 20000.00, 0.00, 0.00, 'order', '2023-08-01 05:16:52', '2023-08-01 06:32:03');

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
(3, 1, 1, 3, 10, '2023-08-01 05:16:52', '2023-08-01 05:16:52');

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
(1, 1, 1, 30, '2023-08-01 05:16:52', '2023-08-01 05:16:52'),
(2, 1, 4, 20, '2023-08-01 05:16:52', '2023-08-01 05:16:52'),
(3, 1, 3, 10, '2023-08-01 05:16:52', '2023-08-01 05:16:52');

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
(15, '2023_07_25_125247_create_owners_table', 3),
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
(30, '2023_08_05_071532_create_site_payment_histories_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `referred_by` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`id`, `owner_name`, `phone`, `location`, `referred_by`, `created_at`, `updated_at`) VALUES
(1, 'Ram', '9876543210', 'saravanam patti, Coimbatore', 'Ragul', '2023-07-26 05:46:28', '2023-07-26 05:59:13'),
(2, 'Ragul', '9876543210', 'kalapatti,Coimbatore.', 'Ram', '2023-07-26 06:00:20', '2023-07-26 06:00:20');

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
-- Table structure for table `salesmanagers`
--

CREATE TABLE `salesmanagers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_code` varchar(255) DEFAULT NULL,
  `photo` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `alternate_no` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `salary` double(8,2) NOT NULL,
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

INSERT INTO `salesmanagers` (`id`, `user_id`, `user_code`, `photo`, `phone`, `alternate_no`, `location`, `salary`, `attachment`, `vpassword`, `joined_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 9, 'SKS0008', 'uploads/images/salesmanager/Sales Manager_1690361610_64c0df0a87d3c.png', '9092250561', '9876543210', 'mettu street\r\nworaiyur', 18000.00, NULL, 'demo@demo', '2023-07-01', 'Active', '2023-07-26 03:23:30', '2023-07-26 04:07:58');

-- --------------------------------------------------------

--
-- Table structure for table `salespeople`
--

CREATE TABLE `salespeople` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_code` varchar(255) DEFAULT NULL,
  `photo` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `alternate_no` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `salary` double(8,2) NOT NULL,
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

INSERT INTO `salespeople` (`id`, `user_id`, `user_code`, `photo`, `phone`, `alternate_no`, `location`, `salary`, `attachment`, `vpassword`, `joined_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 10, 'SKS0009', 'uploads/images/salesperson/Sales Person_1690361756_64c0df9c3f22b.png', '1234567890', '9876543210', 'mettu street\r\nworaiyur', 12000.00, NULL, 'demo@demo', '2023-07-01', 'Active', '2023-07-26 03:25:56', '2023-07-26 03:25:56');

-- --------------------------------------------------------

--
-- Table structure for table `siteengineers`
--

CREATE TABLE `siteengineers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_code` varchar(255) DEFAULT NULL,
  `photo` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `alternate_no` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `salary` double(8,2) NOT NULL,
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

INSERT INTO `siteengineers` (`id`, `user_id`, `user_code`, `photo`, `phone`, `alternate_no`, `location`, `salary`, `attachment`, `vpassword`, `joined_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 7, 'SKS0006', 'uploads/images/siteengineer/Site Engineer_1690361285_64c0ddc56cc9b.png', '9092250561', '9876543210', 'mettu street\r\nworaiyur', 15000.00, NULL, 'demo@demo', '2023-07-01', 'Active', '2023-07-26 03:18:05', '2023-07-26 03:18:05');

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

INSERT INTO `sites` (`id`, `sitename`, `siteid`, `sitetype`, `owner_id`, `chiefengineer_id`, `siteengineer_id`, `amount`, `paid`, `pending`, `location`, `site_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Site A', 'SKSPR01', 'Land & Construction', 1, 1, 1, 2000000.00, 300000.00, 1700000.00, 'Saravanampatti,Coimbatore.', '2023-07-01', 'ready_to_start', '2023-07-26 06:30:12', '2023-08-06 09:30:16');

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
  `phone` varchar(255) DEFAULT NULL,
  `alternate_no` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `salary` double(8,2) NOT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `vpassword` varchar(255) NOT NULL,
  `joined_date` date DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `telecallers`
--

INSERT INTO `telecallers` (`id`, `user_id`, `user_code`, `photo`, `phone`, `alternate_no`, `location`, `salary`, `attachment`, `vpassword`, `joined_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'SKS0001', 'uploads/images/telecaller/Telecaller_1690000628_64bb5cf425ffe.png', '9876543212', '1234567690', 'mettu street\r\nworaiyurs.', 10000.00, NULL, 'demo@demo', '2023-07-01', 'Active', '2023-07-21 23:07:08', '2023-07-25 07:20:34'),
(3, 6, 'SKS0005', 'uploads/images/telecaller/Telecaller_1690183785_64be2869f0b3f.png', '1234567890', '9876543210', 'mettu street\r\nworaiyur', 10000.00, NULL, 'demo@demo', '2023-07-01', 'Active', '2023-07-24 01:59:46', '2023-07-25 07:19:55');

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
(7, 'Site Engineer', 'siteengineer1@gmail.com', '$2y$10$GQgxEPEEO3W4kuFXGyBmyeAOcMZLZN4guVLnV7ukzOS4nBc6TP712', 'siteengineer', NULL, NULL, '2023-07-26 03:18:05', '2023-07-26 03:18:05'),
(8, 'Chief Engineer', 'chiefengineer1@gmail.com', '$2y$10$c/uHZ/xlW9fHt6MIdEMiUeEMzl9pBYpAguUwQVkPt3hF1nAUPgulS', 'chiefengineer', NULL, NULL, '2023-07-26 03:21:57', '2023-07-26 03:21:57'),
(9, 'Sales Manager', 'salesmanager1@gmail.com', '$2y$10$.xJTK3eC4Xw4CtZVYafbC.4GObyriKLLLhT.2WisGct3vtjVeAzS6', 'salesmanager', NULL, NULL, '2023-07-26 03:23:30', '2023-07-26 04:07:58'),
(10, 'Sales Person', 'salesperson1@gmail.com', '$2y$10$fJ2Dxk2Fn8sz3lOIPVRc5eRMqopuhDxph8VSwz4vDJxGQsGZm6toK', 'salesperson', NULL, NULL, '2023-07-26 03:25:56', '2023-07-26 03:25:56');

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
-- Indexes for table `owners`
--
ALTER TABLE `owners`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materialins`
--
ALTER TABLE `materialins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `materialpurchasehistories`
--
ALTER TABLE `materialpurchasehistories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `materialpurchases`
--
ALTER TABLE `materialpurchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `meterials`
--
ALTER TABLE `meterials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- Constraints for table `sites`
--
ALTER TABLE `sites`
  ADD CONSTRAINT `sites_chiefengineer_id_foreign` FOREIGN KEY (`chiefengineer_id`) REFERENCES `chiefengineers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sites_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `owners` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sites_siteengineer_id_foreign` FOREIGN KEY (`siteengineer_id`) REFERENCES `siteengineers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sitevisitarranges`
--
ALTER TABLE `sitevisitarranges`
  ADD CONSTRAINT `sitevisitarranges_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `site_payment_histories`
--
ALTER TABLE `site_payment_histories`
  ADD CONSTRAINT `site_payment_histories_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `telecallers`
--
ALTER TABLE `telecallers`
  ADD CONSTRAINT `telecallers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teleworks`
--
ALTER TABLE `teleworks`
  ADD CONSTRAINT `teleworks_telecaller_id_foreign` FOREIGN KEY (`telecaller_id`) REFERENCES `telecallers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

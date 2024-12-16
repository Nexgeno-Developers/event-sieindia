-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 12, 2022 at 12:53 PM
-- Server version: 5.7.36
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eurodental`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rashidweb', 'rashidk.developer@gmail.com', 'assets/admin/img/app/logo.png', '2022-12-12 12:48:36', '$2y$10$WDhrk61sqM7vh5LcXcUQQ.oX8ujaju5GFTfK6KPCXzFwUsFl/OibS', NULL, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(2, 'Superadmin', 'info@sieindia.in', 'assets/admin/img/app/logo.png', '2022-12-12 12:48:36', '$2y$10$yua7esb5sQzkvwq4lR1G5OyG6Ckedm9C/iG581mSX55DctSQw8Bz6', NULL, '2022-12-12 12:48:36', '2022-12-12 12:48:36');

-- --------------------------------------------------------

--
-- Table structure for table `admin_settings`
--

DROP TABLE IF EXISTS `admin_settings`;
CREATE TABLE IF NOT EXISTS `admin_settings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `app_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timezone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ui_mode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_settings`
--

INSERT INTO `admin_settings` (`id`, `app_name`, `app_logo`, `timezone`, `ui_mode`, `created_at`, `updated_at`) VALUES
(1, 'Eurodental', 'assets/admin/img/app/logo.png', 'Asia/Kolkata', 'light', '2022-12-12 12:48:36', '2022-12-12 12:48:36');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_01_160317_create_admins_table', 1),
(6, '2022_11_07_140916_create_admin_settings_table', 1),
(7, '2022_11_26_103728_create_slots_table', 1),
(8, '2022_11_26_103757_create_orders_table', 1),
(9, '2022_11_26_104045_create_order_items_table', 1),
(10, '2022_12_12_150504_create_states_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dci_no` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grand_total` double(8,2) NOT NULL,
  `payment_method` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_id` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_response` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `d1` longtext COLLATE utf8mb4_unicode_ci,
  `d2` longtext COLLATE utf8mb4_unicode_ci,
  `d3` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `slot_id` int(11) NOT NULL,
  `slot_name` varchar(355) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slot_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slot_date` date NOT NULL,
  `speaker` varchar(355) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slots`
--

DROP TABLE IF EXISTS `slots`;
CREATE TABLE IF NOT EXISTS `slots` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `slot_name` varchar(355) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slot_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slot_price` double(8,2) NOT NULL,
  `slot_date` date NOT NULL,
  `speaker` varchar(355) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `slot_seats` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slots`
--

INSERT INTO `slots` (`id`, `slot_name`, `slot_time`, `slot_price`, `slot_date`, `speaker`, `description`, `slot_seats`, `created_at`, `updated_at`) VALUES
(1, 'Hall A (Suite 202)', '08am to 10am', 1000.00, '2023-02-04', 'Amit', 'Topic name here', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(2, 'Hall B (Suite 203)', '08am to 10am', 2000.00, '2023-02-04', 'Amit', 'Topic name here', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(3, 'Hall C (Suite 204A)', '08am to 10am', 3000.00, '2023-02-04', 'Amit', 'Topic name here', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(4, 'Hall D (Suite 204B)', '08am to 10am', 4000.00, '2023-02-04', 'Amit', 'Topic name here', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(5, 'Hall A (Suite 202)', '11am to 01pm', 1000.00, '2023-02-04', 'Amit', 'Topic name here', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(6, 'Hall B (Suite 203)', '11am to 01pm', 2000.00, '2023-02-04', 'Amit', 'Topic name here', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(7, 'Hall C (Suite 204A)', '11am to 01pm', 3000.00, '2023-02-04', 'Amit', 'Topic name here', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(8, 'Hall D (Suite 204B)', '11am to 01pm', 4000.00, '2023-02-04', 'Amit', 'Topic name here', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(9, 'Hall A (Suite 202)', '02pm to 04pm', 1000.00, '2023-02-04', 'Amit', 'Topic name here', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(10, 'Hall B (Suite 203)', '02pm to 04pm', 2000.00, '2023-02-04', 'Amit', 'Topic name here', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(11, 'Hall C (Suite 204A)', '02pm to 04pm', 3000.00, '2023-02-04', 'Amit', 'Topic name here', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(12, 'Hall D (Suite 204B)', '02pm to 04pm', 4000.00, '2023-02-04', 'Amit', 'Topic name here', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(13, 'Hall A (Suite 202)', '05am to 07pm', 1000.00, '2023-02-04', 'Amit', 'Topic name here', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(14, 'Hall B (Suite 203)', '05am to 07pm', 2000.00, '2023-02-04', 'Amit', 'Topic name here', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(15, 'Hall C (Suite 204A)', '05am to 07pm', 3000.00, '2023-02-04', 'Amit', 'Topic name here', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(16, 'Hall D (Suite 204B)', '05am to 07pm', 4000.00, '2023-02-04', 'Amit', 'Topic name here', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(17, 'Hall A (Suite 202)', '08am to 10am', 1000.00, '2023-02-05', 'Amit', 'Topic name here', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(18, 'Hall B (Suite 203)', '08am to 10am', 2000.00, '2023-02-05', 'Amit', 'Topic name here', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(19, 'Hall C (Suite 204A)', '08am to 10am', 3000.00, '2023-02-05', 'Amit', 'Topic name here', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(20, 'Hall D (Suite 204B)', '08am to 10am', 4000.00, '2023-02-05', 'Amit', 'Topic name here', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(21, 'Hall A (Suite 202)', '11am to 01pm', 1000.00, '2023-02-05', 'Amit', 'Topic name here', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(22, 'Hall B (Suite 203)', '11am to 01pm', 2000.00, '2023-02-05', 'Amit', 'Topic name here', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(23, 'Hall C (Suite 204A)', '11am to 01pm', 3000.00, '2023-02-05', 'Amit', 'Topic name here', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(24, 'Hall D (Suite 204B)', '11am to 01pm', 4000.00, '2023-02-05', 'Amit', 'Topic name here', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(25, 'Hall A (Suite 202)', '02pm to 04pm', 1000.00, '2023-02-05', 'Amit', 'Topic name here', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(26, 'Hall B (Suite 203)', '02pm to 04pm', 2000.00, '2023-02-05', 'Amit', 'Topic name here', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(27, 'Hall C (Suite 204A)', '02pm to 04pm', 3000.00, '2023-02-05', 'Amit', 'Topic name here', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(28, 'Hall D (Suite 204B)', '02pm to 04pm', 4000.00, '2023-02-05', 'Amit', 'Topic name here', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(29, 'Hall A (Suite 202)', '05am to 07pm', 1000.00, '2023-02-05', 'Amit', 'Topic name here', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(30, 'Hall B (Suite 203)', '05am to 07pm', 2000.00, '2023-02-05', 'Amit', 'Topic name here', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(31, 'Hall C (Suite 204A)', '05am to 07pm', 3000.00, '2023-02-05', 'Amit', 'Topic name here', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(32, 'Hall D (Suite 204B)', '05am to 07pm', 4000.00, '2023-02-05', 'Amit', 'Topic name here', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
CREATE TABLE IF NOT EXISTS `states` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'maharashtra', '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(2, 'delhi', '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(3, 'punjab', '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(4, 'andhra pradesh', '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(5, 'assam', '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(6, 'madhya pradesh', '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(7, 'karnataka', '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(8, 'goa', '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(9, 'tripura', '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(10, 'tamil nadu', '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(11, 'himachal pradesh', '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(12, 'manipur', '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(13, 'bihar', '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(14, 'arunachal pradesh', '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(15, 'west bengal', '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(16, 'haryana', '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(17, 'uttar pradesh', '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(18, 'mizoram', '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(19, 'kerala', '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(20, 'gujarat', '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(21, 'odisha', '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(22, 'rajasthan', '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(23, 'jharkhand', '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(24, 'chhattisgarh', '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(25, 'nagaland', '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(26, 'meghalaya', '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(27, 'uttarakhand', '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(28, 'telangana', '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(29, 'jammu kashmir', '2022-12-12 12:48:36', '2022-12-12 12:48:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

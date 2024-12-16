-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 07, 2022 at 02:04 PM
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
(1, 'Rashidweb', 'rashidk.developer@gmail.com', 'assets/admin/img/app/logo.png', '2022-12-07 11:06:42', '$2y$10$SmdT.nenMvRCaDRU85xEFOOds.56OjuY/1AyjBjY1Mi1NDdP5plEa', NULL, '2022-12-07 11:06:42', '2022-12-07 11:06:42'),
(2, 'Superadmin', 'info@sieindia.in', 'assets/admin/img/app/logo.png', '2022-12-07 11:06:42', '$2y$10$5E7uen/3F/BS2egB33UHx.L0q.mec8AM0WSpQiqmh6pAvxE5ozda6', NULL, '2022-12-07 11:06:42', '2022-12-07 11:06:42');

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
(1, 'Eurodental', 'assets/admin/img/app/logo.png', 'Asia/Kolkata', 'light', '2022-12-07 11:06:42', '2022-12-07 11:06:42');

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(9, '2022_11_26_104045_create_order_items_table', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `first_name`, `last_name`, `email`, `phone`, `dci_no`, `city`, `grand_total`, `payment_method`, `payment_status`, `payment_id`, `payment_response`, `d1`, `d2`, `d3`, `created_at`, `updated_at`) VALUES
(1, 'Rashid', 'Ansari', 'rashid.makent@gmail.com', '9930377481', '123456', 'Mumbai', 19250.00, 'payu', 'created', '3b78422a55421d2ff628', '[]', 'Early Bird', NULL, NULL, '2022-12-07 11:16:12', '2022-12-07 11:16:12'),
(2, 'Rashid1', 'Ansari1', 'rashid.makent@gmail.com', '9930377481', '123456', 'Mumbai', 15250.00, 'payu', 'paid', 'ff0d1dac07c2c294d424', '{\"mihpayid\":\"403993715527853371\",\"mode\":\"CC\",\"status\":\"success\",\"unmappedstatus\":\"auth\",\"key\":\"oZ7oo9\",\"txnid\":\"ff0d1dac07c2c294d424\",\"amount\":\"15250.00\",\"cardCategory\":\"domestic\",\"discount\":\"0.00\",\"net_amount_debit\":\"15250\",\"addedon\":\"2022-12-07 17:20:15\",\"productinfo\":\"Event Booking\",\"firstname\":\"Rashid1\",\"lastname\":null,\"address1\":null,\"address2\":null,\"city\":null,\"state\":null,\"country\":null,\"zipcode\":null,\"email\":\"rashid.makent@gmail.com\",\"phone\":\"9930377481\",\"udf1\":null,\"udf2\":null,\"udf3\":null,\"udf4\":null,\"udf5\":null,\"udf6\":null,\"udf7\":null,\"udf8\":null,\"udf9\":null,\"udf10\":null,\"hash\":\"91ce7f977b4b260a3be75f154acb30d9713f436b0343d312ff25d6dcee5faef36d7bb17f96099dc1c79b4ec41b3ee2c2d9eb9015385673cbdf5dfb8fe8a778de\",\"field1\":\"2399874989804548254690\",\"field2\":\"707723\",\"field3\":\"15250.00\",\"field4\":null,\"field5\":\"100\",\"field6\":\"02\",\"field7\":\"AUTHPOSITIVE\",\"field8\":null,\"field9\":\"Transaction is Successful\",\"payment_source\":\"payu\",\"PG_TYPE\":\"AxisCYBER\",\"bank_ref_num\":\"2399874989804548254690\",\"bankcode\":\"CC\",\"error\":\"E000\",\"error_Message\":\"No Error\",\"cardnum\":\"XXXXXXXXXXXX2346\",\"cardhash\":\"This field is no longer supported in postback params.\"}', 'Early Bird', NULL, NULL, '2022-12-07 11:49:13', '2022-12-07 11:50:48'),
(3, 'Rashid2', 'Ansari2', 'rashid.makent@gmail.com1', '9930377482', '989876', 'Dehli', 14250.00, 'payu', 'created', '5de559014c09ed8efe6f', '[]', 'Early Bird', NULL, NULL, '2022-12-07 12:02:10', '2022-12-07 12:02:10'),
(4, 'Rashid2', 'Ansari2', 'rashid.makent@gmail.com1', '9930377482', '989876', 'Dehli', 14250.00, 'payu', 'unpaid', 'c65634ed6012232d3255', '{\"mihpayid\":\"403993715527854161\",\"mode\":\"CC\",\"status\":\"failure\",\"unmappedstatus\":\"failed\",\"key\":\"oZ7oo9\",\"txnid\":\"c65634ed6012232d3255\",\"amount\":\"14250.00\",\"cardCategory\":\"domestic\",\"discount\":\"0.00\",\"net_amount_debit\":\"0.00\",\"addedon\":\"2022-12-07 17:35:25\",\"productinfo\":\"Event Booking\",\"firstname\":\"Rashid2\",\"lastname\":null,\"address1\":null,\"address2\":null,\"city\":null,\"state\":null,\"country\":null,\"zipcode\":null,\"email\":\"rashid.makent@gmail.com1\",\"phone\":\"9930377482\",\"udf1\":null,\"udf2\":null,\"udf3\":null,\"udf4\":null,\"udf5\":null,\"udf6\":null,\"udf7\":null,\"udf8\":null,\"udf9\":null,\"udf10\":null,\"hash\":\"2c8fda6ed8c5707e0d59dfbb9bbe0d7777be396af67f262e649359d4154378c6bf2600167dab9b5b805fd35df05fd0949eaeff1fcb23fb0b4056b2543620d2e7\",\"field1\":null,\"field2\":null,\"field3\":null,\"field4\":null,\"field5\":\"UVhtWUJURXN3MDgzbFF0aXY2MHQ=\",\"field6\":\"02\",\"field7\":\"AUCNEGATIVE\",\"field8\":\"Encountered a Payer Authentication problem. Payer could not be authenticated.\",\"field9\":\"Card authentication failure\",\"payment_source\":\"payu\",\"PG_TYPE\":\"CC-PG\",\"bank_ref_num\":null,\"bankcode\":\"CC\",\"error\":\"E303\",\"error_Message\":\"Card authentication failure\",\"cardnum\":\"XXXXXXXXXXXX2346\"}', 'Early Bird', NULL, NULL, '2022-12-07 12:04:23', '2022-12-07 12:06:00');

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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `slot_id`, `slot_name`, `slot_time`, `slot_date`, `speaker`, `description`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Hall A (Suite 202)', '10:00am to 12:00pm', '2023-02-04', 'Amit', 'Topic name here', 14250.00, '2022-12-07 11:16:12', '2022-12-07 11:16:12'),
(2, 1, 5, 'Hall A (Suite 202)', '03:00pm to 05:00pm', '2023-02-04', 'Amit', 'Topic name here', 1000.00, '2022-12-07 11:16:12', '2022-12-07 11:16:12'),
(3, 1, 28, 'Hall D (Suite 204B)', '11:00am to 01:00pm', '2023-02-05', 'Peter', 'Topic name here', 4000.00, '2022-12-07 11:16:12', '2022-12-07 11:16:12'),
(4, 2, 1, 'Hall A (Suite 202)', '10:00am to 12:00pm', '2023-02-04', 'Amit', 'Topic name here', 14250.00, '2022-12-07 11:49:13', '2022-12-07 11:49:13'),
(5, 2, 5, 'Hall A (Suite 202)', '03:00pm to 05:00pm', '2023-02-04', 'Amit', 'Topic name here', 1000.00, '2022-12-07 11:49:13', '2022-12-07 11:49:13'),
(6, 3, 1, 'Hall A (Suite 202)', '10:00am to 12:00pm', '2023-02-04', 'Amit', 'Topic name here', 14250.00, '2022-12-07 12:02:10', '2022-12-07 12:02:10'),
(7, 4, 1, 'Hall A (Suite 202)', '10:00am to 12:00pm', '2023-02-04', 'Amit', 'Topic name here', 14250.00, '2022-12-07 12:04:23', '2022-12-07 12:04:23');

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
(1, 'Hall A (Suite 202)', '10:00am to 12:00pm', 1000.00, '2023-02-04', 'Amit', 'Topic name here', 14, '2022-12-07 11:06:42', '2022-12-07 11:06:42'),
(2, 'Hall B (Suite 203)', '10:00am to 12:00pm', 2000.00, '2023-02-04', 'Suresh', 'Topic name here1', 0, '2022-12-07 11:06:42', '2022-12-07 11:06:42'),
(3, 'Hall C (Suite 204A)', '10:00am to 12:00pm', 3000.00, '2023-02-04', 'Naresh', 'Topic name here', 15, '2022-12-07 11:06:42', '2022-12-07 11:06:42'),
(4, 'Hall D (Suite 204B)', '10:00am to 12:00pm', 4000.00, '2023-02-04', 'Hitesh', 'Topic name here', 15, '2022-12-07 11:06:42', '2022-12-07 11:06:42'),
(5, 'Hall A (Suite 202)', '03:00pm to 05:00pm', 1000.00, '2023-02-04', 'Amit', 'Topic name here', 14, '2022-12-07 11:06:42', '2022-12-07 11:06:42'),
(6, 'Hall B (Suite 203)', '03:00pm to 05:00pm', 2000.00, '2023-02-04', 'Suresh', 'Topic name here', 15, '2022-12-07 11:06:42', '2022-12-07 11:06:42'),
(7, 'Hall C (Suite 204A)', '03:00pm to 05:00pm', 3000.00, '2023-02-04', 'Naresh', 'Topic name here', 15, '2022-12-07 11:06:42', '2022-12-07 11:06:42'),
(8, 'Hall D (Suite 204B)', '03:00pm to 05:00pm', 4000.00, '2023-02-04', 'Hitesh', 'Topic name here', 15, '2022-12-07 11:06:42', '2022-12-07 11:06:42'),
(9, 'Hall A (Suite 202)', '11:00am to 01:00pm', 1000.00, '2023-02-05', 'Jhon', 'Topic name here', 15, '2022-12-07 11:06:42', '2022-12-07 11:06:42'),
(10, 'Hall B (Suite 203)', '11:00am to 01:00pm', 2000.00, '2023-02-05', 'David', 'Topic name here', 15, '2022-12-07 11:06:42', '2022-12-07 11:06:42'),
(11, 'Hall C (Suite 204A)', '11:00am to 01:00pm', 3000.00, '2023-02-05', 'Max', 'Topic name here', 15, '2022-12-07 11:06:42', '2022-12-07 11:06:42'),
(12, 'Hall D (Suite 204B)', '11:00am to 01:00pm', 4000.00, '2023-02-05', 'Peter', 'Topic name here', 15, '2022-12-07 11:06:42', '2022-12-07 11:06:42'),
(13, 'Hall A (Suite 202)', '04:00pm to 06:00pm', 1000.00, '2023-02-05', 'Jhon', 'Topic name here', 15, '2022-12-07 11:06:42', '2022-12-07 11:06:42'),
(14, 'Hall B (Suite 203)', '04:00pm to 06:00pm', 2000.00, '2023-02-05', 'David', 'Topic name here', 15, '2022-12-07 11:06:42', '2022-12-07 11:06:42'),
(15, 'Hall C (Suite 204A)', '04:00pm to 06:00pm', 3000.00, '2023-02-05', 'Max', 'Topic name here', 15, '2022-12-07 11:06:42', '2022-12-07 11:06:42'),
(16, 'Hall D (Suite 204B)', '04:00pm to 06:00pm', 4000.00, '2023-02-05', 'Peter', 'Topic name here', 15, '2022-12-07 11:06:42', '2022-12-07 11:06:42'),
(17, 'Hall A (Suite 202)', '10:00am to 12:00pm', 1000.00, '2023-02-04', 'Amit', 'Topic name here', 15, '2022-12-07 11:06:42', '2022-12-07 11:06:42'),
(18, 'Hall B (Suite 203)', '10:00am to 12:00pm', 2000.00, '2023-02-04', 'Suresh', 'Topic name here', 15, '2022-12-07 11:06:42', '2022-12-07 11:06:42'),
(19, 'Hall C (Suite 204A)', '10:00am to 12:00pm', 3000.00, '2023-02-04', 'Naresh', 'Topic name here', 15, '2022-12-07 11:06:42', '2022-12-07 11:06:42'),
(20, 'Hall D (Suite 204B)', '10:00am to 12:00pm', 4000.00, '2023-02-04', 'Hitesh', 'Topic name here', 15, '2022-12-07 11:06:42', '2022-12-07 11:06:42'),
(21, 'Hall A (Suite 202)', '03:00pm to 05:00pm', 1000.00, '2023-02-04', 'Amit', 'Topic name here', 15, '2022-12-07 11:06:42', '2022-12-07 11:06:42'),
(22, 'Hall B (Suite 203)', '03:00pm to 05:00pm', 2000.00, '2023-02-04', 'Suresh', 'Topic name here', 15, '2022-12-07 11:06:42', '2022-12-07 11:06:42'),
(23, 'Hall C (Suite 204A)', '03:00pm to 05:00pm', 3000.00, '2023-02-04', 'Naresh', 'Topic name here', 15, '2022-12-07 11:06:42', '2022-12-07 11:06:42'),
(24, 'Hall D (Suite 204B)', '03:00pm to 05:00pm', 4000.00, '2023-02-04', 'Hitesh', 'Topic name here', 15, '2022-12-07 11:06:42', '2022-12-07 11:06:42'),
(25, 'Hall A (Suite 202)', '11:00am to 01:00pm', 1000.00, '2023-02-05', 'Jhon', 'Topic name here', 0, '2022-12-07 11:06:42', '2022-12-07 11:06:42'),
(26, 'Hall B (Suite 203)', '11:00am to 01:00pm', 2000.00, '2023-02-05', 'David', 'Topic name here', 15, '2022-12-07 11:06:42', '2022-12-07 11:06:42'),
(27, 'Hall C (Suite 204A)', '11:00am to 01:00pm', 3000.00, '2023-02-05', 'Max', 'Topic name here', 15, '2022-12-07 11:06:42', '2022-12-07 11:06:42'),
(28, 'Hall D (Suite 204B)', '11:00am to 01:00pm', 4000.00, '2023-02-05', 'Peter', 'Topic name here', 15, '2022-12-07 11:06:42', '2022-12-07 11:06:42'),
(29, 'Hall A (Suite 202)', '04:00pm to 06:00pm', 1000.00, '2023-02-05', 'Jhon', 'Topic name here', 15, '2022-12-07 11:06:42', '2022-12-07 11:06:42'),
(30, 'Hall B (Suite 203)', '04:00pm to 06:00pm', 2000.00, '2023-02-05', 'David', 'Topic name here', 15, '2022-12-07 11:06:42', '2022-12-07 11:06:42'),
(31, 'Hall C (Suite 204A)', '04:00pm to 06:00pm', 3000.00, '2023-02-05', 'Max', 'Topic name here', 15, '2022-12-07 11:06:42', '2022-12-07 11:06:42'),
(32, 'Hall D (Suite 204B)', '04:00pm to 06:00pm', 4000.00, '2023-02-05', 'Peter', 'Topic name here', 0, '2022-12-07 11:06:42', '2022-12-07 11:06:42');

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

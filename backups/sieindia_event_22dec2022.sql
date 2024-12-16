-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 22, 2022 at 10:41 AM
-- Server version: 10.2.44-MariaDB
-- PHP Version: 7.4.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sieindia_event_`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `admin_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timezone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ui_mode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_settings`
--

INSERT INTO `admin_settings` (`id`, `app_name`, `app_logo`, `timezone`, `ui_mode`, `created_at`, `updated_at`) VALUES
(1, 'Eurodental', 'assets/admin/img/app/logo.png', 'Asia/Kolkata', 'light', '2022-12-12 12:48:36', '2022-12-12 12:48:36');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `d1` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d2` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d3` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `first_name`, `last_name`, `email`, `phone`, `dci_no`, `city`, `state`, `grand_total`, `payment_method`, `payment_status`, `payment_id`, `payment_response`, `d1`, `d2`, `d3`, `created_at`, `updated_at`) VALUES
(1, 'JIGNESH', 'SHETH', 'jrsheth@gmail.com', '9322039991', 'zxzx', 'Mumbai', 'maharashtra', 17750.00, 'payu', 'created', 'dd86276c1e4eb9e87cdb', '[]', 'Regular Offer', NULL, NULL, '2022-12-21 10:36:30', '2022-12-21 10:36:30'),
(2, 'JIGNESH', 'SHETH', 'jrsheth@gmail.com', '9322039991', 'zxzx', 'Mumbai', 'maharashtra', 17750.00, 'payu', 'created', '3e025216d23ebec57578', '[]', 'Regular Offer', NULL, NULL, '2022-12-21 10:38:08', '2022-12-21 10:38:08'),
(3, 'JIGNESH', 'SHETH', 'jrsheth@gmail.com', '9320545414', '18283873', 'Mumbai', 'maharashtra', 17750.00, 'payu', 'created', '079bb74b4df656accb3d', '[]', 'Regular Offer', NULL, NULL, '2022-12-21 16:00:27', '2022-12-21 16:00:27');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `slot_id` int(11) NOT NULL,
  `slot_name` varchar(355) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slot_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slot_date` date NOT NULL,
  `speaker` varchar(355) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `slot_id`, `slot_name`, `slot_time`, `slot_date`, `speaker`, `description`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 'Labomed (Microscope 203)', '11:15am to 13:15pm', '2023-02-04', 'Dr. Riccardo Tonini', '3D filling of the root canal system: Strategies, materials and protocols\r\n-Eighteeth', 15250.00, '2022-12-21 10:36:30', '2022-12-21 10:36:30'),
(2, 1, 22, 'Labomed (Microscope 203)', '12:15pm to 14:15pm', '2023-02-05', 'Dr Vivek Hegde', 'Separated Instrument retrieval by BTR technique-Sun Dental (Cerkamed)', 2500.00, '2022-12-21 10:36:30', '2022-12-21 10:36:30'),
(3, 2, 6, 'Labomed (Microscope 203)', '11:15am to 13:15pm', '2023-02-04', 'Dr. Riccardo Tonini', '3D filling of the root canal system: Strategies, materials and protocols\r\n-Eighteeth', 15250.00, '2022-12-21 10:38:08', '2022-12-21 10:38:08'),
(4, 2, 6, 'Labomed (Microscope 203)', '11:15am to 13:15pm', '2023-02-04', 'Dr. Riccardo Tonini', '3D filling of the root canal system: Strategies, materials and protocols\r\n-Eighteeth', 2500.00, '2022-12-21 10:38:08', '2022-12-21 10:38:08'),
(5, 3, 1, '202', '9am to 11am', '2023-02-04', 'Dr. Garima Poddar', 'Quick guide to microscope in Dentistry-Labomed', 15250.00, '2022-12-21 16:00:27', '2022-12-21 16:00:27'),
(6, 3, 22, '203', '12:15pm to 14:15pm', '2023-02-05', 'Dr Vivek Hegde', 'Separated Instrument retrieval by BTR technique-Sun Dental (Cerkamed)', 2500.00, '2022-12-21 16:00:27', '2022-12-21 16:00:27');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slots`
--

CREATE TABLE `slots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slot_name` varchar(355) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slot_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slot_price` double(8,2) NOT NULL,
  `slot_date` date NOT NULL,
  `speaker` varchar(355) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slot_seats` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slots`
--

INSERT INTO `slots` (`id`, `slot_name`, `slot_time`, `slot_price`, `slot_date`, `speaker`, `description`, `slot_seats`, `created_at`, `updated_at`) VALUES
(2, '202', '11:15am to 13:15pm', 2500.00, '2023-02-04', 'Dr. Ajay Bajaj\n', 'Ultrasonics in Endodontics', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(1, '202', '9am to 11am', 2500.00, '2023-02-04', 'Dr. Garima Poddar', 'Quick guide to microscope in Dentistry-Labomed', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(3, '202', '14pm to 16pm', 2500.00, '2023-02-04', 'Dr. Riccardo Tonini & Dr. Viresh Chopra', 'MasterMTA - From theory into the practice-PD Swiss', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(4, '202', '16:15pm to 18:15pm', 2500.00, '2023-02-04', 'Dr. Riccardo Tonini & Dr. Viresh Chopra', 'MasterMTA - From theory into the practice-PD Swiss', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(5, '203', '9am to 11am', 2500.00, '2023-02-04', '', '', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(6, '203', '11:15am to 13:15pm', 2500.00, '2023-02-04', 'Dr. Riccardo Tonini', '3D filling of the root canal system: Strategies, materials and protocols\r\n-Eighteeth', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(7, '203', '14pm to 16pm', 2500.00, '2023-02-04', 'Dr. Ibrahim Naggar', 'Top Secrets for 3D Obturation-Eighteeth', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(9, '203', '16:15pm to 18:15pm', 2500.00, '2023-02-04', 'Dr. Sanil Natekar', 'Scouting the Anatomy-Management of Midroot Splits-Eighteeth', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(10, '204A', '9am to 11am', 2500.00, '2023-02-04', 'Marc Habib', '', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(11, '204A', '11:15am to 13:15pm', 2500.00, '2023-02-04', '', '', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(12, '204A', '14pm to 16pm', 2500.00, '2023-02-04', 'Dr. Fabio Gorni', 'Retreatment- The new Perfect endo Retreatment kit - Perfect', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(13, '204A', '16:15pm to 18:15pm', 2500.00, '2023-02-04', 'Dr. Fabio Gorni', 'Retreatment- The new Perfect endo Retreatment kit - Perfect', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(14, '204B', '9am to 11am', 2500.00, '2023-02-04', '', '', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(15, '204B', '11:15am to 13:15pm', 2500.00, '2023-02-04', '', '', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(16, '204B', '14pm to 16pm', 2500.00, '2023-02-04', 'Dr. Konstantinos Kalogeropoulos', 'Single file Endodontics for busy practices-MM', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(17, '204B', '16:15pm to 18:15pm', 2500.00, '2023-02-04', 'Dr. Konstantinos Kalogeropoulos', 'Single file Endodontics for busy practices-MM', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(18, '202', '10am to 12pm', 2500.00, '2023-02-05', 'Dr. Garima Poddar', 'Quick guide to Microscope in Dentistry-Labomed', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(19, '202', '12:15pm to 14:15pm', 2500.00, '2023-02-05', 'Dr. Riccardo Tonini &  Dr. Viresh Chopra', 'MasterMTA - From theory into the practice-PD Swiss ', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(20, '202', '15pm to 17pm', 2500.00, '2023-02-05', '', '', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(21, '203', '10am to 12pm', 2500.00, '2023-02-05', 'Dr. Leena Rawal', 'Curved Canals…Conqured!-Coltene', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(22, '203', '12:15pm to 14:15pm', 2500.00, '2023-02-05', 'Dr Vivek Hegde', 'Separated Instrument retrieval by BTR technique-Sun Dental (Cerkamed)', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(23, '203', '15pm to 17pm', 2500.00, '2023-02-05', 'Dr. Vivek Hegde', 'Separated Instrument retrieval by BTR technique-Sun Dental (Cerkamed)', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(24, '204A', '10am to 12pm', 2500.00, '2023-02-05', 'Dr. Fabio Gorni', 'Retreatment- The new Perfect endo Retreatment kit- Perfect', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(25, '204A', '12:15pm to 14:15pm', 2500.00, '2023-02-05', 'Dr. Fabio Gorni', 'Retreatment- The new Perfect endo Retreatment kit- Perfect', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(26, '204A', '15pm to 17pm', 2500.00, '2023-02-05', 'Dr. Suresh Shenvi', 'Root Canal Preparation with NITI : Rationale, Performance and Safety-Eighteeth', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(27, '204B', '10am to 12pm', 2500.00, '2023-02-05', 'Dr. Konstantinos Kalogeropoulos', 'Single file Endodontics for busy practices-MM', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(28, '204B', '12:15pm to 14:15pm', 2500.00, '2023-02-05', 'Dr. Marc Krikor Kaloustian', 'Glide path  and shaping management in tricky cases with endostar Easy path and E3 Azure files -EndoStar', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(29, '204B', '15pm to 17pm', 2500.00, '2023-02-05', 'Prof. Dr. Harpreet Singh\r\n', 'Predictable Fibre post and core : Bond with the best-Coltene', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_settings`
--
ALTER TABLE `admin_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
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
-- Indexes for table `slots`
--
ALTER TABLE `slots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_settings`
--
ALTER TABLE `admin_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slots`
--
ALTER TABLE `slots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

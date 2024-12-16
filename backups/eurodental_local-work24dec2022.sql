-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 24, 2022 at 11:03 AM
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
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE IF NOT EXISTS `coupons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  `is_used` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=501 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `is_used`) VALUES
(1, 'SIE-TTXT6N', 0),
(2, 'SIE-M003HU', 0),
(3, 'SIE-HVT0LI', 0),
(4, 'SIE-J5DUXT', 0),
(5, 'SIE-U1TU60', 0),
(6, 'SIE-CCBFCE', 0),
(7, 'SIE-6ME1KM', 0),
(8, 'SIE-PMDD9F', 0),
(9, 'SIE-SHTZ2X', 0),
(10, 'SIE-HNJAWV', 0),
(11, 'SIE-Y13J6S', 0),
(12, 'SIE-8HH9VM', 0),
(13, 'SIE-N6IL2M', 0),
(14, 'SIE-XVH84I', 0),
(15, 'SIE-46LK95', 0),
(16, 'SIE-RI3WMJ', 0),
(17, 'SIE-CP4UQ0', 0),
(18, 'SIE-F05RAU', 0),
(19, 'SIE-A9OIOY', 0),
(20, 'SIE-FYOGYV', 0),
(21, 'SIE-T6YQBL', 0),
(22, 'SIE-KYO2OT', 0),
(23, 'SIE-U86ZI0', 0),
(24, 'SIE-JW7JKW', 0),
(25, 'SIE-6Y7HTU', 0),
(26, 'SIE-CGOOZB', 0),
(27, 'SIE-0CI1WQ', 0),
(28, 'SIE-IK2GPY', 0),
(29, 'SIE-C5X4NX', 0),
(30, 'SIE-PN81JL', 0),
(31, 'SIE-FU23EB', 0),
(32, 'SIE-09XTKC', 0),
(33, 'SIE-FVN9FR', 0),
(34, 'SIE-TSWRLC', 0),
(35, 'SIE-J41AX7', 0),
(36, 'SIE-O0ZTWS', 0),
(37, 'SIE-EYH7T7', 0),
(38, 'SIE-YGPPVO', 0),
(39, 'SIE-U468ZS', 0),
(40, 'SIE-H1JU2Z', 0),
(41, 'SIE-WH2RD0', 0),
(42, 'SIE-UEZDUR', 0),
(43, 'SIE-GY56BE', 0),
(44, 'SIE-O4YE58', 0),
(45, 'SIE-NJUF9H', 0),
(46, 'SIE-UHGAR1', 0),
(47, 'SIE-Q10Q6V', 0),
(48, 'SIE-TKA2AU', 0),
(49, 'SIE-VDKSGX', 0),
(50, 'SIE-E3KSR8', 0),
(51, 'SIE-JAO3UI', 0),
(52, 'SIE-ZSKKOX', 0),
(53, 'SIE-E34MNG', 0),
(54, 'SIE-MSMS8E', 0),
(55, 'SIE-6MWFYD', 0),
(56, 'SIE-ZI7Q7N', 0),
(57, 'SIE-NXK3Z3', 0),
(58, 'SIE-QGW0GA', 0),
(59, 'SIE-Q5C49S', 0),
(60, 'SIE-J29XTF', 0),
(61, 'SIE-74Z2VM', 0),
(62, 'SIE-0F1GGU', 0),
(63, 'SIE-4DNVGC', 0),
(64, 'SIE-0JXFLM', 0),
(65, 'SIE-VCG7TQ', 0),
(66, 'SIE-S4VTMN', 0),
(67, 'SIE-ZMFG30', 0),
(68, 'SIE-LKDQMV', 0),
(69, 'SIE-8RFW1T', 0),
(70, 'SIE-VC7WFH', 0),
(71, 'SIE-7LGDMU', 0),
(72, 'SIE-50EA0Y', 0),
(73, 'SIE-EUKZND', 0),
(74, 'SIE-RICVQY', 0),
(75, 'SIE-CG19BK', 0),
(76, 'SIE-U5MHY9', 0),
(77, 'SIE-4XN4UH', 0),
(78, 'SIE-8PNCAD', 0),
(79, 'SIE-H91HPZ', 0),
(80, 'SIE-I376I3', 0),
(81, 'SIE-QNAB2K', 0),
(82, 'SIE-GWWYDS', 0),
(83, 'SIE-3NWPHI', 0),
(84, 'SIE-4Q23KL', 0),
(85, 'SIE-B87OU9', 0),
(86, 'SIE-CS5IDZ', 0),
(87, 'SIE-XKI1CO', 0),
(88, 'SIE-NVWDE4', 0),
(89, 'SIE-UTMYYU', 0),
(90, 'SIE-BMTAPP', 0),
(91, 'SIE-MTQC0C', 0),
(92, 'SIE-M8I39U', 0),
(93, 'SIE-YSZ8ET', 0),
(94, 'SIE-ADEA6E', 0),
(95, 'SIE-EWDKHY', 0),
(96, 'SIE-GIIJCE', 0),
(97, 'SIE-H1DQFL', 0),
(98, 'SIE-85W2BS', 0),
(99, 'SIE-O27AVR', 0),
(100, 'SIE-DCYZGA', 0),
(101, 'SIE-2XRHGQ', 0),
(102, 'SIE-NV52OW', 0),
(103, 'SIE-JHMC9Q', 0),
(104, 'SIE-JJ7LS3', 0),
(105, 'SIE-4ZMJXB', 0),
(106, 'SIE-725A8W', 0),
(107, 'SIE-0A2V18', 0),
(108, 'SIE-LHJM4F', 0),
(109, 'SIE-Q2LDUB', 0),
(110, 'SIE-XL15EY', 0),
(111, 'SIE-X6DXPL', 0),
(112, 'SIE-6K6Q1L', 0),
(113, 'SIE-RS3ZJ3', 0),
(114, 'SIE-UCC6IZ', 0),
(115, 'SIE-CMF8FZ', 0),
(116, 'SIE-H0CUGL', 0),
(117, 'SIE-D00TFC', 0),
(118, 'SIE-95OXT6', 0),
(119, 'SIE-D5D6YP', 0),
(120, 'SIE-K3N7TR', 0),
(121, 'SIE-A5KE0M', 0),
(122, 'SIE-NQ5P8X', 0),
(123, 'SIE-TXMRGR', 0),
(124, 'SIE-070A1N', 0),
(125, 'SIE-E5T4DK', 0),
(126, 'SIE-ZLGCL7', 0),
(127, 'SIE-KCMJ7A', 0),
(128, 'SIE-A7JAAZ', 0),
(129, 'SIE-N2EL8U', 0),
(130, 'SIE-DIJ3H0', 0),
(131, 'SIE-HPAP6O', 0),
(132, 'SIE-3N9VHY', 0),
(133, 'SIE-DFVD4I', 0),
(134, 'SIE-CRESBX', 0),
(135, 'SIE-WPDL9J', 0),
(136, 'SIE-EBP9TF', 0),
(137, 'SIE-MIAUI8', 0),
(138, 'SIE-XFBV4A', 0),
(139, 'SIE-E2XBRS', 0),
(140, 'SIE-3EWNK3', 0),
(141, 'SIE-ZERAXK', 0),
(142, 'SIE-QG20G0', 0),
(143, 'SIE-B4OC7J', 0),
(144, 'SIE-1QA24P', 0),
(145, 'SIE-QQX8N5', 0),
(146, 'SIE-M3GD7K', 0),
(147, 'SIE-Y2GH9N', 0),
(148, 'SIE-QKHCVQ', 0),
(149, 'SIE-N9UJIB', 0),
(150, 'SIE-AC4ISU', 0),
(151, 'SIE-5SP04T', 0),
(152, 'SIE-QWRUZC', 0),
(153, 'SIE-2VTA7V', 0),
(154, 'SIE-K6LHXP', 0),
(155, 'SIE-SCP9VL', 0),
(156, 'SIE-0MNT0B', 0),
(157, 'SIE-A5W591', 0),
(158, 'SIE-3KGXMP', 0),
(159, 'SIE-2CHWIC', 0),
(160, 'SIE-9HOR9P', 0),
(161, 'SIE-5D7JEZ', 0),
(162, 'SIE-CN6LX4', 0),
(163, 'SIE-2QLWYK', 0),
(164, 'SIE-QK3ALZ', 0),
(165, 'SIE-RWR2HL', 0),
(166, 'SIE-ZXRDDT', 0),
(167, 'SIE-CN7S2V', 0),
(168, 'SIE-MV1ASI', 0),
(169, 'SIE-SFB0MX', 0),
(170, 'SIE-M5VBAY', 0),
(171, 'SIE-XTFPYS', 0),
(172, 'SIE-J8Q7EH', 0),
(173, 'SIE-9VKHM6', 0),
(174, 'SIE-UBC258', 0),
(175, 'SIE-L36OII', 0),
(176, 'SIE-T824CQ', 0),
(177, 'SIE-OYZW7R', 0),
(178, 'SIE-YDDFCF', 0),
(179, 'SIE-YXYJCB', 0),
(180, 'SIE-LNMPR5', 0),
(181, 'SIE-GAD32P', 0),
(182, 'SIE-YTU2H4', 0),
(183, 'SIE-8LR5B0', 0),
(184, 'SIE-NZDT94', 0),
(185, 'SIE-FPCRXB', 0),
(186, 'SIE-PHUQHY', 0),
(187, 'SIE-ZCLCJH', 0),
(188, 'SIE-7MP125', 0),
(189, 'SIE-TTH4G1', 0),
(190, 'SIE-5T243W', 0),
(191, 'SIE-VNNJKO', 0),
(192, 'SIE-BV2AJ9', 0),
(193, 'SIE-SAKND2', 0),
(194, 'SIE-NF2FQB', 0),
(195, 'SIE-RTDN6D', 0),
(196, 'SIE-78MWHT', 0),
(197, 'SIE-AB857M', 0),
(198, 'SIE-DTG5AS', 0),
(199, 'SIE-EKVOXV', 0),
(200, 'SIE-W1I0XJ', 0),
(201, 'SIE-RK4AKR', 0),
(202, 'SIE-L6M4FU', 0),
(203, 'SIE-HHA97K', 0),
(204, 'SIE-KXXES3', 0),
(205, 'SIE-LK0647', 0),
(206, 'SIE-RDS9PO', 0),
(207, 'SIE-27WBLC', 0),
(208, 'SIE-OZQMD5', 0),
(209, 'SIE-84RQ7D', 0),
(210, 'SIE-V90A1F', 0),
(211, 'SIE-5PPW57', 0),
(212, 'SIE-4V4TA1', 0),
(213, 'SIE-QJZ0PT', 0),
(214, 'SIE-KKLTUF', 0),
(215, 'SIE-SPENRS', 0),
(216, 'SIE-UM8M11', 0),
(217, 'SIE-3H08Q5', 0),
(218, 'SIE-MWZ4SC', 0),
(219, 'SIE-MH7E0A', 0),
(220, 'SIE-5D90C1', 0),
(221, 'SIE-1LXWB9', 0),
(222, 'SIE-NUCEWD', 0),
(223, 'SIE-W226JI', 0),
(224, 'SIE-96OAI8', 0),
(225, 'SIE-206KAK', 0),
(226, 'SIE-GICC1A', 0),
(227, 'SIE-UF2MJ7', 0),
(228, 'SIE-7GKTB3', 0),
(229, 'SIE-ULBNPO', 0),
(230, 'SIE-CLQPPJ', 0),
(231, 'SIE-IF3AJT', 0),
(232, 'SIE-L55ZMT', 0),
(233, 'SIE-BU9636', 0),
(234, 'SIE-CSKBJB', 0),
(235, 'SIE-A9RECX', 0),
(236, 'SIE-769YRL', 0),
(237, 'SIE-43M30L', 0),
(238, 'SIE-PCUJ55', 0),
(239, 'SIE-IKYTGO', 0),
(240, 'SIE-46M6PH', 0),
(241, 'SIE-92393K', 0),
(242, 'SIE-SNYC99', 0),
(243, 'SIE-L7QL4Q', 0),
(244, 'SIE-JE6TPD', 0),
(245, 'SIE-CTH203', 0),
(246, 'SIE-GXXFR0', 0),
(247, 'SIE-833EKM', 0),
(248, 'SIE-B3V25N', 0),
(249, 'SIE-E6JCZH', 0),
(250, 'SIE-63VQD0', 0),
(251, 'SIE-CEM3RF', 0),
(252, 'SIE-8X5FD2', 0),
(253, 'SIE-FL2395', 0),
(254, 'SIE-SLIANS', 0),
(255, 'SIE-5NEH9N', 0),
(256, 'SIE-HU3I8S', 0),
(257, 'SIE-RACVRP', 0),
(258, 'SIE-17CWB7', 0),
(259, 'SIE-Z29K5S', 0),
(260, 'SIE-4QN0V3', 0),
(261, 'SIE-UU49DJ', 0),
(262, 'SIE-HGJ09V', 0),
(263, 'SIE-SXO2B3', 0),
(264, 'SIE-E5LG56', 0),
(265, 'SIE-JR1ZP8', 0),
(266, 'SIE-U6WYFG', 0),
(267, 'SIE-ZSAE2X', 0),
(268, 'SIE-PJZOUQ', 0),
(269, 'SIE-GAWG6U', 0),
(270, 'SIE-84P843', 0),
(271, 'SIE-CJLY9E', 0),
(272, 'SIE-QPTZMX', 0),
(273, 'SIE-LAQLKQ', 0),
(274, 'SIE-7IOPX8', 0),
(275, 'SIE-29XORO', 0),
(276, 'SIE-A99HXM', 0),
(277, 'SIE-UCUJD0', 0),
(278, 'SIE-MO5ZKD', 0),
(279, 'SIE-K6RRNN', 0),
(280, 'SIE-6Y16OI', 0),
(281, 'SIE-8IUADR', 0),
(282, 'SIE-BPW3AE', 0),
(283, 'SIE-5SCFAP', 0),
(284, 'SIE-KSQSCM', 0),
(285, 'SIE-OXX16S', 0),
(286, 'SIE-7OJ79Z', 0),
(287, 'SIE-UUPJA6', 0),
(288, 'SIE-I5HVKK', 0),
(289, 'SIE-1XX1T5', 0),
(290, 'SIE-DL5VT7', 0),
(291, 'SIE-BVPJU6', 0),
(292, 'SIE-2XN7Y4', 0),
(293, 'SIE-XQCXDR', 0),
(294, 'SIE-T8OY6O', 0),
(295, 'SIE-S1EUAV', 0),
(296, 'SIE-6FZU6E', 0),
(297, 'SIE-EH6E65', 0),
(298, 'SIE-L9MPY4', 0),
(299, 'SIE-S5HFNQ', 0),
(300, 'SIE-YZ171H', 0),
(301, 'SIE-P3132C', 0),
(302, 'SIE-S08R94', 0),
(303, 'SIE-VEIO1H', 0),
(304, 'SIE-IFJ9WT', 0),
(305, 'SIE-RL5PPW', 0),
(306, 'SIE-5NG38V', 0),
(307, 'SIE-G9W1UQ', 0),
(308, 'SIE-R6CMBF', 0),
(309, 'SIE-76FZ16', 0),
(310, 'SIE-II994G', 0),
(311, 'SIE-QX0E9D', 0),
(312, 'SIE-7MCMIC', 0),
(313, 'SIE-A0T2XT', 0),
(314, 'SIE-ROIZSB', 0),
(315, 'SIE-WEJ6H6', 0),
(316, 'SIE-871VHZ', 0),
(317, 'SIE-WZBT1G', 0),
(318, 'SIE-IQ5NA2', 0),
(319, 'SIE-8SRRIA', 0),
(320, 'SIE-OUSQDF', 0),
(321, 'SIE-8OM119', 0),
(322, 'SIE-5BOGYJ', 0),
(323, 'SIE-19L0TC', 0),
(324, 'SIE-GFE7LQ', 0),
(325, 'SIE-LRXMUL', 0),
(326, 'SIE-51W7XE', 0),
(327, 'SIE-T851QI', 0),
(328, 'SIE-12P3K3', 0),
(329, 'SIE-JVXR9F', 0),
(330, 'SIE-B38V8G', 0),
(331, 'SIE-B2HV8Y', 0),
(332, 'SIE-HR7RSN', 0),
(333, 'SIE-8PY5BX', 0),
(334, 'SIE-RJM5TF', 0),
(335, 'SIE-OE4SUH', 0),
(336, 'SIE-R7SC0K', 0),
(337, 'SIE-7TKFHR', 0),
(338, 'SIE-1B4U2L', 0),
(339, 'SIE-ZRI83M', 0),
(340, 'SIE-TZQ9GF', 0),
(341, 'SIE-SE0K9C', 0),
(342, 'SIE-V9WLNW', 0),
(343, 'SIE-LIM65V', 0),
(344, 'SIE-44DQ72', 0),
(345, 'SIE-FXTHW6', 0),
(346, 'SIE-T099W9', 0),
(347, 'SIE-Y2IK1G', 0),
(348, 'SIE-7IW1Q7', 0),
(349, 'SIE-ZF2W7K', 0),
(350, 'SIE-191TMK', 0),
(351, 'SIE-5V1NDT', 0),
(352, 'SIE-DFIA4M', 0),
(353, 'SIE-78X1UJ', 0),
(354, 'SIE-V0ZYUL', 0),
(355, 'SIE-VXOGTO', 0),
(356, 'SIE-56TVV8', 0),
(357, 'SIE-GDIG2C', 0),
(358, 'SIE-C6GS8P', 0),
(359, 'SIE-GDKWC0', 0),
(360, 'SIE-SMZA9T', 0),
(361, 'SIE-Y06C20', 0),
(362, 'SIE-SBCUA2', 0),
(363, 'SIE-74YSRU', 0),
(364, 'SIE-VBLMG5', 0),
(365, 'SIE-PRZJUW', 0),
(366, 'SIE-PQHAQI', 0),
(367, 'SIE-281QTI', 0),
(368, 'SIE-FYJ3AL', 0),
(369, 'SIE-0AF7AO', 0),
(370, 'SIE-Z74SRW', 0),
(371, 'SIE-HIR6H6', 0),
(372, 'SIE-I3C0LX', 0),
(373, 'SIE-21FZOB', 0),
(374, 'SIE-IDEHIT', 0),
(375, 'SIE-PJ73ZA', 0),
(376, 'SIE-NFLPVF', 0),
(377, 'SIE-0EODDE', 0),
(378, 'SIE-5VVMRN', 0),
(379, 'SIE-NS4Y8I', 0),
(380, 'SIE-D0LCV6', 0),
(381, 'SIE-WVM64H', 0),
(382, 'SIE-NVKIKK', 0),
(383, 'SIE-VRP7PA', 0),
(384, 'SIE-Q2EX89', 0),
(385, 'SIE-KNSLJE', 0),
(386, 'SIE-YZCV1N', 0),
(387, 'SIE-Z9CHRR', 0),
(388, 'SIE-ENKTSK', 0),
(389, 'SIE-LG6EDN', 0),
(390, 'SIE-81US78', 0),
(391, 'SIE-SEPTGP', 0),
(392, 'SIE-ADYUG6', 0),
(393, 'SIE-6ZMZYY', 0),
(394, 'SIE-SJCEAP', 0),
(395, 'SIE-9Q75ZX', 0),
(396, 'SIE-A27KGD', 0),
(397, 'SIE-E1MK5A', 0),
(398, 'SIE-55LDTD', 0),
(399, 'SIE-FLT0YN', 0),
(400, 'SIE-FDL8EQ', 0),
(401, 'SIE-KC855Q', 0),
(402, 'SIE-5ESI0H', 0),
(403, 'SIE-31KCH7', 0),
(404, 'SIE-CGKVJ5', 0),
(405, 'SIE-PTP9H7', 0),
(406, 'SIE-16PKAY', 0),
(407, 'SIE-J1M5IV', 0),
(408, 'SIE-LDWNNJ', 0),
(409, 'SIE-9IVMMI', 0),
(410, 'SIE-L0IEQR', 0),
(411, 'SIE-4RVTYP', 0),
(412, 'SIE-MQ6LD1', 0),
(413, 'SIE-Q1KB44', 0),
(414, 'SIE-VUFSXK', 0),
(415, 'SIE-7H94CH', 0),
(416, 'SIE-03TMRY', 0),
(417, 'SIE-MQPUQR', 0),
(418, 'SIE-RNKP4I', 0),
(419, 'SIE-20JQLX', 0),
(420, 'SIE-K4U978', 0),
(421, 'SIE-VUVBLU', 0),
(422, 'SIE-JE4CRE', 0),
(423, 'SIE-6I6XM1', 0),
(424, 'SIE-9O8FBR', 0),
(425, 'SIE-ZYNFI5', 0),
(426, 'SIE-0IXGVU', 0),
(427, 'SIE-DUU8W5', 0),
(428, 'SIE-ZDPQ50', 0),
(429, 'SIE-954PJ5', 0),
(430, 'SIE-FP99UI', 0),
(431, 'SIE-34KZYC', 0),
(432, 'SIE-YMF6JF', 0),
(433, 'SIE-OQI49A', 0),
(434, 'SIE-LRDO0O', 0),
(435, 'SIE-S8Z8D9', 0),
(436, 'SIE-VQKU0P', 0),
(437, 'SIE-HA34CO', 0),
(438, 'SIE-0W1AI1', 0),
(439, 'SIE-IVCF74', 0),
(440, 'SIE-V1IH9A', 0),
(441, 'SIE-RZBF1S', 0),
(442, 'SIE-UE65YL', 0),
(443, 'SIE-71FV4J', 0),
(444, 'SIE-Q76JRP', 0),
(445, 'SIE-NBCVIR', 0),
(446, 'SIE-AA3TYC', 0),
(447, 'SIE-YMYS6H', 0),
(448, 'SIE-0LT0NC', 0),
(449, 'SIE-SW2FWW', 0),
(450, 'SIE-DGHRP5', 0),
(451, 'SIE-5TV6M2', 0),
(452, 'SIE-ACO65G', 0),
(453, 'SIE-B2Y5UJ', 0),
(454, 'SIE-ZE95YX', 0),
(455, 'SIE-D4JN5F', 0),
(456, 'SIE-FRO8TN', 0),
(457, 'SIE-QOJNTD', 0),
(458, 'SIE-1TVUD3', 0),
(459, 'SIE-A0S9ZA', 0),
(460, 'SIE-PMZXE3', 0),
(461, 'SIE-2WJ681', 0),
(462, 'SIE-PISJ3J', 0),
(463, 'SIE-TV5UGJ', 0),
(464, 'SIE-I5C106', 0),
(465, 'SIE-5ISTI0', 0),
(466, 'SIE-8WHRKP', 0),
(467, 'SIE-87D0QE', 0),
(468, 'SIE-0AG7YA', 0),
(469, 'SIE-75ZB9J', 0),
(470, 'SIE-QXQ6YG', 0),
(471, 'SIE-JR4J9T', 0),
(472, 'SIE-3F4IN5', 0),
(473, 'SIE-SYAVIL', 0),
(474, 'SIE-0BRVHF', 0),
(475, 'SIE-LO2H05', 0),
(476, 'SIE-SUQ1KS', 0),
(477, 'SIE-NBJOZW', 0),
(478, 'SIE-EEK8QO', 0),
(479, 'SIE-PBXYY0', 0),
(480, 'SIE-4FA1DI', 0),
(481, 'SIE-1KULN6', 0),
(482, 'SIE-ME10I6', 0),
(483, 'SIE-0J3QHE', 0),
(484, 'SIE-AM1ODH', 0),
(485, 'SIE-M5BQ38', 0),
(486, 'SIE-DG9CHI', 0),
(487, 'SIE-JJR94Z', 0),
(488, 'SIE-KSBG2F', 0),
(489, 'SIE-MIAHW7', 0),
(490, 'SIE-B8MOXS', 0),
(491, 'SIE-V6EBTS', 0),
(492, 'SIE-Y80E0C', 0),
(493, 'SIE-53R6W1', 0),
(494, 'SIE-6BCHRC', 0),
(495, 'SIE-64WQXW', 0),
(496, 'SIE-CL2NPD', 0),
(497, 'SIE-UZKYEH', 0),
(498, 'SIE-UECD8A', 0),
(499, 'SIE-IP6W4X', 0),
(500, 'SIE-1VWSM5', 0);

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
  `coupon_code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slots`
--

INSERT INTO `slots` (`id`, `slot_name`, `slot_time`, `slot_price`, `slot_date`, `speaker`, `description`, `slot_seats`, `created_at`, `updated_at`) VALUES
(2, '202', '11:15am to 1:15pm', 3500.00, '2023-02-04', 'Dr. Ajay Bajaj\n', 'Ultrasonics in Endodontics', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(1, '202', '9am to 11am', 2500.00, '2023-02-04', 'Dr. Garima Poddar', 'Quick guide to microscope in Dentistry-Labomed', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(3, '202', '2pm to 4pm', 3500.00, '2023-02-04', 'Dr. Riccardo Tonini & Dr. Viresh Chopra', 'MasterMTA - From theory into the practice-PD Swiss', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(4, '202', '4:15pm to 6:15pm', 3500.00, '2023-02-04', 'Dr. Riccardo Tonini & Dr. Viresh Chopra', 'MasterMTA - From theory into the practice-PD Swiss', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(5, '203', '9am to 11am', 2500.00, '2023-02-04', '-', '-', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(6, '203', '11:15am to 1:15pm', 2500.00, '2023-02-04', 'Dr. Riccardo Tonini', '3D filling of the root canal system: Strategies, materials and protocols\r\n-Eighteeth', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(7, '203', '2pm to 4pm', 2500.00, '2023-02-04', 'Dr. Ibrahim Naggar', 'Top Secrets for 3D Obturation-Eighteeth', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(9, '203', '4:15pm to 6:15pm', 2500.00, '2023-02-04', 'Dr. Sanil Natekar', 'Scouting the Anatomy-Management of Midroot Splits-Eighteeth', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(10, '204A', '9am to 11am', 2500.00, '2023-02-04', 'Marc Habib', '-', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(11, '204A', '11:15am to 1:15pm', 2500.00, '2023-02-04', '-', '-', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(12, '204A', '2pm to 4pm', 2500.00, '2023-02-04', 'Dr. Fabio Gorni', 'Retreatment- The new Perfect endo Retreatment kit - Perfect', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(13, '204A', '4:15pm to 6:15pm', 2500.00, '2023-02-04', 'Dr. Fabio Gorni', 'Retreatment- The new Perfect endo Retreatment kit - Perfect', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(14, '204B', '9am to 11am', 2500.00, '2023-02-04', '-', '-', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(15, '204B', '11:15am to 1:15pm', 2500.00, '2023-02-04', '-', '-', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(16, '204B', '2pm to 4pm', 2500.00, '2023-02-04', 'Dr. Konstantinos Kalogeropoulos', 'Single file Endodontics for busy practices-MM', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(17, '204B', '4:15pm to 6:15pm', 2500.00, '2023-02-04', 'Dr. Konstantinos Kalogeropoulos', 'Single file Endodontics for busy practices-MM', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(18, '202', '10am to 12pm', 2500.00, '2023-02-05', 'Dr. Garima Poddar', 'Quick guide to Microscope in Dentistry-Labomed', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(19, '202', '12:15pm to 2:15pm', 3500.00, '2023-02-05', 'Dr. Riccardo Tonini &  Dr. Viresh Chopra', 'MasterMTA - From theory into the practice-PD Swiss ', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(20, '202', '3pm to 5pm', 2500.00, '2023-02-05', '-', '-', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(21, '203', '10am to 12pm', 2500.00, '2023-02-05', 'Dr. Leena Rawal', 'Curved Canals…Conqured!-Coltene', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(22, '203', '12:15pm to 2:15pm', 3500.00, '2023-02-05', 'Dr Vivek Hegde', 'Separated Instrument retrieval by BTR technique-Sun Dental (Cerkamed)', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(23, '203', '3pm to 5pm', 3500.00, '2023-02-05', 'Dr. Vivek Hegde', 'Separated Instrument retrieval by BTR technique-Sun Dental (Cerkamed)', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(24, '204A', '10am to 12pm', 2500.00, '2023-02-05', 'Dr. Fabio Gorni', 'Retreatment- The new Perfect endo Retreatment kit- Perfect', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(25, '204A', '12:15pm to 2:15pm', 2500.00, '2023-02-05', 'Dr. Fabio Gorni', 'Retreatment- The new Perfect endo Retreatment kit- Perfect', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(26, '204A', '3pm to 5pm', 2500.00, '2023-02-05', 'Dr. Suresh Shenvi', 'Root Canal Preparation with NITI : Rationale, Performance and Safety-Eighteeth', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(27, '204B', '10am to 12pm', 2500.00, '2023-02-05', 'Dr. Konstantinos Kalogeropoulos', 'Single file Endodontics for busy practices-MM', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(28, '204B', '12:15pm to 2:15pm', 2500.00, '2023-02-05', 'Dr. Marc Krikor Kaloustian', 'Glide path  and shaping management in tricky cases with endostar Easy path and E3 Azure files -EndoStar', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36'),
(29, '204B', '3pm to 5pm', 2500.00, '2023-02-05', 'Prof. Dr. Harpreet Singh\r\n', 'Predictable Fibre post and core : Bond with the best-Coltene', 15, '2022-12-12 12:48:36', '2022-12-12 12:48:36');

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

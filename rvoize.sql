-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 21, 2023 at 06:43 AM
-- Server version: 8.0.31
-- PHP Version: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rvoize`
--

-- --------------------------------------------------------

--
-- Table structure for table `bc_attrs`
--

DROP TABLE IF EXISTS `bc_attrs`;
CREATE TABLE IF NOT EXISTS `bc_attrs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` bigint DEFAULT NULL,
  `update_user` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `hide_in_single` tinyint DEFAULT NULL,
  `hide_in_filter_search` tinyint DEFAULT NULL,
  `position` smallint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bc_attrs`
--

INSERT INTO `bc_attrs` (`id`, `name`, `slug`, `service`, `create_user`, `update_user`, `created_at`, `updated_at`, `deleted_at`, `hide_in_single`, `hide_in_filter_search`, `position`) VALUES
(1, 'Company size', 'company-size', 'company', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bc_attrs_translations`
--

DROP TABLE IF EXISTS `bc_attrs_translations`;
CREATE TABLE IF NOT EXISTS `bc_attrs_translations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `origin_id` bigint DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` bigint DEFAULT NULL,
  `update_user` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bc_attrs_translations_origin_id_locale_unique` (`origin_id`,`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bc_bookings`
--

DROP TABLE IF EXISTS `bc_bookings`;
CREATE TABLE IF NOT EXISTS `bc_bookings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_id` int DEFAULT NULL,
  `customer_id` int DEFAULT NULL,
  `payment_id` int DEFAULT NULL,
  `gateway` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `object_id` int DEFAULT NULL,
  `object_model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `total_guests` int DEFAULT NULL,
  `currency` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deposit` decimal(10,2) DEFAULT NULL,
  `deposit_type` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commission` decimal(10,2) DEFAULT NULL,
  `commission_type` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_notes` text COLLATE utf8mb4_unicode_ci,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `object_child_id` bigint DEFAULT NULL,
  `number` smallint DEFAULT NULL,
  `paid` decimal(10,2) DEFAULT NULL,
  `pay_now` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bc_booking_meta`
--

DROP TABLE IF EXISTS `bc_booking_meta`;
CREATE TABLE IF NOT EXISTS `bc_booking_meta` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `booking_id` int DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val` text COLLATE utf8mb4_unicode_ci,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bc_booking_payments`
--

DROP TABLE IF EXISTS `bc_booking_payments`;
CREATE TABLE IF NOT EXISTS `bc_booking_payments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `booking_id` int DEFAULT NULL,
  `payment_gateway` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `currency` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `converted_amount` decimal(10,2) DEFAULT NULL,
  `converted_currency` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exchange_rate` decimal(10,2) DEFAULT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logs` text COLLATE utf8mb4_unicode_ci,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bc_candidates`
--

DROP TABLE IF EXISTS `bc_candidates`;
CREATE TABLE IF NOT EXISTS `bc_candidates` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gallery` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `allow_search` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education` text COLLATE utf8mb4_unicode_ci,
  `experience` text COLLATE utf8mb4_unicode_ci,
  `award` text COLLATE utf8mb4_unicode_ci,
  `social_media` text COLLATE utf8mb4_unicode_ci,
  `languages` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education_level` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience_year` int DEFAULT NULL,
  `expected_salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_id` bigint DEFAULT NULL,
  `map_lat` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_lng` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_zoom` int DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `origin_id` bigint DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `video_cover_id` bigint DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bc_candidates_slug_index` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bc_candidates`
--

INSERT INTO `bc_candidates` (`id`, `title`, `website`, `gender`, `gallery`, `video`, `allow_search`, `education`, `experience`, `award`, `social_media`, `languages`, `education_level`, `experience_year`, `expected_salary`, `salary_type`, `location_id`, `map_lat`, `map_lng`, `map_zoom`, `city`, `country`, `address`, `create_user`, `update_user`, `slug`, `deleted_at`, `origin_id`, `lang`, `created_at`, `updated_at`, `video_cover_id`) VALUES
(2, 'UI Designer at Invision', NULL, 'male', '68,69,70,71', 'https://www.youtube.com/watch?v=bhOiLfkChPo', 'publish', '[{\"from\":\"2015\",\"to\":\"2019\",\"location\":\"Harvard University\",\"reward\":\"MBA from Harvard Business School\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Tomms College\",\"reward\":\"Bachlors in Fine Arts\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"}]', '[{\"from\":\"2015\",\"to\":\"2019\",\"location\":\"Google\",\"position\":\"Web Designer\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Facebook\",\"position\":\"CEO Founder\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Tomms College\",\"position\":\"CEO Founder\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"}]', '[{\"from\":\"2015\",\"to\":\"2019\",\"location\":\"Harvard University\",\"reward\":\"Perfect Attendance Programs\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Tomms College\",\"reward\":\"Top Performer Recognition\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"}]', '{\"skype\":\"superio.test\",\"facebook\":\"https:\\/\\/superio.test\\/\",\"twitter\":\"https:\\/\\/superio.test\\/\",\"instagram\":\"https:\\/\\/superio.test\\/\",\"pinterest\":\"https:\\/\\/superio.test\\/\",\"dribbble\":\"https:\\/\\/superio.test\\/\",\"google\":\"https:\\/\\/superio.test\\/\",\"linkedin\":\"https:\\/\\/superio.test\\/\"}', 'English, German, Spanish', 'master', 5, '901', 'daily', 5, '40.94401669296697', '-74.16938781738281', 16, 'New York', 'US', NULL, 2, NULL, 'ui-designer-at-invision-1', NULL, NULL, NULL, '2023-06-06 05:58:50', NULL, 23),
(4, 'UI Designer at Invision', NULL, 'male', '68,69,70,71', 'https://www.youtube.com/watch?v=bhOiLfkChPo', 'publish', '[{\"from\":\"2015\",\"to\":\"2019\",\"location\":\"Harvard University\",\"reward\":\"MBA from Harvard Business School\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Tomms College\",\"reward\":\"Bachlors in Fine Arts\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"}]', '[{\"from\":\"2015\",\"to\":\"2019\",\"location\":\"Google\",\"position\":\"Web Designer\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Facebook\",\"position\":\"CEO Founder\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Tomms College\",\"position\":\"CEO Founder\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"}]', '[{\"from\":\"2015\",\"to\":\"2019\",\"location\":\"Harvard University\",\"reward\":\"Perfect Attendance Programs\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Tomms College\",\"reward\":\"Top Performer Recognition\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"}]', '{\"skype\":\"superio.test\",\"facebook\":\"https:\\/\\/superio.test\\/\",\"twitter\":\"https:\\/\\/superio.test\\/\",\"instagram\":\"https:\\/\\/superio.test\\/\",\"pinterest\":\"https:\\/\\/superio.test\\/\",\"dribbble\":\"https:\\/\\/superio.test\\/\",\"google\":\"https:\\/\\/superio.test\\/\",\"linkedin\":\"https:\\/\\/superio.test\\/\"}', 'English, German, Spanish', 'diploma', 0, '943', 'hourly', 1, '40.77055783505125', '-74.26002502441406', 16, 'New York', 'US', NULL, 4, NULL, 'ui-designer-at-invision-2', '2023-06-14 02:40:00', NULL, NULL, '2023-06-06 05:58:50', '2023-06-14 02:40:00', 23),
(5, 'UI Designer at Invision', NULL, 'female', '68,69,70,71', 'https://www.youtube.com/watch?v=bhOiLfkChPo', 'publish', '[{\"from\":\"2015\",\"to\":\"2019\",\"location\":\"Harvard University\",\"reward\":\"MBA from Harvard Business School\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Tomms College\",\"reward\":\"Bachlors in Fine Arts\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"}]', '[{\"from\":\"2015\",\"to\":\"2019\",\"location\":\"Google\",\"position\":\"Web Designer\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Facebook\",\"position\":\"CEO Founder\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Tomms College\",\"position\":\"CEO Founder\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"}]', '[{\"from\":\"2015\",\"to\":\"2019\",\"location\":\"Harvard University\",\"reward\":\"Perfect Attendance Programs\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Tomms College\",\"reward\":\"Top Performer Recognition\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"}]', '{\"skype\":\"superio.test\",\"facebook\":\"https:\\/\\/superio.test\\/\",\"twitter\":\"https:\\/\\/superio.test\\/\",\"instagram\":\"https:\\/\\/superio.test\\/\",\"pinterest\":\"https:\\/\\/superio.test\\/\",\"dribbble\":\"https:\\/\\/superio.test\\/\",\"google\":\"https:\\/\\/superio.test\\/\",\"linkedin\":\"https:\\/\\/superio.test\\/\"}', 'English, German, Spanish', 'certificate', 5, '385', 'monthly', 2, '40.7427837', '-73.11445617675781', 16, 'New York', 'US', NULL, 5, NULL, 'ui-designer-at-invision-3', '2023-06-14 02:40:00', NULL, NULL, '2023-06-06 05:58:50', '2023-06-14 02:40:00', 23),
(6, 'UI Designer at Invision', NULL, 'female', '68,69,70,71', 'https://www.youtube.com/watch?v=bhOiLfkChPo', 'publish', '[{\"from\":\"2015\",\"to\":\"2019\",\"location\":\"Harvard University\",\"reward\":\"MBA from Harvard Business School\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Tomms College\",\"reward\":\"Bachlors in Fine Arts\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"}]', '[{\"from\":\"2015\",\"to\":\"2019\",\"location\":\"Google\",\"position\":\"Web Designer\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Facebook\",\"position\":\"CEO Founder\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Tomms College\",\"position\":\"CEO Founder\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"}]', '[{\"from\":\"2015\",\"to\":\"2019\",\"location\":\"Harvard University\",\"reward\":\"Perfect Attendance Programs\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Tomms College\",\"reward\":\"Top Performer Recognition\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"}]', '{\"skype\":\"superio.test\",\"facebook\":\"https:\\/\\/superio.test\\/\",\"twitter\":\"https:\\/\\/superio.test\\/\",\"instagram\":\"https:\\/\\/superio.test\\/\",\"pinterest\":\"https:\\/\\/superio.test\\/\",\"dribbble\":\"https:\\/\\/superio.test\\/\",\"google\":\"https:\\/\\/superio.test\\/\",\"linkedin\":\"https:\\/\\/superio.test\\/\"}', 'English, German, Spanish', 'master', 5, '147', 'daily', 1, '40.70437865245596', '-73.98674011230469', 16, 'New York', 'US', NULL, 6, NULL, 'ui-designer-at-invision-4', '2023-06-14 02:40:00', NULL, NULL, '2023-06-06 05:58:50', '2023-06-14 02:40:00', 23),
(7, 'UI Designer at Invision', NULL, 'male', '68,69,70,71', 'https://www.youtube.com/watch?v=bhOiLfkChPo', 'publish', '[{\"from\":\"2015\",\"to\":\"2019\",\"location\":\"Harvard University\",\"reward\":\"MBA from Harvard Business School\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Tomms College\",\"reward\":\"Bachlors in Fine Arts\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"}]', '[{\"from\":\"2015\",\"to\":\"2019\",\"location\":\"Google\",\"position\":\"Web Designer\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Facebook\",\"position\":\"CEO Founder\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Tomms College\",\"position\":\"CEO Founder\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"}]', '[{\"from\":\"2015\",\"to\":\"2019\",\"location\":\"Harvard University\",\"reward\":\"Perfect Attendance Programs\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Tomms College\",\"reward\":\"Top Performer Recognition\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"}]', '{\"skype\":\"superio.test\",\"facebook\":\"https:\\/\\/superio.test\\/\",\"twitter\":\"https:\\/\\/superio.test\\/\",\"instagram\":\"https:\\/\\/superio.test\\/\",\"pinterest\":\"https:\\/\\/superio.test\\/\",\"dribbble\":\"https:\\/\\/superio.test\\/\",\"google\":\"https:\\/\\/superio.test\\/\",\"linkedin\":\"https:\\/\\/superio.test\\/\"}', 'English, German, Spanish', 'bachelor', 0, '107', 'daily', 1, '40.641311', '-73.778139', 16, 'New York', 'US', NULL, 7, NULL, 'ui-designer-at-invision-5', '2023-06-14 02:40:00', NULL, NULL, '2023-06-06 05:58:50', '2023-06-14 02:40:00', 23),
(8, 'UI Designer at Invision', NULL, 'female', '68,69,70,71', 'https://www.youtube.com/watch?v=bhOiLfkChPo', 'publish', '[{\"from\":\"2015\",\"to\":\"2019\",\"location\":\"Harvard University\",\"reward\":\"MBA from Harvard Business School\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Tomms College\",\"reward\":\"Bachlors in Fine Arts\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"}]', '[{\"from\":\"2015\",\"to\":\"2019\",\"location\":\"Google\",\"position\":\"Web Designer\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Facebook\",\"position\":\"CEO Founder\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Tomms College\",\"position\":\"CEO Founder\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"}]', '[{\"from\":\"2015\",\"to\":\"2019\",\"location\":\"Harvard University\",\"reward\":\"Perfect Attendance Programs\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Tomms College\",\"reward\":\"Top Performer Recognition\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"}]', '{\"skype\":\"superio.test\",\"facebook\":\"https:\\/\\/superio.test\\/\",\"twitter\":\"https:\\/\\/superio.test\\/\",\"instagram\":\"https:\\/\\/superio.test\\/\",\"pinterest\":\"https:\\/\\/superio.test\\/\",\"dribbble\":\"https:\\/\\/superio.test\\/\",\"google\":\"https:\\/\\/superio.test\\/\",\"linkedin\":\"https:\\/\\/superio.test\\/\"}', 'English, German, Spanish', 'diploma', 2, '732', 'monthly', 5, '41.080938', '-73.535957', 16, 'New York', 'US', NULL, 8, NULL, 'ui-designer-at-invision-6', '2023-06-14 02:40:00', NULL, NULL, '2023-06-06 05:58:51', '2023-06-14 02:40:00', 23),
(9, 'UI Designer at Invision', NULL, 'female', '68,69,70,71', 'https://www.youtube.com/watch?v=bhOiLfkChPo', 'publish', '[{\"from\":\"2015\",\"to\":\"2019\",\"location\":\"Harvard University\",\"reward\":\"MBA from Harvard Business School\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Tomms College\",\"reward\":\"Bachlors in Fine Arts\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"}]', '[{\"from\":\"2015\",\"to\":\"2019\",\"location\":\"Google\",\"position\":\"Web Designer\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Facebook\",\"position\":\"CEO Founder\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Tomms College\",\"position\":\"CEO Founder\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"}]', '[{\"from\":\"2015\",\"to\":\"2019\",\"location\":\"Harvard University\",\"reward\":\"Perfect Attendance Programs\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"},{\"from\":\"2011\",\"to\":\"2015\",\"location\":\"Tomms College\",\"reward\":\"Top Performer Recognition\",\"information\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus.<br/> Interdum et malesuada fames ac anteipsum primis in faucibus.\"}]', '{\"skype\":\"superio.test\",\"facebook\":\"https:\\/\\/superio.test\\/\",\"twitter\":\"https:\\/\\/superio.test\\/\",\"instagram\":\"https:\\/\\/superio.test\\/\",\"pinterest\":\"https:\\/\\/superio.test\\/\",\"dribbble\":\"https:\\/\\/superio.test\\/\",\"google\":\"https:\\/\\/superio.test\\/\",\"linkedin\":\"https:\\/\\/superio.test\\/\"}', 'English, German, Spanish', 'associate', 3, '321', 'hourly', 4, '41.079386', '-73.519478', 16, 'New York', 'US', NULL, 9, NULL, 'ui-designer-at-invision-7', '2023-06-14 02:40:00', NULL, NULL, '2023-06-06 05:58:51', '2023-06-14 02:40:00', 23),
(17, 'Hrishi D', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, NULL, 'hrishi-d', NULL, NULL, NULL, '2023-06-09 23:31:11', '2023-06-09 23:31:11', NULL),
(20, 'Hrishik D', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20, NULL, 'hrishik-d', '2023-06-20 21:02:35', NULL, NULL, '2023-06-20 20:52:27', '2023-06-20 21:02:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bc_candidate_categories`
--

DROP TABLE IF EXISTS `bc_candidate_categories`;
CREATE TABLE IF NOT EXISTS `bc_candidate_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `origin_id` bigint UNSIGNED NOT NULL,
  `cat_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bc_candidate_categories`
--

INSERT INTO `bc_candidate_categories` (`id`, `origin_id`, `cat_id`, `created_at`, `updated_at`) VALUES
(1, 2, 2, '2023-06-06 05:58:50', NULL),
(2, 2, 9, '2023-06-06 05:58:50', NULL),
(3, 4, 1, '2023-06-06 05:58:50', NULL),
(4, 4, 8, '2023-06-06 05:58:50', NULL),
(5, 5, 2, '2023-06-06 05:58:50', NULL),
(6, 5, 7, '2023-06-06 05:58:50', NULL),
(7, 6, 1, '2023-06-06 05:58:50', NULL),
(8, 6, 8, '2023-06-06 05:58:50', NULL),
(9, 7, 3, '2023-06-06 05:58:51', NULL),
(10, 7, 9, '2023-06-06 05:58:51', NULL),
(11, 8, 5, '2023-06-06 05:58:51', NULL),
(12, 8, 6, '2023-06-06 05:58:51', NULL),
(13, 9, 4, '2023-06-06 05:58:51', NULL),
(14, 9, 8, '2023-06-06 05:58:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bc_candidate_contact`
--

DROP TABLE IF EXISTS `bc_candidate_contact`;
CREATE TABLE IF NOT EXISTS `bc_candidate_contact` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `origin_id` bigint DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `contact_to` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `object_id` bigint DEFAULT NULL,
  `object_model` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bc_candidate_cvs`
--

DROP TABLE IF EXISTS `bc_candidate_cvs`;
CREATE TABLE IF NOT EXISTS `bc_candidate_cvs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `file_id` int DEFAULT NULL,
  `origin_id` int UNSIGNED NOT NULL,
  `is_default` tinyint DEFAULT NULL,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bc_candidate_cvs`
--

INSERT INTO `bc_candidate_cvs` (`id`, `file_id`, `origin_id`, `is_default`, `create_user`, `update_user`, `created_at`, `updated_at`) VALUES
(1, 74, 2, 1, 2, NULL, '2023-06-06 05:58:50', NULL),
(2, 75, 4, 1, 4, NULL, '2023-06-06 05:58:50', NULL),
(3, 76, 5, 1, 5, NULL, '2023-06-06 05:58:50', NULL),
(4, 77, 6, 1, 6, NULL, '2023-06-06 05:58:50', NULL),
(5, 78, 7, 1, 7, NULL, '2023-06-06 05:58:50', NULL),
(6, 79, 8, 1, 8, NULL, '2023-06-06 05:58:51', NULL),
(7, 80, 9, 1, 9, NULL, '2023-06-06 05:58:51', NULL),
(8, 181, 17, NULL, 17, NULL, '2023-06-09 23:38:42', '2023-06-09 23:38:42'),
(9, 182, 17, NULL, 17, NULL, '2023-06-09 23:39:50', '2023-06-09 23:39:50'),
(10, 183, 17, NULL, 17, NULL, '2023-06-09 23:40:30', '2023-06-09 23:40:30'),
(11, 184, 17, NULL, 17, NULL, '2023-06-09 23:41:03', '2023-06-09 23:41:03'),
(12, 191, 20, NULL, 20, NULL, '2023-06-20 20:53:50', '2023-06-20 20:53:50'),
(13, 192, 20, NULL, 20, NULL, '2023-06-20 20:54:23', '2023-06-20 20:54:23'),
(14, 193, 20, NULL, 20, NULL, '2023-06-20 20:54:55', '2023-06-20 20:54:55'),
(15, 194, 20, NULL, 20, NULL, '2023-06-20 20:55:16', '2023-06-20 20:55:16'),
(16, 195, 20, NULL, 20, NULL, '2023-06-20 20:55:34', '2023-06-20 20:55:34');

-- --------------------------------------------------------

--
-- Table structure for table `bc_candidate_skills`
--

DROP TABLE IF EXISTS `bc_candidate_skills`;
CREATE TABLE IF NOT EXISTS `bc_candidate_skills` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `origin_id` bigint UNSIGNED NOT NULL,
  `skill_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bc_candidate_skills`
--

INSERT INTO `bc_candidate_skills` (`id`, `origin_id`, `skill_id`, `created_at`, `updated_at`) VALUES
(1, 2, 2, '2023-06-06 05:58:50', NULL),
(2, 2, 4, '2023-06-06 05:58:50', NULL),
(3, 2, 5, '2023-06-06 05:58:50', NULL),
(4, 2, 8, '2023-06-06 05:58:50', NULL),
(5, 4, 1, '2023-06-06 05:58:50', NULL),
(6, 4, 3, '2023-06-06 05:58:50', NULL),
(7, 4, 6, '2023-06-06 05:58:50', NULL),
(8, 4, 8, '2023-06-06 05:58:50', NULL),
(9, 5, 2, '2023-06-06 05:58:50', NULL),
(10, 5, 4, '2023-06-06 05:58:50', NULL),
(11, 5, 6, '2023-06-06 05:58:50', NULL),
(12, 5, 7, '2023-06-06 05:58:50', NULL),
(13, 6, 1, '2023-06-06 05:58:50', NULL),
(14, 6, 3, '2023-06-06 05:58:50', NULL),
(15, 6, 5, '2023-06-06 05:58:50', NULL),
(16, 6, 8, '2023-06-06 05:58:50', NULL),
(17, 7, 2, '2023-06-06 05:58:51', NULL),
(18, 7, 4, '2023-06-06 05:58:51', NULL),
(19, 7, 6, '2023-06-06 05:58:51', NULL),
(20, 7, 8, '2023-06-06 05:58:51', NULL),
(21, 8, 1, '2023-06-06 05:58:51', NULL),
(22, 8, 3, '2023-06-06 05:58:51', NULL),
(23, 8, 6, '2023-06-06 05:58:51', NULL),
(24, 8, 8, '2023-06-06 05:58:51', NULL),
(25, 9, 2, '2023-06-06 05:58:51', NULL),
(26, 9, 4, '2023-06-06 05:58:51', NULL),
(27, 9, 5, '2023-06-06 05:58:51', NULL),
(28, 9, 8, '2023-06-06 05:58:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bc_candidate_translation`
--

DROP TABLE IF EXISTS `bc_candidate_translation`;
CREATE TABLE IF NOT EXISTS `bc_candidate_translation` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `origin_id` int UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bc_candidate_translation_locale_index` (`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bc_categories`
--

DROP TABLE IF EXISTS `bc_categories`;
CREATE TABLE IF NOT EXISTS `bc_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `origin_id` bigint DEFAULT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `_lft` int UNSIGNED NOT NULL DEFAULT '0',
  `_rgt` int UNSIGNED NOT NULL DEFAULT '0',
  `parent_id` int UNSIGNED DEFAULT NULL,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bc_categories__lft__rgt_parent_id_index` (`_lft`,`_rgt`,`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bc_categories`
--

INSERT INTO `bc_categories` (`id`, `name`, `content`, `slug`, `status`, `origin_id`, `icon`, `lang`, `_lft`, `_rgt`, `parent_id`, `create_user`, `update_user`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Accounting / Finance', NULL, 'accounting-finance', 'publish', NULL, 'icon flaticon-money-1', NULL, 1, 2, NULL, NULL, NULL, NULL, '2023-06-06 05:58:50', '2023-06-06 05:58:50'),
(2, 'Marketing', NULL, 'marketing', 'publish', NULL, 'icon flaticon-promotion', NULL, 3, 4, NULL, NULL, NULL, NULL, '2023-06-06 05:58:50', '2023-06-06 05:58:50'),
(3, 'Design', NULL, 'design', 'publish', NULL, 'icon flaticon-vector', NULL, 5, 6, NULL, NULL, NULL, NULL, '2023-06-06 05:58:50', '2023-06-06 05:58:50'),
(4, 'Development', NULL, 'development', 'publish', NULL, 'icon flaticon-web-programming', NULL, 7, 8, NULL, NULL, NULL, NULL, '2023-06-06 05:58:50', '2023-06-06 05:58:50'),
(5, 'Human Resource', NULL, 'human-resource', 'publish', NULL, 'icon flaticon-headhunting', NULL, 9, 10, NULL, NULL, NULL, NULL, '2023-06-06 05:58:50', '2023-06-06 05:58:50'),
(6, 'Project Management', NULL, 'project-management', 'publish', NULL, 'icon flaticon-rocket-ship', NULL, 11, 12, NULL, NULL, NULL, NULL, '2023-06-06 05:58:50', '2023-06-06 05:58:50'),
(7, 'Customer Service', NULL, 'customer-service', 'publish', NULL, 'icon flaticon-support-1', NULL, 13, 14, NULL, NULL, NULL, NULL, '2023-06-06 05:58:50', '2023-06-06 05:58:50'),
(8, 'Health and Care', NULL, 'health-and-care', 'publish', NULL, 'icon flaticon-first-aid-kit-1', NULL, 15, 16, NULL, NULL, NULL, NULL, '2023-06-06 05:58:50', '2023-06-06 05:58:50'),
(9, 'Automotive Jobs', NULL, 'automotive-jobs', 'publish', NULL, 'icon flaticon-car', NULL, 17, 18, NULL, NULL, NULL, NULL, '2023-06-06 05:58:50', '2023-06-06 05:58:50');

-- --------------------------------------------------------

--
-- Table structure for table `bc_category_translations`
--

DROP TABLE IF EXISTS `bc_category_translations`;
CREATE TABLE IF NOT EXISTS `bc_category_translations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `origin_id` int UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bc_category_translations_locale_index` (`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bc_companies`
--

DROP TABLE IF EXISTS `bc_companies`;
CREATE TABLE IF NOT EXISTS `bc_companies` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar_id` bigint DEFAULT NULL,
  `cover_id` bigint DEFAULT NULL,
  `founded_in` date DEFAULT NULL,
  `allow_search` tinyint DEFAULT '0',
  `is_featured` tinyint DEFAULT '0',
  `owner_id` bigint DEFAULT NULL,
  `location_id` bigint DEFAULT NULL,
  `category_id` bigint DEFAULT NULL,
  `team_size` int NOT NULL DEFAULT '0',
  `about` text COLLATE utf8mb4_unicode_ci,
  `social_media` text COLLATE utf8mb4_unicode_ci,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `map_lat` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_lng` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bc_companies_slug_index` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bc_companies`
--

INSERT INTO `bc_companies` (`id`, `name`, `email`, `phone`, `website`, `avatar_id`, `cover_id`, `founded_in`, `allow_search`, `is_featured`, `owner_id`, `location_id`, `category_id`, `team_size`, `about`, `social_media`, `city`, `state`, `country`, `zip_code`, `address`, `slug`, `status`, `create_user`, `update_user`, `map_lat`, `map_lng`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Netflix', 'employer@netflix.test', '112 666 888', 'https://netflix.com', 84, 2, '2023-06-06', 1, 0, 1, 1, 8, 0, '<p>Netflix is a popular streaming service that offers a wide range of movies, TV shows, documentaries, and original content to its subscribers. Founded in 1997 by Reed Hastings and Marc Randolph, Netflix started as a DVD rental-by-mail service before transitioning to an online streaming platform in 2007. Since then, it has become one of the leading providers of digital entertainment worldwide.</p>', '{\"skype\":\"#\",\"facebook\":\"#\",\"twitter\":\"#\",\"instagram\":\"#\",\"linkedin\":\"#\",\"google\":\"#\"}', 'LA', NULL, NULL, NULL, 'California', 'netflix', 'publish', 1, 1, '40.94401669296697', '-74.16938781738281', NULL, '2023-06-06 05:58:52', '2023-06-14 02:37:24'),
(2, 'Opendoor', 'williamson@superio.test', '112 666 888', 'https://opendoor.com', 85, 2, '2023-06-06', 1, 1, 10, 1, 3, 1, '<h4>Hello! This is my story.</h4>\r\n                        <p>Hello! I am a Seattle/Tacoma, Washington area graphic designer with over 6 years of graphic design experience. I specialize in designing infographics, icons, brochures, and flyers.</p>\r\n                        <ul class=\"instructor_estimate\">\r\n                            <li>Included in my estimate:</li>\r\n                            <li>Custom illustrations</li>\r\n                            <li>Stock images</li>\r\n                            <li>Any final files you need</li>\r\n                        </ul>\r\n                        <p>If you have a specific budget or deadline, let me know and I will work with you!</p>', '{\"skype\":\"bookingcore.org\",\"facebook\":\"https:\\/\\/bookingcore.org\\/\",\"twitter\":\"https:\\/\\/bookingcore.org\\/\",\"instagram\":\"https:\\/\\/bookingcore.org\\/\",\"pinterest\":\"https:\\/\\/bookingcore.org\\/\",\"dribbble\":\"https:\\/\\/bookingcore.org\\/\",\"google\":\"https:\\/\\/bookingcore.org\\/\"}', 'London', NULL, 'UK', NULL, 'Washington', 'opendoor', 'publish', NULL, NULL, '40.77055783505125', '-74.26002502441406', '2023-06-14 02:33:46', '2023-06-06 05:58:52', '2023-06-14 02:33:46'),
(3, 'Checkr', 'fox@superio.test', '112 666 888', 'https://checkr.com', 86, 2, '2023-06-06', 1, 0, 11, 1, 6, 1, '<h4>Hello! This is my story.</h4>\r\n                        <p>Hello! I am a Seattle/Tacoma, Washington area graphic designer with over 6 years of graphic design experience. I specialize in designing infographics, icons, brochures, and flyers.</p>\r\n                        <ul class=\"instructor_estimate\">\r\n                            <li>Included in my estimate:</li>\r\n                            <li>Custom illustrations</li>\r\n                            <li>Stock images</li>\r\n                            <li>Any final files you need</li>\r\n                        </ul>\r\n                        <p>If you have a specific budget or deadline, let me know and I will work with you!</p>', '{\"skype\":\"bookingcore.org\",\"facebook\":\"https:\\/\\/bookingcore.org\\/\",\"twitter\":\"https:\\/\\/bookingcore.org\\/\",\"instagram\":\"https:\\/\\/bookingcore.org\\/\",\"pinterest\":\"https:\\/\\/bookingcore.org\\/\",\"dribbble\":\"https:\\/\\/bookingcore.org\\/\",\"google\":\"https:\\/\\/bookingcore.org\\/\"}', 'London', NULL, 'UK', NULL, 'Washington', 'checkr', 'publish', NULL, NULL, '40.7427837', '-73.11445617675781', '2023-06-14 02:33:46', '2023-06-06 05:58:52', '2023-06-14 02:33:46'),
(4, 'Mural', 'hiddleston@superio.test', '112 666 888', 'https://mural.com', 87, 2, '2023-06-06', 1, 1, 12, 1, 8, 1, '<h4>Hello! This is my story.</h4>\r\n                        <p>Hello! I am a Seattle/Tacoma, Washington area graphic designer with over 6 years of graphic design experience. I specialize in designing infographics, icons, brochures, and flyers.</p>\r\n                        <ul class=\"instructor_estimate\">\r\n                            <li>Included in my estimate:</li>\r\n                            <li>Custom illustrations</li>\r\n                            <li>Stock images</li>\r\n                            <li>Any final files you need</li>\r\n                        </ul>\r\n                        <p>If you have a specific budget or deadline, let me know and I will work with you!</p>', '{\"skype\":\"bookingcore.org\",\"facebook\":\"https:\\/\\/bookingcore.org\\/\",\"twitter\":\"https:\\/\\/bookingcore.org\\/\",\"instagram\":\"https:\\/\\/bookingcore.org\\/\",\"pinterest\":\"https:\\/\\/bookingcore.org\\/\",\"dribbble\":\"https:\\/\\/bookingcore.org\\/\",\"google\":\"https:\\/\\/bookingcore.org\\/\"}', 'London', NULL, 'UK', NULL, 'Washington', 'mural', 'publish', NULL, NULL, '40.70437865245596', '-73.98674011230469', '2023-06-14 02:34:13', '2023-06-06 05:58:52', '2023-06-14 02:34:13'),
(5, 'Astronomer', 'linda@superio.test', '112 666 888', 'https://astronomer.com', 88, 2, '2023-06-06', 1, 0, 13, 1, 2, 1, '<h4>Hello! This is my story.</h4>\r\n                        <p>Hello! I am a Seattle/Tacoma, Washington area graphic designer with over 6 years of graphic design experience. I specialize in designing infographics, icons, brochures, and flyers.</p>\r\n                        <ul class=\"instructor_estimate\">\r\n                            <li>Included in my estimate:</li>\r\n                            <li>Custom illustrations</li>\r\n                            <li>Stock images</li>\r\n                            <li>Any final files you need</li>\r\n                        </ul>\r\n                        <p>If you have a specific budget or deadline, let me know and I will work with you!</p>', '{\"skype\":\"bookingcore.org\",\"facebook\":\"https:\\/\\/bookingcore.org\\/\",\"twitter\":\"https:\\/\\/bookingcore.org\\/\",\"instagram\":\"https:\\/\\/bookingcore.org\\/\",\"pinterest\":\"https:\\/\\/bookingcore.org\\/\",\"dribbble\":\"https:\\/\\/bookingcore.org\\/\",\"google\":\"https:\\/\\/bookingcore.org\\/\"}', 'London', NULL, 'UK', NULL, 'Washington', 'astronomer', 'publish', NULL, NULL, '40.641311', '-73.778139', '2023-06-14 02:33:46', '2023-06-06 05:58:52', '2023-06-14 02:33:46'),
(6, 'Figma', 'test@figma.test', '112 666 888', 'https://figma.com', 89, 2, '2023-06-06', 1, 0, 1, 1, 6, 0, '<p>Figma is a web-based collaborative design tool used by designers, developers, and product teams to create, prototype, and collaborate on digital designs. It was founded in 2012 by Dylan Field and Evan Wallace and has gained popularity for its intuitive interface and powerful features.</p>', '{\"skype\":\"#\",\"facebook\":\"#\",\"twitter\":\"#\",\"instagram\":\"#\",\"linkedin\":\"#\",\"google\":\"#\"}', 'London', NULL, NULL, NULL, 'Washington', 'figma', 'publish', 1, 1, '41.080938', '-73.535957', NULL, '2023-06-06 05:58:52', '2023-06-14 02:37:01'),
(7, 'Stripe', 'test@figma.test', '112 666 888', 'https://stripe.com', 90, 2, '2023-06-06', 1, 0, 1, 1, 5, 0, '<p>Stripe is a technology company that provides a suite of payment processing tools and services for businesses of all sizes. Founded in 2010 by brothers Patrick and John Collison, Stripe has grown to become one of the leading payment solutions providers globally.</p>', '{\"skype\":\"#\",\"facebook\":\"#\",\"twitter\":\"#\",\"instagram\":\"#\",\"linkedin\":\"#\",\"google\":\"#\"}', 'London', NULL, NULL, NULL, 'Washington', 'stripe', 'publish', 1, 1, '41.079386', '-73.519478', NULL, '2023-06-06 05:58:52', '2023-06-14 02:36:27'),
(8, 'System Admin', 'hr@rvoize.com', NULL, NULL, NULL, NULL, NULL, 0, 0, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'system-admin', NULL, 1, NULL, NULL, NULL, NULL, '2023-06-07 00:13:36', '2023-06-07 00:13:36'),
(9, 'hrishi d', 'it.intern@digipeddle.in', '9604424923', 'abc.com', NULL, NULL, '2023-06-19', NULL, NULL, 16, NULL, 1, 0, NULL, '{\"skype\":null,\"facebook\":null,\"twitter\":null,\"instagram\":null,\"linkedin\":null,\"google\":null}', 'Hyderabad', 'Hyderabad', 'IN', '411030', 'California', 'hrishi-d', 'draft', 16, 16, NULL, NULL, NULL, '2023-06-09 23:11:15', '2023-06-20 01:24:21'),
(10, 'Hrishikesh D', 'hrishidhumal77@gmail.com', NULL, NULL, NULL, NULL, NULL, 0, 0, 19, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'hrishikesh-d', 'draft', 19, NULL, NULL, NULL, '2023-06-20 21:02:35', '2023-06-16 23:59:12', '2023-06-20 21:02:35');

-- --------------------------------------------------------

--
-- Table structure for table `bc_company_categories`
--

DROP TABLE IF EXISTS `bc_company_categories`;
CREATE TABLE IF NOT EXISTS `bc_company_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `origin_id` bigint DEFAULT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `_lft` int UNSIGNED NOT NULL DEFAULT '0',
  `_rgt` int UNSIGNED NOT NULL DEFAULT '0',
  `parent_id` int UNSIGNED DEFAULT NULL,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bc_company_categories__lft__rgt_parent_id_index` (`_lft`,`_rgt`,`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bc_company_categories`
--

INSERT INTO `bc_company_categories` (`id`, `name`, `content`, `slug`, `status`, `origin_id`, `icon`, `lang`, `_lft`, `_rgt`, `parent_id`, `create_user`, `update_user`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Accounting / Finance', NULL, 'accounting-finance', 'publish', NULL, 'icon flaticon-money-1', NULL, 1, 2, NULL, NULL, NULL, NULL, '2023-06-06 06:00:29', '2023-06-06 06:00:29'),
(2, 'Marketing', NULL, 'marketing', 'publish', NULL, 'icon flaticon-promotion', NULL, 3, 4, NULL, NULL, NULL, NULL, '2023-06-06 06:00:29', '2023-06-06 06:00:29'),
(3, 'Design', NULL, 'design', 'publish', NULL, 'icon flaticon-vector', NULL, 5, 6, NULL, NULL, NULL, NULL, '2023-06-06 06:00:29', '2023-06-06 06:00:29'),
(4, 'Development', NULL, 'development', 'publish', NULL, 'icon flaticon-web-programming', NULL, 7, 8, NULL, NULL, NULL, NULL, '2023-06-06 06:00:29', '2023-06-06 06:00:29'),
(5, 'Human Resource', NULL, 'human-resource', 'publish', NULL, 'icon flaticon-headhunting', NULL, 9, 10, NULL, NULL, NULL, NULL, '2023-06-06 06:00:29', '2023-06-06 06:00:29'),
(6, 'Project Management', NULL, 'project-management', 'publish', NULL, 'icon flaticon-rocket-ship', NULL, 11, 12, NULL, NULL, NULL, NULL, '2023-06-06 06:00:29', '2023-06-06 06:00:29'),
(7, 'Customer Service', NULL, 'customer-service', 'publish', NULL, 'icon flaticon-support-1', NULL, 13, 14, NULL, NULL, NULL, NULL, '2023-06-06 06:00:29', '2023-06-06 06:00:29'),
(8, 'Health and Care', NULL, 'health-and-care', 'publish', NULL, 'icon flaticon-first-aid-kit-1', NULL, 15, 16, NULL, NULL, NULL, NULL, '2023-06-06 06:00:29', '2023-06-06 06:00:29'),
(9, 'Automotive Jobs', NULL, 'automotive-jobs', 'publish', NULL, 'icon flaticon-car', NULL, 17, 18, NULL, NULL, NULL, NULL, '2023-06-06 06:00:29', '2023-06-06 06:00:29');

-- --------------------------------------------------------

--
-- Table structure for table `bc_company_category_translations`
--

DROP TABLE IF EXISTS `bc_company_category_translations`;
CREATE TABLE IF NOT EXISTS `bc_company_category_translations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `origin_id` int UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bc_company_category_translations_locale_index` (`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bc_company_term`
--

DROP TABLE IF EXISTS `bc_company_term`;
CREATE TABLE IF NOT EXISTS `bc_company_term` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `term_id` int DEFAULT NULL,
  `company_id` int DEFAULT NULL,
  `create_user` bigint DEFAULT NULL,
  `update_user` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bc_company_translations`
--

DROP TABLE IF EXISTS `bc_company_translations`;
CREATE TABLE IF NOT EXISTS `bc_company_translations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `origin_id` int UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bc_company_translations_locale_index` (`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bc_contact`
--

DROP TABLE IF EXISTS `bc_contact`;
CREATE TABLE IF NOT EXISTS `bc_contact` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bc_gigs`
--

DROP TABLE IF EXISTS `bc_gigs`;
CREATE TABLE IF NOT EXISTS `bc_gigs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `image_id` int DEFAULT NULL,
  `banner_image_id` int DEFAULT NULL,
  `is_featured` tinyint DEFAULT NULL,
  `gallery` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat_id` bigint DEFAULT NULL,
  `cat2_id` bigint DEFAULT NULL,
  `cat3_id` bigint DEFAULT NULL,
  `basic_price` decimal(12,2) DEFAULT NULL,
  `standard_price` decimal(12,2) DEFAULT NULL,
  `premium_price` decimal(12,2) DEFAULT NULL,
  `extra_price` text COLLATE utf8mb4_unicode_ci,
  `review_score` decimal(2,1) DEFAULT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `packages` text COLLATE utf8mb4_unicode_ci,
  `package_compare` text COLLATE utf8mb4_unicode_ci,
  `faqs` text COLLATE utf8mb4_unicode_ci,
  `requirements` text COLLATE utf8mb4_unicode_ci,
  `basic_delivery_time` int DEFAULT NULL,
  `create_user` bigint DEFAULT NULL,
  `update_user` bigint DEFAULT NULL,
  `author_id` bigint DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bc_gigs_slug_unique` (`slug`),
  KEY `bc_gigs_status_cat2_id_index` (`status`,`cat2_id`),
  KEY `bc_gigs_status_cat3_id_index` (`status`,`cat3_id`),
  KEY `bc_gigs_status_author_id_index` (`status`,`author_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bc_gigs`
--

INSERT INTO `bc_gigs` (`id`, `title`, `slug`, `content`, `image_id`, `banner_image_id`, `is_featured`, `gallery`, `video_url`, `cat_id`, `cat2_id`, `cat3_id`, `basic_price`, `standard_price`, `premium_price`, `extra_price`, `review_score`, `status`, `packages`, `package_compare`, `faqs`, `requirements`, `basic_delivery_time`, `create_user`, `update_user`, `author_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'I will Quod corrupti veritatis', 'i-will-quod-corrupti-veritatis', 'Adipisci aut ipsum nihil necessitatibus quod. Aperiam ducimus hic ipsam blanditiis et autem eos. Nihil enim qui possimus dolorum dolorem ex dolor. Voluptatem hic maiores laudantium.\n\nVoluptatibus molestias aperiam dolor cumque velit quas aut beatae. Et autem qui doloribus temporibus. Optio sed blanditiis ipsam libero tempore. Aut nemo eveniet ut in consequuntur aut voluptas.\n\nAccusamus cum itaque est vitae dignissimos in. Tempora exercitationem deserunt nihil.\n\nQuia saepe consectetur in. Placeat accusantium ut non placeat. Perferendis aut et et corrupti praesentium reprehenderit ut.\n\nIn eaque et nihil itaque nihil et rerum. Voluptatum molestias quia illum voluptate neque. Perspiciatis architecto sit nisi minima deserunt.\n\nAtque quod ut dolor voluptatem sit labore fuga. Rem et molestias sed nemo similique dolores itaque. Ut debitis minima laborum explicabo magni. Et libero dolorum officiis.\n\nLaudantium ducimus ullam consequuntur asperiores perferendis voluptatem temporibus. Tempore quia rem quia modi cumque. Reiciendis architecto accusantium cum repellendus enim fugit rerum. Eveniet sint voluptatem laborum delectus nihil itaque.\n\nExplicabo vel occaecati sed aspernatur. Delectus nobis nulla omnis quia et. Voluptate optio perferendis ea.\n\nCommodi accusamus enim velit et recusandae enim et ut. Illum nostrum assumenda expedita et velit sapiente necessitatibus. Exercitationem beatae et qui minus ducimus.\n\nVoluptatum sint sit tenetur quam eos in est. Eius sit minima sint voluptas aperiam et sapiente. Adipisci et eaque et vero perferendis. Et dolore beatae nesciunt magnam necessitatibus repellat iste.', 175, NULL, NULL, '173, 174, 175, 176', 'https://www.youtube.com/watch?v=K1QICrgxTjA', 33, 34, 35, '9.00', '28.00', '178.00', NULL, '5.0', 'publish', '[{\"name\":\"Basic\",\"key\":\"basic\",\"desc\":\"Maxime nulla rerum numquam laborum.\",\"delivery_time\":1,\"revision\":3},{\"name\":\"Standard\",\"key\":\"standard\",\"desc\":\"Nobis deserunt nam voluptas reiciendis qui expedita.\",\"delivery_time\":4,\"revision\":3},{\"name\":\"Premium\",\"key\":\"premium\",\"desc\":\"Molestiae autem exercitationem placeat maiores animi similique quas.\",\"delivery_time\":6,\"revision\":3}]', '[{\"name\":\"Hic ipsam a.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Numquam maiores quia architecto.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"A id voluptate doloribus.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"}]', NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-06-06 05:58:54', '2023-06-06 05:58:55'),
(2, 'I will Perspiciatis ut id doloremque sit recusandae velit.', 'i-will-perspiciatis-ut-id-doloremque-sit-recusandae-velit', 'Similique ea soluta impedit aut. Quo earum enim tenetur at voluptatem voluptas.\n\nDebitis animi est consectetur modi at ipsum. Iusto ipsam quia unde. Non ratione velit saepe cupiditate officiis earum. Quasi ullam quam ducimus voluptas quia nihil.\n\nSequi doloremque enim vel veniam inventore nam. Qui doloribus dolorum tempore modi quam.\n\nLibero nostrum rem velit quod. Ea officiis quas occaecati beatae beatae natus est. Totam ullam et sint dolorem.\n\nEt incidunt autem tempore animi molestias ad aperiam nihil. Est ut et doloremque dolorum dolorem. Praesentium repellat numquam inventore excepturi et cumque officia.\n\nFacere provident quo itaque nisi sit distinctio. Eum odio velit sint voluptatem eos provident. Sapiente vel omnis natus consequatur.\n\nInventore quis facere quam nemo laborum iure odit. Nisi quia autem autem sed similique consequatur. Ipsum cupiditate necessitatibus autem saepe sint debitis qui.\n\nQuia ut esse vero necessitatibus. Necessitatibus distinctio ea odit voluptas illo debitis. Incidunt qui placeat est.\n\nEt omnis explicabo accusantium qui enim. Sint consectetur delectus quia cumque ipsum ex. Maxime excepturi ut ex accusantium corporis in est.\n\nMinus dolorem minus repudiandae aliquid assumenda. Eos sint ea ut itaque deleniti aut commodi placeat. Accusamus eum commodi vero ipsum accusantium placeat sequi. Corrupti ut neque id voluptatem nisi temporibus natus autem.', 176, NULL, NULL, '173, 174, 175, 176', 'https://www.youtube.com/watch?v=K1QICrgxTjA', 17, 18, 19, '6.00', '35.00', '188.00', NULL, '4.7', 'publish', '[{\"name\":\"Basic\",\"key\":\"basic\",\"desc\":\"Minima laudantium et et et sint ducimus.\",\"delivery_time\":3,\"revision\":3},{\"name\":\"Standard\",\"key\":\"standard\",\"desc\":\"Illo velit corporis temporibus amet ea et magni.\",\"delivery_time\":4,\"revision\":3},{\"name\":\"Premium\",\"key\":\"premium\",\"desc\":\"Consequatur quo quis in sunt eveniet id fuga.\",\"delivery_time\":6,\"revision\":3}]', '[{\"name\":\"Architecto consequatur asperiores qui dignissimos.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Accusantium modi omnis.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Qui iusto quam.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"}]', NULL, NULL, 3, NULL, NULL, 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(3, 'I will Quidem ipsam quia consequatur distinctio deserunt eum dolor.', 'i-will-quidem-ipsam-quia-consequatur-distinctio-deserunt-eum-dolor', 'Ut enim porro aut aperiam ab. Quibusdam quo tempora eligendi velit autem animi. Ex quae quisquam aut corrupti dolor nesciunt eum vel.\n\nExercitationem perferendis quasi quo sunt voluptas. Dolorem enim maiores debitis id similique. Qui quo ut veritatis voluptatem labore iste ab.\n\nMaxime quo numquam iste rerum voluptatem officiis quo quia. Nisi officiis voluptatem quis id.\n\nQuia aut ipsam explicabo voluptas sapiente. Amet ratione doloremque quos iusto quae quos soluta sit. Nostrum omnis modi ullam. Eos voluptatum quam esse dolores expedita et.\n\nVelit maxime qui provident autem fuga alias fuga. Qui officia voluptatem laudantium dolor sunt voluptatem. Iusto repudiandae enim nemo doloremque.\n\nDoloribus voluptate ex est commodi distinctio. Dolorem vel debitis voluptas harum consequatur et quas. Aliquid vero recusandae voluptatem error inventore earum.\n\nQuis consequuntur velit mollitia placeat qui vel tempora. Hic optio sit velit tenetur tenetur. Et non sapiente dolor tempora dolor optio optio. Adipisci voluptas molestiae eos adipisci. Eos non minus ab voluptate.\n\nCum dolores minima nesciunt fugiat et inventore aut. Distinctio fugit quaerat reprehenderit aperiam. Qui dolor sit pariatur quis sint eos. Dolores aspernatur repudiandae minima corrupti inventore dignissimos.\n\nEveniet exercitationem dicta maxime est non fuga debitis. Laudantium temporibus commodi aut. Voluptas autem cum omnis doloribus quae dolore vitae.\n\nSit est qui qui. Minima illo ipsum quis vitae. Qui dolorem nihil voluptatem vel eius voluptatum ut. Ut esse soluta qui necessitatibus et cum eum.', 174, NULL, NULL, '173, 174, 175, 176', 'https://www.youtube.com/watch?v=K1QICrgxTjA', 1, 2, 3, '7.00', '24.00', '270.00', NULL, '4.3', 'publish', '[{\"name\":\"Basic\",\"key\":\"basic\",\"desc\":\"Id aut beatae amet.\",\"delivery_time\":2,\"revision\":3},{\"name\":\"Standard\",\"key\":\"standard\",\"desc\":\"Libero similique quos ullam nostrum aut magni magni.\",\"delivery_time\":4,\"revision\":3},{\"name\":\"Premium\",\"key\":\"premium\",\"desc\":\"Quam modi aliquid ab illum.\",\"delivery_time\":6,\"revision\":3}]', '[{\"name\":\"Non consequuntur libero officia.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Assumenda quia perferendis veritatis.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Voluptatem voluptas fugit natus.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"}]', NULL, NULL, 2, NULL, NULL, 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(4, 'I will Eveniet veritatis reiciendis et sed est.', 'i-will-eveniet-veritatis-reiciendis-et-sed-est', 'Cumque laudantium sint sint fugiat ipsa. Quasi sunt ipsa eveniet et id similique deserunt corrupti. Non cumque et voluptatibus voluptates laborum non illum. Officiis incidunt odio illum harum.\n\nQuibusdam qui sequi corrupti quibusdam cum sint corporis. Sequi facere nisi inventore in pariatur. Quo accusamus eius sequi inventore incidunt.\n\nAut sint aut eum at dolorem voluptatibus. Et cupiditate perspiciatis commodi est reprehenderit distinctio. Distinctio aspernatur ullam consequatur voluptatem saepe dolores.\n\nQuo in quis eveniet accusamus reprehenderit. Ratione repellendus voluptas saepe ad. Nostrum illo numquam esse eligendi error debitis.\n\nIpsam accusamus aut dolores minus. Exercitationem tempore quia officia.\n\nQuibusdam neque ut soluta tempore nobis dolore. Aut ad ut et velit. Quasi non earum eius aut minus et dolor nihil.\n\nNeque dolorem consequatur dicta expedita aperiam. Laborum deserunt facilis et tempore. Itaque veniam non aut aspernatur ad alias. Accusantium laboriosam doloribus ut et. At nostrum eum ratione unde.\n\nConsequatur fuga reprehenderit cupiditate doloribus ut. Culpa atque quas voluptas iure quis error. Asperiores eius quas in eos ducimus illum omnis. Quod corporis minus accusamus in aperiam.\n\nMaiores animi necessitatibus amet officiis. Est accusantium veniam architecto dicta. Explicabo facilis molestias aut est enim asperiores eius.\n\nSit sit ea velit nisi in. Ut et voluptas omnis omnis et natus. Officiis est saepe molestiae earum. Eius necessitatibus omnis unde reiciendis. Corrupti et est odit tempora dolor libero.', 173, NULL, NULL, '173, 174, 175, 176', 'https://www.youtube.com/watch?v=K1QICrgxTjA', 17, 18, 19, '6.00', '48.00', '114.00', NULL, '4.7', 'publish', '[{\"name\":\"Basic\",\"key\":\"basic\",\"desc\":\"Vitae praesentium illo tenetur voluptate aut quaerat.\",\"delivery_time\":2,\"revision\":3},{\"name\":\"Standard\",\"key\":\"standard\",\"desc\":\"Iure necessitatibus ea ullam quia doloremque tenetur.\",\"delivery_time\":4,\"revision\":3},{\"name\":\"Premium\",\"key\":\"premium\",\"desc\":\"Eos nulla molestiae aut et quia.\",\"delivery_time\":6,\"revision\":3}]', '[{\"name\":\"Reprehenderit aut delectus.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Enim est repudiandae earum hic.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Sint quis ut.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"}]', NULL, NULL, 2, NULL, NULL, 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(5, 'I will Et enim perspiciatis doloribus eaque quas.', 'i-will-et-enim-perspiciatis-doloribus-eaque-quas', 'Illum consequuntur rem omnis aliquam similique quis asperiores. Expedita et reiciendis quia placeat. Nemo cumque odit voluptatem eius incidunt possimus quas. Ut accusamus fugiat maiores aperiam aliquam rerum.\n\nSit nobis expedita qui consequatur ullam aut incidunt. Aut ut atque et incidunt corrupti optio quibusdam. Optio ut expedita veritatis nemo aliquam.\n\nConsequuntur magnam impedit aspernatur quibusdam quod. Praesentium tempora ipsa et quia sunt culpa. Et cupiditate et omnis quia voluptate.\n\nAccusantium iusto perferendis autem voluptas sed ut dolorem. Laborum rerum ut laudantium natus nulla et enim. Voluptates fugit placeat omnis minima ea aperiam.\n\nQuis aut voluptatem totam aspernatur impedit ea. Voluptatem vel deleniti voluptatem animi quod aspernatur rerum. Nobis doloremque eius vitae et ut sit. Consequatur fugit quae quae culpa quos.\n\nQuia non cupiditate odit dolorum maxime eos. Aliquam minima consequatur quas. Quia cum vel facilis cum consequatur pariatur incidunt nesciunt. Aliquid eum maiores et quis quo.\n\nOfficia fugit quo culpa recusandae. Vel et omnis fugit nemo. Ipsum amet libero eos aspernatur facilis.\n\nConsequuntur sit explicabo voluptatem et temporibus non odio. Voluptas sunt corporis iste error saepe. Vitae eum iusto sit quia aut enim sequi. Corporis eos qui quas voluptatem sunt incidunt qui sed.\n\nEt cupiditate quia et asperiores aut ad culpa. Voluptatem quia accusantium ut sed minima aliquam maxime. Ratione minus repudiandae quas doloribus. Odio tenetur nostrum voluptatibus molestiae nihil quis.\n\nUt id ducimus itaque eum rerum. Molestiae sequi recusandae consectetur officia ad et id.', 173, NULL, NULL, '173, 174, 175, 176', 'https://www.youtube.com/watch?v=K1QICrgxTjA', 17, 18, 19, '7.00', '20.00', '176.00', NULL, '5.0', 'publish', '[{\"name\":\"Basic\",\"key\":\"basic\",\"desc\":\"Et dignissimos deleniti autem quas voluptas.\",\"delivery_time\":3,\"revision\":3},{\"name\":\"Standard\",\"key\":\"standard\",\"desc\":\"Deserunt et saepe saepe sunt et.\",\"delivery_time\":4,\"revision\":3},{\"name\":\"Premium\",\"key\":\"premium\",\"desc\":\"Rerum rerum nemo quas ea.\",\"delivery_time\":6,\"revision\":3}]', '[{\"name\":\"Modi qui doloribus autem.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Officiis eos veritatis.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Veniam dolores dignissimos quos.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"}]', NULL, NULL, 3, NULL, NULL, 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(6, 'I will Rerum nobis itaque aut laboriosam distinctio provident.', 'i-will-rerum-nobis-itaque-aut-laboriosam-distinctio-provident', 'Fuga sequi id aliquid iste. Eligendi perferendis ut quasi in. Harum exercitationem est eaque.\n\nEos ipsa dicta minus qui natus aliquid in. Facilis quidem natus maiores. Vel saepe earum nihil velit harum.\n\nNisi ullam ut id in asperiores. Porro at et tenetur sit odit nam. Eaque soluta iste veritatis enim quaerat.\n\nPossimus qui dolor illum voluptatibus quia quis iusto. Repellat autem sit voluptate. Dolorum vel in nulla quis rem assumenda quod doloremque.\n\nAspernatur excepturi totam facere quos et. Earum pariatur unde molestiae dicta. Ut a soluta accusantium nisi architecto ut aut.\n\nSuscipit tenetur iure ducimus odit. Minus sit optio non. Ut voluptates soluta dolorem vitae. Illum nesciunt fuga porro.\n\nNisi aut qui ipsam ut eum consectetur. Laboriosam qui id inventore. Sunt non corporis eos sint et similique. Molestiae explicabo asperiores mollitia est praesentium voluptate quis.\n\nIllo nihil deserunt sit eveniet. Voluptatem ad ut vero quibusdam accusantium eius beatae ad. Possimus perferendis odit reprehenderit dignissimos qui et a provident. Ipsa quidem qui id voluptatem et magni corrupti.\n\nPerferendis cum quo debitis eius a animi quod. Minus sed blanditiis maiores culpa est voluptatem. Expedita ut ad ut est consequatur. In eos aut nostrum quae.\n\nDolor omnis nisi blanditiis unde iste ea. Temporibus minus officiis omnis quos animi magnam. Dolores itaque perspiciatis nostrum dolorum in optio minus. Provident velit exercitationem ut vero.', 173, NULL, NULL, '173, 174, 175, 176', 'https://www.youtube.com/watch?v=K1QICrgxTjA', 17, 18, 19, '9.00', '24.00', '210.00', NULL, '4.3', 'publish', '[{\"name\":\"Basic\",\"key\":\"basic\",\"desc\":\"Sint minima tempore in quibusdam vel quo ratione.\",\"delivery_time\":1,\"revision\":3},{\"name\":\"Standard\",\"key\":\"standard\",\"desc\":\"Voluptatem velit necessitatibus fugiat est quaerat consequuntur.\",\"delivery_time\":4,\"revision\":3},{\"name\":\"Premium\",\"key\":\"premium\",\"desc\":\"Laudantium voluptatem officiis deleniti rerum eum eum.\",\"delivery_time\":6,\"revision\":3}]', '[{\"name\":\"Cum aut in et.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Reprehenderit consequatur qui.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Deleniti quo.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"}]', NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(7, 'I will Est autem a non minus odio dolor est.', 'i-will-est-autem-a-non-minus-odio-dolor-est', 'Consequatur et quod sit fugit eaque nulla vel. Nostrum aut ut aliquam eveniet aliquid atque. Dignissimos quia quia quia consequatur.\n\nEt ab commodi sit aut perferendis impedit voluptas. Ex porro id est est velit aspernatur et eos.\n\nExpedita consequatur ullam voluptatem perspiciatis sit ex. Dolor rerum delectus aspernatur quia libero. Sequi dignissimos vero sit aut.\n\nAccusantium sit sed atque repellendus saepe. Quis aut rerum quia. Eum qui veritatis molestias. Animi dolores et repellat est aut eaque dolor.\n\nFacilis explicabo vel veniam at temporibus. Corrupti vero nulla est dolorem quibusdam nihil. Voluptas autem reiciendis aut qui distinctio nulla placeat eum.\n\nVoluptas odio voluptates maiores est quis dolor. Cumque recusandae qui dolores autem. Blanditiis delectus velit vel eligendi praesentium. Voluptatem et neque qui possimus amet nemo aliquid.\n\nHarum perspiciatis temporibus labore quae voluptates aut. Quam commodi incidunt blanditiis quia maxime nemo. Harum incidunt maiores dignissimos doloremque sed. In optio laborum aut molestiae illo.\n\nId qui veniam qui quidem. Qui facilis delectus eligendi sint. Accusamus vel unde porro et ratione.\n\nIusto aut suscipit fugiat et. Quo libero aliquam at commodi. Occaecati sunt tempore pariatur harum quis dolorem. Accusamus adipisci quod id voluptas.\n\nQuibusdam commodi at minima mollitia. Autem alias saepe dicta quia nemo consequatur aut consequatur. Minima voluptatum commodi quidem repudiandae et voluptates et.', 173, NULL, NULL, '173, 174, 175, 176', 'https://www.youtube.com/watch?v=K1QICrgxTjA', 33, 34, 35, '10.00', '25.00', '277.00', NULL, '5.0', 'publish', '[{\"name\":\"Basic\",\"key\":\"basic\",\"desc\":\"Cum aut autem vitae eos iure voluptatibus.\",\"delivery_time\":2,\"revision\":3},{\"name\":\"Standard\",\"key\":\"standard\",\"desc\":\"Et iure dolorem molestias at ab sed.\",\"delivery_time\":4,\"revision\":3},{\"name\":\"Premium\",\"key\":\"premium\",\"desc\":\"Maiores ab ducimus facilis ut.\",\"delivery_time\":6,\"revision\":3}]', '[{\"name\":\"Nam voluptatem aut repellendus.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Est possimus non.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Nulla quia molestiae enim.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"}]', NULL, NULL, 2, NULL, NULL, 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(8, 'I will Aut dolor reiciendis distinctio.', 'i-will-aut-dolor-reiciendis-distinctio', 'Ea exercitationem totam explicabo quia quia tempore est. Quis est fugit fugit ut est. Et maiores expedita velit voluptates aperiam.\n\nEt saepe non in voluptas quod. Qui quia qui distinctio. Aut rerum dolores repellat enim non vero eum. Sint velit numquam sint sint.\n\nHarum ducimus porro quisquam vitae. In blanditiis provident accusantium. Dignissimos deleniti excepturi necessitatibus non voluptate corrupti dolore.\n\nCulpa blanditiis inventore qui enim dolores ea. Voluptate dolor consequatur velit necessitatibus delectus vel omnis.\n\nAnimi sint magni perferendis id sapiente impedit in. Voluptatem neque eaque rerum velit non. Corporis dolores doloremque veniam natus fugit nihil cumque vitae.\n\nCorporis molestias sunt reiciendis quisquam mollitia consequuntur est. Ad error exercitationem tempora doloremque debitis fugiat.\n\nEt laboriosam et earum provident quibusdam voluptas voluptatem. Praesentium aut sed quod modi quia omnis maiores officia. Illo tenetur minus aut consequuntur quidem.\n\nCorporis laboriosam officia et quos voluptas. Consequatur temporibus occaecati corrupti et aut. Soluta qui nostrum temporibus recusandae neque. Corporis dolores recusandae aliquid modi voluptatem eum vel.\n\nMaiores aut fuga a ut. Sit possimus quam similique pariatur blanditiis. Accusamus cumque repellendus sequi qui necessitatibus. Ipsum fugiat laborum eos maiores laudantium consequatur. Ratione vero alias animi sit consectetur accusantium laboriosam.\n\nVoluptatibus fugit ea et accusamus consectetur corporis quia. Et qui mollitia vitae ipsum. Ut totam iusto consequatur qui excepturi id omnis. Nihil veritatis expedita eaque error dolor dolorem.', 175, NULL, NULL, '173, 174, 175, 176', 'https://www.youtube.com/watch?v=K1QICrgxTjA', 33, 34, 35, '8.00', '44.00', '208.00', NULL, '4.7', 'publish', '[{\"name\":\"Basic\",\"key\":\"basic\",\"desc\":\"Eos delectus et placeat ex blanditiis laudantium rerum quia.\",\"delivery_time\":1,\"revision\":3},{\"name\":\"Standard\",\"key\":\"standard\",\"desc\":\"Cumque id aliquam saepe architecto saepe.\",\"delivery_time\":4,\"revision\":3},{\"name\":\"Premium\",\"key\":\"premium\",\"desc\":\"Omnis omnis voluptate et qui neque omnis.\",\"delivery_time\":6,\"revision\":3}]', '[{\"name\":\"Voluptatibus quisquam.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Voluptate corporis recusandae.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Amet error expedita soluta.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"}]', NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:56'),
(9, 'I will Quod autem officiis quae.', 'i-will-quod-autem-officiis-quae', 'Nulla libero ut vero vel consequatur quidem. Nemo deserunt soluta deleniti id rerum quas. Sequi vero laudantium magni hic doloribus totam.\n\nInventore sunt voluptatem repellendus reprehenderit at. Ea fugit dicta omnis. Atque sed accusamus et quis quia tenetur sapiente ipsum. Voluptates quia sed non perferendis temporibus reprehenderit.\n\nEveniet ex voluptas aspernatur debitis voluptate. Distinctio est aspernatur est. Vitae et officia qui quia voluptatem maxime. Molestiae modi et neque suscipit suscipit.\n\nCum aliquid explicabo tempora rerum ex repellat. Suscipit nihil unde voluptas iusto voluptatem. Quia quo sapiente omnis. Consectetur dolores quos modi dolor et ea. Dignissimos labore cum exercitationem consectetur.\n\nEum et laborum placeat est dolorum exercitationem. Occaecati omnis sed molestias dolores quam iure. Non sequi numquam ad modi dolorem.\n\nOmnis nulla id asperiores sapiente facere quasi optio. Voluptatum ad iste blanditiis nulla et laborum. Recusandae ducimus ipsam placeat corporis eveniet tempore a.\n\nFugiat dolor mollitia nemo odio. Voluptas ut blanditiis sunt sint esse magnam sunt.\n\nSed est repellendus sit sint unde. Animi veniam temporibus deleniti consequuntur veritatis omnis dolores. Animi quis veritatis illo modi est.\n\nAut minus quia eum illo eaque. Nihil asperiores id delectus incidunt quia ut. Quas praesentium minima quibusdam. Ex consectetur et tempore consequatur reprehenderit asperiores cum.\n\nVoluptatem quam facilis occaecati velit. Autem sequi iusto qui fugit facere quia enim. Dolor velit eos fugiat quis.', 173, NULL, NULL, '173, 174, 175, 176', 'https://www.youtube.com/watch?v=K1QICrgxTjA', 33, 34, 35, '8.00', '37.00', '129.00', NULL, '4.3', 'publish', '[{\"name\":\"Basic\",\"key\":\"basic\",\"desc\":\"Ab exercitationem qui beatae hic doloremque sunt est.\",\"delivery_time\":3,\"revision\":3},{\"name\":\"Standard\",\"key\":\"standard\",\"desc\":\"Aliquam et id corporis quo dolorum odit exercitationem.\",\"delivery_time\":4,\"revision\":3},{\"name\":\"Premium\",\"key\":\"premium\",\"desc\":\"Earum iusto reprehenderit vitae nemo velit.\",\"delivery_time\":6,\"revision\":3}]', '[{\"name\":\"Officia rem voluptas enim.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Voluptatem fuga qui.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Est occaecati quaerat expedita.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"}]', NULL, NULL, 3, NULL, NULL, 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(10, 'I will Saepe nemo quisquam maxime distinctio.', 'i-will-saepe-nemo-quisquam-maxime-distinctio', 'Mollitia perspiciatis esse ut quis saepe. Tempore omnis quae ad et quo. Vel soluta ut assumenda aut nesciunt.\n\nEst illo similique voluptas et asperiores minima. Omnis asperiores quam et quia repellat est ad et. Est culpa distinctio accusamus cum non laboriosam laborum.\n\nQuibusdam provident maiores quos molestiae veritatis sapiente. Est ut incidunt corrupti dolorem harum molestiae. Rerum perspiciatis inventore eveniet sint non.\n\nIure laboriosam voluptas quibusdam sed rerum. Quia rerum sunt alias quis. Reprehenderit velit eos rerum. Voluptas nesciunt quia velit inventore ut. Odio nihil accusamus tempore explicabo velit.\n\nSoluta delectus est impedit eum odio est. Neque pariatur doloribus dolorem. Aut nam modi architecto enim ipsum aut quia eos. Dignissimos placeat eum quo sit dolor iste voluptatum.\n\nVel facilis ullam eligendi debitis. Hic iusto quo asperiores quidem alias. Libero aliquam consequatur ut.\n\nNumquam autem voluptatem veritatis ea. Sunt minus nam quis eveniet est omnis. Alias et et exercitationem qui voluptatem sed.\n\nDolorem deserunt expedita autem quam. Qui aliquid vel accusamus molestias sunt nihil sapiente cumque. Tempora adipisci sed et in quae qui explicabo. Sunt maxime et eveniet eos qui.\n\nAccusantium delectus sunt rerum aut delectus voluptatibus et. Hic fugiat laboriosam consectetur aut. Vitae non et est.\n\nNon minima eum et non qui. Quaerat id suscipit adipisci est corporis. Cumque eaque omnis est temporibus numquam dolor eaque. Officiis velit excepturi quo est.', 174, NULL, NULL, '173, 174, 175, 176', 'https://www.youtube.com/watch?v=K1QICrgxTjA', 1, 2, 3, '10.00', '26.00', '125.00', NULL, '4.7', 'publish', '[{\"name\":\"Basic\",\"key\":\"basic\",\"desc\":\"Blanditiis id aut beatae et quod sed et.\",\"delivery_time\":1,\"revision\":3},{\"name\":\"Standard\",\"key\":\"standard\",\"desc\":\"Dolor inventore rerum ipsum ad commodi.\",\"delivery_time\":4,\"revision\":3},{\"name\":\"Premium\",\"key\":\"premium\",\"desc\":\"Sint placeat maxime atque voluptas.\",\"delivery_time\":6,\"revision\":3}]', '[{\"name\":\"Accusantium dolor cum autem.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Optio vero qui.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Maxime corrupti totam accusantium.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"}]', NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(11, 'I will Nesciunt qui est deleniti ratione eum eligendi est laborum.', 'i-will-nesciunt-qui-est-deleniti-ratione-eum-eligendi-est-laborum', 'Voluptas aut autem necessitatibus. Natus et voluptatum ipsum doloremque aperiam.\n\nSaepe facilis provident error et. Dignissimos praesentium explicabo dolorem dolorem rem. Totam est placeat atque dicta incidunt qui accusamus. Aut laboriosam provident ut facilis hic numquam.\n\nEt voluptatem deleniti non et aut perferendis nulla. Magnam laboriosam consequuntur quam sit quia eius optio. Quasi voluptatem laborum dolor accusantium sequi saepe numquam. Voluptatum facilis ex corporis odio placeat.\n\nVoluptatibus neque consectetur accusantium quis. Enim quia dolorem et harum illum ipsum aut. Rerum sed quasi eaque amet recusandae temporibus. Enim eveniet cumque dolore. Dolor perferendis sequi rerum est dolorem.\n\nEst aliquid aperiam molestiae quo quia non. Est dolores saepe ab sint aut culpa. Dicta et aliquid sit quo voluptas maxime doloremque.\n\nDoloremque praesentium eum autem. Qui maxime recusandae aut deleniti odit.\n\nDeleniti nemo id reiciendis ea est laboriosam. Eius earum dolor voluptatem suscipit laudantium sint. Illo dolores voluptatem iure accusamus omnis officia.\n\nDoloribus ut dolore ratione et neque nihil. Natus asperiores neque quia est facere. Facere ipsa dolorem et dolorum voluptatem. Molestias voluptatem dignissimos tempore consequatur aperiam aliquid.\n\nVeniam voluptate repellendus quia. Autem doloremque pariatur quia corrupti unde accusamus.\n\nMolestias ut voluptatem doloribus et voluptate ut voluptatem. Ut ut ipsa quos neque voluptatem voluptates. Officiis velit doloremque impedit velit sequi hic. Aspernatur nesciunt veniam deleniti eius nulla qui dolores. Quos quis dolores sed sequi ullam minus porro.', 176, NULL, NULL, '173, 174, 175, 176', 'https://www.youtube.com/watch?v=K1QICrgxTjA', 17, 18, 19, '10.00', '43.00', '160.00', NULL, '4.3', 'publish', '[{\"name\":\"Basic\",\"key\":\"basic\",\"desc\":\"Qui temporibus aut quod dignissimos illum inventore earum.\",\"delivery_time\":2,\"revision\":3},{\"name\":\"Standard\",\"key\":\"standard\",\"desc\":\"Iste fugit impedit voluptatem iusto et dolores.\",\"delivery_time\":4,\"revision\":3},{\"name\":\"Premium\",\"key\":\"premium\",\"desc\":\"Sit et et illum eos sunt.\",\"delivery_time\":6,\"revision\":3}]', '[{\"name\":\"Non dolorem natus voluptates.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Voluptas incidunt unde.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Minus consequatur vel eum.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"}]', NULL, NULL, 2, NULL, NULL, 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(12, 'I will Tempore aut et molestias consectetur officia iure.', 'i-will-tempore-aut-et-molestias-consectetur-officia-iure', 'Accusamus et similique nostrum. Placeat vel est voluptatem possimus nihil. Maxime est fugiat voluptatem culpa impedit.\n\nEt reprehenderit ipsum reprehenderit earum tempora ratione. Sint deserunt fugit harum et. Et dignissimos deserunt voluptate dolorum ut sapiente. Tempora ipsa et esse expedita nihil occaecati.\n\nLaboriosam et quo ut sit ut velit vel. Perferendis voluptatem consequatur eum assumenda voluptatem ut. Dolores fuga omnis unde nobis quia temporibus velit molestiae. Sunt hic dolorem dolores at explicabo.\n\nLaboriosam quia rerum accusantium et odit in. Enim dolorem aut assumenda quis culpa placeat. Laudantium accusamus perspiciatis est eaque. Et quis itaque maiores suscipit.\n\nAliquid distinctio nam dolores nisi ex iusto sit dolorem. Repellendus voluptas iure est et. At repellat sunt a sapiente enim id necessitatibus rerum. Ut voluptatem est sed aut.\n\nUt dolores voluptate enim occaecati ut eum ipsam amet. Ex et animi quo deserunt debitis dolorem facere. Rerum nulla voluptatibus facilis recusandae. Pariatur natus quas perferendis nulla in maiores inventore nam.\n\nNecessitatibus qui ut quaerat porro. Explicabo aut voluptatem suscipit voluptas ut porro numquam. Et aut autem dolores saepe cum et sint.\n\nEsse eligendi est nam. Nihil voluptatem ex incidunt nobis ab. Impedit voluptatem omnis non molestiae praesentium alias.\n\nAtque reprehenderit reiciendis voluptatibus placeat ut. Necessitatibus sint ut ipsum. Exercitationem est sapiente ea sit vero harum culpa. Sint esse ut et nam voluptatem labore error.\n\nQuo dolor debitis nesciunt sequi consequatur beatae ut. Vitae et consectetur laboriosam facilis quidem dolores commodi. Et velit laborum voluptates provident enim. Quos rerum omnis omnis ut. Non laudantium porro ipsam modi.', 173, NULL, NULL, '173, 174, 175, 176', 'https://www.youtube.com/watch?v=K1QICrgxTjA', 33, 34, 35, '10.00', '21.00', '217.00', NULL, '4.3', 'publish', '[{\"name\":\"Basic\",\"key\":\"basic\",\"desc\":\"Perferendis reprehenderit laudantium dolores cumque sint.\",\"delivery_time\":1,\"revision\":3},{\"name\":\"Standard\",\"key\":\"standard\",\"desc\":\"Qui aut inventore aut assumenda vel.\",\"delivery_time\":4,\"revision\":3},{\"name\":\"Premium\",\"key\":\"premium\",\"desc\":\"Placeat nam et ullam quia explicabo.\",\"delivery_time\":6,\"revision\":3}]', '[{\"name\":\"Facere non.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Voluptas consequatur rem suscipit.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Repellendus et perferendis.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"}]', NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(13, 'I will Consequatur et laborum dicta dolores.', 'i-will-consequatur-et-laborum-dicta-dolores', 'Occaecati velit rerum nulla alias nisi. Incidunt ad sunt a sit excepturi quisquam. Saepe illum enim aliquam aliquid autem. Nulla cupiditate veritatis sunt illo sed consequatur dolorem.\n\nQuaerat ut repellendus neque similique iste molestiae. Hic eos quis illum et maxime.\n\nPorro expedita autem aut velit officia. Dignissimos est accusamus dolore distinctio porro. Non dolores totam tenetur ipsa.\n\nVoluptate et assumenda quis ad et est. Nulla quibusdam distinctio cupiditate quaerat similique assumenda eveniet nisi. Sint et dicta eos non voluptate rem.\n\nAut nihil ut ab hic. Est officiis est dolores nostrum quisquam est consequatur. Dolorem aut repellendus perspiciatis.\n\nVoluptas id aperiam quae reiciendis laboriosam enim aut. Iusto sed sapiente quis optio quo qui. Magnam ratione molestiae suscipit velit ut assumenda.\n\nNostrum aperiam earum doloribus placeat nobis dolores sunt. Eum quia dolorum debitis quia. Animi fugit doloremque ullam ipsam eaque.\n\nMollitia quia corporis unde. Non et dolores earum voluptatem unde et. Et et in suscipit distinctio quia magni. Corrupti dolore ipsa placeat nulla. Illo esse culpa fugit molestiae voluptatem est.\n\nSimilique et impedit rerum modi. Illo saepe omnis explicabo eum. Voluptatem illo aperiam quo enim animi id.\n\nAutem sit quia laborum. Quas asperiores itaque sunt perspiciatis. Sunt voluptas debitis aut fugiat officia magnam. Qui est nostrum sed quis. Earum molestiae necessitatibus et autem eaque.', 176, NULL, NULL, '173, 174, 175, 176', 'https://www.youtube.com/watch?v=K1QICrgxTjA', 33, 34, 35, '5.00', '38.00', '195.00', NULL, '4.7', 'publish', '[{\"name\":\"Basic\",\"key\":\"basic\",\"desc\":\"Doloribus sed dolores ipsam ea voluptas expedita autem tempora.\",\"delivery_time\":3,\"revision\":3},{\"name\":\"Standard\",\"key\":\"standard\",\"desc\":\"Aut iusto dolorem molestiae vero.\",\"delivery_time\":4,\"revision\":3},{\"name\":\"Premium\",\"key\":\"premium\",\"desc\":\"Qui amet quis laudantium nam eligendi.\",\"delivery_time\":6,\"revision\":3}]', '[{\"name\":\"Dolorum consequatur beatae.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Ipsa ullam placeat.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Omnis consequuntur voluptatem.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"}]', NULL, NULL, 3, NULL, NULL, 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(14, 'I will Dicta nam non mollitia.', 'i-will-dicta-nam-non-mollitia', 'Dolor sint facere placeat. Rerum sit repellat neque voluptas beatae ipsam et doloremque. Dolorem sint quia nostrum incidunt et.\n\nQuis beatae voluptatum debitis molestias nihil. Placeat qui ut eos et. Aliquid earum et dolorem dolor.\n\nEa quis pariatur nihil. Aut dolores molestias quia iusto sequi sequi quia. Tempore corporis reprehenderit qui et aut. Dolor aut asperiores eos.\n\nEt illum repudiandae laboriosam et dolor ex reiciendis. Minima est veniam est rem error. Voluptas illum laboriosam odio voluptatibus sed sed illo.\n\nOptio non ut autem qui rerum vero. Rerum quam voluptas quo. Laborum cum et autem harum repudiandae qui.\n\nCum qui perspiciatis beatae. Molestiae inventore delectus ipsam. Exercitationem temporibus iure quia voluptatem minus neque non.\n\nEos qui voluptas et officia. Dolorum enim delectus perspiciatis laboriosam sed alias delectus alias.\n\nEt est illum laudantium nihil. Aliquid mollitia fugit enim aliquam beatae.\n\nSunt asperiores modi aspernatur non ea. Doloremque repellat voluptas fugiat possimus ullam sit perferendis. Asperiores possimus dolor reprehenderit optio voluptates reprehenderit. Magni porro voluptatibus necessitatibus distinctio.\n\nHic nulla eius non nihil non et molestias. In fugit quam enim alias tempora sunt. Nihil vitae ab laborum qui officiis.', 175, NULL, NULL, '173, 174, 175, 176', 'https://www.youtube.com/watch?v=K1QICrgxTjA', 33, 34, 35, '7.00', '49.00', '213.00', NULL, '4.0', 'publish', '[{\"name\":\"Basic\",\"key\":\"basic\",\"desc\":\"Expedita animi aut voluptas iusto dolor.\",\"delivery_time\":2,\"revision\":3},{\"name\":\"Standard\",\"key\":\"standard\",\"desc\":\"Voluptate voluptatem suscipit minima et.\",\"delivery_time\":4,\"revision\":3},{\"name\":\"Premium\",\"key\":\"premium\",\"desc\":\"Omnis ducimus occaecati dicta vitae voluptatem modi omnis.\",\"delivery_time\":6,\"revision\":3}]', '[{\"name\":\"Vitae fugit possimus sapiente.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Cum adipisci.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Dolorem possimus at maxime.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"}]', NULL, NULL, 2, NULL, NULL, 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(15, 'I will Omnis odit quibusdam ab quis in et maxime.', 'i-will-omnis-odit-quibusdam-ab-quis-in-et-maxime', 'Recusandae veniam similique omnis dolores numquam est sit. Est exercitationem est amet sequi qui. Accusantium natus temporibus eum id omnis facilis sint.\n\nTotam porro fugiat qui cumque eius. Deserunt eos aliquid maxime maxime commodi.\n\nAmet minima ea nemo hic adipisci sed. Provident nihil dolores adipisci sapiente eveniet. Consequatur omnis sed excepturi et nam aspernatur.\n\nAd earum consectetur enim qui impedit deleniti vero. Molestias ut facilis aliquid voluptatem.\n\nReprehenderit adipisci in quis. Asperiores accusamus quo harum repudiandae ipsum dolores. Animi veniam culpa laborum dicta voluptatem quia dolorem numquam.\n\nMagnam possimus expedita ipsum. Non provident possimus vel non amet molestiae. Soluta culpa dolorem doloremque perferendis provident ab et.\n\nVeritatis accusamus quibusdam officia labore est. Voluptatum quis explicabo dolorem. Fugiat amet doloremque modi dolores quaerat. Voluptatem et dolor earum aspernatur est tempora fugiat.\n\nOptio adipisci eos possimus et voluptas autem. Non quam doloribus esse nulla. Et fugit voluptate dolorem aut cupiditate perferendis rerum esse. Maxime ut eos velit laborum qui. Maiores aut pariatur sit sequi.\n\nEt aut incidunt excepturi labore eaque natus repellat. Magnam quas ea labore rerum fugiat sequi autem at. Voluptate laboriosam officiis accusamus omnis velit. Quaerat eos quia enim assumenda minima.\n\nMagnam sed maxime quasi amet quas quia tempora nesciunt. Sed sunt aliquid rerum.', 176, NULL, NULL, '173, 174, 175, 176', 'https://www.youtube.com/watch?v=K1QICrgxTjA', 17, 18, 19, '7.00', '33.00', '185.00', NULL, '5.0', 'publish', '[{\"name\":\"Basic\",\"key\":\"basic\",\"desc\":\"Est ut ducimus eveniet consequatur enim.\",\"delivery_time\":3,\"revision\":3},{\"name\":\"Standard\",\"key\":\"standard\",\"desc\":\"Nihil debitis voluptas et animi nesciunt.\",\"delivery_time\":4,\"revision\":3},{\"name\":\"Premium\",\"key\":\"premium\",\"desc\":\"Et ut tenetur tempora et asperiores.\",\"delivery_time\":6,\"revision\":3}]', '[{\"name\":\"Et sint nesciunt.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Atque perspiciatis vel ipsam.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Impedit ducimus veniam exercitationem.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"}]', NULL, NULL, 3, NULL, NULL, 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:57'),
(16, 'I will Vitae ipsum tempore libero dolor dolorem.', 'i-will-vitae-ipsum-tempore-libero-dolor-dolorem', 'Magni id enim sed quos. Aut tempore ut repudiandae aliquam odio beatae dolor. Quaerat ex sit vel non maiores id consequatur.\n\nConsequatur quisquam voluptates voluptas ut architecto. Itaque in ratione aliquam numquam veniam et suscipit. Et in error minus perspiciatis quia minus libero.\n\nNemo eaque est et distinctio ipsum. Excepturi voluptatem dignissimos quis perspiciatis labore. Quos rerum porro sed in. Quia voluptatem placeat magni sit modi. Illo vel qui temporibus non quibusdam.\n\nAut et et dignissimos consequatur facere placeat. Quia in et dignissimos aut beatae et et. Dignissimos voluptas assumenda at.\n\nDoloremque at aut aperiam dolore libero nesciunt nihil. Quasi aut sunt rerum esse quis. Dolorum quae nostrum voluptatem totam ratione.\n\nSit qui et maiores dolorum dolores. Rem atque voluptatem ipsum. Soluta recusandae enim voluptas temporibus repellat. Qui magnam aut necessitatibus nesciunt natus dolore.\n\nFacere qui fugiat facilis eius qui quisquam placeat. Occaecati cupiditate repellendus quibusdam. Sit occaecati deleniti sint officiis et. Et ut qui nam perferendis laborum quaerat iure consequatur.\n\nUllam ipsa sunt quia quidem aut quod reprehenderit. Ut nobis voluptates nobis voluptatem. Tempore occaecati porro inventore incidunt nihil quis unde.\n\nVoluptatum ducimus excepturi rerum ducimus recusandae soluta totam et. Quidem expedita sed at corporis maxime hic. Amet sed voluptatem accusamus quo nobis. Qui molestias praesentium odit omnis sit rerum incidunt.\n\nDoloribus ut et et aut voluptatem nihil. Fuga architecto consequatur id illo. Sit a in voluptas porro id. Ratione aut consequatur recusandae et et voluptas ex.', 174, NULL, NULL, '173, 174, 175, 176', 'https://www.youtube.com/watch?v=K1QICrgxTjA', 17, 18, 19, '9.00', '40.00', '156.00', NULL, '4.3', 'publish', '[{\"name\":\"Basic\",\"key\":\"basic\",\"desc\":\"Sit sunt ratione id non.\",\"delivery_time\":1,\"revision\":3},{\"name\":\"Standard\",\"key\":\"standard\",\"desc\":\"Excepturi similique doloremque deserunt.\",\"delivery_time\":4,\"revision\":3},{\"name\":\"Premium\",\"key\":\"premium\",\"desc\":\"Ut a illum eveniet et facere.\",\"delivery_time\":6,\"revision\":3}]', '[{\"name\":\"Est eius nostrum et.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Aspernatur est optio quibusdam.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Est pariatur et ad.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"}]', NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(17, 'I will Sunt qui non ad doloribus voluptatem.', 'i-will-sunt-qui-non-ad-doloribus-voluptatem', 'Voluptas est sed possimus amet. Odio natus aut quis voluptatem et cum. Ullam eligendi natus adipisci explicabo sequi illum numquam. Nesciunt ut atque voluptatem.\n\nNumquam est voluptas cupiditate sit rem voluptates. Aut et non natus aut id itaque nostrum. Quos quo quia itaque est omnis voluptatum et. Dolores sed aut esse nam.\n\nRatione culpa ut assumenda ut nemo natus. Repellendus sit iusto totam officia. Vel voluptas voluptatem ea harum. Voluptate est quae maiores aut ut. Suscipit aspernatur reprehenderit quisquam velit.\n\nRepellendus alias aliquid sit totam molestiae quia dolores. Soluta beatae et ipsam non aut qui ipsa quae. Provident ipsam omnis expedita distinctio.\n\nConsectetur aut similique minus. Et quae aut nostrum sit quia omnis. Tempora nostrum aperiam molestiae vero vitae.\n\nNam et eos voluptatem sit. Saepe autem quia qui eius expedita earum. Accusamus sed a a ipsam exercitationem eligendi molestiae. Aut dolor expedita adipisci porro.\n\nQui commodi corrupti culpa porro praesentium. Et veritatis autem et nulla et quas. Corrupti eos et vitae sed sed. Aliquid aspernatur ipsum dolores et quas dignissimos tempora.\n\nQuo vitae vel accusamus tempora natus laborum aut id. Unde voluptatem nihil fuga non omnis sed qui nobis. Id dolor sit dignissimos recusandae.\n\nFacilis id eveniet voluptate minus distinctio tempora. Distinctio corrupti dolores odit quae earum. Voluptas et magnam sunt.\n\nFugit magni et facilis placeat voluptate dicta. Provident dolorum qui neque error qui dolorem laudantium. Autem praesentium aut qui ut.', 174, NULL, NULL, '173, 174, 175, 176', 'https://www.youtube.com/watch?v=K1QICrgxTjA', 1, 2, 3, '10.00', '34.00', '283.00', NULL, '4.3', 'publish', '[{\"name\":\"Basic\",\"key\":\"basic\",\"desc\":\"Vero et magnam sapiente sint necessitatibus distinctio possimus quisquam.\",\"delivery_time\":1,\"revision\":3},{\"name\":\"Standard\",\"key\":\"standard\",\"desc\":\"Saepe voluptas delectus veritatis mollitia rerum.\",\"delivery_time\":4,\"revision\":3},{\"name\":\"Premium\",\"key\":\"premium\",\"desc\":\"Dolor sit qui ut.\",\"delivery_time\":6,\"revision\":3}]', '[{\"name\":\"Sunt ducimus est aut.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Odit iure laborum.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Explicabo ut alias repudiandae.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"}]', NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(18, 'I will Voluptatem assumenda illo fugit optio nihil nemo doloribus.', 'i-will-voluptatem-assumenda-illo-fugit-optio-nihil-nemo-doloribus', 'Non repellat fugit ut autem odio. Est qui enim iure quis qui omnis sunt similique. Laborum eos voluptates dolorem voluptatem repellendus. Laudantium earum eligendi odio atque repudiandae quam est ut.\n\nRem cumque nemo quo excepturi voluptatem consequatur. Ipsa doloremque qui impedit eum in. Qui reiciendis iste in. Magnam quas consequuntur beatae dolor.\n\nVoluptatem harum ut qui reprehenderit doloremque. Voluptatem sed tenetur consectetur sunt ab ut maxime nam. Provident sequi quidem reiciendis. Accusantium maiores non eos enim voluptatem voluptatem.\n\nExcepturi excepturi dolorum facere ut ut in. Exercitationem provident et laudantium. Iste rerum sit aspernatur non voluptatem ea. Soluta quibusdam voluptate possimus natus cumque quisquam necessitatibus.\n\nOdit earum laudantium voluptatem illo sint blanditiis deserunt qui. Facilis et et excepturi sed natus ab omnis. Pariatur voluptas eveniet numquam enim vel est praesentium.\n\nOdit et ex alias minima id in atque. Molestiae eos ipsa illo quo aut. Omnis et at sapiente qui natus fugiat aliquam.\n\nIllo vero et quibusdam perferendis voluptate ut. Ipsum assumenda sed ratione velit repudiandae nesciunt. Quam perspiciatis est qui ipsam excepturi non corporis. Qui tenetur eveniet libero rerum officia.\n\nAmet illo voluptas fugit sunt. Consequuntur qui esse quod qui aut. Et nam quae eum rerum nihil. Placeat nam voluptas in nemo fuga qui.\n\nEum ratione aliquid laborum dicta. Blanditiis nisi quos dolorem ipsam et. Praesentium quasi ducimus eveniet repellendus qui qui. Excepturi nihil aut voluptas perspiciatis.\n\nQuaerat qui ullam velit quaerat voluptas. Est animi ut et nostrum quia. Dicta labore autem voluptates.', 175, NULL, NULL, '173, 174, 175, 176', 'https://www.youtube.com/watch?v=K1QICrgxTjA', 17, 18, 19, '9.00', '28.00', '142.00', NULL, '4.0', 'publish', '[{\"name\":\"Basic\",\"key\":\"basic\",\"desc\":\"Consequatur quo omnis tempore.\",\"delivery_time\":1,\"revision\":3},{\"name\":\"Standard\",\"key\":\"standard\",\"desc\":\"Pariatur dolores officiis veniam officia sapiente officia.\",\"delivery_time\":4,\"revision\":3},{\"name\":\"Premium\",\"key\":\"premium\",\"desc\":\"Exercitationem ut possimus aut quo et vero.\",\"delivery_time\":6,\"revision\":3}]', '[{\"name\":\"Tempore et rerum.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Unde aut est.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Et suscipit non consequatur.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"}]', NULL, NULL, 1, NULL, NULL, 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57');
INSERT INTO `bc_gigs` (`id`, `title`, `slug`, `content`, `image_id`, `banner_image_id`, `is_featured`, `gallery`, `video_url`, `cat_id`, `cat2_id`, `cat3_id`, `basic_price`, `standard_price`, `premium_price`, `extra_price`, `review_score`, `status`, `packages`, `package_compare`, `faqs`, `requirements`, `basic_delivery_time`, `create_user`, `update_user`, `author_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(19, 'I will Modi blanditiis dolorum unde ratione dolorem cum.', 'i-will-modi-blanditiis-dolorum-unde-ratione-dolorem-cum', 'Alias quasi et nostrum quia architecto. Voluptas et nisi architecto necessitatibus itaque est. Et assumenda tempore necessitatibus qui sint.\n\nOmnis numquam qui consequatur ipsam. Quia ut quae officiis aliquid molestias et inventore. Maxime debitis vero quis repellat repellendus. Adipisci ut quo quis minus quaerat.\n\nDolorem sed vero ratione corporis. Cupiditate porro corporis aut rerum. Eveniet temporibus et sit voluptate.\n\nMinima repellat reprehenderit hic numquam voluptas quisquam sint. Rerum fugiat voluptatem rem similique commodi et corrupti. Eaque ut accusantium saepe sed natus cupiditate aut architecto. Nostrum omnis inventore ut cum corporis ducimus.\n\nNon odio aut magnam velit cupiditate recusandae. Debitis porro aut nam ut. Neque atque fuga eligendi est minima provident vel.\n\nEligendi sit laborum perferendis at eligendi. Autem quas cupiditate totam accusantium. Rerum ducimus illum sed modi expedita impedit nobis.\n\nEst aut deleniti impedit ad cupiditate adipisci. Quibusdam itaque veritatis quia assumenda sit. Eum et quaerat officia maxime.\n\nVel harum quibusdam sed illum qui sequi. Aut ut hic a sed voluptatum quibusdam voluptatem. Porro error veniam perferendis reprehenderit dolores accusamus id natus.\n\nEst rerum et quaerat dolore beatae fuga vitae nulla. Similique voluptatem sunt tempora sint omnis eos. Sed culpa provident odio accusantium ab ut natus.\n\nAsperiores laudantium rerum et sapiente. Sed non delectus qui non nam. Culpa eaque commodi dolorum eaque et laborum. Eum consequatur consequatur et.', 175, NULL, NULL, '173, 174, 175, 176', 'https://www.youtube.com/watch?v=K1QICrgxTjA', 1, 2, 3, '7.00', '24.00', '205.00', NULL, '4.3', 'publish', '[{\"name\":\"Basic\",\"key\":\"basic\",\"desc\":\"Et eius maiores laboriosam ut incidunt et explicabo assumenda.\",\"delivery_time\":2,\"revision\":3},{\"name\":\"Standard\",\"key\":\"standard\",\"desc\":\"Eos debitis ut nisi eum aspernatur et.\",\"delivery_time\":4,\"revision\":3},{\"name\":\"Premium\",\"key\":\"premium\",\"desc\":\"Eveniet amet tempore voluptatem fugit.\",\"delivery_time\":6,\"revision\":3}]', '[{\"name\":\"Voluptate error.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Et illo qui praesentium.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Minima qui et quis.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"}]', NULL, NULL, 2, NULL, NULL, 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(20, 'I will Eius et facilis ipsam voluptatem quia.', 'i-will-eius-et-facilis-ipsam-voluptatem-quia', 'Suscipit et aliquam voluptas illum velit molestiae aliquid. Quidem inventore rem ut quia maiores aspernatur. Nesciunt et esse ut repellat similique doloribus quam. Recusandae voluptatem numquam voluptatem.\n\nSequi dignissimos aut labore harum. Aperiam aut quae earum qui. Qui delectus voluptates hic autem similique itaque vero ratione. Vitae pariatur nihil officiis qui voluptas aperiam illum. Minus voluptates eaque soluta quia molestiae eligendi.\n\nSaepe quidem praesentium deleniti ut. Non dolorum reiciendis pariatur velit aliquid sunt non.\n\nNobis suscipit illum exercitationem nihil doloribus quis omnis. Aut eveniet et qui et. Quasi dolores sequi iure doloribus.\n\nEos odio est dolores assumenda dolores doloremque. Perferendis non molestias deleniti ut similique quisquam minima mollitia.\n\nAt eum nostrum et ducimus expedita rerum sed. Corrupti vel et aut asperiores et velit quia. Sint quibusdam odit doloremque quo corrupti. Autem ipsam omnis vero id vel.\n\nQui sed consequatur sit rerum illum est. Consectetur explicabo cum excepturi sequi. Atque facilis occaecati quas qui. Numquam sapiente sunt cum distinctio quasi doloremque.\n\nDolor non quia illum dicta reprehenderit. Fugit aut laborum inventore consectetur non. Quae et alias voluptates tempora autem porro. Ipsam aut earum id assumenda. Animi et consectetur suscipit sit et maiores voluptatem mollitia.\n\nCumque ut dolorum nisi enim ducimus quis nemo ab. Iusto eos necessitatibus aut maiores cum. Tempore accusantium ut et quibusdam porro perferendis. Est officiis dolorum et ut enim sapiente nam.\n\nExplicabo aut aut accusamus labore quam et eligendi. Quia suscipit rerum nulla quod voluptatibus sapiente ut. Ea officiis nobis est. Delectus cupiditate quia porro animi ducimus eius.', 174, NULL, NULL, '173, 174, 175, 176', 'https://www.youtube.com/watch?v=K1QICrgxTjA', 1, 2, 3, '8.00', '29.00', '105.00', NULL, '4.7', 'publish', '[{\"name\":\"Basic\",\"key\":\"basic\",\"desc\":\"Asperiores voluptate non incidunt consectetur beatae perferendis voluptas.\",\"delivery_time\":3,\"revision\":3},{\"name\":\"Standard\",\"key\":\"standard\",\"desc\":\"Laboriosam numquam pariatur quas.\",\"delivery_time\":4,\"revision\":3},{\"name\":\"Premium\",\"key\":\"premium\",\"desc\":\"Vero esse facere atque sunt odit.\",\"delivery_time\":6,\"revision\":3}]', '[{\"name\":\"Consectetur amet dicta.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Eligendi fuga voluptatum quis.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"},{\"name\":\"Quaerat et qui sit.\",\"content\":\"No\",\"content1\":\"Yes\",\"content2\":\"Yes\"}]', NULL, NULL, 3, NULL, NULL, 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57');

-- --------------------------------------------------------

--
-- Table structure for table `bc_gig_cat`
--

DROP TABLE IF EXISTS `bc_gig_cat`;
CREATE TABLE IF NOT EXISTS `bc_gig_cat` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_id` bigint DEFAULT NULL,
  `faqs` text COLLATE utf8mb4_unicode_ci,
  `news_cat_id` bigint DEFAULT NULL,
  `_lft` int UNSIGNED NOT NULL DEFAULT '0',
  `_rgt` int UNSIGNED NOT NULL DEFAULT '0',
  `parent_id` int UNSIGNED DEFAULT NULL,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bc_gig_cat_slug_unique` (`slug`),
  KEY `bc_gig_cat__lft__rgt_parent_id_index` (`_lft`,`_rgt`,`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bc_gig_cat`
--

INSERT INTO `bc_gig_cat` (`id`, `name`, `content`, `slug`, `status`, `image_id`, `faqs`, `news_cat_id`, `_lft`, `_rgt`, `parent_id`, `create_user`, `update_user`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Graphics & Design', 'Eaque tempora dolor optio vitae. Assumenda voluptatem quisquam aut rerum atque id libero. Inventore perspiciatis quis quo quia aut. Dignissimos ex expedita velit omnis et.', 'graphics-design', 'publish', 167, '[{\"title\":\"Suscipit et enim.\",\"content\":\"Cumque aut nam et. Consequatur molestiae delectus accusantium modi dolor. Quos expedita itaque rerum voluptatem harum. Dolor aut voluptates aut rerum alias. Voluptatibus placeat adipisci nulla commodi.\"},{\"title\":\"Inventore at.\",\"content\":\"Voluptatem quibusdam cumque eum voluptatem autem eligendi. Aliquid perspiciatis excepturi facere sunt. Nemo error cum placeat aliquam suscipit et. Et expedita culpa est et totam amet assumenda.\"},{\"title\":\"Architecto molestiae.\",\"content\":\"Sint qui esse voluptatem hic. Quae laborum eius provident eveniet consectetur.\"},{\"title\":\"Molestias ea.\",\"content\":\"Corrupti necessitatibus dolor odio delectus. Et impedit sapiente veritatis quidem. Molestiae omnis voluptas id consequatur. Ut eum ipsa rerum molestias et sit itaque.\"}]', 2, 1, 32, NULL, NULL, NULL, NULL, '2023-06-06 05:58:53', '2023-06-06 05:58:53'),
(2, 'Logo Design', 'Magni consectetur ullam a voluptatibus dolorem et. Molestiae repellat perferendis accusamus et quaerat est qui. Consequatur et quidem rerum quia error. Itaque sed iste sunt rerum nemo.', 'logo-design', 'publish', 168, NULL, NULL, 2, 11, 1, NULL, NULL, NULL, '2023-06-06 05:58:53', '2023-06-06 05:58:53'),
(3, 'Consectetur aliquid.', 'Nihil voluptate et placeat eos tempore et reiciendis nam. Reprehenderit unde et omnis sit fugit doloremque. Nam explicabo qui vel omnis.', 'consectetur-aliquid', 'publish', 170, NULL, NULL, 3, 4, 2, NULL, NULL, NULL, '2023-06-06 05:58:53', '2023-06-06 05:58:53'),
(4, 'Voluptatem et cumque in.', 'Id dolor aut pariatur molestiae excepturi est consequatur. Veniam reiciendis illum delectus. Nemo nostrum aut est dolore id placeat. Maxime sequi voluptas accusantium nisi. Odit quam facere dicta vero cupiditate.', 'voluptatem-et-cumque-in', 'publish', 169, NULL, NULL, 5, 6, 2, NULL, NULL, NULL, '2023-06-06 05:58:53', '2023-06-06 05:58:53'),
(5, 'Aut id.', 'Ducimus saepe rerum et ut. Quam expedita sit quia voluptatibus illum at. Qui alias numquam corporis consectetur et nemo quia.', 'aut-id', 'publish', 170, NULL, NULL, 7, 8, 2, NULL, NULL, NULL, '2023-06-06 05:58:53', '2023-06-06 05:58:53'),
(6, 'Corporis doloremque id placeat.', 'Aut quis beatae quis. Voluptas expedita animi aut temporibus. Odit inventore architecto fuga non veritatis nam eum. Id totam pariatur laborum velit nesciunt quisquam.', 'corporis-doloremque-id-placeat', 'publish', 168, NULL, NULL, 9, 10, 2, NULL, NULL, NULL, '2023-06-06 05:58:53', '2023-06-06 05:58:53'),
(7, 'Eum voluptatem velit voluptas quibusdam.', 'Expedita fugit qui error consequatur. Rerum fuga delectus dolor rerum. Debitis iure vel ratione et consequatur. Excepturi vitae nihil aliquid nulla.', 'eum-voluptatem-velit-voluptas-quibusdam', 'publish', 171, NULL, NULL, 12, 21, 1, NULL, NULL, NULL, '2023-06-06 05:58:53', '2023-06-06 05:58:53'),
(8, 'Consectetur aliquid.', 'Nihil voluptate et placeat eos tempore et reiciendis nam. Reprehenderit unde et omnis sit fugit doloremque. Nam explicabo qui vel omnis.', 'consectetur-aliquid-1', 'publish', 170, NULL, NULL, 13, 14, 7, NULL, NULL, NULL, '2023-06-06 05:58:53', '2023-06-06 05:58:53'),
(9, 'Voluptatem et cumque in.', 'Id dolor aut pariatur molestiae excepturi est consequatur. Veniam reiciendis illum delectus. Nemo nostrum aut est dolore id placeat. Maxime sequi voluptas accusantium nisi. Odit quam facere dicta vero cupiditate.', 'voluptatem-et-cumque-in-1', 'publish', 169, NULL, NULL, 15, 16, 7, NULL, NULL, NULL, '2023-06-06 05:58:53', '2023-06-06 05:58:53'),
(10, 'Aut id.', 'Ducimus saepe rerum et ut. Quam expedita sit quia voluptatibus illum at. Qui alias numquam corporis consectetur et nemo quia.', 'aut-id-1', 'publish', 170, NULL, NULL, 17, 18, 7, NULL, NULL, NULL, '2023-06-06 05:58:53', '2023-06-06 05:58:53'),
(11, 'Corporis doloremque id placeat.', 'Aut quis beatae quis. Voluptas expedita animi aut temporibus. Odit inventore architecto fuga non veritatis nam eum. Id totam pariatur laborum velit nesciunt quisquam.', 'corporis-doloremque-id-placeat-1', 'publish', 168, NULL, NULL, 19, 20, 7, NULL, NULL, NULL, '2023-06-06 05:58:53', '2023-06-06 05:58:53'),
(12, 'Non distinctio nulla.', 'Accusantium delectus cumque sunt sunt enim animi. Est voluptatibus similique consequuntur atque earum quo facilis.', 'non-distinctio-nulla', 'publish', 168, NULL, NULL, 22, 31, 1, NULL, NULL, NULL, '2023-06-06 05:58:53', '2023-06-06 05:58:53'),
(13, 'Consectetur aliquid.', 'Nihil voluptate et placeat eos tempore et reiciendis nam. Reprehenderit unde et omnis sit fugit doloremque. Nam explicabo qui vel omnis.', 'consectetur-aliquid-2', 'publish', 170, NULL, NULL, 23, 24, 12, NULL, NULL, NULL, '2023-06-06 05:58:53', '2023-06-06 05:58:53'),
(14, 'Voluptatem et cumque in.', 'Id dolor aut pariatur molestiae excepturi est consequatur. Veniam reiciendis illum delectus. Nemo nostrum aut est dolore id placeat. Maxime sequi voluptas accusantium nisi. Odit quam facere dicta vero cupiditate.', 'voluptatem-et-cumque-in-2', 'publish', 169, NULL, NULL, 25, 26, 12, NULL, NULL, NULL, '2023-06-06 05:58:53', '2023-06-06 05:58:53'),
(15, 'Aut id.', 'Ducimus saepe rerum et ut. Quam expedita sit quia voluptatibus illum at. Qui alias numquam corporis consectetur et nemo quia.', 'aut-id-2', 'publish', 170, NULL, NULL, 27, 28, 12, NULL, NULL, NULL, '2023-06-06 05:58:53', '2023-06-06 05:58:53'),
(16, 'Corporis doloremque id placeat.', 'Aut quis beatae quis. Voluptas expedita animi aut temporibus. Odit inventore architecto fuga non veritatis nam eum. Id totam pariatur laborum velit nesciunt quisquam.', 'corporis-doloremque-id-placeat-2', 'publish', 168, NULL, NULL, 29, 30, 12, NULL, NULL, NULL, '2023-06-06 05:58:53', '2023-06-06 05:58:53'),
(17, 'Digital Marketing', 'Voluptatem possimus aut tenetur eligendi. Debitis voluptatibus dolores et culpa voluptas earum vero. Et nostrum deleniti voluptas labore.', 'digital-marketing', 'publish', 167, '[{\"title\":\"Suscipit et enim.\",\"content\":\"Cumque aut nam et. Consequatur molestiae delectus accusantium modi dolor. Quos expedita itaque rerum voluptatem harum. Dolor aut voluptates aut rerum alias. Voluptatibus placeat adipisci nulla commodi.\"},{\"title\":\"Inventore at.\",\"content\":\"Voluptatem quibusdam cumque eum voluptatem autem eligendi. Aliquid perspiciatis excepturi facere sunt. Nemo error cum placeat aliquam suscipit et. Et expedita culpa est et totam amet assumenda.\"},{\"title\":\"Architecto molestiae.\",\"content\":\"Sint qui esse voluptatem hic. Quae laborum eius provident eveniet consectetur.\"},{\"title\":\"Molestias ea.\",\"content\":\"Corrupti necessitatibus dolor odio delectus. Et impedit sapiente veritatis quidem. Molestiae omnis voluptas id consequatur. Ut eum ipsa rerum molestias et sit itaque.\"}]', 7, 33, 64, NULL, NULL, NULL, NULL, '2023-06-06 05:58:53', '2023-06-06 05:58:53'),
(18, 'Logo Design', 'Magni consectetur ullam a voluptatibus dolorem et. Molestiae repellat perferendis accusamus et quaerat est qui. Consequatur et quidem rerum quia error. Itaque sed iste sunt rerum nemo.', 'logo-design-1', 'publish', 168, NULL, NULL, 34, 43, 17, NULL, NULL, NULL, '2023-06-06 05:58:53', '2023-06-06 05:58:53'),
(19, 'Consectetur aliquid.', 'Nihil voluptate et placeat eos tempore et reiciendis nam. Reprehenderit unde et omnis sit fugit doloremque. Nam explicabo qui vel omnis.', 'consectetur-aliquid-3', 'publish', 170, NULL, NULL, 35, 36, 18, NULL, NULL, NULL, '2023-06-06 05:58:53', '2023-06-06 05:58:53'),
(20, 'Voluptatem et cumque in.', 'Id dolor aut pariatur molestiae excepturi est consequatur. Veniam reiciendis illum delectus. Nemo nostrum aut est dolore id placeat. Maxime sequi voluptas accusantium nisi. Odit quam facere dicta vero cupiditate.', 'voluptatem-et-cumque-in-3', 'publish', 169, NULL, NULL, 37, 38, 18, NULL, NULL, NULL, '2023-06-06 05:58:53', '2023-06-06 05:58:53'),
(21, 'Aut id.', 'Ducimus saepe rerum et ut. Quam expedita sit quia voluptatibus illum at. Qui alias numquam corporis consectetur et nemo quia.', 'aut-id-3', 'publish', 170, NULL, NULL, 39, 40, 18, NULL, NULL, NULL, '2023-06-06 05:58:53', '2023-06-06 05:58:53'),
(22, 'Corporis doloremque id placeat.', 'Aut quis beatae quis. Voluptas expedita animi aut temporibus. Odit inventore architecto fuga non veritatis nam eum. Id totam pariatur laborum velit nesciunt quisquam.', 'corporis-doloremque-id-placeat-3', 'publish', 168, NULL, NULL, 41, 42, 18, NULL, NULL, NULL, '2023-06-06 05:58:53', '2023-06-06 05:58:53'),
(23, 'Eum voluptatem velit voluptas quibusdam.', 'Expedita fugit qui error consequatur. Rerum fuga delectus dolor rerum. Debitis iure vel ratione et consequatur. Excepturi vitae nihil aliquid nulla.', 'eum-voluptatem-velit-voluptas-quibusdam-1', 'publish', 171, NULL, NULL, 44, 53, 17, NULL, NULL, NULL, '2023-06-06 05:58:54', '2023-06-06 05:58:54'),
(24, 'Consectetur aliquid.', 'Nihil voluptate et placeat eos tempore et reiciendis nam. Reprehenderit unde et omnis sit fugit doloremque. Nam explicabo qui vel omnis.', 'consectetur-aliquid-4', 'publish', 170, NULL, NULL, 45, 46, 23, NULL, NULL, NULL, '2023-06-06 05:58:54', '2023-06-06 05:58:54'),
(25, 'Voluptatem et cumque in.', 'Id dolor aut pariatur molestiae excepturi est consequatur. Veniam reiciendis illum delectus. Nemo nostrum aut est dolore id placeat. Maxime sequi voluptas accusantium nisi. Odit quam facere dicta vero cupiditate.', 'voluptatem-et-cumque-in-4', 'publish', 169, NULL, NULL, 47, 48, 23, NULL, NULL, NULL, '2023-06-06 05:58:54', '2023-06-06 05:58:54'),
(26, 'Aut id.', 'Ducimus saepe rerum et ut. Quam expedita sit quia voluptatibus illum at. Qui alias numquam corporis consectetur et nemo quia.', 'aut-id-4', 'publish', 170, NULL, NULL, 49, 50, 23, NULL, NULL, NULL, '2023-06-06 05:58:54', '2023-06-06 05:58:54'),
(27, 'Corporis doloremque id placeat.', 'Aut quis beatae quis. Voluptas expedita animi aut temporibus. Odit inventore architecto fuga non veritatis nam eum. Id totam pariatur laborum velit nesciunt quisquam.', 'corporis-doloremque-id-placeat-4', 'publish', 168, NULL, NULL, 51, 52, 23, NULL, NULL, NULL, '2023-06-06 05:58:54', '2023-06-06 05:58:54'),
(28, 'Non distinctio nulla.', 'Accusantium delectus cumque sunt sunt enim animi. Est voluptatibus similique consequuntur atque earum quo facilis.', 'non-distinctio-nulla-1', 'publish', 168, NULL, NULL, 54, 63, 17, NULL, NULL, NULL, '2023-06-06 05:58:54', '2023-06-06 05:58:54'),
(29, 'Consectetur aliquid.', 'Nihil voluptate et placeat eos tempore et reiciendis nam. Reprehenderit unde et omnis sit fugit doloremque. Nam explicabo qui vel omnis.', 'consectetur-aliquid-5', 'publish', 170, NULL, NULL, 55, 56, 28, NULL, NULL, NULL, '2023-06-06 05:58:54', '2023-06-06 05:58:54'),
(30, 'Voluptatem et cumque in.', 'Id dolor aut pariatur molestiae excepturi est consequatur. Veniam reiciendis illum delectus. Nemo nostrum aut est dolore id placeat. Maxime sequi voluptas accusantium nisi. Odit quam facere dicta vero cupiditate.', 'voluptatem-et-cumque-in-5', 'publish', 169, NULL, NULL, 57, 58, 28, NULL, NULL, NULL, '2023-06-06 05:58:54', '2023-06-06 05:58:54'),
(31, 'Aut id.', 'Ducimus saepe rerum et ut. Quam expedita sit quia voluptatibus illum at. Qui alias numquam corporis consectetur et nemo quia.', 'aut-id-5', 'publish', 170, NULL, NULL, 59, 60, 28, NULL, NULL, NULL, '2023-06-06 05:58:54', '2023-06-06 05:58:54'),
(32, 'Corporis doloremque id placeat.', 'Aut quis beatae quis. Voluptas expedita animi aut temporibus. Odit inventore architecto fuga non veritatis nam eum. Id totam pariatur laborum velit nesciunt quisquam.', 'corporis-doloremque-id-placeat-5', 'publish', 168, NULL, NULL, 61, 62, 28, NULL, NULL, NULL, '2023-06-06 05:58:54', '2023-06-06 05:58:54'),
(33, 'Video & Animation', 'Non et sapiente neque aut voluptas et velit. Qui dolores et aut velit et error deserunt. Mollitia alias sequi et dicta. Aut ullam culpa tempore quia ipsam id.', 'video-animation', 'publish', 167, '[{\"title\":\"Suscipit et enim.\",\"content\":\"Cumque aut nam et. Consequatur molestiae delectus accusantium modi dolor. Quos expedita itaque rerum voluptatem harum. Dolor aut voluptates aut rerum alias. Voluptatibus placeat adipisci nulla commodi.\"},{\"title\":\"Inventore at.\",\"content\":\"Voluptatem quibusdam cumque eum voluptatem autem eligendi. Aliquid perspiciatis excepturi facere sunt. Nemo error cum placeat aliquam suscipit et. Et expedita culpa est et totam amet assumenda.\"},{\"title\":\"Architecto molestiae.\",\"content\":\"Sint qui esse voluptatem hic. Quae laborum eius provident eveniet consectetur.\"},{\"title\":\"Molestias ea.\",\"content\":\"Corrupti necessitatibus dolor odio delectus. Et impedit sapiente veritatis quidem. Molestiae omnis voluptas id consequatur. Ut eum ipsa rerum molestias et sit itaque.\"}]', 8, 65, 96, NULL, NULL, NULL, NULL, '2023-06-06 05:58:54', '2023-06-06 05:58:54'),
(34, 'Logo Design', 'Magni consectetur ullam a voluptatibus dolorem et. Molestiae repellat perferendis accusamus et quaerat est qui. Consequatur et quidem rerum quia error. Itaque sed iste sunt rerum nemo.', 'logo-design-2', 'publish', 168, NULL, NULL, 66, 75, 33, NULL, NULL, NULL, '2023-06-06 05:58:54', '2023-06-06 05:58:54'),
(35, 'Consectetur aliquid.', 'Nihil voluptate et placeat eos tempore et reiciendis nam. Reprehenderit unde et omnis sit fugit doloremque. Nam explicabo qui vel omnis.', 'consectetur-aliquid-6', 'publish', 170, NULL, NULL, 67, 68, 34, NULL, NULL, NULL, '2023-06-06 05:58:54', '2023-06-06 05:58:54'),
(36, 'Voluptatem et cumque in.', 'Id dolor aut pariatur molestiae excepturi est consequatur. Veniam reiciendis illum delectus. Nemo nostrum aut est dolore id placeat. Maxime sequi voluptas accusantium nisi. Odit quam facere dicta vero cupiditate.', 'voluptatem-et-cumque-in-6', 'publish', 169, NULL, NULL, 69, 70, 34, NULL, NULL, NULL, '2023-06-06 05:58:54', '2023-06-06 05:58:54'),
(37, 'Aut id.', 'Ducimus saepe rerum et ut. Quam expedita sit quia voluptatibus illum at. Qui alias numquam corporis consectetur et nemo quia.', 'aut-id-6', 'publish', 170, NULL, NULL, 71, 72, 34, NULL, NULL, NULL, '2023-06-06 05:58:54', '2023-06-06 05:58:54'),
(38, 'Corporis doloremque id placeat.', 'Aut quis beatae quis. Voluptas expedita animi aut temporibus. Odit inventore architecto fuga non veritatis nam eum. Id totam pariatur laborum velit nesciunt quisquam.', 'corporis-doloremque-id-placeat-6', 'publish', 168, NULL, NULL, 73, 74, 34, NULL, NULL, NULL, '2023-06-06 05:58:54', '2023-06-06 05:58:54'),
(39, 'Eum voluptatem velit voluptas quibusdam.', 'Expedita fugit qui error consequatur. Rerum fuga delectus dolor rerum. Debitis iure vel ratione et consequatur. Excepturi vitae nihil aliquid nulla.', 'eum-voluptatem-velit-voluptas-quibusdam-2', 'publish', 171, NULL, NULL, 76, 85, 33, NULL, NULL, NULL, '2023-06-06 05:58:54', '2023-06-06 05:58:54'),
(40, 'Consectetur aliquid.', 'Nihil voluptate et placeat eos tempore et reiciendis nam. Reprehenderit unde et omnis sit fugit doloremque. Nam explicabo qui vel omnis.', 'consectetur-aliquid-7', 'publish', 170, NULL, NULL, 77, 78, 39, NULL, NULL, NULL, '2023-06-06 05:58:54', '2023-06-06 05:58:54'),
(41, 'Voluptatem et cumque in.', 'Id dolor aut pariatur molestiae excepturi est consequatur. Veniam reiciendis illum delectus. Nemo nostrum aut est dolore id placeat. Maxime sequi voluptas accusantium nisi. Odit quam facere dicta vero cupiditate.', 'voluptatem-et-cumque-in-7', 'publish', 169, NULL, NULL, 79, 80, 39, NULL, NULL, NULL, '2023-06-06 05:58:54', '2023-06-06 05:58:54'),
(42, 'Aut id.', 'Ducimus saepe rerum et ut. Quam expedita sit quia voluptatibus illum at. Qui alias numquam corporis consectetur et nemo quia.', 'aut-id-7', 'publish', 170, NULL, NULL, 81, 82, 39, NULL, NULL, NULL, '2023-06-06 05:58:54', '2023-06-06 05:58:54'),
(43, 'Corporis doloremque id placeat.', 'Aut quis beatae quis. Voluptas expedita animi aut temporibus. Odit inventore architecto fuga non veritatis nam eum. Id totam pariatur laborum velit nesciunt quisquam.', 'corporis-doloremque-id-placeat-7', 'publish', 168, NULL, NULL, 83, 84, 39, NULL, NULL, NULL, '2023-06-06 05:58:54', '2023-06-06 05:58:54'),
(44, 'Non distinctio nulla.', 'Accusantium delectus cumque sunt sunt enim animi. Est voluptatibus similique consequuntur atque earum quo facilis.', 'non-distinctio-nulla-2', 'publish', 168, NULL, NULL, 86, 95, 33, NULL, NULL, NULL, '2023-06-06 05:58:54', '2023-06-06 05:58:54'),
(45, 'Consectetur aliquid.', 'Nihil voluptate et placeat eos tempore et reiciendis nam. Reprehenderit unde et omnis sit fugit doloremque. Nam explicabo qui vel omnis.', 'consectetur-aliquid-8', 'publish', 170, NULL, NULL, 87, 88, 44, NULL, NULL, NULL, '2023-06-06 05:58:54', '2023-06-06 05:58:54'),
(46, 'Voluptatem et cumque in.', 'Id dolor aut pariatur molestiae excepturi est consequatur. Veniam reiciendis illum delectus. Nemo nostrum aut est dolore id placeat. Maxime sequi voluptas accusantium nisi. Odit quam facere dicta vero cupiditate.', 'voluptatem-et-cumque-in-8', 'publish', 169, NULL, NULL, 89, 90, 44, NULL, NULL, NULL, '2023-06-06 05:58:54', '2023-06-06 05:58:54'),
(47, 'Aut id.', 'Ducimus saepe rerum et ut. Quam expedita sit quia voluptatibus illum at. Qui alias numquam corporis consectetur et nemo quia.', 'aut-id-8', 'publish', 170, NULL, NULL, 91, 92, 44, NULL, NULL, NULL, '2023-06-06 05:58:54', '2023-06-06 05:58:54'),
(48, 'Corporis doloremque id placeat.', 'Aut quis beatae quis. Voluptas expedita animi aut temporibus. Odit inventore architecto fuga non veritatis nam eum. Id totam pariatur laborum velit nesciunt quisquam.', 'corporis-doloremque-id-placeat-8', 'publish', 168, NULL, NULL, 93, 94, 44, NULL, NULL, NULL, '2023-06-06 05:58:54', '2023-06-06 05:58:54');

-- --------------------------------------------------------

--
-- Table structure for table `bc_gig_cat_trans`
--

DROP TABLE IF EXISTS `bc_gig_cat_trans`;
CREATE TABLE IF NOT EXISTS `bc_gig_cat_trans` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `origin_id` bigint DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `faqs` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bc_gig_cat_trans_origin_id_locale_unique` (`origin_id`,`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bc_gig_cat_types`
--

DROP TABLE IF EXISTS `bc_gig_cat_types`;
CREATE TABLE IF NOT EXISTS `bc_gig_cat_types` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_id` bigint DEFAULT NULL,
  `cat_id` bigint DEFAULT NULL,
  `cat_children` text COLLATE utf8mb4_unicode_ci,
  `_lft` int UNSIGNED NOT NULL DEFAULT '0',
  `_rgt` int UNSIGNED NOT NULL DEFAULT '0',
  `parent_id` int UNSIGNED DEFAULT NULL,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bc_gig_cat_types_slug_unique` (`slug`),
  KEY `bc_gig_cat_types__lft__rgt_parent_id_index` (`_lft`,`_rgt`,`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bc_gig_cat_types`
--

INSERT INTO `bc_gig_cat_types` (`id`, `name`, `content`, `slug`, `status`, `image_id`, `cat_id`, `cat_children`, `_lft`, `_rgt`, `parent_id`, `create_user`, `update_user`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Facilis inventore natus.', NULL, 'facilis-inventore-natus', 'publish', 173, 1, '[2,7]', 0, 0, NULL, NULL, NULL, NULL, '2023-06-06 05:58:53', '2023-06-06 05:58:53'),
(2, 'Ab reiciendis.', NULL, 'ab-reiciendis', 'publish', 176, 1, '[7,12]', 0, 0, NULL, NULL, NULL, NULL, '2023-06-06 05:58:53', '2023-06-06 05:58:53'),
(3, 'Fugiat sint.', NULL, 'fugiat-sint', 'publish', 173, 1, '[7,12]', 0, 0, NULL, NULL, NULL, NULL, '2023-06-06 05:58:53', '2023-06-06 05:58:53'),
(4, 'Maxime dolor corporis.', NULL, 'maxime-dolor-corporis', 'publish', 176, 17, '[18,23,28]', 0, 0, NULL, NULL, NULL, NULL, '2023-06-06 05:58:54', '2023-06-06 05:58:54'),
(5, 'Et maxime vitae.', NULL, 'et-maxime-vitae', 'publish', 173, 17, '[18,23]', 0, 0, NULL, NULL, NULL, NULL, '2023-06-06 05:58:54', '2023-06-06 05:58:54'),
(6, 'Aliquam voluptatem.', NULL, 'aliquam-voluptatem', 'publish', 175, 17, '[18,23,28]', 0, 0, NULL, NULL, NULL, NULL, '2023-06-06 05:58:54', '2023-06-06 05:58:54'),
(7, 'Voluptatibus necessitatibus.', NULL, 'voluptatibus-necessitatibus', 'publish', 175, 33, '[34,39,44]', 0, 0, NULL, NULL, NULL, NULL, '2023-06-06 05:58:54', '2023-06-06 05:58:54'),
(8, 'Laudantium facilis.', NULL, 'laudantium-facilis', 'publish', 173, 33, '[39,44]', 0, 0, NULL, NULL, NULL, NULL, '2023-06-06 05:58:54', '2023-06-06 05:58:54'),
(9, 'Quam velit.', NULL, 'quam-velit', 'publish', 173, 33, '[39,44]', 0, 0, NULL, NULL, NULL, NULL, '2023-06-06 05:58:54', '2023-06-06 05:58:54');

-- --------------------------------------------------------

--
-- Table structure for table `bc_gig_cat_type_trans`
--

DROP TABLE IF EXISTS `bc_gig_cat_type_trans`;
CREATE TABLE IF NOT EXISTS `bc_gig_cat_type_trans` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `origin_id` bigint DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bc_gig_cat_type_trans_origin_id_locale_unique` (`origin_id`,`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bc_gig_orders`
--

DROP TABLE IF EXISTS `bc_gig_orders`;
CREATE TABLE IF NOT EXISTS `bc_gig_orders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` bigint DEFAULT NULL,
  `order_item_id` bigint DEFAULT NULL,
  `gig_id` bigint DEFAULT NULL,
  `author_id` bigint DEFAULT NULL,
  `customer_id` bigint DEFAULT NULL,
  `revision` int DEFAULT NULL,
  `delivery_time` int DEFAULT NULL,
  `delivery_date` timestamp NULL DEFAULT NULL,
  `package` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `total` decimal(10,2) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `extra_prices` text COLLATE utf8mb4_unicode_ci,
  `requirements` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci,
  `start_date` timestamp NULL DEFAULT NULL,
  `last_delivered` timestamp NULL DEFAULT NULL,
  `is_on_time` tinyint DEFAULT '0',
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payout_id` bigint DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bc_gig_orders_gig_id_order_item_id_unique` (`gig_id`,`order_item_id`),
  KEY `bc_gig_orders_customer_id_index` (`customer_id`),
  KEY `bc_gig_orders_author_id_index` (`author_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bc_gig_order_activities`
--

DROP TABLE IF EXISTS `bc_gig_order_activities`;
CREATE TABLE IF NOT EXISTS `bc_gig_order_activities` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `gig_order_id` bigint DEFAULT NULL,
  `type` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint DEFAULT NULL,
  `file_ids` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bc_gig_order_activities_gig_order_id_index` (`gig_order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bc_gig_tags`
--

DROP TABLE IF EXISTS `bc_gig_tags`;
CREATE TABLE IF NOT EXISTS `bc_gig_tags` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tag_id` int DEFAULT NULL,
  `target_id` int DEFAULT NULL,
  `create_user` bigint DEFAULT NULL,
  `update_user` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bc_gig_term`
--

DROP TABLE IF EXISTS `bc_gig_term`;
CREATE TABLE IF NOT EXISTS `bc_gig_term` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `term_id` int DEFAULT NULL,
  `target_id` int DEFAULT NULL,
  `create_user` bigint DEFAULT NULL,
  `update_user` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bc_gig_translations`
--

DROP TABLE IF EXISTS `bc_gig_translations`;
CREATE TABLE IF NOT EXISTS `bc_gig_translations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `origin_id` int UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `packages` text COLLATE utf8mb4_unicode_ci,
  `package_compare` text COLLATE utf8mb4_unicode_ci,
  `faqs` text COLLATE utf8mb4_unicode_ci,
  `requirements` text COLLATE utf8mb4_unicode_ci,
  `create_user` bigint DEFAULT NULL,
  `update_user` bigint DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bc_gig_translations_locale_index` (`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bc_jobs`
--

DROP TABLE IF EXISTS `bc_jobs`;
CREATE TABLE IF NOT EXISTS `bc_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `category_id` bigint DEFAULT NULL,
  `thumbnail_id` bigint DEFAULT NULL,
  `location_id` bigint DEFAULT NULL,
  `company_id` bigint DEFAULT NULL,
  `job_type_id` bigint DEFAULT NULL,
  `expiration_date` datetime DEFAULT NULL,
  `hours` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hours_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary_min` decimal(15,2) DEFAULT NULL,
  `salary_max` decimal(15,2) DEFAULT NULL,
  `gender` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_lat` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_lng` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_zoom` int DEFAULT NULL,
  `experience` double(8,2) DEFAULT NULL,
  `is_featured` tinyint DEFAULT NULL,
  `is_urgent` tinyint DEFAULT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `apply_type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apply_link` text COLLATE utf8mb4_unicode_ci,
  `apply_email` text COLLATE utf8mb4_unicode_ci,
  `gallery` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` text COLLATE utf8mb4_unicode_ci,
  `video_cover_id` bigint DEFAULT NULL,
  `number_recruitments` int DEFAULT NULL,
  `is_approved` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT 'approved',
  `wage_agreement` tinyint DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bc_jobs_slug_index` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bc_jobs`
--

INSERT INTO `bc_jobs` (`id`, `title`, `slug`, `content`, `category_id`, `thumbnail_id`, `location_id`, `company_id`, `job_type_id`, `expiration_date`, `hours`, `hours_type`, `salary_type`, `salary_min`, `salary_max`, `gender`, `map_lat`, `map_lng`, `map_zoom`, `experience`, `is_featured`, `is_urgent`, `status`, `deleted_at`, `create_user`, `update_user`, `created_at`, `updated_at`, `apply_type`, `apply_link`, `apply_email`, `gallery`, `video`, `video_cover_id`, `number_recruitments`, `is_approved`, `wage_agreement`) VALUES
(1, 'Product Manager, Studio', 'product-manager-studio', '<h4>Job Description</h4>\r\n                            <p>As a Product Designer, you will work within a Product Delivery Team fused with UX, engineering, product and data talent. You will help the team design beautiful interfaces that solve business challenges for our clients. We work with a number of Tier 1 banks on building web-based applications for AML, KYC and Sanctions List management workflows. This role is ideal if you are looking to segue your career into the FinTech or Big Data arenas.</p>\r\n                            <h4>Key Responsibilities</h4>\r\n                            <ul class=\"list-style-three\">\r\n                                <li>Be involved in every step of the product design cycle from discovery to developer handoff and user acceptance testing.</li>\r\n                                <li>Work with BAs, product managers and tech teams to lead the Product Design</li>\r\n                                <li>Maintain quality of the design process and ensure that when designs are translated into code they accurately reflect the design specifications.</li>\r\n                                <li>Accurately estimate design tickets during planning sessions.</li>\r\n                                <li>Contribute to sketching sessions involving non-designersCreate, iterate and maintain UI deliverables including sketch files, style guides, high fidelity prototypes, micro interaction specifications and pattern libraries.</li>\r\n                                <li>Ensure design choices are data led by identifying assumptions to test each sprint, and work with the analysts in your team to plan moderated usability test sessions.</li>\r\n                                <li>Design pixel perfect responsive UI’s and understand that adopting common interface patterns is better for UX than reinventing the wheel</li>\r\n                                <li>Present your work to the wider business at Show &amp; Tell sessions.</li>\r\n                            </ul>\r\n                            <h4>Skill &amp; Experience</h4>\r\n                            <ul class=\"list-style-three\">\r\n                                <li>You have at least 3 years’ experience working as a Product Designer.</li>\r\n                                <li>You have experience using Sketch and InVision or Framer X</li>\r\n                                <li>You have some previous experience working in an agile environment – Think two-week sprints.</li>\r\n                                <li>You are familiar using Jira and Confluence in your workflow</li>\r\n                            </ul>', 8, 0, 5, 1, 2, '2024-10-18 11:28:51', '30h', 'week', 'monthly', '4500.00', '6000.00', 'Both', '34.801041', '-118.212774', 16, 2.00, 1, 0, 'publish', NULL, 1, NULL, '2023-06-06 05:58:51', NULL, NULL, NULL, NULL, '68,69,70,71', 'https://www.youtube.com/watch?v=bhOiLfkChPo', 23, NULL, 'approved', NULL),
(2, 'Recruiting Coordinator', 'recruiting-coordinator', '<h4>Job Description</h4>\r\n                            <p>As a Product Designer, you will work within a Product Delivery Team fused with UX, engineering, product and data talent. You will help the team design beautiful interfaces that solve business challenges for our clients. We work with a number of Tier 1 banks on building web-based applications for AML, KYC and Sanctions List management workflows. This role is ideal if you are looking to segue your career into the FinTech or Big Data arenas.</p>\r\n                            <h4>Key Responsibilities</h4>\r\n                            <ul class=\"list-style-three\">\r\n                                <li>Be involved in every step of the product design cycle from discovery to developer handoff and user acceptance testing.</li>\r\n                                <li>Work with BAs, product managers and tech teams to lead the Product Design</li>\r\n                                <li>Maintain quality of the design process and ensure that when designs are translated into code they accurately reflect the design specifications.</li>\r\n                                <li>Accurately estimate design tickets during planning sessions.</li>\r\n                                <li>Contribute to sketching sessions involving non-designersCreate, iterate and maintain UI deliverables including sketch files, style guides, high fidelity prototypes, micro interaction specifications and pattern libraries.</li>\r\n                                <li>Ensure design choices are data led by identifying assumptions to test each sprint, and work with the analysts in your team to plan moderated usability test sessions.</li>\r\n                                <li>Design pixel perfect responsive UI’s and understand that adopting common interface patterns is better for UX than reinventing the wheel</li>\r\n                                <li>Present your work to the wider business at Show &amp; Tell sessions.</li>\r\n                            </ul>\r\n                            <h4>Skill &amp; Experience</h4>\r\n                            <ul class=\"list-style-three\">\r\n                                <li>You have at least 3 years’ experience working as a Product Designer.</li>\r\n                                <li>You have experience using Sketch and InVision or Framer X</li>\r\n                                <li>You have some previous experience working in an agile environment – Think two-week sprints.</li>\r\n                                <li>You are familiar using Jira and Confluence in your workflow</li>\r\n                            </ul>', 5, 0, 5, 1, 5, '2024-10-18 11:28:51', '30h', 'week', 'monthly', '4500.00', '6000.00', 'Both', '34.214848', '-116.617009', 16, 2.00, 0, 1, 'publish', NULL, 1, NULL, '2023-06-06 05:58:51', NULL, NULL, NULL, NULL, '68,69,70,71', 'https://www.youtube.com/watch?v=bhOiLfkChPo', 23, NULL, 'approved', NULL),
(3, 'Senior Product Designer', 'senior-product-designer', '<h4>Job Description</h4>\r\n                            <p>As a Product Designer, you will work within a Product Delivery Team fused with UX, engineering, product and data talent. You will help the team design beautiful interfaces that solve business challenges for our clients. We work with a number of Tier 1 banks on building web-based applications for AML, KYC and Sanctions List management workflows. This role is ideal if you are looking to segue your career into the FinTech or Big Data arenas.</p>\r\n                            <h4>Key Responsibilities</h4>\r\n                            <ul class=\"list-style-three\">\r\n                                <li>Be involved in every step of the product design cycle from discovery to developer handoff and user acceptance testing.</li>\r\n                                <li>Work with BAs, product managers and tech teams to lead the Product Design</li>\r\n                                <li>Maintain quality of the design process and ensure that when designs are translated into code they accurately reflect the design specifications.</li>\r\n                                <li>Accurately estimate design tickets during planning sessions.</li>\r\n                                <li>Contribute to sketching sessions involving non-designersCreate, iterate and maintain UI deliverables including sketch files, style guides, high fidelity prototypes, micro interaction specifications and pattern libraries.</li>\r\n                                <li>Ensure design choices are data led by identifying assumptions to test each sprint, and work with the analysts in your team to plan moderated usability test sessions.</li>\r\n                                <li>Design pixel perfect responsive UI’s and understand that adopting common interface patterns is better for UX than reinventing the wheel</li>\r\n                                <li>Present your work to the wider business at Show &amp; Tell sessions.</li>\r\n                            </ul>\r\n                            <h4>Skill &amp; Experience</h4>\r\n                            <ul class=\"list-style-three\">\r\n                                <li>You have at least 3 years’ experience working as a Product Designer.</li>\r\n                                <li>You have experience using Sketch and InVision or Framer X</li>\r\n                                <li>You have some previous experience working in an agile environment – Think two-week sprints.</li>\r\n                                <li>You are familiar using Jira and Confluence in your workflow</li>\r\n                            </ul>', 3, 0, 1, 2, 3, '2024-10-18 11:28:51', '30h', 'week', 'monthly', '4500.00', '6000.00', 'Both', '34.02889471970446', '-118.27121649671741', 16, 2.00, 1, 1, 'publish', '2023-06-14 02:47:41', 1, NULL, '2023-06-06 05:58:51', '2023-06-14 02:47:41', NULL, NULL, NULL, '68,69,70,71', 'https://www.youtube.com/watch?v=bhOiLfkChPo', 23, NULL, 'approved', NULL),
(4, 'Senior Full Stack Engineer, Creator Success', 'senior-full-stack-engineer-creator-success', '<h4>Job Description</h4>\r\n                            <p>As a Product Designer, you will work within a Product Delivery Team fused with UX, engineering, product and data talent. You will help the team design beautiful interfaces that solve business challenges for our clients. We work with a number of Tier 1 banks on building web-based applications for AML, KYC and Sanctions List management workflows. This role is ideal if you are looking to segue your career into the FinTech or Big Data arenas.</p>\r\n                            <h4>Key Responsibilities</h4>\r\n                            <ul class=\"list-style-three\">\r\n                                <li>Be involved in every step of the product design cycle from discovery to developer handoff and user acceptance testing.</li>\r\n                                <li>Work with BAs, product managers and tech teams to lead the Product Design</li>\r\n                                <li>Maintain quality of the design process and ensure that when designs are translated into code they accurately reflect the design specifications.</li>\r\n                                <li>Accurately estimate design tickets during planning sessions.</li>\r\n                                <li>Contribute to sketching sessions involving non-designersCreate, iterate and maintain UI deliverables including sketch files, style guides, high fidelity prototypes, micro interaction specifications and pattern libraries.</li>\r\n                                <li>Ensure design choices are data led by identifying assumptions to test each sprint, and work with the analysts in your team to plan moderated usability test sessions.</li>\r\n                                <li>Design pixel perfect responsive UI’s and understand that adopting common interface patterns is better for UX than reinventing the wheel</li>\r\n                                <li>Present your work to the wider business at Show &amp; Tell sessions.</li>\r\n                            </ul>\r\n                            <h4>Skill &amp; Experience</h4>\r\n                            <ul class=\"list-style-three\">\r\n                                <li>You have at least 3 years’ experience working as a Product Designer.</li>\r\n                                <li>You have experience using Sketch and InVision or Framer X</li>\r\n                                <li>You have some previous experience working in an agile environment – Think two-week sprints.</li>\r\n                                <li>You are familiar using Jira and Confluence in your workflow</li>\r\n                            </ul>', 4, 0, 2, 3, 5, '2024-10-18 11:28:51', '30h', 'week', 'monthly', '4500.00', '6000.00', 'Both', '33.994170', '-118.473674', 16, 2.00, 1, 0, 'publish', '2023-06-14 02:47:41', 1, NULL, '2023-06-06 05:58:51', '2023-06-14 02:47:41', NULL, NULL, NULL, '68,69,70,71', 'https://www.youtube.com/watch?v=bhOiLfkChPo', 23, NULL, 'approved', NULL),
(5, 'General Ledger Accountant', 'general-ledger-accountant', '<h4>Job Description</h4>\r\n                            <p>As a Product Designer, you will work within a Product Delivery Team fused with UX, engineering, product and data talent. You will help the team design beautiful interfaces that solve business challenges for our clients. We work with a number of Tier 1 banks on building web-based applications for AML, KYC and Sanctions List management workflows. This role is ideal if you are looking to segue your career into the FinTech or Big Data arenas.</p>\r\n                            <h4>Key Responsibilities</h4>\r\n                            <ul class=\"list-style-three\">\r\n                                <li>Be involved in every step of the product design cycle from discovery to developer handoff and user acceptance testing.</li>\r\n                                <li>Work with BAs, product managers and tech teams to lead the Product Design</li>\r\n                                <li>Maintain quality of the design process and ensure that when designs are translated into code they accurately reflect the design specifications.</li>\r\n                                <li>Accurately estimate design tickets during planning sessions.</li>\r\n                                <li>Contribute to sketching sessions involving non-designersCreate, iterate and maintain UI deliverables including sketch files, style guides, high fidelity prototypes, micro interaction specifications and pattern libraries.</li>\r\n                                <li>Ensure design choices are data led by identifying assumptions to test each sprint, and work with the analysts in your team to plan moderated usability test sessions.</li>\r\n                                <li>Design pixel perfect responsive UI’s and understand that adopting common interface patterns is better for UX than reinventing the wheel</li>\r\n                                <li>Present your work to the wider business at Show &amp; Tell sessions.</li>\r\n                            </ul>\r\n                            <h4>Skill &amp; Experience</h4>\r\n                            <ul class=\"list-style-three\">\r\n                                <li>You have at least 3 years’ experience working as a Product Designer.</li>\r\n                                <li>You have experience using Sketch and InVision or Framer X</li>\r\n                                <li>You have some previous experience working in an agile environment – Think two-week sprints.</li>\r\n                                <li>You are familiar using Jira and Confluence in your workflow</li>\r\n                            </ul>', 1, 0, 5, 4, 3, '2024-10-18 11:28:51', '30h', 'week', 'monthly', '4500.00', '6000.00', 'Both', '33.726181', '-118.303386', 16, 2.00, 0, 0, 'publish', '2023-06-14 02:47:41', 1, NULL, '2023-06-06 05:58:51', '2023-06-14 02:47:41', NULL, NULL, NULL, '68,69,70,71', 'https://www.youtube.com/watch?v=bhOiLfkChPo', 23, NULL, 'approved', NULL),
(6, 'Assistant / Store Keeper', 'assistant-store-keeper', '<h4>Job Description</h4>\r\n                            <p>As a Product Designer, you will work within a Product Delivery Team fused with UX, engineering, product and data talent. You will help the team design beautiful interfaces that solve business challenges for our clients. We work with a number of Tier 1 banks on building web-based applications for AML, KYC and Sanctions List management workflows. This role is ideal if you are looking to segue your career into the FinTech or Big Data arenas.</p>\r\n                            <h4>Key Responsibilities</h4>\r\n                            <ul class=\"list-style-three\">\r\n                                <li>Be involved in every step of the product design cycle from discovery to developer handoff and user acceptance testing.</li>\r\n                                <li>Work with BAs, product managers and tech teams to lead the Product Design</li>\r\n                                <li>Maintain quality of the design process and ensure that when designs are translated into code they accurately reflect the design specifications.</li>\r\n                                <li>Accurately estimate design tickets during planning sessions.</li>\r\n                                <li>Contribute to sketching sessions involving non-designersCreate, iterate and maintain UI deliverables including sketch files, style guides, high fidelity prototypes, micro interaction specifications and pattern libraries.</li>\r\n                                <li>Ensure design choices are data led by identifying assumptions to test each sprint, and work with the analysts in your team to plan moderated usability test sessions.</li>\r\n                                <li>Design pixel perfect responsive UI’s and understand that adopting common interface patterns is better for UX than reinventing the wheel</li>\r\n                                <li>Present your work to the wider business at Show &amp; Tell sessions.</li>\r\n                            </ul>\r\n                            <h4>Skill &amp; Experience</h4>\r\n                            <ul class=\"list-style-three\">\r\n                                <li>You have at least 3 years’ experience working as a Product Designer.</li>\r\n                                <li>You have experience using Sketch and InVision or Framer X</li>\r\n                                <li>You have some previous experience working in an agile environment – Think two-week sprints.</li>\r\n                                <li>You are familiar using Jira and Confluence in your workflow</li>\r\n                            </ul>', 9, 0, 4, 1, 1, '2024-10-18 11:28:51', '30h', 'week', 'monthly', '4500.00', '6000.00', 'Both', '33.710268', '-117.823488', 16, 2.00, 1, 0, 'publish', NULL, 1, NULL, '2023-06-06 05:58:51', NULL, NULL, NULL, NULL, '68,69,70,71', 'https://www.youtube.com/watch?v=bhOiLfkChPo', 23, NULL, 'approved', NULL),
(7, 'Product Sales Specialist', 'product-sales-specialist', '<h4>Job Description</h4>\r\n                            <p>As a Product Designer, you will work within a Product Delivery Team fused with UX, engineering, product and data talent. You will help the team design beautiful interfaces that solve business challenges for our clients. We work with a number of Tier 1 banks on building web-based applications for AML, KYC and Sanctions List management workflows. This role is ideal if you are looking to segue your career into the FinTech or Big Data arenas.</p>\r\n                            <h4>Key Responsibilities</h4>\r\n                            <ul class=\"list-style-three\">\r\n                                <li>Be involved in every step of the product design cycle from discovery to developer handoff and user acceptance testing.</li>\r\n                                <li>Work with BAs, product managers and tech teams to lead the Product Design</li>\r\n                                <li>Maintain quality of the design process and ensure that when designs are translated into code they accurately reflect the design specifications.</li>\r\n                                <li>Accurately estimate design tickets during planning sessions.</li>\r\n                                <li>Contribute to sketching sessions involving non-designersCreate, iterate and maintain UI deliverables including sketch files, style guides, high fidelity prototypes, micro interaction specifications and pattern libraries.</li>\r\n                                <li>Ensure design choices are data led by identifying assumptions to test each sprint, and work with the analysts in your team to plan moderated usability test sessions.</li>\r\n                                <li>Design pixel perfect responsive UI’s and understand that adopting common interface patterns is better for UX than reinventing the wheel</li>\r\n                                <li>Present your work to the wider business at Show &amp; Tell sessions.</li>\r\n                            </ul>\r\n                            <h4>Skill &amp; Experience</h4>\r\n                            <ul class=\"list-style-three\">\r\n                                <li>You have at least 3 years’ experience working as a Product Designer.</li>\r\n                                <li>You have experience using Sketch and InVision or Framer X</li>\r\n                                <li>You have some previous experience working in an agile environment – Think two-week sprints.</li>\r\n                                <li>You are familiar using Jira and Confluence in your workflow</li>\r\n                            </ul>', 2, 0, 5, 5, 1, '2024-10-18 11:28:51', '30h', 'week', 'monthly', '4500.00', '6000.00', 'Both', '33.588124', '-117.143191', 16, 2.00, 0, 0, 'publish', '2023-06-14 02:47:41', 1, NULL, '2023-06-06 05:58:51', '2023-06-14 02:47:41', NULL, NULL, NULL, '68,69,70,71', 'https://www.youtube.com/watch?v=bhOiLfkChPo', 23, NULL, 'approved', NULL),
(8, 'Executive, HR Operations', 'executive-hr-operations', '<h4>Job Description</h4>\r\n                            <p>As a Product Designer, you will work within a Product Delivery Team fused with UX, engineering, product and data talent. You will help the team design beautiful interfaces that solve business challenges for our clients. We work with a number of Tier 1 banks on building web-based applications for AML, KYC and Sanctions List management workflows. This role is ideal if you are looking to segue your career into the FinTech or Big Data arenas.</p>\r\n                            <h4>Key Responsibilities</h4>\r\n                            <ul class=\"list-style-three\">\r\n                                <li>Be involved in every step of the product design cycle from discovery to developer handoff and user acceptance testing.</li>\r\n                                <li>Work with BAs, product managers and tech teams to lead the Product Design</li>\r\n                                <li>Maintain quality of the design process and ensure that when designs are translated into code they accurately reflect the design specifications.</li>\r\n                                <li>Accurately estimate design tickets during planning sessions.</li>\r\n                                <li>Contribute to sketching sessions involving non-designersCreate, iterate and maintain UI deliverables including sketch files, style guides, high fidelity prototypes, micro interaction specifications and pattern libraries.</li>\r\n                                <li>Ensure design choices are data led by identifying assumptions to test each sprint, and work with the analysts in your team to plan moderated usability test sessions.</li>\r\n                                <li>Design pixel perfect responsive UI’s and understand that adopting common interface patterns is better for UX than reinventing the wheel</li>\r\n                                <li>Present your work to the wider business at Show &amp; Tell sessions.</li>\r\n                            </ul>\r\n                            <h4>Skill &amp; Experience</h4>\r\n                            <ul class=\"list-style-three\">\r\n                                <li>You have at least 3 years’ experience working as a Product Designer.</li>\r\n                                <li>You have experience using Sketch and InVision or Framer X</li>\r\n                                <li>You have some previous experience working in an agile environment – Think two-week sprints.</li>\r\n                                <li>You are familiar using Jira and Confluence in your workflow</li>\r\n                            </ul>', 5, 0, 1, 1, 1, '2024-10-18 11:28:51', '30h', 'week', 'monthly', '4500.00', '6000.00', 'Both', '32.648219', '-115.509738', 16, 2.00, 0, 0, 'publish', NULL, 1, NULL, '2023-06-06 05:58:51', NULL, NULL, NULL, NULL, '68,69,70,71', 'https://www.youtube.com/watch?v=bhOiLfkChPo', 23, NULL, 'approved', NULL),
(9, 'Restaurant Team Member', 'restaurant-team-member', '  <img src=\"/uploads/demo/general/job-post-img.jpg\" alt=\"\" width=\"850\" height=\"350\" /><br/><br/>\r\n                            <h4>Job Description</h4>\r\n                            <p>As a Product Designer, you will work within a Product Delivery Team fused with UX, engineering, product and data talent. You will help the team design beautiful interfaces that solve business challenges for our clients. We work with a number of Tier 1 banks on building web-based applications for AML, KYC and Sanctions List management workflows. This role is ideal if you are looking to segue your career into the FinTech or Big Data arenas.</p>\r\n                            <h4>Key Responsibilities</h4>\r\n                            <ul class=\"list-style-three\">\r\n                                <li>Be involved in every step of the product design cycle from discovery to developer handoff and user acceptance testing.</li>\r\n                                <li>Work with BAs, product managers and tech teams to lead the Product Design</li>\r\n                                <li>Maintain quality of the design process and ensure that when designs are translated into code they accurately reflect the design specifications.</li>\r\n                                <li>Accurately estimate design tickets during planning sessions.</li>\r\n                                <li>Contribute to sketching sessions involving non-designersCreate, iterate and maintain UI deliverables including sketch files, style guides, high fidelity prototypes, micro interaction specifications and pattern libraries.</li>\r\n                                <li>Ensure design choices are data led by identifying assumptions to test each sprint, and work with the analysts in your team to plan moderated usability test sessions.</li>\r\n                                <li>Design pixel perfect responsive UI’s and understand that adopting common interface patterns is better for UX than reinventing the wheel</li>\r\n                                <li>Present your work to the wider business at Show &amp; Tell sessions.</li>\r\n                            </ul>\r\n                            <h4>Skill &amp; Experience</h4>\r\n                            <ul class=\"list-style-three\">\r\n                                <li>You have at least 3 years’ experience working as a Product Designer.</li>\r\n                                <li>You have experience using Sketch and InVision or Framer X</li>\r\n                                <li>You have some previous experience working in an agile environment – Think two-week sprints.</li>\r\n                                <li>You are familiar using Jira and Confluence in your workflow</li>\r\n                            </ul>', 7, 0, 4, 3, 5, '2024-10-18 11:28:51', '30h', 'week', 'monthly', '4500.00', '6000.00', 'Both', '32.816113', '-116.936796', 16, 2.00, 1, 1, 'publish', '2023-06-14 02:47:41', 1, NULL, '2023-06-06 05:58:51', '2023-06-14 02:47:41', NULL, NULL, NULL, '68,69,70,71', 'https://www.youtube.com/watch?v=bhOiLfkChPo', 23, NULL, 'approved', NULL),
(10, 'Group Marketing Manager', 'group-marketing-manager', '<h4>Job Description</h4>\r\n                            <p>As a Product Designer, you will work within a Product Delivery Team fused with UX, engineering, product and data talent. You will help the team design beautiful interfaces that solve business challenges for our clients. We work with a number of Tier 1 banks on building web-based applications for AML, KYC and Sanctions List management workflows. This role is ideal if you are looking to segue your career into the FinTech or Big Data arenas.</p>\r\n                            <h4>Key Responsibilities</h4>\r\n                            <ul class=\"list-style-three\">\r\n                                <li>Be involved in every step of the product design cycle from discovery to developer handoff and user acceptance testing.</li>\r\n                                <li>Work with BAs, product managers and tech teams to lead the Product Design</li>\r\n                                <li>Maintain quality of the design process and ensure that when designs are translated into code they accurately reflect the design specifications.</li>\r\n                                <li>Accurately estimate design tickets during planning sessions.</li>\r\n                                <li>Contribute to sketching sessions involving non-designersCreate, iterate and maintain UI deliverables including sketch files, style guides, high fidelity prototypes, micro interaction specifications and pattern libraries.</li>\r\n                                <li>Ensure design choices are data led by identifying assumptions to test each sprint, and work with the analysts in your team to plan moderated usability test sessions.</li>\r\n                                <li>Design pixel perfect responsive UI’s and understand that adopting common interface patterns is better for UX than reinventing the wheel</li>\r\n                                <li>Present your work to the wider business at Show &amp; Tell sessions.</li>\r\n                            </ul>\r\n                            <h4>Skill &amp; Experience</h4>\r\n                            <ul class=\"list-style-three\">\r\n                                <li>You have at least 3 years’ experience working as a Product Designer.</li>\r\n                                <li>You have experience using Sketch and InVision or Framer X</li>\r\n                                <li>You have some previous experience working in an agile environment – Think two-week sprints.</li>\r\n                                <li>You are familiar using Jira and Confluence in your workflow</li>\r\n                            </ul>', 2, 0, 5, 1, 3, '2024-10-18 11:28:51', '30h', 'week', 'monthly', '4500.00', '6000.00', 'Both', '32.714993', '-117.137829', 16, 2.00, 0, 0, 'publish', NULL, 1, NULL, '2023-06-06 05:58:51', NULL, 'email', NULL, 'contact@superio.com', '68,69,70,71', 'https://www.youtube.com/watch?v=bhOiLfkChPo', 23, NULL, 'approved', NULL),
(11, 'Software Engineer (Android), Libraries', 'software-engineer-android-lib', '<h4>Job Description</h4>\r\n                            <p>As a Product Designer, you will work within a Product Delivery Team fused with UX, engineering, product and data talent. You will help the team design beautiful interfaces that solve business challenges for our clients. We work with a number of Tier 1 banks on building web-based applications for AML, KYC and Sanctions List management workflows. This role is ideal if you are looking to segue your career into the FinTech or Big Data arenas.</p>\r\n                            <h4>Key Responsibilities</h4>\r\n                            <ul class=\"list-style-three\">\r\n                                <li>Be involved in every step of the product design cycle from discovery to developer handoff and user acceptance testing.</li>\r\n                                <li>Work with BAs, product managers and tech teams to lead the Product Design</li>\r\n                                <li>Maintain quality of the design process and ensure that when designs are translated into code they accurately reflect the design specifications.</li>\r\n                                <li>Accurately estimate design tickets during planning sessions.</li>\r\n                                <li>Contribute to sketching sessions involving non-designersCreate, iterate and maintain UI deliverables including sketch files, style guides, high fidelity prototypes, micro interaction specifications and pattern libraries.</li>\r\n                                <li>Ensure design choices are data led by identifying assumptions to test each sprint, and work with the analysts in your team to plan moderated usability test sessions.</li>\r\n                                <li>Design pixel perfect responsive UI’s and understand that adopting common interface patterns is better for UX than reinventing the wheel</li>\r\n                                <li>Present your work to the wider business at Show &amp; Tell sessions.</li>\r\n                            </ul>\r\n                            <h4>Skill &amp; Experience</h4>\r\n                            <ul class=\"list-style-three\">\r\n                                <li>You have at least 3 years’ experience working as a Product Designer.</li>\r\n                                <li>You have experience using Sketch and InVision or Framer X</li>\r\n                                <li>You have some previous experience working in an agile environment – Think two-week sprints.</li>\r\n                                <li>You are familiar using Jira and Confluence in your workflow</li>\r\n                            </ul>', 4, 0, 2, 4, 5, '2024-10-18 11:28:51', '30h', 'week', 'monthly', '2500.00', '3500.00', 'Both', '32.522868', '-117.043382', 16, 2.00, 1, 0, 'publish', '2023-06-14 02:47:41', 1, NULL, '2023-06-06 05:58:51', '2023-06-14 02:47:41', 'external', 'https://themeforest.net/', NULL, '68,69,70,71', 'https://www.youtube.com/watch?v=bhOiLfkChPo', 23, NULL, 'approved', NULL),
(12, 'Product Designer / UI Designer', 'product-designer-ui-designer', '<h4>Job Description</h4>\r\n                            <p>As a Product Designer, you will work within a Product Delivery Team fused with UX, engineering, product and data talent. You will help the team design beautiful interfaces that solve business challenges for our clients. We work with a number of Tier 1 banks on building web-based applications for AML, KYC and Sanctions List management workflows. This role is ideal if you are looking to segue your career into the FinTech or Big Data arenas.</p>\r\n                            <h4>Key Responsibilities</h4>\r\n                            <ul class=\"list-style-three\">\r\n                                <li>Be involved in every step of the product design cycle from discovery to developer handoff and user acceptance testing.</li>\r\n                                <li>Work with BAs, product managers and tech teams to lead the Product Design</li>\r\n                                <li>Maintain quality of the design process and ensure that when designs are translated into code they accurately reflect the design specifications.</li>\r\n                                <li>Accurately estimate design tickets during planning sessions.</li>\r\n                                <li>Contribute to sketching sessions involving non-designersCreate, iterate and maintain UI deliverables including sketch files, style guides, high fidelity prototypes, micro interaction specifications and pattern libraries.</li>\r\n                                <li>Ensure design choices are data led by identifying assumptions to test each sprint, and work with the analysts in your team to plan moderated usability test sessions.</li>\r\n                                <li>Design pixel perfect responsive UI’s and understand that adopting common interface patterns is better for UX than reinventing the wheel</li>\r\n                                <li>Present your work to the wider business at Show &amp; Tell sessions.</li>\r\n                            </ul>\r\n                            <h4>Skill &amp; Experience</h4>\r\n                            <ul class=\"list-style-three\">\r\n                                <li>You have at least 3 years’ experience working as a Product Designer.</li>\r\n                                <li>You have experience using Sketch and InVision or Framer X</li>\r\n                                <li>You have some previous experience working in an agile environment – Think two-week sprints.</li>\r\n                                <li>You are familiar using Jira and Confluence in your workflow</li>\r\n                            </ul>', 3, 0, 5, 1, 3, '2024-10-18 11:28:51', '30h', 'week', 'monthly', '800.00', '3000.00', 'Both', '34.02889471970446', '-118.27121649671741', 16, 2.00, 1, 1, 'publish', NULL, 1, NULL, '2023-06-06 05:58:51', NULL, '', NULL, NULL, '68,69,70,71', 'https://www.youtube.com/watch?v=bhOiLfkChPo', 23, NULL, 'approved', NULL),
(13, 'Job 1', 'job-1', '<p>Job 1</p>', 3, NULL, 9, 9, 4, '2023-06-23 00:00:00', '12', 'day', 'hourly', '1.00', '12.00', 'Both', NULL, NULL, 8, 2.00, NULL, NULL, 'publish', NULL, 16, 16, '2023-06-20 01:26:05', '2023-06-20 01:26:05', NULL, NULL, NULL, NULL, NULL, NULL, 2, 'approved', NULL),
(14, 'job 2', 'job-2', '<p>job 2</p>', 17, NULL, 10, 9, 1, '2023-06-22 00:00:00', NULL, NULL, 'hourly', NULL, NULL, 'Both', NULL, NULL, 8, NULL, NULL, NULL, 'publish', '2023-06-20 04:55:26', 16, 16, '2023-06-20 01:27:12', '2023-06-20 04:55:26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'approved', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bc_job_candidates`
--

DROP TABLE IF EXISTS `bc_job_candidates`;
CREATE TABLE IF NOT EXISTS `bc_job_candidates` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `job_id` bigint NOT NULL,
  `candidate_id` bigint NOT NULL,
  `cv_id` bigint NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` bigint DEFAULT NULL,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bc_job_candidates`
--

INSERT INTO `bc_job_candidates` (`id`, `job_id`, `candidate_id`, `cv_id`, `message`, `status`, `company_id`, `create_user`, `update_user`, `created_at`, `updated_at`) VALUES
(1, 12, 17, 8, 'qwerty', 'pending', 1, 17, NULL, '2023-06-09 23:38:42', '2023-06-09 23:38:42'),
(2, 9, 17, 9, 'qwerrt', 'pending', 3, 17, NULL, '2023-06-09 23:39:50', '2023-06-09 23:39:50'),
(3, 6, 17, 10, 'redgergerg', 'pending', 1, 17, NULL, '2023-06-09 23:40:30', '2023-06-09 23:40:30'),
(4, 1, 17, 11, 'ergsergeg', 'pending', 1, 17, NULL, '2023-06-09 23:41:03', '2023-06-09 23:41:03'),
(5, 12, 20, 12, 'qwerty', 'pending', 1, 20, NULL, '2023-06-20 20:53:50', '2023-06-20 20:53:50'),
(6, 6, 20, 13, 'qwerr', 'pending', 1, 20, NULL, '2023-06-20 20:54:23', '2023-06-20 20:54:23'),
(7, 1, 20, 14, 'qwert', 'pending', 1, 20, NULL, '2023-06-20 20:54:55', '2023-06-20 20:54:55'),
(8, 10, 20, 15, 'gsdfdfg', 'pending', 1, 20, NULL, '2023-06-20 20:55:17', '2023-06-20 20:55:17'),
(9, 13, 20, 16, 'srgg', 'pending', 9, 20, NULL, '2023-06-20 20:55:34', '2023-06-20 20:55:34');

-- --------------------------------------------------------

--
-- Table structure for table `bc_job_categories`
--

DROP TABLE IF EXISTS `bc_job_categories`;
CREATE TABLE IF NOT EXISTS `bc_job_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `origin_id` bigint DEFAULT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `_lft` int UNSIGNED NOT NULL DEFAULT '0',
  `_rgt` int UNSIGNED NOT NULL DEFAULT '0',
  `parent_id` int UNSIGNED DEFAULT NULL,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bc_job_categories__lft__rgt_parent_id_index` (`_lft`,`_rgt`,`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bc_job_categories`
--

INSERT INTO `bc_job_categories` (`id`, `name`, `content`, `slug`, `status`, `origin_id`, `icon`, `lang`, `_lft`, `_rgt`, `parent_id`, `create_user`, `update_user`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Accounting / Finance', NULL, 'accounting-finance', 'publish', NULL, 'icon flaticon-money-1', NULL, 1, 2, NULL, NULL, NULL, NULL, '2023-06-06 05:58:51', '2023-06-06 05:58:51'),
(2, 'Marketing', NULL, 'marketing', 'publish', NULL, 'icon flaticon-promotion', NULL, 3, 4, NULL, NULL, NULL, NULL, '2023-06-06 05:58:51', '2023-06-06 05:58:51'),
(3, 'Design', NULL, 'design', 'publish', NULL, 'icon flaticon-vector', NULL, 5, 6, NULL, NULL, NULL, NULL, '2023-06-06 05:58:51', '2023-06-06 05:58:51'),
(4, 'Development', NULL, 'development', 'publish', NULL, 'icon flaticon-web-programming', NULL, 7, 8, NULL, NULL, NULL, NULL, '2023-06-06 05:58:51', '2023-06-06 05:58:51'),
(5, 'Human Resource', NULL, 'human-resource', 'publish', NULL, 'icon flaticon-headhunting', NULL, 9, 10, NULL, NULL, NULL, NULL, '2023-06-06 05:58:51', '2023-06-06 05:58:51'),
(6, 'Project Management', NULL, 'project-management', 'publish', NULL, 'icon flaticon-rocket-ship', NULL, 11, 12, NULL, NULL, NULL, NULL, '2023-06-06 05:58:51', '2023-06-06 05:58:51'),
(7, 'Customer Service', NULL, 'customer-service', 'publish', NULL, 'icon flaticon-support-1', NULL, 13, 14, NULL, NULL, NULL, NULL, '2023-06-06 05:58:51', '2023-06-06 05:58:51'),
(8, 'Health and Care', NULL, 'health-and-care', 'publish', NULL, 'icon flaticon-first-aid-kit-1', NULL, 15, 16, NULL, NULL, NULL, NULL, '2023-06-06 05:58:51', '2023-06-06 05:58:51'),
(9, 'Automotive Jobs', NULL, 'automotive-jobs', 'publish', NULL, 'icon flaticon-car', NULL, 17, 18, NULL, NULL, NULL, NULL, '2023-06-06 05:58:51', '2023-06-06 05:58:51'),
(10, 'Accounting / Finance', NULL, 'accounting-finance-1', 'publish', NULL, 'icon flaticon-money-1', NULL, 19, 20, NULL, NULL, NULL, NULL, '2023-06-06 06:00:29', '2023-06-06 06:00:29'),
(11, 'Marketing', NULL, 'marketing-1', 'publish', NULL, 'icon flaticon-promotion', NULL, 21, 22, NULL, NULL, NULL, NULL, '2023-06-06 06:00:29', '2023-06-06 06:00:29'),
(12, 'Design', NULL, 'design-1', 'publish', NULL, 'icon flaticon-vector', NULL, 23, 24, NULL, NULL, NULL, NULL, '2023-06-06 06:00:29', '2023-06-06 06:00:29'),
(13, 'Development', NULL, 'development-1', 'publish', NULL, 'icon flaticon-web-programming', NULL, 25, 26, NULL, NULL, NULL, NULL, '2023-06-06 06:00:29', '2023-06-06 06:00:29'),
(14, 'Human Resource', NULL, 'human-resource-1', 'publish', NULL, 'icon flaticon-headhunting', NULL, 27, 28, NULL, NULL, NULL, NULL, '2023-06-06 06:00:29', '2023-06-06 06:00:29'),
(15, 'Project Management', NULL, 'project-management-1', 'publish', NULL, 'icon flaticon-rocket-ship', NULL, 29, 30, NULL, NULL, NULL, NULL, '2023-06-06 06:00:29', '2023-06-06 06:00:29'),
(16, 'Customer Service', NULL, 'customer-service-1', 'publish', NULL, 'icon flaticon-support-1', NULL, 31, 32, NULL, NULL, NULL, NULL, '2023-06-06 06:00:29', '2023-06-06 06:00:29'),
(17, 'Health and Care', NULL, 'health-and-care-1', 'publish', NULL, 'icon flaticon-first-aid-kit-1', NULL, 33, 34, NULL, NULL, NULL, NULL, '2023-06-06 06:00:29', '2023-06-06 06:00:29'),
(18, 'Automotive Jobs', NULL, 'automotive-jobs-1', 'publish', NULL, 'icon flaticon-car', NULL, 35, 36, NULL, NULL, NULL, NULL, '2023-06-06 06:00:29', '2023-06-06 06:00:29');

-- --------------------------------------------------------

--
-- Table structure for table `bc_job_category_translations`
--

DROP TABLE IF EXISTS `bc_job_category_translations`;
CREATE TABLE IF NOT EXISTS `bc_job_category_translations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `origin_id` int UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bc_job_category_translations_locale_index` (`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bc_job_skills`
--

DROP TABLE IF EXISTS `bc_job_skills`;
CREATE TABLE IF NOT EXISTS `bc_job_skills` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `job_id` bigint UNSIGNED NOT NULL,
  `skill_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bc_job_skills`
--

INSERT INTO `bc_job_skills` (`id`, `job_id`, `skill_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2023-06-06 05:58:51', NULL),
(2, 1, 3, '2023-06-06 05:58:51', NULL),
(3, 1, 4, '2023-06-06 05:58:51', NULL),
(4, 1, 6, '2023-06-06 05:58:51', NULL),
(5, 1, 7, '2023-06-06 05:58:51', NULL),
(6, 1, 8, '2023-06-06 05:58:51', NULL),
(7, 2, 1, '2023-06-06 05:58:51', NULL),
(8, 2, 2, '2023-06-06 05:58:51', NULL),
(9, 2, 3, '2023-06-06 05:58:51', NULL),
(10, 2, 4, '2023-06-06 05:58:51', NULL),
(11, 2, 5, '2023-06-06 05:58:51', NULL),
(12, 2, 6, '2023-06-06 05:58:51', NULL),
(13, 2, 7, '2023-06-06 05:58:51', NULL),
(14, 2, 8, '2023-06-06 05:58:51', NULL),
(15, 3, 1, '2023-06-06 05:58:51', NULL),
(16, 3, 2, '2023-06-06 05:58:51', NULL),
(17, 3, 3, '2023-06-06 05:58:51', NULL),
(18, 3, 4, '2023-06-06 05:58:51', NULL),
(19, 3, 6, '2023-06-06 05:58:51', NULL),
(20, 3, 7, '2023-06-06 05:58:51', NULL),
(21, 3, 8, '2023-06-06 05:58:51', NULL),
(22, 4, 2, '2023-06-06 05:58:51', NULL),
(23, 4, 3, '2023-06-06 05:58:51', NULL),
(24, 4, 4, '2023-06-06 05:58:51', NULL),
(25, 4, 6, '2023-06-06 05:58:51', NULL),
(26, 4, 8, '2023-06-06 05:58:51', NULL),
(27, 5, 2, '2023-06-06 05:58:51', NULL),
(28, 5, 4, '2023-06-06 05:58:51', NULL),
(29, 5, 5, '2023-06-06 05:58:51', NULL),
(30, 5, 8, '2023-06-06 05:58:51', NULL),
(31, 6, 1, '2023-06-06 05:58:51', NULL),
(32, 6, 2, '2023-06-06 05:58:51', NULL),
(33, 6, 3, '2023-06-06 05:58:51', NULL),
(34, 6, 5, '2023-06-06 05:58:51', NULL),
(35, 6, 7, '2023-06-06 05:58:51', NULL),
(36, 7, 2, '2023-06-06 05:58:51', NULL),
(37, 7, 3, '2023-06-06 05:58:51', NULL),
(38, 7, 4, '2023-06-06 05:58:51', NULL),
(39, 7, 5, '2023-06-06 05:58:51', NULL),
(40, 7, 8, '2023-06-06 05:58:51', NULL),
(41, 8, 1, '2023-06-06 05:58:51', NULL),
(42, 8, 2, '2023-06-06 05:58:51', NULL),
(43, 8, 3, '2023-06-06 05:58:51', NULL),
(44, 8, 5, '2023-06-06 05:58:51', NULL),
(45, 8, 7, '2023-06-06 05:58:52', NULL),
(46, 9, 1, '2023-06-06 05:58:52', NULL),
(47, 9, 2, '2023-06-06 05:58:52', NULL),
(48, 9, 5, '2023-06-06 05:58:52', NULL),
(49, 9, 7, '2023-06-06 05:58:52', NULL),
(50, 10, 2, '2023-06-06 05:58:52', NULL),
(51, 10, 3, '2023-06-06 05:58:52', NULL),
(52, 10, 4, '2023-06-06 05:58:52', NULL),
(53, 10, 5, '2023-06-06 05:58:52', NULL),
(54, 10, 6, '2023-06-06 05:58:52', NULL),
(55, 10, 7, '2023-06-06 05:58:52', NULL),
(56, 11, 3, '2023-06-06 05:58:52', NULL),
(57, 11, 4, '2023-06-06 05:58:52', NULL),
(58, 11, 5, '2023-06-06 05:58:52', NULL),
(59, 11, 7, '2023-06-06 05:58:52', NULL),
(60, 11, 8, '2023-06-06 05:58:52', NULL),
(61, 12, 1, '2023-06-06 05:58:52', NULL),
(62, 12, 2, '2023-06-06 05:58:52', NULL),
(63, 12, 3, '2023-06-06 05:58:52', NULL),
(64, 12, 4, '2023-06-06 05:58:52', NULL),
(65, 12, 8, '2023-06-06 05:58:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bc_job_translations`
--

DROP TABLE IF EXISTS `bc_job_translations`;
CREATE TABLE IF NOT EXISTS `bc_job_translations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `origin_id` bigint NOT NULL,
  `locale` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `content` text COLLATE utf8mb4_unicode_ci,
  `create_user` bigint DEFAULT NULL,
  `update_user` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bc_job_types`
--

DROP TABLE IF EXISTS `bc_job_types`;
CREATE TABLE IF NOT EXISTS `bc_job_types` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bc_job_types`
--

INSERT INTO `bc_job_types` (`id`, `name`, `slug`, `status`, `create_user`, `update_user`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Freelance', NULL, 'publish', NULL, NULL, NULL, '2023-06-06 05:58:51', NULL),
(2, 'Full Time', NULL, 'publish', NULL, NULL, NULL, '2023-06-06 05:58:51', NULL),
(3, 'Internship', NULL, 'publish', NULL, NULL, NULL, '2023-06-06 05:58:51', NULL),
(4, 'Part Time', NULL, 'publish', NULL, NULL, NULL, '2023-06-06 05:58:51', NULL),
(5, 'Temporary', NULL, 'publish', NULL, NULL, NULL, '2023-06-06 05:58:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bc_job_type_translations`
--

DROP TABLE IF EXISTS `bc_job_type_translations`;
CREATE TABLE IF NOT EXISTS `bc_job_type_translations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `origin_id` bigint DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bc_job_type_translations_origin_id_locale_unique` (`origin_id`,`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bc_locations`
--

DROP TABLE IF EXISTS `bc_locations`;
CREATE TABLE IF NOT EXISTS `bc_locations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_id` int DEFAULT NULL,
  `map_lat` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_lng` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_zoom` int DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `_lft` int UNSIGNED NOT NULL DEFAULT '0',
  `_rgt` int UNSIGNED NOT NULL DEFAULT '0',
  `parent_id` int UNSIGNED DEFAULT NULL,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `origin_id` bigint DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `zipcode` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bc_locations__lft__rgt_parent_id_index` (`_lft`,`_rgt`,`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bc_locations`
--

INSERT INTO `bc_locations` (`id`, `name`, `slug`, `image_id`, `map_lat`, `map_lng`, `map_zoom`, `status`, `_lft`, `_rgt`, `parent_id`, `create_user`, `update_user`, `deleted_at`, `origin_id`, `lang`, `created_at`, `updated_at`, `zipcode`) VALUES
(1, 'New York', 'new-york', 24, '40.712776', '-74.005974', 12, 'publish', 1, 2, NULL, 1, NULL, '2023-06-15 02:08:44', NULL, NULL, '2023-06-06 05:58:50', '2023-06-15 02:08:44', NULL),
(2, 'Paris', 'paris', 25, '48.856613', '2.352222', 12, 'publish', 3, 4, NULL, 1, NULL, '2023-06-15 02:08:44', NULL, NULL, '2023-06-06 05:58:50', '2023-06-15 02:08:44', NULL),
(3, 'London', 'london', 26, '48.856613', '2.352222', 12, 'publish', 5, 6, NULL, 1, NULL, '2023-06-15 02:08:44', NULL, NULL, '2023-06-06 05:58:50', '2023-06-15 02:08:44', NULL),
(4, 'Miami', 'miami', 27, '36.778259', '-119.417931', 12, 'publish', 7, 8, NULL, 1, NULL, '2023-06-15 02:08:44', NULL, NULL, '2023-06-06 05:58:50', '2023-06-15 02:08:44', NULL),
(5, 'Los Angeles', 'los-angeles', 28, '34.052235', '-118.243683', 12, 'publish', 9, 10, NULL, 1, NULL, '2023-06-15 02:08:44', NULL, NULL, '2023-06-06 05:58:50', '2023-06-15 02:08:44', NULL),
(6, 'New Jersey', 'new-jersey', 29, '40.058323', '-74.405663', 12, 'publish', 11, 12, NULL, 1, NULL, '2023-06-15 02:08:44', NULL, NULL, '2023-06-06 05:58:50', '2023-06-15 02:08:44', NULL),
(7, 'San Francisco', 'san-francisco', 30, '37.774929', '-122.419418', 12, 'publish', 13, 14, NULL, 1, NULL, '2023-06-15 02:08:44', NULL, NULL, '2023-06-06 05:58:50', '2023-06-15 02:08:44', NULL),
(8, 'Virginia', 'virginia', 31, '37.431572', '-78.656891', 12, 'publish', 15, 16, NULL, 1, NULL, '2023-06-15 02:08:44', NULL, NULL, '2023-06-06 05:58:50', '2023-06-15 02:08:44', NULL),
(9, 'Mumbai', 'mumbai', NULL, NULL, NULL, 8, 'publish', 17, 18, NULL, 1, NULL, NULL, NULL, NULL, '2023-06-15 02:09:27', '2023-06-15 02:09:27', NULL),
(10, 'Delhi', 'delhi', NULL, NULL, NULL, 8, 'publish', 19, 20, NULL, 1, NULL, NULL, NULL, NULL, '2023-06-15 02:09:51', '2023-06-15 02:09:51', NULL),
(11, 'Bangalore', 'bangalore', NULL, NULL, NULL, 8, 'publish', 21, 22, NULL, 1, NULL, NULL, NULL, NULL, '2023-06-15 02:10:00', '2023-06-15 02:10:00', NULL),
(12, 'Hyderabad', 'hyderabad', NULL, NULL, NULL, 8, 'publish', 23, 24, NULL, 1, NULL, NULL, NULL, NULL, '2023-06-15 02:10:11', '2023-06-15 02:10:11', NULL),
(13, 'Ahmedabad', 'ahmedabad', NULL, NULL, NULL, 8, 'publish', 25, 26, NULL, 1, NULL, NULL, NULL, NULL, '2023-06-15 02:20:38', '2023-06-15 02:20:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bc_location_translations`
--

DROP TABLE IF EXISTS `bc_location_translations`;
CREATE TABLE IF NOT EXISTS `bc_location_translations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `origin_id` bigint DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bc_location_translations_origin_id_locale_unique` (`origin_id`,`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bc_orders`
--

DROP TABLE IF EXISTS `bc_orders`;
CREATE TABLE IF NOT EXISTS `bc_orders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_id` bigint DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `payment_id` bigint DEFAULT NULL,
  `gateway` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid` decimal(10,2) DEFAULT NULL,
  `billing` text COLLATE utf8mb4_unicode_ci,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bc_order_items`
--

DROP TABLE IF EXISTS `bc_order_items`;
CREATE TABLE IF NOT EXISTS `bc_order_items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` bigint DEFAULT NULL,
  `object_id` bigint DEFAULT NULL,
  `object_model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `qty` int DEFAULT '1',
  `subtotal` decimal(10,2) DEFAULT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bc_order_meta`
--

DROP TABLE IF EXISTS `bc_order_meta`;
CREATE TABLE IF NOT EXISTS `bc_order_meta` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val` text COLLATE utf8mb4_unicode_ci,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bc_payments`
--

DROP TABLE IF EXISTS `bc_payments`;
CREATE TABLE IF NOT EXISTS `bc_payments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `object_id` bigint DEFAULT NULL,
  `object_model` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gateway` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `currency` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `converted_amount` decimal(10,2) DEFAULT NULL,
  `converted_currency` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exchange_rate` decimal(10,2) DEFAULT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logs` text COLLATE utf8mb4_unicode_ci,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bc_payment_meta`
--

DROP TABLE IF EXISTS `bc_payment_meta`;
CREATE TABLE IF NOT EXISTS `bc_payment_meta` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `payment_id` int DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val` text COLLATE utf8mb4_unicode_ci,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bc_plans`
--

DROP TABLE IF EXISTS `bc_plans`;
CREATE TABLE IF NOT EXISTS `bc_plans` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `price` decimal(12,2) DEFAULT NULL,
  `duration` int DEFAULT '0',
  `duration_type` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `annual_price` decimal(12,2) DEFAULT NULL,
  `max_service` int DEFAULT '0',
  `status` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint DEFAULT NULL,
  `is_recommended` tinyint DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `create_user` bigint DEFAULT NULL,
  `update_user` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bc_plans`
--

INSERT INTO `bc_plans` (`id`, `title`, `content`, `price`, `duration`, `duration_type`, `annual_price`, `max_service`, `status`, `role_id`, `is_recommended`, `deleted_at`, `create_user`, `update_user`, `created_at`, `updated_at`) VALUES
(1, 'Basic', NULL, NULL, 1, 'day', NULL, 1, 'publish', 2, 0, NULL, 1, 1, '2023-06-06 06:00:29', '2023-06-20 01:22:16'),
(2, 'Standard', '<ul>\n                                                <li><span>1 job posting</span></li>\n                                                <li><span>0 featured job</span></li>\n                                                <li><span>Job displayed for 20 days</span></li>\n                                                <li><span>Premium Support 24/7 </span></li>\n                                            </ul>', '499.00', 1, 'month', '1499.00', 20, 'publish', 2, 1, '2023-06-20 01:21:45', NULL, NULL, '2023-06-06 06:00:29', '2023-06-20 01:21:45'),
(3, 'Extended', '<ul>\n                                                <li><span>1 job posting</span></li>\n                                                <li><span>0 featured job</span></li>\n                                                <li><span>Job displayed for 20 days</span></li>\n                                                <li><span>Premium Support 24/7 </span></li>\n                                            </ul>', '799.00', 1, 'month', '1799.00', 50, 'publish', 2, 0, '2023-06-20 01:21:45', NULL, NULL, '2023-06-06 06:00:29', '2023-06-20 01:21:45'),
(4, 'Free', 'This is free of cost plan for jobseeker', NULL, 1, 'day', NULL, 1, 'publish', 3, 1, NULL, 1, 1, '2023-06-09 23:29:49', '2023-06-20 22:35:36');

-- --------------------------------------------------------

--
-- Table structure for table `bc_plan_trans`
--

DROP TABLE IF EXISTS `bc_plan_trans`;
CREATE TABLE IF NOT EXISTS `bc_plan_trans` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `create_user` bigint DEFAULT NULL,
  `update_user` bigint DEFAULT NULL,
  `origin_id` int UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bc_plan_trans_origin_id_locale_unique` (`origin_id`,`locale`),
  KEY `bc_plan_trans_locale_index` (`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bc_review`
--

DROP TABLE IF EXISTS `bc_review`;
CREATE TABLE IF NOT EXISTS `bc_review` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `object_id` int DEFAULT NULL,
  `object_model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `rate_number` int DEFAULT NULL,
  `author_ip` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish_date` datetime DEFAULT NULL,
  `create_user` bigint DEFAULT NULL,
  `update_user` bigint DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `vendor_id` bigint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bc_review`
--

INSERT INTO `bc_review` (`id`, `object_id`, `object_model`, `title`, `content`, `rate_number`, `author_ip`, `status`, `publish_date`, `create_user`, `update_user`, `deleted_at`, `lang`, `created_at`, `updated_at`, `vendor_id`) VALUES
(1, 1, 'gig', 'Nisi est.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2023-06-06 11:28:55', 2, NULL, NULL, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55', 1),
(2, 1, 'gig', 'Corporis architecto nihil.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2023-06-06 11:28:55', 1, NULL, NULL, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55', 1),
(3, 1, 'gig', 'Adipisci provident.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2023-06-06 11:28:55', 2, NULL, NULL, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55', 1),
(4, 2, 'gig', 'Veritatis eligendi et.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2023-06-06 11:28:55', 1, NULL, NULL, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55', 1),
(5, 2, 'gig', 'Ea ut ea.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2023-06-06 11:28:55', 2, NULL, NULL, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55', 1),
(6, 2, 'gig', 'Nulla amet debitis.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2023-06-06 11:28:55', 1, NULL, NULL, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55', 1),
(7, 3, 'gig', 'Doloribus error.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2023-06-06 11:28:55', 2, NULL, NULL, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55', 1),
(8, 3, 'gig', 'Sed dolor.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2023-06-06 11:28:55', 1, NULL, NULL, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55', 1),
(9, 3, 'gig', 'Nesciunt quis.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2023-06-06 11:28:55', 1, NULL, NULL, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55', 1),
(10, 4, 'gig', 'Repellendus unde.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2023-06-06 11:28:55', 1, NULL, NULL, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55', 1),
(11, 4, 'gig', 'Iusto cum eaque.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2023-06-06 11:28:55', 1, NULL, NULL, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55', 1),
(12, 4, 'gig', 'Minima culpa nulla.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2023-06-06 11:28:55', 1, NULL, NULL, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55', 1),
(13, 5, 'gig', 'Quia qui.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2023-06-06 11:28:55', 1, NULL, NULL, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55', 1),
(14, 5, 'gig', 'Et perferendis autem.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2023-06-06 11:28:55', 1, NULL, NULL, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55', 1),
(15, 5, 'gig', 'Nam reprehenderit officiis.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2023-06-06 11:28:55', 2, NULL, NULL, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55', 1),
(16, 6, 'gig', 'Aut necessitatibus excepturi.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2023-06-06 11:28:55', 2, NULL, NULL, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55', 1),
(17, 6, 'gig', 'Consequatur qui.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2023-06-06 11:28:55', 2, NULL, NULL, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55', 1),
(18, 6, 'gig', 'A harum et.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2023-06-06 11:28:55', 2, NULL, NULL, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55', 1),
(19, 7, 'gig', 'Laudantium labore adipisci.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2023-06-06 11:28:55', 1, NULL, NULL, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55', 1),
(20, 7, 'gig', 'Id deserunt natus.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2023-06-06 11:28:55', 2, NULL, NULL, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55', 1),
(21, 7, 'gig', 'Recusandae aliquam autem.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2023-06-06 11:28:55', 1, NULL, NULL, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55', 1),
(22, 8, 'gig', 'Quia natus sed.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2023-06-06 11:28:55', 1, NULL, NULL, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55', 1),
(23, 8, 'gig', 'Molestiae nostrum aperiam.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2023-06-06 11:28:55', 2, NULL, NULL, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55', 1),
(24, 8, 'gig', 'Quis amet.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2023-06-06 11:28:56', 1, NULL, NULL, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56', 1),
(25, 9, 'gig', 'Officiis vel deleniti.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2023-06-06 11:28:56', 2, NULL, NULL, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56', 1),
(26, 9, 'gig', 'Quo nihil.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2023-06-06 11:28:56', 2, NULL, NULL, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56', 1),
(27, 9, 'gig', 'Quam debitis.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2023-06-06 11:28:56', 1, NULL, NULL, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56', 1),
(28, 10, 'gig', 'Accusamus aut.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2023-06-06 11:28:56', 1, NULL, NULL, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56', 1),
(29, 10, 'gig', 'Amet harum excepturi.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2023-06-06 11:28:56', 1, NULL, NULL, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56', 1),
(30, 10, 'gig', 'Adipisci doloremque.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2023-06-06 11:28:56', 2, NULL, NULL, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56', 1),
(31, 11, 'gig', 'Dolores earum eaque.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2023-06-06 11:28:56', 1, NULL, NULL, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56', 1),
(32, 11, 'gig', 'Sit corrupti rem.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2023-06-06 11:28:56', 2, NULL, NULL, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56', 1),
(33, 11, 'gig', 'Provident fuga.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2023-06-06 11:28:56', 1, NULL, NULL, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56', 1),
(34, 12, 'gig', 'Culpa consequatur.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2023-06-06 11:28:56', 1, NULL, NULL, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56', 1),
(35, 12, 'gig', 'Natus qui.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2023-06-06 11:28:56', 1, NULL, NULL, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56', 1),
(36, 12, 'gig', 'Tempora nihil.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2023-06-06 11:28:56', 1, NULL, NULL, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56', 1),
(37, 13, 'gig', 'Quos error saepe.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2023-06-06 11:28:56', 1, NULL, NULL, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56', 1),
(38, 13, 'gig', 'Ipsa nobis.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2023-06-06 11:28:56', 1, NULL, NULL, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56', 1),
(39, 13, 'gig', 'Modi est.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2023-06-06 11:28:56', 1, NULL, NULL, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56', 1),
(40, 14, 'gig', 'Sunt inventore.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2023-06-06 11:28:56', 2, NULL, NULL, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56', 1),
(41, 14, 'gig', 'Recusandae asperiores et.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2023-06-06 11:28:56', 1, NULL, NULL, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56', 1),
(42, 14, 'gig', 'Qui assumenda.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2023-06-06 11:28:56', 1, NULL, NULL, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56', 1),
(43, 15, 'gig', 'Ad minus.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2023-06-06 11:28:56', 1, NULL, NULL, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56', 1),
(44, 15, 'gig', 'Error quidem.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2023-06-06 11:28:56', 2, NULL, NULL, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56', 1),
(45, 15, 'gig', 'Aliquam velit.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2023-06-06 11:28:56', 2, NULL, NULL, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56', 1),
(46, 16, 'gig', 'Natus qui ipsa.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2023-06-06 11:28:57', 1, NULL, NULL, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57', 1),
(47, 16, 'gig', 'Fugit aut vel.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2023-06-06 11:28:57', 1, NULL, NULL, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57', 1),
(48, 16, 'gig', 'Consequatur autem nihil.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2023-06-06 11:28:57', 2, NULL, NULL, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57', 1),
(49, 17, 'gig', 'Suscipit quo.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2023-06-06 11:28:57', 2, NULL, NULL, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57', 1),
(50, 17, 'gig', 'Repudiandae totam voluptatum.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2023-06-06 11:28:57', 1, NULL, NULL, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57', 1),
(51, 17, 'gig', 'Quis veniam.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2023-06-06 11:28:57', 1, NULL, NULL, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57', 1),
(52, 18, 'gig', 'Aperiam dolor sunt.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2023-06-06 11:28:57', 1, NULL, NULL, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57', 1),
(53, 18, 'gig', 'Quas voluptatem modi.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2023-06-06 11:28:57', 1, NULL, NULL, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57', 1),
(54, 18, 'gig', 'Excepturi fuga saepe.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2023-06-06 11:28:57', 1, NULL, NULL, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57', 1),
(55, 19, 'gig', 'Rerum exercitationem eligendi.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2023-06-06 11:28:57', 2, NULL, NULL, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57', 1),
(56, 19, 'gig', 'Consectetur iste sint.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2023-06-06 11:28:57', 2, NULL, NULL, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57', 1),
(57, 19, 'gig', 'A ex.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2023-06-06 11:28:57', 1, NULL, NULL, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57', 1),
(58, 20, 'gig', 'Repudiandae maiores.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 4, '127.0.0.1', 'approved', '2023-06-06 11:28:57', 2, NULL, NULL, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57', 1),
(59, 20, 'gig', 'Quos sunt quia.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2023-06-06 11:28:57', 1, NULL, NULL, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57', 1),
(60, 20, 'gig', 'Omnis qui animi.', 'Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te', 5, '127.0.0.1', 'approved', '2023-06-06 11:28:57', 1, NULL, NULL, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bc_review_meta`
--

DROP TABLE IF EXISTS `bc_review_meta`;
CREATE TABLE IF NOT EXISTS `bc_review_meta` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `review_id` int DEFAULT NULL,
  `object_id` int DEFAULT NULL,
  `object_model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val` text COLLATE utf8mb4_unicode_ci,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=301 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bc_review_meta`
--

INSERT INTO `bc_review_meta` (`id`, `review_id`, `object_id`, `object_model`, `name`, `val`, `create_user`, `update_user`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'gig', 'Service', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(2, 1, 1, 'gig', 'Organization', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(3, 1, 1, 'gig', 'Friendliness', '4', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(4, 1, 1, 'gig', 'Area Expert', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(5, 1, 1, 'gig', 'Safety', '4', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(6, 2, 1, 'gig', 'Service', '4', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(7, 2, 1, 'gig', 'Organization', '4', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(8, 2, 1, 'gig', 'Friendliness', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(9, 2, 1, 'gig', 'Area Expert', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(10, 2, 1, 'gig', 'Safety', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(11, 3, 1, 'gig', 'Service', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(12, 3, 1, 'gig', 'Organization', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(13, 3, 1, 'gig', 'Friendliness', '4', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(14, 3, 1, 'gig', 'Area Expert', '4', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(15, 3, 1, 'gig', 'Safety', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(16, 4, 2, 'gig', 'Service', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(17, 4, 2, 'gig', 'Organization', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(18, 4, 2, 'gig', 'Friendliness', '4', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(19, 4, 2, 'gig', 'Area Expert', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(20, 4, 2, 'gig', 'Safety', '4', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(21, 5, 2, 'gig', 'Service', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(22, 5, 2, 'gig', 'Organization', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(23, 5, 2, 'gig', 'Friendliness', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(24, 5, 2, 'gig', 'Area Expert', '4', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(25, 5, 2, 'gig', 'Safety', '4', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(26, 6, 2, 'gig', 'Service', '4', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(27, 6, 2, 'gig', 'Organization', '4', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(28, 6, 2, 'gig', 'Friendliness', '4', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(29, 6, 2, 'gig', 'Area Expert', '4', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(30, 6, 2, 'gig', 'Safety', '4', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(31, 7, 3, 'gig', 'Service', '4', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(32, 7, 3, 'gig', 'Organization', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(33, 7, 3, 'gig', 'Friendliness', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(34, 7, 3, 'gig', 'Area Expert', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(35, 7, 3, 'gig', 'Safety', '4', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(36, 8, 3, 'gig', 'Service', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(37, 8, 3, 'gig', 'Organization', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(38, 8, 3, 'gig', 'Friendliness', '4', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(39, 8, 3, 'gig', 'Area Expert', '4', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(40, 8, 3, 'gig', 'Safety', '4', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(41, 9, 3, 'gig', 'Service', '4', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(42, 9, 3, 'gig', 'Organization', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(43, 9, 3, 'gig', 'Friendliness', '4', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(44, 9, 3, 'gig', 'Area Expert', '4', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(45, 9, 3, 'gig', 'Safety', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(46, 10, 4, 'gig', 'Service', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(47, 10, 4, 'gig', 'Organization', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(48, 10, 4, 'gig', 'Friendliness', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(49, 10, 4, 'gig', 'Area Expert', '4', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(50, 10, 4, 'gig', 'Safety', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(51, 11, 4, 'gig', 'Service', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(52, 11, 4, 'gig', 'Organization', '4', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(53, 11, 4, 'gig', 'Friendliness', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(54, 11, 4, 'gig', 'Area Expert', '4', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(55, 11, 4, 'gig', 'Safety', '4', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(56, 12, 4, 'gig', 'Service', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(57, 12, 4, 'gig', 'Organization', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(58, 12, 4, 'gig', 'Friendliness', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(59, 12, 4, 'gig', 'Area Expert', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(60, 12, 4, 'gig', 'Safety', '4', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(61, 13, 5, 'gig', 'Service', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(62, 13, 5, 'gig', 'Organization', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(63, 13, 5, 'gig', 'Friendliness', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(64, 13, 5, 'gig', 'Area Expert', '4', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(65, 13, 5, 'gig', 'Safety', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(66, 14, 5, 'gig', 'Service', '4', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(67, 14, 5, 'gig', 'Organization', '4', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(68, 14, 5, 'gig', 'Friendliness', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(69, 14, 5, 'gig', 'Area Expert', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(70, 14, 5, 'gig', 'Safety', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(71, 15, 5, 'gig', 'Service', '4', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(72, 15, 5, 'gig', 'Organization', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(73, 15, 5, 'gig', 'Friendliness', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(74, 15, 5, 'gig', 'Area Expert', '4', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(75, 15, 5, 'gig', 'Safety', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(76, 16, 6, 'gig', 'Service', '4', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(77, 16, 6, 'gig', 'Organization', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(78, 16, 6, 'gig', 'Friendliness', '4', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(79, 16, 6, 'gig', 'Area Expert', '4', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(80, 16, 6, 'gig', 'Safety', '4', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(81, 17, 6, 'gig', 'Service', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(82, 17, 6, 'gig', 'Organization', '4', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(83, 17, 6, 'gig', 'Friendliness', '4', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(84, 17, 6, 'gig', 'Area Expert', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(85, 17, 6, 'gig', 'Safety', '4', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(86, 18, 6, 'gig', 'Service', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(87, 18, 6, 'gig', 'Organization', '4', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(88, 18, 6, 'gig', 'Friendliness', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(89, 18, 6, 'gig', 'Area Expert', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(90, 18, 6, 'gig', 'Safety', '4', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(91, 19, 7, 'gig', 'Service', '4', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(92, 19, 7, 'gig', 'Organization', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(93, 19, 7, 'gig', 'Friendliness', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(94, 19, 7, 'gig', 'Area Expert', '4', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(95, 19, 7, 'gig', 'Safety', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(96, 20, 7, 'gig', 'Service', '4', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(97, 20, 7, 'gig', 'Organization', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(98, 20, 7, 'gig', 'Friendliness', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(99, 20, 7, 'gig', 'Area Expert', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(100, 20, 7, 'gig', 'Safety', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(101, 21, 7, 'gig', 'Service', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(102, 21, 7, 'gig', 'Organization', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(103, 21, 7, 'gig', 'Friendliness', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(104, 21, 7, 'gig', 'Area Expert', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(105, 21, 7, 'gig', 'Safety', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(106, 22, 8, 'gig', 'Service', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(107, 22, 8, 'gig', 'Organization', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(108, 22, 8, 'gig', 'Friendliness', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(109, 22, 8, 'gig', 'Area Expert', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(110, 22, 8, 'gig', 'Safety', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(111, 23, 8, 'gig', 'Service', '4', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(112, 23, 8, 'gig', 'Organization', '5', 1, NULL, '2023-06-06 05:58:55', '2023-06-06 05:58:55'),
(113, 23, 8, 'gig', 'Friendliness', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(114, 23, 8, 'gig', 'Area Expert', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(115, 23, 8, 'gig', 'Safety', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(116, 24, 8, 'gig', 'Service', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(117, 24, 8, 'gig', 'Organization', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(118, 24, 8, 'gig', 'Friendliness', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(119, 24, 8, 'gig', 'Area Expert', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(120, 24, 8, 'gig', 'Safety', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(121, 25, 9, 'gig', 'Service', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(122, 25, 9, 'gig', 'Organization', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(123, 25, 9, 'gig', 'Friendliness', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(124, 25, 9, 'gig', 'Area Expert', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(125, 25, 9, 'gig', 'Safety', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(126, 26, 9, 'gig', 'Service', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(127, 26, 9, 'gig', 'Organization', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(128, 26, 9, 'gig', 'Friendliness', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(129, 26, 9, 'gig', 'Area Expert', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(130, 26, 9, 'gig', 'Safety', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(131, 27, 9, 'gig', 'Service', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(132, 27, 9, 'gig', 'Organization', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(133, 27, 9, 'gig', 'Friendliness', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(134, 27, 9, 'gig', 'Area Expert', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(135, 27, 9, 'gig', 'Safety', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(136, 28, 10, 'gig', 'Service', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(137, 28, 10, 'gig', 'Organization', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(138, 28, 10, 'gig', 'Friendliness', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(139, 28, 10, 'gig', 'Area Expert', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(140, 28, 10, 'gig', 'Safety', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(141, 29, 10, 'gig', 'Service', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(142, 29, 10, 'gig', 'Organization', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(143, 29, 10, 'gig', 'Friendliness', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(144, 29, 10, 'gig', 'Area Expert', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(145, 29, 10, 'gig', 'Safety', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(146, 30, 10, 'gig', 'Service', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(147, 30, 10, 'gig', 'Organization', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(148, 30, 10, 'gig', 'Friendliness', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(149, 30, 10, 'gig', 'Area Expert', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(150, 30, 10, 'gig', 'Safety', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(151, 31, 11, 'gig', 'Service', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(152, 31, 11, 'gig', 'Organization', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(153, 31, 11, 'gig', 'Friendliness', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(154, 31, 11, 'gig', 'Area Expert', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(155, 31, 11, 'gig', 'Safety', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(156, 32, 11, 'gig', 'Service', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(157, 32, 11, 'gig', 'Organization', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(158, 32, 11, 'gig', 'Friendliness', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(159, 32, 11, 'gig', 'Area Expert', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(160, 32, 11, 'gig', 'Safety', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(161, 33, 11, 'gig', 'Service', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(162, 33, 11, 'gig', 'Organization', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(163, 33, 11, 'gig', 'Friendliness', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(164, 33, 11, 'gig', 'Area Expert', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(165, 33, 11, 'gig', 'Safety', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(166, 34, 12, 'gig', 'Service', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(167, 34, 12, 'gig', 'Organization', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(168, 34, 12, 'gig', 'Friendliness', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(169, 34, 12, 'gig', 'Area Expert', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(170, 34, 12, 'gig', 'Safety', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(171, 35, 12, 'gig', 'Service', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(172, 35, 12, 'gig', 'Organization', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(173, 35, 12, 'gig', 'Friendliness', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(174, 35, 12, 'gig', 'Area Expert', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(175, 35, 12, 'gig', 'Safety', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(176, 36, 12, 'gig', 'Service', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(177, 36, 12, 'gig', 'Organization', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(178, 36, 12, 'gig', 'Friendliness', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(179, 36, 12, 'gig', 'Area Expert', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(180, 36, 12, 'gig', 'Safety', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(181, 37, 13, 'gig', 'Service', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(182, 37, 13, 'gig', 'Organization', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(183, 37, 13, 'gig', 'Friendliness', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(184, 37, 13, 'gig', 'Area Expert', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(185, 37, 13, 'gig', 'Safety', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(186, 38, 13, 'gig', 'Service', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(187, 38, 13, 'gig', 'Organization', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(188, 38, 13, 'gig', 'Friendliness', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(189, 38, 13, 'gig', 'Area Expert', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(190, 38, 13, 'gig', 'Safety', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(191, 39, 13, 'gig', 'Service', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(192, 39, 13, 'gig', 'Organization', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(193, 39, 13, 'gig', 'Friendliness', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(194, 39, 13, 'gig', 'Area Expert', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(195, 39, 13, 'gig', 'Safety', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(196, 40, 14, 'gig', 'Service', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(197, 40, 14, 'gig', 'Organization', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(198, 40, 14, 'gig', 'Friendliness', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(199, 40, 14, 'gig', 'Area Expert', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(200, 40, 14, 'gig', 'Safety', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(201, 41, 14, 'gig', 'Service', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(202, 41, 14, 'gig', 'Organization', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(203, 41, 14, 'gig', 'Friendliness', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(204, 41, 14, 'gig', 'Area Expert', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(205, 41, 14, 'gig', 'Safety', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(206, 42, 14, 'gig', 'Service', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(207, 42, 14, 'gig', 'Organization', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(208, 42, 14, 'gig', 'Friendliness', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(209, 42, 14, 'gig', 'Area Expert', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(210, 42, 14, 'gig', 'Safety', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(211, 43, 15, 'gig', 'Service', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(212, 43, 15, 'gig', 'Organization', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(213, 43, 15, 'gig', 'Friendliness', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(214, 43, 15, 'gig', 'Area Expert', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(215, 43, 15, 'gig', 'Safety', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(216, 44, 15, 'gig', 'Service', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(217, 44, 15, 'gig', 'Organization', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(218, 44, 15, 'gig', 'Friendliness', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(219, 44, 15, 'gig', 'Area Expert', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(220, 44, 15, 'gig', 'Safety', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(221, 45, 15, 'gig', 'Service', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(222, 45, 15, 'gig', 'Organization', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(223, 45, 15, 'gig', 'Friendliness', '4', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(224, 45, 15, 'gig', 'Area Expert', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(225, 45, 15, 'gig', 'Safety', '5', 1, NULL, '2023-06-06 05:58:56', '2023-06-06 05:58:56'),
(226, 46, 16, 'gig', 'Service', '5', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(227, 46, 16, 'gig', 'Organization', '4', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(228, 46, 16, 'gig', 'Friendliness', '4', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(229, 46, 16, 'gig', 'Area Expert', '5', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(230, 46, 16, 'gig', 'Safety', '5', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(231, 47, 16, 'gig', 'Service', '5', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(232, 47, 16, 'gig', 'Organization', '5', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(233, 47, 16, 'gig', 'Friendliness', '4', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(234, 47, 16, 'gig', 'Area Expert', '4', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(235, 47, 16, 'gig', 'Safety', '4', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(236, 48, 16, 'gig', 'Service', '4', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(237, 48, 16, 'gig', 'Organization', '4', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(238, 48, 16, 'gig', 'Friendliness', '5', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(239, 48, 16, 'gig', 'Area Expert', '5', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(240, 48, 16, 'gig', 'Safety', '4', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(241, 49, 17, 'gig', 'Service', '4', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(242, 49, 17, 'gig', 'Organization', '4', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(243, 49, 17, 'gig', 'Friendliness', '5', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(244, 49, 17, 'gig', 'Area Expert', '4', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(245, 49, 17, 'gig', 'Safety', '4', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(246, 50, 17, 'gig', 'Service', '5', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(247, 50, 17, 'gig', 'Organization', '5', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(248, 50, 17, 'gig', 'Friendliness', '5', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(249, 50, 17, 'gig', 'Area Expert', '5', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(250, 50, 17, 'gig', 'Safety', '4', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(251, 51, 17, 'gig', 'Service', '4', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(252, 51, 17, 'gig', 'Organization', '5', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(253, 51, 17, 'gig', 'Friendliness', '5', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(254, 51, 17, 'gig', 'Area Expert', '4', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(255, 51, 17, 'gig', 'Safety', '4', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(256, 52, 18, 'gig', 'Service', '4', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(257, 52, 18, 'gig', 'Organization', '5', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(258, 52, 18, 'gig', 'Friendliness', '4', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(259, 52, 18, 'gig', 'Area Expert', '4', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(260, 52, 18, 'gig', 'Safety', '5', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(261, 53, 18, 'gig', 'Service', '4', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(262, 53, 18, 'gig', 'Organization', '4', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(263, 53, 18, 'gig', 'Friendliness', '4', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(264, 53, 18, 'gig', 'Area Expert', '5', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(265, 53, 18, 'gig', 'Safety', '4', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(266, 54, 18, 'gig', 'Service', '5', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(267, 54, 18, 'gig', 'Organization', '5', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(268, 54, 18, 'gig', 'Friendliness', '4', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(269, 54, 18, 'gig', 'Area Expert', '4', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(270, 54, 18, 'gig', 'Safety', '4', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(271, 55, 19, 'gig', 'Service', '4', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(272, 55, 19, 'gig', 'Organization', '5', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(273, 55, 19, 'gig', 'Friendliness', '4', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(274, 55, 19, 'gig', 'Area Expert', '5', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(275, 55, 19, 'gig', 'Safety', '4', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(276, 56, 19, 'gig', 'Service', '4', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(277, 56, 19, 'gig', 'Organization', '5', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(278, 56, 19, 'gig', 'Friendliness', '5', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(279, 56, 19, 'gig', 'Area Expert', '5', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(280, 56, 19, 'gig', 'Safety', '4', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(281, 57, 19, 'gig', 'Service', '5', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(282, 57, 19, 'gig', 'Organization', '4', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(283, 57, 19, 'gig', 'Friendliness', '4', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(284, 57, 19, 'gig', 'Area Expert', '4', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(285, 57, 19, 'gig', 'Safety', '5', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(286, 58, 20, 'gig', 'Service', '5', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(287, 58, 20, 'gig', 'Organization', '4', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(288, 58, 20, 'gig', 'Friendliness', '4', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(289, 58, 20, 'gig', 'Area Expert', '5', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(290, 58, 20, 'gig', 'Safety', '4', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(291, 59, 20, 'gig', 'Service', '5', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(292, 59, 20, 'gig', 'Organization', '4', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(293, 59, 20, 'gig', 'Friendliness', '5', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(294, 59, 20, 'gig', 'Area Expert', '5', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(295, 59, 20, 'gig', 'Safety', '5', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(296, 60, 20, 'gig', 'Service', '5', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(297, 60, 20, 'gig', 'Organization', '4', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(298, 60, 20, 'gig', 'Friendliness', '4', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(299, 60, 20, 'gig', 'Area Expert', '5', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57'),
(300, 60, 20, 'gig', 'Safety', '5', 1, NULL, '2023-06-06 05:58:57', '2023-06-06 05:58:57');

-- --------------------------------------------------------

--
-- Table structure for table `bc_seo`
--

DROP TABLE IF EXISTS `bc_seo`;
CREATE TABLE IF NOT EXISTS `bc_seo` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `object_id` int DEFAULT NULL,
  `object_model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_index` tinyint DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_desc` text COLLATE utf8mb4_unicode_ci,
  `seo_image` int DEFAULT NULL,
  `seo_share` text COLLATE utf8mb4_unicode_ci,
  `create_user` bigint DEFAULT NULL,
  `update_user` bigint DEFAULT NULL,
  `origin_id` bigint DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bc_seo`
--

INSERT INTO `bc_seo` (`id`, `object_id`, `object_model`, `seo_index`, `seo_title`, `seo_desc`, `seo_image`, `seo_share`, `create_user`, `update_user`, `origin_id`, `lang`, `created_at`, `updated_at`) VALUES
(1, 4, 'page', 1, NULL, NULL, NULL, '{\"facebook\":{\"title\":null,\"desc\":null,\"image\":null},\"twitter\":{\"title\":null,\"desc\":null,\"image\":null}}', 1, 1, NULL, NULL, '2023-06-07 00:22:29', '2023-06-09 00:47:14'),
(2, 1, 'companies', 1, NULL, NULL, NULL, '{\"facebook\":{\"title\":null,\"desc\":null,\"image\":null},\"twitter\":{\"title\":null,\"desc\":null,\"image\":null}}', 1, 1, NULL, NULL, '2023-06-14 02:33:08', '2023-06-14 02:37:24'),
(3, 6, 'companies', 1, NULL, NULL, NULL, '{\"facebook\":{\"title\":null,\"desc\":null,\"image\":null},\"twitter\":{\"title\":null,\"desc\":null,\"image\":null}}', 1, 1, NULL, NULL, '2023-06-14 02:35:03', '2023-06-14 02:37:01'),
(4, 7, 'companies', 1, NULL, NULL, NULL, '{\"facebook\":{\"title\":null,\"desc\":null,\"image\":null},\"twitter\":{\"title\":null,\"desc\":null,\"image\":null}}', 1, 1, NULL, NULL, '2023-06-14 02:35:57', '2023-06-14 02:36:27'),
(5, 9, 'location', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-06-15 02:09:27', '2023-06-15 02:09:27'),
(6, 10, 'location', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-06-15 02:09:51', '2023-06-15 02:09:51'),
(7, 11, 'location', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-06-15 02:10:00', '2023-06-15 02:10:00'),
(8, 12, 'location', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-06-15 02:10:11', '2023-06-15 02:10:11'),
(9, 13, 'location', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-06-15 02:20:38', '2023-06-15 02:20:38'),
(10, 9, 'companies', 1, NULL, NULL, NULL, '{\"facebook\":{\"title\":null,\"desc\":null,\"image\":null},\"twitter\":{\"title\":null,\"desc\":null,\"image\":null}}', 16, NULL, NULL, NULL, '2023-06-20 01:24:21', '2023-06-20 01:24:21'),
(11, 13, 'job', 1, NULL, NULL, NULL, '{\"facebook\":{\"title\":null,\"desc\":null,\"image\":null},\"twitter\":{\"title\":null,\"desc\":null,\"image\":null}}', 16, NULL, NULL, NULL, '2023-06-20 01:26:05', '2023-06-20 01:26:05'),
(12, 14, 'job', 1, NULL, NULL, NULL, '{\"facebook\":{\"title\":null,\"desc\":null,\"image\":null},\"twitter\":{\"title\":null,\"desc\":null,\"image\":null}}', 16, NULL, NULL, NULL, '2023-06-20 01:27:12', '2023-06-20 01:27:12');

-- --------------------------------------------------------

--
-- Table structure for table `bc_services`
--

DROP TABLE IF EXISTS `bc_services`;
CREATE TABLE IF NOT EXISTS `bc_services` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `category_id` int DEFAULT NULL,
  `location_id` int DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_lat` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_lng` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` tinyint DEFAULT NULL,
  `star_rate` tinyint DEFAULT NULL,
  `price` decimal(12,2) DEFAULT NULL,
  `sale_price` decimal(12,2) DEFAULT NULL,
  `min_people` int DEFAULT NULL,
  `max_people` int DEFAULT NULL,
  `max_guests` int DEFAULT NULL,
  `review_score` int DEFAULT NULL,
  `min_day_before_booking` int DEFAULT NULL,
  `min_day_stays` int DEFAULT NULL,
  `object_id` int DEFAULT NULL,
  `object_model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bc_services_slug_index` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bc_service_translations`
--

DROP TABLE IF EXISTS `bc_service_translations`;
CREATE TABLE IF NOT EXISTS `bc_service_translations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `origin_id` bigint DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `content` text COLLATE utf8mb4_unicode_ci,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bc_service_translations_origin_id_locale_unique` (`origin_id`,`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bc_skills`
--

DROP TABLE IF EXISTS `bc_skills`;
CREATE TABLE IF NOT EXISTS `bc_skills` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bc_skills`
--

INSERT INTO `bc_skills` (`id`, `name`, `slug`, `status`, `create_user`, `update_user`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'app', 'app', 'publish', NULL, NULL, NULL, '2023-06-06 05:58:51', '2023-06-06 05:58:51'),
(2, 'administrative', 'administrative', 'publish', NULL, NULL, NULL, '2023-06-06 05:58:51', '2023-06-06 05:58:51'),
(3, 'android', 'android', 'publish', NULL, NULL, NULL, '2023-06-06 05:58:51', '2023-06-06 05:58:51'),
(4, 'wordpress', 'wordpress', 'publish', NULL, NULL, NULL, '2023-06-06 05:58:51', '2023-06-06 05:58:51'),
(5, 'design', 'design', 'publish', NULL, NULL, NULL, '2023-06-06 05:58:51', '2023-06-06 05:58:51'),
(6, 'react', 'react', 'publish', NULL, NULL, NULL, '2023-06-06 05:58:51', '2023-06-06 05:58:51'),
(7, 'javascript', 'javascript', 'publish', NULL, NULL, NULL, '2023-06-06 05:58:51', '2023-06-06 05:58:51'),
(8, 'html', 'html', 'publish', NULL, NULL, NULL, '2023-06-06 05:58:51', '2023-06-06 05:58:51');

-- --------------------------------------------------------

--
-- Table structure for table `bc_skill_translations`
--

DROP TABLE IF EXISTS `bc_skill_translations`;
CREATE TABLE IF NOT EXISTS `bc_skill_translations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `origin_id` bigint DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bc_skill_translations_origin_id_locale_unique` (`origin_id`,`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bc_terms`
--

DROP TABLE IF EXISTS `bc_terms`;
CREATE TABLE IF NOT EXISTS `bc_terms` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `attr_id` int DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` bigint DEFAULT NULL,
  `update_user` bigint DEFAULT NULL,
  `origin_id` bigint DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `image_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bc_terms`
--

INSERT INTO `bc_terms` (`id`, `name`, `content`, `attr_id`, `slug`, `create_user`, `update_user`, `origin_id`, `lang`, `created_at`, `updated_at`, `icon`, `deleted_at`, `image_id`) VALUES
(1, '10-50 Members', NULL, 1, '10-50-member', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '50-100 Members', NULL, 1, '50-100-member', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '100-200 Members', NULL, 1, '100-200-member', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '200-500 Members', NULL, 1, '200-500-member', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '500-1000 Members', NULL, 1, '500-1000-member', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '1000-10000 Members', NULL, 1, '1000-10000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bc_terms_translations`
--

DROP TABLE IF EXISTS `bc_terms_translations`;
CREATE TABLE IF NOT EXISTS `bc_terms_translations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `origin_id` bigint DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `create_user` bigint DEFAULT NULL,
  `update_user` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bc_terms_translations_origin_id_locale_unique` (`origin_id`,`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `core_inbox`
--

DROP TABLE IF EXISTS `core_inbox`;
CREATE TABLE IF NOT EXISTS `core_inbox` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `from_user` bigint DEFAULT NULL,
  `to_user` bigint DEFAULT NULL,
  `object_id` bigint DEFAULT NULL,
  `object_model` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` tinyint DEFAULT '0',
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `core_inbox_messages`
--

DROP TABLE IF EXISTS `core_inbox_messages`;
CREATE TABLE IF NOT EXISTS `core_inbox_messages` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `inbox_id` bigint DEFAULT NULL,
  `from_user` bigint DEFAULT NULL,
  `to_user` bigint DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `type` tinyint DEFAULT '0',
  `is_read` tinyint DEFAULT '0',
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `core_languages`
--

DROP TABLE IF EXISTS `core_languages`;
CREATE TABLE IF NOT EXISTS `core_languages` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `last_build_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `core_languages`
--

INSERT INTO `core_languages` (`id`, `locale`, `name`, `flag`, `status`, `create_user`, `update_user`, `last_build_at`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'en', 'English', 'gb', 'publish', 1, NULL, NULL, NULL, '2023-06-06 05:58:46', '2023-06-06 05:58:46'),
(2, 'ja', 'Japanese', 'jp', 'publish', 1, NULL, NULL, NULL, '2023-06-06 05:58:46', '2023-06-06 05:58:46'),
(3, 'egy', 'Egyptian', 'eg', 'publish', 1, NULL, NULL, NULL, '2023-06-06 05:58:46', '2023-06-06 05:58:46');

-- --------------------------------------------------------

--
-- Table structure for table `core_menus`
--

DROP TABLE IF EXISTS `core_menus`;
CREATE TABLE IF NOT EXISTS `core_menus` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `items` longtext COLLATE utf8mb4_unicode_ci,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `origin_id` bigint DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `core_menus`
--

INSERT INTO `core_menus` (`id`, `name`, `items`, `create_user`, `update_user`, `origin_id`, `lang`, `created_at`, `updated_at`) VALUES
(1, 'Main Menu', '[{\"name\":\"Home\",\"url\":\"http:\\/\\/localhost\\/rvoize\\/public\\/\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"is_removed\":true,\"_open\":false,\"children\":[]},{\"name\":\"About Us\",\"url\":\"http:\\/\\/localhost\\/rvoize\\/public\\/page\\/about\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"is_removed\":true,\"_open\":false,\"children\":[]},{\"name\":\"Employers\",\"url\":\"http:\\/\\/localhost\\/rvoize\\/public\\/companies\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"is_removed\":true,\"_open\":true,\"children\":[]},{\"name\":\"Jobs\",\"url\":\"http:\\/\\/localhost\\/rvoize\\/public\\/job\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"is_removed\":true,\"_open\":false,\"children\":[]},{\"name\":\"Contact Us\",\"url\":\"http:\\/\\/localhost\\/rvoize\\/public\\/contact\",\"item_model\":\"custom\",\"_open\":false,\"model_name\":\"Custom\",\"is_removed\":true}]', 1, 1, NULL, NULL, '2023-06-06 05:58:47', '2023-06-18 23:05:25');

-- --------------------------------------------------------

--
-- Table structure for table `core_menu_translations`
--

DROP TABLE IF EXISTS `core_menu_translations`;
CREATE TABLE IF NOT EXISTS `core_menu_translations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `origin_id` int UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `items` longtext COLLATE utf8mb4_unicode_ci,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `core_menu_translations_locale_index` (`locale`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `core_menu_translations`
--

INSERT INTO `core_menu_translations` (`id`, `origin_id`, `locale`, `items`, `create_user`, `update_user`, `created_at`, `updated_at`) VALUES
(1, 1, 'ja', '[{\"name\":\"\\u30db\\u30fc\\u30e0\\u30da\\u30fc\\u30b8\",\"url\":\"\\/ja\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[{\"name\":\"\\u30db\\u30fc\\u30e0\\u30da\\u30fc\\u30b801\",\"url\":\"\\/ja\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"\\u30db\\u30fc\\u30e0\\u30da\\u30fc\\u30b802\",\"url\":\"\\/ja\\/page\\/home-page-2\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"\\u30db\\u30fc\\u30e0\\u30da\\u30fc\\u30b803\",\"url\":\"\\/ja\\/page\\/home-page-3\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"\\u30db\\u30fc\\u30e0\\u30da\\u30fc\\u30b804\",\"url\":\"\\/ja\\/page\\/home-page-4\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"\\u30db\\u30fc\\u30e0\\u30da\\u30fc\\u30b805\",\"url\":\"\\/ja\\/page\\/home-page-5\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"\\u30db\\u30fc\\u30e0\\u30da\\u30fc\\u30b806\",\"url\":\"\\/ja\\/page\\/home-page-6\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"\\u30db\\u30fc\\u30e0\\u30da\\u30fc\\u30b807\",\"url\":\"\\/ja\\/page\\/home-page-7\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"\\u30db\\u30fc\\u30e0\\u30da\\u30fc\\u30b808\",\"url\":\"\\/ja\\/page\\/home-page-8\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"\\u30db\\u30fc\\u30e0\\u30da\\u30fc\\u30b809\",\"url\":\"\\/ja\\/page\\/home-page-9\",\"item_model\":\"custom\",\"children\":[]}]},{\"name\":\"GIG\",\"url\":\"\\/ja\\/gig\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[{\"name\":\"\\u30ab\\u30c6\\u30b4\\u30ea\\u30ec\\u30d9\\u30eb1\",\"url\":\"\\/ja\\/gig-cat\\/graphics-design\",\"item_model\":\"custom\"},{\"name\":\"\\u30ab\\u30c6\\u30b4\\u30ea\\u30ec\\u30d9\\u30eb2\",\"url\":\"\\/ja\\/gig-cat\\/logo-design\",\"item_model\":\"custom\"},{\"name\":\"\\u30ae\\u30b0\\u30ea\\u30b9\\u30c8\",\"url\":\"\\/ja\\/gig\",\"item_model\":\"custom\"},{\"name\":\"\\u30ae\\u30b0\\u306e\\u8a73\\u7d30\",\"url\":\"\\/ja\\/gig\\/i-will-quod-corrupti-veritatis\",\"item_model\":\"custom\"}]},{\"name\":\"\\u4ed5\\u4e8b\\u3092\\u63a2\\u3059\",\"url\":\"\\/ja\\/\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[{\"name\":\"\\u30b8\\u30e7\\u30d6\\u30ea\\u30b9\\u30c8\",\"url\":\"\\/ja\\/job\",\"item_model\":\"custom\",\"children\":[{\"name\":\"\\u30b8\\u30e7\\u30d6\\u30ea\\u30b9\\u30c8V1\",\"url\":\"\\/ja\\/job\",\"item_model\":\"custom\"},{\"name\":\"\\u30b8\\u30e7\\u30d6\\u30ea\\u30b9\\u30c8V2\",\"url\":\"\\/ja\\/job?_layout=v2\",\"item_model\":\"custom\"},{\"name\":\"\\u30b8\\u30e7\\u30d6\\u30ea\\u30b9\\u30c8V3\",\"url\":\"\\/ja\\/job?_layout=v3\",\"item_model\":\"custom\"},{\"name\":\"\\u30b8\\u30e7\\u30d6\\u30ea\\u30b9\\u30c8V4\",\"url\":\"\\/ja\\/job?_layout=v4\",\"item_model\":\"custom\"},{\"name\":\"\\u30b8\\u30e7\\u30d6\\u30ea\\u30b9\\u30c8V5\",\"url\":\"\\/ja\\/job?_layout=v5\",\"item_model\":\"custom\"},{\"name\":\"\\u30b8\\u30e7\\u30d6\\u30ea\\u30b9\\u30c8V6\",\"url\":\"\\/ja\\/job?_layout=v6\",\"item_model\":\"custom\"},{\"name\":\"\\u30b8\\u30e7\\u30d6\\u30ea\\u30b9\\u30c8V7\",\"url\":\"\\/ja\\/job?_layout=v7\",\"item_model\":\"custom\"},{\"name\":\"\\u30b8\\u30e7\\u30d6\\u30ea\\u30b9\\u30c8V8\",\"url\":\"\\/ja\\/job?_layout=v8\",\"item_model\":\"custom\"},{\"name\":\"\\u30b8\\u30e7\\u30d6\\u30ea\\u30b9\\u30c8V9\",\"url\":\"\\/ja\\/job?_layout=v9\",\"item_model\":\"custom\"}]},{\"name\":\"\\u4ed5\\u4e8b\\u306e\\u8a73\\u7d30\",\"url\":\"\\/ja\\/job\\/product-designer-ui-designer\",\"item_model\":\"custom\",\"children\":[{\"name\":\"\\u30b8\\u30e7\\u30d6\\u306e\\u8a73\\u7d30V1\",\"url\":\"\\/ja\\/job\\/product-designer-ui-designer\",\"item_model\":\"custom\"},{\"name\":\"\\u30b8\\u30e7\\u30d6\\u306e\\u8a73\\u7d30V2\",\"url\":\"\\/ja\\/job\\/product-designer-ui-designer?_layout=v2\",\"item_model\":\"custom\"},{\"name\":\"\\u30b8\\u30e7\\u30d6\\u306e\\u8a73\\u7d30V3\",\"url\":\"\\/ja\\/job\\/product-designer-ui-designer?_layout=v3\",\"item_model\":\"custom\"},{\"name\":\"\\u30b8\\u30e7\\u30d6\\u306e\\u8a73\\u7d30V4\",\"url\":\"\\/ja\\/job\\/restaurant-team-member?_layout=v4\",\"item_model\":\"custom\"},{\"name\":\"\\u30b8\\u30e7\\u30d6\\u306e\\u8a73\\u7d30V5\",\"url\":\"\\/ja\\/job\\/product-designer-ui-designer?_layout=v5\",\"item_model\":\"custom\"},{\"name\":\"\\u30b8\\u30e7\\u30d6\\u2013\\u5185\\u90e8\\u9069\\u7528\",\"url\":\"\\/ja\\/job\\/product-designer-ui-designer\",\"item_model\":\"custom\"},{\"name\":\"\\u30b8\\u30e7\\u30d6\\u2013\\u5916\\u90e8\\u9069\\u7528\",\"url\":\"\\/ja\\/job\\/software-engineer-android-lib\",\"item_model\":\"custom\"},{\"name\":\"\\u4ed5\\u4e8b\\u2013\\u30e1\\u30fc\\u30eb\\u3067\\u7533\\u3057\\u8fbc\\u3080\",\"url\":\"\\/ja\\/job\\/group-marketing-manager\",\"item_model\":\"custom\"}]}]},{\"name\":\"\\u96c7\\u7528\\u4e3b\",\"url\":\"\\/\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[{\"name\":\"\\u96c7\\u7528\\u8005\\u30ea\\u30b9\\u30c8\",\"url\":\"\\/ja\\/companies\",\"item_model\":\"custom\",\"children\":[{\"name\":\"\\u96c7\\u7528\\u8005\\u30ea\\u30b9\\u30c8V1\",\"url\":\"\\/ja\\/companies?_layout=v1\",\"item_model\":\"custom\"},{\"name\":\"\\u96c7\\u7528\\u8005\\u30ea\\u30b9\\u30c8V2\",\"url\":\"\\/ja\\/companies?_layout=v2\",\"item_model\":\"custom\"},{\"name\":\"\\u96c7\\u7528\\u8005\\u30ea\\u30b9\\u30c8V3\",\"url\":\"\\/ja\\/companies?_layout=v3\",\"item_model\":\"custom\"},{\"name\":\"\\u96c7\\u7528\\u8005\\u30ea\\u30b9\\u30c8V4\",\"url\":\"\\/ja\\/companies?_layout=v4\",\"item_model\":\"custom\"}]},{\"name\":\"\\u96c7\\u7528\\u4e3b\\u306e\\u8a73\\u7d30\",\"url\":\"\\/ja\\/companies\\/netflix\",\"item_model\":\"custom\",\"children\":[{\"name\":\"\\u96c7\\u7528\\u4e3b\\u306e\\u8a73\\u7d30V1\",\"url\":\"\\/ja\\/companies\\/netflix?_layout=v1\",\"item_model\":\"custom\"},{\"name\":\"\\u96c7\\u7528\\u4e3b\\u306e\\u8a73\\u7d30V2\",\"url\":\"\\/ja\\/companies\\/netflix?_layout=v2\",\"item_model\":\"custom\"},{\"name\":\"\\u96c7\\u7528\\u4e3b\\u306e\\u8a73\\u7d30V3\",\"url\":\"\\/ja\\/companies\\/netflix?_layout=v3\",\"item_model\":\"custom\"}]}]},{\"name\":\"\\u5019\\u88dc\\u8005\",\"url\":\"\\/\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[{\"name\":\"\\u5019\\u88dc\\u8005\\u30ea\\u30b9\\u30c8\",\"url\":\"\\/ja\\/candidate\",\"item_model\":\"custom\",\"children\":[{\"name\":\"\\u5019\\u88dc\\u8005\\u30ea\\u30b9\\u30c8V1\",\"url\":\"\\/ja\\/candidate?_layout=v1\",\"item_model\":\"custom\"},{\"name\":\"\\u5019\\u88dc\\u8005\\u30ea\\u30b9\\u30c8V2\",\"url\":\"\\/ja\\/candidate?_layout=v2\",\"item_model\":\"custom\"},{\"name\":\"\\u5019\\u88dc\\u8005\\u30ea\\u30b9\\u30c8V3\",\"url\":\"\\/ja\\/candidate?_layout=v3\",\"item_model\":\"custom\"},{\"name\":\"\\u5019\\u88dc\\u8005\\u30ea\\u30b9\\u30c8V4\",\"url\":\"\\/ja\\/candidate?_layout=v4\",\"item_model\":\"custom\"},{\"name\":\"\\u5019\\u88dc\\u8005\\u30ea\\u30b9\\u30c8V5\",\"url\":\"\\/ja\\/candidate?_layout=v5\",\"item_model\":\"custom\"}]},{\"name\":\"\\u5019\\u88dc\\u8005\\u306e\\u8a73\\u7d30\",\"url\":\"\\/ja\\/candidate\\/ui-designer-at-invision-1\",\"item_model\":\"custom\",\"children\":[{\"name\":\"\\u5019\\u88dc\\u8005\\u306e\\u8a73\\u7d30V1\",\"url\":\"\\/ja\\/candidate\\/ui-designer-at-invision-1\",\"item_model\":\"custom\"},{\"name\":\"\\u5019\\u88dc\\u8005\\u306e\\u8a73\\u7d30V2\",\"url\":\"\\/ja\\/candidate\\/ui-designer-at-invision-1?_layout=v2\",\"item_model\":\"custom\"},{\"name\":\"\\u5019\\u88dc\\u8005\\u306e\\u8a73\\u7d30V3\",\"url\":\"\\/ja\\/candidate\\/ui-designer-at-invision-1?_layout=v3\",\"item_model\":\"custom\"}]}]},{\"name\":\"\\u30da\\u30fc\\u30b8\",\"url\":\"\\/\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[{\"name\":\"\\u30d6\\u30ed\\u30b0\\u30ea\\u30b9\\u30c8\",\"url\":\"\\/ja\\/news\",\"item_model\":\"custom\"},{\"name\":\"\\u30d6\\u30ed\\u30b0\\u306e\\u8a73\\u7d30\",\"url\":\"\\/ja\\/news\\/5-tips-for-your-job-interviews\",\"item_model\":\"custom\"},{\"name\":\"\\u79c1\\u305f\\u3061\\u306b\\u95a2\\u3057\\u3066\\u306f\",\"url\":\"\\/ja\\/page\\/about\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"\\u3088\\u304f\\u3042\\u308b\\u8cea\\u554f\",\"url\":\"\\/ja\\/page\\/faqs\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"\\u898f\\u7d04\\u3068\\u6761\\u4ef6\",\"url\":\"\\/ja\\/page\\/terms-and-conditions\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"\\u9023\\u7d61\\u5148\",\"url\":\"\\/ja\\/contact\",\"item_model\":\"custom\",\"children\":[]}]}]', 1, NULL, '2023-06-06 05:58:47', NULL),
(2, 1, 'egy', '[{\"name\":\"Home\",\"url\":\"\\/egy\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[{\"name\":\"Home Page 01\",\"url\":\"\\/egy\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"Home Page 02\",\"url\":\"\\/egy\\/page\\/home-page-2\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"Home Page 03\",\"url\":\"\\/egy\\/page\\/home-page-3\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"Home Page 04\",\"url\":\"\\/egy\\/page\\/home-page-4\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"Home Page 05\",\"url\":\"\\/egy\\/page\\/home-page-5\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"Home Page 06\",\"url\":\"\\/egy\\/page\\/home-page-6\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"Home Page 07\",\"url\":\"\\/egy\\/page\\/home-page-7\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"Home Page 08\",\"url\":\"\\/egy\\/page\\/home-page-8\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"Home Page 09\",\"url\":\"\\/egy\\/page\\/home-page-9\",\"item_model\":\"custom\",\"children\":[]}]},{\"name\":\"GIG\",\"url\":\"\\/egy\\/gig\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[{\"name\":\"Category Level 1\",\"url\":\"\\/egy\\/gig-cat\\/graphics-design\",\"item_model\":\"custom\"},{\"name\":\"Category Level 2\",\"url\":\"\\/egy\\/gig-cat\\/logo-design\",\"item_model\":\"custom\"},{\"name\":\"Gigs Listing\",\"url\":\"\\/egy\\/gig\",\"item_model\":\"custom\"},{\"name\":\"Gig Single\",\"url\":\"\\/egy\\/gig\\/i-will-quod-corrupti-veritatis\",\"item_model\":\"custom\"}]},{\"name\":\"Find Jobs\",\"url\":\"\\/egy\\/\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[{\"name\":\"Jobs Listing\",\"url\":\"\\/egy\\/job\",\"item_model\":\"custom\",\"children\":[{\"name\":\"Jobs Listing V1\",\"url\":\"\\/egy\\/job\",\"item_model\":\"custom\"},{\"name\":\"Jobs Listing V2\",\"url\":\"\\/egy\\/job?_layout=v2\",\"item_model\":\"custom\"},{\"name\":\"Jobs Listing V3\",\"url\":\"\\/egy\\/job?_layout=v3\",\"item_model\":\"custom\"},{\"name\":\"Jobs Listing V4\",\"url\":\"\\/egy\\/job?_layout=v4\",\"item_model\":\"custom\"},{\"name\":\"Jobs Listing V5\",\"url\":\"\\/egy\\/job?_layout=v5\",\"item_model\":\"custom\"},{\"name\":\"Jobs Listing V6\",\"url\":\"\\/egy\\/job?_layout=v6\",\"item_model\":\"custom\"},{\"name\":\"Jobs Listing V7\",\"url\":\"\\/egy\\/job?_layout=v7\",\"item_model\":\"custom\"},{\"name\":\"Jobs Listing V8\",\"url\":\"\\/egy\\/job?_layout=v8\",\"item_model\":\"custom\"},{\"name\":\"Jobs Listing V9\",\"url\":\"\\/egy\\/job?_layout=v9\",\"item_model\":\"custom\"}]},{\"name\":\"Job Single\",\"url\":\"\\/egy\\/job\\/product-designer-ui-designer\",\"item_model\":\"custom\",\"children\":[{\"name\":\"Job Single V1\",\"url\":\"\\/egy\\/job\\/product-designer-ui-designer\",\"item_model\":\"custom\"},{\"name\":\"Job Single V2\",\"url\":\"\\/egy\\/job\\/product-designer-ui-designer?_layout=v2\",\"item_model\":\"custom\"},{\"name\":\"Job Single V3\",\"url\":\"\\/egy\\/job\\/product-designer-ui-designer?_layout=v3\",\"item_model\":\"custom\"},{\"name\":\"Job Single V4\",\"url\":\"\\/egy\\/job\\/restaurant-team-member?_layout=v4\",\"item_model\":\"custom\"},{\"name\":\"Job Single V5\",\"url\":\"\\/egy\\/job\\/product-designer-ui-designer?_layout=v5\",\"item_model\":\"custom\"},{\"name\":\"Job \\u2013 Internal Apply\",\"url\":\"\\/egy\\/job\\/product-designer-ui-designer\",\"item_model\":\"custom\"},{\"name\":\"Job \\u2013 External Apply\",\"url\":\"\\/egy\\/job\\/software-engineer-android-lib\",\"item_model\":\"custom\"},{\"name\":\"Job \\u2013 Email Apply\",\"url\":\"\\/egy\\/job\\/group-marketing-manager\",\"item_model\":\"custom\"}]}]},{\"name\":\"Employers\",\"url\":\"\\/egy\\/\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[{\"name\":\"Employers List\",\"url\":\"\\/egy\\/companies\",\"item_model\":\"custom\",\"children\":[{\"name\":\"Employers Listing V1\",\"url\":\"\\/egy\\/companies?_layout=v1\",\"item_model\":\"custom\"},{\"name\":\"Employers Listing V2\",\"url\":\"\\/egy\\/companies?_layout=v2\",\"item_model\":\"custom\"},{\"name\":\"Employers Listing V3\",\"url\":\"\\/egy\\/companies?_layout=v3\",\"item_model\":\"custom\"},{\"name\":\"Employers Listing V4\",\"url\":\"\\/egy\\/companies?_layout=v4\",\"item_model\":\"custom\"}]},{\"name\":\"Employer Single\",\"url\":\"\\/egy\\/companies\\/netflix\",\"item_model\":\"custom\",\"children\":[{\"name\":\"Employer Single V1\",\"url\":\"\\/egy\\/companies\\/netflix?_layout=v1\",\"item_model\":\"custom\"},{\"name\":\"Employer Single V2\",\"url\":\"\\/egy\\/companies\\/netflix?_layout=v2\",\"item_model\":\"custom\"},{\"name\":\"Employer Single V3\",\"url\":\"\\/egy\\/companies\\/netflix?_layout=v3\",\"item_model\":\"custom\"}]}]},{\"name\":\"Candidates\",\"url\":\"\\/egy\\/\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[{\"name\":\"Candidates List\",\"url\":\"\\/egy\\/candidate\",\"item_model\":\"custom\",\"children\":[{\"name\":\"Candidates Listing V1\",\"url\":\"\\/egy\\/candidate?_layout=v1\",\"item_model\":\"custom\"},{\"name\":\"Candidates Listing V2\",\"url\":\"\\/egy\\/candidate?_layout=v2\",\"item_model\":\"custom\"},{\"name\":\"Candidates Listing V3\",\"url\":\"\\/egy\\/candidate?_layout=v3\",\"item_model\":\"custom\"},{\"name\":\"Candidates Listing V4\",\"url\":\"\\/egy\\/candidate?_layout=v4\",\"item_model\":\"custom\"},{\"name\":\"Candidates Listing V5\",\"url\":\"\\/egy\\/candidate?_layout=v5\",\"item_model\":\"custom\"}]},{\"name\":\"Candidates Single\",\"url\":\"\\/egy\\/candidate\\/ui-designer-at-invision-1\",\"item_model\":\"custom\",\"children\":[{\"name\":\"Candidate Single V1\",\"url\":\"\\/egy\\/candidate\\/ui-designer-at-invision-1\",\"item_model\":\"custom\"},{\"name\":\"Candidate Single V2\",\"url\":\"\\/egy\\/candidate\\/ui-designer-at-invision-1?_layout=v2\",\"item_model\":\"custom\"},{\"name\":\"Candidate Single V3\",\"url\":\"\\/egy\\/candidate\\/ui-designer-at-invision-1?_layout=v3\",\"item_model\":\"custom\"}]}]},{\"name\":\"Pages\",\"url\":\"\\/egy\\/\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[{\"name\":\"Blog List\",\"url\":\"\\/egy\\/news\",\"item_model\":\"custom\"},{\"name\":\"Blog Single\",\"url\":\"\\/egy\\/news\\/5-tips-for-your-job-interviews\",\"item_model\":\"custom\"},{\"name\":\"About Us\",\"url\":\"\\/egy\\/page\\/about\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"FAQ\'s\",\"url\":\"\\/egy\\/page\\/faqs\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"Terms\",\"url\":\"\\/egy\\/page\\/terms-and-conditions\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"Contact\",\"url\":\"\\/egy\\/contact\",\"item_model\":\"custom\",\"children\":[]}]}]', 1, NULL, '2023-06-06 05:58:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `core_news`
--

DROP TABLE IF EXISTS `core_news`;
CREATE TABLE IF NOT EXISTS `core_news` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat_id` int DEFAULT NULL,
  `image_id` int DEFAULT NULL,
  `banner_id` int DEFAULT NULL,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `origin_id` bigint DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `core_news`
--

INSERT INTO `core_news` (`id`, `title`, `content`, `slug`, `status`, `cat_id`, `image_id`, `banner_id`, `create_user`, `update_user`, `deleted_at`, `origin_id`, `lang`, `created_at`, `updated_at`) VALUES
(1, 'Attract Sales And Profits', '<h4>Course Description</h4>\r\n                            <p>Aliquam hendrerit sollicitudin purus, quis rutrum mi accumsan nec. Quisque bibendum orci ac nibh facilisis, at malesuada orci congue. Nullam tempus sollicitudin cursus. Ut et adipiscing erat. Curabitur this is a text link libero tempus congue.</p>\r\n                            <p>Duis mattis laoreet neque, et ornare neque sollicitudin at. Proin sagittis dolor sed mi elementum pretium. Donec et justo ante. Vivamus egestas sodales est, eu rhoncus urna semper eu. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer tristique elit lobortis purus bibendum, quis dictum metus mattis. Phasellus posuere felis sed eros porttitor mattis. Curabitur massa magna, tempor in blandit id, porta in ligula. Aliquam laoreet nisl massa, at interdum mauris sollicitudin et.</p>\r\n                            <p><img src=\"/uploads/demo/news/img-detail.jpg\" alt=\"\" width=\"770\" height=\"450\" /></p>\r\n                            <h4>Requirements</h4>\r\n                            <ul style=\"list-style-type: square;\">\r\n                            <li>We do not require any previous experience or pre-defined skills to take this course. A great orientation would be enough to master UI/UX design.</li>\r\n                            <li>A computer with a good internet connection.</li>\r\n                            <li>Adobe Photoshop (OPTIONAL)</li>\r\n                            </ul>', 'attract-sales-and-profits', 'publish', 3, 32, 165, 1, NULL, NULL, NULL, NULL, '2023-06-06 05:58:50', NULL),
(2, '5 Tips For Your Job Interviews', '<h4>Course Description</h4>\r\n                            <p>Aliquam hendrerit sollicitudin purus, quis rutrum mi accumsan nec. Quisque bibendum orci ac nibh facilisis, at malesuada orci congue. Nullam tempus sollicitudin cursus. Ut et adipiscing erat. Curabitur this is a text link libero tempus congue.</p>\r\n                            <p>Duis mattis laoreet neque, et ornare neque sollicitudin at. Proin sagittis dolor sed mi elementum pretium. Donec et justo ante. Vivamus egestas sodales est, eu rhoncus urna semper eu. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer tristique elit lobortis purus bibendum, quis dictum metus mattis. Phasellus posuere felis sed eros porttitor mattis. Curabitur massa magna, tempor in blandit id, porta in ligula. Aliquam laoreet nisl massa, at interdum mauris sollicitudin et.</p>\r\n                            <p><img src=\"/uploads/demo/news/img-detail.jpg\" alt=\"\" width=\"770\" height=\"450\" /></p>\r\n                            <h4>Requirements</h4>\r\n                            <ul style=\"list-style-type: square;\">\r\n                            <li>We do not require any previous experience or pre-defined skills to take this course. A great orientation would be enough to master UI/UX design.</li>\r\n                            <li>A computer with a good internet connection.</li>\r\n                            <li>Adobe Photoshop (OPTIONAL)</li>\r\n                            </ul>', '5-tips-for-your-job-interviews', 'publish', 2, 33, 165, 1, NULL, NULL, NULL, NULL, '2023-06-06 05:58:50', NULL),
(3, 'An Overworked Newspaper Editor', '<h4>Course Description</h4>\r\n                            <p>Aliquam hendrerit sollicitudin purus, quis rutrum mi accumsan nec. Quisque bibendum orci ac nibh facilisis, at malesuada orci congue. Nullam tempus sollicitudin cursus. Ut et adipiscing erat. Curabitur this is a text link libero tempus congue.</p>\r\n                            <p>Duis mattis laoreet neque, et ornare neque sollicitudin at. Proin sagittis dolor sed mi elementum pretium. Donec et justo ante. Vivamus egestas sodales est, eu rhoncus urna semper eu. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer tristique elit lobortis purus bibendum, quis dictum metus mattis. Phasellus posuere felis sed eros porttitor mattis. Curabitur massa magna, tempor in blandit id, porta in ligula. Aliquam laoreet nisl massa, at interdum mauris sollicitudin et.</p>\r\n                            <p><img src=\"/uploads/demo/news/img-detail.jpg\" alt=\"\" width=\"770\" height=\"450\" /></p>\r\n                            <h4>Requirements</h4>\r\n                            <ul style=\"list-style-type: square;\">\r\n                            <li>We do not require any previous experience or pre-defined skills to take this course. A great orientation would be enough to master UI/UX design.</li>\r\n                            <li>A computer with a good internet connection.</li>\r\n                            <li>Adobe Photoshop (OPTIONAL)</li>\r\n                            </ul>', 'an-overworked-newspaper-editor', 'publish', 1, 34, 165, 1, NULL, NULL, NULL, NULL, '2023-06-06 05:58:50', NULL),
(4, 'Attract Sales And Profits', '<h4>Course Description</h4>\r\n                            <p>Aliquam hendrerit sollicitudin purus, quis rutrum mi accumsan nec. Quisque bibendum orci ac nibh facilisis, at malesuada orci congue. Nullam tempus sollicitudin cursus. Ut et adipiscing erat. Curabitur this is a text link libero tempus congue.</p>\r\n                            <p>Duis mattis laoreet neque, et ornare neque sollicitudin at. Proin sagittis dolor sed mi elementum pretium. Donec et justo ante. Vivamus egestas sodales est, eu rhoncus urna semper eu. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer tristique elit lobortis purus bibendum, quis dictum metus mattis. Phasellus posuere felis sed eros porttitor mattis. Curabitur massa magna, tempor in blandit id, porta in ligula. Aliquam laoreet nisl massa, at interdum mauris sollicitudin et.</p>\r\n                            <p><img src=\"/uploads/demo/news/img-detail.jpg\" alt=\"\" width=\"770\" height=\"450\" /></p>\r\n                            <h4>Requirements</h4>\r\n                            <ul style=\"list-style-type: square;\">\r\n                            <li>We do not require any previous experience or pre-defined skills to take this course. A great orientation would be enough to master UI/UX design.</li>\r\n                            <li>A computer with a good internet connection.</li>\r\n                            <li>Adobe Photoshop (OPTIONAL)</li>\r\n                            </ul>', 'attract-sales-and-profits-2', 'publish', 1, 35, 165, 1, NULL, NULL, NULL, NULL, '2023-06-06 05:58:50', NULL),
(5, '5 Tips For Your Job Interviews', '<h4>Course Description</h4>\r\n                            <p>Aliquam hendrerit sollicitudin purus, quis rutrum mi accumsan nec. Quisque bibendum orci ac nibh facilisis, at malesuada orci congue. Nullam tempus sollicitudin cursus. Ut et adipiscing erat. Curabitur this is a text link libero tempus congue.</p>\r\n                            <p>Duis mattis laoreet neque, et ornare neque sollicitudin at. Proin sagittis dolor sed mi elementum pretium. Donec et justo ante. Vivamus egestas sodales est, eu rhoncus urna semper eu. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer tristique elit lobortis purus bibendum, quis dictum metus mattis. Phasellus posuere felis sed eros porttitor mattis. Curabitur massa magna, tempor in blandit id, porta in ligula. Aliquam laoreet nisl massa, at interdum mauris sollicitudin et.</p>\r\n                            <p><img src=\"/uploads/demo/news/img-detail.jpg\" alt=\"\" width=\"770\" height=\"450\" /></p>\r\n                            <h4>Requirements</h4>\r\n                            <ul style=\"list-style-type: square;\">\r\n                            <li>We do not require any previous experience or pre-defined skills to take this course. A great orientation would be enough to master UI/UX design.</li>\r\n                            <li>A computer with a good internet connection.</li>\r\n                            <li>Adobe Photoshop (OPTIONAL)</li>\r\n                            </ul>', '5-tips-for-your-job-interviews-2', 'publish', 1, 36, 165, 1, NULL, NULL, NULL, NULL, '2023-06-06 05:58:50', NULL),
(6, 'An Overworked Newspaper Editor', '<h4>Course Description</h4>\r\n                            <p>Aliquam hendrerit sollicitudin purus, quis rutrum mi accumsan nec. Quisque bibendum orci ac nibh facilisis, at malesuada orci congue. Nullam tempus sollicitudin cursus. Ut et adipiscing erat. Curabitur this is a text link libero tempus congue.</p>\r\n                            <p>Duis mattis laoreet neque, et ornare neque sollicitudin at. Proin sagittis dolor sed mi elementum pretium. Donec et justo ante. Vivamus egestas sodales est, eu rhoncus urna semper eu. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer tristique elit lobortis purus bibendum, quis dictum metus mattis. Phasellus posuere felis sed eros porttitor mattis. Curabitur massa magna, tempor in blandit id, porta in ligula. Aliquam laoreet nisl massa, at interdum mauris sollicitudin et.</p>\r\n                            <p><img src=\"/uploads/demo/news/img-detail.jpg\" alt=\"\" width=\"770\" height=\"450\" /></p>\r\n                            <h4>Requirements</h4>\r\n                            <ul style=\"list-style-type: square;\">\r\n                            <li>We do not require any previous experience or pre-defined skills to take this course. A great orientation would be enough to master UI/UX design.</li>\r\n                            <li>A computer with a good internet connection.</li>\r\n                            <li>Adobe Photoshop (OPTIONAL)</li>\r\n                            </ul>', 'an-overworked-newspaper-editor-2', 'publish', 1, 37, 165, 1, NULL, NULL, NULL, NULL, '2023-06-06 05:58:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `core_news_category`
--

DROP TABLE IF EXISTS `core_news_category`;
CREATE TABLE IF NOT EXISTS `core_news_category` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `_lft` int UNSIGNED NOT NULL DEFAULT '0',
  `_rgt` int UNSIGNED NOT NULL DEFAULT '0',
  `parent_id` int UNSIGNED DEFAULT NULL,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `origin_id` bigint DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `core_news_category__lft__rgt_parent_id_index` (`_lft`,`_rgt`,`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `core_news_category`
--

INSERT INTO `core_news_category` (`id`, `name`, `content`, `slug`, `status`, `_lft`, `_rgt`, `parent_id`, `create_user`, `update_user`, `deleted_at`, `created_at`, `updated_at`, `origin_id`, `lang`) VALUES
(1, 'Education', NULL, 'education', 'publish', 1, 2, NULL, NULL, NULL, NULL, '2023-06-06 05:58:50', '2023-06-06 05:58:50', NULL, NULL),
(2, 'Information', NULL, 'information', 'publish', 3, 4, NULL, NULL, NULL, NULL, '2023-06-06 05:58:50', '2023-06-06 05:58:50', NULL, NULL),
(3, 'Interview', NULL, 'interview', 'publish', 5, 6, NULL, NULL, NULL, NULL, '2023-06-06 05:58:50', '2023-06-06 05:58:50', NULL, NULL),
(4, 'Job Seeking', NULL, 'job-seeking', 'publish', 7, 8, NULL, NULL, NULL, NULL, '2023-06-06 05:58:50', '2023-06-06 05:58:50', NULL, NULL),
(5, 'Jobs', NULL, 'jobs', 'publish', 9, 10, NULL, NULL, NULL, NULL, '2023-06-06 05:58:50', '2023-06-06 05:58:50', NULL, NULL),
(6, 'Learn', NULL, 'learn', 'publish', 11, 12, NULL, NULL, NULL, NULL, '2023-06-06 05:58:50', '2023-06-06 05:58:50', NULL, NULL),
(7, 'Skill', NULL, 'skill', 'publish', 13, 14, NULL, NULL, NULL, NULL, '2023-06-06 05:58:50', '2023-06-06 05:58:50', NULL, NULL),
(8, 'Travel', NULL, 'travel', 'publish', 15, 16, NULL, NULL, NULL, NULL, '2023-06-06 05:58:50', '2023-06-06 05:58:50', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `core_news_category_translations`
--

DROP TABLE IF EXISTS `core_news_category_translations`;
CREATE TABLE IF NOT EXISTS `core_news_category_translations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `origin_id` int UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `core_news_category_translations_locale_index` (`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `core_news_tag`
--

DROP TABLE IF EXISTS `core_news_tag`;
CREATE TABLE IF NOT EXISTS `core_news_tag` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `news_id` int DEFAULT NULL,
  `tag_id` int DEFAULT NULL,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `core_news_tag`
--

INSERT INTO `core_news_tag` (`id`, `news_id`, `tag_id`, `create_user`, `update_user`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 1, NULL, NULL, NULL, NULL),
(2, 1, 3, 1, NULL, NULL, NULL, NULL),
(3, 1, 5, 1, NULL, NULL, NULL, NULL),
(4, 2, 2, 1, NULL, NULL, NULL, NULL),
(5, 2, 6, 1, NULL, NULL, NULL, NULL),
(6, 2, 4, 1, NULL, NULL, NULL, NULL),
(7, 3, 5, 1, NULL, NULL, NULL, NULL),
(8, 3, 2, 1, NULL, NULL, NULL, NULL),
(9, 3, 1, 1, NULL, NULL, NULL, NULL),
(10, 4, 4, 1, NULL, NULL, NULL, NULL),
(11, 4, 6, 1, NULL, NULL, NULL, NULL),
(12, 4, 5, 1, NULL, NULL, NULL, NULL),
(13, 5, 5, 1, NULL, NULL, NULL, NULL),
(14, 5, 3, 1, NULL, NULL, NULL, NULL),
(15, 5, 1, 1, NULL, NULL, NULL, NULL),
(16, 6, 3, 1, NULL, NULL, NULL, NULL),
(17, 6, 3, 1, NULL, NULL, NULL, NULL),
(18, 6, 3, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `core_news_translations`
--

DROP TABLE IF EXISTS `core_news_translations`;
CREATE TABLE IF NOT EXISTS `core_news_translations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `origin_id` int UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `core_news_translations_locale_index` (`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `core_notifications`
--

DROP TABLE IF EXISTS `core_notifications`;
CREATE TABLE IF NOT EXISTS `core_notifications` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `from_user` bigint DEFAULT NULL,
  `to_user` bigint DEFAULT NULL,
  `is_read` tinyint DEFAULT '0',
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_group` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_id` bigint DEFAULT NULL,
  `target_parent_id` bigint DEFAULT NULL,
  `params` text COLLATE utf8mb4_unicode_ci,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `core_pages`
--

DROP TABLE IF EXISTS `core_pages`;
CREATE TABLE IF NOT EXISTS `core_pages` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `short_desc` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish_date` datetime DEFAULT NULL,
  `image_id` int DEFAULT NULL,
  `template_id` int DEFAULT NULL,
  `header_style` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_style` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` bigint DEFAULT NULL,
  `update_user` bigint DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `origin_id` bigint DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `custom_logo` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `core_pages_slug_index` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `core_pages`
--

INSERT INTO `core_pages` (`id`, `slug`, `title`, `content`, `short_desc`, `status`, `publish_date`, `image_id`, `template_id`, `header_style`, `footer_style`, `create_user`, `update_user`, `deleted_at`, `origin_id`, `lang`, `created_at`, `updated_at`, `custom_logo`) VALUES
(1, 'about', 'About', NULL, NULL, 'publish', NULL, NULL, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2023-06-06 05:58:48', NULL, NULL),
(2, 'terms-and-conditions', 'Terms and Conditions', '\r\n                <h3>1. Terms</h3>\r\n<p>Pharetra nulla ullamcorper sit lectus. Fermentum mauris pellentesque nec nibh sed et, vel diam, massa. Placerat quis vel fames interdum urna lobortis sagittis sed pretium. Aliquam eget posuere sit enim elementum nulla vulputate magna. Morbi sed arcu proin quis tortor non risus.</p>\r\n<p>Elementum lectus a porta commodo suspendisse arcu, aliquam lectus faucibus. Nisl malesuada tortor, ligula aliquet felis vitae enim. Mi augue aliquet mauris non elementum tincidunt eget facilisi. Pellentesque massa ipsum tempus vel aliquam massa eu pulvinar eget.</p>\r\n<p>&nbsp;</p>\r\n<h3>2. Limitations</h3>\r\n<p>Pharetra nulla ullamcorper sit lectus. Fermentum mauris pellentesque nec nibh sed et, vel diam, massa. Placerat quis vel fames interdum urna lobortis sagittis sed pretium. Aliquam eget posuere sit enim elementum nulla vulputate magna. Morbi sed arcu proin quis tortor non risus.</p>\r\n<p>Elementum lectus a porta commodo suspendisse arcu, aliquam lectus faucibus. Nisl malesuada tortor, ligula aliquet felis vitae enim. Mi augue aliquet mauris non elementum tincidunt eget facilisi. Pellentesque massa ipsum tempus vel aliquam massa eu pulvinar eget.</p>\r\n<p>&nbsp;</p>\r\n<h3>3. Revisions and Errata</h3>\r\n<p>Pharetra nulla ullamcorper sit lectus. Fermentum mauris pellentesque nec nibh sed et, vel diam, massa. Placerat quis vel fames interdum urna lobortis sagittis sed pretium. Aliquam eget posuere sit enim elementum nulla vulputate magna. Morbi sed arcu proin quis tortor non risus.</p>\r\n<p>Elementum lectus a porta commodo suspendisse arcu, aliquam lectus faucibus. Nisl malesuada tortor, ligula aliquet felis vitae enim. Mi augue aliquet mauris non elementum tincidunt eget facilisi. Pellentesque massa ipsum tempus vel aliquam massa eu pulvinar eget.</p>\r\n<p>&nbsp;</p>\r\n<h3>4. Site Terms of Use Modifications</h3>\r\n<p>Pharetra nulla ullamcorper sit lectus. Fermentum mauris pellentesque nec nibh sed et, vel diam, massa. Placerat quis vel fames interdum urna lobortis sagittis sed pretium. Aliquam eget posuere sit enim elementum nulla vulputate magna. Morbi sed arcu proin quis tortor non risus.</p>\r\n<p>Elementum lectus a porta commodo suspendisse arcu, aliquam lectus faucibus. Nisl malesuada tortor, ligula aliquet felis vitae enim. Mi augue aliquet mauris non elementum tincidunt eget facilisi. Pellentesque massa ipsum tempus vel aliquam massa eu pulvinar eget.</p>\r\n            ', NULL, 'publish', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2023-06-06 05:58:48', NULL, NULL),
(3, 'faqs', 'FAQ\'s', NULL, NULL, 'publish', NULL, NULL, 2, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2023-06-06 05:58:48', NULL, NULL),
(4, 'rvoize', 'Rvoize', NULL, NULL, 'publish', NULL, NULL, 3, 'transparent', 'style_1', 1, 1, NULL, NULL, NULL, '2023-06-06 05:58:48', '2023-06-09 00:47:14', NULL),
(5, 'home-page-2', 'Home Page 2', NULL, NULL, 'publish', NULL, NULL, 4, 'header-style-two', 'style-two', 1, NULL, NULL, NULL, NULL, '2023-06-06 05:58:48', NULL, NULL),
(6, 'home-page-3', 'Home Page 3', NULL, NULL, 'publish', NULL, NULL, 5, 'transparent', 'alternate', 1, NULL, NULL, NULL, NULL, '2023-06-06 05:58:48', NULL, NULL),
(7, 'home-page-4', 'Home Page 4', NULL, NULL, 'publish', NULL, NULL, 6, 'header-style-two', 'style-two', 1, NULL, NULL, NULL, NULL, '2023-06-06 05:58:48', NULL, NULL),
(8, 'home-page-5', 'Home Page 5', NULL, NULL, 'publish', NULL, NULL, 7, 'normal', 'style_1', 1, NULL, NULL, NULL, NULL, '2023-06-06 05:58:48', NULL, NULL),
(9, 'home-page-6', 'Home Page 6', NULL, NULL, 'publish', NULL, NULL, 8, 'normal', 'style_1', 1, NULL, NULL, NULL, NULL, '2023-06-06 05:58:48', NULL, NULL),
(10, 'home-page-7', 'Home Page 7', NULL, NULL, 'publish', NULL, NULL, 9, 'normal', 'alternate3', 1, NULL, NULL, NULL, NULL, '2023-06-06 05:58:48', NULL, NULL),
(11, 'home-page-8', 'Home Page 8', NULL, NULL, 'publish', NULL, NULL, 10, 'transparent', 'style_1', 1, NULL, NULL, NULL, NULL, '2023-06-06 05:58:48', NULL, NULL),
(12, 'home-page-9', 'Home Page 9', NULL, NULL, 'publish', NULL, NULL, 11, 'header-style-two', 'style-six', 1, NULL, NULL, NULL, NULL, '2023-06-06 05:58:48', NULL, NULL),
(13, 'privacy-policy', 'Privacy policy', '<h1>Privacy policy</h1>\r\n<p> This privacy policy (\"Policy\") describes how the personally identifiable information (\"Personal Information\") you may provide on the <a target=\"_blank\" href=\"http://superio.test\" rel=\"noreferrer noopener\">superio.test</a> website (\"Website\" or \"Service\") and any of its related products and services (collectively, \"Services\") is collected, protected and used. It also describes the choices available to you regarding our use of your Personal Information and how you can access and update this information. This Policy is a legally binding agreement between you (\"User\", \"you\" or \"your\") and this Website operator (\"Operator\", \"we\", \"us\" or \"our\"). By accessing and using the Website and Services, you acknowledge that you have read, understood, and agree to be bound by the terms of this Agreement. This Policy does not apply to the practices of companies that we do not own or control, or to individuals that we do not employ or manage.</p>\r\n<h2>Automatic collection of information</h2>\r\n<p>When you open the Website, our servers automatically record information that your browser sends. This data may include information such as your device\'s IP address, browser type and version, operating system type and version, language preferences or the webpage you were visiting before you came to the Website and Services, pages of the Website and Services that you visit, the time spent on those pages, information you search for on the Website, access times and dates, and other statistics.</p>\r\n<p>Information collected automatically is used only to identify potential cases of abuse and establish statistical information regarding the usage and traffic of the Website and Services. This statistical information is not otherwise aggregated in such a way that would identify any particular user of the system.</p>\r\n<h2>Collection of personal information</h2>\r\n<p>You can access and use the Website and Services without telling us who you are or revealing any information by which someone could identify you as a specific, identifiable individual. If, however, you wish to use some of the features on the Website, you may be asked to provide certain Personal Information (for example, your name and e-mail address). We receive and store any information you knowingly provide to us when you create an account, publish content,  or fill any online forms on the Website. When required, this information may include the following:</p>\r\n<ul>\r\n<li>Personal details such as name, country of residence, etc.</li>\r\n<li>Contact information such as email address, address, etc.</li>\r\n<li>Account details such as user name, unique user ID, password, etc.</li>\r\n<li>Information about other individuals such as your family members, friends, etc.</li>\r\n</ul>\r\n<p>Some of the information we collect is directly from you via the Website and Services. However, we may also collect Personal Information about you from other sources such as public databases and our joint marketing partners. You can choose not to provide us with your Personal Information, but then you may not be able to take advantage of some of the features on the Website. Users who are uncertain about what information is mandatory are welcome to contact us.</p>\r\n<h2>Use and processing of collected information</h2>\r\n<p>In order to make the Website and Services available to you, or to meet a legal obligation, we need to collect and use certain Personal Information. If you do not provide the information that we request, we may not be able to provide you with the requested products or services. Any of the information we collect from you may be used for the following purposes:</p>\r\n<ul>\r\n<li>Create and manage user accounts</li>\r\n<li>Send administrative information</li>\r\n<li>Request user feedback</li>\r\n<li>Improve user experience</li>\r\n<li>Enforce terms and conditions and policies</li>\r\n<li>Run and operate the Website and Services</li>\r\n</ul>\r\n<p>Processing your Personal Information depends on how you interact with the Website and Services, where you are located in the world and if one of the following applies: (i) you have given your consent for one or more specific purposes; this, however, does not apply, whenever the processing of Personal Information is subject to European data protection law; (ii) provision of information is necessary for the performance of an agreement with you and/or for any pre-contractual obligations thereof; (iii) processing is necessary for compliance with a legal obligation to which you are subject; (iv) processing is related to a task that is carried out in the public interest or in the exercise of official authority vested in us; (v) processing is necessary for the purposes of the legitimate interests pursued by us or by a third party.</p>\r\n<p> Note that under some legislations we may be allowed to process information until you object to such processing (by opting out), without having to rely on consent or any other of the following legal bases below. In any case, we will be happy to clarify the specific legal basis that applies to the processing, and in particular whether the provision of Personal Information is a statutory or contractual requirement, or a requirement necessary to enter into a contract.</p>\r\n<h2>Managing information</h2>\r\n<p>You are able to delete certain Personal Information we have about you. The Personal Information you can delete may change as the Website and Services change. When you delete Personal Information, however, we may maintain a copy of the unrevised Personal Information in our records for the duration necessary to comply with our obligations to our affiliates and partners, and for the purposes described below. If you would like to delete your Personal Information or permanently delete your account, you can do so by contacting us.</p>\r\n<h2>Disclosure of information</h2>\r\n<p> Depending on the requested Services or as necessary to complete any transaction or provide any service you have requested, we may share your information with your consent with our trusted third parties that work with us, any other affiliates and subsidiaries we rely upon to assist in the operation of the Website and Services available to you. We do not share Personal Information with unaffiliated third parties. These service providers are not authorized to use or disclose your information except as necessary to perform services on our behalf or comply with legal requirements. We may share your Personal Information for these purposes only with third parties whose privacy policies are consistent with ours or who agree to abide by our policies with respect to Personal Information. These third parties are given Personal Information they need only in order to perform their designated functions, and we do not authorize them to use or disclose Personal Information for their own marketing or other purposes.</p>\r\n<p>We will disclose any Personal Information we collect, use or receive if required or permitted by law, such as to comply with a subpoena, or similar legal process, and when we believe in good faith that disclosure is necessary to protect our rights, protect your safety or the safety of others, investigate fraud, or respond to a government request.</p>\r\n<h2>Retention of information</h2>\r\n<p>We will retain and use your Personal Information for the period necessary to comply with our legal obligations, resolve disputes, and enforce our agreements unless a longer retention period is required or permitted by law. We may use any aggregated data derived from or incorporating your Personal Information after you update or delete it, but not in a manner that would identify you personally. Once the retention period expires, Personal Information shall be deleted. Therefore, the right to access, the right to erasure, the right to rectification and the right to data portability cannot be enforced after the expiration of the retention period.</p>\r\n<h2>The rights of users</h2>\r\n<p>You may exercise certain rights regarding your information processed by us. In particular, you have the right to do the following: (i) you have the right to withdraw consent where you have previously given your consent to the processing of your information; (ii) you have the right to object to the processing of your information if the processing is carried out on a legal basis other than consent; (iii) you have the right to learn if information is being processed by us, obtain disclosure regarding certain aspects of the processing and obtain a copy of the information undergoing processing; (iv) you have the right to verify the accuracy of your information and ask for it to be updated or corrected; (v) you have the right, under certain circumstances, to restrict the processing of your information, in which case, we will not process your information for any purpose other than storing it; (vi) you have the right, under certain circumstances, to obtain the erasure of your Personal Information from us; (vii) you have the right to receive your information in a structured, commonly used and machine readable format and, if technically feasible, to have it transmitted to another controller without any hindrance. This provision is applicable provided that your information is processed by automated means and that the processing is based on your consent, on a contract which you are part of or on pre-contractual obligations thereof.</p>\r\n<h2>Privacy of children</h2>\r\n<p>We do not knowingly collect any Personal Information from children under the age of 18. If you are under the age of 18, please do not submit any Personal Information through the Website and Services. We encourage parents and legal guardians to monitor their children\'s Internet usage and to help enforce this Policy by instructing their children never to provide Personal Information through the Website and Services without their permission. If you have reason to believe that a child under the age of 18 has provided Personal Information to us through the Website and Services, please contact us. You must also be old enough to consent to the processing of your Personal Information in your country (in some countries we may allow your parent or guardian to do so on your behalf).</p>\r\n<h2>Cookies</h2>\r\n<p>The Website and Services use \"cookies\" to help personalize your online experience. A cookie is a text file that is placed on your hard disk by a web page server. Cookies cannot be used to run programs or deliver viruses to your computer. Cookies are uniquely assigned to you, and can only be read by a web server in the domain that issued the cookie to you.</p>\r\n<p>We may use cookies to collect, store, and track information for statistical purposes to operate the Website and Services. You have the ability to accept or decline cookies. Most web browsers automatically accept cookies, but you can usually modify your browser setting to decline cookies if you prefer. To learn more about cookies and how to manage them, visit <a target=\"_blank\" href=\"https://www.internetcookies.org\" rel=\"noreferrer noopener\">internetcookies.org</a></p>\r\n<h2>Do Not Track signals</h2>\r\n<p>Some browsers incorporate a Do Not Track feature that signals to websites you visit that you do not want to have your online activity tracked. Tracking is not the same as using or collecting information in connection with a website. For these purposes, tracking refers to collecting personally identifiable information from consumers who use or visit a website or online service as they move across different websites over time. How browsers communicate the Do Not Track signal is not yet uniform. As a result, the Website and Services are not yet set up to interpret or respond to Do Not Track signals communicated by your browser. Even so, as described in more detail throughout this Policy, we limit our use and collection of your personal information.</p>\r\n<h2>Email marketing</h2>\r\n<p>We offer electronic newsletters to which you may voluntarily subscribe at any time. We are committed to keeping your e-mail address confidential and will not disclose your email address to any third parties except as allowed in the information use and processing section or for the purposes of utilizing a third party provider to send such emails. We will maintain the information sent via e-mail in accordance with applicable laws and regulations.</p>\r\n<p>In compliance with the CAN-SPAM Act, all e-mails sent from us will clearly state who the e-mail is from and provide clear information on how to contact the sender. You may choose to stop receiving our newsletter or marketing emails by following the unsubscribe instructions included in these emails or by contacting us. However, you will continue to receive essential transactional emails.</p>\r\n<h2>Links to other resources</h2>\r\n<p>The Website and Services contain links to other resources that are not owned or controlled by us. Please be aware that we are not responsible for the privacy practices of such other resources or third parties. We encourage you to be aware when you leave the Website and Services and to read the privacy statements of each and every resource that may collect Personal Information.</p>\r\n<h2>Information security</h2>\r\n<p>We secure information you provide on computer servers in a controlled, secure environment, protected from unauthorized access, use, or disclosure. We maintain reasonable administrative, technical, and physical safeguards in an effort to protect against unauthorized access, use, modification, and disclosure of Personal Information in its control and custody. However, no data transmission over the Internet or wireless network can be guaranteed. Therefore, while we strive to protect your Personal Information, you acknowledge that (i) there are security and privacy limitations of the Internet which are beyond our control; (ii) the security, integrity, and privacy of any and all information and data exchanged between you and the Website and Services cannot be guaranteed; and (iii) any such information and data may be viewed or tampered with in transit by a third party, despite best efforts.</p>\r\n<h2>Data breach</h2>\r\n<p>In the event we become aware that the security of the Website and Services has been compromised or users Personal Information has been disclosed to unrelated third parties as a result of external activity, including, but not limited to, security attacks or fraud, we reserve the right to take reasonably appropriate measures, including, but not limited to, investigation and reporting, as well as notification to and cooperation with law enforcement authorities. In the event of a data breach, we will make reasonable efforts to notify affected individuals if we believe that there is a reasonable risk of harm to the user as a result of the breach or if notice is otherwise required by law. When we do, we will post a notice on the Website, send you an email.</p>\r\n<h2>Changes and amendments</h2>\r\n<p>We reserve the right to modify this Policy or its terms relating to the Website and Services from time to time in our discretion and will notify you of any material changes to the way in which we treat Personal Information. When we do, we will post a notification on the main page of the Website. We may also provide notice to you in other ways in our discretion, such as through contact information you have provided. Any updated version of this Policy will be effective immediately upon the posting of the revised Policy unless otherwise specified. Your continued use of the Website and Services after the effective date of the revised Policy (or such other act specified at that time) will constitute your consent to those changes. However, we will not, without your consent, use your Personal Information in a manner materially different than what was stated at the time your Personal Information was collected. Policy was created with <a style=\"color:inherit;\" target=\"_blank\" href=\"https://www.websitepolicies.com/privacy-policy-generator\" rel=\"noreferrer noopener\">WebsitePolicies</a>.</p>\r\n<h2>Acceptance of this policy</h2>\r\n<p>You acknowledge that you have read this Policy and agree to all its terms and conditions. By accessing and using the Website and Services you agree to be bound by this Policy. If you do not agree to abide by the terms of this Policy, you are not authorized to access or use the Website and Services.</p>\r\n<h2>Contacting us</h2>\r\n<p>If you would like to contact us to understand more about this Policy or wish to contact us concerning any matter relating to individual rights and your Personal Information, you may do so via the <a target=\"_blank\" href=\"http://superio.test/contact\" rel=\"noreferrer noopener\">contact form</a></p>\r\n<p>This document was last updated on October 6, 2020</p>', NULL, 'publish', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2023-06-06 05:58:48', '2023-06-06 05:58:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `core_page_translations`
--

DROP TABLE IF EXISTS `core_page_translations`;
CREATE TABLE IF NOT EXISTS `core_page_translations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `origin_id` int UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `short_desc` text COLLATE utf8mb4_unicode_ci,
  `create_user` bigint DEFAULT NULL,
  `update_user` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `core_page_translations_origin_id_locale_unique` (`origin_id`,`locale`),
  KEY `core_page_translations_locale_index` (`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `core_roles`
--

DROP TABLE IF EXISTS `core_roles`;
CREATE TABLE IF NOT EXISTS `core_roles` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `core_roles_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `core_roles`
--

INSERT INTO `core_roles` (`id`, `name`, `code`, `create_user`, `update_user`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'administrator', NULL, NULL, NULL, '2023-06-06 05:58:45', '2023-06-06 05:58:45'),
(2, 'Employer', 'employer', NULL, NULL, NULL, '2023-06-06 05:58:45', '2023-06-06 05:58:45'),
(3, 'Candidate', 'candidate', NULL, NULL, NULL, '2023-06-06 05:58:45', '2023-06-06 05:58:45'),
(4, 'Owner', '1234', 1, NULL, NULL, '2023-06-13 22:59:33', '2023-06-13 22:59:33');

-- --------------------------------------------------------

--
-- Table structure for table `core_role_permissions`
--

DROP TABLE IF EXISTS `core_role_permissions`;
CREATE TABLE IF NOT EXISTS `core_role_permissions` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` int UNSIGNED DEFAULT NULL,
  `permission` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `core_role_permissions_role_id_permission_unique` (`role_id`,`permission`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `core_role_permissions`
--

INSERT INTO `core_role_permissions` (`id`, `role_id`, `permission`, `create_user`, `update_user`, `created_at`, `updated_at`) VALUES
(1, 1, 'gig_manage', NULL, NULL, '2023-06-06 05:58:45', '2023-06-06 05:58:45'),
(2, 1, 'gig_manage_others', NULL, NULL, '2023-06-06 05:58:45', '2023-06-06 05:58:45'),
(3, 1, 'candidate_manage', NULL, NULL, '2023-06-06 05:58:45', '2023-06-06 05:58:45'),
(4, 1, 'candidate_manage_others', NULL, NULL, '2023-06-06 05:58:45', '2023-06-06 05:58:45'),
(5, 1, 'employer_manage', NULL, NULL, '2023-06-06 05:58:45', '2023-06-06 05:58:45'),
(6, 1, 'employer_manage_others', NULL, NULL, '2023-06-06 05:58:45', '2023-06-06 05:58:45'),
(7, 1, 'job_manage', NULL, NULL, '2023-06-06 05:58:45', '2023-06-06 05:58:45'),
(8, 1, 'job_manage_others', NULL, NULL, '2023-06-06 05:58:45', '2023-06-06 05:58:45'),
(9, 1, 'skill_manage_others', NULL, NULL, '2023-06-06 05:58:45', '2023-06-06 05:58:45'),
(10, 1, 'category_manage_others', NULL, NULL, '2023-06-06 05:58:45', '2023-06-06 05:58:45'),
(11, 1, 'page_manage', NULL, NULL, '2023-06-06 05:58:45', '2023-06-06 05:58:45'),
(12, 1, 'page_manage_others', NULL, NULL, '2023-06-06 05:58:45', '2023-06-06 05:58:45'),
(13, 1, 'news_manage', NULL, NULL, '2023-06-06 05:58:45', '2023-06-06 05:58:45'),
(14, 1, 'news_manage_others', NULL, NULL, '2023-06-06 05:58:45', '2023-06-06 05:58:45'),
(15, 1, 'review_manage', NULL, NULL, '2023-06-06 05:58:45', '2023-06-06 05:58:45'),
(16, 1, 'review_manage_others', NULL, NULL, '2023-06-06 05:58:45', '2023-06-06 05:58:45'),
(17, 1, 'location_manage', NULL, NULL, '2023-06-06 05:58:45', '2023-06-06 05:58:45'),
(18, 1, 'setting_update', NULL, NULL, '2023-06-06 05:58:45', '2023-06-06 05:58:45'),
(19, 1, 'media_upload', NULL, NULL, '2023-06-06 05:58:45', '2023-06-06 05:58:45'),
(20, 1, 'media_manage_others', NULL, NULL, '2023-06-06 05:58:45', '2023-06-06 05:58:45'),
(21, 1, 'tools_view', NULL, NULL, '2023-06-06 05:58:45', '2023-06-06 05:58:45'),
(22, 1, 'language_manage', NULL, NULL, '2023-06-06 05:58:45', '2023-06-06 05:58:45'),
(23, 1, 'language_translation', NULL, NULL, '2023-06-06 05:58:45', '2023-06-06 05:58:45'),
(24, 1, 'role_manage', NULL, NULL, '2023-06-06 05:58:45', '2023-06-06 05:58:45'),
(25, 1, 'user_manage', NULL, NULL, '2023-06-06 05:58:45', '2023-06-06 05:58:45'),
(26, 1, 'system_log_view', NULL, NULL, '2023-06-06 05:58:45', '2023-06-06 05:58:45'),
(27, 1, 'plugin_manage', NULL, NULL, '2023-06-06 05:58:45', '2023-06-06 05:58:45'),
(28, 1, 'menu_manage', NULL, NULL, '2023-06-06 05:58:45', '2023-06-06 05:58:45'),
(29, 1, 'report_view', NULL, NULL, '2023-06-06 05:58:45', '2023-06-06 05:58:45'),
(30, 1, 'template_manage', NULL, NULL, '2023-06-06 05:58:45', '2023-06-06 05:58:45'),
(31, 1, 'contact_manage', NULL, NULL, '2023-06-06 05:58:45', '2023-06-06 05:58:45'),
(32, 1, 'newsletter_manage', NULL, NULL, '2023-06-06 05:58:45', '2023-06-06 05:58:45'),
(33, 1, 'setting_manage', NULL, NULL, '2023-06-06 05:58:45', '2023-06-06 05:58:45'),
(34, 1, 'dashboard_vendor_access', NULL, NULL, '2023-06-06 05:58:45', '2023-06-06 05:58:45'),
(35, 1, 'admin_payout_manage', NULL, NULL, '2023-06-06 05:58:45', '2023-06-06 05:58:45'),
(36, 1, 'candidate_payout_manage', NULL, NULL, '2023-06-06 05:58:45', '2023-06-06 05:58:45'),
(37, 2, 'job_manage', NULL, NULL, '2023-06-06 05:58:45', '2023-06-06 05:58:45'),
(38, 2, 'employer_manage', NULL, NULL, '2023-06-06 05:58:45', '2023-06-06 05:58:45'),
(39, 2, 'media_upload', NULL, NULL, '2023-06-06 05:58:45', '2023-06-06 05:58:45'),
(40, 3, 'candidate_manage', NULL, NULL, '2023-06-06 05:58:45', '2023-06-06 05:58:45'),
(41, 3, 'media_upload', NULL, NULL, '2023-06-06 05:58:45', '2023-06-06 05:58:45'),
(42, 3, 'gig_manage', NULL, NULL, '2023-06-06 05:58:45', '2023-06-06 05:58:45'),
(43, 3, 'candidate_payout_manage', NULL, NULL, '2023-06-06 06:00:29', '2023-06-06 06:00:29'),
(45, 4, 'employer_manage', 1, NULL, '2023-06-14 02:17:02', '2023-06-14 02:17:02'),
(47, 4, 'skill_manage_others', 1, NULL, '2023-06-14 02:17:02', '2023-06-14 02:17:02'),
(49, 4, 'news_manage', 1, NULL, '2023-06-14 02:17:02', '2023-06-14 02:17:02'),
(50, 4, 'location_manage', 1, NULL, '2023-06-14 02:17:02', '2023-06-14 02:17:02'),
(54, 4, 'employer_manage_others', 1, NULL, '2023-06-14 02:23:39', '2023-06-14 02:23:39'),
(56, 4, 'job_manage', 1, NULL, '2023-06-14 02:27:08', '2023-06-14 02:27:08'),
(57, 4, 'job_manage_others', 1, NULL, '2023-06-14 02:27:08', '2023-06-14 02:27:08'),
(58, 4, 'category_manage_others', 1, NULL, '2023-06-14 02:39:19', '2023-06-14 02:39:19'),
(59, 4, 'news_manage_others', 1, NULL, '2023-06-14 02:39:19', '2023-06-14 02:39:19'),
(61, 4, 'report_view', 1, NULL, '2023-06-14 02:41:17', '2023-06-14 02:41:17'),
(62, 4, 'candidate_manage', 1, NULL, '2023-06-14 02:42:27', '2023-06-14 02:42:27'),
(63, 4, 'candidate_manage_others', 1, NULL, '2023-06-14 02:42:27', '2023-06-14 02:42:27'),
(66, 4, 'dashboard_vendor_access', 1, NULL, '2023-06-14 02:44:03', '2023-06-14 02:44:03');

-- --------------------------------------------------------

--
-- Table structure for table `core_settings`
--

DROP TABLE IF EXISTS `core_settings`;
CREATE TABLE IF NOT EXISTS `core_settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val` text COLLATE utf8mb4_unicode_ci,
  `autoload` tinyint DEFAULT NULL,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=237 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `core_settings`
--

INSERT INTO `core_settings` (`id`, `name`, `group`, `val`, `autoload`, `create_user`, `update_user`, `lang`, `created_at`, `updated_at`) VALUES
(1, 'site_locale', 'general', 'en', NULL, 1, 1, NULL, NULL, '2023-06-06 23:26:32'),
(2, 'site_enable_multi_lang', 'general', '', NULL, 1, 1, NULL, NULL, '2023-06-06 23:26:32'),
(3, 'enable_rtl_egy', 'general', '1', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'menu_locations', NULL, '{\"primary\":1}', NULL, 1, 1, NULL, NULL, '2023-06-10 03:12:20'),
(5, 'admin_email', NULL, 'rvoize1@gmail.com', NULL, 1, 1, NULL, NULL, '2023-06-16 07:31:19'),
(6, 'email_from_name', NULL, 'Rvoize', NULL, 1, 1, NULL, NULL, '2023-06-07 06:39:15'),
(7, 'email_from_address', NULL, 'rvoize1@gmail.com', NULL, 1, 1, NULL, NULL, '2023-06-16 07:31:19'),
(8, 'logo_id', NULL, '177', NULL, 1, 1, NULL, NULL, '2023-06-07 00:12:00'),
(9, 'logo_white_id', NULL, '178', NULL, 1, 1, NULL, NULL, '2023-06-07 00:21:40'),
(10, 'site_favicon', NULL, '180', NULL, 1, 1, NULL, NULL, '2023-06-07 00:37:14'),
(11, 'footer_style', NULL, 'style_1', NULL, 1, 1, NULL, NULL, '2023-06-06 23:26:32'),
(12, 'footer_info_text', NULL, '<!--<p class=\"phone-num\"><span>Call us </span><a href=\"tel:123 456 7890\">123 456 7890</a></p>\r\n                                <p class=\"address\">UAE<br><br>-->\r\n                                    <a href=\"mailto:hr@rvoize.com\" class=\"email\">hr@rvoize.com</a>\r\n                                </p>', NULL, 1, 1, NULL, NULL, '2023-06-17 05:15:47'),
(13, 'copyright', NULL, '<p>&copy; 2023 <a title=\"Rvoize\" href=\"https://www.rvoize.com\">Rvoize</a>. All Right Reserved.</p>', NULL, 1, 1, NULL, NULL, '2023-06-06 23:26:32'),
(14, 'footer_socials', NULL, '<a href=\"#\"><i class=\"fab fa-facebook-f\"></i></a>\r\n                                <a href=\"#\"><i class=\"fab fa-twitter\"></i></a>\r\n                                <a href=\"#\"><i class=\"fab fa-instagram\"></i></a>\r\n                                <a href=\"#\"><i class=\"fab fa-linkedin-in\"></i></a>', NULL, 1, 1, NULL, NULL, '2023-06-06 23:26:32'),
(15, 'list_widget_footer', NULL, '[{\"title\":\"For Candidates\",\"size\":\"3\",\"content\":\"<ul class=\\\"list\\\">\\r\\n                                            <li><a href=\\\"#\\\">Browse Jobs<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">Browse Categories<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">Candidate Dashboard<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">Job Alerts<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">My Bookmarks<\\/a><\\/li>\\r\\n                                        <\\/ul>\"},{\"title\":\"For Employers\",\"size\":\"3\",\"content\":\"<ul class=\\\"list\\\">\\r\\n                                            <li><a href=\\\"#\\\">Browse Candidates<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">Employer Dashboard<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">Add Job<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">Job Packages<\\/a><\\/li>\\r\\n                                        <\\/ul>\"},{\"title\":\"About Us\",\"size\":\"3\",\"content\":\"<ul class=\\\"list\\\">\\r\\n                                            <li><a href=\\\"#\\\">Job Page<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">Job Page Alternative<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">Resume Page<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">Blog<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">Contact<\\/a><\\/li>\\r\\n                                        <\\/ul>\"},{\"title\":\"Helpful Resources\",\"size\":\"3\",\"content\":\"<ul class=\\\"list\\\">\\r\\n                                            <li><a href=\\\"#\\\">Site Map<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">Terms of Use<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">Privacy Center<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">Security Center<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">Accessibility Center<\\/a><\\/li>\\r\\n                                        <\\/ul>\"}]', NULL, 1, 1, NULL, NULL, '2023-06-06 23:26:32'),
(16, 'list_widget_footer_ja', NULL, '[{\"title\":\"\\u5019\\u88dc\\u8005\\u5411\\u3051\",\"size\":\"3\",\"content\":\"<ul class=\\\"list\\\">\\r\\n                                            <li><a href=\\\"#\\\">\\u6c42\\u4eba\\u3092\\u95b2\\u89a7\\u3059\\u308b\\r\\n<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">\\u30ab\\u30c6\\u30b4\\u30ea\\u3092\\u95b2\\u89a7\\u3059\\u308b\\r\\n<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">\\u5019\\u88dc\\u30c0\\u30c3\\u30b7\\u30e5\\u30dc\\u30fc\\u30c9\\r\\n<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">\\u30b8\\u30e7\\u30d6\\u30a2\\u30e9\\u30fc\\u30c8<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">\\u30de\\u30a4\\u30d6\\u30c3\\u30af\\u30de\\u30fc\\u30af\\r\\n<\\/a><\\/li>\\r\\n                                        <\\/ul>\"},{\"title\":\"\\u96c7\\u7528\\u4e3b\\u306e\\u305f\\u3081\\u306b\",\"size\":\"3\",\"content\":\"<ul class=\\\"list\\\">\\r\\n                                            <li><a href=\\\"#\\\">\\u5019\\u88dc\\u8005\\u3092\\u95b2\\u89a7\\u3059\\u308b\\r\\n<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">\\u96c7\\u7528\\u8005\\u30c0\\u30c3\\u30b7\\u30e5\\u30dc\\u30fc\\u30c9\\r\\n<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">\\u30b8\\u30e7\\u30d6\\u3092\\u8ffd\\u52a0\\r\\n<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">\\u30b8\\u30e7\\u30d6\\u30d1\\u30c3\\u30b1\\u30fc\\u30b8\\r\\n<\\/a><\\/li>\\r\\n                                        <\\/ul>\"},{\"title\":\"\\u79c1\\u305f\\u3061\\u306b\\u95a2\\u3057\\u3066\\u306f\",\"size\":\"3\",\"content\":\"<ul class=\\\"list\\\">\\r\\n                                            <li><a href=\\\"#\\\">\\u6c42\\u4eba\\u30da\\u30fc\\u30b8\\r\\n<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">\\u6c42\\u4eba\\u30da\\u30fc\\u30b8\\u306e\\u4ee3\\u66ff\\r\\n<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">\\u5c65\\u6b74\\u66f8\\u30da\\u30fc\\u30b8\\r\\n<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">\\u30d6\\u30ed\\u30b0<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">\\u30b3\\u30f3\\u30bf\\u30af\\u30c8\\r\\n<\\/a><\\/li>\\r\\n                                        <\\/ul>\"},{\"title\":\"\\u5f79\\u7acb\\u3064\\u30ea\\u30bd\\u30fc\\u30b9\",\"size\":\"3\",\"content\":\"<ul class=\\\"list\\\">\\r\\n                                            <li><a href=\\\"#\\\">\\u30b5\\u30a4\\u30c8\\u30de\\u30c3\\u30d7\\r\\n<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">\\u5229\\u7528\\u898f\\u7d04\\r\\n<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">\\u30d7\\u30e9\\u30a4\\u30d0\\u30b7\\u30fc\\u30bb\\u30f3\\u30bf\\u30fc\\r\\n<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">\\u30bb\\u30ad\\u30e5\\u30ea\\u30c6\\u30a3\\u30bb\\u30f3\\u30bf\\u30fc\\r\\n<\\/a><\\/li>\\r\\n                                            <li><a href=\\\"#\\\">\\u30a2\\u30af\\u30bb\\u30b7\\u30d3\\u30ea\\u30c6\\u30a3\\u30bb\\u30f3\\u30bf\\u30fc\\r\\n<\\/a><\\/li>\\r\\n                                        <\\/ul>\"}]', NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'home_page_id', 'general', '4', NULL, 1, 1, NULL, NULL, '2023-06-06 23:26:32'),
(18, 'terms_and_conditions_id', 'general', '2', NULL, 1, 1, NULL, NULL, '2023-06-06 23:26:32'),
(19, 'page_contact_title', 'general', 'Contact Us', NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'page_contact_lists', 'general', '', NULL, 1, 1, NULL, NULL, '2023-06-18 23:08:09'),
(21, 'page_contact_iframe_google_map', 'general', '', NULL, 1, 1, NULL, NULL, '2023-06-18 23:06:41'),
(22, 'contact_call_to_action_title', 'general', 'Advertising', NULL, 1, 1, NULL, NULL, '2023-06-07 00:21:40'),
(23, 'contact_call_to_action_sub_title', 'general', 'Advertise your jobs to thousands of monthly users and search hundreds of<br> CVs in our database.', NULL, 1, 1, NULL, NULL, '2023-06-07 00:21:40'),
(24, 'contact_call_to_action_button_text', 'general', 'Start Advertising Now', NULL, 1, 1, NULL, NULL, '2023-06-07 00:21:40'),
(25, 'contact_call_to_action_button_link', 'general', '#', NULL, 1, 1, NULL, NULL, '2023-06-06 23:26:32'),
(26, 'contact_call_to_action_image', 'general', '40', NULL, 1, 1, NULL, NULL, '2023-06-06 23:26:32'),
(27, 'currency_main', 'payment', 'usd', NULL, 1, 1, NULL, NULL, '2023-06-17 03:29:05'),
(28, 'currency_format', 'payment', 'left', NULL, 1, 1, NULL, NULL, '2023-06-17 03:29:05'),
(29, 'currency_decimal', 'payment', ',', NULL, 1, 1, NULL, NULL, '2023-06-17 03:29:05'),
(30, 'currency_thousand', 'payment', '.', NULL, 1, 1, NULL, NULL, '2023-06-17 03:29:05'),
(31, 'currency_no_decimal', 'payment', '0', NULL, 1, 1, NULL, NULL, '2023-06-17 03:29:05'),
(32, 'extra_currency', 'payment', '[{\"currency_main\":\"eur\",\"currency_format\":\"left\",\"currency_thousand\":\".\",\"currency_decimal\":\",\",\"currency_no_decimal\":\"2\",\"rate\":\"0.902807\"}]', NULL, 1, 1, NULL, NULL, '2023-06-17 03:29:05'),
(33, 'map_provider', NULL, 'gmap', NULL, 1, 1, NULL, NULL, '2023-06-09 03:49:09'),
(34, 'map_gmap_key', NULL, '', NULL, 1, 1, NULL, NULL, '2023-06-09 03:49:09'),
(35, 'g_offline_payment_enable', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'g_offline_payment_name', NULL, 'Offline Payment', NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'date_format', NULL, 'm/d/Y', NULL, 1, 1, NULL, NULL, '2023-06-06 23:26:32'),
(38, 'site_timezone', NULL, 'UTC', NULL, 1, 1, NULL, NULL, '2023-06-06 23:26:32'),
(39, 'site_title', NULL, 'Rvoize', NULL, 1, 1, NULL, NULL, '2023-06-06 23:26:32'),
(40, 'email_header', NULL, '<h1 class=\"site-title\" style=\"text-align: center;\">Rvoize</h1>', NULL, 1, 1, NULL, NULL, '2023-06-07 06:39:15'),
(41, 'email_footer', NULL, '<p class=\"\" style=\"text-align: center;\">&copy; 2023 Rvoize. All rights reserved</p>', NULL, 1, 1, NULL, NULL, '2023-06-07 06:39:15'),
(42, 'enable_preloader', NULL, '', NULL, 1, 1, NULL, NULL, '2023-06-06 23:26:32'),
(43, 'enable_mail_user_registered', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL),
(44, 'user_content_email_registered', NULL, '<h1 style=\"text-align: center\">Welcome!</h1>\r\n                    <h3>Hello [first_name] [last_name]</h3>\r\n                    <p>Thank you for signing up with Superio! We hope you enjoy your time with us.</p>\r\n                    <p>Regards,</p>\r\n                    <p>Superio</p>', NULL, NULL, NULL, NULL, NULL, NULL),
(45, 'admin_enable_mail_user_registered', NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL),
(46, 'admin_content_email_user_registered', NULL, '<h3>Hello Administrator</h3>\r\n                    <p>We have new registration</p>\r\n                    <p>Full name: [first_name] [last_name]</p>\r\n                    <p>Email: [email]</p>\r\n                    <p>Regards,</p>\r\n                    <p>Superio</p>', NULL, NULL, NULL, NULL, NULL, NULL),
(47, 'user_content_email_forget_password', NULL, '<h1>Hello!</h1>\r\n                    <p>You are receiving this email because we received a password reset request for your account.</p>\r\n                    <p style=\"text-align: center\">[button_reset_password]</p>\r\n                    <p>This password reset link expire in 60 minutes.</p>\r\n                    <p>If you did not request a password reset, no further action is required.\r\n                    </p>\r\n                    <p>Regards,</p>\r\n                    <p>Superio</p>', NULL, NULL, NULL, NULL, NULL, NULL),
(48, 'email_driver', NULL, 'log', NULL, 1, 1, NULL, NULL, '2023-06-16 07:42:41'),
(49, 'email_host', NULL, 'smtp.hostinger.com', NULL, 1, 1, NULL, NULL, '2023-06-16 07:38:57'),
(50, 'email_port', NULL, '465', NULL, 1, 1, NULL, NULL, '2023-06-16 07:31:19'),
(51, 'email_encryption', NULL, 'ssl', NULL, 1, 1, NULL, NULL, '2023-06-16 07:31:19'),
(52, 'email_username', NULL, 'info@ascatpadi.org', NULL, 1, 1, NULL, NULL, '2023-06-16 07:38:57'),
(53, 'email_password', NULL, 'Info@2023', NULL, 1, 1, NULL, NULL, '2023-06-16 07:38:57'),
(54, 'email_mailgun_domain', NULL, '', NULL, 1, 1, NULL, NULL, '2023-06-07 06:39:15'),
(55, 'email_mailgun_secret', NULL, '', NULL, 1, 1, NULL, NULL, '2023-06-07 06:39:15'),
(56, 'email_mailgun_endpoint', NULL, 'api.mailgun.net', NULL, 1, 1, NULL, NULL, '2023-06-07 06:39:15'),
(57, 'email_postmark_token', NULL, '', NULL, 1, 1, NULL, NULL, '2023-06-07 06:39:15'),
(58, 'email_ses_key', NULL, '', NULL, 1, 1, NULL, NULL, '2023-06-07 06:39:15'),
(59, 'email_ses_secret', NULL, '', NULL, 1, 1, NULL, NULL, '2023-06-07 06:39:15'),
(60, 'email_ses_region', NULL, 'us-east-1', NULL, 1, 1, NULL, NULL, '2023-06-07 06:39:15'),
(61, 'email_sparkpost_secret', NULL, '', NULL, 1, 1, NULL, NULL, '2023-06-07 06:39:15'),
(62, 'content_email_apply_job_submit', NULL, '<h3>Hello [employer_name],</h3>\r\n<p>A candidate apply for your job:</p>\r\n<p>Candidate Name: [candidate_name]</p>\r\n<p>Message: [message]</p>\r\n<p>Regards,</p>\r\n<p>Rvoize</p>', NULL, 1, 1, NULL, NULL, '2023-06-16 07:41:26'),
(63, 'content_email_change_applicants_status', NULL, '<h3>Hello [candidate_name],</h3>\r\n<p>Employer [applicants_status] you from job [job_title]</p>\r\n<p>Regards,</p>\r\n<p>Rvoize</p>', NULL, 1, 1, NULL, NULL, '2023-06-16 07:41:26'),
(64, 'cookie_agreement_enable', NULL, '1', NULL, 1, 1, NULL, NULL, '2023-06-09 03:49:09'),
(65, 'cookie_agreement_button_text', NULL, 'Got it', NULL, 1, 1, NULL, NULL, '2023-06-09 03:49:09'),
(66, 'cookie_agreement_content', NULL, '<p>This website requires cookies to provide all of its features. By using our website, you agree to our use of cookies. <a href=\"#\">More info</a></p>', NULL, 1, 1, NULL, NULL, '2023-06-09 03:49:09'),
(67, 'booking_why_book_with_us', NULL, '', NULL, 1, NULL, NULL, NULL, '2023-06-17 05:19:41'),
(68, 'logo_invoice_id', NULL, '177', NULL, 1, NULL, NULL, NULL, '2023-06-17 05:19:41'),
(69, 'invoice_company_info', NULL, '<p><span style=\"font-size: 14pt;\"><strong>Rvoize </strong></span></p>', NULL, 1, NULL, NULL, NULL, '2023-06-17 05:19:41'),
(70, 'vendor_commission_type', NULL, 'percent', NULL, 1, 1, NULL, '2023-06-06 05:58:50', '2023-06-20 20:47:54'),
(71, 'vendor_commission_amount', NULL, '10', NULL, 1, 1, NULL, '2023-06-06 05:58:50', '2023-06-20 20:47:54'),
(72, 'news_page_list_title', 'news', 'Blog', NULL, NULL, NULL, NULL, NULL, NULL),
(73, 'news_page_list_sub_title', 'news', 'Blog', NULL, NULL, NULL, NULL, NULL, NULL),
(74, 'news_page_list_banner', 'news', '39', NULL, NULL, NULL, NULL, NULL, NULL),
(75, 'news_sidebar', 'news', '[{\"title\":null,\"content\":null,\"type\":\"search_form\"},{\"title\":\"About Us\",\"content\":\"Nam dapibus nisl vitae elit fringilla rutrum. Aenean sollicitudin, erat a elementum rutrum, neque sem pretium metus, quis mollis nisl nunc et massa\",\"type\":\"content_text\"},{\"title\":\"Categories\",\"content\":null,\"type\":\"category\"},{\"title\":\"Tags\",\"content\":null,\"type\":\"tag\"}]', NULL, NULL, NULL, NULL, NULL, NULL),
(76, 'candidate_page_search_title', NULL, 'Find Candidates', NULL, 1, 1, NULL, NULL, '2023-06-17 03:53:44'),
(77, 'candidate_page_search_title_ja', NULL, '仕事を探す', NULL, NULL, NULL, NULL, NULL, NULL),
(78, 'candidate_list_layout', NULL, 'v1', NULL, 1, 1, NULL, NULL, '2023-06-17 03:53:44'),
(79, 'candidate_single_layout', NULL, 'v1', NULL, 1, 1, NULL, NULL, '2023-06-17 03:53:44'),
(80, 'candidate_sidebar_search_fields', NULL, '[{\"title\":\"Search by Keywords\",\"type\":\"keyword\",\"position\":\"1\"},{\"title\":\"Location\",\"type\":\"location\",\"position\":\"2\"},{\"title\":\"Category\",\"type\":\"category\",\"position\":\"3\"},{\"title\":\"Skills\",\"type\":\"skill\",\"position\":\"4\"},{\"title\":\"Date Posted\",\"type\":\"date_posted\",\"position\":\"5\"},{\"title\":\"Experience Level\",\"type\":\"experience\",\"position\":\"6\"},{\"title\":\"Education Levels\",\"type\":\"education\",\"position\":\"7\"}]', NULL, 1, 1, NULL, NULL, '2023-06-17 03:53:44'),
(81, 'candidate_location_search_style', NULL, 'autocomplete', NULL, 1, 1, NULL, NULL, '2023-06-17 03:53:44'),
(82, 'job_page_search_title', NULL, 'Find Jobs', NULL, 1, 1, NULL, NULL, '2023-06-20 01:30:00'),
(83, 'job_page_search_title_ja', NULL, '仕事を探す', NULL, NULL, NULL, NULL, NULL, NULL),
(84, 'jobs_list_layout', NULL, 'job-list-v1', NULL, 1, 1, NULL, NULL, '2023-06-20 01:30:00'),
(85, 'job_single_layout', NULL, 'job-single-v1', NULL, 1, 1, NULL, NULL, '2023-06-20 01:30:00'),
(86, 'job_sidebar_search_fields', NULL, '[{\"title\":\"Search by Keywords\",\"type\":\"keyword\",\"position\":\"1\"},{\"title\":\"Location\",\"type\":\"location\",\"position\":\"2\"},{\"title\":\"Category\",\"type\":\"category\",\"position\":\"3\"},{\"title\":\"Job type\",\"type\":\"job_type\",\"position\":\"4\"},{\"title\":\"Date Posted\",\"type\":\"date_posted\",\"position\":\"5\"},{\"title\":\"Experience Level\",\"type\":\"experience\",\"position\":\"6\"},{\"title\":\"Salary\",\"type\":\"salary\",\"position\":\"7\"}]', NULL, 1, 1, NULL, NULL, '2023-06-20 01:30:00'),
(87, 'job_banner_search_fields', NULL, '[{\"title\":\"Keyword\",\"type\":\"keyword\",\"position\":\"1\"},{\"title\":\"Location\",\"type\":\"location\",\"position\":\"2\"},{\"title\":\"Category\",\"type\":\"category\",\"position\":\"3\"}]', NULL, 1, 1, NULL, NULL, '2023-06-20 01:30:00'),
(88, 'job_sidebar_cta', NULL, '{\"title\":\"Advertisement\",\"desc\":\"Advertise your jobs to thousands of monthly users and search hundreds of  CVs in our database.\",\"button\":{\"url\":\"#\",\"name\":\"Start Advertising Now\",\"target\":\"_blank\"},\"image\":\"17\"}', NULL, 1, 1, NULL, NULL, '2023-06-20 01:30:00'),
(89, 'job_location_search_style', NULL, 'autocomplete', NULL, 1, 1, NULL, NULL, '2023-06-20 01:30:00'),
(90, 'company_page_search_title', NULL, 'Find Companies', NULL, 1, NULL, NULL, NULL, '2023-06-17 05:18:45'),
(91, 'company_page_search_title_ja', NULL, '会社を探す', NULL, NULL, NULL, NULL, NULL, NULL),
(92, 'company_list_layout', NULL, 'company-list-v1', NULL, 1, NULL, NULL, NULL, '2023-06-17 05:18:45'),
(93, 'single_company_layout', NULL, 'company-single-v1', NULL, 1, NULL, NULL, NULL, '2023-06-17 05:18:45'),
(94, 'company_sidebar_search_fields', NULL, '[{\"title\":\"Search by Keywords\",\"type\":\"keyword\",\"position\":\"1\"},{\"title\":\"Location\",\"type\":\"location\",\"position\":\"2\"},{\"title\":\"Category\",\"type\":\"category\",\"position\":\"3\"},{\"title\":\"Attribute\",\"type\":\"att\",\"position\":\"4\"},{\"title\":\"Founded Date\",\"type\":\"founded_date\",\"position\":\"5\"}]', NULL, 1, NULL, NULL, NULL, '2023-06-17 05:18:45'),
(95, 'company_sidebar_cta', NULL, '{\"title\":\"Recruiting?\",\"desc\":\"Advertise your jobs to thousands of monthly users and search hundreds of CVs in our database.\",\"button\":{\"url\":\"#\",\"name\":\"Start Recruiting Now\",\"target\":\"_blank\"},\"image\":\"17\"}', NULL, 1, NULL, NULL, NULL, '2023-06-17 05:18:45'),
(96, 'company_location_search_style', NULL, 'autocomplete', NULL, 1, NULL, NULL, NULL, '2023-06-17 05:18:45'),
(97, 'gig_booking_buyer_fees', NULL, '[{\"name\":\"Service fee\",\"desc\":null,\"price\":\"2\",\"unit\":\"fixed\"}]', NULL, 1, 1, NULL, '2023-06-06 05:58:57', '2023-06-20 20:47:54'),
(98, 'enable_mail_vendor_registered', 'vendor', '1', NULL, NULL, NULL, NULL, NULL, NULL),
(99, 'vendor_content_email_registered', 'vendor', '<h1 style=\"text-align: center;\">Welcome!</h1>\n                            <h3>Hello [first_name] [last_name]</h3>\n                            <p>Thank you for signing up with Superio! We hope you enjoy your time with us.</p>\n                            <p>Regards,</p>\n                            <p>Superio</p>', NULL, NULL, NULL, NULL, NULL, NULL),
(100, 'admin_enable_mail_vendor_registered', 'vendor', '1', NULL, NULL, NULL, NULL, NULL, NULL),
(101, 'admin_content_email_vendor_registered', 'vendor', '<h3>Hello Administrator</h3>\n                            <p>An user has been registered as Vendor. Please check the information bellow:</p>\n                            <p>Full name: [first_name] [last_name]</p>\n                            <p>Email: [email]</p>\n                            <p>Registration date: [created_at]</p>\n                            <p>You can approved the request here: [link_approved]</p>\n                            <p>Regards,</p>\n                            <p>Superio</p>', NULL, NULL, NULL, NULL, NULL, NULL),
(102, 'booking_enquiry_enable_mail_to_vendor_content', 'enquiry', '<h3>Hello [vendor_name]</h3>\n                            <p>You get new inquiry request from [email]</p>\n                            <p>Name :[name]</p>\n                            <p>Emai:[email]</p>\n                            <p>Phone:[phone]</p>\n                            <p>Content:[note]</p>\n                            <p>Service:[service_link]</p>\n                            <p>Regards,</p>\n                            <p>Superio</p>\n                            </div>', NULL, NULL, NULL, NULL, NULL, NULL),
(103, 'booking_enquiry_enable_mail_to_admin_content', 'enquiry', '<h3>Hello Administrator</h3>\n                            <p>You get new inquiry request from [email]</p>\n                            <p>Name :[name]</p>\n                            <p>Emai:[email]</p>\n                            <p>Phone:[phone]</p>\n                            <p>Content:[note]</p>\n                            <p>Service:[service_link]</p>\n                            <p>Vendor:[vendor_link]</p>\n                            <p>Regards,</p>\n                            <p>Superio</p>', NULL, NULL, NULL, NULL, NULL, NULL),
(104, 'update_to_1.10', NULL, '1', NULL, NULL, NULL, NULL, '2023-06-06 06:00:29', '2023-06-06 06:00:29'),
(105, 'schema_gig_version', NULL, '1.7', NULL, NULL, NULL, NULL, '2023-06-06 06:00:29', '2023-06-06 06:00:29'),
(106, 'user_plans_page_title', 'user_plans', 'Pricing Packages', NULL, 1, NULL, NULL, NULL, '2023-06-13 23:04:19'),
(107, 'user_plans_page_sub_title', 'user_plans', 'Choose your pricing plan', NULL, 1, NULL, NULL, NULL, '2023-06-13 23:04:19'),
(108, 'user_plans_sale_text', 'user_plans', '', NULL, 1, NULL, NULL, NULL, '2023-06-13 23:04:19'),
(109, 'update_to_1.2.0.2', NULL, '1', NULL, NULL, NULL, NULL, '2023-06-06 06:00:29', '2023-06-06 06:00:29'),
(110, 'enable_hide_email_company', 'company', '', NULL, 1, NULL, NULL, NULL, '2023-06-17 05:18:45'),
(111, 'update_to_1.3.0.0', NULL, '1', NULL, NULL, NULL, NULL, '2023-06-06 06:00:29', '2023-06-06 06:00:29'),
(112, 'update_to_2.0.0', NULL, '1', NULL, NULL, NULL, NULL, '2023-06-06 06:00:29', '2023-06-06 06:00:29'),
(113, 'update_to_2_0_1', NULL, '1', NULL, NULL, NULL, NULL, '2023-06-06 06:00:29', '2023-06-06 06:00:29'),
(114, 'update_to_2_1_0', NULL, '1', NULL, NULL, NULL, NULL, '2023-06-06 06:00:29', '2023-06-06 06:00:29'),
(115, 'company_role', NULL, '2', NULL, 1, NULL, NULL, '2023-06-06 06:00:30', '2023-06-17 05:18:45'),
(116, 'update_to_2_2_0', NULL, '1', NULL, NULL, NULL, NULL, '2023-06-06 06:00:30', '2023-06-06 06:00:30'),
(117, 'update_to_2_3_0', NULL, '1', NULL, NULL, NULL, NULL, '2023-06-06 06:00:30', '2023-06-06 06:00:30'),
(118, 'site_desc', NULL, '', NULL, 1, 1, NULL, '2023-06-06 23:26:19', '2023-06-06 23:26:32'),
(119, 'phone_contact', NULL, '', NULL, 1, 1, NULL, '2023-06-06 23:26:19', '2023-06-06 23:26:32'),
(120, 'site_first_day_of_the_weekin_calendar', NULL, '1', NULL, 1, 1, NULL, '2023-06-06 23:26:19', '2023-06-06 23:26:32'),
(121, 'enable_rtl', NULL, '', NULL, 1, 1, NULL, '2023-06-06 23:26:19', '2023-06-06 23:26:32'),
(122, 'default_location_lat', NULL, '0', NULL, 1, 1, NULL, '2023-06-09 03:38:35', '2023-06-09 03:49:09'),
(123, 'default_location_lng', NULL, '0', NULL, 1, 1, NULL, '2023-06-09 03:38:35', '2023-06-09 03:49:09'),
(124, 'google_client_secret', NULL, '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', NULL, 1, 1, NULL, '2023-06-09 03:38:35', '2023-06-15 23:40:38'),
(125, 'google_client_id', NULL, '846002183842-tgt72molliu8d259o217hd6it0h7fnis.apps.googleusercontent.com', NULL, 1, 1, NULL, '2023-06-09 03:38:35', '2023-06-15 23:40:38'),
(126, 'google_enable', NULL, '1', NULL, 1, 1, NULL, '2023-06-09 03:38:35', '2023-06-13 00:19:07'),
(127, 'facebook_client_secret', NULL, '', NULL, 1, 1, NULL, '2023-06-09 03:38:35', '2023-06-09 03:49:09'),
(128, 'facebook_client_id', NULL, '', NULL, 1, 1, NULL, '2023-06-09 03:38:35', '2023-06-09 03:49:09'),
(129, 'facebook_enable', NULL, '', NULL, 1, 1, NULL, '2023-06-09 03:38:35', '2023-06-09 03:49:09'),
(130, 'twitter_enable', NULL, '', NULL, 1, 1, NULL, '2023-06-09 03:38:35', '2023-06-09 03:49:09'),
(131, 'twitter_client_id', NULL, '', NULL, 1, 1, NULL, '2023-06-09 03:38:35', '2023-06-09 03:49:09'),
(132, 'twitter_client_secret', NULL, '', NULL, 1, 1, NULL, '2023-06-09 03:38:35', '2023-06-09 03:49:09'),
(133, 'linkedin_enable', NULL, '1', NULL, 1, 1, NULL, '2023-06-09 03:38:35', '2023-06-13 00:19:07'),
(134, 'linkedin_client_id', NULL, '86n0nrydafsmm8', NULL, 1, 1, NULL, '2023-06-09 03:38:35', '2023-06-16 05:38:07'),
(135, 'linkedin_client_secret', NULL, 'ZcYW4Jzvmc2VhuWf', NULL, 1, 1, NULL, '2023-06-09 03:38:35', '2023-06-16 05:38:07'),
(136, 'recaptcha_enable', NULL, '', NULL, 1, 1, NULL, '2023-06-09 03:38:35', '2023-06-09 03:49:09'),
(137, 'recaptcha_api_key', NULL, '', NULL, 1, 1, NULL, '2023-06-09 03:38:35', '2023-06-09 03:49:09'),
(138, 'recaptcha_api_secret', NULL, '', NULL, 1, 1, NULL, '2023-06-09 03:38:35', '2023-06-09 03:49:09'),
(139, 'head_scripts', NULL, '', NULL, 1, 1, NULL, '2023-06-09 03:38:35', '2023-06-09 03:49:09'),
(140, 'body_scripts', NULL, '', NULL, 1, 1, NULL, '2023-06-09 03:38:35', '2023-06-09 03:49:09'),
(141, 'footer_scripts', NULL, '', NULL, 1, 1, NULL, '2023-06-09 03:38:35', '2023-06-09 03:49:09'),
(142, 'size_unit', NULL, '', NULL, 1, 1, NULL, '2023-06-09 03:38:35', '2023-06-09 03:49:09'),
(143, 'broadcast_driver', NULL, 'null', NULL, 1, 1, NULL, '2023-06-09 03:38:35', '2023-06-09 03:49:09'),
(144, 'pusher_api_key', NULL, '', NULL, 1, 1, NULL, '2023-06-09 03:38:35', '2023-06-09 03:49:09'),
(145, 'pusher_api_secret', NULL, '', NULL, 1, 1, NULL, '2023-06-09 03:38:35', '2023-06-09 03:49:09'),
(146, 'pusher_app_id', NULL, '', NULL, 1, 1, NULL, '2023-06-09 03:38:35', '2023-06-09 03:49:09'),
(147, 'pusher_cluster', NULL, '', NULL, 1, 1, NULL, '2023-06-09 03:38:35', '2023-06-09 03:49:09'),
(148, 'job_page_list_seo_title', NULL, '', NULL, 1, 1, NULL, '2023-06-12 00:34:17', '2023-06-20 01:30:00'),
(149, 'job_page_list_seo_desc', NULL, '', NULL, 1, 1, NULL, '2023-06-12 00:34:17', '2023-06-20 01:30:00'),
(150, 'job_page_list_seo_image', NULL, '', NULL, 1, 1, NULL, '2023-06-12 00:34:17', '2023-06-20 01:30:00'),
(151, 'job_page_list_seo_share', NULL, '{\"facebook\":{\"title\":null,\"desc\":null,\"image\":null},\"twitter\":{\"title\":null,\"desc\":null,\"image\":null}}', NULL, 1, 1, NULL, '2023-06-12 00:34:17', '2023-06-20 01:30:00'),
(152, 'job_require_plan', NULL, '1', NULL, 1, 1, NULL, '2023-06-12 00:34:17', '2023-06-20 01:30:00'),
(153, 'job_hide_expired_jobs', NULL, '', NULL, 1, 1, NULL, '2023-06-12 00:34:17', '2023-06-20 01:30:00'),
(154, 'job_need_approve', NULL, '', NULL, 1, 1, NULL, '2023-06-12 00:34:17', '2023-06-20 01:30:00'),
(155, 'job_hide_job_apply', NULL, '1', NULL, 1, 1, NULL, '2023-06-12 00:34:17', '2023-06-20 05:02:26'),
(156, 'job_company_max_post_jobs', NULL, '', NULL, 1, 1, NULL, '2023-06-12 00:34:17', '2023-06-20 01:30:00'),
(157, 'candidate_download_cv_required_login', NULL, '1', NULL, 1, 1, NULL, '2023-06-12 00:35:37', '2023-06-17 03:53:44'),
(158, 'candidate_public_policy', NULL, 'employer_applied', NULL, 1, 1, NULL, '2023-06-12 00:35:37', '2023-06-17 03:53:44'),
(159, 'candidate_limit_apply_by', NULL, 'none', NULL, 1, 1, NULL, '2023-06-12 00:35:37', '2023-06-17 03:53:44'),
(160, 'candidate_maximum_job_apply', NULL, '6', NULL, 1, 1, NULL, '2023-06-12 00:35:37', '2023-06-20 21:01:35'),
(161, 'candidates_list_layout', NULL, '', NULL, 1, 1, NULL, '2023-06-12 00:35:37', '2023-06-17 03:53:44'),
(162, 'single_candidate_layout', NULL, '', NULL, 1, 1, NULL, '2023-06-12 00:35:37', '2023-06-17 03:53:44'),
(163, 'candidate_page_list_seo_title', NULL, '', NULL, 1, 1, NULL, '2023-06-12 00:35:37', '2023-06-17 03:53:44'),
(164, 'candidate_page_list_seo_desc', NULL, '', NULL, 1, 1, NULL, '2023-06-12 00:35:37', '2023-06-17 03:53:44'),
(165, 'candidate_page_list_seo_image', NULL, '', NULL, 1, 1, NULL, '2023-06-12 00:35:37', '2023-06-17 03:53:44'),
(166, 'candidate_page_list_seo_share', NULL, '{\"facebook\":{\"title\":null,\"desc\":null,\"image\":null},\"twitter\":{\"title\":null,\"desc\":null,\"image\":null}}', NULL, 1, 1, NULL, '2023-06-12 00:35:37', '2023-06-17 03:53:44'),
(167, 'candidate_sidebar_cta', NULL, '{\"title\":\"Advertisement?\",\"desc\":null,\"button\":{\"url\":null,\"name\":null},\"image\":null}', NULL, 1, 1, NULL, '2023-06-12 00:35:37', '2023-06-17 03:53:44'),
(168, 'preloader_image', NULL, '', NULL, 1, 1, NULL, '2023-06-14 22:51:14', '2023-06-14 23:24:14'),
(169, 'style_main_color', NULL, '#292772', NULL, 1, 1, NULL, '2023-06-14 22:51:14', '2023-06-15 02:23:31'),
(170, 'style_custom_css', NULL, '.bravo-form-register input.checked:checked + .theme-btn {\r\n    background-color: #292772;\r\n}\r\n\r\n.bravo-form-register input.checked:checked + .theme-btn:hover {\r\n    background-color: #292772; /* Hover color */\r\n}\r\n\r\n.btn-style-four {\r\n    background-color: #29277236;\r\n    color: #292772;\r\n}\r\n\r\n.btn-style-four:hover {\r\n    background-color: #292772; /* Hover color */\r\n}\r\n/* Styles for desktop devices */\r\n@media only screen and (min-width: 768px) {\r\n  .contact-section .contact-form {\r\n    margin-top: 60px;\r\n  }\r\n}', NULL, 1, 1, NULL, '2023-06-14 22:51:14', '2023-06-18 23:11:22'),
(171, 'style_typo', NULL, '{\"font_family\":\"Open Sans\",\"color\":null,\"font_size\":null,\"line_height\":null,\"font_weight\":null}', NULL, 1, 1, NULL, '2023-06-14 22:51:14', '2023-06-15 02:22:14'),
(172, 'g_paypal_enable', NULL, '', NULL, 1, 1, NULL, '2023-06-17 01:48:03', '2023-06-17 03:29:05'),
(173, 'g_paypal_name', NULL, 'Paypal', NULL, 1, 1, NULL, '2023-06-17 01:48:03', '2023-06-17 03:29:05'),
(174, 'g_paypal_logo_id', NULL, '', NULL, 1, 1, NULL, '2023-06-17 01:48:03', '2023-06-17 03:29:05'),
(175, 'g_paypal_html', NULL, '', NULL, 1, 1, NULL, '2023-06-17 01:48:03', '2023-06-17 03:29:05'),
(176, 'g_paypal_test', NULL, '', NULL, 1, 1, NULL, '2023-06-17 01:48:03', '2023-06-17 03:29:05'),
(177, 'g_paypal_convert_to', NULL, '', NULL, 1, 1, NULL, '2023-06-17 01:48:03', '2023-06-17 03:29:05'),
(178, 'g_paypal_exchange_rate', NULL, '', NULL, 1, 1, NULL, '2023-06-17 01:48:03', '2023-06-17 03:29:05'),
(179, 'g_paypal_test_account', NULL, '', NULL, 1, 1, NULL, '2023-06-17 01:48:03', '2023-06-17 03:29:05'),
(180, 'g_paypal_test_client_id', NULL, '', NULL, 1, 1, NULL, '2023-06-17 01:48:03', '2023-06-17 03:29:06'),
(181, 'g_paypal_test_client_secret', NULL, '', NULL, 1, 1, NULL, '2023-06-17 01:48:03', '2023-06-17 03:29:06'),
(182, 'g_paypal_account', NULL, '', NULL, 1, 1, NULL, '2023-06-17 01:48:03', '2023-06-17 03:29:06'),
(183, 'g_paypal_client_id', NULL, '', NULL, 1, 1, NULL, '2023-06-17 01:48:03', '2023-06-17 03:29:06'),
(184, 'g_paypal_client_secret', NULL, '', NULL, 1, 1, NULL, '2023-06-17 01:48:03', '2023-06-17 03:29:06'),
(185, 'g_stripe_enable', NULL, '', NULL, 1, 1, NULL, '2023-06-17 01:48:03', '2023-06-17 03:29:06'),
(186, 'g_stripe_name', NULL, 'Stripe', NULL, 1, 1, NULL, '2023-06-17 01:48:03', '2023-06-17 03:29:06'),
(187, 'g_stripe_logo_id', NULL, '', NULL, 1, 1, NULL, '2023-06-17 01:48:03', '2023-06-17 03:29:06'),
(188, 'g_stripe_html', NULL, '', NULL, 1, 1, NULL, '2023-06-17 01:48:03', '2023-06-17 03:29:06'),
(189, 'g_stripe_stripe_secret_key', NULL, '', NULL, 1, 1, NULL, '2023-06-17 01:48:03', '2023-06-17 03:29:06'),
(190, 'g_stripe_stripe_publishable_key', NULL, '', NULL, 1, 1, NULL, '2023-06-17 01:48:03', '2023-06-17 03:29:06'),
(191, 'g_stripe_stripe_enable_sandbox', NULL, '', NULL, 1, 1, NULL, '2023-06-17 01:48:03', '2023-06-17 03:29:06'),
(192, 'g_stripe_stripe_test_secret_key', NULL, '', NULL, 1, 1, NULL, '2023-06-17 01:48:03', '2023-06-17 03:29:06'),
(193, 'g_stripe_stripe_test_publishable_key', NULL, '', NULL, 1, 1, NULL, '2023-06-17 01:48:03', '2023-06-17 03:29:06'),
(194, 'g_flutter_wave_checkout_gateway_enable', NULL, '', NULL, 1, 1, NULL, '2023-06-17 01:48:03', '2023-06-17 03:29:06'),
(195, 'g_flutter_wave_checkout_gateway_name', NULL, 'FlutterWave', NULL, 1, 1, NULL, '2023-06-17 01:48:03', '2023-06-17 03:29:06'),
(196, 'g_flutter_wave_checkout_gateway_logo_id', NULL, '', NULL, 1, 1, NULL, '2023-06-17 01:48:03', '2023-06-17 03:29:06'),
(197, 'g_flutter_wave_checkout_gateway_html', NULL, '', NULL, 1, 1, NULL, '2023-06-17 01:48:03', '2023-06-17 03:29:06'),
(198, 'g_flutter_wave_checkout_gateway_flutter_wave_api_key', NULL, '', NULL, 1, 1, NULL, '2023-06-17 01:48:03', '2023-06-17 03:29:06'),
(199, 'g_flutter_wave_checkout_gateway_flutter_wave_api_secret_key', NULL, '', NULL, 1, 1, NULL, '2023-06-17 01:48:03', '2023-06-17 03:29:06'),
(200, 'g_flutter_wave_checkout_gateway_flutter_wave_api_encryption_key', NULL, '', NULL, 1, 1, NULL, '2023-06-17 01:48:03', '2023-06-17 03:29:06'),
(201, 'g_razorpay_gateway_enable', NULL, '1', NULL, 1, 1, NULL, '2023-06-17 01:48:03', '2023-06-17 03:29:06'),
(202, 'g_razorpay_gateway_name', NULL, 'Razorpay Checkout', NULL, 1, 1, NULL, '2023-06-17 01:48:03', '2023-06-17 03:29:06'),
(203, 'g_razorpay_gateway_logo_id', NULL, '', NULL, 1, 1, NULL, '2023-06-17 01:48:03', '2023-06-17 03:29:06'),
(204, 'g_razorpay_gateway_convert_to', NULL, 'USD', NULL, 1, 1, NULL, '2023-06-17 01:48:03', '2023-06-17 03:29:06'),
(205, 'g_razorpay_gateway_exchange_rate', NULL, '', NULL, 1, 1, NULL, '2023-06-17 01:48:03', '2023-06-17 03:29:06'),
(206, 'g_razorpay_gateway_html', NULL, '', NULL, 1, 1, NULL, '2023-06-17 01:48:03', '2023-06-17 03:29:06'),
(207, 'g_razorpay_gateway_razorpay_key_id', NULL, '', NULL, 1, 1, NULL, '2023-06-17 01:48:03', '2023-06-17 03:29:06'),
(208, 'g_razorpay_gateway_razorpay_key_secret', NULL, '', NULL, 1, 1, NULL, '2023-06-17 01:48:03', '2023-06-17 03:29:06'),
(209, 'g_razorpay_gateway_razorpay_enable_sandbox', NULL, '1', NULL, 1, 1, NULL, '2023-06-17 01:48:03', '2023-06-17 03:29:17'),
(210, 'g_razorpay_gateway_razorpay_test_key_id', NULL, 'rzp_test_ctcmg23WjK14SB', NULL, 1, 1, NULL, '2023-06-17 01:48:03', '2023-06-17 03:29:06'),
(211, 'g_razorpay_gateway_razorpay_test_key_secret', NULL, 'QoZ37SwXpjoZfHLUmDOFCkwt', NULL, 1, 1, NULL, '2023-06-17 01:48:03', '2023-06-17 03:29:06'),
(212, 'company_page_list_seo_title', NULL, 'Find Companies', NULL, 1, NULL, NULL, '2023-06-17 05:18:45', '2023-06-17 05:18:45'),
(213, 'company_page_list_seo_desc', NULL, '', NULL, 1, NULL, NULL, '2023-06-17 05:18:45', '2023-06-17 05:18:45'),
(214, 'company_page_list_seo_image', NULL, '', NULL, 1, NULL, NULL, '2023-06-17 05:18:45', '2023-06-17 05:18:45'),
(215, 'company_page_list_seo_share', NULL, '{\"facebook\":{\"title\":null,\"desc\":null,\"image\":null},\"twitter\":{\"title\":null,\"desc\":null,\"image\":null}}', NULL, 1, NULL, NULL, '2023-06-17 05:18:45', '2023-06-17 05:18:45'),
(216, 'company_auto_approved', NULL, '', NULL, 1, NULL, NULL, '2023-06-17 05:18:45', '2023-06-17 05:18:45'),
(217, 'order_enable_recaptcha', NULL, '', NULL, 1, NULL, NULL, '2023-06-17 05:19:41', '2023-06-17 05:19:41'),
(218, 'order_term_conditions', NULL, '', NULL, 1, NULL, NULL, '2023-06-17 05:19:41', '2023-06-17 05:19:41'),
(219, 'booking_guest_checkout', NULL, '', NULL, 1, NULL, NULL, '2023-06-17 05:19:41', '2023-06-17 05:19:41'),
(220, 'gig_disable', NULL, '', NULL, 1, 1, NULL, '2023-06-20 04:51:47', '2023-06-20 20:47:54'),
(221, 'gig_need_approve', NULL, '', NULL, 1, 1, NULL, '2023-06-20 04:51:47', '2023-06-20 20:47:54'),
(222, 'gig_page_search_title', NULL, '', NULL, 1, 1, NULL, '2023-06-20 04:51:47', '2023-06-20 20:47:54'),
(223, 'gig_page_search_banner', NULL, '', NULL, 1, 1, NULL, '2023-06-20 04:51:47', '2023-06-20 20:47:54'),
(224, 'gig_page_limit_item', NULL, '24', NULL, 1, 1, NULL, '2023-06-20 04:51:47', '2023-06-20 20:47:54'),
(225, 'gig_enable_review', NULL, '', NULL, 1, 1, NULL, '2023-06-20 04:51:47', '2023-06-20 20:47:54'),
(226, 'gig_review_number_per_page', NULL, '5', NULL, 1, 1, NULL, '2023-06-20 04:51:47', '2023-06-20 20:47:54'),
(227, 'gig_review_stats', NULL, '', NULL, 1, 1, NULL, '2023-06-20 04:51:47', '2023-06-20 20:47:54'),
(228, 'gig_page_list_seo_title', NULL, '', NULL, 1, 1, NULL, '2023-06-20 04:51:47', '2023-06-20 20:47:54'),
(229, 'gig_page_list_seo_desc', NULL, '', NULL, 1, 1, NULL, '2023-06-20 04:51:47', '2023-06-20 20:47:54'),
(230, 'gig_page_list_seo_image', NULL, '', NULL, 1, 1, NULL, '2023-06-20 04:51:47', '2023-06-20 20:47:54'),
(231, 'gig_page_list_seo_share', NULL, '{\"facebook\":{\"title\":null,\"desc\":null,\"image\":null},\"twitter\":{\"title\":null,\"desc\":null,\"image\":null}}', NULL, 1, 1, NULL, '2023-06-20 04:51:47', '2023-06-20 20:47:54'),
(232, 'gig_booking_type', NULL, '', NULL, 1, 1, NULL, '2023-06-20 04:51:47', '2023-06-20 20:47:54'),
(233, 'gig_icon_marker_map', NULL, '', NULL, 1, 1, NULL, '2023-06-20 04:51:47', '2023-06-20 20:47:54'),
(234, 'gig_days_complete_order', NULL, '3', NULL, 1, 1, NULL, '2023-06-20 04:51:47', '2023-06-20 20:47:54'),
(235, 'gig_max_posts', NULL, '', NULL, 1, 1, NULL, '2023-06-20 04:51:47', '2023-06-20 20:47:54'),
(236, 'gig_require_plan', NULL, '', NULL, 1, 1, NULL, '2023-06-20 04:51:47', '2023-06-20 20:47:54');

-- --------------------------------------------------------

--
-- Table structure for table `core_subscribers`
--

DROP TABLE IF EXISTS `core_subscribers`;
CREATE TABLE IF NOT EXISTS `core_subscribers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `core_tags`
--

DROP TABLE IF EXISTS `core_tags`;
CREATE TABLE IF NOT EXISTS `core_tags` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `update_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `origin_id` bigint DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `core_tags`
--

INSERT INTO `core_tags` (`id`, `name`, `slug`, `content`, `create_user`, `update_user`, `deleted_at`, `origin_id`, `lang`, `created_at`, `updated_at`) VALUES
(1, 'App', 'app', NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-06 05:58:50', '2023-06-06 05:58:50'),
(2, 'Administrative', 'administrative', NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-06 05:58:50', '2023-06-06 05:58:50'),
(3, 'Android', 'android', NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-06 05:58:50', '2023-06-06 05:58:50'),
(4, 'Wordpress', 'wordpress', NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-06 05:58:50', '2023-06-06 05:58:50'),
(5, 'Design', 'design', NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-06 05:58:50', '2023-06-06 05:58:50'),
(6, 'React', 'react', NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-06 05:58:50', '2023-06-06 05:58:50');

-- --------------------------------------------------------

--
-- Table structure for table `core_tag_translations`
--

DROP TABLE IF EXISTS `core_tag_translations`;
CREATE TABLE IF NOT EXISTS `core_tag_translations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `origin_id` int UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `core_tag_translations_locale_index` (`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `core_templates`
--

DROP TABLE IF EXISTS `core_templates`;
CREATE TABLE IF NOT EXISTS `core_templates` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `type_id` int DEFAULT NULL,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `origin_id` bigint DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `core_templates`
--

INSERT INTO `core_templates` (`id`, `title`, `content`, `type_id`, `create_user`, `update_user`, `origin_id`, `lang`, `created_at`, `updated_at`) VALUES
(1, 'About', '[{\"type\":\"breadcrumb_section\",\"name\":\"Breadcrumb Section\",\"model\":{\"title\":\"About Us\",\"sub_title\":\"About Us\",\"bg_image\":\"\",\"bg_color\":\"\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"gallery\",\"name\":\"Gallery\",\"model\":{\"list_item\":[{\"_active\":true,\"image_id\":96},{\"_active\":true,\"image_id\":97},{\"_active\":true,\"image_id\":98},{\"_active\":true,\"image_id\":99},{\"_active\":true,\"image_id\":100},{\"_active\":true,\"image_id\":101}],\"style\":\"\",\"title\":\"\",\"sub_title\":\"\",\"load_more_url\":\"\",\"load_more_name\":\"\",\"list_item2\":\"\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"BlockCounter\",\"name\":\"Block Counter\",\"model\":{\"list_item\":[{\"_active\":true,\"number\":\"10\",\"symbol\":\"K\",\"desc\":\"10 K daily active users\"},{\"_active\":true,\"number\":\"1\",\"symbol\":\"k\",\"desc\":\"Over 1k open job positions\"},{\"_active\":true,\"number\":\"10\",\"symbol\":\"K\",\"desc\":\"Over 10K stories shared\"}],\"style\":\"\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"text\",\"name\":\"Text\",\"model\":{\"content\":\"<h4>About Rvoize</h4>\\n<p><span style=\\\"color: #565656; font-family: Roboto, sans-serif; font-size: 16px; background-color: #ffffff;\\\">RVOIZE is Human Resources Management Services and online job portal operated by RUVINSYS GLOBAL SOLUTIONS (INDIA &amp; UAE) connecting global recruiters and job-seekers. We are equipped with smart and intelligent search logic\'s which enables matching of candidate profiles to the job openings in the market place. Our prime focus is to get the job seeker find their next best job with less efforts.</span></p>\\n<p><span style=\\\"color: #565656; font-family: Roboto, sans-serif; font-size: 16px; background-color: #ffffff;\\\">Our specialised category based job posting by different employers globally helps job seekers to search their matching jobs across Globe. For employers our platform is the banquet place for diverse database of CVs from industries like Construction, Banking, Oil &amp; Gas, IT - Software and Hardware, Hospitality, Healthcare, Education, Telecom, Petrochemicals, Logistics and so on. Evoize.com partners committed working on the needs of its users with technological expertise to build solutions that optimise job search &amp; recruitment.</span></p>\",\"class\":\"about-section-three\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"call_to_action\",\"name\":\"Call To Action\",\"model\":{\"title\":\"Your Dream Jobs Are Waiting\",\"sub_title\":\"Over 10,000 interactions, thousands of success stories Make yours now.\",\"link_title\":\"Search Job\",\"link_more\":\"#\",\"style\":\"\",\"bg_image\":102,\"bg_gradient\":\"\",\"link_search\":\"Search Job\",\"url_search\":\"#\",\"link_apply\":\"Apply Job Now\",\"url_apply\":\"#\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"HowItWork\",\"name\":\"How It Works\",\"model\":{\"style\":\"style_2\",\"title\":\"How It Works?\",\"list_item\":[{\"_active\":true,\"title\":\"Free Resume Assessments\",\"sub_title\":\"Employers on average spend 31 seconds scanning resumes to identify potential matches.\",\"icon_image\":104,\"order\":null},{\"_active\":true,\"title\":\"Job Fit Scoring\",\"sub_title\":\"Employers on average spend 31 seconds scanning resumes to identify potential matches.\",\"icon_image\":105,\"order\":null},{\"_active\":true,\"title\":\"Help Every Step of the Way\",\"sub_title\":\"Employers on average spend 31 seconds scanning resumes to identify potential matches.\",\"icon_image\":106,\"order\":null}],\"background_image\":\"\",\"sub_title\":\"Job for anyone, anywhere\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"brands_list\",\"name\":\"Brands List\",\"model\":{\"list_item\":[{\"_active\":true,\"title\":\"Invision\",\"image_id\":107,\"brand_link\":\"#\"},{\"_active\":true,\"title\":\"figma\",\"image_id\":108,\"brand_link\":\"#\"},{\"_active\":true,\"title\":\"amazon\",\"image_id\":109,\"brand_link\":\"#\"},{\"_active\":true,\"title\":\"airbnb\",\"image_id\":110,\"brand_link\":\"#\"},{\"_active\":true,\"title\":\"spotify\",\"image_id\":111,\"brand_link\":\"#\"},{\"_active\":true,\"title\":\"slack\",\"image_id\":112,\"brand_link\":\"#\"},{\"_active\":true,\"title\":\"paypal\",\"image_id\":113,\"brand_link\":\"#\"}],\"style\":\"\",\"title\":\"\",\"sub_title\":\"\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false}]', NULL, 1, 1, NULL, NULL, '2023-06-06 05:58:47', '2023-06-12 01:40:08'),
(2, 'FAQ', '[{\"type\":\"breadcrumb_section\",\"name\":\"Breadcrumb Section\",\"model\":{\"title\":\"Frequently Asked Questions\",\"sub_title\":\"faq\",\"bg_color\":\"transparent\"},\"component\":\"RegularBlock\",\"open\":true},{\"type\":\"FaqList\",\"name\":\"FAQ\'s List\",\"model\":{\"title\":\"Payments\",\"list_item\":[{\"_active\":false,\"title\":\"Why won\'t my payment go through?\",\"sub_title\":\"<p>Pharetra nulla ullamcorper sit lectus. Fermentum mauris pellentesque nec nibh sed et, vel diam, massa. Placerat quis vel fames interdum urna lobortis sagittis sed pretium. Aliquam eget posuere sit enim elementum nulla vulputate magna. Morbi sed arcu proin quis tortor non risus.</p>\\n<p>Elementum lectus a porta commodo suspendisse arcu, aliquam lectus faucibus.</p>\"},{\"_active\":false,\"title\":\"How do I get a refund?\",\"sub_title\":\"<p>Pharetra nulla ullamcorper sit lectus. Fermentum mauris pellentesque nec nibh sed et, vel diam, massa. Placerat quis vel fames interdum urna lobortis sagittis sed pretium. Aliquam eget posuere sit enim elementum nulla vulputate magna. Morbi sed arcu proin quis tortor non risus.</p>\\n<p>Elementum lectus a porta commodo suspendisse arcu, aliquam lectus faucibus.</p>\"},{\"_active\":false,\"title\":\"How do I redeem a coupon?\",\"sub_title\":\"<p>Pharetra nulla ullamcorper sit lectus. Fermentum mauris pellentesque nec nibh sed et, vel diam, massa. Placerat quis vel fames interdum urna lobortis sagittis sed pretium. Aliquam eget posuere sit enim elementum nulla vulputate magna. Morbi sed arcu proin quis tortor non risus.</p>\\n<p>Elementum lectus a porta commodo suspendisse arcu, aliquam lectus faucibus.</p>\"},{\"_active\":true,\"title\":\"Changing account name\",\"sub_title\":\"<p>Pharetra nulla ullamcorper sit lectus. Fermentum mauris pellentesque nec nibh sed et, vel diam, massa. Placerat quis vel fames interdum urna lobortis sagittis sed pretium. Aliquam eget posuere sit enim elementum nulla vulputate magna. Morbi sed arcu proin quis tortor non risus.</p>\\n<p>Elementum lectus a porta commodo suspendisse arcu, aliquam lectus faucibus.</p>\"}]},\"component\":\"RegularBlock\",\"open\":true},{\"type\":\"FaqList\",\"name\":\"FAQ\'s List\",\"model\":{\"title\":\"Suggestions\",\"list_item\":[{\"_active\":false,\"title\":\"Why won\'t my payment go through?\",\"sub_title\":\"<p>Pharetra nulla ullamcorper sit lectus. Fermentum mauris pellentesque nec nibh sed et, vel diam, massa. Placerat quis vel fames interdum urna lobortis sagittis sed pretium. Aliquam eget posuere sit enim elementum nulla vulputate magna. Morbi sed arcu proin quis tortor non risus.</p>\\n<p>Elementum lectus a porta commodo suspendisse arcu, aliquam lectus faucibus.</p>\"},{\"_active\":false,\"title\":\"How do I get a refund?\",\"sub_title\":\"<p>Pharetra nulla ullamcorper sit lectus. Fermentum mauris pellentesque nec nibh sed et, vel diam, massa. Placerat quis vel fames interdum urna lobortis sagittis sed pretium. Aliquam eget posuere sit enim elementum nulla vulputate magna. Morbi sed arcu proin quis tortor non risus.</p>\\n<p>Elementum lectus a porta commodo suspendisse arcu, aliquam lectus faucibus.</p>\"},{\"_active\":false,\"title\":\"How do I redeem a coupon?\",\"sub_title\":\"<p>Pharetra nulla ullamcorper sit lectus. Fermentum mauris pellentesque nec nibh sed et, vel diam, massa. Placerat quis vel fames interdum urna lobortis sagittis sed pretium. Aliquam eget posuere sit enim elementum nulla vulputate magna. Morbi sed arcu proin quis tortor non risus.</p>\\n<p>Elementum lectus a porta commodo suspendisse arcu, aliquam lectus faucibus.</p>\"},{\"_active\":true,\"title\":\"Changing account name\",\"sub_title\":\"<p>Pharetra nulla ullamcorper sit lectus. Fermentum mauris pellentesque nec nibh sed et, vel diam, massa. Placerat quis vel fames interdum urna lobortis sagittis sed pretium. Aliquam eget posuere sit enim elementum nulla vulputate magna. Morbi sed arcu proin quis tortor non risus.</p>\\n<p>Elementum lectus a porta commodo suspendisse arcu, aliquam lectus faucibus.</p>\"}]},\"component\":\"RegularBlock\",\"open\":true}]', NULL, 1, NULL, NULL, NULL, '2023-06-06 05:58:47', NULL),
(3, 'Home Page 1', '[{\"type\":\"hero_banner\",\"name\":\"Hero Banner\",\"model\":{\"style\":\"style_1\",\"title\":\"There Are <span class=\\\"colored\\\" style=\\\"color: #0000FF;\\\">1000+</span> Postings Here For you!\",\"sub_title\":\"Find Jobs, Employment & Career Opportunities\",\"popular_searches\":\"Designer,Developer,Web,IOS,PHP,Senior,Engineer\",\"list_images\":[],\"banner_image\":\"\",\"location_style\":\"autocomplete\",\"upload_cv_url\":\"\",\"banner_image_2\":\"\",\"style_5_banner_image_2\":\"\",\"style_5_banner_image_3\":\"\",\"style_5_list_images\":\"\",\"style_6_list_images\":\"\",\"style_7_list_images\":\"\",\"list_counter\":\"\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"job_categories\",\"name\":\"Job Categories\",\"model\":{\"style\":\"style_1\",\"title\":\"Popular Job Categories\",\"sub_title\":\"2020 jobs live - 293 added today.\",\"job_categories\":[\"6\",\"7\",\"8\",\"1\",\"2\",\"3\",\"4\",\"5\",\"9\"]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"jobs_list\",\"name\":\"Jobs List\",\"model\":{\"style\":\"style_1\",\"title\":\"Featured Jobs\",\"sub_title\":\"Know your worth and find the job that qualify your life\",\"number\":6,\"job_categories\":\"\",\"order\":\"is_featured\",\"order_by\":\"desc\",\"load_more_url\":\"/job\",\"ids\":\"\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"brands_list\",\"name\":\"Brands List\",\"model\":{\"list_item\":[{\"_active\":false,\"title\":\"Figma\",\"image_id\":108,\"brand_link\":null},{\"_active\":false,\"title\":\"Amazon\",\"image_id\":109,\"brand_link\":null},{\"_active\":false,\"title\":\"Airbnb\",\"image_id\":110,\"brand_link\":null},{\"_active\":false,\"title\":\"Spotify\",\"image_id\":111,\"brand_link\":null},{\"_active\":false,\"title\":\"Slack\",\"image_id\":112,\"brand_link\":null},{\"_active\":false,\"title\":\"Paypal\",\"image_id\":113,\"brand_link\":null}],\"style\":\"style_1\",\"title\":\"\",\"sub_title\":\"\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"about\",\"name\":\"About Us Block\",\"model\":{\"style\":\"style_1\",\"title\":\"Thousands of Jobs. Find the one that suits you.\",\"content\":\"<p>Search all the open positions on the web. Get your own personalized salary estimate. Read reviews on hundreds of companies worldwide.</p>\\n<ul class=\\\"list-style-one\\\">\\n<li>Find Your Dream Job</li>\\n<li>Capitalize on low hanging fruit to identify</li>\\n<li>But I must explain to you how all this</li>\\n</ul>\",\"button_name\":\"Get Started\",\"button_url\":\"http://localhost/rvoize/public/job\",\"button_target\":0,\"featured_image\":189,\"image_2\":\"\",\"sub_title\":\"\",\"button_color\":\"\",\"sub_image_2\":\"\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"BlockCounter\",\"name\":\"Block Counter\",\"model\":{\"list_item\":[{\"_active\":true,\"number\":\"10\",\"symbol\":\"K\",\"desc\":\"10 K daily active users\"},{\"_active\":true,\"number\":\"1\",\"symbol\":\"K\",\"desc\":\"Over 1k open job positions\"},{\"_active\":true,\"number\":\"10K\",\"symbol\":\"K\",\"desc\":\"Over 10K stories shared\"}],\"max_width\":1310,\"style\":\"style_2\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_news\",\"name\":\"News: List Items\",\"model\":{\"style\":\"style_1\",\"title\":\"Recent News Articles\",\"number\":3,\"category_id\":\"\",\"order\":\"\",\"order_by\":\"\",\"sub_title\":\"Fresh job related news content posted each day.\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"BlockAds\",\"name\":\"Ads Block\",\"model\":{\"style\":\"style_1\",\"list_item\":[{\"_active\":true,\"title\":\"Marketing \",\"sub_title\":\"India\",\"button_name\":\"Apply\",\"image_id\":141,\"ads_link\":\"#\"},{\"_active\":true,\"title\":\"Accounting\",\"sub_title\":\"UAE\",\"button_name\":\"Apply\",\"image_id\":140,\"ads_link\":\"#\"},{\"_active\":true,\"title\":\"Designing \",\"sub_title\":\"Saudi Arabia\",\"button_name\":\"Apply\",\"image_id\":188,\"ads_link\":\"#\"}]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false}]', NULL, 1, 1, NULL, NULL, '2023-06-06 05:58:47', '2023-06-19 08:41:59'),
(4, 'Home Page 2', '[{\"type\":\"hero_banner\",\"name\":\"Hero Banner\",\"model\":{\"style\":\"style_2\",\"title\":\"Find Your Perfect Job <br>Match\",\"sub_title\":\"Find Jobs, Employment & Career Opportunities\",\"popular_searches\":\"Designer,Developer,Web,IOS,PHP,Senior,Engineer\",\"banner_image\":50,\"banner_image_2\":56,\"upload_cv_url\":\"#\",\"location_style\":\"autocomplete\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"HowItWork\",\"name\":\"How It Works\",\"model\":{\"title\":\"How It Works?\",\"sub_title\":\"Job for anyone, anywhere\",\"list_item\":[{\"_active\":false,\"title\":\"Free Resume Assessments\",\"sub_title\":\"Employers on average spend 31 seconds scanning resumes to identify potential matches.\",\"icon_image\":104},{\"_active\":false,\"title\":\"Job Fit Scoring\",\"sub_title\":\"Employers on average spend 31 seconds scanning resumes to identify potential matches.\",\"icon_image\":105},{\"_active\":false,\"title\":\"Help Every Step of the Way\",\"sub_title\":\"Employers on average spend 31 seconds scanning resumes to identify potential matches.\",\"icon_image\":106}]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"jobs_list\",\"name\":\"Jobs List\",\"model\":{\"style\":\"style_2\",\"title\":\"Featured Jobs\",\"sub_title\":\"Know your worth and find the job that qualify your life\",\"number\":5,\"job_categories\":\"\",\"order\":\"is_featured\",\"order_by\":\"desc\",\"load_more_url\":\"\\/job\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_locations\",\"name\":\"List Locations\",\"model\":{\"title\":\"Featured Cities\",\"sub_title\":\"Lorem ipsum dolor sit amet elit, sed do eiusmod tempor\",\"number\":5,\"order\":\"id\",\"order_by\":\"asc\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"call_to_action\",\"name\":\"Call To Action\",\"model\":{\"style\":\"style_1\",\"title\":\"Your Dream Jobs Are Waiting\",\"sub_title\":\"Over 1 million interactions, 50,000 success stories Make yours now.\",\"link_search\":\"Search Job\",\"url_search\":\"\\/job\",\"link_apply\":\"Apply Job Now\",\"url_apply\":\"#\",\"bg_image\":48},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_candidates\",\"name\":\"Candidates Blocks\",\"model\":{\"title\":\"Featured Candidates\",\"desc\":\"Lorem ipsum dolor sit amet elit, sed do eiusmod tempor\",\"number\":10,\"category_id\":\"\",\"order\":\"title\",\"order_by\":\"desc\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_news\",\"name\":\"News: List Items\",\"model\":{\"style\":\"style_2\",\"title\":\"Recent News Articles\",\"number\":3,\"category_id\":\"\",\"order\":\"\",\"order_by\":\"\",\"sub_title\":\"Fresh job related news content posted each day.\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"call_to_action\",\"name\":\"Call To Action\",\"model\":{\"style\":\"style_3\",\"title\":\"Let employers find you\",\"sub_title\":\"Advertise your jobs to millions of monthly users and search 15.8 million CVs in our database.\",\"link_search\":\"Search Job\",\"url_search\":\"\\/job\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false}]', NULL, 1, NULL, NULL, NULL, '2023-06-06 05:58:47', NULL),
(5, 'Home Page 3', '[{\"type\":\"hero_banner\",\"name\":\"Hero Banner\",\"model\":{\"style\":\"style_3\",\"title\":\"Join us &amp; Explore Thousands <br> of Jobs\",\"sub_title\":\"Find Jobs, Employment & Career Opportunities\",\"popular_searches\":\"Designer,Developer,Web,IOS,PHP,Senior,Engineer\",\"banner_image\":51,\"location_style\":\"autocomplete\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"brands_list\",\"name\":\"Brands List\",\"model\":{\"list_item\":[{\"_active\":false,\"title\":\"Invision\",\"image_id\":107,\"brand_link\":\"#\"},{\"_active\":false,\"title\":\"Figma\",\"image_id\":108,\"brand_link\":null},{\"_active\":false,\"title\":\"Amazon\",\"image_id\":109,\"brand_link\":null},{\"_active\":false,\"title\":\"Airbnb\",\"image_id\":110,\"brand_link\":null},{\"_active\":false,\"title\":\"Spotify\",\"image_id\":111,\"brand_link\":null},{\"_active\":false,\"title\":\"Slack\",\"image_id\":112,\"brand_link\":null},{\"_active\":false,\"title\":\"Paypal\",\"image_id\":113,\"brand_link\":null}],\"style\":\"style_2\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"job_categories\",\"name\":\"Job Categories\",\"model\":{\"style\":\"style_2\",\"title\":\"Popular Job Categories\",\"sub_title\":\"2020 jobs live - 293 added today.\",\"job_categories\":[\"6\",\"7\",\"8\",\"1\",\"3\",\"4\",\"5\",\"9\"]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"jobs_list\",\"name\":\"Jobs List\",\"model\":{\"style\":\"style_3\",\"title\":\"Featured Jobs\",\"sub_title\":\"Know your worth and find the job that qualify your life\",\"number\":9,\"job_categories\":\"\",\"order\":\"is_featured\",\"order_by\":\"desc\",\"load_more_url\":\"\\/job\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"testimonial\",\"name\":\"List Testimonial\",\"model\":{\"style\":\"index\",\"title\":\"Testimonials From Our Customers\",\"sub_title\":\"Lorem ipsum dolor sit amet elit, sed do eiusmod tempor\",\"list_item\":[{\"_active\":false,\"title\":\"Good theme\",\"desc\":\"Without JobHunt i\\u2019d be homeless, they found me a job and got me sorted out quickly with everything! Can\\u2019t quite\\u2026 The Mitech team works really hard to ensure high level of quality\",\"info_name\":\"Nicole Wells\",\"info_desc\":\"\",\"position\":\"Web Developer\",\"avatar\":103},{\"_active\":false,\"title\":\"Great quality!\",\"desc\":\"Without JobHunt i\\u2019d be homeless, they found me a job and got me sorted out quickly with everything! Can\\u2019t quite\\u2026 The Mitech team works really hard to ensure high level of quality\",\"info_name\":\"Gabriel Nolan\",\"position\":\"Consultant\",\"avatar\":114},{\"_active\":true,\"title\":\"Awesome Design\",\"desc\":\"Without JobHunt i\\u2019d be homeless, they found me a job and got me sorted out quickly with everything! Can\\u2019t quite\\u2026 The Mitech team works really hard to ensure high level of quality\",\"info_name\":\"Ashley Jenkins\",\"position\":\"Designer\",\"avatar\":115}]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_company\",\"name\":\"Company: List Items\",\"model\":{\"title\":\"Top Company Registered\",\"sub_title\":\"Some of the companies we\'ve helped recruit excellent applicants over the years.\",\"number\":10,\"category_id\":\"\",\"order\":\"name\",\"order_by\":\"asc\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"about\",\"name\":\"About Us Block\",\"model\":{\"style\":\"style_2\",\"title\":\"Get applications from the world best talents.\",\"content\":\"<p>Search all the open positions on the web. Get your own personalized salary estimate. Read reviews on over 600,000 companies worldwide.<\\/p>\\r\\n                                    <ul class=\\\"list-style-one\\\">\\r\\n                                    <li>Bring to the table win-win survival<\\/li>\\r\\n                                    <li>Capitalize on low hanging fruit to identify<\\/li>\\r\\n                                    <li>But I must explain to you how all this<\\/li>\\r\\n                                    <\\/ul>\",\"button_name\":\"Post a Job\",\"button_url\":\"#\",\"button_target\":0,\"featured_image\":42,\"image_2\":44},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"table_price\",\"name\":\"Table Pricing\",\"model\":{\"title\":\"Pricing Packages\",\"sub_title\":\"Lorem ipsum dolor sit amet elit, sed do eiusmod tempor.\",\"sale_off_text\":\"Save up to 10%\",\"monthly_title\":\"Monthly\",\"annual_title\":\"AnnualSave\",\"monthly_list\":[{\"_active\":false,\"title\":\"Basic\",\"price\":\"$199\",\"unit\":\"monthly\",\"featured\":\"<ul>\\r\\n                                                <li><span>1 job posting<\\/span><\\/li>\\r\\n                                                <li><span>0 featured job<\\/span><\\/li>\\r\\n                                                <li><span>Job displayed for 20 days<\\/span><\\/li>\\r\\n                                                <li><span>Premium Support 24\\/7 <\\/span><\\/li>\\r\\n                                            <\\/ul>\",\"button_name\":\"View Profile\",\"button_url\":\"#\"},{\"_active\":false,\"title\":\"Standard\",\"price\":\"$499\",\"unit\":\"monthly\",\"featured\":\"<ul>\\r\\n                                                <li><span>1 job posting<\\/span><\\/li>\\r\\n                                                <li><span>0 featured job<\\/span><\\/li>\\r\\n                                                <li><span>Job displayed for 20 days<\\/span><\\/li>\\r\\n                                                <li><span>Premium Support 24\\/7 <\\/span><\\/li>\\r\\n                                            <\\/ul>\",\"button_name\":\"View Profile\",\"button_url\":\"#\",\"is_recommended\":1},{\"_active\":false,\"title\":\"Extended\",\"price\":\"$799\",\"unit\":\"monthly\",\"featured\":\"<ul>\\r\\n                                                <li><span>1 job posting<\\/span><\\/li>\\r\\n                                                <li><span>0 featured job<\\/span><\\/li>\\r\\n                                                <li><span>Job displayed for 20 days<\\/span><\\/li>\\r\\n                                                <li><span>Premium Support 24\\/7 <\\/span><\\/li>\\r\\n                                            <\\/ul>\",\"button_name\":\"View Profile\",\"button_url\":\"#\"}],\"annual_list\":[{\"_active\":false,\"title\":\"Basic\",\"price\":\"$1199\",\"unit\":\"Annual\",\"featured\":\"<ul>\\r\\n                                                <li><span>1 job posting<\\/span><\\/li>\\r\\n                                                <li><span>0 featured job<\\/span><\\/li>\\r\\n                                                <li><span>Job displayed for 20 days<\\/span><\\/li>\\r\\n                                                <li><span>Premium Support 24\\/7 <\\/span><\\/li>\\r\\n                                            <\\/ul>\",\"button_name\":\"View Profile\",\"button_url\":\"#\"},{\"_active\":false,\"title\":\"Standard\",\"price\":\"$1499\",\"unit\":\"Annual\",\"featured\":\"<ul>\\r\\n                                                <li><span>1 job posting<\\/span><\\/li>\\r\\n                                                <li><span>0 featured job<\\/span><\\/li>\\r\\n                                                <li><span>Job displayed for 20 days<\\/span><\\/li>\\r\\n                                                <li><span>Premium Support 24\\/7 <\\/span><\\/li>\\r\\n                                            <\\/ul>\",\"button_name\":\"View Profile\",\"button_url\":\"#\",\"is_recommended\":1},{\"_active\":false,\"title\":\"Extended\",\"price\":\"$1799\",\"unit\":\"Annual\",\"featured\":\"<ul>\\r\\n                                                <li><span>1 job posting<\\/span><\\/li>\\r\\n                                                <li><span>0 featured job<\\/span><\\/li>\\r\\n                                                <li><span>Job displayed for 20 days<\\/span><\\/li>\\r\\n                                                <li><span>Premium Support 24\\/7 <\\/span><\\/li>\\r\\n                                            <\\/ul>\",\"button_name\":\"View Profile\",\"button_url\":\"#\"}]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false}]', NULL, 1, NULL, NULL, NULL, '2023-06-06 05:58:47', NULL),
(6, 'Home Page 4', '[{\"type\":\"hero_banner\",\"name\":\"Hero Banner\",\"model\":{\"style\":\"style_4\",\"title\":\"The Easiest Way to Get Your New Job\",\"sub_title\":\"\",\"popular_searches\":\"Designer, Developer, Web, IOS, PHP, Senior, Engineer,\",\"banner_image\":57,\"upload_cv_url\":\"\",\"banner_image_2\":\"\",\"list_images\":[],\"location_style\":\"autocomplete\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"jobs_list\",\"name\":\"Jobs List\",\"model\":{\"style\":\"style_4\",\"title\":\"Most Popular Jobs\",\"sub_title\":\"Know your worth and find the job that qualify your life\",\"number\":6,\"job_categories\":[\"2\",\"3\",\"4\",\"9\"],\"order\":\"is_featured\",\"order_by\":\"desc\",\"load_more_url\":\"\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"HowItWork\",\"name\":\"How It Works\",\"model\":{\"title\":\"How It Works?\",\"sub_title\":\"Job for anyone, anywhere\",\"list_item\":[{\"_active\":true,\"title\":\"Register an account <br> to start\",\"sub_title\":\"\",\"icon_image\":18},{\"_active\":true,\"title\":\"Explore over thousands <br> of resumes\",\"sub_title\":\"\",\"icon_image\":19},{\"_active\":true,\"title\":\"Find the most suitable <br> candidate\",\"sub_title\":\"\",\"icon_image\":20}],\"style\":\"style_3\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_company\",\"name\":\"Company: List Items\",\"model\":{\"title\":\"Top Company Registered\",\"sub_title\":\"Some of the companies we\'ve helped recruit excellent applicants over the years.\",\"number\":10,\"category_id\":\"\",\"order\":\"name\",\"order_by\":\"asc\",\"style\":\"style_2\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"job_categories\",\"name\":\"Job Categories\",\"model\":{\"style\":\"style_1\",\"title\":\"Popular Job Categories\",\"sub_title\":\"2020 jobs live - 293 added today.\",\"job_categories\":[\"6\",\"7\",\"8\",\"1\",\"2\",\"3\",\"4\",\"5\",\"9\"]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_news\",\"name\":\"News: List Items\",\"model\":{\"style\":\"style_3\",\"title\":\"Recent News Articles\",\"number\":3,\"category_id\":\"\",\"order\":\"\",\"order_by\":\"\",\"sub_title\":\"Fresh job related news content posted each day.\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"brands_list\",\"name\":\"Brands List\",\"model\":{\"list_item\":[{\"_active\":false,\"title\":\"Invision\",\"image_id\":107,\"brand_link\":\"#\"},{\"_active\":false,\"title\":\"Figma\",\"image_id\":108,\"brand_link\":null},{\"_active\":false,\"title\":\"Amazon\",\"image_id\":109,\"brand_link\":null},{\"_active\":false,\"title\":\"Airbnb\",\"image_id\":110,\"brand_link\":null},{\"_active\":false,\"title\":\"Spotify\",\"image_id\":111,\"brand_link\":null},{\"_active\":false,\"title\":\"Slack\",\"image_id\":112,\"brand_link\":null},{\"_active\":false,\"title\":\"Paypal\",\"image_id\":113,\"brand_link\":null}],\"style\":\"style_1\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false}]', NULL, 1, NULL, NULL, NULL, '2023-06-06 05:58:48', NULL),
(7, 'Home Page 5', '[{\"type\":\"hero_banner\",\"name\":\"Hero Banner\",\"model\":{\"style\":\"style_5\",\"title\":\"There Are <span class=\\\"colored\\\">93,178</span> Postings Here<br> For you!\",\"sub_title\":\"Find Jobs, Employment & Career Opportunities\",\"popular_searches\":\"Designer, Developer, Web, IOS, PHP, Senior, Engineer,\",\"list_images\":[{\"_active\":true,\"image_id\":50},{\"_active\":true,\"image_id\":51}],\"banner_image\":120,\"upload_cv_url\":\"\",\"banner_image_2\":134,\"banner_image_3\":135,\"location_style\":\"autocomplete\",\"style_5_banner_image_2\":121,\"style_5_banner_image_3\":122,\"style_5_list_images\":[{\"_active\":false,\"image_id\":52,\"url\":null},{\"_active\":false,\"image_id\":53,\"url\":null}],\"style_6_list_images\":\"\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"jobs_list\",\"name\":\"Jobs List\",\"model\":{\"style\":\"style_5\",\"title\":\"Featured Jobs\",\"sub_title\":\"Know your worth and find the job that qualify your life\",\"number\":6,\"job_categories\":\"\",\"order\":\"is_featured\",\"order_by\":\"desc\",\"load_more_url\":\"/job\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"job_categories\",\"name\":\"Job Categories\",\"model\":{\"style\":\"style_5\",\"title\":\"Popular Job Categories\",\"sub_title\":\"2020 jobs live - 293 added today.\",\"job_categories\":[\"1\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\"]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"about\",\"name\":\"About Us Block\",\"model\":{\"style\":\"style_3\",\"title\":\"Get applications from the world best talents.\",\"content\":\"<p>Search all the open positions on the web. Get your own personalized salary estimate. Read reviews on over 600,000 companies worldwide.</p>\\n                                    <ul class=\\\"list-style-one\\\">\\n                                    <li>Bring to the table win-win survival</li>\\n                                    <li>Capitalize on low hanging fruit to identify</li>\\n                                    <li>But I must explain to you how all this</li>\\n                                    </ul>\",\"button_name\":\"Post a Job\",\"button_url\":\"#\",\"button_target\":0,\"featured_image\":123,\"image_2\":124,\"button_color\":\"\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_news\",\"name\":\"News: List Items\",\"model\":{\"style\":\"style_2\",\"title\":\"Recent News Articles\",\"number\":3,\"category_id\":\"\",\"order\":\"\",\"order_by\":\"\",\"sub_title\":\"Fresh job related news content posted each day.\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"testimonial\",\"name\":\"List Testimonial\",\"model\":{\"style\":\"style_4\",\"title\":\"Testimonials From Our Customers\",\"sub_title\":\"Lorem ipsum dolor sit amet elit, sed do eiusmod tempor\",\"list_item\":[{\"_active\":true,\"title\":\"Good theme\",\"desc\":\"Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite… The Mitech team works really hard to ensure high level of quality\",\"info_name\":\"Nicole Wells\",\"info_desc\":\"\",\"position\":\"Web Developer\",\"avatar\":125},{\"_active\":true,\"title\":\"Great quality!\",\"desc\":\"Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite… The Mitech team works really hard to ensure high level of quality\",\"info_name\":\"Gabriel Nolan\",\"position\":\"Consultant\",\"avatar\":125},{\"_active\":true,\"title\":\"Awesome Design\",\"desc\":\"Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite… The Mitech team works really hard to ensure high level of quality\",\"info_name\":\"Ashley Jenkins\",\"position\":\"Designer\",\"avatar\":125}]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"brands_list\",\"name\":\"Brands List\",\"model\":{\"list_item\":[{\"_active\":false,\"title\":\"Invision\",\"image_id\":107,\"brand_link\":\"#\"},{\"_active\":false,\"title\":\"Figma\",\"image_id\":108,\"brand_link\":null},{\"_active\":false,\"title\":\"Amazon\",\"image_id\":109,\"brand_link\":null},{\"_active\":false,\"title\":\"Airbnb\",\"image_id\":110,\"brand_link\":null},{\"_active\":false,\"title\":\"Spotify\",\"image_id\":111,\"brand_link\":null},{\"_active\":false,\"title\":\"Slack\",\"image_id\":112,\"brand_link\":null},{\"_active\":false,\"title\":\"Paypal\",\"image_id\":113,\"brand_link\":null}],\"style\":\"style_2\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_company\",\"name\":\"Company: List Items\",\"model\":{\"title\":\"Top Company Registered\",\"sub_title\":\"Some of the companies we\'ve helped recruit excellent applicants over the years.\",\"number\":10,\"category_id\":\"\",\"order\":\"name\",\"order_by\":\"asc\",\"style\":\"style_3\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false}]', NULL, 1, NULL, NULL, NULL, '2023-06-06 05:58:48', NULL),
(8, 'Home Page 6', '[{\"type\":\"hero_banner\",\"name\":\"Hero Banner\",\"model\":{\"style\":\"style_6\",\"title\":\"Find a Perfect <br>Candidate\",\"sub_title\":\"Find Jobs, Employment & Career Opportunities\",\"popular_searches\":\"Designer, Developer, Web, IOS, PHP, Senior, Engineer,\",\"upload_cv_url\":\"\",\"banner_image\":126,\"banner_image_2\":\"\",\"location_style\":\"autocomplete\",\"style_6_list_images\":[{\"_active\":false,\"image_id\":52},{\"_active\":false,\"image_id\":53},{\"_active\":false,\"image_id\":54},{\"_active\":false,\"image_id\":55}]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"job_categories\",\"name\":\"Job Categories\",\"model\":{\"style\":\"style_3\",\"title\":\"Popular Job Categories\",\"sub_title\":\"2020 jobs live - 293 added today.\",\"job_categories\":[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\"]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"jobs_list\",\"name\":\"Jobs List\",\"model\":{\"style\":\"style_6\",\"title\":\"Featured Jobs\",\"sub_title\":\"Know your worth and find the job that qualify your life\",\"number\":5,\"job_categories\":\"\",\"order\":\"is_featured\",\"order_by\":\"desc\",\"load_more_url\":\"/job\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"call_to_action\",\"name\":\"Call To Action\",\"model\":{\"style\":\"style_1\",\"title\":\"Make a Difference with Your Online Resume!\",\"sub_title\":\"Your resume in minutes with JobHunt resume assistant is ready!\",\"link_search\":\"Create an Account\",\"url_search\":\"/register\",\"link_apply\":\"\",\"url_apply\":\"\",\"bg_image\":127},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"testimonial\",\"name\":\"List Testimonial\",\"model\":{\"style\":\"style_3\",\"title\":\"Testimonials From Our Customers\",\"sub_title\":\"Lorem ipsum dolor sit amet elit, sed do eiusmod tempor\",\"list_item\":[{\"_active\":false,\"title\":\"Good theme\",\"desc\":\"Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite… The Mitech team works really hard to ensure high level of quality\",\"info_name\":\"Nicole Wells\",\"info_desc\":\"\",\"position\":\"Web Developer\",\"avatar\":103},{\"_active\":false,\"title\":\"Great quality!\",\"desc\":\"Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite… The Mitech team works really hard to ensure high level of quality\",\"info_name\":\"Gabriel Nolan\",\"position\":\"Consultant\",\"avatar\":114},{\"_active\":true,\"title\":\"Awesome Design\",\"desc\":\"Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite… The Mitech team works really hard to ensure high level of quality\",\"info_name\":\"Ashley Jenkins\",\"position\":\"Designer\",\"avatar\":115}]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"brands_list\",\"name\":\"Brands List\",\"model\":{\"list_item\":[{\"_active\":true,\"title\":\"Invision\",\"image_id\":107,\"brand_link\":\"#\"},{\"_active\":true,\"title\":\"figma\",\"image_id\":108,\"brand_link\":\"#\"},{\"_active\":true,\"title\":\"amazon\",\"image_id\":109,\"brand_link\":\"#\"},{\"_active\":true,\"title\":\"airbnb\",\"image_id\":110,\"brand_link\":\"#\"},{\"_active\":true,\"title\":\"spotify\",\"image_id\":111,\"brand_link\":\"#\"},{\"_active\":true,\"title\":\"slack\",\"image_id\":112,\"brand_link\":\"#\"},{\"_active\":true,\"title\":\"paypal\",\"image_id\":113,\"brand_link\":\"#\"}],\"style\":\"style_1\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_news\",\"name\":\"News: List Items\",\"model\":{\"style\":\"style_4\",\"title\":\"Recent News Articles\",\"number\":4,\"category_id\":\"\",\"order\":\"\",\"order_by\":\"\",\"sub_title\":\"Fresh job related news content posted each day.\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_candidates\",\"name\":\"Candidates Blocks\",\"model\":{\"title\":\"Featured Candidates\",\"desc\":\"Lorem ipsum dolor sit amet elit, sed do eiusmod tempor\",\"number\":10,\"category_id\":\"\",\"order\":\"title\",\"order_by\":\"desc\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false}]', NULL, 1, NULL, NULL, NULL, '2023-06-06 05:58:48', NULL),
(9, 'Home Page 7', '[{\"type\":\"hero_banner\",\"name\":\"Hero Banner\",\"model\":{\"style\":\"style_7\",\"title\":\"There Are <span class=\\\"colored\\\">93,178</span> <br>Postings Here For you!\",\"sub_title\":\"Find Jobs, Employment & Career Opportunities\",\"popular_searches\":\"Designer,Developer,Web,IOS,PHP,Senior,Engineer\",\"upload_cv_url\":\"\",\"banner_image\":128,\"banner_image_2\":\"\",\"style_5_banner_image_2\":\"\",\"style_5_banner_image_3\":\"\",\"list_images\":\"\",\"style_5_list_images\":\"\",\"style_6_list_images\":\"\",\"style_7_list_images\":[{\"_active\":true,\"image_id\":129,\"url\":null},{\"_active\":true,\"image_id\":130,\"url\":null},{\"_active\":true,\"image_id\":131,\"url\":null},{\"_active\":true,\"image_id\":132,\"url\":null},{\"_active\":true,\"image_id\":133,\"url\":null},{\"_active\":true,\"image_id\":134,\"url\":null}],\"location_style\":\"\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"jobs_list\",\"name\":\"Jobs List\",\"model\":{\"style\":\"style_7\",\"title\":\"Featured Jobs\",\"sub_title\":\"Know your worth and find the job that qualify your life\",\"number\":\"\",\"job_categories\":[\"9\",\"7\",\"6\",\"4\",\"5\",\"3\",\"2\",\"1\"],\"order\":\"is_featured\",\"order_by\":\"asc\",\"load_more_url\":\"/job\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"about\",\"name\":\"About Us Block\",\"model\":{\"style\":\"style_4\",\"title\":\"Video Job Ads: Our Top Pick\",\"sub_title\":\"Sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt. Labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.\",\"content\":\"<ul>\\n<li>Creative Study Pattern</li>\\n<li>Quick Crash Courses</li>\\n<li>Certification Awarded</li>\\n<li>Provided with Experimental Examples</li>\\n</ul>\",\"button_name\":\"Watch Video\",\"button_url\":\"https://www.youtube.com/watch?v=4UvS3k8D4rs\",\"button_target\":\"\",\"button_color\":\"\",\"featured_image\":135,\"image_2\":\"\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"BlockCounter\",\"name\":\"Block Counter\",\"model\":{\"style\":\"style_2\",\"list_item\":[{\"_active\":true,\"number\":\"4\",\"symbol\":\"M\",\"desc\":\"4 million daily active users\"},{\"_active\":true,\"number\":\"12\",\"symbol\":\"K\",\"desc\":\"Over 12k open job positions\"},{\"_active\":true,\"number\":\"20\",\"symbol\":\"M\",\"desc\":\"Over 20 million stories shared\"}]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_company\",\"name\":\"Company: List Items\",\"model\":{\"style\":\"style_4\",\"title\":\"Top Company Registered\",\"sub_title\":\"Some of the companies we’ ve helped recruit excellent applicants over the years.\",\"number\":15,\"category_id\":[\"9\",\"7\",\"5\",\"6\",\"4\",\"3\",\"2\"],\"order\":\"name\",\"order_by\":\"desc\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"testimonial\",\"name\":\"List Testimonial\",\"model\":{\"style\":\"style_5\",\"title\":\"Testimonials From Our Customers\",\"sub_title\":\"Lorem ipsum dolor sit amet elit, sed do eiusmod tempor\",\"list_item\":[{\"_active\":true,\"title\":\"Great quality!\",\"desc\":\"Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite… The Mitech team works really hard to ensure high level of quality\",\"info_name\":\"Brooklyn Simmons\",\"position\":\"Web Developer\",\"avatar\":151},{\"_active\":true,\"title\":\"Great quality!\",\"desc\":\"Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite… The Mitech team works really hard to ensure high level of quality\",\"info_name\":\"Brooklyn Simmons\",\"position\":\"Web Developer\",\"avatar\":136}],\"banner_image\":137,\"banner_image_2\":138},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"job_categories\",\"name\":\"Job Categories\",\"model\":{\"style\":\"style_5\",\"title\":\"Popular Job Categories\",\"sub_title\":\"2020 jobs live - 293 added today.\",\"job_categories\":[\"9\",\"7\",\"5\",\"6\",\"8\",\"4\",\"2\",\"3\",\"1\"]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"jobs_list\",\"name\":\"Jobs List\",\"model\":{\"style\":\"style_8\",\"title\":\"Recent Jobs\",\"sub_title\":\"Know your worth and find the job that qualify your life\",\"number\":9,\"job_categories\":[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\"],\"order\":\"id\",\"order_by\":\"desc\",\"load_more_url\":\"\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_candidates\",\"name\":\"Candidates: List Items\",\"model\":{\"style\":\"style_2\",\"title\":\"Featured Candidates\",\"desc\":\"Lorem ipsum dolor sit amet elit, sed do eiusmod tempor\",\"number\":6,\"category_id\":\"\",\"order\":\"id\",\"order_by\":\"desc\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"BlockAds\",\"name\":\"Ads Us Block\",\"model\":{\"style\":\"style_1\",\"list_item\":[{\"_active\":true,\"title\":\"Recruiting\",\"sub_title\":\"Now\",\"button_name\":\"View All\",\"image_id\":139,\"ads_link\":\"#\"},{\"_active\":true,\"title\":\"Membership\",\"sub_title\":\"Opportunities\",\"button_name\":\"View All\",\"image_id\":140,\"ads_link\":\"#\"},{\"_active\":true,\"title\":\"Post a\",\"sub_title\":\"Vacancy\",\"button_name\":\"View All\",\"image_id\":141,\"ads_link\":\"#\"}]},\"component\":\"RegularBlock\",\"open\":true}]', NULL, 1, NULL, NULL, NULL, '2023-06-06 05:58:48', NULL),
(10, 'Home Page 8', '[{\"type\":\"hero_banner\",\"name\":\"Hero Banner\",\"model\":{\"style\":\"style_8\",\"title\":\"Find Jobs\",\"sub_title\":\"Jobs & Job search. Find jobs in global. Executive jobs & work. Employment\",\"popular_searches\":\"Designer,Developer,Web,IOS,PHP,Senior,Engineer\",\"upload_cv_url\":\"#\",\"banner_image\":142,\"banner_image_2\":157,\"style_5_banner_image_2\":\"\",\"style_5_banner_image_3\":\"\",\"list_images\":\"\",\"style_5_list_images\":\"\",\"style_6_list_images\":\"\",\"style_7_list_images\":\"\",\"location_style\":\"autocomplete\"},\"component\":\"RegularBlock\",\"open\":true},{\"type\":\"brands_list\",\"name\":\"Brands List\",\"model\":{\"style\":\"style_3\",\"title\":\"Top Companies Hiring at Superio Now\",\"sub_title\":\"Lorem ipsum dolor sit amet elit, sed do eiusmod tempor\",\"list_item\":[{\"_active\":true,\"title\":\"1\",\"image_id\":143,\"brand_link\":\"#\"},{\"_active\":true,\"title\":\"2\",\"image_id\":144,\"brand_link\":\"#\"},{\"_active\":true,\"title\":\"3\",\"image_id\":145,\"brand_link\":\"#\"},{\"_active\":true,\"title\":\"4\",\"image_id\":146,\"brand_link\":\"#\"},{\"_active\":true,\"title\":\"5\",\"image_id\":147,\"brand_link\":\"#\"},{\"_active\":true,\"title\":\"6\",\"image_id\":148,\"brand_link\":\"#\"},{\"_active\":true,\"title\":\"7\",\"image_id\":149,\"brand_link\":\"#\"},{\"_active\":true,\"title\":\"8\",\"image_id\":136,\"brand_link\":\"#\"}]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"call_to_action\",\"name\":\"Call To Action\",\"model\":{\"style\":\"style_4\",\"title\":\"I am Recruiter\",\"sub_title\":\"One of our One of our jobs has some kind of flexibility jobs has some kind of flexibility option such as telecommuting, a part-time schedule or a flexible or flextime.\",\"link_search\":\"Post New Job\",\"url_search\":\"#\",\"link_apply\":\"\",\"url_apply\":\"\",\"bg_image\":150},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"jobs_list\",\"name\":\"Jobs List\",\"model\":{\"style\":\"style_9\",\"title\":\"Featured Jobs\",\"sub_title\":\"Know your worth and find the job that qualify your life\",\"number\":8,\"job_categories\":[\"9\",\"8\",\"6\",\"7\",\"5\",\"4\"],\"order\":\"id\",\"order_by\":\"\",\"load_more_url\":\"/job\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"call_to_action\",\"name\":\"Call To Action\",\"model\":{\"style\":\"style_5\",\"title\":\"I am Jobseeker\",\"sub_title\":\"One of our One of our jobs has some kind of flexibility jobs has some kind of flexibility option such as telecommuting, a part-time schedule or a flexible or flextime.\",\"link_search\":\"Browse Job\",\"url_search\":\"#\",\"link_apply\":\"\",\"url_apply\":\"\",\"bg_image\":150},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_company\",\"name\":\"Company: List Items\",\"model\":{\"style\":\"style_5\",\"title\":\"Top Company Registered\",\"sub_title\":\"Some of the companies we’ve helped recruit excellent applicants over the years.\",\"number\":6,\"category_id\":[\"9\",\"7\",\"8\",\"6\",\"5\",\"4\"],\"order\":\"id\",\"order_by\":\"asc\",\"load_more_url\":\"/companies\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_locations\",\"name\":\"List Locations\",\"model\":{\"title\":\"Featured Cities\",\"sub_title\":\"Lorem ipsum dolor sit amet elit, sed do eiusmod tempor\",\"number\":5,\"order\":\"id\",\"order_by\":\"asc\",\"custom_ids\":[],\"style\":\"style_2\",\"load_more_url\":\"/job\",\"load_more_name\":\"Browse All Locations \",\"layout\":\"style_2\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_news\",\"name\":\"News: List Items\",\"model\":{\"style\":\"style_1\",\"title\":\"Recent News Articles\",\"sub_title\":\"Fresh job related news content posted each day.\",\"number\":3,\"category_id\":\"\",\"order\":\"id\",\"order_by\":\"desc\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"BlockSubscribe\",\"name\":\"Subscribe Block\",\"model\":{\"style\":\"style_1\",\"title\":\"Subscribe Our Newsletter\",\"sub_title\":\"Advertise your jobs to millions of monthly users and search 15.8 million CVs in our database.\",\"button_name\":\"Subscribe\"},\"component\":\"RegularBlock\",\"open\":true}]', NULL, 1, NULL, NULL, NULL, '2023-06-06 05:58:48', NULL);
INSERT INTO `core_templates` (`id`, `title`, `content`, `type_id`, `create_user`, `update_user`, `origin_id`, `lang`, `created_at`, `updated_at`) VALUES
(11, 'Home Page 9', '[{\"type\":\"hero_banner\",\"name\":\"Hero Banner\",\"model\":{\"style\":\"style_9\",\"title\":\"15,000+ Browse Jobs\",\"sub_title\":\"Find Jobs, Employment & Career Opportunities\",\"popular_searches\":\"\",\"upload_cv_url\":\"\",\"banner_image\":158,\"banner_image_2\":\"\",\"style_5_banner_image_2\":\"\",\"style_5_banner_image_3\":\"\",\"list_images\":\"\",\"style_5_list_images\":\"\",\"style_6_list_images\":\"\",\"style_7_list_images\":\"\",\"location_style\":\"autocomplete\",\"list_counter\":[{\"_active\":true,\"title\":\"97216\",\"sub_title\":\"Jobs\"},{\"_active\":true,\"title\":\"4782\",\"sub_title\":\"Members\"},{\"_active\":true,\"title\":\"5322\",\"sub_title\":\"Resume\"},{\"_active\":true,\"title\":\"6329\",\"sub_title\":\"Company\"}]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"jobs_list\",\"name\":\"Jobs List\",\"model\":{\"style\":\"style_10\",\"title\":\"Featured Jobs\",\"sub_title\":\"Know your worth and find the job that qualify your life\",\"number\":9,\"job_categories\":[\"9\",\"8\",\"7\",\"6\",\"5\",\"4\",\"3\",\"2\",\"1\"],\"order\":\"id\",\"order_by\":\"desc\",\"load_more_url\":\"\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"about\",\"name\":\"About Us Block\",\"model\":{\"style\":\"style_5\",\"title\":\"Find Jobs with 3 easy steps\",\"sub_title\":\"Sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt. Labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.\",\"content\":\"<ul>\\n<li><span class=\\\"count\\\">1</span> Register an account to start</li>\\n<li><span class=\\\"count\\\">2</span> Explore over thousands of resumes</li>\\n<li><span class=\\\"count\\\">3</span> Find the most suitable candidate</li>\\n</ul>\",\"button_name\":\"\",\"button_url\":\"\",\"button_target\":\"\",\"button_color\":\"\",\"featured_image\":159,\"image_2\":160,\"sub_image_2\":\"300k+ Employers\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"call_to_action\",\"name\":\"Call To Action\",\"model\":{\"style\":\"style_1\",\"title\":\"Make a Difference with Your Online Resume!\",\"sub_title\":\"Your resume in minutes with JobHunt resume assistant is ready!\",\"link_search\":\"Create an Account\",\"url_search\":\"#\",\"link_apply\":\"\",\"url_apply\":\"\",\"bg_image\":161},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"job_categories\",\"name\":\"Job Categories\",\"model\":{\"style\":\"style_1\",\"title\":\"Popular Job Categories\",\"sub_title\":\"2020 jobs live - 293 added today.\",\"job_categories\":[\"9\",\"7\",\"8\",\"6\",\"5\",\"4\",\"3\",\"2\",\"1\"]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_candidates\",\"name\":\"Candidates: List Items\",\"model\":{\"style\":\"style_1\",\"title\":\"Featured Candidates\",\"desc\":\"Lorem ipsum dolor sit amet elit, sed do eiusmod tempor\",\"number\":12,\"category_id\":\"\",\"order\":\"id\",\"order_by\":\"desc\",\"load_more_url\":\"/candidate\",\"load_more_name\":\"Browse All\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"testimonial\",\"name\":\"List Testimonial\",\"model\":{\"style\":\"style_6\",\"title\":\"Testimonials From Our Customers\",\"sub_title\":\"Lorem ipsum dolor sit amet elit, sed do eiusmod tempor\",\"list_item\":[{\"_active\":true,\"title\":\"Great quality!\",\"desc\":\"Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite… The Mitech team works really hard to ensure high level of quality\",\"info_name\":\"Nicole Wells\",\"position\":\"Web Developer\",\"avatar\":163},{\"_active\":true,\"title\":\"Great quality!\",\"desc\":\"Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite… The Mitech team works really hard to ensure high level of quality\",\"info_name\":\"Gabriel Nolan\",\"position\":\"Consultant\",\"avatar\":164},{\"_active\":true,\"title\":\"Great quality!\",\"desc\":\"Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite… The Mitech team works really hard to ensure high level of quality\",\"info_name\":\"Nicole Wells\",\"position\":\"Web Developer\",\"avatar\":163},{\"_active\":true,\"title\":\"Great quality!\",\"desc\":\"Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything! Can’t quite… The Mitech team works really hard to ensure high level of quality\",\"info_name\":\"Gabriel Nolan\",\"position\":\"Consultant\",\"avatar\":164}],\"banner_image\":162,\"banner_image_2\":\"\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"BlockCounter\",\"name\":\"Block Counter\",\"model\":{\"style\":\"style_1\",\"list_item\":[{\"_active\":true,\"number\":\"4\",\"symbol\":\"M\",\"desc\":\"4 million daily active users\"},{\"_active\":true,\"number\":\"12\",\"symbol\":\"k\",\"desc\":\"Over 12k open job positions\"},{\"_active\":true,\"number\":\"20\",\"symbol\":\"M\",\"desc\":\"Over 20 million stories shared\"}]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_news\",\"name\":\"News: List Items\",\"model\":{\"style\":\"style_1\",\"title\":\"Recent News Articles\",\"sub_title\":\"Fresh job related news content posted each day.\",\"number\":3,\"category_id\":\"\",\"order\":\"id\",\"order_by\":\"desc\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"call_to_action\",\"name\":\"Call To Action\",\"model\":{\"style\":\"style_6\",\"title\":\"Gat a question?\",\"sub_title\":\"We\'re here to help. Check out our FAQs, send us an email or call us at 1 \",\"link_search\":\"(900) 777-7777.\",\"url_search\":\"#\",\"link_apply\":\"Get Started\",\"url_apply\":\"#\",\"bg_image\":\"\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false}]', NULL, 1, NULL, NULL, NULL, '2023-06-06 05:58:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `core_template_translations`
--

DROP TABLE IF EXISTS `core_template_translations`;
CREATE TABLE IF NOT EXISTS `core_template_translations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `origin_id` int UNSIGNED NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `core_template_translations_locale_index` (`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `core_translations`
--

DROP TABLE IF EXISTS `core_translations`;
CREATE TABLE IF NOT EXISTS `core_translations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `string` text COLLATE utf8mb4_unicode_ci,
  `parent_id` bigint DEFAULT NULL,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `last_build_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media_files`
--

DROP TABLE IF EXISTS `media_files`;
CREATE TABLE IF NOT EXISTS `media_files` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_extension` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `app_id` int DEFAULT NULL,
  `app_user_id` int DEFAULT NULL,
  `file_width` int DEFAULT NULL,
  `file_height` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=196 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media_files`
--

INSERT INTO `media_files` (`id`, `file_name`, `file_path`, `file_size`, `file_type`, `file_extension`, `create_user`, `update_user`, `deleted_at`, `app_id`, `app_user_id`, `file_width`, `file_height`, `created_at`, `updated_at`) VALUES
(1, 'avatar', 'demo/general/avatar.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'avatar-2', 'demo/general/avatar-2.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'avatar-3', 'demo/general/avatar-3.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'ico_adventurous', 'demo/general/ico_adventurous.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'ico_localguide', 'demo/general/ico_localguide.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'ico_maps', 'demo/general/ico_maps.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'ico_paymethod', 'demo/general/ico_paymethod.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'logo', 'demo/general/logo.svg', NULL, 'image/svg+xml', 'svg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'logo-white', 'demo/general/logo-2.svg', NULL, 'image/svg+xml', 'svg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'bg_contact', 'demo/general/bg-contact.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'favicon', 'demo/general/favicon.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'thumb-vendor-register', 'demo/general/thumb-vendor-register.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'bg-video-vendor-register1', 'demo/general/bg-video-vendor-register1.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'ico_chat_1', 'demo/general/ico_chat_1.svg', NULL, 'image/svg', 'svg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'ico_friendship_1', 'demo/general/ico_friendship_1.svg', NULL, 'image/svg', 'svg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'ico_piggy-bank_1', 'demo/general/ico_piggy-bank_1.svg', NULL, 'image/svg', 'svg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'ads-bg-4', 'demo/general/ads-bg-4.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'process-1', 'demo/general/process-1.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'process-2', 'demo/general/process-2.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'process-3', 'demo/general/process-3.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'home-6-banner', 'demo/general/home-6-banner.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'job-post-img', 'demo/general/job-post-img.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'video-img', 'demo/general/video-img.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'location-1', 'demo/location/location-1.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'location-2', 'demo/location/location-2.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'location-3', 'demo/location/location-3.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'location-4', 'demo/location/location-4.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'location-5', 'demo/location/location-5.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'location-6', 'demo/location/location-6.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'location-7', 'demo/location/location-7.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'location-8', 'demo/location/location-8.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'news-1', 'demo/news/news-1.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'news-2', 'demo/news/news-2.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'news-3', 'demo/news/news-3.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'news-4', 'demo/news/news-4.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'news-5', 'demo/news/news-5.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'news-6', 'demo/news/news-6.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'news-7', 'demo/news/news-7.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'news-banner', 'demo/news/news-banner.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'image-1', 'demo/general/image-1.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'image-2', 'demo/general/image-2.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 'image-3', 'demo/general/image-3.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 'count-employers', 'demo/general/count-employers.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 'app-list', 'demo/general/app-list.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 'mobile-app', 'demo/general/mobile-app.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 'apple', 'demo/general/apple.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 'google', 'demo/general/google.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 'bg-1', 'demo/general/bg-1.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 'banner-img-1', 'demo/general/banner-img-1.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 'banner-img-2', 'demo/general/banner-img-2.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 'banner-img-3', 'demo/general/banner-img-3.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 'banner-1-1', 'demo/general/banner-1-1.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 'banner-1-2', 'demo/general/banner-1-2.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 'banner-1-3', 'demo/general/banner-1-3.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 'banner-1-4', 'demo/general/banner-1-4.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 'banner-2-1', 'demo/general/banner-2-1.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 'homepage-4-banner', 'demo/general/homepage-4-banner.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 'candidate-1', 'demo/candidate/candidate-1.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 'candidate-2', 'demo/candidate/candidate-2.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, 'candidate-3', 'demo/candidate/candidate-3.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 'candidate-4', 'demo/candidate/candidate-4.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 'candidate-5', 'demo/candidate/candidate-5.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 'candidate-6', 'demo/candidate/candidate-6.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, 'candidate-7', 'demo/candidate/candidate-7.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, 'candidate-8', 'demo/candidate/candidate-8.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, 'candidate-9', 'demo/candidate/candidate-9.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, 'candidate', 'demo/candidate/candidate.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, 'portfolio-1', 'demo/candidate/portfolio-1.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, 'portfolio-2', 'demo/candidate/portfolio-2.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 'portfolio-3', 'demo/candidate/portfolio-3.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, 'portfolio-4', 'demo/candidate/portfolio-4.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, 'portfolio-5', 'demo/candidate/portfolio-5.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, 'portfolio-6', 'demo/candidate/portfolio-6.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, 'resume_1', 'demo/candidate/resume_1.docx', NULL, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'docx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, 'resume_2', 'demo/candidate/resume_2.docx', NULL, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'docx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, 'resume_3', 'demo/candidate/resume_3.docx', NULL, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'docx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 'resume_4', 'demo/candidate/resume_4.docx', NULL, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'docx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 'resume_5', 'demo/candidate/resume_5.docx', NULL, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'docx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 'resume_6', 'demo/candidate/resume_6.docx', NULL, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'docx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 'resume_7', 'demo/candidate/resume_7.docx', NULL, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'docx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, 'resume_8', 'demo/candidate/resume_8.docx', NULL, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'docx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, 'resume_9', 'demo/candidate/resume_9.docx', NULL, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'docx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, 'resume_10', 'demo/candidate/resume_10.docx', NULL, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'docx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, 'bc_company-1', 'demo/company/bc_company-1.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(85, 'bc_company-2', 'demo/company/bc_company-2.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, 'bc_company-3', 'demo/company/bc_company-3.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, 'bc_company-4', 'demo/company/bc_company-4.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(88, 'bc_company-5', 'demo/company/bc_company-5.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, 'bc_company-6', 'demo/company/bc_company-6.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(90, 'bc_company-7', 'demo/company/bc_company-7.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(91, 'bc_company-8', 'demo/company/bc_company-8.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(92, 'bc_company-9', 'demo/company/bc_company-9.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(93, 'bc_company-10', 'demo/company/bc_company-10.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(94, 'bc_company-11', 'demo/company/bc_company-11.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(95, 'bc_company-12', 'demo/company/bc_company-12.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(96, 'about-img-1', 'demo/general/about-img-1.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(97, 'about-img-2', 'demo/general/about-img-2.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(98, 'about-img-3', 'demo/general/about-img-3.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(99, 'about-img-4', 'demo/general/about-img-4.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(100, 'about-img-5', 'demo/general/about-img-5.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(101, 'about-img-6', 'demo/general/about-img-6.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(102, 'call-to-action-bg-1', 'demo/general/call-to-action-bg-1.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(103, 'testi-thumb-1', 'demo/general/testi-thumb-1.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(104, 'how-it-work-1', 'demo/general/how-it-work-1.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(105, 'how-it-work-2', 'demo/general/how-it-work-2.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(106, 'how-it-work-3', 'demo/general/how-it-work-3.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, 'brand-1', 'demo/general/brand-1.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(108, 'brand-2', 'demo/general/brand-2.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(109, 'brand-3', 'demo/general/brand-3.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(110, 'brand-4', 'demo/general/brand-4.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(111, 'brand-5', 'demo/general/brand-5.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(112, 'brand-6', 'demo/general/brand-6.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(113, 'brand-7', 'demo/general/brand-7.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(114, 'testi-thumb-2', 'demo/general/testi-thumb-2.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(115, 'testi-thumb-3', 'demo/general/testi-thumb-3.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(116, 'placeholder', 'demo/general/placeholder.svg', NULL, 'image/svg+xml', 'svg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(117, 'smartphone', 'demo/general/smartphone.svg', NULL, 'image/svg+xml', 'svg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(118, 'letter', 'demo/general/letter.svg', NULL, 'image/svg+xml', 'svg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(119, 'contact-call-to-action', 'demo/general/contact-call-to-action.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(120, 'home5-banner-1', 'demo/general/home5-banner-1.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(121, 'home5-banner-2', 'demo/general/home5-banner-2.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(122, 'home5-banner-3', 'demo/general/home5-banner-3.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(123, 'home5-image-4', 'demo/general/home5-image-4.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(124, 'app-list-2', 'demo/general/app-list-2.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(125, 'home5-testimonial-image', 'demo/general/home5-testimonial-image.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(126, 'home-6-banner', 'demo/general/home-6-banner.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(127, 'call-to-action-2', 'demo/general/call-to-action-2.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(128, 'banner-img-8', 'demo/general/banner-img-8.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(129, 'banner-7-1', 'demo/general/banner-7-1.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(130, 'banner-7-2', 'demo/general/banner-7-2.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(131, 'banner-7-3', 'demo/general/banner-7-3.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(132, 'banner-7-4', 'demo/general/banner-7-4.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(133, 'banner-7-5', 'demo/general/banner-7-5.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(134, 'banner-7-6', 'demo/general/banner-7-6.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(135, 'about-style-7', 'demo/general/about-style-7.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(136, 'testimonial-style-7', 'demo/general/testimonial-style-7.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(137, 'testimonial-style-7-1', 'demo/general/testimonial-style-7-1.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(138, 'testimonial-style-7-2', 'demo/general/testimonial-style-7-2.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(139, 'ads-bg-1', 'demo/general/ads-bg-1.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(140, 'ads-bg-2', 'demo/general/ads-bg-2.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(141, 'ads-bg-3', 'demo/general/ads-bg-3.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(142, 'banner-img-9', 'demo/general/banner-img-9.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(143, 'company-8-1', 'demo/general/company-8-1.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(144, 'company-8-2', 'demo/general/company-8-2.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(145, 'company-8-3', 'demo/general/company-8-3.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(146, 'company-8-4', 'demo/general/company-8-4.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(147, 'company-8-5', 'demo/general/company-8-5.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(148, 'company-8-6', 'demo/general/company-8-6.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(149, 'company-8-7', 'demo/general/company-8-7.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(150, 'recruiter-8', 'demo/general/recruiter-8.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(151, 'jobseeker-9', 'demo/general/jobseeker-9.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(152, 'featured-1', 'demo/general/featured-1.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(153, 'featured-2', 'demo/general/featured-2.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(154, 'featured-3', 'demo/general/featured-3.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(155, 'featured-4', 'demo/general/featured-4.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(156, 'featured-5', 'demo/general/featured-5.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(157, 'banner-img-9-1', 'demo/general/banner-img-9-1.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(158, 'banner-img-9', 'demo/general/banner-layout-9.jpg', NULL, 'image/jpg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(159, 'about-style-9', 'demo/general/about-style-9.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(160, 'multi-peoples-style-9', 'demo/general/multi-peoples-style-9.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(161, 'call-to-action-9', 'demo/general/call-to-action-9.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(162, 'testimonials-9', 'demo/general/testimonials-9.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(163, 'testi-thumb-9-1', 'demo/general/testi-thumb-9-1.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(164, 'testi-thumb-9-2', 'demo/general/testi-thumb-9-2.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(165, 'news-banner', 'demo/news/news-banner.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(166, 'img-detail', 'demo/news/img-detail.jpg', NULL, 'image/jpeg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(167, 'gig-category-img', 'demo/gig/category-img.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(168, 'gig-sub-cat-1', 'demo/gig/sub-cat-1.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(169, 'gig-sub-cat-2', 'demo/gig/sub-cat-2.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(170, 'gig-sub-cat-3', 'demo/gig/sub-cat-3.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(171, 'gig-sub-cat-4', 'demo/gig/sub-cat-4.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(172, 'gig-sub-cat-5', 'demo/gig/sub-cat-5.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(173, 'gig-type1', 'demo/gig/type1.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(174, 'gig-type2', 'demo/gig/type2.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(175, 'gig-type3', 'demo/gig/type3.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(176, 'gig-type4', 'demo/gig/type4.png', NULL, 'image/png', 'png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(177, 'rvoize-logo-nobg', '0000/1/2023/06/07/rvoize-logo-nobg.png', '90358', 'image/png', 'png', 1, NULL, NULL, NULL, NULL, 729, 191, '2023-06-07 00:11:49', '2023-06-07 00:11:49'),
(178, 'rvoize-no-bg-white', '0000/1/2023/06/07/rvoize-no-bg-white.png', '20931', 'image/png', 'png', 1, NULL, NULL, NULL, NULL, 666, 182, '2023-06-07 00:20:49', '2023-06-07 00:20:49'),
(179, 'rvoize-favicon', '0000/1/2023/06/07/rvoize-favicon.png', '869', 'image/png', 'png', 1, NULL, NULL, NULL, NULL, 50, 50, '2023-06-07 00:33:36', '2023-06-07 00:33:36'),
(180, 'rvoize-no-bg-white-favicon2', '0000/1/2023/06/07/rvoize-no-bg-white-favicon2.png', '15051', 'image/png', 'png', 1, NULL, NULL, NULL, NULL, 146, 146, '2023-06-07 00:37:06', '2023-06-07 00:37:06'),
(181, 'falcons-software-website-requirement-docs', '0000/17/2023/06/10/falcons-software-website-requirement-docs.pdf', '70737', 'application/pdf', 'pdf', 17, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-09 23:38:42', '2023-06-09 23:38:42'),
(182, 'falcons-software-website-requirement-docs1', '0000/17/2023/06/10/falcons-software-website-requirement-docs1.pdf', '70737', 'application/pdf', 'pdf', 17, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-09 23:39:50', '2023-06-09 23:39:50'),
(183, 'falcons-software-website-requirement-docs2', '0000/17/2023/06/10/falcons-software-website-requirement-docs2.pdf', '70737', 'application/pdf', 'pdf', 17, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-09 23:40:30', '2023-06-09 23:40:30'),
(184, 'falcons-software-website-requirement-docs3', '0000/17/2023/06/10/falcons-software-website-requirement-docs3.pdf', '70737', 'application/pdf', 'pdf', 17, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-09 23:41:03', '2023-06-09 23:41:03'),
(185, 'banner-1-1', '0000/1/2023/06/12/banner-1-1.png', '11374', 'image/png', 'png', 1, NULL, NULL, NULL, NULL, 323, 160, '2023-06-12 00:46:22', '2023-06-12 00:46:22'),
(186, 'banner-img-1new', '0000/1/2023/06/12/banner-img-1new.png', '210026', 'image/png', 'png', 1, NULL, NULL, NULL, NULL, 606, 734, '2023-06-12 00:50:16', '2023-06-12 00:50:16'),
(187, 'banner-img-1new-1', '0000/1/2023/06/12/banner-img-1new-1.png', '121889', 'image/png', 'png', 1, NULL, NULL, NULL, NULL, 424, 513, '2023-06-12 01:01:41', '2023-06-12 01:01:41'),
(188, 'web-design-concept-3d-illustration-icon-composition-with-program-interface-drawing-graphic-elements-site-layout-professional-software-designer-vector-illustration-modern-web-design-198565-1673', '0000/1/2023/06/12/web-design-concept-3d-illustration-icon-composition-with-program-interface-drawing-graphic-elements-site-layout-professional-software-designer-vector-illustration-modern-web-design-198565-1673.jpg', '132576', 'image/jpeg', 'jpg', 1, NULL, NULL, NULL, NULL, 2000, 1331, '2023-06-12 01:12:37', '2023-06-12 01:12:37'),
(189, 'medium-shot-woman-working-laptop-23-2149300643', '0000/1/2023/06/12/medium-shot-woman-working-laptop-23-2149300643.jpg', '117925', 'image/jpeg', 'jpg', 1, NULL, NULL, NULL, NULL, 996, 664, '2023-06-12 01:29:30', '2023-06-12 01:29:30'),
(190, 'asset-1-1', '0000/1/2023/06/15/asset-1-1.png', '142119', 'image/png', 'png', 1, NULL, NULL, NULL, NULL, 2500, 666, '2023-06-15 04:13:25', '2023-06-15 04:13:25'),
(191, 'hindustan-60-1', '0000/20/2023/06/21/hindustan-60-1.pdf', '346636', 'application/pdf', 'pdf', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-20 20:53:50', '2023-06-20 20:53:50'),
(192, 'hindustan-60-11', '0000/20/2023/06/21/hindustan-60-11.pdf', '346636', 'application/pdf', 'pdf', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-20 20:54:23', '2023-06-20 20:54:23'),
(193, 'hindustan-60-12', '0000/20/2023/06/21/hindustan-60-12.pdf', '346636', 'application/pdf', 'pdf', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-20 20:54:55', '2023-06-20 20:54:55'),
(194, 'hindustan-60-13', '0000/20/2023/06/21/hindustan-60-13.pdf', '346636', 'application/pdf', 'pdf', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-20 20:55:16', '2023-06-20 20:55:16'),
(195, 'hindustan-60-14', '0000/20/2023/06/21/hindustan-60-14.pdf', '346636', 'application/pdf', 'pdf', 20, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-20 20:55:34', '2023-06-20 20:55:34');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_03_17_114820_create_table_core_pages', 1),
(4, '2019_03_17_140539_create_media_files_table', 1),
(5, '2019_03_20_081256_create_core_news_category_table', 1),
(6, '2019_03_27_081940_create_core_setting_table', 1),
(7, '2019_03_28_101009_create_bravo_booking_table', 1),
(8, '2019_03_28_165911_create_booking_meta_table', 1),
(9, '2019_03_29_093236_update_bookings_table', 1),
(10, '2019_04_01_045229_create_user_meta_table', 1),
(11, '2019_04_01_150630_create_menu_table', 1),
(12, '2019_04_02_150630_create_core_news_table', 1),
(13, '2019_04_03_080159_bravo_location', 1),
(14, '2019_04_05_143248_create_core_templates_table', 1),
(15, '2019_05_07_085430_create_core_languages_table', 1),
(16, '2019_05_07_085442_create_core_translations_table', 1),
(17, '2019_05_17_074008_create_bravo_review', 1),
(18, '2019_05_17_074048_create_bravo_review_meta', 1),
(19, '2019_05_17_113042_create_tour_attrs_table', 1),
(20, '2019_05_21_084235_create_bravo_contact_table', 1),
(21, '2019_05_28_152845_create_core_subscribers_table', 1),
(22, '2019_06_17_142338_bravo_seo', 1),
(23, '2019_08_09_163909_create_inbox_table', 1),
(24, '2019_10_22_151319_create_social_table', 1),
(25, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(26, '2020_04_02_150631_create_core_tags_table', 1),
(27, '2020_04_05_101016_create_gig_table', 1),
(28, '2020_11_23_092238_create_notifications_table', 1),
(29, '2021_04_02_150632_create_core_tag_new_table', 1),
(30, '2021_07_28_000000_create_candidates_table', 1),
(31, '2021_07_28_000001_create_categories_table', 1),
(32, '2021_07_31_032650_create_companies_table', 1),
(33, '2021_08_02_151855_create_bc_jobs_table', 1),
(34, '2021_08_15_174944_create_bc_skills_table', 1),
(35, '2021_08_22_173931_create_role_table', 1),
(36, '2021_09_09_081440_migrate_ver_1_0', 1),
(37, '2021_09_24_195241_create_order_table', 1),
(38, '2021_09_28_174255_create_jobs_table', 1),
(39, '2021_09_29_041836_create_user_plan_table', 1),
(40, '2021_12_13_032843_create_bc_company_term', 1),
(41, '2022_01_10_152433_create_bc_company_categories', 1),
(42, '2022_01_28_042923_migrate_ver_1_3', 1),
(43, '2022_03_14_160024_migrate_ver_2_0', 1),
(44, '2022_03_18_030121_create_user_views', 1),
(45, '2022_04_22_074555_migrate_ver_2_0_1', 1),
(46, '2022_06_18_012936_migrate_ver_2_0_2', 1),
(47, '2022_09_22_091237_migrate_ver_2_2_0', 1),
(48, '2023_01_10_174202_migrate_ver_2_2_1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('060f59bc-06da-4afe-95a5-c6aeee128748', 'App\\Notifications\\PrivateChannelServices', 'App\\User', 11, '{\"id\":\"060f59bc-06da-4afe-95a5-c6aeee128748\",\"for_admin\":0,\"notification\":{\"id\":2,\"event\":\"CandidateApplyJobSubmit\",\"to\":\"employer\",\"name\":\"Miles Fox\",\"avatar\":\"http:\\/\\/localhost\\/rvoize\\/public\\/images\\/avatar.png\",\"link\":\"http:\\/\\/localhost\\/rvoize\\/public\\/user\\/applicants\",\"type\":\"apply_job\",\"message\":\"Hrishi D have applied to the job Restaurant Team Member\"}}', NULL, '2023-06-09 23:39:50', '2023-06-09 23:39:50'),
('32b42405-294a-49ea-8390-79b7b9e68e68', 'App\\Notifications\\PrivateChannelServices', 'App\\User', 1, '{\"id\":\"32b42405-294a-49ea-8390-79b7b9e68e68\",\"for_admin\":0,\"notification\":{\"id\":6,\"event\":\"CandidateApplyJobSubmit\",\"to\":\"employer\",\"name\":\"System Admin\",\"avatar\":\"http:\\/\\/localhost\\/rvoize\\/public\\/images\\/avatar.png\",\"link\":\"http:\\/\\/localhost\\/rvoize\\/public\\/user\\/applicants\",\"type\":\"apply_job\",\"message\":\"Hrishik D have applied to the job Assistant \\/ Store Keeper\"}}', NULL, '2023-06-20 20:54:23', '2023-06-20 20:54:23'),
('38cd7aef-65e4-4327-abb7-8f099c612632', 'App\\Notifications\\PrivateChannelServices', 'App\\User', 3, '{\"id\":\"38cd7aef-65e4-4327-abb7-8f099c612632\",\"for_admin\":0,\"notification\":{\"id\":3,\"event\":\"CandidateApplyJobSubmit\",\"to\":\"employer\",\"name\":\"Employer \",\"avatar\":\"http:\\/\\/localhost\\/rvoize\\/public\\/images\\/avatar.png\",\"link\":\"http:\\/\\/localhost\\/rvoize\\/public\\/user\\/applicants\",\"type\":\"apply_job\",\"message\":\"Hrishi D have applied to the job Assistant \\/ Store Keeper\"}}', NULL, '2023-06-09 23:40:30', '2023-06-09 23:40:30'),
('3e7e3d75-82b7-4dc3-bb5c-2705922c2a99', 'App\\Notifications\\PrivateChannelServices', 'App\\User', 3, '{\"id\":\"3e7e3d75-82b7-4dc3-bb5c-2705922c2a99\",\"for_admin\":0,\"notification\":{\"id\":1,\"event\":\"CandidateApplyJobSubmit\",\"to\":\"employer\",\"name\":\"Employer \",\"avatar\":\"http:\\/\\/localhost\\/rvoize\\/public\\/images\\/avatar.png\",\"link\":\"http:\\/\\/localhost\\/rvoize\\/public\\/user\\/applicants\",\"type\":\"apply_job\",\"message\":\"Hrishi D have applied to the job Product Designer \\/ UI Designer\"}}', NULL, '2023-06-09 23:38:42', '2023-06-09 23:38:42'),
('43432bc8-4d07-4e5b-aa7f-d7690e1c8d3a', 'App\\Notifications\\AdminChannelServices', 'App\\User', 16, '{\"id\":\"43432bc8-4d07-4e5b-aa7f-d7690e1c8d3a\",\"for_admin\":1,\"notification\":{\"id\":16,\"event\":\"SendMailUserRegistered\",\"to\":\"admin\",\"name\":\"hrishi d\",\"avatar\":\"http:\\/\\/localhost\\/rvoize\\/public\\/images\\/avatar.png\",\"link\":\"http:\\/\\/localhost\\/rvoize\\/public\\/admin\\/module\\/user?s=16\",\"type\":\"user\",\"message\":\"hrishi d has been registered\"}}', '2023-06-14 23:08:08', '2023-06-09 23:11:15', '2023-06-14 23:08:08'),
('7242122e-aefc-4dcb-a58c-20aea0abc0ac', 'App\\Notifications\\PrivateChannelServices', 'App\\User', 3, '{\"id\":\"7242122e-aefc-4dcb-a58c-20aea0abc0ac\",\"for_admin\":0,\"notification\":{\"id\":4,\"event\":\"CandidateApplyJobSubmit\",\"to\":\"employer\",\"name\":\"Employer \",\"avatar\":\"http:\\/\\/localhost\\/rvoize\\/public\\/images\\/avatar.png\",\"link\":\"http:\\/\\/localhost\\/rvoize\\/public\\/user\\/applicants\",\"type\":\"apply_job\",\"message\":\"Hrishi D have applied to the job Product Manager, Studio\"}}', NULL, '2023-06-09 23:41:03', '2023-06-09 23:41:03'),
('8747bd45-4727-4fa0-b14d-86e78aef904b', 'App\\Notifications\\AdminChannelServices', 'App\\User', 20, '{\"id\":\"8747bd45-4727-4fa0-b14d-86e78aef904b\",\"for_admin\":1,\"notification\":{\"id\":20,\"event\":\"SendMailUserRegistered\",\"to\":\"admin\",\"name\":\"Hrishik D\",\"avatar\":\"http:\\/\\/localhost\\/rvoize\\/public\\/images\\/avatar.png\",\"link\":\"http:\\/\\/localhost\\/rvoize\\/public\\/admin\\/module\\/user?s=20\",\"type\":\"user\",\"message\":\"Hrishik D has been registered\"}}', NULL, '2023-06-20 20:52:27', '2023-06-20 20:52:27'),
('8f841b61-e653-449d-9480-53c91be522bb', 'App\\Notifications\\PrivateChannelServices', 'App\\User', 1, '{\"id\":\"8f841b61-e653-449d-9480-53c91be522bb\",\"for_admin\":0,\"notification\":{\"id\":8,\"event\":\"CandidateApplyJobSubmit\",\"to\":\"employer\",\"name\":\"System Admin\",\"avatar\":\"http:\\/\\/localhost\\/rvoize\\/public\\/images\\/avatar.png\",\"link\":\"http:\\/\\/localhost\\/rvoize\\/public\\/user\\/applicants\",\"type\":\"apply_job\",\"message\":\"Hrishik D have applied to the job Group Marketing Manager\"}}', NULL, '2023-06-20 20:55:17', '2023-06-20 20:55:17'),
('acda115d-21f5-4953-a329-7144a836d7c8', 'App\\Notifications\\AdminChannelServices', 'App\\User', 17, '{\"id\":\"acda115d-21f5-4953-a329-7144a836d7c8\",\"for_admin\":1,\"notification\":{\"id\":17,\"event\":\"SendMailUserRegistered\",\"to\":\"admin\",\"name\":\"Hrishi D\",\"avatar\":\"http:\\/\\/localhost\\/rvoize\\/public\\/images\\/avatar.png\",\"link\":\"http:\\/\\/localhost\\/rvoize\\/public\\/admin\\/module\\/user?s=17\",\"type\":\"user\",\"message\":\"Hrishi D has been registered\"}}', '2023-06-14 23:08:08', '2023-06-09 23:31:11', '2023-06-14 23:08:08'),
('b0889914-b691-4ba9-bf2a-3616f95eb959', 'App\\Notifications\\AdminChannelServices', 'App\\User', 19, '{\"id\":\"b0889914-b691-4ba9-bf2a-3616f95eb959\",\"for_admin\":1,\"notification\":{\"id\":19,\"event\":\"SendMailUserRegistered\",\"to\":\"admin\",\"name\":\"Hrishikesh D\",\"avatar\":\"http:\\/\\/localhost\\/rvoize\\/public\\/images\\/avatar.png\",\"link\":\"http:\\/\\/localhost\\/rvoize\\/public\\/admin\\/module\\/user?s=19\",\"type\":\"user\",\"message\":\"Hrishikesh D has been registered\"}}', NULL, '2023-06-16 23:59:12', '2023-06-16 23:59:12'),
('b30f94dc-9949-47e5-84b5-e54c1da1aeae', 'App\\Notifications\\PrivateChannelServices', 'App\\User', 1, '{\"id\":\"b30f94dc-9949-47e5-84b5-e54c1da1aeae\",\"for_admin\":0,\"notification\":{\"id\":5,\"event\":\"CandidateApplyJobSubmit\",\"to\":\"employer\",\"name\":\"System Admin\",\"avatar\":\"http:\\/\\/localhost\\/rvoize\\/public\\/images\\/avatar.png\",\"link\":\"http:\\/\\/localhost\\/rvoize\\/public\\/user\\/applicants\",\"type\":\"apply_job\",\"message\":\"Hrishik D have applied to the job Product Designer \\/ UI Designer\"}}', NULL, '2023-06-20 20:53:50', '2023-06-20 20:53:50'),
('c1c64318-9945-4ec4-bdad-74b69d74dd75', 'App\\Notifications\\PrivateChannelServices', 'App\\User', 1, '{\"id\":\"c1c64318-9945-4ec4-bdad-74b69d74dd75\",\"for_admin\":0,\"notification\":{\"id\":7,\"event\":\"CandidateApplyJobSubmit\",\"to\":\"employer\",\"name\":\"System Admin\",\"avatar\":\"http:\\/\\/localhost\\/rvoize\\/public\\/images\\/avatar.png\",\"link\":\"http:\\/\\/localhost\\/rvoize\\/public\\/user\\/applicants\",\"type\":\"apply_job\",\"message\":\"Hrishik D have applied to the job Product Manager, Studio\"}}', NULL, '2023-06-20 20:54:55', '2023-06-20 20:54:55'),
('d591f1ea-e31b-48d5-bd12-536b0d97d643', 'App\\Notifications\\PrivateChannelServices', 'App\\User', 16, '{\"id\":\"d591f1ea-e31b-48d5-bd12-536b0d97d643\",\"for_admin\":0,\"notification\":{\"id\":9,\"event\":\"CandidateApplyJobSubmit\",\"to\":\"employer\",\"name\":\"hrishi d\",\"avatar\":\"http:\\/\\/localhost\\/rvoize\\/public\\/images\\/avatar.png\",\"link\":\"http:\\/\\/localhost\\/rvoize\\/public\\/user\\/applicants\",\"type\":\"apply_job\",\"message\":\"Hrishik D have applied to the job Job 1\"}}', NULL, '2023-06-20 20:55:34', '2023-06-20 20:55:34');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `social_forums`
--

DROP TABLE IF EXISTS `social_forums`;
CREATE TABLE IF NOT EXISTS `social_forums` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_image` bigint DEFAULT NULL,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `social_groups`
--

DROP TABLE IF EXISTS `social_groups`;
CREATE TABLE IF NOT EXISTS `social_groups` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_image` bigint DEFAULT NULL,
  `banner_image` bigint DEFAULT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner_id` bigint DEFAULT NULL,
  `category_id` bigint DEFAULT NULL,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `social_group_user`
--

DROP TABLE IF EXISTS `social_group_user`;
CREATE TABLE IF NOT EXISTS `social_group_user` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint DEFAULT NULL,
  `group_id` bigint DEFAULT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `social_posts`
--

DROP TABLE IF EXISTS `social_posts`;
CREATE TABLE IF NOT EXISTS `social_posts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forum_id` bigint DEFAULT NULL,
  `group_id` bigint DEFAULT NULL,
  `user_id` bigint DEFAULT NULL,
  `file_id` bigint DEFAULT NULL,
  `file_ids` text COLLATE utf8mb4_unicode_ci,
  `publish_date` datetime DEFAULT NULL,
  `comment_disabled_by` bigint DEFAULT NULL,
  `privary` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `social_post_comments`
--

DROP TABLE IF EXISTS `social_post_comments`;
CREATE TABLE IF NOT EXISTS `social_post_comments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_id` bigint DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint DEFAULT NULL,
  `file_id` bigint DEFAULT NULL,
  `file_ids` text COLLATE utf8mb4_unicode_ci,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `social_user_follow`
--

DROP TABLE IF EXISTS `social_user_follow`;
CREATE TABLE IF NOT EXISTS `social_user_follow` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `from_user` bigint DEFAULT NULL,
  `to_user` bigint DEFAULT NULL,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `last_login_at` datetime DEFAULT NULL,
  `avatar_id` bigint DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `vendor_commission_amount` int DEFAULT NULL,
  `vendor_commission_type` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint DEFAULT NULL,
  `billing_last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payment_gateway` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_guests` int DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verify_submit_status` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` smallint DEFAULT NULL,
  `need_update_pw` tinyint DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `phone`, `birthday`, `last_login_at`, `avatar_id`, `bio`, `status`, `create_user`, `update_user`, `vendor_commission_amount`, `vendor_commission_type`, `role_id`, `billing_last_name`, `billing_first_name`, `country`, `state`, `city`, `zip_code`, `address`, `address2`, `deleted_at`, `remember_token`, `created_at`, `updated_at`, `payment_gateway`, `total_guests`, `locale`, `verify_submit_status`, `is_verified`, `need_update_pw`) VALUES
(1, 'System Admin', 'System', 'Admin', 'hr@rvoize.com', '2023-06-06 05:58:46', '$2y$10$MuYzv2ETkMalJcKPrko7qOIhmu5bflLZKxgRUn8OWqoKDSTbU0QQm', '112 666 888', '1970-01-01', NULL, NULL, '<p>We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.</p>', 'publish', NULL, NULL, NULL, NULL, 1, NULL, NULL, 'Viet Nam', NULL, NULL, NULL, 'My Dinh, Ha Noi', NULL, NULL, 'KUyKdKT4BwuuiUfBFQakmcG68UXhOFAunSLLlSAuZcrefbdFrY3NY11eEuzw', '2023-06-06 05:58:46', '2023-06-06 23:17:03', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Candidate ', 'Candidate', '', 'candidate@superio.test', '2023-06-06 05:58:46', '$2y$10$JPwFtAY8VnyhKgrFmI9k8ubi7TXnAUNBrMKIbu7ADcjp86R0Xp./G', '112 666 888', NULL, NULL, NULL, 'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.', 'publish', NULL, NULL, NULL, NULL, 3, NULL, NULL, 'Viet Nam', NULL, NULL, NULL, 'My Dinh, Ha Noi', NULL, NULL, NULL, '2023-06-06 05:58:46', '2023-06-06 05:58:46', NULL, NULL, NULL, NULL, NULL, 1),
(3, 'Employer ', 'Employer', '', 'employer@superio.test', '2023-06-06 05:58:46', '$2y$10$RPAInrkvxcwXK7amGq/6YeWv/AJTl2KwlBe5uyVOEFJK/1gpGsEOa', '112 666 888', NULL, NULL, NULL, 'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.', 'publish', NULL, NULL, NULL, NULL, 2, NULL, NULL, 'Viet Nam', NULL, NULL, NULL, 'My Dinh, Ha Noi', NULL, NULL, NULL, '2023-06-06 05:58:46', '2023-06-06 05:58:46', NULL, NULL, NULL, NULL, NULL, 1),
(4, 'Opendoor Robertson', 'Opendoor', 'Robertson', 'robertson@superio.test_d_648975d8d8b7993108', NULL, '$2y$10$eACJjzAH.B3LIcEKid4VEuhDf2V4lFEu1oKdAgp5fHGNfW0dYsYEW', '112 666 888', NULL, NULL, 58, 'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.', 'publish', NULL, NULL, NULL, NULL, 3, NULL, NULL, 'Viet Nam', NULL, NULL, NULL, 'My Dinh, Ha Noi', NULL, '2023-06-14 02:40:00', NULL, '2023-06-06 05:58:46', '2023-06-14 02:40:00', NULL, NULL, NULL, NULL, NULL, 0),
(5, 'Checkr Warren', 'Checkr', 'Warren', 'warren@superio.test_d_648975d8c60d739861', NULL, '$2y$10$BcTxFhD8I4Twde/mlbegW.ewPcZ7/QfGFRSdM06ZcyKSdtFq30dSu', '112 666 888', NULL, NULL, 59, 'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.', 'publish', NULL, NULL, NULL, NULL, 3, NULL, NULL, 'Viet Nam', NULL, NULL, NULL, 'My Dinh, Ha Noi', NULL, '2023-06-14 02:40:00', NULL, '2023-06-06 05:58:46', '2023-06-14 02:40:00', NULL, NULL, NULL, NULL, NULL, 0),
(6, 'Esther Victoria', 'Esther', 'Victoria', 'victoria@superio.test_d_648975d8b9c6f25086', NULL, '$2y$10$z/ZdKxmbddIvJSogNBCJeeF52waAeMjX6DTCkw56A5DuxHZQLeCZi', '112 666 888', NULL, NULL, 60, 'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.', 'publish', NULL, NULL, NULL, NULL, 3, NULL, NULL, 'Viet Nam', NULL, NULL, NULL, 'My Dinh, Ha Noi', NULL, '2023-06-14 02:40:00', NULL, '2023-06-06 05:58:46', '2023-06-14 02:40:00', NULL, NULL, NULL, NULL, NULL, 0),
(7, 'Bell Alexander', 'Bell', 'Alexander', 'alexander@superio.test_d_648975d8b2bb7694', NULL, '$2y$10$cHNhVI2LUnFqb5N.vAwCRe5KbA.BCw7ulV9jhaUdin.x.kV0h590K', '112 666 888', NULL, NULL, 61, 'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.', 'publish', NULL, NULL, NULL, NULL, 3, NULL, NULL, 'Viet Nam', NULL, NULL, NULL, 'My Dinh, Ha Noi', NULL, '2023-06-14 02:40:00', NULL, '2023-06-06 05:58:47', '2023-06-14 02:40:00', NULL, NULL, NULL, NULL, NULL, 0),
(8, 'Floyd Robert', 'Floyd', 'Robert', 'robert@superio.test_d_648975d8ab64567772', NULL, '$2y$10$wfFt5smgLO6PjVfua4PhK.N0tC/VEz9.KDYvTqkw07PYATyWN1bwK', '112 666 888', NULL, NULL, 62, 'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.', 'publish', NULL, NULL, NULL, NULL, 3, NULL, NULL, 'Viet Nam', NULL, NULL, NULL, 'My Dinh, Ha Noi', NULL, '2023-06-14 02:40:00', NULL, '2023-06-06 05:58:47', '2023-06-14 02:40:00', NULL, NULL, NULL, NULL, NULL, 0),
(9, 'Jerome Leslie', 'Jerome', 'Leslie', 'leslie@superio.test_d_648975d8a4bbd3500', NULL, '$2y$10$EavkunVN1LYUAiNw33RCS.BRwrrlDPwcFeANPst/8SW8IizQJBGO.', '112 666 888', NULL, NULL, 63, 'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.', 'publish', NULL, NULL, NULL, NULL, 3, NULL, NULL, 'Viet Nam', NULL, NULL, NULL, 'My Dinh, Ha Noi', NULL, '2023-06-14 02:40:00', NULL, '2023-06-06 05:58:47', '2023-06-14 02:40:00', NULL, NULL, NULL, NULL, NULL, 0),
(10, 'Cameron Williamson', 'Cameron', 'Williamson', 'williamson@superio.test_d_648975d8a038f18136', NULL, '$2y$10$harlOpoEwgd/DugM.euesO/Eaj8UdKKdHgzvnkPu9JfZIbDYIVOg.', '112 666 888', NULL, NULL, NULL, 'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.', 'publish', NULL, NULL, NULL, NULL, 2, NULL, NULL, 'Viet Nam', NULL, NULL, NULL, 'My Dinh, Ha Noi', NULL, '2023-06-14 02:40:00', NULL, '2023-06-06 05:58:47', '2023-06-14 02:40:00', NULL, NULL, NULL, NULL, NULL, 0),
(11, 'Miles Fox', 'Miles', 'Fox', 'fox@superio.test_d_648975d89bf8667900', NULL, '$2y$10$I.rKpKH9gsAEZf.kYwppG.uL/rw0cxFsKwTeBjjE0w6W9zhWhG0s.', '112 666 888', NULL, NULL, NULL, 'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.', 'publish', NULL, NULL, NULL, NULL, 2, NULL, NULL, 'Viet Nam', NULL, NULL, NULL, 'My Dinh, Ha Noi', NULL, '2023-06-14 02:40:00', NULL, '2023-06-06 05:58:47', '2023-06-14 02:40:00', NULL, NULL, NULL, NULL, NULL, 0),
(12, 'Tom Hiddleston', 'Tom', 'Hiddleston', 'hiddleston@superio.test_d_648975d897d7552500', NULL, '$2y$10$y/FNinL2nIZv9CUK8EWHc.OGvb0lNHPXTeYpcExT0/GuWbXurME5G', '112 666 888', NULL, NULL, NULL, 'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.', 'publish', NULL, NULL, NULL, NULL, 2, NULL, NULL, 'Viet Nam', NULL, NULL, NULL, 'My Dinh, Ha Noi', NULL, '2023-06-14 02:40:00', NULL, '2023-06-06 05:58:47', '2023-06-14 02:40:00', NULL, NULL, NULL, NULL, NULL, 0),
(13, 'Jennifer Linda', 'Jennifer', 'Linda', 'linda@superio.test_d_648975d8924a761116', NULL, '$2y$10$42x4usSV2CEqR677CuphrePnJfxQOS0LCFlcLHlpcoDWI1Ay5/lmq', '112 666 888', NULL, NULL, NULL, 'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.', 'publish', NULL, NULL, NULL, NULL, 2, NULL, NULL, 'Viet Nam', NULL, NULL, NULL, 'My Dinh, Ha Noi', NULL, '2023-06-14 02:40:00', NULL, '2023-06-06 05:58:47', '2023-06-14 02:40:00', NULL, NULL, NULL, NULL, NULL, 0),
(14, 'David John', 'David', 'John', 'john@superio.test_d_648975d8847eb15055', NULL, '$2y$10$RBGAKa/2I0tC0VzCVvqEBeMFELGHO0gY4PL.h5dEVSWHkmf7wz.0u', '112 666 888', NULL, NULL, NULL, 'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.', 'publish', NULL, NULL, NULL, NULL, 2, NULL, NULL, 'Viet Nam', NULL, NULL, NULL, 'My Dinh, Ha Noi', NULL, '2023-06-14 02:40:00', NULL, '2023-06-06 05:58:47', '2023-06-14 02:40:00', NULL, NULL, NULL, NULL, NULL, 0),
(15, 'James Rebecca', 'James', 'Rebecca', 'rebecca@superio.test', NULL, '$2y$10$NYQDet88tUsetLNcCEfMPeqJ97BL5He1hLghM8LICsgIalWCS5.oi', '112 666 888', NULL, NULL, NULL, 'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.', 'publish', NULL, NULL, NULL, NULL, 2, NULL, NULL, 'Viet Nam', NULL, NULL, NULL, 'My Dinh, Ha Noi', NULL, NULL, NULL, '2023-06-06 05:58:47', '2023-06-06 05:58:47', NULL, NULL, NULL, NULL, NULL, 0),
(16, 'hrishi d', 'hrishi', 'd', 'it.intern@digipeddle.in', NULL, '$2y$10$Zhbw0KzYR9dtBMzaqFy7Z.P5dPsStKqF7WJVHRXVgYVcveuoVxZ7u', NULL, NULL, NULL, NULL, NULL, 'publish', NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '91jg231HnmttGeQev6qsD0rWluXkkNwJ8pSPFPwdcZqZ30mBSryKg4GumYLs', '2023-06-09 23:11:06', '2023-06-09 23:11:15', NULL, NULL, NULL, NULL, NULL, 0),
(17, 'Hrishi D', 'Hrishi', 'D', 'hrishidhumal7@gmail.com', NULL, '$2y$10$4WNXWAxnsEIewro4broTkuFwgWqkefPHvxxzpHyOIjUbwV4fM8sjG', NULL, NULL, NULL, NULL, NULL, 'publish', NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4DQ7qGFe0JUOJ3ykkrQSJ2eWgkrDWZQ8MWhVx4bQerZd4rLlCdgaWt6fmbjt', '2023-06-09 23:31:10', '2023-06-09 23:31:11', NULL, NULL, NULL, NULL, NULL, 0),
(18, 'admin main', 'admin', 'main', 'admin@rvoize.com', NULL, '$2y$10$05UAwZD23NQ2kvNZ7HcFpOuctqYo8PdVSBLQrpVoBNFpPV68wzSua', '9604424923', '1970-01-01', NULL, NULL, '', 'publish', NULL, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NzF8O4RUTPDMNNWCDYnc2n9XjZTFs9P0hPOMX9h0dznIQ6qfFtHmknIlNhQv', '2023-06-14 02:13:56', '2023-06-14 02:15:27', NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'Hrishikesh D', 'Hrishikesh', 'D', 'hrishidhumal77@gmail.com_d_649261433a90787292', NULL, '$2y$10$Ni6VxySjAX77.gkrwjkwweP80GWnHO0osl53ezToNZ0n.VKB.fodK', NULL, NULL, NULL, NULL, NULL, 'publish', NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-20 21:02:35', NULL, '2023-06-16 23:59:08', '2023-06-20 21:02:35', NULL, NULL, NULL, NULL, NULL, 0),
(20, 'Hrishik D', 'Hrishik', 'D', 'user3@gmail.com_d_6492614331b1624612', NULL, '$2y$10$IyBwbrzuAQYEbvk9f7ur0.OIVgYCYYR4J33lOzoAwxWTYJA7eqXPO', NULL, NULL, NULL, NULL, NULL, 'publish', NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-20 21:02:35', NULL, '2023-06-20 20:52:23', '2023-06-20 21:02:35', NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_meta`
--

DROP TABLE IF EXISTS `user_meta`;
CREATE TABLE IF NOT EXISTS `user_meta` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val` text COLLATE utf8mb4_unicode_ci,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_plan`
--

DROP TABLE IF EXISTS `user_plan`;
CREATE TABLE IF NOT EXISTS `user_plan` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `plan_id` bigint NOT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `max_service` int DEFAULT '0',
  `price` decimal(12,2) DEFAULT NULL,
  `plan_data` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint DEFAULT '1',
  `create_user` bigint DEFAULT NULL,
  `update_user` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_plan`
--

INSERT INTO `user_plan` (`id`, `plan_id`, `start_date`, `end_date`, `max_service`, `price`, `plan_data`, `status`, `create_user`, `update_user`, `created_at`, `updated_at`) VALUES
(16, 1, '2023-06-20 01:26:30', '2023-06-21 01:26:30', 1, NULL, '{\"id\":1,\"title\":\"Basic\",\"content\":null,\"price\":null,\"duration\":1,\"duration_type\":\"day\",\"annual_price\":null,\"max_service\":1,\"status\":\"publish\",\"role_id\":2,\"is_recommended\":0,\"deleted_at\":null,\"create_user\":1,\"update_user\":1,\"created_at\":\"2023-06-06T11:30:29.000000Z\",\"updated_at\":\"2023-06-20T06:52:16.000000Z\"}', 1, 16, NULL, '2023-06-20 01:26:30', '2023-06-20 01:26:30'),
(17, 4, '2023-06-09 23:36:36', '2023-07-09 23:36:36', 3, NULL, '{\"id\":4,\"title\":\"Silver JS\",\"content\":\"This is free of cost plan for jobseeker\",\"price\":null,\"duration\":30,\"duration_type\":\"day\",\"annual_price\":null,\"max_service\":3,\"status\":\"publish\",\"role_id\":3,\"is_recommended\":1,\"deleted_at\":null,\"create_user\":1,\"update_user\":null,\"created_at\":\"2023-06-10T04:59:49.000000Z\",\"updated_at\":\"2023-06-10T04:59:49.000000Z\"}', 1, 17, NULL, '2023-06-09 23:36:36', '2023-06-09 23:36:36'),
(20, 4, '2023-06-20 20:53:08', '2023-06-21 20:53:08', 5, NULL, '{\"id\":4,\"title\":\"Free\",\"content\":\"This is free of cost plan for jobseeker\",\"price\":null,\"duration\":1,\"duration_type\":\"day\",\"annual_price\":null,\"max_service\":5,\"status\":\"publish\",\"role_id\":3,\"is_recommended\":1,\"deleted_at\":null,\"create_user\":1,\"update_user\":1,\"created_at\":\"2023-06-10T04:59:49.000000Z\",\"updated_at\":\"2023-06-20T13:46:01.000000Z\"}', 1, 20, NULL, '2023-06-20 20:53:08', '2023-06-20 20:53:08');

-- --------------------------------------------------------

--
-- Table structure for table `user_upgrade_request`
--

DROP TABLE IF EXISTS `user_upgrade_request`;
CREATE TABLE IF NOT EXISTS `user_upgrade_request` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `role_request` int DEFAULT NULL,
  `approved_time` datetime DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved_by` int DEFAULT NULL,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_views`
--

DROP TABLE IF EXISTS `user_views`;
CREATE TABLE IF NOT EXISTS `user_views` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `client_ip` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_views`
--

INSERT INTO `user_views` (`id`, `user_id`, `client_ip`, `create_user`, `update_user`, `created_at`, `updated_at`) VALUES
(1, 9, '::1', 1, NULL, '2023-06-09 00:50:14', '2023-06-09 00:50:14'),
(2, 12, '::1', 1, NULL, '2023-06-09 23:09:27', '2023-06-09 23:09:27'),
(3, 3, '::1', 17, NULL, '2023-06-10 03:10:39', '2023-06-10 03:10:39'),
(4, 15, '::1', 17, NULL, '2023-06-10 03:14:18', '2023-06-10 03:14:18'),
(5, 7, '::1', 17, NULL, '2023-06-10 03:33:58', '2023-06-10 03:33:58');

-- --------------------------------------------------------

--
-- Table structure for table `user_wishlist`
--

DROP TABLE IF EXISTS `user_wishlist`;
CREATE TABLE IF NOT EXISTS `user_wishlist` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `object_id` int DEFAULT NULL,
  `object_model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_payouts`
--

DROP TABLE IF EXISTS `vendor_payouts`;
CREATE TABLE IF NOT EXISTS `vendor_payouts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `vendor_id` bigint NOT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payout_method` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_info` text COLLATE utf8mb4_unicode_ci,
  `month` smallint DEFAULT NULL,
  `year` smallint DEFAULT NULL,
  `note_to_admin` text COLLATE utf8mb4_unicode_ci,
  `note_to_vendor` text COLLATE utf8mb4_unicode_ci,
  `last_process_by` int DEFAULT NULL,
  `pay_date` timestamp NULL DEFAULT NULL,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vendor_payouts_year_month_index` (`year`,`month`),
  KEY `vendor_payouts_vendor_id_index` (`vendor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_payout_accounts`
--

DROP TABLE IF EXISTS `vendor_payout_accounts`;
CREATE TABLE IF NOT EXISTS `vendor_payout_accounts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `vendor_id` bigint NOT NULL,
  `payout_method` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_info` text COLLATE utf8mb4_unicode_ci,
  `create_user` int DEFAULT NULL,
  `update_user` int DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_main` tinyint DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `vendor_payout_accounts_vendor_id_index` (`vendor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

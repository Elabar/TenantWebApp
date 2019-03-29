-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 29, 2019 at 10:27 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tenant`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'PC', 'Sell a lot of PC stuffs', '2019-03-27 09:08:20', '2019-03-27 09:08:20'),
(2, 'Food & Beverage', 'Tons of good drinks and foods here', '2019-03-27 04:30:31', '2019-03-27 04:30:31'),
(3, 'Multimedia Consumptions', 'Fun stuff', '2019-03-27 05:52:11', '2019-03-27 05:52:11'),
(4, 'Accessories, Bags & Shoes', 'Beautiful Bags and daily items', '2019-03-27 06:23:52', '2019-03-27 06:23:52'),
(5, 'Personal Care / Pharmacy', 'Some health care related', '2019-03-27 06:28:16', '2019-03-27 06:28:16');

-- --------------------------------------------------------

--
-- Table structure for table `floors`
--

DROP TABLE IF EXISTS `floors`;
CREATE TABLE IF NOT EXISTS `floors` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `floors`
--

INSERT INTO `floors` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'G', 'Ground Floor', '2019-03-27 09:07:51', '2019-03-27 09:07:51'),
(2, '3A', 'Fourth floor', '2019-03-27 11:37:08', '2019-03-27 11:37:08'),
(3, '1', 'First floor', '2019-03-27 14:21:18', '2019-03-27 14:21:18'),
(4, '2', 'Second Floor', '2019-03-27 14:21:37', '2019-03-27 14:21:37'),
(5, '3', 'Third floor', '2019-03-27 14:21:53', '2019-03-27 14:21:53');

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_03_27_044935_create_floors_table', 1),
(4, '2019_03_27_044951_create_categories_table', 1),
(5, '2019_03_27_045008_create_zones_table', 1),
(6, '2019_03_27_045502_create_tenants_table', 1);

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
-- Table structure for table `tenants`
--

DROP TABLE IF EXISTS `tenants`;
CREATE TABLE IF NOT EXISTS `tenants` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lotNumber` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zoneID` int(10) UNSIGNED NOT NULL,
  `floorID` int(10) UNSIGNED NOT NULL,
  `categoryID` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tenants_lotnumber_unique` (`lotNumber`),
  KEY `tenants_zoneid_foreign` (`zoneID`),
  KEY `tenants_floorid_foreign` (`floorID`),
  KEY `tenants_categoryid_foreign` (`categoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tenants`
--

INSERT INTO `tenants` (`id`, `name`, `description`, `lotNumber`, `zoneID`, `floorID`, `categoryID`, `created_at`, `updated_at`) VALUES
(7, 'Adidas', 'adidas Originals is the iconic sportswear brand for the street.', 'G-003A', 1, 1, 4, '2019-03-27 06:26:37', '2019-03-27 06:26:37'),
(8, 'Bath & Body Works', 'It’s all about making fragrance fun here at Bath & Body Works!', 'G-035', 1, 1, 5, '2019-03-27 06:29:25', '2019-03-27 06:29:25'),
(9, 'Baskin Robbins', 'Delicious ice-cream', 'G-110', 1, 1, 2, '2019-03-27 06:31:26', '2019-03-27 06:31:26'),
(10, 'Speedy', 'High quality DVD', 'G-024', 1, 1, 3, '2019-03-27 06:33:03', '2019-03-27 06:33:03'),
(11, 'Sri Computer', 'Some reasonable priced gadget', 'G-288B', 1, 1, 1, '2019-03-27 06:33:53', '2019-03-27 06:33:53'),
(12, 'Gaming Brightstar', 'High end PC.', '2-231A', 2, 4, 1, '2019-03-27 06:41:01', '2019-03-27 06:41:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Lee Hoe Mun', 'leehoemun@gmail.com', '$2y$10$kZMvN0peqLWssfqIKNIqVObTgKp.RGR1D.n/uMFFN2TwHENUaOom6', 'Guz2Yr6tczpGnY1LCe1d7mXacSKrNcfAhWidZdJZeUtPglYzo8HI1OV2vMfz', '2019-03-27 03:15:45', '2019-03-27 03:15:45');

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

DROP TABLE IF EXISTS `zones`;
CREATE TABLE IF NOT EXISTS `zones` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Asian Pacific', 'Trendy things', '2019-03-27 09:07:12', '2019-03-27 09:07:12'),
(2, 'Red Zone', 'Cool stuff', '2019-03-27 14:36:40', '2019-03-27 14:36:40');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tenants`
--
ALTER TABLE `tenants`
  ADD CONSTRAINT `tenants_categoryid_foreign` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tenants_floorid_foreign` FOREIGN KEY (`floorID`) REFERENCES `floors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tenants_zoneid_foreign` FOREIGN KEY (`zoneID`) REFERENCES `zones` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

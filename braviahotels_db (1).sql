-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2022 at 11:59 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `braviahotels_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `addons`
--

CREATE TABLE `addons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `langauge_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotel_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addons_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addons_image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addons_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addons_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addons`
--

INSERT INTO `addons` (`id`, `langauge_id`, `hotel_id`, `addons_name`, `addons_image`, `addons_price`, `addons_description`, `status`, `created_at`, `updated_at`) VALUES
(2, '1', '1', 'jam', 'public/upload/addons/thumbnail/1714318473578210.png', '12', 'jam', '1', '2021-10-22 05:48:18', '2021-10-23 00:18:26'),
(3, '1', '1', 'Kechup', 'public/upload/addons/thumbnail/1714318520450417.jpg', '15', 'kechup', '1', '2021-10-22 05:49:03', '2021-10-22 06:36:04'),
(4, '1', '1', 'Lemon', 'public/upload/addons/thumbnail/1714318561721367.jpg', '10', 'fresh lemon', '1', '2021-10-22 05:49:42', '2021-10-22 06:14:28'),
(5, '1', '1', 'Onions', 'public/upload/addons/thumbnail/1714318603541135.jpg', '10', 'Onions', '1', '2021-10-22 05:50:22', '2021-10-22 06:33:47');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `langauge_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `langauge_id`, `country_id`, `city_name`, `status`, `created_at`, `updated_at`) VALUES
(2, '1', '1', 'Ajmer', '1', '2021-10-29 01:27:40', '2021-10-29 01:28:46');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `langauge_id` int(11) NOT NULL,
  `country_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `langauge_id`, `country_name`, `country_code`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'India', 'IN', '1', '2021-10-23 07:24:44', '2021-10-23 07:24:44'),
(2, 2, 'Inde', 'FR', '1', '2021-10-24 23:25:28', NULL);

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `langauge_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `hotel_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotel_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotel_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotel_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotel_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotel_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `langauge_id`, `country_id`, `hotel_name`, `hotel_code`, `hotel_email`, `hotel_address`, `hotel_contact`, `hotel_password`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', 1, 'Bravia Pancheel', 'Bravia001', 'bravia@gmail.com', 'Pancheel', '9958634356', 'bravia123', '1', '2021-10-29 23:57:42', '2021-10-29 23:57:42'),
(2, '1', 1, 'Bravia Ajmer', 'Bravia002', 'bravia@gmail.com', 'Pancheel', '9958634356', 'bravia123', '1', '2021-11-03 06:31:15', NULL);

--
-- Triggers `hotels`
--
DELIMITER $$
CREATE TRIGGER `hoteluser` AFTER INSERT ON `hotels` FOR EACH ROW BEGIN

INSERT INTO users(hotel_id, email, password)
VALUES
    ('New.id', 'New.hotel_email', 'New.hotel_password');
    	

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `langauge_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotel_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addons` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_popular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `langauge_id`, `hotel_id`, `menu_id`, `item_name`, `item_price`, `item_type`, `addons`, `is_popular`, `item_image`, `item_description`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '2', 'Beverages', '260', 'Veg', '5', 'yes', 'public/upload/items/thumbnail/1714580304441384.jpg', 'Special Beverages', '1', '2021-10-25 03:09:59', '2021-10-25 03:24:20'),
(2, '1', '1', '1', 'Biryani', '280', 'Veg', '2', 'yes', 'public/upload/items/thumbnail/1714581064196565.jpg', 'Special Biryani', '1', '2021-10-25 03:22:04', '2021-10-30 01:38:37');

-- --------------------------------------------------------

--
-- Table structure for table `itemstypes`
--

CREATE TABLE `itemstypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `langauge_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotel_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `itemtypes_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `itemtypes_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `itemstypes`
--

INSERT INTO `itemstypes` (`id`, `langauge_id`, `hotel_id`, `itemtypes_name`, `itemtypes_description`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', '1', 'Veg', 'Veg', '1', '2021-10-28 06:49:50', '2021-10-28 06:49:50'),
(2, '1', '1', 'Non-veg', 'Non-veg', '1', '2021-10-28 06:49:34', '2021-10-28 06:49:34'),
(3, '1', '1', 'Other', 'Ohter', '1', '2021-10-25 01:21:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kichenmanagers`
--

CREATE TABLE `kichenmanagers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `langauge_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotel_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kichenmanagers`
--

INSERT INTO `kichenmanagers` (`id`, `langauge_id`, `hotel_id`, `name`, `email`, `phone`, `status`, `created_at`, `updated_at`) VALUES
(1, '2', '1', 'Ajay Kumar', 'ajay@gmail.com', '9958613179', '1', '2021-10-30 02:47:58', '2021-10-30 02:47:58');

-- --------------------------------------------------------

--
-- Table structure for table `langauges`
--

CREATE TABLE `langauges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `langauge_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `langauge_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `langauges`
--

INSERT INTO `langauges` (`id`, `langauge_name`, `langauge_code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', '1', '2021-10-23 02:54:06', '2021-10-23 02:54:06'),
(2, 'French', 'fr', '1', '2021-10-23 02:44:33', '2021-10-23 02:49:54');

-- --------------------------------------------------------

--
-- Table structure for table `loyalitypoints`
--

CREATE TABLE `loyalitypoints` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hotel_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `earning_point` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `earning_point_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redeeming_point` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redeeming_point_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reward_point_for_registration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reward_point_for_review` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reward_point_for_fristorder` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reward_point_for_sharingapp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loyalitypoints`
--

INSERT INTO `loyalitypoints` (`id`, `hotel_id`, `earning_point`, `earning_point_value`, `redeeming_point`, `redeeming_point_value`, `reward_point_for_registration`, `reward_point_for_review`, `reward_point_for_fristorder`, `reward_point_for_sharingapp`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '2', '1', '2', '2', '10', '10', '10', '1', '2021-10-28 06:57:11', '2021-10-28 06:57:11');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `langauge_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotel_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `punch_line` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `langauge_id`, `hotel_id`, `menu_name`, `menu_code`, `punch_line`, `menu_description`, `menu_image`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', '1', 'Biryani', 'Menu001', 'Special Biryani', 'Special Biryani', 'public/upload/menus/thumbnail/1714576184117159.jpg', 1, '2021-10-25 02:04:30', '2021-10-25 02:05:52'),
(2, '1', '1', 'Beverages', 'Menu002', 'Cool Beverages', 'Cool Beverages', 'public/upload/menus/thumbnail/1714576400532297.jpg', 1, '2021-10-25 02:07:56', '2021-10-30 01:03:20');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_10_21_071841_createhotels', 2),
(6, '2021_10_22_080300_create_menus', 3),
(7, '2021_10_22_080626_create_addons', 3),
(8, '2021_10_22_080905_create_options', 3),
(9, '2021_10_22_080939_create_tables', 3),
(10, '2021_10_22_081337_create_itemstypes', 3),
(11, '2021_10_22_100803_create_hotels', 4),
(12, '2021_10_22_123352_create_langauges', 5),
(13, '2021_10_22_123709_createcountry', 5),
(14, '2021_10_25_075100_createitems', 6),
(15, '2021_10_25_103349_createoffers', 7),
(16, '2021_10_25_104019_createoffermenus', 7),
(17, '2021_10_26_102538_createkichenmanager', 8),
(18, '2021_10_26_102624_createrestaurantmanager', 9),
(19, '2021_10_27_061818_createorders', 10),
(20, '2021_10_27_062901_createorderitems', 10),
(21, '2021_10_28_072536_createreferralpoints', 11),
(22, '2021_10_28_095133_createloyalitypoints', 12),
(23, '2021_10_28_132945_createcity', 13);

-- --------------------------------------------------------

--
-- Table structure for table `offermenus`
--

CREATE TABLE `offermenus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `langauge_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotel_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offer_id` int(11) NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_price` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_total` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offermenus`
--

INSERT INTO `offermenus` (`id`, `langauge_id`, `hotel_id`, `offer_id`, `item_name`, `item_quantity`, `item_price`, `sub_total`, `status`, `created_at`, `updated_at`) VALUES
(3, '1', '1', 10, '2', '1', '280', '280.00', '1', '2021-11-02 07:20:47', NULL),
(4, '1', '1', 10, '1', '1', '260', '260.00', '1', '2021-11-02 07:20:47', NULL),
(5, '1', '1', 10, '2', '2', '280', '560.00', '1', '2021-11-02 07:20:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `langauge_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotel_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offer_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offer_start_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offer_valid_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offer_conditions` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offer_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gross_amount` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `langauge_id`, `hotel_id`, `offer_name`, `offer_price`, `offer_start_date`, `offer_valid_date`, `offer_conditions`, `offer_image`, `gross_amount`, `status`, `created_at`, `updated_at`) VALUES
(10, '1', '1', 'Dewali offer', '900', '2021-11-02', '2021-11-28', 'testst', 'C:\\xampp\\tmp\\phpC0C6.tmp', '1100.00', '1', '2021-11-02 07:20:47', '2021-11-02 07:32:07');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `langauge_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotel_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `options_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `options_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `langauge_id`, `hotel_id`, `options_name`, `options_description`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', '1', 'Family Pack', 'Family Pack', '1', '2021-10-30 00:09:44', '2021-10-30 00:09:44'),
(2, '1', '1', 'Jumbo Pack', 'Jumbo Pack', '1', '2021-10-25 00:28:47', '2021-10-25 00:34:28');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_invoice` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_price` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`id`, `order_invoice`, `order_id`, `item_name`, `item_price`, `sub_total`, `item_quantity`, `status`, `created_at`, `updated_at`) VALUES
(10, 'ORDER0001', '12', '1', '260', '520.00', '2', '1', '2021-11-02 07:06:41', NULL),
(11, 'ORDER0001', '12', '1', '260', '520.00', '2', '1', '2021-11-02 07:06:41', NULL),
(12, 'ORDER0001', '12', '1', '260', '520.00', '2', '1', '2021-11-02 07:06:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hotel_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gross_amount` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `net_amount` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_point_redeem` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `hotel_id`, `order_invoice`, `customer_name`, `email`, `phone`, `gross_amount`, `discount`, `net_amount`, `is_point_redeem`, `status`, `created_at`, `updated_at`) VALUES
(12, '1', 'ORDER0001', 'sujeet kumar', 'sujeet419@gmail.com', '8533886295', '1560.00', '58', '1502.00', '0', '1', '2021-11-02 07:06:41', NULL);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `referralpoints`
--

CREATE TABLE `referralpoints` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hotel_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refering_point` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refered_point` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `referralpoints`
--

INSERT INTO `referralpoints` (`id`, `hotel_id`, `refering_point`, `refered_point`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', '20', '10', '1', '2021-10-28 02:37:46', '2021-11-02 08:11:30');

-- --------------------------------------------------------

--
-- Table structure for table `restaurantmanagers`
--

CREATE TABLE `restaurantmanagers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `langauge_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotel_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurantmanagers`
--

INSERT INTO `restaurantmanagers` (`id`, `langauge_id`, `hotel_id`, `name`, `email`, `phone`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', '1', 'vijay', 'vijay@gmail.com', '9958613170', '1', '2021-10-30 03:06:18', '2021-10-30 03:06:18');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `langauge_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotel_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tables_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tables_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tables_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `langauge_id`, `hotel_id`, `tables_name`, `tables_code`, `tables_description`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', '1', 'Table1', 'Tabl001', 'Table for guest', '1', '2021-10-28 06:36:59', '2021-10-28 06:36:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `hotel_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 0, 'sujeet', 'sujeet419@gmail.com', NULL, '$2y$10$Zxexn4v6I21NNMaAA5NTl.ZWuOx2a3U68/a4n7W7H1f9lP7GBBFiO', NULL, '2021-10-20 07:13:57', '2021-10-20 07:13:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addons`
--
ALTER TABLE `addons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itemstypes`
--
ALTER TABLE `itemstypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kichenmanagers`
--
ALTER TABLE `kichenmanagers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `langauges`
--
ALTER TABLE `langauges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loyalitypoints`
--
ALTER TABLE `loyalitypoints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offermenus`
--
ALTER TABLE `offermenus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
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
-- Indexes for table `referralpoints`
--
ALTER TABLE `referralpoints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurantmanagers`
--
ALTER TABLE `restaurantmanagers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
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
-- AUTO_INCREMENT for table `addons`
--
ALTER TABLE `addons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `itemstypes`
--
ALTER TABLE `itemstypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kichenmanagers`
--
ALTER TABLE `kichenmanagers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `langauges`
--
ALTER TABLE `langauges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `loyalitypoints`
--
ALTER TABLE `loyalitypoints`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `offermenus`
--
ALTER TABLE `offermenus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `referralpoints`
--
ALTER TABLE `referralpoints`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `restaurantmanagers`
--
ALTER TABLE `restaurantmanagers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

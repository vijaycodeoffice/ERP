-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2022 at 12:22 PM
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
-- Database: `agaati_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` int(11) NOT NULL,
  `branch_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `branch_name`, `company_id`, `branch_email`, `branch_code`, `branch_number`, `branch_country`, `branch_address`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Textile branch', 1, 'branch@gmail.com', 'BRANCH8259', '9959735345', '8', 'Ghana', '1', '2021-11-23 10:54:45', '2021-11-23 12:55:48'),
(2, 'Export div', 1, 'branch1@gmail.com', 'BRANCH0239', '9959735345', '8', 'Egypt', '1', '2021-11-23 12:57:53', '2021-11-24 05:15:30');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `status`, `created_at`, `updated_at`) VALUES
(13, 'Computers', 0, '2021-09-16 07:15:15', '2021-10-07 10:16:19'),
(14, 'Smart Phones', 1, '2021-09-16 07:15:58', '2021-09-23 00:05:06'),
(15, 'Smart TV', 1, '2021-09-16 07:16:22', '2021-09-23 00:02:07'),
(16, 'Clothing - Men', 1, '2021-09-16 07:16:46', '2021-09-25 04:25:15'),
(17, 'Clothing - Women', 0, '2021-09-16 07:17:12', '2021-09-23 00:05:10');

-- --------------------------------------------------------

--
-- Table structure for table `contras`
--

CREATE TABLE `contras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `division_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_mode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `narration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_name`, `country_code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'India', 'IN / IND', 1, '2021-09-15 05:11:58', '2021-09-22 01:49:39'),
(8, 'Ghana', 'GH / GHA', 1, '2021-09-22 01:46:58', '2021-11-22 08:11:56'),
(9, 'Japan', 'JP / JPN', 0, '2021-09-22 01:47:49', '2021-09-22 01:49:40'),
(10, 'Malaysia', 'MY / MYS', 0, '2021-09-22 01:48:20', '2021-09-22 01:49:41'),
(11, 'South Africa', 'ZA / ZAF', 0, '2021-09-22 01:49:10', '2021-09-22 01:49:42'),
(12, 'South Korea', 'KR / KOR', 0, '2021-09-22 01:49:30', '2021-09-22 01:49:57'),
(14, 'bgfb', 'fgfg', 0, '2021-10-09 11:49:11', '2021-10-09 12:21:28'),
(15, 'fghgfcvcxv', 'gfhgf', 0, '2021-10-09 11:49:48', '2021-11-22 10:26:26');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refernce_by` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_name`, `customer_code`, `contact_no`, `tax_id`, `refernce_by`, `email`, `address`, `status`, `created_at`, `updated_at`) VALUES
(2, 'customer1', 'CUST-3341', '9958613156', '23ddd', 'ajay', 'customer@gmail.com', 'Ajmer', '1', '2021-09-20 01:05:01', NULL),
(3, 'customer2', 'CUST-7495', '9958613156', '23dddx', 'sumit', 'amit@gmail.com', 'Jaipur', '0', '2021-09-20 01:05:44', '2021-09-22 01:44:27');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `division_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `journals`
--

CREATE TABLE `journals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `division_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_mode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `narration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_09_10_145821_create_sales_tbl', 2),
(6, '2021_09_12_084805_categories', 3),
(7, '2021_09_12_085737_categories', 4),
(8, '2021_09_13_094957_createproduct', 5),
(9, '2021_09_14_045841_createsupplier', 6),
(10, '2021_09_14_050045_createcustomer', 6),
(11, '2021_09_14_050645_createwarehouse', 6),
(12, '2021_09_15_075346_createcountry', 7),
(13, '2021_09_15_075901_createunitofmeasure', 7),
(14, '2021_09_15_080149_createsubcategory', 7),
(15, '2021_09_16_064423_createpurchase', 8),
(16, '2021_09_16_130508_createsalestranscation', 9),
(17, '2021_09_16_130548_createsalesreturn', 9),
(18, '2021_09_30_073655_createpurchasetranscation', 10),
(19, '2021_10_05_045813_createpurchasereturns', 11),
(20, '2021_11_22_175637_createbranches', 12),
(21, '2021_11_22_175723_createdivisions', 12),
(22, '2021_11_24_120734_createpayment', 13),
(23, '2021_11_24_120802_createcontra', 13),
(24, '2021_11_24_120820_createreceipt', 13),
(25, '2021_11_24_120838_createjournal', 13);

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `division_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_mode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `narration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_barcode` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warehouse_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `initial_quantity` int(11) NOT NULL DEFAULT 0,
  `quantity_added` int(11) NOT NULL DEFAULT 0,
  `quantity_balance` int(11) NOT NULL DEFAULT 0,
  `price` double NOT NULL,
  `item_attachment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `narration` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `item_name`, `sku`, `item_barcode`, `category_name`, `subcategory_name`, `warehouse_name`, `unit_name`, `initial_quantity`, `quantity_added`, `quantity_balance`, `price`, `item_attachment`, `item_description`, `narration`, `status`, `created_at`, `updated_at`) VALUES
(12, 'Product1', 'SKU0001', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAATgAAAAeAQMAAACCM5C2AAAABlBMVEX///8AAABVwtN+AAAAAXRSTlMAQObYZgAAAAlwSFlzAAAOxAAADsQBlSsOGwAAAD5JREFUOI1j+MzDzMPP85/Hhpnn8B9jgw/8DGcM/vP8tzfmYT7z4YDB4T8feIwP/DnPMKpuVN2oulF1A6wOALbHBwduCv58AAAAAElFTkSuQmCC', '16', '5', '8', '1', 0, 4, 7, 50.9, 'public/upload/products/thumbnail/1713030438796580.jpg', 'test', 'test', 1, '2021-10-08 06:05:32', '2021-10-11 05:41:40'),
(13, 'product2', 'SKU00013', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAATgAAAAeAQMAAACCM5C2AAAABlBMVEX///8AAABVwtN+AAAAAXRSTlMAQObYZgAAAAlwSFlzAAAOxAAADsQBlSsOGwAAAD5JREFUOI1j+MzDzMPP85/Hhpnn8B9jgw/8DGcM/vP8tzfmYT7z4YDB4T8feIwP/DnPMKpuVN2oulF1A6wOALbHBwduCv58AAAAAElFTkSuQmCC', '15', '4', '8', '1', 0, 5, 5, 100, 'public/upload/products/thumbnail/1713030489470276.jpg', 'test', 'test', 1, '2021-10-08 06:06:21', NULL),
(14, 'Product 3', 'SKU00014', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAATgAAAAeAQMAAACCM5C2AAAABlBMVEX///8AAABVwtN+AAAAAXRSTlMAQObYZgAAAAlwSFlzAAAOxAAADsQBlSsOGwAAAD5JREFUOI1j+MzDzMPP85/Hhpnn8B9jgw/8DGcM/vP8tzfmYT7z4YDB4T8feIwP/DnPMKpuVN2oulF1A6wOALbHBwduCv58AAAAAElFTkSuQmCC', '14', '4', '8', 'xxxxz', 0, 0, 0, 100, 'public/upload/products/thumbnail/1713030527020323.jpg', 'test ttttttttttttttt', 'test ghgfhgh', 1, '2021-10-08 06:06:57', '2021-10-11 13:41:03'),
(15, 'Product 4', 'SKU00015', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAATgAAAAeAQMAAACCM5C2AAAABlBMVEX///8AAABVwtN+AAAAAXRSTlMAQObYZgAAAAlwSFlzAAAOxAAADsQBlSsOGwAAAD5JREFUOI1j+MzDzMPP85/Hhpnn8B9jgw/8DGcM/vP8tzfmYT7z4YDB4T8feIwP/DnPMKpuVN2oulF1A6wOALbHBwduCv58AAAAAElFTkSuQmCC', '16', '5', '8', '2', 0, 0, 0, 100, 'public/upload/products/thumbnail/1713316042922671.jpg', 'test', 'test', 1, '2021-10-11 09:45:06', '2021-10-11 09:46:09'),
(16, 'iPhone 13pro', 'SKU00016', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAATgAAAAeAQMAAACCM5C2AAAABlBMVEX///8AAABVwtN+AAAAAXRSTlMAQObYZgAAAAlwSFlzAAAOxAAADsQBlSsOGwAAAD5JREFUOI1j+MzDzMPP85/Hhpnn8B9jgw/8DGcM/vP8tzfmYT7z4YDB4T8feIwP/DnPMKpuVN2oulF1A6wOALbHBwduCv58AAAAAElFTkSuQmCC', '14', '4', '7', '1', 0, 0, 0, 125000, 'public/upload/products/thumbnail/1713487958953411.jpg', 'new iphone', 'tt', 1, '2021-10-13 07:17:38', NULL),
(17, 'tess', 'SKU00017', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAATgAAAAeAQMAAACCM5C2AAAABlBMVEX///8AAABVwtN+AAAAAXRSTlMAQObYZgAAAAlwSFlzAAAOxAAADsQBlSsOGwAAAD5JREFUOI1j+MzDzMPP85/Hhpnn8B9jgw/8DGcM/vP8tzfmYT7z4YDB4T8feIwP/DnPMKpuVN2oulF1A6wOALbHBwduCv58AAAAAElFTkSuQmCC', '16', '5', '7', '1', 0, 0, 10, 100, 'public/upload/products/thumbnail/1714389155525693.png', 'rr', 'rrr', 1, '2021-10-23 06:01:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchasereturns`
--

CREATE TABLE `purchasereturns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_no` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `return_invoice` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_data` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_return` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_return` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `narration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchasereturns`
--

INSERT INTO `purchasereturns` (`id`, `purchase_id`, `invoice_no`, `return_invoice`, `product_data`, `purchase_return`, `is_return`, `narration`, `status`, `created_at`, `updated_at`) VALUES
(8, '33', 'PUR00033', 'PRETURN0001', 'Product1,1,50.9,50.9,product2,0,100,0', '150.90', '', 'ttt', '1', '2021-10-23 06:27:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_type` int(11) NOT NULL,
  `gross_amount` float NOT NULL,
  `discount` float NOT NULL,
  `net_amount` float NOT NULL,
  `purchase_type` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=purchase,0=purchase return',
  `narration` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `invoice_no`, `invoice_date`, `supplier_id`, `transaction_type`, `gross_amount`, `discount`, `net_amount`, `purchase_type`, `narration`, `status`, `created_at`, `updated_at`) VALUES
(32, 'PUR0001', '10/23/2021', '4', 1, 125000, 12500, 112500, '1', 'abc', '1', '2021-10-23 06:18:17', NULL),
(33, 'PUR00033', '10/23/2021', '5', 2, 201.8, 0, 201.8, '1', 'test', '1', '2021-10-23 06:19:21', NULL),
(34, 'PUR00034', '02/05/2022', '5', 1, 2509, 10, 2499, '1', 'test', '1', '2022-02-05 04:47:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchasetransactions`
--

CREATE TABLE `purchasetransactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `supplier_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_no` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_cash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchasetransactions`
--

INSERT INTO `purchasetransactions` (`id`, `purchase_id`, `supplier_id`, `invoice_no`, `is_cash`, `item_id`, `item_quantity`, `item_price`, `sub_total`, `status`, `created_at`, `updated_at`) VALUES
(43, 32, '4', 'PUR0001', '', 16, 1, '125000', '125000.00', '1', '2021-10-23 06:18:17', NULL),
(44, 33, '5', 'PUR00033', '', 12, 2, '50.9', '101.80', '1', '2021-10-23 06:19:21', NULL),
(45, 33, '5', 'PUR00033', '', 13, 1, '100', '100.00', '1', '2021-10-23 06:19:21', NULL),
(46, 34, '5', 'PUR00034', '', 17, 10, '100', '1000.00', '1', '2022-02-05 04:47:34', NULL),
(47, 34, '5', 'PUR00034', '', 12, 10, '50.9', '509.00', '1', '2022-02-05 04:47:34', NULL),
(48, 34, '5', 'PUR00034', '', 13, 10, '100', '1000.00', '1', '2022-02-05 04:47:34', NULL);

--
-- Triggers `purchasetransactions`
--
DELIMITER $$
CREATE TRIGGER `purchaseinventroyupdate` AFTER INSERT ON `purchasetransactions` FOR EACH ROW BEGIN

UPDATE products
SET products.quantity_balance = Products.quantity_balance + New. item_quantity 
WHERE products.id = New.item_id ;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `division_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_mode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `narration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_date` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` int(11) NOT NULL,
  `transaction_type` int(11) NOT NULL COMMENT '1=cash sale,2=credit sale, 3=other sale',
  `gross_amount` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` float DEFAULT NULL,
  `net_amount` float NOT NULL,
  `sale_type` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=sale,0=sale return',
  `narration` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ggg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `invoice_no`, `invoice_date`, `customer_id`, `transaction_type`, `gross_amount`, `discount`, `net_amount`, `sale_type`, `narration`, `created_at`, `updated_at`) VALUES
(85, 'SALE0001', '10/23/2021', 2, 1, '125000.00', 10000, 115000, '1', 'test', '2021-10-23 06:33:38', NULL),
(86, 'SALE00086', '10/23/2021', 3, 2, '50.90', 0, 50.9, '1', 'test2', '2021-10-23 06:38:58', NULL),
(87, 'SALE00087', '10/29/2021', 3, 1, '200.00', 2, 198, '1', 'test', '2021-10-29 07:46:41', NULL),
(88, 'SALE00088', '02/06/2022', 3, 1, '100.00', 0, 100, '1', 'test', '2022-02-05 04:46:47', NULL),
(89, 'SALE00089', '02/05/2022', 3, 1, '101.80', 1, 100.8, '1', 'ttt', '2022-02-05 04:48:40', NULL),
(90, 'SALE00090', '01/05/2022', 3, 2, '601.80', 0, 601.8, '1', 'ttt', '2022-01-05 04:49:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `salesreturns`
--

CREATE TABLE `salesreturns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_id` int(11) NOT NULL,
  `invoice_no` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `return_invoice` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_price` int(11) NOT NULL,
  `sub_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_return` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_return` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `narration` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salesreturns`
--

INSERT INTO `salesreturns` (`id`, `sale_id`, `invoice_no`, `return_invoice`, `item_id`, `item_quantity`, `item_price`, `sub_total`, `product_data`, `sale_return`, `is_return`, `narration`, `status`, `created_at`, `updated_at`) VALUES
(27, 85, 'SALE0001', 'SRETURN0001', '', '', 0, '', 'iPhone 13pro,0,125000,0', '125000.00', '', 'test', '1', '2021-10-23 06:35:04', NULL),
(28, 85, 'SALE0001', 'SRETURN00028', '', '', 0, '', 'iPhone 13pro,0,125000,0', '125000.00', '', 'tetet', '1', '2021-11-20 12:42:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `salestransactions`
--

CREATE TABLE `salestransactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_id` int(11) NOT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_no` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_cash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_total` float NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salestransactions`
--

INSERT INTO `salestransactions` (`id`, `sale_id`, `customer_id`, `invoice_no`, `is_cash`, `item_id`, `item_quantity`, `item_price`, `sub_total`, `status`, `created_at`, `updated_at`) VALUES
(50, 85, '2', 'SALE0001', '', 16, '1', '125000', 125000, '1', '2021-10-23 06:33:38', NULL),
(51, 86, '3', 'SALE00086', '', 12, '1', '50.9', 50.9, '1', '2021-10-23 06:38:58', NULL),
(52, 87, '3', 'SALE00087', '', 13, '1', '100', 100, '1', '2021-10-29 07:46:41', NULL),
(53, 87, '3', 'SALE00087', '', 14, '1', '100', 100, '1', '2021-10-29 07:46:41', NULL),
(54, 88, '3', 'SALE00088', '', 14, '1', '100', 100, '1', '2022-02-05 04:46:47', NULL),
(55, 89, '3', 'SALE00089', '', 12, '2', '50.9', 101.8, '1', '2022-02-05 04:48:40', NULL),
(56, 90, '3', 'SALE00090', '', 13, '5', '100', 500, '1', '2022-01-05 04:49:11', NULL),
(57, 90, '3', 'SALE00090', '', 12, '2', '50.9', 101.8, '1', '2022-01-05 04:49:11', NULL);

--
-- Triggers `salestransactions`
--
DELIMITER $$
CREATE TRIGGER `QuantityUpdate` AFTER INSERT ON `salestransactions` FOR EACH ROW BEGIN

UPDATE products
SET products.quantity_balance = Products.quantity_balance - New. item_quantity 
WHERE products.id = New.item_id ;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `subcategory_name`, `status`, `created_at`, `updated_at`) VALUES
(3, '17', 'Subcat1', 0, '2021-09-20 01:33:56', '2021-09-22 01:45:01'),
(4, '15', 'smart', 1, '2021-09-20 01:34:23', '2021-09-22 01:04:53'),
(5, '16', 'ccc', 1, '2021-10-06 05:48:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refernce_by` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_name`, `supplier_code`, `contact_no`, `tax_id`, `refernce_by`, `email`, `address`, `status`, `created_at`, `updated_at`) VALUES
(4, 'supplier1', 'SUP-8943', '9958613156', '23ddd', 'sumit', 'ajmerwp@gmail.com', 'Ajmer', '0', '2021-09-20 01:10:26', '2021-09-22 01:44:44'),
(5, 'supplier2', 'SUP-6668', '9958613156', '23dddx', 'ajay', 'supplier@gmail.com', 'Delhi', '1', '2021-09-20 01:10:58', '2021-09-21 00:48:55');

-- --------------------------------------------------------

--
-- Table structure for table `unitof_measures`
--

CREATE TABLE `unitof_measures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unitof_measures`
--

INSERT INTO `unitof_measures` (`id`, `unit_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'KG', '1', '2021-09-15 05:18:49', '2021-09-22 01:44:20'),
(2, 'xxxxz', '1', '2021-10-06 05:49:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_code` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_number` bigint(20) NOT NULL,
  `company_country` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_currency` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `company_code`, `company_number`, `company_country`, `company_currency`, `address`, `email_verified_at`, `password`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', 'COMP0001', 0, '', '', '', NULL, '$2y$10$MsqXvsxZwJhIijJUrRyfNu7h2n9Mg/deCoKSzvuc9x7gJ1hk6CJB2', NULL, 1, '2021-09-09 07:15:17', '2021-11-22 10:45:14'),
(2, 'Satguru Overseas', 'satguru@gmail.com', 'COMP2758', 8533886289, '1', 'INR', 'Pancheeel Ajmer', NULL, '$2y$10$UtRpMK0QB40.GfJ.BroeG.Dblj6kaCix2xsVEHB2rlAfeq/hlMz2i', NULL, 1, '2021-11-22 10:06:25', '2021-11-22 10:30:40'),
(3, 'Agaatti con', 'agaatti@gmail.com', 'COMP3433', 8533886289, '1', 'INR', 'Ajmer Pancheel', NULL, '$2y$10$16aaugvaGvo82Xx.EOwcsOyaYL3/0haqoooXpYBpreHPFcdaZ.qQS', NULL, 1, '2021-11-22 10:33:48', '2021-11-24 05:14:54');

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `warehouse_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warehouse_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `warehouse_name`, `warehouse_code`, `contact_no`, `email`, `address`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Ajmer Warehouse', 'WH-8335', '9958613156', 'ajmerwp@gmail.com', 'Panchsheel Nagar Delhi', '1', '2021-09-19 23:51:35', '2021-10-13 07:12:50'),
(7, 'Jaipur Warehouse', 'WH-3591', '9958613145', 'jaipurwp@gmail.com', 'Jaipur', '1', '2021-09-19 23:52:51', '2021-10-13 07:12:47'),
(8, 'Delhi Warehouse', 'WH-0844', '9958613156', 'delhiwh@gmail.com', 'Delhi', '1', '2021-09-19 23:53:24', '2021-09-21 00:54:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `branches_branch_email_unique` (`branch_email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contras`
--
ALTER TABLE `contras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `divisions_division_email_unique` (`division_email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `journals`
--
ALTER TABLE `journals`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchasereturns`
--
ALTER TABLE `purchasereturns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchasetransactions`
--
ALTER TABLE `purchasetransactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salesreturns`
--
ALTER TABLE `salesreturns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salestransactions`
--
ALTER TABLE `salestransactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unitof_measures`
--
ALTER TABLE `unitof_measures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `contras`
--
ALTER TABLE `contras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `journals`
--
ALTER TABLE `journals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `purchasereturns`
--
ALTER TABLE `purchasereturns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `purchasetransactions`
--
ALTER TABLE `purchasetransactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `salesreturns`
--
ALTER TABLE `salesreturns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `salestransactions`
--
ALTER TABLE `salestransactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `unitof_measures`
--
ALTER TABLE `unitof_measures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

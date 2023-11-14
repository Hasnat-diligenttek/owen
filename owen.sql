-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2023 at 02:51 AM
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
-- Database: `owen`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reciever_name` varchar(255) DEFAULT NULL,
  `organization` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `reciever_name`, `organization`, `address`, `city`, `state`, `zip_code`, `country`, `phone`, `user_id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Orli', 'fawoq@mailinator.com', 'Similique beatae rec', 'Kermit', 'Addison', 'Kasimir', NULL, 'Aaron', 4, 1, NULL, '2023-11-13 19:47:12'),
(2, 'Logan', 'rovita@mailinator.com', 'Consequat Aut archi', 'Clinton', 'Brittany', 'Hilary', NULL, 'Veda', 4, 0, '2023-10-16 15:21:26', '2023-11-13 19:47:34');

-- --------------------------------------------------------

--
-- Table structure for table `addtocarts`
--

CREATE TABLE `addtocarts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blances`
--

CREATE TABLE `blances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `blance` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blances`
--

INSERT INTO `blances` (`id`, `userId`, `blance`, `created_at`, `updated_at`) VALUES
(1, 6, 12, '2023-11-07 05:54:31', '2023-11-07 05:56:17');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `code` varchar(8) DEFAULT NULL,
  `team_name` varchar(255) DEFAULT NULL,
  `org_type` varchar(255) DEFAULT NULL,
  `org_cate` varchar(255) DEFAULT NULL,
  `org_name` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `members` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `user_id`, `code`, `team_name`, `org_type`, `org_cate`, `org_name`, `zip_code`, `start_date`, `end_date`, `members`, `created_at`, `updated_at`) VALUES
(1, 2, 'XYCrrn', 'syed mohtashim', '1', '14', 'foundation', NULL, '2023-10-07', '2023-10-25', '2-10', '2023-10-09 15:44:21', '2023-10-09 20:13:17'),
(5, 2, 'add', 'syed mohtashim12', '1', '14', 'foundation', NULL, '2023-10-07', '2023-10-25', 'just me', '2023-10-09 18:52:42', '2023-10-09 20:12:27'),
(7, 6, 'RvUCM7', 'Flood Relief', '3', NULL, 'foundation', NULL, '2023-10-19T23:52', '2023-10-30T23:52', '2-10', '2023-10-26 13:53:08', '2023-10-26 13:53:08');

-- --------------------------------------------------------

--
-- Table structure for table `event_members`
--

CREATE TABLE `event_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_members`
--

INSERT INTO `event_members` (`id`, `event_id`, `userId`, `created_at`, `updated_at`) VALUES
(1, 7, 3, '2023-10-25 13:55:49', '2023-10-25 13:55:49'),
(2, 7, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event_payments`
--

CREATE TABLE `event_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `sq_order_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_payments`
--

INSERT INTO `event_payments` (`id`, `event_id`, `amount`, `sq_order_id`, `created_at`, `updated_at`) VALUES
(1, 6, 12, '3vi3A1bzlqucDGLoo1Kncgzvmd4F', '2023-11-04 00:47:58', '2023-11-04 00:47:58'),
(2, 6, 1, 'tc7zACIaMcBnGCcu8xlolXRZQa4F', '2023-11-04 00:58:34', '2023-11-04 00:58:34'),
(3, 7, 12, '56lURGK89l7XEdg8HfXVTlN0Bi4F', '2023-11-07 00:10:27', '2023-11-07 00:10:27'),
(4, 7, 1, 'VygBeYamRDfVoZuYtD9aTPPFVb4F', '2023-11-07 00:21:45', '2023-11-07 00:21:45'),
(5, 7, 10, 'FO4gubXpxYiGzs3aKkgvJQz7Ia4F', '2023-11-07 05:50:13', '2023-11-07 05:50:13'),
(6, 7, 10, 'FCGIZ1PW9htsVS2zzzikoaozoa4F', '2023-11-07 05:50:26', '2023-11-07 05:50:26'),
(7, 7, 10, 'DBkhkKhIZsHfZNL0TmupPNDsDh4F', '2023-11-07 05:52:15', '2023-11-07 05:52:15'),
(8, 7, 12, '5AeReyVeEJuL1JJ4D46OlSEutf4F', '2023-11-07 05:53:23', '2023-11-07 05:53:23'),
(9, 7, 12, 'JyJ0Il458ZgdeU9pwQbaFyjHef4F', '2023-11-07 05:54:31', '2023-11-07 05:54:31'),
(10, 7, 9, 'NELpKks8CBkf7a7d8x14jOS05e4F', '2023-11-07 05:54:52', '2023-11-07 05:54:52'),
(11, 7, 9, 'hgw3WeuUi62tNZ9v79Lk4hAw6h4F', '2023-11-07 05:55:08', '2023-11-07 05:55:08'),
(12, 7, 9, 'D1qBLNoHXDohcl9KXcci0cZzqe4F', '2023-11-07 05:55:39', '2023-11-07 05:55:39'),
(13, 7, 3, 'TdAqm33w4MmtkDoYU6b252qSjc4F', '2023-11-07 05:56:17', '2023-11-07 05:56:17');

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
(6, '2023_10_03_191138_create_products_table', 2),
(7, '2023_10_03_193835_product_image', 2),
(8, '2023_10_05_003023_create_addtocarts_table', 3),
(9, '2023_10_06_231804_create_events_table', 4),
(10, '2023_10_09_174034_org_type_cate', 5),
(11, '2023_10_10_170841_add_profile_to_users_table', 6),
(13, '2023_10_16_181301_create_addresses_table', 7),
(14, '2023_10_17_004725_create_event_members_table', 8),
(15, '2023_10_23_174719_create_stores_table', 8),
(16, '2023_11_01_192729_create_orders_table', 9),
(17, '2023_11_01_192755_create_order_details_table', 9),
(18, '2023_11_03_092526_create_event_payments_table', 10),
(19, '2023_11_07_103212_create_blances_table', 11),
(20, '2023_11_14_004905_create_payment_information_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `sq_order_id` longtext DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `gift_option` varchar(255) DEFAULT NULL,
  `custom_option` text DEFAULT NULL,
  `total_price` varchar(255) DEFAULT NULL,
  `box_cover` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `sq_order_id`, `qty`, `price`, `gift_option`, `custom_option`, `total_price`, `box_cover`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '1', 1, '12', NULL, NULL, '12', NULL, '2023-11-02 06:23:30', '2023-11-02 06:23:30'),
(2, 3, 3, '3', 3, '2', NULL, NULL, '6', NULL, '2023-11-02 06:23:30', '2023-11-02 06:23:30'),
(3, 3, 1, '2', 2, '12', NULL, NULL, '24', NULL, '2023-11-02 06:40:41', '2023-11-02 06:40:41'),
(4, 3, 1, '3', 3, '12', NULL, NULL, '36', '1699344218.png', '2023-11-07 03:03:38', '2023-11-07 03:03:38'),
(5, 3, 1, '3', 3, '12', NULL, NULL, '36', '1699344274.png', '2023-11-07 03:04:34', '2023-11-07 03:04:34'),
(6, 6, 3, '0', 1, '2', 'birthday', NULL, '2', '', '2023-11-07 06:29:15', '2023-11-07 06:29:15');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_no` varchar(255) DEFAULT NULL,
  `f_name` varchar(255) DEFAULT NULL,
  `l_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `appartment` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `zipcode` int(11) DEFAULT NULL,
  `gift_status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `email`, `phone_no`, `f_name`, `l_name`, `address`, `appartment`, `city`, `province`, `zipcode`, `gift_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'mohtashim.diligenttek@gmail.com', '06572206606', 'syed', 'mohtashim', 'usa', 'ad', 'hyd', 'sindh', 99540, NULL, '2023-11-02 06:23:30', '2023-11-02 06:23:30'),
(2, 2, 'mohtashim.diligenttek@gmail.com', '06572206606', 'syed', 'mohtashim', 'usa', 'ad', 'hyd', 'sindh', 99540, NULL, '2023-11-02 06:23:30', '2023-11-02 06:23:30'),
(3, 3, 'mohtashim.diligenttek@gmail.com', '06572206606', 'syed', 'mohtashim', 'usa', 'ad', 'hyd', 'sindh', 99540, NULL, '2023-11-02 06:40:41', '2023-11-02 06:40:41'),
(4, 5, 'mohtashim.diligenttek@gmail.com', '06572206606', 'syed', 'mohtashim', 'usa', 'ad', 'hyd', 'sindh', 99540, 'on', '2023-11-07 03:04:34', '2023-11-07 03:04:34'),
(5, 6, 'mohtashim.diligenttek@gmail.com', '06572206606', 'syed', 'mohtashim', 'usa', 'ad', 'hyd', 'sindh', 99540, NULL, '2023-11-07 06:29:15', '2023-11-07 06:29:15');

-- --------------------------------------------------------

--
-- Table structure for table `org_type_cate`
--

CREATE TABLE `org_type_cate` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `org_type_name` varchar(255) DEFAULT NULL,
  `org_status` varchar(255) DEFAULT NULL,
  `org_cate_name` varchar(255) DEFAULT NULL,
  `org_parent_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `org_type_cate`
--

INSERT INTO `org_type_cate` (`id`, `org_type_name`, `org_status`, `org_cate_name`, `org_parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Arts Culture', '1', NULL, '0', NULL, NULL),
(2, 'Associations, Clubs &amp; Community', '1', NULL, '0', NULL, NULL),
(3, 'Education &amp; Academics', '1', NULL, '0', NULL, NULL),
(4, 'Health &amp; Wellness', '1', NULL, '0', NULL, NULL),
(5, 'Religious Organization', '1', NULL, '0', NULL, NULL),
(6, 'Sororities &amp; Fraternities', '1', NULL, '0', NULL, NULL),
(7, 'Sports &amp; Athletics', '1', NULL, '0', NULL, NULL),
(8, 'Other', '1', NULL, '0', NULL, NULL),
(9, 'Interfaith Coalitions', '0', NULL, '5', NULL, NULL),
(10, 'Ministry', '0', NULL, '5', NULL, NULL),
(11, 'Place of Worship', '0', NULL, '5', NULL, NULL),
(12, 'Youth Group', '0', NULL, '5', NULL, NULL),
(13, 'Other', '0', NULL, '5', NULL, NULL),
(14, 'Arts Education', '0', NULL, '1', NULL, NULL),
(15, 'Audio/Visual', '0', NULL, '1', NULL, NULL),
(16, 'Band', '0', NULL, '1', NULL, NULL),
(17, 'Choir', '0', NULL, '1', NULL, NULL),
(18, 'Dance', '0', NULL, '1', NULL, NULL),
(19, 'Music', '0', NULL, '1', NULL, NULL),
(20, 'Orchestra', '0', NULL, '1', NULL, NULL),
(21, 'Performing Arts Center', '0', NULL, '1', NULL, NULL),
(22, 'Speech &amp; Debate', '0', NULL, '1', NULL, NULL),
(23, 'Show Choir', '0', NULL, '1', NULL, NULL),
(24, 'Theater', '0', NULL, '1', NULL, NULL),
(25, 'Visual Arts', '0', NULL, '1', NULL, NULL),
(26, 'Other', '0', NULL, '1', NULL, NULL),
(27, 'Pre-K', '0', NULL, '3', NULL, NULL),
(28, 'DECA', '0', NULL, '3', NULL, NULL),
(29, 'Elementary School', '0', NULL, '3', NULL, NULL),
(30, 'Future Business Leaders of America', '0', NULL, '3', NULL, NULL),
(31, 'High School', '0', NULL, '3', NULL, NULL),
(32, 'Higher Education', '0', NULL, '3', NULL, NULL),
(33, 'Middle School', '0', NULL, '3', NULL, NULL),
(34, 'Parent &amp; Teacher Groups', '0', NULL, '3', NULL, NULL),
(35, 'Preschools &amp; Daycare', '0', NULL, '3', NULL, NULL),
(36, 'Scholarships &amp; Student Financial Aid', '0', NULL, '3', NULL, NULL),
(37, 'Science Olympiad', '0', NULL, '3', NULL, NULL),
(38, 'SkillsUSA', '0', NULL, '3', NULL, NULL),
(39, 'Stayover or Day Camps', '0', NULL, '3', NULL, NULL),
(40, 'Student Council &amp; Student Government', '0', NULL, '3', NULL, NULL),
(41, 'Student Services', '0', NULL, '3', NULL, NULL),
(42, 'Other', '0', NULL, '3', NULL, NULL);

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
-- Table structure for table `payment_information`
--

CREATE TABLE `payment_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type` text DEFAULT NULL,
  `card_name` text DEFAULT NULL,
  `card_number` text DEFAULT NULL,
  `exp_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_information`
--

INSERT INTO `payment_information` (`id`, `user_id`, `type`, `card_name`, `card_number`, `exp_date`, `created_at`, `updated_at`) VALUES
(1, 4, '2', 'Kane', '916', '2001-09-02', '2023-11-13 20:41:17', '2023-11-13 20:41:29');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_type` int(11) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `short_desc` longtext DEFAULT NULL,
  `thumb_image` varchar(255) NOT NULL,
  `price_1` int(11) DEFAULT NULL,
  `price_3` int(11) DEFAULT NULL,
  `price_6` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_type`, `size`, `short_desc`, `thumb_image`, `price_1`, `price_3`, `price_6`, `created_at`, `updated_at`) VALUES
(1, 'Easy Peasy Caramel Cheesy', 1, '7.33 oz. (Approx. 5 Cups)', 'adfad', '', 12, 20, 25, '2023-10-03 14:53:54', '2023-10-03 14:53:54'),
(2, 'Chi-Town Chow Down', 1, '7.33 oz. (Approx. 5 Cups)', 'adfad', '', 2, 5, 10, '2023-10-03 14:55:43', '2023-10-03 14:55:43'),
(3, 'Holla-Peño', 1, '2.35 oz. (Approx. 5 Cups)', 'asfasd', '1801696370449.jpg', 2, 5, 8, '2023-10-03 17:00:49', '2023-10-03 17:00:49');

-- --------------------------------------------------------

--
-- Table structure for table `productsimges`
--

CREATE TABLE `productsimges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productsimges`
--

INSERT INTO `productsimges` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, '1696362834.jpg', NULL, NULL),
(2, 1, '1696362834.jpg', NULL, NULL),
(3, 2, '34831696362943.jpg', NULL, NULL),
(4, 2, '52871696362943.jpg', NULL, NULL),
(5, 3, '59041696370449.jpg', NULL, NULL),
(6, 3, '8671696370449.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `store_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `event_id`, `user_id`, `image`, `display_name`, `amount`, `status`, `store_code`, `created_at`, `updated_at`) VALUES
(1, 1, 6, '1698278301.jpg', 'MD fund', 100, 1, '395f4975412009929abc', '2023-10-25 18:58:21', '2023-10-25 18:58:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `sms_code` int(11) DEFAULT NULL,
  `login_type` int(11) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `organization` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `phone`, `sms_code`, `login_type`, `lastname`, `organization`) VALUES
(1, 'admin', 'admin@gmail.com', '0000-00-00 00:00:00', '$2y$10$jp.PKNTBiIZj2qIb8pCGU.S1ntOyz3/Q8DjUiJoTtoW4KHdbhOfZe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Syed Mohtashim', 'mohtashim@gmail.com', NULL, '$2y$10$GNULYdgwcN..SuC62GBYjOspRGyf72W6zIo98pH0sjFQNapdfnwX.', NULL, NULL, '2023-11-06 23:57:20', '305', 7758, 1, 'kazmi', NULL),
(3, 'Gloria', 'repyqikom@mailinator.com', NULL, '$2y$10$j9kBtfOgkUPBRn8na65fbe..hvB4sY2GqyMgJOOg7O8P2Xc30Oubu', NULL, '2023-10-12 18:58:24', '2023-11-13 18:52:52', '06572206606', NULL, NULL, 'Solomon', 'Hull Mcgowan Associates'),
(4, 'Aaron', 'gynupyhygo@mailinator.com', NULL, '$2y$10$Hqsgrgj8IvlJGY1yUs.WNutoRaZZIkZ/eboo2G6Gy7ODxFCzBHvqa', NULL, '2023-10-12 19:11:04', '2023-11-13 18:55:37', '03043719032', NULL, 1, 'Collins', 'Collins'),
(6, 'mani', 'man@gmail.com', NULL, '$2y$10$j9kBtfOgkUPBRn8na65fbe..hvB4sY2GqyMgJOOg7O8P2Xc30Oubu', NULL, NULL, '2023-11-07 03:10:43', '123', 464, 1, 'syed', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addtocarts`
--
ALTER TABLE `addtocarts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blances`
--
ALTER TABLE `blances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_members`
--
ALTER TABLE `event_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_payments`
--
ALTER TABLE `event_payments`
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
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_type_cate`
--
ALTER TABLE `org_type_cate`
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
-- Indexes for table `payment_information`
--
ALTER TABLE `payment_information`
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
-- Indexes for table `productsimges`
--
ALTER TABLE `productsimges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
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
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `addtocarts`
--
ALTER TABLE `addtocarts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `blances`
--
ALTER TABLE `blances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `event_members`
--
ALTER TABLE `event_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event_payments`
--
ALTER TABLE `event_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `org_type_cate`
--
ALTER TABLE `org_type_cate`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `payment_information`
--
ALTER TABLE `payment_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `productsimges`
--
ALTER TABLE `productsimges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

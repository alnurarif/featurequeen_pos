-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2019 at 03:28 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abdul_aziz_business`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Guccii', 1, '2019-04-23 14:04:25', '2019-11-30 13:18:49'),
(3, 'Fast Track', 0, '2019-04-23 14:31:01', '2019-04-24 06:46:01'),
(4, 'Nevia', 1, '2019-04-24 05:35:16', '2019-04-24 05:35:16'),
(5, 'Armani', 1, '2019-04-24 05:35:42', '2019-04-24 05:35:42'),
(6, 'Crocodile', 1, '2019-04-24 05:36:03', '2019-04-24 05:36:03'),
(7, 'Dove', 1, '2019-04-24 05:36:31', '2019-04-24 05:36:31'),
(8, 'Dettol', 1, '2019-04-24 05:37:01', '2019-04-24 05:37:01'),
(9, 'Enchanter', 1, '2019-04-24 05:37:34', '2019-04-24 05:37:34'),
(10, 'Ponds', 1, '2019-04-24 05:38:14', '2019-04-24 05:38:14'),
(11, 'Al Haramain', 1, '2019-04-24 05:39:00', '2019-04-24 05:39:00'),
(12, 'Olay', 1, '2019-04-24 07:32:32', '2019-04-24 07:32:32'),
(13, 'Head & Shoulder', 1, '2019-04-25 15:02:22', '2019-04-25 15:02:22'),
(14, 'Sunsilk', 1, '2019-04-25 15:02:32', '2019-04-25 15:02:32'),
(15, 'Loreal', 1, '2019-04-25 15:02:47', '2019-04-25 15:02:47'),
(16, 'Rado', 1, '2019-04-25 15:02:59', '2019-04-25 15:02:59'),
(17, 'Swiss Arabian', 1, '2019-04-25 15:05:18', '2019-04-25 15:05:18'),
(18, 'Crocodile', 1, '2019-04-25 15:06:01', '2019-04-25 15:06:01'),
(19, 'Stiga', 1, '2019-04-25 15:07:49', '2019-04-25 15:07:49'),
(20, 'Butter Fly', 1, '2019-04-25 15:08:03', '2019-04-25 15:08:03'),
(21, 'Double Fish', 1, '2019-04-25 15:08:18', '2019-04-25 15:08:18'),
(22, 'Huda beauty', 1, '2019-11-30 13:41:48', '2019-11-30 13:41:48'),
(23, 'kylie', 1, '2019-11-30 13:42:37', '2019-11-30 13:42:37');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Soap', 1, '2019-04-24 07:41:41', '2019-04-24 07:41:41'),
(2, 'Lipstick', 1, '2019-04-24 07:42:04', '2019-04-24 07:42:04'),
(3, 'Shampoo', 1, '2019-04-24 07:42:26', '2019-04-24 07:42:26'),
(4, 'Nail Polish', 1, '2019-04-24 07:42:54', '2019-04-24 07:42:54'),
(5, 'Hand Watch', 1, '2019-04-25 15:06:31', '2019-04-25 15:06:31'),
(6, 'Makeup Box', 1, '2019-04-25 15:07:07', '2019-04-25 15:07:07'),
(7, 'Table Tennis Bat', 1, '2019-04-25 15:07:22', '2019-04-25 15:07:22'),
(8, 'Table Tennis Ball', 1, '2019-04-25 15:07:33', '2019-04-25 15:07:33'),
(9, 'eyeshadow', 1, '2019-11-30 13:49:41', '2019-11-30 13:49:41'),
(10, 'mascara', 1, '2019-11-30 13:50:10', '2019-11-30 13:50:10');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` int(10) UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `added_by`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Maliha Akter', 'maliha@yahoo.com', '01849386854', 'Maliha\'s Address', 1, 1, '2019-04-25 09:46:06', '2019-04-25 09:46:06'),
(2, 'Sana Hayat', 'sana@yahoo.com', '01849384993', 'Sana\'s Addressss', 1, 1, '2019-04-25 10:03:56', '2019-04-25 10:03:56'),
(3, 'Sadia Fahad', 'sadia@yahoo.com', '01849389988', 'Sadia\'s Address', 1, 1, '2019-04-25 13:01:22', '2019-04-25 13:01:22'),
(4, 'Saidul Alam', 'saidul@yahoo.com', '01674839858', 'Saidul\'s Address', 1, 1, '2019-04-25 15:08:50', '2019-04-25 15:08:50'),
(5, 'Faridul Alam', 'faridul@yahoo.com', '01849689399', 'Farudul\'s Address', 1, 1, '2019-04-25 15:10:15', '2019-04-25 15:10:15');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_02_10_130237_create_customers_table', 1),
(4, '2019_02_10_131609_create_suppliers_table', 1),
(5, '2019_02_10_131824_create_brands_table', 1),
(6, '2019_02_10_132323_create_categories_table', 1),
(7, '2019_02_10_132448_create_products_table', 1),
(8, '2019_02_10_133254_create_product_purchases_table', 1),
(9, '2019_02_10_135118_create_product_purchase_details_table', 1),
(10, '2019_02_10_142141_create_sales_table', 1),
(11, '2019_02_10_145404_create_sale_details_table', 1),
(12, '2019_04_24_141103_drop_address_from_products', 2),
(13, '2019_04_24_141340_add_brand_category_id_to_products', 3),
(14, '2019_04_25_203103_drop_weight_from_products', 4),
(15, '2019_04_26_090234_add_purchase_date_to_product_purchases', 5),
(16, '2019_12_02_024633_edit_is_active_of_product_purchase_details', 6),
(17, '2019_12_02_165316_add_sale_date_to_sales', 7),
(18, '2019_12_02_170851_edit_is_active_of_sales', 8),
(19, '2019_12_02_172230_edit_sale_status_of_sales', 8),
(21, '2019_12_02_172939_add_description_to_sale_details', 9),
(22, '2019_12_03_023718_add_is_active_to_sale_details', 10),
(23, '2019_12_03_024026_edit_is_active_of_sales', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `added_by` int(10) UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `color`, `brand_id`, `category_id`, `added_by`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Dove 250g Milk Soap', 'Yellow', 7, 1, 1, 1, '2019-04-25 14:06:33', '2019-04-25 14:58:55'),
(2, 'Dove Shampoo 1 250g', 'White', 7, 3, 1, 1, '2019-04-25 14:50:43', '2019-04-25 14:59:18'),
(3, 'Stiga sping pro 400', 'Red And White', 19, 7, 1, 1, '2019-04-25 15:12:03', '2019-04-25 15:12:03'),
(4, 'dove ladies white', 'White', 7, 1, 1, 1, '2019-11-30 13:22:46', '2019-11-30 13:22:46'),
(5, 'desert dusk', 'Brown', 22, 9, 1, 1, '2019-11-30 13:54:09', '2019-11-30 13:54:09');

-- --------------------------------------------------------

--
-- Table structure for table `product_purchases`
--

CREATE TABLE `product_purchases` (
  `id` int(10) UNSIGNED NOT NULL,
  `bill_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_number` int(11) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `paid_amount` double(8,2) NOT NULL,
  `due_amount` double(8,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `added_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `purchase_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_purchases`
--

INSERT INTO `product_purchases` (`id`, `bill_no`, `product_number`, `amount`, `paid_amount`, `due_amount`, `description`, `supplier_id`, `added_by`, `created_at`, `updated_at`, `purchase_date`) VALUES
(1, '111', 2, 55.00, 55.00, 0.00, 'purchase desc 1', 1, 1, '2019-12-01 21:39:14', '2019-12-01 21:39:14', '2019-12-01'),
(2, '222', 2, 60.00, 60.00, 0.00, 'puchase desc 2', 2, 1, '2019-12-01 21:40:43', '2019-12-01 21:40:43', '2019-12-01');

-- --------------------------------------------------------

--
-- Table structure for table `product_purchase_details`
--

CREATE TABLE `product_purchase_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` double(8,2) NOT NULL,
  `total_price` double(8,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `purchase_id` int(10) UNSIGNED NOT NULL,
  `added_by` int(10) UNSIGNED NOT NULL,
  `is_active` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_purchase_details`
--

INSERT INTO `product_purchase_details` (`id`, `quantity`, `unit_price`, `total_price`, `description`, `product_id`, `supplier_id`, `purchase_id`, `added_by`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 11.00, 11.00, 'desc 1', 1, 1, 1, 1, '1', '2019-12-01 21:39:15', '2019-12-01 21:39:15'),
(2, 2, 22.00, 44.00, 'desc 2', 2, 1, 1, 1, '1', '2019-12-01 21:39:15', '2019-12-01 21:39:15'),
(3, 1, 12.00, 12.00, 'desc 1', 2, 2, 2, 1, '1', '2019-12-01 21:40:43', '2019-12-01 21:40:43'),
(4, 2, 24.00, 48.00, 'desc 2', 5, 2, 2, 1, '1', '2019-12-01 21:40:43', '2019-12-01 21:40:43');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(10) UNSIGNED NOT NULL,
  `sale_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_number` int(11) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `paid_amount` double(8,2) NOT NULL,
  `due_amount` double(8,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `added_by` int(10) UNSIGNED NOT NULL,
  `sale_status` tinyint(1) NOT NULL DEFAULT '1',
  `is_active` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sale_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `sale_no`, `product_number`, `amount`, `paid_amount`, `due_amount`, `description`, `customer_id`, `added_by`, `sale_status`, `is_active`, `created_at`, `updated_at`, `sale_date`) VALUES
(1, '111', 2, 55.00, 55.00, 0.00, 'desc sale', 1, 1, 1, '1', '2019-12-02 20:29:16', '2019-12-02 20:29:16', '2019-12-04');

-- --------------------------------------------------------

--
-- Table structure for table `sale_details`
--

CREATE TABLE `sale_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` double(8,2) NOT NULL,
  `total_price` double(8,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `sale_id` int(10) UNSIGNED NOT NULL,
  `added_by` int(10) UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `product_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` int(10) UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `email`, `phone`, `address`, `contact_person`, `added_by`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Karbari Traders', 'karbari@yahoo.com', '01849684938', 'Karbari\'s Address', 'Solemon Haider', 1, 1, '2019-04-25 13:09:57', '2019-04-25 13:11:27'),
(2, 'Muqtar & Brothers', 'muqtar@yahoo.com', '0174839485', 'muqtar@yahoo.com', 'Muqtar Chowdhury', 1, 1, '2019-04-25 13:12:20', '2019-04-25 13:12:20'),
(3, 'Best Sup Traders', 'best_sup@yahoo.com', '01849384968', 'Best Sup\'s Address', 'Sayedul Karim', 1, 1, '2019-04-25 15:11:19', '2019-04-25 15:11:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Abdul Aziz', 'abdul_aziz@yahoo.com', '123456', 'Admin', '2019-04-25 08:02:27', '2019-04-25 08:02:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`),
  ADD UNIQUE KEY `customers_phone_unique` (`phone`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_purchases`
--
ALTER TABLE `product_purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_purchase_details`
--
ALTER TABLE `product_purchase_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_details`
--
ALTER TABLE `sale_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `suppliers_email_unique` (`email`),
  ADD UNIQUE KEY `suppliers_phone_unique` (`phone`);

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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_purchases`
--
ALTER TABLE `product_purchases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_purchase_details`
--
ALTER TABLE `product_purchase_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sale_details`
--
ALTER TABLE `sale_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

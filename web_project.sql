-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2021 at 08:56 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_nopad_ci DEFAULT NULL,
  `action` varchar(150) COLLATE utf8mb4_unicode_nopad_ci DEFAULT NULL,
  `type` tinyint(3) DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_nopad_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_nopad_ci DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_nopad_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `action`, `type`, `avatar`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Laptop', 'laptop', NULL, NULL, 'Laptop', 1, NULL, NULL),
(2, 'Điện thoại', 'dienthoai', NULL, NULL, 'Điện thoại', 1, NULL, NULL),
(3, 'Ti Vi', 'tivi', NULL, NULL, 'Ti Vi', 1, NULL, NULL),
(5, 'Phụ Kiện', '', NULL, '', 'Phụ Kiện', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `image_products`
--

CREATE TABLE `image_products` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `url` varchar(150) COLLATE utf8mb4_unicode_nopad_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_nopad_ci;

--
-- Dumping data for table `image_products`
--

INSERT INTO `image_products` (`id`, `product_id`, `url`) VALUES
(1, 1, 'paimon.png'),
(2, 2, ''),
(3, 3, ''),
(4, 4, '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_nopad_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_nopad_ci DEFAULT NULL,
  `mobile` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_nopad_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_nopad_ci DEFAULT NULL,
  `price_total` int(11) DEFAULT NULL,
  `payment_status` tinyint(2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_nopad_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `fullname`, `address`, `mobile`, `email`, `note`, `price_total`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Mai Duc', 'Ha Noi, Viet Nam', 999999999, 'user@gmail.com', '', 11360000, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details1`
--

CREATE TABLE `order_details1` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_nopad_ci DEFAULT NULL,
  `product_price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_nopad_ci;

--
-- Dumping data for table `order_details1`
--

INSERT INTO `order_details1` (`id`, `order_id`, `product_name`, `product_price`, `quantity`) VALUES
(1, 1, 'hpzbook', 11000000, 1),
(2, 1, 'cáp type c', 120000, 3);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_nopad_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_nopad_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_nopad_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `summary` varchar(255) COLLATE utf8mb4_unicode_nopad_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_nopad_ci DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_nopad_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `title`, `slug`, `avatar`, `price`, `amount`, `summary`, `content`, `status`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, 'hpzbook', NULL, 'san-phamhpzbook', 11000000, 45, 'hpzbook', '<p>hpzbook</p>\r\n', 1, 0, NULL, NULL),
(2, 2, 'iphone 13', NULL, '', 33000000, 3, 'iphone 13', '<p>iphone 13</p>\r\n', 1, 0, NULL, NULL),
(3, 3, 'samsung tv 32inch', NULL, '', 54000000, 32, 'samsung tv 32inch', '<p>samsung tv 32inch</p>\r\n', 1, 1, NULL, NULL),
(4, 5, 'cáp type c', NULL, '', 120000, 999, 'cáp type c', '<p>c&aacute;p type c</p>\r\n', 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int(11) NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_nopad_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_nopad_ci DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_nopad_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_nopad_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_nopad_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_nopad_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_nopad_ci DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_nopad_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_nopad_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_nopad_ci DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL,
  `role_id` int(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_nopad_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `phone`, `address`, `email`, `avatar`, `status`, `role_id`, `created_at`, `updated_at`) VALUES
(1, '', '12345', 'Mai', 'Duc', 999999999, 'Ha Noi, Viet Nam', 'user@gmail.com', NULL, NULL, 0, NULL, NULL),
(2, 'admin', '12345', 'admin', 'admin', 99999999, 'HN', 'admin@gmail.com', NULL, NULL, 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_products`
--
ALTER TABLE `image_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details1`
--
ALTER TABLE `order_details1`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `image_products`
--
ALTER TABLE `image_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_details1`
--
ALTER TABLE `order_details1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

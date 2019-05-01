-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2019 at 07:38 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravelproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_phone`, `created_at`, `updated_at`) VALUES
(1, 'a', 'a', 'a', 'a', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `catid` int(11) NOT NULL,
  `catname` varchar(100) NOT NULL,
  `catdescription` varchar(200) NOT NULL,
  `catpublicationstatus` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`catid`, `catname`, `catdescription`, `catpublicationstatus`) VALUES
(1, 'Men', 'rr', 0),
(4, 'Women', '333', 1),
(5, 'Child', '3333', 1),
(6, 'Electronics', '444', 1),
(7, 'Others', '555', 0),
(8, 'Furniture', '665', 1),
(9, 'Sports', 'zdzdgsgagv', 1),
(10, 'Laptop', 'fgxbfbdbg', 1),
(11, 'Cloth', 'asfsaf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `manufactures`
--

CREATE TABLE `manufactures` (
  `manufacture_id` int(10) UNSIGNED NOT NULL,
  `manufacture_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacture_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manu_publicationstatus` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manufactures`
--

INSERT INTO `manufactures` (`manufacture_id`, `manufacture_name`, `manufacture_description`, `manu_publicationstatus`, `created_at`, `updated_at`) VALUES
(1, 'Nokia', '111111111111', 1, NULL, NULL),
(3, 'Apple', 'zdfsdfdsgsdg', 1, NULL, NULL),
(4, 'Samsung', 'ghrhfghgfh', 1, NULL, NULL),
(5, 'Hp', 'hdfhdfh', 1, NULL, NULL),
(6, 'ddd', 'dafwe', 1, NULL, NULL),
(7, 'ddd', 'dafwe', 1, NULL, NULL),
(8, 'Cloth', 'lsdjkghiosdhg', 1, NULL, NULL),
(9, 'wrwer', 'asfasf', 1, NULL, NULL);

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
(1, '2019_04_25_052818_create_admin_table', 1),
(2, '2019_04_25_161658_create_manufacture_table', 2),
(3, '2019_04_26_105441_create_sliders_table', 3),
(4, '2019_04_27_211527_create_reg_table', 4),
(5, '2019_04_27_225120_create_shippings_table', 5),
(6, '2019_04_27_230038_create_shipping_table', 6),
(7, '2019_04_28_191750_create_payments_table', 7),
(8, '2019_04_28_191839_create_orders_table', 7),
(9, '2019_04_28_191918_create_orders_details_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `ship_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `ship_id`, `payment_id`, `order_total`, `order_status`, `created_at`, `updated_at`) VALUES
(39, 22, 34, 72, '51,900.00', 1, '2019-04-30 11:37:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders_details`
--

CREATE TABLE `orders_details` (
  `order_details_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `productname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `product_sales_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_details`
--

INSERT INTO `orders_details` (`order_details_id`, `order_id`, `id`, `productname`, `price`, `product_sales_quantity`, `created_at`, `updated_at`) VALUES
(50, 39, 26, 'Shirt', 700, 2, NULL, NULL),
(51, 39, 30, 'HP-Laptop', 50000, 1, NULL, NULL),
(52, 39, 25, 'Pant', 500, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) UNSIGNED NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `payment_method`, `payment_status`, `created_at`, `updated_at`) VALUES
(72, 'handcash', 'pending', '2019-04-30 11:37:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `manufacture_id` int(11) NOT NULL,
  `productname` varchar(100) NOT NULL,
  `catid` int(11) NOT NULL,
  `price` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `shortdescription` varchar(200) NOT NULL,
  `longdescription` varchar(400) NOT NULL,
  `myfile` varchar(200) NOT NULL,
  `publicationstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `manufacture_id`, `productname`, `catid`, `price`, `quantity`, `shortdescription`, `longdescription`, `myfile`, `publicationstatus`) VALUES
(21, 1, 'Black Pant', 1, '2000', 5, 'Charming Black Pant', 'Charming Black Pant100% Cotton', 'upload/black.jpg', 0),
(23, 8, 'T-Shirt', 1, '500', 10, 'Ash Color T-Shirt', 'Good Looking Men Ash Color T-Shirt', 'upload/ashtshirt.jpg', 1),
(24, 8, 'Shirt', 1, '400', 2, 'Ash Color T-Shirt', 'Good Ash Color T-Shirt', 'upload/imagesjeanshalfshirt2.jpg', 1),
(25, 8, 'Pant', 1, '500', 7, 'Jeans Pant', 'Very stylish Jeans Pant', 'upload/jeans1.jpg', 1),
(26, 8, 'Shirt', 11, '700', 3, 'Half Shirt', 'Good', 'upload/fullsleeveshirt.jpg', 1),
(27, 8, 'Pant', 11, '500', 8, 'Ladies Pant', 'Ladies Pant', 'upload/jeans6.jpg', 1),
(28, 8, 'Shoe', 11, '5000', 2, 'Shoe', 'Shoe', 'upload/leathershoe.jpg', 1),
(29, 8, 'T-Shirt', 11, '400', 8, 'T-Shirt', 'T-Shirt', 'upload/blackfront.jpg', 1),
(30, 5, 'HP-Laptop', 10, '50000', 2, 'T-Shirt', 'T-Shirt', 'upload/HP1.jpg', 1),
(31, 3, 'Phone', 6, '50000', 1, 'asas', 'asas', 'upload/i.jpg', 1),
(32, 1, 'yyy', 1, '200', 2, 'yyy', 'yyy', 'upload/54519631_2101266049965697_5368925204099629056_n.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reg`
--

CREATE TABLE `reg` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reg`
--

INSERT INTO `reg` (`customer_id`, `name`, `password`, `email`, `type`, `created_at`, `updated_at`) VALUES
(1, 'a', 'a', 'a', '1', NULL, NULL),
(2, 'asif', '1111', 'asifmdhasan@gmail.com', '0', NULL, NULL),
(3, 'asif', '1111', 'asifmdhasan@gmail.com', '0', NULL, NULL),
(4, 'asif', '1111', 'asifmdhasan@gmail.com', '0', NULL, NULL),
(5, 'www', 'www', 'www@www.www', '0', NULL, NULL),
(6, 'ttt', 'ttt', 'ttt@sdfj.dgf', '0', NULL, NULL),
(7, 'er', 'er', 'er@er.er', '1', NULL, NULL),
(8, 'eeeee', 'eeeee', 'w@d.f', '0', NULL, NULL),
(9, 'b', 'b', 'b@b.b', '0', NULL, NULL),
(10, 'a', 'aaa', 'aa@a.a', '0', NULL, NULL),
(11, 'ww', 'ww', 'w@s.s', '0', NULL, NULL),
(12, 'eeeee', 'eeeeeeeeeee', 'ee@adf.asuif', '0', NULL, NULL),
(13, 'tttt', 'ttttt', 'tttt@uisdfg.sdzuofh', '0', NULL, NULL),
(14, '666', '66666', 'g6@ujg.tih', '0', NULL, NULL),
(15, 'rrrrr', 'rrrrr', 'rrrr@ggg.uyy', '0', NULL, NULL),
(16, 'eeeeee', 'eeeee', 'ee@yf.g', '0', NULL, NULL),
(17, 'YGFYUFYDF', 'UIFYUFYUDF', 'YIFYUF@YIHF.UYF', '0', NULL, NULL),
(18, 'rrrrrrrrrrrrr', 'rrrrrrrrrrrrrrrr', 'rr@xgdg.fg', '0', NULL, NULL),
(19, 'rty', 'rty', 'r@t.y', '0', NULL, NULL),
(20, 'rtyt', 'rtyt', 'rty@g.ht', '0', NULL, NULL),
(21, 'hh', 'hh', 'hh@gyg.igh', '0', NULL, NULL),
(22, 'yyyy', 'yyyy', 'yyy@ih.lwidhf', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `ship_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`ship_id`, `email`, `first_name`, `last_name`, `address`, `phone`, `city`, `created_at`, `updated_at`) VALUES
(34, 'dbioihkh', 'giugoug', 'uguog', 'ouguogoi', 'uogoug', 'ugoug', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `slider_id` int(10) UNSIGNED NOT NULL,
  `slider_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_publication` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`slider_id`, `slider_image`, `slider_publication`, `created_at`, `updated_at`) VALUES
(1, 'slider/55778993_2353452171645156_5462416798068506624_n.jpg', '0', '2019-04-26 05:41:44', '2019-04-26 05:41:44'),
(2, 'slider/DN1562_50133_2000x.jpg', '0', '2019-04-26 05:49:32', '2019-04-26 05:49:32'),
(3, 'slider/000000445701-natalie_morris-squaremedium.jpg', '0', '2019-04-26 05:51:16', '2019-04-26 05:51:16'),
(4, 'slider/e2.jpg', '1', '2019-04-26 06:53:59', '2019-04-26 06:53:59'),
(5, 'slider/e4.jpg', '0', '2019-04-26 06:54:21', '2019-04-26 06:54:21'),
(6, 'slider/e5.jpg', '1', '2019-04-26 06:55:01', '2019-04-26 06:55:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `manufactures`
--
ALTER TABLE `manufactures`
  ADD PRIMARY KEY (`manufacture_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `orders_details`
--
ALTER TABLE `orders_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reg`
--
ALTER TABLE `reg`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`ship_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `manufactures`
--
ALTER TABLE `manufactures`
  MODIFY `manufacture_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `orders_details`
--
ALTER TABLE `orders_details`
  MODIFY `order_details_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `reg`
--
ALTER TABLE `reg`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `ship_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `slider_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2021 at 06:10 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `verified` varchar(255) NOT NULL,
  `iv` varchar(230) DEFAULT NULL,
  `added_on` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `email`, `mobile`, `role`, `status`, `verified`, `iv`, `added_on`) VALUES
(35, 'admin', '$2y$10$2ayo1eigghXWIzZ/1YswxuDdocgc1pZ67Fzw1qyPQ0CevUN/95RsC', 'admin@gmail.com', '03323565867', '0', '1', '0', NULL, '2021-10-05 20:21:12'),
(42, 'Ali Ahmed', '$2y$10$dgUAm/K/CsUuujSy.Qwp7OhfsasVgAylyJ5V2ASqYgvAlmZa6BI5O', 'ali@gmail.com', '03323565867', '1', '1', '1', NULL, '2021-10-25 19:46:39'),
(43, 'adil khan', '$2y$10$mIsJtuv/3oSoB19xmekIdOzNeRGGHYKrd7l6WBbc.lBK.q8abMZIG', 'adil@gmail.com', '03323565866', '2', '1', '1', NULL, '2021-10-25 19:46:45');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `brands_name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `added_on` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `iv` varchar(230) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brands_name`, `status`, `image`, `added_on`, `iv`) VALUES
(9, 'gul ahmed', '0', '1633970018.png', '2021-10-11 21:33:46', NULL),
(10, 'J.', '1', '1634831686.jpg', '2021-10-21 20:54:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `customer_id` int(255) NOT NULL,
  `attr_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `customer_type` enum('reg','non-reg') DEFAULT NULL,
  `added_on` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categories_name` varchar(255) NOT NULL,
  `parent_id` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `added_on` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `iv` varchar(230) DEFAULT NULL,
  `show_cate` int(119) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories_name`, `parent_id`, `image`, `status`, `added_on`, `iv`, `show_cate`) VALUES
(10, 'Men', '0', '1633969001.jpg', '1', '2021-10-11 21:16:41', NULL, 1),
(12, 'WomenClothes', '0', '1634747405.jpg', '1', '2021-10-20 21:47:56', NULL, 0),
(13, 'WomenClothe', '0', '1635692959.jpg', '1', '2021-10-31 20:09:19', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `color_name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `added_on` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `iv` varchar(230) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `color_name`, `status`, `added_on`, `iv`) VALUES
(3, 'Green', '0', '2021-10-11 22:50:15', NULL),
(4, 'Red', '1', '2021-10-21 20:57:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `coupon_type` enum('fixed','percentage') DEFAULT NULL,
  `coupon_sub_type` enum('order','product') DEFAULT NULL,
  `coupon_amount` varchar(255) DEFAULT NULL,
  `added_on` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `limit` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `max_discount` varchar(119) NOT NULL,
  `cart_min_value` varchar(119) DEFAULT NULL,
  `expiry_date` varchar(119) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_code`, `coupon_type`, `coupon_sub_type`, `coupon_amount`, `added_on`, `limit`, `status`, `max_discount`, `cart_min_value`, `expiry_date`) VALUES
(7, 'HALF40', 'fixed', 'order', '450', '2021-10-24 16:13:56', '3', '0', '500', '100', '1-Dec-2021'),
(10, 'SATURDAY', 'percentage', 'order', '45', '2021-10-31 20:42:39', '300', '1', '2000', '1000', '13-Nov-2021'),
(11, 'OFF500', 'fixed', 'product', '450', '2021-10-28 21:25:18', '300', '1', '2000', '1000', '06-Nov-2021'),
(12, 'SATURDAY500', 'percentage', 'product', '35', '2021-10-31 21:19:26', '1', '1', '400', '1000', '04-Dec-2021');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verified` varchar(255) NOT NULL,
  `block` varchar(255) NOT NULL,
  `fail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `id` int(11) NOT NULL,
  `customer_id` int(255) NOT NULL,
  `attr_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `orderdate` varchar(255) NOT NULL,
  `ordermonth` varchar(255) NOT NULL,
  `order_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(255) NOT NULL,
  `totalprice` varchar(255) NOT NULL,
  `finalprice` varchar(255) NOT NULL,
  `gst` varchar(255) NOT NULL,
  `added_on` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `totalitem` varchar(255) NOT NULL,
  `order_status` int(255) NOT NULL,
  `paymentdate` varchar(255) NOT NULL,
  `paymentmethod` int(255) NOT NULL,
  `orderdate` varchar(255) NOT NULL,
  `ordermonth` varchar(255) NOT NULL,
  `paymentstatus` enum('0','1') DEFAULT NULL,
  `iv` varchar(230) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `order_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `brand_id` int(255) NOT NULL,
  `categories_id` int(255) NOT NULL,
  `admin_id` int(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `shortdesc` varchar(255) NOT NULL,
  `added_on` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `brand_id`, `categories_id`, `admin_id`, `status`, `image`, `desc`, `keyword`, `shortdesc`, `added_on`) VALUES
(19, 'Gul Ahmed Stitched Shirt', 9, 10, 35, '1', '1635693689.jpg', 'gul ahmed', 'ahmed', 'gul ahmed', '2021-11-01 22:01:26');

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` int(11) NOT NULL,
  `color_id` int(255) NOT NULL,
  `size_id` int(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `attribute` varchar(255) DEFAULT NULL,
  `product_id` int(255) DEFAULT NULL,
  `tax_id` int(255) NOT NULL,
  `coupon_id` varchar(244) NOT NULL,
  `qty` varchar(119) DEFAULT NULL,
  `status` varchar(119) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `color_id`, `size_id`, `price`, `attribute`, `product_id`, `tax_id`, `coupon_id`, `qty`, `status`) VALUES
(8, 4, 1, '4756', 'Large', 19, 3, '12', '1', '0'),
(21, 3, 4, '27124', 'Small', 19, 3, '11', '20', '0');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `delivery_charge` varchar(100) NOT NULL,
  `cart_min_amount` int(100) NOT NULL,
  `delivery_time` int(100) NOT NULL,
  `web_status` varchar(119) DEFAULT NULL,
  `min_item` int(100) NOT NULL,
  `referral_amount` varchar(119) DEFAULT NULL,
  `welcome_amount` varchar(119) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `delivery_charge`, `cart_min_amount`, `delivery_time`, `web_status`, `min_item`, `referral_amount`, `welcome_amount`) VALUES
(1, '50', 1200, 90, NULL, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(11) NOT NULL,
  `size_name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `added_on` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size_name`, `status`, `added_on`) VALUES
(1, 'Large', '0', '2021-10-11 22:52:37'),
(4, 'Small', '1', '2021-10-12 19:59:13');

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` int(11) NOT NULL,
  `tax_desc` varchar(255) DEFAULT NULL,
  `tax_value` varchar(255) DEFAULT NULL,
  `iv` varchar(230) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `tax_desc`, `tax_value`, `iv`, `status`) VALUES
(3, 'GST13', '13', NULL, '1'),
(6, 'CST18', '18', NULL, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `attr_id` (`attr_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `attr_id` (`attr_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `paymentmethod` (`paymentmethod`),
  ADD KEY `order_status` (`order_status`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `categories_id` (`categories_id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_attributes_ibfk_1` (`color_id`),
  ADD KEY `product_attributes_ibfk_2` (`size_id`),
  ADD KEY `product_attributes_ibfk_3` (`product_id`),
  ADD KEY `product_attributes_ibfk_4` (`tax_id`),
  ADD KEY `product_attributes_ibfk_5` (`coupon_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`attr_id`) REFERENCES `product_attributes` (`id`);

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `orderdetail_ibfk_3` FOREIGN KEY (`attr_id`) REFERENCES `product_attributes` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`paymentmethod`) REFERENCES `payment` (`id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`order_status`) REFERENCES `order_status` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2020 at 08:12 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(11) NOT NULL,
  `categories_name` varchar(255) NOT NULL,
  `categories_active` int(11) NOT NULL DEFAULT '0',
  `categories_status` int(11) NOT NULL DEFAULT '0',
  `createDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_name`, `categories_active`, `categories_status`, `createDate`, `updateDate`) VALUES
(1, 'Floury', 1, 1, '2020-02-27 14:49:52', '2020-02-27 16:36:16'),
(2, 'Soko Maize Flour', 1, 2, '2020-02-27 14:49:52', '0000-00-00 00:00:00'),
(3, 'Sugars', 1, 1, '2020-02-27 14:49:52', '2020-02-28 06:17:20'),
(4, 'Samaria Sugarr', 1, 2, '2020-02-27 14:49:52', '0000-00-00 00:00:00'),
(5, 'toa', 1, 2, '2020-02-27 14:49:52', '0000-00-00 00:00:00'),
(6, 'toa', 2, 2, '2020-02-27 14:49:52', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `customorders`
--

CREATE TABLE `customorders` (
  `order_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT '0',
  `pay_type` int(11) NOT NULL DEFAULT '0',
  `custom_status` int(255) NOT NULL,
  `createDate` date NOT NULL,
  `updateDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customorders`
--

INSERT INTO `customorders` (`order_id`, `product_name`, `quantity`, `amount`, `pay_type`, `custom_status`, `createDate`, `updateDate`) VALUES
(1, '1', '75', 600, 1, 1, '2020-02-27', '2020-02-28 13:49:42'),
(2, '1', '45', 45, 1, 1, '2020-02-28', '0000-00-00 00:00:00'),
(3, '2', '45', 60, 1, 1, '0000-00-00', '0000-00-00 00:00:00'),
(4, '1', '30lt', 39, 1, 1, '2020-02-29', '0000-00-00 00:00:00'),
(5, '2', 'test', 309, 1, 1, '2020-02-29', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_contact` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `grand_total` varchar(255) NOT NULL,
  `paid` varchar(255) NOT NULL,
  `due` varchar(255) NOT NULL,
  `payment_type` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT '0',
  `updateDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `client_name`, `client_contact`, `total_amount`, `discount`, `grand_total`, `paid`, `due`, `payment_type`, `payment_status`, `order_status`, `updateDate`) VALUES
(1, '2020-02-21', 'kiki', '0718635418', '1565.00', '0', '1565.00', '1565', '0.00', 1, 1, 1, '2020-02-27 15:24:24'),
(2, '2020-02-21', 'customer', '0712345678', '650.00', '0', '650.00', '640', '10', 1, 2, 1, '2020-02-27 16:37:21'),
(3, '2020-02-21', 'walter', '07182992873', '1250.00', '0', '1250.00', '1250', '0.00', 1, 1, 1, '2020-02-27 15:24:24'),
(4, '2020-02-21', 'customer', '0712345678', '117.00', '0', '117.00', '1000', '-883.00', 1, 1, 1, '2020-02-27 15:24:24'),
(5, '2020-02-21', 'customer', '0712345678', '105.00', '0', '105.00', '200', '-95.00', 1, 1, 1, '2020-02-27 15:24:24'),
(6, '2020-02-21', 'customer', '0712345678', '520.00', '0', '520.00', '520', '0.00', 1, 1, 1, '2020-02-27 15:24:24'),
(7, '2020-02-27', 'customer', '0712345678', '56.00', '0', '56.00', '56', '0', 1, 1, 1, '2020-02-27 16:26:14'),
(8, '2020-02-28', 'customer', '0712345678', '65.00', '10', '120.00', '120', '0', 1, 1, 1, '2020-02-28 10:59:39'),
(9, '2020-02-28', 'customer', '0712345678', '105.00', '10', '120.00', '120', '0', 1, 1, 1, '2020-02-28 17:36:23'),
(10, '2020-02-29', 'customer', '0712345678', '105.00', '0', '105.00', '105', '0', 1, 1, 1, '2020-02-29 08:26:26');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `categories_id` int(255) NOT NULL,
  `product_id` int(11) NOT NULL DEFAULT '0',
  `quantity` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `order_item_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`order_item_id`, `order_id`, `categories_id`, `product_id`, `quantity`, `rate`, `total`, `order_item_status`) VALUES
(1, 1, 3, 2, '5', '105', '525.00', 1),
(2, 1, 1, 1, '3', '130', '390.00', 1),
(3, 1, 1, 3, '10', '65', '650.00', 1),
(5, 3, 3, 6, '20', '56', '1120.00', 1),
(6, 3, 1, 1, '1', '130', '130.00', 1),
(7, 4, 1, 4, '1', '117', '117.00', 1),
(8, 5, 3, 2, '1', '105', '105.00', 1),
(18, 6, 0, 1, '1', '130', '130.00', 1),
(23, 2, 0, 1, '1', '130', '130.00', 1),
(25, 7, 0, 3, '1', '65', '65.00', 1),
(31, 8, 0, 1, '1', '130', '130.00', 1),
(33, 9, 0, 1, '1', '130', '130.00', 1),
(35, 10, 0, 2, '1', '105', '105.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `originalPrice` int(11) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `createDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `categories_id`, `product_name`, `quantity`, `originalPrice`, `rate`, `active`, `status`, `createDate`, `updateDate`) VALUES
(1, 1, 'Pembe 2kg', '34', 0, '130', 1, 1, '2020-02-27 15:25:31', '2020-02-27 15:24:55'),
(2, 3, 'Samaria 1kg', '193', 0, '105', 1, 1, '2020-02-27 15:25:31', '2020-02-27 15:24:55'),
(3, 1, 'Pembe 1KG', '39', 0, '65', 1, 1, '2020-02-27 15:25:31', '2020-02-27 15:56:52'),
(4, 1, 'Soko 2Kg', '78', 0, '117', 1, 1, '2020-02-27 15:25:31', '2020-02-27 15:24:55'),
(5, 1, 'Soko 1kg', '31', 30, '756', 1, 1, '2020-02-27 15:25:31', '2020-02-28 09:15:30'),
(6, 3, 'Samaria 1/2kg', '19', 0, '56', 1, 1, '2020-02-27 15:25:31', '2020-02-28 07:05:19'),
(7, 1, 'dsffafvdsads', '15', 0, '56', 2, 2, '2020-02-27 15:25:31', '2020-02-27 15:24:55'),
(8, 3, 'Sony 1/2kg ', '150', 41, '60', 1, 1, '2020-02-28 08:03:26', '2020-02-28 09:15:08');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `stock_date` date NOT NULL,
  `active` int(11) DEFAULT '0',
  `createDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `product_name`, `quantity`, `price`, `stock_date`, `active`, `createDate`, `updateDate`) VALUES
(1, 'hhcvsajgycas', 25, 56676, '2020-02-24', 1, '2020-02-27 15:26:35', '2020-02-27 15:25:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `active`, `createDate`, `updateDate`) VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', '', 1, '2020-02-27 15:27:02', '2020-02-27 15:27:21'),
(2, 'Test', '827ccb0eea8a706c4c34a16891f84e7b', 'test@gmail.com', 1, '2020-02-27 15:27:02', '2020-02-27 15:27:21'),
(3, 'a', 'asa', 'asa', 2, '2020-02-27 15:27:02', '2020-02-27 15:27:21'),
(4, 'alfred', '2', 'alfred@gmail', 1, '2020-02-27 15:27:02', '2020-02-27 15:27:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Indexes for table `customorders`
--
ALTER TABLE `customorders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`order_item_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customorders`
--
ALTER TABLE `customorders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

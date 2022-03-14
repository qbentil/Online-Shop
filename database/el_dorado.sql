-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2020 at 09:39 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `el_dorado`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `ip_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `pro_id`, `qty`, `ip_address`) VALUES
(43, 8, 3, '::1'),
(45, 2, 1, '::1'),
(46, 6, 1, '::1'),
(47, 5, 1, '::1'),
(49, 4, 1, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `main_cat`
--

CREATE TABLE `main_cat` (
  `cat_id` int(11) NOT NULL,
  `category_name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_cat`
--

INSERT INTO `main_cat` (`cat_id`, `category_name`) VALUES
(1, 'Electronics'),
(18, 'Computers'),
(19, 'Clothings'),
(20, 'Motors'),
(21, 'Crokery'),
(22, 'Photoframes'),
(24, 'Education'),
(25, 'Cars'),
(26, 'Gadgets');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pro_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `subcat_id` int(11) NOT NULL,
  `img1` varchar(225) NOT NULL,
  `img2` varchar(225) NOT NULL,
  `img3` varchar(225) DEFAULT NULL,
  `img4` varchar(225) DEFAULT NULL,
  `feature1` varchar(100) NOT NULL,
  `feature2` varchar(100) NOT NULL,
  `feature3` varchar(100) DEFAULT NULL,
  `feature4` varchar(100) DEFAULT NULL,
  `price` decimal(13,2) NOT NULL,
  `pro_model` varchar(100) NOT NULL,
  `warranty` varchar(100) NOT NULL,
  `for_whom` varchar(100) NOT NULL,
  `keyword` varchar(100) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pro_id`, `product_name`, `cat_id`, `subcat_id`, `img1`, `img2`, `img3`, `img4`, `feature1`, `feature2`, `feature3`, `feature4`, `price`, `pro_model`, `warranty`, `for_whom`, `keyword`, `date_added`) VALUES
(2, 'Hisense Blender', 1, 11, 'h_blender1.jpg', 'h_blender2.jpg', 'h_blender4.jpg', ' h_blender3.jpg', 'Glass and Plastic', 'Consumes low current', 'High Durability', 'Portable', '79.99', 'AD7G408p', '        1 Year', 'All', '        Electronics, blender, hisense', '2020-02-29 01:47:25'),
(4, 'SamsungA70', 18, 10, 'phone2.jpg', 'phone3.jpg', 'phone4.jpg', ' image_1582887035388.png', '6.7 Inches', 'Qualcomm Snappdragon 675 octa core Proccessor', '4500 mAh battery with fast charging', 'DUal SIm Nano + Nano', '1050.00', '  FGH9980IC', '   3 Years', 'All', '   Phone, A70, samsung)', '2020-03-03 09:25:27'),
(5, 'Vintage Casio ', 26, 13, 'casio1.jpg', 'casio3.jpg', 'casio2.jpg', ' casio4.jpg', 'G-shock GB6900', 'Illuminator.Low-temperature resistant (-10 C)', 'High Durability', 'Stopwatch function - 1100 sec.- 24 hours.Timer - 11 sec.- 24 hours.5 daily alarms', '385.99', '  Casio SGW-450H', '  1 Year', 'Men', '  watch casio gadget)', '2020-12-04 12:22:02'),
(6, '7th Gen Intel Core i5', 18, 3, 'image_1582886973800.jpg', 'hp4.jpg', 'hp2.jpg', ' hp1.jpg', 'Processor base Frequency  -3.80GHz', 'Max Memory Size  -64GB', 'Processor Graphic -Intel HD Graphics 630', 'Max Resolution 4096X2304@60HZ', '2800.99', ' 14-cf1015cl', ' 2 Years', 'All', ' Laptop hp, intel core i5, computers)', '2020-02-29 04:40:04'),
(7, 'Samsung Smart Refrigerator', 1, 11, 'image_1582887013219.png', 'image_1582886812306.png', 'image_1582886798357.jpg', ' image_1582887013219.png', '3-Door French Door', 'High Efficiency LED lighting', 'Stainless Steel', 'Power Saving ', '3500.95', ' RF23M8070', ' 4 Years', 'All', ' Fridge Sumsong, home appliamce)', '2020-02-29 05:32:13'),
(8, 'Home Theatres', 1, 11, 'image_1582886945734.png', 'image_1582886819968.jpg', 'image_1582886993757.jpg', ' image_1582886952902.jpg', 'sHDaksf', 'fcdzvsfbf', 'afsdgsfghsfbb', 'safzsfz', '5500.99', ' sdgfbAdfsg', ' 3 Years', 'All', ' Home theatre)', '2020-02-29 05:34:58'),
(9, 'Ceramic Tea Cup', 21, 8, 'cup2.jpg', 'cup3.jpg', 'cups1.jpg', ' cup5.jpg', 'Ceramic', ' High Durability', 'Easy to Manage ', 'Portable', '500.55', ' ADG45yb', ' 1 Year', 'Women', ' cups, ceramic, crockery, mugs)', '2020-02-29 06:00:57'),
(10, 'Lacoste T-Shirt', 19, 14, 'la_shirt2.jpg', 'la_shirt3.jpg', 'la_shirt4.jpg', ' la_shirt1.jpg', 'Short Sleeves', 'Size -Medium', 'Color -White And Blue', 'Expandable', '49.99', '     AS3344FG', '       None', 'Men', '       lacoste, t-shirt, clothing', '2020-05-15 10:54:51'),
(12, 'Air Force', 19, 14, 'image_1582887212767.jpg', 'image_1582887180457.jpeg', 'image_1582887187858.jpg', ' image_1582887204817.jpg', 'Sizes Medium and Large', 'Colors Black and White', '2020 New Releease', 'Hot Kick', '65.99', '   Afg76Kl', '   5 Months', 'Men', '   shoe, sneakers, air force', '2020-03-01 03:43:33'),
(14, 'Gas BUrner', 1, 11, 'image_1582886999523.jpg', 'image_1582886819968.jpg', 'image_1582886790199.jpg', ' image_1582886798357.jpg', 'qwertyui', 'WAERDFGHUJ', 'SDFGHJd', 'sadfghjk', '500.00', ' qwerty123sd', ' 1 year', 'Women', ' wash machine', '2020-04-01 03:10:11');

-- --------------------------------------------------------

--
-- Table structure for table `sub_cat`
--

CREATE TABLE `sub_cat` (
  `subcat_id` int(11) NOT NULL,
  `subcat_name` varchar(225) NOT NULL,
  `maincat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_cat`
--

INSERT INTO `sub_cat` (`subcat_id`, `subcat_name`, `maincat_id`) VALUES
(1, 'Emergency Light', 1),
(2, 'LED Bulbs', 1),
(3, 'Laptop', 18),
(4, 'Toyota', 20),
(5, 'Desktops', 18),
(8, 'Tea Mugs', 21),
(10, 'Phones', 18),
(11, 'Home Appliances', 1),
(12, 'Story Books', 24),
(13, 'Watches', 26),
(14, 'Gents', 19),
(15, 'Footware', 19);

-- --------------------------------------------------------

--
-- Table structure for table `super_admin`
--

CREATE TABLE `super_admin` (
  `super_id` int(11) NOT NULL,
  `super_name` varchar(225) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(150) NOT NULL,
  `address` text NOT NULL,
  `gender` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `city` varchar(100) NOT NULL,
  `user_img` varchar(225) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(225) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `city`, `user_img`, `address`, `dob`, `phone`, `password`, `reg_date`) VALUES
(1, 'Bentil', 'Bentilshadrack72@gmail.com', 'Accra', NULL, 'Pokuase', '2001-03-06', '0556844331', '31b466c8183b39ed0a2fd052bcdff6cbbabcf93e', '2020-03-03 00:05:39'),
(4, 'Quadjo Bentil', 'oseishadrack84@gmail.com', 'Accra', NULL, 'Pokuase, Street01', '2001-11-22', '0556844331', '89ba22d174b958ac3bce7592ad14c3060bebf3ca', '2020-03-03 01:40:10'),
(6, 'Mann Richard', 'Mannrichard6266@gmail.com', 'Accra', NULL, 'Dansoman', '1999-02-14', '0501254684', 'a1b4667fe685b35ebdad45a6720b3de82f273fb3', '2020-03-03 01:47:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `main_cat`
--
ALTER TABLE `main_cat`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `pro_cat` (`cat_id`),
  ADD KEY `pro_subcat` (`subcat_id`);

--
-- Indexes for table `sub_cat`
--
ALTER TABLE `sub_cat`
  ADD PRIMARY KEY (`subcat_id`),
  ADD KEY `main_cat_fk` (`maincat_id`);

--
-- Indexes for table `super_admin`
--
ALTER TABLE `super_admin`
  ADD PRIMARY KEY (`super_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `main_cat`
--
ALTER TABLE `main_cat`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sub_cat`
--
ALTER TABLE `sub_cat`
  MODIFY `subcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `super_admin`
--
ALTER TABLE `super_admin`
  MODIFY `super_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

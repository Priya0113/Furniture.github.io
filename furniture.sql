-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2023 at 07:56 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furniture`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tabel`
--

CREATE TABLE `admin_tabel` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_tabel`
--

INSERT INTO `admin_tabel` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Admin123', 'admin123@gmail.com', '$2y$10$PGMjbNkdPu8Ptmr6NJ65qexgoY7lemebXANI6zfzblPTnNfWnlIwm');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `productID` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryID` int(50) NOT NULL,
  `Name` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `Name`) VALUES
(2, 'Luxury'),
(3, 'Royal Region'),
(4, 'Wooden Art'),
(5, 'Customisable'),
(9, 'Asthetic');

-- --------------------------------------------------------

--
-- Table structure for table `order_pending`
--

CREATE TABLE `order_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `productID` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_pending`
--

INSERT INTO `order_pending` (`order_id`, `user_id`, `invoice_number`, `productID`, `quantity`, `order_status`) VALUES
(10, 8, 885710786, 1, 1, 'pending'),
(11, 8, 1536073343, 6, 1, 'pending'),
(12, 8, 1950545465, 3, 1, 'pending'),
(13, 8, 1485436209, 8, 1, 'pending'),
(14, 8, 185279894, 6, 1, 'pending'),
(15, 8, 205973654, 7, 1, 'pending'),
(16, 8, 910166537, 4, 2, 'pending'),
(17, 8, 2128113775, 3, 2, 'pending'),
(18, 8, 143317828, 9, 1, 'pending'),
(19, 8, 955003852, 9, 1, 'pending'),
(20, 8, 139918721, 9, 1, 'pending'),
(21, 8, 3915752, 5, 1, 'pending'),
(22, 8, 842932940, 7, 1, 'pending'),
(23, 8, 215265527, 8, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(100) NOT NULL,
  `product_title` longtext NOT NULL,
  `product_description` longtext NOT NULL,
  `product_keyword` varchar(255) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `product_title`, `product_description`, `product_keyword`, `categoryID`, `type_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`) VALUES
(1, 'balcony', 'space outside', 'balcony,terrace,garden,outside', 5, 13, 'balcony.jpg', 'beer-garden.jpg', 'chair-1.jpg', '500', '2023-03-16 19:45:10', 'true'),
(3, 'wooden bed', 'wooden is best', 'wood,bed,royal', 4, 7, 'bedroom-2.jpg', 'childreroom.jpg', 'livingroom-2.jpg', '500', '2023-03-17 06:04:58', 'true'),
(4, 'BedRoom ', 'Sleep with comfort to wake up in fresh', 'Bed,bedroom,bedroom furniture,comfort,beds', 2, 7, 'bedroom-1.jpg', 'bedroom-2.jpg', 'wooden.jpg', '5000', '2023-03-17 11:37:42', 'true'),
(5, 'Bathroom', 'Spend some time with yourself', 'Bathroom furniture,bathroom,shower,asthetic,bath,toilet', 1, 11, 'bathroom-1.jpg', 'bathroom-2.jpg', 'rocking-1587795_1920.jpg', '2000', '2023-03-17 11:42:17', 'true'),
(6, 'Living Room', 'Explore more for you and your loved ones', 'livingroom,fun,main hall,hall,living room furniture', 1, 11, 'livingroom-1.jpg', 'livingroom-3.jpg', 'livingroom-4.jpg', '2000', '2023-03-17 11:46:22', 'true'),
(7, 'Chairs123', 'Be different make your own style,best', 'chairs,sit,furniture,best', 1, 10, 'couch-447484_1920.jpg', 'armchair-2608301_1920.jpg', 'chairs-2.jpg', '10000', '2023-04-04 19:22:11', 'true'),
(8, 'inetrior beds', 'comfotable and cozy way of living', 'bed,interior,cozy,omfot,comfortable', 1, 7, 'bedroom-3778695_1920.jpg', 'bedroom-1940169_1920.jpg', 'bedroom-5775574_1920.png', '30000', '2023-03-25 05:36:28', 'true'),
(9, 'chairs', 'Relax yourself with a heavenly feel', 'chair,sitting,sit,comfortable,relax', 9, 9, 'armchair-2608301_1920.jpg', 'chair-1.jpg', 'chair-6902583_1920.png', '1500', '2023-04-07 13:44:29', 'true'),
(10, 'out door chairs', 'feel the fresh air,live longer', 'fresh,outdoor,chairs,garden,furniture', 3, 10, 'garden-1.jpg', 'beer-garden.jpg', 'cafe-5635015_1920.jpg', '20000', '2023-04-07 16:13:41', 'true'),
(11, 'royal furniture', 'Live like a King', 'king,furniture,bed,royal,royalty,queen,elizabeth', 3, 11, 'victorian-940933_1920.jpg', 'royal-interior.jpg', 'antique-furniture-948524_1920.png', '50000', '2023-04-07 16:39:18', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(50) NOT NULL,
  `type_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `type_name`) VALUES
(8, 'Tables'),
(9, 'Chairs'),
(10, 'Sofa Sets'),
(11, 'Interior Warmth');

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_order`
--

INSERT INTO `user_order` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(16, 8, 30000, 1485436209, 3, '2023-04-06 17:05:54', 'Complete'),
(19, 8, 11000, 910166537, 2, '2023-04-06 14:59:44', 'Complete'),
(23, 8, 1500, 139918721, 1, '2023-04-07 16:10:03', 'Complete'),
(24, 8, 2000, 3915752, 1, '2023-04-07 16:36:09', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_payments`
--

INSERT INTO `user_payments` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `date`) VALUES
(13, 16, 1485436209, 30000, 'UPI', '2023-04-06 10:17:52'),
(16, 16, 1485436209, 30000, 'Cash On Delivery', '2023-04-06 14:36:37'),
(17, 19, 910166537, 11000, 'UPI', '2023-04-06 14:59:44'),
(19, 22, 955003852, 1500, 'Debit Card', '2023-04-07 13:51:29'),
(20, 16, 1485436209, 30000, 'Debit Card', '2023-04-07 14:03:02'),
(21, 23, 139918721, 1500, 'UPI', '2023-04-07 16:10:03'),
(22, 24, 3915752, 2000, 'Cash On Delivery', '2023-04-07 16:36:09');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(8, 'desk', 'desk@gmail.com', '$2y$10$R88iPPojjm9jbAi6oDxf0eIL7/UCeYZ9SnKoykSrsyVbKoIf5N5di', 'armchair-2608301_1920.jpg', '::1', 'Banglore', 1234567890);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tabel`
--
ALTER TABLE `admin_tabel`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `order_pending`
--
ALTER TABLE `order_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tabel`
--
ALTER TABLE `admin_tabel`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_pending`
--
ALTER TABLE `order_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_order`
--
ALTER TABLE `user_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

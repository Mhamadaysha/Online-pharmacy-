-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2024 at 05:30 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(9, '', '', '$2y$10$bTSimzYkG55oPV3syuU6x.zd51bkRL0G6RAYv/N9Zr88meoINxc9.'),
(10, '', '', '$2y$10$EsLHQ3/itELUOCsvM34.Z./fDFhKdVO0s3PjygmORFD0TxfHhqZZ2'),
(11, 'mohamad', '', '$2y$10$5djHl36pLm51CcW8JNNrZOUZ3N44rtDys.bbTxtKdumkFJMjWRYji'),
(12, 'omar', '', '$2y$10$/7kou6kxAu8vYq9VWHZ0dOcbz165klenfJF7v0uzBXRvbHmSMyiNy'),
(13, 'mohamad', '', '$2y$10$EB4nb4Ofto/ySWJQeag2eO2RejCLm3kjCnp5ESqFSs2HJ2H46NQ8C');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(2, 'Panadol extra'),
(3, 'Augmentin '),
(4, 'Otrivin '),
(5, 'Panadol '),
(6, 'Azifast'),
(7, 'Adol');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`product_id`, `ip_address`, `quantity`) VALUES
(3, '::1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(70, 'Infections'),
(72, 'painkillers'),
(73, 'Nerve medicine'),
(74, 'Arthritis'),
(75, 'stomach '),
(76, 'dental pain'),
(77, 'Allergies'),
(78, 'Vitamins'),
(79, 'Diabets'),
(80, 'cholestrol ');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `C-Id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delevery`
--

CREATE TABLE `delevery` (
  `user_id` int(11) NOT NULL,
  `First_name` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `user_number` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delevery`
--

INSERT INTO `delevery` (`user_id`, `First_name`, `City`, `Address`, `user_number`) VALUES
(37, 'mohamad', 'funaydek', 'Al kamouaa', 70171399);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `product_id` int(11) NOT NULL,
  `filename` varchar(200) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`product_id`, `filename`, `upload_date`, `status`) VALUES
(3, 'amitriptyline.jpeg', '2024-05-26 11:27:38', 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `Id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicans`
--

CREATE TABLE `medicans` (
  `medican_title` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `Id` int(11) NOT NULL,
  `address` int(11) NOT NULL,
  `order date` int(11) NOT NULL,
  `C-ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `Id` int(10) NOT NULL,
  `file` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `products_title` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `prodcuct_image1` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `purchasing_price` int(100) NOT NULL,
  `quantities` int(255) NOT NULL,
  `number_allowed` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `products_title`, `product_description`, `product_keywords`, `category_id`, `prodcuct_image1`, `product_price`, `Date`, `status`, `brand_id`, `purchasing_price`, `quantities`, `number_allowed`) VALUES
(1, 'Panadol', '500mg, 24 tablets', 'Panadol', 72, 'panadol .png', '5', '2024-05-26 10:31:40', 'true', 5, 4, 45, 3),
(2, 'Panadol Extra', '500mg, 24 tablets', 'Panadol Extra', 72, 'Panadol Extra.png', '6', '2024-05-26 07:18:25', 'true', 2, 5, 48, 3),
(3, 'Augmentin ', '457mg/5ml', 'Augmentin', 70, 'Augmentin.png', '7', '2024-05-26 11:28:45', 'true', 3, 5, 56, 1),
(4, 'Panadol joint', '665mg, 18 tablets', 'Panadol joint', 74, 'panadol-joint.webp', '5', '2024-05-25 18:04:33', 'true', 0, 4, 20, 2),
(5, 'Amoxicillin', '500mg', 'Amoxicillin', 70, 'Amoxilin.jpg', '7', '2024-05-26 10:50:59', 'true', 0, 5, 37, 1),
(6, 'Adol', '500mg, 24 tablets', 'Adol', 72, 'Adol.jpg', '5', '2024-05-26 06:00:55', 'true', 7, 3, 60, 3),
(7, 'Otrivin', '1mg/ml', 'Otrivin', 77, 'Otrivin.jfif', '8', '2024-05-26 08:14:37', 'true', 4, 5, 59, 2),
(8, 'Paracetamol ', '500mg, 24 tablets', 'Paracetamol', 72, 'Paracetamol.jpg', '5', '2024-05-26 08:14:37', 'true', 0, 3, 97, 3),
(9, 'amitriptyline', '10ml', 'amitriptyline', 73, 'ner.jfif', '20', '2024-05-26 11:31:53', 'true', 0, 15, 40, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_upload`
--

CREATE TABLE `tb_upload` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(128) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_type` varchar(100) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_email`, `user_password`, `user_type`) VALUES
(17, 'admin', 'admin', '$2y$10$QZB6GqK4mezLq9Upaj01SeQR7gEh2yho5v.V.78QHf5tk61T2sazq', 'admin'),
(18, 'manager', 'manager ', '$2y$10$20Cq4vxyGgAJMMyvF37VoOpWftpT8zj4k66/9v1RcU4/3YK2xX1yy', 'manager'),
(19, 'delivery', 'delivery', '$2y$10$L3DwEF17EiRDPVqYvjmpcuyQmDMIy6mCPK2NRXJssxPhFr8SqSLg6', 'delivery'),
(21, 'osama', 'osama@gmail.com', '$2y$10$qaLiDD3raVGuQOIHoZfHC.x7doh36IYzul/VuTXQVP.LiW9DsyjBW', 'user'),
(22, 'mohamad', 'mohamad@gmail.com', '$2y$10$E7DNdJZ8fyapV6qluN0k1evHhClXQjwvG5Bb5AdfVLO/mt.Rb1UGe', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_product` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_product`, `total_products`, `order_date`, `order_status`) VALUES
(10, 7, 7, 803120366, 1, '2024-05-26 11:28:45', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user_paymnets`
--

CREATE TABLE `user_paymnets` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_product` int(11) NOT NULL,
  `amount_due` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `user_name`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(6, 'osama', 'osama@gmail.com', '$2y$10$qaLiDD3raVGuQOIHoZfHC.x7doh36IYzul/VuTXQVP.LiW9DsyjBW', 'WhatsApp Image 2024-02-26 at 11.29.42 PM.jpeg', '::1', 'akkar', '70171399'),
(7, 'mohamad', 'mohamad@gmail.com', '$2y$10$E7DNdJZ8fyapV6qluN0k1evHhClXQjwvG5Bb5AdfVLO/mt.Rb1UGe', 'moe.jpg', '::1', 'akkar', '70171399');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`,`admin_email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`C-Id`);

--
-- Indexes for table `delevery`
--
ALTER TABLE `delevery`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `medicans`
--
ALTER TABLE `medicans`
  ADD PRIMARY KEY (`medican_title`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tb_upload`
--
ALTER TABLE `tb_upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`,`user_email`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_paymnets`
--
ALTER TABLE `user_paymnets`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`,`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `delevery`
--
ALTER TABLE `delevery`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `medicans`
--
ALTER TABLE `medicans`
  MODIFY `medican_title` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_upload`
--
ALTER TABLE `tb_upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_paymnets`
--
ALTER TABLE `user_paymnets`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `fk_files_product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

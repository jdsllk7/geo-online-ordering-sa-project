-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2020 at 11:05 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineorders_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `itemsId` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `quantity` int(5) DEFAULT 1,
  `itemPrice` decimal(15,2) DEFAULT 0.00,
  `itemStatus` tinyint(1) DEFAULT 1,
  `ordersId` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemsId`, `name`, `quantity`, `itemPrice`, `itemStatus`, `ordersId`) VALUES
(1, 'Apples', 3, '250.00', 1, 2),
(2, 'Bananas', 1, '8050.00', 1, 2),
(3, 'Pines', 5, '29.00', 1, 4),
(4, 'Munkoyo', 1, '40.00', 1, 6),
(5, 'Milk Shake', 2, '900.00', 1, 5),
(6, 'Salad Dressing', 1, '10.00', 1, 1),
(7, 'Cucumber Dressing', 1, '10.00', 1, 1),
(8, 'Qwerty', 10, '100.00', 1, 3),
(9, 'Squash', 4, '340.00', 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ordersId` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `lng` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `orderText` varchar(255) DEFAULT NULL,
  `totalPrice` decimal(15,2) DEFAULT 0.00,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `orderStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ordersId`, `email`, `lng`, `lat`, `orderText`, `totalPrice`, `orderDate`, `orderStatus`) VALUES
(1, 'user@web.com', '12.334455', '-7.55534', 'Lusaka Complex', '0.00', '2020-11-22 06:41:00', 1),
(2, '', '28.3228', '-15.3875', 'Lusaka Complex', '0.00', '2020-11-22 06:41:48', 1),
(3, 'user2@web.com', '14.334455', '-33.55534', '', '0.00', '2020-11-22 06:42:08', 1),
(4, '', '21.334455', '-41.55534', '', '0.00', '2020-11-22 06:42:36', 1),
(5, 'user4@web.com', '23.334455', '-25.55534', 'Mulu Flats', '0.00', '2020-11-22 06:43:20', 1),
(6, 'user5@web.com', '54.334455', '-17.55534', '', '0.00', '2020-11-22 06:43:48', 1),
(7, 'user5@web.com', '12.334455', '14.55534', 'CBU', '0.00', '2020-11-22 06:45:09', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemsId`),
  ADD KEY `ordersId` (`ordersId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ordersId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `itemsId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ordersId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`ordersId`) REFERENCES `orders` (`ordersId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

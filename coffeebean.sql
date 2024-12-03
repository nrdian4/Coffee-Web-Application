-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2022 at 11:26 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffeebean`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `CART_ID` int(6) NOT NULL,
  `CUST_ID` int(20) NOT NULL,
  `PRODUCT_CODE` int(6) NOT NULL,
  `PRODUCT_NAME` varchar(20) NOT NULL,
  `CART_QUANTITY` int(10) NOT NULL,
  `CART_PRICE` double(4,2) NOT NULL,
  `CART_DATE` date NOT NULL DEFAULT current_timestamp(),
  `CART_IMAGE` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`CART_ID`, `CUST_ID`, `PRODUCT_CODE`, `PRODUCT_NAME`, `CART_QUANTITY`, `CART_PRICE`, `CART_DATE`, `CART_IMAGE`) VALUES
(181, 20719, 1013, 'Cappuccino', 2, 13.45, '2022-07-15', 0x63617070756363696e6f2e6a7067),
(182, 20719, 1021, 'Tiramisu', 1, 8.90, '2022-07-15', 0x746972616d6973752e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CUST_ID` int(20) NOT NULL,
  `CUST_USERNAME` varchar(20) NOT NULL,
  `CUST_PASSWORD` varchar(20) NOT NULL,
  `CUST_NAME` varchar(50) NOT NULL,
  `ADDRESS` varchar(55) NOT NULL,
  `CUST_EMAIL` varchar(50) NOT NULL,
  `CUST_PHONE` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CUST_ID`, `CUST_USERNAME`, `CUST_PASSWORD`, `CUST_NAME`, `ADDRESS`, `CUST_EMAIL`, `CUST_PHONE`) VALUES
(20706, 'Aimimi_96', 'aimi12345', 'Aimi Nadirah Binti Ahmad Hisyam', 'Level 34, Menara Telekom, Jalan Pantai Baru, 59200', 'AimiNad96@gmail.com', '012-5192995'),
(20707, 'Naxay', 'QhazWai2', 'Nurqhazwainee Ashiqin Binti Abdul Aziz', '33 JALAN BESAR, BANDAR LAMA, JERANTUT PAHANA DARUL', 'Ashiqinqin@gmail.com', '019-2370883'),
(20708, 'Khairul2', 'airul', 'Khairul Bin Syamsul', 'Bp Pemas Jaya 1 Lot Ptd. Jalan Pemas 1/1 Permas Jalan', 'Khai92@gmail.com', '011-2392495'),
(20709, 'AzmanHaz123', 'haz918181', 'Hazim Bin Azman', ' 47 Slr Rokam 11 Taman Jaya, 31350, Ipoh, Perak', 'HazAzim123@gmail.com', '019-2345661'),
(20710, 'Qian_Lian', 'QianLian123', 'Qian Lian', '75 Jln Bukit Angkat Kampung Bukit Angkat Sg Chua', 'QianLian123@gmail.com', '013-2738922'),
(20711, 'Kalita_Purnima', 'Purnima1998', 'Purnima Kalita', '367, Kampung Cherating Lama, 26080, Kuantan, Pahang', 'PurnimaKalita@gmail.com', '012-3769448'),
(20719, 'LiyaSarah123', 'Liya123', 'Liya Sara Binti  Abdullah', 'Plot 189 Jalan Industri 3/7, Rawang Integrated Industri', 'LiyaSarah123@gmail.com', '019-2370883');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PAYMENT_NO` int(6) NOT NULL,
  `CUST_ID` int(11) NOT NULL,
  `STAFF_ID` int(11) NOT NULL,
  `CUST_NAME` varchar(50) NOT NULL,
  `CUST_PHONE` varchar(20) NOT NULL,
  `CUST_EMAIL` varchar(50) NOT NULL,
  `PAYMENT_METHOD` varchar(20) NOT NULL,
  `PAYMENT_DATE` date NOT NULL DEFAULT current_timestamp(),
  `TOTAL_PRICE` double(4,2) NOT NULL,
  `ADDRESS` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`PAYMENT_NO`, `CUST_ID`, `STAFF_ID`, `CUST_NAME`, `CUST_PHONE`, `CUST_EMAIL`, `PAYMENT_METHOD`, `PAYMENT_DATE`, `TOTAL_PRICE`, `ADDRESS`) VALUES
(48, 20710, 1002, 'Qian Lian', '013-2738922', 'QianLian123@gmail.com', 'cash on delivery', '2022-07-13', 39.00, '75 Jln Bukit Angkat Kampung Bukit Angkat Sg Chua'),
(54, 20707, 1005, 'Nurqhazwainee Ashiqi', '019-2370669', 'Ashiqinqin@gmail.com', 'credit cart', '2022-07-13', 23.00, '33 JALAN BESAR, BANDAR LAMA, JERANTUT PAHANA DARUL'),
(58, 20708, 1004, 'Khairul Bin Syamsul', '011-2392495', 'Khai92@gmail.com', 'credit cart', '2022-07-13', 30.00, 'Bp Pemas Jaya 1 Lot Ptd. Jalan Pemas 1/1 Permas Ja'),
(59, 20711, 1005, 'Purnima Kalita', '012-3769448', 'PurnimaKalita@gmail.com', 'credit cart', '2022-07-13', 26.00, '367, Kampung Cherating Lama, 26080, Kuantan, Pahan'),
(60, 20709, 1005, 'Hazim Bin Azman', '019-2345661', 'HazAz@gmail.com', 'cash on delivery', '2022-07-13', 47.00, ' 47 Slr Rokam 11 Taman Jaya, 31350, Ipoh, Perak'),
(62, 20708, 1002, 'Khairul Bin Syamsul', '011-2392495', 'Khai92@gmail.com', 'credit cart', '2022-07-13', 16.00, 'Bp Pemas Jaya 1 Lot Ptd. Jalan Pemas 1/1 Permas Ja'),
(69, 20719, 1002, 'Liya Sarah', '019-2345661', 'LiyaSarah123@gmail.com', 'cash on delivery', '2022-07-15', 36.00, 'Plot 189 Jalan Industri 3/7, Rawang Integrated Ind');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `PRODUCT_CODE` int(6) NOT NULL,
  `PRODUCT_NAME` varchar(20) NOT NULL,
  `PRODUCT_PRICE` double(4,2) NOT NULL,
  `PRODUCT_IMAGE` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`PRODUCT_CODE`, `PRODUCT_NAME`, `PRODUCT_PRICE`, `PRODUCT_IMAGE`) VALUES
(1011, 'Iced Latte', 13.50, 0x6c617474652e6a7067),
(1012, 'Iced Americano', 11.13, 0x616d65726963616e6f2e6a7067),
(1013, 'Cappuccino', 13.45, 0x63617070756363696e6f2e6a7067),
(1014, 'Mocha', 16.43, 0x6d6f6368612e6a7067),
(1015, 'Macchiato', 16.96, 0x6d616363686961746f2e6a7067),
(1016, 'Espresso', 14.84, 0x657370726573736f2e6a7067),
(1021, 'Tiramisu', 8.90, 0x746972616d6973752e6a7067),
(1022, 'Carrot Cake', 7.90, 0x636172726f742d63616b652e6a7067),
(1023, 'Apple Crumble', 8.90, 0x6170706c652d6372756d626c652e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `STAFF_ID` int(11) NOT NULL,
  `STAFF_USERNAME` varchar(20) NOT NULL,
  `STAFF_PASSWORD` varchar(20) NOT NULL,
  `STAFF_NAME` varchar(50) NOT NULL,
  `STAFF_EMAIL` varchar(50) NOT NULL,
  `STAFF_PHONE` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`STAFF_ID`, `STAFF_USERNAME`, `STAFF_PASSWORD`, `STAFF_NAME`, `STAFF_EMAIL`, `STAFF_PHONE`) VALUES
(1001, 'AzNa14', 'AzlinLuvYou', 'Azlina binti Usman', 'AzlinaUsman14@gmail.com', '019-5684599'),
(1002, 'RajaImanHakim', 'ImanRaja222', 'Iman Hakim bin Raja', 'RajaImanHakim@gmail.com', '016-2832637'),
(1003, 'RanSingh', '1234567', 'Ranveer Singh', 'RanveerSingh@gmail.com', '017-8735776'),
(1004, 'AgnesMon', 'Agnes0202', 'Agnes Monica', 'AgnesMonica1996@gmail.com', '015-2639323'),
(1005, 'FatinHannah', 'Fa@873524', 'Fatin Nur Hannah Binti Muhammad Ashraf', 'Fatinhannah2002@gmail.com', '018-2370889');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CART_ID`),
  ADD KEY `PRODUCT_CODE` (`PRODUCT_CODE`),
  ADD KEY `CUST_ID` (`CUST_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CUST_ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PAYMENT_NO`),
  ADD KEY `CUST_ID` (`CUST_ID`),
  ADD KEY `STAFF_ID` (`STAFF_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`PRODUCT_CODE`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`STAFF_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `CART_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CUST_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20720;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PAYMENT_NO` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`PRODUCT_CODE`) REFERENCES `product` (`PRODUCT_CODE`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`CUST_ID`) REFERENCES `customer` (`CUST_ID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`CUST_ID`) REFERENCES `customer` (`CUST_ID`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`STAFF_ID`) REFERENCES `staff` (`STAFF_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2024 at 09:37 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web2project_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customertbl`
--

CREATE TABLE `customertbl` (
  `cid` int(11) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `cemail` varchar(200) NOT NULL,
  `cphone` char(8) NOT NULL,
  `caddress` varchar(300) NOT NULL,
  `cstatus` char(1) NOT NULL DEFAULT 'A',
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customertbl`
--

INSERT INTO `customertbl` (`cid`, `cname`, `cemail`, `cphone`, `caddress`, `cstatus`, `username`) VALUES
(3, 'Maria', 'maria232@gmail.com', '76434256', 'Boshar', 'A', 'Maria'),
(4, 'Rafa', 'Rafa232@gmail.com', '74842035', 'Ruwi', 'A', 'Rafa'),
(5, 'Safa', 'safa232@gmail.com', '74834532', 'Ruwi', 'A', 'Safa35'),
(6, 'Samia', 'samia3432@gmail.com', '72824724', 'Muscat', 'A', 'samia123'),
(7, 'Halima', 'ham123@gmail.com', '76543824', 'Seeb', 'A', 'halima123');

-- --------------------------------------------------------

--
-- Table structure for table `ordertbl`
--

CREATE TABLE `ordertbl` (
  `oid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `odate` date NOT NULL,
  `oqty` smallint(6) NOT NULL,
  `oprice` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ordertbl`
--

INSERT INTO `ordertbl` (`oid`, `cid`, `pid`, `odate`, `oqty`, `oprice`) VALUES
(1, 4, 2, '2024-12-18', 1, 10),
(2, 3, 1, '2024-12-18', 4, 3),
(3, 7, 3, '2024-12-18', 1, 11),
(4, 3, 4, '2024-12-18', 3, 20);

-- --------------------------------------------------------

--
-- Table structure for table `paymenttbl`
--

CREATE TABLE `paymenttbl` (
  `payid` int(11) NOT NULL,
  `oid` int(11) NOT NULL,
  `paydate` date NOT NULL,
  `paycardno` char(16) NOT NULL,
  `cvc` char(3) NOT NULL,
  `expdate` date NOT NULL,
  `payamount` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paymenttbl`
--

INSERT INTO `paymenttbl` (`payid`, `oid`, `paydate`, `paycardno`, `cvc`, `expdate`, `payamount`) VALUES
(1, 1, '2024-12-18', '7234567891011124', '234', '2024-12-20', 10),
(2, 2, '2024-12-18', '6754907536124578', '320', '2024-12-10', 12),
(3, 3, '2024-12-18', '8930242859319493', '323', '2024-12-07', 11),
(4, 4, '2024-12-18', '7234567891011123', '333', '2024-12-06', 60);

-- --------------------------------------------------------

--
-- Table structure for table `producttbl`
--

CREATE TABLE `producttbl` (
  `pid` int(11) NOT NULL,
  `pname` varchar(200) NOT NULL,
  `pdetail` varchar(500) NOT NULL,
  `pqty` smallint(6) NOT NULL,
  `pprice` smallint(6) NOT NULL,
  `ppic` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `producttbl`
--

INSERT INTO `producttbl` (`pid`, `pname`, `pdetail`, `pqty`, `pprice`, `ppic`) VALUES
(1, 'Vanilla Dream', 'Classic vanilla cupcake with buttercream frosting, decorated with delicate purple flowers.', 46, 3, 'uploaded_product_pic/events-7.jpg'),
(2, 'Vanilla Berry Bliss', 'Light vanilla cupcake with cream cheese frosting and fresh berries..', 44, 10, 'uploaded_product_pic/pic40.jpg'),
(3, 'Blueberry Chocolate Burst', 'Luscious chocolate cupcake with blueberry frosting and fresh berries.', 49, 11, 'uploaded_product_pic/pic31.jpg'),
(4, 'Pink Glamour', 'Elegant pink cupcakes adorned with delicate edible flowers and shimmering sprinkles, perfect for any celebration', 32, 20, 'uploaded_product_pic/pic34.jpg'),
(5, 'Strawberry Bliss', 'Luscious strawberry cupcake topped with sweet strawberry frosting and fresh strawberries', 45, 6, 'uploaded_product_pic/pic33.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `usertbl`
--

CREATE TABLE `usertbl` (
  `username` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `type` char(1) NOT NULL DEFAULT 'C'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usertbl`
--

INSERT INTO `usertbl` (`username`, `password`, `type`) VALUES
('admin', 'admin', 'A'),
('halima123', '12345', 'C'),
('Maria', 'maria555', 'C'),
('Rafa', 'rafa1234', 'C'),
('Safa35', 'safa123', 'C'),
('samia123', '12345', 'C');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customertbl`
--
ALTER TABLE `customertbl`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `ordertbl`
--
ALTER TABLE `ordertbl`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `paymenttbl`
--
ALTER TABLE `paymenttbl`
  ADD PRIMARY KEY (`payid`);

--
-- Indexes for table `producttbl`
--
ALTER TABLE `producttbl`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `usertbl`
--
ALTER TABLE `usertbl`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customertbl`
--
ALTER TABLE `customertbl`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ordertbl`
--
ALTER TABLE `ordertbl`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `paymenttbl`
--
ALTER TABLE `paymenttbl`
  MODIFY `payid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `producttbl`
--
ALTER TABLE `producttbl`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

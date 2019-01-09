-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2018 at 03:53 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, 'Vivek', 'Vengala', 'vivek@codingcyber.com', '6d78f4e7ff6381c4c8c6130d0b184456'),
(2, 'mishuk', 'alam', 'jahidul.alam13@diit.info', 'e807f1fcf82d132f9bb018ca6738a19f'),
(3, 'jahidul', 'alam', 'jahiduk.alam13@gmail.com', '15171ee8bf48f5c785cddb0229f9f232');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(3, 'Books'),
(4, 'CAT FOOD'),
(5, 'DOG FOOD'),
(6, 'OTHER PET FOOD'),
(7, 'Freeze-Dried Food'),
(8, '');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `Message` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `LastName`, `Email`, `phone`, `Message`, `timestamp`) VALUES
(10, '', 'alam', 'jahiduk.alam13@gmail.com', '1681805060', 'ok', '2018-09-07 03:50:34'),
(11, 'jahidul alam', 'alam', 'jahiduk.alam13@gmail.com', '1825501775', 'ok', '2018-09-07 03:50:34'),
(12, 'mishuk', 'alam', 'jahiduk.alam13@gmail.com', '01681805060', 'i want to adopt a pet but how ', '2018-09-07 03:50:34');

-- --------------------------------------------------------

--
-- Table structure for table `lostandfound`
--

CREATE TABLE `lostandfound` (
  `id` int(11) NOT NULL,
  `petname` varchar(255) NOT NULL,
  `petcategory` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `pquantity` varchar(255) NOT NULL,
  `orderid` int(11) NOT NULL,
  `productprice` varchar(255) NOT NULL,
  `she` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`id`, `pid`, `pquantity`, `orderid`, `productprice`, `she`) VALUES
(1, 19, '5', 1, '16', '0000-00-00'),
(2, 19, '5', 2, '16', '0000-00-00'),
(3, 1, '2', 2, '20990', '0000-00-00'),
(4, 1, '1', 3, '20990', '0000-00-00'),
(5, 20, '10', 3, '99', '0000-00-00'),
(6, 18, '1', 4, '12890', '0000-00-00'),
(7, 21, '1', 4, '75', '0000-00-00'),
(8, 2, '1', 5, '7590', '0000-00-00'),
(9, 19, '10', 5, '16', '0000-00-00'),
(10, 2, '1', 6, '7590', '0000-00-00'),
(11, 18, '1', 6, '12890', '0000-00-00'),
(12, 21, '1', 6, '75', '0000-00-00'),
(13, 1, '1', 7, '20990', '0000-00-00'),
(14, 18, '5', 7, '12890', '0000-00-00'),
(15, 2, '1', 8, '7590', '0000-00-00'),
(16, 19, '1', 9, '16', '0000-00-00'),
(17, 2, '1', 10, '7590', '0000-00-00'),
(18, 1, '6', 11, '20990', '0000-00-00'),
(19, 18, '6', 11, '12890', '0000-00-00'),
(20, 1, '1', 12, '20990', '0000-00-00'),
(21, 1, '1', 13, '20990', '0000-00-00'),
(22, 2, '1', 13, '7590', '0000-00-00'),
(23, 2, '1', 14, '7590', '0000-00-00'),
(24, 1, '1', 15, '20990', '0000-00-00'),
(26, 18, '1', 17, '12890', '0000-00-00'),
(27, 2, '1', 18, '7590', '0000-00-00'),
(28, 19, '1', 19, '16', '0000-00-00'),
(29, 26, '1', 20, '111', '0000-00-00'),
(30, 23, '1', 20, '882', '0000-00-00'),
(31, 25, '3', 20, '450', '0000-00-00'),
(32, 19, '1', 21, '16', '0000-00-00'),
(33, 19, '1', 22, '16', '0000-00-00'),
(34, 19, '1', 23, '16', '0000-00-00'),
(35, 23, '1', 24, '882', '0000-00-00'),
(36, 23, '1', 25, '882', '0000-00-00'),
(37, 21, '1', 26, '75', '0000-00-00'),
(38, 22, '1', 27, '1115', '0000-00-00'),
(39, 20, '1', 28, '99', '0000-00-00'),
(40, 23, '1', 29, '882', '0000-00-00'),
(41, 24, '1', 30, '999', '0000-00-00'),
(42, 25, '1', 31, '450', '0000-00-00'),
(43, 20, '1', 32, '99', '0000-00-00'),
(44, 24, '1', 33, '999', '0000-00-00'),
(45, 20, '1', 34, '99', '0000-00-00'),
(46, 24, '1', 34, '999', '0000-00-00'),
(47, 25, '1', 34, '450', '0000-00-00'),
(48, 22, '1', 34, '1115', '0000-00-00'),
(49, 21, '1', 35, '75', '0000-00-00'),
(50, 20, '1', 36, '99', '0000-00-00'),
(51, 22, '1', 37, '1115', '0000-00-00'),
(52, 25, '1', 38, '450', '0000-00-00'),
(53, 23, '1', 39, '882', '0000-00-00'),
(54, 24, '1', 40, '999', '0000-00-00'),
(55, 20, '1', 41, '99', '0000-00-00'),
(56, 22, '1', 41, '1115', '0000-00-00'),
(57, 19, '1', 42, '16', '0000-00-00'),
(58, 20, '1', 43, '99', '0000-00-00'),
(59, 20, '1', 44, '99', '0000-00-00'),
(60, 19, '1', 44, '16', '0000-00-00'),
(61, 24, '4', 44, '999', '0000-00-00'),
(62, 19, '6', 45, '16', '0000-00-00'),
(63, 20, '1', 46, '99', '0000-00-00'),
(64, 25, '1', 46, '450', '0000-00-00'),
(65, 25, '1', 47, '450', '0000-00-00'),
(66, 19, '1', 48, '16', '0000-00-00'),
(67, 25, '1', 48, '450', '0000-00-00'),
(68, 23, '1', 49, '882', '0000-00-00'),
(69, 21, '1', 49, '75', '0000-00-00'),
(70, 25, '1', 50, '450', '0000-00-00'),
(71, 24, '1', 51, '999', '0000-00-00'),
(72, 21, '1', 51, '75', '0000-00-00'),
(73, 24, '1', 52, '999', '0000-00-00'),
(74, 21, '1', 52, '75', '0000-00-00'),
(75, 25, '1', 53, '450', '0000-00-00'),
(76, 25, '1', 54, '450', '0000-00-00'),
(77, 24, '1', 55, '999', '0000-00-00'),
(78, 26, '1', 56, '111', '0000-00-00'),
(79, 24, '1', 57, '999', '0000-00-00'),
(80, 25, '1', 58, '450', '0000-00-00'),
(81, 25, '1', 59, '450', '0000-00-00'),
(82, 26, '1', 59, '111', '0000-00-00'),
(83, 24, '1', 60, '999', '0000-00-00'),
(84, 24, '1', 61, '999', '0000-00-00'),
(85, 24, '1', 62, '999', '0000-00-00'),
(86, 24, '1', 63, '999', '0000-00-00'),
(87, 21, '1', 64, '75', '0000-00-00'),
(88, 27, '1', 66, '37', '0000-00-00'),
(89, 25, '1', 67, '450', '0000-00-00'),
(90, 25, '1', 68, '450', '0000-00-00'),
(91, 27, '1', 69, '37', '0000-00-00'),
(92, 27, '1', 70, '37', '0000-00-00'),
(93, 26, '1', 71, '111', '0000-00-00'),
(94, 19, '1', 72, '16', '0000-00-00'),
(95, 24, '1', 73, '999', '0000-00-00'),
(96, 25, '10', 74, '450', '0000-00-00'),
(97, 24, '1', 75, '999', '0000-00-00'),
(98, 23, '1', 76, '882', '0000-00-00'),
(99, 26, '1', 77, '111', '0000-00-00'),
(100, 24, '1', 78, '999', '0000-00-00'),
(101, 23, '1', 79, '882', '0000-00-00'),
(102, 25, '7', 80, '450', '0000-00-00'),
(103, 26, '1', 81, '111', '0000-00-00'),
(104, 27, '1', 82, '37', '0000-00-00'),
(105, 24, '1', 83, '999', '0000-00-00'),
(106, 25, '5', 84, '450', '0000-00-00'),
(107, 25, '1', 85, '450', '0000-00-00'),
(108, 25, '1', 86, '450', '0000-00-00'),
(109, 23, '1', 87, '882', '0000-00-00'),
(110, 23, '1', 88, '882', '0000-00-00'),
(111, 24, '1', 89, '999', '0000-00-00'),
(112, 0, '1', 90, '', '0000-00-00'),
(113, 0, '1', 90, '', '0000-00-00'),
(114, 26, '1', 91, '111', '0000-00-00'),
(115, 0, '1', 92, '', '0000-00-00'),
(116, 0, '1', 92, '', '0000-00-00'),
(117, 0, '1', 93, '', '0000-00-00'),
(118, 0, '1', 93, '', '0000-00-00'),
(119, 0, '1', 94, '', '0000-00-00'),
(120, 0, '1', 94, '', '0000-00-00'),
(121, 25, '1', 95, '450', '0000-00-00'),
(122, 0, '1', 96, '', '0000-00-00'),
(123, 0, '1', 97, '', '0000-00-00'),
(124, 13, '1', 98, '0', '0000-00-00'),
(125, 12, '1', 99, '0', '0000-00-00'),
(126, 12, '1', 100, '0', '0000-00-00'),
(127, 12, '1', 101, '0', '0000-00-00'),
(128, 12, '1', 102, '0', '0000-00-00'),
(129, 13, '1', 103, '0', '0000-00-00'),
(130, 1, '1', 104, '0', '0000-00-00'),
(131, 13, '1', 105, '0', '0000-00-00'),
(132, 10, '1', 106, '0', '0000-00-00'),
(133, 8, '1', 107, '0', '0000-00-00'),
(134, 1, '1', 107, '0', '0000-00-00'),
(135, 6, '1', 108, '0', '0000-00-00'),
(136, 7, '1', 109, '0', '0000-00-00'),
(137, 9, '1', 109, '0', '0000-00-00'),
(138, 5, '1', 110, '0', '0000-00-00'),
(139, 13, '1', 110, '0', '0000-00-00'),
(140, 5, '1', 111, '0', '0000-00-00'),
(141, 13, '1', 112, '0', '0000-00-00'),
(142, 12, '1', 112, '0', '0000-00-00'),
(143, 6, '1', 113, '0', '0000-00-00'),
(144, 7, '1', 113, '0', '0000-00-00'),
(145, 25, '1', 114, '450', '0000-00-00'),
(146, 8, '1', 115, '0', '0000-00-00'),
(147, 26, '1', 116, '111', '0000-00-00'),
(148, 9, '1', 117, '0', '0000-00-00'),
(149, 9, '1', 118, '0', '0000-00-00'),
(150, 1, '1', 119, '0', '0000-00-00'),
(151, 7, '1', 120, '0', '0000-00-00'),
(152, 6, '1', 121, '0', '0000-00-00'),
(153, 8, '1', 122, '0', '0000-00-00'),
(154, 25, '1', 123, '450', '0000-00-00'),
(155, 25, '1', 124, '450', '0000-00-00'),
(156, 24, '5', 124, '999', '0000-00-00'),
(157, 6, '1', 125, '0', '0000-00-00'),
(158, 7, '1', 126, '0', '0000-00-00'),
(159, 5, '1', 127, '0', '0000-00-00'),
(160, 9, '2', 128, '35', '0000-00-00'),
(161, 9, '1', 129, '0', '0000-00-00'),
(162, 10, '4', 130, '30', '0000-00-00'),
(163, 8, '1', 131, '0', '0000-00-00'),
(164, 13, '4', 132, '24', '0000-00-00'),
(165, 25, '5', 133, '450', '0000-00-00'),
(166, 25, '1', 134, '450', '0000-00-00'),
(167, 9, '1', 135, '0', '0000-00-00'),
(168, 10, '6', 136, '30', '0000-00-00'),
(169, 25, '1', 137, '450', '0000-00-00'),
(170, 26, '1', 138, '111', '0000-00-00'),
(171, 25, '1', 139, '450', '0000-00-00'),
(172, 25, '1', 140, '450', '0000-00-00'),
(173, 13, '5', 142, '24', '0000-00-00'),
(174, 6, '5', 143, '30', '0000-00-00'),
(175, 104, '4', 144, '1050', '0000-00-00'),
(176, 104, '1', 145, '1050', '0000-00-00'),
(177, 103, '5', 146, '150', '0000-00-00'),
(178, 104, '1', 147, '1050', '0000-00-00'),
(179, 100, '5', 148, '250', '0000-00-00'),
(180, 5, '1', 149, '0', '0000-00-00'),
(181, 6, '1', 150, '0', '0000-00-00'),
(182, 26, '1', 151, '111', '0000-00-00'),
(183, 27, '5', 152, '37', '0000-00-00'),
(184, 6, '1', 153, '0', '0000-00-00'),
(185, 7, '1', 154, '0', '0000-00-00'),
(186, 13, '5', 155, '24', '0000-00-00'),
(187, 25, '1', 156, '450', '0000-00-00'),
(188, 26, '11', 157, '111', '0000-00-00'),
(189, 103, '11', 158, '150', '0000-00-00'),
(190, 26, '1', 159, '111', '0000-00-00'),
(191, 13, '3', 160, '24', '0000-00-00'),
(192, 8, '15', 161, '40', '0000-00-00'),
(193, 18, '15', 162, '111', '0000-00-00'),
(194, 18, '10', 163, '111', '0000-00-00'),
(195, 12, '1', 164, '0', '0000-00-00'),
(196, 13, '1', 166, '0', '0000-00-00'),
(197, 9, '1', 167, '0', '0000-00-00'),
(198, 13, '10', 168, '24', '0000-00-00'),
(199, 12, '15', 169, '15', '0000-00-00'),
(200, 25, '1', 170, '450', '0000-00-00'),
(201, 103, '11', 171, '150', '0000-00-00'),
(202, 6, '1', 172, '0', '0000-00-00'),
(203, 104, '7', 173, '1050', '0000-00-00'),
(204, 100, '12', 174, '250', '0000-00-00'),
(205, 25, '8', 175, '450', '0000-00-00'),
(206, 22, '1', 175, '1115', '0000-00-00'),
(207, 25, '1', 176, '450', '0000-00-00'),
(208, 6, '1', 177, '0', '0000-00-00'),
(209, 7, '1', 178, '0', '0000-00-00'),
(210, 6, '7', 179, '30', '0000-00-00'),
(211, 13, '1', 180, '0', '0000-00-00'),
(212, 8, '1', 181, '0', '0000-00-00'),
(213, 6, '1', 182, '0', '0000-00-00'),
(214, 13, '2', 183, '24', '0000-00-00'),
(215, 13, '10', 184, '24', '0000-00-00'),
(216, 13, '10', 185, '24', '2018-12-11'),
(217, 12, '4', 186, '15', '2018-12-19'),
(218, 13, '2', 188, '24', '2018-12-20'),
(219, 11, '4', 189, '25', '2018-12-20'),
(220, 7, '1', 190, '0', '0000-00-00'),
(221, 13, '3', 191, '24', '2018-12-20'),
(222, 27, '1', 192, '37', '0000-00-00'),
(223, 24, '1', 193, '999', '0000-00-00'),
(224, 108, '4', 194, '450', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `totalprice` varchar(255) NOT NULL,
  `orderstatus` varchar(255) NOT NULL,
  `paymentmode` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ivid` varchar(255) NOT NULL,
  `paymentid` varchar(255) NOT NULL DEFAULT 'Not Paid',
  `trnsid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `uid`, `totalprice`, `orderstatus`, `paymentmode`, `timestamp`, `ivid`, `paymentid`, `trnsid`) VALUES
(51, 9, '1074', 'Order Placed', 'cashondelivery', '2018-09-01 10:25:43', '0', '', ''),
(68, 35, '450', 'Order Placed', 'off line payment', '2018-09-02 12:16:30', 'ividECC0385FE6', 'pidDCB88A2FA9', '12314cvfbcg'),
(69, 35, '37', 'Order Placed', 'off line payment', '2018-09-02 12:53:55', 'ivid15F2013A3B', 'pidE855304A50', '121334354xcddgf'),
(70, 37, '37', 'Order Placed', 'off line payment', '2018-09-02 13:08:18', 'ivid252FB41B7E', 'pidFC7B95282D', '123132423dfghf'),
(71, 38, '111', 'Order Placed', 'off line payment', '2018-09-02 16:12:06', 'ivid57C623FBD0', '', ''),
(72, 38, '16', 'Order Placed', 'off line payment', '2018-09-02 16:24:13', 'ividCD533F8626', 'pidD66723EF7B', 'as12345678as'),
(73, 39, '999', 'Order Placed', 'off line payment', '2018-09-02 16:35:43', 'ivid864518B2D7', 'pid45838BDFE5', 'asdasdsda242'),
(74, 39, '4500', 'Delivered', 'off line payment', '2018-09-02 16:37:16', 'ivid7E4CE1CFF3', '', ''),
(75, 40, '999', 'Order Placed', 'off line payment', '2018-09-03 11:20:46', 'ivid3D39E67BF9', '', ''),
(76, 40, '882', 'Order Placed', 'off line payment', '2018-09-03 11:51:37', 'ivid7496A3ADB5', '', ''),
(78, 40, '999', 'Order Placed', 'off line payment', '2018-09-03 12:24:15', 'ivid5931E1887B', '', ''),
(79, 40, '882', 'Order Placed', 'off line payment', '2018-09-03 12:27:21', 'ivid0669886D99', '', ''),
(82, 7, '37', 'Order Placed', 'cash on delivery', '2018-09-03 12:46:37', 'ivid71644C5859', 'pid2300456B6A', '33333333333333'),
(83, 7, '999', 'Paid', 'off line payment', '2018-09-03 12:49:16', 'ivid6AAA176878', 'pidB4B09CBC32', '34354545645646'),
(84, 7, '2250', 'Order Placed', 'off line payment', '2018-09-03 12:53:27', 'ivid3ECA882A69', 'pid329B2E864B', '34354545645646'),
(85, 7, '450', 'Order Placed', 'off line payment', '2018-09-03 12:57:10', 'ividD01E1BEC2B', '', ''),
(86, 7, '450', 'Order Placed', 'off line payment', '2018-09-03 12:58:46', 'ividA3A9474544', '', ''),
(87, 7, '882', 'Order Placed', 'off line payment', '2018-09-03 12:59:31', 'ividAFB2506E06', '', ''),
(88, 7, '882', 'Dispatched', 'off line payment', '2018-09-03 13:07:53', 'ivid3086CD9331', '', ''),
(89, 41, '999', 'In Progress', 'off line payment', '2018-09-05 11:47:50', 'ividDFFABE00E5', 'pid4EEC029238', '123132423dfghf'),
(90, 7, '450', 'Order Placed', 'off line payment', '2018-09-09 12:31:00', 'ividDE15499538', '', ''),
(91, 7, '111', 'Order Placed', 'cash on delivery', '2018-09-09 15:12:57', 'ivid39CF07CC59', '', ''),
(94, 7, '37', 'Order Placed', 'off line payment', '2018-09-10 16:05:25', 'ivid143577C69C', '', ''),
(95, 7, '450', 'Order Placed', 'off line payment', '2018-09-10 16:06:07', 'ividD3D4F009EC', '', ''),
(108, 44, '0', 'Adoption Application Placed', 'Free Adoption', '2018-09-11 11:53:04', 'Adid8DFBE0E363', '', ''),
(109, 44, '0', 'Adoption Application Placed', 'Free Adoption', '2018-09-11 11:54:33', 'Adid827572471E', '', ''),
(110, 44, '0', 'Adoption Application Placed', 'Free Adoption', '2018-09-11 11:56:03', 'Adid99B072B3A5', '', ''),
(111, 44, '0', 'Adoption Application Placed', 'Free Adoption', '2018-09-11 12:00:25', 'AdidE8CC749AC0', '', ''),
(112, 44, '0', 'Adoption Application Placed', 'Free Adoption', '2018-09-11 12:01:29', 'Adid15330DCBB5', '', ''),
(113, 44, '0', 'Adoption Application Placed', 'Free Adoption', '2018-09-11 12:05:08', 'Adid9FF3147377', '', ''),
(114, 44, '450', 'Order Placed', 'cash on delivery', '2018-09-11 12:12:44', 'ividE21392DE74', '', ''),
(115, 44, '0', 'Adoption Application Placed', 'Free Adoption', '2018-09-11 12:13:09', 'Adid43AF1A24EF', '', ''),
(116, 44, '111', 'Order Placed', 'off line payment', '2018-09-11 12:15:18', 'ivid902A0001B0', '', ''),
(117, 40, '0', 'Adoption Application Placed', 'Free Adoption', '2018-09-11 13:26:43', 'Adid364107DBD2', '', ''),
(118, 7, '0', 'Adoption Application Placed', 'Free Adoption', '2018-09-11 14:02:20', 'Adid1C7093BD25', '', ''),
(120, 45, '0', 'Cancelled', 'Free Adoption', '2018-09-12 11:47:39', 'Adid2B43EF133E', '', ''),
(121, 45, '0', 'Adoption Application Placed', 'Free Adoption', '2018-09-12 11:48:51', 'Adid0962450DBE', '', ''),
(122, 45, '0', 'Adoption Application Placed', 'Free Adoption', '2018-09-12 11:52:59', 'Adid85282C6FA4', '', ''),
(123, 45, '450', 'Order Placed', 'off line payment', '2018-09-12 12:05:34', 'ivid813C6FF71C', '', ''),
(124, 7, '5445', 'Order Placed', 'off line payment', '2018-09-12 17:11:05', 'ivid7A30F8CCC4', '', ''),
(125, 7, '0', 'Adoption Application Placed', 'Free Adoption', '2018-09-12 17:20:26', 'Adid82F8A33493', '', ''),
(126, 7, '0', 'Adoption Application Placed', 'Free Adoption', '2018-09-12 21:38:59', 'Adid16D575FF23', '', ''),
(127, 7, '0', 'Adoption Application Placed', 'Free Adoption', '2018-09-12 21:49:02', 'AdidE492D540D4', '', ''),
(128, 7, '70', 'Cancelled', 'off line payment', '2018-09-12 22:59:20', 'Shel30FC6594EC', '', ''),
(129, 7, '0', 'Adoption Application Placed', 'Free Adoption', '2018-09-13 09:46:19', 'Adid2604B195BE', '', ''),
(130, 7, '120', 'Booking Placed', 'cash on delivery', '2018-09-13 10:06:54', 'ShelB85B5A25F3', '', ''),
(131, 7, '0', 'Adoption Application Placed', 'Free Adoption', '2018-09-13 11:54:26', 'Adid555465FEA6', '', ''),
(132, 7, '96', 'Booking Placed', 'off line payment', '2018-09-13 11:55:11', 'ShelA6542917D2', '', ''),
(133, 7, '2250', 'Order Placed', 'off line payment', '2018-09-13 11:58:44', 'ivid898F0E8095', '', ''),
(134, 7, '450', 'Order Placed', 'off line payment', '2018-09-13 12:00:25', 'ividFEB3CC423E', '', ''),
(135, 7, '0', 'Adoption Application Placed', 'Free Adoption', '2018-09-13 12:01:45', 'Adid8AF1C39098', '', ''),
(136, 7, '180', 'Booking Placed', 'cash on delivery', '2018-09-13 12:02:28', 'ShelEE2F157590', '', ''),
(137, 7, '450', 'Order Placed', 'off line payment', '2018-09-13 12:15:17', 'ividB3D2F9054E', '', ''),
(138, 7, '111', 'Order Placed', 'cash on delivery', '2018-09-13 12:31:18', 'ivid64A265EB2F', '', ''),
(139, 7, '450', 'Order Placed', 'off line payment', '2018-09-13 12:33:06', 'ividC090672F76', '', ''),
(140, 7, '450', 'Order Placed', 'off line payment', '2018-09-13 12:34:46', 'ividBA194B7852', '', ''),
(141, 7, '0', 'Order Placed', 'off line payment', '2018-09-13 12:35:55', 'ivid4FD966EA30', '', ''),
(142, 7, '120', 'Booking Placed', 'cash on delivery', '2018-09-13 12:37:41', 'Shel2EC9232F3A', '', ''),
(143, 7, '150', 'Booking Placed', 'off line payment', '2018-09-13 13:00:08', 'Shel14757EC159', '', ''),
(144, 7, '4200', 'In Progress', 'off line payment', '2018-09-13 19:27:45', 'trai635DA95CA6', '', ''),
(145, 7, '1050', 'trainer confirm', 'off line payment', '2018-09-13 19:34:08', 'trai00B672390F', '', ''),
(146, 7, '750', 'Trainer Confirm', 'off line payment', '2018-09-13 19:38:33', 'trai04B326E37D', '', ''),
(147, 7, '1050', 'Trainer Confirm', 'off line payment', '2018-09-13 19:49:07', 'trai81A6F2062E', '', ''),
(148, 7, '1250', 'Trainer Confirm', 'off line payment', '2018-09-13 19:54:07', 'trai9CD4F24E79', '', ''),
(149, 7, '0', 'Adoption Application Placed', 'Free Adoption', '2018-09-15 12:02:49', 'Adid3B83612909', '', ''),
(150, 7, '0', 'Adoption Application Placed', 'Free Adoption', '2018-09-15 12:06:36', 'AdidD3D1CF5D73', '', ''),
(151, 7, '111', 'Order Placed', 'cash on delivery', '2018-09-16 22:23:15', 'ividEE1C48D32E', '', ''),
(152, 7, '185', 'Order Placed', 'cash on delivery', '2018-09-17 16:45:04', 'ividEC0218351D', '', ''),
(153, 45, '0', 'Delivered', 'Free Adoption', '2018-09-22 14:05:19', 'AdidD4DA934B13', '', ''),
(154, 7, '0', 'Delivered', 'Free Adoption', '2018-09-22 15:13:18', 'Adid9305F27F64', '', ''),
(155, 7, '120', 'Cancelled', 'cash on delivery', '2018-09-22 15:37:33', 'ShelCFCA8FACB9', '', ''),
(156, 7, '450', 'Cancelled', 'off line payment', '2018-09-22 16:29:45', 'ivid81A01CBB53', '', ''),
(157, 7, '1221', 'Order Placed', 'cash on delivery', '2018-09-22 16:40:48', 'ividD949F8A278', '', ''),
(158, 7, '1650', 'In Progress', 'cash on delivery', '2018-09-22 16:50:59', 'traiF91BE700FD', '', ''),
(159, 7, '111', 'In Progress', 'off line payment', '2018-09-22 21:18:32', 'ivid2BC83BEFBC', '', ''),
(160, 7, '72', 'Booking Placed', 'cash on delivery', '2018-09-22 21:26:59', 'Shel9F55D86496', 'Not Paid', ''),
(161, 7, '600', 'Booking Placed', 'off line payment', '2018-09-23 01:09:23', 'ShelDBF6DD4061', 'Not Paid', ''),
(162, 7, '1665', 'Booking Placed', 'off line payment', '2018-09-23 01:28:14', 'Shel8482F63F7A', 'pid7AF6D74A03', 'as12345678as'),
(163, 7, '1110', 'In Progress', 'off line payment', '2018-09-23 01:50:39', 'ShelF93D331A3C', 'Not Paid', ''),
(164, 7, '0', 'Adoption Application Placed', 'Free Adoption', '2018-09-23 04:06:09', 'Adid43106A8A66', 'Not Paid', ''),
(165, 7, '0', 'Adoption Application Placed', 'Free Adoption', '2018-09-23 04:15:38', 'Adid99D3E849C9', 'Not Paid', ''),
(166, 7, '0', 'Adoption Application Placed', 'Free Adoption', '2018-09-23 04:16:27', 'Adid995B3B682D', 'Not Paid', ''),
(167, 40, '0', 'Adoption Application Placed', 'Free Adoption', '2018-09-23 14:41:33', 'Adid2ED2C2481F', 'Not Paid', ''),
(168, 40, '240', 'Booking Placed', 'off line payment', '2018-09-23 14:44:30', 'Shel091B6FB203', 'Not Paid', ''),
(169, 40, '225', 'Booking Placed', 'off line payment', '2018-09-23 14:46:34', 'ShelEAC9FCC028', 'Not Paid', ''),
(170, 40, '450', 'Order Placed', 'off line payment', '2018-09-23 14:47:11', 'ividFD0D5572F0', 'Not Paid', ''),
(171, 40, '1650', 'Cancelled', 'off line payment', '2018-09-23 14:53:48', 'trai458CA572DF', 'Not Paid', ''),
(172, 40, '0', 'Cancelled', 'Free Adoption', '2018-09-23 15:45:58', 'Adid3E5C6C3166', 'Not Paid', ''),
(173, 40, '7350', 'Trainer Confirm', 'cash on delivery', '2018-09-23 16:13:46', 'trai9FD8E8F732', 'Not Paid', ''),
(174, 40, '3000', 'Trainer Confirm', 'off line payment', '2018-09-23 16:16:40', 'traiB7B9452889', 'Not Paid', ''),
(175, 7, '4715', 'Order Placed', 'off line payment', '2018-09-24 17:15:20', 'ivid16BFECCB5B', 'Not Paid', ''),
(176, 7, '450', 'Order Placed', 'off line payment', '2018-09-27 20:07:43', 'ividC18CC9DAA2', 'Not Paid', ''),
(177, 7, '0', 'Adoption Application Placed', 'Free Adoption', '2018-10-02 15:36:38', 'AdidB98C10BF0F', 'Not Paid', ''),
(178, 7, '0', 'Adoption Application Placed', 'Free Adoption', '2018-10-02 15:41:18', 'AdidB52E6E0F51', 'Not Paid', ''),
(179, 7, '210', 'Paid', 'off line payment', '2018-10-02 15:46:44', 'ShelF518A9AD00', 'pidD46588BDC9', 'd112121122sdse'),
(180, 7, '0', 'Adoption Application Placed', 'Free Adoption', '2018-10-02 15:51:28', 'Adid7D4B5675C8', 'Not Paid', ''),
(181, 7, '0', 'Adoption Application Placed', 'Free Adoption', '2018-10-02 17:01:45', 'AdidE11CAA281C', 'Not Paid', ''),
(182, 7, '0', 'Adoption Application Placed', 'Free Adoption', '2018-10-07 02:16:24', 'Adid09442F10FF', 'Not Paid', ''),
(183, 45, '48', 'Booking Placed', 'off line payment', '2018-10-07 02:53:59', 'Shel9A7DA64138', 'Not Paid', ''),
(184, 45, '240', 'Paid', 'off line payment', '2018-10-07 02:55:47', 'Shel612E5EA99A', 'pid8CE9A97D94', '123132423dfghf'),
(185, 45, '240', 'Booking Placed', 'off line payment', '2018-10-07 03:08:28', 'ShelB130A6967A', 'Not Paid', ''),
(186, 45, '60', 'Booking Placed', 'off line payment', '2018-10-07 03:13:51', 'ShelF3288EEF1B', 'Not Paid', ''),
(188, 45, '48', 'Booking Placed', 'off line payment', '2018-10-07 03:22:10', 'Shel4959D96C63', 'pid62E63FBE89', '122333SDD'),
(189, 45, '100', 'Paid', 'off line payment', '2018-10-07 03:46:21', 'Shel3028927D9D', 'pid7C8FB09854', '123132423dfghf'),
(190, 46, '0', 'Order Placed', 'Free Adoption', '2018-10-07 04:44:56', 'AdidACAED4D64A', 'Not Paid', ''),
(191, 46, '72', 'Paid', 'off line payment', '2018-10-07 04:47:57', 'Shel0FFFAA1F35', 'pidF7D6243B75', '123132423dfghf'),
(192, 46, '37', 'Paid', 'off line payment', '2018-10-07 04:52:35', 'ividE58617706A', 'pid020D2ABEFE', '4646554564gffgf'),
(193, 46, '999', 'Order Placed', 'off line payment', '2018-10-07 05:23:21', 'ivid5E130AD086', 'Not Paid', ''),
(194, 46, '1800', 'Trainer Confirm', 'off line payment', '2018-10-07 05:24:22', 'trai386FBAB71D', 'Not Paid', '');

-- --------------------------------------------------------

--
-- Table structure for table `ordertracking`
--

CREATE TABLE `ordertracking` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordertracking`
--

INSERT INTO `ordertracking` (`id`, `orderid`, `status`, `message`, `timestamp`) VALUES
(16, 34, 'Cancelled', ' ', '2018-08-30 08:33:20'),
(17, 42, 'Cancelled', ' ', '2018-08-30 08:34:39'),
(18, 41, 'Cancelled', ' ', '2018-08-30 08:35:00'),
(19, 42, 'Dispatched', ' ', '2018-08-30 09:01:13'),
(20, 41, 'Dispatched', ' ', '2018-08-30 09:01:22'),
(21, 88, 'Cancelled', ' ', '2018-09-03 13:08:03'),
(22, 27, 'Delivered', ' thank you for your purchase ', '2018-09-07 06:51:04'),
(23, 74, 'Delivered', ' ', '2018-09-07 06:51:44'),
(24, 89, 'Delivered', ' thanks for order', '2018-09-08 15:32:06'),
(25, 88, 'Dispatched', ' cancelled', '2018-09-08 15:32:49'),
(26, 89, 'In Progress', ' dfasf', '2018-09-08 16:39:52'),
(27, 92, 'Cancelled', ' change house ', '2018-09-11 14:06:56'),
(28, 120, 'Cancelled', ' tt', '2018-09-12 11:54:35'),
(29, 93, 'Cancelled', ' ', '2018-09-13 09:47:03'),
(30, 144, 'Cancelled', ' no time', '2018-09-13 19:53:03'),
(31, 155, 'Cancelled', ' ', '2018-09-22 16:05:58'),
(32, 128, 'Cancelled', ' ', '2018-09-22 16:28:28'),
(33, 156, 'Cancelled', ' ', '2018-09-22 16:43:06'),
(34, 158, '', ' ', '2018-09-22 21:15:11'),
(35, 158, 'Paid', ' ', '2018-09-22 21:15:23'),
(36, 83, 'Paid', ' ', '2018-09-22 21:31:15'),
(37, 154, 'Delivered', ' ', '2018-09-23 02:14:03'),
(38, 159, 'Delivered', ' ', '2018-09-23 02:14:29'),
(39, 163, 'In Progress', ' ', '2018-09-23 02:14:49'),
(40, 153, 'Delivered', ' ', '2018-09-23 02:16:45'),
(41, 163, 'Delivered', ' ', '2018-09-23 02:22:58'),
(42, 163, 'In Progress', ' ', '2018-09-23 02:45:10'),
(43, 159, 'In Progress', ' ', '2018-09-23 03:00:42'),
(44, 158, 'In Progress', ' ', '2018-09-23 03:10:36'),
(45, 144, 'In Progress', ' ', '2018-09-23 03:17:13'),
(46, 172, 'Cancelled', ' ', '2018-09-23 16:01:41'),
(47, 171, 'Cancelled', ' ', '2018-09-23 16:17:01'),
(48, 187, 'Cancelled', ' ', '2018-10-07 03:16:52');

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `id` int(255) NOT NULL,
  `petname` varchar(255) DEFAULT NULL,
  `petdescription` varchar(255) DEFAULT NULL,
  `petcategory` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `trained` varchar(255) DEFAULT NULL,
  `adopt` int(11) NOT NULL DEFAULT '0',
  `price` varchar(11) NOT NULL DEFAULT '0',
  `thumb` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`id`, `petname`, `petdescription`, `petcategory`, `gender`, `age`, `trained`, `adopt`, `price`, `thumb`) VALUES
(5, 'Silver', 'Silver got Rescued and treated by Paw Foundation. He faced accident on road and lost one leg. after 2 surgeries and treatment he is all healthy now. He is very friendly and playful in nature. Silver does not deserve to go on street again. please adopt him', 'Dog', 'Male', 'Kitten', 'Yes', 0, '0', 'uploads/miki.jpg'),
(6, 'Flora', 'Flora got pregnant in very young age as she was a stray cat. she was merely 6 months old then, and sent to our shelter with her kittens. her kittens got adopted afterwards but she stayed. she needs a good home where she will get all the love and care that', 'Cat', 'Female', 'Young', 'Yes', 1, '0', 'uploads/flora.jpg'),
(7, 'jacky', 'This gorgeous lady is up for adoption. she got her name after her owner â€œJunior Tilottomaâ€. for ownerâ€™s family problem she can not keep her anymore. and Titly can not survive on street as she has been raised as indoor dog since she was little. so pl', 'Dog', 'Female', 'Young', 'Yes', 1, '0', 'uploads/jacky.jpg'),
(8, 'tuntiny', 'Penny was sent to us by someone who found her wandering in their roof. she looked like someoneâ€™s pet who has been lost somehow. she would not survive on street. thatâ€™ the reason we kept her though she was an adult cat by then. and she got some missing', 'Cat', 'Female', 'Kitten', 'Yes', 0, '0', 'uploads/IMG_20180825_210127.jpg'),
(9, 'PENNY', 'Penny was sent to us by someone who found her wandering in their roof. she looked like someoneâ€™s pet who has been lost somehow. she would not survive on street. thatâ€™ the reason we kept her though she was an adult cat by then. and she got some missing', 'Cat', 'Male', 'Young', 'Yes', 0, '0', 'uploads/penny.jpg'),
(10, 'Siam', 'Breed:\r\nHimalayan Mix\r\nColor:\r\nCream\r\nAge:\r\nAdult\r\nSize:\r\n(when grown) Standard\r\nWeight\r\nSex\r\nMale\r\nPet ID\r\nHair\r\nShort', 'Rabbits', 'Male', 'Young', 'Yes', 0, '0', 'uploads/rabbit1.jpg'),
(11, 'Richard', 'Domestic Short Hair   Yigo, GU\r\nKitten   Male   Small', 'Cat', 'Female', 'Kitten', 'Yes', 0, '0', 'uploads/resc.jpg'),
(12, 'Big Mac', 'og\r\nBreed	American Pit Bull - Retriever\r\nSex	Male\r\nColor	White, Chocolate\r\nAge	3 years and 2 months\r\nWeight	63 lbs\r\nLocation	Dog Yellow Pod\r\nKennel	7\r\nCode #	219355', 'Dog', 'Male', 'Young', 'Yes', 0, '0', 'uploads/big.jpg'),
(13, 'Jane', 'Labrador - Mix\r\nSex	Female\r\nColor	Yellow\r\nAge	6 months\r\nWeight	19.1 lbs\r\nLocation	Dog Red Pod\r\nKennel	54\r\nCode #	222373', 'Dog', 'Female', 'Young', 'Yes', 0, '0', 'uploads/jane.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `catid` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `catid`, `price`, `thumb`, `description`) VALUES
(19, 'General Knowledge 2018', 3, '16', 'uploads/General Knowledge 2018.jpg', 'An editorial team of highly skilled professionals at Arihant, works hand in glove to ensure that the students receive the best and accurate content through our books. From inception till the book comes out from print, the whole team comprising of authors,'),
(20, 'The Power of your Subconscious Mind', 3, '99', 'uploads/The Power of your Subconscious Mind.jpg', 'It\'s a very good n very useful book n it should be read by each n every one ...to knw the things that are not aware and know about the mind power .. Super duper book --ByAmazon Customeron 19 March 2017'),
(21, 'Think and Grow Rich', 3, '75', 'uploads/Think and Grow Rich.jpg', 'An American journalist, lecturer and author, Napoleon Hill is one of the earliest producers of \'personal-success literature . As an author of self-help books, Hill has always abided by and promoted principle of intense and burning passion being the sole k'),
(22, 'Dry Dog Food', 5, '1115', 'uploads/IDShot_540x540.jpg', '\r\n \r\nACANA Heritage Free Run Poultry Formula Grain Free Dry Dog Food'),
(23, 'ORIJEN', 5, '882', 'uploads/images.jpg', '\r\n \r\nORIJEN Original Dry Dog Food'),
(24, 'Dry Food', 5, '999', 'uploads/1542486-center-1.jpg', '\r\n \r\nTaste Of The Wild High Prairie Dry Dog Food'),
(25, 'DRT CAT FOOD', 4, '450', 'uploads/C5.jpg', 'Purrfect Bistro Grain Free Real Chicken Recipe Dry Cat Food'),
(26, 'BIRD FOOD', 6, '111', 'uploads/1451715-center-1.jpg', 'Kaytee Basic Blend Wild Bird Food is an everyday favorite for both bird-watchers and wild birds. This classic food includes a number of different grains to attract a wide variety of birds throughout the seasons. Itâ€™s been a mainstay in backyard feeders '),
(27, 'Stella & Chewy\'s Chicken Meal Mixers ', 7, '37', 'uploads/fpd.jpg', 'Kickstart your canineâ€™s kibble with Stella & Chewy\'s Chewy\'s Chicken Meal Mixers Freeze-Dried Raw Dog Food Topper. Delivering a boost of nutrition and yummy flavor, itâ€™s an easy way to pack your poochâ€™s diet with nutrients, probiotics and antioxidan');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `review` text NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `pid`, `uid`, `review`, `timestamp`) VALUES
(8, 27, 7, 'ok\r\n', '2018-09-01 09:21:25'),
(9, 25, 7, 'lo', '2018-09-01 09:25:04'),
(10, 25, 7, 'hyjk', '2018-09-01 09:25:14'),
(11, 25, 7, 'hyjk', '2018-09-01 09:25:50'),
(12, 25, 7, 'nice\r\n', '2018-09-01 09:26:06'),
(17, 26, 7, 'ko', '2018-09-01 10:15:09'),
(18, 27, 7, 'asds', '2018-09-01 10:20:46'),
(22, 19, 9, 'jhk', '2018-09-01 10:31:54'),
(23, 19, 9, 'asd', '2018-09-01 10:33:02'),
(26, 6, 7, 'nice pet', '2018-09-11 14:28:54'),
(27, 5, 7, 'nice pet', '2018-09-12 21:41:22'),
(28, 5, 7, 'nice pet', '2018-09-12 21:41:36'),
(29, 5, 7, 'nice pet', '2018-09-12 21:41:52'),
(30, 18, 7, 'good', '2018-09-12 21:52:23'),
(31, 103, 7, 'ok\r\n', '2018-09-22 16:50:19');

-- --------------------------------------------------------

--
-- Table structure for table `shelter`
--

CREATE TABLE `shelter` (
  `id` int(11) NOT NULL,
  `sheltername` varchar(255) NOT NULL,
  `discription` varchar(255) NOT NULL,
  `sheltertype` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `shelterlocation` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shelter`
--

INSERT INTO `shelter` (`id`, `sheltername`, `discription`, `sheltertype`, `price`, `duration`, `shelterlocation`, `thumb`) VALUES
(4, 'Abl Animal Shelter', 'ALB animal shelter was created mainly for the stray animals of Bangladesh. we rescue, foster and give them up for adoption. we try to educate pet owners about urgent veterinary help, vaccinations and sterilizations. we use our ALB group as a platform for ', 'Any', '20', 'Less Than A Week', 'Narayanganj', 'uploads/abl.jpg'),
(5, 'âCARE FOR PAWSâž', 'âCARE FOR PAWSâž is a non-profit Animal Welfare Organization in Bangladesh working for the betterment of helpless stray animals. We rehabilitate animals that have been neglected, abused and injured on the street. With the help of volunteers and Vets, o', 'Dog and Cat', '35', 'A WEEK', 'Dhanmondi', 'uploads/Cfp.jpg'),
(6, 'Cause for Paws', 'Cause for Paws of is a 501c3 non-profit organization committed to protecting, nurturing, and finding homes for unwanted or displaced animals. Through our services, collaboration with other organizations, and thrift stores, we strive to improve our communi', 'Cat', '30', 'A WEEK', 'Dhanmondi', 'uploads/cus of pow.jpg'),
(7, 'theast Animal Shelter', 'theast Animal Shelter, established in 1976, is one of New Englandâ€™s largest non-profit, no-kill animal shelters.  We have placed over 133,000 cats and dogs since we opened our doors.\r\nWe are located just a half hour north of Boston and easily accessible', 'Dog and Cat', '35', 'Less Than A Week', 'keraniganj', 'uploads/ret.jpg'),
(8, 'Foothills Animal Shelter', 'Foothills Animal Shelter is an open-admissions facility, which means we never turn away an animal. We care for more than 9,200 orphaned cats, kittens, dogs, puppies and critters every year with a compassionate team of staff and volunteers. (Unfortunately,', 'Dog', '40', 'A WEEK', 'lalmatia', 'uploads/fool.jpg'),
(9, 'A.D.O.P.T Animal Shelter', 'A.D.O.P.T. Pet Shelter is a private, â€œno-killâ€, non-profit animal shelter located in Naperville, IL. A.D.O.P.T. provides temporary shelter and care to dogs and cats in search of their forever home.', 'Dog', '35', 'A WEEK', 'Mahmudpur', 'uploads/adopt.jpg'),
(10, 'The Shelter Pet Project', 'Ask anyone who has adopted a pet and theyâ€™ll share with you their story of love, fun and companionship. Why? Because shelter pets are amazing!\r\n\r\nWithin the next year, 29 million people just like you intend to bring a pet into their families. If fewer t', 'Dog and Cat', '30', 'A WEEK', 'keraniganj', 'uploads/tspp.jpg'),
(11, 'Orange County Animal Services (OCAS) ', 'Orange County Animal Services (OCAS) is a progressive animal-welfare focused organization that enforces the Orange County Code to protect both citizens and animals.\r\n\r\nOCAS is the only open admission shelter in Orange County, which means that it does not ', 'Small animals', '25', 'A WEEK', 'lalmatia', 'uploads/ocas.jpg'),
(12, 'RSW', 'This refuge was incorporated in the State of Illinois on July 26, 1999 and licensed by the Illinois Department of Agriculture, Bureau of Animal Welfare in February 2001 as a rescue facility. \r\n\r\nOur mission is simple: to work in joint cooperation with all', 'Dog', '15', 'THREE WEEK', 'Dhaka', 'uploads/bird.jpg'),
(13, 'Baroo', ' Baroo is an online, searchable database of animals who need homes. It is also a directory of nearly 11,000 animal shelters and adoption organizations across the U.S., Canada and Mexico. Organizations maintain their own home pages and available-pet databa', 'Any', '24', 'A WEEK', 'Dhaka', 'uploads/baroo.jpg'),
(18, 'test', 'test 2', 'Farm type animals', '111', 'Less Than A Week', 'sylhet', 'uploads/ret.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `id` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`id`, `Email`, `timestamp`) VALUES
(1, 'jahiduk.alam13@gmail.com', '2018-09-07 08:36:36'),
(2, 'jahidul.alam13@diit.info', '2018-09-07 09:37:41'),
(3, 'jahidul@daffodil.ac', '2018-09-07 09:41:21'),
(4, 'jahidul@daffodil.ac', '2018-09-23 16:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `s_chat_messages`
--

CREATE TABLE `s_chat_messages` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `when` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `s_chat_messages`
--

INSERT INTO `s_chat_messages` (`id`, `user`, `message`, `when`) VALUES
(3, 'User1', 'hi', 1537112712),
(4, 'User1', 'wd', 1537112801),
(5, 'admin', 'hi', 1537115694),
(6, 'admin', 'ertet', 1537116596),
(7, 'admin', 'etert', 1537116598),
(8, 'admin', 'ertert', 1537116600),
(9, 'admin', 'ertert', 1537116602),
(10, 'admin', 'ertert', 1537116605),
(11, 'admin', 'ertert', 1537116607),
(12, 'admin', 'ertr', 1537116610),
(13, 'admin', 'erterter', 1537116612),
(14, 'admin', 'ertret', 1537116614),
(15, 'User', 'sss', 1537117504);

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `id` int(11) NOT NULL,
  `tname` varchar(255) NOT NULL,
  `tdescription` varchar(255) NOT NULL,
  `ttype` varchar(255) NOT NULL,
  `courseduration` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `texperinces` varchar(255) NOT NULL,
  `tlocation` varchar(255) NOT NULL,
  `adopt` int(11) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `thumb` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`id`, `tname`, `tdescription`, `ttype`, `courseduration`, `price`, `texperinces`, `tlocation`, `adopt`, `timestamp`, `thumb`) VALUES
(100, 'Patricia A. Jones', 'EXperience Dog trainer over ten yeare .well know trainer around the city. also have certification for DOG training.   ', 'Dog', 'Two Month', '250', 'More than Five Year ', 'Mahmudpur', 0, '2018-09-08 08:13:15', 'uploads/1.jpg'),
(103, 'Christina T Arthur', 'EXperience Dog trainer over ten yeare .well know trainer around the city. also have certification for DOG training.   ', 'Dog', 'Two Month', '150', 'More than Five Year ', 'Mahmudpur', 0, '2018-09-08 08:57:07', 'uploads/3.jpg'),
(104, 'John Ryan', 'John Ryan made the natural transition to begin training racehorses in 1997, firstly assisting Yogi Breisner.  John was then assistant trainer to Philip Mitchell in Epsom, became assistant trainer to his father and further consolidated this experience as a', 'Horses', 'Four Month', '1050', 'More than Ten Year', 'lalmatia', 0, '2018-09-08 08:58:18', 'uploads/8.jpg'),
(105, 'Lester M Czech', 'the natural transition to begin training racehorses in 1997, firstly assisting Yogi Breisner.  John was then assistant trainer to Philip Mitchell in Epsom, became assistant trainer to his father and further consolidated this experience as an assistant to ', 'Dog', 'One Month', '210', 'More than Five Year', 'Mahmudpur', 0, '2018-09-08 09:21:06', 'uploads/2.jpg'),
(106, 'Dino R Alexander', 'started his riding career with an amateur flat license and represented the British Amateur Association with notable successes throughout Europe.  John started his jump career as conditional jockey for racehorse trainer, Stan Mellor. ', 'Cat', 'Two Month', '250', 'THREE Year', 'Narayanganj', 0, '2018-09-08 09:22:22', 'uploads/6.jpg'),
(107, 'Frank S Wood', 'Michael was Assistant Trainer to Bernard van Cutsem at Stanley House Stables, Newmarket.  Following the death of Van Cutsem in 1975 Michael took out his own licence in 1976.  He trained from Cadland House Stables, which is still the family home, until his', 'Cat', 'THREE Month', '350', 'More than Ten Year', 'Dhanmondi', 0, '2018-09-08 09:23:35', 'uploads/5.jpg'),
(108, 'Janice A Palmer', 'Notable horses trained by Johnâ€™s father include Katieâ€™s (Irish 1000 Guineas and Coronation Stakes at Royal Ascot), Royal Heroine (Princess Margaret Group 3 at Ascot), Osric (Christmas Hurdle at Kempton Park), Motivator (The 1986 Coral Golden Hurdle Fi', 'Horses', 'Two Month', '450', 'More than Ten Year', 'Dhaka', 0, '2018-09-08 09:24:34', 'uploads/7.jpg'),
(109, 'Dorothy C Sharp', 'EXperience Dog trainer over ten yeare .well know trainer around the city. also have certification for DOG training.   ', 'Dog', 'One Month', '199', 'Four Year', 'lalmatia', 0, '2018-09-08 09:26:25', 'uploads/4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Active` int(11) DEFAULT '0',
  `ActivationCode` varchar(32) DEFAULT NULL,
  `ActivityClearance` varchar(10) NOT NULL DEFAULT 'dactive',
  `attempts` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `timestamp`, `Active`, `ActivationCode`, `ActivityClearance`, `attempts`) VALUES
(1, '', 'vivek@codingcyber.com', '26e0eca228b42a520565415246513c0d', '2017-10-27 12:05:10', 1, NULL, '', NULL),
(2, '', 'vivek1@codingcyber.com', '$2y$10$cMzHNUFGKma96MywHmVMbekuJZb1tSNLsevHzLnSRbcRicQVhEC6a', '2017-10-27 12:24:25', 1, NULL, '', NULL),
(6, '', 'vivek2@codingcyber.com', '$2y$10$apI7l.1wAS5pgbG4YfMrN.jNd5T3XmhecFuSV2M6UNdoUHImPXNxm', '2017-10-27 12:28:20', 1, NULL, '', NULL),
(7, 'mike', 'mike2016trison@gmail.com', '$2y$10$6IWYJM9ZkGWzXYe9tWD2POIOhC4XNMhD05nZW7ImvZVOzQQwD.DYa', '2018-08-26 05:42:13', 1, NULL, 'active', NULL),
(33, '', 'mhsporsho@gmail.com', '$2y$10$m2iE2YIflDxAEqrX3Oe/.uG7izk0N9sdpd5aht/fukDcW.2Aabgba', '2018-09-01 18:07:38', 1, 'd46ae644660aae40a9f5c511b54f8189', 'active', NULL),
(37, '', 'mohammadshuvo205@gmail.com', '$2y$10$ydqkiczGsa2VdIAZ30lQye7KNCEu84GSVUFEUAgemzTE.vHIph4Zi', '2018-09-02 13:05:22', 0, '7457475f5845429394ed0d4236c7f877', '', NULL),
(40, '', 'jahidul.alam13@diit.info', '$2y$10$GIErDmsOrPCCilqyY6/p5.pRsR3CWyEboOVaWKu8WY2dlkSquIDze', '2018-09-03 11:19:50', 1, '87f67f3d6edd0b647f94c07f509155ba', 'dactive', NULL),
(45, '', 'jahidul@daffodil.ac', '$2y$10$D9FZ3EUPn7NFjwCmj96BeOYMwqg0J8/1AYqMssNEUv67WHKrlF0xG', '2018-09-12 11:42:04', 1, '3223dec1c86004bae56149f13440cd7b', 'active', NULL),
(46, '', 'test@gmail.com', '$2y$10$LE2wB5F2ZDXaNAqS.7Ukd.I5yRYLMOCZyYVq8fDtSo8wksa3mPXN.', '2018-10-07 04:43:40', 1, '981ddb7a628edc80d402f8c7370187d3', 'active', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usersmeta`
--

CREATE TABLE `usersmeta` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usersmeta`
--

INSERT INTO `usersmeta` (`id`, `uid`, `firstname`, `lastname`, `company`, `address1`, `address2`, `city`, `state`, `country`, `zip`, `mobile`) VALUES
(1, 2, 'Vivek', 'V', 'Coding Cyber', 'Hyd', 'Hyd', 'Hyderabad', 'Telangana', '', '500060', ''),
(2, 6, 'Vivek', 'Vengala', 'Coding Cyber', '#201', 'DSNR', 'Hyderabad', 'Telangana', '', '500060', '9876543211'),
(3, 7, 'mike', 'trison', 'Dhaka', 'Dhaka', '32/31 b makeup khan road rayerbazer dhaka', 'dhaka', 'mohammodpur', 'BD', '1209', '1825501775'),
(4, 10, 'baki', 'jack', 'dhka', 'ucm/2/3/b', '32/1', 'dhaka', 'raygerbazer', 'BD', '1207', '01681805060'),
(5, 11, 'mishuk', 'alam', 'mishuk', '31/32/b', '3rd fooler ma bhabhon ', 'dhaka ', 'rayerbazer ', 'BD', '1209', '01681805060'),
(6, 14, 'kabir', 'khan', 'jolp', 'vax/2/dofler', '2/1 1st fooler', 'kabul', 'boly', '', '456789', '9087645321'),
(7, 43, 'lopi', 'asd', 'dhka', 'ucm/2/3/b', '32/1', 'dhaka', 'raygerbazer', 'BD', '1207', '01681805060'),
(8, 9, 'mishuk', 'alam', 'dhka', 'ucm/2/3/b', '32/1', 'dhaka', 'raygerbazer', 'BD', '1207', '01681805060'),
(10, 0, 'jahid', 'diit', 'diit', 'phanthopath 19/1', 'concred tower', 'dhaka ', 'panthopaht', 'BD', '1200', '01891234567'),
(11, 32, 'test id', 'diit', 'diit', 'phanthopath 19/1', 'concred tower', 'dhaka', 'panthopaht', 'BD', '1200', '01891234567'),
(12, 35, 'cvbxcdgf', 'dfgds', 'dsfgdsf', 'dsfgdsf', '', 'dfsgdsf', 'dsfgs', 'BD', '', '093450933345'),
(13, 37, 'erterwtew', 'esrtewrtew', 'ewrtewrt', 'ertewrtewr4', 'erwtewr4t', 'retewrt', 'ertewrt', 'BD', '56756', '56757578867'),
(14, 38, '', '', '', '', '', '', '', 'BD', '', ''),
(15, 39, 'jahidul', 'alam', 'dhka', 'dhaka', '32/1', 'dhaka', 'mohammodpur', 'BD', '1209', '01825501775'),
(16, 40, 'jahidul', '13alam', 'diit', 'phanthopath 19/1', 'concred tower', 'dhaka', 'panthopaht', 'BD', '1200', '01891234567'),
(17, 41, 'jahidul', 'alam', 'dhka', 'dhaka', '32/1', 'dhaka', 'mohammodpur', 'BD', '1209', '01825501775'),
(18, 44, 'jahidul', 'alam', 'dhka', 'dhaka', '32/1', 'dhaka', 'mohammodpur', 'BD', '1209', '1825501775'),
(19, 45, 'MD. Jahidul', 'Alam', 'Dhaka', '32/31 b makeup khan road', ' rayerbazer ', 'dhaka', 'mohammodpur', 'BD', '1209', '01825501775'),
(20, 46, 'test', 'khan', 'test khan', 'uk.12/3', '2fs ', 'london', 'manchaster', 'BD', '20000', '768903324');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `pid`, `uid`, `timestamp`) VALUES
(3, 21, 6, '2017-11-06 19:42:35'),
(4, 20, 7, '2018-08-29 13:05:00'),
(6, 20, 7, '2018-09-01 10:12:09'),
(7, 27, 7, '2018-09-03 12:45:56'),
(8, 9, 7, '2018-09-13 09:42:38'),
(9, 12, 7, '2018-09-22 20:08:37'),
(10, 12, 7, '2018-09-22 20:15:28'),
(11, 8, 7, '2018-09-22 20:16:29'),
(14, 8, 7, '2018-09-22 20:20:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lostandfound`
--
ALTER TABLE `lostandfound`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordertracking`
--
ALTER TABLE `ordertracking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shelter`
--
ALTER TABLE `shelter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_chat_messages`
--
ALTER TABLE `s_chat_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `usersmeta`
--
ALTER TABLE `usersmeta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `lostandfound`
--
ALTER TABLE `lostandfound`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;
--
-- AUTO_INCREMENT for table `ordertracking`
--
ALTER TABLE `ordertracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `shelter`
--
ALTER TABLE `shelter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `s_chat_messages`
--
ALTER TABLE `s_chat_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `trainer`
--
ALTER TABLE `trainer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `usersmeta`
--
ALTER TABLE `usersmeta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

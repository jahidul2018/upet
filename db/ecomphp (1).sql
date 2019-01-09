-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2018 at 06:52 AM
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
(2, 'mishuk', 'alam', 'jahidul.alam13@diit.info', 'e807f1fcf82d132f9bb018ca6738a19f');

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
  `productprice` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`id`, `pid`, `pquantity`, `orderid`, `productprice`) VALUES
(1, 19, '5', 1, '16'),
(2, 19, '5', 2, '16'),
(3, 1, '2', 2, '20990'),
(4, 1, '1', 3, '20990'),
(5, 20, '10', 3, '99'),
(6, 18, '1', 4, '12890'),
(7, 21, '1', 4, '75'),
(8, 2, '1', 5, '7590'),
(9, 19, '10', 5, '16'),
(10, 2, '1', 6, '7590'),
(11, 18, '1', 6, '12890'),
(12, 21, '1', 6, '75'),
(13, 1, '1', 7, '20990'),
(14, 18, '5', 7, '12890'),
(15, 2, '1', 8, '7590'),
(16, 19, '1', 9, '16'),
(17, 2, '1', 10, '7590'),
(18, 1, '6', 11, '20990'),
(19, 18, '6', 11, '12890'),
(20, 1, '1', 12, '20990'),
(21, 1, '1', 13, '20990'),
(22, 2, '1', 13, '7590'),
(23, 2, '1', 14, '7590'),
(24, 1, '1', 15, '20990'),
(26, 18, '1', 17, '12890'),
(27, 2, '1', 18, '7590'),
(28, 19, '1', 19, '16'),
(29, 26, '1', 20, '111'),
(30, 23, '1', 20, '882'),
(31, 25, '3', 20, '450'),
(32, 19, '1', 21, '16'),
(33, 19, '1', 22, '16'),
(34, 19, '1', 23, '16'),
(35, 23, '1', 24, '882'),
(36, 23, '1', 25, '882'),
(37, 21, '1', 26, '75'),
(38, 22, '1', 27, '1115'),
(39, 20, '1', 28, '99'),
(40, 23, '1', 29, '882'),
(41, 24, '1', 30, '999'),
(42, 25, '1', 31, '450'),
(43, 20, '1', 32, '99'),
(44, 24, '1', 33, '999'),
(45, 20, '1', 34, '99'),
(46, 24, '1', 34, '999'),
(47, 25, '1', 34, '450'),
(48, 22, '1', 34, '1115'),
(49, 21, '1', 35, '75'),
(50, 20, '1', 36, '99'),
(51, 22, '1', 37, '1115'),
(52, 25, '1', 38, '450'),
(53, 23, '1', 39, '882'),
(54, 24, '1', 40, '999'),
(55, 20, '1', 41, '99'),
(56, 22, '1', 41, '1115'),
(57, 19, '1', 42, '16'),
(58, 20, '1', 43, '99'),
(59, 20, '1', 44, '99'),
(60, 19, '1', 44, '16'),
(61, 24, '4', 44, '999'),
(62, 19, '6', 45, '16'),
(63, 20, '1', 46, '99'),
(64, 25, '1', 46, '450'),
(65, 25, '1', 47, '450'),
(66, 19, '1', 48, '16'),
(67, 25, '1', 48, '450'),
(68, 23, '1', 49, '882'),
(69, 21, '1', 49, '75'),
(70, 25, '1', 50, '450'),
(71, 24, '1', 51, '999'),
(72, 21, '1', 51, '75'),
(73, 24, '1', 52, '999'),
(74, 21, '1', 52, '75'),
(75, 25, '1', 53, '450'),
(76, 25, '1', 54, '450'),
(77, 24, '1', 55, '999'),
(78, 26, '1', 56, '111'),
(79, 24, '1', 57, '999'),
(80, 25, '1', 58, '450'),
(81, 25, '1', 59, '450'),
(82, 26, '1', 59, '111'),
(83, 24, '1', 60, '999'),
(84, 24, '1', 61, '999'),
(85, 24, '1', 62, '999'),
(86, 24, '1', 63, '999'),
(87, 21, '1', 64, '75'),
(88, 27, '1', 66, '37'),
(89, 25, '1', 67, '450'),
(90, 25, '1', 68, '450'),
(91, 27, '1', 69, '37'),
(92, 27, '1', 70, '37'),
(93, 26, '1', 71, '111'),
(94, 19, '1', 72, '16'),
(95, 24, '1', 73, '999'),
(96, 25, '10', 74, '450'),
(97, 24, '1', 75, '999'),
(98, 23, '1', 76, '882'),
(99, 26, '1', 77, '111'),
(100, 24, '1', 78, '999'),
(101, 23, '1', 79, '882'),
(102, 25, '7', 80, '450'),
(103, 26, '1', 81, '111'),
(104, 27, '1', 82, '37'),
(105, 24, '1', 83, '999'),
(106, 25, '5', 84, '450'),
(107, 25, '1', 85, '450'),
(108, 25, '1', 86, '450'),
(109, 23, '1', 87, '882'),
(110, 23, '1', 88, '882'),
(111, 24, '1', 89, '999');

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
  `paymentid` varchar(255) NOT NULL,
  `trnsid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `uid`, `totalprice`, `orderstatus`, `paymentmode`, `timestamp`, `ivid`, `paymentid`, `trnsid`) VALUES
(26, 7, '75', 'Order Placed', 'cashondelivery', '2018-08-30 05:50:54', '0', '', ''),
(27, 7, '1115', 'Delivered', 'cashondelivery', '2018-08-30 05:51:45', '0', '', ''),
(28, 7, '99', 'Order Placed', 'cash', '2018-08-30 05:53:23', '0', '', ''),
(29, 7, '882', 'Order Placed', 'cash', '2018-08-30 05:54:09', '0', '', ''),
(30, 7, '999', 'Order Placed', 'on', '2018-08-30 05:55:08', '0', '', ''),
(31, 7, '450', 'Order Placed', 'cash', '2018-08-30 05:58:09', '0', '', ''),
(32, 7, '99', 'Order Placed', 'cash', '2018-08-30 06:06:26', '0', '', ''),
(33, 7, '999', 'Order Placed', 'on', '2018-08-30 06:15:02', '0', '', ''),
(34, 14, '2663', 'Cancelled', 'cashondelivery', '2018-08-30 07:38:39', '0', '', ''),
(35, 14, '75', 'Order Placed', 'cashondelivery', '2018-08-30 07:41:14', '0', '', ''),
(36, 14, '99', 'Order Placed', 'cashondelivery', '2018-08-30 07:43:01', '0', '', ''),
(37, 14, '1115', 'Order Placed', 'cashondelivery', '2018-08-30 07:44:06', '0', '', ''),
(38, 14, '450', 'Order Placed', 'cashondelivery', '2018-08-30 07:52:06', '0', '', ''),
(39, 14, '882', 'Order Placed', 'on', '2018-08-30 07:53:08', '0', '', ''),
(40, 14, '999', 'Order Placed', 'on', '2018-08-30 07:54:04', '0', '', ''),
(41, 14, '1214', 'Dispatched', 'on', '2018-08-30 08:21:36', '0', '', ''),
(42, 14, '16', 'Dispatched', 'on', '2018-08-30 08:23:31', '0', '', ''),
(43, 14, '99', 'Order Placed', 'cashondelivery', '2018-08-30 08:52:57', '0', '', ''),
(44, 7, '4111', 'Order Placed', 'cashondelivery', '2018-08-30 09:51:42', '0', '', ''),
(45, 7, '96', 'Order Placed', 'on', '2018-08-30 09:58:23', '0', '', ''),
(46, 43, '549', 'Order Placed', 'on', '2018-08-31 11:26:56', '0', '', ''),
(47, 7, '450', 'Order Placed', 'cashondelivery', '2018-08-31 15:23:18', '0', '', ''),
(48, 7, '466', 'Order Placed', 'on', '2018-08-31 15:41:16', '0', '', ''),
(49, 7, '957', 'Order Placed', 'cashondelivery', '2018-09-01 08:44:08', '0', '', ''),
(50, 7, '450', 'Order Placed', 'on', '2018-09-01 08:57:38', '0', '', ''),
(51, 9, '1074', 'Order Placed', 'cashondelivery', '2018-09-01 10:25:43', '0', '', ''),
(52, 0, '1074', 'Order Placed', 'cashondelivery', '2018-09-01 11:36:38', '0', '', ''),
(53, 0, '450', 'Order Placed', 'on', '2018-09-01 11:49:12', '0', '', ''),
(54, 7, '450', 'Order Placed', 'cashondelivery', '2018-09-01 13:45:18', '0', '', ''),
(55, 0, '999', 'Order Placed', 'on', '2018-09-01 15:50:01', '0', '', ''),
(56, 32, '111', 'Order Placed', 'cashondelivery', '2018-09-01 15:55:01', '0', '', ''),
(57, 32, '999', 'Order Placed', 'on', '2018-09-01 16:05:22', '0', '', ''),
(58, 7, '450', 'Order Placed', 'on', '2018-09-01 17:56:57', '0', '', ''),
(59, 32, '561', 'Order Placed', 'on', '2018-09-02 06:38:30', '0', '', ''),
(60, 32, '999', 'Order Placed', 'on', '2018-09-02 07:10:38', '0', '', ''),
(61, 32, '999', 'Order Placed', 'paypal', '2018-09-02 07:11:56', '0', '', ''),
(62, 7, '999', 'Order Placed', 'off line payment', '2018-09-02 10:15:14', '0', '', ''),
(63, 7, '999', 'Order Placed', 'off line payment', '2018-09-02 11:10:29', '0', '', ''),
(64, 7, '75', 'Order Placed', 'off line payment', '2018-09-02 11:12:09', '0', '', ''),
(65, 7, '0', 'Order Placed', 'off line payment', '2018-09-02 11:13:57', '0', '', ''),
(66, 7, '37', 'Order Placed', 'off line payment', '2018-09-02 11:31:33', '0', '', ''),
(67, 7, '450', 'Order Placed', 'off line payment', '2018-09-02 11:38:06', 'ivid8E6860CA39', 'pid15821A8FCF', '4646554564gffgf'),
(68, 35, '450', 'Order Placed', 'off line payment', '2018-09-02 12:16:30', 'ividECC0385FE6', 'pidDCB88A2FA9', '12314cvfbcg'),
(69, 35, '37', 'Order Placed', 'off line payment', '2018-09-02 12:53:55', 'ivid15F2013A3B', 'pidE855304A50', '121334354xcddgf'),
(70, 37, '37', 'Order Placed', 'off line payment', '2018-09-02 13:08:18', 'ivid252FB41B7E', 'pidFC7B95282D', '123132423dfghf'),
(71, 38, '111', 'Order Placed', 'off line payment', '2018-09-02 16:12:06', 'ivid57C623FBD0', '', ''),
(72, 38, '16', 'Order Placed', 'off line payment', '2018-09-02 16:24:13', 'ividCD533F8626', 'pidD66723EF7B', 'as12345678as'),
(73, 39, '999', 'Order Placed', 'off line payment', '2018-09-02 16:35:43', 'ivid864518B2D7', 'pid45838BDFE5', 'asdasdsda242'),
(74, 39, '4500', 'Delivered', 'off line payment', '2018-09-02 16:37:16', 'ivid7E4CE1CFF3', '', ''),
(75, 40, '999', 'Order Placed', 'off line payment', '2018-09-03 11:20:46', 'ivid3D39E67BF9', '', ''),
(76, 40, '882', 'Order Placed', 'off line payment', '2018-09-03 11:51:37', 'ivid7496A3ADB5', '', ''),
(77, 7, '111', 'Order Placed', 'off line payment', '2018-09-03 12:20:17', 'ivid2D0A921638', 'pid10A1275F7B', '33433345345d'),
(78, 40, '999', 'Order Placed', 'off line payment', '2018-09-03 12:24:15', 'ivid5931E1887B', '', ''),
(79, 40, '882', 'Order Placed', 'off line payment', '2018-09-03 12:27:21', 'ivid0669886D99', '', ''),
(80, 7, '3150', 'Order Placed', 'off line payment', '2018-09-03 12:37:41', 'ividFE84B74513', '', ''),
(81, 7, '111', 'Order Placed', 'cash on delivery', '2018-09-03 12:41:52', 'ivid5012D86F76', '', ''),
(82, 7, '37', 'Order Placed', 'cash on delivery', '2018-09-03 12:46:37', 'ivid71644C5859', 'pid2300456B6A', '33333333333333'),
(83, 7, '999', 'Order Placed', 'off line payment', '2018-09-03 12:49:16', 'ivid6AAA176878', 'pidB4B09CBC32', '34354545645646'),
(84, 7, '2250', 'Order Placed', 'off line payment', '2018-09-03 12:53:27', 'ivid3ECA882A69', 'pid329B2E864B', '34354545645646'),
(85, 7, '450', 'Order Placed', 'off line payment', '2018-09-03 12:57:10', 'ividD01E1BEC2B', '', ''),
(86, 7, '450', 'Order Placed', 'off line payment', '2018-09-03 12:58:46', 'ividA3A9474544', '', ''),
(87, 7, '882', 'Order Placed', 'off line payment', '2018-09-03 12:59:31', 'ividAFB2506E06', '', ''),
(88, 7, '882', 'Cancelled', 'off line payment', '2018-09-03 13:07:53', 'ivid3086CD9331', '', ''),
(89, 41, '999', 'Order Placed', 'off line payment', '2018-09-05 11:47:50', 'ividDFFABE00E5', 'pid4EEC029238', '123132423dfghf');

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
(23, 74, 'Delivered', ' ', '2018-09-07 06:51:44');

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
  `thumb` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`id`, `petname`, `petdescription`, `petcategory`, `gender`, `age`, `trained`, `thumb`) VALUES
(1, 'nini', 'mini was someoneâ€™s pet. she was sent to our shelter for fostering and the owner didnâ€™t take her back afterwards. she is a very unfortunate cat. she isnâ€™t friendly with other cats much but very fond of humans. she got grumpy recently as she doesnâ€™t', 'Cat', 'Female', 'Young', 'Yes', 'uploads/mini.jpg'),
(5, 'Silver', 'Silver got Rescued and treated by Paw Foundation. He faced accident on road and lost one leg. after 2 surgeries and treatment he is all healthy now. He is very friendly and playful in nature. Silver does not deserve to go on street again. please adopt him', 'Dog', 'Male', 'Kitten', 'Yes', 'uploads/miki.jpg'),
(6, 'Flora', 'Flora got pregnant in very young age as she was a stray cat. she was merely 6 months old then, and sent to our shelter with her kittens. her kittens got adopted afterwards but she stayed. she needs a good home where she will get all the love and care that', 'Cat', 'Female', 'Young', 'Yes', 'uploads/flora.jpg'),
(7, 'jacky', 'This gorgeous lady is up for adoption. she got her name after her owner â€œJunior Tilottomaâ€. for ownerâ€™s family problem she can not keep her anymore. and Titly can not survive on street as she has been raised as indoor dog since she was little. so pl', 'Dog', 'Female', 'Young', 'Yes', 'uploads/jacky.jpg'),
(8, 'tuntiny', 'Penny was sent to us by someone who found her wandering in their roof. she looked like someoneâ€™s pet who has been lost somehow. she would not survive on street. thatâ€™ the reason we kept her though she was an adult cat by then. and she got some missing', 'Cat', 'Female', 'Kitten', 'Yes', 'uploads/IMG_20180825_210127.jpg'),
(9, 'PENNY', 'Penny was sent to us by someone who found her wandering in their roof. she looked like someoneâ€™s pet who has been lost somehow. she would not survive on street. thatâ€™ the reason we kept her though she was an adult cat by then. and she got some missing', 'Cat', 'Male', 'Young', 'Yes', 'uploads/penny.jpg'),
(10, 'Siam', 'Breed:\r\nHimalayan Mix\r\nColor:\r\nCream\r\nAge:\r\nAdult\r\nSize:\r\n(when grown) Standard\r\nWeight\r\nSex\r\nMale\r\nPet ID\r\nHair\r\nShort', 'Rabbits', 'Male', 'Young', 'Yes', 'uploads/rabbit1.jpg'),
(11, 'Richard', 'Domestic Short Hair   Yigo, GU\r\nKitten   Male   Small', 'Cat', 'Female', 'Kitten', 'Yes', 'uploads/resc.jpg'),
(12, 'Big Mac', 'og\r\nBreed	American Pit Bull - Retriever\r\nSex	Male\r\nColor	White, Chocolate\r\nAge	3 years and 2 months\r\nWeight	63 lbs\r\nLocation	Dog Yellow Pod\r\nKennel	7\r\nCode #	219355', 'Dog', 'Male', 'Young', 'Yes', 'uploads/big.jpg'),
(13, 'Jane', 'Labrador - Mix\r\nSex	Female\r\nColor	Yellow\r\nAge	6 months\r\nWeight	19.1 lbs\r\nLocation	Dog Red Pod\r\nKennel	54\r\nCode #	222373', 'Dog', 'Female', 'Young', 'Yes', 'uploads/jane.jpg');

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
(1, 1, 6, 'It&#39;s an awesome Product...', '2017-10-30 15:18:42'),
(8, 27, 7, 'ok\r\n', '2018-09-01 09:21:25'),
(9, 25, 7, 'lo', '2018-09-01 09:25:04'),
(10, 25, 7, 'hyjk', '2018-09-01 09:25:14'),
(11, 25, 7, 'hyjk', '2018-09-01 09:25:50'),
(12, 25, 7, 'nice\r\n', '2018-09-01 09:26:06'),
(13, 25, 7, '', '2018-09-01 09:30:33'),
(14, 25, 7, '', '2018-09-01 09:30:58'),
(15, 25, 7, '', '2018-09-01 09:31:12'),
(16, 25, 7, '', '2018-09-01 09:31:19'),
(17, 26, 7, 'ko', '2018-09-01 10:15:09'),
(18, 27, 7, 'asds', '2018-09-01 10:20:46'),
(19, 27, 0, 'ghj', '2018-09-01 10:23:41'),
(20, 19, 0, 'ko', '2018-09-01 10:30:14'),
(21, 19, 0, 'jhk', '2018-09-01 10:30:46'),
(22, 19, 9, 'jhk', '2018-09-01 10:31:54'),
(23, 19, 9, 'asd', '2018-09-01 10:33:02'),
(24, 25, 0, 'as', '2018-09-01 11:52:55'),
(25, 25, 0, 'fghfg', '2018-09-03 12:23:05');

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
(3, 'jahidul@daffodil.ac', '2018-09-07 09:41:21');

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `experinces` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `thumb` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `Active` int(11) DEFAULT NULL,
  `ActivationCode` varchar(32) DEFAULT NULL,
  `ActivityClearance` varchar(10) NOT NULL,
  `attempts` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `timestamp`, `Active`, `ActivationCode`, `ActivityClearance`, `attempts`) VALUES
(1, '', 'vivek@codingcyber.com', '26e0eca228b42a520565415246513c0d', '2017-10-27 12:05:10', NULL, NULL, '', NULL),
(2, '', 'vivek1@codingcyber.com', '$2y$10$cMzHNUFGKma96MywHmVMbekuJZb1tSNLsevHzLnSRbcRicQVhEC6a', '2017-10-27 12:24:25', NULL, NULL, '', NULL),
(6, '', 'vivek2@codingcyber.com', '$2y$10$apI7l.1wAS5pgbG4YfMrN.jNd5T3XmhecFuSV2M6UNdoUHImPXNxm', '2017-10-27 12:28:20', NULL, NULL, '', NULL),
(7, 'mike', 'mike2016trison@gmail.com', '$2y$10$6IWYJM9ZkGWzXYe9tWD2POIOhC4XNMhD05nZW7ImvZVOzQQwD.DYa', '2018-08-26 05:42:13', NULL, NULL, '', NULL),
(33, '', 'mhsporsho@gmail.com', '$2y$10$m2iE2YIflDxAEqrX3Oe/.uG7izk0N9sdpd5aht/fukDcW.2Aabgba', '2018-09-01 18:07:38', 0, 'd46ae644660aae40a9f5c511b54f8189', '', NULL),
(37, '', 'mohammadshuvo205@gmail.com', '$2y$10$ydqkiczGsa2VdIAZ30lQye7KNCEu84GSVUFEUAgemzTE.vHIph4Zi', '2018-09-02 13:05:22', 0, '7457475f5845429394ed0d4236c7f877', '', NULL),
(40, '', 'jahidul.alam13@diit.info', '$2y$10$GIErDmsOrPCCilqyY6/p5.pRsR3CWyEboOVaWKu8WY2dlkSquIDze', '2018-09-03 11:19:50', 0, '87f67f3d6edd0b647f94c07f509155ba', '', NULL),
(41, '', 'jahidul@daffodil.ac', '$2y$10$lkapZ2qY7h0ujmECbFKare9QaJt0AIsZwf6Mh/3Mim8MTFDSVzJQi', '2018-09-05 11:33:43', 0, 'c516467f782f1d344bef13405dc8ba64', '', NULL);

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
(3, 7, 'mike', 'trison', 'mike333', '32/31 b ', 'dhaka ', 'dhaka', 'raygerbazer', 'BD', '1207', '01681805060'),
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
(17, 41, 'jahidul', 'alam', 'dhka', 'dhaka', '32/1', 'dhaka', 'mohammodpur', 'BD', '1209', '01825501775');

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
(1, 1, 6, '2017-10-30 16:36:45'),
(2, 2, 6, '2017-10-30 16:38:07'),
(3, 21, 6, '2017-11-06 19:42:35'),
(4, 20, 7, '2018-08-29 13:05:00'),
(5, 25, 7, '2018-08-30 07:10:57'),
(6, 20, 7, '2018-09-01 10:12:09'),
(7, 27, 7, '2018-09-03 12:45:56');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT for table `ordertracking`
--
ALTER TABLE `ordertracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `shelter`
--
ALTER TABLE `shelter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `trainer`
--
ALTER TABLE `trainer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `usersmeta`
--
ALTER TABLE `usersmeta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

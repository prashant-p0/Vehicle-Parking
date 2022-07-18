-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2022 at 02:56 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehicle-parking-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Security_Code` int(55) NOT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Security_Code`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 7854445410, 11000, 'admin@gmail.com', '2f732ed33be2813f0f808e073b30043c', '2021-01-05 05:38:23');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `cid` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` int(11) NOT NULL,
  `description` text NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`cid`, `email`, `phone`, `description`, `uid`) VALUES
(1, 'manthanudamale7@gmail.com', 1414141414, 'fergrgergerg', 1),
(3, 'ayush@gmail.com', 866922488, 'efef', 1),
(4, 'ayush@gmail.com', 866922488, 'efef', 1),
(5, 'ayush@gmail.com', 866922488, 'efef', 1),
(21, 'ayush@gmail.com', 1111111111, 'fsffsf4534534534', 1),
(22, 'manthanudamale7@gmail.com', 2147483647, '53453453', 1),
(23, 'manthanudamale7@gmail.com', 2147483647, '512535334', 1),
(24, 'manthanudamale7@gmail.com', 2147483647, '512535334', 1),
(25, 'manthanudamale7@gmail.com', 2147483647, 'a88', 1),
(26, 'manthanudamale7@gmail.com', 2147483647, '52555', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `feedbacks` text NOT NULL,
  `suggestion` text NOT NULL,
  `Rate_US` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `phone`, `feedbacks`, `suggestion`, `Rate_US`, `date`) VALUES
(1, 'Prashant Pawar', 8585858585, 'We are delighted to be fellow supporters of Parking Network. Bringing together all aspects of airport parking related issues with like-minded businesses can only help improve our communication within the industry and outlying areas to aid its growth.', 'No Improvement', 'Satisfied', '2022-05-31 18:30:00'),
(2, 'Abhin Nair', 8585968596, 'What I really appreciate about Parking Network is its customer focussed approach: Whenever I need service from Parking Network there is always someone who can help us fast.', 'Just Improve User Interface', 'Neutral', '2022-05-10 18:30:00'),
(3, 'Tejas Pangarkar', 7451263256, 'I can’t say enough about the excellent work that the Parking Network team is doing linking business within the parking industry. Becoming a known player in the parking industry is not only a matter of references, it is also to be part of “Parking Network”.', 'Optimize User Interface', 'Very Satisfied', '2022-05-24 18:30:00'),
(4, 'Mohit Kumar', 7485961525, 'We’d seen Smart Parking\'s vehicle detection sensors in action for a neighbouring authority, and by learning from their experience have done even better. The biggest benefit for us has been the drop in infringements. There are no chalk marks to rub off the tyres, so drivers are encouraged to move.', 'Improve Functionality', 'Satisfied', '2022-05-19 18:30:00'),
(21, 'manthan udamale', 8669224880, 'tttt', 'ghfghf', 'Satisfied', '2022-06-05 12:44:08');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_email` varchar(55) NOT NULL,
  `c_website` varchar(55) NOT NULL,
  `c_address` varchar(255) NOT NULL,
  `last_update` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `c_name`, `c_email`, `c_website`, `c_address`, `last_update`) VALUES
(1, 'Demo Company', 'vparksystem@company.com', 'codeastro.com', '8169 Geigeer St NW', '2021-06-08 20:48:52');

-- --------------------------------------------------------

--
-- Table structure for table `subscirption`
--

CREATE TABLE `subscirption` (
  `sub_id` int(11) NOT NULL,
  `plan` varchar(50) NOT NULL,
  `validity` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscirption`
--

INSERT INTO `subscirption` (`sub_id`, `plan`, `validity`) VALUES
(1, 'Basic Plan', '1 Week'),
(2, 'Standard Plan', '1 Month'),
(3, 'Premium Plan', '12 Month');

-- --------------------------------------------------------

--
-- Table structure for table `subscripted_user`
--

CREATE TABLE `subscripted_user` (
  `sid` int(11) NOT NULL,
  `vehicle_no` varchar(20) NOT NULL,
  `vehiclename` varchar(20) NOT NULL,
  `vehicle_cat` varchar(20) NOT NULL,
  `ownername` varchar(30) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `plan` varchar(25) NOT NULL,
  `amount` int(11) NOT NULL,
  `validity` varchar(30) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `sdate` date NOT NULL DEFAULT current_timestamp(),
  `edate` date DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `payment_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscripted_user`
--

INSERT INTO `subscripted_user` (`sid`, `vehicle_no`, `vehiclename`, `vehicle_cat`, `ownername`, `mail`, `phone`, `plan`, `amount`, `validity`, `uid`, `sdate`, `edate`, `status`, `payment_status`, `payment_id`) VALUES
(15, 'MH-12-BD-1989', 'comput', 'two_wheelers', 'Manthan Udamale', 'manthanu8669224880@gmail.com', 8669224880, 'Basic Plan', 50, '1 Week', 1, '2022-05-13', '2023-08-26', 'updated', '', ''),
(58, 'XX-88-XX-9898', 'suzuki', 'two_wheelers', 'shubham', 'abhin@gmail.com', 8585858585, 'Basic Plan', 50, '1 Week', NULL, '2022-05-23', '2022-06-06', 'updated', 'complete', 'pay_JYlQVHxk1gpkHg'),
(59, 'LL-99-LL-9999', 'comput', 'four_wheelers', 'ayush', 'ayush@gmail.com', 8888888889, 'Basic Plan', 100, '1 Week', NULL, '2022-05-23', '2022-07-07', 'updated', 'complete', 'pay_JYlU5BUCa3GKfI'),
(61, 'AB-88-AB-8888', 'SUZUKI', 'four_wheelers', 'Manthan Udamale', 'manthanu8669224880@gmail.com', 8669224880, 'Basic Plan', 100, '1 Week', 1, '2022-05-25', '2022-07-02', 'updated', 'complete', 'pay_JZXTjOJvWXd3Lj'),
(62, 'WW-99-RR-6767', 'suzuki', 'four_wheelers', 'ayush', 'ayush@gmail.com', 8888888852, 'Basic Plan', 100, '1 Week', NULL, '2022-05-26', '2022-06-02', '', 'complete', 'pay_JZwOg1e3fvftce'),
(64, 'YY-56-TY-6754', 'comput', 'four_wheelers', 'ayush', 'ayush@gmail.com', 8888888877, 'Basic Plan', 100, '1 Week', NULL, '2022-05-27', '2022-06-03', '', 'complete', 'pay_JaDM26kXbBbS3e'),
(65, 'TT-56-IO-0987', 'HONDA', 'two_wheelers', 'ayush', 'ayush@gmail.com', 8669224880, 'Standard Plan', 200, '1 Month', 1, '2022-05-27', '2022-06-27', 'deleted', 'complete', 'pay_JaDSuihbQEsONT'),
(66, 'WW-99-PK-8989', 'comput', 'four_wheelers', 'Manthan Udamale', 'manthanu8669224880@gmail.com', 8669224880, 'Basic Plan', 100, '1 Week', 1, '2022-05-29', '2022-06-12', 'deleted', 'complete', 'pay_Jb3FuxrDDkkaP9'),
(67, 'SD-87-ER-7678', 'comput', 'four_wheelers', 'manthan udamale', 'manthanudamale7@gmail.com', 8669224880, 'Basic Plan', 100, '1 Week', 1, '2022-06-05', '2022-06-12', 'deleted', 'complete', 'pay_Jdokha0moDZRQl');

--
-- Triggers `subscripted_user`
--
DELIMITER $$
CREATE TRIGGER `update` BEFORE UPDATE ON `subscripted_user` FOR EACH ROW INSERT INTO sub_user_log VALUE(null, OLD.sid,OLD.vehicle_no,OLD.vehiclename,OLD.vehicle_cat,
OLD.ownername,OLD.phone,OLD.plan,OLD.amount,OLD.validity,
OLD.uid,OLD.sdate,OLD.edate,OLD.status,OLD.payment_status,
OLD.payment_id,NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `sub_user_log`
--

CREATE TABLE `sub_user_log` (
  `id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `vehicle_no` varchar(20) NOT NULL,
  `vehiclename` varchar(20) NOT NULL,
  `vehicle_cat` varchar(25) NOT NULL,
  `ownername` varchar(30) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `plan` varchar(25) NOT NULL,
  `amount` int(11) NOT NULL,
  `validity` varchar(30) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `sdate` date NOT NULL,
  `edate` date NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `payment_status` varchar(50) NOT NULL,
  `payment_id` varchar(50) NOT NULL,
  `cdate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_user_log`
--

INSERT INTO `sub_user_log` (`id`, `sid`, `vehicle_no`, `vehiclename`, `vehicle_cat`, `ownername`, `phone`, `plan`, `amount`, `validity`, `uid`, `sdate`, `edate`, `status`, `payment_status`, `payment_id`, `cdate`) VALUES
(67, 15, 'MH-12-BD-1989', 'comput', 'two_wheelers', 'manthan udamale', 8669224880, '', 1200, '12 Month', 1, '2022-05-13', '2023-08-12', 'updated', '', '', '2022-05-22'),
(68, 15, 'MH-12-BD-1989', 'comput', 'two_wheelers', 'manthan udamale', 8669224880, 'Premium Plan', 1200, '12 Month', 1, '2022-05-13', '2023-08-12', 'updated', '', '', '2022-05-22'),
(69, 15, 'MH-12-BD-1989', 'comput', 'two_wheelers', 'ayush', 8669224880, 'Basic Plan', 50, '1 Week', 1, '2022-05-13', '2023-08-19', 'updated', '', '', '2022-05-23'),
(70, 49, 'SS-00-SS-0000', 'comput', 'four_wheelers', 'manthan udamale', 8669224880, 'Standard Plan', 450, '1 Month', 1, '2022-05-23', '2022-06-23', '', '', '', '2022-05-23'),
(83, 56, 'QQ-00-QQ-8888', 'comput', 'four_wheelers', 'ayush', 8669224880, 'Basic Plan', 100, '1 Week', 1, '2022-05-23', '2022-08-21', 'updated', '', '', '2022-05-23'),
(84, 56, 'QQ-00-QQ-8888', 'comput', 'four_wheelers', 'ayush', 8669224880, 'Basic Plan', 100, '1 Week', 1, '2022-05-23', '2022-08-21', 'updated', '', '', '2022-05-23'),
(98, 61, 'AB-88-AB-8888', 'SUZUKI', 'four_wheelers', 'ayush', 8669224880, 'Standard Plan', 450, '1 Month', 1, '2022-05-25', '2022-06-25', '', 'pending', '', '2022-05-25'),
(99, 61, 'AB-88-AB-8888', 'SUZUKI', 'four_wheelers', 'ayush', 8669224880, 'Standard Plan', 450, '1 Month', 1, '2022-05-25', '2022-06-25', '', 'complete', 'pay_JZXRfrzSp7nEiV', '2022-05-25'),
(100, 61, 'AB-88-AB-8888', 'SUZUKI', 'four_wheelers', 'Manthan Udamale', 8669224880, 'Basic Plan', 100, '1 Week', 1, '2022-05-25', '2022-07-02', 'updated', 'pending', 'pay_JZXRfrzSp7nEiV', '2022-05-25'),
(101, 61, 'AB-88-AB-8888', 'SUZUKI', 'four_wheelers', 'Manthan Udamale', 8669224880, 'Basic Plan', 100, '1 Week', 1, '2022-05-25', '2022-07-02', 'updated', 'complete', 'pay_JZXTjOJvWXd3Lj', '2022-05-25'),
(102, 62, 'WW-99-RR-6767', 'suzuki', 'four_wheelers', 'ayush', 8888888852, 'Basic Plan', 100, '1 Week', NULL, '2022-05-26', '2022-06-02', '', 'pending', '', '2022-05-26'),
(103, 63, 'YY-88-UU-9898', 'TVS', 'four_wheelers', 'Manthan Sudam Udamale', 8669224877, 'Basic Plan', 100, '1 Week', NULL, '2022-05-27', '2022-06-03', '', 'pending', '', '2022-05-27'),
(104, 64, 'YY-56-TY-6754', 'comput', 'four_wheelers', 'ayush', 8888888877, 'Basic Plan', 100, '1 Week', NULL, '2022-05-27', '2022-06-03', '', 'pending', '', '2022-05-27'),
(105, 65, 'TT-56-IO-0987', 'HONDA', 'two_wheelers', 'ayush', 8669224880, 'Standard Plan', 200, '1 Month', 1, '2022-05-27', '2022-06-27', '', 'pending', '', '2022-05-27'),
(106, 65, 'TT-56-IO-0987', 'HONDA', 'two_wheelers', 'ayush', 8669224880, 'Standard Plan', 200, '1 Month', 1, '2022-05-27', '2022-06-27', '', 'complete', 'pay_JaDSuihbQEsONT', '2022-05-29'),
(107, 66, 'WW-99-PK-8989', 'comput', 'four_wheelers', 'Manthan Udamale', 8669224880, 'Basic Plan', 100, '1 Week', 1, '2022-05-29', '2022-06-05', '', 'pending', '', '2022-05-29'),
(108, 66, 'WW-99-PK-8989', 'comput', 'four_wheelers', 'Manthan Udamale', 8669224880, 'Basic Plan', 100, '1 Week', 1, '2022-05-29', '2022-06-12', 'updated', 'pending', '', '2022-05-29'),
(109, 66, 'WW-99-PK-8989', 'comput', 'four_wheelers', 'Manthan Udamale', 8669224880, 'Basic Plan', 100, '1 Week', 1, '2022-05-29', '2022-06-12', 'updated', 'complete', 'pay_Jb3FuxrDDkkaP9', '2022-05-29'),
(110, 67, 'SD-87-ER-7678', 'comput', 'four_wheelers', 'manthan udamale', 8669224880, 'Basic Plan', 100, '1 Week', 1, '2022-06-05', '2022-06-12', '', 'pending', '', '2022-06-05'),
(111, 66, 'WW-99-PK-8989', 'comput', 'four_wheelers', 'Manthan Udamale', 8669224880, 'Basic Plan', 100, '1 Week', 1, '2022-05-29', '2022-06-12', 'updated', 'complete', 'pay_Jb3FuxrDDkkaP9', '2022-06-13'),
(112, 67, 'SD-87-ER-7678', 'comput', 'four_wheelers', 'manthan udamale', 8669224880, 'Basic Plan', 100, '1 Week', 1, '2022-06-05', '2022-06-12', '', 'complete', 'pay_Jdokha0moDZRQl', '2022-06-13'),
(113, 66, 'WW-99-PK-8989', 'comput', 'four_wheelers', 'Manthan Udamale', 8669224880, 'Basic Plan', 100, '1 Week', 1, '2022-05-29', '2022-06-12', 'deleted', 'complete', 'pay_Jb3FuxrDDkkaP9', '2022-06-13'),
(114, 67, 'SD-87-ER-7678', 'comput', 'four_wheelers', 'manthan udamale', 8669224880, 'Basic Plan', 100, '1 Week', 1, '2022-06-05', '2022-06-12', 'deleted', 'complete', 'pay_Jdokha0moDZRQl', '2022-06-13');

-- --------------------------------------------------------

--
-- Table structure for table `sub_vehicle`
--

CREATE TABLE `sub_vehicle` (
  `sub_veh_id` int(11) NOT NULL,
  `category` varchar(30) NOT NULL,
  `amount` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_vehicle`
--

INSERT INTO `sub_vehicle` (`sub_veh_id`, `category`, `amount`, `sub_id`) VALUES
(1, 'two_wheelers', 50, 1),
(4, 'two_wheelers', 200, 2),
(5, 'four_wheelers', 100, 1),
(7, 'two_wheelers', 1200, 3),
(8, 'four_wheelers', 3000, 3),
(9, 'four_wheelers', 450, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(120) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `username`, `firstname`, `lastname`, `phone`, `address`, `password`, `time`) VALUES
(1, 'bunny@gmail.com', 'manthan', 'udamale', 8669224880, 'sdgdgd', '627661c621eab1b7b298abc47d1a250d', '2022-03-28 12:26:23');

-- --------------------------------------------------------

--
-- Table structure for table `vcategory`
--

CREATE TABLE `vcategory` (
  `ID` int(10) NOT NULL,
  `VehicleCat` varchar(120) DEFAULT NULL,
  `charges` varchar(50) NOT NULL,
  `space` varchar(7) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vcategory`
--

INSERT INTO `vcategory` (`ID`, `VehicleCat`, `charges`, `space`, `CreationDate`) VALUES
(47, 'two_wheelers', '12', '200', '2022-03-23 08:27:32'),
(49, 'four_wheelers', '25', '100', '2022-03-28 12:47:36'),
(57, 'three_wheeler', '15', '50', '2022-06-16 05:52:48');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_dummy`
--

CREATE TABLE `vehicle_dummy` (
  `id` int(11) NOT NULL,
  `VehicleCategory` varchar(20) NOT NULL,
  `VehicleCompanyname` varchar(20) NOT NULL,
  `RegistrationNumber` varchar(20) NOT NULL,
  `OwnerName` varchar(30) NOT NULL,
  `OwnerContactNumber` bigint(10) NOT NULL,
  `uid` int(11) NOT NULL,
  `cdate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle_dummy`
--

INSERT INTO `vehicle_dummy` (`id`, `VehicleCategory`, `VehicleCompanyname`, `RegistrationNumber`, `OwnerName`, `OwnerContactNumber`, `uid`, `cdate`) VALUES
(1, 'four_wheelers', 'HERO', 'MH-12-BD-1989', 'Manthan Sudam Udamale', 8669224880, 1, '2022-05-26 00:00:00'),
(2, 'four_wheelers', 'HERO', 'MH-12-BD-1989', 'Manthan Sudam Udamale', 8669224880, 1, '2022-05-26 00:00:00'),
(3, 'four_wheelers', 'HERO', 'MH-12-BD-1989', 'Manthan Sudam Udamale', 8669224880, 1, '2022-05-26 00:00:00'),
(4, 'four_wheelers', 'HERO', 'MH-12-BD-1989', 'Manthan Sudam Udamale', 8669224880, 1, '2022-05-26 00:00:00'),
(5, 'four_wheelers', 'HERO', 'MH-12-BD-1989', 'Manthan Sudam Udamale', 8669224880, 1, '2022-05-26 00:00:00'),
(6, 'four_wheelers', 'HERO', 'MH-12-BD-1989', 'Manthan Sudam Udamale', 8669224880, 1, '2022-05-26 13:21:39'),
(7, 'four_wheelers', 'HERO', 'MH-12-BD-1989', 'Manthan Sudam Udamale', 8669224880, 1, '2022-05-26 13:41:28'),
(8, 'four_wheelers', 'ktm', 'QQ-00-EE-9999', 'ayush', 8669224880, 1, '2022-05-26 13:51:31'),
(9, 'two_wheelers', 'tvs', 'MH-12-BD-1989', 'Manthan Sudam Udamale', 8669224880, 1, '2022-05-26 13:54:03'),
(10, 'two_wheelers', 'tvs', 'MH-12-BD-1989', 'Manthan Sudam Udamale', 8669224880, 1, '2022-05-26 13:58:31'),
(11, 'four_wheelers', 'bajaj', 'MH-98-UH-7890', 'manthan udamale', 8669224880, 1, '2022-05-26 14:05:01'),
(12, 'four_wheelers', 'ktm', 'RR-00-TT-0000', 'ayush', 8669224880, 1, '2022-05-26 14:08:12'),
(13, 'two_wheelers', 'KTM', 'CC-56-BB-6787', 'Manthan Sudam Udamale', 8669224880, 1, '2022-05-26 14:17:52'),
(14, 'four_wheelers', 'ACTIVA', 'HH-88-YY-9090', 'ayush', 8669224880, 1, '2022-05-28 12:54:03'),
(15, 'two_wheelers', 'comput', 'FF-89-GG-8989', 'Manthan Sudam Udamale', 8669224880, 1, '2022-05-28 12:58:53'),
(16, 'four_wheelers', 'comput', 'WW-78-TT-7878', 'Manthan Udamale', 8669224880, 1, '2022-05-28 13:00:18'),
(17, 'four_wheelers', 'comput', 'QQ-00-OK-0909', 'Manthan Sudam Udamale', 8669224880, 1, '2022-05-29 17:53:15'),
(18, 'four_wheelers', 'comput', 'TT-88-IJ-9090', 'Manthan Sudam Udamale', 8669224880, 1, '2022-05-29 18:23:40'),
(19, 'three_wheeler', 'comput', 'DD-09-MM-9807', 'Manthan Sudam Udamale', 8669224880, 1, '2022-06-13 11:35:27');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_info`
--

CREATE TABLE `vehicle_info` (
  `ID` int(10) NOT NULL,
  `ParkingNumber` varchar(120) DEFAULT NULL,
  `VehicleCategory` varchar(120) NOT NULL,
  `VehicleCompanyname` varchar(120) DEFAULT NULL,
  `RegistrationNumber` varchar(120) DEFAULT NULL,
  `OwnerName` varchar(120) DEFAULT NULL,
  `OwnerContactNumber` bigint(10) DEFAULT NULL,
  `InTime` timestamp NULL DEFAULT NULL,
  `OutTime` timestamp NULL DEFAULT NULL,
  `ParkingCharge` varchar(120) NOT NULL,
  `Remark` mediumtext NOT NULL,
  `Status` varchar(5) NOT NULL,
  `cdate` date NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(50) NOT NULL,
  `payment_id` varchar(50) NOT NULL,
  `uid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle_info`
--

INSERT INTO `vehicle_info` (`ID`, `ParkingNumber`, `VehicleCategory`, `VehicleCompanyname`, `RegistrationNumber`, `OwnerName`, `OwnerContactNumber`, `InTime`, `OutTime`, `ParkingCharge`, `Remark`, `Status`, `cdate`, `payment_status`, `payment_id`, `uid`) VALUES
(81, '85817', 'two_wheelers', 'comput', 'MH-12-BD-1989', 'manthan udamale', 8669224880, '2022-05-14 08:08:34', '2022-05-14 08:08:40', '0', 'Admin', 'Out', '2022-05-14', '', '', 1),
(84, '46763', 'two_wheelers', 'comput', 'MH-12-BD-1989', 'manthan udamale', 8669224880, '2022-05-14 08:30:32', '2022-05-14 08:33:12', '0', 'Admin', 'Out', '2022-05-14', '', '', 1),
(86, '95649', 'two_wheelers', 'bbb', 'MH-34-UH-4637', 'dcd', 8888888888, '2022-05-14 08:27:52', NULL, '', '', '', '2022-05-23', '', '', NULL),
(87, '57345', 'four_wheelers', 'ktm', 'DC-98-UN-6754', 'dcd', 8888888888, '2022-05-14 08:29:27', NULL, '', '', '', '2022-05-14', '', '', NULL),
(88, '78393', 'two_wheelers', 'comput', 'MH-12-BD-1989', 'ayush', 8669224880, '2022-05-14 08:34:57', '2022-05-21 18:22:58', '0', 'Admin', 'Out', '2022-05-14', '', '', 1),
(90, '45692', 'four_wheelers', 'comput', 'SD-87-ER-7678', 'manthan udamale', 8669224880, '2022-05-21 10:00:26', '2022-05-21 18:20:33', '0', 'Admin', 'Out', '2022-05-21', '', '', 1),
(98, '67595', 'four_wheelers', 'HERO', 'SD-87-ER-7678', 'ayush', 8669224880, '2022-05-23 17:22:27', '2022-05-29 06:59:46', '25', 'Admin', 'Out', '2022-05-23', 'complete', 'pay_Jax9phjsL6lDSQ', 1),
(99, '11410', 'four_wheelers', 'HERO', 'DD-09-MM-9807', 'Manthan Sudam Udamale', 8669224880, '2022-05-23 17:22:23', '2022-05-29 07:03:58', '25', 'Admin', 'Out', '2022-05-23', 'complete', 'pay_JaxE84lfhfZW9i', 1),
(100, '63996', 'two_wheelers', 'ktm', 'VV-00-BB-8989', 'manthan', 8669224880, '2022-05-23 17:22:14', '2022-05-29 07:06:46', '12', 'Admin', 'Out', '2022-05-23', 'complete', 'pay_JaxGsZYWpI2JaT', 1),
(110, '61882', 'four_wheelers', 'bajaj', 'BB-88-BB-8888', 'Manthan Udamale', 8669224889, '2022-05-23 17:52:46', '2022-05-25 17:45:57', '25', 'Admin', 'Out', '2022-05-23', 'complete', 'pay_JYksCUiJbcJ6bV', 1),
(126, '18328', 'two_wheelers', 'tvs', 'MH-12-BD-1989', 'Manthan Sudam Udamale', 8669224880, NULL, NULL, '', '', '', '2022-05-26', '', '', 1),
(132, '75706', 'four_wheelers', 'ktm', 'RR-00-TT-0000', 'ayush', 8669224880, '2022-05-26 08:42:57', '2022-05-26 08:43:34', '25', 'Admin', 'Out', '2022-05-26', 'complete', 'pay_JZnEqsc3lmkDCr', 1),
(137, '78379', 'four_wheelers', 'SUZUKI', 'AB-88-AB-8888', 'Manthan Udamale', 8669224880, '2022-05-31 18:39:33', '2022-05-31 18:40:06', '0', 'Admin', 'Out', '2022-05-29', '', '', 1),
(138, '11408', 'four_wheelers', 'comput', 'QQ-00-OK-0909', 'Manthan Sudam Udamale', 8669224880, '2022-05-31 18:38:55', '2022-06-14 18:20:45', '25', 'Admin', 'Out', '2022-05-29', 'complete', 'pay_Jb2fZSyyOf5EP6', 1),
(139, '64410', 'four_wheelers', 'comput', 'TT-88-IJ-9090', 'Manthan Sudam Udamale', 8669224880, '2022-05-31 18:38:54', NULL, '25', '', '', '2022-05-29', 'complete', 'pay_Jb3BY837KHgaih', 1),
(140, '33822', 'four_wheelers', 'ktm', 'MH-12-BD-1974', 'ayush', 8585858585, '2022-06-14 18:23:14', '2022-06-14 18:23:22', '25', 'Admin', 'Out', '2022-06-14', 'complete', 'pay_JhTLlavo7e48DL', NULL),
(141, '15765', 'two_wheelers', 'ktm', 'HG-09-OK-8976', 'dcd', 7845896585, '2022-06-16 06:14:09', NULL, '', '', '', '2022-06-16', '', '', NULL),
(142, '77476', 'two_wheelers', 'ktm', 'AS-09-UH-0909', 'ayush', 8888888888, '2022-06-16 06:15:10', NULL, '', '', '', '2022-06-16', '', '', NULL),
(143, '47256', 'four_wheelers', 'ktm', 'TH-98-GH-8765', 'ayush', 8669224874, '2022-06-16 06:34:46', NULL, '', '', '', '2022-06-16', '', '', NULL),
(144, '36015', 'four_wheelers', 'ss', 'GV-88-JI-8989', 'ayush', 8585858585, '2022-06-16 06:35:11', NULL, '', '', '', '2022-06-16', '', '', NULL),
(145, '39200', 'two_wheelers', 'ktm', 'WS-78-OL-8987', 'dcd', 8585858585, '2022-06-16 14:28:45', NULL, '', '', '', '2022-06-16', '', '', NULL),
(146, '22112', 'four_wheelers', 'comput', 'TG-09-PL-0956', 'dcd', 8888888889, '2022-06-16 14:31:11', NULL, '', '', '', '2022-06-16', '', '', NULL),
(147, '56890', 'four_wheelers', 'SUZUKI', 'AB-88-AB-8888', 'Manthan Udamale', 8669224880, NULL, NULL, '', '', 'req', '2022-06-16', '', '', 1),
(148, '98404', 'two_wheelers', 'ktm', 'TG-67-KM-8989', 'ayush', 8585858585, '2022-06-16 14:45:58', NULL, '', '', '', '2022-06-16', '', '', NULL),
(149, '60784', 'four_wheelers', 'suzuki', 'YG-09-OK-8976', 'bunny', 8562356985, '2022-06-20 17:02:39', NULL, '', '', '', '2022-06-20', '', '', NULL);

--
-- Triggers `vehicle_info`
--
DELIMITER $$
CREATE TRIGGER `delete` BEFORE DELETE ON `vehicle_info` FOR EACH ROW INSERT INTO vehicle_info_log VALUE(null, OLD.ID,OLD.VehicleCategory,OLD.RegistrationNumber,OLD.Ownername,
OLD.OwnerContactNumber,OLD.ParkingCharge,OLD.cdate,OLD.payment_status,
OLD.payment_id,"deleted", NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_info_log`
--

CREATE TABLE `vehicle_info_log` (
  `id` int(11) NOT NULL,
  `vid` varchar(120) NOT NULL,
  `VehicleCategory` varchar(120) NOT NULL,
  `Reg_No` varchar(120) NOT NULL,
  `Oname` varchar(120) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `charge` varchar(10) NOT NULL,
  `req_date` date NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `payment_id` varchar(50) NOT NULL,
  `action` varchar(10) NOT NULL,
  `cdate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle_info_log`
--

INSERT INTO `vehicle_info_log` (`id`, `vid`, `VehicleCategory`, `Reg_No`, `Oname`, `contact`, `charge`, `req_date`, `payment_status`, `payment_id`, `action`, `cdate`) VALUES
(4, '57', 'two_wheelers', 'NK-09-UH-9876', 'Tejas', 8669224880, '12', '2022-05-11', '', '', 'deleted', '2022-05-11'),
(6, '59', 'Two Wheelers', 'MH-12-BD-1989', 'ayush', 8669224880, '', '2022-05-13', '', '', 'deleted', '2022-05-13'),
(13, '33', 'Two Wheelers', 'mh42bd1989', 'Manthan Sudam Udamale', 8669224880, '76', '2022-04-17', '', '', 'deleted', '2022-05-13'),
(14, '43', 'four wheelers', 'mh42bd19', 'ayush', 8888888889, '0', '2022-04-17', '', '', 'deleted', '2022-05-13'),
(15, '44', 'Two Wheelers', 'mh42bd1989', 'ayush', 8888888889, '0', '2022-04-17', '', '', 'deleted', '2022-05-13'),
(16, '45', 'Two Wheelers', 'mh42bd1989', 'ayush', 8888888889, '0', '2022-04-17', '', '', 'deleted', '2022-05-13'),
(17, '46', 'four wheelers', 'MH-12-BD-1989', 'Manthan Sudam Udamale', 8669224880, '12', '2022-04-17', '', '', 'deleted', '2022-05-13'),
(18, '47', 'Two Wheelers', 'MH-34-UH-4637', 'ayush', 8888888889, '0', '2022-05-07', '', '', 'deleted', '2022-05-13'),
(21, '50', 'Two Wheelers', 'MH-34-UH-4637', 'ayush', 8888888889, '0', '2022-05-07', '', '', 'deleted', '2022-05-13'),
(22, '51', 'Two Wheelers', 'MH-12-BD-1989', 'Manthan Udamale', 8669224880, '0', '2022-05-07', '', '', 'deleted', '2022-05-13'),
(24, '54', 'two_wheelers', 'MH-98-UH-7890', 'Manthan Sudam Udamale', 8669224880, '0', '2022-05-09', '', '', 'deleted', '2022-05-13'),
(25, '55', 'four wheelers', 'BH-98-OK-0987', 'SSSS', 2102321456, '', '2022-05-10', '', '', 'deleted', '2022-05-13'),
(26, '56', 'Two Wheelers', 'BH-09-YG-5645', 'PPPP', 7485126301, '12', '2022-05-10', '', '', 'deleted', '2022-05-13'),
(32, '71', 'two_wheelers', 'MH-12-BD-1989', 'manthan udamale', 8669224880, '', '2022-05-13', '', '', 'deleted', '2022-05-14'),
(39, '74', 'two_wheelers', 'MH-12-BD-1989', 'manthan udamale', 8669224880, '', '2022-05-14', '', '', 'deleted', '2022-05-14'),
(42, '82', 'two_wheelers', 'MH-12-BD-1989', 'Manthan Sudam Udamale', 8669224880, '', '2022-05-14', '', '', 'deleted', '2022-05-14'),
(45, '85', 'four wheelers', 'AS-09-PK-7890', 'dcd', 8888888888, '', '2022-05-14', '', '', 'deleted', '2022-05-14'),
(46, '76', 'four_wheelers', 'AS-09-PK-7890', 'Manthan Sudam Udamale', 8669224880, '', '2022-05-14', '', '', 'deleted', '2022-05-15'),
(47, '77', 'two_wheelers', 'WS-34-YH-2345', 'tejas', 8669224880, '', '2022-05-14', '', '', 'deleted', '2022-05-15'),
(48, '89', 'four_wheelers', 'MH-12-BD-1989', 'ayush', 8669224880, '', '2022-05-21', '', '', 'deleted', '2022-05-22'),
(49, '91', 'four_wheelers', 'SD-87-ER-7678', 'manthan udamale', 8669224880, '0', '2022-05-22', '', '', 'deleted', '2022-05-23'),
(50, '93', 'two_wheelers', 'MH-12-BD-1989', 'Manthan Sudam Udamale', 8669224880, '0', '2022-05-23', '', '', 'deleted', '2022-05-23'),
(51, '94', 'four_wheelers', 'YY-00-YY-9999', 'ayush', 8669224880, '', '2022-05-23', '', '', 'deleted', '2022-05-23'),
(52, '95', 'two_wheelers', 'MH-12-BD-1989', 'ayush', 8669224880, '0', '2022-05-23', '', '', 'deleted', '2022-05-23'),
(53, '96', 'two_wheelers', 'MH-12-BD-1989', 'dcd', 8669224887, '', '2022-05-23', '', '', 'deleted', '2022-05-23'),
(54, '101', 'two_wheelers', 'VV-00-BB-8989', 'Manthan Sudam Udamale', 8669224889, '', '2022-05-23', '', '', 'deleted', '2022-05-23'),
(55, '102', 'two_wheelers', 'VV-00-BB-8989', 'Manthan Sudam Udamale', 8669224889, '', '2022-05-23', '', '', 'deleted', '2022-05-23'),
(56, '103', 'two_wheelers', 'VV-00-BB-8989', 'Manthan Sudam Udamale', 8669224889, '', '2022-05-23', '', '', 'deleted', '2022-05-23'),
(57, '104', 'two_wheelers', 'VV-00-BB-8989', 'Manthan Sudam Udamale', 8669224889, '', '2022-05-23', '', '', 'deleted', '2022-05-23'),
(58, '105', 'two_wheelers', 'VV-00-BB-8989', 'Manthan Sudam Udamale', 8669224889, '', '2022-05-23', '', '', 'deleted', '2022-05-23'),
(59, '106', 'two_wheelers', 'VV-00-BB-8989', 'Manthan Sudam Udamale', 8669224889, '', '2022-05-23', '', '', 'deleted', '2022-05-23'),
(60, '107', 'four_wheelers', 'TT-00-TT-7777', 'manthan udamale', 8669224889, '', '2022-05-23', '', '', 'deleted', '2022-05-23'),
(61, '108', 'four_wheelers', 'TT-00-TT-7777', 'manthan udamale', 8669224889, '', '2022-05-23', '', '', 'deleted', '2022-05-23'),
(62, '109', 'four_wheelers', 'MH-98-UH-7890', 'Manthan Sudam Udamale', 8669224889, '', '2022-05-23', '', '', 'deleted', '2022-05-23'),
(63, '112', 'two_wheelers', 'RR-12-RR-3434', 'ayush', 8669224889, '', '2022-05-23', '', '', 'deleted', '2022-05-23'),
(64, '114', 'four_wheelers', 'SS-00-EE-9999', 'Manthan Sudam Udamale', 8669224880, '', '2022-05-24', '', '', 'deleted', '2022-05-25'),
(65, '115', 'two_wheelers', 'NN-44-NN-5555', 'ayush', 8669224889, '', '2022-05-24', '', '', 'deleted', '2022-05-25'),
(66, '92', 'four_wheelers', 'AA-09-AA-0909', 'Manthan Sudam Udamale', 8669224889, '25', '2022-05-23', 'complete', 'pay_JYO6iSf2jZEdEF', 'deleted', '2022-05-25'),
(67, '113', 'two_wheelers', 'UU-12-UU-8765', 'tejas', 8669224889, '', '2022-05-23', 'complete', 'pay_JYl2ciglOprZp0', 'deleted', '2022-05-25'),
(68, '111', 'two_wheelers', 'RR-12-RR-3434', 'abhin', 8669224889, '12', '2022-05-23', 'complete', 'pay_JYkxCRjMKQL00g', 'deleted', '2022-05-25'),
(69, '116', 'four_wheelers', 'MH-12-BD-1989', 'Manthan Sudam Udamale', 8669224880, '', '2022-05-26', '', '', 'deleted', '2022-05-26'),
(70, '117', 'four_wheelers', 'MH-12-BD-1989', 'Manthan Sudam Udamale', 8669224880, '', '2022-05-26', '', '', 'deleted', '2022-05-26'),
(71, '118', 'four_wheelers', 'MH-12-BD-1989', 'Manthan Sudam Udamale', 8669224880, '', '2022-05-26', '', '', 'deleted', '2022-05-26'),
(72, '119', 'four_wheelers', 'MH-12-BD-1989', 'Manthan Sudam Udamale', 8669224880, '', '2022-05-26', '', '', 'deleted', '2022-05-26'),
(73, '120', 'four_wheelers', 'MH-12-BD-1989', 'Manthan Sudam Udamale', 8669224880, '', '2022-05-26', '', '', 'deleted', '2022-05-26'),
(74, '121', 'four_wheelers', 'MH-12-BD-1989', 'Manthan Sudam Udamale', 8669224880, '', '2022-05-26', '', '', 'deleted', '2022-05-26'),
(75, '122', 'four_wheelers', 'MH-12-BD-1989', 'Manthan Sudam Udamale', 8669224880, '', '2022-05-26', '', '', 'deleted', '2022-05-26'),
(76, '123', 'four_wheelers', 'MH-12-BD-1989', 'Manthan Sudam Udamale', 8669224880, '', '2022-05-26', '', '', 'deleted', '2022-05-26'),
(77, '124', 'four_wheelers', 'MH-12-BD-1989', 'Manthan Sudam Udamale', 8669224880, '', '2022-05-26', '', '', 'deleted', '2022-05-26'),
(78, '97', 'two_wheelers', 'MH-12-BD-1989', 'dcd', 8669224880, '', '2022-05-23', '', '', 'deleted', '2022-05-26'),
(79, '125', '', '', '', 8669224880, '', '2022-05-26', '', '', 'deleted', '2022-05-26'),
(80, '127', 'two_wheelers', 'MH-12-BD-1989', 'Manthan Sudam Udamale', 8669224880, '', '2022-05-26', '', '', 'deleted', '2022-05-26'),
(81, '128', 'two_wheelers', 'MH-12-BD-1989', 'Manthan Sudam Udamale', 8669224880, '', '2022-05-26', '', '', 'deleted', '2022-05-26'),
(82, '129', 'two_wheelers', 'MH-12-BD-1989', 'Manthan Sudam Udamale', 8669224880, '', '2022-05-26', '', '', 'deleted', '2022-05-26'),
(83, '130', 'two_wheelers', 'MH-12-BD-1989', 'Manthan Sudam Udamale', 8669224880, '', '2022-05-26', '', '', 'deleted', '2022-05-26'),
(84, '131', 'four_wheelers', 'MH-98-UH-7890', 'manthan udamale', 8669224880, '', '2022-05-26', 'complete', 'pay_JZnAwyi7F5E9uN', 'deleted', '2022-05-27'),
(85, '133', 'two_wheelers', 'CC-56-BB-6787', 'Manthan Sudam Udamale', 8669224880, '12', '2022-05-26', 'complete', 'pay_JZnOc6F6XpvnRA', 'deleted', '2022-05-27'),
(86, '134', 'four_wheelers', 'HH-88-YY-9090', 'ayush', 8669224880, '25', '2022-05-28', 'complete', 'pay_JaZ2vBcKVAuFz8', 'deleted', '2022-05-29'),
(87, '135', 'two_wheelers', 'FF-89-GG-8989', 'Manthan Sudam Udamale', 8669224880, '12', '2022-05-28', 'complete', 'pay_JaZ7Pi2XLNkyni', 'deleted', '2022-05-29'),
(88, '136', 'four_wheelers', 'WW-78-TT-7878', 'Manthan Udamale', 8669224880, '25', '2022-05-28', 'complete', 'pay_JaZ92NnylLTB0i', 'deleted', '2022-05-29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscirption`
--
ALTER TABLE `subscirption`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `subscripted_user`
--
ALTER TABLE `subscripted_user`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `sub_user_log`
--
ALTER TABLE `sub_user_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_vehicle`
--
ALTER TABLE `sub_vehicle`
  ADD PRIMARY KEY (`sub_veh_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `vcategory`
--
ALTER TABLE `vcategory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `vehicle_dummy`
--
ALTER TABLE `vehicle_dummy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_info`
--
ALTER TABLE `vehicle_info`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `vehicle_info_log`
--
ALTER TABLE `vehicle_info_log`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscirption`
--
ALTER TABLE `subscirption`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscripted_user`
--
ALTER TABLE `subscripted_user`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `sub_user_log`
--
ALTER TABLE `sub_user_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `sub_vehicle`
--
ALTER TABLE `sub_vehicle`
  MODIFY `sub_veh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vcategory`
--
ALTER TABLE `vcategory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `vehicle_dummy`
--
ALTER TABLE `vehicle_dummy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `vehicle_info`
--
ALTER TABLE `vehicle_info`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `vehicle_info_log`
--
ALTER TABLE `vehicle_info_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2021 at 12:56 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `code`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(225) NOT NULL,
  `city_desc` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`, `city_desc`) VALUES
(2, 'Colombo', 'Colombo'),
(3, 'Anuradapura', 'Anuradapura');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotel_id` int(100) NOT NULL,
  `hotel_name` varchar(225) NOT NULL,
  `hotel_description` varchar(225) NOT NULL,
  `hotel_location` varchar(225) NOT NULL,
  `hotel_address` varchar(225) NOT NULL,
  `hotel_contactno` int(11) NOT NULL,
  `hotel_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `pro_id` int(15) NOT NULL,
  `pro_name` text NOT NULL,
  `pro_description` text DEFAULT NULL,
  `pro_location` varchar(200) DEFAULT NULL,
  `pro_city` varchar(200) NOT NULL,
  `pro_contactno1` int(15) NOT NULL,
  `pro_address` varchar(200) NOT NULL,
  `pro_class` varchar(100) DEFAULT NULL,
  `pro_note` text DEFAULT NULL,
  `pro_crid` text NOT NULL,
  `pro_crdate` text NOT NULL,
  `pro_eid` text NOT NULL,
  `pro_edate` text NOT NULL,
  `pro_contactno2` int(15) NOT NULL,
  `pro_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`pro_id`, `pro_name`, `pro_description`, `pro_location`, `pro_city`, `pro_contactno1`, `pro_address`, `pro_class`, `pro_note`, `pro_crid`, `pro_crdate`, `pro_eid`, `pro_edate`, `pro_contactno2`, `pro_status`) VALUES
(1, 'qw', 'qq', 'qqq', 'Colombo', 0, 'qq', NULL, 'qq', '12345', '30-07-21 04:46:13', '12345', '30-07-21 04:46:13', 0, 0),
(2, 'CeyBank Pinnacle', 'pInacle Descruiption', 'Anuradapura', 'Select You Need City', 2147483647, 'Address heree,Address hereeAddress hereeAddress hereeAddress heree', NULL, 'Special Note HereSpecial Note HereSpecial Note HereSpecial Note Here', '12345', '30-07-21 04:47:52', '12345', '11-08-21 10:50:39', 2147483647, 1),
(3, 'CeyBank Pinnacle', 'pInacle Descruiption', 'Anuradapura', 'ss', 2147483647, 'Address heree,Address hereeAddress hereeAddress hereeAddress heree', NULL, 'Special Note HereSpecial Note HereSpecial Note HereSpecial Note Here', '12345', '30-07-21 12:19:34', '12345', '11-08-21 11:07:05', 2147483647, 0),
(5, 'CeyBank Pinnacle7777777', 'pInacle Descruiption', 'Anuradapura', 'qee', 2147483647, 'Address heree,Address hereeAddress hereeAddress hereeAddress heree', NULL, 'Special Note HereSpecial Note HereSpecial Note HereSpecial Note Here', '12345', '02-08-21 06:35:27', '12345', '04-08-21 08:46:02', 2147483647, 0),
(6, 'Cey Bank Katharagama test edit', 'Katharaghama Description  test edit', 'asd', 'Colombo', 986979, 'No 01 Kathagarama  test edit', NULL, 'was  test edit', '12345', '03-08-21 05:49:19', '12345', '11-08-21 11:05:14', 2147483647, 0);

-- --------------------------------------------------------

--
-- Table structure for table `property_roomtype_assign`
--

CREATE TABLE `property_roomtype_assign` (
  `prta_id` int(11) NOT NULL,
  `prta_proid` int(11) NOT NULL,
  `prta_rtypeid` int(11) NOT NULL,
  `prta_cdate` text NOT NULL,
  `prta_cid` varchar(11) NOT NULL,
  `prta_udate` text NOT NULL,
  `prta_uid` varchar(11) NOT NULL,
  `prta_pn_bb` float(8,2) DEFAULT NULL,
  `prta_pn_hb` float(8,2) DEFAULT NULL,
  `prta_pn_fb` float(8,2) DEFAULT NULL,
  `prta_ph_bb` float(8,2) DEFAULT NULL,
  `prta_ph_hb` float(8,2) DEFAULT NULL,
  `prta_ph_fb` float(8,2) DEFAULT NULL,
  `prta_sn_bb` float(8,2) DEFAULT NULL,
  `prta_sn_hb` float(8,2) DEFAULT NULL,
  `prta_sn_fb` float(8,2) DEFAULT NULL,
  `prta_sh_bb` float(8,2) DEFAULT NULL,
  `prta_sh_hb` float(8,2) DEFAULT NULL,
  `prta_sh_fb` float(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property_roomtype_assign`
--

INSERT INTO `property_roomtype_assign` (`prta_id`, `prta_proid`, `prta_rtypeid`, `prta_cdate`, `prta_cid`, `prta_udate`, `prta_uid`, `prta_pn_bb`, `prta_pn_hb`, `prta_pn_fb`, `prta_ph_bb`, `prta_ph_hb`, `prta_ph_fb`, `prta_sn_bb`, `prta_sn_hb`, `prta_sn_fb`, `prta_sh_bb`, `prta_sh_hb`, `prta_sh_fb`) VALUES
(1, 3, 11, '05-08-21 10:00:15', '12345', '05-08-21 10:00:15', '12345', 76.00, 76.00, 657.00, 67.00, 54.00, 7575.00, 0.00, 657.00, 75.00, 76.00, 76.00, 757.00),
(4, 5, 11, '05-08-21 10:45:30', '12345', '05-08-21 10:45:30', '12345', 44.00, 0.00, 0.00, 0.00, 0.00, 0.00, 444.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(7, 0, 11, '06-08-21 05:27:50', '12345', '06-08-21 05:27:50', '12345', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 2132.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(8, 2, 0, '06-08-21 05:42:16', '12345', '06-08-21 05:42:16', '12345', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(11, 4, 11, '06-08-21 05:55:11', '12345', '06-08-21 05:55:11', '12345', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(12, 3, 9, '06-08-21 06:08:43', '12345', '06-08-21 06:08:43', '12345', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(14, 2, 9, '06-08-21 06:17:37', '12345', '06-08-21 06:17:37', '12345', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(15, 6, 11, '06-08-21 06:18:17', '12345', '06-08-21 06:18:17', '12345', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(16, 4, 9, '06-08-21 09:03:38', '12345', '06-08-21 09:03:38', '12345', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(20) NOT NULL,
  `room_pro_id` varchar(20) NOT NULL,
  `room_type` varchar(25) NOT NULL,
  `room_no` int(20) NOT NULL,
  `room_name` varchar(100) NOT NULL,
  `room_pro_room_assign_id` varchar(20) NOT NULL,
  `room_status` varchar(10) NOT NULL,
  `room_description` text NOT NULL,
  `room_services` text NOT NULL,
  `room_uid` varchar(60) NOT NULL,
  `room_udate` varchar(60) NOT NULL,
  `room_cdate` varchar(60) NOT NULL,
  `room_cid` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_pro_id`, `room_type`, `room_no`, `room_name`, `room_pro_room_assign_id`, `room_status`, `room_description`, `room_services`, `room_uid`, `room_udate`, `room_cdate`, `room_cid`) VALUES
(1, '2', '11', 3, 'ss', '3', '2', 'desd', 'cleaning', '12345', '', '10-08-21 06:31:50', '12345'),
(2, '2', '11', 4, 'ada', '3', '2', 'sdsd', 'cleaning', '12345', '10-08-21 06:46:31', '10-08-21 06:46:31', '12345'),
(3, '2', '11', 23, 'ada', '3', '1', 'qdesad', 'cleaning', '12345', '10-08-21 07:06:20', '10-08-21 07:06:20', '12345'),
(4, '2', '11', 34, 's', '3', '1', 'sdfsf', 'HTML', '12345', '10-08-21 08:32:08', '10-08-21 08:32:08', '12345'),
(8, '5', '11', 2, 'dfd', '4', '1', 'dfgsagsag', '', '12345', '10-08-21 09:35:35', '10-08-21 09:35:35', '12345'),
(9, '3', '11', 23, 's', '1', '1', 'wsda', '', '12345', '10-08-21 09:46:16', '10-08-21 09:46:16', '12345'),
(10, '2', '11', 3435325, 'ada', '3', '1', 'gfghdrfh', 'cleaning', '12345', '10-08-21 11:30:52', '10-08-21 11:30:52', '12345'),
(11, '4', '11', 345, 'qadxad', '11', '1', 'vcsxzvbxszb', 'cleaning', '12345', '10-08-21 11:32:58', '10-08-21 11:32:58', '12345'),
(12, '2', '11', 101, 'Abc', '3', '1', 'sqsads', 'cleaning', '12345', '11-08-21 05:21:43', '11-08-21 05:21:43', '12345'),
(13, '2', '11', 202, 'BAC', '3', '1', 'ddff egfregf', 'Air Condition', '12345', '11-08-21 05:23:31', '11-08-21 05:23:31', '12345'),
(14, '', '', 2, 'ss', '', '2', 'desd', 'Air Condition', '12345', '', '', ''),
(15, '', '', 2, 'ss', '', '2', 'desd', 'cleaning', '12345', '', '', ''),
(16, '', '', 3, 'ss', '', '2', 'desd', 'cleaning', '12345', '', '', ''),
(17, '2', '11', 211, 'ada', '3', '1', 'assd', 'cleaning', '12345', '11-08-21 11:02:26', '11-08-21 11:02:26', '12345'),
(18, '2', '11', 12131, 'ada', '3', '1', 'adsad', 'Water Supply', '12345', '11-08-21 11:04:31', '11-08-21 11:04:31', '12345'),
(19, '2', '11', 2147483647, 'dgfdjhrfdtyj64657', '3', '1', '5fhdjdfj', 'Water Supply', '12345', '11-08-21 11:53:34', '11-08-21 11:53:34', '12345'),
(20, '3', '11', 443535232, 'ss', '1', '1', 'SGFSDHGSDHG', 'Air Condition,cleaning', '12345', '11-08-21 12:02:00', '11-08-21 12:02:00', '12345'),
(22, '3', '11', 122, 'w', '1', '1', 'dsacscsc', 'Air Condition,cleaning,Water Supply', '12345', '11-08-21 12:13:25', '11-08-21 12:13:25', '12345'),
(23, '3', '11', 111, 'dsds', '1', '1', 'sfsf', 'Air Condition,cleaning,Water Supply', '12345', '11-08-21 12:14:52', '11-08-21 12:14:52', '12345'),
(25, '2', '9', 2, 'ada', '14', '1', 'adsa', 'Air Condition,cleaning,Water Supply', '12345', '11-08-21 12:41:28', '11-08-21 12:41:28', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `room_service`
--

CREATE TABLE `room_service` (
  `rservice_id` int(11) NOT NULL,
  `rservice_name` varchar(100) NOT NULL,
  `rservice_description` text NOT NULL,
  `rservice_updateid` text NOT NULL,
  `rservice_updatetime` text NOT NULL,
  `rservice_crid` text NOT NULL,
  `rservice_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_service`
--

INSERT INTO `room_service` (`rservice_id`, `rservice_name`, `rservice_description`, `rservice_updateid`, `rservice_updatetime`, `rservice_crid`, `rservice_date`) VALUES
(2, 'Air Condition', 'Ac AC Ac', '67890', '11-08-21 04:58:48', '67890', '11-08-21 04:58:48'),
(4, 'cleaning', 'cleaning', '12345', '10-08-21 05:47:33', '12345', '10-08-21 05:47:33'),
(6, 'Water Supply', 'Water Supply', '12345', '11-08-21 11:03:50', '12345', '11-08-21 11:03:50');

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE `room_type` (
  `rtype_id` int(10) NOT NULL,
  `rtype_name` varchar(200) NOT NULL,
  `rtype_description` text NOT NULL,
  `rtype_cid` text NOT NULL,
  `rtype_ctime` text NOT NULL,
  `rtype_uid` text NOT NULL,
  `rtype_utime` text NOT NULL,
  `rtype_q` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`rtype_id`, `rtype_name`, `rtype_description`, `rtype_cid`, `rtype_ctime`, `rtype_uid`, `rtype_utime`, `rtype_q`) VALUES
(9, 'Singletest edit', 'Single Room test edit', '12345', '04-08-21 12:25:19', '12345', '05-08-21 04:20:30', 21),
(11, 'single', 'pa', '12345', '05-08-21 07:04:50', '12345', '05-08-21 07:04:50', 3);

-- --------------------------------------------------------

--
-- Table structure for table `rstatues`
--

CREATE TABLE `rstatues` (
  `rstatues_id` int(11) NOT NULL,
  `rstatues_desc` text NOT NULL,
  `rstatues_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rstatues`
--

INSERT INTO `rstatues` (`rstatues_id`, `rstatues_desc`, `rstatues_name`) VALUES
(1, 'Ready for Booking', 'Active'),
(2, 'Deactive', 'Deactive'),
(3, 'gg', 'fg');

-- --------------------------------------------------------

--
-- Table structure for table `userroles`
--

CREATE TABLE `userroles` (
  `role_id` int(10) NOT NULL,
  `role_name` varchar(225) NOT NULL,
  `role_description` text NOT NULL,
  `role_updatetime` text NOT NULL,
  `role_updateid` varchar(15) NOT NULL,
  `role_createid` varchar(15) NOT NULL,
  `role_createtime` text NOT NULL,
  `role_specialnote` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userroles`
--

INSERT INTO `userroles` (`role_id`, `role_name`, `role_description`, `role_updatetime`, `role_updateid`, `role_createid`, `role_createtime`, `role_specialnote`) VALUES
(1, ' Super Administrator', 'No Description', '29-07-21 09:26:33', '12345', '12345', '29-07-21 09:26:33', 'No Special Note'),
(22, 'Administrator', '2nd admin functions less than super admin', '06-08-21 05:37:15', '980283380v', '980283380v', '06-08-21 05:37:15', ''),
(33, 'Booking Manager', 'Person Who Enter bookings on BOC Head Office', '06-08-21 05:42:47', '980283380v', '980283380v', '06-08-21 05:42:47', ''),
(44, 'Property Manager', 'Relevant Property Mangers only can Operate one Property', '06-08-21 05:44:01', '980283380v', '980283380v', '06-08-21 05:44:01', ''),
(55, 'Property Cashier', 'Cashier who deals with Booking in property', '06-08-21 05:45:18', '980283380v', '980283380v', '06-08-21 05:45:18', ''),
(66, 'Other Role 1', 'Custom Role 1', '06-08-21 05:45:55', '980283380v', '980283380v', '06-08-21 05:45:55', ''),
(77, 'Other Role 2', 'Custom Role 2', '06-08-21 05:46:16', '980283380v', '980283380v', '06-08-21 05:46:16', ''),
(88, 'Other Role 3', 'Custom Role 3', '06-08-21 05:46:31', '980283380v', '980283380v', '06-08-21 05:46:31', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(100) NOT NULL,
  `user_name` varchar(225) NOT NULL,
  `user_password` varchar(225) NOT NULL,
  `user_date` text NOT NULL,
  `user_nic` varchar(20) NOT NULL,
  `user_role` varchar(10) NOT NULL,
  `user_tpno` varchar(15) NOT NULL,
  `user_eno` varchar(20) NOT NULL,
  `user_address` text NOT NULL,
  `user_note` text DEFAULT NULL,
  `user_updatetime` text DEFAULT NULL,
  `user_updateid` text NOT NULL,
  `user_crid` text NOT NULL,
  `user_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_date`, `user_nic`, `user_role`, `user_tpno`, `user_eno`, `user_address`, `user_note`, `user_updatetime`, `user_updateid`, `user_crid`, `user_status`) VALUES
(2, 'test', '827ccb0eea8a706c4c34a16891f84e7b', '2021-07-27 06:03:55', '12345', '1', '6969769', '45', 'dhgfhd', 'dwdd', '04-08-21 04:50:18', '12345', '12345', '1'),
(18, 'Ushira Tissera', 'd41d8cd98f00b204e9800998ecf8427e', '06-08-21 05:14:06', '980283380v', '22', '0773568898', '1224578', 'No 120, Batagama North, Ja-Ela', '', NULL, '', '12345', '1'),
(21, 'Test Property Managerr', 'c4ded2b85cc5be82fa1d2464eba9a7d3', '06-08-21 07:36:50', '45678', '44', '1122457885', '445', 'Test Booking Manager', '', '06-08-21 07:36:50', '12345', '12345', '0'),
(22, 'Property Cashier', 'd41d8cd98f00b204e9800998ecf8427e', '06-08-21 07:37:28', '56789', '55', '112458', '745855', 'Test Booking Manager', '', '11-08-21 09:41:37', '12345', '12345', '1'),
(24, 'Other Role 2', '81836b7cd16991abb7febfd7832927fd', '06-08-21 07:39:29', '11350', '77', '784558', '45465', 'Test Booking Manager', '', '06-08-21 07:39:29', '12345', '12345', '1'),
(25, 'Other Role 3', '9e91a17c43b4ebaee6294d64de0bc029', '06-08-21 07:40:59', '22350', '88', '85699969', '64545', 'Test Booking Manager', '', '06-08-21 07:40:59', '12345', '12345', '1'),
(26, 'Other Role 1', '1e01ba3e07ac48cbdab2d3284d1dd0fa', '06-08-21 07:42:38', '67890', '66', '46546', '28655', 'Test Booking Manager', '', '06-08-21 07:42:38', '12345', '12345', '1'),
(27, 'Test Booking Manager', '992a6d18b2a148cf20d9014c3524aa11', '06-08-21 08:20:21', '34567', '33', '44212', '13333', 'Test Booking Manager', '', '06-08-21 08:20:21', '12345', '12345', '1'),
(28, 'utdgf', 'a820a0f8475aebbe9b66564e87d88d97', '09-08-21 04:54:05', '98569', '88', '', '78858', '', '0N0ALEpP', '09-08-21 04:54:05', '12345', '12345', '1'),
(31, 'ch', '827ccb0eea8a706c4c34a16891f84e7b', '11-08-21 10:01:27', '465465', '1', '', '78900000', 'hmvmh', '', '11-08-21 10:01:27', '12345', '12345', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_assign_property`
--

CREATE TABLE `user_assign_property` (
  `id` int(11) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `pro_id` varchar(200) NOT NULL,
  `uap_cdate` varchar(200) NOT NULL,
  `uap_cid` varchar(200) NOT NULL,
  `uap_udate` varchar(200) NOT NULL,
  `uap_uid` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_assign_property`
--

INSERT INTO `user_assign_property` (`id`, `user_id`, `pro_id`, `uap_cdate`, `uap_cid`, `uap_udate`, `uap_uid`) VALUES
(1, '45678', '2', '10-08-21 12:23:53', '12345', '11-08-21 10:43:46', '12345'),
(2, '980283380v', '1', '11-08-21 05:37:18', '12345', '11-08-21 10:44:09', '12345'),
(8, '11350', '5', '11-08-21 07:40:18', '12345', '11-08-21 08:06:54', '12345'),
(9, '56789', '3', '11-08-21 07:40:33', '12345', '11-08-21 07:40:33', '12345'),
(11, '98569', '2', '11-08-21 07:55:40', '12345', '11-08-21 07:55:40', '12345'),
(12, '34567', '3', '11-08-21 07:59:53', '12345', '11-08-21 07:59:53', '12345'),
(13, '12345', '2', '11-08-21 10:41:26', '12345', '11-08-21 10:41:26', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `property_roomtype_assign`
--
ALTER TABLE `property_roomtype_assign`
  ADD PRIMARY KEY (`prta_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `room_service`
--
ALTER TABLE `room_service`
  ADD PRIMARY KEY (`rservice_id`);

--
-- Indexes for table `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`rtype_id`);

--
-- Indexes for table `rstatues`
--
ALTER TABLE `rstatues`
  ADD PRIMARY KEY (`rstatues_id`);

--
-- Indexes for table `userroles`
--
ALTER TABLE `userroles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_assign_property`
--
ALTER TABLE `user_assign_property`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `hotel_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `pro_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `property_roomtype_assign`
--
ALTER TABLE `property_roomtype_assign`
  MODIFY `prta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `room_service`
--
ALTER TABLE `room_service`
  MODIFY `rservice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `room_type`
--
ALTER TABLE `room_type`
  MODIFY `rtype_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rstatues`
--
ALTER TABLE `rstatues`
  MODIFY `rstatues_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `userroles`
--
ALTER TABLE `userroles`
  MODIFY `role_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user_assign_property`
--
ALTER TABLE `user_assign_property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

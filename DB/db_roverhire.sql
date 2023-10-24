-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2023 at 01:51 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_roverhire`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Nayana', 'nayana@gmail.com', 'nayana@123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL,
  `complaint_title` varchar(100) NOT NULL,
  `complaint_content` varchar(500) NOT NULL,
  `complaint_status` int(11) NOT NULL,
  `complaint_reply` varchar(500) NOT NULL,
  `complaint_date` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complaint_title`, `complaint_content`, `complaint_status`, `complaint_reply`, `complaint_date`, `user_id`, `staff_id`, `shop_id`) VALUES
(6, 'Not arrival at proper time', 'The vehicle is not arrival at proper time.I am very disappointed with this ride Thankyou.', 0, '', '', 28, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `dist_id` int(11) NOT NULL,
  `dist_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`dist_id`, `dist_name`) VALUES
(2, 'Ernakulam'),
(3, 'Thrissur');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_content` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pickup`
--

CREATE TABLE `tbl_pickup` (
  `pickup_id` int(11) NOT NULL,
  `pickup_time` varchar(100) NOT NULL,
  `return_time` varchar(100) NOT NULL,
  `userrequest_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `starting_km` int(11) NOT NULL,
  `ending_km` int(11) NOT NULL,
  `pickup_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pickup`
--

INSERT INTO `tbl_pickup` (`pickup_id`, `pickup_time`, `return_time`, `userrequest_id`, `staff_id`, `starting_km`, `ending_km`, `pickup_status`) VALUES
(1, '', '2023-10-01 14:04:55', 9, 9, 15210, 16500, 8),
(2, '', '', 9, 13, 0, 0, 0),
(3, '', '', 9, 9, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(200) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `district_id`) VALUES
(1, 'Muvattupuzha', 2),
(2, 'Ponnukkara', 0),
(3, 'Aluva', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `rating_id` int(11) NOT NULL,
  `rating_value` int(11) NOT NULL,
  `user_review` varchar(500) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `shop_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shop`
--

CREATE TABLE `tbl_shop` (
  `shop_id` int(11) NOT NULL,
  `shop_name` varchar(100) NOT NULL,
  `shop_contact` varchar(100) NOT NULL,
  `shop_email` varchar(100) NOT NULL,
  `shop_address` varchar(100) NOT NULL,
  `place_id` int(11) NOT NULL,
  `shop_logo` varchar(500) NOT NULL,
  `shop_proof` varchar(500) NOT NULL,
  `shop_doj` varchar(100) NOT NULL,
  `shop_password` varchar(100) NOT NULL,
  `shop_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_shop`
--

INSERT INTO `tbl_shop` (`shop_id`, `shop_name`, `shop_contact`, `shop_email`, `shop_address`, `place_id`, `shop_logo`, `shop_proof`, `shop_doj`, `shop_password`, `shop_status`) VALUES
(16, 'Nissan showroom', '0487 225689', 'nissancarz@gmail.com', 'nizzancars aluva', 3, 'nissan logo.jpg', 'nissan car shop.jpg', '', 'nissancarz123', 0),
(17, 'Honda bigwing showroom', '0487 974213', 'hondabigwing23@gmail.com', 'hondabigwig muvattupuzha', 1, 'honda logo.jpg', 'honda bike shop.jpg', '', 'honda456', 0),
(18, 'Evm Volkswagan ', '0487 298476', 'evmcars@gmail.com', 'evmcarstations ernakulam', 1, 'bmw logo.jpg', 'evm volkswagan car shop.jpg', '', 'evmcars@8', 0),
(19, 'Royal Enfield showroom', '0487 299613', 'royalenfield@gmail.com', 'royalenfield bikeshop ekm', 3, 'royal enfield logo.jpg', 'royal enfield shop.jpg', '', 'royalenfield@26', 0),
(20, 'Yamaha showroom', '0487 383841', 'yamaha@gmail.com', 'yamaha shop ekm', 3, 'yamaha logo.jpg', 'yamaha bike shop.jpg', '', 'yamaha67', 0),
(21, 'Honda showroom for cars', '0487 266231', 'hondacars@gmail.com', 'Honda cars ekm', 3, 'WhatsApp Image 2023-09-28 at 08.10.21.jpg', 'honda car shop.jpg', '', 'hondacar@21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `staff_id` int(11) NOT NULL,
  `staff_name` varchar(11) NOT NULL,
  `staff_contact` varchar(100) NOT NULL,
  `staff_email` varchar(100) NOT NULL,
  `staff_address` varchar(100) NOT NULL,
  `staff_photo` varchar(500) NOT NULL,
  `staff_password` varchar(100) NOT NULL,
  `shop_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`staff_id`, `staff_name`, `staff_contact`, `staff_email`, `staff_address`, `staff_photo`, `staff_password`, `shop_id`) VALUES
(9, 'Aravind', '9961354233', 'aravind@gmail.com', 'meleth(h)', 'photo male.jpg', 'aravind@13', 21),
(10, 'Rahul', '9896940097', 'rahul03@gmail.com', 'Thrikkur(h)', 'photo male.jpg', 'rahul@2002', 16),
(11, 'Arjun', '9400930678', 'arjun@gmail.com', 'thazhkal(h)', 'photo male.jpg', 'arjun20', 16),
(12, 'Pranav', '9867470661', 'pranav2000@gmail.com', 'chithiram(h)', 'photo male.jpg', 'pranav00', 16),
(13, 'Aakash', '9982436570', 'aakash4@gmail.com', 'anchery(h)', 'photo male.jpg', 'aakash12', 21),
(14, 'Anurag', '9747689103', 'anurag12@gmail.com', 'melitta(h)', 'photo male.jpg', 'anurag19', 21),
(15, 'Alan', '7256849497', 'alan@gmail.com', 'vallathol(h)', 'photo male.jpg', 'alan23', 21);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_contact` varchar(15) NOT NULL,
  `user_gender` varchar(10) NOT NULL,
  `user_dob` date NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_district` varchar(50) NOT NULL,
  `user_place` varchar(100) NOT NULL,
  `user_photo` varchar(600) NOT NULL,
  `user_license` varchar(100) NOT NULL,
  `user_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_email`, `user_contact`, `user_gender`, `user_dob`, `user_address`, `user_district`, `user_place`, `user_photo`, `user_license`, `user_password`) VALUES
(26, 'Dheeraj', 'dheeraj2003@gmail.com', '9987654321', 'rdo_gender', '2002-12-29', 'neyyan(h)', '2', '1', 'photo male.jpg', 'Screenshot (2).png', 'dheeraj@2003'),
(27, 'Naina', 'naina2004@gmail.com', '9847670771', 'rdo_gender', '2004-04-16', 'thrippkal(h)', '2', '3', 'photo female1.jpg', 'Screenshot (2).png', 'naina@2004'),
(28, 'aliya', 'aliya01@gmail.com', '9753124680', 'rdo_gender', '2003-11-12', 'thazheth(h)', '2', '1', 'photo female2.jpg', 'Screenshot (1).png', 'aliya123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userrequest`
--

CREATE TABLE `tbl_userrequest` (
  `userrequest_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `userrequest_status` int(11) NOT NULL,
  `userrequest_date` varchar(50) NOT NULL,
  `payment_status` int(11) NOT NULL DEFAULT 0,
  `userrequest_bookdate` varchar(50) NOT NULL,
  `userrequest_booktime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_userrequest`
--

INSERT INTO `tbl_userrequest` (`userrequest_id`, `vehicle_id`, `user_id`, `userrequest_status`, `userrequest_date`, `payment_status`, `userrequest_bookdate`, `userrequest_booktime`) VALUES
(9, 27, 26, 3, '2023-09-28', 1, '2023-09-28', '15:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle`
--

CREATE TABLE `tbl_vehicle` (
  `vehicle_id` int(11) NOT NULL,
  `vehicle_name` varchar(500) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `vehicle_image` varchar(500) NOT NULL,
  `vehicletype_id` int(11) NOT NULL,
  `vehicle_minkm` varchar(50) NOT NULL,
  `vehicle_minrate` varchar(50) NOT NULL,
  `vehicle_kmrate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_vehicle`
--

INSERT INTO `tbl_vehicle` (`vehicle_id`, `vehicle_name`, `shop_id`, `vehicle_image`, `vehicletype_id`, `vehicle_minkm`, `vehicle_minrate`, `vehicle_kmrate`) VALUES
(27, 'honda elevate', 21, 'Honda elevate.jpg', 2, '1km', '40', '300');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehiclegallery`
--

CREATE TABLE `tbl_vehiclegallery` (
  `vehiclegallery_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `vehiclegallery_image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_vehiclegallery`
--

INSERT INTO `tbl_vehiclegallery` (`vehiclegallery_id`, `vehicle_id`, `vehiclegallery_image`) VALUES
(6, 27, 'Honda elevate.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicletype`
--

CREATE TABLE `tbl_vehicletype` (
  `vehicletype_id` int(11) NOT NULL,
  `vehicletype_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_vehicletype`
--

INSERT INTO `tbl_vehicletype` (`vehicletype_id`, `vehicletype_name`) VALUES
(2, 'car'),
(3, 'Bike');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`dist_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `tbl_pickup`
--
ALTER TABLE `tbl_pickup`
  ADD PRIMARY KEY (`pickup_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `tbl_shop`
--
ALTER TABLE `tbl_shop`
  ADD PRIMARY KEY (`shop_id`);

--
-- Indexes for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_userrequest`
--
ALTER TABLE `tbl_userrequest`
  ADD PRIMARY KEY (`userrequest_id`);

--
-- Indexes for table `tbl_vehicle`
--
ALTER TABLE `tbl_vehicle`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- Indexes for table `tbl_vehiclegallery`
--
ALTER TABLE `tbl_vehiclegallery`
  ADD PRIMARY KEY (`vehiclegallery_id`);

--
-- Indexes for table `tbl_vehicletype`
--
ALTER TABLE `tbl_vehicletype`
  ADD PRIMARY KEY (`vehicletype_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `dist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pickup`
--
ALTER TABLE `tbl_pickup`
  MODIFY `pickup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_shop`
--
ALTER TABLE `tbl_shop`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_userrequest`
--
ALTER TABLE `tbl_userrequest`
  MODIFY `userrequest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_vehicle`
--
ALTER TABLE `tbl_vehicle`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_vehiclegallery`
--
ALTER TABLE `tbl_vehiclegallery`
  MODIFY `vehiclegallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_vehicletype`
--
ALTER TABLE `tbl_vehicletype`
  MODIFY `vehicletype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

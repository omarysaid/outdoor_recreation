-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2024 at 04:10 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `info_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `recreation` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`info_id`, `name`, `recreation`, `phone`, `feedback`, `created`) VALUES
(7, 'omary said said', 'kilimanjaro national park', '0787676543', 'My visit to Kilimanjaro National Park was absolutely breathtaking. The majestic views of Mount Kilimanjaro, coupled with the diverse wildlife and lush vegetation, left me in awe. The park\'s well-maintained trails and knowledgeable guides made the trek bot', '2024-06-20'),
(8, 'Helman helman helman', 'majimaji intakes', '0989878764', 'My visit to Kilimanjaro National Park was absolutely breathtaking. The majestic views of Mount Kilimanjaro, coupled with the diverse wildlife and lush vegetation, left me in awe. The park\'s well-maintained trails and knowledgeable guides made the trek bot', '2024-06-20');

-- --------------------------------------------------------

--
-- Table structure for table `recreation`
--

CREATE TABLE `recreation` (
  `recreation_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `activities` varchar(500) NOT NULL,
  `time` varchar(50) NOT NULL,
  `cost` varchar(50) NOT NULL,
  `image` blob NOT NULL,
  `contact` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recreation`
--

INSERT INTO `recreation` (`recreation_id`, `name`, `location`, `activities`, `time`, `cost`, `image`, `contact`, `status`, `created`) VALUES
(6, 'Rock cities', 'Kijitonyama Kinondoni', 'Immerse yourself in the diverse recreation opportunities Tanzania has to offer. Begin your day with an exhilarating safari adventure in the Serengeti National Park, where you can witness majestic wildlife such as lions, elephants, and giraffes in their natural habitat. Afterward, trek through the lush rainforests of Kilimanjaro National Park, marveling at the diverse flora and fauna along the way. Take a serene boat ride on Lake Victoria, Africa\'s largest lake, exploring its picturesque islands ', '2024-06-22T07:31', '200000', 0x726567696f6e5f363637323230616665646634642e6a7067, '0898787654', 1, '2024-06-19'),
(7, 'Makate Camp', 'Buza Temeke', 'Immerse yourself in the diverse recreation opportunities Tanzania has to offer. Begin your day with an exhilarating safari adventure in the Serengeti National Park, where you can witness majestic wildlife such as lions, elephants, and giraffes in their natural habitat. Afterward, trek through the lush rainforests of Kilimanjaro National Park, marveling at the diverse flora and fauna along the way. Take a serene boat ride on Lake Victoria, Africa\'s largest lake, exploring its picturesque islands ', '2024-06-19T04:58:20', '300000', 0x726567696f6e5f363637323337636261373432322e6a7067, '078767654', 1, '2024-06-19');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `request_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `recreation_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `participants` varchar(50) NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`request_id`, `user_id`, `recreation_id`, `date`, `time`, `participants`, `created`) VALUES
(1, 12, 6, '2024-06-09', '06:37:00', '3', '2024-06-19'),
(3, 14, 7, '2024-06-21', '19:40:00', '10', '2024-06-19'),
(4, 10, 6, '2024-06-21', '19:40:00', '10', '2024-06-19'),
(5, 12, 7, '2024-07-05', '11:50:00', '454545', '2024-07-04'),
(6, 12, 11, '2024-07-13', '11:55:00', '22', '2024-07-04'),
(7, 12, 7, '2024-07-13', '11:59:00', '3', '2024-07-04'),
(8, 12, 6, '2024-07-13', '11:59:00', '3', '2024-07-04'),
(9, 12, 10, '2024-07-14', '11:00:00', '4', '2024-07-04'),
(10, 12, 10, '2024-07-13', '04:04:00', '4', '2024-07-04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `country` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(30) NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `gender`, `country`, `phone`, `email`, `password`, `role`, `created`) VALUES
(9, 'omary said ipombo ', 'Male', 'Tanzania', '0909898765', 'omary@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 'Staff', '2024-06-18'),
(10, 'omollo  Edward Givenality', 'Male', 'Tanzania', '0787676543', 'omollosaid@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Admin', '2024-06-18'),
(12, 'amina omollo said', 'Female', 'tanzania', '0898787654', 'mamam@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Visitor', '2024-06-19'),
(16, 'nana', 'Female', 'Tanzania', '0989876565', 'mamam@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Visitor', '2024-06-21'),
(23, 'helman', 'Male', 'helman', '0909898765', 'mamam@gmail.com', '29c3eea3f305d6b823f562ac4be35217', 'Visitor', '2024-07-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`info_id`);

--
-- Indexes for table `recreation`
--
ALTER TABLE `recreation`
  ADD PRIMARY KEY (`recreation_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `recreation`
--
ALTER TABLE `recreation`
  MODIFY `recreation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

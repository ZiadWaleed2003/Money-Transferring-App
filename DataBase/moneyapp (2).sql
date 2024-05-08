-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2024 at 12:37 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moneyapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `name`) VALUES
(4, 'Bank Misr'),
(1, 'CIB'),
(3, 'HSBC'),
(2, 'QNB');

-- --------------------------------------------------------

--
-- Table structure for table `bankcards`
--

CREATE TABLE `bankcards` (
  `id` int(11) NOT NULL,
  `user_mobile_number` varchar(15) NOT NULL,
  `name` varchar(30) NOT NULL,
  `number` bigint(16) NOT NULL,
  `cvv` int(3) NOT NULL,
  `balance` double NOT NULL,
  `bank_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bankcards`
--

INSERT INTO `bankcards` (`id`, `user_mobile_number`, `name`, `number`, `cvv`, `balance`, `bank_id`) VALUES
(9, '01007599216', 'Zeyad Tarek', 1111111111111111, 111, 250000, 1),
(10, '01026858599', 'Zeyad Hussam', 1234567812345678, 123, 1500, 2),
(13, '01007599216', 'Zeyad Tarek', 1010101010101010, 101, 500000, 3),
(15, '01141398855', 'Ziad Waleed', 3060306030603060, 306, 462, 4),
(16, '01013449263', 'Eng Amr Essam', 2020202020202020, 202, 360000, 1),
(17, '01022676956', 'Ziad Atef', 9090909090909090, 909, 8000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `balance` double NOT NULL,
  `account_number` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `name`, `balance`, `account_number`) VALUES
(1, 'Electricity', 250, '1234567812345678'),
(2, 'We- Internet', 9000, '987654321987654321'),
(3, 'Gas', 350, '963852741963852741');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `balance` double NOT NULL,
  `account_number` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `name`, `balance`, `account_number`) VALUES
(1, 'Ahl Misr Foundation', 600, '2536253625362536'),
(2, '500 500 Hospital', 900036, '123456123456123456'),
(3, '57357 Hospital ', 750, '14725836914725833');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `description`) VALUES
(3, 120, 'hababe ya rayes');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vector_data` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `description` text DEFAULT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `sender_card` varchar(100) NOT NULL,
  `reciever_id` varchar(100) NOT NULL,
  `reciever_card` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `status` enum('DONE','CANCELLED') NOT NULL,
  `description` text DEFAULT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `sender_id`, `sender_card`, `reciever_id`, `reciever_card`, `date`, `status`, `description`, `amount`) VALUES
(76, 120, '1234567812345678', '118', '1111111111111111', '2024-05-09 01:14:41', 'DONE', 'Sending Money Transaction', 60),
(77, 120, '1234567812345678', '123456123456123456', '', '2024-05-09 01:15:13', 'DONE', 'Donation', 36),
(78, 120, '1234567812345678', '963852741963852741', '', '2024-05-09 01:15:34', 'DONE', 'Bill', 250),
(79, 118, '1111111111111111', '120', '1234567812345678', '2024-05-09 01:17:43', 'DONE', 'Receiving Money Transaction', 200);

-- --------------------------------------------------------

--
-- Table structure for table `usercards`
--

CREATE TABLE `usercards` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `number` varchar(16) NOT NULL,
  `cvv` int(3) NOT NULL,
  `ipn_code` int(6) NOT NULL,
  `balance` double NOT NULL,
  `favourite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usercards`
--

INSERT INTO `usercards` (`id`, `user_id`, `bank_id`, `name`, `number`, `cvv`, `ipn_code`, `balance`, `favourite`) VALUES
(114, 118, 1, 'Zeyad Tarek', '1111111111111111', 111, 111111, 249860, 0),
(116, 118, 3, 'Zeyad Tarek', '1010101010101010', 101, 101101, 500000, 0),
(117, 120, 2, 'Zeyad Hossam', '1234567812345678', 123, 123456, 1354, 0),
(118, 121, 2, 'Zyad Atef', '9090909090909090', 909, 909909, 8000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(300) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `role` int(11) NOT NULL,
  `image_path` text NOT NULL DEFAULT '../assets/img/profile_default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone_number`, `role`, `image_path`) VALUES
(117, 'Ziad Adel', 'ziad.adel3050@gmail.com', '$2y$10$8bZLV0WxppFWSu8euce2iuQbRvTkUYWSVwy7RS1OO9tSI2fladwlK', '01151617372', 1, '../assets/img/profile_default.jpg'),
(118, 'Zeyad Tarek', 'zeyad952004@gmail.com', '$2y$10$ZmDvksAh4Nr45isYGzaE8OxVxc/S9/0svVhHOpCIbAcge91./0iNi', '01007599216', 0, '../assets/img/profile_default.jpg'),
(120, 'Ziad Hosssam', 'zeyadhussam22@gmail.com', '$2y$10$r.g4PGYAMQY69N.RJ85qw.FwcpF7a6x6m4tPOESTWG0rle1neOe2C', '01026858599', 0, '../assets/img/120-img.jpg'),
(121, 'Ziad Atef', 'zyadatefali12@gmail.com', '$2y$10$w70dvxDEuDn2gupsbOBOSOk8L8mGiAj9Zwt27t8fJ0zkskp5bWqa.', '01022676956', 0, '../assets/img/121-img.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `bankcards`
--
ALTER TABLE `bankcards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bankcard_fk` (`bank_id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_number` (`account_number`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_number` (`account_number`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `account_number_2` (`account_number`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedback_fk` (`user_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_fk` (`user_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_req_fk` (`sender_id`),
  ADD KEY `reciever_req_fk` (`reciever_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usercards`
--
ALTER TABLE `usercards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `card_bank_fk` (`bank_id`),
  ADD KEY `user_card_fk` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_2` (`email`),
  ADD UNIQUE KEY `phone_number` (`phone_number`),
  ADD UNIQUE KEY `email` (`email`,`phone_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `bankcards`
--
ALTER TABLE `bankcards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `usercards`
--
ALTER TABLE `usercards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bankcards`
--
ALTER TABLE `bankcards`
  ADD CONSTRAINT `bankcard_fk` FOREIGN KEY (`bank_id`) REFERENCES `bank` (`id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `reciever_req_fk` FOREIGN KEY (`reciever_id`) REFERENCES `usercards` (`id`),
  ADD CONSTRAINT `sender_req_fk` FOREIGN KEY (`sender_id`) REFERENCES `usercards` (`id`);

--
-- Constraints for table `usercards`
--
ALTER TABLE `usercards`
  ADD CONSTRAINT `card_bank_fk` FOREIGN KEY (`bank_id`) REFERENCES `bank` (`id`),
  ADD CONSTRAINT `user_card_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

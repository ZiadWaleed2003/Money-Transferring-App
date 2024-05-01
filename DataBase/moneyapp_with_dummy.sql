-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2024 at 02:27 PM
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
(1, 'QNB'),
(2, 'CIB');

-- --------------------------------------------------------

--
-- Table structure for table `bankcards`
--

CREATE TABLE `bankcards` (
  `id` int(11) NOT NULL,
  `user_mobile_number` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `number` bigint(16) NOT NULL,
  `cvv` int(3) NOT NULL,
  `bank_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bankcards`
--

INSERT INTO `bankcards` (`id`, `user_mobile_number`, `name`, `number`, `cvv`, `bank_id`) VALUES
(7, 1151617372, 'ziad adel', 1234567812345678, 111, 1),
(8, 1151617372, 'ziad adel', 1234567812345678, 111, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `balance` double NOT NULL,
  `account_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `name`, `balance`, `account_number`) VALUES
(1, 'Cairo Electric', 0, 103),
(2, 'Cairo Hydro', 0, 102);

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `balance` double NOT NULL,
  `account_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `name`, `balance`, `account_number`) VALUES
(203, 'Shoe the Children', 0, 407),
(204, 'Feed the Babies', 0, 405);

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
(1, 103, 'el app dah 3zmah. Ana ms7t InstaPay 5las');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vector_data` binary(1) NOT NULL
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
  `sender_card` int(16) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `reciever_card` int(16) NOT NULL,
  `date` datetime NOT NULL,
  `status` enum('DONE','CANCELLED') NOT NULL,
  `description` text DEFAULT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `sender_id`, `sender_card`, `reciever_id`, `reciever_card`, `date`, `status`, `description`, `amount`) VALUES
(1, 101, 1, 102, 3, '2024-04-01 09:00:00', 'DONE', 'Sending Money Transaction', 50),
(2, 101, 2, 103, 4, '2024-04-02 10:30:00', 'DONE', 'Sending Money Transaction', 100),
(3, 102, 3, 104, 5, '2024-04-03 14:45:00', 'DONE', 'Bill', 75),
(4, 102, 4, 105, 6, '2024-04-04 17:15:00', 'DONE', 'Sending Money Transaction', 25),
(5, 103, 5, 106, 1, '2024-04-05 19:20:00', 'DONE', 'Sending Money Transaction', 200),
(6, 103, 6, 17, 2, '2024-04-06 22:00:00', 'DONE', 'Sending Money Transaction', 80);

-- --------------------------------------------------------

--
-- Table structure for table `usercards`
--

CREATE TABLE `usercards` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `number` bigint(16) NOT NULL,
  `cvv` int(3) NOT NULL,
  `ipn_code` int(6) NOT NULL,
  `balance` double NOT NULL,
  `favourite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usercards`
--

INSERT INTO `usercards` (`id`, `user_id`, `bank_id`, `name`, `number`, `cvv`, `ipn_code`, `balance`, `favourite`) VALUES
(1, 101, 1, 'John Doe Card', 1234567890123456, 123, 123456, 1000, 1),
(2, 101, 2, 'John Doe Bank Card', 9876543210987654, 456, 654321, 5000, 0),
(3, 102, 1, 'Jane Smith Card', 1111222233334444, 789, 789012, 2500, 1),
(4, 102, 2, 'Jane Smith Bank Card', 4444333322221111, 12, 210987, 7500, 0),
(5, 103, 1, 'Alice Johnson Card', 9999888877776666, 345, 345678, 3000, 1),
(6, 103, 2, 'Alice Johnson Bank C', 6666777788889999, 678, 876543, 6000, 0),
(111, 1, 1, 'Ziad Adel', 1234567812345678, 111, 56465, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(30) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `role` int(11) NOT NULL,
  `image_path` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone_number`, `role`, `image_path`) VALUES
(1, 'ADMIN', 'ADMIN1234@gmail.com', '1234', '', 1, NULL),
(101, 'John Doe', 'john.doe@example.com', 'password123', '1234567890', 0, '/views/assets/img/1-img.png'),
(102, 'Jane Smith', 'jane.smith@example.com', 'securepass', '0987654321', 0, '/views/assets/img/2-img.png'),
(103, 'Alice Johnson', 'alice.johnson@example.com', 'p@ssw0rd', '5551234567', 0, '/views/assets/img/3-img.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `account_number` (`account_number`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_number` (`account_number`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `reciever_fk` (`reciever_id`),
  ADD KEY `sender_fk` (`sender_id`);

--
-- Indexes for table `usercards`
--
ALTER TABLE `usercards`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `number` (`number`),
  ADD KEY `card_bank_fk` (`bank_id`),
  ADD KEY `user_card_fk` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `usercards`
--
ALTER TABLE `usercards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

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
  ADD CONSTRAINT `feedback_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `reciever_req_fk` FOREIGN KEY (`reciever_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `sender_req_fk` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`);

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

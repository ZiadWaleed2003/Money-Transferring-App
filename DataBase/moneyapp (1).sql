-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2024 at 11:40 PM
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
(2, 'CIB'),
(3, 'HSBC'),
(1, 'QNB');

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
  `balance` double NOT NULL,
  `bank_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bankcards`
--

INSERT INTO `bankcards` (`id`, `user_mobile_number`, `name`, `number`, `cvv`, `balance`, `bank_id`) VALUES
(11, 1141398855, 'Ziad Waleed', 1234567812345678, 123, 506, 1),
(12, 1007599216, 'zeyad Tarek', 1111111111111111, 111, 1050, 2),
(15, 1141398855, 'Ziad Waleed', 1010101010101010, 101, 1650, 2),
(17, 1022676956, 'Ziad Atef', 789456123789456123, 789, 568, 4);

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `balance` double NOT NULL,
  `account_number` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `name`, `balance`, `account_number`) VALUES
(1, 'WE-INTERNET', 10100, '2582582584564562'),
(2, 'Electricity', 50, '2525363614149898'),
(3, 'Gas', 0, '7894561237894561');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `balance` double NOT NULL,
  `account_number` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `name`, `balance`, `account_number`) VALUES
(1, 'Ahl Misr Foundation', 0, '1234567812345678'),
(2, '500 500 Hospital', 50, '3692581479632587'),
(3, '57357 Hospital ', 0, '1472583691472583');

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
(2, 102, 'hababe ya ziad ya adel');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vector_data` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `user_id`, `vector_data`) VALUES
(21, 102, 0x613a3132383a7b693a303b643a2d302e313337303334353530333039313831323b693a313b643a302e31313138353132343531363438373132323b693a323b643a302e30363835373836303038383334383338393b693a333b643a2d302e30343037393339363237373636363039323b693a343b643a2d302e30353738313739333232313833313332323b693a353b643a302e3030373039363239323931363638353334333b693a363b643a2d302e3033373131303734323138313533393533363b693a373b643a2d302e31363436363539303736323133383336373b693a383b643a302e31393138353334393334353230373231343b693a393b643a2d302e30393533383331353233363536383435313b693a31303b643a302e32383834343637323434313438323534343b693a31313b643a302e3031363638333631353734343131333932323b693a31323b643a2d302e32303033393231323730333730343833343b693a31333b643a2d302e3033303634343031343437373732393739373b693a31343b643a2d302e3031343434373732303732313336343032313b693a31353b643a302e31303237393036303135353135333237353b693a31363b643a2d302e31393137313635353137383037303036383b693a31373b643a2d302e3032363630343037383731303037393139333b693a31383b643a2d302e3033303939363235313835313332303236373b693a31393b643a2d302e3031363033373037383537343239393831323b693a32303b643a302e303136313730393236333932303738343b693a32313b643a2d302e30373438323833313138303039353637333b693a32323b643a302e30383633343237353139373938323738383b693a32333b643a302e30343832373534393638313036373436373b693a32343b643a2d302e313330313533333732383833373936373b693a32353b643a2d302e333532323136393838383031393536323b693a32363b643a2d302e31343335373430313433303630363834323b693a32373b643a2d302e31353138353232353030393931383231333b693a32383b643a302e30373334383034323732363531363732343b693a32393b643a2d302e303538353730393831303235363935383b693a33303b643a2d302e3033393137353138363330363233383137343b693a33313b643a302e3030343034383235333430393536343439353b693a33323b643a2d302e31343531323138373234323530373933353b693a33333b643a2d302e30323231303932333039383032373730363b693a33343b643a2d302e30353333313534343935303630343433393b693a33353b643a302e30353439343434393636303138313939393b693a33363b643a2d302e303731333438383938313132373733393b693a33373b643a302e30343032393337313538393432323232363b693a33383b643a302e32303334363431363533323939333331373b693a33393b643a302e3030363734303238343135323332383936383b693a34303b643a2d302e31393634353436343432303331383630343b693a34313b643a302e30363736323937333231393135363236353b693a34323b643a2d302e3030383330303036343133313631373534363b693a34333b643a302e32323735343435343631323733313933343b693a34343b643a302e323039343334363133353835343732313b693a34353b643a302e30383539333439373432353331373736343b693a34363b643a302e30343333303036333631313236383939373b693a34373b643a2d302e30333234333739383736323535393839313b693a34383b643a302e30383134353231363130373336383436393b693a34393b643a2d302e323532313938373835353433343431383b693a35303b643a302e31323333313135353638373537303537323b693a35313b643a302e3130303432303734333232373030353b693a35323b643a302e31373632343731393434303933373034323b693a35333b643a302e3031303634353032303735333134353231383b693a35343b643a302e30363138333637383238343238373435333b693a35353b643a2d302e31363833343038313730393338343931383b693a35363b643a2d302e3032333736373337303733303633383530343b693a35373b643a302e31323836333436393132333834303333323b693a35383b643a2d302e313831383233323533363331353931383b693a35393b643a302e31303135393131343030333138313435383b693a36303b643a302e30383135383036303930383331373536363b693a36313b643a2d302e30353039343132323531343132383638353b693a36323b643a2d302e3032313633333732313838383036353333383b693a36333b643a302e30363438393331373131393132313535323b693a36343b643a302e32343731333039303036323134313431383b693a36353b643a302e313938373935363436343239303631393b693a36363b643a2d302e31353233373936393136303037393935363b693a36373b643a2d302e30363930303038383438393035353633343b693a36383b643a302e31333036333537333833373238303237333b693a36393b643a2d302e313533353930363139353634303536343b693a37303b643a2d302e3031333831343634333032353339383235343b693a37313b643a302e3035363935303730333236333238323737363b693a37323b643a2d302e31343037383933303032303333323333363b693a37333b643a2d302e323338313433313735383430333737383b693a37343b643a2d302e323935383937373532303436353835313b693a37353b643a302e30373338353335353233343134363131383b693a37363b643a302e343035363337353332343732363130353b693a37373b643a302e313633363538303232383830353534323b693a37383b643a2d302e31353334373339313336363935383631383b693a37393b643a302e303034303830323938333536373131383634353b693a38303b643a2d302e31313836353035313833353737353337353b693a38313b643a2d302e30303032303437333832323935313331363833333b693a38323b643a302e3035323530343135323035393535353035343b693a38333b643a302e30393136313832343733333031383837353b693a38343b643a2d302e31313934313639353231333331373837313b693a38353b643a2d302e3030393431393938363937383137333235363b693a38363b643a2d302e30363436323634343738353634323632343b693a38373b643a2d302e30323031393630353034303535303233323b693a38383b643a302e31333139343439363932393634353533383b693a38393b643a2d302e3031303439313736363936363837393336383b693a39303b643a2d302e30333439303432363031383833343131343b693a39313b643a302e323834343034373534363338363731393b693a39323b643a2d302e3030373531363235303031343330353131353b693a39333b643a302e30393335353336363233303031303938363b693a39343b643a2d302e3033323634343133303238393535343539363b693a39353b643a2d302e303030333130303939393136353332363335373b693a39363b643a2d302e30363436303432333032323530383632313b693a39373b643a2d302e30373835363132363837343638353238373b693a39383b643a2d302e31323139303931393336393435393135323b693a39393b643a2d302e303539323336383035383836303330323b693a3130303b643a2d302e3032323937313932303636393037383832373b693a3130313b643a2d302e30323837363932303831313833313935313b693a3130323b643a2d302e3031323136353137323032353536313333333b693a3130333b643a302e30373836353631313436333738353137323b693a3130343b643a2d302e323836333937373535313436303236363b693a3130353b643a302e31373339313735333139363731363330393b693a3130363b643a2d302e3031303133353935313435313935373232363b693a3130373b643a2d302e3030373637363234343731333336363033323b693a3130383b643a302e3031353433333138383532373832323439353b693a3130393b643a302e30333031363539323734383436333135343b693a3131303b643a2d302e303734333236353337353439343935373b693a3131313b643a2d302e303033373732323939353033393037353631333b693a3131323b643a302e31373236303432303332323431383231333b693a3131333b643a2d302e333038333834373736313135343137353b693a3131343b643a302e31393833383139393031393433323036383b693a3131353b643a302e323337353536313134373932383233383b693a3131363b643a302e30353834393931383732333130363338343b693a3131373b643a302e31333139343339323632313531373138313b693a3131383b643a302e31323036353037393036333137373130393b693a3131393b643a2d302e30343137373435393730313839353731343b693a3132303b643a302e3035313135383336383538373439333839363b693a3132313b643a2d302e3030323436313330373638323039363935383b693a3132323b643a2d302e313639323836313136393537363634353b693a3132333b643a2d302e3031343532343731373831353232303335363b693a3132343b643a302e30373236373433323635393836343432363b693a3132353b643a2d302e313234333439393239333932333337383b693a3132363b643a302e3035363035383532363033393132333533353b693a3132373b643a302e303331353831333331303434343335353b7d);

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
  `sender_card` varchar(16) NOT NULL,
  `reciever_id` varchar(16) NOT NULL,
  `reciever_card` varchar(16) NOT NULL,
  `date` datetime NOT NULL,
  `status` enum('DONE','CANCELLED') NOT NULL,
  `description` text DEFAULT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `sender_id`, `sender_card`, `reciever_id`, `reciever_card`, `date`, `status`, `description`, `amount`) VALUES
(76, 102, '1234567812345678', '104', '1111111111111111', '2024-05-07 00:29:16', 'DONE', 'Sending Money Transaction', 50),
(77, 102, '1010101010101010', '2147483647', '', '2024-05-07 00:30:16', 'DONE', 'Donation', 50),
(78, 102, '1010101010101010', '2147483647', '', '2024-05-07 00:30:46', 'DONE', 'Bill', 50);

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
(114, 102, 1, 'Ziad Waleed', 1234567812345678, 123, 123456, 456, 0),
(115, 102, 2, 'Ziad Waleed', 1010101010101010, 101, 101101, 1550, 0),
(116, 104, 2, 'Zeyad Tarek', 1111111111111111, 111, 111111, 1100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `role` int(11) NOT NULL,
  `image_path` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone_number`, `role`, `image_path`) VALUES
(102, 'Ziad Waleed', 'ziadwaleedmohamed2003@gmail.com', '$2y$10$iD7rmYjhv3oec4TTb5sv/OvfBFG5zFTg2NR4wzkMRBYHL0Wao6yMm', '01141398855', 0, '../uploaded_images/66392630cb217.jpg'),
(103, 'ziad adel', 'ziad.adel3050@gmail.com', '$2y$10$9NolPZwbBioM8q0GVGx1puyLa7AXPI8KyAO8.oSZLsG7sXsPClI4K', '01151617372', 1, NULL),
(104, 'zeyad Tarek', 'zeyad952004@gmail.com', '$2y$10$2ab22SJMigzHx/IIsN2nxut/dMRcAfkYcTcJnM1R2UnnNH/IC7nRW', '1007599216', 0, NULL);

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
  ADD UNIQUE KEY `number` (`number`),
  ADD KEY `card_bank_fk` (`bank_id`),
  ADD KEY `user_card_fk` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`,`phone_number`,`image_path`) USING HASH;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `usercards`
--
ALTER TABLE `usercards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

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
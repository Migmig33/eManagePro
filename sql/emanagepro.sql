-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2025 at 03:57 PM
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
-- Database: `emanagepro`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `added_by` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`item_id`, `item_name`, `price`, `stock`, `added_by`) VALUES
(19, 'COCAINE', 222, 11111, '7d6fb9ea'),
(20, 'MARIWANA', 222, 22222, '7d6fb9ea'),
(21, 'SHABU', 2000, 2222, '7d6fb9ea'),
(22, 'ssss', 222, 2222, '7d6fb9ea'),
(24, 'MARIWANA', 2000, 22215, '7d6fb9ea');

-- --------------------------------------------------------

--
-- Table structure for table `operations`
--

CREATE TABLE `operations` (
  `operation_id` int(11) NOT NULL,
  `operation_name` varchar(50) NOT NULL,
  `isactive` bit(1) NOT NULL DEFAULT b'1',
  `operated_by` char(8) NOT NULL,
  `description` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `expected_finish` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `operations`
--

INSERT INTO `operations` (`operation_id`, `operation_name`, `isactive`, `operated_by`, `description`, `created_at`, `expected_finish`) VALUES
(1, 'BIRTHDAY', b'1', 'e378f552', 'BIRTHDAY BOYYY', '2025-11-22 19:18:25', '2025-11-29 23:59:00'),
(4, 'LALA', b'0', '7d6fb9ea', 'kahit ano', '2025-11-23 18:30:04', '2025-11-23 19:32:00');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `created_by` int(50) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `transaction_name` varchar(50) NOT NULL,
  `transactioned_by` char(8) NOT NULL,
  `quantity` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `is_archived` bit(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `transaction_name`, `transactioned_by`, `quantity`, `item_id`, `is_archived`, `created_at`) VALUES
(64, 'BENTA NG SHABU', '7d6fb9ea', 222222, 19, b'0', '2025-11-23 01:12:06'),
(66, 'BENTA NG SHABU', '7d6fb9ea', 5, 24, b'0', '2025-11-22 22:25:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(8) NOT NULL,
  `givenName` varchar(100) NOT NULL,
  `middleName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `username` char(30) NOT NULL,
  `password` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `givenName`, `middleName`, `lastName`, `username`, `password`) VALUES
('7d6fb9ea', 'tre', 'young', 'hellnah', '202310386', 'true'),
('e378f552', 'Juan', 'Dela', 'Cruz', 'juandc', 'hashed_pass1'),
('e37e13cf', 'Maria', 'Santos', 'Lopez', 'marial', 'hashed_pass2'),
('e381b579', 'Pedro', 'Gomez', 'Reyes', 'pedror', 'hashed_pass3'),
('e3854462', 'Ana', 'Villanueva', 'Garcia', 'anavg', 'hashed_pass4'),
('e3894195', 'Carlos', 'Martinez', 'Diaz', 'carlosmd', 'hashed_pass5'),
('e38d775b', 'Sofia', 'Luna', 'Torres', 'sofialt', 'hashed_pass6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `fk_added_by` (`added_by`);

--
-- Indexes for table `operations`
--
ALTER TABLE `operations`
  ADD PRIMARY KEY (`operation_id`),
  ADD KEY `fk_operated_by` (`operated_by`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `fk_item_id` (`item_id`),
  ADD KEY `fk_transactioned_by` (`transactioned_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `givenName` (`givenName`),
  ADD UNIQUE KEY `middleName` (`middleName`),
  ADD UNIQUE KEY `lastName` (`lastName`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `operations`
--
ALTER TABLE `operations`
  MODIFY `operation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `fk_added_by` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `operations`
--
ALTER TABLE `operations`
  ADD CONSTRAINT `fk_operated_by` FOREIGN KEY (`operated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `fk_item_id` FOREIGN KEY (`item_id`) REFERENCES `inventory` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transactioned_by` FOREIGN KEY (`transactioned_by`) REFERENCES `users` (`id`);

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `expire_operation` ON SCHEDULE EVERY 1 MINUTE STARTS '2025-11-22 14:59:25' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE operations
SET isactive = 0
WHERE expected_finish <= NOW()
AND isactive = 1$$

CREATE DEFINER=`root`@`localhost` EVENT `operation_activation` ON SCHEDULE EVERY 1 MINUTE STARTS '2025-11-22 18:53:31' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE operations
SET isactive = 1
WHERE expected_finish > NOW()
AND isactive = 0$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

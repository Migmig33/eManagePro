-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2025 at 06:22 AM
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
(22, 'ssss', 222, 1955, '7d6fb9ea'),
(24, 'MARIWANA', 2000, 22138, '7d6fb9ea'),
(27, 'SHAVU', 22, 22, '7d6fb9ea'),
(28, 'SHAVU', 2222, 22, '7d6fb9ea');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL,
  `logs` char(200) DEFAULT NULL,
  `user_id` char(8) DEFAULT NULL,
  `date_generated` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`log_id`, `logs`, `user_id`, `date_generated`) VALUES
(48, 'tre Inserted a Transaction Record named hh created at 2025-11-29 15:43:27', '7d6fb9ea', '2025-11-29 15:43:27'),
(49, 'tre Deleted Transaction ID 84 at 2025-11-29 15:45:30', '7d6fb9ea', '2025-11-29 15:45:30'),
(50, 'tre Inserted a Transaction Record named hh created at 2025-11-29 15:45:40', '7d6fb9ea', '2025-11-29 15:45:40'),
(51, 'tre Insert a Operation Named ddd created at 2025-11-29 15:46:09', '7d6fb9ea', '2025-11-29 15:46:09'),
(52, 'tre Delete Operation ID 13 at 2025-11-29 15:46:14', '7d6fb9ea', '2025-11-29 15:46:14'),
(53, 'tre Insert a Operation Named ddd created at 2025-11-29 15:46:32', '7d6fb9ea', '2025-11-29 15:46:32'),
(54, NULL, NULL, '2025-11-30 13:16:48'),
(55, NULL, NULL, '2025-11-30 13:16:48'),
(56, NULL, NULL, '2025-11-30 13:16:48'),
(57, NULL, NULL, '2025-11-30 13:16:48'),
(58, NULL, NULL, '2025-11-30 13:16:48'),
(59, NULL, NULL, '2025-11-30 13:16:48'),
(60, NULL, NULL, '2025-11-30 13:16:48'),
(61, 'Juan Insert a Operation Named test created at 2025-11-30 13:17:32', 'e378f552', '2025-11-30 13:17:32'),
(62, NULL, NULL, '2025-11-30 13:18:48'),
(63, 'Juan Updated a Operation ID 15 at 2025-11-30 13:19:24', 'e378f552', '2025-11-30 13:19:24'),
(64, 'Juan Updated a Operation ID 14 at 2025-11-30 13:19:37', 'e378f552', '2025-11-30 13:19:37'),
(65, NULL, NULL, '2025-11-30 13:20:03'),
(66, NULL, NULL, '2025-11-30 13:20:03'),
(67, NULL, NULL, '2025-11-30 13:21:48');

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
(1, 'BIRTHDAY', b'0', 'e378f552', 'BIRTHDAY BOYYY', '2025-11-22 19:18:25', '2025-11-29 23:59:00'),
(4, 'LALA', b'0', '7d6fb9ea', 'kahit ano', '2025-11-23 18:30:04', '2025-11-23 19:32:00'),
(5, 'LALA', b'0', '7d6fb9ea', 'kahit ano', '2025-11-24 23:36:44', '2025-11-24 23:38:00'),
(6, 'LALA', b'0', '7d6fb9ea', 'kahit ano', '2025-11-25 00:02:53', '2025-11-26 00:02:00'),
(7, 'LALA', b'0', '7d6fb9ea', 'kahit ano', '2025-11-26 11:54:56', '2025-11-26 11:56:00'),
(10, 'sssss', b'0', 'e378f552', 'kahit anossssssssssss', '2025-11-26 22:05:49', '2025-11-27 22:05:00'),
(12, 'ddd', b'0', '7d6fb9ea', 'ddd', '2025-11-26 22:23:43', '2025-11-27 22:23:00'),
(14, 'ddd', b'1', '7d6fb9ea', 'ddd', '2025-11-29 15:46:32', '2025-11-30 20:46:00'),
(15, 'test', b'0', 'e378f552', 'test', '2025-11-30 13:17:32', '2025-11-30 13:21:00');

--
-- Triggers `operations`
--
DELIMITER $$
CREATE TRIGGER `operation_deletelog` AFTER DELETE ON `operations` FOR EACH ROW BEGIN
INSERT INTO logs(logs, user_id, date_generated)
VALUES(
    CONCAT(
        (SELECT givenName FROM users WHERE id = @currentuser_id),
        ' Delete Operation ID ',
        OLD.operation_id,
        ' at ',
        NOW()
        ),
    @currentuser_id,
    NOW()
);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `operation_insertlog` AFTER INSERT ON `operations` FOR EACH ROW BEGIN
INSERT INTO logs(logs, user_id, date_generated)
VALUES(
    CONCAT(
        (SELECT givenName FROM users WHERE id = NEW.operated_by),
        ' Insert a Operation Named ',
        (SELECT operation_name FROM operations WHERE operation_id = NEW.operation_id),
        ' created at ',
        NEW.created_at
        ),
    NEW.operated_by,
    NOW()
   );
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `operation_updatelog` AFTER UPDATE ON `operations` FOR EACH ROW BEGIN
INSERT INTO logs(logs, user_id, date_generated)
VALUES(
    CONCAT(
     (SELECT givenName FROM users WHERE id = @currentuser_id), 
     ' Updated a Operation ID ', 
     (SELECT operation_id FROM operations WHERE operation_id = OLD.operation_id),
     ' at ',
     NOW() 
    ),
   @currentuser_id,
   NOW()
  );
END
$$
DELIMITER ;

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
(85, 'hh', '7d6fb9ea', 1, 22, b'0', '2025-11-29 15:45:40');

--
-- Triggers `transactions`
--
DELIMITER $$
CREATE TRIGGER `transaction_deletelog` AFTER DELETE ON `transactions` FOR EACH ROW BEGIN
INSERT INTO logs(logs, user_id, date_generated)
VALUES(
    CONCAT(
        (SELECT givenName FROM users WHERE id = @currentuser_id),
        ' Deleted Transaction ID ',
        OLD.transaction_id,
        ' at ',
        NOW()
        ),
    @currentuser_id,
    NOW()
);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `transaction_insertlog` AFTER INSERT ON `transactions` FOR EACH ROW BEGIN
INSERT INTO logs(logs, user_id, date_generated)
VALUES(
    CONCAT(
        (SELECT givenName FROM users WHERE id = NEW.transactioned_by),
        ' Inserted a Transaction Record named ',
        (SELECT transaction_name FROM transactions WHERE transaction_id = NEW.transaction_id),
        ' created at ',
        NEW.created_at
        ),
    NEW.transactioned_by,
    NOW()
   );
END
$$
DELIMITER ;

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
('e378f552', 'Juan', 'Dela', 'Cruz', '202310387', 'alwaysssss'),
('e37e13cf', 'Maria', 'Santos', 'Lopez', 'marial', 'hashed_pass2'),
('e381b579', 'Pedro', 'Gomez', 'Reyes', 'pedror', 'hashed_pass3'),
('e3854462', 'Ana', 'Villanueva', 'Garcia', 'anavg', 'hashed_pass4'),
('e3894195', 'Carlos', 'Martinez', 'Diaz', 'carlosmd', 'hashed_pass5'),
('e38d775b', 'Sofia', 'Luna', 'Torres', '202310388', 'true');

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
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `fk_user` (`user_id`);

--
-- Indexes for table `operations`
--
ALTER TABLE `operations`
  ADD PRIMARY KEY (`operation_id`),
  ADD KEY `fk_operated_by` (`operated_by`);

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
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `operations`
--
ALTER TABLE `operations`
  MODIFY `operation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `fk_added_by` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
CREATE DEFINER=`root`@`localhost` EVENT `finish_operation` ON SCHEDULE EVERY 1 MINUTE STARTS '2025-11-30 13:16:48' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE operations 
SET isactive = 0 
WHERE expected_finish <= NOW()
AND isactive = 1$$

CREATE DEFINER=`root`@`localhost` EVENT `start_operation` ON SCHEDULE EVERY 1 MINUTE STARTS '2025-11-30 13:17:03' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE operations 
SET isactive = 1 
WHERE expected_finish >= NOW()
AND isactive = 0$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

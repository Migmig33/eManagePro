-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2025 at 06:27 AM
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
(30, 'Wireless Mouse', 450, 35, 'e378f552'),
(31, 'Mechanical Keyboard', 2200, 10, 'e378f552'),
(32, 'USB-C Charger', 650, 11, 'e378f552'),
(33, 'HDMI Cable', 150, 47, 'e378f552'),
(34, 'Laptop Stand', 900, 18, 'e378f552'),
(35, 'Bluetooth Speaker', 1200, 15, 'e378f552'),
(36, 'Earphones', 300, 100, 'e378f552'),
(37, 'Webcam 1080p', 800, 18, 'e378f552'),
(38, 'Gaming Headset', 1600, 10, 'e378f552'),
(39, 'Portable SSD 1TB', 4200, 8, 'e378f552'),
(40, '32GB Flash Drive', 280, 19, 'e378f552'),
(41, 'Office Chair', 5200, 6, 'e378f552'),
(42, 'Notebook A5', 50, 198, 'e378f552'),
(43, 'Ballpoint Pen Pack', 40, 148, 'e378f552'),
(44, 'Graphic Tablet', 3500, 5, 'e378f552'),
(45, 'Smartwatch', 2500, 9, 'e378f552'),
(46, 'Wireless Router', 1800, 2, 'e378f552'),
(47, 'LED Desk Lamp', 600, 30, 'e378f552'),
(48, 'Power Bank 10000mAh', 900, 25, 'e378f552'),
(49, 'Portable Projector', 6800, 4, 'e378f552');

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
(79, 'Miguel  Insert a Operation Named Cut Material created at 2025-12-11 09:12:05', '7d6fb9ea', '2025-12-11 09:12:05'),
(80, 'Miguel  Insert a Operation Named Quality Inspection created at 2025-12-11 09:12:52', '7d6fb9ea', '2025-12-11 09:12:52'),
(81, 'Miguel  Insert a Operation Named Packaging created at 2025-12-11 09:13:17', '7d6fb9ea', '2025-12-11 09:13:17'),
(82, 'Miguel  Insert a Operation Named Painting / Coating created at 2025-12-11 09:14:20', '7d6fb9ea', '2025-12-11 09:14:20'),
(83, 'Miguel  Inserted a Transaction Record named TEST created at 2025-12-11 09:16:33', '7d6fb9ea', '2025-12-11 09:16:33'),
(84, 'Miguel  Inserted a Transaction Record named TEST created at 2025-12-11 09:17:09', '7d6fb9ea', '2025-12-11 09:17:09'),
(85, 'Miguel  Inserted a Transaction Record named TEST created at 2025-12-11 09:24:50', '7d6fb9ea', '2025-12-11 09:24:50'),
(86, 'Miguel  Inserted a Transaction Record named TEST created at 2025-12-11 09:25:11', '7d6fb9ea', '2025-12-11 09:25:11'),
(87, 'Miguel  Inserted a Transaction Record named TEST created at 2025-12-11 09:27:02', '7d6fb9ea', '2025-12-11 09:27:02'),
(88, 'Miguel  Inserted a Transaction Record named TEST created at 2025-12-11 09:27:11', '7d6fb9ea', '2025-12-11 09:27:11'),
(89, 'Miguel  Inserted a Transaction Record named TEST created at 2025-12-11 09:28:55', '7d6fb9ea', '2025-12-11 09:28:55'),
(90, NULL, NULL, '2025-12-11 09:29:50'),
(91, NULL, NULL, '2025-12-11 09:29:50'),
(92, NULL, NULL, '2025-12-11 09:29:50'),
(93, NULL, NULL, '2025-12-11 09:29:50'),
(94, NULL, NULL, '2025-12-11 09:29:50'),
(95, NULL, NULL, '2025-12-11 09:29:50'),
(96, NULL, NULL, '2025-12-11 09:29:50'),
(97, NULL, NULL, '2025-12-11 09:35:36'),
(98, NULL, NULL, '2025-12-11 09:35:36'),
(99, NULL, NULL, '2025-12-11 09:35:36'),
(100, NULL, NULL, '2025-12-11 01:36:03'),
(101, NULL, NULL, '2025-12-11 01:36:03'),
(102, NULL, NULL, '2025-12-11 01:36:03'),
(103, NULL, NULL, '2025-12-11 09:36:28'),
(104, NULL, NULL, '2025-12-11 09:36:48'),
(105, NULL, NULL, '2025-12-11 09:36:48'),
(106, NULL, NULL, '2025-12-11 01:37:03'),
(107, NULL, NULL, '2025-12-11 01:37:03'),
(108, NULL, NULL, '2025-12-11 01:37:03'),
(109, 'Miguel  Inserted a Transaction Record named TEST created at 2025-12-11 09:52:48', '7d6fb9ea', '2025-12-11 09:52:48'),
(110, 'Miguel  Deleted Transaction ID 93 at 2025-12-11 10:04:36', '7d6fb9ea', '2025-12-11 10:04:36'),
(111, 'Miguel  Inserted a Transaction Record named Bought - ROUTER created at 2025-12-11 10:05:57', '7d6fb9ea', '2025-12-11 10:05:57'),
(112, 'Miguel  Inserted a Transaction Record named Bought - USB created at 2025-12-11 10:06:52', '7d6fb9ea', '2025-12-11 10:06:52'),
(113, 'Miguel  Inserted a Transaction Record named Bought - USB created at 2025-12-11 10:07:02', '7d6fb9ea', '2025-12-11 10:07:02'),
(114, 'Miguel  Deleted Transaction ID 96 at 2025-12-11 10:07:17', '7d6fb9ea', '2025-12-11 10:07:17'),
(115, 'Miguel  Deleted Transaction ID 95 at 2025-12-11 10:07:30', '7d6fb9ea', '2025-12-11 10:07:30'),
(116, 'Miguel  Deleted Transaction ID 94 at 2025-12-11 10:07:36', '7d6fb9ea', '2025-12-11 10:07:36'),
(117, NULL, NULL, '2025-12-11 10:47:43'),
(118, NULL, NULL, '2025-12-11 10:47:50'),
(119, NULL, NULL, '2025-12-11 10:51:49'),
(120, NULL, NULL, '2025-12-11 10:51:49'),
(121, NULL, NULL, '2025-12-11 10:53:53'),
(122, 'Miguel  Updated a Operation ID 17 at 2025-12-11 10:55:03', '7d6fb9ea', '2025-12-11 10:55:03'),
(123, NULL, NULL, '2025-12-11 10:55:15'),
(124, 'Miguel  Insert a Operation Named feff created at 2025-12-11 10:55:44', '7d6fb9ea', '2025-12-11 10:55:44'),
(125, NULL, NULL, '2025-12-11 10:56:15'),
(126, 'Miguel  Updated a Operation ID 20 at 2025-12-11 11:00:05', '7d6fb9ea', '2025-12-11 11:00:05'),
(127, 'Miguel  Updated a Operation ID 19 at 2025-12-11 11:00:10', '7d6fb9ea', '2025-12-11 11:00:10'),
(128, NULL, NULL, '2025-12-11 11:00:53'),
(129, NULL, NULL, '2025-12-11 11:00:53'),
(130, 'Sofia Inserted a Transaction Record named BENTA NG SHABUddd created at 2025-12-11 11:14:18', 'e38d775b', '2025-12-11 11:14:18'),
(131, 'Miguel  Updated Operation ID 20 at 2025-12-11 13:15:57', '7d6fb9ea', '2025-12-11 13:15:57'),
(132, 'Miguel  Deleted Transaction ID 97 at 2025-12-11 13:16:39', '7d6fb9ea', '2025-12-11 13:16:39'),
(133, 'Miguel  Inserted Transaction Record named BENTA NG SHABUddd created at 2025-12-11 13:26:25', '7d6fb9ea', '2025-12-11 13:26:25'),
(134, NULL, NULL, '2025-12-11 13:27:15');

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
(16, 'Cut Material', b'0', '7d6fb9ea', 'Cut raw materials (wood, metal, composite, etc.) according to project measurements and specification', '2025-12-11 09:12:05', '2025-12-11 09:13:00'),
(17, 'Quality Inspection', b'0', '7d6fb9ea', 'Inspect completed work for accuracy, finish quality, and compliance with project specifications.', '2025-12-11 09:12:52', '2025-12-11 09:12:00'),
(18, 'Packaging', b'0', '7d6fb9ea', 'Securely package finished products for delivery, ensuring protection during transport.', '2025-12-11 09:13:17', '2025-12-11 09:14:00'),
(19, 'Painting / Coating', b'1', '7d6fb9ea', 'Apply paint, stain, laminate, or protective coating to finished components.', '2025-12-11 09:14:20', '2025-12-12 09:14:00'),
(20, 'feff', b'0', '7d6fb9ea', 'oplan tokhang', '2025-12-11 10:55:44', '2025-12-11 10:57:00');

--
-- Triggers `operations`
--
DELIMITER $$
CREATE TRIGGER `operation_deletelog` AFTER DELETE ON `operations` FOR EACH ROW BEGIN
INSERT INTO logs(logs, user_id, date_generated)
VALUES(
    CONCAT(
        (SELECT givenName FROM users WHERE id = @currentuser_id),
        ' Deleted Operation ID ',
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
        ' Insert Operation Name ',
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
     ' Updated Operation ID ', 
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
  `customer_name` varchar(100) NOT NULL,
  `transactioned_by` char(8) NOT NULL,
  `quantity` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `is_archived` bit(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `transaction_name`, `customer_name`, `transactioned_by`, `quantity`, `item_id`, `is_archived`, `created_at`) VALUES
(98, 'BENTA NG SHABUddd', '1', '7d6fb9ea', 2, 42, b'0', '2025-12-11 13:26:25');

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
        ' Inserted Transaction Record named ',
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
('7d6fb9ea', 'Miguel ', 'Andrei', 'Tan', '202310386', 'true'),
('e378f552', 'Juan', 'Dela', 'Cruz', '202310387', 'alwaysssss'),
('e37e13cf', 'Maria', 'Santos', 'Lopez', '202310389', 'true'),
('e381b579', 'Pedro', 'Gomez', 'Reyes', '202310390', 'true'),
('e3854462', 'Ana', 'Villanueva', 'Garcia', '202310391', 'true'),
('e3894195', 'Carlos', 'Martinez', 'Diaz', '202310393', 'true'),
('e38d775b', 'Sofia', 'Luna', 'Torres', '202310392', 'true');

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
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `operations`
--
ALTER TABLE `operations`
  MODIFY `operation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

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
CREATE DEFINER=`root`@`localhost` EVENT `operationend` ON SCHEDULE EVERY 1 MINUTE STARTS '2025-12-11 09:39:15' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE operations
SET isactive = 0
WHERE expected_finish <= NOW()
AND isactive = 1$$

CREATE DEFINER=`root`@`localhost` EVENT `operationstart` ON SCHEDULE EVERY 1 MINUTE STARTS '2025-12-11 09:42:53' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE operations
SET isactive = 1
WHERE expected_finish > NOW()
AND isactive = 0$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

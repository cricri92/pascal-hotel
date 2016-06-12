-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 08, 2015 at 08:45 PM
-- Server version: 5.6.25-0ubuntu0.15.04.1
-- PHP Version: 5.6.4-4ubuntu6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pascal_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `available_rooms`
--

CREATE TABLE IF NOT EXISTS `available_rooms` (
`id` int(11) NOT NULL,
  `available_room_id` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `available_rooms`
--

INSERT INTO `available_rooms` (`id`, `available_room_id`, `create_at`, `update_at`) VALUES
(20, 5, '2015-09-07 21:34:35', '2015-09-07 21:34:35'),
(21, 6, '2015-09-07 21:34:35', '2015-09-07 21:34:35'),
(23, 7, '2015-09-07 21:34:35', '2015-09-07 21:34:35'),
(24, 8, '2015-09-07 21:34:35', '2015-09-07 21:34:35');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cedula` int(20) NOT NULL,
  `direccion` varchar(500) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `cedula`, `direccion`, `telefono`, `create_at`, `update_at`) VALUES
(7, 'Salomón Ruiz M.', 7025488, 'Las sdfkjsdkjf', '0414-415176', '2015-09-07 08:23:00', '2015-09-07 09:03:16'),
(8, 'Hector Flores', 20162504, 'sdfasd', '0412-7762882', '2015-09-08 03:01:49', '2015-09-08 03:01:49'),
(9, 'Ornela Ruiz', 21032767, 'sdfsdagdasg', '0412-4086215', '2015-09-08 03:02:17', '2015-09-08 03:02:17'),
(10, 'Oriana Ruiz', 21032766, 'asdgadfag', '0414-0465042', '2015-09-08 03:02:47', '2015-09-08 03:02:47'),
(11, 'Flavio Ruiz', 26162603, 'dfgwfdg', '0414-415176', '2015-09-08 17:37:10', '2015-09-08 17:37:10');

-- --------------------------------------------------------

--
-- Table structure for table `reservationes`
--

CREATE TABLE IF NOT EXISTS `reservationes` (
`id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `cant_personas` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservationes`
--

INSERT INTO `reservationes` (`id`, `room_id`, `customer_id`, `check_in`, `check_out`, `cant_personas`, `create_at`, `update_at`) VALUES
(11, 3, 10, '2015-09-08', '2015-09-10', 3, '2015-09-09 01:06:08', '2015-09-09 01:06:08');

-- --------------------------------------------------------

--
-- Table structure for table `reserved_rooms`
--

CREATE TABLE IF NOT EXISTS `reserved_rooms` (
`id` int(11) NOT NULL,
  `reserved_room_id` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reserved_rooms`
--

INSERT INTO `reserved_rooms` (`id`, `reserved_room_id`, `create_at`, `update_at`) VALUES
(3, 4, '2015-09-08 04:14:21', '2015-09-08 04:14:21'),
(6, 3, '2015-09-08 18:07:27', '2015-09-08 18:07:27');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Administrador'),
(2, 'Recepcionista'),
(3, 'Gerente');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
`id` int(11) NOT NULL,
  `number` varchar(10) NOT NULL,
  `room_name` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `number`, `room_name`, `capacity`, `create_at`, `update_at`) VALUES
(3, '002', 'Casa', 4, '2015-09-07 03:53:35', '2015-09-07 03:53:35'),
(4, '003', 'Montonera', 6, '2015-09-07 03:53:54', '2015-09-07 03:53:54'),
(5, '004', 'Hogar 2', 2, '2015-09-07 19:18:01', '2015-09-07 19:18:01'),
(6, '001', 'Hogar', 2, '2015-09-07 19:19:09', '2015-09-07 19:19:09'),
(7, '005', 'Casa 2', 4, '2015-09-07 19:19:31', '2015-09-07 19:19:31'),
(8, '006', 'Montonera 2', 6, '2015-09-07 19:19:47', '2015-09-07 19:19:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_role` int(11) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_name`, `user_role`, `pass`, `create_at`, `update_at`) VALUES
(1, 'Oriana Ruiz', 'oruiz', 1, '4b0b99aa78b19bf81811b104f22caa63bae621c0', '2015-09-02 21:42:44', '2015-09-04 17:37:17'),
(4, 'Ornela Ruiz', 'serynn', 2, '4ca4adb0b7c03a4414497f2d6fa00ae70b4c88f2', '2015-09-06 06:30:15', '2015-09-06 06:30:15'),
(5, 'Flavio Ruiz', 'scottap', 3, 'f4816daeeebd03fa98b9900f99abe7f1c6e889e8', '2015-09-08 21:57:50', '2015-09-08 21:57:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `available_rooms`
--
ALTER TABLE `available_rooms`
 ADD PRIMARY KEY (`id`), ADD KEY `available_room_id` (`available_room_id`), ADD KEY `available_room_id_2` (`available_room_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
 ADD PRIMARY KEY (`id`), ADD KEY `cedula` (`cedula`);

--
-- Indexes for table `reservationes`
--
ALTER TABLE `reservationes`
 ADD PRIMARY KEY (`id`), ADD KEY `room_id` (`room_id`,`customer_id`), ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `reserved_rooms`
--
ALTER TABLE `reserved_rooms`
 ADD PRIMARY KEY (`id`), ADD KEY `reserved_room_id` (`reserved_room_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD KEY `user_role` (`user_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `available_rooms`
--
ALTER TABLE `available_rooms`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `reservationes`
--
ALTER TABLE `reservationes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `reserved_rooms`
--
ALTER TABLE `reserved_rooms`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `available_rooms`
--
ALTER TABLE `available_rooms`
ADD CONSTRAINT `available_rooms_ibfk_1` FOREIGN KEY (`available_room_id`) REFERENCES `rooms` (`id`);

--
-- Constraints for table `reservationes`
--
ALTER TABLE `reservationes`
ADD CONSTRAINT `reservationes_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`),
ADD CONSTRAINT `reservationes_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `reserved_rooms`
--
ALTER TABLE `reserved_rooms`
ADD CONSTRAINT `reserved_rooms_ibfk_1` FOREIGN KEY (`reserved_room_id`) REFERENCES `rooms` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_role`) REFERENCES `roles` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

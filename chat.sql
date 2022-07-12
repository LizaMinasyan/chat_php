-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 12, 2022 at 11:50 AM
-- Server version: 8.0.24
-- PHP Version: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `category_name` varchar(60) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `user_id`, `created_at`, `update_at`) VALUES
(1, 'computers', 13, '2022-07-06 18:16:48', '2022-07-06 18:16:48'),
(2, 'mouse', 13, '2022-07-06 20:37:58', '2022-07-06 20:37:58'),
(4, 'computers', 17, '2022-07-06 21:32:38', '2022-07-06 21:32:38'),
(5, 'computers', 17, '2022-07-06 21:32:49', '2022-07-06 21:32:49'),
(6, 'computers', 17, '2022-07-06 21:32:59', '2022-07-06 21:32:59'),
(7, 'computers', 17, '2022-07-06 21:33:09', '2022-07-06 21:33:09'),
(8, 'computers', 17, '2022-07-06 21:33:19', '2022-07-06 21:33:19'),
(9, 'computers2', 17, '2022-07-06 21:33:40', '2022-07-06 21:33:40'),
(10, 'computers2', 17, '2022-07-06 21:33:50', '2022-07-06 21:33:50'),
(11, 'computers2', 17, '2022-07-06 21:34:01', '2022-07-06 21:34:01'),
(12, 'computers2', 17, '2022-07-06 21:34:11', '2022-07-06 21:34:11');

-- --------------------------------------------------------

--
-- Table structure for table `friend_list`
--

CREATE TABLE `friend_list` (
  `id` int NOT NULL,
  `user_one_id` int DEFAULT NULL,
  `user_to_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `friend_list`
--

INSERT INTO `friend_list` (`id`, `user_one_id`, `user_to_id`) VALUES
(1, 13, 14),
(2, 13, 17),
(3, 13, 17),
(4, 17, 13),
(5, 13, 20);

-- --------------------------------------------------------

--
-- Table structure for table `friend_requests`
--

CREATE TABLE `friend_requests` (
  `from_user_id` int DEFAULT NULL,
  `to_user_id` int DEFAULT NULL,
  `is_checkes` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `friend_requests`
--

INSERT INTO `friend_requests` (`from_user_id`, `to_user_id`, `is_checkes`, `created_at`) VALUES
(13, 14, 1, '2022-07-06 14:04:55'),
(13, 17, 1, '2022-07-06 16:49:37'),
(17, 13, 1, '2022-07-06 17:30:50'),
(13, 20, 1, '2022-07-12 08:24:37'),
(20, 13, 0, '2022-07-12 08:24:41'),
(20, 17, 0, '2022-07-12 08:24:53');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int NOT NULL,
  `context` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `context`, `created_at`) VALUES
(21, 'barev', '2022-07-12 08:36:35'),
(22, 'Hi!', '2022-07-12 08:37:05');

-- --------------------------------------------------------

--
-- Table structure for table `messages_list`
--

CREATE TABLE `messages_list` (
  `from_id` int DEFAULT NULL,
  `to_id` int DEFAULT NULL,
  `msg_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `messages_list`
--

INSERT INTO `messages_list` (`from_id`, `to_id`, `msg_id`) VALUES
(20, 13, 21),
(13, 20, 22);

-- --------------------------------------------------------

--
-- Table structure for table `users_table`
--

CREATE TABLE `users_table` (
  `id` int NOT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `registred_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`id`, `first_name`, `last_name`, `birth_date`, `avatar`, `email`, `password`, `is_active`, `registred_at`) VALUES
(13, 'Tom', 'Smith', '2000-10-02', '1657114234.jpeg', 'tom@mail.ru', '81dc9bdb52d04dc20036dbd8313ed055', 0, '2022-07-06 13:30:34'),
(14, 'Davit', 'Davtyan', '2002-10-08', '1657114272.jfif', 'dav@mail.ru', '81dc9bdb52d04dc20036dbd8313ed055', 1, '2022-07-06 13:31:12'),
(15, 'Arsen', 'Sargsyan', '1990-10-10', '1657114315.jpg', 'arsen@mail.ru', '81dc9bdb52d04dc20036dbd8313ed055', 0, '2022-07-06 13:31:55'),
(16, 'Կարեն', 'Կարապետյան', '2005-02-03', '1657125795.jfif', 'Kar1@mail.ru', '81dc9bdb52d04dc20036dbd8313ed055', 0, '2022-07-06 16:43:15'),
(17, 'Liza', 'Minasyan', '2003-04-06', '1657126127.jpg', 'Liza@mail.ru', 'a591024321c5e2bdbd23ed35f0574dde', 0, '2022-07-06 16:48:47'),
(18, 'Tom', 'Smithh', '2008-02-03', '1657129474.jpg', 'tom2@mail.ru', 'd79c8788088c2193f0244d8f1f36d2db', 0, '2022-07-06 17:44:34'),
(19, 'Tom', 'Smithh', '2008-02-03', '1657129484.jpg', 'tom2@mail.ru', 'd79c8788088c2193f0244d8f1f36d2db', 0, '2022-07-06 17:44:44'),
(20, 'Ani', 'Minasyan', '2009-05-06', '1657614137.jpg', 'Ani@mail.ru', 'b8b4b727d6f5d1b61fff7be687f7970f', 1, '2022-07-12 08:22:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `friend_list`
--
ALTER TABLE `friend_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_one_id` (`user_one_id`),
  ADD KEY `user_to_id` (`user_to_id`);

--
-- Indexes for table `friend_requests`
--
ALTER TABLE `friend_requests`
  ADD KEY `from_user_id` (`from_user_id`),
  ADD KEY `to_user_id` (`to_user_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages_list`
--
ALTER TABLE `messages_list`
  ADD KEY `from_id` (`from_id`),
  ADD KEY `to_id` (`to_id`),
  ADD KEY `msg_id` (`msg_id`);

--
-- Indexes for table `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `friend_list`
--
ALTER TABLE `friend_list`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users_table`
--
ALTER TABLE `users_table`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users_table` (`id`);

--
-- Constraints for table `friend_list`
--
ALTER TABLE `friend_list`
  ADD CONSTRAINT `friend_list_ibfk_1` FOREIGN KEY (`user_one_id`) REFERENCES `users_table` (`id`),
  ADD CONSTRAINT `friend_list_ibfk_2` FOREIGN KEY (`user_to_id`) REFERENCES `users_table` (`id`);

--
-- Constraints for table `friend_requests`
--
ALTER TABLE `friend_requests`
  ADD CONSTRAINT `friend_requests_ibfk_1` FOREIGN KEY (`from_user_id`) REFERENCES `users_table` (`id`),
  ADD CONSTRAINT `friend_requests_ibfk_2` FOREIGN KEY (`to_user_id`) REFERENCES `users_table` (`id`);

--
-- Constraints for table `messages_list`
--
ALTER TABLE `messages_list`
  ADD CONSTRAINT `messages_list_ibfk_1` FOREIGN KEY (`from_id`) REFERENCES `users_table` (`id`),
  ADD CONSTRAINT `messages_list_ibfk_2` FOREIGN KEY (`to_id`) REFERENCES `users_table` (`id`),
  ADD CONSTRAINT `messages_list_ibfk_3` FOREIGN KEY (`msg_id`) REFERENCES `messages` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

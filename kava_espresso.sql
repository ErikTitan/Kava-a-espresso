-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2024 at 07:19 PM
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
-- Database: `kava_espresso`
--

-- --------------------------------------------------------

--
-- Table structure for table `coffee_recipes`
--

CREATE TABLE `coffee_recipes` (
  `recipe_id` int(11) NOT NULL,
  `roast_type` varchar(50) NOT NULL,
  `water_amount` int(11) NOT NULL,
  `coffee_amount` int(11) NOT NULL,
  `recipe_name` varchar(100) NOT NULL,
  `users_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coffee_recipes`
--

INSERT INTO `coffee_recipes` (`recipe_id`, `roast_type`, `water_amount`, `coffee_amount`, `recipe_name`, `users_id`) VALUES
(49, 'dark', 2, 3, 'jedna', 24),
(50, 'light', 2, 3, 'light 2 3', 24),
(51, 'light', 1, 1, 'jedna 1 1', 24),
(57, 'medium', 300, 11, 'americano', 26),
(58, 'medium', 300, 12, 'recept ', 27),
(59, 'medium', 36, 18, 'klasicke espresso', 28),
(60, 'light', 40, 18, 'light roast espresso', 28),
(73, 'light', 100, 10, 'test', 25),
(74, 'light', 123, 2345, 'super kavicka', 25),
(76, 'dark', 434, 234, 'velka kava', 30),
(77, 'medium', 35, 18, 'defaultne espresso test', 31);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `users_uid` tinytext NOT NULL,
  `admin` tinyint(4) NOT NULL,
  `users_pwd` longtext NOT NULL,
  `users_email` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `users_uid`, `admin`, `users_pwd`, `users_email`) VALUES
(19, 'test4', 0, '$2y$10$pIQzLJQTHcCikmPo5jxyPOnqHvPqu3.ZYO.aS3Vbw1PCUn/zY2h.6', 'test4@gmail.com'),
(20, 'recepty', 0, '$2y$10$a01bajD.XcZbrxo/EsoPIO6agJyiyNnfHhBkqcEvGO.SdbM4wcA9a', 'recepty@gmail.com'),
(21, 'receptest', 0, '$2y$10$uvpaWauk0pQnixVIGMxmEOPbTgRHzsp76So.apkmv5Aq8buvzExyW', 'randomemail@gmail.com'),
(22, 'Samko', 0, '$2y$10$Ylo88n.9p9n.cBRVqAQ.cOe8ugw.8pfutQlNH/fquWF8kJQA6bpqG', 'samko@gmail.com'),
(24, 'randomclovek', 0, '$2y$10$rWfxGy2y04LclerfX4py3.TeuWZN6/x5L7OVOVPOhMzBio/286DaO', 'randomclovek@gmail.com'),
(25, 'ErikTitanSK', 1, '$2y$10$Rkn35tBNqPx8yeh6D4uNduDHCqFzZJjeTQMtzYdR010Scni2ReCEO', 'erik123@gmail.com'),
(26, 'Monika', 0, '$2y$10$4Ly/wXCLDryKPBQj8G.p2udMwQDyPBaAxSOOig3I8iGwVBjHhHCvK', 'monika@gmail.com'),
(27, 'asdlkjjhasdkljh', 0, '$2y$10$iTrDdc5MBz.ARkin7WjB/uAMA3OV2uQuXtScyG/Uhsymz8/rZ0NeO', 'asduyysfduykasdt@gmail.com'),
(28, 'SelrucLungo', 0, '$2y$10$wwF8kquJ7qp/MrhmtluYcOu//1YmjcLiQWdiRwqLAWVFJoGWn2SNi', 'asdjhgv@gmail.com'),
(29, 'NieAdminTest', 0, '$2y$10$yvQy98o.17cZkdsDuNJ30ePRIp1KY5HUhSUhKsOSg2PJgSeZlwGya', 'niesomadmin@gmail.com'),
(30, 'Niesomadmin123', 0, '$2y$10$4DAA.hyO6QOqEdZRkhD75u41NVm5jCWN3Asn8rI43HxhgClTI77de', 'nieadmin@gmail.com'),
(31, 'Simino', 0, '$2y$10$sQpDA.p9xtzW1WSYuF/gfOehenbE36aCbEI61SIjmbGf7r8u7RMZa', 'simino@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coffee_recipes`
--
ALTER TABLE `coffee_recipes`
  ADD PRIMARY KEY (`recipe_id`),
  ADD KEY `user_id` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coffee_recipes`
--
ALTER TABLE `coffee_recipes`
  MODIFY `recipe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `coffee_recipes`
--
ALTER TABLE `coffee_recipes`
  ADD CONSTRAINT `coffee_recipes_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

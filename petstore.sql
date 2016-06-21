-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 21, 2016 at 10:34 PM
-- Server version: 5.5.45
-- PHP Version: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_session`
--

CREATE TABLE `login_session` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `session_token` varchar(255) NOT NULL,
  `end_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_session`
--

INSERT INTO `login_session` (`id`, `user_id`, `start_time`, `session_token`, `end_time`) VALUES
(1, 1, '2016-06-18 21:25:00', 'hdslhdslakhlhslcshlshsckhlcahsaclkhsacklsasa', NULL),
(2, 1, '2016-06-20 23:29:45', '85EB922F-04AE-4A5F-BB05-3C6735B82045', NULL),
(3, 1, '2016-06-20 23:32:29', '730242B4-2AB9-45F8-BEF0-E0662EE00AA7', NULL),
(4, 1, '2016-06-20 22:36:06', '164B6D76-5D83-4469-BCB4-68B9DD9EF1D4', NULL),
(5, 1, '2016-06-20 22:39:09', '3082DFD0-FB11-424F-8CDF-F81F1CF8C49F', NULL),
(6, 1, '2016-06-21 06:07:16', 'ECCCDE2A-8C8A-45F1-B48A-C1A89E0074DB', NULL),
(7, 1, '2016-06-21 18:38:37', 'B3610011-0AF9-41EF-82CE-40F2200CF03F', NULL),
(8, 1, '2016-06-21 18:54:21', '0B31C862-8BF2-4F49-B342-9839FAA97DDD', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pet_details`
--

CREATE TABLE `pet_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `species` varchar(255) NOT NULL,
  `subspecies` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `weight` float NOT NULL,
  `price` float NOT NULL,
  `description` varchar(1024) NOT NULL,
  `colour` varchar(100) NOT NULL,
  `collection_location` varchar(500) NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pet_details`
--

INSERT INTO `pet_details` (`id`, `user_id`, `name`, `species`, `subspecies`, `dob`, `weight`, `price`, `description`, `colour`, `collection_location`, `image_url`) VALUES
(1, 1, 'Tommy', 'Dog', 'Golden Retriever', '2016-03-18', 12, 200, 'Fully house trained. ', 'Wheatish', 'Falkirk', 'http://imgur.com/r/goldenretrievers/ninszTZ'),
(2, 1, 'jason', 'dog', 'german shepherd', '2016-05-01', 11, 300, 'Fully house trained', 'gray', 'Bearsden', 'none'),
(3, 1, 'jason', 'dog', 'german shepherd', '2016-05-01', 11, 300, 'Fully house trained', 'gray', 'Bearsden', 'none'),
(4, 1, 'freddy', 'dog', 'labrador', '2016-05-12', 11, 300, 'Fully house trained', 'gray', 'Bishopriggs', 'none'),
(5, 1, 'spark', 'cat', 'angora', '2016-03-17', 3, 150, 'Fully house trained', 'white', 'West End of Glasgow', 'none'),
(6, 1, 'infy', 'dog', 'poodle', '2016-04-01', 6, 125, 'Fully house trained', 'white', '700, Barbell Crescent, Rodington, AK1 4GH', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `email`, `phone`, `address`) VALUES
(1, 'Shikha Sarkar', 'Shikha', '$2y$10$NpQlVVIHFlKYrABYQryv7uFBFazuU9jnR3oCpriOEVNo6xcSG3aCO', 'shikha.paimajumder@gmail.com', '07588765370', '35 Saint Mungo Avenue, Glasgow, UK'),
(2, 'Sam', 'Sam', '$2y$10$YWWVsAw4zXHl6QstxiDenOYecx5xHkEAuFCxhmt/vw6WdBNiuUWxG', 'sam@gmail.com', '12345678', 'Bearsden Cross, Glasgow, UK'),
(3, 'Fraser', 'Fraser', '$2y$10$Mr5/oHLemiDXEEvWB6X1jubeEcqjpeAkZuDuuRgfbz0FplEg1QTiO', 'fraser@gmail.com', '56781234', 'Bishopbriggs, Glasgow, UK'),
(4, 'Robert', 'Robert', '$2y$10$aPeCrmiVfcydHtdt418ZKOWtGNRqKOwdaBzz/FUdP4uBynHdvvpqq', 'rob@gmail.com', '78390456', 'Lenzie, Glasgow, UK'),
(5, 'Sharanya Majumder', 'Sharanya', '$2y$10$rkKS.lMu4TRmJICQqfYqeeeRDhlemEe8rC1NeYSfhJxtWY/IX841i', 'joule@gmail.com', '12345', '2/2 35 st mungo avenue'),
(6, 'William', 'William', '$2y$10$lmWmbvVZJa4adR/QWMRx3eK6een8DQePt41giYC2DLZ7sVZ8p5I4O', 'william@gmail.com', '78678909', 'Clarkston, East Renfrewshire, UK'),
(7, 'Darren Jones', 'Darren', '$2y$10$kl.iNJJBzmu/8q6Qy9A5nuJW1CbYd22Bw0Xy6nvFRNQG4Uvy.l8G.', 'darren@gmail.com', '78643278', 'Busby, East Renfrewshire, UK'),
(8, 'Amanda McMillan', 'mandy', '$2y$10$JHzqqVyACzGhLcInQyj/E.zx7WswJuDNzk6XbhOlx3ZhlS44pOQg6', 'mandy@gmail.com', '7864327832', 'Dennistoun, Glasgow');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_session`
--
ALTER TABLE `login_session`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pet_details`
--
ALTER TABLE `pet_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_session`
--
ALTER TABLE `login_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pet_details`
--
ALTER TABLE `pet_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `login_session`
--
ALTER TABLE `login_session`
  ADD CONSTRAINT `login_session_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `pet_details`
--
ALTER TABLE `pet_details`
  ADD CONSTRAINT `pet_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

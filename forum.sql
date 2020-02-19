-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2019 at 04:39 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `account_type` int(1) NOT NULL,
  `ban_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `email`, `account_type`, `ban_status`) VALUES
(25, 'Zaidee', '123', '123@mmu.edu.my', 0, 1),
(26, 'Teacher12', '123', '1141127819@student.mmu.edu.my', 1, 1),
(27, 'Admin1', '123', 'admin1@mmu.edu.my', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `reply_id` int(100) NOT NULL,
  `reply_text` varchar(255) NOT NULL,
  `reply_user` varchar(255) NOT NULL,
  `post_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`reply_id`, `reply_text`, `reply_user`, `post_id`) VALUES
(1, 'Hi', 'Zaidee', 17),
(2, 'TESSSSSSSSSSSSSSSSSSSTTTTTTTTTTTTTTTTTTT', 'Zaidee', 17),
(3, 'Test 20', 'Teacher12', 16),
(4, 'Hello to me', 'Teacher12', 19),
(5, 'Cuz why not?', 'Teacher12', 12),
(6, 'post in sticky!!!', 'Zaidee', 22),
(7, 'Hello again', 'Zaidee', 19);

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

CREATE TABLE `thread` (
  `post_id` int(255) NOT NULL,
  `post_title` varchar(1000) NOT NULL,
  `post_text` varchar(1000) NOT NULL,
  `date` date NOT NULL,
  `post_board` varchar(100) NOT NULL,
  `original_poster` varchar(200) NOT NULL,
  `sticky` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thread`
--

INSERT INTO `thread` (`post_id`, `post_title`, `post_text`, `date`, `post_board`, `original_poster`, `sticky`) VALUES
(7, 'Testwwww', 'wwww', '2019-09-25', 'food', 'Zaidee', ''),
(9, 'HMMMMMMMMMM', 'WHAT', '2019-09-25', 'food', 'No one', ''),
(10, 'This is not  a food ', 'Test', '2019-09-03', 'game', 'COCKROACH', ''),
(13, 'NEWEST THREAD', 'hi', '2019-09-25', 'food', 'Zaidee', ''),
(18, 'NEEEEEEEEEWWWWWWWWWWWWWWWWWWWWWWWWWWWW', 'AAAAAAAAAAAAAAAAAARRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR', '2019-09-27', 'food', 'Teacher12', ''),
(19, 'Test redirect', 'hi', '2019-09-27', 'food', 'Teacher12', ''),
(20, 'Test sticky', 'test', '2019-09-27', 'food', 'Teacher12', 'yes'),
(21, 'NO ', 'a', '2019-09-27', 'food', 'Teacher12', ''),
(22, 'STICKY', 'a', '2019-09-27', 'food', 'Teacher12', 'yes'),
(28, '1', '1', '2019-09-27', 'food', 'Zaidee', ''),
(29, '2', '2', '2019-09-27', 'food', 'Zaidee', ''),
(30, '3', '3', '2019-09-27', 'food', 'Teacher12', 'yes'),
(31, 'Tessss', 'w', '2019-09-27', 'food', 'Zaidee', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `thread`
--
ALTER TABLE `thread`
  ADD PRIMARY KEY (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `reply_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `thread`
--
ALTER TABLE `thread`
  MODIFY `post_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

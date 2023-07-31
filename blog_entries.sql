-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 28, 2023 at 04:02 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BLOG_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_entries`
--

CREATE TABLE `blog_entries` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `creation_date` date DEFAULT current_timestamp(),
  `last_update_date` date DEFAULT current_timestamp(),
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `publicity` enum('Yes','No') DEFAULT 'Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_entries`
--
ALTER TABLE `blog_entries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_entries`
--
ALTER TABLE `blog_entries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

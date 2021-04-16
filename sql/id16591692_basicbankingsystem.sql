-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 16, 2021 at 08:47 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id16591692_basicbankingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `balance`) VALUES
(1, 'Avinash', 'avinash28@gmail.com', 14990),
(2, 'Mudit Sharma', 'mudit65@gmail.com', 24498),
(3, 'Mrityunjai Rai', 'mrityunjai64@gmail.com', 13000),
(4, 'Devansh Saxena', 'devansh35@gmail.com', 9012),
(5, 'Hrittik Jha', 'hrittik39@gmail.com', 29900),
(6, 'Mohd Affan', 'affan58@gmail.com', 16100),
(7, 'Mohak Jain', 'mohak56@gmail.com', 10000),
(8, 'Shivam Bhardwaj', 'shivam119@gmail.com', 14000),
(9, 'Vikas Kumar', 'vikas108@gmail.com', 22000),
(10, 'Aryan Kumar', 'aryan28@gmail.com', 25500);

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `sid` int(255) NOT NULL,
  `rid` int(255) NOT NULL,
  `sname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transfers`
--

INSERT INTO `transfers` (`sid`, `rid`, `sname`, `rname`, `amount`, `datetime`) VALUES
(3, 1, 'Mrityunjai Rai', 'Avinash', 5000, '2021-04-13 12:34:30'),
(1, 2, 'Avinash', 'Mudit Sharma', 2000, '2021-04-13 12:35:15'),
(7, 5, 'Mohak Jain', 'Hrittik Jha', 15000, '2021-04-13 12:37:26'),
(10, 1, 'Aryan Kumar', 'Avinash', 1500, '2021-04-13 12:38:07'),
(4, 2, 'Devansh Saxena', 'Mudit Sharma', 3000, '2021-04-13 12:38:28'),
(1, 2, 'Avinash', 'Mudit Sharma', 4500, '2021-04-13 08:12:26'),
(5, 1, 'Hrittik Jha', 'Avinash', 5000, '2021-04-13 08:13:03'),
(1, 4, 'Avinash', 'Devansh Saxena', 12, '2021-04-13 09:14:17'),
(2, 1, 'Mudit Sharma', 'Avinash', 2, '2021-04-15 09:17:05'),
(5, 6, 'Hrittik Jha', 'Mohd Affan', 100, '2021-04-15 09:20:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

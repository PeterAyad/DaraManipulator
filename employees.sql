-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2020 at 10:33 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `table`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `position` varchar(30) DEFAULT NULL,
  `office` varchar(30) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `start_date` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `position`, `office`, `age`, `start_date`) VALUES
(1, 'Gerbelt Black', 'Accountant', 'Tokyo', 63, '2011/07/25'),
(2, 'Ashton Cox', 'Junior Technical Author', 'San Francisco', 66, '2009/01/12'),
(3, 'Cedric Kelly', 'Senior Javascript Developer', 'Edinburgh', 22, '2012/03/29'),
(4, 'Airi Satou', 'Accountant', 'Tokyo', 33, '2008/11/28'),
(5, 'Brielle Williamson', 'Integration Specialist', 'New York', 61, '2012/12/02'),
(6, 'Herrod Chandler', 'Sales Assistant', 'San Francisco', 59, '2012/08/06'),
(7, 'Rhona Davidson', 'Integration Specialist', 'Tokyo', 55, '2010/10/14'),
(8, 'Colleen Hurst', 'Javascript Developer', 'San Francisco', 39, '2009/09/15'),
(9, 'Sonya Frost', 'Software Engineer', 'Edinburgh', 23, '2008/12/13'),
(10, 'Jena Gaines', 'Office Manager', 'London', 30, '2008/12/19'),
(11, 'Quinn Flynn', 'Support Lead', 'Edinburgh', 22, '2013/03/03'),
(12, 'Charde Marshall', 'Regional Director', 'San Francisco', 36, '2008/10/16'),
(13, 'Haley Kennedy', 'Senior Marketing Designer', 'London', 43, '2012/12/18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2017 at 05:30 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `natural_resources`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(250) NOT NULL,
  `date_deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `country_name`, `date_deleted`) VALUES
(2, 'Bulgaria', NULL),
(3, 'Romania', NULL),
(4, 'Serbia', NULL),
(5, 'Czech Republic', NULL),
(6, 'France', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mines`
--

CREATE TABLE `mines` (
  `mine_id` int(11) NOT NULL,
  `mine_name` varchar(100) NOT NULL,
  `mine_depletion` int(5) NOT NULL,
  `type_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `terrain_id` int(11) NOT NULL,
  `date_deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mines`
--

INSERT INTO `mines` (`mine_id`, `mine_name`, `mine_depletion`, `type_id`, `country_id`, `terrain_id`, `date_deleted`) VALUES
(1, 'Mine 1', 2025, 2, 2, 3, NULL),
(4, 'Mine 2', 2017, 4, 2, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `resource_types`
--

CREATE TABLE `resource_types` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(250) NOT NULL,
  `date_deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `resource_types`
--

INSERT INTO `resource_types` (`type_id`, `type_name`, `date_deleted`) VALUES
(1, 'Gold', NULL),
(2, 'Silver', NULL),
(3, 'Platinum', NULL),
(4, 'Copper', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `terrains`
--

CREATE TABLE `terrains` (
  `terrain_id` int(11) NOT NULL,
  `terrain_name` varchar(250) NOT NULL,
  `date_deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `terrains`
--

INSERT INTO `terrains` (`terrain_id`, `terrain_name`, `date_deleted`) VALUES
(1, 'Vratsa region', NULL),
(2, 'Montana region', NULL),
(3, 'Vidin region', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `mines`
--
ALTER TABLE `mines`
  ADD PRIMARY KEY (`mine_id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `country_id` (`country_id`),
  ADD KEY `terrain_id` (`terrain_id`);

--
-- Indexes for table `resource_types`
--
ALTER TABLE `resource_types`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `terrains`
--
ALTER TABLE `terrains`
  ADD PRIMARY KEY (`terrain_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `mines`
--
ALTER TABLE `mines`
  MODIFY `mine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `resource_types`
--
ALTER TABLE `resource_types`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `terrains`
--
ALTER TABLE `terrains`
  MODIFY `terrain_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `mines`
--
ALTER TABLE `mines`
  ADD CONSTRAINT `mines_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `resource_types` (`type_id`),
  ADD CONSTRAINT `mines_ibfk_2` FOREIGN KEY (`country_id`) REFERENCES `countries` (`country_id`),
  ADD CONSTRAINT `mines_ibfk_3` FOREIGN KEY (`terrain_id`) REFERENCES `terrains` (`terrain_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

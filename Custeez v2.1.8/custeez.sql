-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2017 at 08:25 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `custeez`
--
CREATE DATABASE IF NOT EXISTS `custeez` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `custeez`;

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `formName` varchar(100) NOT NULL,
  `owner_id` varchar(25) NOT NULL,
  `approver_id` varchar(25) NOT NULL,
  `formData` text NOT NULL,
  `form_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`formName`, `owner_id`, `approver_id`, `formData`, `form_id`) VALUES
('Step 1', '1', '1', '[{\"89358\":{\"title\":\"Name\",\"desc\":\"\",\"type\":\"text\",\"eval\":\"text\",\"req\":\"0\"},\"25051\":{\"title\":\"Age\",\"desc\":\"\",\"type\":\"text\",\"eval\":\"number\",\"req\":\"0\"}}]', 1),
('Step 2', '1', '1', '[{\"39633\":{\"title\":\"pangalan ng gf mo?\",\"desc\":\"\",\"type\":\"text\",\"eval\":\"text\",\"req\":\"\"}}]', 2),
('Step 2', '1', '1', '[{\"39633\":{\"title\":\"pangalan ng gf mo?\",\"desc\":\"\",\"type\":\"text\",\"eval\":\"text\",\"req\":\"\"}}]', 3);

-- --------------------------------------------------------

--
-- Table structure for table `groupdata`
--

CREATE TABLE `groupdata` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_id` int(25) NOT NULL,
  `groupName` varchar(50) NOT NULL,
  `groupDetails` text NOT NULL,
  `owner_id` varchar(25) NOT NULL,
  `pubType_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `processes`
--

CREATE TABLE `processes` (
  `processName` varchar(50) NOT NULL,
  `processDetails` text NOT NULL,
  `pubType_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `process_id` int(11) NOT NULL,
  `rgid` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `processes`
--

INSERT INTO `processes` (`processName`, `processDetails`, `pubType_id`, `owner_id`, `process_id`, `rgid`, `group_id`) VALUES
('Test Process', '', 1, 1, 1, 244812, 0);

-- --------------------------------------------------------

--
-- Table structure for table `publicity`
--

CREATE TABLE `publicity` (
  `pubType_id` int(11) NOT NULL,
  `pubType` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publicity`
--

INSERT INTO `publicity` (`pubType_id`, `pubType`) VALUES
(1, 'public'),
(2, 'private');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `record_id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `recordHistory` int(11) NOT NULL COMMENT 'in Json file. count for everyday'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `statusType` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `steps`
--

CREATE TABLE `steps` (
  `step_id` int(11) NOT NULL,
  `stepNum` int(11) NOT NULL,
  `stepName` varchar(50) NOT NULL,
  `process_id` varchar(25) NOT NULL,
  `form_id` varchar(25) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `steps`
--

INSERT INTO `steps` (`step_id`, `stepNum`, `stepName`, `process_id`, `form_id`, `status`) VALUES
(1, 1, 'Step 1', '1', '1', 1),
(2, 2, 'Step 2', '1', '2', 0),
(3, 3, 'p', '1', '3', 0);

-- --------------------------------------------------------

--
-- Table structure for table `submittedforms`
--

CREATE TABLE `submittedforms` (
  `sub_id` int(100) NOT NULL,
  `subFormData` text NOT NULL,
  `user_id` varchar(25) NOT NULL,
  `status_id` int(11) NOT NULL,
  `step_id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `substatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submittedforms`
--

INSERT INTO `submittedforms` (`sub_id`, `subFormData`, `user_id`, `status_id`, `step_id`, `form_id`, `substatus`) VALUES
(1, '[{\"data\":{\"val\":\"18\",\"title\":\"Age\",\"desc\":\"\",\"type\":\"text\"}},{\"data\":{\"val\":\"Ralph\",\"title\":\"Name\",\"desc\":\"\",\"type\":\"text\"}}]', '2', 0, 1, 1, 1),
(2, '[{\"data\":{\"val\":\"Realyn Tejas\",\"title\":\"pangalan ng gf mo?\",\"desc\":\"\",\"type\":\"text\"}}]', '2', 0, 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tracker`
--

CREATE TABLE `tracker` (
  `tracker_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `process_id` int(11) NOT NULL,
  `step_id` int(11) NOT NULL,
  `tstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tracker`
--

INSERT INTO `tracker` (`tracker_id`, `user_id`, `process_id`, `step_id`, `tstatus`) VALUES
(1, 2, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `password` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `userDetails` text NOT NULL,
  `group_id` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`password`, `username`, `userDetails`, `group_id`, `email`, `user_id`) VALUES
('chan', 'ralphchan', '', '', 'ralphmiguelchan@gmail.com', 1),
('1250teez', 'Ralph', '', '', 'r.alphmiguelchan@gmail.com', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`form_id`);

--
-- Indexes for table `groupdata`
--
ALTER TABLE `groupdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `processes`
--
ALTER TABLE `processes`
  ADD PRIMARY KEY (`process_id`);

--
-- Indexes for table `publicity`
--
ALTER TABLE `publicity`
  ADD PRIMARY KEY (`pubType_id`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `steps`
--
ALTER TABLE `steps`
  ADD PRIMARY KEY (`step_id`);

--
-- Indexes for table `submittedforms`
--
ALTER TABLE `submittedforms`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `tracker`
--
ALTER TABLE `tracker`
  ADD PRIMARY KEY (`tracker_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `form_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `groupdata`
--
ALTER TABLE `groupdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(25) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `processes`
--
ALTER TABLE `processes`
  MODIFY `process_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `publicity`
--
ALTER TABLE `publicity`
  MODIFY `pubType_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `steps`
--
ALTER TABLE `steps`
  MODIFY `step_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `submittedforms`
--
ALTER TABLE `submittedforms`
  MODIFY `sub_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tracker`
--
ALTER TABLE `tracker`
  MODIFY `tracker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

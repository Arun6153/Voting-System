-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2019 at 09:07 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epics_votings`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer_key`
--

CREATE TABLE `answer_key` (
  `ans_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `keytokken` varchar(15) NOT NULL,
  `ckeck_bool` varchar(5) NOT NULL,
  `breif` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answer_key`
--

INSERT INTO `answer_key` (`ans_id`, `u_id`, `keytokken`, `ckeck_bool`, `breif`) VALUES
(1, 1, '5cb55f6c527', 'true', ''),
(6, 2, '5ccd670cde78b', 'true', ''),
(7, 1, '5ccf04811efa1', 'true', ''),
(8, 4, '5ccfd3a2a2889', '', 'Bahut'),
(9, 4, '5cb55f6c527', '', 'checking....'),
(10, 5, '5cd1036d19779', 'flse', ''),
(11, 1, '5cd1036d19779', 'true', ''),
(12, 1, '5cd2adf1f1968', 'true', ''),
(13, 0, '5cb55f6c527', 'flse', '');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `u_id` int(11) NOT NULL,
  `u_email` varchar(45) NOT NULL,
  `u_name` varchar(15) NOT NULL,
  `u_phone_no` varchar(10) NOT NULL,
  `age` int(11) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`u_id`, `u_email`, `u_name`, `u_phone_no`, `age`, `password`) VALUES
(1, 'sarun6153@gmail.com', 'Arun Saini', '8607972097', 20, 'arun6153'),
(2, 'kb98kb98kb@gmail.com', 'Kunal Bhardwaj', '8930874509', 20, 'kpassword'),
(3, 'mangalram.saini@gmail.com', 'MangalRam Saini', '9805019917', 52, 'mangalram'),
(4, 'ayushwalia999@gmail.com', 'Ayush Walia', '8219518681', 19, 'yureka@4G'),
(5, 'gauravkumar.gk818@gmail.com', 'Gaurav kumar', '9588723842', 20, 'qwertyuiop');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_no` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `question_topic` text NOT NULL,
  `question_brief` text NOT NULL,
  `keytokken` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_no`, `u_id`, `question_topic`, `question_brief`, `keytokken`) VALUES
(1, 1, 'Gareebi', 'how to become rich?', '5cb55f6c527'),
(2, 1, 'Any', 'check 1', '5cbc2a6faf2'),
(3, 2, 'Gareebi', 'everyone should be gareeb', '5ccd670cde78b'),
(4, 3, 'Strike', 'Is their necessary to strike on any objective?', '5ccf04811efa1'),
(5, 4, 'Gareebi', 'gareeb ho?', '5ccfd3a2a2889'),
(6, 5, 'Engineering, a boon or bane?', 'Does is the only option after Non-Med or Poly-technical Degree.', '5cd1036d19779'),
(7, 1, 'demonitization', 'wasi it successful or no?', '5cd2adf1f1968'),
(8, 0, 'Test 1', 'Testing website...', '5cd43488d4318');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer_key`
--
ALTER TABLE `answer_key`
  ADD PRIMARY KEY (`ans_id`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `keytokken` (`keytokken`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `u_phone_no` (`u_phone_no`),
  ADD UNIQUE KEY `u_email` (`u_email`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_no`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `u_id_2` (`u_id`),
  ADD KEY `keytokken` (`keytokken`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer_key`
--
ALTER TABLE `answer_key`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

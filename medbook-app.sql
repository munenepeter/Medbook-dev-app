-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 06, 2021 at 12:38 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medbook-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gender`
--

CREATE TABLE `tbl_gender` (
  `gender_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `gender_type` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_gender`
--

INSERT INTO `tbl_gender` (`gender_id`, `patient_id`, `gender_type`) VALUES
(1, 1, 'Male'),
(2, 2, 'male');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patient`
--

CREATE TABLE `tbl_patient` (
  `patient_id` int(11) NOT NULL,
  `patient_name` varchar(100) NOT NULL,
  `patient_dob` datetime NOT NULL,
  `general_comments` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_patient`
--

INSERT INTO `tbl_patient` (`patient_id`, `patient_name`, `patient_dob`, `general_comments`) VALUES
(1, 'Peter', '2000-10-20 22:04:15', 'Abcv'),
(2, 'mad', '2021-02-06 14:47:00', 'pooooioioi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `patient_id` int(11) NOT NULL,
  `service_type` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`patient_id`, `service_type`) VALUES
(1, 'Innpatient'),
(2, 'outpatient');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_alldata`
-- (See below for the actual view)
--
CREATE TABLE `view_alldata` (
`patient_name` varchar(100)
,`patient_dob` datetime
,`general_comments` text
,`gender_type` text
,`service_type` tinytext
);

-- --------------------------------------------------------

--
-- Structure for view `view_alldata`
--
DROP TABLE IF EXISTS `view_alldata`;

CREATE ALGORITHM=MERGE DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_alldata`  AS  select `tbl_patient`.`patient_name` AS `patient_name`,`tbl_patient`.`patient_dob` AS `patient_dob`,`tbl_patient`.`general_comments` AS `general_comments`,`tbl_gender`.`gender_type` AS `gender_type`,`tbl_service`.`service_type` AS `service_type` from ((`tbl_patient` join `tbl_gender` on((`tbl_patient`.`patient_id` = `tbl_gender`.`patient_id`))) join `tbl_service` on((`tbl_patient`.`patient_id` = `tbl_service`.`patient_id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_gender`
--
ALTER TABLE `tbl_gender`
  ADD PRIMARY KEY (`gender_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`patient_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_gender`
--
ALTER TABLE `tbl_gender`
  ADD CONSTRAINT `patient_id` FOREIGN KEY (`patient_id`) REFERENCES `tbl_patient` (`patient_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2021 at 09:24 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dundermifflin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(40) NOT NULL,
  `pas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`id`, `name`, `email`, `pas`) VALUES
(1, 'yogita', 'yogitarawat03@gmail.com', '37797810153ae1e20913e6d66a4010cc03e9c69125cbff2da4d4c8278a521622de27152fb3262ec961bf8de55c343fe54519382d2429ab6a26e6648076ea5a3e');

-- --------------------------------------------------------

--
-- Table structure for table `department_table`
--

CREATE TABLE `department_table` (
  `id` varchar(7) NOT NULL,
  `department` text NOT NULL,
  `status` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department_table`
--

INSERT INTO `department_table` (`id`, `department`, `status`) VALUES
('1K4G4U', 'php', 'active'),
('2S7L1P', 'seo', 'active'),
('8J8O9Z', 'Web designing', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `emp_experience`
--

CREATE TABLE `emp_experience` (
  `emp_id` int(11) NOT NULL,
  `last_company` text NOT NULL,
  `date_of_joining` date NOT NULL,
  `date_of_leaving` date NOT NULL,
  `depart_work` varchar(100) NOT NULL,
  `years_exp` int(11) NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `zip` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_experience`
--

INSERT INTO `emp_experience` (`emp_id`, `last_company`, `date_of_joining`, `date_of_leaving`, `depart_work`, `years_exp`, `city`, `state`, `zip`, `status`) VALUES
(164, 'ispl pvt lmt', '2021-09-01', '2021-09-14', 'seo', 11, 'shimla', 'uttrakhand', 123456, 'completed'),
(165, 'ispl pvt lmt', '2021-09-02', '2021-09-14', 'web designing', 3, 'joshpura', 'Tripura', 326598, 'completed'),
(167, 'ispl pvt lmt', '2016-09-01', '2019-09-01', 'web designing', 3, 'dehradun', 'uttrakhand', 234765, 'completed'),
(172, 'amit', '2012-02-21', '2013-02-21', 'php', 8, 'dehradun', 'uttrakhand', 234567, 'completed'),
(173, 'ispl pvt lmt', '2021-09-06', '2021-09-05', 'seo', 2, 'joshpura', 'Maharashtra', 234567, 'completed'),
(174, 'ispl pvt lmt', '2021-08-31', '2021-09-15', 'seo', 2, 'dehradun', 'Tamil Nadu', 656576, 'completed'),
(175, 'ispl pvt lmt', '2021-09-04', '2021-09-04', 'php', 4, 'joshpura', 'Tripura', 876787, 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `emp_image`
--

CREATE TABLE `emp_image` (
  `emp_id` int(3) NOT NULL,
  `emp_img` varchar(500) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_image`
--

INSERT INTO `emp_image` (`emp_id`, `emp_img`, `status`) VALUES
(164, 'yogita.png', 'completed'),
(165, 'ru.jpg', 'completed'),
(167, 'amitaa.png', 'completed'),
(172, 'ayush.jpg', 'completed'),
(173, 'asshole.png', 'completed'),
(174, 'money-img.jpg', 'completed'),
(175, '20191231_143735.jpg', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `emp_qualification`
--

CREATE TABLE `emp_qualification` (
  `q_id` varchar(6) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `qualification` varchar(10) NOT NULL,
  `university_name` text NOT NULL,
  `passing_year` year(4) NOT NULL,
  `percentage` tinyint(2) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_qualification`
--

INSERT INTO `emp_qualification` (`q_id`, `emp_id`, `qualification`, `university_name`, `passing_year`, `percentage`, `status`) VALUES
('1H4', 173, '12th', 'CBSE', 2016, 67, 'completed'),
('1N0', 167, 'graduated', 'hnbgu university', 2018, 70, 'completed'),
('1W9', 165, '10th', 'cbse', 1995, 68, 'completed'),
('1Y5', 165, 'graduated', 'hnbgu university', 1999, 65, 'completed'),
('2Z3', 167, '12th', 'sgrr university', 2014, 80, 'completed'),
('3R2', 174, '10th', 'CBSE', 1998, 43, 'completed'),
('4Z3', 164, '12th', ' CBSE', 2015, 100, 'completed'),
('4Z9', 172, '12th', 'kendriya vidhyalaya', 2013, 79, 'completed'),
('5Z2', 166, 'graduated', 'hnbgu university', 2018, 77, 'completed'),
('6I9', 173, '10th', 'CBSE', 2013, 76, 'completed'),
('6J5', 166, '10th', 'kendriya vidhyalaya', 2012, 67, 'completed'),
('7K9', 172, '10th', 'kendriya vidhyalaya', 2010, 78, 'completed'),
('7N9', 175, 'graduated', 'cbse', 1998, 76, 'completed'),
('8V9', 167, '10th', 'sgrr university', 2011, 76, 'completed'),
('9H1', 165, '12th', 'cbse', 1996, 68, 'completed'),
('9N3', 164, '10th', 'CBSE', 2012, 90, 'completed'),
('9V6', 166, '12th', 'kendriya vidhyalaya', 2015, 76, 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `emp_registration`
--

CREATE TABLE `emp_registration` (
  `emp_id` int(11) NOT NULL,
  `department` varchar(50) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(40) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `gender` text NOT NULL,
  `date_of_birth` date NOT NULL,
  `address` varchar(60) NOT NULL,
  `status` text NOT NULL,
  `password` varchar(1000) NOT NULL,
  `c_password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_registration`
--

INSERT INTO `emp_registration` (`emp_id`, `department`, `name`, `email`, `mobile`, `gender`, `date_of_birth`, `address`, `status`, `password`, `c_password`) VALUES
(164, '1K4G4U', 'yogita rawat', 'yogitarawat03@gmail.com', 8978674598, 'female', '1998-02-04', 'rishivihar dehradun uttrakhand', 'completed', '37797810153ae1e20913e6d66a4010cc03e9c69125cbff2da4d4c8278a521622de27152fb3262ec961bf8de55c343fe54519382d2429ab6a26e6648076ea5a3e', '37797810153ae1e20913e6d66a4010cc03e9c69125cbff2da4d4c8278a521622de27152fb3262ec961bf8de55c343fe54519382d2429ab6a26e6648076ea5a3e'),
(165, '8J8O9Z', 'arnab goswami', 'arnab@gmail.com', 9897643252, 'male', '2021-09-02', 'vasant kunj dc road delhi', 'completed', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db'),
(166, '2S7L1P', 'juhi dangwal', 'jhudangwal@gmail.com', 7868789876, 'female', '1998-12-03', 'ITBP campus seemadwar dehardun', 'completed', '2f9c964cc06866106e941b24eea8a1d869da6a49d7ece6e4177f2c8bc22d1de2f047db12b08da4d82197f2ad1172df050624123d89cdcaa5bde6b5a6ab5c14d0', '2f9c964cc06866106e941b24eea8a1d869da6a49d7ece6e4177f2c8bc22d1de2f047db12b08da4d82197f2ad1172df050624123d89cdcaa5bde6b5a6ab5c14d0'),
(167, '8J8O9Z', 'jai 9878234278', 'jaipathak@yahoo.com', 9876567702, 'male', '1993-09-23', 'pandit waddi dehradun uttrakhand', 'completed', '94cfdedd836977df9ecdc3efdc9b099caecc627881cde2b1db3b528dac92bc1fe951a8cad5ab5f9e79f6673a8d5ed80cae8094003c6b19badd452b401e7b9095', '94cfdedd836977df9ecdc3efdc9b099caecc627881cde2b1db3b528dac92bc1fe951a8cad5ab5f9e79f6673a8d5ed80cae8094003c6b19badd452b401e7b9095'),
(172, '1K4G4U', 'sumit kumar', 'sumitkumar@gmail.com', 9876543212, 'male', '2021-09-22', 'M.p police camp shivpuri madhaya pradesh', 'completed', 'da960d6aba257f8fab56685541d4269865ee0d3d97d1122370094b85fcc35fba231abef30877521cd02619fa9144db038cce2bba0993ecc8f4148119a51f8778', 'da960d6aba257f8fab56685541d4269865ee0d3d97d1122370094b85fcc35fba231abef30877521cd02619fa9144db038cce2bba0993ecc8f4148119a51f8778'),
(173, '2S7L1P', 'riya rawat', 'riyarawat@gmail.com', 9760086788, 'female', '1998-09-14', 'ridhivihar mehuwala dehradun', 'completed', '5f490e727ad158f20fd1075cad741dd9c6d0d409c231e3fcab18a71970b3a0d4906ccc356232e680837b7839f4394350224315eab19e6cef94eebc35ed30fc01', '5f490e727ad158f20fd1075cad741dd9c6d0d409c231e3fcab18a71970b3a0d4906ccc356232e680837b7839f4394350224315eab19e6cef94eebc35ed30fc01'),
(174, '2S7L1P', 'radhika kumar', 'radhika123@gmail.com', 8967234576, 'female', '2021-09-28', 'B-81/14 mount litra road rishikesh uttrakhand', 'completed', '8f9d58378c537216cd765e0d2ace4a6bdbff96dfc9ed435bd06eaa4d3d7a18f21a3726309f819a7038cc1264b19df108a59312ea0abf0b66edc15917c0df6ccb', '8f9d58378c537216cd765e0d2ace4a6bdbff96dfc9ed435bd06eaa4d3d7a18f21a3726309f819a7038cc1264b19df108a59312ea0abf0b66edc15917c0df6ccb'),
(175, '2S7L1P', 'alok batwal', 'alok12@gmailcom', 7867543456, 'male', '1992-12-02', 'gms road', 'completed', '32b8a61980f9d094d370cd4267693fc6b7e9812b1889a3781ddb970a6b1566c1e2b7fe5fc565f3b9b8094dd29c935c1bf59a595bc81d4c33b870d6fb4c08a5b6', '32b8a61980f9d094d370cd4267693fc6b7e9812b1889a3781ddb970a6b1566c1e2b7fe5fc565f3b9b8094dd29c935c1bf59a595bc81d4c33b870d6fb4c08a5b6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_table`
--
ALTER TABLE `department_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_experience`
--
ALTER TABLE `emp_experience`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `emp_image`
--
ALTER TABLE `emp_image`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `emp_qualification`
--
ALTER TABLE `emp_qualification`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `emp_registration`
--
ALTER TABLE `emp_registration`
  ADD PRIMARY KEY (`emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `emp_registration`
--
ALTER TABLE `emp_registration`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

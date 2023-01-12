-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2022 at 09:25 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unisys`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `courseCode` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `courseCode`, `name`) VALUES
(1, 101, 'اسمبلی'),
(2, 102, 'شبکه');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `Location` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`Id`, `Name`, `Location`) VALUES
(1, 'گروه کامپیوتر', NULL),
(2, 'گروه برق', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `group_course`
--

CREATE TABLE `group_course` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `group_student`
--

CREATE TABLE `group_student` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--

CREATE TABLE `professor` (
  `id` int(11) NOT NULL,
  `professorCode` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `type` int(11) NOT NULL,
  `group_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `professor`
--

INSERT INTO `professor` (`id`, `professorCode`, `name`, `type`, `group_Id`) VALUES
(1, 1127701, 'فهیمه عباسی', 1, 1),
(2, 1127702, 'احمد رضوی', 2, 1),
(3, 1127703, 'سهیلا رحمانی', 1, 1),
(4, 1127704, 'مهدی موسوی', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `studentCode` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `supervisor_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `studentCode`, `name`, `birthday`, `supervisor_ID`) VALUES
(1, 1401100101, 'سجاد رضوی', '2013-12-06', NULL),
(2, 1401100102, 'نورا هاشمی', '2022-12-03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

CREATE TABLE `term` (
  `id` int(11) NOT NULL,
  `termCode` int(11) NOT NULL,
  `description` text COLLATE utf8_persian_ci DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`id`, `termCode`, `description`, `startDate`, `endDate`) VALUES
(1, 140110, 'ترم بهمن - 0110', '2022-12-01', '2022-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `term_course`
--

CREATE TABLE `term_course` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `professor_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `term_course`
--

INSERT INTO `term_course` (`id`, `course_id`, `term_id`, `professor_id`, `student_id`) VALUES
(1, 1, 1, 1, 1),
(2, 2, 1, 4, 1),
(3, 1, 1, 3, 2),
(4, 2, 1, 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courseCode` (`courseCode`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `group_course`
--
ALTER TABLE `group_course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `group_student`
--
ALTER TABLE `group_student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `professorCode` (`professorCode`),
  ADD KEY `group_Id` (`group_Id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `studentCode` (`studentCode`);

--
-- Indexes for table `term`
--
ALTER TABLE `term`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `termCode` (`termCode`);

--
-- Indexes for table `term_course`
--
ALTER TABLE `term_course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `term_id` (`term_id`),
  ADD KEY `professor_id` (`professor_id`),
  ADD KEY `student_id` (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `group_course`
--
ALTER TABLE `group_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_student`
--
ALTER TABLE `group_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `term`
--
ALTER TABLE `term`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `term_course`
--
ALTER TABLE `term_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `group_course`
--
ALTER TABLE `group_course`
  ADD CONSTRAINT `group_course_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`Id`),
  ADD CONSTRAINT `group_course_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`);

--
-- Constraints for table `group_student`
--
ALTER TABLE `group_student`
  ADD CONSTRAINT `group_student_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`Id`),
  ADD CONSTRAINT `group_student_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);

--
-- Constraints for table `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `professor_ibfk_1` FOREIGN KEY (`group_Id`) REFERENCES `groups` (`Id`);

--
-- Constraints for table `term_course`
--
ALTER TABLE `term_course`
  ADD CONSTRAINT `term_course_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `term_course_ibfk_2` FOREIGN KEY (`term_id`) REFERENCES `term` (`id`),
  ADD CONSTRAINT `term_course_ibfk_3` FOREIGN KEY (`professor_id`) REFERENCES `professor` (`id`),
  ADD CONSTRAINT `term_course_ibfk_4` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2021 at 03:36 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peerevaluation`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `CourseID` int(11) NOT NULL,
  `CourseName` varchar(45) DEFAULT NULL,
  `ProfessorID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CourseID`, `CourseName`, `ProfessorID`) VALUES
(1010, 'InfoSys 371', 222),
(2020, 'InfoSys 422', 222),
(2021, 'InfoSys 365', 222),
(4321, 'IS424', 1234);

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

CREATE TABLE `evaluation` (
  `EvaluationID` int(11) NOT NULL,
  `StudentID` int(11) DEFAULT NULL,
  `EvaluatedStudentsID` int(45) DEFAULT NULL,
  `EvalQuestions` varchar(250) DEFAULT NULL,
  `EvalQuestions2` int(5) NOT NULL DEFAULT 0,
  `EvalQuestions3` varchar(5) NOT NULL DEFAULT '1',
  `GroupNumber` int(11) DEFAULT NULL,
  `CourseID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluation`
--

INSERT INTO `evaluation` (`EvaluationID`, `StudentID`, `EvaluatedStudentsID`, `EvalQuestions`, `EvalQuestions2`, `EvalQuestions3`, `GroupNumber`, `CourseID`) VALUES
(111, 9999, 8888, '[\"abc\", \"0\" , \"2\"]', 0, '1', 1, 4321),
(121, 8888, 9999, NULL, 0, '1', 1, 1010),
(131, 9999, 8888, NULL, 0, '1', 1, 1010),
(141, 9999, 8888, NULL, 0, '1', 1, 1010),
(143, 8888, 9999, '[\"abc\", \"0\" , \"2\"]', 0, '1', 1, 4321),
(144, 8888, 9999, '[\"abc\", \"0\" , \"2\"]', 1, '3', 1, 4321),
(145, 8888, 9999, '[\"abc\", \"0\" , \"2\"]', 1, '4', 1, 4321),
(146, 9999, 8888, 'Hereadasd', 1, '5', 9, 1010),
(147, 8888, 9999, '[\"abc\", \"0\" , \"2\"]', 0, '1', 1, 4321),
(1036, NULL, NULL, '', 0, '1', NULL, 4321),
(1381, NULL, NULL, '', 0, '1', NULL, 4321),
(1659, NULL, NULL, '', 0, '1', NULL, 4321),
(2226, NULL, NULL, '[\"abc\", \"0\" , \"2\"]', 0, '1', NULL, 4321),
(2293, NULL, NULL, '', 0, '1', NULL, 4321),
(2328, NULL, NULL, '', 0, '1', NULL, 4321),
(3475, NULL, NULL, '[\"abc\", \"0\" , \"2\"]', 0, '1', NULL, 4321),
(3565, NULL, NULL, '', 0, '1', NULL, 4321),
(3853, NULL, NULL, '', 0, '1', NULL, 4321),
(4176, NULL, NULL, '', 0, '1', NULL, 4321),
(4663, NULL, NULL, '', 0, '1', NULL, 4321),
(4780, NULL, NULL, '[\"abc\", \"0\" , \"2\"]', 0, '1', NULL, 4321),
(4783, NULL, NULL, '', 0, '1', NULL, 4321),
(4792, NULL, NULL, '[\"abc\", \"0\" , \"2\"]', 0, '1', NULL, 4321),
(6019, NULL, NULL, '', 0, '1', NULL, 4321),
(6315, NULL, NULL, '[\"abc\", \"0\" , \"2\"]', 0, '1', NULL, 4321),
(6677, NULL, NULL, ' [\"abc\", \"0\" , \"2\"]', 0, '1', NULL, 4321),
(6735, NULL, NULL, '[\"abc\", \"0\" , \"2\"]', 0, '1', NULL, 4321),
(6983, NULL, NULL, '[\"abc\", \"0\" , \"2\"]', 0, '1', NULL, 4321),
(7899, NULL, NULL, '', 0, '1', NULL, 4321),
(8678, NULL, NULL, '', 0, '1', NULL, 4321),
(9137, NULL, NULL, '', 0, '1', NULL, 4321),
(9375, NULL, NULL, '', 0, '1', NULL, 4321);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `GroupNumber` int(11) NOT NULL,
  `StudentID` int(10) NOT NULL,
  `ProfessorID` int(11) DEFAULT NULL,
  `CourseID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`GroupNumber`, `StudentID`, `ProfessorID`, `CourseID`) VALUES
(9, 8888, 222, 1010),
(1, 8888, 222, 2020),
(1, 8888, 1234, 4321),
(9, 9999, 222, 1010),
(1, 9999, 1234, 4321);

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--

CREATE TABLE `professor` (
  `ProfessorID` int(11) NOT NULL,
  `ProfessorName` varchar(45) DEFAULT NULL,
  `ProfessorEmail` varchar(45) NOT NULL,
  `ProfessorPassword` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professor`
--

INSERT INTO `professor` (`ProfessorID`, `ProfessorName`, `ProfessorEmail`, `ProfessorPassword`) VALUES
(222, 'Khasawneh', 'Khasa@wisc.edu', 'password12'),
(1234, 'Samer', 'samer@wisc.edu', 'password12'),
(4858, 'Kyle', 'profkyle@wisc.edu', 'password123'),
(28398, 'diaasana@wisc.edu', '', 'password12'),
(72370, 'Diana', 'profdiana@wisc.edu', 'password12');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `StudentID` int(11) NOT NULL,
  `StudentName` varchar(45) DEFAULT NULL,
  `StudentEmail` varchar(45) DEFAULT NULL,
  `StudentPassword` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`StudentID`, `StudentName`, `StudentEmail`, `StudentPassword`) VALUES
(1, NULL, 'diaasana@wisc.edu', 'password12'),
(8888, 'Diana', 'diana@wisc.edu', 'password12'),
(9999, 'Kyle', 'kyle@wisc.edu', 'password1234'),
(55705, NULL, 'dianaas@wisc.edu', 'password12'),
(63159, NULL, 'diana@wisc.edasu', 'password12'),
(77227, NULL, 'diadena@wisc.edu', 'password12'),
(82947, NULL, 'aba', 'passasdasword12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`CourseID`),
  ADD KEY `ProfessorID` (`ProfessorID`);

--
-- Indexes for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`EvaluationID`),
  ADD KEY `CourseID` (`CourseID`),
  ADD KEY `StudentID` (`StudentID`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`StudentID`,`CourseID`),
  ADD KEY `ProfessorID` (`ProfessorID`),
  ADD KEY `CourseID` (`CourseID`),
  ADD KEY `CourseID_2` (`CourseID`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`ProfessorID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`StudentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `EvaluationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9376;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD CONSTRAINT `evaluation_ibfk_2` FOREIGN KEY (`StudentID`) REFERENCES `student` (`StudentID`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `evaluation_ibfk_3` FOREIGN KEY (`CourseID`) REFERENCES `course` (`CourseID`) ON UPDATE NO ACTION;

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_ibfk_1` FOREIGN KEY (`ProfessorID`) REFERENCES `professor` (`ProfessorID`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `groups_ibfk_2` FOREIGN KEY (`CourseID`) REFERENCES `course` (`CourseID`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

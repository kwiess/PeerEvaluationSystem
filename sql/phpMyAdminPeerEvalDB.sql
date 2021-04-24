-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 22, 2021 at 03:34 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `PeerEvaluation`
--

-- --------------------------------------------------------

--
-- Table structure for table `Course`
--

CREATE TABLE `Course` (
  `CourseID` int(11) NOT NULL,
  `CourseName` varchar(45) DEFAULT NULL,
  `ProfessorID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Course`
--

INSERT INTO `Course` (`CourseID`, `CourseName`, `ProfessorID`) VALUES
(1010, 'InfoSys 371', 222),
(4321, 'IS424', 1234);

-- --------------------------------------------------------

--
-- Table structure for table `Evaluation`
--

CREATE TABLE `Evaluation` (
  `EvaluationID` int(11) NOT NULL,
  `StudentID` int(11) DEFAULT NULL,
  `EvaluatedStudentsID` int(45) DEFAULT NULL,
  `EvalQuestions` varchar(250) DEFAULT NULL,
  `GroupNumber` int(11) DEFAULT NULL,
  `CourseID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Evaluation`
--

INSERT INTO `Evaluation` (`EvaluationID`, `StudentID`, `EvaluatedStudentsID`, `EvalQuestions`, `GroupNumber`, `CourseID`) VALUES
(111, 9999, 8888, NULL, 1, 4321),
(121, 8888, 9999, NULL, 1, 1010);

-- --------------------------------------------------------

--
-- Table structure for table `Groups`
--

CREATE TABLE `Groups` (
  `GroupNumber` int(11) NOT NULL,
  `StudentID` int(10) NOT NULL,
  `ProfessorID` int(11) DEFAULT NULL,
  `CourseID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Groups`
--

INSERT INTO `Groups` (`GroupNumber`, `StudentID`, `ProfessorID`, `CourseID`) VALUES
(1, 8888, 1234, 4321),
(9, 9999, 222, 1010),
(1, 9999, 1234, 4321);

-- --------------------------------------------------------

--
-- Table structure for table `Professor`
--

CREATE TABLE `Professor` (
  `ProfessorID` int(11) NOT NULL,
  `ProfessorName` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Professor`
--

INSERT INTO `Professor` (`ProfessorID`, `ProfessorName`) VALUES
(222, 'Khasawneh'),
(1234, 'Samer');

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE `Student` (
  `StudentID` int(11) NOT NULL,
  `StudentName` varchar(45) DEFAULT NULL,
  `StudentEmail` varchar(45) DEFAULT NULL,
  `StudentPassword` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Student`
--

INSERT INTO `Student` (`StudentID`, `StudentName`, `StudentEmail`, `StudentPassword`) VALUES
(8888, 'Diana', 'diana@wisc.edu', 'password12'),
(9999, 'Kyle', 'kyle@wisc.edu', 'password1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Course`
--
ALTER TABLE `Course`
  ADD PRIMARY KEY (`CourseID`),
  ADD KEY `ProfessorID` (`ProfessorID`);

--
-- Indexes for table `Evaluation`
--
ALTER TABLE `Evaluation`
  ADD PRIMARY KEY (`EvaluationID`),
  ADD KEY `CourseID` (`CourseID`),
  ADD KEY `StudentID` (`StudentID`);

--
-- Indexes for table `Groups`
--
ALTER TABLE `Groups`
  ADD PRIMARY KEY (`StudentID`,`CourseID`),
  ADD KEY `ProfessorID` (`ProfessorID`),
  ADD KEY `CourseID` (`CourseID`),
  ADD KEY `CourseID_2` (`CourseID`);

--
-- Indexes for table `Professor`
--
ALTER TABLE `Professor`
  ADD PRIMARY KEY (`ProfessorID`);

--
-- Indexes for table `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`StudentID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Evaluation`
--
ALTER TABLE `Evaluation`
  ADD CONSTRAINT `evaluation_ibfk_2` FOREIGN KEY (`StudentID`) REFERENCES `Student` (`StudentID`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `evaluation_ibfk_3` FOREIGN KEY (`CourseID`) REFERENCES `Course` (`CourseID`) ON UPDATE NO ACTION;

--
-- Constraints for table `Groups`
--
ALTER TABLE `Groups`
  ADD CONSTRAINT `groups_ibfk_1` FOREIGN KEY (`ProfessorID`) REFERENCES `Professor` (`ProfessorID`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `groups_ibfk_2` FOREIGN KEY (`CourseID`) REFERENCES `Course` (`CourseID`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

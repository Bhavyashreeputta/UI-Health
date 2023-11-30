-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2023 at 07:00 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ui_health`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `UserID` int(250) NOT NULL,
  `Name` varchar(155) NOT NULL,
  `Pass` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`UserID`, `Name`, `Pass`) VALUES
(1, 'Arun', 'Pass123'),
(2, 'Bhavya', 'Bhavya123');

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE `nurse` (
  `Age` int(10) NOT NULL,
  `City` varchar(30) NOT NULL,
  `EmployeeID` int(20) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `Gender` char(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `MiddleInitial` varchar(20) NOT NULL,
  `Pass` varchar(20) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `State` varchar(20) NOT NULL,
  `Street Address 1` varchar(25) NOT NULL,
  `Street Address 2` varchar(20) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Zip Code` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nurse`
--

INSERT INTO `nurse` (`Age`, `City`, `EmployeeID`, `FirstName`, `Gender`, `LastName`, `MiddleInitial`, `Pass`, `Phone`, `State`, `Street Address 1`, `Street Address 2`, `UserName`, `Zip Code`) VALUES
(25, 'Chicago', 1, 'Alice', 'Female', 'Alexander', 'M', 'Alice123', '1234567890', 'Illinois', '456 Oak St', 'Apt # 1R', 'alice', 12345),
(30, 'Chicago', 2, 'Robert', 'Male', 'Johnson', 'A', '1234r', '9876543210', 'Illinois', '1141 pine st', 'unit 3', 'johnson', 54321),
(28, 'Chicago', 3, 'Michael', 'Male', 'Brown', 'P', 'MBROWN12', '1112223333', 'Illinois', '1206 Birch Street', 'UniT 1R', 'Brown', 67890),
(35, 'Chicago', 4, 'Daniel', 'Male', 'Miller', 'K', 'miller', '9998887777', 'Illinois', '1448 lexington St', 'Unit 3', 'DMiller', 98765),
(40, 'Chicago', 5, 'Olivia', 'Female', 'Anderson', 'B', 'olivia123', '4445556666', 'Illinois', '1901 S king Drive', 'Apt 1101', 'OAnderson', 13579);

-- --------------------------------------------------------

--
-- Table structure for table `nursescheduling`
--

CREATE TABLE `nursescheduling` (
  `ScheduleID` int(11) NOT NULL,
  `VaccineID` int(11) NOT NULL,
  `SlotID` int(11) NOT NULL,
  `EmployeeID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nursescheduling`
--

INSERT INTO `nursescheduling` (`ScheduleID`, `VaccineID`, `SlotID`, `EmployeeID`, `UserID`) VALUES
(16, 11, 1, 1, 1),
(17, 12, 3, 2, 2),
(18, 13, 1, 3, 1),
(19, 14, 4, 4, 1),
(20, 15, 2, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `SSN` int(250) NOT NULL,
  `Age` int(250) NOT NULL,
  `FName` varchar(250) NOT NULL,
  `Gender` varchar(250) NOT NULL,
  `LName` varchar(250) NOT NULL,
  `MedicalHistoryDescription` varchar(250) NOT NULL,
  `MI` varchar(250) NOT NULL,
  `OccupationClass` varchar(250) NOT NULL,
  `Passw` varchar(250) NOT NULL,
  `Phone` int(250) NOT NULL,
  `Race` varchar(250) NOT NULL,
  `Address` varchar(250) NOT NULL,
  `UserName` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`SSN`, `Age`, `FName`, `Gender`, `LName`, `MedicalHistoryDescription`, `MI`, `OccupationClass`, `Passw`, `Phone`, `Race`, `Address`, `UserName`) VALUES
(123456789, 35, 'John', 'Male', 'Doe', 'No significant history', 'A', 'Professional', 'JohnPass1', 1234567890, 'Caucasian', '123 Oak St', 'johnd'),
(312561849, 50, 'Eva', 'Female', 'Miller', 'Diabetes', 'D', 'Technical', 'EvaPass4', 2147483647, 'Hispanic', '101 Cedar St', 'evam'),
(321875943, 45, 'Bob', 'Male', 'Johnson', 'High blood pressure', 'C', 'Skilled', 'BobPass3', 1112223333, 'Asian', '789 Pine St', 'bobj'),
(546238917, 40, 'Alice', 'Female', 'Smith', 'Allergies to penicillin', 'B', 'Managerial', 'AlicePass2', 2147483647, 'African American', '456 Maple St', 'alices'),
(651234591, 55, 'Michael', 'Male', 'Brown', 'No significant history', 'E', 'Professional', 'MichaelPass5', 2147483647, 'Caucasian', '202 Palm St', 'michaelb');

-- --------------------------------------------------------

--
-- Table structure for table `timeslot`
--

CREATE TABLE `timeslot` (
  `SlotID` int(11) NOT NULL,
  `Starttime` datetime NOT NULL,
  `Endtime` datetime NOT NULL,
  `Capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `timeslot`
--

INSERT INTO `timeslot` (`SlotID`, `Starttime`, `Endtime`, `Capacity`) VALUES
(1, '2023-11-22 08:00:00', '2023-11-22 10:00:00', 50),
(2, '2023-11-22 10:30:00', '2023-11-22 12:30:00', 40),
(3, '2023-11-22 13:00:00', '2023-11-22 15:00:00', 30),
(4, '2023-11-22 15:30:00', '2023-11-22 17:30:00', 20),
(5, '2023-11-22 18:00:00', '2023-11-22 20:00:00', 10);

-- --------------------------------------------------------

--
-- Table structure for table `vaccinationschedule`
--

CREATE TABLE `vaccinationschedule` (
  `V_Schedule_ID` int(11) NOT NULL,
  `DoseNo` int(11) NOT NULL,
  `EmployeeID` int(11) NOT NULL,
  `SSN` int(11) NOT NULL,
  `SlotID` int(11) NOT NULL,
  `VaccineID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vaccinationschedule`
--

INSERT INTO `vaccinationschedule` (`V_Schedule_ID`, `DoseNo`, `EmployeeID`, `SSN`, `SlotID`, `VaccineID`) VALUES
(6, 1, 1, 123456789, 1, 11),
(7, 1, 2, 546238917, 1, 12),
(8, 1, 3, 651234591, 3, 13),
(9, 1, 1, 321875943, 4, 11),
(10, 1, 4, 312561849, 2, 12);

-- --------------------------------------------------------

--
-- Table structure for table `vaccine`
--

CREATE TABLE `vaccine` (
  `VaccineID` int(250) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `Availability` int(250) NOT NULL,
  `OnHold` int(50) NOT NULL,
  `CompanyName` varchar(250) NOT NULL,
  `Doses` int(50) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `UserID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vaccine`
--

INSERT INTO `vaccine` (`VaccineID`, `Name`, `Availability`, `OnHold`, `CompanyName`, `Doses`, `Description`, `UserID`) VALUES
(11, 'Pfizer-BioNTech', 500, 50, 'Pfizer', 2, 'Effective against Covid-19', 1),
(12, 'Moderna', 700, 70, 'Moderna', 2, 'Covid-19 Vaccine', 1),
(13, 'AstraZeneca', 300, 30, 'AstraZeneca', 2, 'Treat disorders of oncology', 2),
(14, 'Johnson & Johnson', 900, 90, 'Johnson&Johnson', 2, 'Treat skin and hair', 2),
(15, 'Sinovac', 600, 60, 'Sinovac Biotech', 2, 'Covid-19 Vaccine', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vaccinedelivery`
--

CREATE TABLE `vaccinedelivery` (
  `V_Delivery_ID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `VaccineID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vaccinedelivery`
--

INSERT INTO `vaccinedelivery` (`V_Delivery_ID`, `Quantity`, `UserID`, `VaccineID`) VALUES
(1, 1000, 1, 12),
(2, 1200, 2, 11),
(3, 800, 1, 13),
(4, 1500, 1, 14),
(5, 1000, 2, 15);

-- --------------------------------------------------------

--
-- Table structure for table `vaccinerecord`
--

CREATE TABLE `vaccinerecord` (
  `RecordNo` int(11) NOT NULL,
  `Time of Vaccination` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `EmployeeID` int(11) NOT NULL,
  `SlotID` int(11) NOT NULL,
  `VaccineID` int(11) NOT NULL,
  `SSN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vaccinerecord`
--

INSERT INTO `vaccinerecord` (`RecordNo`, `Time of Vaccination`, `EmployeeID`, `SlotID`, `VaccineID`, `SSN`) VALUES
(1, '2023-11-22 14:15:00', 1, 2, 12, 123456789),
(2, '2023-11-22 16:45:00', 2, 1, 12, 546238917),
(3, '2023-11-22 19:15:00', 1, 3, 13, 321875943),
(4, '2023-11-22 21:45:00', 4, 2, 11, 546238917),
(5, '2023-11-23 00:15:00', 3, 1, 14, 123456789);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`EmployeeID`);

--
-- Indexes for table `nursescheduling`
--
ALTER TABLE `nursescheduling`
  ADD PRIMARY KEY (`ScheduleID`),
  ADD KEY `VaccineID` (`VaccineID`),
  ADD KEY `SlotID` (`SlotID`),
  ADD KEY `EmployeeID` (`EmployeeID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`SSN`);

--
-- Indexes for table `timeslot`
--
ALTER TABLE `timeslot`
  ADD PRIMARY KEY (`SlotID`);

--
-- Indexes for table `vaccinationschedule`
--
ALTER TABLE `vaccinationschedule`
  ADD PRIMARY KEY (`V_Schedule_ID`),
  ADD KEY `EmployeeID` (`EmployeeID`),
  ADD KEY `VaccineID` (`VaccineID`),
  ADD KEY `SlotID` (`SlotID`),
  ADD KEY `SSN` (`SSN`);

--
-- Indexes for table `vaccine`
--
ALTER TABLE `vaccine`
  ADD PRIMARY KEY (`VaccineID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `vaccinedelivery`
--
ALTER TABLE `vaccinedelivery`
  ADD PRIMARY KEY (`V_Delivery_ID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `VaccineID` (`VaccineID`);

--
-- Indexes for table `vaccinerecord`
--
ALTER TABLE `vaccinerecord`
  ADD PRIMARY KEY (`RecordNo`),
  ADD KEY `EmployeeID` (`EmployeeID`),
  ADD KEY `SlotID` (`SlotID`),
  ADD KEY `VaccineID` (`VaccineID`),
  ADD KEY `SSN` (`SSN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `UserID` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nurse`
--
ALTER TABLE `nurse`
  MODIFY `EmployeeID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nursescheduling`
--
ALTER TABLE `nursescheduling`
  MODIFY `ScheduleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `timeslot`
--
ALTER TABLE `timeslot`
  MODIFY `SlotID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vaccinationschedule`
--
ALTER TABLE `vaccinationschedule`
  MODIFY `V_Schedule_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vaccine`
--
ALTER TABLE `vaccine`
  MODIFY `VaccineID` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `vaccinedelivery`
--
ALTER TABLE `vaccinedelivery`
  MODIFY `V_Delivery_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vaccinerecord`
--
ALTER TABLE `vaccinerecord`
  MODIFY `RecordNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nursescheduling`
--
ALTER TABLE `nursescheduling`
  ADD CONSTRAINT `nursescheduling_ibfk_1` FOREIGN KEY (`VaccineID`) REFERENCES `vaccine` (`VaccineID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nursescheduling_ibfk_2` FOREIGN KEY (`SlotID`) REFERENCES `timeslot` (`SlotID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nursescheduling_ibfk_3` FOREIGN KEY (`EmployeeID`) REFERENCES `nurse` (`EmployeeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nursescheduling_ibfk_4` FOREIGN KEY (`UserID`) REFERENCES `admin` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vaccinationschedule`
--
ALTER TABLE `vaccinationschedule`
  ADD CONSTRAINT `vaccinationschedule_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `nurse` (`EmployeeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vaccinationschedule_ibfk_2` FOREIGN KEY (`VaccineID`) REFERENCES `vaccine` (`VaccineID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vaccinationschedule_ibfk_3` FOREIGN KEY (`SlotID`) REFERENCES `timeslot` (`SlotID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vaccinationschedule_ibfk_4` FOREIGN KEY (`SSN`) REFERENCES `patient` (`SSN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vaccine`
--
ALTER TABLE `vaccine`
  ADD CONSTRAINT `vaccine_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `admin` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vaccinedelivery`
--
ALTER TABLE `vaccinedelivery`
  ADD CONSTRAINT `vaccinedelivery_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `admin` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vaccinedelivery_ibfk_2` FOREIGN KEY (`VaccineID`) REFERENCES `vaccine` (`VaccineID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vaccinerecord`
--
ALTER TABLE `vaccinerecord`
  ADD CONSTRAINT `vaccinerecord_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `nurse` (`EmployeeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vaccinerecord_ibfk_2` FOREIGN KEY (`SlotID`) REFERENCES `timeslot` (`SlotID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vaccinerecord_ibfk_3` FOREIGN KEY (`VaccineID`) REFERENCES `vaccine` (`VaccineID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vaccinerecord_ibfk_4` FOREIGN KEY (`SSN`) REFERENCES `patient` (`SSN`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

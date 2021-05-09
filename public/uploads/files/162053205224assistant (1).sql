-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2021 at 02:49 AM
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
-- Database: `assistant`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointmentdetails`
--

CREATE TABLE `appointmentdetails` (
  `APID` int(11) NOT NULL,
  `PID` int(10) NOT NULL,
  `DID` int(10) NOT NULL,
  `Department` varchar(40) NOT NULL,
  `APDay` varchar(20) NOT NULL,
  `APTime` varchar(30) NOT NULL,
  `APRoomNo` int(3) NOT NULL,
  `APFloor` varchar(5) NOT NULL,
  `AID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointmentdetails`
--

INSERT INTO `appointmentdetails` (`APID`, `PID`, `DID`, `Department`, `APDay`, `APTime`, `APRoomNo`, `APFloor`, `AID`) VALUES
(1, 1, 1, '1', 'Sun', '6:10.AM. .', 110, '1st(1', 2),
(2, 2, 1, '1', 'Mon', '10:10.PM. .', 110, '1st(1', 1),
(3, 3, 1, '1', 'Mon', '6:10.AM. .', 110, '1st(1', 2),
(4, 1, 4, '1', 'Sun', '6:10.AM. .', 110, '1st(1', 6),
(5, 1, 1, '1', 'Wed', '10:10.PM. .', 901, '9th(9', 2),
(6, 1, 1, '1', 'Mon', '9:1.PM. .', 310, '3rd(3', 2),
(7, 1, 1, '1', 'Mon', '11:10.AM. .', 204, '2nd(2', 2),
(8, 1, 1, '1', 'Sun', '9:8.AM. .', 204, '2nd(2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `assistantinfo`
--

CREATE TABLE `assistantinfo` (
  `AID` int(11) NOT NULL,
  `AName` varchar(30) NOT NULL,
  `AUserName` varchar(30) NOT NULL,
  `Apassword` varchar(20) NOT NULL,
  `AEmail` varchar(30) NOT NULL,
  `APhone` int(11) NOT NULL,
  `ADocName` varchar(30) NOT NULL,
  `AHospitalName` varchar(40) NOT NULL,
  `ABirthDate` varchar(20) NOT NULL,
  `AGender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assistantinfo`
--

INSERT INTO `assistantinfo` (`AID`, `AName`, `AUserName`, `Apassword`, `AEmail`, `APhone`, `ADocName`, `AHospitalName`, `ABirthDate`, `AGender`) VALUES
(1, 'Noor A Aysha', 'maliha_Aysha', 'Blood#Rider40', 'ayshamaliha15@gmail.com', 1992012220, 'Farzana Sohael', 'Popular Diagnostic Center', '15/Jan(1)/1997', 'Female'),
(2, 'Rohan Chowdhury', 'rokan_chowdhury', '123Rokan?', 'rokanchowdhury@gmail.com', 1771891513, 'Dr Rowshan Ara', 'Ibn Sina', '1/Jan(1)/1985', 'Male'),
(3, 'Wasif Zaman', 'WasifSunan', '123Sunan#', 'wasifsunan607@gmail.com', 1992348572, 'Farhana Mahbuba', 'Popular Diagnostic Center', '10/Oct(10)/1994', 'Male'),
(4, 'Demo', 'Demo_User', 'Demo123?', 'demo@gmail.com', 1777777777, 'Mr. De Man', 'Demo Hospital', '1/Jan(1)/1985', 'Male'),
(5, 'Demon Man Two', 'Demon_Man_Two', 'Demon#123', 'demon@gmail.com', 1999999999, 'Dr. Hello', 'H Hospital', '1/Jan(1)/1985', 'Male'),
(6, 'Lamia Kabir', 'lamia_kabir', 'blood?Rider40', 'ayshamaliha15@gmail.com', 1552389667, 'Dr Nusrat', 'NHN', '1/Feb(2)/1986', 'Female'),
(7, 'Lamia Kabir', 'lamiakabir', 'blood?Rider40', 'ayshamaliha15@gmail.com', 1552389667, 'Dr Nusrat', 'NHN', '1/Feb(2)/1986', 'Female'),
(8, 'noor', 'noor_aysha', 'blood#Rider40', 'demo@gmail.com', 2147483647, 'Dr. Noor', 'NHN', '2/Jan(1)/1986', 'Female'),
(9, 'jamy', 'ar_jamy', 'Blood#Rider40', 'jamyrahman84@gmail.com', 1992348572, 'Farzana Sohael', 'Ibn Sina', '10/Nov(11)/1993', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `coordinatorinfo`
--

CREATE TABLE `coordinatorinfo` (
  `c_id` int(10) NOT NULL,
  `c_name` varchar(20) NOT NULL,
  `c_uname` varchar(20) NOT NULL,
  `c_pass` varchar(20) NOT NULL,
  `c_email` varchar(30) NOT NULL,
  `c_phone` int(15) NOT NULL,
  `c_hospital` varchar(40) NOT NULL,
  `c_birthdate` varchar(20) NOT NULL,
  `c_gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coordinatorinfo`
--

INSERT INTO `coordinatorinfo` (`c_id`, `c_name`, `c_uname`, `c_pass`, `c_email`, `c_phone`, `c_hospital`, `c_birthdate`, `c_gender`) VALUES
(1, 'Md. Muntanuz Zaman', 'muntanuz007', 'Iamjurat007?', 'muntanuzzaman1111@gmail.com', 1784556546, 'popular', '1/Jan(1)/1985', 'Male'),
(2, 'Md. Alif', 'alif007', 'Alif007?', 'alif@gmail.com', 1784556546, 'Popular Diagnostic Center', '3/Feb(2)/1986', 'Male'),
(3, 'ASif', 'Asif007', 'Asif007?', 'Asif@gmail.com', 54323543, 'Popular Diagnostic Center', '3/Feb(2)/1988', 'Male'),
(4, 'Demo', 'Demo_User', 'Abc1234#', 'demo@gmail.com', 1992348572, 'Popular Diagnostic Center', '10/Sep(9)/1993', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `DID` int(10) NOT NULL,
  `DName` varchar(40) NOT NULL,
  `Department` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`DID`, `DName`, `Department`) VALUES
(1, 'Dr. Farzana Sohael', 'Gynocology'),
(2, 'Dr. Rowshan Ara ', 'Gynocology'),
(3, 'Dr Farhana Mahbuba', 'Medicine'),
(4, 'Dr Nusrat', 'Medicine');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `PID` int(10) NOT NULL,
  `PName` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`PID`, `PName`) VALUES
(1, 'Fahim Mahtab Ifsan'),
(2, 'Tanzila Tabassum'),
(3, 'Sadia Afrin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(20) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Phone_Number` varchar(20) NOT NULL,
  `Address` varchar(20) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Date_Of_Birth` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Name`, `Username`, `Password`, `Email`, `Phone_Number`, `Address`, `Gender`, `Date_Of_Birth`) VALUES
(5, 'Demo', 'Demo_User', 'Abcd?12345', 'demo@gmail.com', '01992013330', 'Basundhara R/A', 'Female', '12/03/1999'),
(66, 'dhakacxcxcx', 'ifsanddddTT', '12345678', 'fahimmahtab.ifsan@gm', '776565445454545', 'comilla', 'Male', ''),
(555, 'ifsan', 'fahim', '12345678', 'tanvir@gmail.com', '87654987654', 'kandirpar comilla', 'Male', '05/04/1997'),
(5555, 'afsana kabir lisa', 'afsan kabir', '98765432', 'afsanakabirlisa@gmai', '01752766977', 'racecourse,comilla', 'Female', '14/06/1995'),
(7777, 'fahim mahtab ifsan', 'ifsan', '12345678', 'ifsan@gmail.com', '01752766977', 'dhaka', 'Male', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Patient_ID` int(20) NOT NULL,
  `Patient_Name` varchar(20) NOT NULL,
  `Day` varchar(20) NOT NULL,
  `Going_To` varchar(20) NOT NULL,
  `Date_to_go` varchar(20) NOT NULL,
  `Return_Date` varchar(20) NOT NULL,
  `Journey_Time` varchar(20) NOT NULL,
  `Return_Time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Patient_ID`, `Patient_Name`, `Day`, `Going_To`, `Date_to_go`, `Return_Date`, `Journey_Time`, `Return_Time`) VALUES
(2, 'ifsan', 'Saturday', 'Sunday', '22/03/2020', '33/43/333', '44:33:444', '33:44:556'),
(5, 'r', 'Dhaka', 'CoxsBazar', '22/03/20204r4r66yuy', '33/43/334r44r66yuu', '44:33:6666yuu', '33:44:554r4r666yuyu'),
(55, 'ifsan', 'Saturday', 'Sunday', '33/33/44', '22/33/33', '33:65:66', '88:77:33'),
(4444, 'tanvir', 'Saturday', 'Sunday', '22/03/2022', '33/43/33', '44:33:44', '33:44:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointmentdetails`
--
ALTER TABLE `appointmentdetails`
  ADD PRIMARY KEY (`APID`),
  ADD KEY `PID` (`PID`),
  ADD KEY `DID` (`DID`);

--
-- Indexes for table `assistantinfo`
--
ALTER TABLE `assistantinfo`
  ADD PRIMARY KEY (`AID`),
  ADD UNIQUE KEY `AUserName` (`AUserName`),
  ADD UNIQUE KEY `AUserName_2` (`AUserName`);

--
-- Indexes for table `coordinatorinfo`
--
ALTER TABLE `coordinatorinfo`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`DID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`PID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Patient_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointmentdetails`
--
ALTER TABLE `appointmentdetails`
  MODIFY `APID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `assistantinfo`
--
ALTER TABLE `assistantinfo`
  MODIFY `AID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `coordinatorinfo`
--
ALTER TABLE `coordinatorinfo`
  MODIFY `c_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `DID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `PID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1223676777;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Patient_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointmentdetails`
--
ALTER TABLE `appointmentdetails`
  ADD CONSTRAINT `appointmentdetails_ibfk_1` FOREIGN KEY (`PID`) REFERENCES `patient` (`PID`),
  ADD CONSTRAINT `appointmentdetails_ibfk_2` FOREIGN KEY (`DID`) REFERENCES `doctors` (`DID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

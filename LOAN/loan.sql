-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2020 at 09:27 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AID` varchar(10) NOT NULL,
  `APWD` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AID`, `APWD`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` varchar(5) NOT NULL,
  `USERNAME` varchar(20) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `USERNAME`, `PASSWORD`) VALUES
('1', 'test1', '5a105e8b9d40e1329780d62ea2265d8a'),
('2', 'test2', 'ad0234829205b9033196ba818f7a872b'),
('3', 'test3', '8ad8757baa8564dc136c1e07507f4a98'),
('4', 'test4', '86985e105f79b95d6bc918fb45ec7727'),
('5', 'test5', 'e3d704f3542b44a621ebed70dc0efe13'),
('6', 'test6', '4cfad7076129962ee70c36839a1e3e15'),
('7', 'test7', 'b04083e53e242626595e2b8ea327e525'),
('8', 'test8', '5e40d09fa0529781afd1254a42913847');

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `ID` varchar(5) NOT NULL,
  `FIRSTNAME` varchar(20) NOT NULL,
  `LASTNAME` varchar(20) NOT NULL,
  `EMAIL` varchar(30) NOT NULL,
  `AGE` varchar(5) NOT NULL,
  `DOB` varchar(15) NOT NULL,
  `INCOME` varchar(15) NOT NULL,
  `AMOUNT` varchar(15) NOT NULL,
  `PURPOSE` varchar(15) NOT NULL,
  `TENURE` varchar(15) NOT NULL,
  `STATUS` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`ID`, `FIRSTNAME`, `LASTNAME`, `EMAIL`, `AGE`, `DOB`, `INCOME`, `AMOUNT`, `PURPOSE`, `TENURE`, `STATUS`) VALUES
('2', 'test2', 'test2', 'test2@gmail.com', '22', '0323-02-22', '2412424', '1212213', 'Student Loan', '12 Months', 'PENDING'),
('3', 'test3', 'test3', 'test333@gmail.com', '33', '0003-02-23', '232424', '23232', 'Personal Loan', '12 Months', 'ACCEPTED'),
('4', 'test4', 'test4', 'test4@gmail.com', '44', '0444-04-04', '124124', '123123', 'Home Loan', '6 Months', 'REJECTED'),
('5', 'test5', 'test5', 'test5@gmail.com', '55', '0005-05-05', '555555', '243234', 'Personal Loan', '24 Months', 'PENDING'),
('6', 'test6', 'test6', 'test6@gmail.com', '60', '0023-04-23', '123123', '323432', 'Student Loan', '32 Months', 'ACCEPTED'),
('1', 'test1', 'test1', 'test111@gmail.com', '18', '0121-12-12', '2121212', '2312321', 'Personal Loan', '24 Months', 'ACCEPTED'),
('7', 'test7', 'test7', 'test777@gmail.com', '60', '0007-07-07', '1223241', '3434132', 'Personal Loan', '12 Months', 'PENDING');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

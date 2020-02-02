-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2020 at 09:26 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `child_nutrition_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `child_information`
--

CREATE TABLE `child_information` (
  `Name` varchar(50) NOT NULL,
  `Age` int(20) NOT NULL,
  `Sex` varchar(10) NOT NULL,
  `Address` varchar(60) NOT NULL,
  `Height` varchar(10) NOT NULL,
  `Weight` varchar(10) NOT NULL,
  `Guardian` varchar(50) NOT NULL,
  `Status` varchar(30) NOT NULL,
  `Calories` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `child_information`
--

INSERT INTO `child_information` (`Name`, `Age`, `Sex`, `Address`, `Height`, `Weight`, `Guardian`, `Status`, `Calories`) VALUES
('Aayush', 21, 'Male', 'Vellore', '120', '21', 'Archit', 'Severely Underweight', 1300),
('Archit', 4, 'Male', 'Delhi', '45', '12', 'Aayush', 'Severely Obese', 400),
('Archana', 27, 'Female', 'Delhi', '80', '15', 'Archit', 'Optimal', 1400),
('yash rastogi', 24, 'Male', 'Delhi', '50', '6', 'Aayush vijay Wargiya', 'Optimal', 1000),
('akarsh', 24, 'Male', 'Vellore', '100', '6', 'Aayush vijay Wargiya', 'Severely Underweight', 1300),
('Anagha', 10, 'Female', 'Mumbai', '50', '30', 'Aayush', 'Severely Obese', 500);

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `FirstName` varchar(50) NOT NULL,
  `MiddleName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `ConfirmPassword` varchar(50) NOT NULL,
  `BirthMonth` varchar(20) NOT NULL,
  `Age` int(10) NOT NULL,
  `BirthPlace` varchar(50) NOT NULL,
  `Position` varchar(50) NOT NULL,
  `WorkPlace` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`FirstName`, `MiddleName`, `LastName`, `UserName`, `Password`, `ConfirmPassword`, `BirthMonth`, `Age`, `BirthPlace`, `Position`, `WorkPlace`) VALUES
('aayush', 'vijay', 'wargiya', 'aayush', 'aayush', 'aayush', 'june', 20, 'ranchi', 'student', 'vellore'),
('archit', 'goyal', 'kumar', 'archit', 'archit', 'archit', 'May', 20, 'Delhi', 'student', 'Vellore');

-- --------------------------------------------------------

--
-- Table structure for table `user_account_guest`
--

CREATE TABLE `user_account_guest` (
  `FirstName` varchar(50) NOT NULL,
  `MiddleName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Occupation` varchar(50) NOT NULL,
  `Reason` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

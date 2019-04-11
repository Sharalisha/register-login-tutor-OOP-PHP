-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2019 at 07:53 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digitaltutor`
--

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `w1673560_subCode` varchar(20) NOT NULL,
  `w1673560_subtitle` varchar(30) NOT NULL,
  `w1673560_subDescription` varchar(100) NOT NULL,
  `w1673560_subFee` int(20) NOT NULL,
  `w1673560_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`w1673560_subCode`, `w1673560_subtitle`, `w1673560_subDescription`, `w1673560_subFee`, `w1673560_ID`) VALUES
('1', 'APM', '  A very good subject  ', 56000, 1),
('2', 'MUSR', 'A very interesting subject', 7800, 1),
('3', 'Web design n development', 'A very creative subject', 6700, 1),
('4', 'Programming', ' A very fancy subject ', 4560, 2),
('5', 'Algorithms', 'A very intelligent subject ', 7890, 3),
('6', 'BIS design and development', 'A subject that made us learn OOP PHP', 3450, 4),
('7', 'Biology', 'Biology is the natural science that studies life and living organisms.', 9800, 5),
('8', 'Chemistry', ' Chemistry is the scientific discipline involved with elements and compounds. ', 1700, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tutor`
--

CREATE TABLE `tutor` (
  `w1673560_ID` int(20) NOT NULL,
  `w1673560_username` varchar(50) NOT NULL,
  `w1673560_password` varchar(35) NOT NULL,
  `w1673560_firstName` varchar(60) NOT NULL,
  `w1673560_dob` date NOT NULL,
  `w1673560_contactNo` int(10) NOT NULL,
  `w1673560_email` varchar(100) NOT NULL,
  `w1673560_qualification` varchar(200) NOT NULL,
  `w1673560_accountNo` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutor`
--

INSERT INTO `tutor` (`w1673560_ID`, `w1673560_username`, `w1673560_password`, `w1673560_firstName`, `w1673560_dob`, `w1673560_contactNo`, `w1673560_email`, `w1673560_qualification`, `w1673560_accountNo`) VALUES
(1, 'Sharalisha Kingsley', 'vksr19', 'Sharalisha Kingsley', '2019-04-10', 756556715, 'sharalisha@gmail.com', 'AAT', 98765432),
(2, 'Vakeeshan Victor', 'sara0404+', 'Vakeeshan Victor', '2019-04-13', 752022055, 'vakeeshan@gmail.com', 'CIMA', 12345678),
(3, 'Premashanth Kumanan', 'asho123', 'Premashanth Kumanan', '2019-04-16', 777492861, 'premashanth@gmail.com', 'PHD', 64563247),
(4, 'Brinda Vimaleshvaran', 'vakee0404+', 'Brinda Vimaleshvaran', '2019-04-13', 775376586, 'brinda@gmail.com', 'PHD', 87863452),
(5, 'Shine Kingsley', 'shine1234', 'Shine Kingsley', '2019-04-27', 772228036, 'shine@gmail.com', 'MAAT', 5647872);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`w1673560_subCode`),
  ADD KEY `fk_sub` (`w1673560_ID`);

--
-- Indexes for table `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`w1673560_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tutor`
--
ALTER TABLE `tutor`
  MODIFY `w1673560_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `fk_sub` FOREIGN KEY (`w1673560_ID`) REFERENCES `tutor` (`w1673560_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

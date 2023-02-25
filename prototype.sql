-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2021 at 10:15 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prototype`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `BranchID` varchar(25) NOT NULL,
  `BranchName` varchar(25) NOT NULL,
  `BranchNo` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`BranchID`, `BranchName`, `BranchNo`) VALUES
('bbb1', 'PVAMU', 1),
('bbb2', 'PV Downtown Houston', 2);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(25) NOT NULL,
  `LoginID` varchar(25) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `LoginDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `LoginID`, `Email`, `Password`, `LoginDate`) VALUES
(1, 'Kluna2', 'lunaboys98@gmail.com', 'abcdefg', '2021-11-16 08:11:25'),
(6, '', '', '', '2021-11-17 03:00:17'),
(7, '', '', '', '2021-11-17 03:03:05'),
(8, '', '', '', '2021-11-18 18:50:53'),
(9, '', '', '', '2021-11-18 20:23:07'),
(10, '', '', '', '2021-11-18 20:36:39');

-- --------------------------------------------------------

--
-- Table structure for table `otheracc`
--

CREATE TABLE `otheracc` (
  `UserID` varchar(25) NOT NULL,
  `AccNo2` int(6) NOT NULL,
  `BranchID` varchar(25) NOT NULL,
  `UserName` varchar(25) NOT NULL,
  `Balance` int(25) NOT NULL,
  `AccType` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `otheracc`
--

INSERT INTO `otheracc` (`UserID`, `AccNo2`, `BranchID`, `UserName`, `Balance`, `AccType`) VALUES
('B6743', 923725, 'bbb2', 'Kaleb Luna', 10000, 'savings'),
('k1234', 923726, 'bbb2', 'Kobe Luna', 26000, 'savings'),
('A6543', 923727, 'bbb2', 'Tom Hanks', 2200, 'savings'),
('T1234', 923728, 'bbb2', 'Jeffrey Tompkins', 13659, 'savings'),
('BC623', 923730, 'bbb2', 'Brianna Cruz', 26000, 'savings');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `TransID` int(6) NOT NULL,
  `Deposit` int(25) NOT NULL,
  `Withdraw` int(25) NOT NULL,
  `AccNo` int(6) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`TransID`, `Deposit`, `Withdraw`, `AccNo`, `Date`) VALUES
(531292, 1000, 0, 1, '2021-11-16 18:52:05'),
(531293, 0, 100, 1, '2021-11-16 19:18:48'),
(531296, 0, 400, 1, '2021-11-16 23:25:14'),
(531297, 1000, 0, 1, '2021-11-16 23:25:48'),
(531298, 10000, 0, 923727, '2021-11-17 00:08:47'),
(531299, 20000, 0, 923728, '2021-11-17 01:28:23'),
(531303, 100, 0, 923727, '2021-11-18 19:04:19'),
(531304, 100, 0, 923729, '2021-11-18 19:05:35'),
(531307, 3977, 0, 923730, '2021-11-18 19:39:08'),
(531308, 10000, 0, 923731, '2021-11-18 20:26:36'),
(531309, 0, 1000, 923731, '2021-11-18 20:27:04');

--
-- Triggers `transactions`
--
DELIMITER $$
CREATE TRIGGER `Update_d` AFTER INSERT ON `transactions` FOR EACH ROW BEGIN
    UPDATE useracc a
    SET a.Balance = a.Balance+new.Deposit
    WHERE a.AccNo=new.AccNo;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Update_w` AFTER INSERT ON `transactions` FOR EACH ROW BEGIN
    UPDATE useracc a
    SET a.Balance = a.Balance-new.Withdraw
    WHERE a.AccNo=new.AccNo;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `useracc`
--

CREATE TABLE `useracc` (
  `AccNo` int(6) NOT NULL,
  `UserID` varchar(25) NOT NULL,
  `AccType` varchar(25) NOT NULL,
  `BranchID` varchar(10) NOT NULL,
  `Balance` int(25) NOT NULL,
  `Password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `useracc`
--

INSERT INTO `useracc` (`AccNo`, `UserID`, `AccType`, `BranchID`, `Balance`, `Password`) VALUES
(1, 'B6743', 'checking', 'bbb1', 2000, '12345'),
(923727, 'A6543', 'checking', 'bbb2', 10100, 'forest'),
(923728, 'k1234', 'checking', 'bbb1', 20000, 'youknow'),
(923729, 'T1234', 'checking', 'bbb1', 100, 'Jeff0406'),
(923730, 'BC623', 'checking', 'bbb1', 3977, 'oatmeal'),
(923731, 'L1234', 'checking', 'bbb1', 9000, '7hjjnh');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` varchar(25) NOT NULL,
  `UserName` varchar(25) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `DOB` varchar(25) NOT NULL,
  `Number` int(25) NOT NULL,
  `Email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `Address`, `DOB`, `Number`, `Email`) VALUES
('A6543', 'Tom Hanks', 'Dallas, Texas', '1974-04-15', 123456789, 'tom@gmail.com'),
('B6743', 'Kaleb Luna', 'Austin, Texas', '2002-04-05', 2147483647, 'steelers@yahoo.com'),
('BC623', 'Brianna Cruz', 'Houston, Texas', '1998-06-23', 2147483647, 'oatmeal@gmail.com'),
('k1234', 'Kobe Luna', 'Houston, Texas', '1998-08-06', 2147483647, 'kobeluna824@gmail.com'),
('L1234', 'Kobe Bryant', 'Austin, Texas', '1997-09-16', 556788899, 'steelers@yahoo.com'),
('T1234', 'Jeffrey Tompkins', 'Houston, Texas', '2000-10-22', 2147483647, 'T1234High@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`BranchID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otheracc`
--
ALTER TABLE `otheracc`
  ADD PRIMARY KEY (`AccNo2`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`TransID`),
  ADD KEY `AccNo` (`AccNo`);

--
-- Indexes for table `useracc`
--
ALTER TABLE `useracc`
  ADD PRIMARY KEY (`AccNo`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `otheracc`
--
ALTER TABLE `otheracc`
  MODIFY `AccNo2` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=923731;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `TransID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=531310;

--
-- AUTO_INCREMENT for table `useracc`
--
ALTER TABLE `useracc`
  MODIFY `AccNo` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=923732;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `otheracc`
--
ALTER TABLE `otheracc`
  ADD CONSTRAINT `otheracc_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`AccNo`) REFERENCES `useracc` (`AccNo`);

--
-- Constraints for table `useracc`
--
ALTER TABLE `useracc`
  ADD CONSTRAINT `useracc_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

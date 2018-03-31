-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2018 at 05:28 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `urms`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounttype`
--

CREATE TABLE `accounttype` (
  `RaffleID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Role` varchar(255) NOT NULL DEFAULT 'User',
  `AllocatedTickets` int(11) NOT NULL DEFAULT '2147483647'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounttype`
--

INSERT INTO `accounttype` (`RaffleID`, `UserID`, `Role`, `AllocatedTickets`) VALUES
(1, 10, 'Admin', 13),
(1, 11, 'Seller', 22),
(1, 12, 'Seller', 0);

-- --------------------------------------------------------

--
-- Table structure for table `raffle`
--

CREATE TABLE `raffle` (
  `RaffleID` int(11) NOT NULL,
  `RaffleName` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `AvailableTickets` int(11) NOT NULL,
  `MaxTickets` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `raffle`
--

INSERT INTO `raffle` (`RaffleID`, `RaffleName`, `Description`, `StartDate`, `EndDate`, `AvailableTickets`, `MaxTickets`) VALUES
(1, '12 Draws of Christmas', 'Christmas raffle where you have the chance to win money!', '2018-12-01', '2018-12-31', 2172, 2215);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `RequestID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `RaffleID` int(11) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Notes` text NOT NULL,
  `Quantity` int(255) NOT NULL,
  `RequestDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Resolved` tinyint(1) NOT NULL DEFAULT '0',
  `Approved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`RequestID`, `UserID`, `RaffleID`, `Type`, `Notes`, `Quantity`, `RequestDate`, `Resolved`, `Approved`) VALUES
(1, 10, 1, 'Ticket_Alloc', '', 5, '2018-03-30 00:50:44', 1, 1),
(2, 10, 1, 'Ticket_Alloc', '', 6, '2018-03-30 02:21:13', 1, 1),
(3, 11, 1, 'Join', '', 0, '2018-03-30 17:45:09', 1, 1),
(4, 10, 1, 'Ticket_Alloc', '', 6, '2018-03-30 21:11:41', 1, 1),
(5, 11, 1, 'Ticket_Alloc', '', 10, '2018-03-30 21:13:58', 0, 0),
(6, 11, 1, 'Ticket_Alloc', '', 11, '2018-03-30 21:17:12', 1, 1),
(7, 11, 1, 'Ticket_Alloc', '', 15, '2018-03-30 21:22:20', 1, 1),
(8, 12, 1, 'Join', '', 0, '2018-03-31 00:47:34', 1, 1),
(9, 13, 1, 'Join', '', 0, '2018-03-31 13:33:07', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `TicketID` int(11) NOT NULL,
  `RaffleID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Sold` tinyint(1) NOT NULL DEFAULT '0',
  `DatePurchased` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`TicketID`, `RaffleID`, `UserID`, `Name`, `Address`, `Phone`, `Email`, `Sold`, `DatePurchased`) VALUES
(1, 1, 1, 'Logan Brown', '123 Hall Way', '111-111-1111', 'logan@logan.com', 1, '2018-03-20'),
(2, 2, 1, 'Max Jennings', '123 Hall Street', '222-222-2222', 'max@max.com', 1, '2018-03-19'),
(3, 1, 2, 'Sam Mckinnon', '123 Hall Crescent', '333-333-3333', 'sam@sam.com', 1, '2018-03-18'),
(4, 1, 2, 'Max Jennings', '123 Hall Street', '222-222-2222', 'max@max.com', 1, '2018-03-19'),
(5, 2, 2, 'Sam Mckinnon', '123 Hall Crescent', '333-333-3333', 'sam@sam.com', 1, '2018-03-18'),
(6, 1, 9, 'Bob', '1 Bob Street', '1234567890', 'bob@bob.com', 1, '2018-03-28'),
(7, 1, 10, 'Will', '123 Main Street', '1231231241', 'why@how.com', 1, '2018-03-30'),
(8, 1, 10, 'Will', '123 Main Street', '1231231241', 'why@how.com', 1, '2018-03-30'),
(9, 1, 10, 'Will', '123 Main Street', '1231231241', 'why@how.com', 1, '2018-03-30'),
(10, 1, 11, 'Joey', '4 Fifth Avenue', '0987654321', 'how@why.com', 1, '2018-03-30'),
(11, 1, 11, 'Joey', '4 Fifth Avenue', '0987654321', 'how@why.com', 1, '2018-03-30'),
(12, 1, 11, 'Joey', '4 Fifth Avenue', '0987654321', 'how@why.com', 1, '2018-03-30'),
(13, 1, 11, 'Joey', '4 Fifth Avenue', '0987654321', 'how@why.com', 1, '2018-03-30'),
(14, 1, 10, 'Sal', '2 King Street', '9025773556', 'x2018rew@stfx.ca', 1, '2018-03-31'),
(15, 1, 10, 'Sal', '2 King Street', '9025773556', 'x2018rew@stfx.ca', 1, '2018-03-31'),
(16, 1, 10, 'Sal', '2 King Street', '9025773556', 'x2018rew@stfx.ca', 1, '2018-03-31'),
(17, 1, 10, 'Sal', '2 King Street', '9025773556', 'x2018rew@stfx.ca', 1, '2018-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `UserName`, `Email`, `Password`, `Address`, `Phone`) VALUES
(10, 'Amanda Mombourquette', 'amanda@phkcoc.ca', '$2y$10$0eOIM6XAODFfCCz9LgXzCekUzwYRbmqHmkeZ5TAjatnSRut1FFkRm', '123 Main Street', '9025555555'),
(11, 'Bob', 'bob@bob.com', '$2y$10$exQVQv5fcCVchBkMYJn0r.FozWH8/t5xwlKFfBUET6bdwtd2mCZia', '123 Bob Lane', '1234567890'),
(12, 'Sid', 'sdawg@gmail.com', '$2y$10$gi9cUSnqFueoUgnUekzuheplvviNNRfCWeROYtMRXzGV5.XyxPyJO', '55 Main Lane', '9023567421'),
(13, 'Timmy', 'timmy@hotmail.com', '$2y$10$KFPi.rmTN1vCWanaR0HmDutmqy2D.U72vdHWvf.WfcMU7DqIBOZaa', '9 Fourth Lane', '9512347887');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounttype`
--
ALTER TABLE `accounttype`
  ADD PRIMARY KEY (`RaffleID`,`UserID`);

--
-- Indexes for table `raffle`
--
ALTER TABLE `raffle`
  ADD PRIMARY KEY (`RaffleID`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`RequestID`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`TicketID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `raffle`
--
ALTER TABLE `raffle`
  MODIFY `RaffleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `RequestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `TicketID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

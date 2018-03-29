-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2018 at 03:39 PM
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
(1, 1, 'Administrator', 2147483647),
(2, 4, 'Administrator', 2147483647),
(3, 4, 'Administrator', 2147483647),
(4, 4, 'Administrator', 2147483647),
(5, 9, 'Administrator', 2147483647);

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
  `MaxTickets` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `raffle`
--

INSERT INTO `raffle` (`RaffleID`, `RaffleName`, `Description`, `StartDate`, `EndDate`, `MaxTickets`) VALUES
(1, 'Man Lin Raffle', 'Chance to win an HTML website with turquoise coloring!', '2018-03-01', '2018-03-24', 255),
(2, 'The Best Raffle', 'Chance to win a large elephant!				', '2014-01-01', '2015-01-01', 256),
(3, 'Super Raffle', 'This is the next best thing since sliced bread				', '2014-02-02', '2016-02-02', 1000),
(4, 'Another Cool Raffle', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa				', '2012-12-23', '2013-01-15', 2200),
(5, 'Raffle', 'ahsdijasbhdbuasdbuasjudbh', '2015-05-05', '5000-05-05', 255);

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
  `Resolved` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`RequestID`, `UserID`, `RaffleID`, `Type`, `Notes`, `Quantity`, `RequestDate`, `Resolved`) VALUES
(6, 1, 1, 'Join', '', 0, '2018-03-23 15:43:31', 0),
(7, 1, 4, 'Join', '', 0, '2018-03-23 15:53:17', 0),
(8, 4, 4, 'Join', '', 0, '2018-03-23 18:36:34', 0),
(9, 4, 2, 'Join', '', 0, '2018-03-23 18:37:31', 0),
(10, 4, 1, 'Join', '', 0, '2018-03-23 22:08:47', 0),
(11, 9, 1, 'Ticket_Alloc', '', 2, '2018-03-28 13:49:25', 0),
(12, 9, 1, 'Ticket_Alloc', '', 3, '2018-03-28 13:50:20', 0),
(13, 9, 1, 'Ticket_Alloc', '', 3, '2018-03-28 16:26:54', 0),
(14, 9, 1, 'Ticket_Alloc', '', 5, '2018-03-28 16:39:00', 0),
(15, 9, 4, 'Join', '', 0, '2018-03-28 18:57:29', 0),
(16, 9, 3, 'Join', '', 0, '2018-03-28 18:57:38', 0),
(17, 9, 1, 'Join', '', 0, '2018-03-28 18:57:44', 0);

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
(6, 1, 9, 'Bob', '1 Bob Street', '1234567890', 'bob@bob.com', 1, '2018-03-28');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `UserName`, `Password`, `Address`, `Phone`, `Email`) VALUES
(1, 'Dylan Coakley', 'd_coakes420', '1 Infinity Loop', '444-444-4444', 'ilovecomputers@dylan.com'),
(2, 'Katie', 'katieroxs1997', 'MacEachern', '555-555-5555', '1015TheHawk1Fan@katie.com'),
(4, 'Ed', 'ededed', 'Ed', 'Ed', 'ed@ed.com'),
(5, 'Dylan Coakley', 'csci485', '63 MacIntyre Lane', '9025773557', 'x2014gvw@stfx.ca'),
(6, 'Dylan Coakley', 'computer', '63 MacIntyre Lane', '9027369034', 'dylan_coakley11@hotmail.com'),
(8, 'Buddy', 'bababa', 'B', '1234567890', 'buddy@bud.ca'),
(9, 'bobbybob', '$2y$10$YTsRpO0U0UmOc6UTV73x0ezvj2xhXOTegzKwKYznemTMyNf24.dd.', 'bob', '908765435', '');

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
  MODIFY `RequestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `TicketID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2018 at 08:34 PM
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
  `AllocatedTickets` int(11) NOT NULL DEFAULT '2147483647',
  `MoneyRaised` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounttype`
--

INSERT INTO `accounttype` (`RaffleID`, `UserID`, `Role`, `AllocatedTickets`, `MoneyRaised`) VALUES
(1, 10, 'Admin', 20, 10),
(1, 11, 'Admin', 15, 5),
(1, 12, 'Seller', 0, 0),
(1, 19, 'Seller', 0, 0);

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
(1, '12 Draws of Christmas', 'Christmas raffle where you have the chance to win money', '2018-12-01', '2018-12-31', 2096, 2200);

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
(5, 11, 1, 'Ticket_Alloc', '', 10, '2018-03-30 21:13:58', 1, 1),
(6, 11, 1, 'Ticket_Alloc', '', 11, '2018-03-30 21:17:12', 1, 1),
(7, 11, 1, 'Ticket_Alloc', '', 15, '2018-03-30 21:22:20', 1, 1),
(8, 12, 1, 'Join', '', 0, '2018-03-31 00:47:34', 1, 1),
(9, 13, 1, 'Join', '', 0, '2018-03-31 13:33:07', 0, 0),
(10, 12, 1, 'Ticket_Alloc', '', 5, '2018-04-01 13:25:13', 1, 1),
(11, 16, 1, 'Join', '', 0, '2018-04-02 23:26:44', 0, 0),
(12, 18, 1, 'Join', '', 0, '2018-04-02 23:35:51', 0, 0),
(13, 18, 1, 'Ticket_Alloc', '', 10, '2018-04-02 23:35:51', 0, 0),
(14, 19, 1, 'Join', '', 0, '2018-04-03 02:24:42', 1, 1),
(15, 19, 1, 'Ticket_Alloc', '', 10, '2018-04-03 02:24:42', 0, 0),
(16, 11, 1, 'Ticket_Alloc', '', 2, '2018-04-03 14:57:25', 1, 1);

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
(17, 1, 10, 'Sal', '2 King Street', '9025773556', 'x2018rew@stfx.ca', 1, '2018-03-31'),
(18, 1, 10, 'Steve', '8 Harvey Avenue', '3044046432', 'sharvey@familyfeud.com', 1, '2018-04-01'),
(19, 1, 10, 'Steve', '8 Harvey Avenue', '3044046432', 'sharvey@familyfeud.com', 1, '2018-04-01'),
(20, 1, 10, 'Steve', '8 Harvey Avenue', '3044046432', 'sharvey@familyfeud.com', 1, '2018-04-01'),
(21, 1, 10, 'Steve', '8 Harvey Avenue', '3044046432', 'sharvey@familyfeud.com', 1, '2018-04-01'),
(22, 1, 10, 'Steve', '8 Harvey Avenue', '3044046432', 'sharvey@familyfeud.com', 1, '2018-04-01'),
(23, 1, 10, 'Steve', '8 Harvey Avenue', '3044046432', 'sharvey@familyfeud.com', 1, '2018-04-01'),
(24, 1, 10, 'Steve', '8 Harvey Avenue', '3044046432', 'sharvey@familyfeud.com', 1, '2018-04-01'),
(25, 1, 10, 'Steve', '8 Harvey Avenue', '3044046432', 'sharvey@familyfeud.com', 1, '2018-04-01'),
(26, 1, 10, 'Steve', '8 Harvey Avenue', '3044046432', 'sharvey@familyfeud.com', 1, '2018-04-01'),
(27, 1, 10, 'Steve', '8 Harvey Avenue', '3044046432', 'sharvey@familyfeud.com', 1, '2018-04-01'),
(28, 1, 10, 'Dylan Coakley', '63 MacIntyre Lane', '9027369034', 'dylan_coakley11@hotmail.com', 1, '2018-04-03'),
(29, 1, 11, 'Bob Smith', '123 Bob Lane', '1233222113', 'bob@bob.bob', 1, '2018-04-03'),
(30, 1, 11, 'Bob Smith', '123 Bob Lane', '1233222113', 'bob@bob.bob', 1, '2018-04-03'),
(31, 1, 11, 'Jean', '98 Hawthorne Street', '8765678029', 'f4f4f4@hex.com', 1, '2018-04-03'),
(32, 1, 11, 'Jean', '98 Hawthorne Street', '8765678029', 'f4f4f4@hex.com', 1, '2018-04-03'),
(33, 1, 11, 'Dylan', '123 Main Street', '7645366627', 'x2014gvw@stfx.ca', 1, '2018-04-04'),
(34, 1, 11, 'Dylan', '123 Main Street', '7645366627', 'x2014gvw@stfx.ca', 1, '2018-04-04'),
(35, 1, 11, 'Dylan', '123 Main Street', '7645366627', 'x2014gvw@stfx.ca', 1, '2018-04-04'),
(36, 1, 11, 'Dylan', '123 Main Street', '7645366627', 'x2014gvw@stfx.ca', 1, '2018-04-04'),
(37, 1, 11, 'Dylan Coakley', '63 MacIntyre Lane', '9025773557', 'x2014gvw@stfx.ca', 1, '2018-04-04'),
(38, 1, 11, 'Dylan Coakley', '63 MacIntyre Lane', '9025773557', 'x2014gvw@stfx.ca', 1, '2018-04-04'),
(39, 1, 11, 'Dylan Coakley', '63 MacIntyre Lane', '9025773557', 'x2014gvw@stfx.ca', 1, '2018-04-04'),
(40, 1, 11, 'Dylan Coakley', '63 MacIntyre Lane', '9025773557', 'x2014gvw@stfx.ca', 1, '2018-04-04'),
(41, 1, 11, 'Dylan Coakley', '63 MacIntyre Lane', '9025773557', 'x2014gvw@stfx.ca', 1, '2018-04-04'),
(42, 1, 11, 'Lenny', '6 New Street', '526847193', 'me@aol.com', 1, '2018-04-04'),
(43, 1, 11, 'Lenny', '6 New Street', '526847193', 'me@aol.com', 1, '2018-04-04'),
(44, 1, 11, 'Lenny', '6 New Street', '526847193', 'me@aol.com', 1, '2018-04-04'),
(45, 1, 11, 'Lenny', '6 New Street', '526847193', 'me@aol.com', 1, '2018-04-04'),
(46, 1, 11, 'Lenny', '6 New Street', '526847193', 'me@aol.com', 1, '2018-04-04'),
(47, 1, 11, 'Dylan Coakley', '63 MacIntyre Lane', '9027369034', 'dylan_coakley11@hotmail.com', 1, '2018-04-04'),
(48, 1, 11, 'Dylan Coakley', '63 MacIntyre Lane', '9027369034', 'dylan_coakley11@hotmail.com', 1, '2018-04-04'),
(49, 1, 11, 'Dylan Coakley', '63 MacIntyre Lane', '9027369034', 'dylan_coakley11@hotmail.com', 1, '2018-04-04'),
(50, 1, 11, 'Dylan Coakley', '63 MacIntyre Lane', '9027369034', 'dylan_coakley11@hotmail.com', 1, '2018-04-04'),
(51, 1, 11, 'Dylan Coakley', '63 MacIntyre Lane', '9027369034', 'dylan_coakley11@hotmail.com', 1, '2018-04-04'),
(52, 1, 11, 'Ryan', '55 Main Lane', '8765678029', 'ryan@aol.com', 1, '2018-04-04'),
(53, 1, 11, 'Ryan', '55 Main Lane', '8765678029', 'ryan@aol.com', 1, '2018-04-04'),
(54, 1, 11, 'Ryan', '55 Main Lane', '8765678029', 'ryan@aol.com', 1, '2018-04-04'),
(55, 1, 11, 'Ryan', '55 Main Lane', '8765678029', 'ryan@aol.com', 1, '2018-04-04'),
(56, 1, 11, 'Ryan', '55 Main Lane', '8765678029', 'ryan@aol.com', 1, '2018-04-04'),
(57, 1, 11, 'Ryan', '55 Main Lane', '8765678029', 'ryan@aol.com', 1, '2018-04-04'),
(58, 1, 11, 'Ryan', '55 Main Lane', '8765678029', 'ryan@aol.com', 1, '2018-04-04'),
(59, 1, 11, 'Katie', 'x campus', '9026230992', '', 1, '2018-04-04'),
(60, 1, 11, 'Katie', 'x campus', '9026230992', '', 1, '2018-04-04'),
(61, 1, 11, 'Katie', 'x campus', '9026230992', '', 1, '2018-04-04'),
(62, 1, 11, 'Katie', 'x campus', '9026230992', '', 1, '2018-04-04'),
(63, 1, 11, 'Katie', 'x campus', '9026230992', '', 1, '2018-04-04'),
(64, 1, 11, 'Katie', 'x campus', '9026230992', '', 1, '2018-04-04'),
(65, 1, 11, 'Katie', 'x campus', '9026230992', '', 1, '2018-04-04'),
(66, 1, 11, 'Katie', 'x campus', '9026230992', '', 1, '2018-04-04'),
(67, 1, 11, 'Katie', 'x campus', '9026230992', '', 1, '2018-04-04'),
(68, 1, 11, 'Katie', 'x campus', '9026230992', '', 1, '2018-04-04'),
(69, 1, 11, 'Sam', '123 Main Lane', '9024567890', 'sam@aol.com', 1, '2018-03-28'),
(70, 1, 11, 'Sam', '123 Main Lane', '9024567890', 'sam@aol.com', 1, '2018-03-28'),
(71, 1, 11, 'Sam', '123 Main Lane', '9024567890', 'sam@aol.com', 1, '2018-03-28'),
(72, 1, 11, 'Sam', '123 Main Lane', '9024567890', 'sam@aol.com', 1, '2018-03-28'),
(73, 1, 11, 'Sam', '123 Main Lane', '9024567890', 'sam@aol.com', 1, '2018-03-28'),
(74, 1, 11, 'Sam', '123 Main Lane', '9024567890', 'sam@aol.com', 1, '2018-03-28'),
(75, 1, 11, 'Sam', '123 Main Lane', '9024567890', 'sam@aol.com', 1, '2018-03-28'),
(76, 1, 11, 'Sam', '123 Main Lane', '9024567890', 'sam@aol.com', 1, '2018-03-28'),
(77, 1, 11, 'Jean', '98 Hawthorne Street', '8765678029', 'f4f4f4@hex.com', 1, '2018-03-29'),
(78, 1, 11, 'Jean', '98 Hawthorne Street', '8765678029', 'f4f4f4@hex.com', 1, '2018-03-29'),
(79, 1, 11, 'Jean', '98 Hawthorne Street', '8765678029', 'f4f4f4@hex.com', 1, '2018-03-29'),
(80, 1, 11, 'Jean', '98 Hawthorne Street', '8765678029', 'f4f4f4@hex.com', 1, '2018-03-29'),
(81, 1, 11, 'Jean', '98 Hawthorne Street', '8765678029', 'f4f4f4@hex.com', 1, '2018-03-29'),
(82, 1, 11, 'Jean', '98 Hawthorne Street', '8765678029', 'f4f4f4@hex.com', 1, '2018-03-29'),
(83, 1, 11, 'Jean', '98 Hawthorne Street', '8765678029', 'f4f4f4@hex.com', 1, '2018-03-29'),
(84, 1, 11, 'Jean', '98 Hawthorne Street', '8765678029', 'f4f4f4@hex.com', 1, '2018-03-29'),
(85, 1, 11, 'Jean', '98 Hawthorne Street', '8765678029', 'f4f4f4@hex.com', 1, '2018-03-29'),
(86, 1, 11, 'Dylan Coakley', '63 MacIntyre Lane', '9027369034', 'dylan_coakley11@hotmail.com', 1, '2018-03-30'),
(87, 1, 11, 'Dylan Coakley', '63 MacIntyre Lane', '9027369034', 'dylan_coakley11@hotmail.com', 1, '2018-03-30'),
(88, 1, 11, 'Dylan Coakley', '63 MacIntyre Lane', '9027369034', 'dylan_coakley11@hotmail.com', 1, '2018-03-30'),
(89, 1, 11, 'Dylan Coakley', '63 MacIntyre Lane', '9027369034', 'dylan_coakley11@hotmail.com', 1, '2018-03-30'),
(90, 1, 11, 'Dylan Coakley', '63 MacIntyre Lane', '9027369034', 'dylan_coakley11@hotmail.com', 1, '2018-03-30'),
(91, 1, 11, 'Dylan Coakley', '63 MacIntyre Lane', '9027369034', 'dylan_coakley11@hotmail.com', 1, '2018-03-30'),
(92, 1, 11, 'Dylan Coakley', '63 MacIntyre Lane', '9027369034', 'dylan_coakley11@hotmail.com', 1, '2018-03-30'),
(93, 1, 11, 'Bob Smith', '123 Bob Lane', '1233222113', 'bob@bob.bob', 1, '2018-03-27'),
(94, 1, 11, 'Bob Smith', '123 Bob Lane', '1233222113', 'bob@bob.bob', 1, '2018-03-27'),
(95, 1, 11, 'Bob Smith', '123 Bob Lane', '1233222113', 'bob@bob.bob', 1, '2018-03-27'),
(96, 1, 11, 'Bob Smith', '123 Bob Lane', '1233222113', 'bob@bob.bob', 1, '2018-03-27'),
(97, 1, 11, 'Bob Smith', '123 Bob Lane', '1233222113', 'bob@bob.bob', 1, '2018-03-27'),
(98, 1, 11, 'Bob Smith', '123 Bob Lane', '1233222113', 'bob@bob.bob', 1, '2018-03-27'),
(99, 1, 11, 'Bob Smith', '123 Bob Lane', '1233222113', 'bob@bob.bob', 1, '2018-03-27'),
(100, 1, 11, 'Bob Smith', '123 Bob Lane', '1233222113', 'bob@bob.bob', 1, '2018-03-27')
;

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
(12, 'Sidee', 'sdawg@gmail.com', '$2y$10$gi9cUSnqFueoUgnUekzuheplvviNNRfCWeROYtMRXzGV5.XyxPyJO', '55 Main Lan', '9023567421'),
(13, 'Timmy', 'timmy@hotmail.com', '$2y$10$KFPi.rmTN1vCWanaR0HmDutmqy2D.U72vdHWvf.WfcMU7DqIBOZaa', '9 Fourth Lane', '9512347887'),
(19, 'Max Jennings', 'mlin@stfx.ca', '$2y$10$a06e/BWkDgyXzumIXyEBpuu2GzY7C5g.gDcO2cbVBtYRsQgkMubiq', '63 MacIntyre Lane', '1234567890');

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
  MODIFY `RaffleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `RequestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `TicketID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
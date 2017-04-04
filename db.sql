-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 04, 2017 at 06:20 PM
-- Server version: 5.7.17-log
-- PHP Version: 7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college_event_plan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `email` varchar(100) NOT NULL,
  `university` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`email`, `university`, `username`) VALUES
('alienmode@test.ucf.edu', 'University of Central Florida', 'Popsickle'),
('glob@test.ucf.edu', 'University of Central Florida', 'Globby');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `eventID` int(50) NOT NULL,
  `comment` text NOT NULL,
  `username` varchar(30) NOT NULL,
  `commentID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`eventID`, `comment`, `username`, `commentID`) VALUES
(14, 'Nice Event', 'purpleskerple', 7),
(9, 'Nice event', 'purpleskerple', 6),
(9, 'hi', 'purpleskerple', 5),
(7, 'Lunch, yum', 'purpleskerple', 8),
(9, 'Hi', 'purpleskerple', 9),
(6, 'I am the Admin\r\n', 'Popsickle', 10);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventID` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `category` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` decimal(15,0) NOT NULL,
  `discription` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventID`, `name`, `date`, `time`, `category`, `email`, `phone`, `discription`) VALUES
(9, 'Physics Study Group', '2017-03-30', '12:30:00', 'RSO', 'bob@test.ucf.edu', '4072226666', 'Studying for our first test'),
(2, 'A Public Event', '2017-03-30', '11:42:12', 'Public', 'super@test.ucf.edu', '407555555', 'Fountain Event'),
(14, 'Study for Physics Test 2', '2017-04-01', '03:00:00', 'RSO', 'bob@test.ucf.edu', '9043123165', 'Studying for our 2nd test'),
(8, 'First RSO Event', '2017-03-31', '15:33:00', 'RSO', 'super@test.ucf.edu', '4078783344', 'Our first RSO meeting.'),
(6, 'Chemistry Study Group', '2017-03-24', '15:30:00', 'RSO', 'bob@test.ucf.edu', '777777777', 'Library Studying'),
(7, 'Lunch', '2017-03-30', '12:30:00', 'Private', 'bksjnx@test.ucf.edu', '4445556666', 'Lunch, student union'),
(10, 'An Event', '2017-03-08', '23:02:00', 'RSO', 'kjnm.@test.ucf.edu', '4444556666', 'kjnlk');

-- --------------------------------------------------------

--
-- Table structure for table `held_at`
--

CREATE TABLE `held_at` (
  `eventID` int(50) NOT NULL,
  `locationID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inrso`
--

CREATE TABLE `inrso` (
  `rsoID` int(11) NOT NULL,
  `studentID` varchar(40) NOT NULL,
  `memID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inrso`
--

INSERT INTO `inrso` (`rsoID`, `studentID`, `memID`) VALUES
(1, 'JohnJ@test.ucf.edu', 6),
(1, 'super@test.ucf.edu', 3),
(1, 'sam@test.ucf.edu', 7),
(1, 'fanfan@test.ucf.edu', 27),
(1, 'cthulhu@test.ucf.edu', 45),
(2, 'cthulhu@test.ucf.edu', 46),
(2, 'bob@test.ucf.edu', 40);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `locationID` int(50) NOT NULL,
  `name` text NOT NULL,
  `longitude` decimal(10,0) NOT NULL,
  `latitude` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rsoevents`
--

CREATE TABLE `rsoevents` (
  `eventID` int(40) NOT NULL,
  `rsoID` int(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rsoevents`
--

INSERT INTO `rsoevents` (`eventID`, `rsoID`) VALUES
(8, 1),
(6, 1),
(9, 2),
(14, 2);

-- --------------------------------------------------------

--
-- Table structure for table `rsos`
--

CREATE TABLE `rsos` (
  `name` varchar(40) NOT NULL,
  `rsoID` int(11) NOT NULL,
  `adminID` varchar(40) NOT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rsos`
--

INSERT INTO `rsos` (`name`, `rsoID`, `adminID`, `description`) VALUES
('Physics Group', 1, 'glob@test.ucf.edu', ''),
('Chemistry Group', 2, 'alienmode@test.ucf.edu', '');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `username` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `university` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`username`, `email`, `university`) VALUES
('purpleskerple', 'cthulhu@test.ucf.edu', 'University of Central Florida'),
('JohnThePerson', 'JohnJ@test.ucf.edu', 'University of Central Florida'),
('SamSand', 'sam@test.ucf.edu', 'University of Central Florida'),
('SaltKid', 'bob@test.ucf.edu', 'University of Central Florida'),
('SallySuper', 'super@test.ucf.edu', 'University of Central Florida'),
('CindySwirlyFan', 'fanfan@test.ucf.edu', 'University of Central Florida'),
('mcheng', 'mcheng@ucf.edu', 'UCF');

-- --------------------------------------------------------

--
-- Table structure for table `superadmins`
--

CREATE TABLE `superadmins` (
  `username` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `superadmins`
--

INSERT INTO `superadmins` (`username`) VALUES
('superadmin');

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE `universities` (
  `Name` varchar(100) NOT NULL,
  `City` varchar(100) NOT NULL,
  `State` varchar(100) NOT NULL,
  `NumStudents` int(11) NOT NULL,
  `Discription` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`Name`, `City`, `State`, `NumStudents`, `Discription`) VALUES
('University of Central Florida', 'Orlando', 'Florida', 63016, 'UCF'),
('Florida State University', 'Tallahassee', 'Florida', 41867, 'FSU'),
('University of Minnesota', 'Minneapolis', 'Minnesota', 48231, 'UofM'),
('Massachusetts Institute of Technology', 'Cambridge', 'Massachusetts', 11376, 'MIT');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `firstName` varchar(40) NOT NULL,
  `lastName` varchar(40) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`firstName`, `lastName`, `username`, `password`) VALUES
('Brita', 'Ramsay', 'purpleskerple', 'ASDFASDF'),
('John', 'Johnson', 'JohnThePerson', 'ASDFASDF'),
('Sam', 'Sanders', 'SamSand', 'ASDFASDF'),
('Bob', 'Bobson', 'SaltKid', 'ASDFASDF'),
('Sally', 'Super', 'SallySuper', 'ASDFASDF'),
('Cindy', 'Swirl', 'SwirlyFan', 'ASDFASDF'),
('Sam', 'Hyde', 'Popsickle', 'ASDFASDF'),
('Glob', 'Globson', 'Globby', 'ASDFASDF'),
('Super', 'Admin', 'superadmin', 'ASDFASDF'),
('Adrian', 'Ageste', 'aageste', '123'),
('Marinette', 'Cheng', 'mcheng', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventID`);

--
-- Indexes for table `held_at`
--
ALTER TABLE `held_at`
  ADD PRIMARY KEY (`eventID`);

--
-- Indexes for table `inrso`
--
ALTER TABLE `inrso`
  ADD UNIQUE KEY `memID_2` (`memID`),
  ADD KEY `memID` (`memID`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`locationID`);

--
-- Indexes for table `rsoevents`
--
ALTER TABLE `rsoevents`
  ADD PRIMARY KEY (`eventID`);

--
-- Indexes for table `rsos`
--
ALTER TABLE `rsos`
  ADD PRIMARY KEY (`rsoID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `superadmins`
--
ALTER TABLE `superadmins`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `universities`
--
ALTER TABLE `universities`
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `inrso`
--
ALTER TABLE `inrso`
  MODIFY `memID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `locationID` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rsos`
--
ALTER TABLE `rsos`
  MODIFY `rsoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
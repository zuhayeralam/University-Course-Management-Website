-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 21, 2020 at 04:53 AM
-- Server version: 5.5.65-MariaDB
-- PHP Version: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zalam`
--

-- --------------------------------------------------------

--
-- Table structure for table `academicstaffs`
--

CREATE TABLE IF NOT EXISTS `academicstaffs` (
  `staff_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `qualification` varchar(128) NOT NULL,
  `expertise` varchar(128) NOT NULL,
  `phone_number` varchar(128) NOT NULL,
  `availability` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academicstaffs`
--

INSERT INTO `academicstaffs` (`staff_id`, `name`, `email`, `password`, `qualification`, `expertise`, `phone_number`, `availability`) VALUES
(100, 'Helene Skudra', 'helene@owlmail.com', 'ud0sS4N1Lt4.o', 'PhD', 'Information Systems', '+61 491 570 170', NULL),
(100111, 'Ilona Rijavec', 'ilonar87@owlmail.com', 'ud0sS4N1Lt4.o', 'PhD', 'Information Systems', '+61 491 570 156', 'Unavailable'),
(100112, 'Ermina Zore', 'ermz@owlmail.com', 'ud0sS4N1Lt4.o', 'Master', 'Information Systems', '+61 491 570 157', 'Available'),
(100113, 'Madeleine Egnell', 'maddie71@owlmail.com', 'ud0sS4N1Lt4.o', 'Bachelor', 'Network Administration', '+61 491 570 158', 'Available'),
(100114, 'Claudia Blaga', 'blaga78@owlmail.com', 'ud0sS4N1Lt4.o', 'PhD', 'Human Computer Interaction', '+61 491 570 159', 'Available'),
(100115, 'Prafulla Devi', 'devi79@owlmail.com', 'ud0sS4N1Lt4.o', 'PhD', 'Network Administration', '+61 491 570 149', 'Unavailable'),
(100116, 'Elinar Prova', 'elinar99@owlmail.com', 'ud0sS4N1Lt4.o', 'Master', 'Human Computer Interaction', '+61 491 545 199', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE IF NOT EXISTS `enrollment` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `unit_code` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`id`, `student_id`, `unit_code`) VALUES
(7, 500111, 'KGS355'),
(8, 500111, 'KGS324'),
(11, 500113, 'KGS351'),
(12, 500166, 'KGS111'),
(13, 500116, 'KGS111'),
(14, 500115, 'KGS111');

-- --------------------------------------------------------

--
-- Table structure for table `stafflist`
--

CREATE TABLE IF NOT EXISTS `stafflist` (
  `staff_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stafflist`
--

INSERT INTO `stafflist` (`staff_id`, `name`) VALUES
(100112, 'Ermina Zore'),
(100113, 'Madeleine Egnell'),
(100114, 'Claudia Blaga');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `student_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `address` varchar(128) NOT NULL,
  `dob` varchar(128) NOT NULL,
  `phone_number` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=500167 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `name`, `email`, `password`, `address`, `dob`, `phone_number`) VALUES
(500111, 'Shila Mukherjea', 'shila84@owlmail.com', 'ud0sS4N1Lt4.o', '3/66 Glassy Avenue, Uchil', '1984-03-23', '+61 666 570 110'),
(500112, 'Prachi Brahmachari', 'prachi360@owlmail.com', 'ud0sS4N1Lt4.o', '2/16 Wrenttown Road, Askea', '1992-05-21', '+61 666 570 112'),
(500113, 'Viktoria Grimminger', 'viki990@owlmail.com', 'ud0sS4N1Lt4.o', '1/3 Amesfield Way, Cutreyburg', '1880-07-12', '+61 666 570 114'),
(500114, 'Monica Fischart', 'moni55@owlmail.com', 'ud0sS4N1Lt4.o', '9/66 Starlight Alley, Fodraesil', '1999-11-05', '+61 666 570 122'),
(500115, 'Sylvia Nickel', 'syln@owlmail.com', 'ud0sS4N1Lt4.o', '7/45 Newliers Route,Hasmington', '1997-06-13', '+61 666 570 130'),
(500116, 'Paulina Rifkosvy', 'paulineRay45@owlmail.com', 'ud0sS4N1Lt4.o', '9/66 Melvine St, North Sylhut', '2020-05-23', '+61 491 576 155'),
(500166, 'Nishita Barua', 'hello@gm.com', 'ud0sS4N1Lt4.o', '3/99 Salem St, Tehrin', '2020-05-15', '+61 491 570 158');

-- --------------------------------------------------------

--
-- Table structure for table `tutorial`
--

CREATE TABLE IF NOT EXISTS `tutorial` (
  `tutorial_id` int(11) NOT NULL,
  `unit_code` varchar(11) NOT NULL,
  `unit_name` varchar(128) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `tutor_name` varchar(128) NOT NULL,
  `tutorial_time` varchar(20) NOT NULL,
  `location` varchar(128) NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutorial`
--

INSERT INTO `tutorial` (`tutorial_id`, `unit_code`, `unit_name`, `tutor_id`, `tutor_name`, `tutorial_time`, `location`, `capacity`) VALUES
(6, 'KGS355', 'Theory of Computation', 100112, 'Ermina Zore', 'Mon 9:00', 'Rivendell', 10),
(9, 'KGS324', 'Operating Systems', 100112, 'Ermina Zore', 'Tue 15:00', 'Pandora', 10),
(10, 'KGS351', 'Artificial Intelligence', 0, '', 'Wed 14:00', 'Neverland', 15),
(11, 'KGS333', 'System Design', 100114, 'Claudia Blaga', 'Wed 14:30', 'Pandora', 10),
(12, 'KGS334', 'Computer System Architecture', 0, '', 'Fri 10:30', 'Rivendell', 10),
(13, 'KGS111', 'System development', 0, '', 'Wed 12:30', 'Rivendell', 2),
(14, 'KGS502', 'NeuroLink', 100113, 'Madeleine Egnell', 'Wed 9:30', 'Rivendell', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tutorialallocation`
--

CREATE TABLE IF NOT EXISTS `tutorialallocation` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `tutorial_id` int(11) NOT NULL,
  `unit_code` varchar(128) NOT NULL,
  `unit_name` varchar(128) NOT NULL,
  `tutorial_time` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutorialallocation`
--

INSERT INTO `tutorialallocation` (`id`, `student_id`, `tutorial_id`, `unit_code`, `unit_name`, `tutorial_time`) VALUES
(8, 500111, 6, 'KGS355', 'Theory of Computation', 'Mon 9:00'),
(10, 500111, 9, 'KGS324', 'Operating Systems', 'Tue 15:00'),
(11, 500166, 13, 'KGS111', 'System development', 'Wed 12:30'),
(12, 500116, 13, 'KGS111', 'System development', 'Wed 12:30');

-- --------------------------------------------------------

--
-- Table structure for table `unitdetail`
--

CREATE TABLE IF NOT EXISTS `unitdetail` (
  `id` int(11) NOT NULL,
  `unit_code` varchar(128) NOT NULL,
  `unit_name` varchar(128) NOT NULL,
  `UC_id` int(11) DEFAULT NULL,
  `unit_coordinator` varchar(128) DEFAULT NULL,
  `lecturer_id` int(11) DEFAULT NULL,
  `lecturer` varchar(128) DEFAULT NULL,
  `lecture_time` varchar(20) DEFAULT NULL,
  `description` varchar(200) NOT NULL,
  `semester` varchar(128) NOT NULL,
  `campus` varchar(128) NOT NULL,
  `prerequisite` varchar(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unitdetail`
--

INSERT INTO `unitdetail` (`id`, `unit_code`, `unit_name`, `UC_id`, `unit_coordinator`, `lecturer_id`, `lecturer`, `lecture_time`, `description`, `semester`, `campus`, `prerequisite`) VALUES
(1, 'KGS333', 'System Design', NULL, NULL, 100112, 'Ermina Zore', 'Tue 10:30', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 'Semester 1', 'Rivendell', 'KGS334'),
(2, 'KGS324', 'Operating Systems', 100114, 'Claudia Blaga', NULL, '', 'Tue 9:30', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 'Semester 2', 'Rivendell', 'KGS355'),
(3, 'KGS351', 'Artificial Intelligence', 100112, 'Ermina Zore', NULL, NULL, 'Mon 15:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 'Spring School', 'Pandora', NULL),
(4, 'KGS334', 'Computer System Architecture\r\n', NULL, NULL, NULL, NULL, 'Tue 12:30', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 'Winter School', 'Neverland', NULL),
(5, 'KGS355', 'Theory of Computation', NULL, NULL, NULL, NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 'Spring School', 'Neverland', NULL),
(9, 'KGS111', 'System development', NULL, NULL, NULL, NULL, NULL, 'fdssafsdfish', 'Semester 1', 'Pandora', NULL),
(10, 'KGS502', 'Neurolink', NULL, NULL, NULL, NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 'Winter School', 'Rivendell', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `question_one` varchar(128) DEFAULT NULL,
  `question_two` varchar(128) DEFAULT NULL,
  `role` int(10) NOT NULL,
  `token` varchar(128) NOT NULL,
  `token_expire` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `question_one`, `question_two`, `role`, `token`, `token_expire`) VALUES
(100, 'helene@owlmail.com', 'ud0sS4N1Lt4.o', 'Summerville Technical School', 'baklava', 1, '', ''),
(100111, 'ilonar87@owlmail.com', 'ud0sS4N1Lt4.o', 'Blue River College', 'bombe', 4, '', ''),
(100112, 'ermz@owlmail.com', 'ud0sS4N1Lt4.o', 'Heritage School for Girls', 'butterscotch', 3, '', ''),
(100113, 'maddie71@owlmail.com', 'ud0sS4N1Lt4.o', 'Evergreen Middle School', 'apple pie', 4, '', ''),
(100114, 'blaga78@owlmail.com', 'ud0sS4N1Lt4.o', 'Independence Conservatory', 'frozen yogurt', 3, '', ''),
(100115, 'devi79@owlmail.com', 'ud0sS4N1Lt4.o', 'Maple Leaf Elementary', 'eclair', 4, '', ''),
(100116, 'elinar99@owlmail.com', 'ud0sS4N1Lt4.o', 'Scottish Summer School', 'Chocolate Icecream', 4, '', ''),
(500111, 'shila84@owlmail.com', 'ud0sS4N1Lt4.o', 'Stonewall High', 'dumplings', 5, '', ''),
(500112, 'prachi360@owlmail.com', 'ud0sS4N1Lt4.o', 'Seal Gulch School', 'gelato', 5, '', ''),
(500113, 'viki990@owlmail.com', 'ud0sS4N1Lt4.o', 'Skyline Charter School', 'jellyroll', 5, '', ''),
(500114, 'moni55@owlmail.com', 'ud0sS4N1Lt4.o', 'Forest Lake High School', 'Danish pastry', 5, '', ''),
(500115, 'syln@owlmail.com', 'ud0sS4N1Lt4.o', 'Da Vinci School', 'icing', 5, '', ''),
(500116, 'paulineRay45@owlmail.com', 'ud0sS4N1Lt4.o', 'River Green School', 'Sweets', 5, '', ''),
(500166, 'hello@gm.com', 'ud0sS4N1Lt4.o', 'Forest Lake High School', 'apple pie', 5, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academicstaffs`
--
ALTER TABLE `academicstaffs`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stafflist`
--
ALTER TABLE `stafflist`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `tutorial`
--
ALTER TABLE `tutorial`
  ADD PRIMARY KEY (`tutorial_id`);

--
-- Indexes for table `tutorialallocation`
--
ALTER TABLE `tutorialallocation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unitdetail`
--
ALTER TABLE `unitdetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=500167;
--
-- AUTO_INCREMENT for table `tutorial`
--
ALTER TABLE `tutorial`
  MODIFY `tutorial_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tutorialallocation`
--
ALTER TABLE `tutorialallocation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `unitdetail`
--
ALTER TABLE `unitdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

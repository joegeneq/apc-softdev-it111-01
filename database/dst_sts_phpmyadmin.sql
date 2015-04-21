-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2015 at 12:03 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dst_sts`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(11) NOT NULL,
  `user_type` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_type`, `username`, `first_name`, `last_name`, `password`, `auth_key`, `password_reset_token`) VALUES
(1, 'admin', 'bltzkrg01', 'Brandon', 'Cruz', 'nash619', '5vlxJWNAKnNYlbYQCaOlEI-p8QLFVLus', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `adviser`
--

CREATE TABLE IF NOT EXISTS `adviser` (
`id` int(11) NOT NULL,
  `adviser_full_name` varchar(255) DEFAULT NULL,
  `adviser_gender` enum('Male','Female') DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adviser`
--

INSERT INTO `adviser` (`id`, `adviser_full_name`, `adviser_gender`, `user_id`, `section_id`) VALUES
(4, 'Carl Samson', 'Male', 11, 1),
(5, 'Carl Samson1', 'Male', 12, 2);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
`id` int(11) NOT NULL,
  `attendance_date` date NOT NULL,
  `attendance_status` enum('Present','Absent','N/A') NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `attendance_date`, `attendance_status`, `student_id`) VALUES
(1, '2015-04-17', 'Present', 5),
(2, '2015-04-18', 'Absent', 6),
(3, '2015-04-19', 'Absent', 5),
(4, '2015-04-17', 'Absent', 6),
(5, '2015-04-17', 'Present', 7);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
`id` int(11) NOT NULL,
  `event_title` varchar(45) NOT NULL,
  `event_date` date DEFAULT NULL,
  `event_host` varchar(45) DEFAULT NULL,
  `event_venue` varchar(255) DEFAULT NULL,
  `event_description` text,
  `event_status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `event_title`, `event_date`, `event_host`, `event_venue`, `event_description`, `event_status`) VALUES
(1, 'Title1', '2015-04-17', 'Host1', 'Venue1', 'asdasda', 'Active'),
(2, 'Graduation', '2015-05-25', 'APC', 'SMX Convention Center', 'Happy happy na!', 'Active'),
(3, 'Carl''s Birthday Next Year', '2016-04-16', 'Carl Samson', 'Vikings', 'ILONG', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE IF NOT EXISTS `grade` (
`id` int(11) NOT NULL,
  `grade_type` varchar(45) DEFAULT NULL,
  `grade_mark` varchar(45) DEFAULT NULL,
  `grade_date_added` timestamp NULL DEFAULT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE IF NOT EXISTS `parents` (
`id` int(11) NOT NULL,
  `parents_full_name` varchar(255) NOT NULL,
  `parents_contact_number` varchar(45) DEFAULT NULL,
  `parents_address` varchar(255) DEFAULT NULL,
  `student_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`id`, `parents_full_name`, `parents_contact_number`, `parents_address`, `student_id`, `user_id`) VALUES
(4, 'Nickolo Gonzales', '551-1591', 'Pasay City', 5, 10),
(5, 'Nickolo Gonzales1', '834-7296', 'Morayta', 6, 13),
(6, 'Nickolo Gonzales1', '123123', 'FTI', 7, 13);

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE IF NOT EXISTS `section` (
`id` int(11) NOT NULL,
  `section_name` varchar(45) NOT NULL,
  `section_level` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `section_name`, `section_level`) VALUES
(1, 'St. Titus', 'Grade 3'),
(2, 'St. Julia', 'Grade 5');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
`id` int(11) NOT NULL,
  `student_id_number` varchar(45) NOT NULL,
  `student_full_name` varchar(45) NOT NULL,
  `student_gender` enum('Male','Female') NOT NULL,
  `student_birthdate` date DEFAULT NULL,
  `student_address` varchar(255) DEFAULT NULL,
  `student_admission_date` date NOT NULL,
  `student_level` varchar(45) NOT NULL,
  `student_status` enum('Enrolled','LOA - Leave of Absence','AWOL - Absence Without Leave') NOT NULL,
  `section_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `student_id_number`, `student_full_name`, `student_gender`, `student_birthdate`, `student_address`, `student_admission_date`, `student_level`, `student_status`, `section_id`) VALUES
(5, '2011-100324', 'Brandon Cruz', 'Male', '2015-04-22', 'Pasay City', '2015-04-22', 'Grade 6', 'Enrolled', 1),
(6, '2011-100325', 'Brandon Cruz1', 'Female', '2015-04-14', 'Morayta', '2015-03-30', 'Grade 5', 'LOA - Leave of Absence', 2),
(7, '2011-100326', 'Josh Dimapilis', 'Male', '2015-04-22', 'FTI', '2015-04-15', 'Grade 6', 'Enrolled', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
`id` int(11) NOT NULL,
  `subject_code` varchar(45) NOT NULL,
  `subject_name` varchar(45) NOT NULL,
  `section_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_type` enum('Parent','Adviser') COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `user_type`, `full_name`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(10, 'ndgonzales', 'Parent', 'Nickolo Gonzales', 'vyh10MmZP1mFvv78EC8Rlh1OQAGN3RnN', '$2y$13$VJrOyUP8vdWj3Qv.zt42ru6/iU71fg73nrtnwRP/7UIjbpsZtXjm.', NULL, 'nickologonzales@gmail.com', 10, 1429237955, 1429237955),
(11, 'cbsamson', 'Adviser', 'Carl Samson', 'w3gto4tmr-JH3Zwniq-5S4awiP13lXuo', '$2y$13$R53vvuIo1HTCXTBJoC0ZSeAsY8qV2f1swGcgsChwNtvlKAn25N23W', NULL, 'cbsamson16@gmail.com', 10, 1429237967, 1429237967),
(12, 'cbsamson1', 'Adviser', 'Carl Samson1', '6FoGXFSK-WGAw-z73sZYjCfHYV25EkFx', '$2y$13$iuYmv5e5aMDSvYO57mia7.7WkRiMky5AdhdUZ4fKJ5sfS7CnUSMKm', NULL, 'cbsamson1@gmail.com', 10, 1429240476, 1429240476),
(13, 'ndgonzales1', 'Parent', 'Nickolo Gonzales1', 'NfH-zgkloXjr47cjjnYEjFVmVNueZEQ0', '$2y$13$zT.B9nSVVEtzX.ZFfxAghuiJyDxfDGerlgvcgIjJakAcDJ8I8FujS', NULL, 'nickologonzales1@gmail.com', 10, 1429240695, 1429240695);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adviser`
--
ALTER TABLE `adviser`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_adviser_user1_idx` (`user_id`), ADD KEY `fk_adviser_section1_idx` (`section_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_attendance_student1_idx` (`student_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_grade_subject1_idx` (`subject_id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_parents_student1_idx` (`student_id`), ADD KEY `fk_parents_user1_idx` (`user_id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_student_section1_idx` (`section_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_subject_section1_idx` (`section_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `adviser`
--
ALTER TABLE `adviser`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `adviser`
--
ALTER TABLE `adviser`
ADD CONSTRAINT `fk_adviser_section1` FOREIGN KEY (`section_id`) REFERENCES `section` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_adviser_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
ADD CONSTRAINT `fk_attendance_student1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `grade`
--
ALTER TABLE `grade`
ADD CONSTRAINT `fk_grade_subject1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `parents`
--
ALTER TABLE `parents`
ADD CONSTRAINT `fk_parents_student1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_parents_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
ADD CONSTRAINT `fk_student_section1` FOREIGN KEY (`section_id`) REFERENCES `section` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
ADD CONSTRAINT `fk_subject_section1` FOREIGN KEY (`section_id`) REFERENCES `section` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

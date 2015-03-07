-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 07, 2015 at 11:23 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acounttype` varchar(45) NOT NULL,
  `accountusername` varchar(45) NOT NULL,
  `accountpassword` varchar(45) NOT NULL,
  `accountdateregistered` date NOT NULL,
  `accountstatus` varchar(45) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`instructor_id`,`admin_id`),
  KEY `fk_account_instructor1_idx` (`instructor_id`),
  KEY `fk_account_admin1_idx` (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `adminusername` varchar(45) DEFAULT NULL,
  `adminpassword` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assessment`
--

CREATE TABLE IF NOT EXISTS `assessment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assessmenttype` varchar(45) NOT NULL,
  `assessmentnumber` int(11) NOT NULL,
  `assessmentdate` date NOT NULL,
  `assessmentrating` double NOT NULL,
  `subject_id` int(11) NOT NULL,
  `subject_student_id` int(11) NOT NULL,
  `subject_instructor_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`subject_id`,`subject_student_id`,`subject_instructor_id`),
  KEY `fk_assessment_subject1_idx` (`subject_id`,`subject_student_id`,`subject_instructor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `assessment_has_grades`
--

CREATE TABLE IF NOT EXISTS `assessment_has_grades` (
  `assessment_id` int(11) NOT NULL,
  `assessment_subject_id` int(11) NOT NULL,
  `assessment_subject_student_id` int(11) NOT NULL,
  `assessment_subject_instructor_id` int(11) NOT NULL,
  `grades_id` int(11) NOT NULL,
  PRIMARY KEY (`assessment_id`,`assessment_subject_id`,`assessment_subject_student_id`,`assessment_subject_instructor_id`,`grades_id`),
  KEY `fk_assessment_has_grades_grades1_idx` (`grades_id`),
  KEY `fk_assessment_has_grades_assessment1_idx` (`assessment_id`,`assessment_subject_id`,`assessment_subject_student_id`,`assessment_subject_instructor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attendancedate` date DEFAULT NULL,
  `student_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`student_id`),
  KEY `fk_attendance_student1_idx` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL,
  `eventtitle` varchar(45) DEFAULT NULL,
  `eventdate` date DEFAULT NULL,
  `eventvenue` varchar(45) DEFAULT NULL,
  `eventdescription` varchar(45) DEFAULT NULL,
  `eventstatus` varchar(45) DEFAULT NULL,
  `admin_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`admin_id`),
  KEY `fk_event_admin1_idx` (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE IF NOT EXISTS `grades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grade` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE IF NOT EXISTS `instructor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `instructorfirstname` varchar(45) NOT NULL,
  `instructorlastname` varchar(45) NOT NULL,
  `instructoradmissiondate` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1425698313),
('m130524_201442_init', 1425698315);

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE IF NOT EXISTS `parents` (
  `id` int(11) NOT NULL,
  `parentfirstname` varchar(45) DEFAULT NULL,
  `parentlastname` varchar(45) DEFAULT NULL,
  `parentgender` varchar(45) DEFAULT NULL,
  `parentcontactnumber` varchar(45) DEFAULT NULL,
  `parentaddress` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studentidnumber` varchar(45) DEFAULT NULL,
  `studentfirstname` varchar(45) DEFAULT NULL,
  `studentlastname` varchar(45) DEFAULT NULL,
  `studentgender` varchar(45) DEFAULT NULL,
  `studentbirthdate` date DEFAULT NULL,
  `studentaddress` varchar(45) DEFAULT NULL,
  `studentadmissiondate` date DEFAULT NULL,
  `stuentlevel` int(11) DEFAULT NULL,
  `studentstatus` varchar(45) DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_student_parent_idx` (`parent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subjectcode` varchar(45) DEFAULT NULL,
  `subjectname` varchar(45) DEFAULT NULL,
  `student_id` int(11) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`student_id`,`instructor_id`),
  KEY `fk_subject_student1_idx` (`student_id`),
  KEY `fk_subject_instructor1_idx` (`instructor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'bqcruz', 'J-nue5ITiIkGlq9sh8lJZhIx70O2OUwY', '$2y$13$S/bJYkM8A1EydpVbTQ2PDu7ZudabTRizkJvvCwrc8G4SiC8kE8w1i', NULL, 'bltzkrg18@gmail.com', 10, 1425698463, 1425698463);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `fk_account_admin1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_account_instructor1` FOREIGN KEY (`instructor_id`) REFERENCES `instructor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `assessment`
--
ALTER TABLE `assessment`
  ADD CONSTRAINT `fk_assessment_subject1` FOREIGN KEY (`subject_id`, `subject_student_id`, `subject_instructor_id`) REFERENCES `subject` (`id`, `student_id`, `instructor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `assessment_has_grades`
--
ALTER TABLE `assessment_has_grades`
  ADD CONSTRAINT `fk_assessment_has_grades_assessment1` FOREIGN KEY (`assessment_id`, `assessment_subject_id`, `assessment_subject_student_id`, `assessment_subject_instructor_id`) REFERENCES `assessment` (`id`, `subject_id`, `subject_student_id`, `subject_instructor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_assessment_has_grades_grades1` FOREIGN KEY (`grades_id`) REFERENCES `grades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `fk_attendance_student1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `fk_event_admin1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_student_parent` FOREIGN KEY (`parent_id`) REFERENCES `parents` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `fk_subject_instructor1` FOREIGN KEY (`instructor_id`) REFERENCES `instructor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_subject_student1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

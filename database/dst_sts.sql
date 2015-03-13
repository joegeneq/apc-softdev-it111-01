-- MySQL Script generated by MySQL Workbench
-- 03/13/15 20:20:51
-- Model: New Model    Version: 1.0
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema dst_sts
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `dst_sts` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `dst_sts` ;

-- -----------------------------------------------------
-- Table `dst_sts`.`parents`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dst_sts`.`parents` (
  `id` INT NOT NULL,
  `parentfirstname` VARCHAR(45) NULL,
  `parentlastname` VARCHAR(45) NULL,
  `parentgender` VARCHAR(45) NULL,
  `parentcontactnumber` VARCHAR(45) NULL,
  `parentaddress` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dst_sts`.`student`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dst_sts`.`student` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `studentidnumber` VARCHAR(45) NULL,
  `studentfirstname` VARCHAR(45) NULL,
  `studentlastname` VARCHAR(45) NULL,
  `studentgender` VARCHAR(45) NULL,
  `studentbirthdate` DATE NULL,
  `studentaddress` VARCHAR(45) NULL,
  `studentadmissiondate` DATE NULL,
  `stuentlevel` INT NULL,
  `studentstatus` VARCHAR(45) NULL,
  `parent_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_student_parent_idx` (`parent_id` ASC),
  CONSTRAINT `fk_student_parent`
    FOREIGN KEY (`parent_id`)
    REFERENCES `dst_sts`.`parents` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dst_sts`.`attendance`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dst_sts`.`attendance` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `attendancedate` DATE NULL,
  `attendancestatus` VARCHAR(45) NULL,
  `student_id` INT NOT NULL,
  PRIMARY KEY (`id`, `student_id`),
  INDEX `fk_attendance_student1_idx` (`student_id` ASC),
  CONSTRAINT `fk_attendance_student1`
    FOREIGN KEY (`student_id`)
    REFERENCES `dst_sts`.`student` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dst_sts`.`instructor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dst_sts`.`instructor` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `instructorfirstname` VARCHAR(45) NOT NULL,
  `instructorlastname` VARCHAR(45) NOT NULL,
  `instructoradmissiondate` DATE NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dst_sts`.`subject`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dst_sts`.`subject` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `subjectcode` VARCHAR(45) NULL,
  `subjectname` VARCHAR(45) NULL,
  `student_id` INT NOT NULL,
  `instructor_id` INT NOT NULL,
  PRIMARY KEY (`id`, `student_id`, `instructor_id`),
  INDEX `fk_subject_student1_idx` (`student_id` ASC),
  INDEX `fk_subject_instructor1_idx` (`instructor_id` ASC),
  CONSTRAINT `fk_subject_student1`
    FOREIGN KEY (`student_id`)
    REFERENCES `dst_sts`.`student` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_subject_instructor1`
    FOREIGN KEY (`instructor_id`)
    REFERENCES `dst_sts`.`instructor` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dst_sts`.`admin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dst_sts`.`admin` (
  `id` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dst_sts`.`event`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dst_sts`.`event` (
  `id` INT NOT NULL,
  `eventtitle` VARCHAR(45) NULL,
  `eventdate` DATE NULL,
  `eventvenue` VARCHAR(45) NULL,
  `eventdescription` VARCHAR(45) NULL,
  `eventstatus` VARCHAR(45) NULL,
  `admin_id` INT NOT NULL,
  PRIMARY KEY (`id`, `admin_id`),
  INDEX `fk_event_admin1_idx` (`admin_id` ASC),
  CONSTRAINT `fk_event_admin1`
    FOREIGN KEY (`admin_id`)
    REFERENCES `dst_sts`.`admin` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dst_sts`.`account`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dst_sts`.`account` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `acounttype` VARCHAR(45) NOT NULL,
  `accountusername` VARCHAR(45) NOT NULL,
  `accountpassword` VARCHAR(45) NOT NULL,
  `accountdateregistered` DATE NOT NULL,
  `accountstatus` VARCHAR(45) NOT NULL,
  `instructor_id` INT NOT NULL,
  `admin_id` INT NOT NULL,
  `parents_id` INT NOT NULL,
  PRIMARY KEY (`id`, `instructor_id`, `admin_id`, `parents_id`),
  INDEX `fk_account_instructor1_idx` (`instructor_id` ASC),
  INDEX `fk_account_admin1_idx` (`admin_id` ASC),
  INDEX `fk_account_parents1_idx` (`parents_id` ASC),
  CONSTRAINT `fk_account_instructor1`
    FOREIGN KEY (`instructor_id`)
    REFERENCES `dst_sts`.`instructor` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_account_admin1`
    FOREIGN KEY (`admin_id`)
    REFERENCES `dst_sts`.`admin` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_account_parents1`
    FOREIGN KEY (`parents_id`)
    REFERENCES `dst_sts`.`parents` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


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

-- -----------------------------------------------------
-- Table `dst_sts`.`assessment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dst_sts`.`assessment` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `assessmenttype` VARCHAR(45) NOT NULL,
  `assessmentnumber` INT NOT NULL,
  `assessmentdate` DATE NOT NULL,
  `assessmentrating` DOUBLE NOT NULL,
  `subject_id` INT NOT NULL,
  `subject_student_id` INT NOT NULL,
  `subject_instructor_id` INT NOT NULL,
  PRIMARY KEY (`id`, `subject_id`, `subject_student_id`, `subject_instructor_id`),
  INDEX `fk_assessment_subject1_idx` (`subject_id` ASC, `subject_student_id` ASC, `subject_instructor_id` ASC),
  CONSTRAINT `fk_assessment_subject1`
    FOREIGN KEY (`subject_id` , `subject_student_id` , `subject_instructor_id`)
    REFERENCES `dst_sts`.`subject` (`id` , `student_id` , `instructor_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dst_sts`.`grades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dst_sts`.`grades` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `grade` DOUBLE NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dst_sts`.`assessment_has_grades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dst_sts`.`assessment_has_grades` (
  `assessment_id` INT NOT NULL,
  `assessment_subject_id` INT NOT NULL,
  `assessment_subject_student_id` INT NOT NULL,
  `assessment_subject_instructor_id` INT NOT NULL,
  `grades_id` INT NOT NULL,
  PRIMARY KEY (`assessment_id`, `assessment_subject_id`, `assessment_subject_student_id`, `assessment_subject_instructor_id`, `grades_id`),
  INDEX `fk_assessment_has_grades_grades1_idx` (`grades_id` ASC),
  INDEX `fk_assessment_has_grades_assessment1_idx` (`assessment_id` ASC, `assessment_subject_id` ASC, `assessment_subject_student_id` ASC, `assessment_subject_instructor_id` ASC),
  CONSTRAINT `fk_assessment_has_grades_assessment1`
    FOREIGN KEY (`assessment_id` , `assessment_subject_id` , `assessment_subject_student_id` , `assessment_subject_instructor_id`)
    REFERENCES `dst_sts`.`assessment` (`id` , `subject_id` , `subject_student_id` , `subject_instructor_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_assessment_has_grades_grades1`
    FOREIGN KEY (`grades_id`)
    REFERENCES `dst_sts`.`grades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

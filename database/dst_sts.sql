-- MySQL Script generated by MySQL Workbench
-- 04/13/15 13:49:42
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
-- Table `dst_sts`.`admin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dst_sts`.`admin` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_type` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `username` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `first_name` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `last_name` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `password` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `auth_key` VARCHAR(32) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `password_reset_token` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `dst_sts`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dst_sts`.`user` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `user_type` ENUM('Parent','Adviser') CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `full_name` VARCHAR(255) NOT NULL,
  `auth_key` VARCHAR(32) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `password_hash` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `password_reset_token` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `email` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `status` SMALLINT(6) NOT NULL DEFAULT '10',
  `created_at` INT(11) NOT NULL,
  `updated_at` INT(11) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `dst_sts`.`section`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dst_sts`.`section` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `section_name` VARCHAR(45) NOT NULL,
  `section_level` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `dst_sts`.`adviser`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dst_sts`.`adviser` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `adviser_full_name` VARCHAR(255) NULL,
  `adviser_gender` ENUM('Male','Female') NULL DEFAULT NULL,
  `user_id` INT(11) NOT NULL,
  `section_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_adviser_user1_idx` (`user_id` ASC),
  INDEX `fk_adviser_section1_idx` (`section_id` ASC),
  CONSTRAINT `fk_adviser_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `dst_sts`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_adviser_section1`
    FOREIGN KEY (`section_id`)
    REFERENCES `dst_sts`.`section` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `dst_sts`.`student`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dst_sts`.`student` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `student_id_number` VARCHAR(45) NOT NULL,
  `student_full_name` VARCHAR(45) NOT NULL,
  `student_gender` ENUM('Male','Female') NOT NULL,
  `student_birthdate` DATE NULL,
  `student_address` VARCHAR(255) NULL,
  `student_admission_date` DATE NOT NULL,
  `student_level` VARCHAR(45) NOT NULL,
  `student_status` ENUM('Enrolled','LOA - Leave of Absence','AWOL - Absence Without Leave') NOT NULL,
  `section_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_student_section1_idx` (`section_id` ASC),
  CONSTRAINT `fk_student_section1`
    FOREIGN KEY (`section_id`)
    REFERENCES `dst_sts`.`section` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `dst_sts`.`attendance`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dst_sts`.`attendance` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `attendance_date` DATE NOT NULL,
  `attendance_status` ENUM('Present','Absent','N/A') NOT NULL,
  `student_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_attendance_student1_idx` (`student_id` ASC),
  CONSTRAINT `fk_attendance_student1`
    FOREIGN KEY (`student_id`)
    REFERENCES `dst_sts`.`student` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `dst_sts`.`event`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dst_sts`.`event` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `event_title` VARCHAR(45) NOT NULL,
  `event_date` DATE NULL DEFAULT NULL,
  `event_host` VARCHAR(45) NULL,
  `event_venue` VARCHAR(255) NULL DEFAULT NULL,
  `event_description` TEXT NULL DEFAULT NULL,
  `event_status` ENUM('Active','Inactive') NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `dst_sts`.`parents`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dst_sts`.`parents` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `parents_full_name` VARCHAR(255) NOT NULL,
  `parents_contact_number` VARCHAR(45) NULL DEFAULT NULL,
  `parents_address` VARCHAR(255) NULL DEFAULT NULL,
  `student_id` INT(11) NOT NULL,
  `user_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_parents_student1_idx` (`student_id` ASC),
  INDEX `fk_parents_user1_idx` (`user_id` ASC),
  CONSTRAINT `fk_parents_student1`
    FOREIGN KEY (`student_id`)
    REFERENCES `dst_sts`.`student` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_parents_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `dst_sts`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `dst_sts`.`subject`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dst_sts`.`subject` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `subject_code` VARCHAR(45) NOT NULL,
  `subject_name` VARCHAR(45) NOT NULL,
  `section_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_subject_section1_idx` (`section_id` ASC),
  CONSTRAINT `fk_subject_section1`
    FOREIGN KEY (`section_id`)
    REFERENCES `dst_sts`.`section` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `dst_sts`.`grade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dst_sts`.`grade` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `grade_type` VARCHAR(45) NULL,
  `grade_mark` VARCHAR(45) NULL,
  `grade_date_added` TIMESTAMP NULL,
  `subject_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_grade_subject1_idx` (`subject_id` ASC),
  CONSTRAINT `fk_grade_subject1`
    FOREIGN KEY (`subject_id`)
    REFERENCES `dst_sts`.`subject` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

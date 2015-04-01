-- MySQL Script generated by MySQL Workbench
-- 03/31/15 05:30:21
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
  `id` INT(11) NOT NULL,
  `username` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `user_type` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `first_name` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `last_name` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `auth_key` VARCHAR(32) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `password_hash` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `password_reset_token` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `email` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `status` SMALLINT(6) NOT NULL DEFAULT '10',
  `created_at` INT(11) NOT NULL,
  `updated_at` INT(11) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `dst_sts`.`auth_rule`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dst_sts`.`auth_rule` (
  `name` VARCHAR(64) NOT NULL,
  `data` TEXT NULL DEFAULT NULL,
  `created_at` INT(11) NULL DEFAULT NULL,
  `updated_at` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`name`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `dst_sts`.`auth_item`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dst_sts`.`auth_item` (
  `name` VARCHAR(64) NOT NULL,
  `type` INT(11) NOT NULL,
  `description` TEXT NULL DEFAULT NULL,
  `rule_name` VARCHAR(64) NULL DEFAULT NULL,
  `data` TEXT NULL DEFAULT NULL,
  `created_at` INT(11) NULL DEFAULT NULL,
  `updated_at` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`name`),
  INDEX `rule_name` (`rule_name` ASC),
  INDEX `type` (`type` ASC),
  CONSTRAINT `auth_item_ibfk_1`
    FOREIGN KEY (`rule_name`)
    REFERENCES `dst_sts`.`auth_rule` (`name`)
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `dst_sts`.`auth_assignment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dst_sts`.`auth_assignment` (
  `item_name` VARCHAR(64) NOT NULL,
  `user_id` VARCHAR(64) NOT NULL,
  `created_at` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`item_name`, `user_id`),
  CONSTRAINT `auth_assignment_ibfk_1`
    FOREIGN KEY (`item_name`)
    REFERENCES `dst_sts`.`auth_item` (`name`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `dst_sts`.`auth_item_child`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dst_sts`.`auth_item_child` (
  `parent` VARCHAR(64) NOT NULL,
  `child` VARCHAR(64) NOT NULL,
  PRIMARY KEY (`parent`, `child`),
  INDEX `child` (`child` ASC),
  CONSTRAINT `auth_item_child_ibfk_1`
    FOREIGN KEY (`parent`)
    REFERENCES `dst_sts`.`auth_item` (`name`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2`
    FOREIGN KEY (`child`)
    REFERENCES `dst_sts`.`auth_item` (`name`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `dst_sts`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dst_sts`.`user` (
  `id` INT(11) NOT NULL,
  `username` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `user_type` ENUM('parent','instructor') CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
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
-- Table `dst_sts`.`parents`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dst_sts`.`parents` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `parents_first_name` VARCHAR(45) NOT NULL,
  `parents_last_name` VARCHAR(45) NOT NULL,
  `parents_contact_number` VARCHAR(45) NULL,
  `parents_address` VARCHAR(255) NULL,
  `user_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_parent_user1_idx` (`user_id` ASC),
  CONSTRAINT `fk_parent_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `dst_sts`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dst_sts`.`student`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dst_sts`.`student` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `student_id_number` VARCHAR(45) NOT NULL,
  `student_first_name` VARCHAR(45) NOT NULL,
  `student_last_name` VARCHAR(45) NOT NULL,
  `student_gender` ENUM('male','female') NOT NULL,
  `student_birthdate` DATE NULL,
  `student_address` VARCHAR(255) NULL,
  `student_admission_date` DATE NOT NULL,
  `student_level` INT NOT NULL,
  `student_status` ENUM('enrolled','unenrolled') NOT NULL,
  `parent_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_student_parent1_idx` (`parent_id` ASC),
  CONSTRAINT `fk_student_parent1`
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
  `attendance_date` DATE NOT NULL,
  `attendance_status` ENUM('present','absent','N/A') NOT NULL,
  `student_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_attendance_student1_idx` (`student_id` ASC),
  CONSTRAINT `fk_attendance_student1`
    FOREIGN KEY (`student_id`)
    REFERENCES `dst_sts`.`student` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dst_sts`.`event`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dst_sts`.`event` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `event_title` VARCHAR(45) NOT NULL,
  `event_date` DATE NULL,
  `event_venue` VARCHAR(255) NULL,
  `event_description` TEXT NULL,
  `event_status` ENUM('active','inactive') NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dst_sts`.`instructor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dst_sts`.`instructor` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `instructor_first_name` VARCHAR(45) NOT NULL,
  `instructor_last_name` VARCHAR(45) NOT NULL,
  `instructor_gender` ENUM('male','female') NULL,
  `instructor_admission_date` DATE NULL,
  `user_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_instructor_user1_idx` (`user_id` ASC),
  CONSTRAINT `fk_instructor_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `dst_sts`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dst_sts`.`subject`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dst_sts`.`subject` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `subject_code` VARCHAR(45) NOT NULL,
  `subject_name` VARCHAR(45) NOT NULL,
  `instructor_id` INT NOT NULL,
  `student_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_subject_instructor1_idx` (`instructor_id` ASC),
  INDEX `fk_subject_student1_idx` (`student_id` ASC),
  CONSTRAINT `fk_subject_instructor1`
    FOREIGN KEY (`instructor_id`)
    REFERENCES `dst_sts`.`instructor` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_subject_student1`
    FOREIGN KEY (`student_id`)
    REFERENCES `dst_sts`.`student` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dst_sts`.`instructor_has_subject`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dst_sts`.`instructor_has_subject` (
  `instructor_id` INT NOT NULL,
  `subject_id` INT NOT NULL,
  PRIMARY KEY (`instructor_id`, `subject_id`),
  INDEX `fk_instructor_has_subject_subject1_idx` (`subject_id` ASC),
  INDEX `fk_instructor_has_subject_instructor1_idx` (`instructor_id` ASC),
  CONSTRAINT `fk_instructor_has_subject_instructor1`
    FOREIGN KEY (`instructor_id`)
    REFERENCES `dst_sts`.`instructor` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_instructor_has_subject_subject1`
    FOREIGN KEY (`subject_id`)
    REFERENCES `dst_sts`.`subject` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dst_sts`.`student_has_subject`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dst_sts`.`student_has_subject` (
  `student_id` INT NOT NULL,
  `subject_id` INT NOT NULL,
  PRIMARY KEY (`student_id`, `subject_id`),
  INDEX `fk_student_has_subject_subject1_idx` (`subject_id` ASC),
  INDEX `fk_student_has_subject_student1_idx` (`student_id` ASC),
  CONSTRAINT `fk_student_has_subject_student1`
    FOREIGN KEY (`student_id`)
    REFERENCES `dst_sts`.`student` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_student_has_subject_subject1`
    FOREIGN KEY (`subject_id`)
    REFERENCES `dst_sts`.`subject` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `dst_sts` ;

-- -----------------------------------------------------
-- Placeholder table for view `dst_sts`.`view1`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dst_sts`.`view1` (`id` INT);

-- -----------------------------------------------------
-- View `dst_sts`.`view1`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dst_sts`.`view1`;
USE `dst_sts`;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
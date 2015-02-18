-- MySQL Script generated by MySQL Workbench
-- 02/18/15 09:57:36
-- Model: New Model    Version: 1.0
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
-- -----------------------------------------------------
-- Schema new_schema1
-- -----------------------------------------------------
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`region`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`region` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `region_code` VARCHAR(32) NULL,
  `region_description` VARCHAR(32) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`province`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`province` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `province_code` VARCHAR(32) NULL,
  `province_description` VARCHAR(32) NULL,
  `region_id` INT NULL,
  `region_id1` INT NOT NULL,
  PRIMARY KEY (`id`, `region_id1`),
  INDEX `fk_province_region_idx` (`region_id1` ASC),
  CONSTRAINT `fk_province_region`
    FOREIGN KEY (`region_id1`)
    REFERENCES `mydb`.`region` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`city`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`city` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `city_code` VARCHAR(32) NULL,
  `city_description` VARCHAR(32) NULL,
  `province_id` INT NULL,
  `province_id1` INT NOT NULL,
  `province_region_id1` INT NOT NULL,
  PRIMARY KEY (`id`, `province_id1`, `province_region_id1`),
  INDEX `fk_city_province1_idx` (`province_id1` ASC, `province_region_id1` ASC),
  CONSTRAINT `fk_city_province1`
    FOREIGN KEY (`province_id1` , `province_region_id1`)
    REFERENCES `mydb`.`province` (`id` , `region_id1`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

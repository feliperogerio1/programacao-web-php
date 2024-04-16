-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `mydb`;
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8;
USE `mydb`;

-- -----------------------------------------------------
-- Table `mydb`.`subject`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`subject` (
  `idsubject` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `datep1` DATE NOT NULL,
  `datep2` DATE NOT NULL,
  PRIMARY KEY (`idsubject`)
) ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`content`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`content` (
  `idcontent` INT NOT NULL AUTO_INCREMENT,
  `subject_idsubject` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `weight` FLOAT NOT NULL,
  PRIMARY KEY (`idcontent`),
  CONSTRAINT `fk_content_subject`
    FOREIGN KEY (`subject_idsubject`)
    REFERENCES `mydb`.`subject` (`idsubject`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`session`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`session` (
  `idsession` INT NOT NULL AUTO_INCREMENT,
  `content_idcontent` INT NOT NULL,
  `subject_idsubject` INT NOT NULL,
  `date` DATE NOT NULL,
  PRIMARY KEY (`idsession`),
  CONSTRAINT `fk_session_content1`
    FOREIGN KEY (`content_idcontent`)
    REFERENCES `mydb`.`content` (`idcontent`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_session_subject1`
    FOREIGN KEY (`subject_idsubject`)
    REFERENCES `mydb`.`subject` (`idsubject`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tool`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tool` (
  `idtool` INT NOT NULL AUTO_INCREMENT,
  `subject_idsubject` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `description` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`idtool`),
  CONSTRAINT `fk_tool_subject1`
    FOREIGN KEY (`subject_idsubject`)
    REFERENCES `mydb`.`subject` (`idsubject`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
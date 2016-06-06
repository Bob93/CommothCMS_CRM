-- MySQL Script generated by MySQL Workbench
-- 06/06/16 12:33:05
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Menu`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Menu` (
  `MenuItemID` INT NOT NULL AUTO_INCREMENT,
  `MenuTitel` VARCHAR(45) NULL,
  `Active` TINYINT(2) NULL,
  PRIMARY KEY (`MenuItemID`),
  UNIQUE INDEX `MenuID_UNIQUE` (`MenuItemID` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Pages`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Pages` (
  `PageID` INT NOT NULL AUTO_INCREMENT,
  `Content` TEXT(255) NULL,
  `PageNumber` INT NULL,
  `MenuItemID` INT NULL,
  PRIMARY KEY (`PageID`),
  UNIQUE INDEX `PageID_UNIQUE` (`PageID` ASC),
  UNIQUE INDEX `PageNumber_UNIQUE` (`PageNumber` ASC),
  INDEX `MenuItemID_idx` (`MenuItemID` ASC),
  CONSTRAINT `MenuItemID`
    FOREIGN KEY (`MenuItemID`)
    REFERENCES `mydb`.`Menu` (`MenuItemID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Users` (
  `UserID` INT NOT NULL AUTO_INCREMENT,
  `FirstName` VARCHAR(430) NULL,
  `Insertion` VARCHAR(7) NULL,
  `Lastname` VARCHAR(30) NULL,
  `Username` VARCHAR(30) NULL,
  `Password` VARCHAR(30) NULL,
  `Phone` INT(10) NULL,
  `Adress` VARCHAR(30) NULL,
  `Country` VARCHAR(45) NULL,
  `Email` VARCHAR(45) NULL,
  `Restriction` TINYINT(2) NULL,
  `Active` TINYINT(2) NULL,
  `IP` INT(11) NULL,
  `DateSignedUp` DATETIME NULL,
  `LastLogin` DATETIME NULL,
  `LastLocation` GEOMETRY NULL,
  PRIMARY KEY (`UserID`),
  UNIQUE INDEX `UserID_UNIQUE` (`UserID` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Files`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Files` (
  `FileID` INT NOT NULL AUTO_INCREMENT,
  `FileExtension` VARCHAR(4) NULL,
  `FileName` VARCHAR(45) NULL,
  `FileSize` BIT(8) NULL,
  PRIMARY KEY (`FileID`),
  UNIQUE INDEX `FileID_UNIQUE` (`FileID` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Images`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Images` (
  `ImageID` INT NOT NULL AUTO_INCREMENT,
  `ImageExtension` VARCHAR(4) NULL,
  `ImageName` VARCHAR(45) NULL,
  `ImageSize` BIT(8) NULL,
  PRIMARY KEY (`ImageID`),
  UNIQUE INDEX `ImageID_UNIQUE` (`ImageID` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Company`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Company` (
  `CompanyID` INT NOT NULL AUTO_INCREMENT,
  `CompanyName` VARCHAR(45) NULL,
  `CompanyAddress` VARCHAR(45) NULL,
  `CompanyEmail` VARCHAR(45) NULL,
  `CompanyPhone` INT(10) NULL,
  `CompanyIP` INT(11) NULL,
  `DateSignedUp` DATETIME NULL,
  PRIMARY KEY (`CompanyID`),
  UNIQUE INDEX `CompanyID_UNIQUE` (`CompanyID` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Header`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Header` (
  `HeaderID` INT NOT NULL AUTO_INCREMENT,
  `HeaderContent` TEXT(255) NULL,
  PRIMARY KEY (`HeaderID`),
  UNIQUE INDEX `HeaderID_UNIQUE` (`HeaderID` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Footer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Footer` (
  `FooterID` INT NOT NULL AUTO_INCREMENT,
  `FooterContent` TEXT(255) NULL,
  PRIMARY KEY (`FooterID`),
  UNIQUE INDEX `FooterID_UNIQUE` (`FooterID` ASC))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

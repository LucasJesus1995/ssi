-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema infraestrutura
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema infraestrutura
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `infraestrutura` DEFAULT CHARACTER SET latin1 ;
USE `infraestrutura` ;

-- -----------------------------------------------------
-- Table `infraestrutura`.`regions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `infraestrutura`.`regions` (
  `id` INT(1) NOT NULL,
  `region` VARCHAR(6) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `region_UNIQUE` (`region` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `infraestrutura`.`user_status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `infraestrutura`.`user_status` (
  `id` INT(1) NOT NULL,
  `status` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `status_UNIQUE` (`status` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `infraestrutura`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `infraestrutura`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(10) NOT NULL,
  `password` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `local` VARCHAR(100) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `phone` VARCHAR(20) NOT NULL,
  `email` VARCHAR(100) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `contact` VARCHAR(20) NOT NULL,
  `address` VARCHAR(255) NULL,
  `idRegion` INT(1) NULL,
  `operatingHours` VARCHAR(100) NULL,
  `historicalBuilding` TINYINT(1) NULL,
  `dateCreated` DATETIME NOT NULL,
  `dateLastAccess` DATETIME NULL,
  `user_status_id` INT(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `users_email_unique` (`email` ASC),
  UNIQUE INDEX `dapartment_UNIQUE` (`local` ASC),
  INDEX `fk_regios_users_idx` (`idRegion` ASC),
  INDEX `fk_user_status_users_idx` (`user_status_id` ASC),
  CONSTRAINT `fk_regios_users`
    FOREIGN KEY (`idRegion`)
    REFERENCES `infraestrutura`.`regions` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_status_users`
    FOREIGN KEY (`user_status_id`)
    REFERENCES `infraestrutura`.`user_status` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `infraestrutura`.`administrators`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `infraestrutura`.`administrators` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(10) NOT NULL,
  `password` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `local` VARCHAR(100) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `phone` VARCHAR(20) NOT NULL,
  `email` VARCHAR(100) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `dateCreated` DATETIME NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `infraestrutura`.`administrators_users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `infraestrutura`.`administrators_users` (
  `users_id` INT NOT NULL,
  `admininstrators_id` INT NOT NULL,
  INDEX `fk_administrators_idx` (`admininstrators_id` ASC),
  INDEX `fk_users_idx` (`users_id` ASC),
  CONSTRAINT `fk_administrators`
    FOREIGN KEY (`admininstrators_id`)
    REFERENCES `infraestrutura`.`administrators` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users`
    FOREIGN KEY (`users_id`)
    REFERENCES `infraestrutura`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `infraestrutura`.`priorities`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `infraestrutura`.`priorities` (
  `id` INT(1) NOT NULL,
  `priority` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `priority_UNIQUE` (`priority` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `infraestrutura`.`categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `infraestrutura`.`categories` (
  `id` INT(2) NOT NULL,
  `category` VARCHAR(120) NOT NULL,
  `published` TINYINT(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `category_UNIQUE` (`category` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `infraestrutura`.`problem_status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `infraestrutura`.`problem_status` (
  `id` INT(1) NOT NULL,
  `status` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `status_UNIQUE` (`status` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `infraestrutura`.`problems`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `infraestrutura`.`problems` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `users_id` INT NOT NULL,
  `local` VARCHAR(100) NOT NULL,
  `phone` VARCHAR(45) NOT NULL,
  `email` VARCHAR(100) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `contact` VARCHAR(20) NOT NULL,
  `priorities_id` INT(1) NOT NULL,
  `categories_id` INT(2) NOT NULL,
  `description` LONGTEXT NOT NULL,
  `solution` LONGTEXT NULL,
  `startDate` DATETIME NOT NULL,
  `closedate` DATETIME NULL,
  `problem_status_id` INT(1) NOT NULL,
  `administrators_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_problems_user_idx` (`users_id` ASC),
  INDEX `fk_problems_proprieties_idx` (`priorities_id` ASC),
  INDEX `fk_problems_categories_idx` (`categories_id` ASC),
  INDEX `fk_problems_administrators_idx` (`administrators_id` ASC),
  INDEX `fk_problems_status_idx` (`problem_status_id` ASC),
  CONSTRAINT `fk_problems_users`
    FOREIGN KEY (`users_id`)
    REFERENCES `infraestrutura`.`administrators_users` (`users_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_problems_proprieties`
    FOREIGN KEY (`priorities_id`)
    REFERENCES `infraestrutura`.`priorities` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_problems_categories`
    FOREIGN KEY (`categories_id`)
    REFERENCES `infraestrutura`.`categories` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_problems_administrators`
    FOREIGN KEY (`administrators_id`)
    REFERENCES `infraestrutura`.`administrators` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_problems_status`
    FOREIGN KEY (`problem_status_id`)
    REFERENCES `infraestrutura`.`problem_status` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `infraestrutura`.`notes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `infraestrutura`.`notes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `problems_id` INT NOT NULL,
  `administrator_id` INT NULL,
  `users_id` INT NULL,
  `note` LONGTEXT NOT NULL,
  `private` TINYINT(1) NOT NULL,
  `date` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_notes_problems_idx` (`problems_id` ASC),
  INDEX `fk_notes_administrators_idx` (`administrator_id` ASC),
  INDEX `fk_notes_users_idx` (`users_id` ASC),
  CONSTRAINT `fk_notes_problems`
    FOREIGN KEY (`problems_id`)
    REFERENCES `infraestrutura`.`problems` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_notes_administrators`
    FOREIGN KEY (`administrator_id`)
    REFERENCES `infraestrutura`.`administrators` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_notes_users`
    FOREIGN KEY (`users_id`)
    REFERENCES `infraestrutura`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `infraestrutura`.`employees`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `infraestrutura`.`employees` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `role` VARCHAR(45) NOT NULL,
  `published` TINYINT(1) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `infraestrutura`.`employees_problems`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `infraestrutura`.`employees_problems` (
  `problems_id` INT NOT NULL,
  `employee_id` INT NOT NULL,
  `toolMaterial` LONGTEXT NULL,
  INDEX `fk_emploees_idx` (`problems_id` ASC),
  INDEX `fk_employee_idx` (`employee_id` ASC),
  CONSTRAINT `fk_problems`
    FOREIGN KEY (`problems_id`)
    REFERENCES `infraestrutura`.`problems` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_employee`
    FOREIGN KEY (`employee_id`)
    REFERENCES `infraestrutura`.`employees` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

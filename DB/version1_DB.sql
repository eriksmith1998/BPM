-- MySQL Script generated by MySQL Workbench
-- Thu Nov  2 13:23:40 2017
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
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`gebruiker`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`gebruiker` (
  `idgebruiker` INT NOT NULL,
  `naam` VARCHAR(20) NOT NULL,
  `tussenvoegsel` VARCHAR(20) NULL,
  `achternaam` VARCHAR(20) NOT NULL,
  `e-mail` VARCHAR(320) NOT NULL,
  `postcode` VARCHAR(6) NOT NULL,
  `woonplaats` VARCHAR(50) NOT NULL,
  `straat` VARCHAR(40) NOT NULL,
  `straatnummer` DECIMAL NOT NULL,
  `toevoegsel` TEXT NULL,
  `admin` BIT NULL,
  PRIMARY KEY (`idgebruiker`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`catogorie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`catogorie` (
  `idcatogorie` INT NOT NULL,
  `naam` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`idcatogorie`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`bestelling`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`bestelling` (
  `idbestelling` INT NOT NULL,
  `besteldatum` DATE NOT NULL,
  `status` VARCHAR(20) NOT NULL,
  `gebruiker_idgebruiker` INT NOT NULL,
  PRIMARY KEY (`idbestelling`),
  INDEX `fk_bestelling_gebruiker1_idx` (`gebruiker_idgebruiker` ASC),
  CONSTRAINT `fk_bestelling_gebruiker1`
    FOREIGN KEY (`gebruiker_idgebruiker`)
    REFERENCES `mydb`.`gebruiker` (`idgebruiker`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`producten`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`producten` (
  `idproducten` INT NOT NULL,
  `naam` VARCHAR(50) NOT NULL,
  `afbeelding` VARCHAR(30) NULL,
  `omschrijving` TEXT NULL,
  `specificaties` TEXT NULL,
  `prijs` DECIMAL NOT NULL,
  `hoeveelheid` DECIMAL NULL,
  `catogorie_idcatogorie` INT NOT NULL,
  `bestelling_idbestelling` INT NOT NULL,
  PRIMARY KEY (`idproducten`),
  INDEX `fk_producten_catogorie_idx` (`catogorie_idcatogorie` ASC),
  INDEX `fk_producten_bestelling1_idx` (`bestelling_idbestelling` ASC),
  CONSTRAINT `fk_producten_catogorie`
    FOREIGN KEY (`catogorie_idcatogorie`)
    REFERENCES `mydb`.`catogorie` (`idcatogorie`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_producten_bestelling1`
    FOREIGN KEY (`bestelling_idbestelling`)
    REFERENCES `mydb`.`bestelling` (`idbestelling`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`betaling`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`betaling` (
  `idbetaling` INT NOT NULL,
  `status` BIT NOT NULL,
  `bestelling_idbestelling` INT NOT NULL,
  PRIMARY KEY (`idbetaling`, `bestelling_idbestelling`),
  INDEX `fk_betaling_bestelling1_idx` (`bestelling_idbestelling` ASC),
  CONSTRAINT `fk_betaling_bestelling1`
    FOREIGN KEY (`bestelling_idbestelling`)
    REFERENCES `mydb`.`bestelling` (`idbestelling`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

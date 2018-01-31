SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`leverancier`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`leverancier` (
  `idleverancier` INT NOT NULL ,
  `naam` VARCHAR(45) NOT NULL ,
  `adres` VARCHAR(45) NOT NULL ,
  `telefoonnummer` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idleverancier`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`producten`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`producten` (
  `idproducten` INT NOT NULL ,
  `naam` VARCHAR(45) NOT NULL ,
  `omschrijving` LONGTEXT NOT NULL ,
  `prijs` DECIMAL(10,0) NULL ,
  `leverancier_idleverancier` INT NOT NULL ,
  PRIMARY KEY (`idproducten`) ,
  INDEX `fk_producten_leverancier1` (`leverancier_idleverancier` ASC) ,
  CONSTRAINT `fk_producten_leverancier1`
    FOREIGN KEY (`leverancier_idleverancier` )
    REFERENCES `mydb`.`leverancier` (`idleverancier` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`functies`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`functies` (
  `idfuncties` INT NOT NULL ,
  `naam` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idfuncties`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`gebruikers`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`gebruikers` (
  `idgebruikers` INT NOT NULL ,
  `naam` VARCHAR(45) NOT NULL ,
  `wachtwoord` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `functies_idfuncties` INT NOT NULL ,
  PRIMARY KEY (`idgebruikers`, `functies_idfuncties`) ,
  INDEX `fk_gebruikers_functies` (`functies_idfuncties` ASC) ,
  CONSTRAINT `fk_gebruikers_functies`
    FOREIGN KEY (`functies_idfuncties` )
    REFERENCES `mydb`.`functies` (`idfuncties` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`facturen`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`facturen` (
  `idfacturen` INT NOT NULL ,
  `datum` DATE NOT NULL ,
  `prijs` DECIMAL(10,0) NOT NULL ,
  `producten_idproducten` INT NOT NULL ,
  `gebruikers_idgebruikers` INT NOT NULL ,
  `gebruikers_functies_idfuncties` INT NOT NULL ,
  PRIMARY KEY (`idfacturen`) ,
  INDEX `fk_facturen_producten1` (`producten_idproducten` ASC) ,
  INDEX `fk_facturen_gebruikers1` (`gebruikers_idgebruikers` ASC, `gebruikers_functies_idfuncties` ASC) ,
  CONSTRAINT `fk_facturen_producten1`
    FOREIGN KEY (`producten_idproducten` )
    REFERENCES `mydb`.`producten` (`idproducten` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_facturen_gebruikers1`
    FOREIGN KEY (`gebruikers_idgebruikers` , `gebruikers_functies_idfuncties` )
    REFERENCES `mydb`.`gebruikers` (`idgebruikers` , `functies_idfuncties` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`magazijn`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`magazijn` (
  `idmagazijn` INT NOT NULL ,
  `naam` VARCHAR(45) NOT NULL ,
  `hoeveelheid` VARCHAR(45) NOT NULL ,
  `producten_idproducten` INT NOT NULL ,
  PRIMARY KEY (`idmagazijn`, `producten_idproducten`) ,
  INDEX `fk_magazijn_producten1` (`producten_idproducten` ASC) ,
  CONSTRAINT `fk_magazijn_producten1`
    FOREIGN KEY (`producten_idproducten` )
    REFERENCES `mydb`.`producten` (`idproducten` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

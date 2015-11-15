SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `ecommerce_bd` ;
CREATE SCHEMA IF NOT EXISTS `ecommerce_bd` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `ecommerce_bd` ;

-- -----------------------------------------------------
-- Table `ecommerce_bd`.`administradores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce_bd`.`administradores` (
  `idAdministrador` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idAdministrador`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecommerce_bd`.`categorias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce_bd`.`categorias` (
  `idCategoria` INT NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idCategoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecommerce_bd`.`produtos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce_bd`.`produtos` (
  `idProduto` INT NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(45) NOT NULL,
  `preco` VARCHAR(45) NOT NULL,
  `promocao` VARCHAR(45) NULL,
  `foto` VARCHAR(45) NULL,
  `idCategoria` INT NOT NULL,
  PRIMARY KEY (`idProduto`),
  INDEX `fk_produtos_categorias_idx` (`idCategoria` ASC),
  CONSTRAINT `fk_produtos_categorias`
    FOREIGN KEY (`idCategoria`)
    REFERENCES `ecommerce_bd`.`categorias` (`idCategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema ecommerce_bd
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `ecommerce_bd` ;

-- -----------------------------------------------------
-- Schema ecommerce_bd
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ecommerce_bd` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `ecommerce_bd` ;

-- -----------------------------------------------------
-- Table `ecommerce_bd`.`clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce_bd`.`clientes` (
  `idCliente` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(150) NOT NULL,
  `senha` VARCHAR(150) NOT NULL,
  `nome` VARCHAR(150) NOT NULL,
  `cpf` VARCHAR(15) NOT NULL,
  `telefone` VARCHAR(15) NULL,
  `celular` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`idCliente`),
  UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecommerce_bd`.`enderecos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce_bd`.`enderecos` (
  `idEndereco` INT NOT NULL AUTO_INCREMENT,
  `idCliente` INT NOT NULL,
  `rua` VARCHAR(100) NOT NULL,
  `numero` VARCHAR(100) NOT NULL,
  `complemento` VARCHAR(100) NULL,
  `bairro` VARCHAR(100) NOT NULL,
  `cidade` VARCHAR(100) NOT NULL,
  `estado` VARCHAR(100) NOT NULL,
  `cep` VARCHAR(15) NOT NULL,
  `principal` INT(2) NOT NULL,
  PRIMARY KEY (`idEndereco`, `idCliente`),
  INDEX `fk_enderecos_clientes_idx` (`idCliente` ASC),
  CONSTRAINT `fk_enderecos_clientes`
    FOREIGN KEY (`idCliente`)
    REFERENCES `ecommerce_bd`.`clientes` (`idCliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecommerce_bd`.`pedidos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce_bd`.`pedidos` (
  `idPedido` INT NOT NULL,
  `data` DATE NOT NULL,
  `valorTotal` FLOAT NOT NULL,
  `embalagem` INT(2) NOT NULL DEFAULT 1,
  `idEndereco` INT NOT NULL,
  PRIMARY KEY (`idPedido`),
  INDEX `fk_end_idEndereco_idx` (`idEndereco` ASC),
  CONSTRAINT `fk_end_idEndereco`
    FOREIGN KEY (`idEndereco`)
    REFERENCES `ecommerce_bd`.`enderecos` (`idEndereco`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecommerce_bd`.`relatorioPedidos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce_bd`.`relatorioPedidos` (
  `idCliente` INT NOT NULL,
  `idPedido` INT NOT NULL,
  PRIMARY KEY (`idCliente`, `idPedido`),
  INDEX `fk_clientes_has_pedidos_pedidos1_idx` (`idPedido` ASC),
  INDEX `fk_clientes_has_pedidos_clientes1_idx` (`idCliente` ASC),
  CONSTRAINT `fk_clientes_has_pedidos_clientes1`
    FOREIGN KEY (`idCliente`)
    REFERENCES `ecommerce_bd`.`clientes` (`idCliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_clientes_has_pedidos_pedidos1`
    FOREIGN KEY (`idPedido`)
    REFERENCES `ecommerce_bd`.`pedidos` (`idPedido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecommerce_bd`.`produtos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce_bd`.`produtos` (
  `idProduto` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(150) NOT NULL,
  `descricao` VARCHAR(500) NULL,
  `marca` VARCHAR(150) NOT NULL,
  `material` VARCHAR(150) NOT NULL,
  `publico` VARCHAR(50) NOT NULL,
  `fechamento` VARCHAR(50) NOT NULL,
  `adicional` VARCHAR(300) NULL,
  PRIMARY KEY (`idProduto`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecommerce_bd`.`estoqueProduto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce_bd`.`estoqueProduto` (
  `idEstoqueProduto` INT NOT NULL AUTO_INCREMENT,
  `idProduto` INT NOT NULL,
  `qtdEstoque` VARCHAR(45) NOT NULL,
  `cor` VARCHAR(45) NOT NULL,
  `numeracao` VARCHAR(45) NOT NULL,
  `preco` FLOAT NOT NULL,
  `foto` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`idEstoqueProduto`, `idProduto`),
  INDEX `fk_estoqueProduto_produtos1_idx` (`idProduto` ASC),
  CONSTRAINT `fk_estoqueProduto_produtos1`
    FOREIGN KEY (`idProduto`)
    REFERENCES `ecommerce_bd`.`produtos` (`idProduto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecommerce_bd`.`carrinho`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce_bd`.`carrinho` (
  `idPedido` INT NOT NULL,
  `idProduto` INT NOT NULL,
  `idEstoqueProduto` INT NOT NULL,
  PRIMARY KEY (`idPedido`, `idProduto`, `idEstoqueProduto`),
  INDEX `fk_pedidos_has_estoqueProduto_estoqueProduto1_idx` (`idProduto` ASC, `idEstoqueProduto` ASC),
  INDEX `fk_pedidos_has_estoqueProduto_pedidos1_idx` (`idPedido` ASC),
  CONSTRAINT `fk_pedidos_has_estoqueProduto_pedidos1`
    FOREIGN KEY (`idPedido`)
    REFERENCES `ecommerce_bd`.`pedidos` (`idPedido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedidos_has_estoqueProduto_estoqueProduto1`
    FOREIGN KEY (`idProduto` , `idEstoqueProduto`)
    REFERENCES `ecommerce_bd`.`estoqueProduto` (`idProduto` , `idEstoqueProduto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecommerce_bd`.`administradores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce_bd`.`administradores` (
  `idAdministrador` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(150) NOT NULL,
  `senha` VARCHAR(150) NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idAdministrador`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- MySQL Script generated by MySQL Workbench
-- Tue Apr 19 22:34:03 2022
-- model: New model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema vendasPresenciais
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema vendasPresenciais
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `vendasPresenciais` DEFAULT CHARACTER SET utf8 ;
USE `vendasPresenciais` ;

-- -----------------------------------------------------
-- Table `vendasPresenciais`.`tbl_funcionario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vendasPresenciais`.`tbl_funcionario` (
  `idFuncionario` INT NOT NULL AUTO_INCREMENT,
  `nomeFuncionario` VARCHAR(200) NOT NULL,
  `dataNasc` DATE NOT NULL,
  `img_link` VARCHAR(256) NOT NULL,
  PRIMARY KEY (`idFuncionario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `vendasPresenciais`.`tbl_venda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vendasPresenciais`.`tbl_venda` (
  `idVenda` INT NOT NULL AUTO_INCREMENT,
  `quantItems` INT NOT NULL,
  `dataVenda` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  `idFuncionario` INT NOT NULL,
  PRIMARY KEY (`idVenda`, `idFuncionario`),
  CONSTRAINT `fk_tbl_venda_tbl_funcionario1`
    FOREIGN KEY (`idFuncionario`)
    REFERENCES `vendasPresenciais`.`tbl_funcionario` (`idFuncionario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_tbl_venda_tbl_funcionario1_idx` ON `vendasPresenciais`.`tbl_venda` (`idFuncionario` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `vendasPresenciais`.`tbl_categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vendasPresenciais`.`tbl_categoria` (
  `idCartegoria` INT NOT NULL AUTO_INCREMENT,
  `nomeCategoria` VARCHAR(256) NOT NULL,
  PRIMARY KEY (`idCartegoria`));


-- -----------------------------------------------------
-- Table `vendasPresenciais`.`tbl_produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vendasPresenciais`.`tbl_produto` (
  `idProduto` INT NOT NULL AUTO_INCREMENT,
  `nomeProduto` VARCHAR(200) NOT NULL,
  `precoProduto` DECIMAL NOT NULL,
  `marcaProduto` VARCHAR(200) NOT NULL,
  `codigoBarras` VARCHAR(300) NOT NULL,
  `modeloProduto` VARCHAR(200) NOT NULL,
  `quantidadeProd` INT NOT NULL,
  `idCategoria` INT NOT NULL,
  PRIMARY KEY (`idProduto`, `idCategoria`),
  CONSTRAINT `fk_tbl_produto_tbl_categoria1`
    FOREIGN KEY (`idCategoria`)
    REFERENCES `vendasPresenciais`.`tbl_categoria` (`idCartegoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_tbl_produto_tbl_categoria1_idx` ON `vendasPresenciais`.`tbl_produto` (`idCategoria` ASC) VISIBLE;


-- -----------------------------------------------------
-- Table `vendasPresenciais`.`tbl_Cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vendasPresenciais`.`tbl_Cliente` (
  `idCliente` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(200) NOT NULL,
  `CPF` VARCHAR(15) NOT NULL,
  `dataNascCliente` DATE NOT NULL,
  PRIMARY KEY (`idCliente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `vendasPresenciais`.`produtoVenda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vendasPresenciais`.`produtoVenda` (
  `idProduto` INT NOT NULL,
  `idVenda` INT NOT NULL,
  `precoTotal` DECIMAL NOT NULL,
  `precoDesconto` DECIMAL NOT NULL,
  `precoFinal` DECIMAL NOT NULL,
  `metodoPagamgento` VARCHAR(100) NOT NULL,
  `idCliente` INT NOT NULL,
  PRIMARY KEY (`idProduto`, `idVenda`, `idCliente`),
  CONSTRAINT `fk_tbl_produto_has_tbl_venda_tbl_produto1`
    FOREIGN KEY (`idProduto`)
    REFERENCES `vendasPresenciais`.`tbl_produto` (`idProduto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_produto_has_tbl_venda_tbl_venda1`
    FOREIGN KEY (`idVenda`)
    REFERENCES `vendasPresenciais`.`tbl_venda` (`idVenda`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_produtoVenda_tbl_Cliente1`
    FOREIGN KEY (`idCliente`)
    REFERENCES `vendasPresenciais`.`tbl_Cliente` (`idCliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_tbl_produto_has_tbl_venda_tbl_venda1_idx` ON `vendasPresenciais`.`produtoVenda` (`idVenda` ASC) VISIBLE;

CREATE INDEX `fk_tbl_produto_has_tbl_venda_tbl_produto1_idx` ON `vendasPresenciais`.`produtoVenda` (`idProduto` ASC) VISIBLE;

CREATE INDEX `fk_produtoVenda_tbl_Cliente1_idx` ON `vendasPresenciais`.`produtoVenda` (`idCliente` ASC) VISIBLE;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
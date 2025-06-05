-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema shein
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema shein
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `shein` DEFAULT CHARACTER SET utf8mb4 ;
USE `shein` ;

-- -----------------------------------------------------
-- Table `shein`.`clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shein`.`clientes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NULL DEFAULT NULL,
  `telefono` VARCHAR(20) NULL DEFAULT NULL,
  `correo` VARCHAR(100) NULL DEFAULT NULL,
  `edad` INT(11) NULL DEFAULT NULL,
  `psw` VARCHAR(13) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 22
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `shein`.`compras`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shein`.`compras` (
  `id_compra` INT(11) NOT NULL AUTO_INCREMENT,
  `id_comprador` INT(11) NULL DEFAULT NULL,
  `nombre` VARCHAR(40) NOT NULL,
  `talla` VARCHAR(4) NOT NULL,
  `precio` FLOAT NULL DEFAULT NULL,
  `concretado` TINYINT(1) NULL DEFAULT 0,
  PRIMARY KEY (`id_compra`),
  INDEX `id_comprador` (`id_comprador` ASC) VISIBLE,
  CONSTRAINT `compras_ibfk_1`
    FOREIGN KEY (`id_comprador`)
    REFERENCES `shein`.`clientes` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 12
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `shein`.`transacciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shein`.`transacciones` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` INT(11) NULL DEFAULT NULL,
  `fecha` DATE NULL DEFAULT NULL,
  `hora` TIME NULL DEFAULT NULL,
  `monto` DECIMAL(10,2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `usuario_id` (`usuario_id` ASC) VISIBLE,
  CONSTRAINT `transacciones_ibfk_1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `shein`.`clientes` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

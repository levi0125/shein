drop schema if exists shien;
CREATE SCHEMA IF NOT EXISTS shein DEFAULT CHARACTER SET utf8mb4 ;
USE shein ;

-- -----------------------------------------------------
-- Table clientes
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS clientes (
  id INT(11) NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(100) NULL DEFAULT NULL,
  telefono VARCHAR(20) NULL DEFAULT NULL,
  correo VARCHAR(100) NULL DEFAULT NULL,
  edad INT(11) NULL DEFAULT NULL,
  psw VARCHAR(13) NULL DEFAULT NULL,
  PRIMARY KEY (id))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;

-- -----------------------------------------------------
-- Table compras
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS compras (
  id_compra INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  id_comprador INT NULL DEFAULT NULL,
  nombre VARCHAR(40) NOT NULL,
  talla VARCHAR(4) NOT NULL,
  precio FLOAT NULL DEFAULT NULL,
  concretado TINYINT NULL DEFAULT 0,
  fecha DATE NULL DEFAULT NULL,
  hora TIME NULL DEFAULT NULL,
  INDEX id_comprador (id_comprador ASC),
  FOREIGN KEY (id_comprador) REFERENCES clientes(id)
  );

-- -----------------------------------------------------
-- Table transacciones
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS transacciones (
  id INT(11) NOT NULL AUTO_INCREMENT,
  usuario_id INT(11) NULL DEFAULT NULL,
  fecha DATE NULL DEFAULT NULL,
  hora TIME NULL DEFAULT NULL,
  monto DECIMAL(10,2) NULL DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX usuario_id (usuario_id ASC),
  CONSTRAINT transacciones_ibfk_1
    FOREIGN KEY (usuario_id)
    REFERENCES clientes (id))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- select time(now()), date(now());
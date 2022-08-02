-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Table `rol`
-- -----------------------------------------------------
CREATE TABLE `rol` (
  `idRol` INT NOT NULL AUTO_INCREMENT,
  `nombreRol` VARCHAR(45) NOT NULL,
  `opeInsertar` TINYINT NOT NULL,
  `opeActualizar` TINYINT NOT NULL,
  `opeEliminar` TINYINT NOT NULL,
  PRIMARY KEY (`idRol`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `usuario`
-- -----------------------------------------------------
CREATE TABLE `usuario` (
  `idUsuario` INT NOT NULL,
  `nombre1` VARCHAR(45) NOT NULL,
  `nombre2` VARCHAR(45) NULL,
  `apellido1` VARCHAR(45) NOT NULL,
  `apellido2` VARCHAR(45) NULL,
  `fechaNacimiento` DATE NOT NULL,
  `telefono` VARCHAR(45) NOT NULL,
  `direccion` VARCHAR(45) NOT NULL,
  `rol` VARCHAR(45) NOT NULL,
  `usuario` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `rol_idRol` INT NOT NULL,
  PRIMARY KEY (`idUsuario`, `rol_idRol`),

  CONSTRAINT `fk_usuario_rol1`
    FOREIGN KEY (`rol_idRol`)
    REFERENCES `rol` (`idRol`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `editorial`
-- -----------------------------------------------------
CREATE TABLE `editorial` (
  `idEditorial` INT NOT NULL AUTO_INCREMENT,
  `nombreEditorial` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idEditorial`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `libros`
-- -----------------------------------------------------
CREATE TABLE `libros` (
  `idLibro` INT NOT NULL AUTO_INCREMENT,
  `nombreLibro` VARCHAR(100) NOT NULL,
  `autor` VARCHAR(45) NOT NULL,
  `disponible` TINYINT NOT NULL,
  `cantidadTotal` VARCHAR(45) NOT NULL,
  `editorial_idEditorial` INT NOT NULL,
  PRIMARY KEY (`idLibro`, `editorial_idEditorial`),
  
  CONSTRAINT `fk_libros_editorial`
    FOREIGN KEY (`editorial_idEditorial`)
    REFERENCES `editorial` (`idEditorial`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cliente`
-- -----------------------------------------------------
CREATE TABLE `cliente` (
  `idCliente` INT NOT NULL,
  `nombre1` VARCHAR(45) NOT NULL,
  `nombre2` VARCHAR(45) NULL,
  `apellido1` VARCHAR(45) NOT NULL,
  `apellido2` VARCHAR(45) NULL,
  `fechaNacimiento` DATE NOT NULL,
  `telefono` VARCHAR(45) NOT NULL,
  `direccion` VARCHAR(100) NOT NULL,
  `activo` TINYINT NULL,
  PRIMARY KEY (`idCliente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `encabezadoPrestamo`
-- -----------------------------------------------------
CREATE TABLE `encabezadoPrestamo` (
  `idPrestamo` INT NOT NULL AUTO_INCREMENT,
  `fechaPrestamo` DATE NOT NULL,
  `fechaEntrega` DATE NULL,
  `cliente_idCliente` INT NOT NULL,
  `usuario` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idPrestamo`, `cliente_idCliente`),
 
  CONSTRAINT `fk_encabezadoPrestamo_cliente1`
    FOREIGN KEY (`cliente_idCliente`)
    REFERENCES `cliente` (`idCliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `detallePrestamo`
-- -----------------------------------------------------
CREATE TABLE `detallePrestamo` (
  `idDetalle` INT NOT NULL,
  `idLibro` INT NOT NULL,
  `cantidad` INT NOT NULL,
  `libros_idLibro` INT NOT NULL,
  `libros_editorial_idEditorial` INT NOT NULL,
  `encabezadoPrestamo_idPrestamo` INT NOT NULL,
  PRIMARY KEY (`idDetalle`, `libros_idLibro`, `libros_editorial_idEditorial`, `encabezadoPrestamo_idPrestamo`),

  CONSTRAINT `fk_detallePrestamo_libros1`
    FOREIGN KEY (`libros_idLibro` , `libros_editorial_idEditorial`)
    REFERENCES `libros` (`idLibro` , `editorial_idEditorial`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_detallePrestamo_encabezadoPrestamo1`
    FOREIGN KEY (`encabezadoPrestamo_idPrestamo`)
    REFERENCES `encabezadoPrestamo` (`idPrestamo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `penalizacion`
-- -----------------------------------------------------
CREATE TABLE `penalizacion` (
  `idPenalizacion` INT NOT NULL AUTO_INCREMENT,
  `fechaPenalizacion` DATE NOT NULL,
  `fechaFinPenalizacion` DATE NOT NULL,
  `idCliente` INT NOT NULL,
  `idPrestamo` INT NOT NULL,
  `cliente_idCliente` INT NOT NULL,
  PRIMARY KEY (`idPenalizacion`, `cliente_idCliente`),

  CONSTRAINT `fk_penalizacion_cliente1`
    FOREIGN KEY (`cliente_idCliente`)
    REFERENCES `cliente` (`idCliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

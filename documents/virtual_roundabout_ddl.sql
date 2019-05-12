-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema virtual_roundabout
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema virtual_roundabout
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `virtual_roundabout` DEFAULT CHARACTER SET utf8 ;
USE `virtual_roundabout` ;

-- -----------------------------------------------------
-- Table `virtual_roundabout`.`Ingredientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `virtual_roundabout`.`Ingredientes` (
  `idIngrediente` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `cantidad` INT NOT NULL,
  `modificable` TINYINT(1) NOT NULL,
  PRIMARY KEY (`idIngrediente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `virtual_roundabout`.`Categorias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `virtual_roundabout`.`Categorias` (
  `idCategoria` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idCategoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `virtual_roundabout`.`Productos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `virtual_roundabout`.`Productos` (
  `idProducto` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `precio` DECIMAL(20) NOT NULL,
  `idCategoria` INT NOT NULL,
  PRIMARY KEY (`idProducto`),
  INDEX `idCategoria_idx` (`idCategoria` ASC),
  CONSTRAINT `idCategoriaFK`
    FOREIGN KEY (`idCategoria`)
    REFERENCES `virtual_roundabout`.`Categorias` (`idCategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `virtual_roundabout`.`Especialidades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `virtual_roundabout`.`Especialidades` (
  `idEspecialidades` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idEspecialidades`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `virtual_roundabout`.`Restaurates`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `virtual_roundabout`.`Restaurates` (
  `NIT` INT NOT NULL,
  `nombre` VARCHAR(200) NOT NULL,
  `horaApertura` TIME NULL,
  `horaCierre` TIME NULL,
  `password` VARCHAR(200) NOT NULL,
  `idEspecialidad` INT NOT NULL,
  INDEX `IdEsoecialidadFK_idx` (`idEspecialidad` ASC),
  PRIMARY KEY (`NIT`),
  CONSTRAINT `IdEsoecialidadFK`
    FOREIGN KEY (`idEspecialidad`)
    REFERENCES `virtual_roundabout`.`Especialidades` (`idEspecialidades`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `virtual_roundabout`.`Clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `virtual_roundabout`.`Clientes` (
  `cedula` INT NOT NULL,
  `Nombre` VARCHAR(255) NOT NULL,
  `fechaNacimiento` DATE NOT NULL,
  `celular` INT NOT NULL,
  PRIMARY KEY (`cedula`),
  UNIQUE INDEX `celular_UNIQUE` (`celular` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `virtual_roundabout`.`Pedidos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `virtual_roundabout`.`Pedidos` (
  `idPedido` INT NOT NULL AUTO_INCREMENT,
  `horaPedido` DATE NOT NULL,
  `numeroPedido` INT NOT NULL,
  `informacionPedido` VARCHAR(45) NOT NULL,
  `estado` ENUM('En proceso', 'Terminado') NOT NULL,
  `idCliente` INT NOT NULL,
  `NIT` INT NOT NULL,
  PRIMARY KEY (`idPedido`),
  INDEX `fk_Pedidos_1_idx` (`idCliente` ASC),
  UNIQUE INDEX `numeroPedido_UNIQUE` (`numeroPedido` ASC),
  INDEX `fk_Pedidos_2_idx` (`NIT` ASC),
  CONSTRAINT `fk_Pedidos_1`
    FOREIGN KEY (`idCliente`)
    REFERENCES `virtual_roundabout`.`Clientes` (`cedula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Pedidos_2`
    FOREIGN KEY (`NIT`)
    REFERENCES `virtual_roundabout`.`Restaurates` (`NIT`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `virtual_roundabout`.`Menus`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `virtual_roundabout`.`Menus` (
  `idMenu` INT NOT NULL AUTO_INCREMENT,
  `precio` DECIMAL(20) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idMenu`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `virtual_roundabout`.`Paises`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `virtual_roundabout`.`Paises` (
  `idPais` INT NOT NULL AUTO_INCREMENT,
  `pais` VARCHAR(80) NOT NULL,
  PRIMARY KEY (`idPais`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `virtual_roundabout`.`Ciudades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `virtual_roundabout`.`Ciudades` (
  `idCiudad` INT NOT NULL AUTO_INCREMENT,
  `ciudad` VARCHAR(100) NOT NULL,
  `idPais` INT NOT NULL,
  PRIMARY KEY (`idCiudad`),
  INDEX `fk_Ciudades_1_idx` (`idPais` ASC),
  CONSTRAINT `fk_Ciudades_1`
    FOREIGN KEY (`idPais`)
    REFERENCES `virtual_roundabout`.`Paises` (`idPais`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `virtual_roundabout`.`DireccionesCliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `virtual_roundabout`.`DireccionesCliente` (
  `idDirecciones` INT NOT NULL AUTO_INCREMENT,
  `idCiudad` INT NOT NULL,
  `direccion` VARCHAR(45) NOT NULL,
  `cedulaCliente` INT NOT NULL,
  PRIMARY KEY (`idDirecciones`),
  INDEX `fk_Direcciones_idx` (`cedulaCliente` ASC),
  INDEX `fk_DireccionesCliente_1_idx` (`idCiudad` ASC),
  CONSTRAINT `fk_Direcciones`
    FOREIGN KEY (`cedulaCliente`)
    REFERENCES `virtual_roundabout`.`Clientes` (`cedula`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_DireccionesCliente_1`
    FOREIGN KEY (`idCiudad`)
    REFERENCES `virtual_roundabout`.`Ciudades` (`idCiudad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `virtual_roundabout`.`IngredientesPorProductos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `virtual_roundabout`.`IngredientesPorProductos` (
  `idProducto` INT NOT NULL,
  `idIngrediente` INT NOT NULL,
  INDEX `fk_IngredientesPorProducto_1_idx` (`idProducto` ASC),
  INDEX `fk_IngredientesPorProducto_2_idx` (`idIngrediente` ASC),
  CONSTRAINT `fk_IngredientesPorProducto_1`
    FOREIGN KEY (`idProducto`)
    REFERENCES `virtual_roundabout`.`Productos` (`idProducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_IngredientesPorProducto_2`
    FOREIGN KEY (`idIngrediente`)
    REFERENCES `virtual_roundabout`.`Ingredientes` (`idIngrediente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `virtual_roundabout`.`RestaurantesPorMenus`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `virtual_roundabout`.`RestaurantesPorMenus` (
  `NITRestaurate` INT NOT NULL,
  `idMenu` INT NOT NULL,
  INDEX `fk_RestaurantesXMenus_2_idx` (`idMenu` ASC),
  CONSTRAINT `fk_RestaurantesXMenus_1`
    FOREIGN KEY (`NITRestaurate`)
    REFERENCES `virtual_roundabout`.`Restaurates` (`NIT`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_RestaurantesXMenus_2`
    FOREIGN KEY (`idMenu`)
    REFERENCES `virtual_roundabout`.`Menus` (`idMenu`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `virtual_roundabout`.`DireccionesRestaurante`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `virtual_roundabout`.`DireccionesRestaurante` (
  `idDireccionesRestaurante` INT NOT NULL AUTO_INCREMENT,
  `idCiudad` INT NOT NULL,
  `direccion` VARCHAR(45) NOT NULL,
  `NITRestaurate` INT(4) NOT NULL,
  PRIMARY KEY (`idDireccionesRestaurante`),
  INDEX `fk_DireccionesRestaurante_1_idx` (`NITRestaurate` ASC),
  INDEX `fk_DireccionesRestaurante_2_idx` (`idCiudad` ASC),
  CONSTRAINT `fk_DireccionesRestaurante_1`
    FOREIGN KEY (`NITRestaurate`)
    REFERENCES `virtual_roundabout`.`Restaurates` (`NIT`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_DireccionesRestaurante_2`
    FOREIGN KEY (`idCiudad`)
    REFERENCES `virtual_roundabout`.`Ciudades` (`idCiudad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `virtual_roundabout`.`clientesRestaurate`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `virtual_roundabout`.`clientesRestaurate` (
  `cedula` INT NOT NULL,
  `NIT` INT NULL,
  PRIMARY KEY (`cedula`),
  INDEX `fk_clientesRestaurate_1_idx` (`NIT` ASC),
  CONSTRAINT `fk_clientesRestaurate_1`
    FOREIGN KEY (`NIT`)
    REFERENCES `virtual_roundabout`.`Restaurates` (`NIT`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `virtual_roundabout`.`Modificables`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `virtual_roundabout`.`Modificables` (
  `idModificables` INT NOT NULL AUTO_INCREMENT,
  `type` ENUM('argegar', 'quitar', 'remplazar') NOT NULL,
  `ingrediente` VARCHAR(45) NULL,
  `idIngrediente` INT NOT NULL,
  PRIMARY KEY (`idModificables`),
  INDEX `fk_ingredientesModificables_1_idx` (`idIngrediente` ASC),
  CONSTRAINT `fk_ingredientesModificables_1`
    FOREIGN KEY (`idIngrediente`)
    REFERENCES `virtual_roundabout`.`Ingredientes` (`idIngrediente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `virtual_roundabout`.`MenusPorProductos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `virtual_roundabout`.`MenusPorProductos` (
  `idMenu` INT NOT NULL,
  `idProducto` INT NOT NULL,
  INDEX `fk_MenusPorProductos_1_idx` (`idMenu` ASC),
  INDEX `fk_MenusPorProductos_2_idx` (`idProducto` ASC),
  CONSTRAINT `fk_MenusPorProductos_1`
    FOREIGN KEY (`idMenu`)
    REFERENCES `virtual_roundabout`.`Menus` (`idMenu`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_MenusPorProductos_2`
    FOREIGN KEY (`idProducto`)
    REFERENCES `virtual_roundabout`.`Productos` (`idProducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `virtual_roundabout`.`Categorias`
-- -----------------------------------------------------
START TRANSACTION;
USE `virtual_roundabout`;
INSERT INTO `virtual_roundabout`.`Categorias` (`idCategoria`, `nombre`) VALUES (DEFAULT, 'Entrada');
INSERT INTO `virtual_roundabout`.`Categorias` (`idCategoria`, `nombre`) VALUES (DEFAULT, 'Plato Fuerte');
INSERT INTO `virtual_roundabout`.`Categorias` (`idCategoria`, `nombre`) VALUES (DEFAULT, 'Postre');
INSERT INTO `virtual_roundabout`.`Categorias` (`idCategoria`, `nombre`) VALUES (DEFAULT, 'Bebida');
INSERT INTO `virtual_roundabout`.`Categorias` (`idCategoria`, `nombre`) VALUES (DEFAULT, 'Acompañamiento');

COMMIT;


-- -----------------------------------------------------
-- Data for table `virtual_roundabout`.`Especialidades`
-- -----------------------------------------------------
START TRANSACTION;
USE `virtual_roundabout`;
INSERT INTO `virtual_roundabout`.`Especialidades` (`idEspecialidades`, `nombre`) VALUES (DEFAULT, 'Corriente');
INSERT INTO `virtual_roundabout`.`Especialidades` (`idEspecialidades`, `nombre`) VALUES (DEFAULT, 'Colombiana');
INSERT INTO `virtual_roundabout`.`Especialidades` (`idEspecialidades`, `nombre`) VALUES (DEFAULT, 'Mexicana');
INSERT INTO `virtual_roundabout`.`Especialidades` (`idEspecialidades`, `nombre`) VALUES (DEFAULT, 'China');
INSERT INTO `virtual_roundabout`.`Especialidades` (`idEspecialidades`, `nombre`) VALUES (DEFAULT, 'Comida Rapida');
INSERT INTO `virtual_roundabout`.`Especialidades` (`idEspecialidades`, `nombre`) VALUES (DEFAULT, 'Postres');
INSERT INTO `virtual_roundabout`.`Especialidades` (`idEspecialidades`, `nombre`) VALUES (DEFAULT, 'Bebidas');
INSERT INTO `virtual_roundabout`.`Especialidades` (`idEspecialidades`, `nombre`) VALUES (DEFAULT, 'Pollos');
INSERT INTO `virtual_roundabout`.`Especialidades` (`idEspecialidades`, `nombre`) VALUES (DEFAULT, 'Pizzeria');

COMMIT;


-- -----------------------------------------------------
-- Data for table `virtual_roundabout`.`Paises`
-- -----------------------------------------------------
START TRANSACTION;
USE `virtual_roundabout`;
INSERT INTO `virtual_roundabout`.`Paises` (`idPais`, `pais`) VALUES (1, 'Colombia');
INSERT INTO `virtual_roundabout`.`Paises` (`idPais`, `pais`) VALUES (DEFAULT, 'Mexico');
INSERT INTO `virtual_roundabout`.`Paises` (`idPais`, `pais`) VALUES (DEFAULT, 'Argentina');

COMMIT;


-- -----------------------------------------------------
-- Data for table `virtual_roundabout`.`Ciudades`
-- -----------------------------------------------------
START TRANSACTION;
USE `virtual_roundabout`;
INSERT INTO `virtual_roundabout`.`Ciudades` (`idCiudad`, `ciudad`, `idPais`) VALUES (DEFAULT, 'Bogota', 1);
INSERT INTO `virtual_roundabout`.`Ciudades` (`idCiudad`, `ciudad`, `idPais`) VALUES (DEFAULT, 'Medellin', 1);
INSERT INTO `virtual_roundabout`.`Ciudades` (`idCiudad`, `ciudad`, `idPais`) VALUES (DEFAULT, 'Ciudad de Mexico', 2);
INSERT INTO `virtual_roundabout`.`Ciudades` (`idCiudad`, `ciudad`, `idPais`) VALUES (DEFAULT, 'Guadalajara', 2);
INSERT INTO `virtual_roundabout`.`Ciudades` (`idCiudad`, `ciudad`, `idPais`) VALUES (DEFAULT, 'Buenos Aires', 3);
INSERT INTO `virtual_roundabout`.`Ciudades` (`idCiudad`, `ciudad`, `idPais`) VALUES (DEFAULT, 'Rosario', 3);

COMMIT;

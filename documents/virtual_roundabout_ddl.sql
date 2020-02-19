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
  `idIngrediente` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador del ingrediente\n',
  `nombre` VARCHAR(45) NOT NULL COMMENT 'nombre del ingrediente',
  `cantidad` INT NOT NULL COMMENT 'cantidad del producto que se va a vender\n',
  `modificable` TINYINT(1) NOT NULL COMMENT 'guarda si es modificable o no el igrediente\n',
  PRIMARY KEY (`idIngrediente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `virtual_roundabout`.`Categorias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `virtual_roundabout`.`Categorias` (
  `idCategoria` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificacion de la categoria\n',
  `nombre` VARCHAR(45) NOT NULL COMMENT 'nombre de la categoria',
  PRIMARY KEY (`idCategoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `virtual_roundabout`.`Productos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `virtual_roundabout`.`Productos` (
  `idProducto` INT NOT NULL AUTO_INCREMENT COMMENT 'identificador unico para cada producto\n',
  `nombre` VARCHAR(45) NOT NULL COMMENT 'nombre del producto\n',
  `precio` DECIMAL(20) NOT NULL COMMENT 'Precio del costo del producto',
  `idCategoria` INT NOT NULL COMMENT 'identificador de la categoria asociada al producto',
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
  `idEspecialidades` INT NOT NULL AUTO_INCREMENT COMMENT 'identificador de la especialidad \n',
  `nombre` VARCHAR(45) NOT NULL COMMENT 'nombre de la especialidad',
  PRIMARY KEY (`idEspecialidades`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `virtual_roundabout`.`Restaurates`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `virtual_roundabout`.`Restaurates` (
  `NIT` INT NOT NULL COMMENT 'numero de identificacion unico del restaurante\n',
  `nombre` VARCHAR(200) NOT NULL COMMENT 'Nombre del restaurante\n',
  `horaApertura` TIME NULL COMMENT 'Hora de la apertura del restaurante\n',
  `horaCierre` TIME NULL COMMENT 'Hora del cierre del restaurante\n',
  `password` VARCHAR(200) NOT NULL COMMENT 'Contraseña de acceso a la rotonda\n',
  `idEspecialidad` INT NOT NULL COMMENT 'identificador de la especialidad asociado a la rotonda ',
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
  `cedula` INT NOT NULL COMMENT 'Cedula del cliente el cual se usa como identificador\n',
  `Nombre` VARCHAR(255) NOT NULL COMMENT 'Nombre del cliente\n',
  `password` VARCHAR(200) NOT NULL COMMENT 'Contraseña del usuario para el acceso a la rotonda\n',
  `celular` INT NOT NULL COMMENT 'Numeor de celular del cliente',
  PRIMARY KEY (`cedula`),
  UNIQUE INDEX `celular_UNIQUE` (`celular` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `virtual_roundabout`.`Pedidos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `virtual_roundabout`.`Pedidos` (
  `idPedido` INT NOT NULL AUTO_INCREMENT COMMENT 'Identidicador unico del pedido',
  `horaPedido` DATE NOT NULL COMMENT 'Hora de solicitud del pedido',
  `numeroPedido` INT NOT NULL COMMENT 'numero unico del pedido',
  `informacionPedido` VARCHAR(100) NOT NULL COMMENT 'Información sobre el detalle del pedido como los productos y precios y total de la compra\n',
  `estado` ENUM('En proceso', 'Terminado') NOT NULL COMMENT 'Estado de la transacción del pedido\nEn proceso: es porque el pedido no a llegado al cliente\nTerminado: El pedido ya ha llegado al cliente',
  `idCliente` INT NOT NULL COMMENT 'identificador del cliente asociado al pedido\n',
  `NIT` INT NOT NULL COMMENT 'identificador del restaurante asociado a la solicitud del pedido',
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
  `idMenu` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico del menu\n',
  `precio` DECIMAL(20) NOT NULL COMMENT 'precio del costo del menu\n',
  `nombre` VARCHAR(45) NOT NULL COMMENT 'nombre del menu',
  PRIMARY KEY (`idMenu`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `virtual_roundabout`.`Paises`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `virtual_roundabout`.`Paises` (
  `idPais` INT NOT NULL AUTO_INCREMENT COMMENT 'Este es el id del pais\nque identificara un respectivo pais',
  `pais` VARCHAR(80) NOT NULL COMMENT 'Nombre del pais',
  PRIMARY KEY (`idPais`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `virtual_roundabout`.`Ciudades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `virtual_roundabout`.`Ciudades` (
  `idCiudad` INT NOT NULL AUTO_INCREMENT COMMENT 'Identidificdor numerico de la ciudad',
  `ciudad` VARCHAR(100) NOT NULL COMMENT 'El nombre de la ciudad el una esta asociado a un id',
  `idPais` INT NOT NULL COMMENT 'El identificador del pais asociando con la ciudad ',
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
  `idDirecciones` INT NOT NULL AUTO_INCREMENT COMMENT 'identificador de las direcciones del cliente\n',
  `idCiudad` INT NOT NULL COMMENT 'identificador de la ciudad asociada con la direccion',
  `direccion` VARCHAR(45) NOT NULL COMMENT 'nomenclatura de la direccion del cliente',
  `cedulaCliente` INT NOT NULL COMMENT 'cedula del cliente asociado con la direccion',
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
  `idProducto` INT NOT NULL COMMENT 'identificador del producto asociado a ingredientes',
  `idIngrediente` INT NOT NULL COMMENT 'identificador del ingrediente asociado a productos\n',
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
  `NITRestaurate` INT NOT NULL COMMENT 'Identificador del restaurante asociado con los menus\n',
  `idMenu` INT NOT NULL COMMENT 'Identificador de los menus asociados con los restaurantes\n',
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
  `idDireccionesRestaurante` INT NOT NULL AUTO_INCREMENT COMMENT 'identificafor de la direccion de un restaurante',
  `idCiudad` INT NOT NULL COMMENT 'id de la ciudad asociada con la direccion\n',
  `direccion` VARCHAR(45) NOT NULL COMMENT 'Nomenclatura de la direccion del restaurante\n',
  `NITRestaurate` INT(4) NOT NULL COMMENT 'Identificador dado a los negocios\n',
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
-- Table `virtual_roundabout`.`Modificables`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `virtual_roundabout`.`Modificables` (
  `idModificables` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador del ingrediente modificable\n',
  `type` ENUM('argegar', 'quitar', 'remplazar') NOT NULL COMMENT 'Mustra el tipo de modificabilidad\nAgregar: agregar mas del mismo ingrediente\nQuitar: quita el ingrediente\nRemplazar: cambio del ingrediente al modificable\n',
  `ingrediente` VARCHAR(45) NULL COMMENT 'Ingrediente por el cual se modifica',
  `idIngrediente` INT NULL COMMENT 'identificador del ingrediente que se puede modificar\n ',
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
  `idMenu` INT NOT NULL COMMENT 'identificador del menu asociado',
  `idProducto` INT NOT NULL COMMENT 'identificador del producto asociado a los menus',
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

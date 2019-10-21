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
-- Table `mydb`.`persona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`persona` (
  `id_persona` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NULL DEFAULT NULL,
  `papellido` VARCHAR(50) NULL DEFAULT NULL,
  `sapellido` VARCHAR(50) NULL DEFAULT NULL,
  `ci` VARCHAR(10) NULL DEFAULT NULL,
  `telefono` INT(11) NULL DEFAULT NULL,
  `direccion` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`id_persona`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `mydb`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`usuario` (
  `id_usuario` INT(11) NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(50) NULL DEFAULT NULL,
  `contraseña` VARCHAR(50) NULL DEFAULT NULL,
  `persona_id_persona` INT(11) NOT NULL,
  PRIMARY KEY (`id_usuario`, `persona_id_persona`),
  INDEX `fk_usuario_persona1_idx` (`persona_id_persona` ASC),
  CONSTRAINT `fk_usuario_persona1`
    FOREIGN KEY (`persona_id_persona`)
    REFERENCES `mydb`.`persona` (`id_persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `mydb`.`rol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`rol` (
  `id_rol` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NULL DEFAULT NULL,
  PRIMARY KEY (`id_rol`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `mydb`.`cuenta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`cuenta` (
  `usuario_id_usuario` INT(11) NOT NULL,
  `usuario_persona_id_persona` INT(11) NOT NULL,
  `rol_id_rol` INT(11) NOT NULL,
  INDEX `fk_cuenta_usuario1_idx` (`usuario_id_usuario` ASC, `usuario_persona_id_persona` ASC),
  INDEX `fk_cuenta_rol1_idx` (`rol_id_rol` ASC),
  CONSTRAINT `fk_cuenta_usuario1`
    FOREIGN KEY (`usuario_id_usuario` , `usuario_persona_id_persona`)
    REFERENCES `mydb`.`usuario` (`id_usuario` , `persona_id_persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cuenta_rol1`
    FOREIGN KEY (`rol_id_rol`)
    REFERENCES `mydb`.`rol` (`id_rol`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `mydb`.`estudiante`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`estudiante` (
  `id_estudiante` INT(11) NOT NULL AUTO_INCREMENT,
  `activo` TINYINT NOT NULL,
  `persona_id_persona` INT(11) NOT NULL,
  PRIMARY KEY (`id_estudiante`, `activo`, `persona_id_persona`),
  INDEX `fk_estudiante_persona1_idx` (`persona_id_persona` ASC),
  CONSTRAINT `fk_estudiante_persona1`
    FOREIGN KEY (`persona_id_persona`)
    REFERENCES `mydb`.`persona` (`id_persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`funcionalidad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`funcionalidad` (
  `id_funcionalidad` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NULL DEFAULT NULL,
  PRIMARY KEY (`id_funcionalidad`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `mydb`.`privilegios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`privilegios` (
  `rol_id_rol` INT(11) NOT NULL,
  `funcionalidad_id_funcionalidad` INT(11) NOT NULL,
  INDEX `fk_privilegios_rol1_idx` (`rol_id_rol` ASC),
  INDEX `fk_privilegios_funcionalidad1_idx` (`funcionalidad_id_funcionalidad` ASC),
  CONSTRAINT `fk_privilegios_rol1`
    FOREIGN KEY (`rol_id_rol`)
    REFERENCES `mydb`.`rol` (`id_rol`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_privilegios_funcionalidad1`
    FOREIGN KEY (`funcionalidad_id_funcionalidad`)
    REFERENCES `mydb`.`funcionalidad` (`id_funcionalidad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `mydb`.`Tramite_plantilla`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Tramite_plantilla` (
  `idTramite_plantilla` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`idTramite_plantilla`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Area`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Area` (
  `id_area` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`id_area`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Tramite`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Tramite` (
  `id_tramite` INT(11) NOT NULL AUTO_INCREMENT,
  `numero` INT(11) NULL DEFAULT NULL,
  `estudiante_id_estudiante` INT(11) NOT NULL,
  `estudiante_activo` TINYINT NOT NULL,
  `estudiante_persona_id_persona` INT(11) NOT NULL,
  `Tramite_plantilla_idTramite_plantilla` INT NOT NULL,
  `Estado_id_estado` INT NOT NULL,
  PRIMARY KEY (`id_tramite`),
  INDEX `fk_Tramite_estudiante1_idx` (`estudiante_id_estudiante` ASC, `estudiante_activo` ASC, `estudiante_persona_id_persona` ASC),
  INDEX `fk_Tramite_Tramite_plantilla1_idx` (`Tramite_plantilla_idTramite_plantilla` ASC),
  INDEX `fk_Tramite_Estado1_idx` (`Estado_id_estado` ASC),
  CONSTRAINT `fk_Tramite_estudiante1`
    FOREIGN KEY (`estudiante_id_estudiante` , `estudiante_activo` , `estudiante_persona_id_persona`)
    REFERENCES `mydb`.`estudiante` (`id_estudiante` , `activo` , `persona_id_persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Tramite_Tramite_plantilla1`
    FOREIGN KEY (`Tramite_plantilla_idTramite_plantilla`)
    REFERENCES `mydb`.`Tramite_plantilla` (`idTramite_plantilla`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Tramite_Estado1`
    FOREIGN KEY (`Estado_id_estado`)
    REFERENCES `mydb`.`Area` (`id_area`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `mydb`.`Empleado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Empleado` (
  `persona_id_persona` INT(11) NOT NULL,
  PRIMARY KEY (`persona_id_persona`),
  CONSTRAINT `fk_Empleado_persona1`
    FOREIGN KEY (`persona_id_persona`)
    REFERENCES `mydb`.`persona` (`id_persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Requisito`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Requisito` (
  `id_Requisito` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  `valor` VARCHAR(45) NULL,
  `Tramite_id_tramite` INT(11) NOT NULL,
  PRIMARY KEY (`id_Requisito`),
  INDEX `fk_Requisito_Tramite1_idx` (`Tramite_id_tramite` ASC),
  CONSTRAINT `fk_Requisito_Tramite1`
    FOREIGN KEY (`Tramite_id_tramite`)
    REFERENCES `mydb`.`Tramite` (`id_tramite`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Paso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Paso` (
  `id_Paso` INT NOT NULL,
  `fecha_re` DATE NULL,
  `fecha_des` DATE NULL,
  `numero` INT NULL,
  `Tramite_id_tramite` INT(11) NOT NULL,
  `Empleado_persona_id_persona` INT(11) NOT NULL,
  PRIMARY KEY (`id_Paso`),
  INDEX `fk_Paso_Tramite1_idx` (`Tramite_id_tramite` ASC),
  INDEX `fk_Paso_Empleado1_idx` (`Empleado_persona_id_persona` ASC),
  CONSTRAINT `fk_Paso_Tramite1`
    FOREIGN KEY (`Tramite_id_tramite`)
    REFERENCES `mydb`.`Tramite` (`id_tramite`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Paso_Empleado1`
    FOREIGN KEY (`Empleado_persona_id_persona`)
    REFERENCES `mydb`.`Empleado` (`persona_id_persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Curso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Curso` (
  `id_Curso` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`id_Curso`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Cursado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Cursado` (
  `Curso_id_Curso` INT NOT NULL,
  `estudiante_id_estudiante` INT(11) NOT NULL,
  `estudiante_activo` TINYINT NOT NULL,
  `estudiante_persona_id_persona` INT(11) NOT NULL,
  PRIMARY KEY (`Curso_id_Curso`, `estudiante_id_estudiante`, `estudiante_activo`, `estudiante_persona_id_persona`),
  INDEX `fk_Cursado_estudiante1_idx` (`estudiante_id_estudiante` ASC, `estudiante_activo` ASC, `estudiante_persona_id_persona` ASC),
  CONSTRAINT `fk_Cursado_Curso1`
    FOREIGN KEY (`Curso_id_Curso`)
    REFERENCES `mydb`.`Curso` (`id_Curso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Cursado_estudiante1`
    FOREIGN KEY (`estudiante_id_estudiante` , `estudiante_activo` , `estudiante_persona_id_persona`)
    REFERENCES `mydb`.`estudiante` (`id_estudiante` , `activo` , `persona_id_persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Carrera`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Carrera` (
  `id_Carrera` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`id_Carrera`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Estudia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Estudia` (
  `Carrera_id_Carrera` INT NOT NULL,
  `estudiante_id_estudiante` INT(11) NOT NULL,
  `estudiante_activo` TINYINT NOT NULL,
  `estudiante_persona_id_persona` INT(11) NOT NULL,
  PRIMARY KEY (`Carrera_id_Carrera`, `estudiante_id_estudiante`, `estudiante_activo`, `estudiante_persona_id_persona`),
  INDEX `fk_Estudia_estudiante1_idx` (`estudiante_id_estudiante` ASC, `estudiante_activo` ASC, `estudiante_persona_id_persona` ASC),
  CONSTRAINT `fk_Estudia_Carrera1`
    FOREIGN KEY (`Carrera_id_Carrera`)
    REFERENCES `mydb`.`Carrera` (`id_Carrera`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Estudia_estudiante1`
    FOREIGN KEY (`estudiante_id_estudiante` , `estudiante_activo` , `estudiante_persona_id_persona`)
    REFERENCES `mydb`.`estudiante` (`id_estudiante` , `activo` , `persona_id_persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Paso_plantilla`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Paso_plantilla` (
  `id_Pasoplantilla` INT NOT NULL,
  `numero` INT NULL,
  `duracion` INT NULL,
  `nombre` VARCHAR(45) NULL,
  `Tramite_plantilla_idTramite_plantilla` INT NOT NULL,
  PRIMARY KEY (`id_Pasoplantilla`),
  INDEX `fk_Paso_Tramite_plantilla1_idx` (`Tramite_plantilla_idTramite_plantilla` ASC),
  CONSTRAINT `fk_Paso_Tramite_plantilla1`
    FOREIGN KEY (`Tramite_plantilla_idTramite_plantilla`)
    REFERENCES `mydb`.`Tramite_plantilla` (`idTramite_plantilla`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Requisito_plantilla`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Requisito_plantilla` (
  `id_Requisitoplantilla` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`id_Requisitoplantilla`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Necesita`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Necesita` (
  `Requisito_plantilla_id_Requisitoplantilla` INT NOT NULL,
  `Tramite_plantilla_idTramite_plantilla` INT NOT NULL,
  PRIMARY KEY (`Requisito_plantilla_id_Requisitoplantilla`, `Tramite_plantilla_idTramite_plantilla`),
  INDEX `fk_Necesita_Tramite_plantilla1_idx` (`Tramite_plantilla_idTramite_plantilla` ASC),
  CONSTRAINT `fk_Necesita_Requisito_plantilla1`
    FOREIGN KEY (`Requisito_plantilla_id_Requisitoplantilla`)
    REFERENCES `mydb`.`Requisito_plantilla` (`id_Requisitoplantilla`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Necesita_Tramite_plantilla1`
    FOREIGN KEY (`Tramite_plantilla_idTramite_plantilla`)
    REFERENCES `mydb`.`Tramite_plantilla` (`idTramite_plantilla`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

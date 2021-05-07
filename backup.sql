-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema colegio
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema colegio
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `colegio` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci ;
USE `colegio` ;

-- -----------------------------------------------------
-- Table `colegio`.`alumnos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `colegio`.`alumnos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(50) NOT NULL DEFAULT '0',
  `Apellido` VARCHAR(50) NOT NULL DEFAULT '0',
  `Sexo` TINYINT(4) NOT NULL DEFAULT 0,
  `FechaNacimiento` VARCHAR(20) NULL DEFAULT NULL,
  `FechaRegistro` VARCHAR(20) NULL DEFAULT NULL,
  `Correo` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `colegio`.`cursos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `colegio`.`cursos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(500) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `colegio`.`alumno_curso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `colegio`.`alumno_curso` (
  `Curso_id` INT(11) NOT NULL,
  `Alumno_id` INT(11) NOT NULL,
  PRIMARY KEY (`Curso_id`, `Alumno_id`),
  INDEX `Alumno_id` (`Alumno_id` ASC),
  CONSTRAINT `alumno_curso_ibfk_1`
    FOREIGN KEY (`Curso_id`)
    REFERENCES `colegio`.`alumnos` (`id`)
    ON UPDATE CASCADE,
  CONSTRAINT `alumno_curso_ibfk_2`
    FOREIGN KEY (`Alumno_id`)
    REFERENCES `colegio`.`cursos` (`id`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `colegio`.`profesor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `colegio`.`profesor` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(50) NOT NULL,
  `Apellido` VARCHAR(50) NOT NULL,
  `Sexo` TINYINT(4) NOT NULL,
  `Licenciatura` VARCHAR(30) NOT NULL,
  `FechaNacimiento` VARCHAR(20) NULL DEFAULT NULL,
  `FechaRegistro` VARCHAR(20) NULL DEFAULT NULL,
  `Correo` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `colegio`.`alumno_profesor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `colegio`.`alumno_profesor` (
  `profesor_id` INT(11) NOT NULL,
  `alumnos_id` INT(11) NOT NULL,
  PRIMARY KEY (`profesor_id`, `alumnos_id`),
  INDEX `fk_profesor_has_alumnos_alumnos1_idx` (`alumnos_id` ASC),
  INDEX `fk_profesor_has_alumnos_profesor1_idx` (`profesor_id` ASC),
  CONSTRAINT `fk_profesor_has_alumnos_profesor1`
    FOREIGN KEY (`profesor_id`)
    REFERENCES `colegio`.`profesor` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_profesor_has_alumnos_alumnos1`
    FOREIGN KEY (`alumnos_id`)
    REFERENCES `colegio`.`alumnos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

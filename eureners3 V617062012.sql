SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `eureners_cimanti` ;
USE `eureners_cimanti` ;

-- -----------------------------------------------------
-- Table `eureners_cimanti`.`tipos_basicos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`tipos_basicos` (
  `identificador` INT NOT NULL AUTO_INCREMENT ,
  `es_ambito` TINYINT NULL DEFAULT 0 ,
  `nombre` VARCHAR(50) NULL ,
  `fecha_baja` DATETIME NULL ,
  `usuario_crecion` VARCHAR(50) NULL ,
  `fecha_crecion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  PRIMARY KEY (`identificador`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`categorias`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`categorias` (
  `identificador` INT NOT NULL AUTO_INCREMENT ,
  `tipo_basico` INT NULL ,
  `nombre` VARCHAR(255) NULL ,
  `descripcion` VARCHAR(500) NULL ,
  `fecha_baja` DATETIME NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_creacion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  PRIMARY KEY (`identificador`) ,
  INDEX `fk_categorias_tipos_basicos1` (`tipo_basico` ASC) ,
  CONSTRAINT `fk_categorias_tipos_basicos1`
    FOREIGN KEY (`tipo_basico` )
    REFERENCES `eureners_cimanti`.`tipos_basicos` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`productos_finales`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`productos_finales` (
  `identificador` INT NOT NULL AUTO_INCREMENT ,
  `categoria` INT NULL ,
  `nombre` VARCHAR(150) NULL ,
  `descripcion` VARCHAR(250) NULL ,
  `emision_uso_co2` DECIMAL(10,5) NULL ,
  `emision_uso_ch4` DECIMAL(10,5) NULL ,
  `emision_uso_n2o` DECIMAL(10,5) NULL ,
  `emision_uso_co2_eq` DECIMAL(10,5) NULL ,
  `fuente_uso` VARCHAR(255) NULL ,
  `emision_distribucion_co2` DECIMAL(10,5) NULL ,
  `emision_distribucion_ch4` DECIMAL(10,5) NULL ,
  `emision_distribucion_n2o` DECIMAL(10,5) NULL ,
  `emision_distribucion_co2_eq` DECIMAL(10,5) NULL ,
  `fuente_distribucion` DECIMAL(10,5) NULL ,
  `emision_comercio_co2` DECIMAL(10,5) NULL ,
  `emision_comercio_ch4` DECIMAL(10,5) NULL ,
  `emision_comercio_n2o` DECIMAL(10,5) NULL ,
  `emision_comercio_co2_eq` DECIMAL(10,5) NULL ,
  `fuente_comercio` DECIMAL(10,5) NULL ,
  `unidad` VARCHAR(50) NULL ,
  `fecha_baja` DATETIME NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_creacion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  PRIMARY KEY (`identificador`) ,
  UNIQUE INDEX `id_tipos_usos_UNIQUE` (`identificador` ASC) ,
  INDEX `fk_productos_finales_categorias1` (`categoria` ASC) ,
  CONSTRAINT `fk_productos_finales_categorias1`
    FOREIGN KEY (`categoria` )
    REFERENCES `eureners_cimanti`.`categorias` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = 'Tabla que almacena los usos finales de las explotaciones (pr' /* comment truncated */;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`grupos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`grupos` (
  `identificador` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(50) NULL ,
  `fecha_baja` DATETIME NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_creacion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  PRIMARY KEY (`identificador`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`provincias`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`provincias` (
  `identificador` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(100) NULL ,
  `fecha_baja` DATETIME NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_creacion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  PRIMARY KEY (`identificador`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`municipios`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`municipios` (
  `identificador` INT NOT NULL AUTO_INCREMENT ,
  `provincia` INT NULL ,
  `municipio` VARCHAR(100) NULL ,
  `temperatura` DECIMAL(10,5) NULL ,
  `fuente` VARCHAR(255) NULL ,
  `fecha_baja` DATETIME NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_creacion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  PRIMARY KEY (`identificador`) ,
  INDEX `fk_municipios_provincias1` (`provincia` ASC) ,
  CONSTRAINT `fk_municipios_provincias1`
    FOREIGN KEY (`provincia` )
    REFERENCES `eureners_cimanti`.`provincias` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`empresas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`empresas` (
  `identificador` BIGINT NOT NULL AUTO_INCREMENT ,
  `provincia` INT NOT NULL ,
  `municipio` INT NOT NULL ,
  `cif` CHAR(16) NULL ,
  `nombre` VARCHAR(50) NULL ,
  `codigo` VARCHAR(45) NULL ,
  `es_agricola` TINYINT NULL ,
  `es_ganadera` TINYINT NULL ,
  `es_transformacion` TINYINT NULL ,
  `direccion` VARCHAR(50) NULL ,
  `numero` CHAR(3) NULL ,
  `planta` CHAR(2) NULL ,
  `puerta` CHAR(2) NULL ,
  `codigo_postal` CHAR(5) NULL ,
  `telefono` VARCHAR(20) NULL ,
  `fecha_inicio` DATETIME NULL ,
  `fecha_fin` DATETIME NULL ,
  `fecha_baja` DATETIME NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_creacion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  PRIMARY KEY (`identificador`) ,
  INDEX `fk_empresas_municipios1` (`municipio` ASC) ,
  INDEX `fk_empresas_provincias1` (`provincia` ASC) ,
  CONSTRAINT `fk_empresas_municipios1`
    FOREIGN KEY (`municipio` )
    REFERENCES `eureners_cimanti`.`municipios` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresas_provincias1`
    FOREIGN KEY (`provincia` )
    REFERENCES `eureners_cimanti`.`provincias` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = '		';


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`usuarios`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`usuarios` (
  `usuario` VARCHAR(50) NOT NULL ,
  `grupo` INT NULL ,
  `empresa` BIGINT NULL ,
  `clave` VARCHAR(30) NULL ,
  `nombre` VARCHAR(50) NULL ,
  `apellidos` VARCHAR(100) NULL ,
  `email` VARCHAR(60) NULL ,
  `telefono` VARCHAR(20) NULL ,
  `idioma` VARCHAR(50) NULL ,
  `fecha_baja` DATETIME NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_creacion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  INDEX `fk_usuarios_grupos1` (`grupo` ASC) ,
  INDEX `fk_usuarios_empresas1` (`empresa` ASC) ,
  PRIMARY KEY (`usuario`) ,
  CONSTRAINT `fk_usuarios_grupos1`
    FOREIGN KEY (`grupo` )
    REFERENCES `eureners_cimanti`.`grupos` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarios_empresas1`
    FOREIGN KEY (`empresa` )
    REFERENCES `eureners_cimanti`.`empresas` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`menus`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`menus` (
  `identificador` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(50) NULL ,
  `descripcion` VARCHAR(255) NULL ,
  `fecha_baja` DATETIME NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_creacion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  PRIMARY KEY (`identificador`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`permisos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`permisos` (
  `menu` INT NOT NULL ,
  `grupo` INT NOT NULL ,
  `permisos` INT NULL ,
  `fecha_baja` DATETIME NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_creacion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  PRIMARY KEY (`menu`, `grupo`) ,
  INDEX `fk_menus_has_grupos_grupos1` (`grupo` ASC) ,
  INDEX `fk_menus_has_grupos_menus1` (`menu` ASC) ,
  CONSTRAINT `fk_menus_has_grupos_menus1`
    FOREIGN KEY (`menu` )
    REFERENCES `eureners_cimanti`.`menus` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_menus_has_grupos_grupos1`
    FOREIGN KEY (`grupo` )
    REFERENCES `eureners_cimanti`.`grupos` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`cultivos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`cultivos` (
  `identificador` INT NOT NULL AUTO_INCREMENT ,
  `categoria` INT NULL ,
  `nombre` VARCHAR(255) NULL ,
  `extraccion_kg_n` DECIMAL(10,5) NULL ,
  `extraccion_kg_p` DECIMAL(10,5) NULL ,
  `extraccion_kg_k` DECIMAL(10,5) NULL ,
  `unidad` VARCHAR(50) NULL ,
  `mj` DECIMAL(10,5) NULL ,
  `kg_ct` DECIMAL(10,5) NULL ,
  `fracrenew` DECIMAL(10,5) NULL ,
  `slope` DECIMAL(10,5) NULL ,
  `intercept` DECIMAL(10,5) NULL ,
  `nag` DECIMAL(10,5) NULL ,
  `nbg` DECIMAL(10,5) NULL ,
  `rbg_bio` DECIMAL(10,5) NULL ,
  `materia_seca` DECIMAL(10,5) NULL ,
  `residuo_cultivo` DECIMAL(10,5) NULL ,
  `porcentaje_residuo` DECIMAL(10,5) NULL ,
  `fuente` VARCHAR(255) NULL ,
  `fecha_baja` DATETIME NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_creacion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  PRIMARY KEY (`identificador`) ,
  INDEX `fk_cultivos_categorias1` (`categoria` ASC) ,
  CONSTRAINT `fk_cultivos_categorias1`
    FOREIGN KEY (`categoria` )
    REFERENCES `eureners_cimanti`.`categorias` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`animales`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`animales` (
  `identificador` INT NOT NULL AUTO_INCREMENT ,
  `categoria` INT NULL ,
  `nombre` VARCHAR(255) NULL ,
  `peso_medio` DECIMAL(10,5) NULL ,
  `porcentaje_n` DECIMAL(10,5) NULL ,
  `porcentaje_p` DECIMAL(10,5) NULL ,
  `porcentaje_k` DECIMAL(10,5) NULL ,
  `mj_peso_vivo` DECIMAL(10,5) NULL ,
  `ugm` DECIMAL(10,5) NULL ,
  `fermentacion` DECIMAL(10,5) NULL ,
  `fuente` VARCHAR(255) NULL ,
  `fecha_baja` DATETIME NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_creacion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  PRIMARY KEY (`identificador`) ,
  INDEX `fk_animales_categorias1` (`categoria` ASC) ,
  CONSTRAINT `fk_animales_categorias1`
    FOREIGN KEY (`categoria` )
    REFERENCES `eureners_cimanti`.`categorias` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`instalaciones`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`instalaciones` (
  `identificador` INT NOT NULL AUTO_INCREMENT ,
  `categoria` INT NULL ,
  `nombre` VARCHAR(255) NULL ,
  `mjul_m2` DECIMAL(10,5) NULL ,
  `amortizacion` DECIMAL(10,5) NULL ,
  `material` VARCHAR(255) NULL ,
  `emision_co2` DECIMAL(10,5) NULL ,
  `emision_n2o` DECIMAL(10,5) NULL ,
  `emision_ch4` DECIMAL(10,5) NULL ,
  `emision_co2_eq` DECIMAL(10,5) NULL ,
  `unidad` VARCHAR(50) NULL ,
  `fuente` VARCHAR(255) NULL ,
  `fecha_baja` DATETIME NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_creacion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  PRIMARY KEY (`identificador`) ,
  INDEX `fk_instalaciones_categorias1` (`categoria` ASC) ,
  CONSTRAINT `fk_instalaciones_categorias1`
    FOREIGN KEY (`categoria` )
    REFERENCES `eureners_cimanti`.`categorias` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`log`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`log` (
  `identificador` BIGINT NOT NULL AUTO_INCREMENT ,
  `menu` INT NULL ,
  `usuario` VARCHAR(50) NULL ,
  `fecha` DATETIME NULL ,
  `accion` TINYINT NULL ,
  `clave` TEXT NULL ,
  PRIMARY KEY (`identificador`) ,
  INDEX `fk_Log_menus` (`menu` ASC) ,
  INDEX `fk_log_usuarios` (`usuario` ASC) ,
  CONSTRAINT `fk_Log_menus`
    FOREIGN KEY (`menu` )
    REFERENCES `eureners_cimanti`.`menus` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_log_usuarios`
    FOREIGN KEY (`usuario` )
    REFERENCES `eureners_cimanti`.`usuarios` (`usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`maquinarias`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`maquinarias` (
  `identificador` INT NOT NULL AUTO_INCREMENT ,
  `categoria` INT NULL ,
  `es_vehiculo_transporte` TINYINT NULL DEFAULT 0 ,
  `es_maquinaria_transformacion` TINYINT NULL DEFAULT 0 ,
  `es_maquinaria_produccion` TINYINT NULL DEFAULT 0 ,
  `es_maquinaria_frio` TINYINT NULL ,
  `nombre` VARCHAR(150) NULL ,
  `material` VARCHAR(255) NULL ,
  `marca` VARCHAR(50) NULL ,
  `modelo` VARCHAR(255) NULL ,
  `combustible` VARCHAR(100) NULL ,
  `emision_co2_material` DECIMAL(10,5) NULL ,
  `peso_standard` DECIMAL(10,5) NULL ,
  `antiguedad` DECIMAL(10,5) NULL ,
  `vida_util` DECIMAL(10,5) NULL ,
  `horas` DECIMAL(10,5) NULL ,
  `has` DECIMAL(10,5) NULL ,
  `mj_kg` DECIMAL(10,5) NULL ,
  `emision_co2` DECIMAL(10,5) NULL ,
  `emision_n2o` DECIMAL(10,5) NULL ,
  `emision_ch4` DECIMAL(10,5) NULL ,
  `emision_co2_eq` DECIMAL(10,5) NULL ,
  `unidad` VARCHAR(50) NULL ,
  `amortizacion` DECIMAL(10,5) NULL ,
  `fuente` VARCHAR(255) NULL ,
  `fecha_baja` DATETIME NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_creacion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  PRIMARY KEY (`identificador`) ,
  INDEX `fk_maquinarias_categorias1` (`categoria` ASC) ,
  CONSTRAINT `fk_maquinarias_categorias1`
    FOREIGN KEY (`categoria` )
    REFERENCES `eureners_cimanti`.`categorias` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`energias`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`energias` (
  `identificador` INT NOT NULL AUTO_INCREMENT ,
  `categoria` INT NULL ,
  `nombre` VARCHAR(255) NULL ,
  `year` INT NULL ,
  `mix` DECIMAL(10,5) NULL ,
  `emision_co2` DECIMAL(10,5) NULL ,
  `emision_ch4` DECIMAL(10,5) NULL ,
  `emision_n2o` DECIMAL(10,5) NULL ,
  `emision_co2_eq` DECIMAL(10,5) NULL ,
  `unidad` VARCHAR(50) NULL ,
  `fuente` VARCHAR(255) NULL ,
  `alcance` TINYINT NULL ,
  `fecha_baja` DATETIME NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_creacion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  PRIMARY KEY (`identificador`) ,
  INDEX `fk_energias_categorias1` (`categoria` ASC) ,
  CONSTRAINT `fk_energias_categorias1`
    FOREIGN KEY (`categoria` )
    REFERENCES `eureners_cimanti`.`categorias` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`labores`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`labores` (
  `identificador` INT NOT NULL AUTO_INCREMENT ,
  `categoria` INT NULL ,
  `energia` INT NULL ,
  `nombre` VARCHAR(255) NULL ,
  `consumo` DECIMAL(10,5) NULL ,
  `rendimiento` DECIMAL(10,5) NULL ,
  `mjul_ha` DECIMAL(10,5) NULL ,
  `unidad` VARCHAR(50) NULL ,
  `mj_kg_material` DECIMAL(10,5) NULL ,
  `fuente` VARCHAR(255) NULL ,
  `fecha_baja` DATETIME NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_creacion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  PRIMARY KEY (`identificador`) ,
  INDEX `fk_labores_categorias1` (`categoria` ASC) ,
  INDEX `fk_labores_energias1` (`energia` ASC) ,
  CONSTRAINT `fk_labores_categorias1`
    FOREIGN KEY (`categoria` )
    REFERENCES `eureners_cimanti`.`categorias` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_labores_energias1`
    FOREIGN KEY (`energia` )
    REFERENCES `eureners_cimanti`.`energias` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`residuos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`residuos` (
  `identificador` INT NOT NULL AUTO_INCREMENT ,
  `categoria` INT NULL ,
  `codigo_ler` VARCHAR(50) NULL ,
  `tipo_residuo` VARCHAR(50) NULL ,
  `nombre` VARCHAR(255) NULL ,
  `fuente` VARCHAR(255) NULL ,
  `fecha_baja` DATETIME NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_creacion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  PRIMARY KEY (`identificador`) ,
  INDEX `fk_residuos_categorias1` (`categoria` ASC) ,
  CONSTRAINT `fk_residuos_categorias1`
    FOREIGN KEY (`categoria` )
    REFERENCES `eureners_cimanti`.`categorias` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`materias_primas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`materias_primas` (
  `identificador` INT NOT NULL AUTO_INCREMENT ,
  `categoria` INT NULL ,
  `tipo_materia_prima` VARCHAR(50) NULL ,
  `nombre` VARCHAR(255) NULL ,
  `unidad` VARCHAR(50) NULL ,
  `emision_co2` DECIMAL(10,5) NULL ,
  `emision_n2o` DECIMAL(10,5) NULL ,
  `emision_ch4` DECIMAL(10,5) NULL ,
  `emision_co2_eq` DECIMAL(10,5) NULL ,
  `formulacion` VARCHAR(255) NULL ,
  `compuesto` VARCHAR(255) NULL ,
  `fuente` VARCHAR(255) NULL ,
  `fecha_baja` DATETIME NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_creacion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  PRIMARY KEY (`identificador`) ,
  INDEX `fk_materias_primas_categorias1` (`categoria` ASC) ,
  CONSTRAINT `fk_materias_primas_categorias1`
    FOREIGN KEY (`categoria` )
    REFERENCES `eureners_cimanti`.`categorias` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`servicios_auxiliares`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`servicios_auxiliares` (
  `identificador` INT NOT NULL AUTO_INCREMENT ,
  `categoria` INT NULL ,
  `nombre` VARCHAR(255) NULL ,
  `fecha_baja` DATETIME NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_creacion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  PRIMARY KEY (`identificador`) ,
  INDEX `fk_servicios_auxiliares_categorias1` (`categoria` ASC) ,
  CONSTRAINT `fk_servicios_auxiliares_categorias1`
    FOREIGN KEY (`categoria` )
    REFERENCES `eureners_cimanti`.`categorias` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`consumibles`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`consumibles` (
  `identificador` INT NOT NULL AUTO_INCREMENT ,
  `categoria` INT NULL ,
  `nombre` VARCHAR(255) NULL ,
  `emision_co2` DECIMAL(10,5) NULL ,
  `emision_n2o` DECIMAL(10,5) NULL ,
  `emision_ch4` DECIMAL(10,5) NULL ,
  `emision_co2_eq` DECIMAL(10,5) NULL ,
  `unidad` VARCHAR(50) NULL ,
  `fuente` VARCHAR(255) NULL ,
  `fecha_baja` DATETIME NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_creacion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  PRIMARY KEY (`identificador`) ,
  INDEX `fk_consumibles_categorias1` (`categoria` ASC) ,
  CONSTRAINT `fk_consumibles_categorias1`
    FOREIGN KEY (`categoria` )
    REFERENCES `eureners_cimanti`.`categorias` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`productos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`productos` (
  `identificador` INT NOT NULL AUTO_INCREMENT ,
  `categoria` INT NULL ,
  `nombre` VARCHAR(255) NULL ,
  `tipo_producto` VARCHAR(50) NULL ,
  `fijacion_c` DECIMAL(10,5) NULL ,
  `valor_energetico` DECIMAL(10,5) NULL ,
  `extraccion_kg_n` DECIMAL(10,5) NULL ,
  `extraccion_kg_p` DECIMAL(10,5) NULL ,
  `extraccion_kg_k` DECIMAL(10,5) NULL ,
  `unidad` VARCHAR(50) NULL ,
  `precio` DECIMAL(10,5) NULL ,
  `fuente` VARCHAR(255) NULL ,
  `fecha_baja` DATETIME NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_creacion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  PRIMARY KEY (`identificador`) ,
  INDEX `fk_productos_categorias1` (`categoria` ASC) ,
  CONSTRAINT `fk_productos_categorias1`
    FOREIGN KEY (`categoria` )
    REFERENCES `eureners_cimanti`.`categorias` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`procesos_transformacion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`procesos_transformacion` (
  `identificador` INT NOT NULL AUTO_INCREMENT ,
  `uso_final` INT NULL ,
  `nombre` VARCHAR(100) NULL ,
  `orden` INT NULL ,
  `fecha_baja` DATETIME NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_crecion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  PRIMARY KEY (`identificador`) ,
  INDEX `fk_procesos_transformacion_usos_finales1` (`uso_final` ASC) ,
  CONSTRAINT `fk_procesos_transformacion_usos_finales1`
    FOREIGN KEY (`uso_final` )
    REFERENCES `eureners_cimanti`.`productos_finales` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`labor_maquinarias`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`labor_maquinarias` (
  `labor` INT NOT NULL ,
  `maquinaria` INT NOT NULL ,
  `fecha_baja` DATETIME NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_creacion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  PRIMARY KEY (`labor`, `maquinaria`) ,
  INDEX `fk_labores_has_maquinarias_maquinarias1` (`maquinaria` ASC) ,
  INDEX `fk_labores_has_maquinarias_labores1` (`labor` ASC) ,
  CONSTRAINT `fk_labores_has_maquinarias_labores1`
    FOREIGN KEY (`labor` )
    REFERENCES `eureners_cimanti`.`labores` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_labores_has_maquinarias_maquinarias1`
    FOREIGN KEY (`maquinaria` )
    REFERENCES `eureners_cimanti`.`maquinarias` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`proceso_maquinarias`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`proceso_maquinarias` (
  `proceso_transformacion` INT NOT NULL ,
  `maquinaria` INT NOT NULL ,
  `fecha_baja` DATETIME NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_creacion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  PRIMARY KEY (`proceso_transformacion`, `maquinaria`) ,
  INDEX `fk_procesos_transformacion_has_maquinarias_maquinarias1` (`maquinaria` ASC) ,
  INDEX `fk_procesos_transformacion_has_maquinarias_procesos_transform1` (`proceso_transformacion` ASC) ,
  CONSTRAINT `fk_procesos_transformacion_has_maquinarias_procesos_transform1`
    FOREIGN KEY (`proceso_transformacion` )
    REFERENCES `eureners_cimanti`.`procesos_transformacion` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_procesos_transformacion_has_maquinarias_maquinarias1`
    FOREIGN KEY (`maquinaria` )
    REFERENCES `eureners_cimanti`.`maquinarias` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`empresa_unidades_funcionales`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`empresa_unidades_funcionales` (
  `empresa` BIGINT NOT NULL ,
  `producto_final` INT NOT NULL ,
  `categoria` INT NULL ,
  `es_produccion` TINYINT NULL ,
  `es_transformacion` TINYINT NULL ,
  `nombre` VARCHAR(150) NULL ,
  `descripcion` VARCHAR(255) NULL ,
  `cantidad_unidad` VARCHAR(50) NULL ,
  `emision_co2` DECIMAL(10,5) NULL ,
  `emision_ch4` DECIMAL(10,5) NULL ,
  `emision_n2o` DECIMAL(10,5) NULL ,
  `emision_co2_eq` DECIMAL(10,5) NULL ,
  `unidad` VARCHAR(50) NULL ,
  `fuente` VARCHAR(255) NULL ,
  `fecha_baja` DATETIME NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_creacion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  PRIMARY KEY (`empresa`, `producto_final`) ,
  INDEX `fk_empresas_has_usos_finales_empresas1` (`empresa` ASC) ,
  INDEX `fk_empresa_unidades_funcionales_productos_finales1` (`producto_final` ASC) ,
  INDEX `fk_empresa_unidades_funcionales_categorias1` (`categoria` ASC) ,
  CONSTRAINT `fk_empresas_has_usos_finales_empresas1`
    FOREIGN KEY (`empresa` )
    REFERENCES `eureners_cimanti`.`empresas` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresa_unidades_funcionales_productos_finales1`
    FOREIGN KEY (`producto_final` )
    REFERENCES `eureners_cimanti`.`productos_finales` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresa_unidades_funcionales_categorias1`
    FOREIGN KEY (`categoria` )
    REFERENCES `eureners_cimanti`.`categorias` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`empresa_energias`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`empresa_energias` (
  `energia` INT NOT NULL ,
  `empresa` BIGINT NOT NULL ,
  `categoria` INT NULL ,
  `es_produccion` TINYINT NULL ,
  `es_transformacion` TINYINT NULL ,
  `cantidad` DECIMAL(10,5) NULL ,
  `mjul` DECIMAL(10,5) NULL ,
  `emision_co2` DECIMAL(10,5) NULL ,
  `emision_ch4` DECIMAL(10,5) NULL ,
  `emision_n2o` DECIMAL(10,5) NULL ,
  `emision_co2_eq` DECIMAL(10,5) NULL ,
  `unidad` VARCHAR(50) NULL ,
  `fuente` VARCHAR(255) NULL ,
  `mix` VARCHAR(50) NULL ,
  `fecha_baja` DATETIME NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_creacion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  PRIMARY KEY (`energia`, `empresa`) ,
  INDEX `fk_energias_has_empresas_empresas1` (`empresa` ASC) ,
  INDEX `fk_energias_has_empresas_energias1` (`energia` ASC) ,
  INDEX `fk_empresa_energias_categorias1` (`categoria` ASC) ,
  CONSTRAINT `fk_energias_has_empresas_energias1`
    FOREIGN KEY (`energia` )
    REFERENCES `eureners_cimanti`.`energias` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_energias_has_empresas_empresas1`
    FOREIGN KEY (`empresa` )
    REFERENCES `eureners_cimanti`.`empresas` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresa_energias_categorias1`
    FOREIGN KEY (`categoria` )
    REFERENCES `eureners_cimanti`.`categorias` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`empresa_instalaciones`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`empresa_instalaciones` (
  `instalacion` INT NOT NULL ,
  `empresa` BIGINT NOT NULL ,
  `categoria` INT NULL ,
  `es_produccion` TINYINT NULL ,
  `es_transformacion` TINYINT NULL ,
  `superficie` DECIMAL(10,5) NULL ,
  `antiguedad` DECIMAL(10,5) NULL ,
  `emision_co2` DECIMAL(10,5) NULL ,
  `emision_ch4` DECIMAL(10,5) NULL ,
  `emision_n2o` DECIMAL(10,5) NULL ,
  `emision_co2_eq` DECIMAL(10,5) NULL ,
  `unidad` VARCHAR(50) NULL ,
  `fuente` VARCHAR(255) NULL ,
  `fecha_baja` DATETIME NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_creacion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  PRIMARY KEY (`instalacion`, `empresa`) ,
  INDEX `fk_instalaciones_has_empresas_empresas1` (`empresa` ASC) ,
  INDEX `fk_instalaciones_has_empresas_instalaciones1` (`instalacion` ASC) ,
  INDEX `fk_empresa_instalaciones_categorias1` (`categoria` ASC) ,
  CONSTRAINT `fk_instalaciones_has_empresas_instalaciones1`
    FOREIGN KEY (`instalacion` )
    REFERENCES `eureners_cimanti`.`instalaciones` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_instalaciones_has_empresas_empresas1`
    FOREIGN KEY (`empresa` )
    REFERENCES `eureners_cimanti`.`empresas` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresa_instalaciones_categorias1`
    FOREIGN KEY (`categoria` )
    REFERENCES `eureners_cimanti`.`categorias` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`empresa_servicios_auxiliares`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`empresa_servicios_auxiliares` (
  `servicio_auxiliar` INT NOT NULL ,
  `empresa` BIGINT NOT NULL ,
  `categoria` INT NULL ,
  `energia` INT NULL ,
  `potencia` DECIMAL(10,5) NULL ,
  `horas` DECIMAL(10,5) NULL ,
  `es_produccion` TINYINT NULL ,
  `es_transformacion` TINYINT NULL ,
  `fecha_baja` DATETIME NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_creacion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  PRIMARY KEY (`servicio_auxiliar`, `empresa`) ,
  INDEX `fk_servicios_auxiliares_has_empresas_empresas1` (`empresa` ASC) ,
  INDEX `fk_servicios_auxiliares_has_empresas_servicios_auxiliares1` (`servicio_auxiliar` ASC) ,
  INDEX `fk_empresa_servicios_auxiliares_energias1` (`energia` ASC) ,
  INDEX `fk_empresa_servicios_auxiliares_categorias1` (`categoria` ASC) ,
  CONSTRAINT `fk_servicios_auxiliares_has_empresas_servicios_auxiliares1`
    FOREIGN KEY (`servicio_auxiliar` )
    REFERENCES `eureners_cimanti`.`servicios_auxiliares` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_servicios_auxiliares_has_empresas_empresas1`
    FOREIGN KEY (`empresa` )
    REFERENCES `eureners_cimanti`.`empresas` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresa_servicios_auxiliares_energias1`
    FOREIGN KEY (`energia` )
    REFERENCES `eureners_cimanti`.`energias` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresa_servicios_auxiliares_categorias1`
    FOREIGN KEY (`categoria` )
    REFERENCES `eureners_cimanti`.`categorias` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`empresa_cultivos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`empresa_cultivos` (
  `cultivo` INT NOT NULL ,
  `empresa` BIGINT NOT NULL ,
  `categoria` INT NULL ,
  `superficie` DECIMAL(10,5) NULL ,
  `rendimiento` DECIMAL(10,5) NULL ,
  `es_produccion` TINYINT NULL DEFAULT 0 ,
  `es_transformacion` TINYINT NULL DEFAULT 1 ,
  `residuo_cultivo` DECIMAL(10,5) NULL ,
  `porcentaje_residuo` DECIMAL(10,5) NULL ,
  `fecha_baja` DATETIME NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_creacion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  PRIMARY KEY (`cultivo`, `empresa`) ,
  INDEX `fk_cultivos_has_empresas_empresas1` (`empresa` ASC) ,
  INDEX `fk_cultivos_has_empresas_cultivos1` (`cultivo` ASC) ,
  INDEX `fk_empresa_cultivos_categorias1` (`categoria` ASC) ,
  CONSTRAINT `fk_cultivos_has_empresas_cultivos1`
    FOREIGN KEY (`cultivo` )
    REFERENCES `eureners_cimanti`.`cultivos` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cultivos_has_empresas_empresas1`
    FOREIGN KEY (`empresa` )
    REFERENCES `eureners_cimanti`.`empresas` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresa_cultivos_categorias1`
    FOREIGN KEY (`categoria` )
    REFERENCES `eureners_cimanti`.`categorias` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`empresa_animales`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`empresa_animales` (
  `animal` INT NOT NULL ,
  `empresa` BIGINT NOT NULL ,
  `categoria` INT NULL ,
  `es_produccion` TINYINT NULL ,
  `es_transformacion` TINYINT NULL ,
  `numero` DECIMAL(10,5) NULL ,
  `dias_en_explotacion` DECIMAL(10,5) NULL ,
  `ciclos_plaza` DECIMAL(10,5) NULL ,
  `porcentaje_pastoreo` DECIMAL(10,5) NULL ,
  `emision_co2` DECIMAL(10,5) NULL ,
  `emision_ch4` DECIMAL(10,5) NULL ,
  `emision_n2o` DECIMAL(10,5) NULL ,
  `emision_co2_eq` DECIMAL(10,5) NULL ,
  `unidad` VARCHAR(50) NULL ,
  `fuente` VARCHAR(255) NULL ,
  `fecha_baja` DATETIME NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_creacion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  PRIMARY KEY (`animal`, `empresa`) ,
  INDEX `fk_animales_has_empresas_empresas1` (`empresa` ASC) ,
  INDEX `fk_animales_has_empresas_animales1` (`animal` ASC) ,
  INDEX `fk_empresa_animales_categorias1` (`categoria` ASC) ,
  CONSTRAINT `fk_animales_has_empresas_animales1`
    FOREIGN KEY (`animal` )
    REFERENCES `eureners_cimanti`.`animales` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_animales_has_empresas_empresas1`
    FOREIGN KEY (`empresa` )
    REFERENCES `eureners_cimanti`.`empresas` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresa_animales_categorias1`
    FOREIGN KEY (`categoria` )
    REFERENCES `eureners_cimanti`.`categorias` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`empresa_productos_resultantes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`empresa_productos_resultantes` (
  `identificador` INT NOT NULL AUTO_INCREMENT ,
  `empresa` BIGINT NOT NULL ,
  `producto` INT NULL ,
  `cultivo` INT NULL ,
  `categoria` INT NULL ,
  `animal` INT NULL ,
  `es_transformacion` TINYINT NULL ,
  `es_produccion` TINYINT NULL ,
  `nombre` VARCHAR(150) NULL ,
  `descripcion` VARCHAR(255) NULL ,
  `unidad` VARCHAR(50) NULL ,
  `cantidad` DECIMAL(10,5) NULL ,
  `rendimiento` DECIMAL(10,5) NULL ,
  `fraccion_comercial` DECIMAL(10,5) NULL ,
  `porcentaje_rastrojo` DECIMAL(10,5) NULL ,
  `porcentaje_quema` DECIMAL(10,5) NULL ,
  `fecha_baja` DATETIME NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_creacion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  PRIMARY KEY (`identificador`) ,
  INDEX `fk_productos_has_empresas_empresas1` (`empresa` ASC) ,
  INDEX `fk_productos_has_empresas_productos1` (`producto` ASC) ,
  INDEX `fk_empresa_productos_empresa_cultivos1` (`cultivo` ASC) ,
  INDEX `fk_empresa_productos_resultantes_empresa_animales1` (`animal` ASC) ,
  INDEX `fk_empresa_productos_resultantes_categorias1` (`categoria` ASC) ,
  CONSTRAINT `fk_productos_has_empresas_productos1`
    FOREIGN KEY (`producto` )
    REFERENCES `eureners_cimanti`.`productos` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_productos_has_empresas_empresas1`
    FOREIGN KEY (`empresa` )
    REFERENCES `eureners_cimanti`.`empresas` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresa_productos_empresa_cultivos1`
    FOREIGN KEY (`cultivo` )
    REFERENCES `eureners_cimanti`.`empresa_cultivos` (`cultivo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresa_productos_resultantes_empresa_animales1`
    FOREIGN KEY (`animal` )
    REFERENCES `eureners_cimanti`.`empresa_animales` (`animal` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresa_productos_resultantes_categorias1`
    FOREIGN KEY (`categoria` )
    REFERENCES `eureners_cimanti`.`categorias` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`empresa_materias_primas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`empresa_materias_primas` (
  `materia_prima` INT NOT NULL ,
  `empresa` BIGINT NOT NULL ,
  `cultivo` INT NULL ,
  `animal` INT NULL ,
  `categoria` INT NULL ,
  `es_produccion` TINYINT NULL DEFAULT 0 ,
  `es_transformacion` TINYINT NULL DEFAULT 0 ,
  `descripcion` VARCHAR(255) NULL ,
  `cantidad` DECIMAL(10,5) NULL ,
  `emision_co2` DECIMAL(10,5) NULL ,
  `emision_ch4` DECIMAL(10,5) NULL ,
  `emision_n2o` DECIMAL(10,5) NULL ,
  `emision_co2_eq` DECIMAL(10,5) NULL ,
  `unidad` VARCHAR(50) NULL ,
  `fuente` VARCHAR(255) NULL ,
  `fecha_baja` DATETIME NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_creacion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  PRIMARY KEY (`materia_prima`, `empresa`) ,
  INDEX `fk_materias_primas_has_empresas_empresas1` (`empresa` ASC) ,
  INDEX `fk_materias_primas_has_empresas_materias_primas1` (`materia_prima` ASC) ,
  INDEX `fk_materias_primas_has_empresas_empresa_cultivos1` (`cultivo` ASC) ,
  INDEX `fk_empresa_materias_primas_empresa_animales1` (`animal` ASC) ,
  INDEX `fk_empresa_materias_primas_categorias1` (`categoria` ASC) ,
  CONSTRAINT `fk_materias_primas_has_empresas_materias_primas1`
    FOREIGN KEY (`materia_prima` )
    REFERENCES `eureners_cimanti`.`materias_primas` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_materias_primas_has_empresas_empresas1`
    FOREIGN KEY (`empresa` )
    REFERENCES `eureners_cimanti`.`empresas` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_materias_primas_has_empresas_empresa_cultivos1`
    FOREIGN KEY (`cultivo` )
    REFERENCES `eureners_cimanti`.`empresa_cultivos` (`cultivo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresa_materias_primas_empresa_animales1`
    FOREIGN KEY (`animal` )
    REFERENCES `eureners_cimanti`.`empresa_animales` (`animal` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresa_materias_primas_categorias1`
    FOREIGN KEY (`categoria` )
    REFERENCES `eureners_cimanti`.`categorias` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`tratamientos_residuos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`tratamientos_residuos` (
  `identificador` INT NOT NULL AUTO_INCREMENT ,
  `categoria` INT NULL ,
  `nombre` VARCHAR(255) NULL ,
  `emision_co2` DECIMAL(10,5) NULL ,
  `emision_ch4` DECIMAL(10,5) NULL ,
  `emision_n2o` DECIMAL(10,5) NULL ,
  `emision_co2_eq` DECIMAL(10,5) NULL ,
  `unidad` VARCHAR(50) NULL ,
  `energia` INT NULL ,
  `fuente` VARCHAR(255) NULL ,
  `fecha_baja` DATETIME NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_creacion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  PRIMARY KEY (`identificador`) ,
  INDEX `fk_tratamientos_residuos_categorias1` (`categoria` ASC) ,
  INDEX `fk_tratamientos_residuos_energias1` (`energia` ASC) ,
  CONSTRAINT `fk_tratamientos_residuos_categorias1`
    FOREIGN KEY (`categoria` )
    REFERENCES `eureners_cimanti`.`categorias` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tratamientos_residuos_energias1`
    FOREIGN KEY (`energia` )
    REFERENCES `eureners_cimanti`.`energias` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`empresa_procesos_producto_final`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`empresa_procesos_producto_final` (
  `proceso_transformacion` INT NOT NULL ,
  `empresa` BIGINT NOT NULL ,
  `producto_final` INT NOT NULL ,
  `maquinaria` INT NULL ,
  `categoria` INT NULL ,
  `es_produccion` TINYINT NULL ,
  `es_transformacion` TINYINT NULL ,
  `cantidad` DECIMAL(10,5) NULL ,
  `horas` DECIMAL(10,5) NULL ,
  `potencia` DECIMAL(10,5) NULL ,
  `orden` INT NULL ,
  `emision_co2` DECIMAL(10,5) NULL ,
  `emision_ch4` DECIMAL(10,5) NULL ,
  `emision_n2o` DECIMAL(10,5) NULL ,
  `emision_co2_eq` DECIMAL(10,5) NULL ,
  `unidad` VARCHAR(50) NULL ,
  `fuente` VARCHAR(255) NULL ,
  `fecha_baja` DATETIME NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_creacion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  PRIMARY KEY (`proceso_transformacion`, `empresa`, `producto_final`) ,
  INDEX `fk_procesos_transformacion_has_empresa_unidades_funcionales_e1` (`empresa` ASC, `producto_final` ASC) ,
  INDEX `fk_procesos_transformacion_has_empresa_unidades_funcionales_p1` (`proceso_transformacion` ASC) ,
  INDEX `fk_procesos_transformacion_has_empresa_unidades_funcionales_p2` (`maquinaria` ASC) ,
  INDEX `fk_empresa_procesos_producto_final_categorias1` (`categoria` ASC) ,
  CONSTRAINT `fk_procesos_transformacion_has_empresa_unidades_funcionales_p1`
    FOREIGN KEY (`proceso_transformacion` )
    REFERENCES `eureners_cimanti`.`procesos_transformacion` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_procesos_transformacion_has_empresa_unidades_funcionales_e1`
    FOREIGN KEY (`empresa` , `producto_final` )
    REFERENCES `eureners_cimanti`.`empresa_unidades_funcionales` (`empresa` , `producto_final` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_procesos_transformacion_has_empresa_unidades_funcionales_p2`
    FOREIGN KEY (`maquinaria` )
    REFERENCES `eureners_cimanti`.`proceso_maquinarias` (`maquinaria` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresa_procesos_producto_final_categorias1`
    FOREIGN KEY (`categoria` )
    REFERENCES `eureners_cimanti`.`categorias` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`empresa_maquinarias`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`empresa_maquinarias` (
  `maquinaria` INT NOT NULL ,
  `empresa` BIGINT NOT NULL ,
  `categoria` INT NULL ,
  `es_produccion` TINYINT NULL ,
  `es_transformacion` TINYINT NULL ,
  `numero` INT NULL ,
  `antiguedad` DECIMAL(10,5) NULL ,
  `utilizacion` DECIMAL(10,5) NULL ,
  `fecha_baja` DATETIME NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_creacion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  PRIMARY KEY (`maquinaria`, `empresa`) ,
  INDEX `fk_maquinarias_has_empresas_empresas1` (`empresa` ASC) ,
  INDEX `fk_maquinarias_has_empresas_maquinarias1` (`maquinaria` ASC) ,
  INDEX `fk_empresa_maquinarias_categorias1` (`categoria` ASC) ,
  CONSTRAINT `fk_maquinarias_has_empresas_maquinarias1`
    FOREIGN KEY (`maquinaria` )
    REFERENCES `eureners_cimanti`.`maquinarias` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_maquinarias_has_empresas_empresas1`
    FOREIGN KEY (`empresa` )
    REFERENCES `eureners_cimanti`.`empresas` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresa_maquinarias_categorias1`
    FOREIGN KEY (`categoria` )
    REFERENCES `eureners_cimanti`.`categorias` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`empresa_labores`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`empresa_labores` (
  `labor` INT NOT NULL ,
  `empresa` BIGINT NOT NULL ,
  `cultivo` INT NULL ,
  `maquinaria` INT NULL ,
  `es_produccion` TINYINT NULL ,
  `es_transformacion` TINYINT NULL ,
  `categoria` INT NULL ,
  `es_propia` TINYINT NULL ,
  `es_contratada` TINYINT NULL ,
  `es_terceros` TINYINT NULL ,
  `porcentaje` DECIMAL(10,5) NULL ,
  `horas` DECIMAL(10,5) NULL ,
  `ha` DECIMAL(10,5) NULL ,
  `emision_co2` DECIMAL(10,5) NULL ,
  `emision_ch4` DECIMAL(10,5) NULL ,
  `emision_n2o` DECIMAL(10,5) NULL ,
  `emision_co2_eq` DECIMAL(10,5) NULL ,
  `unidad` VARCHAR(50) NULL ,
  `fuente` VARCHAR(255) NULL ,
  `fecha_baja` DATETIME NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_creacion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  PRIMARY KEY (`labor`, `empresa`) ,
  INDEX `fk_labores_has_empresas_empresas1` (`empresa` ASC) ,
  INDEX `fk_labores_has_empresas_labores1` (`labor` ASC) ,
  INDEX `fk_labores_has_empresas_empresa_cultivos1` (`cultivo` ASC) ,
  INDEX `fk_empresa_labores_empresa_maquinarias1` (`maquinaria` ASC) ,
  INDEX `fk_empresa_labores_categorias1` (`categoria` ASC) ,
  CONSTRAINT `fk_labores_has_empresas_labores1`
    FOREIGN KEY (`labor` )
    REFERENCES `eureners_cimanti`.`labores` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_labores_has_empresas_empresas1`
    FOREIGN KEY (`empresa` )
    REFERENCES `eureners_cimanti`.`empresas` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_labores_has_empresas_empresa_cultivos1`
    FOREIGN KEY (`cultivo` )
    REFERENCES `eureners_cimanti`.`empresa_cultivos` (`cultivo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresa_labores_empresa_maquinarias1`
    FOREIGN KEY (`maquinaria` )
    REFERENCES `eureners_cimanti`.`empresa_maquinarias` (`maquinaria` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresa_labores_categorias1`
    FOREIGN KEY (`categoria` )
    REFERENCES `eureners_cimanti`.`categorias` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`empresa_consumibles`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`empresa_consumibles` (
  `consumible` INT NOT NULL ,
  `empresa` BIGINT NOT NULL ,
  `maquinaria` INT NOT NULL ,
  `es_transformacion` TINYINT NULL ,
  `es_produccion` TINYINT NULL ,
  `categoria` INT NULL ,
  `distancia` DECIMAL(10,5) NULL ,
  `emision_co2` DECIMAL(10,5) NULL ,
  `emision_ch4` DECIMAL(10,5) NULL ,
  `emision_n2o` DECIMAL(10,5) NULL ,
  `emision_co2_eq` DECIMAL(10,5) NULL ,
  `unidad` VARCHAR(50) NULL ,
  `fecha_baja` DATETIME NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_creacion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  PRIMARY KEY (`consumible`, `empresa`, `maquinaria`) ,
  INDEX `fk_consumibles_has_empresas_empresas1` (`empresa` ASC) ,
  INDEX `fk_consumibles_has_empresas_consumibles1` (`consumible` ASC) ,
  INDEX `fk_empresa_consumibles_maquinarias1` (`maquinaria` ASC) ,
  INDEX `fk_empresa_consumibles_categorias1` (`categoria` ASC) ,
  CONSTRAINT `fk_consumibles_has_empresas_consumibles1`
    FOREIGN KEY (`consumible` )
    REFERENCES `eureners_cimanti`.`consumibles` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_consumibles_has_empresas_empresas1`
    FOREIGN KEY (`empresa` )
    REFERENCES `eureners_cimanti`.`empresas` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresa_consumibles_maquinarias1`
    FOREIGN KEY (`maquinaria` )
    REFERENCES `eureners_cimanti`.`maquinarias` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresa_consumibles_categorias1`
    FOREIGN KEY (`categoria` )
    REFERENCES `eureners_cimanti`.`categorias` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`empresa_residuos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`empresa_residuos` (
  `residuo` INT NOT NULL ,
  `empresa` BIGINT NOT NULL ,
  `producto_final` INT NULL ,
  `cultivo` INT NULL ,
  `animal` INT NULL ,
  `categoria` INT NULL ,
  `es_produccion` TINYINT NULL ,
  `es_transformacion` TINYINT NULL ,
  `es_fase_uso` TINYINT NULL ,
  `tipo_gestion` VARCHAR(45) NULL ,
  `cantidad` DECIMAL(10,5) NULL ,
  `unidad` VARCHAR(45) NULL ,
  `codigo_ler` VARCHAR(50) NULL ,
  `descripcion` VARCHAR(255) NULL ,
  `fecha_baja` DATETIME NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_crecion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  PRIMARY KEY (`residuo`, `empresa`) ,
  INDEX `fk_residuos_has_empresas_empresas1` (`empresa` ASC) ,
  INDEX `fk_residuos_has_empresas_residuos1` (`residuo` ASC) ,
  INDEX `fk_residuos_has_empresas_empresa_cultivos1` (`cultivo` ASC) ,
  INDEX `fk_residuos_has_empresas_empresa_animales1` (`animal` ASC) ,
  INDEX `fk_residuos_has_empresas_empresa_unidades_funcionales1` (`producto_final` ASC) ,
  INDEX `fk_empresa_residuos_categorias1` (`categoria` ASC) ,
  CONSTRAINT `fk_residuos_has_empresas_residuos1`
    FOREIGN KEY (`residuo` )
    REFERENCES `eureners_cimanti`.`residuos` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_residuos_has_empresas_empresas1`
    FOREIGN KEY (`empresa` )
    REFERENCES `eureners_cimanti`.`empresas` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_residuos_has_empresas_empresa_cultivos1`
    FOREIGN KEY (`cultivo` )
    REFERENCES `eureners_cimanti`.`empresa_cultivos` (`cultivo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_residuos_has_empresas_empresa_animales1`
    FOREIGN KEY (`animal` )
    REFERENCES `eureners_cimanti`.`empresa_animales` (`animal` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_residuos_has_empresas_empresa_unidades_funcionales1`
    FOREIGN KEY (`producto_final` )
    REFERENCES `eureners_cimanti`.`empresa_unidades_funcionales` (`producto_final` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresa_residuos_categorias1`
    FOREIGN KEY (`categoria` )
    REFERENCES `eureners_cimanti`.`categorias` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`empresa_residuos_tratamiento`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`empresa_residuos_tratamiento` (
  `residuo` INT NOT NULL ,
  `empresa` BIGINT NOT NULL ,
  `tratamiento_residuo` INT NOT NULL ,
  `energia` INT NULL ,
  `categoria` INT NULL ,
  `es_produccion` TINYINT NULL ,
  `es_transformacion` TINYINT NULL ,
  `emision_co2` DECIMAL(10,5) NULL ,
  `emision_ch4` DECIMAL(10,5) NULL ,
  `emision_n2o` DECIMAL(10,5) NULL ,
  `emision_co2_eq` DECIMAL(10,5) NULL ,
  `unidad` VARCHAR(50) NULL ,
  `fuente` VARCHAR(255) NULL ,
  `consumo` DECIMAL(10,5) NULL ,
  `fecha_baja` DATETIME NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_cracion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  PRIMARY KEY (`residuo`, `empresa`, `tratamiento_residuo`) ,
  INDEX `fk_empresa_residuos_has_tratamientos_residuos_tratamientos_re1` (`tratamiento_residuo` ASC) ,
  INDEX `fk_empresa_residuos_has_tratamientos_residuos_empresa_residuos1` (`residuo` ASC, `empresa` ASC) ,
  INDEX `fk_empresa_residuos_has_tratamientos_residuos_energias1` (`energia` ASC) ,
  INDEX `fk_empresa_residuos_tratamiento_categorias1` (`categoria` ASC) ,
  CONSTRAINT `fk_empresa_residuos_has_tratamientos_residuos_empresa_residuos1`
    FOREIGN KEY (`residuo` , `empresa` )
    REFERENCES `eureners_cimanti`.`empresa_residuos` (`residuo` , `empresa` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresa_residuos_has_tratamientos_residuos_tratamientos_re1`
    FOREIGN KEY (`tratamiento_residuo` )
    REFERENCES `eureners_cimanti`.`tratamientos_residuos` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresa_residuos_has_tratamientos_residuos_energias1`
    FOREIGN KEY (`energia` )
    REFERENCES `eureners_cimanti`.`energias` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresa_residuos_tratamiento_categorias1`
    FOREIGN KEY (`categoria` )
    REFERENCES `eureners_cimanti`.`categorias` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`recorridos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`recorridos` (
  `identificador` INT NOT NULL AUTO_INCREMENT ,
  `maquinaria` INT NOT NULL ,
  `nombre` VARCHAR(100) NULL ,
  `emision_co2` DECIMAL(10,5) NULL ,
  `emision_ch4` DECIMAL(10,5) NULL ,
  `emision_n2o` DECIMAL(10,5) NULL ,
  `emision_co2_eq` DECIMAL(10,5) NULL ,
  `unidad` VARCHAR(50) NULL ,
  `fuente` VARCHAR(255) NULL ,
  `fecha_baja` DATETIME NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_creacion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  PRIMARY KEY (`identificador`) ,
  INDEX `fk_recorridos_maquinarias1` (`maquinaria` ASC) ,
  CONSTRAINT `fk_recorridos_maquinarias1`
    FOREIGN KEY (`maquinaria` )
    REFERENCES `eureners_cimanti`.`maquinarias` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`empresa_residuos_transporte`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`empresa_residuos_transporte` (
  `residuo` INT NOT NULL ,
  `empresa` BIGINT NOT NULL ,
  `maquinaria` INT NOT NULL ,
  `recorrido` INT NULL ,
  `categoria` INT NULL ,
  `es_produccion` TINYINT NULL ,
  `es_transformacion` TINYINT NULL ,
  `receptor` VARCHAR(255) NULL ,
  `emision_co2` DECIMAL(10,5) NULL ,
  `emision_ch4` DECIMAL(10,5) NULL ,
  `emision_n2o` DECIMAL(10,5) NULL ,
  `emision_co2_eq` DECIMAL(10,5) NULL ,
  `unidad` VARCHAR(50) NULL ,
  `fuente` VARCHAR(255) NULL ,
  `distancia` DECIMAL(10,5) NULL ,
  `fecha_baja` DATETIME NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_creacion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modifiacion` DATETIME NULL ,
  PRIMARY KEY (`residuo`, `empresa`, `maquinaria`) ,
  INDEX `fk_empresa_residuos_has_maquinarias_maquinarias1` (`maquinaria` ASC) ,
  INDEX `fk_empresa_residuos_has_maquinarias_empresa_residuos1` (`residuo` ASC, `empresa` ASC) ,
  INDEX `fk_empresa_residuos_transporte_categorias1` (`categoria` ASC) ,
  INDEX `fk_empresa_residuos_transporte_recorridos1` (`recorrido` ASC) ,
  CONSTRAINT `fk_empresa_residuos_has_maquinarias_empresa_residuos1`
    FOREIGN KEY (`residuo` , `empresa` )
    REFERENCES `eureners_cimanti`.`empresa_residuos` (`residuo` , `empresa` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresa_residuos_has_maquinarias_maquinarias1`
    FOREIGN KEY (`maquinaria` )
    REFERENCES `eureners_cimanti`.`maquinarias` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresa_residuos_transporte_categorias1`
    FOREIGN KEY (`categoria` )
    REFERENCES `eureners_cimanti`.`categorias` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresa_residuos_transporte_recorridos1`
    FOREIGN KEY (`recorrido` )
    REFERENCES `eureners_cimanti`.`recorridos` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`empresa_distribucion_unidad_funcional`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`empresa_distribucion_unidad_funcional` (
  `empresa` BIGINT NOT NULL ,
  `producto_final` INT NOT NULL ,
  `maquinaria` INT NOT NULL ,
  `recorrido` INT NULL ,
  `categoria` INT NULL ,
  `es_produccion` TINYINT NULL ,
  `es_transformacion` TINYINT NULL ,
  `modelo` VARCHAR(255) NULL ,
  `receptor` VARCHAR(255) NULL ,
  `distancia` DECIMAL(10,5) NULL ,
  `fecha_baja` DATETIME NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_creacion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  PRIMARY KEY (`empresa`, `producto_final`, `maquinaria`) ,
  INDEX `fk_empresa_unidades_funcionales_has_maquinarias_maquinarias1` (`maquinaria` ASC) ,
  INDEX `fk_empresa_unidades_funcionales_has_maquinarias_empresa_unida1` (`empresa` ASC, `producto_final` ASC) ,
  INDEX `fk_empresa_distribucion_unidad_funcional_categorias1` (`categoria` ASC) ,
  INDEX `fk_empresa_distribucion_unidad_funcional_recorridos1` (`recorrido` ASC) ,
  CONSTRAINT `fk_empresa_unidades_funcionales_has_maquinarias_empresa_unida1`
    FOREIGN KEY (`empresa` , `producto_final` )
    REFERENCES `eureners_cimanti`.`empresa_unidades_funcionales` (`empresa` , `producto_final` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresa_unidades_funcionales_has_maquinarias_maquinarias1`
    FOREIGN KEY (`maquinaria` )
    REFERENCES `eureners_cimanti`.`maquinarias` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresa_distribucion_unidad_funcional_categorias1`
    FOREIGN KEY (`categoria` )
    REFERENCES `eureners_cimanti`.`categorias` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresa_distribucion_unidad_funcional_recorridos1`
    FOREIGN KEY (`recorrido` )
    REFERENCES `eureners_cimanti`.`recorridos` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`animales_emisiones`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`animales_emisiones` (
  `identificador` INT NOT NULL AUTO_INCREMENT ,
  `animal` INT NOT NULL ,
  `temperatura` DECIMAL(10,5) NULL ,
  `emision_co2` DECIMAL(10,5) NULL ,
  `emision_ch4` DECIMAL(10,5) NULL ,
  `emision_n2o` DECIMAL(10,5) NULL ,
  `emision_co2_eq` DECIMAL(10,5) NULL ,
  `unidad` VARCHAR(50) NULL ,
  `fuente` VARCHAR(255) NULL ,
  `fecha_baja` DATETIME NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_creacion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  PRIMARY KEY (`identificador`) ,
  INDEX `fk_animales_det_animales1` (`animal` ASC) ,
  CONSTRAINT `fk_animales_det_animales1`
    FOREIGN KEY (`animal` )
    REFERENCES `eureners_cimanti`.`animales` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`gases`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`gases` (
  `identificador` INT NOT NULL AUTO_INCREMENT ,
  `categoria` INT NOT NULL ,
  `formula` VARCHAR(80) NULL ,
  `nombre` VARCHAR(100) NULL ,
  `es_co2` TINYINT NULL ,
  `es_ch4` TINYINT NULL ,
  `es_n2o` TINYINT NULL ,
  `gwp` DECIMAL(10,5) NULL ,
  `fuente` VARCHAR(255) NULL ,
  `fecha_baja` DATETIME NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_creacion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  PRIMARY KEY (`identificador`) ,
  INDEX `fk_contaminantes_categorias1` (`categoria` ASC) ,
  CONSTRAINT `fk_contaminantes_categorias1`
    FOREIGN KEY (`categoria` )
    REFERENCES `eureners_cimanti`.`categorias` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`empresa_maquinaria_gases_fluorados`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`empresa_maquinaria_gases_fluorados` (
  `maquinaria` INT NOT NULL ,
  `empresa` BIGINT NOT NULL ,
  `gas` INT NOT NULL ,
  `kg_recargados` DECIMAL(10,5) NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_creacion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  PRIMARY KEY (`maquinaria`, `empresa`, `gas`) ,
  INDEX `fk_table1_empresa_maquinarias1` (`maquinaria` ASC, `empresa` ASC) ,
  INDEX `fk_empresa_maquinaria_gasesfluorados_gases1` (`gas` ASC) ,
  CONSTRAINT `fk_table1_empresa_maquinarias1`
    FOREIGN KEY (`maquinaria` , `empresa` )
    REFERENCES `eureners_cimanti`.`empresa_maquinarias` (`maquinaria` , `empresa` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresa_maquinaria_gasesfluorados_gases1`
    FOREIGN KEY (`gas` )
    REFERENCES `eureners_cimanti`.`gases` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`empresa_materias_primas_transporte`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`empresa_materias_primas_transporte` (
  `materia` INT NOT NULL ,
  `empresa` BIGINT NOT NULL ,
  `maquinaria` INT NOT NULL ,
  `recorrido` INT NULL ,
  `es_produccion` TINYINT NULL ,
  `es_transformacion` TINYINT NULL ,
  `es_propio` TINYINT NULL ,
  `proveedor` VARCHAR(255) NULL ,
  `emision_co2` DECIMAL(10,5) NULL ,
  `emision_ch4` DECIMAL(10,5) NULL ,
  `emision_n2o` DECIMAL(10,5) NULL ,
  `emision_co2_eq` DECIMAL(10,5) NULL ,
  `unidad` VARCHAR(50) NULL ,
  `fuente` VARCHAR(255) NULL ,
  `distancia` DECIMAL(10,5) NULL ,
  `fecha_baja` DATETIME NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_creacion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  PRIMARY KEY (`materia`, `empresa`, `maquinaria`) ,
  INDEX `fk_empresa_materias_primas_transporte_maquinarias1` (`maquinaria` ASC) ,
  INDEX `fk_empresa_materias_primas_transporte_recorridos1` (`recorrido` ASC) ,
  CONSTRAINT `fk_table1_empresa_materias_primas1`
    FOREIGN KEY (`materia` , `empresa` )
    REFERENCES `eureners_cimanti`.`empresa_materias_primas` (`materia_prima` , `empresa` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresa_materias_primas_transporte_maquinarias1`
    FOREIGN KEY (`maquinaria` )
    REFERENCES `eureners_cimanti`.`maquinarias` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresa_materias_primas_transporte_recorridos1`
    FOREIGN KEY (`recorrido` )
    REFERENCES `eureners_cimanti`.`recorridos` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`manejos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`manejos` (
  `identificador` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(50) NULL ,
  `emision_co2` DECIMAL(10,5) NULL ,
  `emision_ch4` DECIMAL(10,5) NULL ,
  `emision_n2o` DECIMAL(10,5) NULL ,
  `emision_co2_eq` DECIMAL(10,5) NULL ,
  `unidad` VARCHAR(50) NULL ,
  `fuente` VARCHAR(255) NULL ,
  `fecha_baja` DATETIME NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_creacion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  PRIMARY KEY (`identificador`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`empresa_animales_manejos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`empresa_animales_manejos` (
  `manejo` INT NOT NULL ,
  `animal` INT NOT NULL ,
  `empresa` BIGINT NOT NULL ,
  `porcentaje` DECIMAL(10,5) NULL ,
  `fecha_baja` DATETIME NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_creacion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  PRIMARY KEY (`manejo`, `animal`, `empresa`) ,
  INDEX `fk_empresa_animales_manejos_empresa_animales1` (`animal` ASC, `empresa` ASC) ,
  CONSTRAINT `fk_empresa_animales_manejos_manejos1`
    FOREIGN KEY (`manejo` )
    REFERENCES `eureners_cimanti`.`manejos` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresa_animales_manejos_empresa_animales1`
    FOREIGN KEY (`animal` , `empresa` )
    REFERENCES `eureners_cimanti`.`empresa_animales` (`animal` , `empresa` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`empresa_animales_pastoreo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`empresa_animales_pastoreo` (
  `animal` INT NOT NULL ,
  `empresa` BIGINT NOT NULL ,
  `enero` DECIMAL(10,5) NULL ,
  `febrero` DECIMAL(10,5) NULL ,
  `marzo` DECIMAL(10,5) NULL ,
  `abril` DECIMAL(10,5) NULL ,
  `mayo` DECIMAL(10,5) NULL ,
  `junio` DECIMAL(10,5) NULL ,
  `julio` DECIMAL(10,5) NULL ,
  `agosto` DECIMAL(10,5) NULL ,
  `septiembre` DECIMAL(10,5) NULL ,
  `octubre` DECIMAL(10,5) NULL ,
  `noviembre` DECIMAL(10,5) NULL ,
  `diciembre` DECIMAL(10,5) NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_creacion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  PRIMARY KEY (`animal`, `empresa`) ,
  CONSTRAINT `fk_empresa_animales_pastoreo_empresa_animales1`
    FOREIGN KEY (`animal` , `empresa` )
    REFERENCES `eureners_cimanti`.`empresa_animales` (`animal` , `empresa` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eureners_cimanti`.`provincias_animales_excreta`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `eureners_cimanti`.`provincias_animales_excreta` (
  `provincia` INT NOT NULL ,
  `animal` INT NOT NULL ,
  `porcentaje_excreta` DECIMAL(10,5) NULL ,
  `fuente` VARCHAR(255) NULL ,
  `usuario_creacion` VARCHAR(50) NULL ,
  `fecha_creacion` DATETIME NULL ,
  `usuario_ultima_modificacion` VARCHAR(50) NULL ,
  `fecha_ultima_modificacion` DATETIME NULL ,
  PRIMARY KEY (`provincia`, `animal`) ,
  INDEX `fk_provincias_has_animales_animales1` (`animal` ASC) ,
  INDEX `fk_provincias_has_animales_provincias1` (`provincia` ASC) ,
  CONSTRAINT `fk_provincias_has_animales_provincias1`
    FOREIGN KEY (`provincia` )
    REFERENCES `eureners_cimanti`.`provincias` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_provincias_has_animales_animales1`
    FOREIGN KEY (`animal` )
    REFERENCES `eureners_cimanti`.`animales` (`identificador` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

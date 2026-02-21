-- Estructura de base de datos para el Simulador Social de Fomento
-- Generado para: vibecodingmexico.com

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- 1. Tabla de Configuración (Seguridad por IP)
CREATE TABLE `config` (
  `id_config` INT(11) NOT NULL AUTO_INCREMENT,
  `parametro` VARCHAR(50) NOT NULL,
  `valor` VARCHAR(45) NOT NULL, -- Soporta IPv4 e IPv6
  PRIMARY KEY (`id_config`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 2. Tabla de Perfiles de Analistas
CREATE TABLE `analistas_perfiles` (
  `cod_perfil` VARCHAR(10) NOT NULL,
  `descripcion_perfil` TEXT NOT NULL,
  PRIMARY KEY (`cod_perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 3. Tabla de Analistas IA
CREATE TABLE `analistasIA` (
  `id_analista` INT(11) NOT NULL AUTO_INCREMENT,
  `letra_perfil` VARCHAR(10) NOT NULL,
  `nombre_griego` VARCHAR(50) NOT NULL,
  `ia_llm` VARCHAR(100) NOT NULL,
  `nombre_humano` VARCHAR(100) NOT NULL,
  `funcion` VARCHAR(255) NOT NULL,
  `traits_personalidad` TEXT DEFAULT NULL,
  `comentarios` TEXT DEFAULT NULL,
  `activo` VARCHAR(2) DEFAULT 'SI',
  `fecha_creacion` DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_analista`),
  INDEX (`letra_perfil`),
  INDEX (`nombre_griego`),
  FOREIGN KEY (`letra_perfil`) REFERENCES `analistas_perfiles`(`cod_perfil`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 4. Tabla de Vacantes Reales
CREATE TABLE `vacantes` (
  `id_vacante` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre_vacante` VARCHAR(255) NOT NULL,
  `experimento` VARCHAR(10) NOT NULL,
  `bolsa_trabajo` VARCHAR(100) DEFAULT NULL,
  `link_pdf` VARCHAR(500) DEFAULT NULL,
  `fecha_vacante` DATE DEFAULT NULL,
  `empresa_vacante` VARCHAR(255) DEFAULT NULL,
  `imagen_vacante` LONGBLOB DEFAULT NULL,
  `descripcion` LONGTEXT NOT NULL,
  `dato_real_lider` LONGTEXT DEFAULT NULL,
  `comentario` LONGTEXT DEFAULT NULL,
  `fecha_alta` DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_vacante`),
  INDEX (`experimento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 5. Tabla de Evaluaciones (La Arena)
CREATE TABLE `vacantes_evaluaciones` (
  `id_evaluacion` INT(11) NOT NULL AUTO_INCREMENT,
  `id_vacante` INT(11) NOT NULL,
  `nombre_griego` VARCHAR(50) NOT NULL,
  `letra_perfil` VARCHAR(10) NOT NULL,
  `ronda` INT(1) NOT NULL, -- 1 o 2
  `semaforo` VARCHAR(10) NOT NULL, -- Verde, Amarillo, Rojo
  `puntuacion` DECIMAL(14,6) NOT NULL,
  `respuesta_llm` LONGTEXT NOT NULL,
  `evidencia_link` VARCHAR(500) DEFAULT NULL,
  `comentario_evaluador` TEXT DEFAULT NULL,
  `cambio_criterio` TINYINT(1) DEFAULT 0,
  `fecha_registro` DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_evaluacion`),
  FOREIGN KEY (`id_vacante`) REFERENCES `vacantes`(`id_vacante`) ON DELETE CASCADE,
  INDEX (`nombre_griego`),
  INDEX (`letra_perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

SET FOREIGN_KEY_CHECKS = 1;

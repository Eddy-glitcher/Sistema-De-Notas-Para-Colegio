-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.23 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.2.0.6233
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para colegio
CREATE DATABASE IF NOT EXISTS `colegio` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `colegio`;

-- Volcando estructura para tabla colegio.materias
CREATE TABLE IF NOT EXISTS `materias` (
  `Mat_Id` int unsigned NOT NULL AUTO_INCREMENT,
  `Mat_Nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Mat_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla colegio.materias: ~3 rows (aproximadamente)
DELETE FROM `materias`;
/*!40000 ALTER TABLE `materias` DISABLE KEYS */;
INSERT INTO `materias` (`Mat_Id`, `Mat_Nombre`) VALUES
	(1, 'Matemáticas'),
	(2, 'Física'),
	(3, 'inglés');
/*!40000 ALTER TABLE `materias` ENABLE KEYS */;

-- Volcando estructura para tabla colegio.notas
CREATE TABLE IF NOT EXISTS `notas` (
  `Not_Id` int unsigned NOT NULL AUTO_INCREMENT,
  `Not_PerId` int unsigned NOT NULL DEFAULT '0',
  `Not_MatId` int unsigned NOT NULL DEFAULT '0',
  `Not_Nota` decimal(1,1) unsigned NOT NULL DEFAULT '0.0',
  `Not_TipoNota` varchar(10) DEFAULT NULL,
  `Not_Promedio` decimal(1,1) unsigned DEFAULT NULL,
  `Not_FechaCrea` date NOT NULL,
  PRIMARY KEY (`Not_Id`),
  KEY `Not_PerId` (`Not_PerId`),
  KEY `Not_MatId` (`Not_MatId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla colegio.notas: ~0 rows (aproximadamente)
DELETE FROM `notas`;
/*!40000 ALTER TABLE `notas` DISABLE KEYS */;
/*!40000 ALTER TABLE `notas` ENABLE KEYS */;

-- Volcando estructura para tabla colegio.personas
CREATE TABLE IF NOT EXISTS `personas` (
  `Pers_Id` int unsigned NOT NULL AUTO_INCREMENT,
  `Pers_Nombre` varchar(50) NOT NULL DEFAULT '0',
  `Pers_Apellido` varchar(50) NOT NULL,
  `Pers_FechNaci` date NOT NULL,
  `Pers_Identificacion` int unsigned NOT NULL DEFAULT '0',
  `Pers_Cargo` varchar(15) NOT NULL DEFAULT '0',
  `Pers_Sexo` varchar(9) NOT NULL DEFAULT '0',
  `Pers_Rh` varchar(20) NOT NULL DEFAULT '0',
  `Pers_Direccion` varchar(80) NOT NULL DEFAULT '0',
  `Pers_UsuId` int unsigned NOT NULL,
  PRIMARY KEY (`Pers_Id`),
  KEY `Pers_UsuId` (`Pers_UsuId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla colegio.personas: ~0 rows (aproximadamente)
DELETE FROM `personas`;
/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
/*!40000 ALTER TABLE `personas` ENABLE KEYS */;

-- Volcando estructura para tabla colegio.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `Usu_Id` int unsigned NOT NULL AUTO_INCREMENT,
  `Usu_Nombre` varchar(50) DEFAULT NULL,
  `Usu_Contraseña` varchar(50) DEFAULT NULL,
  `Usu_Email` varchar(50) DEFAULT NULL,
  `Usu_FechaCrea` date NOT NULL,
  `Usu_FechaUlti` date NOT NULL,
  PRIMARY KEY (`Usu_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla colegio.usuarios: ~0 rows (aproximadamente)
-- DELETE FROM `usuarios`;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

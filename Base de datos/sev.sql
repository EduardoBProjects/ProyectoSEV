-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: sev
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cuentas`
--

DROP TABLE IF EXISTS `cuentas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuentas` (
  `id_Cuenta` int(11) NOT NULL,
  `Alias` varchar(20) NOT NULL,
  `N_Tarjeta` varchar(30) NOT NULL,
  `CVV` varchar(4) NOT NULL,
  `Fehca_Exp` date NOT NULL,
  PRIMARY KEY (`id_Cuenta`),
  KEY `fk_usuario_cuentas` (`Alias`),
  CONSTRAINT `fk_usuario_cuentas` FOREIGN KEY (`Alias`) REFERENCES `usuarios` (`Alias`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuentas`
--

LOCK TABLES `cuentas` WRITE;
/*!40000 ALTER TABLE `cuentas` DISABLE KEYS */;
/*!40000 ALTER TABLE `cuentas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_transaccion`
--

DROP TABLE IF EXISTS `detalle_transaccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_transaccion` (
  `id_Transaccion` int(11) NOT NULL,
  `Alias` varchar(20) NOT NULL,
  `id_Cuenta` int(11) NOT NULL,
  `Total` double NOT NULL,
  KEY `fk_usuario_detalle_transaccion` (`Alias`),
  KEY `fk_cuentas_detalle_transaccion` (`id_Cuenta`),
  KEY `fk_transaccion_detalle_transaccion` (`id_Transaccion`),
  CONSTRAINT `fk_cuentas_detalle_transaccion` FOREIGN KEY (`id_Cuenta`) REFERENCES `cuentas` (`id_Cuenta`),
  CONSTRAINT `fk_transaccion_detalle_transaccion` FOREIGN KEY (`id_Transaccion`) REFERENCES `transaccion` (`id_Transaccion`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_usuario_detalle_transaccion` FOREIGN KEY (`Alias`) REFERENCES `usuarios` (`Alias`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_transaccion`
--

LOCK TABLES `detalle_transaccion` WRITE;
/*!40000 ALTER TABLE `detalle_transaccion` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_transaccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lugar`
--

DROP TABLE IF EXISTS `lugar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lugar` (
  `LE` varchar(5) NOT NULL,
  `Seccion` varchar(5) NOT NULL,
  `Disponible` tinyint(1) NOT NULL,
  PRIMARY KEY (`LE`),
  KEY `fk_seccion_lugar` (`Seccion`),
  CONSTRAINT `fk_seccion_lugar` FOREIGN KEY (`Seccion`) REFERENCES `seccion` (`Seccion`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lugar`
--

LOCK TABLES `lugar` WRITE;
/*!40000 ALTER TABLE `lugar` DISABLE KEYS */;
/*!40000 ALTER TABLE `lugar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `piso`
--

DROP TABLE IF EXISTS `piso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `piso` (
  `Piso` varchar(5) NOT NULL,
  `Descripcion` varchar(30) NOT NULL,
  PRIMARY KEY (`Piso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `piso`
--

LOCK TABLES `piso` WRITE;
/*!40000 ALTER TABLE `piso` DISABLE KEYS */;
/*!40000 ALTER TABLE `piso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservacion`
--

DROP TABLE IF EXISTS `reservacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservacion` (
  `id_Reservacion` int(11) NOT NULL,
  `Alias` varchar(20) NOT NULL,
  `Matricula` varchar(10) NOT NULL,
  `LE` varchar(4) NOT NULL,
  `Fehca` date NOT NULL,
  `Hora` date NOT NULL,
  PRIMARY KEY (`id_Reservacion`),
  KEY `fk_usuario_reservacion` (`Alias`),
  KEY `fk_vehiculo_reservacion` (`Matricula`),
  KEY `fk_lugar_reservacion` (`LE`),
  CONSTRAINT `fk_lugar_reservacion` FOREIGN KEY (`LE`) REFERENCES `lugar` (`LE`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_usuario_reservacion` FOREIGN KEY (`Alias`) REFERENCES `usuarios` (`Alias`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_vehiculo_reservacion` FOREIGN KEY (`Matricula`) REFERENCES `vehiculo` (`Matricula`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservacion`
--

LOCK TABLES `reservacion` WRITE;
/*!40000 ALTER TABLE `reservacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salida`
--

DROP TABLE IF EXISTS `salida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salida` (
  `id_Reservacion` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` date NOT NULL,
  KEY `fk_reservacion_salida` (`id_Reservacion`),
  CONSTRAINT `fk_reservacion_salida` FOREIGN KEY (`id_Reservacion`) REFERENCES `reservacion` (`id_Reservacion`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salida`
--

LOCK TABLES `salida` WRITE;
/*!40000 ALTER TABLE `salida` DISABLE KEYS */;
/*!40000 ALTER TABLE `salida` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seccion`
--

DROP TABLE IF EXISTS `seccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seccion` (
  `Seccion` varchar(5) NOT NULL,
  `Piso` varchar(5) NOT NULL,
  PRIMARY KEY (`Seccion`),
  KEY `fk_piso_seccion` (`Piso`),
  CONSTRAINT `fk_piso_seccion` FOREIGN KEY (`Piso`) REFERENCES `piso` (`Piso`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seccion`
--

LOCK TABLES `seccion` WRITE;
/*!40000 ALTER TABLE `seccion` DISABLE KEYS */;
/*!40000 ALTER TABLE `seccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaccion`
--

DROP TABLE IF EXISTS `transaccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaccion` (
  `id_Transaccion` int(11) NOT NULL,
  `id_Reservacion` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` date NOT NULL,
  PRIMARY KEY (`id_Transaccion`),
  KEY `fk_reservacion_transaccion` (`id_Reservacion`),
  CONSTRAINT `fk_reservacion_transaccion` FOREIGN KEY (`id_Reservacion`) REFERENCES `reservacion` (`id_Reservacion`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaccion`
--

LOCK TABLES `transaccion` WRITE;
/*!40000 ALTER TABLE `transaccion` DISABLE KEYS */;
/*!40000 ALTER TABLE `transaccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `Alias` varchar(20) NOT NULL,
  `N_Usuario` int(11) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Apellido` varchar(20) NOT NULL,
  `Edad` varchar(3) NOT NULL,
  `Correo` varchar(30) NOT NULL,
  `Contraseña` varchar(15) NOT NULL,
  PRIMARY KEY (`Alias`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES ('Anuar12',1,'Carlos Anuar','López Monje','26','anuar12@outlook.com','123');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehiculo`
--

DROP TABLE IF EXISTS `vehiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehiculo` (
  `Matricula` varchar(10) NOT NULL,
  `Alias` varchar(20) NOT NULL,
  `Modelo_Vehiculo` varchar(20) NOT NULL,
  PRIMARY KEY (`Matricula`),
  KEY `fk_usuario_vehiculo` (`Alias`),
  CONSTRAINT `fk_usuario_vehiculo` FOREIGN KEY (`Alias`) REFERENCES `usuarios` (`Alias`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehiculo`
--

LOCK TABLES `vehiculo` WRITE;
/*!40000 ALTER TABLE `vehiculo` DISABLE KEYS */;
/*!40000 ALTER TABLE `vehiculo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-13 23:19:29

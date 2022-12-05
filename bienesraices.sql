-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: localhost    Database: bienesraices_crud
-- ------------------------------------------------------
-- Server version	8.0.29

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `propiedades`
--

DROP TABLE IF EXISTS `propiedades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `propiedades` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `descripcion` longtext,
  `habitaciones` int DEFAULT NULL,
  `wc` int DEFAULT NULL,
  `estacionamiento` int DEFAULT NULL,
  `creado` date DEFAULT NULL,
  `vendedores_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_propiedades_vendedores_idx` (`vendedores_id`),
  CONSTRAINT `fk_propiedades_vendedores` FOREIGN KEY (`vendedores_id`) REFERENCES `vendedores` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `propiedades`
--

LOCK TABLES `propiedades` WRITE;
/*!40000 ALTER TABLE `propiedades` DISABLE KEYS */;
INSERT INTO `propiedades` VALUES (4,'Casa bonita',44434.00,'b7a530068f57878d3bed5cc2b7ae666e.jpg','ProbandoooooooooooooProbandoooooooooooooProbandoooooooooooooProbandoooooooooooooProbandoooooooooooooProbandoooooooooooooProbandooooooooooooo',1,2,3,'2022-08-05',1),(12,'Nueva Casa',23000000.00,'9c9989c3a8be0a636d52ffaca6410787.jpg','Nueva casa con todas las amenidades y lujos Nueva casa con todas las amenidades y lujos Nueva casa con todas las amenidades y lujos Nueva casa con todas las amenidades y lujos Nueva casa con todas las amenidades y lujos Nueva casa con todas las amenidades y lujos Nueva casa con todas las amenidades y lujos',2,1,1,'2022-09-21',1),(13,'Casa',424342.00,'052b79f7fc7d4d8b88bd2b9317527390.jpg','probando probando probando probando probando probando probando probando probando probando probando probando probando probando probando probando probando probando probando probando probando probando probando probando probando probando probando probando probando probando probando probando probando probando probando probando probando probando probando probando probando probando ',2,3,1,'2022-10-04',1),(14,'Casa',3535.00,'efe29d837e38d68a4bdc8ac3f58a5f5e.jpg','gftgdfgdgd gftgdfgdgd gftgdfgdgd gftgdfgdgd gftgdfgdgd gftgdfgdgd gftgdfgdgd gftgdfgdgd gftgdfgdgd gftgdfgdgd gftgdfgdgd gftgdfgdgd gftgdfgdgd gftgdfgdgd gftgdfgdgd gftgdfgdgd gftgdfgdgd gftgdfgdgd gftgdfgdgd gftgdfgdgd gftgdfgdgd gftgdfgdgd gftgdfgdgd gftgdfgdgd ',2,1,1,'2022-10-04',2),(16,' Casa moderna actualizada',25353.00,'4679cf914757de510c819dbc173108fc.jpg','Descripcion moderna Descripcion moderna Descripcion moderna Descripcion moderna Descripcion moderna Descripcion moderna Descripcion moderna Descripcion moderna Descripcion moderna Descripcion moderna Descripcion moderna Descripcion moderna Descripcion moderna Descripcion moderna ',1,2,1,'2022-10-08',2),(21,'  Casa minimalista oferta',535345.00,'6992d6baf1569f23a5fe85765f14af8f.jpg',' if($_FILES[\'propiedad\'][\'tmp_name\'][\'imagen\']){ if($_FILES[\'propiedad\'][\'tmp_name\'][\'imagen\']){ if($_FILES[\'propiedad\'][\'tmp_name\'][\'imagen\']){ if($_FILES[\'propiedad\'][\'tmp_name\'][\'imagen\']){ if($_FILES[\'propiedad\'][\'tmp_name\'][\'imagen\']){',4,3,1,'2022-10-10',1),(22,' Casa minimalista',645645.00,'dd729d70dcf277d7b174ea82c2b03c34.jpg','Nueva descripcion Nueva descripcion Nueva descripcion Nueva descripcion Nueva descripcion Nueva descripcion Nueva descripcion Nueva descripcion Nueva descripcion Nueva descripcion Nueva descripcion Nueva descripcion Nueva descripcion Nueva descripcion Nueva descripcion Nueva descripcion Nueva descripcion Nueva descripcion Nueva descripcion Nueva descripcion Nueva descripcion Nueva descripcion Nueva descripcion Nueva descripcion ',2,3,4,'2022-12-03',2);
/*!40000 ALTER TABLE `propiedades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `idusuarios` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` char(60) NOT NULL,
  PRIMARY KEY (`idusuarios`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (2,'correo@bienesraices.com','$2y$10$pwm5eQ50n1zEIluu5JRZv.70WFU.vZ/asQXYcjuDjDCIRVjAIpuAO');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendedores`
--

DROP TABLE IF EXISTS `vendedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vendedores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendedores`
--

LOCK TABLES `vendedores` WRITE;
/*!40000 ALTER TABLE `vendedores` DISABLE KEYS */;
INSERT INTO `vendedores` VALUES (1,'Axel','Kroos','7651007766'),(2,'Matt','Murdock','7651006610'),(4,' Axel','Cruz','1412121212');
/*!40000 ALTER TABLE `vendedores` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-02 20:51:42

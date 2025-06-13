-- MySQL dump 10.13  Distrib 9.3.0, for macos15.4 (arm64)
--
-- Host: 127.0.0.1    Database: projeto_cuidados_paliativos
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `administrador`
--

DROP TABLE IF EXISTS `administrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `administrador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `nome_social` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `data_nascimento` date NOT NULL,
  `genero` enum('F','M','O') NOT NULL,
  `conselhoProfissional` varchar(20) NOT NULL,
  `formacao` varchar(50) NOT NULL,
  `registroProfissional` varchar(50) NOT NULL,
  `especialidade` varchar(100) DEFAULT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `ultimoLogin` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrador`
--

/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
INSERT INTO `administrador` VALUES (1,'Bananinha kkkk sla','Banoffe','banana@gmail.com','$2y$10$hDgiQgW8VXUwdQE.HBGhI.A5M1hELjgi6WnBnx5VTOzKx3HGU/FqO','1998-09-01','M','COREN','Psicologia','38274/RJ','Trambique','2025-06-04 22:11:29',NULL);
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;

--
-- Table structure for table `paciente`
--

DROP TABLE IF EXISTS `paciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paciente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `data_nascimento` date DEFAULT NULL,
  `genero` varchar(100) DEFAULT NULL,
  `estado` varchar(100) DEFAULT 'NULL',
  `nome_social` varchar(255) DEFAULT 'NULL',
  `cidade` varchar(100) DEFAULT 'NULL',
  `medicacao` varchar(1000) DEFAULT 'NULL',
  `doenca` varchar(1000) DEFAULT 'NULL',
  `tipo_sanguineo` varchar(255) DEFAULT 'NULL',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paciente`
--

/*!40000 ALTER TABLE `paciente` DISABLE KEYS */;
INSERT INTO `paciente` VALUES (8,'João da Silva','joao.silva@email.com','$2y$10$fLnSF8UTAP6yZoHDZqyJFuVhVO0rXg0gbNEwZI7QQQlxVCu.VMIwC','1990-05-20','F','SP','Joana da Silva','São Paulo','Nenhuma','Câncer no reto','O+'),(9,'Maria Oliveira','maria.oliveira@email.com','$2y$10$oXryUmy463xZUeB8EMGssOFTOCVwQFmr.daqAXcpjt3ep5l1/Wo1O','1985-10-12','F','RJ','Mari','Rio de Janeiro','Anticoncepcional','Hipertensão','A+'),(10,'Carla Souza','carla.souza@email.com','$2y$10$GDBY7vuBx/SK7TcLa0Y7qeSCNHLrU1BClpToRJf3/BLMLng8eVq2W','1992-09-03','F','MG','Carla','Belo Horizonte','Antidepressivo','Depressão','B-');
/*!40000 ALTER TABLE `paciente` ENABLE KEYS */;

--
-- Dumping routines for database 'projeto_cuidados_paliativos'
--

CREATE DATABASE  IF NOT EXISTS `atelier` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `atelier`;
-- MySQL dump 10.13  Distrib 8.0.29, for Linux (x86_64)
--
-- Host: localhost    Database: atelier
-- ------------------------------------------------------
-- Server version	8.0.31-0ubuntu0.22.04.1

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
-- Table structure for table `logins`
--

DROP TABLE IF EXISTS `logins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `logins` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `sid` char(12) COLLATE utf8mb4_general_ci NOT NULL,
  `user_sid` char(12) COLLATE utf8mb4_general_ci NOT NULL,
  `token` char(64) COLLATE utf8mb4_general_ci NOT NULL,
  `expire_date` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `logins_uk_sid` (`sid`),
  UNIQUE KEY `logins_uk_user_sid` (`user_sid`),
  UNIQUE KEY `logins_uk_token` (`token`),
  CONSTRAINT `logins_ck_created_at` CHECK (regexp_like(`created_at`,_utf8mb4'^[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}$')),
  CONSTRAINT `logins_ck_expire_date` CHECK (regexp_like(`expire_date`,_utf8mb4'^[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}$')),
  CONSTRAINT `logins_ck_sid` CHECK (regexp_like(`sid`,_utf8mb4'^[A-Za-z0-9]{12}$')),
  CONSTRAINT `logins_ck_token` CHECK (regexp_like(`token`,_utf8mb4'^[A-Za-z0-9]{64}$')),
  CONSTRAINT `logins_ck_updated_at` CHECK (regexp_like(`updated_at`,_utf8mb4'^[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}$'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logins`
--

LOCK TABLES `logins` WRITE;
/*!40000 ALTER TABLE `logins` DISABLE KEYS */;
/*!40000 ALTER TABLE `logins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_atelier_sections`
--

DROP TABLE IF EXISTS `site_atelier_sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `site_atelier_sections` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `image` char(64) COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `site_atelier_sections_uk_image` (`image`),
  CONSTRAINT `site_atelier_sections_ck_created_at` CHECK (regexp_like(`created_at`,_utf8mb4'^[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}$')),
  CONSTRAINT `site_atelier_sections_ck_image` CHECK (regexp_like(`image`,_utf8mb4'^[A-Za-z0-9]{64}$')),
  CONSTRAINT `site_atelier_sections_ck_updated_at` CHECK (regexp_like(`updated_at`,_utf8mb4'^[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}$'))
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_atelier_sections`
--

LOCK TABLES `site_atelier_sections` WRITE;
/*!40000 ALTER TABLE `site_atelier_sections` DISABLE KEYS */;
INSERT INTO `site_atelier_sections` VALUES (1,'5fd924625f6ab16a19cc9807c7c506ae1813490e4ba675f843d5a10e0baacdb8','Atelier Elizeu Manoel','Refinamento e classe: os motivos que encontrei para a excelência do meu trabalho. Procuro ser um especialista onde atuo, principalmente na criação e ajustes de violinos, violoncellos e violas. Venho me aperfeiçoando no ramo da lutheria há mais de 5 anos e, muito provavelmente, a consistência e o amor pelo trabalho têm me feito um dos melhores que conheço na cidade.','2022-11-19 18:36:32','2022-11-19 18:36:32'),(2,'bcbee97fbb9d59d289bc4127e31020b2d8daf4d4a68349483258cae290c16722','Honra de servir à música','Atenção, meticulosidade, inspiração, harmonia... É como se a música fosse um guia, um caminho na minha vida. E ser responsável pela criação dos instrumentos que a produzem é, definitivamente, é a maior honra que poderia ter. Este sou eu, preparado para solucionar qualquer problema que você tenha no seu instrumento...','2022-11-19 18:38:12','2022-11-19 18:38:12');
/*!40000 ALTER TABLE `site_atelier_sections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `sid` char(12) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `password` char(64) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_uk_sid` (`sid`),
  UNIQUE KEY `users_uk_email` (`email`),
  CONSTRAINT `users_ck_created_at` CHECK (regexp_like(`created_at`,_utf8mb4'^[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}$')),
  CONSTRAINT `users_ck_email` CHECK (regexp_like(`email`,_utf8mb4'^[A-Za-z0-9_]+(.[A-Za-z0-9_]+)*@[A-Za-z0-9_]+(.[A-Za-z0-9_]+)+$')),
  CONSTRAINT `users_ck_password` CHECK (regexp_like(`password`,_utf8mb4'^[a-z0-9]{64}$')),
  CONSTRAINT `users_ck_sid` CHECK (regexp_like(`sid`,_utf8mb4'^[A-Za-z0-9]{12}$')),
  CONSTRAINT `users_ck_updated_at` CHECK (regexp_like(`updated_at`,_utf8mb4'^[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}$'))
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'5wR1pgO7DT6f','Anthony Zito Tegoshi','aztegoshi@gmail.com','4b51396e1d5003baab3589a70e8efaa1ac9e4aa704eacb2fd9c74a172d02c617','2022-11-12 17:02:43','2022-11-12 17:02:43');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-28 20:43:51

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
  CONSTRAINT `logins_ck_created_at` CHECK (`created_at` regexp _utf8mb4'^[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}$'),
  CONSTRAINT `logins_ck_expire_date` CHECK (`expire_date` regexp _utf8mb4'^[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}$'),
  CONSTRAINT `logins_ck_sid` CHECK (`sid` regexp _utf8mb4'^[A-Za-z0-9]{12}$'),
  CONSTRAINT `logins_ck_token` CHECK (`token` regexp _utf8mb4'^[A-Za-z0-9]{64}$'),
  CONSTRAINT `logins_ck_updated_at` CHECK (`updated_at` regexp _utf8mb4'^[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}$')
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logins`
--

LOCK TABLES `logins` WRITE;
/*!40000 ALTER TABLE `logins` DISABLE KEYS */;
INSERT INTO `logins` VALUES (5,'48CYqoBQhv20','5wR1pgO7DT6f','218d4b202421c90e09801d30546f866268eff14c1100143784df70df414a8c5b','2022-12-01 22:47:52','2022-11-28 22:47:52','2022-11-28 22:47:52');
/*!40000 ALTER TABLE `logins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_services`
--

DROP TABLE IF EXISTS `site_services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `site_services` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `image` char(64) COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `site_services_uk_image` (`image`),
  CONSTRAINT `site_services_ck_created_at` CHECK (`created_at` regexp _utf8mb4'^[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}$'),
  CONSTRAINT `site_services_ck_image` CHECK (`image` regexp _utf8mb4'^[A-Za-z0-9.]{64}$'),
  CONSTRAINT `site_services_ck_updated_at` CHECK (`updated_at` regexp _utf8mb4'^[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}$')
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_services`
--

LOCK TABLES `site_services` WRITE;
/*!40000 ALTER TABLE `site_services` DISABLE KEYS */;
INSERT INTO `site_services` VALUES (1,'1kZRFLy0cdkWcnxlFGYZy6KCGCiVMlWLm4Cm2WQTNI9307L04lMwGoymrENw.svg','Título 1','Descrição 1','2022-11-28 20:56:53','2022-11-28 20:56:53'),(2,'1kZRFLy0cdkWcaxlFGYZy6KCGCiVMlWLm4Cm2WQTNI9307L04lMwGoymrENw.svg','Título 1','Descrição 1','2022-11-28 20:56:53','2022-11-28 20:56:53');
/*!40000 ALTER TABLE `site_services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `UserPermissions`
--

DROP TABLE IF EXISTS `UserPermissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `UserPermissions` (
  `permissionId` int NOT NULL AUTO_INCREMENT,
  `permissionName` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `permissionType` varchar(20) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '00000000000',
  PRIMARY KEY (`permissionId`,`permissionType`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `UserPermissions`
--


--
-- Dumping data for table `UserPermissions`
--

LOCK TABLES `UserPermissions` WRITE;
/*!40000 ALTER TABLE `UserPermissions` DISABLE KEYS */;
INSERT INTO `UserPermissions` VALUES 
(0,'Alterar Menu-Logo','10000000'),
(1,'Alterar Banner-img','01000000'),
(2,'Alterar Banner-text','00100000'),
(3,'Alterar Banner-Logo','00010000'),
(4,'Modificar 1# Section','00001000'),
(5,'Alterar 2# Section','00000100'),
(6,'Nenhuma Permissão','00000000');
/*!40000 ALTER TABLE `UserPermissions` ENABLE KEYS */;
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
  CONSTRAINT `users_ck_created_at` CHECK (`created_at` regexp _utf8mb4'^[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}$'),
  CONSTRAINT `users_ck_email` CHECK (`email` regexp _utf8mb4'^[A-Za-z0-9_]+(.[A-Za-z0-9_]+)*@[A-Za-z0-9_]+(.[A-Za-z0-9_]+)+$'),
  CONSTRAINT `users_ck_password` CHECK (`password` regexp _utf8mb4'^[a-z0-9]{64}$'),
  CONSTRAINT `users_ck_sid` CHECK (`sid` regexp _utf8mb4'^[A-Za-z0-9]{12}$'),
  CONSTRAINT `users_ck_updated_at` CHECK (`updated_at` regexp _utf8mb4'^[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}$')
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

-- Dump completed on 2022-11-28 22:57:28

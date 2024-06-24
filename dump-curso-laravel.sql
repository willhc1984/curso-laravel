-- MySQL dump 10.13  Distrib 5.7.35, for Win64 (x86_64)
--
-- Host: localhost    Database: curso_laravel
-- ------------------------------------------------------
-- Server version	5.7.35-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `audits`
--

DROP TABLE IF EXISTS `audits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `audits` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `event` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auditable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auditable_id` bigint(20) unsigned NOT NULL,
  `old_values` text COLLATE utf8mb4_unicode_ci,
  `new_values` text COLLATE utf8mb4_unicode_ci,
  `url` text COLLATE utf8mb4_unicode_ci,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(1023) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `audits_auditable_type_auditable_id_index` (`auditable_type`,`auditable_id`),
  KEY `audits_user_id_user_type_index` (`user_id`,`user_type`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audits`
--

LOCK TABLES `audits` WRITE;
/*!40000 ALTER TABLE `audits` DISABLE KEYS */;
INSERT INTO `audits` VALUES (1,NULL,NULL,'created','App\\Models\\Classe',4,'[]','{\"name\":\"Aula 3\",\"descricao\":\"Introdu\\u00e7\\u00e3o\",\"course_id\":\"1\",\"order_classe\":3,\"id\":4}','http://localhost:8000/store-classe','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',NULL,'2024-05-29 12:29:46','2024-05-29 12:29:46'),(2,NULL,NULL,'updated','App\\Models\\Course',2,'{\"price\":189.9}','{\"price\":\"99.99\"}','http://localhost:8000/update-course/2','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',NULL,'2024-05-29 12:30:12','2024-05-29 12:30:12'),(3,NULL,NULL,'created','App\\Models\\Course',5,'[]','{\"name\":\"Java 39\",\"price\":\"2589.90\",\"id\":5}','http://localhost:8000/store-course','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',NULL,'2024-05-29 12:32:22','2024-05-29 12:32:22'),(4,NULL,NULL,'created','App\\Models\\Course',6,'[]','{\"name\":\"MySQL 8\",\"price\":\"89.90\",\"id\":6}','http://localhost:8000/store-course','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',NULL,'2024-05-29 12:57:33','2024-05-29 12:57:33'),(5,NULL,NULL,'updated','App\\Models\\Course',6,'{\"price\":89.9}','{\"price\":\"89.99\"}','http://localhost:8000/update-course/6','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',NULL,'2024-05-29 12:57:40','2024-05-29 12:57:40'),(6,NULL,NULL,'created','App\\Models\\Course',7,'[]','{\"name\":\"william henrique campos\",\"price\":\"1.23\",\"id\":7}','http://localhost:8000/store-course','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',NULL,'2024-05-29 12:58:54','2024-05-29 12:58:54'),(7,NULL,NULL,'deleted','App\\Models\\Course',7,'{\"id\":7,\"name\":\"william henrique campos\",\"price\":1.23}','[]','http://localhost:8000/destroy-course/7','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',NULL,'2024-05-29 12:59:14','2024-05-29 12:59:14'),(8,NULL,NULL,'created','App\\Models\\Course',8,'[]','{\"name\":\"Android SDK\",\"price\":\"125.47\",\"id\":8}','http://localhost:8000/store-course','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',NULL,'2024-05-29 16:34:12','2024-05-29 16:34:12'),(9,NULL,NULL,'deleted','App\\Models\\Course',8,'{\"id\":8,\"name\":\"Android SDK\",\"price\":125.47}','[]','http://localhost:8000/destroy-course/8','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',NULL,'2024-05-29 16:35:48','2024-05-29 16:35:48'),(10,NULL,NULL,'created','App\\Models\\Classe',6,'[]','{\"name\":\"aula1\",\"descricao\":\"teste\",\"course_id\":\"5\",\"order_classe\":1,\"id\":6}','http://localhost:8000/store-classe','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',NULL,'2024-05-29 16:49:59','2024-05-29 16:49:59'),(11,NULL,NULL,'created','App\\Models\\Classe',7,'[]','{\"name\":\"Arrays\",\"descricao\":\"Arrays\",\"course_id\":\"4\",\"order_classe\":1,\"id\":7}','http://localhost:8000/store-classe','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',NULL,'2024-05-29 16:50:34','2024-05-29 16:50:34'),(12,NULL,NULL,'created','App\\Models\\Classe',8,'[]','{\"name\":\"Sessions\",\"descricao\":\"Sessions\",\"course_id\":\"4\",\"order_classe\":2,\"id\":8}','http://localhost:8000/store-classe','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',NULL,'2024-05-29 16:50:51','2024-05-29 16:50:51'),(13,NULL,NULL,'created','App\\Models\\Classe',9,'[]','{\"name\":\"aula 2\",\"descricao\":\"aula 2\",\"course_id\":\"6\",\"order_classe\":2,\"id\":9}','http://localhost:8000/store-classe','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',NULL,'2024-05-29 18:27:50','2024-05-29 18:27:50'),(14,NULL,NULL,'created','App\\Models\\Classe',10,'[]','{\"name\":\"admin\",\"descricao\":\"123\",\"course_id\":\"73\",\"order_classe\":1,\"id\":10}','http://localhost:8000/store-classe','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',NULL,'2024-06-03 18:14:32','2024-06-03 18:14:32'),(15,NULL,NULL,'created','App\\Models\\Classe',11,'[]','{\"name\":\"teste\",\"descricao\":\"123\",\"course_id\":\"73\",\"order_classe\":2,\"id\":11}','http://localhost:8000/store-classe','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',NULL,'2024-06-03 18:15:23','2024-06-03 18:15:23'),(16,NULL,NULL,'updated','App\\Models\\Classe',10,'{\"descricao\":\"123\"}','{\"descricao\":\"1234\"}','http://localhost:8000/update-classe/10','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',NULL,'2024-06-03 18:16:38','2024-06-03 18:16:38'),(17,NULL,NULL,'updated','App\\Models\\Classe',10,'{\"descricao\":\"1234\"}','{\"descricao\":\"12346\"}','http://localhost:8000/update-classe/10','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',NULL,'2024-06-03 18:16:51','2024-06-03 18:16:51'),(18,NULL,NULL,'deleted','App\\Models\\Classe',10,'{\"id\":10,\"name\":\"admin\",\"descricao\":\"12346\",\"order_classe\":1,\"course_id\":73}','[]','http://localhost:8000/destroy-classe/10','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',NULL,'2024-06-03 18:17:44','2024-06-03 18:17:44'),(19,NULL,NULL,'created','App\\Models\\Classe',12,'[]','{\"name\":\"teste\",\"descricao\":\"123\",\"course_id\":\"73\",\"order_classe\":3,\"id\":12}','http://localhost:8000/store-classe','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',NULL,'2024-06-03 18:17:54','2024-06-03 18:17:54'),(20,'App\\Models\\User',58,'created','App\\Models\\Course',93,'[]','{\"name\":\"java 39\",\"price\":\"89.90\",\"id\":93}','http://localhost:8000/store-course','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36',NULL,'2024-06-07 16:38:56','2024-06-07 16:38:56'),(21,'App\\Models\\User',58,'deleted','App\\Models\\Course',93,'{\"id\":93,\"name\":\"java 39\",\"price\":89.9}','[]','http://localhost:8000/destroy-course/93','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36',NULL,'2024-06-07 17:55:14','2024-06-07 17:55:14'),(22,'App\\Models\\User',58,'deleted','App\\Models\\Course',89,'{\"id\":89,\"name\":\"Laravel 10\",\"price\":89.9}','[]','http://localhost:8000/destroy-course/89','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36',NULL,'2024-06-07 17:55:17','2024-06-07 17:55:17'),(23,'App\\Models\\User',58,'deleted','App\\Models\\Course',90,'{\"id\":90,\"name\":\"SQL Server 10\",\"price\":189.9}','[]','http://localhost:8000/destroy-course/90','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36',NULL,'2024-06-07 17:55:20','2024-06-07 17:55:20'),(24,'App\\Models\\User',58,'deleted','App\\Models\\Course',91,'{\"id\":91,\"name\":\"Java 8\",\"price\":289.9}','[]','http://localhost:8000/destroy-course/91','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36',NULL,'2024-06-07 17:55:23','2024-06-07 17:55:23'),(25,'App\\Models\\User',58,'deleted','App\\Models\\Course',92,'{\"id\":92,\"name\":\"PHP 8\",\"price\":289.9}','[]','http://localhost:8000/destroy-course/92','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36',NULL,'2024-06-07 17:55:26','2024-06-07 17:55:26'),(26,'App\\Models\\User',58,'deleted','App\\Models\\Course',85,'{\"id\":85,\"name\":\"Laravel 10\",\"price\":89.9}','[]','http://localhost:8000/destroy-course/85','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36',NULL,'2024-06-07 17:55:29','2024-06-07 17:55:29'),(27,'App\\Models\\User',58,'deleted','App\\Models\\Course',86,'{\"id\":86,\"name\":\"SQL Server 10\",\"price\":189.9}','[]','http://localhost:8000/destroy-course/86','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36',NULL,'2024-06-07 17:55:32','2024-06-07 17:55:32'),(28,'App\\Models\\User',58,'deleted','App\\Models\\Course',87,'{\"id\":87,\"name\":\"Java 8\",\"price\":289.9}','[]','http://localhost:8000/destroy-course/87','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36',NULL,'2024-06-07 17:55:35','2024-06-07 17:55:35'),(29,'App\\Models\\User',55,'created','App\\Models\\Classe',13,'[]','{\"name\":\"teste\",\"descricao\":\"123\",\"course_id\":\"88\",\"order_classe\":1,\"id\":13}','http://localhost:8000/store-classe','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36',NULL,'2024-06-07 18:20:49','2024-06-07 18:20:49'),(30,'App\\Models\\User',52,'updated','App\\Models\\Course',88,'{\"name\":\"PHP 8\",\"price\":289.9}','{\"name\":\"PHP 8.0\",\"price\":\"2899\"}','http://localhost:8000/update-course/88','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36',NULL,'2024-06-07 18:30:29','2024-06-07 18:30:29'),(31,'App\\Models\\User',73,'deleted','App\\Models\\Course',95,'{\"id\":95,\"name\":\"Java 8\",\"price\":289.9}','[]','http://localhost:8000/destroy-course/95','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36',NULL,'2024-06-17 18:22:03','2024-06-17 18:22:03'),(32,'App\\Models\\User',73,'created','App\\Models\\Classe',14,'[]','{\"name\":\"variaveis\",\"descricao\":\"variaveis\",\"course_id\":\"4\",\"order_classe\":3,\"id\":14}','http://localhost:8000/store-classe','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36',NULL,'2024-06-17 18:24:07','2024-06-17 18:24:07'),(33,'App\\Models\\User',73,'updated','App\\Models\\Classe',14,'{\"name\":\"variaveis\"}','{\"name\":\"Variaveis\"}','http://localhost:8000/update-classe/14','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36',NULL,'2024-06-17 18:24:18','2024-06-17 18:24:18'),(34,'App\\Models\\User',7,'created','App\\Models\\Classe',15,'[]','{\"name\":\"introdu\\u00e7\\u00e3o\",\"descricao\":\"introdu\\u00e7\\u00e3o\",\"course_id\":\"93\",\"order_classe\":1,\"id\":15}','http://localhost:8000/store-classe','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36',NULL,'2024-06-20 16:24:24','2024-06-20 16:24:24'),(35,'App\\Models\\User',8,'updated','App\\Models\\Course',94,'{\"price\":189.9}','{\"price\":\"1899\"}','http://localhost:8000/update-course/94','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36',NULL,'2024-06-20 16:50:51','2024-06-20 16:50:51');
/*!40000 ALTER TABLE `audits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `classes`
--

DROP TABLE IF EXISTS `classes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_classe` int(11) NOT NULL,
  `course_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `classes_course_id_foreign` (`course_id`),
  CONSTRAINT `classes_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classes`
--

LOCK TABLES `classes` WRITE;
/*!40000 ALTER TABLE `classes` DISABLE KEYS */;
INSERT INTO `classes` VALUES (1,'Aula 1','Introdução',1,1,'2024-05-29 12:28:58','2024-05-29 12:28:58'),(2,'Aula 2','Introdução 2',2,1,'2024-05-29 12:28:58','2024-05-29 12:28:58'),(3,'Aula 3','Introdução 3',3,2,'2024-05-29 12:28:58','2024-05-29 12:28:58'),(4,'Aula 3','Introdução',3,1,'2024-05-29 12:29:46','2024-05-29 12:29:46'),(5,'Aula 3','intro',1,6,NULL,NULL),(6,'aula1','teste',1,5,'2024-05-29 16:49:59','2024-05-29 16:49:59'),(7,'Arrays','Arrays',1,4,'2024-05-29 16:50:34','2024-05-29 16:50:34'),(8,'Sessions','Sessions',2,4,'2024-05-29 16:50:51','2024-05-29 16:50:51'),(9,'aula 2','aula 2',2,6,'2024-05-29 18:27:50','2024-05-29 18:27:50'),(11,'teste','123',2,73,'2024-06-03 18:15:23','2024-06-03 18:15:23'),(12,'teste','123',3,73,'2024-06-03 18:17:54','2024-06-03 18:17:54'),(13,'teste','123',1,88,'2024-06-07 18:20:49','2024-06-07 18:20:49'),(14,'Variaveis','variaveis',3,4,'2024-06-17 18:24:07','2024-06-17 18:24:18'),(15,'introdução','introdução',1,93,'2024-06-20 16:24:24','2024-06-20 16:24:24');
/*!40000 ALTER TABLE `classes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES (1,'Laravel 10',89.90,'2024-05-29 12:28:58','2024-05-29 12:28:58'),(2,'SQL Server 10',99.99,'2024-05-29 12:28:58','2024-05-29 12:30:12'),(3,'Java 8',289.90,'2024-05-29 12:28:58','2024-05-29 12:28:58'),(4,'PHP 8',289.90,'2024-05-29 12:28:58','2024-05-29 12:28:58'),(5,'Java 39',2589.90,'2024-05-29 12:32:22','2024-05-29 12:32:22'),(6,'MySQL 8',89.99,'2024-05-29 12:57:33','2024-05-29 12:57:40'),(9,'Laravel 10',89.90,'2024-06-03 12:58:01','2024-06-03 12:58:01'),(10,'SQL Server 10',189.90,'2024-06-03 12:58:02','2024-06-03 12:58:02'),(11,'Java 8',289.90,'2024-06-03 12:58:02','2024-06-03 12:58:02'),(12,'PHP 8',289.90,'2024-06-03 12:58:02','2024-06-03 12:58:02'),(13,'Laravel 10',89.90,'2024-06-03 13:02:36','2024-06-03 13:02:36'),(14,'SQL Server 10',189.90,'2024-06-03 13:02:36','2024-06-03 13:02:36'),(15,'Java 8',289.90,'2024-06-03 13:02:36','2024-06-03 13:02:36'),(16,'PHP 8',289.90,'2024-06-03 13:02:36','2024-06-03 13:02:36'),(17,'Laravel 10',89.90,'2024-06-03 13:03:54','2024-06-03 13:03:54'),(18,'SQL Server 10',189.90,'2024-06-03 13:03:54','2024-06-03 13:03:54'),(19,'Java 8',289.90,'2024-06-03 13:03:54','2024-06-03 13:03:54'),(20,'PHP 8',289.90,'2024-06-03 13:03:54','2024-06-03 13:03:54'),(21,'Laravel 10',89.90,'2024-06-03 16:19:04','2024-06-03 16:19:04'),(22,'SQL Server 10',189.90,'2024-06-03 16:19:04','2024-06-03 16:19:04'),(23,'Java 8',289.90,'2024-06-03 16:19:04','2024-06-03 16:19:04'),(24,'PHP 8',289.90,'2024-06-03 16:19:04','2024-06-03 16:19:04'),(25,'Laravel 10',89.90,'2024-06-03 16:21:51','2024-06-03 16:21:51'),(26,'SQL Server 10',189.90,'2024-06-03 16:21:51','2024-06-03 16:21:51'),(27,'Java 8',289.90,'2024-06-03 16:21:51','2024-06-03 16:21:51'),(28,'PHP 8',289.90,'2024-06-03 16:21:51','2024-06-03 16:21:51'),(29,'Laravel 10',89.90,'2024-06-03 16:23:43','2024-06-03 16:23:43'),(30,'SQL Server 10',189.90,'2024-06-03 16:23:43','2024-06-03 16:23:43'),(31,'Java 8',289.90,'2024-06-03 16:23:43','2024-06-03 16:23:43'),(32,'PHP 8',289.90,'2024-06-03 16:23:43','2024-06-03 16:23:43'),(33,'Laravel 10',89.90,'2024-06-03 16:28:08','2024-06-03 16:28:08'),(34,'SQL Server 10',189.90,'2024-06-03 16:28:08','2024-06-03 16:28:08'),(35,'Java 8',289.90,'2024-06-03 16:28:08','2024-06-03 16:28:08'),(36,'PHP 8',289.90,'2024-06-03 16:28:08','2024-06-03 16:28:08'),(37,'Laravel 10',89.90,'2024-06-03 18:03:52','2024-06-03 18:03:52'),(38,'SQL Server 10',189.90,'2024-06-03 18:03:52','2024-06-03 18:03:52'),(39,'Java 8',289.90,'2024-06-03 18:03:52','2024-06-03 18:03:52'),(40,'PHP 8',289.90,'2024-06-03 18:03:52','2024-06-03 18:03:52'),(41,'Laravel 10',89.90,'2024-06-03 18:09:00','2024-06-03 18:09:00'),(42,'SQL Server 10',189.90,'2024-06-03 18:09:00','2024-06-03 18:09:00'),(43,'Java 8',289.90,'2024-06-03 18:09:00','2024-06-03 18:09:00'),(44,'PHP 8',289.90,'2024-06-03 18:09:00','2024-06-03 18:09:00'),(45,'Laravel 10',89.90,'2024-06-03 18:09:02','2024-06-03 18:09:02'),(46,'SQL Server 10',189.90,'2024-06-03 18:09:02','2024-06-03 18:09:02'),(47,'Java 8',289.90,'2024-06-03 18:09:02','2024-06-03 18:09:02'),(48,'PHP 8',289.90,'2024-06-03 18:09:02','2024-06-03 18:09:02'),(49,'Laravel 10',89.90,'2024-06-03 18:09:04','2024-06-03 18:09:04'),(50,'SQL Server 10',189.90,'2024-06-03 18:09:04','2024-06-03 18:09:04'),(51,'Java 8',289.90,'2024-06-03 18:09:04','2024-06-03 18:09:04'),(52,'PHP 8',289.90,'2024-06-03 18:09:04','2024-06-03 18:09:04'),(53,'Laravel 10',89.90,'2024-06-03 18:09:06','2024-06-03 18:09:06'),(54,'SQL Server 10',189.90,'2024-06-03 18:09:06','2024-06-03 18:09:06'),(55,'Java 8',289.90,'2024-06-03 18:09:06','2024-06-03 18:09:06'),(56,'PHP 8',289.90,'2024-06-03 18:09:06','2024-06-03 18:09:06'),(57,'Laravel 10',89.90,'2024-06-03 18:09:19','2024-06-03 18:09:19'),(58,'SQL Server 10',189.90,'2024-06-03 18:09:19','2024-06-03 18:09:19'),(59,'Java 8',289.90,'2024-06-03 18:09:19','2024-06-03 18:09:19'),(60,'PHP 8',289.90,'2024-06-03 18:09:19','2024-06-03 18:09:19'),(61,'Laravel 10',89.90,'2024-06-03 18:09:20','2024-06-03 18:09:20'),(62,'SQL Server 10',189.90,'2024-06-03 18:09:20','2024-06-03 18:09:20'),(63,'Java 8',289.90,'2024-06-03 18:09:20','2024-06-03 18:09:20'),(64,'PHP 8',289.90,'2024-06-03 18:09:20','2024-06-03 18:09:20'),(65,'Laravel 10',89.90,'2024-06-03 18:09:21','2024-06-03 18:09:21'),(66,'SQL Server 10',189.90,'2024-06-03 18:09:21','2024-06-03 18:09:21'),(67,'Java 8',289.90,'2024-06-03 18:09:21','2024-06-03 18:09:21'),(68,'PHP 8',289.90,'2024-06-03 18:09:21','2024-06-03 18:09:21'),(69,'Laravel 10',89.90,'2024-06-03 18:10:04','2024-06-03 18:10:04'),(70,'SQL Server 10',189.90,'2024-06-03 18:10:04','2024-06-03 18:10:04'),(71,'Java 8',289.90,'2024-06-03 18:10:04','2024-06-03 18:10:04'),(72,'PHP 8',289.90,'2024-06-03 18:10:04','2024-06-03 18:10:04'),(73,'Laravel 10',89.90,'2024-06-03 18:10:21','2024-06-03 18:10:21'),(74,'SQL Server 10',189.90,'2024-06-03 18:10:21','2024-06-03 18:10:21'),(75,'Java 8',289.90,'2024-06-03 18:10:21','2024-06-03 18:10:21'),(76,'PHP 8',289.90,'2024-06-03 18:10:21','2024-06-03 18:10:21'),(77,'Laravel 10',89.90,'2024-06-05 17:47:51','2024-06-05 17:47:51'),(78,'SQL Server 10',189.90,'2024-06-05 17:47:51','2024-06-05 17:47:51'),(79,'Java 8',289.90,'2024-06-05 17:47:51','2024-06-05 17:47:51'),(80,'PHP 8',289.90,'2024-06-05 17:47:51','2024-06-05 17:47:51'),(81,'Laravel 10',89.90,'2024-06-05 17:48:15','2024-06-05 17:48:15'),(82,'SQL Server 10',189.90,'2024-06-05 17:48:15','2024-06-05 17:48:15'),(83,'Java 8',289.90,'2024-06-05 17:48:15','2024-06-05 17:48:15'),(84,'PHP 8',289.90,'2024-06-05 17:48:15','2024-06-05 17:48:15'),(88,'PHP 8.0',2899.00,'2024-06-05 17:51:09','2024-06-07 18:30:29'),(89,'Laravel 10',89.90,'2024-06-17 18:08:42','2024-06-17 18:08:42'),(90,'SQL Server 10',189.90,'2024-06-17 18:08:42','2024-06-17 18:08:42'),(91,'Java 8',289.90,'2024-06-17 18:08:42','2024-06-17 18:08:42'),(92,'PHP 8',289.90,'2024-06-17 18:08:42','2024-06-17 18:08:42'),(93,'Laravel 10',89.90,'2024-06-17 18:09:47','2024-06-17 18:09:47'),(94,'SQL Server 10',1899.00,'2024-06-17 18:09:47','2024-06-20 16:50:50'),(96,'PHP 8',289.90,'2024-06-17 18:09:47','2024-06-17 18:09:47');
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2024_03_11_192010_create_courses_table',1),(6,'2024_03_21_151552_alter_courses_add_price_table',1),(7,'2024_03_21_162421_create_classes_table',1),(8,'2024_03_25_154037_alter_classes_add_order_classe_table',1),(9,'2024_04_03_133725_create_audits_table',1),(10,'2024_06_07_104257_create_permission_tables',2),(11,'2024_06_19_142556_alter_permissions_add_title',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
INSERT INTO `model_has_permissions` VALUES (46,'App\\Models\\User',1),(47,'App\\Models\\User',1),(48,'App\\Models\\User',1),(49,'App\\Models\\User',1),(50,'App\\Models\\User',1),(51,'App\\Models\\User',1),(52,'App\\Models\\User',1),(53,'App\\Models\\User',1),(54,'App\\Models\\User',1),(55,'App\\Models\\User',1),(56,'App\\Models\\User',1),(57,'App\\Models\\User',1),(58,'App\\Models\\User',1),(59,'App\\Models\\User',1),(60,'App\\Models\\User',1),(61,'App\\Models\\User',1),(62,'App\\Models\\User',1),(63,'App\\Models\\User',1),(64,'App\\Models\\User',1),(65,'App\\Models\\User',1),(66,'App\\Models\\User',1),(67,'App\\Models\\User',1),(46,'App\\Models\\User',2),(47,'App\\Models\\User',2),(48,'App\\Models\\User',2),(49,'App\\Models\\User',2),(50,'App\\Models\\User',2),(61,'App\\Models\\User',2),(63,'App\\Models\\User',2),(66,'App\\Models\\User',2),(67,'App\\Models\\User',2);
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (51,'App\\Models\\User',1),(53,'App\\Models\\User',2),(54,'App\\Models\\User',4),(54,'App\\Models\\User',5),(55,'App\\Models\\User',6),(55,'App\\Models\\User',7);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('will@will.com','$2y$10$x2fKHMHD7kXwrns5qg0VxuU5c3vct8f5c4MuhquQi7Di5bnpQ2lpO','2024-06-06 14:03:58'),('will-hc-1984@hotmail.com','$2y$10$dh45Kw14/zyBeDp3XngATuuUnyhvcUOSCzfS.cjoilsd4e4F45/ny','2024-06-07 12:38:17');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (46,'Listar cursos','index-course','web','2024-06-20 18:06:31','2024-06-20 18:06:31'),(47,'Visualizar curso','show-course','web','2024-06-20 18:06:31','2024-06-20 18:06:31'),(48,'Cadastrar cursos','create-course','web','2024-06-20 18:06:31','2024-06-20 18:06:31'),(49,'Editar cursos','edit-course','web','2024-06-20 18:06:31','2024-06-20 18:06:31'),(50,'Apagar cursos','destroy-course','web','2024-06-20 18:06:32','2024-06-20 18:06:32'),(51,'Listar usuários','index-user','web','2024-06-20 18:06:32','2024-06-20 18:06:32'),(52,'Visualizar usuários','show-user','web','2024-06-20 18:06:32','2024-06-20 18:06:32'),(53,'Cadastrar usuários','create-user','web','2024-06-20 18:06:32','2024-06-20 18:06:32'),(54,'Editar usuários','edit-user','web','2024-06-20 18:06:32','2024-06-20 18:06:32'),(55,'Apagar usuários','destroy-user','web','2024-06-20 18:06:32','2024-06-20 18:06:32'),(56,'Listar aulas','index-classe','web','2024-06-20 18:06:32','2024-06-20 18:06:32'),(57,'Visualizar aulas','show-classe','web','2024-06-20 18:06:32','2024-06-20 18:06:32'),(58,'Cadastrar aulas','create-classe','web','2024-06-20 18:06:32','2024-06-20 18:06:32'),(59,'Editar aulas','edit-classe','web','2024-06-20 18:06:32','2024-06-20 18:06:32'),(60,'Apagar aulas','destroy-classe','web','2024-06-20 18:06:32','2024-06-20 18:06:32'),(61,'Listar papéis','index-role','web','2024-06-20 18:06:32','2024-06-20 18:06:32'),(62,'Visualizar papéis','show-role','web','2024-06-20 18:06:32','2024-06-20 18:06:32'),(63,'Cadastrar papéis','create-role','web','2024-06-20 18:06:32','2024-06-20 18:06:32'),(64,'Editar papéis','edit-role','web','2024-06-20 18:06:32','2024-06-20 18:06:32'),(65,'Apagar papéis','destroy-role','web','2024-06-20 18:06:32','2024-06-20 18:06:32'),(66,'Listar permissões do papel','index-role-permission','web','2024-06-20 18:06:32','2024-06-20 18:06:32'),(67,'Atualizar permissões do papel','update-role-permission','web','2024-06-20 18:06:32','2024-06-20 18:06:32');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (46,53),(47,53),(48,53),(49,53),(50,53),(61,53),(63,53),(66,53),(67,53);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (51,'Super Admin','web','2024-06-20 18:06:23','2024-06-20 18:06:23'),(52,'Admin','web','2024-06-20 18:06:23','2024-06-20 18:06:23'),(53,'Professor','web','2024-06-20 18:06:23','2024-06-20 18:06:23'),(54,'Tutor','web','2024-06-20 18:06:23','2024-06-20 18:06:23'),(55,'Aluno','web','2024-06-20 18:06:23','2024-06-20 18:06:23');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'William Henrique','will@will.com',NULL,'$2y$10$iwZgDh4WgJS932UgOSY1OOqqwzrJ.XPamDenDyMroaF4CXaxV5s4K',NULL,'2024-06-20 18:06:35','2024-06-20 18:06:35'),(2,'jose','jose@jose',NULL,'$2y$10$YcYxmrJvUuTtopP/bpcZcOhWaeTuKtICSY2EOMdMlcT1TaYdVPwzO',NULL,'2024-06-20 18:06:35','2024-06-20 18:06:35'),(3,'maria','maria@maria',NULL,'$2y$10$GHPVebZSH9Pma3muFi8vluXnewlYObW.CFPEdtqvC9cgWG1d3.nG2',NULL,'2024-06-20 18:06:35','2024-06-20 18:06:35'),(4,'fernando','fer@fer',NULL,'$2y$10$scwZ8O2D853VzYk0hNhwOOrMQt4JdvXPH.d5I4FO50KSuOQ4Q9OK2',NULL,'2024-06-20 18:06:35','2024-06-20 18:06:35'),(5,'joana','joana@gmail',NULL,'$2y$10$SQsMS1FDnZo3/6m9TdhlUOC582//9BqLbyUOu86UyYgXc4pYOLJ9e',NULL,'2024-06-20 18:06:35','2024-06-20 18:06:35'),(6,'patricia','patricia@patricia',NULL,'$2y$10$STvfd72FVhUIKXXVgcsupuGSOP7Z/G2QhxRPd7/OmP44cM00gTDv2',NULL,'2024-06-20 18:06:35','2024-06-20 18:06:35'),(7,'marcos','marcos@marcos',NULL,'$2y$10$kaAOPgYjt8MqfmhHtHW97.64uaiiXNyGYjRvMc8PgjXhYKTT2XKI6',NULL,'2024-06-20 18:06:35','2024-06-20 18:06:35');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'curso_laravel'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-24 10:12:20

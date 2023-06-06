
-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: 34.69.121.100    Database: Practical5
-- ------------------------------------------------------
-- Server version	8.0.26-google

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
SET @MYSQLDUMP_TEMP_LOG_BIN = @@SESSION.SQL_LOG_BIN;
SET @@SESSION.SQL_LOG_BIN= 0;

--
-- Table structure for table `Connoisseur`
--

DROP TABLE IF EXISTS `Connoisseur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8 */;
CREATE TABLE `Connoisseur` (
  `User_id` int NOT NULL,
  PRIMARY KEY (`User_id`),
  CONSTRAINT `Connoisseur_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `User` (`User_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Connoisseur`
--

LOCK TABLES `Connoisseur` WRITE;
/*!40000 ALTER TABLE `Connoisseur` DISABLE KEYS */;
INSERT INTO `Connoisseur` VALUES (5),(10),(50),(61),(62),(70);
/*!40000 ALTER TABLE `Connoisseur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `General_User`
--

DROP TABLE IF EXISTS `General_User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `General_User` (
  `User_id` int NOT NULL,
  PRIMARY KEY (`User_id`),
  CONSTRAINT `General_User_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `User` (`User_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `General_User`
--

LOCK TABLES `General_User` WRITE;
/*!40000 ALTER TABLE `General_User` DISABLE KEYS */;
INSERT INTO `General_User` VALUES (1),(2),(3),(5),(9),(10),(11),(12),(14),(15),(16),(18),(19),(20),(21),(22),(23),(24),(25),(26),(28),(29),(31),(32),(33),(34),(36),(37),(38),(40),(41),(42),(43),(44),(45),(46),(47),(48),(49),(50),(52),(54),(55),(56),(57),(58),(59),(60),(61),(62),(63),(64),(65),(66),(67),(68),(69),(70),(71),(72);
/*!40000 ALTER TABLE `General_User` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Manager`
--

DROP TABLE IF EXISTS `Manager`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Manager` (
  `User_id` int NOT NULL,
  `Winery_id` int DEFAULT NULL,
  PRIMARY KEY (`User_id`),
  KEY `Winery_id` (`Winery_id`),
  CONSTRAINT `Manager_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `User` (`User_id`),
  CONSTRAINT `Manager_ibfk_2` FOREIGN KEY (`Winery_id`) REFERENCES `Winery` (`Winery_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Manager`
--

LOCK TABLES `Manager` WRITE;
/*!40000 ALTER TABLE `Manager` DISABLE KEYS */;
INSERT INTO `Manager` VALUES (6,1),(53,2),(13,3),(4,4),(27,5),(30,6),(7,7),(8,8),(52,9),(10,10),(11,11),(12,12),(54,13),(14,14),(16,15),(15,16),(73,17),(50,18),(29,19),(28,20),(47,21),(48,22),(49,23),(31,24),(32,25),(33,26);
/*!40000 ALTER TABLE `Manager` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Review`
--

DROP TABLE IF EXISTS `Review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Review` (
  `Write_id` int NOT NULL,
  `User_id` int DEFAULT NULL,
  `Wine_id` int DEFAULT NULL,
  `Rating` decimal(4,2) DEFAULT NULL,
  `Review_type` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Write_id`),
  KEY `User_id` (`User_id`),
  KEY `Wine_id` (`Wine_id`),
  CONSTRAINT `Review_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `User` (`User_id`),
  CONSTRAINT `Review_ibfk_2` FOREIGN KEY (`Wine_id`) REFERENCES `Wine` (`Wine_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Review`
--

LOCK TABLES `Review` WRITE;
/*!40000 ALTER TABLE `Review` DISABLE KEYS */;
INSERT INTO `Review` VALUES (1,1,1,4.60,'General'),(2,2,2,4.90,'General'),(3,3,3,4.70,'General'),(4,9,4,4.80,'General'),(5,11,5,4.30,'General'),(6,12,6,4.50,'General'),(7,14,7,4.70,'General'),(8,15,8,4.20,'General'),(9,16,9,4.90,'General'),(10,18,10,4.60,'General'),(11,19,11,4.70,'General'),(12,20,12,4.80,'General'),(13,21,13,4.90,'General'),(14,22,14,4.50,'General'),(15,23,15,4.40,'General'),(16,24,16,4.30,'General'),(17,25,17,4.70,'General'),(18,26,18,4.90,'General'),(19,28,19,4.60,'General'),(20,29,20,4.80,'General'),(21,31,21,4.50,'General'),(22,32,22,4.70,'General'),(23,33,23,4.60,'General'),(24,34,24,4.40,'General'),(25,36,25,4.80,'General'),(26,37,26,4.90,'General'),(27,38,27,4.70,'General'),(28,40,28,4.50,'General'),(29,41,29,4.30,'General'),(30,42,30,4.80,'General'),(31,43,1,4.70,'General'),(32,44,2,4.60,'General'),(33,45,3,4.40,'General'),(34,46,4,4.70,'General'),(35,47,5,4.80,'General'),(36,48,6,4.90,'General'),(37,49,7,4.50,'General'),(38,52,8,4.60,'General'),(39,54,9,4.70,'General'),(40,55,10,4.80,'General'),(41,56,11,4.50,'General'),(42,57,12,4.90,'General'),(43,58,13,4.70,'General'),(44,59,14,4.40,'General'),(45,60,15,4.80,'General'),(46,63,16,4.60,'General'),(47,64,17,4.70,'General'),(48,65,18,4.90,'General'),(49,66,19,4.80,'General'),(50,67,20,4.60,'General'),(51,1,21,4.50,'General'),(52,2,22,4.70,'General'),(53,3,23,4.90,'General'),(54,9,24,4.80,'General'),(55,11,25,4.60,'General'),(56,12,26,4.70,'General'),(57,14,27,4.40,'General'),(58,15,28,4.80,'General'),(59,16,29,4.60,'General'),(60,18,30,4.70,'General'),(61,19,1,4.80,'General'),(62,20,2,4.90,'General'),(63,21,3,4.50,'General'),(64,22,4,4.70,'General'),(65,23,5,4.60,'General'),(66,24,6,4.40,'General'),(67,25,7,4.80,'General'),(68,26,8,4.60,'General'),(69,28,9,4.70,'General'),(70,29,10,4.90,'General'),(71,31,11,4.80,'General'),(72,32,12,4.70,'General'),(73,33,13,4.50,'General'),(74,34,14,4.60,'General'),(75,36,15,4.90,'General'),(76,37,16,4.80,'General'),(77,38,17,4.60,'General'),(78,40,18,4.50,'General'),(79,41,19,4.70,'General'),(80,42,20,4.90,'General'),(81,1,21,4.60,'General'),(82,2,22,4.50,'General'),(83,3,23,4.70,'General'),(84,9,24,4.80,'General'),(85,11,25,4.60,'General'),(86,12,26,4.40,'General'),(87,14,27,4.70,'General'),(88,15,28,4.60,'General'),(89,16,29,4.50,'General'),(90,18,30,4.80,'General'),(91,19,1,4.90,'General'),(92,20,2,4.70,'General'),(93,21,3,4.50,'General'),(94,22,4,4.60,'General'),(95,23,5,4.80,'General'),(96,24,6,4.70,'General'),(97,25,7,4.60,'General'),(98,26,8,4.40,'General'),(99,28,9,4.70,'General'),(100,29,10,4.50,'General'),(101,61,1,4.70,'Critic'),(102,70,2,4.90,'Critic'),(103,50,3,4.80,'Critic'),(104,10,4,4.60,'Critic'),(105,5,5,4.70,'Critic'),(106,62,6,4.50,'Critic'),(107,61,7,4.20,'Critic'),(108,70,8,4.30,'Critic'),(109,50,9,4.10,'Critic'),(110,10,10,4.40,'Critic'),(111,5,11,4.00,'Critic'),(112,62,12,4.60,'Critic'),(113,61,13,4.80,'Critic'),(114,70,14,4.50,'Critic'),(115,50,15,4.90,'Critic'),(116,10,16,4.70,'Critic'),(117,5,17,4.60,'Critic'),(118,62,18,4.40,'Critic'),(119,61,19,4.20,'Critic'),(120,70,20,4.30,'Critic'),(121,50,21,4.70,'Critic'),(122,10,22,4.90,'Critic'),(123,5,23,4.80,'Critic'),(124,62,24,4.60,'Critic'),(125,61,25,4.70,'Critic'),(126,70,26,4.50,'Critic'),(127,50,27,4.80,'Critic'),(128,10,28,4.60,'Critic'),(129,5,29,4.70,'Critic'),(130,62,30,3.60,'General');
/*!40000 ALTER TABLE `Review` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `User` (
  `User_id` int NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `First_name` varchar(50) DEFAULT NULL,
  `Last_name` varchar(50) DEFAULT NULL,
  `Street_name` varchar(50) DEFAULT NULL,
  `Suburb` varchar(50) DEFAULT NULL,
  `Province` varchar(50) DEFAULT NULL,
  `Country` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`User_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES (1,'john@example.com','password123','John','Doe','123 Main Street','New York','New York','USA'),(2,'john@example.com','ABC123','John','Doe','123 Main Street','Los Angeles','California','USA'),(3,'jane@example.com','XYZ789','Jane','Smith','456 Oak Avenue','New York','New York','USA'),(4,'michael@example.com','PWD456','Michael','Johnson','789 Elm Lane','Chicago','Illinois','USA'),(5,'sarah@example.com','PASS123','Sarah','Williams','321 Maple Drive','Houston','Texas','USA'),(6,'pierre@example.com','FRpass123','Pierre','Dupont','12 Rue de la Paix','Paris','Île-de-France','FRA'),(7,'sophie@example.com','FRpass456','Sophie','Leroy','34 Avenue des Champs-Élysées','Paris','Île-de-France','FRA'),(8,'antoine@example.com','FRpass789','Antoine','Martin','56 Rue Saint-Honoré','Marseille','Provence-Alpes-Côte','FRA'),(9,'manuel@example.com','PTpass123','Manuel','Silva','78 Rua das Flores','Lisbon','Lisbon','PRT'),(10,'maria@example.com','PTpass456','Maria','Santos','90 Avenida da Liberdade','Porto','Porto','PRT'),(11,'joao@example.com','PTpass789','João','Rodrigues','112 Rua do Carmo','Braga','Braga','PRT'),(12,'bongani@example.com','ZAp@ss123','Bongani','Mthembu','123 Main Road','Johannesburg','Gauteng','ZAF'),(13,'thandi@example.com','ZAp@ss456','Thandi','Khumalo','456 Church Street','Durban','KwaZulu-Natal','ZAF'),(14,'lucas@example.com','ZAp@ss789','Lucas','Botha','789 Beachfront Avenue','Cape Town','Western Cape','ZAF'),(15,'antonio@example.com','ESPpass123','Antonio','García','12 Calle Mayor','Madrid','Community of Madrid','ESP'),(16,'maria@example.com','ESPpass456','María','López','34 Avenida de la Constitución','Seville','Andalusia','ESP'),(17,'javier@example.com','ESPpass789','Javier','Martínez','56 Plaza Mayor','Valencia','Valencia','ESP'),(18,'giuseppe@example.com','ITpass123','Giuseppe','Rossi','12 Via Roma','Rome','Lazio','ITA'),(19,'elena@example.com','ITpass456','Elena','Bianchi','34 Corso Italia','Milan','Lombardy','ITA'),(20,'miguel@example.com','MXpass123','Miguel','González','12 Calle Principal','Mexico City','Mexico City','MEX'),(21,'jessica@example.com','password123','Jessica','Smith','123 Oak Street','Los Angeles','California','USA'),(22,'alex@example.com','ABC123','Alex','Johnson','456 Pine Avenue','Chicago','Illinois','USA'),(23,'sophia@example.com','XYZ789','Sophia','Brown','789 Elm Lane','New York','New York','USA'),(24,'lucas@example.com','PWD456','Lucas','Garcia','321 Maple Drive','Houston','Texas','USA'),(25,'olivia@example.com','PASS123','Olivia','Davis','12 Grove Street','Los Angeles','California','USA'),(26,'emilie@example.com','FRpass123','Emilie','Martin','34 Rue de la Paix','Paris','Île-de-France','FRA'),(27,'charles@example.com','FRpass456','Charles','Thomas','56 Avenue des Champs-Élysées','Paris','Île-de-France','FRA'),(28,'elise@example.com','FRpass789','Elise','Petit','78 Rue Saint-Honoré','Marseille','Provence-Alpes-Côte','FRA'),(29,'tiago@example.com','PTpass123','Tiago','Ferreira','90 Rua das Flores','Lisbon','Lisbon','PRT'),(30,'isabel@example.com','PTpass456','Isabel','Oliveira','112 Avenida da Liberdade','Porto','Porto','PRT'),(31,'pedro@example.com','PTpass789','Pedro','Carvalho','134 Rua do Carmo','Braga','Braga','PRT'),(32,'thabo@example.com','ZAp@ss123','Thabo','Molefe','123 Main Road','Johannesburg','Gauteng','ZAF'),(33,'lebo@example.com','ZAp@ss456','Lebo','Nguyen','456 Church Street','Durban','KwaZulu-Natal','ZAF'),(34,'mthunzi@example.com','ZAp@ss789','Mthunzi','Van der Merwe','789 Beachfront Avenue','Cape Town','Western Cape','ZAF'),(35,'manuel@example.com','ESPpass123','Manuel','Gómez','12 Calle Mayor','Madrid','Community of Madrid','ESP'),(36,'laura@example.com','ESPpass456','Laura','Hernández','34 Avenida de la Constitución','Seville','Andalusia','ESP'),(37,'carlos@example.com','ESPpass789','Carlos','Sánchez','56 Plaza Mayor','Valencia','Valencia','ESP'),(38,'giovanni@example.com','ITpass123','Giovanni','Ricci','12 Via Roma','Rome','Lazio','ITA'),(39,'francesca@example.com','ITpass456','Francesca','Conti','34 Corso Italia','Milan','Lombardy','ITA'),(40,'alejandro@example.com','MXpass123','Alejandro','Hernández','12 Calle Principal','Mexico City','Mexico City','MEX'),(41,'caroline@example.com','password123','Caroline','Johnson','123 Oak Street','Los Angeles','California','USA'),(42,'daniel@example.com','ABC123','Daniel','Smith','456 Pine Avenue','Chicago','Illinois','USA'),(43,'emily@example.com','XYZ789','Emily','Brown','789 Elm Lane','New York','New York','USA'),(44,'ethan@example.com','PWD456','Ethan','Garcia','321 Maple Drive','Houston','Texas','USA'),(45,'ava@example.com','PASS123','Ava','Davis','12 Grove Street','Los Angeles','California','USA'),(46,'emma@example.com','FRpass123','Emma','Martin','34 Rue de la Paix','Paris','Île-de-France','FRA'),(47,'noah@example.com','FRpass456','Noah','Thomas','56 Avenue des Champs-Élysées','Paris','Île-de-France','FRA'),(48,'liam@example.com','FRpass789','Liam','Petit','78 Rue Saint-Honoré','Marseille','Provence-Alpes-Côte','FRA'),(49,'sophia@example.com','PTpass123','Sophia','Ferreira','90 Rua das Flores','Lisbon','Lisbon','PRT'),(50,'jackson@example.com','PTpass456','Jackson','Oliveira','112 Avenida da Liberdade','Porto','Porto','PRT'),(51,'aria@example.com','PTpass789','Aria','Carvalho','134 Rua do Carmo','Braga','Braga','PRT'),(52,'lucas@example.com','ZAp@ss123','Lucas','Molefe','123 Main Road','Johannesburg','Gauteng','ZAF'),(53,'mia@example.com','ZAp@ss456','Mia','Nguyen','456 Church Street','Durban','KwaZulu-Natal','ZAF'),(54,'hannah@example.com','ZAp@ss789','Hannah','Van der Merwe','789 Beachfront Avenue','Cape Town','Western Cape','ZAF'),(55,'oliver@example.com','ESPpass123','Oliver','Gómez','12 Calle Mayor','Madrid','Community of Madrid','ESP'),(56,'amelia@example.com','ESPpass456','Amelia','Hernández','34 Avenida de la Constitución','Seville','Andalusia','ESP'),(57,'henry@example.com','ESPpass789','Henry','Sánchez','56 Plaza Mayor','Valencia','Valencia','ESP'),(58,'isabella@example.com','ITpass123','Isabella','Ricci','12 Via Roma','Rome','Lazio','ITA'),(59,'mia@example.com','ITpass456','Mia','Conti','34 Corso Italia','Milan','Lombardy','ITA'),(60,'matías@example.com','MXpass123','Matías','Hernández','12 Calle Principal','Mexico City','Mexico City','MEX'),(61,'zoe@example.com','ZAp@ss123','Zoe','Kruger','123 Main Road','Johannesburg','Gauteng','ZAF'),(62,'liam@example.com','ZAp@ss456','Liam','Nkosi','456 Church Street','Durban','KwaZulu-Natal','ZAF'),(63,'lily@example.com','ZAp@ss789','Lily','Joubert','789 Beachfront Avenue','Cape Town','Western Cape','ZAF'),(64,'noah@example.com','ZAp@ss123','Noah','Botha','234 Main Road','Johannesburg','Gauteng','ZAF'),(65,'sophia@example.com','ZAp@ss456','Sophia','Coetzee','567 Church Street','Durban','KwaZulu-Natal','ZAF'),(66,'jackson@example.com','ZAp@ss789','Jackson','Van der Merwe','890 Beachfront Avenue','Cape Town','Western Cape','ZAF'),(67,'olivia@example.com','ZAp@ss123','Olivia','Fourie','345 Main Road','Johannesburg','Gauteng','ZAF'),(68,'liam@example.com','ZAp@ss456','Liam','Nkosi','678 Church Street','Durban','KwaZulu-Natal','ZAF'),(69,'ava@example.com','ZAp@ss789','Ava','Joubert','901 Beachfront Avenue','Cape Town','Western Cape','ZAF'),(70,'oliver@example.com','ZAp@ss123','Oliver','Botha','456 Main Road','Johannesburg','Gauteng','ZAF'),(71,'mariana@example.com','PTpass123','Mariana','Almeida','123 Rua dos Anjos','Lisbon','Lisbon','PRT'),(72,'tiago@example.com','PTpass456','Tiago','Gomes','456 Avenida Central','Porto','Porto','PRT'),(73,'beatriz@example.com','PTpass789','Beatriz','Santos','789 Praça da Liberdade','Braga','Braga','PRT');
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wine`
--

DROP TABLE IF EXISTS `Wine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Wine` (
  `Wine_id` int NOT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Producer` varchar(50) DEFAULT NULL,
  `AlcoholPer` decimal(5,2) DEFAULT NULL,
  `year` int DEFAULT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Price` int DEFAULT NULL,
  `Country_of_Origin` varchar(50) DEFAULT NULL,
  `Winery_id` int DEFAULT NULL,
  PRIMARY KEY (`Wine_id`),
  KEY `Winery_id` (`Winery_id`),
  CONSTRAINT `Wine_ibfk_1` FOREIGN KEY (`Winery_id`) REFERENCES `Winery` (`Winery_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wine`
--

LOCK TABLES `Wine` WRITE;
/*!40000 ALTER TABLE `Wine` DISABLE KEYS */;
INSERT INTO `Wine` VALUES (1,'Dessert','Château d`Yquem',14.00,1967,'Sauternes 1967',40000,'FRA',1),(2,'Red','De Toren',14.50,2016,'Book 17 XVII 2016',8000,'ZAF',2),(3,'Rose','Boschendal',14.50,2010,'Blanc de Noir 2010',7000,'ZAF',3),(4,'White','Aubert',15.00,2015,'Chardonnay Larry Hyde & Sons 2015',6000,'USA',4),(5,'Sparkling','Mestres',13.00,2000,'Mas Via Gran Reserva Brut 2000',11000,'ESP',5),(6,'Port','Taylor`s',14.50,1855,'Scion Port 1855',60000,'PRT',6),(7,'Red','De Toren',14.50,2014,'Book 17 XVII 2014',8000,'ZAF',2),(8,'White','Aubert',14.50,2012,'Chardonnay Eastside 2012',14000,'USA',4),(9,'Port','Taylor`s',14.00,1966,'Very Old Single Harvest Port 1966',13000,'PRT',6),(10,'Dessert','Château d`Yquem',14.50,2001,'Sauternes 2001',17000,'FRA',1),(11,'Red','Château Margaux',13.50,2010,'Château Margaux 2010',3500,'FRA',8),(12,'Red','Château Margaux',13.50,2005,'Château Margaux 2005',5000,'FRA',8),(13,'Red','Château Lafite Rothschild',13.50,2010,'Château Lafite Rothschild 2010',6000,'FRA',21),(14,'Red','Château Lafite Rothschild',13.50,2009,'Château Lafite Rothschild 2009',5500,'FRA',21),(15,'Red','Château Mouton Rothschild',13.50,2010,'Château Mouton Rothschild 2010',5500,'FRA',22),(16,'Red','Château Mouton Rothschild',13.50,2005,'Château Mouton Rothschild 2005',5000,'FRA',22),(17,'Red','Kanonkop Wine Estate',14.50,2015,'Kanonkop Paul Sauer 2015',3000,'ZAF',9),(18,'Red','Kanonkop Wine Estate',14.00,2010,'Kanonkop Paul Sauer 2010',2500,'ZAF',9),(19,'White','Boschendal Winery',13.00,2018,'Boschendal Grande Cuvée White Blend 2018',1200,'ZAF',11),(20,'White','Boschendal Winery',12.50,2016,'Boschendal Grande Cuvée White Blend 2016',1000,'ZAF',11),(21,'Red','Opus One Winery',14.50,2013,'Opus One 2013',5000,'USA',12),(22,'Red','Opus One Winery',14.50,2010,'Opus One 2010',4500,'USA',12),(23,'Red','Shafer Vineyards',14.50,2014,'Shafer Hillside Select 2014',4000,'USA',27),(24,'Red','Shafer Vineyards',14.50,2012,'Shafer Hillside Select 2012',3800,'USA',27),(25,'Sparkling','Cavas Recaredo',12.50,2012,'Recaredo Turó den Mota 2012',2200,'ESP',28),(26,'Sparkling','Cavas Recaredo',12.00,2010,'Recaredo Turó den Mota 2010',2000,'ESP',28),(27,'Port','Niepoort',20.00,2003,'Niepoort Vintage Port 2003',2500,'PRT',19),(28,'Port','Niepoort',19.50,2000,'Niepoort Vintage Port 2000',2300,'PRT',19),(29,'Dessert','Château dYquem',13.50,2009,'Château dYquem 2009',8000,'FRA',29),(30,'Dessert','Château dYquem',13.50,2005,'Château dYquem 2005',7000,'FRA',29);
/*!40000 ALTER TABLE `Wine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Winery`
--

DROP TABLE IF EXISTS `Winery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Winery` (
  `Winery_id` int NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Street_name` varchar(50) DEFAULT NULL,
  `Suburb` varchar(50) DEFAULT NULL,
  `Province` varchar(50) DEFAULT NULL,
  `Country` varchar(50) DEFAULT NULL,
  `Verified` int DEFAULT NULL,
  PRIMARY KEY (`Winery_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Winery`
--

LOCK TABLES `Winery` WRITE;
/*!40000 ALTER TABLE `Winery` DISABLE KEYS */;
INSERT INTO `Winery` VALUES (1,'Château d`Yquem','3 Rue Lurton','Sauternes','Bordeaux','FRA',1),(2,'De Toren','Polkadraai Road','Stellenbosch','Western Cape','ZAF',0),(3,'Boschendal','Pniel Road','Groot Drakenstein','Western Cape','ZAF',1),(4,'Aubert','Gravenstein Highway North','Sebastopol','California','USA',1),(5,'Mestres','Carretera de Sant Sadurní a Vilafranca','Sant Sadurní d`Anoia','Barcelona','ESP',1),(6,'Taylor`s','Rua do Choupelo','Vila Nova de Gaia','Porto','PRT',1),(7,'Château Haut-Brion','16 Avenue Jean Jaurès','Pessac','Bordeaux','FRA',1),(8,'Château Margaux','Margaux','Margaux','Bordeaux','FRA',1),(9,'Kanonkop Wine Estate','R44, Muldersvlei Road','Stellenbosch','Western Cape','ZAF',1),(10,'Boekenhoutskloof Winery','Franschhoek Pass Road','Franschhoek','Western Cape','ZAF',1),(11,'Boschendal Winery','Pniel Road','Groot Drakenstein','Western Cape','ZAF',1),(12,'Opus One Winery','7900 St Helena Hwy','Oakville','California','USA',1),(13,'Robert Mondavi Winery','7801 St Helena Hwy','Oakville','California','USA',1),(14,'Screaming Eagle Winery','7830 St Helena Hwy','Oakville','California','USA',1),(15,'Bodegas Torres','Carretera de Vilafranca a Sant Martí Sarroca','Vilafranca del Penedès','Barcelona','ESP',1),(16,'Codorníu','Avenida Jaume Codorníu','Sant Sadurní d`Anoia','Barcelona','ESP',1),(17,'Quinta do Crasto','Gouvinhas','Sabrosa','Douro','PRT',1),(18,'Quinta do Noval','Pinhão','Alijó','Douro','PRT',1),(19,'Niepoort','Rua Cândido dos Reis','Vila Nova de Gaia','Porto','PRT',1),(20,'Taylor`s Port','Rua do Choupelo','Vila Nova de Gaia','Porto','PRT',1),(21,'Château Lafite Rothschild','Pauillac','Pauillac','Bordeaux','FRA',1),(22,'Château Mouton Rothschild','Pauillac','Pauillac','Bordeaux','FRA',1),(23,'Groot Constantia Wine Estate','Groot Constantia Road','Constantia','Western Cape','ZAF',1),(24,'Rust en Vrede Estate','Annandale Road','Stellenbosch','Western Cape','ZAF',1),(25,'Bouchard Finlayson Winery','Hemel-en-Aarde Valley Road','Hermanus','Western Cape','ZAF',1),(26,'Robert Sinskey Vineyards','6320 Silverado Trail','Napa','California','USA',1),(27,'Shafer Vineyards','6154 Silverado Trail','Napa','California','USA',1),(28,'Cavas Recaredo','Carrer del Riu Anoia','Sant Sadurní d`Anoia','Barcelona','ESP',1),(29,'Château d`Yquem','3 Rue Lurton','Sauternes','Bordeaux','FRA',1),(30,'fgh','gfh','fg','hg','hfg',1);
/*!40000 ALTER TABLE `Winery` ENABLE KEYS */;
UNLOCK TABLES;
SET @@SESSION.SQL_LOG_BIN = @MYSQLDUMP_TEMP_LOG_BIN;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-06 21:18:19

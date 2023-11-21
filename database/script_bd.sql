-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: sistemaedu2
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `adm`
--

DROP TABLE IF EXISTS `adm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `CPF` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adm`
--

LOCK TABLES `adm` WRITE;
/*!40000 ALTER TABLE `adm` DISABLE KEYS */;
/*!40000 ALTER TABLE `adm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alunos`
--

DROP TABLE IF EXISTS `alunos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alunos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `data_nascimento` date DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `curso_id` int(11) DEFAULT NULL,
  `inativo` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `curso_id` (`curso_id`),
  CONSTRAINT `alunos_ibfk_1` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alunos`
--

LOCK TABLES `alunos` WRITE;
/*!40000 ALTER TABLE `alunos` DISABLE KEYS */;
INSERT INTO `alunos` VALUES (3,'VICTOR EMANUELL','1997-02-09','RUA BRASILZAO, 1000, IGUAÇU, IPATINGA/MG','VICTOR@EMAIL.COM',1,0),(4,'ANA MARIA',NULL,'RUA TESTE, 321, IDEAL, IPATINGA','ANA_MARIA@EMAIL.COM',NULL,0);
/*!40000 ALTER TABLE `alunos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cursos`
--

DROP TABLE IF EXISTS `cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cursos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `origem` set('Exatas','Humanas','Biologicas') DEFAULT NULL,
  `carga_horaria` varchar(10) DEFAULT NULL,
  `descricao` varchar(200) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursos`
--

LOCK TABLES `cursos` WRITE;
/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
INSERT INTO `cursos` VALUES (1,'CIENCIA DA COMPUTACAO','Exatas','380h','ciencia da computação',1),(2,'MATEMATICA','','480H','MATEMATICA',1),(9,'ENGENHARIA DA COMPUTAÇÃO','','550H','ENG COMPUTAÇÃO',1),(12,'PÓS GRADUAÇÃO EM DIREITO DIGITAL','','450H','PÓS GRADUAÇÃO',1),(13,'ENGENHARIA DE PRODUÇÃO','','800H','',1),(14,'PSICOLOGIA','Humanas','380H','',1);
/*!40000 ALTER TABLE `cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `diario`
--

DROP TABLE IF EXISTS `diario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `diario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aluno_id` int(11) DEFAULT NULL,
  `disciplina_id` int(11) DEFAULT NULL,
  `professor_id` int(11) DEFAULT NULL,
  `nota` decimal(3,0) DEFAULT NULL,
  `situacao` enum('aprovado','reprovado','cursando') DEFAULT NULL,
  `semestre` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `diario`
--

LOCK TABLES `diario` WRITE;
/*!40000 ALTER TABLE `diario` DISABLE KEYS */;
INSERT INTO `diario` VALUES (2,1,1,1,7,'','2/2023'),(4,2,3,2,2,'aprovado',''),(5,4,1,1,5,'','');
/*!40000 ALTER TABLE `diario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disciplinas`
--

DROP TABLE IF EXISTS `disciplinas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disciplinas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `curso_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `curso_id` (`curso_id`),
  CONSTRAINT `disciplinas_ibfk_1` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disciplinas`
--

LOCK TABLES `disciplinas` WRITE;
/*!40000 ALTER TABLE `disciplinas` DISABLE KEYS */;
INSERT INTO `disciplinas` VALUES (1,'COMPILADORES',1),(2,'SISTEMAS DISTRIBUIDOS',1),(3,'ESTRUTURAÇÃO DE DADOS',1),(4,'INGLES PARA COMPUTACAO',1),(5,'PROGRAMAÇÃO WEB',1),(6,'TOPICOS DE COMPUTACAO',1),(7,'INTELIGENCIA ARTIFICIAL',1),(8,'CALCULO 1',2),(9,'CALCULO 2',2),(10,'MATEMATICA PARA COMPUTAÇÃO',2),(11,'REDE DE COMPUTADORES',9);
/*!40000 ALTER TABLE `disciplinas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inscricoes`
--

DROP TABLE IF EXISTS `inscricoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inscricoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aluno_id` int(11) DEFAULT NULL,
  `curso_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `aluno_id` (`aluno_id`),
  KEY `curso_id` (`curso_id`),
  CONSTRAINT `inscricoes_ibfk_1` FOREIGN KEY (`aluno_id`) REFERENCES `alunos` (`id`),
  CONSTRAINT `inscricoes_ibfk_2` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inscricoes`
--

LOCK TABLES `inscricoes` WRITE;
/*!40000 ALTER TABLE `inscricoes` DISABLE KEYS */;
INSERT INTO `inscricoes` VALUES (2,3,2);
/*!40000 ALTER TABLE `inscricoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professores`
--

DROP TABLE IF EXISTS `professores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `professores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `especialidade` varchar(100) DEFAULT NULL,
  `email_academico` varchar(200) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professores`
--

LOCK TABLES `professores` WRITE;
/*!40000 ALTER TABLE `professores` DISABLE KEYS */;
INSERT INTO `professores` VALUES (1,'ISRAEL','CIENTISTA','israel@email.com','31999995555'),(2,'JULIO CESAR','CIENTISTA','JULIO@EMAIL.COM',NULL),(3,'JOSE','ENG MECANICO','JOSE@EMAIL.COM',NULL),(4,'MARIA SOARES','ENG QUIMICA','MARIA@EMAIL.COM',NULL),(5,'MARIO SERGIO','PSICOLOGO','MARIOSERGIO@EMAIL.COM','');
/*!40000 ALTER TABLE `professores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `login` varchar(100) DEFAULT NULL,
  `senha` varchar(36) DEFAULT NULL,
  `nivel` enum('0','1','2','3') DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'SUPER USUARIO','super@email.com','super','0'),(2,'PROFESSOR','professor@email.com','professor','2'),(3,'ALUNO','aluno@email.com','aluno','3'),(4,'ADMINISTRATIVO','12345678900','adm','1');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-24 13:25:01

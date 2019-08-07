/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.7.26-0ubuntu0.18.04.1 : Database - redhouse
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`redhouse` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `redhouse`;

/*Table structure for table `calificacion` */

DROP TABLE IF EXISTS `calificacion`;

CREATE TABLE `calificacion` (
  `idCalificacion` int(11) NOT NULL AUTO_INCREMENT,
  `valor` int(11) DEFAULT NULL,
  `idPublicacion` int(11) DEFAULT NULL,
  `idCliente` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idCalificacion`),
  KEY `idPublicacion` (`idPublicacion`),
  KEY `idCliente` (`idCliente`),
  CONSTRAINT `calificacion_ibfk_1` FOREIGN KEY (`idPublicacion`) REFERENCES `publicacion` (`idPublicacion`),
  CONSTRAINT `calificacion_ibfk_2` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `calificacion` */

/*Table structure for table `cliente` */

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  `idCliente` varchar(20) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `apellido` varchar(20) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `correo` varchar(30) DEFAULT NULL,
  `contrasena` varchar(16) DEFAULT NULL,
  `fechaCreado` datetime DEFAULT NULL,
  `fechaActualizado` datetime DEFAULT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cliente` */

/*Table structure for table `comentario` */

DROP TABLE IF EXISTS `comentario`;

CREATE TABLE `comentario` (
  `idComentario` int(11) NOT NULL AUTO_INCREMENT,
  `contenido` varchar(200) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `idPublicacion` int(11) DEFAULT NULL,
  `idCliente` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idComentario`),
  KEY `idPublicacion` (`idPublicacion`),
  KEY `idCliente` (`idCliente`),
  CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`idPublicacion`) REFERENCES `publicacion` (`idPublicacion`),
  CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `comentario` */

/*Table structure for table `publicacion` */

DROP TABLE IF EXISTS `publicacion`;

CREATE TABLE `publicacion` (
  `idPublicacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  `ubicacion` varchar(20) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `fechaPublicada` datetime DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `negociable` char(1) DEFAULT NULL,
  `tipoInmueble` varchar(20) DEFAULT NULL,
  `urlImagen` varchar(100) DEFAULT NULL,
  `idCliente` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idPublicacion`),
  KEY `idCliente` (`idCliente`),
  CONSTRAINT `publicacion_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `publicacion` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

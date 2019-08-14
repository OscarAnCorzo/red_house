-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 14-08-2019 a las 01:38:22
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `redhouse`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `idCalificacion` int(11) NOT NULL,
  `valor` int(11) DEFAULT NULL,
  `idPublicacion` int(11) DEFAULT NULL,
  `idCliente` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` varchar(20) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `apellido` varchar(20) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `correo` varchar(30) DEFAULT NULL,
  `contrasena` varchar(16) DEFAULT NULL,
  `fechaCreado` datetime DEFAULT NULL,
  `fechaActualizado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nombre`, `apellido`, `telefono`, `correo`, `contrasena`, `fechaCreado`, `fechaActualizado`) VALUES
('00000000', 'admin', 'admin', '1212121', 'admin', 'admin', '2019-06-04 00:00:00', '2019-08-01 00:00:00'),
('1111111111', 'juan', 'perez', '67333589', 'juan@gmail.com', '123456', '2019-08-09 00:00:00', '2019-08-09 09:11:29'),
('12312312312', 'juliana', 'suarez', '30047552', 'juliana@gmail.com', '123456', '2019-08-09 00:00:00', '2019-08-09 00:00:00'),
('2121211212', 'yesenia', 'gomez', '65523344', 'yesenia@gmail.com', '123456', '2019-08-09 00:00:00', '2019-08-09 00:00:00'),
('22222222', 'oscar', 'corzo', '65844223', 'oscar@gmail.com', '123456', '2019-08-09 10:11:18', '2019-08-09 08:06:33'),
('333323232', 'diego', 'villamizar', '6533222', 'diego@hotmail.com', '123456', '2019-08-09 00:00:00', '2019-08-22 00:00:00'),
('4334343434', 'luisa', 'sarmiento', '315500245', 'luisa@hotmail.com', '123456', '2019-08-09 00:00:00', '2019-08-09 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `idComentario` int(11) NOT NULL,
  `contenido` varchar(200) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `idPublicacion` int(11) DEFAULT NULL,
  `idCliente` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion`
--

CREATE TABLE `publicacion` (
  `idPublicacion` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `ubicacion` varchar(20) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `fechaPublicada` datetime DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `negociable` char(1) DEFAULT NULL,
  `tipoInmueble` varchar(20) DEFAULT NULL,
  `urlImagen` varchar(100) DEFAULT NULL,
  `idCliente` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `publicacion`
--

INSERT INTO `publicacion` (`idPublicacion`, `nombre`, `ubicacion`, `precio`, `descripcion`, `fechaPublicada`, `estado`, `negociable`, `tipoInmueble`, `urlImagen`, `idCliente`) VALUES
(101, 'apartamento en arriendo', 'cr27 #14-55', 720000, 'se arrienda apartamento en la torre Babilonia, con baño, cocina y balcón privados, dos habitaciones.', '2019-07-25 00:00:00', '1', '1', 'apartamento', 'imagenes/i1.jpg', '22222222'),
(222, 'Se arrienda apartamento', 'cll 13 #09-52', 540000, 'apartamento en segundo piso, tres habitaciones, dos baños, cocina y solar.', '2019-06-12 00:00:00', '1', '0', 'apartamento', 'imagenes/i2.jpg', '12312312312'),
(333, 'habitación amoblada', 'cra 27 #11-06', 300000, 'habitación amoblada cerca a la uis, ambiente no familiar', '2019-08-09 00:00:00', '1', '1', 'habitacion', 'imagenes/i1.jpg', '333323232'),
(1111, 'se arrienda habitación', 'cra 24 #11-65', 200000, 'habitacion no amoblada, baño privado, ambiente familiar', '2019-08-01 00:00:00', '1', '1', 'habitacion', 'imagenes/i3.jpg', '4334343434');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD PRIMARY KEY (`idCalificacion`),
  ADD KEY `idPublicacion` (`idPublicacion`),
  ADD KEY `idCliente` (`idCliente`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`idComentario`),
  ADD KEY `idPublicacion` (`idPublicacion`),
  ADD KEY `idCliente` (`idCliente`);

--
-- Indices de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD PRIMARY KEY (`idPublicacion`),
  ADD KEY `idCliente` (`idCliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  MODIFY `idCalificacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `idComentario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  MODIFY `idPublicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1112;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD CONSTRAINT `calificacion_ibfk_1` FOREIGN KEY (`idPublicacion`) REFERENCES `publicacion` (`idPublicacion`),
  ADD CONSTRAINT `calificacion_ibfk_2` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`);

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`idPublicacion`) REFERENCES `publicacion` (`idPublicacion`),
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`);

--
-- Filtros para la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD CONSTRAINT `publicacion_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

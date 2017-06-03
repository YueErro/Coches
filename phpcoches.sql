-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-04-2017 a las 10:14:16
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `phpcoches`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coche`
--

CREATE TABLE `coche` (
  `codcoche` int(11) NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `marca` text COLLATE utf8_spanish_ci NOT NULL,
  `modelo` text COLLATE utf8_spanish_ci NOT NULL,
  `wifi` int(11) NOT NULL,
  `gps` int(11) NOT NULL,
  `bluetooth` int(11) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `coche`
--

INSERT INTO `coche` (`codcoche`, `foto`, `marca`, `modelo`, `wifi`, `gps`, `bluetooth`, `precio`) VALUES
(1, 'http://www.diariomotor.com/imagenes/2012/09/posts/volkswagen-golf-gti-05-dm-700px.jpg', 'Volkswagen', 'Golf GTI', 0, 0, 2, 380000),
(2, 'http://a.ccdn.es/nuevos/400/mercedes/e-class/2011/4sa.jpg', 'Mercedes-Benz', 'E 500 Elegance', 0, 1, 0, 78000),
(3, 'http://www.coches.com/fotos_historicas/ford/Focus/med_ford_focus-2014_r3.jpg', 'Ford', 'Focus', 2, 2, 2, 14000),
(4, 'http://www.coches.com/fotos_historicas/seat/Mii-2011/high_seat_mii-2011_r10.jpg', 'Seat', 'Mii', 1, 0, 1, 7000),
(5, 'http://cochesnuevos.autofacil.es/img/PEUGEOT_108_5P.jpg', 'Peugeot', '108 5p', 0, 0, 0, 11000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `codpedido` int(11) NOT NULL,
  `codcoche` int(11) NOT NULL,
  `color` varchar(45) CHARACTER SET utf8 NOT NULL,
  `gps` int(1) NOT NULL,
  `wifi` int(1) NOT NULL,
  `unidades` int(10) NOT NULL,
  `bluetooth` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`codpedido`, `codcoche`, `color`, `gps`, `wifi`, `unidades`, `bluetooth`) VALUES
(1, 1, 'Blanco', 1, 1, 2, 1),
(2, 3, 'Azul', 1, 0, 3, 0),
(3, 2, 'Gris', 1, 1, 1, 1),
(4, 2, 'Rojo', 0, 0, 5, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `coche`
--
ALTER TABLE `coche`
  ADD PRIMARY KEY (`codcoche`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`codpedido`),
  ADD KEY `comprar` (`codcoche`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `coche`
--
ALTER TABLE `coche`
  MODIFY `codcoche` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `codpedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `comprar` FOREIGN KEY (`codcoche`) REFERENCES `coche` (`codcoche`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2021 a las 22:46:52
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tpeweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodegas`
--

CREATE TABLE `bodegas` (
  `id_bodega` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `ubicacion` varchar(100) NOT NULL,
  `contacto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bodegas`
--

INSERT INTO `bodegas` (`id_bodega`, `nombre`, `ubicacion`, `contacto`) VALUES
(4, 'Bodega Pernod Richard', 'Mendoza', 'info@panconquesowines.com'),
(5, 'La Riojana Cooperativa Vitivinifrutícola', 'La Rioja', 'info@unabodegadelarioja.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `comentario` varchar(300) NOT NULL,
  `puntuacion` int(1) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `fk_id_vino` int(11) NOT NULL,
  `fk_id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `comentario`, `puntuacion`, `fecha`, `fk_id_vino`, `fk_id_usuario`) VALUES
(1, 'este vino me dio gastritis', 5, '2021-11-23 03:00:00', 29, 4),
(2, 'este vino me gusto', 4, '2021-11-23 03:00:00', 29, 4),
(14, 'this is a strong wine, i put it on my chin, as they say.', 5, '2021-11-24 13:16:41', 29, 4),
(16, '*CLICK* nice.', 5, '2021-11-24 13:32:01', 34, 11),
(19, '*Click* nice.', 5, '2021-11-24 13:46:09', 33, 4),
(22, 'unvino', 5, '2021-11-24 15:23:08', 42, 4),
(23, 'asd', 5, '2021-11-24 15:23:18', 42, 4),
(24, '123123', 3, '2021-11-24 15:23:37', 42, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `password`, `rol`) VALUES
(4, 'admin', '$2y$10$3oTZlXM2pUnxmcGVBHybc.yLFEDqPzIaH5Qe/2UFTXjesQLI6UMxW', 1),
(11, 'usuarioquenoesadmin', '$2y$10$uDKBJSrP0Z.TMAPT6rzwW.zNHvrTL/Vdbjd1OQ0Ks6N/HnI.isIT6', 0),
(12, 'otrousuario', '$2y$10$ZsbXQ5iCQ8dTeWHyTHGUGe7AL6UdfZMi2qPAeA2cRd/GFkJFIDYdG', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vinos`
--

CREATE TABLE `vinos` (
  `id_vino` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `precio` int(11) NOT NULL,
  `fk_id_bodega` int(11) NOT NULL,
  `imagen` varchar(50) NOT NULL DEFAULT 'img/vinoEjemplo.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vinos`
--

INSERT INTO `vinos` (`id_vino`, `nombre`, `descripcion`, `precio`, `fk_id_bodega`, `imagen`) VALUES
(29, 'Cafayate Cabernet Sauvignon', '750cc', 6000, 4, 'img/619eb21fd9acd7.25834569.png'),
(33, 'Fond de Cave Reserva Chardonay', '750cc', 8000, 4, 'img/619eb2350269d0.88622130.png'),
(34, 'Fond de Cave Reserva Malbec', '750cc', 5000, 4, 'img/619eb241b65910.95950685.png'),
(42, 'vinoNuevo', 'este vino es nuevo', 12, 4, 'img/619eb24f81b3d4.13241517.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bodegas`
--
ALTER TABLE `bodegas`
  ADD PRIMARY KEY (`id_bodega`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `fk_id_usuario` (`fk_id_usuario`),
  ADD KEY `fk_id_vino` (`fk_id_vino`) USING BTREE;

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `vinos`
--
ALTER TABLE `vinos`
  ADD PRIMARY KEY (`id_vino`),
  ADD KEY `id_bodega` (`fk_id_bodega`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bodegas`
--
ALTER TABLE `bodegas`
  MODIFY `id_bodega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `vinos`
--
ALTER TABLE `vinos`
  MODIFY `id_vino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`fk_id_vino`) REFERENCES `vinos` (`id_vino`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`fk_id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vinos`
--
ALTER TABLE `vinos`
  ADD CONSTRAINT `vinos_ibfk_1` FOREIGN KEY (`fk_id_bodega`) REFERENCES `bodegas` (`id_bodega`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

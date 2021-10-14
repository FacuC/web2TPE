-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-10-2021 a las 00:30:47
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
(1, 'Bodega Trapiche', 'Mendoza', 'info@trapiche.com'),
(2, 'Bodega Luigi Bosca', 'Mendoza', 'info@luigibosca.com'),
(4, 'Bodega Pernod Richard', 'Buenos Aires', 'info@pernodrichard.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `password`) VALUES
(4, 'admin', '$2y$10$3oTZlXM2pUnxmcGVBHybc.yLFEDqPzIaH5Qe/2UFTXjesQLI6UMxW');

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
  `imagen` varchar(50) NOT NULL DEFAULT 'img/vinoejEmplo.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vinos`
--

INSERT INTO `vinos` (`id_vino`, `nombre`, `descripcion`, `precio`, `fk_id_bodega`, `imagen`) VALUES
(29, 'Cafayate Cabernet Sauvignon', '750cc', 6000, 4, 'img/6168ae3a56f1e3.99608192.png'),
(33, 'Fond de Cave Reserva Chardonay', '750cc', 8000, 1, 'img/6168ae5dbd3c35.60142786.png'),
(34, 'Fond de Cave Reserva Malbec', '750cc', 5000, 1, 'img/6168aed314bc85.51373361.png'),
(35, 'Finca La Linda Cabernet Sauvignon', '750cc', 8000, 2, 'img/6168aefc6a2a92.82595060.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bodegas`
--
ALTER TABLE `bodegas`
  ADD PRIMARY KEY (`id_bodega`);

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
  MODIFY `id_bodega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `vinos`
--
ALTER TABLE `vinos`
  MODIFY `id_vino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `vinos`
--
ALTER TABLE `vinos`
  ADD CONSTRAINT `vinos_ibfk_1` FOREIGN KEY (`fk_id_bodega`) REFERENCES `bodegas` (`id_bodega`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
